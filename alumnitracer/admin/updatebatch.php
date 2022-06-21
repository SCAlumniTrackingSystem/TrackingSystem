<?php 
session_start();
include ('../includes/connection.php');

if(isset($_POST['update']))
{
	$id = $_POST["id"];
	$bth = $_POST["bth"];

	$query=" UPDATE `batch` SET `year` ='$bth' WHERE `batchID` ='$id' ";
	$query_run=mysqli_query($con,$query);

	if($query_run)
	{
	 
    $_SESSION ['status'] = "Your Data is Updated";
    $_SESSION['status_code'] = "success";
            header("Location: addbatch.php");
            exit (0);
        }
        else{
            $_SESSION ['status'] = "Your Data is failed to update";
            $_SESSION['status_code'] = "error";
            header("Location: addbatch.php");
            exit (0);
        }
    }

?>
