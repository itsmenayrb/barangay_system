<!-- This page will handle all the forms
in admin site -->
<?php
    session_start();
    include '../includes/functions.inc.php';
    include '../includes/dbh.inc.php';

    //// Initializing Variables
    //// Initializing Variables
    //// Initializing Variables
    $username = "";
    $email = "";
    $fname = "";
    $mname = "";
    $lname = "";
    $suffix = "";
    $username = "";
    $email = "";
    $password = "";

    $fullname = "";
    $position = "";
    $status = "";
    $timeIN = "";
    $timeOut = "";
    $absent = "";
    $employeeNumber = "";
    $activity = "";
    $comments = "";
    $errors = array();
    $success = array();

    $employeeNumber = "";

    // REGISTRATION
    // REGISTRATION
    // REGISTRATION
    // REGISTRATION
    // REGISTRATION

    if(isset($_POST['admin-register'])){
        $position = checkInput($_POST['admin-position']);
        $prefix = checkInput($_POST['admin-prefix']);
        $fname = checkInput($_POST['admin-fname']);
        $mname = checkInput($_POST['admin-mname']);
        $lname = checkInput($_POST['admin-lname']);
        $suffix = checkInput($_POST['admin-suffix']);
        $username = checkInput($_POST['admin-username']);
        $email = checkInput($_POST['admin-email']);
        $password = checkInput($_POST['admin-password']);

        $sql=$conn->prepare("SELECT Username,Email,Position FROM employee WHERE Username=? OR Email=? OR Position=?");
        $sql->bind_param("sss",$username,$email,$position);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_array(MYSQLI_ASSOC);

        if($row['Username'] == $username){
            array_push($errors, "Username is already used.");
        }
        if($row['Email'] == $email){
            array_push($errors, "Email is already used.");
        }
        if (!preg_match("/^[a-zA-Z0-9]{5,}$/" , $username)){
            array_push($errors, "Username must not contain spaces or special characters.");
        }
        if (!preg_match("/^[a-zA-Z ]*$/" , $fname) ||!preg_match("/^[a-zA-Z ]*$/" , $mname) || !preg_match("/^[a-zA-Z ]*$/" , $lname)) {
            array_push($errors, "Your name must not contain numbers or special characters.");
        }

        if(count($errors) == 0){
            // BARANGAY CHAIRMAN
            // BARANGAY CHAIRMAN
            // BARANGAY CHAIRMAN
            if($position == "Barangay Chairman"){
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if($row['Position'] == $position){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // BARANGAY COUNCILOR
            // BARANGAY COUNCILOR
            // BARANGAY COUNCILOR
            elseif ($position == "Barangay Councilor") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if(count($row['Position']) > 7){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // BARANGAY SECRETARY
            // BARANGAY SECRETARY
            // BARANGAY SECRETARY
            elseif ($position == "Barangay Secretary") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if($row['Position'] == $position){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // BARANGAY ASSISTANT SECRETARY
            // BARANGAY ASSISTANT SECRETARY
            // BARANGAY ASSISTANT SECRETARY
            elseif ($position == "Barangay Assistant Secretary") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if($row['Position'] == $position){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // BARANGAY TREASURER
            // BARANGAY TREASURER
            // BARANGAY TREASURER
            elseif ($position == "Barangay Treasurer") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if($row['Position'] == $position){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // SK CHAIRMAN
            // SK CHAIRMAN
            // SK CHAIRMAN
            elseif ($position == "SK Chairman") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if($row['Position'] == $position){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // SK COUNCILOR 
            // SK COUNCILOR 
            // SK COUNCILOR
            elseif ($position == "SK Councilor") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if(count($row['Position']) > 7){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // SK SECRETARY
            // SK SECRETARY
            // SK SECRETARY
            elseif ($position == "SK Secretary") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if($row['Position'] == $position){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // SK TREASURER
            // SK TREASURER
            // SK TREASURER
            elseif ($position == "SK Treasurer") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if($row['Position'] == $position){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
            // BARANGAY TANOD
            // BARANGAY TANOD
            // BARANGAY TANOD
            elseif ($position == "Barangay Tanod") {
                $sql=$conn->prepare("SELECT Position FROM employee WHERE Position=?");
                $sql->bind_param("s",$position);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                if(count($row['Position']) > 15){
                    array_push($errors,"Failed. Please select proper selection on position");
                }
                else{
                    try{
                        $status = "active";
                        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                        $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $conn->beginTransaction();
                        $conn->exec("INSERT INTO employee (Prefix, FirstName, MiddleName, LastName, Suffix, Position, Username, Email, Password, Status) VALUES
                        ('$prefix','$fname','$mname','$lname','$suffix','$position','$username','$email','$hashedPassword','$status')");

                        $conn->commit();
                        array_push($success,"Registered Successfully!");
                    }
                    catch(PDOException $e){
                        $conn->rollback();
                        echo "Error: ".$e->getMessage();
                    }
                    $conn = null;
                }
            }
        }
    }
    // LOGIN
    // LOGIN
    // LOGIN
    // LOGIN
    // LOGIN
    if(isset($_POST['admin-login'])){
        $Username = checkInput($_POST['admin-username']);
        $Password = checkInput($_POST['admin-password']);

        $sql = "SELECT * FROM employee WHERE Username='$Username' OR Email='$Username'";
        $results = mysqli_query($conn, $sql);
        $resultsCheck = mysqli_num_rows($results);

        if($resultsCheck < 1){
            array_push($errors,"Incorrect username or password!");
        }
        else{
            if ($row = mysqli_fetch_assoc($results)) {
                //De-hashing the password
                $hashedPasswordCheck = password_verify($Password, $row['Password']);
                if ($hashedPasswordCheck == false) {
                    array_push($errors, "Incorrect username or password.");
                }
                elseif ($hashedPasswordCheck == true) {
                    //Log in the user here
                    $_SESSION['Username'] = $row['Username'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['Email'] = $row['Email'];
                    $_SESSION['Position'] = $row['Position'];
                    header("Location: dashboard.php");
                    exit();
                }
            }
        }
    }

    /*
    * ATTENDANCE
    * ATTENDANCE
    * ATTENDANCE
    * ATTENDANCE
    */
    //Time IN//
    if(isset($_POST['btnTimeIn'])){
        $date = date('Y-m-d');
        $employeeNumber = checkInput($_POST['employeeNumber']);

        $sql=$conn->prepare("SELECT employee_id FROM employee WHERE employee_id=?");
        $sql->bind_param("s",$employeeNumber);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_array(MYSQLI_ASSOC);

        if(!preg_match("/^[0-9]*$/",$employeeNumber)){
            array_push($errors, "You have entered invalid employee number. Please check your inputs!");
        }

        if($row['employee_id'] != $employeeNumber){
            array_push($errors, "Employee Number does not exist.");
            $employeeNumber = "";
        }

        if(count($errors) == 0){
            $sql=$conn->prepare("SELECT time_in, absent, on_leave FROM attendance WHERE employee_id=? AND dateofyear = '$date'");
            $sql->bind_param("s",$employeeNumber);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row['time_in'] <> NULL || $row['absent'] <> NULL || $row['on_leave'] <> NULL){
                if($date == $date){
                    array_push($errors, "You don't have the privelege to update your time-in. Please contact your administrator.");
                }
            }
            else {
                $sql=$conn->prepare("SELECT * FROM employee WHERE employee_id=?");
                $sql->bind_param("s",$employeeNumber);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                $fullname = $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'];
                $position = $row['Position'];
                $status = $row['Status'];
                $timeIN = date('h:i:sa');

                $sql = "INSERT INTO attendance (employee_id, fullname, position, dateofyear, time_in, status) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                  array_push($errors, "Something went wrong. Please try again later.");
                }
                else{
                  mysqli_stmt_bind_param($stmt, "ssssss", $employeeNumber, $fullname, $position, $date, $timeIN, $status);
                  mysqli_stmt_execute($stmt);
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                echo "<script type='text/javascript'>window.location='attendance.php';</script>";
            }
        }
    }

    // TIMEOUT //
    if(isset($_POST['btnTimeOut'])){
        $date = date('Y-m-d');
        $employeeNumber = checkInput($_POST['employeeNumber']);

        $sql=$conn->prepare("SELECT employee_id FROM employee WHERE employee_id=?");
        $sql->bind_param("s",$employeeNumber);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_array(MYSQLI_ASSOC);

        if(!preg_match("/^[0-9]*$/",$employeeNumber)){
            array_push($errors, "You have entered invalid employee number. Please check your inputs!");
        }

        if($row['employee_id'] != $employeeNumber){
            array_push($errors, "Employee Number does not exist.");
            $employeeNumber = "";
        }

        if(count($errors) == 0){
            $sql=$conn->prepare("SELECT time_in, time_out, absent, on_leave FROM attendance WHERE employee_id=? AND dateofyear = '$date'");
            $sql->bind_param("s",$employeeNumber);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row['time_in'] == NULL || $row['time_out'] <> NULL || $row['absent'] <> NULL || $row['on_leave'] <> NULL){
                if($date == $date){
                    array_push($errors, "You don't have the privelege to update your time-out. Please contact your administrator.");
                }
            }
            else {
                $timeOut = date('h:i:sa');

                $sql = "UPDATE attendance SET time_out=? WHERE employee_id = '$employeeNumber' AND dateofyear = '$date'";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                  array_push($errors, "Something went wrong. Please try again later.");
                }
                else{
                  mysqli_stmt_bind_param($stmt, "s", $timeOut);
                  mysqli_stmt_execute($stmt);
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                echo "<script type='text/javascript'>window.location='attendance.php';</script>";
            }
        }
    }
    //Absent//
    if(isset($_POST['btnAbsent'])){
        $date = date('Y-m-d');
        $employeeNumber = checkInput($_POST['employeeNumber']);

        $sql=$conn->prepare("SELECT employee_id FROM employee WHERE employee_id=?");
        $sql->bind_param("s",$employeeNumber);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_array(MYSQLI_ASSOC);

        if(!preg_match("/^[0-9]*$/",$employeeNumber)){
            array_push($errors, "You have entered invalid employee number. Please check your inputs!");
        }

        if($row['employee_id'] != $employeeNumber){
            array_push($errors, "Employee Number does not exist.");
            $employeeNumber = "";
        }

        if(count($errors) == 0){
            $sql=$conn->prepare("SELECT time_in, time_out, on_leave, absent FROM attendance WHERE employee_id=? AND dateofyear = '$date'");
            $sql->bind_param("s",$employeeNumber);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row['time_in'] <> NULL || $row['time_out'] <> NULL || $row['on_leave'] <> NULL || $row['absent'] <> NULL){
                if($date == $date){
                    array_push($errors, "Cannot tagged as absent.");
                }
            }
            else {
                $sql=$conn->prepare("SELECT * FROM employee WHERE employee_id=?");
                $sql->bind_param("s",$employeeNumber);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                $fullname = $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'];
                $position = $row['Position'];
                $status = $row['Status'];
                $absent = "Absent";

                $sql = "INSERT INTO attendance (employee_id, fullname, position, dateofyear, absent, status) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                  array_push($errors, "Something went wrong. Please try again later.");
                }
                else{
                  mysqli_stmt_bind_param($stmt, "ssssss", $employeeNumber, $fullname, $position, $date, $absent, $status);
                  mysqli_stmt_execute($stmt);
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                echo "<script type='text/javascript'>window.location='attendance.php';</script>";
            }
        }
    }
    //On-Leave//
    if(isset($_POST['btnLeave'])){
        $date = date('Y-m-d');
        $employeeNumber = checkInput($_POST['employeeNumber']);
        $reasonOfLeave = checkInput($_POST['textLeaveReason']);

        $sql=$conn->prepare("SELECT employee_id FROM employee WHERE employee_id=?");
        $sql->bind_param("s",$employeeNumber);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_array(MYSQLI_ASSOC);

        if(!preg_match("/^[0-9]*$/",$employeeNumber)){
            array_push($errors, "You have entered invalid employee number. Please check your inputs!");
        }

        if($row['employee_id'] != $employeeNumber){
            array_push($errors, "Employee Number does not exist.");
            $employeeNumber = "";
        }

        if(count($errors) == 0){
            $sql=$conn->prepare("SELECT time_in, time_out, on_leave, absent FROM attendance WHERE employee_id=? AND dateofyear = '$date'");
            $sql->bind_param("s",$employeeNumber);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row['time_in'] <> NULL || $row['time_out'] <> NULL || $row['on_leave'] <> NULL || $row['absent'] <> NULL){
                if($date == $date){
                    array_push($errors, "Cannot tagged as on leave.");
                }
            }
            else {
                $sql=$conn->prepare("SELECT * FROM employee WHERE employee_id=?");
                $sql->bind_param("s",$employeeNumber);
                $sql->execute();
                $result=$sql->get_result();
                $row=$result->fetch_array(MYSQLI_ASSOC);

                $fullname = $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'];
                $position = $row['Position'];
                $status = $row['Status'];
                $onLeave = "On Leave";

                $sql = "INSERT INTO attendance (employee_id, fullname, position, dateofyear, on_leave, activity, status) VALUES (?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                  array_push($errors, "Something went wrong. Please try again later.");
                }
                else{
                  mysqli_stmt_bind_param($stmt, "sssssss", $employeeNumber, $fullname, $position, $date, $onLeave, $reasonOfLeave, $status);
                  mysqli_stmt_execute($stmt);
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                echo "<script type='text/javascript'>window.location='attendance.php';</script>";
            }
        }
    }