<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>


<div class="wrap">
<div class="container">

<div style="position: fixed; top: 52px; bottom: 25px;">
<div class="upperdiv">
	</div>
	<div class="panel pan-green" style="width:70%; margin-left: 15%; height:130px; margin-top:-30%; border:solid 5px white; position: relative; ">
                        <div class="panel-heading" style="padding-top:10%; text-align: center;">
                           <h1>Profile</h1>
                        </div>
</div>
<div class="lowerdiv"></div>
<div class="lowernavdiv">
	<ul class="nav">
						<li class="active">
							<a href="#" onclick="showPosts()">
							<i class="glyphicon glyphicon-tasks"></i>&nbsp
							Posts </a>
						</li>
						<li>
							<a href="#" onclick="showAbout()">
							<i class="glyphicon glyphicon-user"></i>&nbsp
							About</a>
						</li>
						<li>
							<a href="#" onclick="showWorkInfo()">
							<i class="glyphicon glyphicon-briefcase"></i>&nbsp
							Employment</a>
						</li>
					</ul>
	<br>
	<a class="btn btn-success" style="color: white;" href="<?php echo base_url('user');?>"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Announcements</a>
	<br><br>
	<a class="btn btn-primary" style="color: white;" href="<?php echo base_url('user/newsfeed');?>"><i class="glyphicon glyphicon-th-list"></i>&nbsp; Newsfeed</a>
</div>
</div>

<div class="col-md-8" style="margin-left: 270px;">
<div class="login-form">
<center>
	<img src="<?php echo base_url().'images/'.$picture;?>" width="200" height="200" style="border-radius: 200px;"></center>
	<h1 style="text-align: center;color:white;"><?php echo $firstname .' '. $lastname;?></h1><hr class="small">
</div>
	
	
<div id="about">
	<div class="panel panel-default shadow">
		<div class="panel-body" style="word-wrap:break-word;">
			<?php if($this->session->flashdata('message')){?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('message')?>
				</div>
			<?php } ?>
		<h4>Personal information:<a href="updatepsinfo" class="btn btn-link pull-right" style="background-color:#f3f3f3;">Update<span class="glyphicon glyphicon-pencil" style="font-size:12px;"></span></a></h4><hr>


<!-- ..........CHANGED THE "$info" & "$row" to "$pinfo" & "$prow" for Personal Info -->
<!-- ..........and "$winfo" and "$wrow" for Work Info.............................. -->

			<?php if(!empty($pinfo)) {
				foreach ($pinfo as $prow) {
					echo '<h5><ul type="none">';
					echo '<li>Course <b><center>'.$prow->course.'</b><br></li><hr>';
					echo '<li>Sex <b><center>'.$prow->sex.'</b><br></li><hr>';
					echo '<li>Year Graduated <b><center>'.$prow->year.'</b><br></li><hr>';
					echo '<li>Address <b><center>'.$prow->address.'</b><br></li><hr>';
					echo '<li>Birthday <b><center>'.$prow->dob.'</b><br></li><hr>';
					echo '<li>Civil status <b><center>'.$prow->civilstatus.'</b><br></li><hr>';
					echo '<li>Contact number <b><center>'.$prow->contactnumber.'</b></li><hr>';
					echo '<li>Email <b><center>'.$prow->email.'</b></li>';
					echo '</h5></ul><br>';
				}
			}
			?>
		</div>
	</div>
</div>
	
