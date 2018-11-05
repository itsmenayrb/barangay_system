<?php include 'header.php';?>

<?php if(!isset($_SESSION['Username'])) { ?>
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
<?php } else { ?>
	<div class="container">
		<div style="margin-top: 10px;">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
              <li class="breadcrumb-item active">Sub-Account - Profile</li>
            </ol>
        </div>
        <legend class="form-text" style="color:black; font-size:2.5vw;text-transform: capitalize;">
        <?php
        	$current = $_SESSION['Username'];
        	$autoID = checkInput($_GET['id']);
			$sql = "SELECT * FROM subusers INNER JOIN users ON subusers.username = users.Username WHERE subusers.id ='".$autoID."'" . "AND subusers.username = '".$current."'";
			$results = mysqli_query($conn, $sql);
			$resultsCheck = mysqli_num_rows($results);

			if($resultsCheck > 0){
				while($row = $results->fetch_assoc()){
					echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix'] . '' . '</legend>';
					echo "<div class='container' style='margin-top: 50px;'><div class='row'><div class='col-md-7'>";
					echo "<div class='table-responsive' style='width: 900px;margin: 0 auto;max-width:100%;'>";
					echo "<table class='table table-hover table-bordered'><tr><td>Gender: </td>";
					echo "<td>" . $row['gender'] . "</td></tr>";
					echo "<tr><td>Birthday: </td>";

					$date = $row['birthday'];
					$testDate = new DateTime($date);

					echo "<td>" . $testDate->format('F-d-Y') . "</td></tr>";
					echo "<tr><td>Age: </td>";
					echo "<td>" . $row['age'] . "</td></tr>";
					echo "<tr><td>Birth Place: </td>";
					echo "<td>" . $row['birthplace'] . "</td></tr>";
					echo "<tr><td>Home Address: </td>";
					echo "<td>" . $row['homeaddress'] . "</td></tr>";
					echo "<tr><td>Contact Number: </td>";
					echo "<td>" . $row['telephonenumber'] . " / " . $row['cellphonenumber'] . "</td></tr></table>";
					echo "</div></div>";
				}
			}
			else{
				echo "<script type='text/javascript'>window.location='profile.php';</script>";
			}
		?>
	</div>
<?php } ?>
<?php include 'footer.php'; ?>