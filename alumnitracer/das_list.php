<?php

$title = 'DAS Alumni List';
include ('authentication.php');

include ('includes/connection.php');


include('includes/header.php'); ?>


<?php include('includes/navbarhome.php');
 ?>

    <!--
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    -->
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <style>
    

    </style>

  <!-- Modal -->
<div class="modal fade" id="alum_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Department of Information Technology</h5>
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

 
 
 <div class="card mx-auto" style="width: 90%; margin-top: 10%;">
 <div class="card-header text-center">
    <b>LIST OF ALUMNI</b>

  </div>
<div class="card-body">
  
 
<?php
$i = 1;
$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN employment on survey.emID = employment.emID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE department.deptID = '4' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);


?>

    


    <table id="table" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">
        
    <thead class="table-dark">
    <tr>
   
    <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Course</th>
        <th scope="col">Batch Year</th>
        <th scope="col">Employment Status</th>
        <th scope="col">Company</th>
        <th scope="col">View</th>
    </tr>
  </thead>

  <?php
        while($row = mysqli_fetch_array($query_run)){
           
      
            echo '
                <tr>
                
          
                <td class="alumID"> '.$row["survey_id"].'</td>
                    <td> '.$row["name"].'</td>
                    <td> '.$row["course"].'</td>
                    <td> '.$row["year"].'</td>
                    <td> '.$row["status"].'</td>
                    <td> '.$row["company"].'</td>
                 <td><button type="button"class="btn btn-outline-primary view_btn"> View</button></td>


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
          url:  "list-das-code.php",
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
  

<?php include('includes/footer.php'); ?>

  