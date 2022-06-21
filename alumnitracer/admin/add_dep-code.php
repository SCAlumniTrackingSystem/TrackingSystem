<?php

session_start();
include ('../includes/connection.php');

if (isset($_POST['insert'])) {
	$dept =$_POST["dept"];

	$check_snum = "SELECT dept FROM department WHERE dept = '$dept' LIMIT 1";
    $check_snum_run = mysqli_query ($con, $check_snum);

	
    if (mysqli_num_rows($check_snum_run) > 0 ) {
        $_SESSION ['status'] = "Department already exist";
		$_SESSION['status_code'] = "warning";
header("Location: add_dep.php");
    }
    else {

 $query = "INSERT INTO `department`(`deptID`, `dept`) VALUES ('','$dept')";
   $query_run = mysqli_query($con, $query);
if ($query_run)
 {

	$_SESSION ['status'] = "Your Data is successfully save";
	$_SESSION['status_code'] = "success";
	header("Location: add_dep.php");

}
else{
	$_SESSION ['status'] = "Failed";
	$_SESSION['status_code'] = "error";
	header("Location: add_dep.php");

}
	}
}
	?>