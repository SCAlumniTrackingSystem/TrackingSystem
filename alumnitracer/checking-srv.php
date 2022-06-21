<?php

session_start();
include ('includes/connection.php');




if (isset($_POST['agree'])) {
  
    $id = $_SESSION['regs_ID'];

  $query = "SELECT * FROM survey WHERE registerID = '$id' LIMIT 1";
  $query_run = mysqli_query($con, $query) or die(mysqli_error($con));
  
  if (mysqli_num_rows($query_run) > 0) {
  
  $_SESSION['status'] = "You are already responded";
  $_SESSION['status_code'] = "info";
	header("Location: survey-form.php");
	exit (0); 

  }

  else {
    $_SESSION['status'] = "Answer this survey form";
    $_SESSION['status_code'] = "info";
    header("Location: form-survey.php");
    exit (0); 
  }
  
  
  }
  
  
?>