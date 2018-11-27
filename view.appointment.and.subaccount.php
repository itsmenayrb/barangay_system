<?php include 'header.php'; ?>
<div id="viewAppointment">
	<div id="viewAppointment-bg-diagonal" class="bg-parallax"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="viewAppointment-content-box">
					<div id="viewAppointment-content-box-outer">
						<div id="viewAppointment-content-box-inner">
							<div class="content-title mb-3">
								<h3>Here's your appointment</h3>
							</div>
							<div id="viewAppointment-desc">
								<table class="table table-hover nowrap" id="appointmentProfileTable">
									<thead class='thead-light'>
										<tr>
											<th> Purpose </th>
											<th> Date </th>
											<th> Time </th>
											<th> Status </th>
											<th> Date Requested </th>
											<th><i class='fas fa-cogs'></i></th>
										</tr>
									</thead>
										<tr>
											<?php
												$appointment_date = "";
												$appointment_time = "";
												$current = $_SESSION['Username'];

												$sql = "SELECT * FROM appointment WHERE username = '$current' AND status <> 'Deleted'";
												$results = mysqli_query($conn,$sql);
												$resultsCheck = mysqli_num_rows($results);

												if($resultsCheck < 1){
													echo "<td colspan='6'>
															<p class='h4 lead text-center'>
																Nothing to display.
															</p>
														  </td>
														</tr>
													</table>";
												} else { ?>
													<?php while($row = $results->fetch_assoc()) : ?>
														<td><?php echo $row['purpose']; ?></td>
														<?php
															$appointment_date = $row['appointment_date'];
                            								$appointment_date = new DateTime($appointment_date);
                            								$appointment_time = $row['appointment_time'];
                            								$appointment_time = date('h:i A', strtotime($appointment_time));
														?>
														<td><?php echo $appointment_date->format('F-d-y'); ?></td>
														<td><?php echo $appointment_time; ?></td>
														<td><?php echo $row['status']; ?></td>
														<td><?php echo $row['date_requested']; ?></td>
														<?php
															echo "<td>
															<a href='appointment.request.php?id={$row['id']}' role='button' name='appointmentBtnEdit' id='appointmentBtnEdit' data-toggle='tooltip' data-placement='right' title='Edit'>
																<i class='fas fa-edit text-warning'></i>
															</a>&nbsp;&nbsp;
															<a href='appointment.request.php?del={$row['id']}' role='button' name='appointmentBtnDel' id='appointmentBtnDel' data-toggle='tooltip' data-placement='right' title='Delete' onClick='return myFunctionAppointment(this); return false;'>
																<i class='fas fa-trash text-danger'></i>
															</a>
															</td>";
														?>
														</tr>
													<?php endwhile ?>
													</table>
												<?php } ?>
							</div>
							<div class="viewAppointment-btn mt-2">
								<a href="appointment.request.php" class="btn btn-primary btn-primary-design" role="button">Create an Appointment</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="viewRelationship">
	<div id="viewRelationship-bg-diagonal" class="bg-parallax"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="viewRelationship-content-box">
					<div id="viewRelationship-content-box-outer">
						<div id="viewRelationship-content-box-inner">
							<div class="content-title">
								<h3>Your sub-accounts</h3>
							</div>
							<div id="viewRelationship-desc">
								<table class='table table-hover nowrap' id='subaccountProfileTable'>
									<thead class='thead-light'>
										<tr>
											<th>Name</th>
											<th>Relationship</th>
											<th>Age</th>
											<th class='text-center'><i class='fas fa-cogs'></i></th>
										</tr>
									</thead>
									<tr>
										<?php
											$sql = "SELECT * FROM subusers WHERE username = '$current' and status = 'Active'";
											$results = mysqli_query($conn,$sql);
											$resultsCheck = mysqli_num_rows($results);

											if($resultsCheck < 1){
												echo "<td colspan='4'>
														<p class='h4 lead text-center'>
															Nothing to display.
														</p>
													</td>
												</tr>
											</table>";
											} else { ?>
												<?php while($row = $results->fetch_assoc()): ?>
													<input type="hidden" id="hiddenAge" value="<?php echo $row['age']; ?>" />
													<?php
														echo "<td><a target='_blank' href='subaccount.profile.php?id={$row['id']}'" . ">" . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix'] . '</a></td>';
													?>
													<td><?php echo $row['relationship']; ?></td>
													<td><?php echo $row['age']; ?></td>
													<?php
														echo "<td class='text-center'>
														<div class='form-check form-check-inline'>
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
														</div>
															</td>";
													?>
													</tr>
												<?php endwhile ?>
											</table>
											<?php } ?>
							</div>
							<div id="viewRelationship-btn">
								<a href="subaccount.php" class="mt-3 btn btn-primary btn-primary-design" role="button">Add a sub-account</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--i insert records of transactions teehee-->
