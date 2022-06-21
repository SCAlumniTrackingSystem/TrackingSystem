<?php 
session_start();
include ('../includes/connection.php');


require ('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

/* BSIT export code block */
if(isset($_POST['export_excel_btn']))
{
	$file_ext_name = $_POST['export_file_type'];
	$fileName = "Survey-data-BSIT";

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '1' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run) > 0)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Department');
$sheet->setCellValue('C1', 'Course');
$sheet->setCellValue('D1', 'Batch');
$sheet->setCellValue('E1', 'Employment Status');
$sheet->setCellValue('F1', 'Position');
$sheet->setCellValue('G1', 'Company');
$sheet->setCellValue('H1', 'Year Employed');
$sheet->setCellValue('I1', 'Job Aligned');

$rowCount = 2;
foreach ($query_run as $data) {
	$sheet->setCellValue('A'.$rowCount, $data['name']);
	$sheet->setCellValue('B'.$rowCount, $data['dept']);
	$sheet->setCellValue('C'.$rowCount, $data['course']);
	$sheet->setCellValue('D'.$rowCount, $data['year']);
	$sheet->setCellValue('E'.$rowCount, $data['status']);
	$sheet->setCellValue('F'.$rowCount, $data['jobposition']);
	$sheet->setCellValue('G'.$rowCount, $data['company']);
	$sheet->setCellValue('H'.$rowCount, $data['yearemployed']);
	$sheet->setCellValue('I'.$rowCount, $data['align']);
	$rowCount++;

}
if ($file_ext_name == "xlsx") 
{
	$writer = new Xlsx($spreadsheet);
	$final_filename = $fileName.'.xlsx';
}
elseif ($file_ext_name == "xls") 
{
	$writer = new Xls($spreadsheet);
	$final_filename = $fileName.'.xls';
}
elseif ($file_ext_name == "csv") 
{
	$writer = new Csv($spreadsheet);
	$final_filename = $fileName.'.csv';
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');

$writer->save('php://output');
}
else
{
	$_SESSION['message'] = "No Record Found";
	header('Location: BSIT.php');
	exit(0);
}
}

if(isset($_POST['export_excel_btn_bscs']))
{
	$file_ext_name = $_POST['export_file_type'];
	$fileName = "Survey-data-BSCS";

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '2' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run) > 0)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Department');
$sheet->setCellValue('C1', 'Course');
$sheet->setCellValue('D1', 'Batch');
$sheet->setCellValue('E1', 'Employment Status');
$sheet->setCellValue('F1', 'Position');
$sheet->setCellValue('G1', 'Company');
$sheet->setCellValue('H1', 'Year Employed');
$sheet->setCellValue('I1', 'Job Aligned');

$rowCount = 2;
foreach ($query_run as $data) {
	$sheet->setCellValue('A'.$rowCount, $data['name']);
	$sheet->setCellValue('B'.$rowCount, $data['dept']);
	$sheet->setCellValue('C'.$rowCount, $data['course']);
	$sheet->setCellValue('D'.$rowCount, $data['year']);
	$sheet->setCellValue('E'.$rowCount, $data['status']);
	$sheet->setCellValue('F'.$rowCount, $data['jobposition']);
	$sheet->setCellValue('G'.$rowCount, $data['company']);
	$sheet->setCellValue('H'.$rowCount, $data['yearemployed']);
	$sheet->setCellValue('I'.$rowCount, $data['align']);
	$rowCount++;

}
if ($file_ext_name == "xlsx") 
{
	$writer = new Xlsx($spreadsheet);
	$final_filename = $fileName.'.xlsx';
}
elseif ($file_ext_name == "xls") 
{
	$writer = new Xls($spreadsheet);
	$final_filename = $fileName.'.xls';
}
elseif ($file_ext_name == "csv") 
{
	$writer = new Csv($spreadsheet);
	$final_filename = $fileName.'.csv';
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');

$writer->save('php://output');
}
else
{
	$_SESSION['message'] = "No Record Found";
	header('Location: BSCS.php');
	exit(0);
}
}

