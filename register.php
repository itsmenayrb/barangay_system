<?php
    include 'header.php';
?>
<div class="container" id="regContainer">
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
        <form action="register.php" method="post" id="registration-form" autocomplete="off">
            <?php include 'includes/errors.inc.php'; ?>
            <?php include 'includes/success.inc.php';?>
            <br>
            <div class="progressbarBackground">
                <ul id="progressbar">
                    <li class="active">Account Setup</li>
                    <li>Personal Details</li>
                </ul>
            </div>
            <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" autofocus="true" value="<?php echo $username; ?>" name="username" id="reg-username" class="form-control" aria-describedby="usernameHelpBlock" minlength="5" required/>
                    <small id="usernameHelpBlock" class="form-text text-muted">
                        Username must at least five characters long, contain letters or numbers and must not contain spaces.
                    </small>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" id="reg-email" class="form-control" aria-describedby="emailHelpBlock" required/>
                    <small id="emailHelpBlock" class="form-text text-muted">
                        Please enter a valid email. e.g example@domain.com
                    </small>
                </div>
                <div class="form-group">
                    <label for="securityquestionone">Security Question 1</label>
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
                </div>
                <div class="form-group">
                    <label for="securityquestiontwo">Security Question 2</label>
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
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="reg-password" aria-describedby="passwordHelpBlock" minlength="8" required/>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Password must contain at least eight characters long, contain letters or numbers and must not contain spaces.
                    </small>
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="reg-cpassword" aria-describedby="cpasswordHelpBlock" minlength="8" required/>
                    <small id="cpasswordHelpBlock" class="form-text text-muted">
                        Re-type Password.
                    </small>
                </div>
                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">We will never sell your information</h3>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="prefix">Prefix</label>
                        <select name="prefix" id="reg-prefix" class="form-control" required>
                            <option value="" selected class="form-control"></option>
                            <option value="Dr" class="form-control">Dr.</option>
                            <option value="Mr" class="form-control">Mr.</option>
                            <option value="Ms" class="form-control">Ms.</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $fname; ?>" name="fname" id="reg-fname" placeholder="Juan" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control" value="<?php echo $mname; ?>" name="mname" id="reg-mname" placeholder="Dela" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $lname; ?>" name="lname" id="reg-lname" placeholder="Cruz" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="suffix">Suffix</label>
                        <select name="suffix" id="reg-suffix" class="form-control">
                            <option value="" selected class="form-control"></option>
                            <option value="Jr" class="form-control">Jr.</option>
                            <option value="Sr" class="form-control">Sr.</option>
                            <option value="III" class="form-control">III</option>
                            <option value="IV" class="form-control">IV</option>
                            <option value="V" class="form-control">V</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthday">Birthdate</label>
                            <input type="text" class="form-control" value="<?php echo $birthday; ?>" id="reg-birthday" name="birthday" required/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" id="reg-age" name="age" value="<?php echo $age; ?>" class="form-control" readonly/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Address</label><small class="form-class text-muted">(Write N/A if not applicable)</small>
                    <div class="row">
                        <div class="col-md-4">
                            <small id="blockHelpBlock" class="form-text text-muted">Block/Lot/House No.</small>
                            <input type="text" class="form-control" value="<?php echo $block; ?>" id="reg-block" name="block" aria-describedby="blockHelpBlock" required/>
                        </div>
                        <div class="col-md-4">
                            <small id="streetHelpBlock" class="form-text text-muted">Street</small>
                            <input type="text" class="form-control" id="reg-street" value="<?php echo $street; ?>" name="street" aria-describedby="streetHelpBlock"  required/>
                        </div>
                        <div class="col-md-4">
                            <small id="subdivisionHelpBlock" class="form-text text-muted">Subdivision</small>
                            <input type="text" class="form-control" id="reg-subdivision" value="<?php echo $subdivision; ?>" name="subdivision" aria-describedby="subdivisionHelpBlock" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <small id="barangayHelpBlock" class="form-text text-muted">Barangay</small>
                            <input type="text" class="form-control" placeholder="Salitran II" aria-describedby="subdivisionHelpBlock" readonly/>
                        </div>
                        <div class="col-md-4">
                            <small id="cityHelpBlock" class="form-text text-muted">City/Municipality</small>
                            <input type="text" class="form-control" placeholder="Dasmariñas City" aria-describedby="cityHelpBlock" readonly/>
                        </div>
                        <div class="col-md-4">
                            <small id="provinceHelpBlock" class="form-text text-muted">Province</small>
                            <input type="text" class="form-control" placeholder="Cavite" aria-describedby="provinceHelpBlock" readonly/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <small id="countryHelpBlock" class="form-text text-muted">Country</small>
                            <input type="text" class="form-control" placeholder="Philippines" aria-describedby="countryHelpBlock" readonly/>
                        </div>
                        <div class="col-md-4">
                            <small id="zipHelpBlock" class="form-text text-muted">Zip Code</small>
                            <input type="text" class="form-control" placeholder="4114" aria-describedby="zipHelpBlock" readonly/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <div class="row">
                        <div class="col-md-6">
                            <small id="tnHelpBlock" class="form-text text-muted">Telephone Number</small>
                            <input type="text" class="form-control" id="reg-telephonenumber" name="telephonenumber" minlength="10" maxlength="10" placeholder="0461234567" aria-describedby="tnHelpBlock" />
                        </div>
                        <div class="col-md-6">
                            <small id="cnHelpBlock" class="form-text text-muted">Cellphone Number</small>
                            <input type="text" class="form-control" id="reg-cellphonenumber" name="cellphonenumber" minlength="11" maxlength="11" placeholder="09123456789" aria-describedby="cnHelpBlock"/>
                        </div>
                    </div>
                </div>
                <div class="custom-control custom-checkbox text-center" id="terms">
                    <input type="checkbox" class="custom-control-input" id="checkboxTerms" name="checkboxTerms" required/>
                    <label class="custom-control-label" for="checkboxTerms">By creating an account, you are agreeing to our <a href="#"><u>Terms</u></a> and <a href="#"><u>Privacy</u></a> Policy.</label>
                </div>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="submit" name="submit" class="submit action-button" value="Submit" />
            </fieldset>
        </form>
    <?php } ?>
</div> <!-- END OF CLASS CONTAINER -->
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

    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function(){
        if(animating) return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
            'transform': 'scale('+scale+')',
            'position': 'absolute'
          });
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 800,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function(){
        if(animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            },
            duration: 800,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
</script>