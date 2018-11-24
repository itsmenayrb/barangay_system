<?php include 'includes/dbh.inc.php';?>
<?php if(count($errors)>0):?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  	<?php foreach ($errors as $error):?>
  	  <p><?php echo $error ?></p>
	<?php endforeach ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
  </div>
<?php endif ?>