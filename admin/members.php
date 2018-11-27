<!-- PAGE FOR RECORD REGISTERED
	OF REGISTERED USERS AND SUBUSERS -->
<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['adminPosition'])) :?>
    <?php header("Location: index.php"); ?>
<?php endif ?>
<?php
    $sql = "SELECT Position FROM employee";
    $results = mysqli_query($conn, $sql);
    $resultsCheck = mysqli_num_rows($results);

    if ($resultsCheck > 0) : ?>
        <?php if ($row = mysqli_fetch_assoc($results)) : ?>
            <?php if (isset($_SESSION['adminPosition']) == 'Barangay Captain') { ?> <!--NAVIGATION -->
            			<main class="col bg-faded py-3">
            				<div>
						        <ol class="breadcrumb">
						          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						          <li class="breadcrumb-item active">Members</li>
						        </ol>
						    </div>
	                        <div class="row""> <!-- ROW FOR REGISTERED USERS -->
	                        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                        		<div class="card rounded-0">
	                        			<div class="card-header alert-success">
	                        				<p class="lead text-center">Registered User</p>
	                        			</div>
	                        			<div class="card-body">
	                        				<table class="table table-hover nowrap display" style="width: 100%;" id="registeredUserTable">
			                        			<thead class="thead-light">
			                        				<tr>
			                        					<th>#</th>
			                        					<th>Username</td>
			                        					<th>Fullname</th>
			                        					<th>Address</th>
			                        					<th>Contact Number</th>
			                        					<th>Status</th>
			                        					<th>Last Login</th>
			                        				</tr>
			                        			</thead>
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
	                        				<table class="table table-hover nowrap display" style="width: 100%;" id="registeredSubUserTable">
			                        			<thead class='thead-light'>
			                        				<tr>
			                        					<th>#</th>
			                        					<th>Username</th>
			                        					<th>Fullname</th>
			                        					<th>Relationship</th>
			                        					<th>Address</th>
			                        					<th>Contact Number</th>
			                        					<th>Status</th>
			                        					<th>Date Added</th>
			                        				</tr>
			                        			</thead>
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
                    	</main>
                    </div>
                </div>
            <?php } else { ?>
            <?php } ?>
        <?php endif ?>
    <?php endif ?>
<script type="text/javascript" src="../assets/datatables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../assets/datatables/buttons.flash.min.js"></script>

<script type="text/javascript">
	$("table.display").DataTable({
		"scrollX": true,
		"pagingType": "full_numbers",
		dom: 'Bfrtip',
        buttons : [
            { extend: 'pdf' , className: 'form-control btn-block'},
            { extend: 'print', className: 'form-control btn btn-info'},
            { extend: 'excel', className: 'form-control btn btn-primary' },
            { extend: 'copy', className: 'form-control btn btn-info'},
            { extend: 'print', className: 'form-control btn btn-secondary'},
        ]
	});
</script>
</body>
</html>