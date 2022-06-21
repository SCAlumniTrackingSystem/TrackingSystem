<?php
session_start ();

if(!isset($_SESSION['authenticated'])){
$_SESSION['status'] = "Please login to acces Home Page";
$_SESSION['status_code'] = "warning";
header('Location: login.php');
exit(0);

}


?>