<?php include_once('header.php'); ?>

<div id="wrap">

<br>

<div class="container">
	<div class="shadow" style="margin: auto; width: 50%;">
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Recover account</h4></div>
			<div class="panel-body">
			Please enter the email that you have provided in your account.<br><br>
				<?php 
					if(validation_errors()){
					?>
						<?php echo '<b style="color:red;">'.validation_errors().'</b>'; ?>
					<?php   }
						echo form_open('recover/via_email');
						echo form_input('email','','class="form-control" placeholder="Email" autofocus required') . '<br>';
						echo form_submit('recover','Confirm','class="btn btn-primary"');
						echo '<br><br><a href="'.base_url('recover/type').'">Recover in another way</a>';
						form_close();
					?>
			</div>
		  </div>
	</div>
</div>

</div>

</body></html>