<?php include 'header.php';?>

<?php include 'includes/dbh.inc.php';?>

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
	      </div>
    	</section>
    	<p class="text-center display-4"><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</p>
    	<p class="text-center h1">
            We could not find the page you were looking for.
            Meanwhile, you may <a href="index.php">return to Home page</a> and try to log in.
        </p>
  	</div>
<?php } else { ?>

<?php    $current = $_SESSION['Username'];

	if(!isset($_GET['id'])) { ?>

		<?php $autoID = (NULL); ?>

		<div class="container" style="padding: 20px;">
			<div style="margin-top: 10px;">
		    	<ol class="breadcrumb">
		      		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		      		<li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
		      		<li class="breadcrumb-item active">Request Forms</li>
                    <li class="ml-auto"><a href="#"><b>Submit Request</b></a></li>
		    	</ol>
			</div>
    <?php } ?>

    <?php
    	$contactNumber = "";
    	$purpose = "";
    	if(isset($_POST['request'])){
    		$contactNumber = checkInput($_POST['contact']);
    		$purpose = checkInput($_POST['purpose']);

    		$sql = "INSERT INTO user_req (username, contactnumber, purpose) VALUES (?,?,?)";
    		$stmt = mysqli_stmt_init($conn);
    		if(!mysqli_stmt_prepare($stmt, $sql)){
		      array_push($errors, "Something went wrong. Please try again later.");
		    }
		     else {
		     	mysqli_stmt_bind_param($stmt, "sss", $current, $contactNumber, $purpose);
		     	mysqli_stmt_execute($stmt);
		     }
		     mysqli_stmt_close($stmt);
    			mysqli_close($conn);
    	}

    ?>

 <?php if(isset($_POST['forms']))
{
        if($_POST['forms']=='clearance')//barangay clearance
            {
        echo '<object data="docs/clearance.php" type="application/pdf" style="position: top:400px;width:1000px;height:1200px;">alt : 
                    <a href="docs/clearance.php">clearance.php</a></object>';

            }
        else if($_POST['forms']=='indigency')//indigency cert
            {
        echo '<object data="docs/indigency.php" type="application/pdf" style="position: top:400px;width:1100px;height:1200px;">alt : 
                        <a href="docs/indigency.php">indigency.php</a></object>';
            }

        else if($_POST['forms']=='endorsement')//endorsement cert
            {
        echo '<object data="docs/endorsement.php" type="application/pdf" style="position: top:400px;width:1100px;height:1200px;">alt : 
                        <a href="docs/endorsement.php">endorsement.php</a></object>';
        }
        else if($_POST['forms']=='certification')//barangay cert
            {
        echo '<object data="docs/certification.php" type="application/pdf" style="position: top:400px;width:1100px;height:1200px;">alt : 
                        <a href="docs/certification.php">certification.php</a></object>';
        }
        else if($_POST['forms']=='business')//business clearance
            {  
        echo    '<div class="row">
	                <div class="col-md-7">
					<div class="card border-info rounded-0">
						<div class="card-header alert-success">
							<div class="fs-title">
								<h4>BUSINESS CLEARANCE</h4>
							</div>
						</div>
						<div class="card-body">
							<?php include "includes/errors.inc.php"; ?>
							<?php include "includes/success.inc.php"; ?>
							<form action="preview.php" method="post" style="width: 90%;margin: 0 auto;">
								<h6 class="form-text text-muted">Please fill this up to proceed.</h6>
								<small class="form-text text-muted">Business Name or Trade: </small>
								<input type="text" class="form-control" name="business" required/>
								<small class="form-text text-muted">Location: <i>(Location must be in Barangay Salitran II jurisdiction only).</i></small>
								<input type="text" class="form-control" name="location" required/>
								<small class="form-text text-muted">Operator: <i>(Who will manage this business).</i></small>
                                <input type="text" class="form-control" name="operator" required/>
                                <small class="form-text text-muted">&nbsp;</small>
                                <input type="submit" value="Submit" name="request" class="form-control btn btn-outline-success" onClick="showBusinessForm();"/>
							</form>
						</div>
						<div class="card-footer alert-success"></div>
					</div>
				</div>
			</div>
        </div>';
        
        }
}
else 
{
    echo '<h2>There is nothing to display. Please select what FORMS you want to request!</h2><br><a href="profile.php">Back</a>';
}
?>
<script>
                    function showBusinessForm(){
                      <?php echo   '<object data="docs/business.php" type="application/pdf" style="position: top:400px;width:1100px;height:1200px;">alt : 
                                    <a href="docs/business.php">business.php</a></object>';
                                    ?>
                    }
                    </script>
<?php } ?>
<?php include 'footer.php'; ?>
                    