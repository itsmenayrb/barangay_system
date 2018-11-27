<!-- this page is for admin registration -->
<?php include 'server.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP, js AND CSS SCRIPT -->
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery-ui.css">
    <link href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- END OF BOOSTRAP AND CSS SCRIPT -->
</head>
<body>
    <div class="container" id="register-container">
        <div class="content">
            <?php include 'errors.php'; ?>
            <?php include 'success.php'; ?>
            <legend class="form-text text-center">Register</legend>
            <form action="admin-register.php" method="post" id="admin-reg-form">
                <div class="form-group">
                    <label for="position">Position</label>
                    <select class="form-control" id="position" name="admin-position" required>
                        <option value="" selected></option>
                        <option value="Barangay Chairman">Barangay Chairman</option>
                        <option value="Barangay Councilor">Barangay Councilor</option>
                        <option value="Barangay Secretary">Barangay Secretary</option>
                        <option value="Barangay Assistant Secretary">Barangay Assistant Secretary</option>
                        <option value="Barangay Treasurer">Barangay Treasurer</option>
                        <option value="SK Chairman">SK Chairman</option>
                        <option value="SK Councilor">SK Councilor</option>
                        <option value="SK Secretary">SK Secretary</option>
                        <option value="SK Treasurer">SK Treasurer</option>
                        <option value="Barangay Tanod">Barangay Tanod</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <small class="form-text text-muted">Prefix</small>
                            <select class="form-control" name="admin-prefix" required>
                                <option value=""></option>
                                <option value="Mr">Mr.</option>
                                <option value="Ms">Ms.</option>
                                <option value="Dr">Dr.</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                            <small class="form-text text-muted">First Name</small>
                            <input type="text" class="form-control" name="admin-fname" placeholder="Juan" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <small class="form-text text-muted">Middle Name</small>
                            <input type="text" class="form-control" name="admin-mname" placeholder="Dela"/>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <small class="form-text text-muted">Last Name</small>
                            <input type="text" class="form-control" name="admin-lname" placeholder="Cruz" required/>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <small class="form-text text-muted">Suffix</small>
                            <select class="form-control" name="admin-suffix">
                                <option value=""></option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                                <option value="Jra">Jra</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="III">Ph.D</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="form-text">Address</label>
                    <input type="text" class="form-control" name="admin-address" id="address" required/>
                </div>
                <div class="form-group">
                    <label for="contact" class="form-text">Contact</label>
                    <input type="text" class="form-control" name="admin-contact" maxlength="11" id="contact" required/>
                </div>
                <div class="form-group">
                    <label for="username" class="form-text">Username</label>
                    <input type="text" class="form-control" name="admin-username" id="username" minlength="5" required/>
                </div>
                <div class="form-group">
                    <label for="email" class="form-text">Email</label>
                    <input type="email" class="form-control" name="admin-email" id="email" required/>
                </div>
                <div class="form-group">
                    <label for="password" class="form-text">Password</label>
                    <input type="password" class="form-control" name="admin-password" id="password" minlength="8" required/>
                </div>
                <div class="form-group">
                    <label for="cpassword" class="form-text">Confirm Password</label>
                    <input type="password" class="form-control" name="admin-cpassword" id="cpassword" minlength="8" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" name="admin-register" id="register" value="Register"/>
                </div>
            </form>
            <small class="form-text text-muted text-center">Have an account? <a href="index.php" role="button">Log in.</a></small>
        </div>
    </div>
</body>
<script>
    $("#admin-reg-form").validate({
        rules:{
            cpassword:{
                equalTo:"#password",
            }
        }
    });
</script>
</html>