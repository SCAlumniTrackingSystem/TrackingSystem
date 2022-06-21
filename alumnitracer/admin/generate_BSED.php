<?php

//BSTM PDF
require_once('../TCPDF-main/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {
    public function Header(){
        $imageFile = K_PATH_IMAGES.'logo.png';
        $this->Image($imageFile, 95, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $this->Ln(5);
        $this->SetFont('helvetica','B', 12);
        $this->Cell(300, 5, 'Cavite State University-Silang Campus', 0, 1, 'C');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(300, 5,'Alumni Tracking Report',0,1,'C');


    }

    public function Footer(){
        date_default_timezone_set("Asia/Singapore");
        $today = date("F j, Y/ g:i A", time());

        $this->Cell(25,5, ''.$today,0,0,'L');
        $this->Cell(164, 5, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(),0, false, 'R', 0, '', 0, false, 'T', 'M');

    }

    // Load table data from file
    public function LoadData() {
        include ('../includes/connection.php');
        $query = "SELECT  * , CONCAT (firstname, ' ' , middle ,' ',lastname) AS name FROM survey
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN employment on survey.emID = employment.emID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN jobalign on survey.jobID = jobalign.jobID
INNER JOIN department on gradlist_tbl.deptID = department.deptID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID 
WHERE courses.courseID = '7' ORDER by survey_id asc";
$query_run = mysqli_query($con,$query);
return $query_run;
       
    }

    // Colored table
    public function ColoredTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(128, 0, 0);
      
        $this->SetLineWidth(0.3);
        $this->setCellHeightRatio(0.85);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 45, 15, 35, 30, 30, 35, 27, 28);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 0);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;

        foreach($data as $row) {
            $this->MultiCell($w[0], 8, $row["name"], 1, 'C', 0, 0, '', '', true, $fill);
            $this->MultiCell($w[1], 8, $row["dept"],  1, 'C', 0, 0, '', '', true, $fill);
            $this->MultiCell($w[2], 8, $row["year"],  1, 'C', 0, 0, '', '', true, $fill);
            $this->MultiCell($w[3], 8, $row["status"],  1, 'C', 0, 0, '', '', true, $fill);
            $this->MultiCell($w[4], 8, $row["jobtitle"],  1, 'C', 0, 0, '', '', true, $fill);
            $this->MultiCell($w[5], 8, $row["jobposition"],  1, 'C', 0, 0, '', '', true, $fill);
            $this->MultiCell($w[6], 8, $row["company"],  1, 'C', 0, 0, '', '', true, $fill);
            $this->MultiCell($w[7], 8, $row["yearemployed"],  1, 'C', 0, 0, '', '', true, $fill);
            $this->MultiCell($w[8], 8, $row["align"],  1, 'C', 0, 0, '', '', true, $fill);
            
            

           
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF('l', 'mm', 'A4', PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR); 
$pdf->SetAuthor('cvsu-sc');
$pdf->SetTitle('CAVITE STATE UNIVERSITY - SILANG CAMPUS');
$pdf->SetSubject('');
$pdf->SetKeywords('');


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

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

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);
$pdf->SetMargins(8, 25, 10, true);
// add a page
$pdf->AddPage();

$pdf->SetFont('times', 'B',10);
        $pdf->Cell(300, 15, 'BSED Alumni Employment Report',0,1,'C');
        $pdf->Ln(3);

// column titles
$header = array('Name', 'Department', 'Batch', 'Employment Status', 'Job Title', 'Job Position', 'Company', 'Year Employed', 'Job Alignment');

// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('BSED Employment Report.pdf', 'I');

?>

