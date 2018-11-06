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
						echo form_input('idno',$idno,'class="form-control" readonly') . '
						<i style="font-size: 12px;">ID Number</i><br><br>';
						echo form_input('securityquestion',$sq,'class="form-control" readonly') . '
						<i style="font-size: 12px;">Security Question</i><br><br>';
						echo form_input('securityanswer','','class="form-control" placeholder="Answer" autofocus required') . '
						<i style="font-size: 12px;">Security Answer</i><br><br>';
						echo form_submit('recover/confirm','Next step','class="btn btn-primary"');
						echo '<br><br><a href="'.base_url('recover/type').'">Recover in another way</a>';
						form_close();
					?>
				</div><!--/panel-body-->
		  </div><!--/panel-->
		<!-- /upper section -->
	</div>
</div>

</div>

</body></html>