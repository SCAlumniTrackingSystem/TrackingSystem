<?php
session_start();
include ('../includes/connection.php');

if (isset($_POST['Update-Admin'])){
    $id = $_SESSION["id"];
	
    $fname = $_POST["fname"];
    $MI = $_POST["MI"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
  

	$query="UPDATE admin SET
     Fname ='$fname', MI = '$MI', Lname = '$lname',  email = '$email'
     WHERE adminID='$id' ";
	$query_run = mysqli_query($con, $query) or die(mysqli_error($con));

	if($query_run){
		$_SESSION['status']= "Data Updated Successfully";
		$_SESSION['status_code'] = "success";
		header("Location: a_update-profile.php");


	}
	else{
		$_SESSION['status']= "Not Updated";
		$_SESSION['status_code'] = "error";
		header("Location: a_update-profile.php");

	}

}


?>