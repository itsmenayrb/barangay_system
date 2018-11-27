<?php
  session_start();
  include 'dbh.inc.php';
  /**
   * This route will only update the user if the request type is POST
   * and the user is currently logged in
   */

  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id'])) {
    $user_ID = $_SESSION['id'];
    // Fields from the Web UI
    $firstName = mysqli_real_escape_string($conn, $_POST['First-Name']);
    $middleName = mysqli_real_escape_string($conn, $_POST['Middle-Name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['Last-Name']);
    $suffix = mysqli_real_escape_string($conn, $_POST['suffix']);
    $prefix = mysqli_real_escape_string($conn, $_POST['prefix']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthday']);
    $birthplace = mysqli_real_escape_string($conn, $_POST['birthplace']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $telephoneNum = mysqli_real_escape_string($conn , $_POST['telephonenumber']);
    $cellphoneNum = mysqli_real_escape_string($conn, $_POST['cellphonenumber']);
    // Address
    $block = mysqli_real_escape_string($conn, $_POST['block']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $subdivision = mysqli_real_escape_string($conn, $_POST['subdivision']);
    $birthdate = date('Y/m/d', strtotime($birthdate));
    // Query to update the user
    $query_string = "UPDATE residents
    SET
    FirstName = '$firstName',
    LastName = '$lastName',
    MiddleName = '$middleName',
    Suffix = '$suffix',
    Prefix = '$prefix',
    Sex = '$gender',
    Age = $age,
    Bday = '$birthdate',
    Bplace = '$birthplace'";
    if(isset($telephoneNum)) {
      $query_string = $query_string . ", TelephoneNumber = '$telephoneNum'";
    }
    if(isset($cellphoneNum)) {
      $query_string = $query_string . ", CellphoneNumber = '$cellphoneNum'";
    }
    $query_string = $query_string . " WHERE user_ID = $user_ID; ";
    echo $query_string;
    $query_address_string = "UPDATE address
    SET
    block = '$block',
    street = '$street',
    subdivision = '$subdivision'
    WHERE id = $user_ID;";
    $updateResult = $conn -> query($query_string);
    if($conn -> error) {
      header("Location: ../index.php?status=1");
      exit();
    }
    $addressResult = $conn -> query($query_address_string);
    if($conn -> error) {
      header("Location: ../index.php?status=2");
      exit();
    }
    header("Location: ../index.php?status=update_success");
    session_abort();
    exit();
  }
  else {
    header("Location: ../index.php?status=invalid_request");
    exit();
  }
?>