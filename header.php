<?php
    session_start();
    include "includes/functions.inc.php";
    include 'includes/action.inc.php';
    include 'includes/communication.action.inc.php';
    include 'includes/appointment.request.handler.php';
    include 'includes/set.subaccount.as.primary.handler.php';
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
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="./assets/datatables/datatables.min.css">
    <script type="text/javascript" src="./assets/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="./assets/datatables/buttons.print.min.js"></script>
    <script type="text/javascript" src="./assets/datatables/pdfmake.min.js"></script>
    <script type="text/javascript" src="./assets/datatables/jszip.min.js"></script>
    <!-- END OF BOOSTRAP AND CSS SCRIPT -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(window).on('scroll',function(){
                if($(window).scrollTop()){
                    $('nav').addClass('black');
                } else {
                    $('nav').removeClass('black');
                }
            });

            $(".menu-icon").on("click", function(){
                $("nav ul").toggleClass("showing");
            });

            $("#viewNews").click(function(){
            $("html,body").animate({
                scrollTop: $("#news").offset().top
            }, 1000);
        });
        });
    </script>
</head>
<body>
    <div id="top" style="display: none;"></div>
    <nav class="navbar navbar-dark sticky-top navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-center" href="index.php">Barangay Salitran II</a>
            <!-- Brand and toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mainNavigation" aria-expanded="false"
            aria-controls="mainNavigation" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contain links, forms  and other data for toggling -->
            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav mr-md-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php"><span class="fas fa-home"></span> Home<span class="sr-only">(current)</span> </a> </li>
                    <li class="nav-item"><a class="nav-link" id="viewNews" href="#news"><span class="fas fa-newspaper"></span> News</a> </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><span class="fas fa-download"></span> Forms</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="docs/barangay clearance.pdf"><span class="fas fa-file"></span> Barangay Clearance</a>
                            <a class="dropdown-item" href="docs/barangay certification.pdf"><span class="fas fa-file"></span> Barangay Certificate</a>
                            <a class="dropdown-item" href="docs/barangay endorsement.pdf"><span class="fas fa-file"></span> Barangay Endorsement</a>
                            <a class="dropdown-item" href="docs/barangay business.pdf"><span class="fas fa-file"></span> Business Clearance </a>
                            <a class="dropdown-item" href="docs/barangay indigency.pdf"><span class="fas fa-file"></span> Indigency Certificate</a>
                            <!--pre wala daw barangay id at cedula sa salitran-->
                            <!-- <div class="dropdown-divider"></div> -->
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
    <section class="headerTitle text-center text-white mb-2">
        <div class="textHeaderTitle">
            <p class="h4">Republic of the Philippines</p>
            <p class="display-3">Barangay Salitran II</p>
            <p class="h6">City of Dasmariñas, Province of Cavite.</p>
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
                        <form method="post" action="./includes/communication.action.inc.php" id="suggestForm">
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
                        <form method="post" action="./includes/communication.action.inc.php" id="inquireForm">
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
                        <form method="post" action="./includes/communication.action.inc.php" id="complaintForm" enctype="multipart/form-data">
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
                                <input type="file" name="files[]" id="attachment" class="form-control" multiple/>
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
