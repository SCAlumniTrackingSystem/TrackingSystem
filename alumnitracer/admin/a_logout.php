<?php
session_start();

unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);
$_SESSION['status'] = "Admin Logged out ";
$_SESSION['status_code'] = "success";
header("Location: index.php");


?>