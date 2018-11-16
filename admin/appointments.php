<!-- PAGE FOR APPOINTMENT REQUESTS -->
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
                        <div class="card rounded-0 my-2">
                            <div class="card-header alert-success">
                                <p class="lead">Appointment Request</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-bordered nowrap" id="appointmentRequestTable">
                                    <tr>
                                        <thead class="thead-light">
                                            <th><i class='fas fa-cogs'></i></th>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Contact Number</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Purpose</th>
                                            <th>Date Requested</th>
                                            <th>Status</th>
                                            <th>Date Accomplished</th>
                                        </thead>
                                    </tr>
                                    <tr>
                                        <?php
                                            $sql = "SELECT * FROM appointment";
                                            $results = mysqli_query($conn, $sql);
                                            $resultsCheck = mysqli_num_rows($results);

                                            if($resultsCheck > 0){
                                                while($row = $results->fetch_assoc()){
                                                    echo "<td>&nbsp;</td>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['username'] . "</td>";
                                                    echo "<td>" . $row['fullname'] . "</td>";
                                                    echo "<td>" . $row['contactnumber'] . "</td>";
                                                    $appointment_date = $row['appointment_date'];
                                                    $appointment_date = new DateTime($appointment_date);
                                                    echo "<td>" . $appointment_date->format('F-d-y') . "</td>";
                                                    $appointment_time = $row['appointment_time'];
                                                    $appointment_time = date('h:i A', strtotime($appointment_time));
                                                    echo "<td>" . $appointment_time . "</td>";
                                                    echo "<td>" . $row['purpose'] . "</td>";
                                                    echo "<td>" . $row['date_requested'] . "</td>";
                                                    echo "<td>" . $row['status'] . "</td>";
                                                    echo "<td>" . $row['date_accomplished'] . "</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</table>";
                                            }
                                        ?>
                            </div>
                            <div class="card-footer alert-success"></div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
            <?php } ?>
        <?php endif ?>
    <?php endif ?>
<?php include 'scripts.php'; ?>