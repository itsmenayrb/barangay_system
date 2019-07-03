<?php include 'header.php'; ?>
<div class="container-fluid" style="width: 60%; margin: 0 auto;" id="contactSelection">
	<div class="row p-3">
		<div class="col-md-6">
			<h1 class="h4"><strong>Please choose your selection:</strong></h1>
		</div>
		<div class="col-md-6">
			<select class="form-control" name="contactUsSelector" id="contactUsSelector">
				<option value="" selected disabled>Message Us</option>
				<option value="suggestRecommend">Suggestions or Recommendations</option>
				<option value="inquiry">Inquire</option>
				<option value="">File a complaint</option>
			</select>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div id="suggestRecommend" class="contact">
		<div class="content-title">
			<div class="container" style="width: 60%; margin: 0 auto;">
				<h3 class="lead">Suggestions or Recommendations</h3>
                <form method="post" action="./includes/communication.action.inc.php" id="suggestForm">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <small class="form-text text-muted">First Name</small>
                                <input type="text" class="form-control" name="firstname" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <small class="form-text text-muted">Last Name</small>
                                <input type="text" class="form-control" name="lastname" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Email</small>
                        <input type="text" class="form-control" name="email" required/>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Subject</small>
                        <input type="text" class="form-control" name="subject" required/>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Message</small>
                        <textarea name="suggestion" id="suggestion" cols="25" rows="8" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-primary-design" name="suggest" value="Send"/>
                    </div>
                </form>
            </div>
		</div>
	</div>
	<div id="inquiry" class="contact">
		<div class="content-title">
			<div class="container" style="width: 60%; margin: 0 auto;">
				<h3 class="lead">Inquire</h3>
                <form method="post" action="./includes/communication.action.inc.php" id="inquireForm">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <small class="form-text text-muted">First Name</small>
                                <input type="text" class="form-control" name="firstname" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <small class="form-text text-muted">Last Name</small>
                                <input type="text" class="form-control" name="lastname" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Email</small>
                        <input type="text" class="form-control" name="email" required/>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Contact Number:</small>
                        <input type="text" class="form-control" name="contactnumber" required/>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Subject</small>
                        <input type="text" class="form-control" name="subject" required/>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Message</small>
                        <textarea name="inquiry" id="inquiry" cols="25" rows="8" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-primary-design" name="inquire" value="Inquire"/>
                    </div>
                </form>
            </div>
		</div>
	</div>
	<div id="fileComplaint" class="contact">
		<div class="content-title">
			<div class="container" style="width: 60%; margin: 0 auto;">
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<h3 class="lead">Please ensure that your contact information is full and correct as all reports
                    and complaints needs a deep investigation and verification.<br><br>Rest Assured that your
                    credentials will be kept confidential.<br><br>Thank you.</h3>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<h3 class="lead">File a complaint</h3>
                <form method="post" action="./includes/communication.action.inc.php" id="complaintForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <small class="form-text text-muted">First Name:</small>
                                <input type="text" class="form-control" name="firstname" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <small class="form-text text-muted">Last Name:</small>
                                <input type="text" class="form-control" name="lastname" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Contact Number:</small>
                        <input type="text" class="form-control" name="contactnumber" required/>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Email:</small>
                        <input type="text" class="form-control" name="email" required/>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Subject</small>
                        <input type="text" class="form-control" name="subject" required/>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Message</small>
                        <textarea name="complaintMessage" id="complaintMessage" cols="25" rows="8" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Attachment</small>
                        <input type="file" name="files[]" id="attachment" class="form-control" multiple/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-primary-design" name="complaint" value="File"/>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>
<section id="faqs" class="mb-2">
	<div id="faqs-bg-diagonal" class="bg-parallax"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="faqs-content-box">
					<div id="faqs-content-box-outer">
						<div id="faqs-content-box-inner">
							<div class="content-title">
								<h3>Frequently Asked Questions</h3>
							</div>
							<div id="faqs-desc">
								<ol style="list-style: decimal;">
									<li>
										<p class="lead">Nulla sunt in voluptate nostrud pariatur incididunt laboris eu voluptate labore fugiat et non sunt ut officia incididunt laborum sed esse cillum in magna dolor ut duis in.</p>
									</li>
									<li>
										<p class="lead">Nulla sunt in voluptate nostrud pariatur incididunt laboris eu voluptate labore fugiat et non sunt ut officia incididunt laborum sed esse cillum in magna dolor ut duis in.</p>
									</li>
									<li>
										<p class="lead">Nulla sunt in voluptate nostrud pariatur incididunt laboris eu voluptate labore fugiat et non sunt ut officia incididunt laborum sed esse cillum in magna dolor ut duis in.</p>
									</li>
									<li>
										<p class="lead">Nulla sunt in voluptate nostrud pariatur incididunt laboris eu voluptate labore fugiat et non sunt ut officia incididunt laborum sed esse cillum in magna dolor ut duis in.</p>
									</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$('#inquireForm').validate();
    $('#complaintForm').validate();
    $('#suggestForm').validate();
	$(function() {
		$('#contactUsSelector').change(function(){
			$('.contact').hide();
			$('#' + $(this).val()).show();
		});
	});
</script>
<?php include 'footer.php'; ?>
