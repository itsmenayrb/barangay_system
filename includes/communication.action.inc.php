<?php
	include 'dbh.inc.php';
	include_once "functions.inc.php";

	// Complaints Handler
	if (isset($_POST['complaint'])) {
		$firstName = checkInput($_POST['firstname']);
		$lastName = checkInput($_POST['lastname']);
		$contactnumber = checkInput($_POST['contactnumber']);
		$email = checkInput($_POST['email']);
		$subject = checkInput($_POST['subject']);
		$complaintMessage = checkInput($_POST['complaintMessage']);

		// Insert the message
		$messageQuery = "INSERT INTO complaints(firstname, lastname, contactnumber, email, subject, complaint)
		VALUES ('$firstName', '$lastName', '$contactnumber', '$email', '$subject', '$complaintMessage');";
		$conn -> query($messageQuery);

		// Get the newly created complaint (more specifically the id)
		$getNewMessageIDQuery = "SELECT id FROM complaints WHERE subject='$subject' AND complaint='$complaintMessage';";
		$result = $conn -> query($getNewMessageIDQuery);
		$row = $result -> fetch_assoc();
		$complaint_id = $row['id'];
		
		
		
		$error=array();
    $extension=array("jpeg","jpg","png","gif");
		foreach($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
			// Generate a new random string
			$filename = bin2hex(openssl_random_pseudo_bytes(30));

			// Upload the images
			$file_name=$_FILES["files"]["name"][$key];
      $file_tmp=$_FILES["files"]["tmp_name"][$key];
			$ext=pathinfo($file_name,PATHINFO_EXTENSION);
			
      if(in_array($ext,$extension))
      {
        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key], "../file_storage/".$filename.".".$ext);
      }
      else
      {
        array_push($error,"$file_name, ");
			}
			
			// Insert the directories of the images
			$fileReferenceQuery = "INSERT INTO complaints_files(original_file_name, filename, fileextension, filedirectory, complaint_id)
			VALUES ('$file_name', '$filename', '$ext', '/file_storage/$filename.$ext', $complaint_id)";
			echo $fileReferenceQuery;
			$imageInsertRes = $conn -> query($fileReferenceQuery);

			if(!$imageInsertRes) {
				echo $conn -> error;
				header("Location: ../index.php?status=message_not_sent");
			}
		}
		
		header("Location: ../index.php?status=message_sent");
		return;
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