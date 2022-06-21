<?php
session_start();

unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);
$_SESSION['status'] = "You Logged out ";
$_SESSION['status_code'] = "success";
header("Location: login.php");


?>