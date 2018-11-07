<?php include 'header.php'; ?>
<?php if(!isset($_SESSION['Position'])) :?>
    <?php header("Location: index.php"); ?>
<?php endif ?>
<span class="fas fa-bars fa-3x float-left" style="margin-top: 15px; margin-left: 15px;" onclick="openNav()"></span>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="dashboard.php">Home</a>
    <a href="#">Reports</a>
    <a href="message.php">Messages</a>
    <a href="#">Members</a>
    <a href="attendance.php">Attendance</a>
    <div class="dropdown-divider" style="width: 80%; margin: 0 auto;"></div>
    <a href="signout.php">Sign Out</a>
</div>
<div id="main">
	<div class="container">
		<nav class="navbar navbar-expand-smd navbar-dark bg-dark">
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
            <div class="float-right">
                <h5 class="lead text-light">You are signed-in as <a href="#"><?php echo $_SESSION['Username']; ?></a> | <a href="signout.php" class="text-light"><i class="btn btn-outline-light fas fa-sign-out-alt" data-toggle="tooltip" data-placement="right" title="Sign Out"></i></a></h5>
            </div>
        </nav>
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
									<a href="#" class="nav-link">
										<i class="fa fa-inbox"></i> Inbox
									</a>
								</li>
								<li class="nav-item">
				                  <a href="#" class="nav-link">
				                    <i class="fas fa-envelope"></i> Sent
				                  </a>
				                </li>
				                <li class="nav-item">
				                  <a href="#" class="nav-link">
				                    <i class="fas fa-file"></i> Drafts
				                  </a>
				                </li>
				                <li class="nav-item">
				                  <a href="#" class="nav-link">
				                    <i class="fas fa-filter"></i> Junk
				                  </a>
				                </li>
				                <li class="nav-item">
				                  <a href="#" class="nav-link">
				                    <i class="fas fa-trash-alt"></i> Trash
				                  </a>
				                </li
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
			                  <tr>
			                    <td><input type="checkbox"></td>
			                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
			                    <td class="mailbox-name"><a href="read-mail.html">BRYAN POGI</a></td>
			                    <td class="mailbox-subject"><b>Magandang Nilalang</b> - Maraming patay na patay sayo ...
			                    </td>
			                    <td class="mailbox-attachment"></td>
			                    <td class="mailbox-date">1 min ago</td>
			                  </tr>
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
</div>