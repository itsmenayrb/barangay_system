<?php 
    session_start();
    
    // Check if the request is POST and the user is logged in    
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userID'])) {
        
        $userID = $_SESSION['userID'];
        
        // Check if the fields are not empty
        if(!isset($_POST['Confirm-Password']) || !isset($_POST['New-Password']) || !isset($_POST['New-Password-Confirm'])) {
            header('Location: update.password.php?status=empty_field');
            die();
        }
        
        include 'dbh.inc.php';
        
        $selectPasswordQuery = 'SELECT Password FROM users WHERE userID ="' . $_SESSION['userID'] . '";';
        $result = $query -> query(selectPasswordQuery);
        
        // Check if the query is not null
        if(!$result) {
            header('Location: update.password.php?status=query_error');
            die();
        }
        
        $row = $result -> fetch_assoc();
        
        // Check if the old password given matches in the one stored in the database
        if(!password_verify($_POST['Old-Password'], $row['Password'])) {
            header('Location: update.password.php?status=incorrect_password');
            die();
        }
        
        // Check if the New-Password and Confirm Password are equal
        if(!$_POST['New-Password'] === $_POST['New-Password-Confirm']) {
            header('Location: update.password.php?status=password_not_same');
            die();
        }
        
        $hashedPassword = password_hash($_POST['New-Password'], PASSWORD_DEFAULT);
        
        $query -> query("UPDATE users SET Password = '$hashedPassword' WHERE userID=$userID");
        
        header('Location: index.php?status=update_complete');
        die();
    }
    
    header('Location: index.php');
    die();
?>