<?php
session_start ();

include ('includes/connection.php');


if (isset($_POST['send'])) {
    
      $em = $_POST['em'];
      $des = $_POST['description'];
  
    $query = "INSERT INTO `complain`(`compID`, `email`, `descript`) VALUES ('','$em','$des')";
     $query_run = $con->query($query) or die($con->error);
  if ($query_run)
   {
   
      $_SESSION ['status'] = "Your Complain is successfully sent";
      $_SESSION['status_code'] = "success";
      header("Location: Job.php");
  
  }
  else{
      $_SESSION ['status'] = "Failed";
      $_SESSION['status_code'] = "error";
      header("Location: Job.php");
  
  }
  
  }
  //else{
      //$_SESSION ['status'] = "Failed";
  //	header("Location: survey_form.php");
  
  
  
  ?>
