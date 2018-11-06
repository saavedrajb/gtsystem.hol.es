<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<!-- Contains the body -->
<div class="container shadow" style="background-color:#ffffff">
<h3>Account Recovery Information</h3>
<hr>
	<div class="col-md-7">
		<div class="panel panel-default shadow">
			<div class="panel-body">

			<?php 
				if(validation_errors()){
			?>
				<strong><?php echo validation_errors(); ?></strong>
			<?php
			}
			?>
				<form method="post" action="seq">
			<?php
				$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			?>
				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
					<center>
					<table border="0" style="width: 70%">
					<tr>
						<td style="text-align:right;">Security Question: &nbsp;&nbsp;</td>
						<td><select name="sq" class="form-control">
							<option value="What is your first pet's name?">What is your first pet's name?</option>
							<option value="What city you were born in?">What city you were born in?</option>
							<option value="What is your favorite color?">What is your favorite color?</option>
							<option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
							<option value="What is your father's middle name?">What is your father's middle name?</option>
							<option value="What is your favorite past-time?">What is your favorite past-time?</option>
							<option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
							<option value="Who is your favorite actor/actress?">Who is your favorite actor/actress?</option>
							<option value="Who was your childhood hero?">Who was your childhood hero?</option>
							</select>
						</td>
					</tr>
					<tr><td><br></td><td></tr>
					<tr>
						<td style="text-align:right;">Answer: &nbsp;&nbsp;</td>
						<td><input type="text" name="answer" class="form-control" required autofocus></td>
					</tr>
					<tr><td><br></td></tr>
					<tr>
					     <td></td>
	                                    <td><button type="submit" class="btn btn-primary pull-right">Save</button></td>
					</tr>
					</table>
					<center>
				</form>
			</div>
		</div>
	</div>

<div class="col-md-5">

	<div class="well">
		<strong>Take note:</strong><br><br>
		This is the section where you will set your security question and answer. Should you remember this incase of forgotten password. 
	</div>

</div>

</div>
</div>


<?php include_once('footer.php'); ?>	