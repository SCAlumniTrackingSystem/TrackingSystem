<?php
session_start ();

include ('includes/connection.php');


if (isset($_POST['save'])) {
    $id = $_SESSION['regs_ID'];
      $emID = $_POST['emID'];
      $titlejob = $_POST['titlejob'];
      $jobpos = $_POST['jobpos'];
      $company = $_POST['company'];
      $year = $_POST['year'];
      $align  = $_POST['alignjob'];
      
    $filename = $_FILES ['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $folder = 'uploads/';

 move_uploaded_file($filetmpname, $folder.$filename);
  
    $query = "INSERT INTO survey(`survey_id`, `registerID`, `emID`, `jobtitle`, `jobposition`, `company`, `yearemployed`, `jobID`, `proof`) VALUES 
      ('',(SELECT registerID FROM registration WHERE registerID = '$id'),'$emID','$titlejob','$jobpos','$company','$year','$align', '$filename')";
     // $query_run = mysqli_query($con, $query) or die(mysqli_error($con));
     $query_run = $con->query($query) or die($con->error);
  if ($query_run)
   {
   
      $_SESSION ['status'] = "Your Data is successfully save";
      $_SESSION['status_code'] = "success";
      header("Location: survey-form.php");
  
  }
  else{
      $_SESSION ['status'] = "Failed";
      $_SESSION['status_code'] = "error";
      header("Location: survey-form.php");
  
  }
  
  }
  //else{
      //$_SESSION ['status'] = "Failed";
  //	header("Location: survey_form.php");
  
  
  
  ?>

