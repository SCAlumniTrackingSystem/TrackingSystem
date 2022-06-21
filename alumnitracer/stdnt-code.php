<?php 
session_start();
include ('includes/connection.php');


if (isset($_POST['send'])) {
    $stnt = $_POST ['snum'];
    $fname = $_POST ['fname'];
    $MI = $_POST ['MI'];
    $lname = $_POST ['lname'];
    $deptID = $_POST ['deptID'];
    $crsID = $_POST ['courseID'];
    $btchID = $_POST ['batchID'];

    $check_snum = "SELECT studentno FROM request WHERE studentno = '$stnt' LIMIT 1";
    $check_snum_run = mysqli_query ($con, $check_snum);

    if (mysqli_num_rows($check_snum_run) > 0 ) {
        $_SESSION ['status'] = "Studentnumber already exist";
        $_SESSION['status_code'] = "warning";
header("Location: studentlist.php");
    }
    else {
        $query = "INSERT INTO `request`(`ID`, `studentno`, `fname`, `midint`, `lname`, `deptID`, `courseID`, `batchID`) VALUES 
        ('','$stnt','$fname','$MI','$lname','$deptID','$crsID','$btchID')";
        $query_run = mysqli_query ($con, $query);

        if ($query_run) {
            $_SESSION ['status'] = "Successfully request to insert";
            $_SESSION['status_code'] = "success";
	header("Location: validating.php");
    exit (0);

        }
        else {
            $_SESSION ['status'] = "Failed";
            $_SESSION['status_code'] = "error";
	header("Location: studentlist.php");

        }
    }

}

?>