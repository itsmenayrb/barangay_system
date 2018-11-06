<?php
require_once('../library/examples/tcpdf_include.php');
require_once('../library/tcpdf.php');
class MYPDF extends TCPDF
{
    public function Header()
    {
        //logo
        $image_file = K_PATH_IMAGES. 'logo.circle.png';
        $this->Image($image_file,35,15,30,'','PNG','','T',false,300,'',false,false,0,false,false,false);
        $image_file = K_PATH_IMAGES. 'logo1.png';
        $this->Image($image_file,150,15,30,'','PNG','','T',false,300,'',false,false,0,false,false,false);

        //font
        $this->SetFont('Times','B',12,'');

        $this->Cell(0, 10, '', 0, 1, 'C', 0, '', 0, false, 'M', 'M');//dummy cell
		$this->Cell(0, 10, 'Republic of the Philippines', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 10, 'Province of Cavite', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 25, 'City of Dasmariñas', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 10, 'BARANGAY SALITRAN II', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 7, 'Tel.No.(046)540-5804', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		
    }//end of header()


}//end of class


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetTitle('Barangay Certification');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetAutoPageBreak(TRUE,PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

if (@file_exists(dirname(__FILE__).'/lang/eng.php'))
{//begin if
    require_once(dirname(__FILE__).'lang/eng.php');
    $pdf->SetLanguageArray($l);
}//end if

$pdf->AddPage();

$image_file = K_PATH_IMAGES.'image.png';
$pdf->Image($image_file,15,350,150,155,'PNG','','T',false,300,'C',false,false,0,false,false,false);


$pdf->SetFont('Times','B',10);
$html = <<<EOD
<h1>OFFICE OF THE SANGGUNIANG BARANGAY</h1>
EOD;
$pdf->writeHTMLCell(0,0,15,55,$html,0,1,0,true,'C',true);

$pdf->SetFont('Times','B',16);
$html = <<<EOD
<h1><u>CERTIFICATION</u></h1>
EOD;
$pdf->writeHTMLCell(0,0,25,75,$html,0,1,0,true,'C',true);

$pdf->SetFont('','',16);
$pdf->writeHTMLCell(0,0,30,90,'To whom it may concern:',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,40,110,'This is to certify that',0,1,0,true,'',true);
//$pdf->writeHTMLCell(0,0,45,110,(name),0,1,0,true,'',true); //<<<<<<<<<<<<<<<<<<<<<<<<<<<


$html = <<<EOD
(name) is a resident of barangay Salitran II with known address at
EOD;
$pdf->writeHTMLCell(0,0,30,120,$html,0,1,0,true,'',true);

$html = <<<EOD
Subject is known to be of good moral character and law-abiding citizen.
EOD;
$pdf->writeHTMLCell(0,0,30,140,$html,0,1,0,true,'',true);

$html = <<<EOD
This <b>CERTIFICATION</b> is being issued upon the request of (name) for (purpose) purposes only.
EOD;
$pdf->writeHTMLCell(0,0,30,150,$html,0,1,0,true,'',true);

$html = <<<EOD
Issued this (date) at Barangay Salitran II, Dasmariñas City, Cavite.
EOD;
$pdf->writeHTMLCell(0,0,30,170,$html,0,1,0,true,'',true);

$pdf->writeHTMLCell(0,0,120,200,'Certified by:',0,1,0,true,'C',true);

$html = <<<EOD
<b><u>HON. MARVIN T. ALINDOG</u></b>
EOD;
$pdf->writeHTMLCell(0,0,120,210,$html,0,1,0,true,'',true);
$pdf->writeHTMLCell(0,0,120,215,'Punong Barangay',0,1,0,true,'',true);


$pdf->Output('barangaycert.pdf','I');
?>