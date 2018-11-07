<?php
  include 'header.php';
  /**
   * Check if the user is logged in
   */
  if(!isset($_SESSION['id'])) {
    echo "<h1>You are not logged in</h1>";
    exit();
  }
  include './includes/dbh.inc.php';
  $userId = $_SESSION['id'];
  $userDetailsQuery = $conn -> query('SELECT * FROM residents WHERE user_ID =' . $userId);

  $userAddressQuery = $conn -> query("SELECT * FROM address WHERE id = $userId");
  if(!$userDetailsQuery || !$userAddressQuery || $conn -> error) {
    echo "<h1>An error occurred during the processing of your request, please try again.</h1>";
    exit();
  }

  $userAddressQuery = $conn -> query("SELECT * FROM address WHERE id = $userId");
  $row = $userDetailsQuery -> fetch_assoc();
  $addressRow = $userAddressQuery -> fetch_assoc();
?>

<div class="container">
  <div id="registration-container">
    <p>Update your personal details</p>
    <form id="form" action="includes/update.resident.request.handler.php" method="put">
      <div class="row">
        <div class="form-group col-md-3">
          <label for="prefix">Prefix</label>
          <select name="prefix" id="reg-prefix" class="form-control">
            <option value="Mr" selected class="form-control">Mr.</option>
            <option value="Ms" class="form-control">Ms.</option>
          </select>
        </div>
        <div class="form-group col-md-5">
          <label for="fname">First Name* </label>
          <input type="text" name="First-Name" class="form-control" id="fname" placeholder="First Name" value="<?php echo $row['FirstName']; ?>" required/>
        </div>
        <div class="form-group col-md-4">
          <label for="mname">Middle Name* </label>
          <input type="text" name="Middle-Name" class="form-control" id="mname" placeholder="Middle Name" value="<?php echo $row['MiddleName'];?>" required>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-9">
          <label for="lname">Last Name* </label>
          <input type="text" name="Last-Name" class="form-control" id="lname" placeholder="Last Name" value="<?php echo $row['LastName']; ?>" required/>
        </div>
        <div class="form-group col-md-3">
          <label for="suffix">Suffix</label>
          <select name="suffix" value="<?php echo $row['Suffix']; ?>" id="reg-suffix" class="form-control">
            <option value="" <?php if($row['Suffix'] === "") echo 'selected'; ?> class="form-control">-</option>
            <option value="Jr" <?php if($row['Suffix'] === "Jr") echo 'selected'; ?> class="form-control">Jr.</option>
            <option value="Sr" <?php if($row['Suffix'] === "Sr") echo 'selected'; ?> class="form-control">Sr.</option>
            <option value="III" <?php if($row['Suffix'] === "III") echo 'selected'; ?> class="form-control">III</option>
            <option value="IV" <?php if($row['Suffix'] === "IV") echo 'selected'; ?> class="form-control">IV</option>
            <option value="V" <?php if($row['Suffix'] === "V") echo 'selected'; ?> class="form-control">V</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 form-group">
          <label>Gender</label>
          <div class="clearfix"></div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" <?php if($row['Sex'] === 'Male') echo 'checked'; ?> class="custom-control-input" id="male" name="gender" value="Male">
            <label class="custom-control-label" for="male">Male</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" <?php if($row['Sex'] === 'Female') echo 'checked'; ?> class="custom-control-input" id="female" name="gender" value="Female">
            <label class="custom-control-label" for="female">Female</label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="birthday">Birthdate</label>
            <input type="text" value="<?php echo $row['Bday']; ?>" class="form-control" id="reg-birthday" name="birthday" required/>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" id="reg-age" value="<?php echo $row['Age']; ?>" name="age" class="form-control" readonly/>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Address</label><small class="form-class text-muted">(Write N/A if not applicable)</small>
        <div class="row">
          <div class="col-md-4">
              <small id="blockHelpBlock" class="form-text text-muted">Block</small>
              <input type="text" value="<?php echo $addressRow['block']; ?>" class="form-control" id="reg-block" name="block" aria-describedby="blockHelpBlock" required/>
          </div>
          <div class="col-md-4">
              <small id="streetHelpBlock" class="form-text text-muted">Street</small>
              <input type="text" value="<?php echo $addressRow['street']; ?>" class="form-control" id="reg-street" name="street" aria-describedby="streetHelpBlock"  required/>
          </div>
          <div class="col-md-4">
              <small id="subdivisionHelpBlock" class="form-text text-muted">Subdivision</small>
              <input type="text" value="<?php echo $addressRow['subdivision'] ?>" class="form-control" id="reg-subdivision" name="subdivision" aria-describedby="subdivisionHelpBlock" required/>
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
        <label>Contact Number</label><small><i>(optional)</i></small>
        <div class="row">
          <div class="col-md-6">
            <small id="tnHelpBlock" class="form-text text-muted">Telephone Number</small>
            <input type="text" value="<?php echo $row['TelephoneNumber']; ?>" class="form-control" id="reg-telephonenumber" name="telephonenumber" minlength="10" maxlength="10" placeholder="0461234567" aria-describedby="tnHelpBlock" />
          </div>
          <div class="col-md-6">
            <small id="cnHelpBlock" class="form-text text-muted">Cellphone Number</small>
            <input type="text" value="<?php echo $row['CellphoneNumber']; ?>" class="form-control" id="reg-cellphonenumber" name="cellphonenumber" minlength="11" maxlength="11" placeholder="09123456789" aria-describedby="cnHelpBlock"/>
          </div>
        </div>
      </div>

      <input type="submit" name="submit" class="form-control" id="submit" value="Update"/>
    </form>
  </div>
</div>

<script>
  $('#registration-form').validate({
    rules:{
      cpassword:{
        equalTo:"#reg-password",
      }
    }
  });
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
</script>

<?php include 'footer.php'; ?>