if(isset($_POST['export_excel_btn_bsp']))
{
	$file_ext_name = $_POST['export_file_type'];
	$fileName = "Survey-data-BSP";

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '3' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run) > 0)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Department');
$sheet->setCellValue('C1', 'Course');
$sheet->setCellValue('D1', 'Batch');
$sheet->setCellValue('E1', 'Employment Status');
$sheet->setCellValue('F1', 'Position');
$sheet->setCellValue('G1', 'Company');
$sheet->setCellValue('H1', 'Year Employed');
$sheet->setCellValue('I1', 'Job Aligned');

$rowCount = 2;
foreach ($query_run as $data) {
	$sheet->setCellValue('A'.$rowCount, $data['name']);
	$sheet->setCellValue('B'.$rowCount, $data['dept']);
	$sheet->setCellValue('C'.$rowCount, $data['course']);
	$sheet->setCellValue('D'.$rowCount, $data['year']);
	$sheet->setCellValue('E'.$rowCount, $data['status']);
	$sheet->setCellValue('F'.$rowCount, $data['jobposition']);
	$sheet->setCellValue('G'.$rowCount, $data['company']);
	$sheet->setCellValue('H'.$rowCount, $data['yearemployed']);
	$sheet->setCellValue('I'.$rowCount, $data['align']);
	$rowCount++;

}
if ($file_ext_name == "xlsx") 
{
	$writer = new Xlsx($spreadsheet);
	$final_filename = $fileName.'.xlsx';
}
elseif ($file_ext_name == "xls") 
{
	$writer = new Xls($spreadsheet);
	$final_filename = $fileName.'.xls';
}
elseif ($file_ext_name == "csv") 
{
	$writer = new Csv($spreadsheet);
	$final_filename = $fileName.'.csv';
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');

$writer->save('php://output');
}
else
{
	$_SESSION['message'] = "No Record Found";
	header('Location: BSP.php');
	exit(0);
}
}

if(isset($_POST['export_excel_btn_bstm']))
{
	$file_ext_name = $_POST['export_file_type'];
	$fileName = "Survey-data-BSTM";

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '4' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run) > 0)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Department');
$sheet->setCellValue('C1', 'Course');
$sheet->setCellValue('D1', 'Batch');
$sheet->setCellValue('E1', 'Employment Status');
$sheet->setCellValue('F1', 'Position');
$sheet->setCellValue('G1', 'Company');
$sheet->setCellValue('H1', 'Year Employed');
$sheet->setCellValue('I1', 'Job Aligned');

$rowCount = 2;
foreach ($query_run as $data) {
	$sheet->setCellValue('A'.$rowCount, $data['name']);
	$sheet->setCellValue('B'.$rowCount, $data['dept']);
	$sheet->setCellValue('C'.$rowCount, $data['course']);
	$sheet->setCellValue('D'.$rowCount, $data['year']);
	$sheet->setCellValue('E'.$rowCount, $data['status']);
	$sheet->setCellValue('F'.$rowCount, $data['jobposition']);
	$sheet->setCellValue('G'.$rowCount, $data['company']);
	$sheet->setCellValue('H'.$rowCount, $data['yearemployed']);
	$sheet->setCellValue('I'.$rowCount, $data['align']);
	$rowCount++;

}
if ($file_ext_name == "xlsx") 
{
	$writer = new Xlsx($spreadsheet);
	$final_filename = $fileName.'.xlsx';
}
elseif ($file_ext_name == "xls") 
{
	$writer = new Xls($spreadsheet);
	$final_filename = $fileName.'.xls';
}
elseif ($file_ext_name == "csv") 
{
	$writer = new Csv($spreadsheet);
	$final_filename = $fileName.'.csv';
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');

$writer->save('php://output');
}
else
{
	$_SESSION['message'] = "No Record Found";
	header('Location: BSTM.php');
	exit(0);
}
}


