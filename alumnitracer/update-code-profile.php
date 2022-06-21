<?php
session_start ();

include ('includes/connection.php');


if (isset($_POST['Update-prof'])){
    $id = $_SESSION["regs_ID"];
	$stnd = $_POST["snum"];
    $fname = $_POST["fname"];
    $MI = $_POST["MI"];
    $lname = $_POST["lname"];
    $deptID = $_POST["deptID"];
    $crsID = $_POST["courseID"];
    $batchID = $_POST["batchID"];
    $bday = $_POST["bday"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $add = $_POST["add"];
    $phone = $_POST["phone"];


	$query="UPDATE registration INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
	INNER JOIN batch on gradlist_tbl.batchID = batch.batchID  
     SET studentnumber='$stnd', firstname ='$fname', middle = '$MI', lastname = '$lname', gradlist_tbl.deptID = '$deptID', gradlist_tbl.courseID = '$crsID', gradlist_tbl.batchID = '$batchID', birthday = '$bday', gender = '$gender', email = '$email', address = '$add', phone = '$phone'
     WHERE registerID='$id' ";
	$query_run = mysqli_query($con, $query) or die(mysqli_error($con));

	if($query_run){
		$_SESSION['status']= "Data Updated Successfully";
        $_SESSION['status_code'] = "success";
		header("Location: update-profile.php");


	}
	else{
		$_SESSION['status']= "Not Updated";
        $_SESSION['status_code'] = "error";
		header("Location: update-profile.php");

	}

}
?>

