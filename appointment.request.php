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
<?php
	$current = $_SESSION['Username'];

	if(!isset($_GET['id'])) { ?>
		<?php $autoID = (NULL); ?>
		<div class="container" style="padding: 20px;">
			<div style="margin-top: 10px;">
		    	<ol class="breadcrumb">
		      		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		      		<li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
		      		<li class="breadcrumb-item active">Request Appointment</li>
		    	</ol>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="card border-info rounded-0">
						<div class="card-header alert-success">
							<div class="fs-title">
								<h4>Appointment</h4>
							</div>
						</div>
						<div class="card-body">
							<?php include 'includes/errors.inc.php'; ?>
							<?php include 'includes/success.inc.php'; ?>
							<form action="appointment.request.php" id="appointmentForm" method="post" style="width: 90%;margin: 0 auto;">
								<h6 class="form-text text-muted">Please enter all the details.</h6>
								<small class="form-text text-muted">Full Name: <i>(Do not include dot or period on your middle initial as well as on your suffix).</i></small>
								<input type="text" class="form-control" name="fullname" required/>
								<small class="form-text text-muted">Email: <i>(example@domain.com).</i></small>
								<input type="email" class="form-control" name="email" required/>
								<small class="form-text text-muted">Contact Number: <i>(046xxxxxxx or 09xxxxxxxxx).</i></small>
								<input type="text" class="form-control" name="contactnumber" maxlength="11" required/>
								<div class="row">
									<div class="col-md-6">
										<small class="form-text text-muted">Select an appointment date:</small>
										<input type="text" name="appointmentDate" id="appointmentDate" class="form-control" required/>
									</div>
									<div class="col-md-6">
										<small class="form-text text-muted">Select an appointment time:</small>
										<input type="text" name="appointmentTime" id="appointmentTime" class="form-control" required/>
									</div>
								</div>
								<small class="form-text text-muted">Purpose:</small>
								<textarea name="purpose" id="" cols="70" rows="3" class="form-control border-secondary" required></textarea>
								<small class="form-text text-muted">&nbsp;</small>
								<input type="submit" value="Submit" name="requestAppointment" class="form-control btn btn-outline-success"/>
							</form>
						</div>
						<div class="card-footer alert-success"></div>
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<?php
		$autoID = checkInput($_GET['id']);
		$sql = "SELECT * FROM appointment WHERE id ='".$autoID."'" . "AND username = '".$current."'";
		$results = mysqli_query($conn, $sql);
		$resultsCheck = mysqli_num_rows($results);

		if($resultsCheck > 0) : ?>
			<?php while($row = $results->fetch_assoc()) : ?>
				<div class="container" style="padding: 20px;">
					<div style="margin-top: 10px;">
				    	<ol class="breadcrumb">
				      		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				      		<li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
				      		<li class="breadcrumb-item active">Request Appointment</li>
				    	</ol>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="card border-info rounded-0">
								<div class="card-header alert-success">
									<div class="fs-title">
										<h4>Appointment</h4>
									</div>
								</div>
								<div class="card-body">
									<?php include 'includes/errors.inc.php'; ?>
									<?php include 'includes/success.inc.php'; ?>
									<form action="appointment.request.php" id="appointmentForm" method="post" style="width: 90%;margin: 0 auto;">
										<input type='hidden' name='hiddenGetId' value='<?php echo $_GET['id']; ?>' />
										<h6 class="form-text text-muted">Please enter all the details.</h6>
										<small class="form-text text-muted">Full Name: <i>(Do not include dot or period on your middle initial as well as on your suffix).</i></small>
										<input type="text" class="form-control" value="<?php echo $row['fullname']; ?>" name="fullname" required/>
										<small class="form-text text-muted">Email: <i>(example@domain.com).</i></small>
										<input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="email" required/>
										<small class="form-text text-muted">Contact Number: <i>(046xxxxxxx or 09xxxxxxxxx).</i></small>
										<input type="text" class="form-control" name="contactnumber" maxlength="11" value="<?php echo $row['contactnumber']; ?>" required/>
										<div class="row">
											<div class="col-md-6">
												<small class="form-text text-muted">Select an appointment date:</small>
												<input type="text" name="appointmentDate" id="appointmentDate" class="form-control" value="<?php echo $row['appointment_date']; ?>" required/>
											</div>
											<div class="col-md-6">
												<small class="form-text text-muted">Select an appointment time:</small>
												<input type="text" name="appointmentTime" id="appointmentTime" class="form-control" value="<?php echo $row['appointment_time']; ?>" required/>
											</div>
										</div>
										<small class="form-text text-muted">Purpose:</small>
										<textarea name="purpose" id="" cols="70" rows="3" class="form-control border-secondary" value="<?php echo $row['purpose']; ?>" required></textarea>
										<small class="form-text text-muted">&nbsp;</small>
										<div class="row">
											<div class="offset-3 col-md-6">
												<input type="submit" value="Update" name="appointmentUpdate" class="form-control btn btn-outline-warning"/>
											</div>
										</div>
									</form>
								</div>
								<div class="card-footer alert-success"></div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile ?>
		<?php endif ?>
	<?php } ?>
<?php } ?>
<?php include 'footer.php'; ?>
<script type="text/javascript">
	$("#appointmentForm").validate();
	$(document).ready(function() {
        var appointmentDate = "";
        $('#appointmentDate').datepicker({
        	timepicker: false,
            autoSize: true,
            minDate: "+1",
            changeMonth: true,
            changeYear: true
        });
    });
    $('#appointmentTime').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '8',
    maxTime: '4:00pm',
    defaultTime: '8',
    startTime: '10:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true
});
</script>