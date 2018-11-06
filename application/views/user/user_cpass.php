<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<div class="container shadow" style="background-color:white">
	<h3>Change Password</h3>
	<hr>
	<div class="col-md-7">
		<div class="panel panel-default shadow">
			<div class="panel-body">
				<?php 
					if(validation_errors()){
					?>
					<strong style="color:red"><?php echo validation_errors(); ?></strong>
					<?php
					}
					?>
				<form method="post" action="pwd">
				<?php
					$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()
					);
				?>
				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
				<table border="0" style="width:70%;">
					<tr>
						<td style="text-align:right;">Old Password: &nbsp;&nbsp;</td>
					<td><input type="password" name="oldpass" class="form-control form-width">
					</tr>
					<tr><td><br></td><td></tr>
					<tr>
						<td style="text-align:right;">New Password: &nbsp;&nbsp;</td>
					<td><input type="password" name="newpass" class="form-control form-width">
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<td style="text-align:right;">Confirm New Password: &nbsp;&nbsp;</td>
					<td><input type="password" name="re_newpass" class="form-control form-width">
					</tr>
					<tr><td><br></td></tr>
				</table>
                                      <button type="submit" class="btn btn-primary pull-right" style="margin-right:35px;">Update</button>
				</form>
			</div>
		</div>
	</div>
         
<div class="col-md-5">    
	<div class="well">
		<strong>Take note:</strong><br><br>
		The password is Case SeNsiTiVe - to mean that if a letter is in lower case (small letters), then it should be encoded as lower case when logging in - also in UPPER CASES (capital letters).
	</div>
</div>

</div>
</div>

<?php include_once('footer.php'); ?>