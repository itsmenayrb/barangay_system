<?php 
  session_start();
  include 'dbh.inc.php';

  /** 
   * Since update.resident.php used Fetch API and client validation,
   * ALL responses of must be a JSON type or must follow the JSON spec
   */

  /**
   * This route will only update the user if the request type is PUT
   * and the user is currently logged in
   * 
   * After the request was successfully finished, the user will be logged out
   * of his current session and will have to log in again
   * 
   * Notes:
   * it needs to handle empty suffix
   * it needs to handle empty password and empty confirm password
   * it needs to not update if the values are the same
   */

  // Specify that the response will be a JSON type
  header('Content-type: application/json');
  
  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_ID'])) {
    $user_ID = $_SESSION['user_ID'];
    $firstName = mysqli_real_escape_string($conn, $_POST['First-Name']);
    $middleName = mysqli_real_escape_string($conn, $_POST['Middle-Name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['Last-Name']);
    $birthday = mysqli_real_escape_string($conn, $_POST['Birthday']);
    $birthplace = mysqli_real_escape_string($conn, $_POST['Birthplace']);
    $number = mysqli_real_escape_string($conn, $_POST['Contact-Number']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);

    // Optional Fields
    $suffix = NULL;
    $email = NULL;
    $password = NULL;
    $cpassword = NULL;

    $query_string = "UPDATE residents
     SET lastName = '$lastName', firstName = '$firstName', middleName = '$middleName', 
     bday = '$birthday', bplace = '$birthplace', contactnumber = '$number', address = '$address'";

    if(isset($_POST['E-mail'])) {
      $email = mysqli_real_escape_string($conn, $_POST['E-mail']);
      $query_string =  $query_string . ", email = '$email'";
    }

    if(isset($_POST['Password']) && isset($_POST['Confirm-Password'])) {
      if($_POST['Password'] !== $_POST['Confirm-Password']) {
        echo '{"success": false, "message": "Passwords do not match"}';
        session_abort();
        exit();
      }

      $password = mysqli_real_escape_string($conn, $_POST['Password']);

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $query_string =  $query_string . ", password = '$hashedPassword'";
    }

    if(isset($_POST['Suffix'])) {
      $suffix = mysqli_real_escape_string($conn, $_POST['Suffix']);
      $query_string =  $query_string . ", suffix = '$suffix'";
    }
    
    $query_string = $query_string . " WHERE user_ID = $user_ID";

    $updateResult = $conn -> query($query_string);
    
    if(!$updateResult) {
      echo '{"success": false, "message": "Error occurred during update", "error": "' . $conn -> error .'"}';
      session_abort();
      exit();
    }

    echo '{"success": true}';
    session_abort();
    exit();
  }
  else {
    echo '{"message": "Invalid request"}';
    session_abort();
    exit();
  }
?>