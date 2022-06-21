<?php
session_start ();

include ('includes/connection.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function send_password_reset ($get_email,$get_fname,$token){

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
   $mail->isSMTP();                                            //Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
   $mail->Username   = 'alumnitracersystem1@gmail.com';                     //SMTP username
   $mail->Password   = 'hpixdghpuvpylyfz';                               //SMTP password
   
   $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
   $mail->Port       = 587;    
   
   $mail->setFrom('alumnitracersystem1@gmail.com','Alumni tracking ystem');
   $mail->addAddress($get_email); 
   
   $mail->isHTML(true);                                  //Set email format to HTML
   $mail->Subject = 'Reset password Notification';
   
   $email_template = "<h2>Password Reset</h2>
   <h3>You have requested to reset your account password. Please click the button below to reset your password.</h3>
   <br><br>
   <a href = 'http://localhost/alumnitracer/password-change.php?token=$token&email=$get_email'> <button type='button' style='background-color: #6FE358; color: white; border: none; padding: 15px 32px; text-align: center; font-size: 16px;' >Reset Now!</button> </a>
   ";
   $mail->Body = $email_template;
   $mail->send();
   echo 'Message has been sent';


}

if (isset($_POST['password_reset_link'])) {
$email = mysqli_real_escape_string($con, $_POST['email']);
$token =md5(rand());

$check_email = "SELECT email FROM registration WHERE email = '$email' LIMIT 1";
$check_email_run = mysqli_query($con, $check_email);

if (mysqli_num_rows($check_email_run) > 0) {
$row = mysqli_fetch_array($check_email_run); 
$get_fname = $row['fname'];
$get_email = $row['email'];

$update_token = "UPDATE registration SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1";
$update_token_run = mysqli_query($con, $update_token);

if ($update_token_run) {
    send_password_reset ($get_email,$get_fname,$token);
    $_SESSION['status'] = "We sent you an email for password reset link";
    $_SESSION['status_code'] = "success";
    header("Location: login.php");
    exit (0); 
}
else {
    $_SESSION['status'] = "Something went wrong.";
    $_SESSION['status_code'] = "warning";
    header("Location: password-reset.php");
    exit (0); 
}
}

else {
    $_SESSION['status'] = "No email found";
    $_SESSION['status_code'] = "error";
    header("Location: password-reset.php");
    exit (0); 
}

}
 

if (isset($_POST['password_update'])) {

    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if (!empty($token)) {

        if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {
            // checking token
            $check_token = "SELECT verify_token FROM registration WHERE verify_token = '$token' LIMIT 1 ";
            $check_token_run = mysqli_query($con, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {

                if ($new_password == $confirm_password) {
                    $new_password = MD5 ($new_password);
                    $update_pass = "UPDATE registration SET password = '$new_password' WHERE verify_token='$token' LIMIT 1";
                    $update_pass_run = mysqli_query($con,$update_pass);

                    if ($update_pass_run) {
                        $new_token = md5(rand())."funda";
                        $update_to_new_token = "UPDATE registration SET verify_token  = '$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($con,$update_to_new_token);

                        $_SESSION['status'] = "New password was updated successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location: login.php");
                        exit (0); 
                    }
                    else {
                        $_SESSION['status'] = "Password did not Update";
                        $_SESSION['status_code'] = "error";
                        header("Location: password-change.php?token=$token&email=$email");
                        exit (0); 
                        
                    }


                }
                else {
                    
                    $_SESSION['status'] = "Password and Confirm Password does not match";
                    $_SESSION['status_code'] = "warning";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit (0); 
                }
                
            }
            else {
                $_SESSION['status'] = "Invalid Token";
                $_SESSION['status_code'] = "warning";
    header("Location: password-change.php?token=$token&email=$email");
    exit (0); 
                
            }
        }

        else {
            
            $_SESSION['status'] = "All field are mandatory";
            $_SESSION['status_code'] = "info";
    header("Location: password-change.php?token=$token&email=$email");
    exit (0); 
        }
        
    }
    else {
        
        $_SESSION['status'] = "No token available";
        $_SESSION['status_code'] = "warning";
    header("Location: password-change.php");
    exit (0); 
    }
}




?>