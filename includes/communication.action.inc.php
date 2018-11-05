<?php
	include 'dbh.inc.php';
	include_once "PHPMailer/PHPMailer.php";

	if (isset($_POST['complaint'])) {
		$firstname = checkInput($_POST['firstname']);
		$lastname = checkInput($_POST['lastname']);
		$contactnumber = checkInput($_POST['contactnumber']);
		$email = checkInput($_POST['email']);
		$subject = checkInput($_POST['subject']);
		$complaintMessage = checkInput($_POST['complaintMessage']);

		$attachment = 0;

		if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != ""){
			while($attachment < count($_FILES['attachment']['name'])){
				$attachment = "../attachments/" . basename($_FILES['attachment']['name']);
				move_uploaded_file($_FILES['attachment']['tmp_name'], $attachment);
				$attachment++;
			}
		}
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->addAddress("");
	}
?>