<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>
<div class="container">
<?php include_once('sidebar.php'); ?>

<style>
 #commentbox:focus {
  border-color: #cccccc;
}

 #commentbox:active {
  border-color: #cccccc;
}

</style>
         
<div class="col-md-8" style="margin-left:310px; margin-top:2px;">
	<div class="panel panel-default" style="background:transparent;">
		<div class="panel-heading" style="background:#337ab7"><h4><a href="<?php echo base_url().'user/newsfeed'; ?>" style="color:white; text-decoration:none;">Back to newsfeed!</a></h4></div>
		<div class="panel-body">

	<?php
	if(!empty($list)) {
		foreach ($list as $row) {
		if($row->nfStatus != 'hidden') {
			$nfID = $row->newsfeedID;
			$eform = "nfEdit_form";
			$eform1 = $eform.$row->newsfeedID;
			$hnfcontent = "nfepostID".$row->newsfeedID;

			if($row->nfPostedBy == $idno){
				echo form_open('user/newsfeed/'.$id.'/'.$id1,array('id'=>'deletenf'));
				echo form_hidden('nfdel',$row->nfPostedBy);
				echo form_hidden('nfdelid',$row->newsfeedID);

				if($row->nfStatus == 'reported') {
					//-None
				} else {
					//--------DROPDOWN BUTTON
					echo "<div style='position:relative; float:right'><span style='position:relative; float:right;'/><span class='btn dropdown-toggle glyphicon glyphicon-chevron-down' type='button' data-toggle='dropdown' style='background-color:f3f3f3; color:#cccccc; position:relative;' onmouseover=this.style.color='#111166' onmouseout=this.style.color='#cccccc'></span><ul class='dropdown dropdown-menu dropdown-menu-right'>";
					//--------DROPDOWN EDIT BUTTON
					echo "<li><a href='#' onClick=editform('".$eform1."','".$hnfcontent."')><span class='glyphicon glyphicon-pencil'></span>&nbsp;&nbsp;&nbsp;Edit post</a></li>";

					//--------DROPDOWN DELETE BUTTON
					echo '<li><a href="#"><button style="background:none; border:none; padding:0px;" onclick="return deletenf('.$row->nfPostedBy.','.$row->newsfeedID.')"><i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;&nbsp;Delete post</button></a></li></ul></div>';
				}
				
				echo form_close();
				
			} else {
				if(!empty($getnotif)) {
					foreach ($getnotif as $row2) {
						if($row2->newsfeedID == $row->newsfeedID) {
							if($row2->idnumber == $idno) {
								if($row->userstatus != 'disabled') {
									if($row->nfStatus != 'reported') {
										if($row2->subscription == 'no') {
											//--------DROPDOWN BUTTON
											echo "<div style='position:relative; float:right'><span style='position:relative; float:right;'/><span class='btn dropdown-toggle glyphicon glyphicon-chevron-down' type='button' data-toggle='dropdown' style='background-color:f3f3f3; color:#cccccc; position:relative;' onmouseover=this.style.color='#111166' onmouseout=this.style.color='#cccccc'></span><ul class='dropdown dropdown-menu dropdown-menu-right'>";
											
											echo form_open('user/newsfeed/'.$id.'/'.$id1);
											//--------FOLLOW POST BUTTON
											echo '<li>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-eye-open"></i> <input type="submit" style="background:none; border:0px; padding:5px;" name="uf" value="Follow post"></li>';
											
											//--------REPORT POST BUTTON
											echo '<li>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-alert"></i> <input type="submit" style="background:none; border:0px; padding:5px;" name="report" value="Report post"></li></div>';
											echo form_close();
										} elseif ($row2->subscription == 'yes') {
											echo "<div style='position:relative; float:right'><span style='position:relative; float:right;'/><span class='btn dropdown-toggle glyphicon glyphicon-chevron-down' type='button' data-toggle='dropdown' style='background-color:f3f3f3; color:#cccccc; position:relative;' onmouseover=this.style.color='#111166' onmouseout=this.style.color='#cccccc'></span><ul class='dropdown dropdown-menu dropdown-menu-right'>";
											
											echo form_open('user/newsfeed/'.$id.'/'.$id1);
											//--------UNFOLLOW POST BUTTON
											echo '<li>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-eye-close"></i> <input type="submit" style="background:none; border:0px;padding:5px;" name="uf" value="Unfollow post"></li>';
											
											//--------REPORT POST BUTTON
											echo '<li>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-alert"></i> <input type="submit" style="background:none; border:0px; padding:5px;" name="report" value="Report post"></li></div>';
											echo form_close();
										}
									}
								}
							}
						}
					}
				}					
			}

			//----------NEWSFEED POST
			$post_date = strtotime($row->nfDateAdded);
			$now = time();
			$units = 1;
			echo '<div class="shadow" style="background-color:#ffffff; padding:4px; padding-bottom:15px;">';
			echo '<div id="nfpostID'.$row->newsfeedID.'" style="padding: 5px; word-break: break-word;">';
			echo '<a href="'.base_url('user/search/'.$row->nfPostedBy).'" style="text-decoration:none;"><img src="'.base_url().'images/'.$row->picture.'" style="border:1px solid #cccccc; width:60px; height:60px; float:left; margin-left:5px; margin-top:5px;"><div style="margin-left:5px; margin-top:5px; margin-bottom:10px;"><b style="margin-top:50px; margin-left:6px; font-size:16px;">'.$row->nfPosterName.'</b></a>';
			echo '<br><small style="color:#999999;">&nbsp;&nbsp;'.timespan($post_date, $now, $units).' ago</small><br><small id="markEdit" style="font-weight:bold; margin-left:8px; color:#afafaf;">'.$row->nfEdited.'</small></div><p id="'.$hnfcontent.'" style="margin-left:7px; font-size:16px; text-align:justify;">'.$row->nfContent.'</p>';
			echo '</div>';

			//----------EDIT POST FORM
			echo form_open('user/newsfeed/'.$id.'/'.$id1, array('id'=>$eform1,'style'=>'display:none;')); 
			echo form_hidden('nfeditID',$nfID); 
			echo '<textarea name="newsfeed_edit" maxlength="200" style="width:100%; resize:vertical;" class="form-control" required>'.strip_tags($row->nfContent).'</textarea><br>';
			echo "<input type='button' onClick=cancelEform('".$eform1."','".$hnfcontent."'); class='btn btn-default btn-sm' value='Cancel' style='float:right;'>";
                        echo '<input id="nfSaveEdit_button" class="btn btn-info" type="submit" value="Save" style="margin-right:10px; float:right;"><br><br>';
			echo form_close();
				echo '<div style="border-bottom: solid 1px #eaeaea;"></div>';

			if(!empty($list1)) {
				foreach ($list1 as $row1) {
					if($row1->newsfeedID == $row->newsfeedID){
						
						//------COMMENT
						$cmt_date = strtotime($row1->nfTime);
						$now = time();
						$units = 1;
						echo '<div style="border-bottom: solid 1px #efefef;">';
						echo '<a href="'.base_url().'user/search/'.$row1->nfCommentedBy.'"><img src="'.base_url().'images/'.$row1->picture.'" style="border:1px solid #cccccc; width:40px; height:40px; float:left; margin-left:20px; margin-top:10px"></a>';
						
						if($row->userstatus != 'disabled') {
							if($row1->nfCommentedBy == $idno) {
								if($row->nfStatus != 'reported') {
									echo form_open('user/newsfeed/'.$id.'/'.$id1,array('id'=>'deletenfc'));
									echo form_hidden('nfcdel',$row1->nfCommentID);

									//----------DELETE COMMENT BUTTON
									echo '<button title="Delete comment" class="btn glyphicon glyphicon-remove" style="float:right; background-color:white; color:#cccccc; font-size:12px;"  onclick="return deletenfc('.$row1->nfCommentID.')"  onmouseover=this.style.color="#111166" onmouseout=this.style.color="#cccccc"></button>';
									echo form_close();
								}
							}
						}
						
						echo '</div><div style="margin-left:68px; margin-right:25px; padding: 10px 0px;"><a href="'.base_url().'user/search/'.$row1->nfCommentedBy.'"><b>'.$row1->nfCommentorName.'</a></b>';
						
						echo '<small style="color:#999999;">&nbsp;&nbsp;'.timespan($cmt_date,$now,$units).' ago</small><br><span style="word-break:break-word; text-align:justify;">'.$row1->nfCommentContent.'</span><br></div>';
					}
				}
			}
			if($row->userstatus != 'disabled') { 
				if($row->nfStatus == 'reported') {
					echo '<div style="padding: 10px; width:100%; background:red; text-align:center"><a style="padding: 10px; border-radius: 0px;color: white; text-decoration:none;"><span class="glyphicon glyphicon-alert" style="color:white; position:relative;"></span> This post cannot be commented until the administrator has reviewed this post.</a></div></div>';
				} else {
					//--------WRITE COMMENT FORM
					echo form_open('user/newsfeed/'.$id.'/'.$id1,array("style"=>"border-top: solid 1px #d3d3d3", "onsubmit"=>"this.style.display = 'none'"));
					echo form_hidden('idcc',$row->newsfeedID);
					echo '<table border="0" width="100%" style="margin-top:9px;"><tr><td style="width:50px;"><img src="'.base_url().'images/'.$picture.'" style="border:1px solid #eaeaea; width:40px; height:40px; margin-left:10px;"></td>';
                                        echo '<div class="form-group">';
                                        echo '<td><div class="input-group has-feedback" style="background:white; margin-right:10px; box-shadow:0 0 0 #ffffff;">'.form_input('nfcomment','','autocomplete="off" placeholder="What is your comment, '.$firstname.'?" id="commentbox" class="form-control input-lg" type="text" maxlength="200" style="height:90%; font-size:13px; margin-left:10px; border-right:0; box-shadow:0 0 0 #ffffff;" required').'<span class="input-group-addon" style="background:transparent;"><i class="glyphicon glyphicon-comment" style="color:#cccccc"></i></span></div></td></tr></table>';			
                                        echo '</div>';
                                        echo form_close().'</div>';
				}
			} else {
				echo '<div style="padding: 10px; width:100%; background:red; text-align:center"><a style="padding: 10px; border-radius: 0px;color: white; text-decoration:none;"><span class="glyphicon glyphicon-alert" style="color:white; position:relative;"></span> This user has been disabled by the administrator and this post cannot be commented.</a></div></div>';
			}
		} else {
			echo '<center><br><div class="shadow" style="padding: 20px; width:100%; background:white; text-align:center;"><h2>Not found</h2></div><br></center>';
		}
		}
	}	else {
		echo '<center><br><div class="shadow" style="padding: 20px; width:100%; background:white; text-align:center;"><h2>Not found</h2></div><br></center>';
	}
	?>
</div>
</div>
</div>
</div>
</div>

<script>

function editform(id,id1){
	document.getElementById(id).style.display="block";
	document.getElementById(id1).style.display="none";
}

function cancelEform(id,id1){	
	document.getElementById(id).style.display="none";
	document.getElementById(id1).style.display="block";
}

function deletenf(nfdel,nfdelid) {
	if(confirm("Are you sure you want to delete this post?")) {
		return true;
	} else {
		return false;
	}
}

function deletenfc(nfcdel) {
	if(confirm("Are you sure you want to delete this comment?")) {
		return true;
	} else {
		return false;
	}
}

</script>

<?php include_once('footer.php'); ?>