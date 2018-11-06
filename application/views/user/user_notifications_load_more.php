<?php
	if($row->nfStatus != 'reported'){
		if($row->subscription == 'yes') {
			if($row->status == 'unread') {
				if($row->nfPostedBy == $idno){
					echo '<div class="shadow" style="background-color:#337fff; color:white; padding:15px; margin-bottom:5px;">';
					echo "<b>[ NEW ] -</b> One of your specific <a href='".base_url("user/newsfeed/".$row->nfPostedBy."/".$row->newsfeedID)."'> <b>post</b></a> just got a new comment!";
					echo '</div>';
				} else { 
					echo '<div class="shadow" style="background-color:#337fff; color:white; padding:15px; margin-bottom:5px;">';
					echo "<b>[ NEW ] -</b> Someone commented on ".$row->nfPosterName."'s <a href='".base_url("user/newsfeed/".$row->nfPostedBy."/".$row->newsfeedID)."'> <b>post</b></a> that you have followed.";
					echo '</div>';
				}
			} else {
				if($row->idnumber == $idno){
					if($row->nfPostedBy == $idno) {
						echo '<div class="shadow" style="background-color:#ffffff; padding:15px; margin-bottom:5px;">';
						echo "<b>[ OLD ] -</b> One of your specific <a href='".base_url("user/newsfeed/".$row->nfPostedBy."/".$row->newsfeedID)."'> <b>post</b></a> has no new comments yet.";
						echo '</div>';
					} else {
						echo '<div class="shadow" style="background-color:#ffffff; padding:15px; margin-bottom:5px;">';
						echo "<b>[ OLD ] -</b> Someone commented on ".$row->nfPosterName."'s <a href='".base_url("user/newsfeed/".$row->nfPostedBy."/".$row->newsfeedID)."'> <b>post</b></a> that you have followed.";
						echo '</div>';
					} 
				}
			}
		} else {
			echo '<div class="shadow" style="background-color:#ffffff; padding:15px; margin-bottom:5px;">';
			echo "<b>[ UNFOLLOWED ] -</b> You won't get notified by ".$row->nfPosterName."'s <a href='".base_url("user/newsfeed/".$row->nfPostedBy."/".$row->newsfeedID)."'> <b>post</b></a> since you unfollowed this specific post. ";
			echo '</div>';
		}
	}
?>