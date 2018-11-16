<!-- PAGE FOR RECORD REGISTERED
	OF REGISTERED USERS AND SUBUSERS -->
<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['Position'])) :?>
    <?php header("Location: index.php"); ?>
<?php endif ?>
<?php
    $sql = "SELECT Position FROM employee";
    $results = mysqli_query($conn, $sql);
    $resultsCheck = mysqli_num_rows($results);

    if ($resultsCheck > 0) : ?>
        <?php if ($row = mysqli_fetch_assoc($results)) : ?>
            <?php if (isset($_SESSION['Position']) == 'Barangay Captain') { ?> <!--NAVIGATION -->
                <span class="fas fa-bars fa-3x float-left text-info" style="margin-top: 15px; margin-left: 15px;" onclick="openNav()"></span>
                <div id="mySidenav" class="sidenav alert-success">
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
                        <nav class="navbar navbar-expand-smd navbar-dark bg-info">
                            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
                            <div class="float-right">
                                <h5 class="lead text-light">You are signed-in as <a href="#" class="text-dark"><?php echo $_SESSION['Username']; ?></a> | <a href="signout.php" class="text-light"><i class="btn btn-outline-light fas fa-sign-out-alt" data-toggle="tooltip" data-placement="right" title="Sign Out"></i></a></h5>
                            </div>
                        </nav>
                        <div class="row" style="margin-top: 10px;"> <!-- ROW FOR REGISTERED USERS -->
                        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        		<div class="card rounded-0">
                        			<div class="card-header alert-success">
                        				<p class="lead text-center">Registered User</p>
                        			</div>
                        			<div class="card-body">
                        				<table class="table table-hover table-bordered" style="width: 100%;" id="registeredUserTable">
		                        			<tr>
		                        				<thead class="thead-light">
		                        					<td>#</td>
		                        					<td>Username</td>
		                        					<td>Fullname</td>
		                        					<td>Address</td>
		                        					<td>Contact Number</td>
		                        					<td>Status</td>
		                        					<td>Last Login</td>
		                        				</thead>
		                        			</tr>
		                        			<tr>
		                        				<?php
		                        					$sql = "SELECT users.id, users.Username, users.Status, residents.user_ID, residents.Prefix, residents.FirstName, residents.MiddleName, residents.LastName, residents.Suffix, residents.Homeaddress, residents.TelephoneNumber, residents.CellphoneNumber FROM users INNER JOIN residents ON users.id = residents.user_ID";

		                        					$results = mysqli_query($conn,$sql);
		                        					$resultsCheck = mysqli_num_rows($results);

		                        					if($resultsCheck > 0){
		                        						while($row = $results->fetch_assoc()){
			                        						echo "<td>" . $row['user_ID'] . "</td>";
			                        						echo "<td>" . $row['Username'] . "</td>";
			                        						echo "<td>" . $row['Prefix'] . " " . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . " " . $row['Suffix'] . "</td>";
			                        						echo "<td>" . $row['Homeaddress'] . "</td>";
			                        						echo "<td>" . $row['TelephoneNumber'] . " / " . $row['CellphoneNumber'] . "</td>";
			                        						echo "<td>" . $row['Status'] . "</td>";
			                        						echo "<td>&nbsp;</td>";
			                        						echo "</tr>";
			                        					}
			                        					echo "</table>";
		                        					}
		                        				?>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row" style="margin-top: 10px;"> <!-- ROW FOR SUBUSERS -->
                        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        		<div class="card rounded-0">
                        			<div class="card-header alert-success">
                        				<p class="lead text-center">Registered Sub-user</p>
                        			</div>
                        			<div class="card-body">
                        				<table class="table table-hover table-bordered nowrap" style="width: 100%;" id="registeredSubUserTable">
		                        			<tr>
		                        				<thead class='thead-light'>
		                        					<th>#</th>
		                        					<th>Username</th>
		                        					<th>Fullname</th>
		                        					<th>Relationship</th>
		                        					<th>Address</th>
		                        					<th>Contact Number</th>
		                        					<th>Status</th>
		                        					<th>Date Added</th>
		                        				</thead>
		                        			</tr>
		                        			<tr>
		                        				<?php
		                        					$sql = "SELECT * FROM subusers";

		                        					$results = mysqli_query($conn,$sql);
		                        					$resultsCheck = mysqli_num_rows($results);


		                        					if($resultsCheck > 0){
		                        						while($row = $results->fetch_assoc()){
		                        							$dateAdded = $row['dateAdded'];
		                        							$dateAdded = new DateTime($dateAdded);

			                        						echo "<td>" . $row['id'] . "</td>";
			                        						echo "<td>" . $row['username'] . "</td>";
			                        						echo "<td>" . $row['prefix'] . " " . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . " " . $row['suffix'] . "</td>";
			                        						echo "<td>" . $row['relationship'] . "</td>";
			                        						echo "<td>" . $row['homeaddress'] . "</td>";
			                        						echo "<td>" . $row['telephonenumber'] . " / " . $row['cellphonenumber'] . "</td>";
			                        						echo "<td>" . $row['status'] . "</td>";
			                        						echo "<td>" . $dateAdded->format('F-d-Y') . "</td>";
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
            <?php } else { ?>
            <?php } ?>
        <?php endif ?>
    <?php endif ?>
<?php include 'scripts.php'; ?>
