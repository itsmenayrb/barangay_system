<?php
	include 'header.php';
?>
<?php if(isset($_SESSION['Username'])) { ?>
	<div class="container">
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
            We could not find the page you were looking for because you are already login.
        </p>
  	</div>
<?php } else { ?>
	<div id="signIn">
		<div id="signIn-bg-diagonal" class="bg-parallax"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="signIn-content-box">
						<div id="signIn-content-box-outer">
							<div id="signIn-content-box-inner">
								<form action="login.php" method="post" id="login-form">
										<?php include 'includes/errors.inc.php'; ?>
										<?php include 'includes/success.inc.php'; ?>
								<div class="content-title">
									<h3 class="pb-2">Sign In to start your session</h3>
								</div>
									<div id="signIn-desc">
										<h1 class="lead">Username:</h1>
										<input type="text" class="form-control" name="username" id="username" minlength="5" required/>
										<h1 class="lead">Password:</h1>
										<input type="password" class="form-control" name="password" id="password" minlength="8" required/>
										<br>
										<div class="custom-control custom-checkbox" id="terms">
											<input type="checkbox" class="custom-control-input" id="checkboxRM" name="checkboxRM"/>
											<label class="custom-control-label" for="checkboxRM">Remember me.</label>
											<a class="float-right" href="forgotpassword.php" role="button">Forgot Password?</a>
										</div>
									</div>
									<div id="signIn-btn">
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-primary-design" name="login" id="login" value="Sign In"/>
										</div>
									</div>
								</form> <!-- END OF FORM-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<script type="text/javascript">
	$("#login-form").validate();
</script>
<?php include 'footer.php'; ?>