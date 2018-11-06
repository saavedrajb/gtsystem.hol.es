<?php include_once('header.php'); ?>

<div id="wrap">

<br>

<div class="container">
	<div class="shadow" style="margin: auto; width: 50%;">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Account Recovery Options</h4></div>
			<div class="panel-body">
				You're recovering <b><?php echo $idno ?></b>'s password, please choose:<hr>
				<label><a class="btn btn-success" href="<?php echo base_url('recover/via_sq')?>" style="text-decoration: none">Answer Security Question</a></label><br>
				<label><a class="btn btn-primary" href="<?php echo base_url('recover/via_email')?>" style="text-decoration: none">Recover via Email</a></label>
				<hr>
				<a href="cancel">Cancel</a>
			</div>
		  </div>
	</div>
</div>

</div>

</body></html>