<div id="workinfo">
	<div class="panel panel-default shadow">
		<div class="panel-body" style="word-wrap:break-word;">
			<?php 
				//----------------------------------WORK INFORMATION
				echo '<h4>Work information: </h4>';

				//------"CURRENTLY WORKING AT..." 
				echo '<strong>&nbsp;&nbsp;&nbsp;Currently Working At...';

				if(!empty($cwinfo)) {					
					foreach ($cwinfo as $cwrow) {
						$startDateformat = $cwrow->empStartDate;
						$newStartDateformat = date("m/d/Y", strtotime($startDateformat));
						$endDateformat = $cwrow->empEndDate;
						$newEndDateformat = date("m/d/Y", strtotime($endDateformat));

						if ($cwrow->empEndDate == "0000-00-00") {
							echo '<a href="#" class="btn btn-link pull-right" data-toggle="modal" data-target="#endDateModal">Change&nbsp;<span class="glyphicon glyphicon-pencil" style="font-size:12px;"></span></a></strong><br><br>';
							echo '<div style="text-align:center;">';
							echo '<div class="row">
							<strong>'.$cwrow->empCompName.'</strong><br>
							'.$cwrow->empCompAddr.'<br>
							<small><i>Company Name and Address</i></small>
							</div>';
							echo '<hr>';

							echo '<div class="row">
							<strong>'.$cwrow->empPosition.'</strong><br>
							<small><i>Job Position</i></small>
							</div>';
							echo '<hr>';

							echo '<div class="row">
							<strong>'.$newStartDateformat.'</strong><br>
							<small><i>Date of Starting Work</i></small>
							</div>';
							echo '<hr>';
							echo '</div><br>';
						} else {
							echo '<a href="changecurrentwork" class="btn btn-link">Set&nbsp;<span class="glyphicon glyphicon-pencil" style="font-size:12px;"></span></a></strong><br><br>';
							echo '<div style="text-align:center;">';
							echo '<i>Not set</i>';
							echo '</div><br>';
						}

						//--------- Modal
						echo form_open('user/profile'); 
						echo form_hidden('dateID',$cwrow->empID);
						echo '<div id="endDateModal" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Please provide the following:</h4>
									</div>
									<div class="modal-body">
										<label>Date of Resignation: </label>
										<input type="date" id="empEndDate" name="empEndDate" value="'.$cwrow->empEndDate.'" class="form-control" required><br>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-info">Confirm</button>
									</div>
									</div>

								</div>
							 </div>';
						echo form_close();
					}
				}

				//------"EMPLOYMENT HISTORY"
				echo '<strong>&nbsp;&nbsp;&nbsp;Employment History&nbsp;&nbsp;</strong><a href="updateemphistory" class="btn btn-link">Update&nbsp;<span class="glyphicon glyphicon-pencil" style="font-size:12px;"></span></a><br>';
				
				if(!empty($winfo)) {
					//------Table Start
					echo '<div class="table-responsive"><table class="table" style="font-size:11px;"><tr>
					<th>Work Period</th>
					<th>Position</th>
					<th>Company Name</th>
					<th>Work Experience</th>
					</tr>';
					foreach ($winfo as $wrow){
						//-----Variables for the Dates
						$startDateformat = $wrow->empStartDate;
						$newStartDateformat = date("m/d/Y", strtotime($startDateformat));
						$endDateformat = $wrow->empEndDate; 

								//-----IF empStillWorking is equal to "yes",
								if($wrow->empEndDate == "0000-00-00") {
									//-----ELSE display the string 'Present'
									$newEndDateformat = 'Present';
								} else {
									//-----THEN display and change the format to MM-DD-YYYY
									$newEndDateformat = date("m/d/Y", strtotime($endDateformat));
								}

						if($wrow->empEndDate == "0000-00-00"){
								echo '<tr class="hidden">
								<td><b>'.$newStartDateformat.'</b><br>to<br><b>'.$newEndDateformat.'</b></td>
								<td style="vertical-align:middle;">'.$wrow->empPosition.'</td>            
								<td style="text-align:center; padding:5px; vertical-align:middle;">'.$wrow->empCompName.'</td>
								</tr>';
						} else {
							if($wrow->empHide == ""){
								$date1 = new DateTime($wrow->empStartDate);
								$date2 = new DateTime($wrow->empEndDate);
								$interval = $date1->diff($date2);
								echo '<tr>
								<td><b>'.$newStartDateformat.'</b><br>to<br><b>'.$newEndDateformat.'</b></td>
								<td style="vertical-align:middle;">'.$wrow->empPosition.'</td>            
								<td style="text-align:center; padding:5px; vertical-align:middle;">'.$wrow->empCompName.'</td>
								<td style="text-align:center; padding:5px; vertical-align:middle;">'.$interval->y . ' year(s), ' . $interval->m.' month(s), '.$interval->d.' day(s)
								</tr>';
								
							}
						}
					}
				
					echo '</table></div>';
				//--Table End
				} else {
					echo '<p style="text-align:center">No previous employment set.</p>';
			}
		?>
		</div>
	</div>
</div>
	
	<div id="posts">
		<div class="panel panel-default" style="background:transparent"><br>
			<?php if(empty($list)) {
					echo '<div class="shadow" style="background-color:#ffffff;padding-bottom:15px; text-align:center; margin-bottom:10px;">';
					echo "<br><h2>Oh no!</h2><br>You have posted nothing at the moment. <br><br>Why don't you try to share something or see what other's posted at the newsfeed section! </div>";
				} else { 
					echo '<div id="results"></div>'; 
				} 
			?>
		</div>
	</div>
	</div>
	</div>
	</div>
	

<script type="text/javascript" language="javascript">

function showPosts(){
    document.getElementById('posts').style.display="block";
	document.getElementById('about').style.display="none";
	document.getElementById('workinfo').style.display="none";
}

function showAbout(){
	document.getElementById('posts').style.display="none";
	document.getElementById('about').style.display="block";
	document.getElementById('workinfo').style.display="none";
}

function showWorkInfo(){
    document.getElementById('posts').style.display="none";
	document.getElementById('about').style.display="none";
	document.getElementById('workinfo').style.display="block";
}




</script>

<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;

$('#results').load("<?php echo base_url();?>user/profile_load_more", {'group_no':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
            loading = true; 
            $('.loader_image').show(); 
            $.post('<?php echo base_url();?>user/profile_load_more',{'group_no': total_record},
            function(data2){ 
                if (data2 != "") {                               
                    $("#results").append(data2);
                    $('.loader_image').hide();              
                    total_record++;
                }
            });     
        }
    }
});
});

</script>

<?php include_once('footer.php'); ?>
