<?php
session_start ();

include ('includes/connection.php');


if (isset($_POST["Update-surv"])) {
	$id = $_SESSION["regs_ID"];
	$emID = $_POST["emID"];
	$toj = $_POST["toj"];
	$jid = $_POST["jID"];
	$jpos = $_POST["jpos"];
	$comp = $_POST["company"];
	$yearemp = $_POST["year-emp"];


	$query = "UPDATE survey INNER JOIN registration on survey.registerID = registration.registerID
	INNER JOIN employment on survey.emID = employment.emID 
	INNER JOIN jobalign on survey.jobID = jobalign.jobID
	SET survey.emID ='$emID', jobtitle ='$toj', survey.jobID = '$jid', jobposition = '$jpos', company = '$comp', yearemployed = '$yearemp'
	WHERE registration.registerID = '$id' ";
	$query_run = mysqli_query($con, $query) or die(mysqli_error($con));

	if ($query_run) {

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