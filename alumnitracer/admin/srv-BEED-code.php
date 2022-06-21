<?php 
session_start();
include ('../includes/connection.php');


if(isset($_POST['checking_viewbtn'])){
    $a_id = $_POST['alumni_id'];
   // echo $return = $a_id;

   
   $query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN employment on survey.emID = employment.emID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN jobalign on survey.jobID = jobalign.jobID
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID   
WHERE survey_id = '$a_id' and courses.courseID = '6' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);




while($row = mysqli_fetch_array($query_run)){
    echo $return = '
    
 
    <p> Name: '.$row["name"].' </p>
    <p> Name: '.$row["dept"].' </p>
    <p> Course: '.$row["course"].' </p>
    <p> Batch: '.$row["year"].' </p>
    <p> Job Position: '.$row["jobposition"].' </p>
    <p> Year Employed: '.$row["yearemployed"].' </p>
    <p> Job Alignment: '.$row["align"].' </p>
    <p> Employment Status: '.$row["status"].' </p>
    <p> Company: '.$row["company"].' </p>
    <p> Job: '.$row["jobtitle"].' </p>
     <img src="../uploads/'.$row["proof"].'" width="450" height="250"> 

    
    
    ';

}





}




?>