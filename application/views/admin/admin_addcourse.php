<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	<div class="col-sm-3">
      <!-- left -->
      <h3><a>Home</a></h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="<?php echo base_url().'admin/register'; ?>">Registration</a></li>
        <li><a href="<?php echo base_url().'admin/search'; ?>">Search</a></li>
		<li><a href="<?php echo base_url().'admin/announcement'; ?>">Announcement</a></li>
      </ul>
      
      <hr>
      
	  <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please remember to <a href="<?php echo base_url().'admin/logout'; ?>">Logout</a> to prevent unauthorized use.
      </div>
	  
  	</div><!-- /span-3 -->
    <div class="col-sm-9">
      
	   <div class="row">
            <!-- center left-->	
         	<div class="col-md-7">
			<div class="panel panel-default">
                  <div class="panel-heading"><h4>Courses already available:</h4></div>
					  <div class="panel-body">
						<hr>
						<?php if(!empty($list)) {
							foreach ($list as $row) {
								echo '<div style="break-word: word-break; width:85%;"><ul type="disc"><li>'.$row->course.'</li></ul></div>';
							}
						} else {
							echo 'No courses listed yet.';
						}
						?>
						
					  </div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-->
			
            <!--center-right-->
        	<div class="col-md-5">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Add courses</h4></div>
				  <div class="panel-body">
							<?php 
							if(validation_errors()){
							?>
								<?php echo validation_errors(); ?>
							<?php
							}
								echo form_open('admin/add_course');
							?>
							<?php
								echo form_input('course','','class="form-control form-width" placeholder="Course" autofocus')
								. '<i style="font-size: 12px;">Graduate School Course*</i><br><br>';
							?>
							<?php
								echo form_submit('admin/add_year','Submit','class="btn btn-lg"');
							?>
							<?php
								echo form_close();
							?>
				</div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-span-6-->
			
       </div><!--/row-->
  	</div><!--/col-span-9-->
    
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->

<?php include_once('footer1.php'); ?>