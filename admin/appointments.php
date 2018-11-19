<!-- PAGE FOR APPOINTMENT REQUESTS -->
<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['Position'])) :?>
    <?php header("Location: index.php"); ?>
<?php endif ?>
<?php
    if(!isset($_SESSION['Position'])){ ?>
        <?php $current = (NULL); ?>
    <?php } else { ?>
        <?php
        $current = $_SESSION['Position'];
        $sql = "SELECT * FROM employee WHERE Position = '$current'";
        $results = mysqli_query($conn, $sql);
        $resultsCheck = mysqli_num_rows($results);

        if ($resultsCheck > 0) : ?>
            <?php if ($row = mysqli_fetch_assoc($results)) : ?>
                <?php if (isset($_SESSION['Position']) == 'Barangay Captain') { ?> <!--NAVIGATION -->
                            <main class="col bg-faded py-3">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="card rounded-0">
                                            <div class="card-header alert-success">
                                                <p class="lead">Appointment Request</p>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-hover table-bordered nowrap" id="appointmentRequestTable">
                                                    <tr>
                                                        <thead class="thead-light">
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
                                                            <th><i class='fas fa-cogs'></i></th>
                                                        </thead>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                            $sql = "SELECT * FROM appointment";
                                                            $results = mysqli_query($conn, $sql);
                                                            $resultsCheck = mysqli_num_rows($results);

                                                            if($resultsCheck > 0){
                                                                while($row = $results->fetch_assoc()){
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
                                                                    echo "<td>";
                                                                    if($row['status'] == 'Pending'){
                                                                        echo "<form action='appointments.php' method='post'>";
                                                                        echo "<input type='hidden' name='appointmentId' value='".$row['id']."'/>";
                                                                        echo "<input type='hidden' name='appointmentUsername' value='".$row['username']."'/>";
                                                                        echo "<input type='hidden' name='appointmentEmail' value='".$row['email']."'/>";
                                                                        echo "<input type='hidden' name='appointmentDate' value='".$row['appointment_date']."'/>";
                                                                        echo "<input type='hidden' name='appointmentTime' value='".$row['appointment_time']."'/>";
                                                                        echo "<input type='hidden' name='appointmentPurpose' value='".$row['purpose']."'/>";
                                                                        echo "<input type='submit' class='btn btn-primary' value='Accept' name='acceptAppointmentBtn'/>&nbsp;";
                                                                        echo "<input type='submit' class='btn btn-danger' value='Decline' name='declineAppointmentBtn'/>";
                                                                        echo "</form>";
                                                                    } elseif ($row['status'] == 'Deleted'){
                                                                        echo "Appointment Deleted";
                                                                    } elseif ($row['status'] == 'Accepted') {
                                                                        echo "Appointment Accepted";
                                                                    }
                                                                    echo "</td>";
                                                                    echo "</tr>";
                                                                }
                                                                echo "</table>";
                                                            }
                                                        ?>
                                            </div>
                                            <div class="card-footer alert-success"></div>
                                        </div> <!-- end of card -->
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                <?php } else { ?>
                <?php } ?>
            <?php endif ?>
        <?php endif ?>
    <?php } ?>
</body>
<script type="text/javascript">
    $('#appointmentRequestTable').DataTable({
        "scrollX" : true
    });
</script>
</html>