<?php
		$post_date = strtotime($row->dateAdded);
		$now = time();
		$units = 1;
		echo '<div class="specdiv">';
		echo '<b><p style="font-size:20px;">'.$row->title.'</p></b>';
		echo 'by: <i>Administrator '.$row->postedBy.' - </i><small><i>'.timespan($post_date,$now,$units).' ago.</i></small><hr>';
		echo '<div style="break-word: word-break; width:85%;"><p>'.$row->content.'</p></div></div><hr>';

?>