if(isset($_POST['export_excel_btn_bshm']))
{
	$file_ext_name = $_POST['export_file_type'];
	$fileName = "Survey-data-BSHM";

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '5' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run) > 0)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Department');
$sheet->setCellValue('C1', 'Course');
$sheet->setCellValue('D1', 'Batch');
$sheet->setCellValue('E1', 'Employment Status');
$sheet->setCellValue('F1', 'Position');
$sheet->setCellValue('G1', 'Company');
$sheet->setCellValue('H1', 'Year Employed');
$sheet->setCellValue('I1', 'Job Aligned');

$rowCount = 2;
foreach ($query_run as $data) {
	$sheet->setCellValue('A'.$rowCount, $data['name']);
	$sheet->setCellValue('B'.$rowCount, $data['dept']);
	$sheet->setCellValue('C'.$rowCount, $data['course']);
	$sheet->setCellValue('D'.$rowCount, $data['year']);
	$sheet->setCellValue('E'.$rowCount, $data['status']);
	$sheet->setCellValue('F'.$rowCount, $data['jobposition']);
	$sheet->setCellValue('G'.$rowCount, $data['company']);
	$sheet->setCellValue('H'.$rowCount, $data['yearemployed']);
	$sheet->setCellValue('I'.$rowCount, $data['align']);
	$rowCount++;

}
if ($file_ext_name == "xlsx") 
{
	$writer = new Xlsx($spreadsheet);
	$final_filename = $fileName.'.xlsx';
}
elseif ($file_ext_name == "xls") 
{
	$writer = new Xls($spreadsheet);
	$final_filename = $fileName.'.xls';
}
elseif ($file_ext_name == "csv") 
{
	$writer = new Csv($spreadsheet);
	$final_filename = $fileName.'.csv';
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');

$writer->save('php://output');
}
else
{
	$_SESSION['message'] = "No Record Found";
	header('Location: BSHM.php');
	exit(0);
}
}

if(isset($_POST['export_excel_btn_beed']))
{
	$file_ext_name = $_POST['export_file_type'];
	$fileName = "Survey-data-BEED";

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '6' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run) > 0)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Department');
$sheet->setCellValue('C1', 'Course');
$sheet->setCellValue('D1', 'Batch');
$sheet->setCellValue('E1', 'Employment Status');
$sheet->setCellValue('F1', 'Position');
$sheet->setCellValue('G1', 'Company');
$sheet->setCellValue('H1', 'Year Employed');
$sheet->setCellValue('I1', 'Job Aligned');

$rowCount = 2;
foreach ($query_run as $data) {
	$sheet->setCellValue('A'.$rowCount, $data['name']);
	$sheet->setCellValue('B'.$rowCount, $data['dept']);
	$sheet->setCellValue('C'.$rowCount, $data['course']);
	$sheet->setCellValue('D'.$rowCount, $data['year']);
	$sheet->setCellValue('E'.$rowCount, $data['status']);
	$sheet->setCellValue('F'.$rowCount, $data['jobposition']);
	$sheet->setCellValue('G'.$rowCount, $data['company']);
	$sheet->setCellValue('H'.$rowCount, $data['yearemployed']);
	$sheet->setCellValue('I'.$rowCount, $data['align']);
	$rowCount++;

}
if ($file_ext_name == "xlsx") 
{
	$writer = new Xlsx($spreadsheet);
	$final_filename = $fileName.'.xlsx';
}
elseif ($file_ext_name == "xls") 
{
	$writer = new Xls($spreadsheet);
	$final_filename = $fileName.'.xls';
}
elseif ($file_ext_name == "csv") 
{
	$writer = new Csv($spreadsheet);
	$final_filename = $fileName.'.csv';
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');

$writer->save('php://output');
}
else
{
	$_SESSION['message'] = "No Record Found";
	header('Location: BEED.php');
	exit(0);
}
}


if(isset($_POST['export_excel_btn_bsed']))
{
	$file_ext_name = $_POST['export_file_type'];
	$fileName = "Survey-data-BSED";

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '7' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run) > 0)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Department');
$sheet->setCellValue('C1', 'Course');
$sheet->setCellValue('D1', 'Batch');
$sheet->setCellValue('E1', 'Employment Status');
$sheet->setCellValue('F1', 'Position');
$sheet->setCellValue('G1', 'Company');
$sheet->setCellValue('H1', 'Year Employed');
$sheet->setCellValue('I1', 'Job Aligned');

