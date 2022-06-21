<?php
include 'a_authentication.php';
$title = ' Answered Survey Form BSP';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


    <?php

$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN employment on survey.emID = employment.emID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
WHERE courses.courseID = '3' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);


?>

<?php

      if (isset($_SESSION['status'])) {
        ?>

        <div class="alert alert-success" style="margin-top: 5%;">
          <h5><?= $_SESSION['status']; ?> </h5>
      </div>
      <?php
      unset($_SESSION['status']); 
      }


?>

<!-- Modal -->
<div class="modal fade" id="alum_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Answered Surveys for BSP Alumni</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="view_data">

  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

    
<div class="card mx-auto" style="width: 90%; margin-top: 12%;">
 <div class="card-header text-center">
    <b>LIST  ANSWERED SURVEY OF BSP </b>

  </div>
<div class="card-body">

    <table id="table" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">
        
    <thead class="table-dark">
    <tr>
   
        <th scope="col" style="display:none;">Id</th>
        <th scope="col">Name</th>
        <th>Department</th>
        <th scope="col">Course</th>
        <th scope="col">Batch Year</th>
        <th>Action</th>
    </tr>
  </thead>

  <?php
        while($row = mysqli_fetch_array($query_run)){
           
      
            echo '
                <tr>
                
          
                    <td class="alumID" style="display:none;"> '.$row["survey_id"].'</td>
                    <td> '.$row["name"].'</td>
                     <td> '.$row["dept"].'</td>
                    <td> '.$row["course"].'</td>

                    <td> '.$row["year"].'</td>

                    <td> 
                    
                    <input type="hidden" class="delete_id_value"  value="'.$row["survey_id"].'">
                    <input type="hidden" class="email_delete" value="'.$row["email"].'">
                    <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">
                   
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                       <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                    </a> 




                         <button class="btn btn-primary view_btn">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                         <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                         <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                       </svg>
                          </button>
</td>
                    


                </tr>
            ';
        }
  ?>

</table>
     </div>
 </div>

    
    <script>
        $(document).ready(function() {
        $('#table').DataTable();
        $('#table tbody').on('click', '.delete_btn_ajax',  function () {

          $('.delete_btn_ajax').click(function (e){
              e.preventDefault();
                //
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                var email = $(this).closest("tr").find('.email_delete').val();
                //console.log(deleteid);
                swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  $.ajax({
                    type: "POST",
                    url: "delete-bsp.php",
                    data: {
                      "delete_btn_set": true,
                      "delete_id": deleteid,
                      "email": email
                    },
                    success: function(response){
                      swal("Data Deleted Succesfully!",{
                        icon: "success",
                      }).then((result) => {
                        location.reload();
                      });


                    }
                   

                  });
                } 
              });


          });

        });
         
        });
        
    </script>
<script>
   $(document).on('click', '.view_btn',function() {
    $('.view_btn').click(function(e){
            e.preventDefault();
           // alert('hello');
         var alumID =  $(this).closest('tr').find('.alumID').text();
        // console.log(alumID);
        $.ajax({
          type:"POST",
          url:  "srv-BSP-code.php",
          data: { 
            'checking_viewbtn': true,
            'alumni_id': alumID,

          },

          success: function (response){
           console.log(response);
           $('.view_data').html(response);
           $('#alum_view').modal('show');


          }
        });

       
          });
          
        });
      </script>

    
 
<?php include ('includes/footer-admin.php'); ?>