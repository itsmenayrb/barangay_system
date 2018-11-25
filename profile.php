<?php include 'header.php'; ?>
<?php if(isset($_SESSION['Username'])) { ?>
<?php
	$appointment_date = "";
	$appointment_time = "";
	$current = $_SESSION['Username'];
	$sql = "SELECT * FROM users INNER JOIN residents ON users.id = residents.user_ID WHERE users.Username ='".$current."'";
	$results = mysqli_query($conn, $sql);
	$resultsCheck = mysqli_num_rows($results);

	if($resultsCheck > 0){
		while($row = $results->fetch_assoc()) : ?>
			<div class="jumbotron jumbotron-fluid bg-secondary text-center text-white" id="titleProfile">
				<div class="container">
					<h1 class="display-4 pt-2">
						<?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] . ' ' . $row['Suffix']; ?>
					</h1>
					<a href="#profile" class="btn btn-warning text-center btn-lg text-white mt-3" role="button" id="viewProfilebtn">View Info</a>
					<hr>
					<div class="list-inline">
					<a href="#appointment" class="btn btn-outline-primary btn-lg text-white mt-3 mr-3" role="button" id="viewAppointmentbtn">Appointments</a>
					<a href="#relationship" class="btn btn-outline-primary btn-lg text-white mt-3 mr-3" role="button" id="viewRelationshipbtn">Relationships</a>
					<a href="#requestForm" class="btn btn-outline-primary btn-lg text-white mt-3" role="button" id="viewRequestFormbtn">Request Forms</a>
					</div>
				</div>
			</div>
			<div id="profile">
				<div id="profile-bg-diagonal" class="bg-parallax"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div id="profile-content-box">
								<div id="profile-content-box-outer">
									<div id="profile-content-box-inner">
										<div class="content-title">
											<h3>Profile</h3>
										</div>
										<div id="profile-desc">
											<h6 class="lead">
												<strong>Gender:</strong> <?php echo $row['Sex']; ?>
											</h6>
											<h6 class="lead">
												<strong>Birthday:</strong>
												<?php
													$date = $row['Bday'];
													$testDate = new DateTime($date);
													echo $testDate->format('F-d-Y');
												?>
											</h6>
											<h6 class="lead">
												<strong>Age:</strong> <?php echo $row['Age']; ?>
											</h6>
											<h6 class="lead">
												<strong>Birthplace:</strong> <?php echo $row['Bplace']; ?>
											</h6>
											<h6 class="lead">
												<strong>Home Address:</strong> <?php echo $row['Homeaddress']; ?>
											</h6>
											<h6 class="lead">
												<strong>Contact Number:</strong>
												<?php
													echo $row['TelephoneNumber'];
													if(strlen($row['TelephoneNumber']) > 0 && strlen($row['CellphoneNumber']) > 0) {
														echo " / " ;
														echo $row['CellphoneNumber'];
													}
												?>
											</h6>
										</div>
										<div id="profile-btn">
											<a href="#" class="btn btn-primary btn-primary-design" role="button">Edit Profile</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="relationship">
				<div id="relationship-bg-diagonal" class="bg-parallax"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div id="relationship-content-box">
								<div id="relationship-content-box-outer">
									<div id="relationship-content-box-inner">
										<div class="content-title">
											<h3>Create an account for your loved ones.</h3>
										</div>
										<div id="relationship-desc">
											<h6 class="lead">You can request forms for them.</h6>
										</div>
										<div id="relationship-btn">
											<a href="subaccount.php" class="btn btn-primary btn-primary-design mb-3" role="button">Create</a>
											<small class="form-text text-muted">Already have?</small>
											<a href="#" class="btn-link" role="button" style="left: 0;">You can view here.</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="appointment">
				<div id="appointment-bg-diagonal" class="bg-parallax"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div id="appointment-content-box">
								<div id="appointment-content-box-outer">
									<div id="appointment-content-box-inner">
										<div class="content-title">
											<h6 class="lead">Busy? We got you covered!</h6>
										</div>
										<div id="appointment-desc">
											<h1 class="h2">Set up an appointment.</h1>
										</div>
										<div id="appointment-btn">
											<a href="appointment.request.php" class="btn btn-primary btn-primary-design mb-3" role="button">Request Appointment</a>
											<small class="form-text text-muted">Already have?</small>
											<a href="#" class="btn-link" role="button" style="left: 0;">View my appointment</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="requestForm">
				<div id="requestForm-bg-diagonal" class="bg-parallax"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div id="requestForm-content-box">
								<div id="requestForm-content-box-outer">
									<div id="requestForm-content-box-inner">
										<div class="content-title">
											<h3>Requesting of forms is so easy.</h3>
										</div>
										<div id="requestForm-desc">
											<h6 class="lead">Just fill up the following:</h6>
											<form method="post" action="preview.php">
											<select name="forms" class="form-control" required>
													<option disabled selected>FORMS</option>
													<option value="indigency">Indigency Certificate</option>
													<option value="clearance">Barangay Clearance</option>
													<option value="endorsement">Barangay Endorsement</option>
													<option value="certification">Barangay Certificate</option>
													<option value="business">Business Clearance</option>
													</select>
												<div class="form-group">
													<small class="form-text text-muted" >Active contact number:</small>
													<input type="text" class="form-control" required placeholder="(+63)-###-###-####"></input>
												</div>
												<div class="form-group">
													<small clas="form-text text-muted">Purpose:</small><br>
													<textarea name="purpose" rows="2" class="form-control" required placeholder="e.g. Financial Assistance" value ="<?php echo $purpose;?>"></textarea>
												</div>
										</div>
										<div id="requestForm-btn">
											<input  name="request" class="btn btn-primary btn-primary-design mb-3" type="submit" value="Proceed"></input>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="#titleProfile" class="scrollToTop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
		<?php endwhile ?>
	<?php } else { ?>
	<?php } ?>
