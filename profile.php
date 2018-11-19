<?php include 'header.php'; ?>
<?php if(isset($_SESSION['Username'])) { ?>
<div class="container">
	<div style="margin-top: 10px;">
    	<ol class="breadcrumb">
      		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
      		<li class="breadcrumb-item active">Profile</li>
    	</ol>
	</div>
	<div class="row">
		<div class="col-md-6">
			<legend class="form-text" style="color:black; font-size:2.5vw;text-transform: capitalize;">
		<?php
			$appointment_date = "";
			$appointment_time = "";
			$current = $_SESSION['Username'];
			$sql = "SELECT * FROM users INNER JOIN residents ON users.id = residents.user_ID WHERE users.Username ='".$current."'";
			$results = mysqli_query($conn, $sql);
			$resultsCheck = mysqli_num_rows($results);

			if($resultsCheck > 0){
				while($row = $results->fetch_assoc()){
					echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] . ' ' . $row['Suffix'] . '' . '</legend></div>';
					echo "<div class='col-md-6'>";
					echo "<a href='update.resident.php' class='btn btn-success float-right m-2'>Edit Profile</a></div></div>";
					echo "<div class='container' style='margin-top: 20px;'><div class='row'><div class='col-md-4'>";
					echo "<div class='table-responsive' style='width: 900px;margin: 0 auto;max-width:100%;'>";
					echo "<table class='table table-hover table-bordered'><tr><td class='alert-success'>Gender: </td>";
					echo "<td>" . $row['Sex'] . "</td></tr>";
					echo "<tr><td class='alert-success'>Birthday: </td>";

					$date = $row['Bday'];
					$testDate = new DateTime($date);

					echo "<td>" . $testDate->format('F-d-Y') . "</td></tr>";
					echo "<tr><td class='alert-success'>Age: </td>";
					echo "<td>" . $row['Age'] . "</td></tr>";
					echo "<tr><td class='alert-success'>Birth Place: </td>";
					echo "<td>" . $row['Bplace'] . "</td></tr>";
					echo "<tr><td class='alert-success'>Home Address: </td>";
					echo "<td>" . $row['Homeaddress'] . "</td></tr>";
					echo "<tr><td class='alert-success'>Contact Number: </td>";
					echo "<td>" . $row['TelephoneNumber'];

					// Print the slash if both the Telephone and cellphone numbers have a value or not an empty string
					if(strlen($row['TelephoneNumber']) > 0 && strlen($row['CellphoneNumber']) > 0) {
						echo " / " ;
					}

					echo $row['CellphoneNumber'] . "</td></tr></table>";
					echo "</div>"; // End of column
					echo "<div class='card rounded-0'>"; // Start of card
					echo "<div class='card-header alert-success'>"; // Start of card-header
					echo "<p class='lead text-info'>Request Forms<i class='float-right fas fa-file-contract h2'></i></p>";
					echo "</div>"; // end of card-header
					echo "<div class='card-body'>"; //start of card-body
					echo "<form method='post' action='preview.php' name='form' id='form'>
							<select name='forms' class='form-control'>
								<option disabled selected>FORMS</option>
								<option value='indigency'>Indigency Certificate</option>
								<option value='clearance'>Barangay Clearance</option>
								<option value='endorsement'>Barangay Endorsement</option>
								<option value='certification'>Barangay Certificate</option>
								<option value='business'>Business Clearance</option>
								</select>
								<small>&nbsp;</small>
								<input type='submit' name='request' class='form-control btn btn-sm btn-outline-info' value='Preview'>
						  </form>";
					echo "</div>"; // end of card-body
					echo "</div>"; // end of card
					echo "</div>"; // End of row
					echo "<div class='col-md-8'>";
					echo "<div class='card rounded-0' style='max-width: 100%;margin-bottom: 5px;'>";
					echo "<div class='card-header alert-success'>";
					echo "<a href='appointment.request.php' target='_blank' role='button' class='btn btn-outline-info'> Request Appointment</a><i class='fas fa-info-circle fa-2x float-right text-info'></i>";
					echo "</div>";
					echo "<div class='card-body'>";
					echo "<table class='table table-bordered nowrap' id='appointmentProfileTable'>";
					echo "<thead class='thead-light'>";
					echo "<tr>";
					echo "<th> Appointment </th>";
					echo "<th> Date </th>";
					echo "<th> Time </th>";
					echo "<th> Status </th>";
					echo "<th> Date Requested </th>";
					echo "<th><i class='fas fa-cogs'></i></th>";
					echo "</tr>";
					echo "</thead>";
					echo "<tr>";

					$sql = "SELECT * FROM appointment WHERE username = '$current' AND status = 'pending'";
					$results = mysqli_query($conn,$sql);
					$resultsCheck = mysqli_num_rows($results);

					if($resultsCheck < 1){
						echo "<td colspan='6'><p class='h4 lead text-center'>Nothing to display.</p></td></tr></table>";
					}
					else{
						while($row = $results->fetch_assoc()){
							echo "<td>" . $row['purpose'] . "</td>";
							$appointment_date = $row['appointment_date'];
                            $appointment_date = new DateTime($appointment_date);
							echo "<td>" . $appointment_date->format('F-d-y') . "</td>";
							$appointment_time = $row['appointment_time'];
                            $appointment_time = date('h:i A', strtotime($appointment_time));
							echo "<td>" . $appointment_time . "</td>";
							echo "<td>" . $row['status'] . "</td>";
							echo "<td>" . $row['date_requested'] . "</td>";
							echo "<td>
								<a href='appointment.request.php?id={$row['id']}' role='button' name='appointmentBtnEdit' id='appointmentBtnEdit' data-toggle='tooltip' data-placement='right' title='Edit'>
									<i class='fas fa-edit text-warning'></i>
								</a>&nbsp;&nbsp;
								<a href='appointment.request.php?del={$row['id']}' role='button' name='appointmentBtnDel' id='appointmentBtnDel' data-toggle='tooltip' data-placement='right' title='Delete' onClick='return myFunctionAppointment(this); return false;'>
									<i class='fas fa-trash text-danger'></i>
								</a>
								</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					echo "</div></div>";
					echo "<div class='card rounded-0' style='max-width: 100%;'>
							<div class='card-header alert-success'><a href='subaccount.php?addmember=true' class='btn btn-outline-info' role='button'>Add a sub-account</a><span class='fas fa-user-plus float-right text-info fa-2x'></span>
							</div>
							<div class='card-body text-secondary'>";
					echo "<table class='table table-bordered nowrap' id='subaccountProfileTable'><thead class='thead-light'><tr><th>Name</th><th>Relationship</th><th class='text-center'><i class='fas fa-cogs'></i></th></tr></thead><tr>";

					$sql = "SELECT * FROM subusers WHERE username = '$current' and status = 'Active'";
					$results = mysqli_query($conn,$sql);
					$resultsCheck = mysqli_num_rows($results);

					if($resultsCheck < 1){
						echo "<td colspan='6'><p class='h4 lead text-center'>Nothing to display.</p></td></tr></table>";
					}
					else{
						while($row = $results->fetch_assoc()){
							echo "<td><a target='_blank' href='subaccount.profile.php?id={$row['id']}'" . ">" . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix'] . '</a></td>';
							echo '<td>' . $row['relationship'] . '</td>';
							echo "<td class='text-center'>
							<form class='form-inline'>
								&nbsp;&nbsp;
								<a href='subaccount.php?update={$row['id']}' role='button' name='relationshipBtnEdit' target='_blank' id='relationshipBtnEdit' data-toggle='tooltip' data-placement='right' title='Edit'>
									<i class='fas fa-edit text-warning'></i>
								</a>&nbsp;&nbsp;&nbsp;
								<a href='subaccount.php?reldel={$row['id']}' role='button' name='relationshipBtnDel' id='relationshipBtnDel' data-toggle='tooltip' data-placement='right' title='Delete' onClick='return myFunctionRelationship(this); return false;'>
									<i class='fas fa-trash text-danger'></i>
								</a>&nbsp;&nbsp;&nbsp;
								<a href='set.subaccount.as.primary.php?settingup={$row['id']}' role='button' name='relationshipBtnSetPrimary' id='relationshipBtnSetPrimary' data-toggle='tooltip' data-placement='right' title='Set Account as Primary' onClick='return myFunctionSetAsPrimary(this); return false;'>
									<i class='fas fa-user-check text-info'></i>
								</a>
							</form>
								</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					echo "</div>"; // End of card-body
					echo "</div>"; // End of Card
					echo "</div>"; // End of column
					echo "</div>"; // End of Row
					echo "</div>"; // End of Container
				}
			}
			$conn->close();
		?>
	<?php } else { ?>
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
	<?php } ?>
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
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
		if(r == true){
			f.submit();
			return false;
		} else {
			return false;
		}
	}
	$('#appointmentProfileTable').DataTable({
		"scrollX" : true
	});
	$('#subaccountProfileTable').DataTable();
</script>


<!--start bopols -->
<?php
//db connection
include 'includes/dbh.inc.php';
?>
		<div class="container">
		Request Forms :
		<form method='post' action="preview.php" name="form" id="form">
		<select name="forms">
		<option disabled selected>FORMS</option>
		<option value="indigency">Indigency Certificate</option>
		<option value="clearance">Barangay Clearance</option>
		<option value="endorsement">Barangay Endorsement</option>
		<option value="certification">Barangay Certificate</option>
		<option value="business">Business Clearance</option>
		</select>
		<input type="submit" name="request" value="Preview">
		</form>
	</div>
<!--end bopols -->
