<?php
session_start();
include ('../includes/connection.php');


if (isset($_POST['insert'])) {
	$crs = $_POST['crs'];

	$check_snum = "SELECT course FROM courses WHERE course = '$crs' LIMIT 1";
    $check_snum_run = mysqli_query ($con, $check_snum);

	
    if (mysqli_num_rows($check_snum_run) > 0 ) {
        $_SESSION ['status'] = "Course already exist";
		$_SESSION['status_code'] = "warning";
header("Location: add_crs.php");
    }
    else {

 $query = "INSERT INTO `courses`(`courseID`, `course`) VALUES ('','$crs')";
   $query_run = mysqli_query($con, $query);
if ($query_run)
 {

	$_SESSION ['status'] = "Your Data is successfully save";
	$_SESSION['status_code'] = "success";
	header("Location: add_crs.php");
  exit (0);

}
else{
	$_SESSION ['status'] = "Failed";
	$_SESSION['status_code'] = "error";
	header("Location: add_crs.php");
  exit (0);
}
	}
}
	?>