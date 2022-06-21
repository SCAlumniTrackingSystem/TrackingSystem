<?php 
session_start();

include ('../includes/connection.php');



require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['import_file_btn']))
{
    $allowed_ext = ['xls' , 'csv' , 'xlsx'];
    $fileName =$_FILES['import']['name'];
    $checking = explode(".", $fileName);
    $file_ext = end($checking);

if (in_array($file_ext, $allowed_ext)) {
 $inputFileName = $_FILES['import']['tmp_name'];
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$data = $spreadsheet->getActiveSheet()->toArray();


$count = "0";
foreach($data as $row)
{
    
    if ($count > 0) {
    $studentnumber = $row['0'];
    $fname = $row['1'];
    $MI = $row['2'];
    $lname = $row['3'];
    $deptID = $row['4'];
    $courseID = $row['5'];
    $batchID = $row['6'];
     
  $query = "INSERT INTO `gradlist_tbl`(`grad_ID`, `studentnumber`, `firstname`, `middle`, `lastname`, `deptID`, `courseID`, `batchID`) VALUES ('','$studentnumber','$fname','$MI','$lname',(SELECT deptID FROM department WHERE dept = '$deptID'),(SELECT courseID FROM courses WHERE course = '$courseID'),(SELECT batchID FROM batch WHERE year = $batchID)) ";
  $query_run = $con->query($query) or die($con->error);
  $msg = true;
    }
  
  else {
    $count = "1";
}


}
if (isset($msg)) {
    $_SESSION ['status'] = "Successfully Imported";
    $_SESSION['status_code'] = "success";
    header("Location: addpost.php");
    exit(0);
}
else {
    
    $_SESSION ['status'] = "Failed to Import";
    $_SESSION['status_code'] = "error";
    header("Location: addpost.php");
    exit(0);
}

    }
    else {
        $_SESSION ['status'] = "Invalid File";
        $_SESSION['status_code'] = "warning";
        header("Location: addpost.php");
        exit(0);
    }
}

?>