<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	
    <div class="col-sm-12px">
	   <div class="row">
            <!-- center left-->	
         	<div class="col-md-7">
			<div class="panel panel-success">
                <div class="panel-heading"><h4>Register Alumni</h4></div>
					<div class="panel-body">
						<?php 
							if(validation_errors()){
							?>
								<?php echo validation_errors(); ?>
							<?php
							}
								echo form_open('admin/register');
							?>
							<?php
								echo form_input('idno','','class="form-control form-width" placeholder="ID number" autofocus')
								. '<i style="font-size: 12px; color:red;">ID Number*</i><br>';
								echo form_input('firstname','','class="form-control form-width" placeholder="First Name" autofocus')
								. '<i style="font-size: 12px; color:red;">First Name*</i><br>';
								echo form_input('lastname','','class="form-control form-width" placeholder="Last Name"')
								. '<i style="font-size: 12px; color:red;">Last Name*</i><br>';
								$options = array(
								'Male' => 'Male',
								'Female' => 'Female'
								);
								echo form_dropdown('sex',$options,'','class="form-control form-width"')
								. '<i style="font-size: 12px; color:red;">Sex*<br></i>';
								echo '<td><select name="course" class="form-control form-width">';
								if(!empty($list1)){
									foreach ($list1 as $row) {
									echo '<option value="'.$row->courseID.'">'.$row->course.'</option>';
									}
								}
								echo '</select></td><i style="font-size: 12px; color:red;">Course*<br></i>';
								echo '<td><select name="year" class="form-control form-width">';
								if(!empty($list)){
									foreach ($list as $row) {
									echo '<option value="'.$row->yearID.'">'.$row->yeargraduated.'</option>';
									}
								}
								echo '</select></td><i style="font-size: 12px; color:red;">Year Graduated*<br></i>';
								echo '<input type="date" class="form-control form-width" name="dob"><i style="font-size: 12px; color:red;">Date of Birth*<br></i>';
							?>
							<?php
								echo form_submit('admin/register','Register','class="btn btn-primary"');
							?>
							<?php
								echo form_close();
							?>
					</div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-->
			
			
            <!--center-right-->
        	<div class="col-md-5">
			
			<div class="panel pan-green" style="text-align:center;"><h3>Add Year Category <a href="add_year" class="btn btn-success">Click here</a></h3></div>
			
			
              </div><!--/panel-->
			</div><!--/col-span-6-->
       </div><!--/row-->
  	</div><!--/col-span-9-->
    
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->


<?php include_once('footer1.php'); ?>