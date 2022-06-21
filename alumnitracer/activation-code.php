<?php
session_start ();

include ('includes/connection.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';
function sendemail_verify($email,$verify_token,$fname){
    
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
$mail->Subject = 'Email Verification from Cvsu Alumni Tracking System';

$email_template = "<h2>You have Registered with Cvsu Alumni Tracking System</h2>
<h3>Thank you for registering an account on CvSU - Silang Campus Alumni Tracking! To verify your account, please click the button below. </h3>
<br><br>
<a href = 'http://localhost/alumnitracer/verify-email.php?token=$verify_token'> <button type='button' style='background-color: #6FE358; color: white; border: none; padding: 15px 32px; text-align: center; font-size: 16px;' >Verify Now!</button></a>
";
$mail->Body = $email_template;
$mail->send();
echo 'Message has been sent';

}
if (isset($_POST['Activate'])) {
$id = $_SESSION['grad_ID'];

$stntid =$_POST["snum"];
    $fname = $_POST["fname"];
    $MI = $_POST["MI"];
    $lname = $_POST["lname"];

    $deptID = $_POST["deptID"];
    

    $courseID = $_POST["courseID"];
 

    $batchID = $_POST["batchID"];

$gender = $_POST['gender'];
$bday = $_POST['bday'];
$add = $_POST['add'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass =$_POST['pass'];
$pass = MD5 ($pass);
$verify_token = md5(rand());

$check_email_query = "SELECT email FROM registration WHERE email = '$email' LIMIT 1";
$check_email_query_run = mysqli_query ($con, $check_email_query);

if (mysqli_num_rows($check_email_query_run) > 0) {
$_SESSION ['status'] = "EMAIL ID already exist";
$_SESSION['status_code'] = "info";
header("Location: account_activation.php");
exit(0);
}

else
{
$query = "INSERT INTO `registration`(`registerID`, `grad_ID`, `gender`, `birthday`, `address`, `phone`, `email`, `password`, `verify_token`) VALUES 
('',(SELECT grad_ID FROM gradlist_tbl WHERE grad_ID = '$id'),'$gender','$bday','$add', '$phone', '$email','$pass', '$verify_token')";
$query_run = mysqli_query($con, $query);
if ($query_run)
 {
 	sendemail_verify( "$email", "$verify_token","$fname");
	$_SESSION ['status'] = "Activation Successful! Please Verify your EMAIL";
    $_SESSION['status_code'] = "success";
	header("Location: login.php");
    exit(0);

}
else{
	$_SESSION ['status'] = "Activation Failed";
    $_SESSION['status_code'] = "error";
	header("Location: account_activation_form.php");
    exit(0);

}

}

}




?>
