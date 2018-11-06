<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<div class="container">

<div style="position: fixed; top: 52px; bottom: 25px;">
<div class="upperdiv"></div>
<?php if(!empty($list)) {
	$now = time();
	$units = 1;
	foreach ($list as $row) { 
		if($row->userstatus != 'disabled') {
			if(timespan(strtotime($row->lastupdate),$now,$units) != timespan(strtotime('0000-00-00'),$now,$units)) { ?>
				<div class="panel pan-green" style="width:70%; margin-left: 15%; height:130px; margin-top:-30%; border:solid 5px white; position: relative; ">
					<div class="panel-heading" style="padding-top:10%; text-align: center;">
					<h1>Active</h1>
					</div>
				</div>
				<div class="lowerdiv"><p style="padding-top: 25%; text-align: center;"><b style="font-size: 1em; ">Last update: <?php echo timespan(strtotime($row->lastupdate),$now,$units).' ago';?></b></p></div>
			<?php } else { ?>
				<div class="panel pan-red" style="width:70%; margin-left: 15%; height:130px; margin-top:-30%; border:solid 5px white; position: relative; ">
					<div class="panel-heading" style="padding-top:10%; text-align: center;">
					<h1>Inactive</h1>
					</div>
				</div>
				<div class="lowerdiv"><p style="padding-top: 25%; text-align: center;"><b style="font-size: 1em; ">Last update: None</b></p></div>
			<?php }
		} else { ?>
			<div class="panel pan-red" style="width:70%; margin-left: 15%; height:130px; margin-top:-30%; border:solid 5px white; position: relative; ">
				<div class="panel-heading" style="padding-top:10%; text-align: center;">
				<h1>Disabled</h1>
				</div>
			</div>
			<div class="lowerdiv"><p style="padding-top: 25%; text-align: center;"><b style="font-size: 1em; ">Account disabled</b></p></div>
		<?php } 
	}
}
?>

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
			Work Information</a>
		</li>
	</ul>
	<br>
	<a class="btn btn-success" style="color: white;" href="<?php echo base_url('user');?>">Announcements</a>
	<br><br>
	<a class="btn btn-primary" style="color: white;" href="<?php echo base_url('user/newsfeed');?>">Newsfeed</a>
</div>
</div>			
			
<?php if(!empty($list)) {
	foreach ($list as $row) { ?>
<div class="col-md-8" style="margin-left: 270px;">
<div class="login-form">
	<center><img src="<?php echo base_url().'images/'.$row->picture;?>" width="200" height="200" style="border-radius: 200px;"></center>
	<h1 style="text-align: center;color:white;"><?php echo $row->firstname .' '.$row->lastname;?></h1><hr class="small">
</div>

<div id="about"><br>
	<div class="panel panel-default shadow">
		<div class="panel-body" style="word-wrap:break-word;">
			<h4>Personal information</hr>
				
			<h5><ul type="none">
			<li>Course <b><center><?php echo $row->course;?></center></b></li><hr>
			<li>Sex <b><center><?php echo $row->sex;?></center></b></li><hr>
			<li>Year Graduated <b><center><?php echo $row->year;?></center></b></li><hr>
			<li>Address <b><center><?php echo $row->address;?></center></b></li><hr>
			<li>Birthday <b><center><?php echo $row->dob;?></center></b></li><hr>
			<li>Civil status <b><center><?php echo $row->civilstatus;?></center></b></li><hr>
			<li>Contact number <b><center><?php echo $row->contactnumber;?></center></b></li><hr>
			<li>Email <b><center><?php echo $row->email; } } ?></center></li>
			</h5></ul><br>
		</div>
	</div>
</div>
	
<div id="workinfo"><br>
	<div class="panel panel-default shadow">
		<div class="panel-body" style="word-wrap:break-word;">
			<?php 
			//----------------------------------WORK INFORMATION
			echo '<h4>Work information:</h4>';

			//------"CURRENTLY WORKING AT..." 
			echo '<strong>&nbsp;&nbsp;&nbsp;Currently Working At...</strong><br><br>';

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

			echo '<strong>&nbsp;&nbsp;&nbsp;Employment History</strong><br><br>';

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
				echo '<tr><td><p style="text-align:center">No previous employment set.</p></td></tr></table></div>';
		}
		?>
			</div>
		</div>
	</div>


<div id="posts"><br>
	<div class="panel panel-default" style="background:transparent">
	<?php if(!empty($list)) {
		foreach ($list as $row) {
			echo "<div class='panel-heading shadow' style='background-color:#ffffff;margin-bottom:5px'><h4>".$row->firstname."'s post(s)</h4></div>";
			if(empty($list1)) {
				echo '<div class="shadow" style="background-color:#ffffff;padding-bottom:15px; text-align:center; margin-bottom:10px;">';
				echo "<br><h2>Oh no!</h2><br> ".$row->firstname."'s haven't posted anything yet! <br><br>Why don't you try to see what other's posted at the newsfeed section! </div>";
			} else {
			echo '<div id="results"></div>';
			}
		}
	}
	?>
	</div>
</div>

</div>
</div>

<script>
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

$('#results').load("<?php echo base_url('user/searchresult_load_more/'.$id);?>", {'group_no':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
            loading = true; 
            $('.loader_image').show(); 
            $.post('<?php echo base_url("user/searchresult_load_more/".$id);?>',{'group_no': total_record},
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