<?php 
	include 'header.php';

	/**
	 * Check if the user is logged in
	 */
	if(!isset($_SESSION['user_ID'])) {
		header('Location: ./?update=user_not_logged_in');
		exit();
	}

  include './includes/dbh.inc.php';

	$userId = $_SESSION['user_ID'];
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
    
<form method="POST" action="/includes/update.password.handler.php">
    <input type="password" name="Current-Password"/>
    <input type="password" name="New-Password"/>
    <input type="password" name="New-Password-Confirm"/>
    <input type="submit" value="Submit"/>
</form>
    
<?php include 'footer.php'; ?>