<?php

session_start();
include ('../includes/connection.php');

if (isset($_POST['insert'])) {
	$topic = $_POST['topic'];
	$des = $_POST['description'];
 $stats = $_POST['status'];

	$filename = $_FILES ['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $folderDestination = '../uploads/';

 move_uploaded_file($filetmpname, $folderDestination.$filename);

 $check_snum = "SELECT topic FROM announce WHERE topic = '$topic' LIMIT 1";
    $check_snum_run = mysqli_query ($con, $check_snum);

	
    if (mysqli_num_rows($check_snum_run) > 0 ) {
        $_SESSION ['status'] = "Post already exist";
		$_SESSION['status_code'] = "warning";
header("Location: addannounce.php");
    }
    else {


 $query = "INSERT INTO `announce`(`announceID`, `topic`, `description_announce`, `image`, `notif_status`) 
 VALUES ('','$topic','$des','$filename','$stats')";

 $query_run = mysqli_query($con, $query);

 if ($query_run) {

 		$_SESSION ['status'] = "Your Post is successfully save";
		 $_SESSION['status_code'] = "success";
	header("Location: addannounce.php");
  exit (0);
 }

 else{
 	
 		$_SESSION ['status'] = "Failed";
		 $_SESSION['status_code'] = "error";
	header("Location: addannounce.php");
  exit (0);


 }


}
}


?>