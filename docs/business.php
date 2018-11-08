<?php
require_once('../library/examples/tcpdf_include.php');
require_once('../library/tcpdf.php');
class MYPDF extends TCPDF
{
    public function Header()
    {
        //logo
       //$image_file = K_PATH_IMAGES. 'logo.circle.png';
        $this->Image('logo.circle.png',35,15,30,'','PNG','','T',false,300,'',false,false,0,false,false,false);
      //  $image_file = K_PATH_IMAGES. 'logo1.png';
        $this->Image('logo1.png',150,15,30,'','PNG','','T',false,300,'',false,false,0,false,false,false);
        $this->Image('image.png',10,70,190,190, '', '', '', false, 300, '', false, false, 0);
        //font
        $this->SetFont('Times','B',12,'');

        $this->Cell(0, 10, '', 0, 1, 'C', 0, '', 0, false, 'M', 'M');//dummy cell
		$this->Cell(0, 10, 'Republic of the Philippines', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 10, 'Province of Cavite', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 25, 'City of Dasmariñas', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 10, 'BARANGAY SALITRAN II', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 7, 'Tel.No.(046)540-5804', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		
    }


}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetTitle('Business Clearance');
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
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
//$image_file = K_PATH_IMAGES.'image.png'; 
//$pdf->Image($image_file,15,400,190,195,'PNG','','T',false,300,'C',false,false,0,false,false,false);

$pdf->SetFont('Times','B',12);
$html = <<<EOD
<h1>OFFICE OF THE SANGGUNIANG BARANGAY&nbsp;</h1>
<h1>BUSINESS CLEARANCE</h1>
EOD;
$pdf->writeHTMLCell(0,0,25,55,$html,0,1,0,true,'C',true);

$pdf->SetFont('Times','B',12);
$pdf->writeHTMLCell(0,0,5,75,'Hon. Marvin T. Alindog',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,90,'Hon. Edgar Allan Herrera',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,105,'Hon. Alfin Bautista',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,120,'Hon.Leticia Sarreal',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,135,'Hon. Dexter Ilano',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,150,'Hon. Roland Cardoza',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,165,'Hon. Florencio Beley',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,180,'Hon. Jefferson Borela',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,200,'Mr. Benito Sayoto',0,1,0,true,'L',true);

$pdf->SetFont('Times','I',12);
$pdf->writeHTMLCell(0,0,5,80,'Punong Barangay',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,95,'Sangguniang Barangay Member',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,110,'Sangguniang Barangay Member',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,125,'Sangguniang Barangay Member',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,140,'Sangguniang Barangay Member',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,155,'Sangguniang Barangay Member',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,170,'Sangguniang Barangay Member',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,185,'Barangay Treasurer',0,1,0,true,'L',true);
$pdf->writeHTMLCell(0,0,5,205,'Barangay Secretary',0,1,0,true,'L',true);

$pdf->SetFont('Times','',13);
$html = <<<EOD
<p>Control No. : </p>
EOD;
$pdf->writeHTMLCell(0,0,150,75,$html,0,1,0,true,'C',true);

$html = <<<EOD
<p><b>To whom it may concern:</b></p>
<p align="Left">This is to certify that the Business or Trade described below :&nbsp;</p>
<p></p>
<p align="center"><i>&nbsp;Business Name/Trade</i>&nbsp;</p>
<p></p>
<p align="center"><i>&nbsp;Location</i>&nbsp;</p>
<p></p>
<p align="center"><i>&nbsp;Operator</i>&nbsp;</p>
EOD;
$pdf->writeHTMLCell(0,0,70,90,$html,0,1,0,true,'',true);

$html = <<<EOD
Proposed to be established in the Barangay and is being applied for
RENEWAL/NEW Business Permit has been APPROVED and interposes
no objection for the issuance of MAYOR'S PERMIT being applied for :
EOD;
$pdf->writeHTMLCell(0,0,70,165,$html,0,1,0,true,'J',true);

$html = <<<EOD
Issued this day of , at Barangay Hall Salitran II, City of
Dasmariñas, Cavite.
EOD;
$pdf->writeHTMLCell(0,0,70,195,$html,0,1,0,true,'J',true);

$pdf->writeHTMLCell(0,0,71,233,'Certified true and correct:',0,1,0,true,'',true);

$pdf->writeHTMLCell(0,0,73,248,'Barangay Secretary',0,1,0,true,'',true);
$pdf->SetFont('','B',12);
$pdf->writeHTMLCell(0,0,71,243,'RONALD C. GUEVARA',0,1,0,true,'',true);

$pdf->writeHTMLCell(0,0,140,233,'APPROVED by:',0,1,0,true,'',true);
$pdf->writeHTMLCell(0,0,140,243,'HON. MARVIN T. ALINDOG',0,1,0,true,'',true);

$pdf->SetFont('','',12);
$pdf->writeHTMLCell(0,0,153,248,'Punong Barangay',0,1,0,true,'',true);

$pdf->SetLineWidth(2);
$pdf->Line(5,65,200,65);
$pdf->Line(65,65,65,275);


$pdf->Output('barangay business.pdf','I');
?>