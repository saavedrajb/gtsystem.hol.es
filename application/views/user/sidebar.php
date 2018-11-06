<div style="position: fixed; top: 52px; bottom: 25px;">
<div class="upperdiv">
	</div>
	<div class="logo">
	<img src="<?php echo base_url().'images/'.$picture;?>" width="200" height="200" style="border-radius:100px; padding:15px;">
	</div>
<div class="lowerdiv"><p style="padding-top: 25%; text-align: center;"><a href="user/profile" style="text-decoration:none; font-weight:bold; font-size: 1em;"><?php echo $firstname.' '.$lastname;?></a></p></div>
<div class="lowernavdiv">
	<ul class="nav">
						<li class="active">
							<a href="<?php echo base_url('user');?>" onclick="showPosts()">
							<i class="glyphicon glyphicon-bullhorn"></i>&nbsp
							Announcements </a>
						</li>
						<li>
							<a href="<?php echo base_url('user/newsfeed');?>" onclick="showAbout()">
							<i class="glyphicon glyphicon-th-list"></i>&nbsp
							Newsfeed </a>
						</li>
					</ul>
	<br>
	<?php if(!empty($notif)) {
		foreach ($notif as $row) {
			if($row->total > 0) {
				echo '<b>You have '.$row->total.' notification/s.</b>';
			} else {
				echo 'You have no new notifications yet.';
			}
		}
		echo '<br><br><a href="'.base_url('user/notifications').'" class="btn btn-success" style="color: white;"><i class="glyphicon glyphicon-bell"></i> View all notifications</a>';
	} ?>	
	
</div>
</div>