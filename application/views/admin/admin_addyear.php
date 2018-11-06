<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
		
	   <div class="row">
            <!-- center left-->	
         	<div class="col-md-5 col-md-offset-3">
			<div class="panel panel-success">
                <div class="panel-heading"><h4>Add School Year</h4></div>
					<div class="panel-body">
						<?php 
							if(validation_errors()){
							?>
								<?php echo validation_errors(); ?>
							<?php
							}
								echo form_open('admin/add_year');
							?>
							<?php
								echo form_input('yg','','class="form-control form-width" placeholder="Year Graduated" autofocus')
								. '<i style="font-size: 12px; color:red;">Year Graduated*</i><br><br>';
							?>
							<?php
								echo form_submit('admin/add_year','Submit','class="btn btn-warning"');
							?>
							<?php
								echo form_close();
							?>
					</div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-->
       </div><!--/row-->
	
    
  </div><!--/row-->
  <!-- /upper section -->

<!-- /Main -->


<?php include_once('footer1.php'); ?>