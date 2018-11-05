<?php include 'header.php'; ?>
<div class="container">
	<div style="margin-top: 10px;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php.php">Home</a></li>
          <li class="breadcrumb-item active">Attendance</li>
        </ol>
    </div>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title float-left">Employees</h4>
				</div>
				<div class="card-body">
					<select name="employeeSelector" id="employeeSelector" class="form-control" style="width: 90%; margin: 10px auto;">
						<option>Recent</option>
						<option>
							<?php
								$sql = "SELECT * FROM employee";
                                $results = mysqli_query($conn, $sql);
                                $resultsCheck = mysqli_num_rows($results);

                                if($resultsCheck > 0){
                                    while($row = $results->fetch_assoc()){
                                        echo $row['Username'] . " " . $row['Position'];
                                        echo "<option>";
                                    }
                                    echo "</option>";
                                    echo "</select>";
                                }
							?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Attendance</h4>
				</div>
				<div class="card-body">
					<div class="container">
						<?php include 'errors.php'; ?>
						<?php include 'success.php'; ?>
						<form action="attendance.php" method="post" id="timeInForm">
							<div class="form-group">
								<small class="form-text text-muted">Employee Number</small>
								<input type="text" class="form-control" name="employeeNumber"/>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
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
	<div class="row" style="margin-top: 10px;">
		<div class="col-md-12">
		<div class="card card-primary card-outline-primary">
			<div class="card-header">
				<h4 class="card-title">Time Sheet</h4>
				<div class="card-tools">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" placeholder="Search">
		                <div class="input-group-append">
		                    <div class="btn btn-primary">
		                      <i class="fa fa-search"></i>
		                    </div>
		                </div>
					</div>
				</div>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead class="thead-light">
							<tr>
								<th>Employee Number</th>
								<th>Full Name</th>
								<th>Position</th>
								<th>Date</th>
								<th>Absent?</th>
								<th>Time-In</th>
								<th>Time-Out</th>
								<th>Activity</th>
								<th>Comment</th>
							</tr>
						</thead>
						<tr>
							<?php
								$sql = "SELECT * FROM attendance";
                                $results = mysqli_query($conn, $sql);
                                $resultsCheck = mysqli_num_rows($results);

                                if($resultsCheck > 0){
                                    while($row = $results->fetch_assoc()){
                                    	echo "<td>" . $row['fullname'] . "</td>";
                                    	echo "<td>" . $row['position'] . "</td>";
                                    	echo "<td>" . $row['dateofyear'] . "</td>";
                                    	echo "<td>" . $row['absent'] . "</td>";
                                    	echo "<td>" . $row['time_in'] . "</td>";
                                    	echo "<td>" . $row['time_out'] . "</td>";
                                    	echo "<td>" . $row['activity'] . "</td>";
                                    	echo "<td>" . $row['comments'] . "</td>";
                                    	echo "</tr>";
                                    }
                                    echo "</table>";
                                }
							?>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>