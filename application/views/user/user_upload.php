<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<div class="container shadow" style="background-color:#ffffff">
<h3>Profile Picture</h3>
<hr>
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="well shadow">
					<h4>Set your profile picture:</h4>
					<hr>
					<?php echo form_open_multipart('user/picture');?>
					<input type="file" name="userfile" size="20"/>
					<br><br>
					<button type="submit" value="Upload" class="btn btn-success">Upload &nbsp;<span class="glyphicon glyphicon-upload"></span></button>
					<?php echo form_close() ?>
					<hr>
					</div>
				</div>
			</div>
		</div>

	<div class="col-md-5">
	<br>
		<div class="well">
			<strong>Note:</strong><br>
			Only <b>.JPG</b> image formats are accepted with a maximum 1Mb file size with 
			the dimensions 512px by 512px.
			<br><br>
			Offensive pictures can result to restriction of account. Please keep this site environment and people friendly. Thank you!
		</div>
	</div>
	
	</div>
</div>

</div>

<?php include_once('footer.php'); ?>