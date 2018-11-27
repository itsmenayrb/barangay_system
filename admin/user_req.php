<!-- form requests -->
<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['adminPosition'])) :?>
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
                                <div>
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                      <li class="breadcrumb-item active">Form Requests</li>
                                    </ol>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="card rounded-0">
                                            <div class="card-header alert-success">
                                                <p class="lead">User Request of Forms</p>
                                            </div>
                                            <div class="card-body">
                                                <div class='table-responsive'>
                                                <table class="table table-hover table-bordered" id="reqTable">
                                                    <tr>
                                                        <thead class="thead-light">
                                                            <th><input type='checkbox' class='custom-control custom-checkbox' name='checkboxReqAll'/></th>
                                                            <th>No.</th>
                                                            <th>Username</th>
                                                            <th>Contact Number</th>
                                                            <th>Purpose</th>
                                                            <th><i class='fas fa-cogs'></i></th>
                                                        </thead>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                            $sql = "SELECT * FROM user_req";
                                                            $results = mysqli_query($conn, $sql);
                                                            $resultsCheck = mysqli_num_rows($results);

                                                            if($resultsCheck > 0){
                                                                while($row = $results->fetch_assoc()){
                                                                    echo "<td><input type='checkbox' class='custom-control custom-checkbox' name='checkboxReq'/></td>";
                                                                    echo "<td>" . $row['id'] . "</td>";
                                                                    echo "<td>" . $row['username'] . "</td>";
                                                                    echo "<td>" . $row['fullname'] . "</td>";
                                                                    echo "<td>" . $row['contact'] . "</td>";
                                                                    echo "<td>" . $row['purpose'] . "</td>";
                                                                    echo "<td>";
                                                                    if($row['status'] == 'Pending'){
                                                                        echo "<form action='preview.php' method='post'>";
                                                                        echo "<input type='hidden' name='reqId' value='".$row['id']."'/>";
                                                                        echo "<input type='hidden' name='reqUsername' value='".$row['username']."'/>";
                                                                        echo "<input type='hidden' name='reqEmail' value='".$row['email']."'/>";
                                                                        echo "<input type ='hidden' name ='reqContact' value='".$row['contact']."'/>";
                                                                        echo "<input type='hidden' name='reqPurpose' value='".$row['purpose']."'/>";
                                                                        echo "<input type='submit' class='btn btn-primary' value='Accept' id='acceptReqId' name='acceptReqBtn' onClick='return myFunctionReqAccept(this); return false;'/>";
                                                                        echo "<button type='button' class='btn btn-danger' id='btnForModalReq' onClick='return myFunctionReqDecline(this); return false;'>Decline</button>";
                                                                        ?>
                                                                        <div class='modal fade' tabindex='-1' id='reqModal' role='dialog'>
                                                                            <div class='modal-dialog' role='document'>
                                                                                <div class='modal-content'>
                                                                                    <div class='modal-header'>
                                                                                        <h4 class='modal-title'>Reason:</h4>
                                                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                                            <span aria-hidden='true'>&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class='modal-body'>
                                                                                        <textarea name=' id=' cols='50' rows='2'></textarea>
                                                                                    </div>
                                                                                    <div class='modal-footer form-inline'>
                                                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                                                        <input type='submit' class='btn btn-danger' value='Decline' name='declineReqBtn' id='declineReqBtnId'/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        echo "</form>";
                                                                    } elseif ($row['status'] == 'Deleted'){
                                                                        echo "Request Deleted";
                                                                    } elseif ($row['status'] == 'Accepted') {
                                                                        echo "Request Accepted";
                                                                    } else {
                                                                        echo "Request Declined";
                                                                    }
                                                                    echo "</td>";
                                                                    echo "</tr>";
                                                                }
                                                                echo "</table>";
                                                            }
                                                        ?>
                                                    </div>
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
    function myFunctionReqAccept(f){
        var r = confirm("Confirm Accept");

        if(r == true){
            f.submit();
            return false;
        } else {
            return false;
        }
    }
    function myFunctionReqDecline(f){
        var r = confirm("Decline Request?");

        if(r == true){
            $('#reqModal').modal({
                'show': true,
                focus: true
            });
            return false;
        } else {
            return false;
        }
    }
</script>
</html>