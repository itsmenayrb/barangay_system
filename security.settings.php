<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['Username'])) { ?>
	<section style="margin-top: 10px;">
      <div class="container">
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
        Meanwhile, you may <a href="index.php">return to Home page</a> to log in.
    </p>
<?php } else { ?>
	<div class="container">
		<h1 class="h3 p-3 text-center mb-4">Security Settings</h1>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="table-responsive mb-3">
					<table class="table text-nowrap table-hover" id="securitySettingsTable">
						<tr>
							<td class="border-top-0"><h1 class="lead text-left font-weight-bold">Username:</h1></td>
							<?php $current = $_SESSION['Username']; ?>
							<td class="border-top-0"><h1 class="lead text-left"><?php echo $current; ?></h1></td>
							<td class="border-0">&nbsp;</td>
						</tr>
						<tr onmouseover="Context(this);">
							<?php $sql = "SELECT * FROM users WHERE Username='$current';"; ?>
							<?php $results = mysqli_query($conn, $sql); ?>
							<?php $resultsCheck = mysqli_num_rows($results); ?>
							<?php if($resultsCheck > 0) : ?>
								<?php if($row = $results->fetch_assoc()) : ?>
									<td class="border-0"><h1 class="lead text-left font-weight-bold">First Security Question:</h1></td>
									<td class="border-0"><h1 class="lead"><?php echo $row['SecurityQuestion1']; ?></h1></td>
									<td class="border-0"><a id="linkSecuritySettings" href="#" class="btn-link font-italic">Change</a></td>
									<tr>
										<td class="border-0"><h1 class="lead text-left font-weight-bold">Answer:</h1></td>
										<td class="border-0"><h1 class="lead"><?php echo $row['AnswerOne']; ?></h1></td>
										<td class="border-0"><a href="#" class="btn-link font-italic">Change</a></td>
									</tr>
									<tr>
										<td class="border-0"><h1 class="lead text-left font-weight-bold">Second Security Question:</h1></td>
										<td class="border-0"><h1 class="lead"><?php echo $row['SecurityQuestion2']; ?></h1></td>
										<td class="border-0"><a href="#" class="btn-link font-italic">Change</a></td>
									</tr>
									<tr>
										<td class="border-0"><h1 class="lead text-left font-weight-bold">Answer:</h1></td>
										<td class="border-0"><h1 class="lead"><?php echo $row['AnswerTwo']; ?></h1></td>
										<td class="border-0"><a href="#" class="btn-link font-italic">Change</a></td>
									</tr>
									<tr>
										<td class="border-0"><h1 class="lead text-left font-weight-bold">Password:</h1></td>
										<td class="border-0"><h1 class="lead"><?php echo $row['Pwd']; ?></h1></td>
										<td class="border-0"><a href="#" class="btn-link font-italic">Change</a></td>
									</tr>
								<?php endif ?>
							<?php endif ?>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php include 'footer.php'; ?>