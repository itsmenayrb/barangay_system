<?php
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo.circle.png';
		$this->Image($image_file, 25, 15, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$image_file = K_PATH_IMAGES.'logo1.png';
		$this->Image($image_file, 150, 15, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('Times', 'B', 10);
		// Title
		$this->Cell(0, 10, '', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 10, 'Republic of the Philippines', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 10, 'Province of Cavite', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 25, 'City of Dasmariñas', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 10, 'BARANGAY SALITRAN II', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		$this->Cell(0, 7, 'Tel.No.(046)540-5804', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
		
		
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('Times', 'B', 8);
		// Page number
		$this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');//dummyfooter
	}
}
//connect to db
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'barangay');

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Barangay Certificate');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
$pdf->SetFont('times', 'B', 17);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
CERTIFICATION
EOD;

// print a block of text using Write()
$pdf->Write(65,$txt, '', 0, 'C', true, 0, false, false, 0);
//set font
$pdf->SetFont('times','',14);
//new txt
$pdf->Text(20,80,'To whom it may concern:', false, false, true, 0, 1, 'L', false, 0, 'L','C',true);
//new txt
$pdf->Text(40,90,'This is to certify', false, false, true, 0, 0, 'L', false, 0, 'B','C',true);

//query to call data
$query=mysqli_query($con,"select * from residents");
// NOTE : CREATE LOOP TO ADJUST X COORD STUDY GETSTRINGWIDTH IF INTERNET=TRUE
while ($data=mysqli_fetch_array($query))

{
			foreach($data as $item)
			{
				$pdf->Text(0,90,$data['Prefix'], false, false, true, 0, 0, 'L', false, 0, 'B','C',true);
				$pdf->Text(0,90,$data['FirstName'], false, false, true, 0, 0, 'L', false, 0, 'B','C',true);
				$pdf->Text(0,90,$data['MiddleName'], false, false, true, 0, 0, 'L', false, 0, 'B','C',true);
				$pdf->Text(0,90,$data['LastName'], false, false, true, 0, 0, 'L', false, 0, 'B','C',true);
				$pdf->Text(0,90,$data['Suffix'], false, false, true, 0, 0, 'L', false, 0, 'B','C',true);
				$pdf->Text(40,120,'This CERTIFICATION(b) is being issued upon the request of'.$data['FirstName'].' for <purpose> purposes only.',false,false,true,0,0,'L',false,0,'B','C',true);
			}
}

$pdf->Text(40,99,'is a resident of barangay Salitran II with known address at',false,false,true,0,0,'C',false,0,'B','C',true);

//query to call address
$query=mysqli_query($con,"select * from address");
while($data=mysqli_fetch_array($query))
{
	foreach($data as $item)
	{
		$pdf->Text(45,99,$data['block'],false,false,true,0,0,'L',false,0,'B','C',true);
		$pdf->Text(45,99,$data['street'],false,false,true,0,0,'L',false,0,'B','C',true);
		$pdf->Text(45,99,$data['subdivision'],false,false,true,0,0,'L',false,0,'B','C',true);
		$pdf->Text(45,99,$data['barangay'],false,false,true,0,0,'L',false,0,'B','C',true);
		$pdf->Text(45,99,$data['city'],false,false,true,0,0,'L',false,0,'B','C',true);
		$pdf->Text(45,99,$data['province'],false,false,true,0,0,'L',false,0,'B','C',true);
		$pdf->Text(40,110,'Subject is known to be of good moral character and law-abiding citizen.',false,false,true,0,0,'L',false,0,'B','C',true);
	}
	
}

$pdf->Text(40,130,'Issued this <date> at Barangay Salitran II,
Dasmariñas City, Cavite.
',false,false,true,0,0,'C',false,0,'B','C',true);

$pdf->Text(100,150,'Certified by:
	<space for signature>
	PB.MARVIN T. ALINDOG(u,b,13)
	Punong Barangay',false,false,true,0,0,'C',false,0,'B','C',true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
