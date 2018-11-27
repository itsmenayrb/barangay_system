<!-- this page is for all the links and scripts --
-- that will run to website -->
<?php
    include '../includes/dbh.inc.php';
    include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico"/>
    <!-- BOOTSTRAP, js AND CSS SCRIPT -->
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery-ui.css">
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/alertifyjs/css/alertify.min.css">
    <script type="text/javascript" src="../assets/alertifyjs/alertify.min.js"></script>
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/buttons.print.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/pdfmake.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/jszip.min.js"></script>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="../assets/font-awesome/webfonts/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- END OF BOOSTRAP AND CSS SCRIPT -->
</head>
<body>
    <?php if(isset($_SESSION['adminPosition'])) : ?>
        <div class="container-fluid">
            <div class="row wrapper">
                <aside class="col-12 col-sm-3 p-0 bg-dark">
                    <nav class="navbar navbar-expand-sm navbar-dark bg-dark align-items-start flex-sm-column flex-row">
                        <a class="navbar-brand" href="#"><img src="../img/logo.circle.brand.png" width="30" height="30" alt=""/> Barangay Salitran II</a>
                        <a href class="navbar-toggler" data-toggle="collapse" data-target=".sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </a>
                        <div class="collapse navbar-collapse sidebar">
                            <ul class="flex-column navbar-nav w-100 justify-content-between">
                                <p class="lead text-light pl-0">You are signed-in as <a href="#" class="btn-link"><?php echo $_SESSION['adminUsername']; ?></a></p>
                                <img src="../img/profile-photo-png.png" class="offset-4 offset-sm-0 offset-lg-4 offset-md-4" width="120" height="120" />
                                <small class="form-text text-muted offset-4 offset-md-4 mb-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Administrator</small>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="dashboard.php"><i class="fa fa-home fa-fw"></i> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="appointments.php"><i class="fa fa-calendar-check fa-fw"></i> Appointments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="message.php"><i class="fa fa-envelope fa-fw"></i> Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="members.php"><i class="fa fa-user fa-fw"></i> Members</a>
                                </li>
                                <li class="nav-item mb-3">
                                    <a class="nav-link pl-0" href="user_req.php"><i class="fa fa-question fa-fw"></i> User Requests</a>
                                </li>
                                <div class="dropdown-divider" style="width: 100%; margin: 0 auto;"></div>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="attendance.php"><i class="fa fa-user-check fa-fw"></i> Attendance</a>
                                </li>
                                <div class="dropdown-divider mb-3" style="width: 100%; margin: 0 auto;"></div>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="signout.php"><i class="fa fa-sign-out-alt fa-fw"></i> Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </aside>
    <?php endif ?>