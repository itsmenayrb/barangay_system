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
<div class="container" style="padding: 20px;">
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
            onSelect: function(value, ui) {
                var today = new Date();
                appointmentDate = today.getFullYear() - ui.selectedYear;
                $('#reg-age').val(age);
            },
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