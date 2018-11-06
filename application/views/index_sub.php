<?php include_once('headera.php'); ?>
<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="box">
	  <div id="header">
	  <h1 style="margin-left:0px;">Alumni Login</h1>
	  </div> 
		<?php 
			if(validation_errors()){
			?>
				<?php echo '<b style="color:red;>"'.validation_errors().'</b>' ?>
			<?php }
				echo form_open('/panel').'<div class="group">';
			?>
			<?php
				echo form_input('idno','','class="inputMaterial" style="width:87.5%;" placeholder="ID number" required') .'<span class="highlight"></span></div><div class="group">';

				echo form_password('password','','class="inputMaterial" style="width:87.5%;" placeholder="Password" required') . '<span class="highlight"></span></div>';
				echo '<button id="buttonlogintoregister" type="submit" name="panel">Login</button><br><a href="recover">Forgot account?</a><br><br>';
				echo form_close();
		?>
	  <div id="footer-box"><p class="footer-text">Not a member? <a href="<?php echo base_url().'#contact';?>" class="sign-up">Contact your Admin/OJT coordinator</a><br>
		<a href="<?php echo base_url(); ?>" class="sign-up">Go Back</a></p></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
