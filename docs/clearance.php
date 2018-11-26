<?php
require_once('../library/examples/tcpdf_include.php');
require_once('../library/tcpdf.php');
require_once('../fpdf17/fpdf.php');
require_once('../includes/action.inc.php');

session_start();

isset($_SESSION['id']);
$id= $_SESSION['id'];

$sql = "SELECT * FROM residents INNER JOIN homeaddress
ON residents.user_ID = homeaddress.id
WHERE residents.user_ID = '".$id."'";

$result = mysqli_query($conn,$sql);

$tDate = date("F j, Y");

class MYPDF extends TCPDF
{
    public function Header()
    {
        $this->Image('logo.circle.png',35,15,30,'','PNG','','T',false,300,'',false,false,0,false,false,false);
        $this->Image('logo1.png',150,15,30,'','PNG','','T',false,300,'',false,false,0,false,false,false);
        $this->Image('image.png',10,70,190,190, '', '', '', false, 300, '', false, false, 0);
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
$pdf->SetTitle('Barangay Clearance');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetAutoPageBreak(TRUE,PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

if (@file_exists(dirname(__FILE__).'/lang/eng.php'))
{
    require_once(dirname(__FILE__).'lang/eng.php');
    $pdf->SetLanguageArray($l);
}

$pdf->AddPage();
if (mysqli_num_rows($result)>0)
{
while ($invoice = mysqli_fetch_array($result))
{

$pdf->SetFont('Times','B',12);
$html = <<<EOD
<h1>OFFICE OF THE SANGGUNIANG BARANGAY&nbsp;</h1>
<h1>BARANGAY CLEARANCE</h1>
EOD;
$pdf->writeHTMLCell(0,0,25,55,$html,0,1,0,true,'C',true);

$pdf->Cell(145,5,'',0,0);
$pdf->Cell(25,5,' '.$tDate,0,0);

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

$pdf->SetFont('Times','',12);
$html = <<<EOD
<p><b>Date:</b></p>
<p>Control No. :</p>
EOD;
$pdf->writeHTMLCell(0,0,135,75,$html,0,1,0,true,'C',true);

$html = <<<EOD
<b>To whom it may concern:</b><br><br>
This is to certify that &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
years of age,Filipino citizen and whose specimen signature appears below, is a resident of
EOD;
$pdf->Cell(0,8,'',0,1);
$pdf->Cell(80,10,'',0,0);
$pdf->Cell(40,8,'    '.$invoice['Prefix'].' '.$invoice['FirstName'].' '.$invoice['MiddleName'].' '.$invoice['LastName'].' '.$invoice['Suffix'],0,0,'');
$pdf->Cell(10,8,$invoice['Age'],0,1,'C');
$pdf->Cell(0,5,'',0,1);
$pdf->Cell(45,10,'',0,0);
$pdf->Cell(72,10,' '.$invoice['lot'].' '.$invoice['street'].' '.$invoice['subdivision'].' '.$invoice['barangay'],0,1);
$pdf->writeHTMLCell(0,0,70,90,$html,0,1,0,true,'',true);
$html = <<<EOD
<br>
<p>That he/she had no derogatory records on file with this Barangay.</p>
<p>That he/she is know to the community to be of good moral character, peaceful and law-abiding citizen.</p>
EOD;
$pdf->writeHTMLCell(0,0,70,115,$html,0,1,0,true,'J',true);

$pdf->Cell(0,23,'',0,1);
$pdf->Cell(55,14,'',0,0);
$pdf->Cell(60,17,'',0,1);//purpose

$html = <<<EOD
<p>This <b>CERTIFICATION</b> is issued upon the request of the above named for the purpose stated below.</p>
<p>For  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> Purpose</b> only</p>
EOD;
$pdf->writeHTMLCell(0,0,70,160,$html,0,1,0,true,'J',true);

$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(70,10,'',0,0);
$pdf->Cell(40,10,'',0,1);//cert.no

$html = <<<EOD
<p>Specimen Signature</p>
EOD;
$pdf->writeHTMLCell(0,0,78,195,$html,0,1,0,true,'',true);
$pdf->SetFont('','',11);
$pdf->writeHTMLCell(25,20,130,194,'Left Thumb mark',1,1,0,true,'C',true);
$pdf->writeHTMLCell(25,20,160,194,'Right Thumb mark',1,1,0,true,'C',true);

$pdf->Cell(60,12,'',0,0);
$pdf->Cell(60,15,$tDate,0,0);

$pdf->SetFont('','',12);
$html = <<<EOD
<p><b>Res.Cert.No.:_________________</b></p>
EOD;
$pdf->writeHTMLCell(0,0,71,212,$html,0,1,0,true,'',true);

$html = <<<EOD
<p><b>On:________________________</b></p>
EOD;
$pdf->writeHTMLCell(0,0,71,220,$html,0,1,0,true,'',true);

$pdf->writeHTMLCell(0,0,71,233,'Certified true and correct:',0,1,0,true,'',true);

$pdf->writeHTMLCell(0,0,73,248,'Barangay Secretary',0,1,0,true,'',true);
$pdf->SetFont('','B',12);
$pdf->writeHTMLCell(0,0,71,243,'RONALD C. GUEVARA',0,1,0,true,'',true);

$pdf->writeHTMLCell(0,0,140,233,'APPROVED by:',0,1,0,true,'',true);
$pdf->writeHTMLCell(0,0,140,243,'HON. MARVIN T. ALINDOG',0,1,0,true,'',true);

$pdf->SetFont('','',12);
$pdf->writeHTMLCell(0,0,153,248,'Punong Barangay',0,1,0,true,'',true);

$pdf->SetFont('','B',10);
$html = <<<EOD
<p>Note: This CERTIFICATE is valid for ninety(90) days only after the date issuance.</p>
EOD;
$pdf->writeHTMLCell(0,0,71,260,$html,0,1,0,true,'',true);

$html = <<<EOD
<p>This CERTIFICATE is NOT VALID without the DRY SEAL of the Barangay.</p>
EOD;
$pdf->writeHTMLCell(0,0,75,263,$html,0,1,0,true,'',true);

$pdf->Line(71,194,120,194);
$pdf->SetLineWidth(2);
$pdf->Line(5,65,200,65);
$pdf->Line(65,65,65,275);

$pdf->Output('barangay clearance.pdf','I');
}}
?>