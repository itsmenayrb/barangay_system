<?php
    include 'includes/dbh.inc.php';
    require_once 'functions.php';

    if (isset($_GET['email']) && isset($_GET['token'])){
        $email = mysqli_real_escape_string($conn, $_GET['email']);
        $token = mysqli_real_escape_string($conn, $_GET['token']);

        $sql = "SELECT id FROM users WHERE Email = '$email' AND Token='$token'" AND Token<>'';
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck<1){
            redirectToLoginPage();
        }
        else{
            $newPassword = generateNewString();
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET Token='' , Password = '$hashedPassword' WHERE Email = '$email'";
            mysqli_query($conn,$sql);

            echo "Your new password is $newPassword<br><a href='login.php'>Click here to Log In</a>";
        }
    }
    else{
        header("Location: forgotpassword.php");
        exit();
    }
?>