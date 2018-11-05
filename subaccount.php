<?php include 'header.php'; ?>
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
	              <li class="breadcrumb-item active">Sub-Account</li>
	            </ol>
	         </div>
	    	<div class="card border-info" style="margin-bottom: 10px;">
	    		<div class="card-header">
	    			<p class="h4 text-info text-center">Add a sub-account<span class="fas fa-user-plus fa-1x text-info float-right"></span></p>
	    		</div>
	    		<div class="card-body">
	    			<form action="subaccount.php" id="subaccountForm" method="post" style="width: 70%; margin: 0 auto;" autocomplete="off">
				        <?php include 'includes/errors.inc.php'; ?>
				        <?php include 'includes/success.inc.php';?>
				        <div class="form-group">
				        	<label for="relationship">Relationship</label>
					        <select class="form-control" name="relationship" id="relationship" onchange="checkRelationship(this.value);">
					        	<option value="" selected="selected">(Please Choose One)</option>
					        	<option value="Mother">Mother</option>
					        	<option value="Father">Father</option>
					        	<option value="Sister">Sister</option>
					        	<option value="Brother">Brother</option>
					        	<option value="Son">Son</option>
					        	<option value="Daughter">Daughter</option>
					        	<option value="Others">Others, Please specify ...</option>
					        </select>
					    </div>
					    <div class="form-group">
					        <input type="text" class="form-control" name="otherRelationship" id="otherRelationship" style="display: none;" placeholder="Enter relationship here" />
				    	</div>
				        
			            <div class="row">
			                <div class="form-group col-md-2">
			                    <label for="prefix">Prefix</label>
			                    <select name="prefix" id="reg-prefix" class="form-control" required>
			                        <option value="" selected class="form-control"></option>
			                        <option value="Dr" class="form-control">Dr.</option>
			                        <option value="Mr" class="form-control">Mr.</option>
			                        <option value="Ms" class="form-control">Ms.</option>
			                    </select>
			                </div>
			                <div class="form-group col-md-4">
			                    <label for="fname">First Name</label>
			                    <input type="text" class="form-control" value="<?php echo $fname; ?>" name="fname" id="reg-fname" placeholder="Juan" required/>
			                </div>
			                <div class="form-group col-md-3">
			                    <label for="mname">Middle Name</label>
			                    <input type="text" class="form-control" value="<?php echo $mname; ?>" name="mname" id="reg-mname" placeholder="Dela" />
			                </div>
			                <div class="form-group col-md-3">
			                    <label for="lname">Last Name</label>
			                    <input type="text" class="form-control" value="<?php echo $lname; ?>" name="lname" id="reg-lname" placeholder="Cruz" required/>
			                </div>
			            </div>
			            <div class="row">
			                <div class="form-group col-md-3">
			                    <label for="suffix">Suffix</label>
			                    <select name="suffix" id="reg-suffix" class="form-control">
			                        <option value="" selected class="form-control"></option>
			                        <option value="Jr" class="form-control">Jr.</option>
			                        <option value="Sr" class="form-control">Sr.</option>
			                        <option value="III" class="form-control">III</option>
			                        <option value="IV" class="form-control">IV</option>
			                        <option value="V" class="form-control">V</option>
			                    </select>
			                </div>
			                <div class="col-md-6">
			                    <div class="form-group">
			                        <label for="birthday">Birthdate</label>
			                        <input type="text" class="form-control" value="<?php echo $birthday; ?>" id="reg-birthday" name="birthday" required/>
			                    </div>
			                </div>
			                <div class="col-md-3">
			                    <div class="form-group">
			                        <label for="age">Age</label>
			                        <input type="text" id="reg-age" name="age" value="<?php echo $age; ?>" class="form-control" readonly/>
			                    </div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label>Address</label><small class="form-class text-muted">(Write N/A if not applicable)</small>
			                <div class="row">
			                    <div class="col-md-4">
			                        <small id="blockHelpBlock" class="form-text text-muted">Block/Lot/House No.</small>
			                        <input type="text" class="form-control" value="<?php echo $block; ?>" id="reg-block" name="block" aria-describedby="blockHelpBlock" required/>
			                    </div>
			                    <div class="col-md-4">
			                        <small id="streetHelpBlock" class="form-text text-muted">Street</small>
			                        <input type="text" class="form-control" id="reg-street" value="<?php echo $street; ?>" name="street" aria-describedby="streetHelpBlock"  required/>
			                    </div>
			                    <div class="col-md-4">
			                        <small id="subdivisionHelpBlock" class="form-text text-muted">Subdivision</small>
			                        <input type="text" class="form-control" id="reg-subdivision" value="<?php echo $subdivision; ?>" name="subdivision" aria-describedby="subdivisionHelpBlock" required/>
			                    </div>
			                </div>

			                <div class="row">
			                    <div class="col-md-4">
			                        <small id="barangayHelpBlock" class="form-text text-muted">Barangay</small>
			                        <input type="text" class="form-control" placeholder="Salitran II" aria-describedby="subdivisionHelpBlock" readonly/>
			                    </div>
			                    <div class="col-md-4">
			                        <small id="cityHelpBlock" class="form-text text-muted">City/Municipality</small>
			                        <input type="text" class="form-control" placeholder="Dasmariñas City" aria-describedby="cityHelpBlock" readonly/>
			                    </div>
			                    <div class="col-md-4">
			                        <small id="provinceHelpBlock" class="form-text text-muted">Province</small>
			                        <input type="text" class="form-control" placeholder="Cavite" aria-describedby="provinceHelpBlock" readonly/>
			                    </div>
			                </div>
			                <div class="row">
			                    <div class="col-md-8">
			                        <small id="countryHelpBlock" class="form-text text-muted">Country</small>
			                        <input type="text" class="form-control" placeholder="Philippines" aria-describedby="countryHelpBlock" readonly/>
			                    </div>
			                    <div class="col-md-4">
			                        <small id="zipHelpBlock" class="form-text text-muted">Zip Code</small>
			                        <input type="text" class="form-control" placeholder="4114" aria-describedby="zipHelpBlock" readonly/>
			                    </div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label>Contact Number</label>
			                <div class="row">
			                    <div class="col-md-6">
			                        <small id="tnHelpBlock" class="form-text text-muted">Telephone Number</small>
			                        <input type="text" class="form-control" id="reg-telephonenumber" name="telephonenumber" minlength="10" maxlength="10" placeholder="0461234567" aria-describedby="tnHelpBlock" />
			                    </div>
			                    <div class="col-md-6">
			                        <small id="cnHelpBlock" class="form-text text-muted">Cellphone Number</small>
			                        <input type="text" class="form-control" id="reg-cellphonenumber" name="cellphonenumber" minlength="11" maxlength="11" placeholder="09123456789" aria-describedby="cnHelpBlock"/>
			                    </div>
			                </div>
			            </div>
			            <div class="row">
			            	<div class="col-md-6">
					            <a href="profile.php" class="form-control btn btn-danger">Cancel</a>
					        </div>
					        <div class="col-md-6">
					            <input type="submit" name="add" class="form-control btn btn-info" value="Add" />
					        </div>
			        	</div>
				    </form>
	    		</div> <!-- end of card body -->
	    		<div class="card-footer">
	    			&nbsp
	    		</div>
	    	</div>
    	</div>
    <?php } ?>
<?php include 'footer.php'; ?>
<script type="text/javascript">
	$('#subaccountForm').validate();
	$(document).ready(function() {
        var age = "";
        $('#reg-birthday').datepicker({
            autoSize: true,
            yearRange: "-100:",
            maxDate: "-12Y",
            onSelect: function(value, ui) {
                var today = new Date();
                age = today.getFullYear() - ui.selectedYear;
                $('#reg-age').val(age);
            },
            changeMonth: true,
            changeYear: true
        });
    });

    function checkRelationship(val){
    	var element = document.getElementById('otherRelationship');
    	if (val == '' || val == 'Others')
    		element.style.display = 'block';
    	else
    		element.style.display = 'none';
    }
</script>
