<?php 
session_start();
include ('../includes/connection.php');


if(isset($_POST['update']))
{
	$id = $_POST["id"];
	$dept = $_POST["dept"];

	$query=" UPDATE `department` SET `dept` ='$dept' WHERE `deptID` ='$id' ";
	$query_run=mysqli_query($con,$query);

	if($query_run)
	{
	 $_SESSION ['status'] = "Your Data is Updated";
     $_SESSION['status_code'] = "success";
            header("Location: add_dep.php");
            exit (0);
        }
        else{
        	  $_SESSION ['status'] = "Your Data is failed to update";
              $_SESSION['status_code'] = "error";
            header("Location: add_dep.php");
            exit (0);
        }
    }

?>