<?php } else { ?>
<?php } ?>
<?php include 'footer.php'; ?>
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
				scrollTop: $("#titleProfile").offset().top
			}, 1000);
		});

		$("#viewProfilebtn").click(function(){
			$("html,body").animate({
				scrollTop: $("#profile").offset().top
			}, 1000);
		});

		$("#viewAppointmentbtn").click(function(){
			$("html,body").animate({
				scrollTop: $("#appointment").offset().top
			}, 1000);
		});

		$("#viewRequestFormbtn").click(function(){
			$("html,body").animate({
				scrollTop: $("#requestForm").offset().top
			}, 1000);
		});

		$("#viewRelationshipbtn").click(function(){
			$("html,body").animate({
				scrollTop: $("#relationship").offset().top
			}, 1000);
		});
	});
	function myFunctionAppointment(f){
		var r = confirm("Are you sure you want to delete this appointment? \n\nThis process is irreversible.");
		if(r == true){
			f.submit();
			return false;
		} else {
			return false;
		}
	}
	function myFunctionRelationship(f){
		var r = confirm("Are you sure you want to delete this sub-account? \n\nThis process is irreversible.");
		if(r == true){
			f.submit();
			return false;
		} else {
			return false;
		}
	}
	function myFunctionSetAsPrimary(f){
		var r = confirm("Setting this up as primary will no longer be part of your account and accessing of information listed on this sub-account will be prohibited. \n\nDo you wish to continue?");
		var age = document.getElementById("hiddenAge").value;

		if(r == true){
			if(age >= 12){
				f.submit();
				return false;
			}
			else{
				alert("The sub-account holder should be at least twelve years of age to make their account primary. \n\n Thank you.");
				return false;
			}
		} else {
			return false;
		}
	}
	$('#appointmentProfileTable').DataTable({
		"scrollX" : true
	});
	$('#subaccountProfileTable').DataTable();
</script>