<?php
session_start ();

if(!isset($_SESSION['authenticated'])){
$_SESSION['status'] = "Please login to acces Dashboard";
header('Location: index.php');
$_SESSION['status_code'] = "warning";
exit(0);

}


?>