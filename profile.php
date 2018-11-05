<?php include 'header.php'; ?>

<div class="container main-section">

	<?php if(isset($_SESSION['Username'])) { ?>
		<div class="float-right" style="margin-top: 10px;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
	<legend class="form-text" style="color:black; font-size:2.5vw;text-transform: capitalize;">
		<?php
			$current = $_SESSION['Username'];
			$sql = "SELECT * FROM users INNER JOIN residents ON users.id = residents.user_ID WHERE users.Username ='".$current."'";
			$results = mysqli_query($conn, $sql);
			$resultsCheck = mysqli_num_rows($results);

			if($resultsCheck > 0){
				while($row = $results->fetch_assoc()){
					echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] . ' ' . $row['Suffix'] . '' . '</legend>';
					echo "<div class='container' style='margin-top: 50px;'><div class='row'><div class='col-md-7'>";
					echo "<div class='table-responsive' style='width: 900px;margin: 0 auto;max-width:100%;'>";
					echo "<table class='table table-hover table-bordered'><tr><td>Gender: </td>";
					echo "<td>" . $row['Sex'] . "</td></tr>";
					echo "<tr><td>Birthday: </td>";

					$date = $row['Bday'];
					$testDate = new DateTime($date);

					echo "<td>" . $testDate->format('F-d-Y') . "</td></tr>";
					echo "<tr><td>Age: </td>";
					echo "<td>" . $row['Age'] . "</td></tr>";
					echo "<tr><td>Birth Place: </td>";
					echo "<td>" . $row['Bplace'] . "</td></tr>";
					echo "<tr><td>Home Address: </td>";
					echo "<td>" . $row['Homeaddress'] . "</td></tr>";
					echo "<tr><td>Contact Number: </td>";
					echo "<td>" . $row['TelephoneNumber'] . " / " . $row['CellphoneNumber'] . "</td></tr></table>";
					echo "</div></div>";
					echo "<div class='col-md-5'>";
					echo "<div class='card' style='max-width: 100%;margin-bottom: 5px;'>";
					echo "<div class='card-body'>";
					echo "<a href='appointment.request.php' role='button' class='btn btn-outline-success'><i class='fas fa-info-circle'></i> Request Appointment</a>";
					echo "</div></div>";
					echo "<div class='card border-info' style='max-width: 100%;'>
							<div class='card-header'><a href='subaccount.php?addmember=true'>Add a sub-account<span class='fas fa-user-plus float-right text-info fa-2x'></span></a></div>
							<div class='card-body text-secondary'>";
					echo "<table class='table table-hover table-bordered'><thead class='thead-light'><tr><th>Name</th><th>Relationship</th></tr></thead><tr>";

					$sql = "SELECT * FROM subusers WHERE username = '$current'";
					$results = mysqli_query($conn,$sql);
					$resultsCheck = mysqli_num_rows($results);

					if($resultsCheck > 0){
						while($row = $results->fetch_assoc()){
							echo "<td><a target='_blank' href='subaccount.profile.php?id={$row['id']}'" . ">" . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix'] . '</a></td>';
							echo '<td>' . $row['relationship'] . '</td>';
							echo "</tr>";
						}
						echo "</table>";
					}
					echo	"</div>
						</div>";
					echo "</div></div></div>";
				}
			}
			$conn->close();
		?>
	<?php } else { ?>
		<div class="container">
			<section style="margin-top: 10px;">
		      <div class="container-fluid">
		        <div class="row mb-2">
		          <div class="col-sm-6">
		            <h1 style="margin-top: 10px;" class="text-danger">404 Error Page</h1>
		          </div>
		          <div class="col-sm-6" style="margin-top: 10px;">
		            <ol class="breadcrumb float-sm-right">
		              <li class="breadcrumb-item"><a href="#">Home</a></li>
		              <li class="breadcrumb-item active">404 Error Page</li>
		            </ol>
		          </div>
		        </div>
		      </div><!-- /.container-fluid -->
	    	</section>
	    	<p class="text-center display-4"><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</p>
	    	<p class="text-center h1">
	            We could not find the page you were looking for.
	            Meanwhile, you may <a href="index.php">return to Home page</a> and try to log in.
	        </p>
      	</div>
	<?php } ?>
</div>