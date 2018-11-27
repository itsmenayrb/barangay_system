<?php
  //Initializing Variables
  $username = "";
  $email = "";
  $securityquestiononeanswer = "";
  $securityquestiontwoanswer = "";
  $password = "";
  $cpassword = "";

  $prefix =  "";
  $fname = "";
  $mname = "";
  $lname = "";
  $suffix =  "";
  $gender =  "";
  $birthday = "";
  $age ="";
  $birthplace = "";
  $block = "";
  $street =  "";
  $subdivision = "";
  $cellphonenumber = "";
  $telephonenumber = "";

  $displaySecOne = "";
  $displaySecTwo = "";
  $verified = false;
  $status = "";

  $errors = array();
  $success = array();

  include 'dbh.inc.php';

//-----------------------------------------------------------------------------------
/*
 * Register
 */
if (isset($_POST['submit'])) {
  $username = checkInput($_POST['username']);
  $email = checkInput($_POST['email']);
  $securityquestionone = checkInput($_POST['securityquestionone']);
  $securityquestiononeanswer = checkInput($_POST['securityquestiononeanswer']);
  $securityquestiontwo = checkInput($_POST['securityquestiontwo']);
  $securityquestiontwoanswer = checkInput($_POST['securityquestiontwoanswer']);
  $password = checkInput($_POST['password']);
  $cpassword = checkInput($_POST['cpassword']);
  //PERSONAL INFORMATION

  $prefix = checkInput($_POST['prefix']);
  $fname = checkInput($_POST['fname']);
  $mname = checkInput($_POST['mname']);
  $lname = checkInput($_POST['lname']);
  $suffix = checkInput($_POST['suffix']);
  $gender = checkInput($_POST['gender']);
  $birthday = checkInput($_POST['birthday']);
  $age = checkInput($_POST['age']);
  $birthplace = checkInput($_POST['birthplace']);
  $block = checkInput($_POST['block']);
  $street = checkInput($_POST['street']);
  $subdivision = checkInput($_POST['subdivision']);
  $telephonenumber = checkInput($_POST['telephonenumber']);
  $cellphonenumber = checkInput($_POST['cellphonenumber']);

  $address = $block . " " .$street . " " .$subdivision . " Barangay Salitran II, Dasmariñas City.";

  $dateCreated = date('Y-m-d');

  // Checking Username and Email
  $sql=$conn->prepare("SELECT Username,Email FROM users WHERE Username=? OR Email=?");
  $sql->bind_param("ss",$username,$email);
  $sql->execute();
  $result=$sql->get_result();
  $row=$result->fetch_array(MYSQLI_ASSOC);

  if(empty($username)){
    array_push($errors,"Username is required");
  }
  if(empty($email)){
    array_push($errors,'Email is required');
  }
  if($row['Username'] == $username){
    array_push($errors, "Username is already used.");
  }
  if($row['Email'] == $email){
    array_push($errors, "Email is already used.");
  }
  if (!preg_match("/^[a-zA-Z0-9]{5,}$/" , $username)){
    array_push($errors, "Username must not contain spaces or special characters.");
  }
  // Checking Names
  if (!preg_match("/^[a-zA-Z ]*$/" , $fname) ||!preg_match("/^[a-zA-Z ]*$/" , $mname) || !preg_match("/^[a-zA-Z ]*$/" , $lname)) {
    array_push($errors, "Your name must not contain numbers or special characters.");
  }
  // Checking Security Question
  if($securityquestionone == "" || $securityquestiontwo == ""){
    array_push($errors, "Please select a security question as you can use this to reset your password.");
  }
  // Checking Contact Number
  if(!preg_match("/^[0-9]*$/",$telephonenumber) || !preg_match("/^[0-9]*$/",$cellphonenumber)){
    array_push($errors, "You have entered invalid contact number. Please check your inputs!");
  }

  if(empty($telephonenumber) && empty($cellphonenumber)){
    array_push($errors, "You need to enter at least one contact number.");
  }

  // If no error
  if(count($errors) == 0){
    $birthday = date('Y-m-d', strtotime($birthday));
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $hashedSecurityQuestionOneAnswer = password_hash($securityquestiononeanswer, PASSWORD_DEFAULT);
    $hashedSecurityQuestionTwoAnswer = password_hash($securityquestiontwoanswer, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (Username, Email, Pwd, SecurityQuestion1, AnswerOne, SecurityQuestion2, AnswerTwo, DateCreated, Status)
    VALUES (?,?,?,?,?,?,?,?, 'Active')";
    $sql2 = "INSERT INTO residents (Prefix, FirstName, MiddleName, LastName, Suffix, Sex, Bday, Age, Bplace, HomeAddress, TelephoneNumber,CellphoneNumber) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    
    $stmt = mysqli_stmt_init($conn);
    $stmt2 = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
      array_push($errors, "Something went wrong. Please try again later.");
    }
    else if (!mysqli_stmt_prepare($stmt2, $sql2)) {
      array_push($errors, "Something went wrong. Please try again later.");
    }
    else{
      mysqli_stmt_bind_param($stmt, "ssssssss", $username, $email, $hashedPassword, $securityquestionone, $hashedSecurityQuestionOneAnswer, $securityquestiontwo, $hashedSecurityQuestionTwoAnswer, $dateCreated);
      mysqli_stmt_bind_param($stmt2, "sssssssissii", $prefix, $fname, $mname, $lname, $suffix, $gender, $birthday, $age, $birthplace, $address, $telephonenumber, $cellphonenumber);
      
      mysqli_stmt_execute($stmt);
      mysqli_stmt_execute($stmt2);

      array_push($success,"Registered Successfully! You will be redirected to the log in page after 5 seconds. If not, click <a href='login.php#signIn class='btn-link'>here.</a>");
    }
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt2);
    mysqli_close($conn);
    header("refresh:5;url=login.php#signIn");
  }
}
//-------------------------------------------------------------------------------------------
/*
 * Login
 */