$rowCount = 2;
foreach ($query_run as $data) {
	$sheet->setCellValue('A'.$rowCount, $data['name']);
	$sheet->setCellValue('B'.$rowCount, $data['dept']);
	$sheet->setCellValue('C'.$rowCount, $data['course']);
	$sheet->setCellValue('D'.$rowCount, $data['year']);
	$sheet->setCellValue('E'.$rowCount, $data['status']);
	$sheet->setCellValue('F'.$rowCount, $data['jobposition']);
	$sheet->setCellValue('G'.$rowCount, $data['company']);
	$sheet->setCellValue('H'.$rowCount, $data['yearemployed']);
	$sheet->setCellValue('I'.$rowCount, $data['align']);
	$rowCount++;

}
if ($file_ext_name == "xlsx") 
{
	$writer = new Xlsx($spreadsheet);
	$final_filename = $fileName.'.xlsx';
}
elseif ($file_ext_name == "xls") 
{
	$writer = new Xls($spreadsheet);
	$final_filename = $fileName.'.xls';
}
elseif ($file_ext_name == "csv") 
{
	$writer = new Csv($spreadsheet);
	$final_filename = $fileName.'.csv';
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');

$writer->save('php://output');
}
else
{
	$_SESSION['message'] = "No Record Found";
	header('Location: BSED.php');
	exit(0);
}
}

if(isset($_POST['export_excel_btn_bsbm']))
{
	$file_ext_name = $_POST['export_file_type'];
	$fileName = "Survey-data-BSBM";

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
    INNER JOIN registration on survey.registerID = registration.registerID
    INNER JOIN employment on survey.emID = employment.emID
    INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
    INNER JOIN jobalign on survey.jobID = jobalign.jobID
    INNER JOIN department on gradlist_tbl.deptID = department.deptID
    INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
    INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
    WHERE courses.courseID = '8' ORDER by survey_id asc ";
$query_run = mysqli_query($con,$query);

if(mysqli_num_rows($query_run) > 0)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Department');
$sheet->setCellValue('C1', 'Course');
$sheet->setCellValue('D1', 'Batch');
$sheet->setCellValue('E1', 'Employment Status');
$sheet->setCellValue('F1', 'Position');
$sheet->setCellValue('G1', 'Company');
$sheet->setCellValue('H1', 'Year Employed');
$sheet->setCellValue('I1', 'Job Aligned');

$rowCount = 2;
foreach ($query_run as $data) {
	$sheet->setCellValue('A'.$rowCount, $data['name']);
	$sheet->setCellValue('B'.$rowCount, $data['dept']);
	$sheet->setCellValue('C'.$rowCount, $data['course']);
	$sheet->setCellValue('D'.$rowCount, $data['year']);
	$sheet->setCellValue('E'.$rowCount, $data['status']);
	$sheet->setCellValue('F'.$rowCount, $data['jobposition']);
	$sheet->setCellValue('G'.$rowCount, $data['company']);
	$sheet->setCellValue('H'.$rowCount, $data['yearemployed']);
	$sheet->setCellValue('I'.$rowCount, $data['align']);
	$rowCount++;

}
if ($file_ext_name == "xlsx") 
{
	$writer = new Xlsx($spreadsheet);
	$final_filename = $fileName.'.xlsx';
}
elseif ($file_ext_name == "xls") 
{
	$writer = new Xls($spreadsheet);
	$final_filename = $fileName.'.xls';
}
elseif ($file_ext_name == "csv") 
{
	$writer = new Csv($spreadsheet);
	$final_filename = $fileName.'.csv';
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.urlencode($final_filename).'"');

$writer->save('php://output');
}
else
{
	$_SESSION['message'] = "No Record Found";
	header('Location: BSBM.php');
	exit(0);
}
}


?>

