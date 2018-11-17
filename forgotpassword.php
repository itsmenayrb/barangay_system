<?php
include 'header.php';
?>
<div class="container" id="fpContainer"> <!-- START OF CONTAINER CLASS -->
    <div class="row">
        <?php include 'includes/errors.inc.php'; ?>
        <?php include 'includes/success.inc.php';?>
    </div>
    <p class="h1">Choose how do you want to reset your password</p>
    <div class="carousel slide carousel-fade" id="myCarousel" data-ride="carousel"> <!-- CAROUSEL -->
        <ol class="carousel-indicators">
            <li data-target="myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <form action="forgotpassword.php" method="POST" id="security-question-form"> <!-- FORM FOR SECURITY QUESTION -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="username">Via Security Question</label>
                                <input type="text" class="form-control" name="username" id="username" autofocus="true" minlength="5" aria-describedby="rusernameHelpBlock" placeholder="Username or Email" value="<?php echo $username; ?>" required/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <label>&nbsp</label>
                                <input type="submit" class="form-control btn btn-info" name="verifyUsername" id="verifyUsername" value="Verify"/>
                            </div>
                        </div>
                    </div>
                    <?php if ($verified == true) : ?>
                        <div class='form-group'>
                            <div class="row">
                                <div class='col-md-6'>
                                    <small class="form-text text-muted">Security Question One</small>
                                    <?php echo "<input type='text' value='$displaySecOne' class='form-control' readonly/>"; ?>
                                </div>
                                <br>
                                <div class='col-md-6'>
                                    <small class="form-text text-muted">Security Question Two</small>
                                    <?php echo "<input type='text' value='$displaySecTwo' class='form-control' readonly/>"; ?>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <small id='rsec1HelpBlock' class='form-text text-muted'>Security Question One <i>(Answer)</i></small>
                                    <input type='password' class='form-control' name='securityQuestionOneAnswer' id='securityquestiononeanswer' aria-describedby='rsec1HelpBlock' required/>
                                </div>
                                <div class='col-md-6'>
                                    <small id='rsec2HelpBlock' class='form-text text-muted'>Security Question Two <i>(Answer)</i></small>
                                    <input type='password' class='form-control' name='securityQuestionTwoAnswer' id='securityquestiontwoanswer' aria-describedby='rsec2HelpBlock' required/>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                <small id='rpasswordHelpBlock' class='form-text text-muted'>Type your new password</small>
                                    <input type='password' class='form-control' name='password' id='password' aria-describedby='rpasswordHelpBlock' minlength='8' required/>
                                </div>
                                <div class='col-md-6'>
                                    <small id='rcpasswordHelpBlock' class='form-text text-muted'>
                                        Re-type Password.
                                    </small>
                                    <input type='password' class='form-control' name='cpassword' id='cpassword' aria-describedby='rcpasswordHelpBlock' minlength='8' required/>
                                </div>
                            </div>
                            <br>
                            <input type='submit' class='form-control btn btn-primary' name='resetPassword' id='reset' value='Reset Password'/>
                        </div>
                    <?php endif ?>
                </form>
            </div>
            <div class="carousel-item">
                <form action="forgotpassword.php" method="POST" id="email-form"> <!-- FORM FOR EMAIL -->
                    <div class="form-group">
                        <label for="remail">Via Email Address</label>
                        <input type="email" name="email" id="remail" autofocus="true" class="form-control" placeholder="Enter your email address" class="emailforresetpwd" aria-describedby="remailHelpBlock" required/>
                        <small id="remailHelpBlock" class="form-text text-muted">To reset your password, enter your email and we will send reset password instructions on your email.</small><br>
                        <input type="submit" class="form-control btn btn-primary" id="send" name="send" value="Send"/>
                    </div>
                </form> <!-- END OF FORM FOR EMAIL -->
            </div>
        </div>
        <!-- CONTROLS -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- END OF CAROUSEL -->
</div> <!-- END OF CONTAINER -->
<script>
    $('#email-form').validate();
    $('#security-question-form').validate();
    $('#con-security-question-form').validate({
        rules:{
            cpassword:{
                equalTo:"#password",
            }
        }
    });
    $('.carousel').carousel({
        interval: false
    });
</script>
<?php
include ('footer.php');
?>