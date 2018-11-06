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
					echo form_open('user/survey',array("onsubmit"=>"this.style.display = 'none'"));
							echo form_hidden('year',$yearID);
							echo '<input type="hidden" name="question[1]" value="1">';
							echo '<label>Have you been employed immediateley 6 months or less after graduation? <b style="color:red">**</b></label>
								    <br>
									<div class="radio">
									  <label><input type="radio" name="answer[1]" value="1" required>Yes</label>
									</div>
									<div class="radio">
  									  <label><input type="radio" name="answer[1]"  value="2" required>No</label>
									</div>
									<br><br>';

							echo '<label>Was your first job related to the course you took up in college? <b style="color:red">**</b></label>
								    <br>
								    <input type="hidden" name="question[2]" value="2">
									<div class="radio">
									  <label><input type="radio" name="answer[2]" value="3" required>Yes</label>
									</div>
									<div class="radio">
  									  <label><input type="radio" name="answer[2]" value="4" required>No</label>
									</div>
									<br><br>';
									$firstjob = array(
										'5' => 'Classified Ads',
										'6' => 'Walk-in',
										'7' => 'CTU Job Fair',
										'8' => 'Absorbed from the On-the-Job (OJT) Training',
										'9' => 'Information from friends'
										);
							echo '<label>How did you find your first job? <b style="color:red">**</b></label><input type="hidden" name="question[3]" value="3">';

							echo form_dropdown('answer[3]',$firstjob,'','class="form-control" required');
							echo '<br><br>	';		  
							echo form_submit('','Next','class="btn"');
										
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