if(isset($_POST['login'])) {
  $Username = checkInput($_POST['username']);
  $Password = checkInput($_POST['password']);
  // Error handlers
  // Check naman kapag nasa database na yung info o nakapag-register na.

  $sql = "SELECT * FROM users WHERE Username='$Username' OR Email='$Username'";
  $results = mysqli_query($conn, $sql);
  $resultsCheck = mysqli_num_rows($results);

  if($resultsCheck < 1){
    array_push($errors,"Incorrect username or password!");
  }

  else {
    //Pagccheck naman kung tama ba yung password
    if ($row = mysqli_fetch_assoc($results)) {
      //De-hashing the password
      $hashedPasswordCheck = password_verify($Password, $row['Pwd']);
      if ($hashedPasswordCheck == false) {
        array_push($errors, "Incorrect Username or Password");
      }
      elseif ($hashedPasswordCheck == true) {
        //Log in the user here
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Email'] = $row['Email'];
        header("Location: index.php");
        exit();
      }
    }
  }
}

//----------------------------------------------------------------------------------------------
/*
 * Reset Password
 * Via Email
 */
if(isset($_POST['send'])){
  $email = checkInput($_POST['email']);

  $sql = "SELECT * FROM users WHERE Email = '$email'";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck<1){
      array_push($errors, "Mail not sent. Email does not exist.");
  }
  else{
      $token = generateNewString();

      $sql = "UPDATE users SET Token = '$token' WHERE Email = '$email'";
      mysqli_query($conn,$sql);

      require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';

      $mail = new PHPMailer;
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'service.salitrandos@gmail.com';                 // SMTP username
      $mail->Password = 'p@ssphr@s3';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('service.salitrandos@gmail.com', 'Barangay Salitran II');
      $mail->addAddress($email);     // Add a recipient

      $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Password Reset';
      $mail->Body    = "
          Hi, <br><br>
          In order to reset your password, please click on the link below:<br>
          <a href='localhost/barangay_system/resetPassword.php?email=$email&token=$token'>Reset your password here.</a><br><br>
          Kind Regards,<br>
          Administrator
      ";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          array_push($success,"Password reset request has been sent. You will be redirected to the log in page after 5 seconds. If not, click <a href='login.php#signIn' class='btn-link'>here</a>.");
      }
      header("refresh:5;url=login.php#signIn");
  }
}
/*
 * Via SecurityQuestion
 */
