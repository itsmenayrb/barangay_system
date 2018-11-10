<?php
	/* Initializing Variables
	 * Initializing Variables
	 */
	$username = $_SESSION['Username'];
	$dateRequested = date('Y-m-d');
	$status = "";
	$fullname = "";
	$email = "";
	$contactnumber = "";
	$appointmentDate = "";
	$appointmentTime = "";

	use PHPMailer\PHPMailer\PHPMailer;

	/* If requestAppointment button is triggered
	 * If requestAppointment button is triggered
	 */

	if (isset($_POST['requestAppointment'])){
		$fullname = checkInput($_POST['fullname']);
		$contactnumber = checkInput($_POST['contactnumber']);
		$appointmentDate = checkInput($_POST['appointmentDate']);
		$appointmentTime = checkInput($_POST['appointmentTime']);
		$purpose = checkInput($_POST['purpose']);

		if(!preg_match("/^[0-9]*$/",$contactnumber)){
    		array_push($errors, "You have entered invalid contact number. Please check your inputs!");
    		$contactnumber = "";
  		}

  		if (!preg_match("/^[a-zA-Z ]*$/" , $fullname)) {
    		array_push($errors, "Your name must not contain numbers or special characters.");
    		$fullname = "";
  		}

  		if(count($errors) == 0){
  			$appointmentDate = date('Y-m-d', strtotime($appointmentDate));
  			$status = "Pending";
  			require_once 'PHPMailer/PHPMailer.php';
  			require_once 'PHPMailer/Exception.php';

  			$mail = new PHPMailer();
  			$mail->addAddress("yourhelpdesk@salitrandos.x10host.com");
  			$mail->setFrom($email, "Appointment Request");
  			$mail->Subject = "Requesting Appointment";
	    	$mail->isHTML(true);
	    	$mail->Body = "
        	Hi, <br><br>
        	I would like to rquest to your good office to schedule an appointment on $appointmentDate, $appointmentTime to $purpose.<br>
			Thank you.<br>
        	Kind Regards,<br>
        	$fullname
    		";

    		if($mail->send()){
	        	array_push($success, "Appointment Request has been sent.");
	    	}
	    	else{
	        	array_push($errors,"Message sending failed. Please try again later!");
	    	}

	    	$sql = "INSERT INTO appointment (username, fullname, contactnumber, appointment_date, appointment_time, purpose, date_requested, status) VALUES (?,?,?,?,?,?,?,?)";
	    	$stmt = mysqli_stmt_init($conn);

		    if(!mysqli_stmt_prepare($stmt, $sql)){
		    	array_push($errors, "Something went wrong. Please try again later.");
		    }
		    else{
		    	mysqli_stmt_bind_param($stmt, "ssssssss", $username, $fullname, $contactnumber, $appointmentDate, $appointmentTime, $purpose, $dateRequested, $status);
		    	mysqli_stmt_execute($stmt);
		    }
		    mysqli_stmt_close($stmt);
    		mysqli_close($conn);
  		}
	}
?>