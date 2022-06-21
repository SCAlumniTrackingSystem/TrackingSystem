<?php
include 'a_authentication.php';
$title = 'Complaints';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


    <?php

$query = "SELECT * FROM complain 
ORDER by compID asc ";
$query_run = mysqli_query($con,$query);


?>



<!-- Modal -->
<div class="modal fade" id="alum_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Answered Surveys for BSIT Alumni</h5>
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
    <b>LIST OF COMPLAINTS </b>

  </div>
<div class="card-body">

    <table id="table" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">
        
    <thead class="table-dark">
    <tr>
   
        <th scope="col" style="display:none">Id</th>
        <th scope="col">Email</th>
        <th>Complain</th>
        <th>Action</th>
    </tr>
  </thead>

  <?php
        while($row = mysqli_fetch_array($query_run)){
           
      
            echo '
                <tr>
                
          
                    <td class="alumID" style="display:none"> '.$row["compID"].'</td>
                    <td> '.$row["email"].'</td>
                     <td> '.$row["descript"].'</td>
                    

                    <td class="text-center"> 

                   
               
                    <input type="hidden" class="delete_id_value"  value="'.$row["compID"].'">
                    <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">
                   
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                       <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                    </a> 

                    <form method="POST" action="feedback.php">
                    <input type="hidden" name="email" value="'.$row["email"].'">
                    <button type="submit"class="btn btn-primary" name="accept"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                  </svg></button>
                    </form>

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
                    url: "del-feed.php",
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
    <?php 
    /*
<script>
   $(document).on('click', '.view_btn',function() {
    $('.view_btn').click(function(e){
            e.preventDefault();
           // alert('hello');
         var alumID =  $(this).closest('tr').find('.alumID').text();
        // console.log(alumID);
        $.ajax({
          type:"POST",
          url:  "srv-BSIT-code.php",
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
      */
      ?>

      
 
<?php include ('includes/footer-admin.php');
include ('includes/script.php'); ?>