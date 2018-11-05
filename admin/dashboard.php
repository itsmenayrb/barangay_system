<?php include 'header.php'; ?>
<?php
    $sql = "SELECT id FROM employee";
    $results = mysqli_query($conn, $sql);
    $resultsCheck = mysqli_num_rows($results);

    if ($resultsCheck > 0) : ?>
        <?php if ($row = mysqli_fetch_assoc($results)) : ?>
            <?php if (isset($_SESSION['Position']) == 'Barangay Captain') { ?>
                <span class="fas fa-bars fa-3x float-left" style="margin-top: 15px; margin-left: 15px;" onclick="openNav()"></span>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="dashboard.php">Home</a>
                    <a href="#">Reports</a>
                    <a href="message.php">Messages</a>
                    <a href="#">Members</a>
                    <a href="attendance.php">Attendance</a>
                    <div class="dropdown-divider" style="width: 80%; margin: 0 auto;"></div>
                    <a href="signout.php">Sign Out</a>
                </div>

                <div id="main">
                    <div class="container">
                        <nav class="navbar navbar-expand-smd navbar-dark bg-dark">
                            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
                            <div class="float-right">
                                <h5 class="lead text-light">You are signed-in as <a href="#"><?php echo $_SESSION['Username']; ?></a> | <a href="signout.php" class="text-light"><i class="btn btn-outline-light fas fa-sign-out-alt" data-toggle="tooltip" data-placement="right" title="Sign Out"></i></a></h5>
                            </div>
                        </nav>
                        <div class="container">
                            <p class="lead text-center">EMPLOYEES</p>
                            <div class='container'>
                                <div class='table-responsive'>
                                    <table class='table table-hover table-bordered' id="employeeTable">
                                        <thead class='thead-light'>
                                            <tr>
                                                <th>Employee ID</th>
                                                <th>Full Name</th>
                                                <th>Position</th>
                                                <th>Address</th>
                                                <th>Contact Number</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <?php
                                                $sql = "SELECT * FROM employee INNER JOIN barangaychairman ON employee.employee_id = barangaychairman.employee_id";
                                                $results = mysqli_query($conn, $sql);
                                                $resultsCheck = mysqli_num_rows($results);

                                                if($resultsCheck > 0){
                                                    while($row = $results->fetch_assoc()){
                                                        echo "<td>" . $row['employee_id'] . "</td>";
                                                        echo "<td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . " " . $row['Suffix'] . "</td>";
                                                        echo "<td>" . $row['Position'] . "</td>";
                                                        echo "<td>" . $row['homeaddress'] . "</td>";
                                                        echo "<td>" . $row['contactnumber'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    echo "</table>";
                                                }
                                            ?>
                                </div>
                            </div>
                        </div>
                        <?php include 'message.php'; ?>
                    </div>
                </div>
            <?php } elseif (isset($_SESSION['Position']) == 'Barangay Tanod') { ?>
                <span class="fas fa-bars fa-3x" style="margin-top: 5px; margin-left: 15px;" onclick="openNav()"></span>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="#">Home</a>
                    <a href="signout.php">Sign Out</a>
                </div>

                <div id="main">
                    <div class="container">
                        <p class="display-4">Peacekeeper's Portal</p>
                        <p class="lead">UNDER CONSTRUCTION...</p>
                    </div>
                </div>
            <?php } ?>
        <?php endif ?>
    <?php endif ?>