<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	
    <div class="col-sm-10 col-md-offset-1">
	   <div class="row">
			<div class="panel panel-Success">
			  <div class="panel-heading"><h4>Search:</h4></div>
				<div class="panel-body">
						<?php if(!empty($list)) {
							foreach ($list as $row) {
							$now = time();
							$units = 1;
							echo form_open_multipart('admin/search/'.$row->idnumber,array('style'=>'float:right; text-align:center'));
							echo '<img src="'.base_url().'images/'.$row->picture.'" width="300" height="300" style="border-radius: 12px; padding: 10px;">';
							echo form_hidden('idno',$row->idnumber).'<input type="file" name="userfile"/><br><button type="submit" value="Upload" class="btn btn-success"><i class="glyphicon glyphicon-upload"></i> Upload</button>'.form_close();
							echo '<h3>'.$row->firstname.' '.$row->lastname.'</h3>';
							if(timespan(strtotime($row->lastupdate),$now,$units) == timespan(strtotime('0000-00-00'),$now,$units)) {
								echo '<h5>Last update: <b>Profile not updated</b></h5>';
							} else {
								echo '<h5>Last update: <b>'.timespan(strtotime($row->lastupdate),$now,$units).' ago</b></h5>';
							}
							echo '<b>'.form_open('admin/search/'.$row->idnumber, array('style'=>'display: inline-block;')).'Action:</b><br> <a href="'.base_url().'admin/edit/'.$row->idnumber.'">Edit User</a>&nbsp;&nbsp; |
							'.form_hidden('idno',$row->idnumber).'
							<input type="submit" class="btn-link" style="background:none; border:0px; color: red;" name="resetpass" value="Reset Password" readonly> |';
							
							if($row->userstatus == 'disabled') {
								echo '<input type="submit" class="btn-link" style="background:none; border:0px; color:green;" name="activate" value="Reactivate account" readonly>';
							} else {
								echo '<input type="submit" class="btn-link" style="background:none; border:0px; color: red;" name="disable" value="Disable account" readonly>';
							}
							
							echo form_close();
							
							echo '<hr><h4>Personal Information</h4>';
							echo '<ul type="disc"><li>Course: <b>'.$row->course.'</b></li>';
							echo '<li>Sex: <b>'.$row->sex.'</b></li>';
							echo '<li>Year Graduated: <b>'.$row->year.'</b></li>';
							echo '<li>Address: <b>'.$row->address.'</b></li>';
							echo '<li>Birthday: <b>'.$row->dob.'</b></li>';
							echo '<li>Civil Status: <b>'.$row->civilstatus.'</b></li>';
							echo '<li>Contact Number: <b>'.$row->contactnumber.'</b></li>';
							echo '<li>Email: <b>'.$row->email.'</b></li></ul><hr>';
							
							echo '<h4>Currently Working At...</h4>';

							if(!empty($cwinfo)) {			
								foreach ($cwinfo as $cwrow) {
									$startDateformat = $cwrow->empStartDate;
									$newStartDateformat = date("m/d/Y", strtotime($startDateformat));
									$endDateformat = $cwrow->empEndDate;
									$newEndDateformat = date("m/d/Y", strtotime($endDateformat));

									if ($cwrow->empEndDate == "0000-00-00") {
										echo '<div style="text-align:center;">';
										echo '<div class="row">
										<strong>'.$cwrow->empCompName.'</strong><br>
										'.$cwrow->empCompAddr.'<br>
										<small><i>Company Name and Address</i></small>
										</div>';
										echo '<br>';

										echo '<div class="row">
										<strong>'.$cwrow->empPosition.'</strong><br>
										<small><i>Job Position</i></small>
										</div>';
										echo '<br>';

										echo '<div class="row">
										<strong>'.$newStartDateformat.'</strong><br>
										<small><i>Date of Starting Work</i></small>
										</div>';
										echo '<br>';
										echo '</div><br>';
									} else {
										echo '<div style="text-align:center;">';
										echo '<i>Not set</i>';
										echo '</div><br>';
									}
								}
							}

							echo '<h4>Employment History</h4>';

							//------Table Start
							echo '<div class="table-responsive"><table class="table" style="font-size:11px;"><tr>
							<th>Work Period</th>
							<th>Position</th>
							<th>Company Name</th>
							<th>Work Experience</th>
							</tr>';
							
							if(!empty($winfo)) {
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
											<td><b>'.$newStartDateformat.'</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to<br><b>'.$newEndDateformat.'</b></td>
											<td style="vertical-align:middle;">'.$wrow->empPosition.'</td>            
											<td style="vertical-align:middle;">'.$wrow->empCompName.'</td>
											<td style="vertical-align:middle;">'.$interval->y . ' year(s), ' . $interval->m.' month(s), '.$interval->d.' day(s)
											</tr>';
											
										}
									}
								}
							
								echo '</table></div>';
							//--Table End
							} else {
								echo '<p style="text-align:center">No previous employment set.</p>';
						}
							}
						}
						?>
					</div><!--/panel-body-->
			</div><!--/panel-->		
       </div><!--/row-->
  	</div><!--/col-span-9-->
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->


<?php include_once('footer1.php'); ?>