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
                        <main class="col bg-faded py-3">
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
                        </main>
                    </div>
                </div>
            <?php } else { ?>
            <?php } ?>
        <?php endif ?>
    <?php endif ?>
</body>
<script type="text/javascript">
    $('#userRequestTable').DataTable();
</script>