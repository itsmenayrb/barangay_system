<?php
    include 'header.php';
?>
<?php if (isset($_SESSION['Username'])) { ?>
    <section style="margin-top: 10px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="margin-top: 10px;" class="text-danger">404 Error Page</h1>
          </div>
          <div class="col-sm-6" style="margin-top: 10px;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">404 Error Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <p class="text-center display-4"><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</p>
    <p class="text-center h1">
        We could not find the page you were looking for.
        Meanwhile, you may <a href="index.php">return to Home page</a> or log out first to register.
    </p>
<?php } else { ?>
    <div id="register">
        <div id="register-bg-diagonal" class="bg-parallax"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="register-content-box">
                        <div id="register-content-box-outer">
                            <div id="register-content-box-inner">
                                <form action="register.php" method="post" id="registration-form" autocomplete="off">
                                    <?php include 'includes/errors.inc.php'; ?>
                                    <?php include 'includes/success.inc.php';?>
                                    <div class="content-title">
                                        <h6 class="lead">Experience hassle-free transaction.</h6>
                                    </div>
                                    <div id="register-desc">
                                        <h1 class="h2 mb-4">Sign up</h1>
                                        <h1 class="lead">Username</h1>
                                        <input type="text" autofocus="true" value="<?php echo $username; ?>" name="username" id="reg-username" class="form-control" aria-describedby="usernameHelpBlock" minlength="5" required/>
                                        <small id="usernameHelpBlock" class="form-text text-muted">
                                            Username must at least five characters long, contain letters or numbers and must not contain spaces.
                                        </small>
                                        <h1 class="lead">Email</h1>
                                        <input type="email" name="email" value="<?php echo $email; ?>" id="reg-email" class="form-control" aria-describedby="emailHelpBlock" required/>
                                        <small id="emailHelpBlock" class="form-text text-muted">
                                            Please enter a valid email. e.g example@domain.com
                                        </small>
                                        <h1 class="lead">First Security Question</h1>
                                        <select name="securityquestionone" id="reg-securityquestionone" class="form-control">
                                            <option value="" class="form-control" selected><i>(Choose One)</i></option>
                                            <option value="What is the name of your first pet?" class="form-control">What is the name of your first pet?</option>
                                            <option value="What was your favorite place to visit as a child?" class="form-control">What was your favorite place to visit as a child?</option>
                                            <option value="Who is your favorite actor?" class="form-control">Who is your favorite actor?</option>
                                            <option value="What high school did you attend?" class="form-control">What high school did you attend?</option>
                                            <option value="What street did you grow up on?" class="form-control">What street did you grow up on?</option>
                                            <option value="What is your favorite color?" class="form-control">What is your favorite color?</option>
                                        </select>
                                        <input type="password" name="securityquestiononeanswer" class="form-control" id="reg-securityquestiononeanswer" aria-describedby="secQOneHelpBlock" required/>
                                        <small id="secQOneHelpBlock" class="form-text text-muted">
                                            Select a preferred question and answer it on the textbox above. Do not forget your answer.
                                        </small>
                                        <h1 class="lead">Second Security Question</h1>
                                        <select name="securityquestiontwo" id="reg-securityquestiontwo" class="form-control">
                                            <option value="" selected class="form-control"><i>(Choose One)</i></option>
                                            <option value="Who is your favorite singer?" class="form-control">Who is your favorite singer?</option>
                                            <option value="What is the name of your favorite teacher?" class="form-control">What is the name of your favorite teacher?</option>
                                            <option value="In what city were you born?" class="form-control">In what city were you born?</option>
                                            <option value="What is your favorite movie?" class="form-control">What is your favorite movie?</option>
                                            <option value="What is the name of your first school?" class="form-control">What is the name of your first school?</option>
                                            <option value="When is your anniversary?" class="form-control">When is your anniversary?</option>
                                        </select>
                                        <input type="password" name="securityquestiontwoanswer" class="form-control" id="reg-securityquestiontwoanswer" aria-describedby="secQTwoHelpBlock" required/>
                                        <small id="secQTwoHelpBlock" class="form-text text-muted">
                                            Select a preferred question and answer it on the textbox above. Do not forget your answer.
                                        </small>
                                        <h1 class="lead">Password</h1>
                                        <input type="password" class="form-control" name="password" id="reg-password" aria-describedby="passwordHelpBlock" minlength="8" required/>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Password must contain at least eight characters long, contain letters or numbers and must not contain spaces.
                                        </small>
                                        <h1 class="lead">Confirm Password</h1>
                                        <input type="password" class="form-control" name="cpassword" id="reg-cpassword" aria-describedby="cpasswordHelpBlock" minlength="8" required/>
                                        <small id="cpasswordHelpBlock" class="form-text text-muted">
                                            Re-type Password.
                                        </small>
                                        <br>
                                    </div>
                                    <div id="register-btn">
                                        <a href="#registerPersonal" class="btn btn-info btn-primary-design" id="nextRegister" role="button">Next</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="registerPersonal" class="mb-3">
        <div id="registerPersonal-bg-diagonal" class="bg-parallax"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="registerPersonal-content-box">
                        <div id="registerPersonal-content-box-outer">
                            <div id="registerPersonal-content-box-inner">
                                <div class="content-title">
                                    <h6 class="lead">Personal Details</h6>
                                </div>
                                <div id="registerPersonal-desc">
                                    <h1 class="h2 mb-4">We will never sell your information.</h1>
                                    <h1 class="lead">Full Name</h1>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="prefix" id="reg-prefix" class="form-control" required>
                                                <option value="" selected class="form-control"></option>
                                                <option value="Dr" class="form-control">Dr.</option>
                                                <option value="Mr" class="form-control">Mr.</option>
                                                <option value="Ms" class="form-control">Ms.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" value="<?php echo $fname; ?>" name="fname" id="reg-fname" placeholder="First" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" value="<?php echo $mname; ?>" name="mname" id="reg-mname" placeholder="Middle" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="<?php echo $lname; ?>" name="lname" id="reg-lname" placeholder="Last" required/>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="suffix" id="reg-suffix" class="form-control">
                                                <option value="" selected class="form-control"></option>
                                                <option value="Jr" class="form-control">Jr.</option>
                                                <option value="Sr" class="form-control">Sr.</option>
                                                <option value="III" class="form-control">III</option>
                                                <option value="IV" class="form-control">IV</option>
                                                <option value="V" class="form-control">V</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h1 class="lead">Gender</h1>
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="gender" value="Male"/>
                                                    <label class="custom-control-label">Male</label>
                                                </div>
                                                &nbsp;&nbsp;&nbsp;
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="gender" value="Female"/>
                                                    <label class="custom-control-label">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h1 class="lead">Birthdate</h1>
                                            <input type="text" class="form-control" value="<?php echo $birthday; ?>" id="reg-birthday" name="birthday" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <h1 class="lead">Age</h1>
                                            <input type="text" id="reg-age" name="age" value="<?php echo $age; ?>" class="form-control" style="border-left: none; border-right: none; border-top: none; border-radius: 0;" readonly/>
                                        </div>
                                    </div>
                                    <h1 class="lead">Birthplace</h1>
                                    <input type="text" class="form-control" value="<?php echo $birthplace; ?>" name="birthplace" />
                                    <br>
                                    <h1 class="lead">Address</h1>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <small class="form-text text-muted">House no./Lot/Block</small>
                                            <input type="text" class="form-control" value="<?php echo $block; ?>" id="reg-block" name="block" aria-describedby="blockHelpBlock" required/>
                                        </div>
                                        <div class="col-md-4">
                                            <small class="form-text text-muted">Street</small>
                                            <input type="text" class="form-control" id="reg-street" value="<?php echo $street; ?>" name="street" aria-describedby="streetHelpBlock"  required/>
                                        </div>
                                        <div class="col-md-4">
                                            <small class="form-text text-muted">Subdivision</small>
                                            <input type="text" class="form-control" id="reg-subdivision" value="<?php echo $subdivision; ?>" name="subdivision" aria-describedby="subdivisionHelpBlock" required/>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="text" placeholder="Barangay Salitran II, Dasmariñas City, Cavite, Philippines, 4114" class="form-control" readonly>
                                    <br>
                                    <h1 class="lead">Contact Number</h1>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small id="tnHelpBlock" class="form-text text-muted">Telephone Number</small>
                                            <input type="text" class="form-control" id="reg-telephonenumber" name="telephonenumber" minlength="10" maxlength="10" placeholder="046xxxxxxx" aria-describedby="tnHelpBlock" />
                                        </div>
                                        <div class="col-md-6">
                                            <small id="cnHelpBlock" class="form-text text-muted">Cellphone Number</small>
                                            <input type="text" class="form-control" id="reg-cellphonenumber" name="cellphonenumber" minlength="11" maxlength="11" placeholder="09xxxxxxxxx" aria-describedby="cnHelpBlock"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-checkbox text-center" id="terms">
                                        <input type="checkbox" class="custom-control-input" id="checkboxTerms" name="checkboxTerms" required/>
                                        <label class="custom-control-label" for="checkboxTerms">By creating an account, you are agreeing to our <a href="#"><u>Terms</u></a> and <a href="#"><u>Privacy</u></a> Policy.</label>
                                    </div>
                                </div>
                                <br>
                                <div id="registerPersonal-btn">
                                    <input type="submit" name="submit" class="btn btn-lg btn-success btn-primary-design" value="Register"/><br><br>
                                    <a href="#register" class="btn btn-sm btn-info btn-primary-design" role="button" id="previousRegister">Previous</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="scrollToTop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
<?php } ?>
<script>
    $('#registration-form').validate({
        rules:{
            cpassword:{
                equalTo:"#reg-password",
            }
        }
    });
    $(document).ready(function() {
        var age = "";
        $('#reg-birthday').datepicker({
            autoSize: true,
            yearRange: "-100:",
            maxDate: "-12Y",
            onSelect: function(value, ui) {
                var today = new Date();
                age = today.getFullYear() - ui.selectedYear;
                $('#reg-age').val(age);
            },
            changeMonth: true,
            changeYear: true
        });
    });

    $(window).scroll(function(){
        if($(this).scrollTop() > 200){
            $(".scrollToTop").fadeIn();
        } else {
            $(".scrollToTop").fadeOut();
        }
    });

    $(".scrollToTop").click(function(){
        $("html,body").animate({
            scrollTop: 0
        }, 1000);
    });

    $("#nextRegister").click(function(){
        $("html,body").animate({
            scrollTop: $("#registerPersonal").offset().top
        }, 1000);
    });

    $("#previousRegister").click(function(){
        $("html,body").animate({
            scrollTop: $("#register").offset().top
        }, 1000);
    });
</script>
<?php include 'footer.php'; ?>