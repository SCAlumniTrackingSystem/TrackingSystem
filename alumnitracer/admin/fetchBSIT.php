<?php

include 'a_authentication.php';
$title = 'Export Data For BSIT';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');
sleep(1);
if (isset($_POST['request'])){
    $request = $_POST['request'];

    $query ="SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '1' and batch.batchID = '$request' ORDER by survey_id asc";
    $result = mysqli_query($con, $query);
  

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <table id="table" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">

<table id="table" class="table table caption-top table-bordered table-striped table-hover" style="width:100%">
        
        <thead class="table-dark">
        <tr>
       
        
            <th scope="col">Name</th>
            <th>Department</th>
            <th scope="col">Course</th>
            <th scope="col">Batch Year</th>
            <th scope="col">Employment Status</th>
             <th>Job Title</th>
            <th>Job Position</th>
            <th scope="col">Company</th>
            <th scope="col">Year Employed</th>
            <th>Job Alignment</th>
        </tr>
      </thead>
    
      <?php
            while($row = mysqli_fetch_array($result)){
               
          
                echo '
                    <tr>
                    
              
                    
                        <td> '.$row["name"].'</td>
                         <td> '.$row["dept"].'</td>
                        <td> '.$row["course"].'</td>
    
                        <td> '.$row["year"].'</td>
                        <td> '.$row["status"].'</td>
                         <td> '.$row["jobtitle"].'</td>
                        <td> '.$row["jobposition"].'</td>
                        <td> '.$row["company"].'</td>
                     <td>'.$row["yearemployed"].'</td>
                      <td> '.$row["align"].'</td>
    
    
                    </tr>
                ';
            }
      ?>
    
    </table>
</table>
<script>
        $(document).ready(function() {
            $('#table').DataTable({
        
        dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [  

        {
              extend: 'pdfHtml5',
              download: 'open',
              title: 'Cavite State University-Silang Campus Alumni Tracking Report',
              filename: 'BSP EMPLOYMENT REPORT',
              orientation: 'landscape',
             
              pageSize: 'LEGAL'
          },
           {
              extend: 'csvHtml5',
              filename: 'BSP EMPLOYMENT REPORT'
             
            }
          ]
      });
        });
<?php }
?>
<?php include('includes/footer-admin.php'); ?>