<?php
    session_start();
    include "includes/functions.inc.php";
    include 'includes/action.inc.php';
    include 'includes/communication.action.inc.php';
    include 'includes/appointment.request.handler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Barangay Salitran II</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico"/>

    <!-- BOOTSTRAP, js AND CSS SCRIPT -->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.timepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/webfonts/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- END OF BOOSTRAP AND CSS SCRIPT -->

    <div class="jumbotron jumbotron-fluid"> <!-- JUMBOTRON -->
        <div class="container">
            <div class="row">
                <div class="d-none d-md-block col-md-2 col-lg-2">
                    <a href="index.php"><img src="img/logo.png" class="img-responsive" height="135" width="135" style="margin-top: 10px;margin-left: 10px;max-width: 100%;height: auto;"></a>
                </div>
                <div class="d-none d-md-block col-sm-7 col-md-6 col-lg-5" style="font-family: 'Baskerville Old Face';">
                    <label class="h6" style="margin-top: 20px; font-size: 2vw;"><u>Republic of the Philippines</u></label><br>
                    <label class="h1" style="margin-top: -10px;margin-left: -25px;font-size: 3vw;">Barangay Salitran II</label><br>
                    <label class="h4" style="margin-top: -20px;font-size: 2vw;">City of Dasmariñas, Province of Cavite</label>
                </div>
                <div class="d-none d-md-block col-sm-3 col-md-4 col-lg-5 text-right" style="font-family: 'Baskerville Old Face';">
                    <label class="h6" style="margin-top: 40px;font-size: 1.75vw;"><u>Philippine Standard Time</u></label>
                    <label class="h6" style="margin-top: -10px;font-size: 1.75vw;"><?php date_default_timezone_set("Asia/Hong_Kong"); echo date("l,m/d/Y") . " "; echo date("h:i:sa"); ?></label>
                </div>
            </div>
        </div>
    </div> <!-- END OF JUMBOTRON -->

    <!-- START OF NAVIGATION -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container" style="padding-left: 50px; padding-right: 50px; margin: 0; max-width: 100%;">
            <a class="navbar-brand" href="index.php">Barangay Salitran II</a>
            <!-- Brand and toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainNavigation" aria-expanded="false"
            aria-controls="mainNavigation" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contain links, forms  and other data for toggling -->
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php"><span class="fas fa-home"></span> Home<span class="sr-only">(current)</span> </a> </li>
                    <li class="nav-item"><a class="nav-link" href="index.php"><span class="fas fa-newspaper"></span> News</a> </li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fas fa-table"></span> Services</a> </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><span class="fas fa-download"></span> Downloads</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"><span class="fas fa-id-card"></span> Barangay ID</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><span class="fas fa-file"></span> Barangay Clearance</a>
                            <a class="dropdown-item" href="#"><span class="fas fa-file"></span> Cedula</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><span class="fas fa-comments"></span> Contact US</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="cursor: pointer;" role="button" data-toggle="modal" data-target="#commendationModal">Commendations</a>
                            <a class="dropdown-item" style="cursor: pointer;" role="button" data-toggle="modal" data-target="#suggestionModal">Suggestions and Recommendations</a>
                            <a class="dropdown-item" style="cursor: pointer;" role="button" data-toggle="modal" data-target="#inquiryModal">Inquire</a>
                            <a class="dropdown-item" style="cursor: pointer;" role="button" data-toggle="modal" data-target="#alertModal">File a complaint</a>
                            <a class="dropdown-item" style="cursor: pointer;" role="button" data-toggle="modal" data-target="#faqModal">FAQ's</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 form-control-sm" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info btn-sm mr-sm-5" type="submit"><span class="fas fa-search"></span> Search</button>
                    <?php if(isset($_SESSION['Username'])){ ?>
                        <li class="navbar-nav dropdown"> 
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;"><span class="fas fa-user-alt"></span> <?php echo $_SESSION['Username'];?></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="profile.php" class="dropdown-item">Profile</a>
                                <a href='update.resident.php' class="dropdown-item">Account Settings</a>
                                <a href='#' class="dropdown-item">Security Settings</a>
                                <div class="dropdown-divider"></div>
                                <a href='includes/logout.inc.php' class="dropdown-item">Sign Out</a>
                            </div>
                        </li>
                    <?php } else { ?>
                            <a role='button' class='btn btn-primary btn-sm' style="margin-right: 10px;" href="login.php"><span class="fas fa-user"></span> Login</a>
                            <a role='button' class='btn btn-outline-secondary btn-sm' href="register.php"><span class="fas fa-user-plus"></span> Register</a>
                    <?php } ?>
                </form>
            </div>
        </div>
    </nav>
    <!-- END OF NAVIGATION -->
    <!-- CONTACT US CORNER -->
    <!-- COMMENDATION -->
    <div class="modal fade" id="commendationModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Commendation</h3>
                    <button class="close" type="button" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="post" action="" id="commendationForm">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <small class="form-text text-muted">First Name</small>
                                        <input type="text" class="form-control" name="firstname" required/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <small class="form-text text-muted">Last Name</small>
                                        <input type="text" class="form-control" name="lastname" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Email</small>
                                <input type="text" class="form-control" name="email" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Name of Employee or Department</small>
                                <input type="text" class="form-control" name="employeename" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Subject</small>
                                <input type="text" class="form-control" name="subject" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Message</small>
                                <textarea name="commendation" id="commendation" cols="25" rows="8" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" name="commend" value="Send"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SUGGESTIONS -->
    <div class="modal fade" id="suggestionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Suggestions</h3>
                    <button class="close" type="button" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="post" action="" id="suggestForm">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <small class="form-text text-muted">First Name</small>
                                        <input type="text" class="form-control" name="firstname" required/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <small class="form-text text-muted">Last Name</small>
                                        <input type="text" class="form-control" name="lastname" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Email</small>
                                <input type="text" class="form-control" name="email" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Subject</small>
                                <input type="text" class="form-control" name="subject" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Message</small>
                                <textarea name="suggestion" id="suggestion" cols="25" rows="8" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" name="suggest" value="Send"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- INQUIRY -->
    <div class="modal fade" id="inquiryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Inquiry</h3>
                    <button class="close" type="button" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="post" action="" id="inquireForm">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <small class="form-text text-muted">First Name</small>
                                        <input type="text" class="form-control" name="firstname" required/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <small class="form-text text-muted">Last Name</small>
                                        <input type="text" class="form-control" name="lastname" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Email</small>
                                <input type="text" class="form-control" name="email" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Contact Number:</small>
                                <input type="text" class="form-control" name="contactnumber" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Subject</small>
                                <input type="text" class="form-control" name="subject" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Message</small>
                                <textarea name="inquiry" id="inquiry" cols="25" rows="8" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" name="inquire" value="Inquire"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COMPLAINT -->
    <div class="modal fade" id="alertModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Reminder</h3>
                    <button class="close" type="button" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <p class="text-justify">Please ensure that your contact information is full and correct as all reports
                            and complaints needs a deep investigation and verification. Rest Assured that your
                            credentials will be kept confidential. Thank you.
                        </p>
                        <input type="button" class="btn btn-default float-right" data-dismiss="modal"
                        data-toggle="modal" data-target="#complaintModal" value="OK"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="complaintModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Report</h3>
                    <button class="close" type="button" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="post" action="" id="complaintForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <small class="form-text text-muted">First Name:</small>
                                        <input type="text" class="form-control" name="firstname" required/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <small class="form-text text-muted">Last Name:</small>
                                        <input type="text" class="form-control" name="lastname" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Contact Number:</small>
                                <input type="text" class="form-control" name="contactnumber" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Email:</small>
                                <input type="text" class="form-control" name="email" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Subject</small>
                                <input type="text" class="form-control" name="subject" required/>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Message</small>
                                <textarea name="complaintMessage" id="complaintMessage" cols="25" rows="8" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <small class="form-text text-muted">Attachment</small>
                                <input type="file" name="attachment[]" id="attachment" class="form-control" multiple/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" name="complaint" value="File"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ'S -->
    <div class="modal fade" id="faqModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center">Frequently Asked Question</h3>
                    <button class="close" type="button" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <p class="display-4">Under Construction ... </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</head>
<script>
    $('#inquireForm').validate();
    $('#complaintForm').validate();
</script>
<body>