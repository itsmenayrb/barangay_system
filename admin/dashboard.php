<!-- MAIN PAGE FOR ADMIN --
-- This page should include list of employees, as much --
-- as possible may picture nila, mission and vision --
-- and kaya pa lagyan ng chart is mas okay -->
<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['adminPosition'])) : ?>
    <script type="text/javascript">
        windows.location="index.php";
    </script>
<?php endif ?>
<?php
    $sql = "SELECT Position FROM employee";
    $results = mysqli_query($conn, $sql);
    $resultsCheck = mysqli_num_rows($results);

    if ($resultsCheck > 0) : ?>
        <?php if ($row = mysqli_fetch_assoc($results)) : ?>
            <?php if (isset($_SESSION['adminPosition']) == 'Barangay Captain') { ?> <!--NAVIGATION -->
                    <main class="col bg-faded py-3">
                        <div class="row" style="margin-top: 10px;"> <!-- Employees Profile Punong Barangay-->
                            <div class="col-sm-12 col-md-6 offset-md-3">
                                <p class="text-center h2">Barangay Officials</p>
                                <div class="card-container">
                                    <div class="card">
                                        <div class="front"> <!-- Front -->
                                            <div class="cover">
                                                <img src="../img/rotating_card_thumb.jpg">
                                            </div>
                                            <div class="user">
                                                <img class="rounded-circle" src="../img/pic_punong_barangay_marvin_t_alindog.jpg">
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h3 class="name">Marvin T. Alindog</h3>
                                                    <p class="profession">Punong Barangay</p>
                                                </div>
                                            </div>
                                        </div> <!-- end of front -->
                                        <div class="back"> <!-- back -->
                                            <div class="header">
                                                <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h4 class="text-center">Job Description</h4>
                                                    <p class="text-center"> The Punong Barangay, as the chief executive of the Barangay government, shall exercise such powers and perform such duties and functions, as provided by this Code and other laws.
                                                    <a class="btn-link" href="#"><i>See more...</i></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                <div class="social-links text-center">
                                                    <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                                                    09xxxxxxxxx
                                                </div>
                                            </div>
                                        </div> <!-- end of back -->
                                    </div> <!-- end of card -->
                                </div> <!-- end of card-container -->
                            </div>
                        </div> <!-- end of row -->
                        <div class="row"> <!-- Employees Profile Barangay Secretary-->
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="card-container">
                                    <div class="card">
                                        <div class="front"> <!-- Front -->
                                            <div class="cover">
                                                <img src="../img/rotating_card_thumb.jpg">
                                            </div>
                                            <div class="user">
                                                <img class="rounded-circle" src="../img/pic_barangay_secretary_ronald_c_guevara.jpg">
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h3 class="name">Ronald C Guevara</h3>
                                                    <p class="profession">Barangay Secretary</p>
                                                </div>
                                            </div>
                                        </div> <!-- end of front -->
                                        <div class="back"> <!-- back -->
                                            <div class="header">
                                                <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h5 class="text-center">Job Description</h5>
                                                    <small class="text-center form-text text-muted"> Keep custody of all records of the sangguniang barangay and the barangay assembly meetings; Prepare and keep the minutes of all meetings of the sangguniang barangay and the barangay assembly;
                                                    <a class="btn-link" href="#"><i>See more...</i></a>
                                                    </small>
                                                </div>
                                            </div>
                                        </div> <!-- end of back -->
                                    </div> <!-- end of card -->
                                </div> <!-- end of card-container -->
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3"> <!-- barangay treasurer -->
                                <div class="card-container">
                                    <div class="card">
                                        <div class="front"> <!-- Front -->
                                            <div class="cover">
                                                <img src="../img/rotating_card_thumb.jpg">
                                            </div>
                                            <div class="user">
                                                <img class="rounded-circle" src="../img/pic_treasurer_benito_c_sayoto.jpg">
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h3 class="name">Benito C. Sayoto</h3>
                                                    <p class="profession">Barangay Treasurer</p>
                                                </div>
                                            </div>
                                        </div> <!-- end of front -->
                                        <div class="back"> <!-- back -->
                                            <div class="header">
                                                <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h5 class="text-center">Job Description</h5>
                                                    <small class="text-center form-text text-muted">  Barangay Treasurer has the responsibility of collecting and issuing official receipts for taxes or payments accruing to the barangay treasury, disbursing of funds in accordance with the procedures.
                                                    <a class="btn-link" href="#"><i>See more...</i></a>
                                                    </small>
                                                </div>
                                            </div>
                                        </div> <!-- end of back -->
                                    </div> <!-- end of card -->
                                </div> <!-- end of card-container -->
                            </div> <!-- end of col -->
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3"> <!-- barangay kagawad -->
                                <div class="card-container">
                                    <div class="card">
                                        <div class="front"> <!-- Front -->
                                            <div class="cover">
                                                <img src="../img/rotating_card_thumb.jpg">
                                            </div>
                                            <div class="user">
                                                <img class="rounded-circle" src="../img/pic_barangay_kagawad_alfin_o_bautista.jpg">
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h3 class="name">Alfin O. Bautista</h3>
                                                    <p class="profession">Barangay Kagawad</p>
                                                </div>
                                            </div>
                                        </div> <!-- end of front -->
                                        <div class="back"> <!-- back -->
                                            <div class="header">
                                                <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h5 class="text-center">Job Description</h5>
                                                    <small class="text-center form-text text-muted">A kagawad, as a member of the sangguniang barangay, should ensure to provide their constituents with basic services such as peace and order, formulating measures to eradicate drug addiction,
                                                    <a class="btn-link" href="#"><i>See more...</i></a>
                                                    </small>
                                                </div>
                                            </div>
                                        </div> <!-- end of back -->
                                    </div> <!-- end of card -->
                                </div> <!-- end of card-container -->
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3"> <!-- barangay kagawad -->
                                <div class="card-container">
                                    <div class="card">
                                        <div class="front"> <!-- Front -->
                                            <div class="cover">
                                                <img src="../img/rotating_card_thumb.jpg">
                                            </div>
                                            <div class="user">
                                                <img class="rounded-circle" src="../img/pic_barangay_kagawad_dexted_d_ilano.jpg">
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h3 class="name">Dexter D. Ilano</h3>
                                                    <p class="profession">Barangay Kagawad</p>
                                                </div>
                                            </div>
                                        </div> <!-- end of front -->
                                        <div class="back"> <!-- back -->
                                            <div class="header">
                                                <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                                            </div>
                                            <div class="content">
                                                <div class="section">
                                                    <h5 class="text-center">Job Description</h5>
                                                    <small class="text-center form-text text-muted">A kagawad, as a member of the sangguniang barangay, should ensure to provide their constituents with basic services such as peace and order, formulating measures to eradicate drug addiction,
                                                    <a class="btn-link" href="#"><i>See more...</i></a>
                                                    </small>
                                                </div>
                                            </div>
                                        </div> <!-- end of back -->
                                    </div> <!-- end of card -->
                                </div> <!-- end of card-container -->
                            </div>
                        </div> <!-- end of row -->
                        <div class='table-responsive'>
                            <table class='table table-hover table-bordered' id="employeeTable">
                                <thead class='thead-light'>
                                    <tr>
                                        <th class="alert-success">Employee ID</th>
                                        <th>Full Name</th>
                                        <th>Position</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tr>
                                <!-- QUERY FOR DISPLAYING OF ALL OF EMPLOYEES -->
                                    <?php
                                        $sql = "SELECT * FROM employee";
                                        $results = mysqli_query($conn, $sql);
                                        $resultsCheck = mysqli_num_rows($results);

                                        if($resultsCheck > 0){
                                            while($row = $results->fetch_assoc()){
                                                echo "<td class='alert-success'>" . $row['employee_id'] . "</td>";
                                                echo "<td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . " " . $row['Suffix'] . "</td>";
                                                echo "<td>" . $row['Position'] . "</td>";
                                                echo "<td>" . $row['homeaddress'] . "</td>";
                                                echo "<td>" . $row['contactnumber'] . "</td>";
                                                echo "<td><i class='fa fa-user-edit text-info'></i> <i class='fa fa-trash-alt text-danger'></i></td>";
                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                        }
                                    ?>
                        </div>
                    </main>
                </div>
            </div>
            <?php } elseif (isset($_SESSION['adminPosition']) == 'Barangay Tanod') { ?>
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
</body>
<script type="text/javascript">
    $('#employeeTable').DataTable();
</script>
</html>