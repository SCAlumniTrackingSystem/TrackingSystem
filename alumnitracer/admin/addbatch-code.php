<?php 
session_start();
include ('../includes/connection.php');


if (isset($_POST['insert'])) {
	$bth = $_POST["bth"];

	$check_snum = "SELECT year FROM batch WHERE year = '$bth' LIMIT 1";
    $check_snum_run = mysqli_query ($con, $check_snum);

	
    if (mysqli_num_rows($check_snum_run) > 0 ) {
        $_SESSION ['status'] = "Batch year already exist";
		$_SESSION['status_code'] = "warning";
header("Location: addbatch.php");
    }
    else {
 
	$query = "INSERT INTO `batch`(`batchID`, `year`) VALUES ('','$bth')";
   $query_run = mysqli_query($con, $query);
if ($query_run)
 {

	$_SESSION ['status'] = "Your Data is successfully save";
	$_SESSION['status_code'] = "success";
	header("Location: addbatch.php");
    exit (0);
  

}
else{
	$_SESSION ['status'] = "Failed";
	$_SESSION['status_code'] = "error";
	header("Location: addbatch.php");
    exit (0);

}
	}
}
	?>