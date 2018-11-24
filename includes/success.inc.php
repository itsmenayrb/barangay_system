<?php include 'includes/dbh.inc.php';?>
<?php if(count($success)>0):?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  	<?php foreach ($success as $successor):?>
  	  <p><?php echo $successor ?></p>
	<?php endforeach ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif ?>