<?php
    session_start();
    include '../includes/functions.inc.php';
    include '../includes/dbh.inc.php';

    $username = "";
    $email = "";
    $fname = "";
    $mname = "";
    $lname = "";
    $suffix = "";
    $username = "";
    $email = "";
    $password = "";
    $adminlevel = "";
    $fullname = "";
    $position = "";
    $status = "";
    $employeeID = "";
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
        //Check for barangay chairman

        if($position == "Barangay Chairman"){
            $sql=$conn->prepare("SELECT * FROM barangaychairman");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 0){
                array_push($errors,"You cannot select the position of Barangay Chairman anymore as we already have a data on it.
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $employeeNumber = '2018001';
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 1;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (employee_id, Username, Email, Password, Position, AdminLevel, Status) VALUES
                    ('$employeeNumber', '$username','$email','$hashedPassword','$position','$adminlevel','$status')");
                    $conn->exec("INSERT INTO barangaychairman (employee_id, Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$employeeNumber', '$username','$prefix','$fname','$mname','$lname','$suffix')");

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

        // Check for barangay secretary

        if($position == "Barangay Secretary"){
            $sql=$conn->prepare("SELECT * FROM barangaysecretary");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 0){
                array_push($errors,"You cannot select the position of Barangay Secretary anymore as we already have a data on it.
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 2;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position, AdminLevel) VALUES
                    ('$username','$email','$hashedPassword','$position','$adminlevel')");
                    $conn->exec("INSERT INTO barangaysecretary (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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

        // Check for barangay treasurer

        if($position == "Barangay Treasurer"){
            $sql=$conn->prepare("SELECT * FROM barangaytreasurer");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 0){
                array_push($errors,"You cannot select the position of Barangay Treasurer anymore as we already have a data on it.
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 3;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position, AdminLevel) VALUES
                    ('$username','$email','$hashedPassword','$position','$adminlevel')");
                    $conn->exec("INSERT INTO barangaytreasurer (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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

        // Check for barangay assistant secretary

        if($position == "Barangay Assistant Secretary"){
            $sql=$conn->prepare("SELECT * FROM barangayassistantsecretary");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 0){
                array_push($errors,"You cannot select the position of Barangay Assistant Secretary anymore as we already have a data on it.
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 4;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position, AdminLevel) VALUES
                    ('$username','$email','$hashedPassword','$position','$adminlevel')");
                    $conn->exec("INSERT INTO barangayassistantsecretary (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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

        // Check for barangay councilors

        if($position == "Barangay Councilor"){
            $sql=$conn->prepare("SELECT * FROM barangaycouncilor");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 7){
                array_push($errors,"You cannot select the position of Barangay Councilor anymore as we already have a data on it.
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 5;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position, AdminLevel) VALUES
                    ('$username','$email','$hashedPassword','$position','$adminlevel')");
                    $conn->exec("INSERT INTO barangaycouncilor (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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

        // Check for sk chairman

        if($position == "SK Chairman"){
            $sql=$conn->prepare("SELECT * FROM skchairman");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 0){
                array_push($errors,"You cannot select the position of SK Chairman anymore as we already have a data on it.
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 6;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position, AdminLevel) VALUES
                    ('$username','$email','$hashedPassword','$position','$adminlevel')");
                    $conn->exec("INSERT INTO skchairman (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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

        // Check for sk councilor

        if($position == "SK Councilor"){
            $sql=$conn->prepare("SELECT * FROM skcouncilor");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 7){
                array_push($errors,"You cannot select the position of SK Councilor anymore as we already have a data on it. 
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 7;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position, AdminLevel) VALUES
                    ('$username','$email','$hashedPassword','$position','$adminlevel')");
                    $conn->exec("INSERT INTO skcouncilor (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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

        // Check for sk treasurer

        if($position == "SK Treasurer"){
            $sql=$conn->prepare("SELECT * FROM sktreasurer");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 0){
                array_push($errors,"You cannot select the position of SK Treasurer anymore as we already have a data on it.
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 8;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position, AdminLevel) VALUES
                    ('$username','$email','$hashedPassword','$position','$adminlevel')");
                    $conn->exec("INSERT INTO sktreasurer (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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

        // Check for SK Secretary

        if($position == "SK Secretary"){
            $sql=$conn->prepare("SELECT * FROM sksecretary");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 0){
                array_push($errors,"You cannot select the position of SK Secretary anymore as we already have a data on it
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $adminlevel = 9;
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position, AdminLevel) VALUES
                    ('$username','$email','$hashedPassword','$position','$adminlevel')");
                    $conn->exec("INSERT INTO sksecretary (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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

        // Check for barangay tanod

        if($position == "Barangay Tanod"){
            $sql=$conn->prepare("SELECT * FROM barangaytanod");
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row > 0){
                array_push($errors,"You cannot select the position of Barangay Tanod anymore as we already have a data on it. 
                Please choose a proper selection. Thank you.");
            }

            if(count($errors) == 0){
                try{
                    $fullname = $fname . " " . $mname . " " . $lname;
                    $status = "active";
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $conn->beginTransaction();
                    $conn->exec("INSERT INTO employee (Username, Email, Password, Position) VALUES
                    ('$username','$email','$hashedPassword','$position')");
                    $conn->exec("INSERT INTO barangaytanod (Username, Prefix, FirstName, MiddleName, LastName, Suffix) VALUES
                    ('$username','$prefix','$fname','$mname','$lname','$suffix')");
                    $conn->exec("INSERT INTO attendance (fullname, position, status) VALUES
                    ('$fullname', '$position', '$status')");

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
                    header("Location: index.php");
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
    if(isset($_POST['btnTimeIn'])){
        $date = date('Y-m-d');
        $employeeNumber = checkInput($_POST['employeeNumber']);

        $sql=$conn->prepare("SELECT employee.employee_id, employee.Position, employee.Status, barangaychairman.FirstName, barangaychairman.MiddleName, barangaychairman.LastName FROM employee INNER JOIN barangaychairman ON employee.employee_id = barangaychairman.employee_id WHERE employee.employee_id=?");
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
            $sql=$conn->prepare("SELECT time_in FROM attendance WHERE employee_id=?");
            $sql->bind_param("s",$employeeNumber);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_array(MYSQLI_ASSOC);

            if($row['time_in'] > 0){
                if($date == $date){
                    array_push($errors, "You don't have the privelege to update your time-in. Please contact your administrator.");
                }
            }
            else {
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