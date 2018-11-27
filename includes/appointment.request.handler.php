<?php
	/* Initializing Variables
	 * Initializing Variables
	 */
	$dateRequested = date('Y-m-d');
	$status = "";
	$fullname = "";
	$email = "";
	$contactnumber = "";
	$appointmentDate = "";
	$appointmentTime = "";
	$purpose = "";

	/* If requestAppointment button is triggered
	 * If requestAppointment button is triggered
	 */

	if (isset($_POST['requestAppointment'])){
		$username = $_SESSION['Username'];
		$fullname = checkInput($_POST['fullname']);
		$email = checkInput($_POST['email']);
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
  			$status = "Pending";
  			$appointmentDate = new DateTime($appointmentDate);
  			$appointmentTime = date('h:i A', strtotime($appointmentTime));
  			require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';

  			$mail = new PHPMailer;
  			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
  			$mail->Username = 'service.salitrandos@gmail.com';                 // SMTP username
			$mail->Password = 'p@ssphr@s3';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom($email, 'Appointment Request');
			$mail->addAddress('service.salitrandos@gmail.com');     // Add a recipient

    		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Appointment Request';
			$mail->Body    = 'Hi,<br><br>
			I would like to schedule an appointment on '.$appointmentDate->format('F-d-Y').', '.$appointmentTime.' to request for '.$purpose.'.<br><br>Thank you.<br>'.$fullname;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    array_push($success,"Appointment Request has been sent. You will be redirected to your profile page after 5 seconds. If not, click <a href='profile.php#appointment' class='btn-link'>here</a>.");
			}

			$appointmentTime = date('H:i:s');
  			$appointmentDate = date('Y-m-d');

	    	$sql = "INSERT INTO appointment (username, fullname, contactnumber, email, appointment_date, appointment_time, purpose, date_requested, status) VALUES (?,?,?,?,?,?,?,?,?)";
	    	$stmt = mysqli_stmt_init($conn);

		    if(!mysqli_stmt_prepare($stmt, $sql)){
		    	array_push($errors, "Something went wrong. Please try again later.");
		    }
		    else{
		    	mysqli_stmt_bind_param($stmt, "sssssssss", $username, $fullname, $contactnumber, $email, $appointmentDate, $appointmentTime, $purpose, $dateRequested, $status);
		    	mysqli_stmt_execute($stmt);
		    }
		    mysqli_stmt_close($stmt);
    		mysqli_close($conn);
    		header("refresh:5;url=profile.php#appointment");
  		}
	}

	if(isset($_POST['appointmentUpdate'])){
		$hiddenGetId = checkInput($_POST['hiddenGetId']);
		if(empty($hiddenGetId)){
			array_push($errors, "There is nothing to update. Please request an appointment.");
		}
		else {
			$current = $_SESSION['Username'];
			$fullname = checkInput($_POST['fullname']);
			$email = checkInput($_POST['email']);
			$contactnumber = checkInput($_POST['contactnumber']);
			$appointmentDate = checkInput($_POST['appointmentDate']);
			$appointmentTime = checkInput($_POST['appointmentTime']);
			$purpose = checkInput($_POST['purpose']);

			$sql = "SELECT * FROM appointment WHERE username = '$username' AND id = '$hiddenGetId'";
			$results = mysqli_query($conn, $sql);
			$resultsCheck = mysqli_num_rows($results);

			if($resultsCheck < 0){
				array_push($errors,"No records to update. Please submit your appointment");
			}
			else{
				$appointmentTime = date('H:i:s', strtotime($appointmentTime));
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
	        	I would like to rquest to update my appointment on $appointmentDate, $appointmentTime to $purpose .<br>
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

		    	$sql = "UPDATE appointment SET fullname=?, contactnumber=?, email=?, appointment_date=?, appointment_time=?, purpose=?, date_requested=?, status=? WHERE username = '$current' AND id = '$hiddenGetId'";
		    	$stmt = mysqli_stmt_init($conn);

			    if(!mysqli_stmt_prepare($stmt, $sql)){
			    	array_push($errors, "Something went wrong. Please try again later.");
			    }
			    else{
			    	mysqli_stmt_bind_param($stmt, "ssssssss", $fullname, $contactnumber, $email, $appointmentDate, $appointmentTime, $purpose, $dateRequested, $status);
			    	mysqli_stmt_execute($stmt);
			    }
			    mysqli_stmt_close($stmt);
	    		mysqli_close($conn);
	    		header("refresh:5;url=profile.php");
	    	}
	    }
	}

	if(!empty($_GET['del'])){
		$current = $_SESSION['Username'];
		$autoID = checkInput($_GET['del']);
		$status = "Deleted";
		$dateAccomplished = date('Y-m-d');
		$sql = "UPDATE appointment SET status=?, date_accomplished=? WHERE username = '$current' AND id='$autoID'";
		$stmt = mysqli_stmt_init($conn);

	    if(!mysqli_stmt_prepare($stmt, $sql)){
	    	array_push($errors, "Something went wrong. Please try again later.");
	    }
	    else{
	    	mysqli_stmt_bind_param($stmt, "ss", $status, $dateAccomplished);
	    	mysqli_stmt_execute($stmt);
	    }
	    mysqli_stmt_close($stmt);
		mysqli_close($conn);
		header("Location: profile.php#appointment");
		exit();
	}
?>