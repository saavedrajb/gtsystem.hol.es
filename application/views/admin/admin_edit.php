<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">

	   <div class="row">
            <!-- center left-->	
         	<div class="col-md-7">
			<div class="panel panel-Success">
                <div class="panel-heading"><?php if(!empty($list)) {
					foreach ($list as $row) {
						echo '<h4>Editing profile of '.$row->firstname.'</h4></div>';
						echo '<div class="panel-body">';
						echo form_open('admin/edit/'.$row->idnumber);
						echo form_hidden('idno',$row->idnumber);
						echo form_input('firstname',$row->firstname,'class="form-control form-width" placeholder="First Name" autofocus')
						. '<i style="font-size: 12px;">First Name*</i><br><br>';
						echo form_input('lastname',$row->lastname,'class="form-control form-width" placeholder="Last Name"')
						. '<i style="font-size: 12px;">Last Name*</i><br><br>';
						$options = array(
						'Male' => 'Male',
						'Female' => 'Female'
						);
						echo form_dropdown('sex',$options,'','class="form-control form-width"')
						. '<i style="font-size: 12px;">Sex*<br><br></i>';
						echo '<td><select name="course" class="form-control form-width">';
						if(!empty($list2)){
							foreach ($list2 as $row2) {
							echo '<option value="'.$row2->courseID.'">'.$row2->course.'</option>';
							}
						}
						echo '</select></td><i style="font-size: 12px;">Year Graduated*<br><br></i>';
						echo '<td><select name="year" class="form-control form-width">';
						if(!empty($list1)){
							foreach ($list1 as $row1) {
							echo '<option value="'.$row1->yearID.'">'.$row1->yeargraduated.'</option>';
							}
						}
						echo '</select></td><i style="font-size: 12px;">Year Graduated*<br><br></i>';
						echo '<input type="date" name="dob" value="'.$row->dob.'" class="form-control form-width"><i style="font-size: 12px;">Date of Birth*<br><br></i>';
						echo form_submit('admin/edit/'.$row->idnumber,'Submit','class="btn btn-lg"');
						echo form_close();
					}
				}
				?>
					</div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-->
			
			
            <!--center-right-->
        	<div class="col-md-5">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Errors:</h4></div>
				  <div class="panel-body">
						<?php if(validation_errors()){
							echo validation_errors();
							} else {
								echo 'No errors found.';
							}
						?>
				</div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-span-6-->
       </div><!--/row-->
    
  </div>
  
<?php include_once('footer1.php'); ?>