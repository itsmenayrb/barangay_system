<?php
	include 'dbh.inc.php';
	include_once "PHPMailer/PHPMailer.php";
	include_once "functions.inc.php";

	// Complaints Handler
	if (isset($_POST['complaint'])) {
		$firstname = checkInput($_POST['firstname']);
		$lastname = checkInput($_POST['lastname']);
		$contactnumber = checkInput($_POST['contactnumber']);
		$email = checkInput($_POST['email']);
		$subject = checkInput($_POST['subject']);
		$complaintMessage = checkInput($_POST['complaintMessage']);
	}
	
	// Commendation Handler
	else if(isset($_POST['commend'])) {
		$firstName = checkInput($_POST['firstname']);
		$lastName = checkInput($_POST['lastname']);
		$email = checkInput($_POST['email']);
		$employee = checkInput($_POST['employeename']);
		$subject = checkInput($_POST['subject']);
		$commendationMessage = checkInput($_POST['commendation']);
		
		$query = "INSERT INTO commendations(firstname, lastname, email, employee, subject, commendationMessage)
		VALUES ('$firstName', '$lastName', '$email', '$employee', '$subject', '$commendationMessage');";

		$conn -> query($query);

		echo $query;

		if($conn -> error) {
			header("Location: ../index.php?status=message_not_sent");
		}
		else {
			header("Location: ../index.php?status=message_sent");
		}
		
		return;
	}

	else if(isset($_POST['suggest'])) {
		$firstName = checkInput($_POST['firstname']);
		$lastName = checkInput($_POST['lastname']);
		$email = checkInput($_POST['email']);
		$subject = checkInput($_POST['subject']);
		$recommendation = checkInput($_POST['suggestion']);

		$query = "INSERT INTO recommendations(firstname, lastname, email, subject, recommendation) 
		VALUES ('$firstName', '$lastName', '$email', '$subject', '$recommendation');";

		$conn -> query($query);

		if($conn -> error) {
			header("Location: ../index.php?status=message_not_sent");
		}
		else {
			header("Location: ../index.php?status=message_sent");
		}

		return;
	}


	// Inquiry Handler
	else if(isset($_POST['inquire'])) {
		$firstName = checkInput($_POST['firstname']);
		$lastName = checkInput($_POST['lastname']);
		$contact = checkInput($_POST['contactnumber']);
		$email = checkInput($_POST['email']);
		$subject = checkInput($_POST['subject']);
		$inquiry = checkInput($_POST['inquiry']);

		$query = "INSERT INTO inquiries(firstname, lastname, contactnumber, email, subject, inquiry)
		VALUES('$firstName', '$lastName', '$contact', '$email', '$subject', '$inquiry');";

		echo $query;

		$conn -> query($query);

		if($conn -> error) {
			header("Location: ../index.php?status=message_not_sent");
		}
		else {
			header("Location: ../index.php?status=message_sent");
		}

		return;
	}
?>