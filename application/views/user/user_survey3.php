<?php include_once('header.php'); ?>

<div id="wrap">

<header class="navbar navbar-bright navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-education" style="font-size:20px;"></span>&nbsp;&nbsp;<b>Graduate's Tracer Survey</b></a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
	  <ul class="nav navbar-right navbar-nav">
		<li><a><img src="<?php echo base_url().'images/'.$picture; ?>" width="20" height="20" style="border-radius: 10px;"><?php echo ' '.$firstname;?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-triangle-bottom" style="font-size:10px; padding:5px;"></span></a>
          <ul class="dropdown-menu">
			<a href="<?php echo base_url().'user/logout'; ?>"><li style="font-size: 12px; color: black;" class="btn pull-right">Logout</li></a>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</header>
<!-- Contains the body -->
<div class="container">
  <!-- upper section -->
  <div class="row" style="background-color:#fff">
  <div style="width:70%; margin:auto;">
       <h3><i class="glyphicon"></i> Welcome <?php echo $firstname . ' !' ?></h3>  
           
       <hr>
            <!-- center left-->	
			<div class="panel panel-default">
                  <div class="panel-heading"><h4>Information Survey</h4></div>
					  <div class="panel-body">
						
						<p>Please answer this survey honestly according to the fields provided.<br><br><small><i>Note: Fields with <b style="color:red">**</b> are required</i></small><br>
						</p>
						<hr>
					<?php 
					if(validation_errors()){
					?>
						<strong><?php echo validation_errors(); ?></strong><br>
						<?php
					}
					?>

					<?php
					echo form_open('user/survey',array("onsubmit"=>"this.style.display = 'none'"));

							echo '<h3>Employment Record</h3><hr>';
							echo '<small>(Begin with your first job after graduation)</small>';
							echo '<br>';
							echo '<br>';
							$age = array(
							
								'10' => '20-25',
								'11' => '25-30',
								'12' => '30-35',
								'13' => '35-40',
								'14' => '40+'
								
							);
							
							echo '<label>Age upon employment:</label><input type="hidden" name="question[1]" value="4">';
							echo form_dropdown('answer[1]',$age,'','class="form-control" required');
							echo '<br>';
							echo '<label>Name of Company: <b style="color:red">**</b></label>
              					  <input type="text" class="form-control" name="empCompName1" placeholder="Company Name" required><br>';
							echo '<label>Job Position: <b style="color:red">**</b></label>
									<input type="hidden" name="fj" value="first job">
									<input type="hidden" name="question4" value="5">';
							echo form_input('fjob_pos','','class="form-control" placeholder="Enter Complete Job Description" required');
							echo '<br>';
							echo '<label>Address of Company: <b style="color:red">**</b></label>
              					  <input type="text" class="form-control" name="empCompAddr1" placeholder="Company Address"><br>';

              				echo '<label>Start of Working Days</label><input type="date" name="empStartDate_first_job" class="form-control" placeholder="Date of Starting Work" required>';
              				echo '<br><label>End of Working Days</label> <small><i>**leave blank if this is still your current job</i></small><input type="date" name="empEndDate_first_job" class="form-control" placeholder="Date of Resignation"><br>';
								$salaries = array(
									'15' => 'Below ₱5,000.00',
									'16' => '₱5,000.00 to less than ₱10,000.00',
									'17' => '₱10,000.00 to less than ₱20,000.00',
									'18' => '₱20,000.00 to less than ₱30,000.00',
									'19' => '₱30,000.00 to less than ₱40,000.00',
									'20' => '₱50,000.00 and above'
								);

							echo '<label>Approximate Monthly Salary: <b style="color:red">**</b></label>
									<input type="hidden" name="question[2]" value="6">';
							echo form_dropdown('answer[2]',$salaries,'','class="form-control" required');
							echo '<div id="length"><br>';
							
								$staylengths = array(
									'21' =>'Still the current job',
									'22' => 'Less than a month',
									'23' => '1-6 months',
									'24' => '7-11 months',
									'25' => '1 year to less than 2 years',
									'26' => '2 years to less than 3 years',
									'27' => '3 years to less than 4 years',
									'28' => 'More than 5 years'
								);

							echo '<label>Length of Stay: <b style="color:red">**</b></label>
									<input type="hidden" name="question[3]" value="7">';
							echo form_dropdown('answer[3]',$staylengths,'','class="form-control" required').'</div>';
							$placeofworkID = array(
							
								'29' => 'Local',
								'30' => 'Abroad'
							
							);

							echo '<br><label>Place of Work:<b style="color:red">**</b></label>
                                                        <input type="hidden" name="question[4]" value="8">';
							echo form_dropdown('answer[4]',$placeofworkID,'','class="form-control" required');
							echo '<br><br>';
							echo '<div id="yeah"><h4><b>Current Job</b></h4>';
							echo '<small>(Skip this if the job above is still your current job)</small>';
							echo '<br>';
							echo '<br>';
							echo '<label>Name of Company:</label>
              					        <input type="text" class="form-control" name="empCompName2" placeholder="Company Name"><br>';
							echo '<label>Job Position:</label>';
							echo form_input('cjob_pos','','class="form-control" placeholder="Enter Job Description"');
							echo '<br>';
							echo '<label>Address of Company:</label>
              					        <input type="text" class="form-control" name="empCompAddr2" placeholder="Company Address"><br>';

              				echo '<label>Start of Working Days</label><input type="date" name="empStartDate_current_job" class="form-control" placeholder="Date of Starting Work">';
              				//echo '<br><label>End of Working Days</label><input type="date" name="empEndDate_current_job" class="form-control" placeholder="Date of Resignation">';
								$salaries = array(
									'31' => 'Below ₱5,000.00',
									'32' => '₱5,000.00 to less than ₱10,000.00',
									'33' => '₱10,000.00 to less than ₱20,000.00',
									'34' => '₱20,000.00 to less than ₱30,000.00',
									'35' => '₱30,000.00 to less than ₱40,000.00',
									'36' => '₱50,000.00 and above'
								);

							echo '<br><label>Approximate Monthly Salary:</label>';
									
							echo form_dropdown('ams',$salaries,'','class="form-control"');
							echo '<br>';
							
								$placeofwork = array(
									'37' =>'Local',
									'38' => 'Abroad'
								);

							echo '<label>Place of Work:</label>';
									
							echo form_dropdown('pow',$placeofwork,'','class="form-control"');

							echo '</div><br><br>';
							echo form_submit('','Submit','class="btn btn-success"');
										
					echo form_close();
					?>
					</div>
					</div><!--/panel-body--> 
  	</div><!--/col-span-9-->
  </div><!--/row-->
  <!-- /upper section -->
</div>
	
</div>

<?php include_once('footer.php'); ?>