<div id="requestForm">
				<div id="requestForm-bg-diagonal" class="bg-parallax"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div id="requestForm-content-box">
								<div id="requestForm-content-box-outer">
									<div id="requestForm-content-box-inner">
										<div class="content-title mb-5">
											<h3>Here is the record of your requests.</h3>
										</div>
										<div id="viewReq-desc">
								<table class="table table-hover nowrap" id="appointmentProfileTable">
									<thead class='thead-light'>
										<tr>
											<th> Document </th>
											<th> Purpose </th>
											<th> Date </th>
											<th> Time </th>
											<th> Status </th>
											<th> Date Requested </th>
											<th><i class='fas fa-cogs'></i></th>
										</tr>
									</thead>
										<tr>
											<?php
												$appointment_date = "";
												$appointment_time = "";
												$current = $_SESSION['Username'];

												$sql = "SELECT * FROM user_req WHERE username = '$current' AND status = 'Pending'";
												$results = mysqli_query($conn,$sql);
												$resultsCheck = mysqli_num_rows($results);

												if($resultsCheck < 1){
													echo "<td colspan='6'>
															<p class='h4 lead text-center'>
																Nothing to display.
															</p>
														  </td>
														</tr>
													</table>";
												} else { ?>
													<?php while($row = $results->fetch_assoc()) : ?>
														<td><?php echo $row['forms']; ?></td>
														<td><?php echo $row['purpose']; ?></td>
														<?php
															$appointment_date = $row['req_date'];
                            								$appointment_date = new DateTime($appointment_date);
                            								$appointment_time = $row['req_time'];
                            								$appointment_time = date('h:i A', strtotime($appointment_time));
														?>
														<td><?php echo $appointment_date->format('F-d-y'); ?></td>
														<td><?php echo $appointment_time; ?></td>
														<td><?php echo $row['status']; ?></td>
														<td><?php echo $row['date_requested']; ?></td>
														<?php
															echo "<td>
															<a href='user_req.php?id={$row['id']}' role='button' name='reqBtnEdit' id='reqBtnEdit' data-toggle='tooltip' data-placement='right' title='Edit'>
																<i class='fas fa-edit text-warning'></i>
															</a>&nbsp;&nbsp;
															<a href='user_req.php?del={$row['id']}' role='button' name='reqBtnDel' id='appointmentBtnDel' data-toggle='tooltip' data-placement='right' title='Delete' onClick='return myFunctionReq(this); return false;'>
																<i class='fas fa-trash text-danger'></i>
															</a>
															</td>";
														?>
														</tr>
													<?php endwhile ?>
													</table>
												<?php } ?>
							</div>
							<div class="viewReq-btn mt-2">
								<a href="profile.php" class="btn btn-primary btn-primary-design" role="button">Request Forms</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--bop0ls here-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#appointmentProfileTable').DataTable({
			"scrollX" : true
		});

		$('#subaccountProfileTable').DataTable({
			"scrollX" : true
		});
	});
	
	function myFunctionRelationship(f){
		var r = confirm("Are you sure you want to delete this sub-account? \n\nThis process is irreversible.");
		if(r == true){
			f.submit();
			return false;
		} else {
			return false;
		}
	}
	//x
	function myFunctionReq(f){
		var r = confirm("Are you sure you want to delete this request? \n\nThis process is irreversible.");
		if(r == true){
			f.submit();
			return false;
		} else {
			return false;
		}
	}
	//D
	function myFunctionAppointment(f){
		var r = confirm("Are you sure you want to cancel this appointment? \n\nThis process is irreversible.");
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
</script>
<?php include 'footer.php'; ?>