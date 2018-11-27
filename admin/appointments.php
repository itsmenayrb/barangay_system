<!-- PAGE FOR APPOINTMENT REQUESTS -->
<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['adminPosition'])) {?>
    <?php header("Location: index.php"); ?>
    <?php $current = (NULL); ?>
<?php } else { ?>
<?php
    $current = $_SESSION['adminPosition'];
    $sql = "SELECT Position FROM employee WHERE Position = '$current'";
    $results = mysqli_query($conn, $sql);
    $resultsCheck = mysqli_num_rows($results);

    if ($resultsCheck > 0) : ?>
        <?php while ($row = mysqli_fetch_assoc($results)) : ?>
            <?php if (isset($_SESSION['adminPosition']) == 'Barangay Captain') { ?> <!--NAVIGATION -->
                        <main class="col bg-faded py-3">
                            <div>
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                  <li class="breadcrumb-item active">Appointments</li>
                                </ol>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="card rounded-0">
                                        <div class="card-header alert-success">
                                            <p class="lead">Appointment Request</p>
                                        </div>
                                        <div class="card-body">
                                            <div class='table-responsive'>
                                                
                                            <table class="table table-sm table-hover nowrap" id="appointmentRequestTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th><input type='checkbox' class='custom-control custom-checkbox' name='checkboxAppointmentAll'/></th>
                                                        <th>No.</th>
                                                        <th>Username</th>
                                                        <th>Fullname</th>
                                                        <th>Contact Number</th>
                                                        <th>Appointment Date</th>
                                                        <th>Appointment Time</th>
                                                        <th>Purpose</th>
                                                        <th>Date Requested</th>
                                                        <th>Status</th>
                                                        <th><i class='fas fa-cogs'></i></th>
                                                        <th>Date Accomplished</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <?php
                                                        $sql = "SELECT * FROM appointment";
                                                        $results = mysqli_query($conn, $sql);
                                                        $resultsCheck = mysqli_num_rows($results);

                                                        if($resultsCheck > 0){
                                                            while($row = $results->fetch_assoc()){
                                                                echo "<td><input type='checkbox' class='custom-control custom-checkbox' name='checkboxAppointment'/></td>";
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
                                                                echo "<td>";
                                                                if($row['status'] == 'Pending'){
                                                                    echo "<a href='appointments.php?accept={$row['id']}' class='btn-sm btn-primary'
                                                                    role='button' name='acceptAppointmentBtn' id='acceptAppointmentBtn' data-toggle='tooltip' data-placement='right' title='Accept' onClick='return myFunctionAcceptAppointment(this); return false;'>
                                                                        Accept</a>";
                                                                    echo "<a href='appointments.php?decline={$row['id']}' class='btn-sm btn-danger'
                                                                    role='button' title='Decline' data-toggle='modal' data-target='#exampleModal' id='exampleId' data-id='".$row['id']."'>Decline</a>";
                                                                    echo "</td>";

                                                                } elseif ($row['status'] == 'Deleted'){
                                                                    echo "Appointment Deleted";
                                                                } elseif ($row['status'] == 'Accepted') {
                                                                    echo "Appointment Accepted";
                                                                } elseif ($row['status'] == "Accomplished"){
                                                                    echo "Accomplished";
                                                                } else {
                                                                    echo "Appointment Declined";
                                                                }
                                                                echo "</td>";
                                                                echo "<td>";
                                                                    if($row['date_accomplished'] == (NULL) && $row['status'] <> "Pending"){
                                                                        echo "<a href='appointments.php?accomplished={$row['id']}' role='button' name='accomplishedBtn' id='accomplishedBtnDel' data-toggle='tooltip' data-placement='right' title='Accomplished' onClick='return myFunctionAccomplished(this); return false;'>
                                                                                <i class='fa fa-check text-success float-right fa-fw'></i>
                                                                            </a>";
                                                                    } else {
                                                                        echo $row['date_accomplished'];
                                                                    }
                                                                echo "</td>";
                                                                echo "</tr>";
                                                                    echo "</form>";
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
                        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="post" action="appointments.php">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reason:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="text" id="hiddenValue" name="hiddenIdDeclineAppointment" value=""/>
                                    <textarea name="reasonAppointmentDecline" cols="50" rows="2" class="form-control"></textarea>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-danger" name="declineAppointmentBtn" value="Decline">
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
            <?php } ?>
        <?php endwhile ?>
    <?php endif ?>
<?php } ?>
</body>
<script type="text/javascript">
    $("#appointmentRequestTable").DataTable({
        "scrollX" : true,
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        buttons : [
            { extend: 'pdf' , className: 'form-control btn btn-primary'},
            { extend: 'print', className: 'form-control btn btn-info'},
            { extend: 'excel', className: 'form-control btn btn-primary' },
            { extend: 'copy', className: 'form-control btn btn-info'}
        ]
    });
    function myFunctionAcceptAppointment(f){
        var r = confirm("Accept this appointment?");

        if(r == true){
            f.submit();
            return false;
        } else {
            return false;
        }
    }
    function myFunctionAccomplished(f){
        var r = confirm("Accomplished this appointment?");

        if(r == true){
            f.submit();
            return false;
        } else {
            return false;
        }
    }

    $(function () {
        $("#exampleId").click(function () {
            var my_id_value = $(this).data('id');
            $(".modal-body #hiddenValue").val(my_id_value);
        })
    });
</script>
</html>