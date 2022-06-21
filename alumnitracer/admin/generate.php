<?php 

require_once('../TCPDF-main/tcpdf.php');
include ('../includes/connection.php');

if (isset($_GET['generate'])) {
	$frmDate = $_GET['frmDate'];
	$clientCode = $_GET['clentCode'];

	$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN employment on survey.emID = employment.emID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN jobalign on survey.jobID = jobalign.jobID
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
WHERE courses.courseID = '4' ORDER by survey_id asc";
$query_run = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($query_run)) {
	$name = $row['name'];
	$dep = $row['dept'];
	$crs = $row['course'];
	$bth = $row['year'];
	$emp = $row['status'];
	$jobt = $row['jobtitle'];
	$jobp = $row['jobposition'];
	$com = $row['name'];
	$name = $row['name'];
	$yr = $row['yearemployed'];
	$joba = $row['align'];


}

}
/**
 * 
 */
class PDF extends TCPDF
{
	
	public function Header(){
		$imageFile = K_PATH_IMAGES.'logo.png';
		$this->Image($imageFile, 40, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

		$this->Ln(5);
		$this->SetFont('helvetica','B', 12);
		$this->Cell(189, 5, 'Cavite State University-Silang Campus', 0, 1, 'C');
		$this->SetFont('helvetica', '', 8);
		$this->Cell(189,3,'Alumni Tracking Report',0,1,'C');


	}

	public function Footer(){
		date_default_timezone_set("Asia/Singapore");
		$today = date("F j, Y/ g:i A", time());

		$this->Cell(25,5, ''.$today,0,0,'L');
		$this->Cell(164, 5, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(),0, false, 'R', 0, '', 0, false, 'T', 'M');

	}


}

//create new pdf document
$pdf = new PDF('l', 'mm', 'LETTER WIDE', PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('cvsu-sc');
$pdf->SetTitle('CAVITE STATE UNIVERSITY - SILANG CAMPUS');
$pdf->SetSubject('');
$pdf->SetKeywords('');


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.


		$query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
		INNER JOIN registration on survey.registerID = registration.registerID
		INNER JOIN employment on survey.emID = employment.emID
		INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
		INNER JOIN jobalign on survey.jobID = jobalign.jobID
		INNER JOIN department on gradlist_tbl.deptID = department.deptID
		INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
		INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
		WHERE courses.courseID = '4' ORDER by survey_id asc";
		$query_run = mysqli_query($con,$query);

		$i = 1;
		$max = 9;

			while ($row = mysqli_fetch_array($query_run)) {
			$name = $row['name'];
			$dep = $row['dept'];
			$crs = $row['course'];
			$bth = $row['year'];
			$emp = $row['status'];
			$jobt = $row['jobtitle'];
			$jobp = $row['jobposition'];
			$com = $row['name'];
			$name = $row['name'];
			$yr = $row['yearemployed'];
			$joba = $row['align'];


}

	if(($i%$max) == 0){
		$pdf->AddPage();

        $pdf->SetFont('times', 'B',10);
		$pdf->Cell(189, 5, 'BSTM Alumni Employment Status',0,1,'C');
		$pdf->Ln(3);

		$pdf->SetFillColor(224, 235, 255);
		$pdf->Cell(55, 5, 'Name', 1, 0 ,'C', 1);
		$pdf->Cell(55, 5, 'Department', 1, 0 ,'C', 1);
		$pdf->Cell(20, 5, 'Batch', 1, 0 ,'C', 1);
		$pdf->Cell(33, 5, 'Employment Status', 1, 0 ,'C', 1);
		$pdf->Cell(20, 5, 'Job Title', 1, 0 ,'C', 1);
		$pdf->Cell(25, 5, 'Job Position', 1, 0 ,'C', 1);
		$pdf->Cell(20, 5, 'Company', 1, 0 ,'C', 1);
		$pdf->Cell(35, 5, 'Year Employed', 1, 0 ,'C', 1);
		$pdf->Cell(20, 5, 'Job Alignment', 1, 0 ,'C', 1);
		$pdf->SetFont('times', '',10);
	}


// Close and output PDF document
$pdf->Output('example_001.pdf', 'I');
 ?>