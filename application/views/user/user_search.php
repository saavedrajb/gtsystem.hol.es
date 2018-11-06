<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<div class="container">
	<div class="panel panel-default" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
		<div class="panel-body">
			<h4>Search results:</h4>
			<hr>
			<table border='0' style="border-collapse: separate; padding auto; border-spacing: 2px 2px; width: 100%;" >
			<?php if(!empty($list)) {
				$now = time();
				$units = 1;
				
				foreach($list as $row) {
					echo '<tr><td rowspan="3"><img src="'.base_url().'/images/'.$row->picture.'" width="70" height="70" style="border-radius:25px 25px;"></td>';
					echo '<td colspan="1">Name: <strong>'.$row->firstname.' '.$row->lastname.'</strong></td>';
					
					if(timespan(strtotime($row->lastupdate),$now,$units) == timespan(strtotime('0000-00-00'),$now,$units)) {
						echo '<td>Last update: Not updated</td></tr>';
					} else {
						echo '<td>Last update: '.timespan(strtotime($row->lastupdate),$now,$units).' ago</td></tr>';
					}
					
					echo '<tr><td>Sex: '.$row->sex.'</td>';
					echo '<td>Course: '.$row->course.'</td></tr>';
					echo '<tr><td style="text-align: right; font-size: 12px;" colspan="2"><a href="'.base_url().'user/search/'.$row->idnumber.'"><button class="btn btn-primary">View full profile</button></a></td></tr><tr><td><hr></tr>';
				}
			} else {
				echo 'None found';
			}
			?>
			</table>
		</div>
	</div>
</div>

</div>

<?php include_once('footer.php'); ?>