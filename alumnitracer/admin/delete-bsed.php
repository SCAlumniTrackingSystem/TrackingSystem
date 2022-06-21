<?php 
//session_start();
include ('../includes/connection.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require ('../vendor/autoload.php');

function data_delete ($get_email,$get_fname,$token){

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
   $mail->Subject = 'Data Deleted';
   
   $email_template = "<h2>Survey Deleted</h2>
   <h3>You receive this email because your answered survey form data has been delete/reset, we found out that your answers in survey form was not valid. Please Log in your account and answer again</h3>
   <br><br>
   
   ";
   $mail->Body = $email_template;
   $mail->send();
   echo 'Message has been sent';


}

if(isset($_POST['delete_btn_set'])){

	$email = mysqli_real_escape_string($con, $_POST['email']);
$token =md5(rand());

$check_email = "SELECT email FROM registration WHERE email = '$email' LIMIT 1";
$check_email_run = mysqli_query($con, $check_email);

if (mysqli_num_rows($check_email_run) > 0) {
$row = mysqli_fetch_array($check_email_run); 
$get_fname = $row['fname'];
$get_email = $row['email'];

	$id = $_POST['delete_id'];
	$query = "DELETE survey FROM survey INNER JOIN registration on survey.registerID = registration.registerID 
    WHERE survey_id ='$id' and registration.email='$get_email'";
	$query_run = mysqli_query($con, $query);

	if($query_run)
	{
		data_delete ($get_email,$get_fname,$token);
		// $_SESSION['status'] = "Data has been deleted";
          //  header("Location: srv-BSED.php");
          //  exit (0); 
	}
	else{
		// $_SESSION['status'] = "Data not deleted";
          //  header("Location: srv-BSED.php");
          //  exit (0); 
	}
}
}


 ?>