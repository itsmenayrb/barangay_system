<!-- PHP FILE THAT WILL DISPLAY
SUCCESS ON EVERY FORM -->
<?php include '../includes/dbh.inc.php';?>
<?php if(count($success)>0):?>
  <div class="form-success">
  	<?php foreach ($success as $successor):?>
  	  <p><?php echo $successor ?></p>
	<?php endforeach ?>
  </div>
<?php endif ?>