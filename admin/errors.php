<!-- this page is for display errors in every forms -->
<?php include '../includes/dbh.inc.php';?>
<?php if(count($errors)>0):?>
  <div class="form-error">
  	<?php foreach ($errors as $error):?>
  	  <p><?php echo $error ?></p>
	<?php endforeach ?>
  </div>
<?php endif ?>