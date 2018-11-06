<?php include_once('header.php'); ?>

<div id="wrap">

<br>

<div class="container">	
		<div class="shadow" style="margin: auto; width: 50%;">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Recover account</h4></div>
				<div class="panel-body">
					<?php 
						if(validation_errors()){
						?>
							<?php echo '<b style="color:red;">'.validation_errors().'</b>'; ?>
						<?php
						}
						echo form_open();
					?>
					<?php 
						echo form_input('idno',$id,'class="form-control" readonly') . '
						<label>ID Number</label><br>';
						echo form_password('newpass','','class="form-control" Autofocus') . '
						<label>New Password</label><br>';
						echo form_password('re_newpass','','class="form-control"') . '
						<label>Confirm New Password</label><br><br>';
						echo form_submit('recover/setpassword','Confirm','class="btn" style="background-color:blue; color:white;"');
						echo '<br><br><a href="cancel">Cancel</a>';
						echo form_close();
					?>
					<br>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert"></button>
						Remember: Password is Case SeNsitivE
					</div>
				</div>
				</div>
		</div>
	</div>
</div>
</body></html>