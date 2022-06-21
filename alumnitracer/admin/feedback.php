<?php 
session_start();
include ('../includes/connection.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require ('../vendor/autoload.php');

function data_delete ($get_email){

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
   $mail->Subject = 'Feedback';
   
   $email_template = "<h2>Feedback Notice</h2>
   <h3>Thank You for sending us your complains or feedback</h3>
   <br><br>
   
   ";
   $mail->Body = $email_template;
   $mail->send();
   echo 'Message has been sent';


}

if(isset($_POST['accept'])){

	$email = mysqli_real_escape_string($con, $_POST['email']);
$check_email = "SELECT email FROM complain WHERE email = '$email' LIMIT 1";
$check_email_run = mysqli_query($con, $check_email);

if (mysqli_num_rows($check_email_run) > 0) {
    $row = mysqli_fetch_array($check_email_run); 
    $get_fname = $row['fname'];
    $get_email = $row['email'];

	if($check_email_run)
	{
		data_delete ($get_email);
		$_SESSION['status'] = "Sent Notice";
        $_SESSION['status_code'] = "success";
           header("Location: complains.php");
           exit (0); 
	}
	else{
		 $_SESSION['status'] = "Data not deleted";
         $_SESSION['status_code'] = "error";
          header("Location: complains.php");
           exit (0); 
	}

}
}

 ?>