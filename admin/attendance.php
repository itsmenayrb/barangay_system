<!--This php file is for attendance
-- Display over all data regarding to attendance
-- such as timesheet for time-in, time-out, etc -->
<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['Position'])) :?> <!-- If user is not logged in -->
    <?php header("Location: index.php"); ?>
<?php endif ?>
<!-- navigation -->
<span class="fas fa-bars fa-3x float-left" style="margin-top: 15px; margin-left: 15px;" onclick="openNav()"></span>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="dashboard.php">Home</a>
    <a href="appointments.php">Appointments</a>
    <a href="message.php">Messages</a>
    <a href="members.php">Members</a>
    <a href="attendance.php">Attendance</a>
    <div class="dropdown-divider" style="width: 80%; margin: 0 auto;"></div>
    <a href="signout.php">Sign Out</a>
</div>
<!-- content -->
<div id="main">
	<div class="container">
		<nav class="navbar navbar-expand-smd navbar-dark bg-dark">
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
            <div class="float-right">
                <h5 class="lead text-light">You are signed-in as <a href="#"><?php echo $_SESSION['Username']; ?></a> | <a href="signout.php" class="text-light"><i class="btn btn-outline-light fas fa-sign-out-alt" data-toggle="tooltip" data-placement="right" title="Sign Out"></i></a></h5>
            </div>
        </nav>
		<div style="margin-top: 10px;">
	        <ol class="breadcrumb">
	          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
	          <li class="breadcrumb-item active">Attendance</li>
	        </ol>
	    </div>
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title float-left">Barangay Officials</h4>
					</div>
					<div class="card-body">
						<form method="post" action="attendance.php">
							<div class="container">
								<div class="form-group">
								<!-- All new registered barangay officials should automatically add
								-- to dropdown list of attendance -->
									<select name="employeeSelector" id="employeeSelector" class="form-control">
										<option value="recent">Recent</option>
										<?php
											$sql = 'SELECT * FROM employee LEFT JOIN attendance ON employee.employee_id = attendance.employee_id GROUP BY employee.employee_id ORDER BY employee.LastName, employee.FirstName asc';
											$results = mysqli_query($conn,$sql);
											$resultsCheck = mysqli_num_rows($results);

											while ($row = $results->fetch_assoc()){
												echo "<option value='".$row['employee_id']."'>" . $row['employee_id'] . ' - ' . $row['LastName'] . ' ' . $row['FirstName'] . ' ' . $row['MiddleName'] . "</option>";
											}
										 ?>
				                    </select>
								</div>
								<div class="form-group">
									<input type="submit" class="form-control btn btn-secondary" Value="Check" name="btnCheckTimeSheet"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Attendance</h4> <!-- ATTENDANCE -->
					</div>
					<div class="card-body">
						<div class="container">
							<?php include 'errors.php'; ?>
							<?php include 'success.php'; ?>
							<form action="attendance.php" method="post" id="timeInForm" onsubmit="return validate(this);">
								<div class="form-group">
									<small class="form-text text-muted">Employee Number</small>
									<input type="text" class="form-control" name="employeeNumber"/>
								</div>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
										<!-- ACTION SELECTOR FOR ATTENDANCE
										-- di ako maka-isip ng way kung pano magiging process pero
										-- okay naman daw to sabi ni sir. HAHA -->
											<select class="form-control" id="attendanceSelector" name="attendance">
												<option value="" selected>(Select an action)</option>
												<option value="TimeIN">Time In</option>
												<option value="TimeOUT">Time Out</option>
												<option value="Absent">Absent</option>
												<option value="OnLeave">On-leave</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<input type="submit" id="TimeIN" class="btnAttendance TimeIN form-control btn btn-sm btn-outline-success" name="btnTimeIn" value="Time In"/>
										<input type="submit" id="TimeOUT" class="btnAttendance TimeOUT form-control btn btn-sm btn-outline-secondary" name="btnTimeOut" value="Time Out"/>
										<input type="submit" id="Absent" class="btnAttendance Absent form-control btn btn-sm btn-outline-danger" name="btnAbsent" value="Absent"/>
									</div>
								</div>
								<div id="OnLeave" class="btnAttendance OnLeave">
									<div class="col-md-8">
										<textarea name="textLeaveReason" cols="35" rows="2" placeholder="Reason ..."></textarea>
									</div>
									<div class="col-md-4">
										<input type="submit" class="form-control btn btn-sm btn-outline-warning" name="btnLeave" value="Leave"/>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- TIMESHEET -->
		<div class="row" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="col-md-12">
			<div class="card card-primary card-outline-primary">
				<div class="card-header">
					<h4 class="card-title">Time Sheet</h4>
				</div>
				<div class="card-body p-0">
						<table id="timesheetTable" class="table table-bordered table-hover nowrap" style="width: 100%;">
							<thead class="thead-light">
								<tr>
									<th>Employee Number</th>
									<th>Full Name</th>
									<th>Position</th>
									<th>Date</th>
									<th>Absent?</th>
									<th>On-Leave?</th>
									<th>Time-In</th>
									<th>Time-Out</th>
									<th>Activity</th>
									<th>Comment</th>
								</tr>
							</thead>
							<tr>
							<!-- Query to display data based on the selected option above -->
								<?php
									if(!isset($_POST['employeeSelector'])){
										$checker = (NULL);
									}
									else{
										$checker = checkInput($_POST["employeeSelector"]);
									}
									if(!isset($_POST['btnCheckTimeSheet']) || $checker == "recent" ){
										$sql = "SELECT * FROM attendance";
		                                $results = mysqli_query($conn, $sql);
		                                $resultsCheck = mysqli_num_rows($results);

		                                if($resultsCheck > 0){
		                                    while($row = $results->fetch_assoc()){
		                                    	echo "<td>" . $row['employee_id'] . "</td>";
		                                    	echo "<td>" . $row['fullname'] . "</td>";
		                                    	echo "<td>" . $row['position'] . "</td>";
		                                    	echo "<td>" . $row['dateofyear'] . "</td>";
		                                    	echo "<td>" . $row['absent'] . "</td>";
		                                    	echo "<td>" . $row['on_leave'] . "</td>";
		                                    	echo "<td>" . $row['time_in'] . "</td>";
		                                    	echo "<td>" . $row['time_out'] . "</td>";
		                                    	echo "<td>" . $row['activity'] . "</td>";
		                                    	echo "<td>" . $row['comments'] . "</td>";
		                                    	echo "</tr>";
		                                    }
		                                    echo "</table>";
		                                }
		                            }
		                            else{
		                            	$checker = checkInput($_POST["employeeSelector"]);
		                            	$sql = "SELECT * FROM attendance WHERE employee_id = '$checker'";
		                                $results = mysqli_query($conn, $sql);
		                                $resultsCheck = mysqli_num_rows($results);

		                                if($resultsCheck > 0){
		                                    while($row = $results->fetch_assoc()){
		                                    	echo "<td>" . $row['employee_id'] . "</td>";
		                                    	echo "<td>" . $row['fullname'] . "</td>";
		                                    	echo "<td>" . $row['position'] . "</td>";
		                                    	echo "<td>" . $row['dateofyear'] . "</td>";
		                                    	echo "<td>" . $row['absent'] . "</td>";
		                                    	echo "<td>" . $row['on_leave'] . "</td>";
		                                    	echo "<td>" . $row['time_in'] . "</td>";
		                                    	echo "<td>" . $row['time_out'] . "</td>";
		                                    	echo "<td>" . $row['activity'] . "</td>";
		                                    	echo "<td>" . $row['comments'] . "</td>";
		                                    	echo "</tr>";
		                                    }
		                                    echo "</table>";
		                                }
		                                else{
		                                	echo "<td colspan=10>" . "<p class='h6 lead text-center'>Nothing to display.</p>" . "</td>";
		                                }
		                            }
								?>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<?php include 'scripts.php'; ?>