if(isset($_POST['resetPassword'])){
  $username = checkInput($_POST['username']);
  $verified = true;
  $securityQuestionOneAnswer = checkInput($_POST['securityQuestionOneAnswer']);
  $securityQuestionTwoAnswer = checkInput($_POST['securityQuestionTwoAnswer']);
  $password = checkInput($_POST['password']);
  $cpassword = checkInput($_POST['cpassword']);

  $sql = "SELECT * FROM users WHERE Username = '$username';";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($verified == true) {
    //De-hashing the security answers
    if($row = mysqli_fetch_assoc($result)){
      $hashedSecAnswerOneCheck = password_verify($securityQuestionOneAnswer, $row['AnswerOne']);
      $hashedSecAnswerTwoCheck = password_verify($securityQuestionTwoAnswer, $row['AnswerTwo']);

      if ($hashedSecAnswerOneCheck == false || $hashedSecAnswerTwoCheck == false){
        array_push($errors,"Invalid input! Please make sure that the username and answers is correct.");
      }
      elseif ($hashedSecAnswerOneCheck == true && $hashedSecAnswerTwoCheck == true){
        $fhashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET Pwd='$fhashedPassword' WHERE Username ='$username'";
        mysqli_query($conn, $sql);
        array_push($success,"Reset Password Successful!");
      }
    }
  }
  else{
    array_push($errors,"Invalid input! Please make sure that the username and answers is correct.");
  }
}

if(isset($_POST['verifyUsername'])){
  $username = checkInput($_POST['username']);

  $sql = "SELECT * FROM users WHERE Username='$username' OR Email='$username'";
  $result = mysqli_query($conn,$sql);
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck < 1){
    array_push($errors, "Username or Email doesn't exist!");
  }
  else{
    array_push($success, "Verified.");
    $verified = true;

    while($row = $result->fetch_assoc()){
      $displaySecOne = $row['SecurityQuestion1'];
      $displaySecTwo = $row['SecurityQuestion2'];
      $username = $row['Username'];
    }
  }
  $conn->close();
}
/*
 * Adding sub-user
 */
if(isset($_POST['add'])){
  $relationship = checkInput($_POST['relationship']);
  $otherRelationship = checkInput($_POST['otherRelationship']);
  $username = $_SESSION['Username'];
  $prefix = checkInput($_POST['prefix']);
  $fname = checkInput($_POST['fname']);
  $mname = checkInput($_POST['mname']);
  $lname = checkInput($_POST['lname']);
  $suffix = checkInput($_POST['suffix']);
  //$gender = checkInput($_POST['gender']);
  $birthday = checkInput($_POST['birthday']);
  $age = checkInput($_POST['age']);
  //$birthplace = checkInput($_POST['birthplace']);
  $block = checkInput($_POST['block']);
  $street = checkInput($_POST['street']);
  $subdivision = checkInput($_POST['subdivision']);
  $telephonenumber = checkInput($_POST['telephonenumber']);
  $cellphonenumber = checkInput($_POST['cellphonenumber']);

  $address = $block . " " .$street . " " .$subdivision . " Barangay Salitran II, Dasmariñas City, Cavite, Philippines, 4114. ";

  $dateAdded = date('Y-m-d');

  if($relationship == ""){
    array_push($errors, "You must enter choose your relationship with the person you are registering.");
  }

  if (!preg_match("/^[a-zA-Z ]*$/" , $otherRelationship)) {
    array_push($errors, "Your relationship must not contain numbers or special characters.");
  }

  if (!preg_match("/^[a-zA-Z ]*$/" , $fname) ||!preg_match("/^[a-zA-Z ]*$/" , $mname) || !preg_match("/^[a-zA-Z ]*$/" , $lname)) {
    array_push($errors, "Your name must not contain numbers or special characters.");
  }
  // Checking Contact Number
  if(!preg_match("/^[0-9]*$/",$telephonenumber) || !preg_match("/^[0-9]*$/",$cellphonenumber)){
    array_push($errors, "You have entered invalid contact number. Please check your inputs!");
  }

  if(empty($telephonenumber) && empty($cellphonenumber)){
    array_push($errors, "You need to enter at least one contact number.");
  }

  if(count($errors) == 0){
    $status = "Active";
    $relationship = $relationship . "  " . $otherRelationship;
    $birthday = date('Y-m-d', strtotime($birthday));

    $sql = "INSERT INTO subusers (username, relationship, prefix, fname, mname, lname, suffix, birthday , age, homeaddress, telephonenumber,cellphonenumber, dateAdded, status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      array_push($errors, "Something went wrong. Please try again later.");
    }
    else{
      mysqli_stmt_bind_param($stmt, "ssssssssisiiss", $username, $relationship, $prefix, $fname, $mname, $lname, $suffix, $birthday, $age, $address, $telephonenumber, $cellphonenumber, $dateAdded, $status);

      mysqli_stmt_execute($stmt);

      array_push($success,"Added Successfully!");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("refresh:5;url=profile.php");
  }
}

