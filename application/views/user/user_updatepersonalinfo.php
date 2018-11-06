<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<!-- Contains the body -->
<div class="container shadow" style="background-color:#ffffff">
<h3>Update your Personal Information</h3>
<hr>
	<div class="col-md-7">
		<div class="panel panel-default shadow">
			<div class="panel-body">
			<?php 
				if(validation_errors()){
			?>
				<i style="color:red;"><?php echo validation_errors(); ?></i>
			<?php
				}
			?>
			<?php
				echo form_open('user/updatepsinfo');
				$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			?>
			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
			<?php if(!empty($info)) {
				foreach ($info as $row) {
					$options = array(
					'Single' => 'Single',
					'Married' => 'Married'
					);
							echo '<label>Civil Status</label>';
							echo form_dropdown('civilstatus',$options,'','class="form-control" autofocus');
							echo '<br>';

							echo '<label>Address</label>';
							echo form_input('address',$row->address,'class="form-control" placeholder="Address"');
							echo '<br>';

							echo '<label>Contact Number</label>';
							echo form_input('contactnumber',$row->contactnumber,'class="form-control" placeholder="Contact Number"');
							echo '<br>';

							echo '<label>Email</label>';
							echo form_input('email',$row->email,'class="form-control" placeholder="Email Address"');	
							echo '<br><br>';
				echo form_submit('user/updatepsinfo','Update','class="btn btn-info pull-right"');
            	echo '<a href="profile" class="btn btn-default btn-sm pull-right" style="margin-right:10px;"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a>';
				}
			}
			echo form_close();
			?>
			</div>
		</div>
	</div>
	
	<div class="col-md-5">
		<div class="well">
			<strong>Note:</strong><br><br>
			Please provide your exact personal details especially in the employment section to let us
			keep in track about your work/business information.<br><br>You can leave a certain field blank if you
			prefer to keep something private.
		</div>
	</div>

</div>
</div>

<?php include_once('footer.php'); ?>