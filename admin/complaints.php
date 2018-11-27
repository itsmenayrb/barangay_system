<!-- TODO: MESSAGE AND NOTIFICATIONS --
-- this is page will display all the inquiries or messages --> 

<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['adminPosition'])) :?>
    <?php header("Location: index.php"); ?>
<?php endif ?>
<main class="col bg-faded py-3">
	<div class="container">
        <div style="margin-top: 10px;">
	        <ol class="breadcrumb">
	          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
	          <li class="breadcrumb-item active">Messages</li>
	        </ol>
	    </div>
		<section class="content">
			<div class="row">
				<div class="col-md-3">
					<a href="compose.php" class="btn btn-primary btn-block mb-3">Compose</a>
					<div class="card">
						<div class="card-header">
							<h4 class="card-title float-left">Folders</h4>
							<div class="card-tools">
								<button type="button" class="btn btn-toolbar float-right" data-widget="collapse"><i class="fas fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body p-0">
							<ul class="nav nav-pills flex-column">
								<li class="nav-item active">
									<a href="./message.php" class="nav-link">
										<i class="fa fa-inbox"></i> Suggestions & Recommendations
									</a>
								</li>
								<li class="nav-item">
				          <a href="./inquiries.php" class="nav-link">
				            <i class="fas fa-envelope"></i> Inquiries
				          </a>
				        </li>
				        <li class="nav-item">
				          <a href="./commendations.php" class="nav-link">
				            <i class="fas fa-file"></i> Commendations
				          </a>
				        </li>
				        <li class="nav-item">
				          <a href="./complaints.php" class="nav-link">
				            <i class="fas fa-filter"></i> Complaints
				          </a>
				        </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card card-primary card-outline-primary">
						<div class="card-header">
							<h4 class="card-title float-left">Inbox</h4>
							<div class="card-tools float-right">
								<div class="input-group input-group-sm">
									<input type="text" class="form-control" placeholder="Search Mail">
					                <div class="input-group-append">
					                    <div class="btn btn-primary">
					                      <i class="fa fa-search"></i>
					                    </div>
					                </div>
								</div>
							</div>
						</div>
						<div class="card-body p-0">
			              <div class="mailbox-controls">
			                <!-- Check all button -->
			                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
			                </button>
			                <div class="btn-group">
			                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
			                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
			                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
			                </div>
			                <!-- /.btn-group -->
			                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-sync-alt"></i></button>
			                <div class="float-right">
			                  <div class="btn-group">
			                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
			                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
			                  </div>
			                  <!-- /.btn-group -->
			                </div>
			                <!-- /.float-right -->
			              </div>
			              <div class="table-responsive mailbox-messages">
			                <table class="table table-hover table-striped">
			                  <tbody>
												<?php 
													include_once "../includes/dbh.inc.php";
													

													$results = $conn -> query("SELECT * FROM complaints");
													
													echo $conn -> error;

													while($row = $results -> fetch_assoc()) {
														$id = $row['id'];
														$subject = $row['subject'];
														$message = substr($row['complaint'], 0, 50);

														$template = "
															<tr>
																<td><input type='checkbox'></td>
																<td class='mailbox-star'><a href='#'><i class='fa fa-star text-warning'></i></a></td>
																<td class='mailbox-name'><a href='./message.display.php?complaint=$id'>$subject</a></td>
																<td class='mailbox-subject'>$message</td>
																<td class='mailbox-attachment'></td>
																<td class='mailbox-date'>&nbsp;</td>
															</tr>
														";
														echo $template;
													}
												?>
			                  </tbody>
			                </table>
			                <!-- /.table -->
			              </div>
			              <!-- /.mail-box-messages -->
			            </div>
					</div>
				</div>
			</div>
		</section>
	</div>
</main>