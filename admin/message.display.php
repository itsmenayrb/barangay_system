<?php
  session_start();
  include_once "../includes/dbh.inc.php";

  if(isset($_GET['complaint'])) {
    // Get the id
    $id = $_GET['complaint'];

    // Check if the message exists
    $query = "SELECT * FROM complaints WHERE id=$id";
    $result = $conn -> query($query);
    
    // Print or redirect
    if($result) {
      $row = $result -> fetch_assoc();
      
      echo "<h1>Subject: " . $row['subject'] . "</h1>";
      echo "<h2>Contacts: " . $row['email'] . "/" . $row["contactnumber"] . "</h2>";
      echo "<h3>Complaint:</h3>"; 
      echo "<p>" . $row['complaint'] . "</p>";

      // Get the files if there are any
      $image_query = "SELECT * FROM complaints_files WHERE complaint_id=$id";  
      $image_result = $conn -> query($image_query);

      echo $image_result -> num_rows;

      while($row = $image_result -> fetch_assoc()) {
        $directory = $row['filedirectory'];
        echo "<img class='img-fluid' src='../$directory' style='width: 25%'>";
      }

      return;
    }
    else {
      header("Location: ./message.php");
    }
  }

  else if(isset($_GET['recommend'])) {
    // Get the id
    $id = $_GET['recommend'];

    // Check if the message exists
    $query = "SELECT * FROM recommendations WHERE id=$id";
    $result = $conn -> query($query);


    // Print or redirect
    if($result) {
      $row = $result -> fetch_assoc();
      
      echo "<h1>Subject: " . $row['subject'] . "</h1>";
      echo "<h2>Contacts: " . $row['email'] . "</h2>";
      echo "<h3>Recommendation:</h3>"; 
      echo "<p>" . $row['recommendation'] . "</p>";
    }
    else {
      header("Location: ./message.php");
    }
  }

  else if(isset($_GET['commend'])) {
    // Get the id
    $id = $_GET['commend'];

    // Check if the message exists
    $query = "SELECT * FROM commendations WHERE id=$id";
    $result = $conn -> query($query);


    // Print or redirect
    if($result) {
      $row = $result -> fetch_assoc();
      
      echo "<h1>Subject: " . $row['subject'] . "</h1>";
      echo "<h2>Contacts: " . $row['email'] . "</h2>";
      echo "<h3>Commendation:</h3>"; 
      echo "<p>" . $row['commendationMessage'] . "</p>";
    }
    else {
      header("Location: ./message.php");
    }
  }

  else if(isset($_GET['inquiry'])) {
    // Get the id
    $id = $_GET['inquiry'];

    // Check if the message exists
    $query = "SELECT * FROM inquiries WHERE id=$id";
    $result = $conn -> query($query);


    // Print or redirect
    if($result) {
      $row = $result -> fetch_assoc();
      
      echo "<h1>Subject: " . $row['subject'] . "</h1>";
      echo "<h2>Contacts: " . $row['email'] . "/" . $row["contactnumber"] . "</h2>";
      echo "<h3>Inquiry:</h3>"; 
      echo "<p>" . $row['inquiry'] . "</p>";
    }
    else {
      header("Location: ./message.php");
    }
  }

  // Not a valid parameter
  else {
    header("Location: ./message.php");
  }
?>