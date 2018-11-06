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
						
						<p>Please answer this survey honestly according to the fields provided.<br><br><small><i>Note: Fields with <b style="color:red">**</b> are required</i></small><br><br>
						</p>
					<?php 
					if(validation_errors()){
					?>
						<strong><?php echo validation_errors(); ?></strong><br>
						<?php
					}
					?>
					<?php
					echo form_open('user/survey',array("onsubmit"=>"this.style.display = 'none'");
					<?php if(!empty($info)) {
						foreach ($info as $row) {
							$options = array(
								'Single' => 'Single',
								'Married' => 'Married'
								);
							echo '<h3>General Information</h3><hr>';

							echo '<label>Last Name:</label>
              					  <input type="text" class="form-control" name="lastname" value="'.$lastname.'" disabled><br>';

              				echo '<label>First Name:</label>
              					  <input type="text" class="form-control" name="firstname" value="'.$firstname.'" disabled><br>';

							echo '<label>Year Graduated:</label>
              					  <input type="number" class="form-control" name="year" min="2000" value="'.$row->year.'" disabled><br>';

              				echo '<label>Course:</label>
              					  <input type="text" class="form-control" name="course" value="'.$row->course.'" disabled><br>';

              				echo '<label>Sex:</label>
              					  <input type="text" class="form-control" name="course" value="'.$row->sex.'" disabled><br>';

							echo '<label>Date of Birth:</label>
              					  <input type="date" class="form-control" name="dob" value="'.$row->dob.'" disabled><br>';

              				echo '<label>Civil Status: <b style="color:red;">**</b></label>';
							echo form_dropdown('civilstatus',$options,'','class="form-control" autofocus');
							echo '<br>';

							echo '<label>Address:</label>';
							echo form_input('address',$row->address,'class="form-control" placeholder="Address" required');
							echo '<br>';

							echo '<label>Mobile/Telephone #:</label>';							
							echo form_input('mobilenumber',$row->contactnumber,'class="form-control" placeholder="Mobile/Telephone Number" required');
							echo '<br>';

							echo '<label>Email: <b style="color:red;">**</b></label>';							
							echo form_input('email',$row->email,'class="form-control" placeholder="Email Address" required');
							echo '<br>';
							echo '<br>';
							echo form_submit('','Next','class="btn"');
						}
					}
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