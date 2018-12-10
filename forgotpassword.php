<?php
include 'header.php';
?>
<?php if(isset($_SESSION['Username'])) { ?>
    <section style="margin-top: 10px;">
      <div class="container">
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
        Meanwhile, you may <a href="account.settings.php">go to account settings</a> or log out first to reset your password.
    </p>
<?php } else { ?>
<div id="troubleTitle">
    <h1 class="h3 text-center text-dark pt-5" style="letter-spacing: 5px;">Having trouble signing in?</h1>
    <h1 class="h5 text-center text-dark" style="letter-spacing: 5px;">How do you want to change your password?</h1>
</div>
<div class="text-center mt-4 mb-4">
    <button class="btn btn-lg btn-info btn-primary-design" id="securityQuestionBtnShow">Via Security Question</button>
    <button class="btn btn-lg btn-info btn-primary-design" id="emailBtnShow">Via Email</button>
    <div class="container mt-3 mb-3">
        <?php include 'includes/errors.inc.php'; ?>
        <?php include 'includes/success.inc.php'; ?>
    </div>
</div>
<div id="securityQuestionDiv">
    <div id="securityQuestionDiv-bg-diagonal" class="bg-parallax"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="securityQuestionDiv-content-box">
                    <div id="securityQuestionDiv-content-box-outer">
                        <div id="securityQuestionDiv-content-box-inner">
                            <div class="content-title mb-3">
                                <h3 class="lead">Via Security Question</h3>
                            </div>
                            <form action="forgotpassword.php" method="POST" id="security-question-form"> <!-- FORM FOR SECURITY QUESTION -->
                                <div id="securityQuestionDiv-desc">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="username" id="username" autofocus="true" minlength="5" aria-describedby="rusernameHelpBlock" placeholder="<?php if($verified == false){
                                                    echo 'Email';
                                                } else {
                                                        echo 'Username';
                                                    }?>" value="<?php
                                                    if (!isset($_GET['verified'])){
                                                        
                                                    } else {
                                                        echo $_GET['verified'];
                                                    } ?>" required/>
                                        </div>
                                        <?php
                                         if ($verified == false){
                                            echo '<div class="col-md-4">
                                                <input type="submit" class="form-control btn btn-info" name="verifyUsername" id="verifyUsername" value="Verify"/>
                                            </div>';
                                            }
                                        ?>
                                    </div>
                                    <?php if ($verified == true) : ?>
                                        <small class="form-text text-muted">Security Question One</small>

                                        <?php echo "<input type='text' value='$displaySecOne' class='form-control' readonly/>"; ?>

                                        <small id='rsec1HelpBlock' class='form-text text-muted'>Security Question One <i>(Answer)</i></small>

                                        <input type='password' class='form-control' name='securityQuestionOneAnswer' id='securityquestiononeanswer' aria-describedby='rsec1HelpBlock' required/>

                                        <small class="form-text text-muted">Security Question Two</small>

                                        <?php echo "<input type='text' value='$displaySecTwo' class='form-control' readonly/>"; ?>

                                        <small id='rsec2HelpBlock' class='form-text text-muted'>Security Question Two <i>(Answer)</i></small>

                                        <input type='password' class='form-control' name='securityQuestionTwoAnswer' id='securityquestiontwoanswer' aria-describedby='rsec2HelpBlock' required/>

                                        <small id='rpasswordHelpBlock' class='form-text text-muted'>Type your new password</small>

                                        <input type='password' class='form-control' name='password' id='password' aria-describedby='rpasswordHelpBlock' minlength='8' required/>

                                        <small id='rcpasswordHelpBlock' class='form-text text-muted'>
                                            Re-type Password.
                                        </small>

                                        <input type='password' class='form-control' name='cpassword' id='cpassword' aria-describedby='rcpasswordHelpBlock' minlength='8' required/>
                                </div>
                                <div id="securityQuestionDiv-btn">
                                    <input type='submit' class='mt-3 btn btn-primary btn-primary-design' name='resetPassword' id='reset' value='Reset Password'/>
                                </div>
                                    <?php endif ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="emailDiv">
    <div id="emailDiv-bg-diagonal" class="bg-parallax"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="emailDiv-content-box">
                    <div id="emailDiv-content-box-outer">
                        <div id="emailDiv-content-box-inner">
                            <div class="content-title mb-3">
                                <h3 class="lead">Via Email</h3>
                            </div>
                            <form action="forgotpassword.php" method="POST" id="email-form"> <!-- FORM FOR EMAIL -->
                                <div id="emailDiv-desc">
                                    <div class="form-group">
                                        <input type="email" name="email" id="remail" autofocus="true" class="form-control" placeholder="Enter your email address" class="emailforresetpwd" aria-describedby="remailHelpBlock" required/>
                                        <small id="remailHelpBlock" class="form-text text-muted">To reset your password, enter your email and we will send reset password instructions on your email.</small><br>
                                    </div>
                                </div>
                                <div id="emailDiv-btn">
                                    <input type="submit" class="btn btn-primary btn-primary-design" id="send" name="send" value="Send"/>
                                </div>
                            </form> <!-- END OF FORM FOR EMAIL -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(window).scroll(function(){
            if($(this).scrollTop() > 200){
                $(".scrollToTop").fadeIn();
            } else {
                $(".scrollToTop").fadeOut();
            }
        });

        $(".scrollToTop").click(function(){
            $("html,body").animate({
                scrollTop: $("#troubleTitle").offset().top
            }, 1000);
        });

        $("#securityQuestionBtnShow").click(function(){
            $("html,body").animate({
                scrollTop: $("#securityQuestionDiv").offset().top
            }, 1000);
        });

        $("#emailBtnShow").click(function(){
            $("html,body").animate({
                scrollTop: $("#emailDiv").offset().top
            }, 1000);
        });
    });
    ('#email-form').validate();
    $('#security-question-form').validate();
    $('#con-security-question-form').validate({
        rules:{
            cpassword:{
                equalTo:"#password",
            }
        }
    });
</script>
<?php
include ('footer.php');
?>
<a href="#" class="scrollToTop"><i class="fa fa-arrow-up" aria-hidden="true">