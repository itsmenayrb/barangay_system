<?php
	include 'dbh.inc.php';

	// Initializing Variables
	$username = "";
	$email = "";
	$securityQuestionOne = "";
	$securityQuestionTwo = "";
	$securityQuestionOneAnswer = "";
	$securityQuestionTwoAnswer = "";
	$password = "";
	$cpassword = "";
	$statusUser = "";
	$statusSubUser = "";

	$prefix = "";
	$fname = "";
	$mname = "";
	$lname = "";
	$suffix = "";
	$bday = "";
	$age = "";
	$homeaddress = "";
	$telephonenumber = "";
	$cellphonenumber = "";

	// IF button has been set or if the form has been submit in set.account.as.primary.php
	if(isset($_POST['setAsPrimaryBtn'])){
		//Set session in a variale
  		$current = $_SESSION['Username'];
  		//Get ID From the URL
  		$autoID = checkInput($_POST['hiddenSettingUp']);
  		//Get data from form
		$username = checkInput($_POST['username']);
		$email = checkInput($_POST['email']);
		$securityQuestionOne = checkInput($_POST['securityquestionone']);
		$securityQuestionOneAnswer = checkInput($_POST['securityquestiononeanswer']);
		$securityQuestionTwo = checkInput($_POST['securityquestiontwo']);
		$securityQuestionTwoAnswer = checkInput($_POST['securityquestiontwoanswer']);
		$password = checkInput($_POST['password']);
		$cpassword = checkInput($_POST['cpassword']);

		$prefix = checkInput($_POST['prefix']);
		$fname = checkInput($_POST['fname']);
		$mname = checkInput($_POST['mname']);
		$lname = checkInput($_POST['lname']);
		$suffix = checkInput($_POST['suffix']);
		$bday = checkInput($_POST['bday']);
		$age = checkInput($_POST['age']);
		$homeaddress = checkInput($_POST['homeaddress']);
		$telephonenumber = checkInput($_POST['telephonenumber']);
		$cellphonenumber = checkInput($_POST['cellphonenumber']);

		//Query to check if the email and username is already exist
		$sql=$conn->prepare("SELECT Username,Email FROM users WHERE Username=? OR Email=?");
		$sql->bind_param("ss",$username,$email);
		$sql->execute();
		$result=$sql->get_result();
		$row=$result->fetch_array(MYSQLI_ASSOC);

		if($row['Username'] == $username){
		    array_push($errors, "Username is already used.");
		}

		if($row['Email'] == $email){
			array_push($errors, "Email is already used.");
		}
		//Check if the username has contain spaces, special characters, or it's less than five
		if (!preg_match("/^[a-zA-Z0-9]{5,}$/" , $username)){
    		array_push($errors, "Username must not contain spaces or special characters.");
  		}
  		//If there's no error
  		if(count($errors) == 0){
  			//Date when the subuser account made primary and it's status
  			$dateDeleted = date('Y-m-d');
  			$statusUser = "Active";
  			$statusSubUser = "Primary";
  			//Hashing password and security answers and include date of creation
  			$dateCreated = date('Y-m-d');
  			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		    $hashedSecurityQuestionOneAnswer = password_hash($securityQuestionOneAnswer, PASSWORD_DEFAULT);
		    $hashedSecurityQuestionTwoAnswer = password_hash($securityQuestionTwoAnswer, PASSWORD_DEFAULT);
		    //Inserting data to database user table
		    $sql = "INSERT INTO users (Username, Email, Pwd, SecurityQuestion1, AnswerOne, SecurityQuestion2, AnswerTwo, DateCreated, Status) VALUES (?,?,?,?,?,?,?,?,?)";
		    //Updating database subusers table
		    $sql2 = "UPDATE subusers SET status=?, dateDeleted=? WHERE username = '$current' AND id = '$autoID'";
		    //Inserting data to database residents table
		    $sql3 = "INSERT INTO residents (Prefix, FirstName, MiddleName, LastName, Suffix, Bday, Age, Homeaddress, TelephoneNumber, CellphoneNumber) VALUES (?,?,?,?,?,?,?,?,?,?)";
		    //Initializing Statement
		    $stmt = mysqli_stmt_init($conn);
		    $stmt2 = mysqli_stmt_init($conn);
		    $stmt3 = mysqli_stmt_init($conn);
		    //If preparing statement failed
		    if(!mysqli_stmt_prepare($stmt, $sql)){
		    	array_push($errors, "Something went wrong. Please try again later.");
		    } else if (!mysqli_stmt_prepare($stmt2, $sql2)){
				array_push($errors, "Something went wrong. Please try again later.");
		    } else if (!mysqli_stmt_prepare($stmt3, $sql3)){
		    	array_push($errors, "Something went wrong. Please try again later.");
		    } else {
		    	//bind data
		    	mysqli_stmt_bind_param($stmt, "sssssssss", $username, $email, $hashedPassword, $securityQuestionOne, $hashedSecurityQuestionOneAnswer, $securityQuestionTwo, $hashedSecurityQuestionTwoAnswer, $dateCreated, $statusUser);
		    	mysqli_stmt_bind_param($stmt2, "ss", $statusSubUser, $dateDeleted);
		    	mysqli_stmt_bind_param($stmt3, "ssssssisii", $prefix, $fname, $mname, $lname, $suffix, $bday, $age, $homeaddress, $telephonenumber, $cellphonenumber);
		    	//Execute
		    	mysqli_stmt_execute($stmt);
		    	mysqli_stmt_execute($stmt2);
		    	mysqli_stmt_execute($stmt3);
		    	array_push($success,"Registered Successfully! You will automatically return to your profile page.");
		    	header("refresh:5;url=profile.php");
		    }
		    //Close Statement
		    mysqli_stmt_close($stmt);
		    mysqli_stmt_close($stmt2);
		    //Close Connection
		    mysqli_close($conn);
  		}
	}
?>