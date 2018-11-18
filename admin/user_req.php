<!---carbon copy of appointment.php-->
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
                                        <a href="user_req.php">User Requests</a><!---dedpol--->
                    <div class="dropdown-divider" style="width: 80%; margin: 0 auto;"></div>
                    <a href="signout.php">Sign Out</a>
                </div>
                <div id="main">
                    <div class="container">
                        <nav class="navbar navbar-expand-smd navbar-dark bg-info">
                            <a class="navbar-brand" href="dashboard.php">Home</a>
                            <div class="float-right">
                                <h5 class="lead text-light">You are signed-in as <a href="#" class="text-dark"><?php echo $_SESSION['Username']; ?></a> | <a href="signout.php" class="text-light"><i class="btn btn-outline-light fas fa-sign-out-alt" data-toggle="tooltip" data-placement="right" title="Sign Out"></i></a></h5>
                            </div>
                        </nav>
                        <div class="card rounded-0 my-2">
                            <div class="card-header alert-success">
                                <p class="lead">User Request</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-bordered nowrap" id="userRequestTable">
                                    <tr>
                                        <thead class="thead-light">
                                            <th><i class='fas fa-cogs'></i></th>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Contact Number</th>
                                            <th>Purpose</th>
                                            <th>Action</th>
                                        </thead>
                                    </tr>
                                    <tr>
                                        <?php
                                            $sql = "SELECT * FROM user_req";
                                            $results = mysqli_query($conn, $sql);
                                            $resultsCheck = mysqli_num_rows($results);

                                            if($resultsCheck > 0){
                                                while($row = $results->fetch_assoc()){
                                                    echo "<td>&nbsp;</td>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['username'] . "</td>";
                                                    echo "<td>" . $row['contactnumber'] . "</td>";
                                                    echo "<td>" . $row['purpose'] . "</td>";
                                                    echo '<td><button name="button" value="accept"class="btn btn-primary my-2">Accept</button>
                                                    <button name="button" value="reject"class="btn btn-secondary my-2">Reject</button>
                                                    <td>';
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