<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<div class="container shadow" style="background-color:#ffffff">
	<h3>Add Company/Employment History</h3>
	<hr>
	<div class="col-md-7">
		<div class="panel panel-default shadow">
			<div class="panel-body">
			<?php 
			if(validation_errors()){
			?>
			<strong style="color:red;"><?php echo validation_errors(); ?></strong>
			<?php
			}
			?>
			<form method="post" action="addemphs" name="addwork">
			<?php
				$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			?>
			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
			<label>Company Name</label>
			<input type="text" class="form-control" name="empCompName" required>
			<br>
			<label>Company Address</label>
			<input type="text" class="form-control" name="empCompAddr" required>
			<br>
			<label>Position</label>
			<input type="text" class="form-control" name="empPosition" required>
			<br>
			<label>Date of Starting Work</label>
			<input type="date" class="form-control" name="empStartDate" required>
			<br>
			<label>Date of Resignation</label>
			<input type="date" class="form-control" name="empEndDate" required>
			<br>
			<input type="submit" class="btn btn-success pull-right" value="Save">
			<a href="updateemphistory" type="submit" class="btn btn-default btn-sm pull-right" style="margin-right:10px;">
                           <span class="glyphicon glyphicon-arrow-left"></span> Go Back
                        </a>
			<br><br>
			</form>

			</div>
		</div>
	</div>

<div class="col-md-5">
	<div class="well">
		<strong>Note:</strong><br><br>
		Please provide your exact working details to let us keep in track of your employment progress.<br><br>-
	</div>
</div>

</div>
</div>

<?php include_once('footer.php'); ?>
	