<?php 
session_start();
include ('../includes/connection.php');


if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$snum = $_POST['snum'];
	$fname = $_POST['fname'];
	$mname = $_POST['MI'];
	$lname = $_POST['lname'];
	$deptID = $_POST['deptID'];
	$courseID = $_POST['courseID'];
    $batchID = $_POST['batchID'];
	
	$sql="UPDATE gradlist_tbl INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
	INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    SET studentnumber ='$snum', firstname ='$fname', middle = '$mname', lastname ='$lname', 
    gradlist_tbl.deptID ='$deptID', gradlist_tbl.courseID = '$courseID', gradlist_tbl.batchID = '$batchID' 
    WHERE grad_ID ='$id' ";
    $query_run = mysqli_query($con, $sql) or die(mysqli_error($con));
  // $query_run = $con->query($sql)or die($con->error);
	if($query_run)
	{
	 $_SESSION ['status'] = "Successfully Updated";
     $_SESSION['status_code'] = "success";
            header("Location: addpost.php");
            exit (0);
        }
        else{
        	  $_SESSION ['status'] = "Failed to update";
              $_SESSION['status_code'] = "error";
            header("Location: addpost.php");
            exit (0);
        }
    }

?>