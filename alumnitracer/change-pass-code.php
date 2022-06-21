<?php
session_start ();
include ('includes/connection.php');



if(isset($_POST['change']))
  {
    $id = $_SESSION['regs_ID'];



  
  $old_pass = mysqli_real_escape_string($con, $_POST['old']);
  $old_pass = MD5 ($old_pass);


   $new_pass = mysqli_real_escape_string($con, $_POST['new']);

   $re_pass = mysqli_real_escape_string($con, $_POST['newp']);


  $chg_pwd = mysqli_query($con, "SELECT * FROM registration WHERE registerID = '$id' LIMIT 1");
  $chg_pwd1=mysqli_fetch_array($chg_pwd);
  $data_pwd=$chg_pwd1['password'];
  if($data_pwd==$old_pass){
  if($new_pass==$re_pass){
     $new_pass = MD5 ($new_pass);
    $update_pwd=mysqli_query($con, "UPDATE registration SET password ='$new_pass' WHERE registerID = '$id'");
    
    $_SESSION['status'] = "Update Sucessfully";
    $_SESSION['status_code'] = "success";
            header("Location: change-pass.php");
            exit (0); 
  }
  else{
    
    $_SESSION['status'] = "Your new and Retype Password is not match";
    $_SESSION['status_code'] = "warning";
            header("Location: change-pass.php");
            exit (0); 
  }

  }
  else
  {
  
  $_SESSION['status'] = "Your old password is wrong";
  $_SESSION['status_code'] = "warning";
            header("Location: change-pass.php");
            exit (0); 
  }}

?>