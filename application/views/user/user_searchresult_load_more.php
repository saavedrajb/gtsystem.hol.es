<?php

if($row->nfPostedBy == $id) {
	//--------NEWSFEED POST FORM
	$nfID = $row->newsfeedID;
	$post_date = strtotime($row->nfDateAdded);
	$now = time();
	$units = 1;
	echo '<div class="shadow" style="background-color:#ffffff;padding-bottom:15px; margin-bottom:10px;">';
	echo '<div id="nfpostID'.$row->newsfeedID.'" style="padding: 5px; word-break: break-word;">';
	echo '<img src="'.base_url().'images/'.$row->picture.'" style="border:1px solid #cccccc; width:60px; height:60px; float:left; margin-left:5px; margin-top:5px;"><div style="margin-left:5px; margin-top:5px; margin-bottom:10px;"><b style="margin-top:50px; margin-left:6px; font-size:16px;">'.$row->nfPosterName.'</b>';
	echo '<br><small style="color:#999999;">&nbsp;&nbsp;'.timespan($post_date, $now, $units).' ago</small><br><small id="markEdit" style="font-weight:bold; margin-left:8px; color:#afafaf;">'.$row->nfEdited.'</small></div><p style="margin-left:10px; font-size:16px;">'.$row->nfContent.'</p>';
	if($row->userstatus != 'disabled') {
		if($row->nfStatus == 'reported') {
			echo '</div><div style="padding: 8px; width:100%; background:red; text-align:center"><a style="padding: 10px; border-radius: 0px;color: white; text-decoration:none;"><span class="glyphicon glyphicon-alert" style="color:white; position:relative;"></span> This post cannot be commented until the administrator has reviewed this post.</a></div></div>';
		} else {
			echo '</div><center><a class="btn" style="width:100%; border-radius: 0px; background:#337ab7; color: white; text-decoration:none;" id="displayText'.$row->newsfeedID.'" href="'.base_url('user/newsfeed/'.$row->nfPostedBy.'/'.$row->newsfeedID).'">View all comments or comment to this post!</a></center></div>';
		}
	} else {
	echo '</div><div style="padding: 8px; width:100%; background:red; text-align:center"><a style="padding: 10px; border-radius: 0px;color: white; text-decoration:none;"><span class="glyphicon glyphicon-alert" style="color:white; position:relative;"></span> This user has been disabled by the administrator and this post cannot be commented.</a></div></div></div>';
}
}

?>

