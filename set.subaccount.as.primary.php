<?php include 'header.php'; ?>
	<?php if(!isset($_SESSION['Username'])) { ?>
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
	            We could not find the page you were looking for.
	            Meanwhile, you may <a href="index.php">return to Home page</a> and try to log in.
	        </p>
    	</div>
    <?php } else { ?>
    	<div class="container">
    		<div style="margin-top: 10px;">
	            <ol class="breadcrumb">
	              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
	              <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
	              <li class="breadcrumb-item active">Setting - Up</li>
	            </ol>
        	</div>
        	<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Reminder:</strong> Setting this up as primary will no longer be part of your account and accessing of information listed on this sub-account will be prohibited.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
        	<div class="row">
        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        			<p class="display-4">Important Notes:</p>
        			<ul>
        				<li>
        					<p class="lead text-muted">All fields are required.</p>
        				</li>
        				<li>
        					<p class="lead text-muted">Username must be at least five characters and must not contain special characters or spaces.</p>
        				</li>
        				<li>
        					<p class="lead text-muted">Please input a valid email address.</p>
        				</li>
        				<li>
        					<p class="lead text-muted">Select a desired question on a given option and answer it on textbox provided. Do not forget your answer as you can use that to reset your password.</p>
        				</li>
        				<li>
        					<p class="lead text-muted">Password must be at least eight characters. Combination of uppercase and lowercase letters, numbers, and special characters is recommended but not required.</p>
        				</li>
        			</ul>
        		</div> <!-- end of column -->
        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        			<div class="card rounded-0">
        				<div class="card-header alert-success">
        					<p class="lead">Set up an account</p>
        				</div>
        				<div class="card-body">
        					<?php include 'includes/errors.inc.php'; ?>
        					<?php include 'includes/success.inc.php'; ?>
        					<form action='set.subaccount.as.primary.php' method="post" id="subaccountToPrimaryForm">
        						<!--Hidden form that will get the data from subusers-->
        						<?php
        						if(!isset($_GET['settingup'])) { ?>
        							<?php $autoID = (NULL); ?>
        						<?php } else { ?>
        							<?php
									$autoID = checkInput($_GET['settingup']);
									$current = $_SESSION['Username'];
									$sql = "SELECT * FROM subusers WHERE username = '$current' AND id = '$autoID'";
									$results = mysqli_query($conn, $sql);
									$resultsCheck = mysqli_num_rows($results);

									if ($resultsCheck > 0) : ?>
										<?php while($row = $results->fetch_assoc()) : ?>
											<input type="hidden" name="prefix" value="<?php echo $row['prefix'] ?>"/>
											<input type="hidden" name="fname" value="<?php echo $row['fname'] ?>"/>
											<input type="hidden" name="mname" value="<?php echo $row['mname'] ?>"/>
											<input type="hidden" name="lname" value="<?php echo $row['lname'] ?>"/>
											<input type="hidden" name="suffix" value="<?php echo $row['suffix'] ?>"/>
											<input type="hidden" name="bday" value="<?php echo $row['birthday'] ?>"/>
											<input type="hidden" name="age" value="<?php echo $row['age'] ?>"/>
											<input type="hidden" name="homeaddress" value="<?php echo $row['homeaddress'] ?>"/>
											<input type="hidden" name="telephonenumber" value="<?php echo $row['telephonenumber'] ?>"/>
											<input type="hidden" name="cellphonenumber" value="<?php echo $row['cellphonenumber'] ?>"/>
										<?php endwhile ?>
									<?php endif ?>
								<?php } ?>
								<!--Hidden text to display the ID-->
        						<input type="hidden" name="hiddenSettingUp" value="<?php echo $_GET['settingup']; ?>" />
        						<div class="form-group">
        							<label>Username</label>
        							<input type="text" class="form-control" name="username" minlength="5" required/>
        						</div>
        						<div class="form-group">
        							<label>Email</label>
        							<input type="email" class="form-control" name="email" required/>
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
				                    <input type="password" name="securityquestiononeanswer" class="form-control" id="reg-securityquestiononeanswer" aria-describedby="secQOneHelpBlock" placeholder="Enter answer here" required/>
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
				                    <input type="password" name="securityquestiontwoanswer" class="form-control" id="reg-securityquestiontwoanswer" aria-describedby="secQTwoHelpBlock" placeholder="Enter answer here" required>
				                </div>
				                <div class="form-group">
				                	<label>Password</label>
				                	<input type="password" name="password" class="form-control" id="password" minlength="8" required />
				                </div>
				                <div class="form-group">
				                	<label>Confirm Password</label>
				                	<input type="password" name="cpassword" class="form-control" id="cpassword" minlength="8" required />
				                </div>
				                <div class="form-group">
				                	<p class="lead text-center">By creating an account, you are agreeing to our <a href="#" class="btn-link">Terms</a> and <a href="#" class="btn-link">Privacy</a> Policy.</p>
				                </div>
				                <div class="form-group">
				                	<input type="submit" name="setAsPrimaryBtn" class="form-control btn btn-primary" value="Create"/>
				                </div>
        					</form>
        				</div> <!-- end of card-body -->
        				<div class="card-footer alert-success">
        				</div>
        			</div> <!-- end of card -->
        		</div> <!-- end of column -->
        	</div>
    	</div>
    <?php } ?>
<?php include 'footer.php'; ?>
<script type="text/javascript">
	$('#subaccountToPrimaryForm').validate({
        rules:{
            cpassword:{
                equalTo:"#password",
            }
        }
    });
</script>