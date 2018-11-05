<?php 
	include 'header.php';

	/**
	 * Check if the user is logged in
	 */
	if(!isset($_SESSION['id'])) {
		header('Location: ./?update=user_not_logged_in');
		exit();
	}

  include './includes/dbh.inc.php';

	$userId = $_SESSION['id'];
	$query = $conn -> query('SELECT * FROM residents WHERE user_ID =' . $userId);
	
	/**
	 * Go back to the index page since an error occurred
	 * during query of the user details
	 */
	if(!$query) {
		header('Location: ./?update=error_occurred');
		exit();
	}

	$row = $query -> fetch_assoc();
?>

<div class="main-container">
	<div class="registration-container">
		<p> Update </p>
		<p>Note: * means required</p>
		<form id="form" action="includes/update.resident.request.handler.php" method="put">
				<div id="fname-update">
					<label for="fname">First Name* </label> 
					<input type="text" name="First-Name" id="fname" placeholder="First Name" value="<?php echo $row['FirstName']; ?>" required/> 
				</div>

				<div id="mname-update">
					<label for="mname">Middle Name* </label> 
					<input type="text" name="Middle-Name" id="mname" placeholder="Middle Name" value="<?php echo $row['MiddleName'];?>" required>
				</div>

				<div id="lname-update">
					<label for="lname">Last Name* </label> 
					<input type="text" name="Last-Name" id="lname" placeholder="Last Name" value="<?php echo $row['LastName']; ?>" required/> 
				</div>

				<div id="suffix-update">
					<label for="suffix">Suffix</label> 
					<input type="text" name="Suffix" placeholder="Jr. Sr. II I" value="<?php echo $row['Suffix']; ?>">
				</div>

				<div id="address-update">
					<label for="address">Address*</label>
					<textarea><?php echo $row['Homeaddress']; ?></textarea>
				</div>
				
				<div id="bday-update">
					<label for="birthday">Date of Birth* </label> 
					<input type="date" name="Birthday" id="birthday" value="<?php echo $row['Bday']; ?>" required>
				</div>

				<div id="bplace-update">					
					<label for="birthplace">Place of Birth* </label>
					<input type="text" name="Birthplace" id="birthplace" placeholder="Place of Birth" value="<?php echo $row['Bplace']; ?>" required>
				</div>

				<div id="number-update">
					<label for="contactnumber">Contact Number*</label>
					<input type="text" id="contactnumber" name="Contact-Number" placeholder="09XXXXXXXXX" value="<?php echo $row['ContactNumber']; ?>" required>
				</div>

				<div id="email-update">
					<label for="email">Email* </label>
					<input type="text" name="E-mail" id="email" placeholder="Email" value="<?php echo $row['Email']; ?>" required/> 
				</div>

				<input type="submit" name="submit" id="submit" value="Update"/>	
		</form>
	</div>
</div>

<script src="./assets/js/update.resident.js"></script>

<?php include 'footer.php'; ?>