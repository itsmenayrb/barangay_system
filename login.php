<?php
	include 'header.php';
?>
<div class="container-fluid" id="loginContainer">
	<form action="login.php" method="post" id="login-form">
		<?php include 'includes/errors.inc.php'; ?>
		<?php include 'includes/success.inc.php'; ?>
		<h2 class="fs-title text-center">Sign in to start your session</h2>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text fas fa-user"></span>
			</div>
			<input type="text" class="form-control" name="username" id="username" minlength="5" placeholder="Username" required/>
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text fas fa-lock"></span>
			</div>
			<input type="password" class="form-control" name="password" id="password" minlength="8" placeholder="Password" required/>
		</div>
		<div class="custom-control custom-checkbox" id="terms">
			<input type="checkbox" class="custom-control-input" id="checkboxRM" name="checkboxRM"/>
			<label class="custom-control-label" for="checkboxRM">Remember me.</label>
			<a class="float-right" href="forgotpassword.php" role="button">Forgot Password?</a>                       
		</div>          
		<br>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-primary" name="login" id="login" value="Sign In"/>
		</div>
	</form> <!-- END OF FORM-->
</div> <!-- END OF CONTAINER -->
<?php include 'footer.php'; ?>