/*
 * Updating sub-user
 */
if(isset($_POST['updateRelationshipBtn'])){
  $hiddenSubAccountUpdateId = checkInput($_POST['hiddenSubAccountUpdateId']);
  if(empty($hiddenSubAccountUpdateId)){
    array_push($errors,"No account to update. Please create a sub-account first");
  }
  else{
    $current = $_SESSION['Username'];
    $relationship = checkInput($_POST['relationship']);
    $otherRelationship = checkInput($_POST['otherRelationship']);
    $username = $_SESSION['Username'];
    $prefix = checkInput($_POST['prefix']);
    $fname = checkInput($_POST['fname']);
    $mname = checkInput($_POST['mname']);
    $lname = checkInput($_POST['lname']);
    $suffix = checkInput($_POST['suffix']);
    //$gender = checkInput($_POST['gender']);
    $birthday = checkInput($_POST['birthday']);
    $age = checkInput($_POST['age']);
    //$birthplace = checkInput($_POST['birthplace']);
    $block = checkInput($_POST['block']);
    $street = checkInput($_POST['street']);
    $subdivision = checkInput($_POST['subdivision']);
    $telephonenumber = checkInput($_POST['telephonenumber']);
    $cellphonenumber = checkInput($_POST['cellphonenumber']);

    $address = $block . " " .$street . " " .$subdivision . " Barangay Salitran II, Dasmariñas City, Cavite, Philippines, 4114. ";

    $dateAdded = date('Y-m-d');

    if($relationship == ""){
      array_push($errors, "You must enter choose your relationship with the person you are registering.");
    }

    if (!preg_match("/^[a-zA-Z ]*$/" , $otherRelationship)) {
      array_push($errors, "Your relationship must not contain numbers or special characters.");
    }

    if (!preg_match("/^[a-zA-Z ]*$/" , $fname) ||!preg_match("/^[a-zA-Z ]*$/" , $mname) || !preg_match("/^[a-zA-Z ]*$/" , $lname)) {
      array_push($errors, "Your name must not contain numbers or special characters.");
    }
    // Checking Contact Number
    if(!preg_match("/^[0-9]*$/",$telephonenumber) || !preg_match("/^[0-9]*$/",$cellphonenumber)){
      array_push($errors, "You have entered invalid contact number. Please check your inputs!");
    }

    if(empty($telephonenumber) && empty($cellphonenumber)){
      array_push($errors, "You need to enter at least one contact number.");
    }

    if(count($errors) == 0){
      $status = "Active";
      $relationship = $relationship . "  " . $otherRelationship;
      $birthday = date('Y-m-d', strtotime($birthday));

      $sql = "UPDATE subusers SET relationship=?, prefix=?, fname=?, mname=?, lname=?, suffix=?, birthday=?, age=?, homeaddress=?, telephonenumber=?, cellphonenumber=?, dateAdded=?, status=? WHERE username = '$current' AND id = '$hiddenSubAccountUpdateId'";
      $stmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($stmt, $sql)){
        array_push($errors, "Something went wrong. Please try again later.");
      }
      else{
        mysqli_stmt_bind_param($stmt, "sssssssisiiss", $relationship, $prefix, $fname, $mname, $lname, $suffix, $birthday, $age, $address, $telephonenumber, $cellphonenumber, $dateAdded, $status);

        mysqli_stmt_execute($stmt);

        array_push($success,"Update Successfully!");
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
  }
}

/*
 * Deleting sub-user
 */

if(!empty($_GET['reldel'])){
  $current = $_SESSION['Username'];
  $autoID = checkInput($_GET['reldel']);
  $status = "Deleted";
  $dateDeleted = date('Y-m-d');
  $sql = "UPDATE subusers SET status=?, dateDeleted=? WHERE username = '$current' AND id='$autoID'";
  $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
      array_push($errors, "Something went wrong. Please try again later.");
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $status, $dateDeleted);
      mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
  mysqli_close($conn);
  header("Location: profile.php");
  exit();
}
?>