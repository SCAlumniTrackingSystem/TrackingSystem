


<?php
session_start ();

include ('includes/connection.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function resend_email_verify($email,$verify_token,$fname)
{
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
   $mail->addAddress($email); 
   
   $mail->isHTML(true);                                  //Set email format to HTML
   $mail->Subject = 'Resend - Email Verification from Cvsu Alumni Tracking System';
   
   $email_template = "<h2>You have Registered with Cvsu Alumni Tracking System</h2>
   <h3>Looks like the previous verification has not been sent to you. Please click the button below to verify your email. </h3>
   <br>
   <a href = 'http://localhost/alumnitracer/verify-email.php?token=$verify_token'> <button type='button' style='background-color: #6FE358; color: white; border: none; padding: 15px 32px; text-align: center; font-size: 16px;' >Verify Now!</button> </a>
   ";
   $mail->Body = $email_template;
   $mail->send();
   echo 'Message has been sent';

}

if (isset($_POST['resend_email_verify_btn'])) {
    if (!empty(trim($_POST['email']))) {
        $email = mysqli_real_escape_string($con, $_POST['email']);

        $checkemail_query = "SELECT  * FROM registration WHERE email = '$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($con, $checkemail_query);

        if (mysqli_num_rows($checkemail_query_run) > 0) {
            $row = mysqli_fetch_array($checkemail_query_run);

            if ($row['verify_status'] == "0") {

                $email = $row['email'];
                $verify_token = $row['verify_token'];

                resend_email_verify($email,$verify_token,$fname);
                $_SESSION['status'] = "Verification Email Link has sent to your Email";
                $_SESSION['status_code'] = "success";
                header("Location: login.php");
                exit (0); 
            }
            else {
                $_SESSION['status'] = "Email is already verified. Please Login";
                $_SESSION['status_code'] = "info";
                header("Location: resend-email-verification.php");
                exit (0); 
            }
        }
        else {
            $_SESSION['status'] = "Email is not registered. check your Student Number";
            $_SESSION['status_code'] = "warning";
            header("Location: validating.php");
            exit (0); 
            
        }
    }
    else {
        $_SESSION['status'] = "Please Enter Email Field";
        $_SESSION['status_code'] = "warning";
        header("Location: resend-email-verification.php");
        exit (0); 
        
    }
}



?>

