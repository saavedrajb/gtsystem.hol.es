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
					<?php   }
						echo form_open('recover');
						echo form_input('idno','','class="form-control" placeholder="ID number" autofocus required') . '<br>';
						echo form_submit('recover','Next step','class="btn btn-primary"');
						echo '<br><br><a href="'.base_url().'">Go Back</a>';
						form_close();
					?>
			</div>
		  </div>
	</div>
</div>

</div>

</body></html>