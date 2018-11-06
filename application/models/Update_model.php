<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class update_model extends CI_Model {
	
	public function form_updatepsinfo($updatedata,$idno) {
		$this->db->where('idnumber',$idno);
		$this->db->update('users', $updatedata);
		
		$this->db->from('users u');
		$this->db->join('emphistory m','u.idnumber=m.idnumber','left');
		$this->db->join('courses c','u.courseID=c.courseID','left');
		$this->db->join('credentials z','z.idnumber=u.idnumber','left');
		$this->db->join('years y','u.yearID=y.yearID','left');
		$this->db->where('z.idnumber', $idno);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function addenddate($updateenddate, $dateID){
		$this->db->where('empID',$dateID);
		$this->db->update('emphistory', $updateenddate);
	}

	public function empedit($updateemp, $empeditID){
		$this->db->where('empID',$empeditID);
		$this->db->update('emphistory', $updateemp);
	}
	
	public function emphide($hideemp,$hideempID){
		$this->db->where('empID',$hideempID);
		$this->db->update('emphistory', $hideemp);
	}
	
	public function seq_update($updateseq,$idno) {
		$this->db->where('idnumber', $idno);
		$this->db->update('credentials', $updateseq);
	}


	public function checkOldPass($oldpass) {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		$this->db->from('credentials');
		$this->db->where('idnumber',$idno);
		$this->db->where('password',md5($oldpass));
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->result(); }
		else {
			return False;
		}
	}
		
	public function saveNewPass($newpass,$idno) {
		$this->db->where('idnumber', $idno);
		$this->db->update('credentials', $newpass);
		}
		
	public function logupdate($updatelog,$idno) {
		$this->db->where('idnumber',$idno);
		$this->db->update('users', $updatelog);
	}
	
	public function getimg() {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		$this->db->from('users u');
		$this->db->join('credentials z','z.idnumber=u.idnumber','left');
		$this->db->where('z.idnumber', $idno);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row()->picture; }
		else {
			return False;
		}
	}
	
	public function postFeed($nfpost) {
		$this->db->insert('newsfeed',$nfpost);
		
		$query = "SELECT * FROM newsfeed ORDER BY newsfeedID DESC LIMIT 1";
		$result = $this->db->query($query)->result();
		
		if(!empty($result)) {
			foreach($result as $row) {
				$followOwnPost = array(
					'newsfeedID' => $row->newsfeedID,
					'idnumber' => $row->nfPostedBy,
					'status' => 'read',
					'subscription' => 'yes',
					'updated' => date('Y-m-d H:i:s')
				);
				
				$this->db->insert('notifications',$followOwnPost);
			}
		}
	}
	
	public function postCommentFeed($cnfpost,$addfollow,$id1,$upfollow) {
		$session_data = $this->session->userdata('logged_in');
		$idno = $session_data['idno'];
		
		$this->db->insert('nfcomments',$cnfpost);
		
		$query = "SELECT * FROM notifications WHERE newsfeedID='$id1' AND idnumber='$idno'";
		$result = $this->db->query($query);
		
		if($result->num_rows() == 0) {
			$this->db->insert('notifications',$addfollow);
		} else {
			$this->db->where('idnumber',$idno);
			$this->db->where('newsfeedID',$id1);
			$this->db->update('notifications',$upfollow);
		}
	}
	
	public function updateNewsfeed($idcc,$cnfupdate) {
		$this->db->where('newsfeedID',$idcc);
		$this->db->update('newsfeed',$cnfupdate);
	}
	
	public function Un_FollowPost($idno,$id1) {
		
		$query = "SELECT * FROM notifications WHERE idnumber='$idno' AND newsfeedID='$id1'";
		$result = $this->db->query($query)->result();
		
		if(!empty($result)) {
			foreach($result as $row) {
				if($row->subscription == 'yes') {
					$this->db->where('idnumber',$idno);
					$this->db->where('newsfeedID',$id1);
					$this->db->update('notifications',array('subscription'=>'no'));
				} else {
					$this->db->where('idnumber',$idno);
					$this->db->where('newsfeedID',$id1);
					$this->db->update('notifications',array('subscription'=>'yes'));
				}
			}
		}
	}
	
	public function reportPost($id,$id1,$reportpost) {
		$this->db->where('nfPostedBy',$id);
		$this->db->where('newsfeedID',$id1);
		$this->db->update('newsfeed',$reportpost);
	}
	
	public function readPost($idno,$id1,$readpost) {
		$this->db->where('newsfeedID',$id1);
		$this->db->where('idnumber',$idno);
		$this->db->update('notifications',$readpost);
	}
	
	public function unreadPost($idno,$id1,$unreadpost) {
		$this->db->where('newsfeedID',$id1);
		$this->db->where('subscription','yes');
		$this->db->where('idnumber !=',$idno);
		$this->db->update('notifications',$unreadpost);
	}
	
	public function delNfPost($nfdelid) {
		$this->db->where('newsfeedID',$nfdelid);
		$this->db->delete('newsfeed');
		
		$this->db->where('newsfeedID',$nfdelid);
		$this->db->delete('nfcomments');
		
		$this->db->where('newsfeedID',$nfdelid);
		$this->db->delete('notifications');
	}

	public function editPost($updatenfpost,$editID){
		$this->db->where('newsfeedID',$editID);
		$this->db->update('newsfeed', $updatenfpost);
	}
	
	public function delNfC($nfcdel) {
		$this->db->where('nfCommentID',$nfcdel);
		$this->db->delete('nfcomments');
	}
	
//-------------ADMIN CORNER

	public function postAnnouncement($postAn) {
		$this->db->insert('announcements',$postAn);
	}
	
	public function delAnn($delid) {
		$this->db->where('announcementID',$delid);
		$this->db->delete('announcements');
	}

	public function admin_form_update($id,$editdata,$editdatanf,$editdatanfc) {
		$this->db->where('idnumber',$id);
		$this->db->update('users', $editdata);
		
		$this->db->where('nfPostedBy',$id);
		$this->db->update('newsfeed',$editdatanf);
		
		$this->db->where('nfCommentedBy',$id);
		$this->db->update('nfcomments',$editdatanfc);
	}
	
	public function reset_pass($idno,$reset) {
		$this->db->where('idnumber',$idno);
		$this->db->update('credentials',$reset);
	}
	
	public function upimg($img,$id) {
		$this->db->where('idnumber',$id);
		$this->db->update('users',$img);
	}
	
	public function retainPost($id,$good) {
		$this->db->where('newsfeedID',$id);
		$this->db->update('newsfeed',$good);
	}
	
	public function violatedPost($id,$idno) {
		$this->db->insert('violations',array('idnumber'=>$idno));
		
		$this->db->where('newsfeedID',$id);
		$this->db->delete('newsfeed');
		
		$this->db->where('newsfeedID',$id);
		$this->db->delete('nfcomments');
		
		$this->db->where('newsfeedID',$id);
		$this->db->delete('notifications');
		
		$query = "SELECT * FROM violations WHERE idnumber='$idno'";
		$result = $this->db->query($query);
		
		if($result->num_rows() >= 3) {
			$this->db->where('idnumber',$idno);
			$this->db->delete('violations');
			
			$this->db->where('idnumber',$idno);
			$this->db->update('users',array('userstatus'=>'disabled'));
		}
	}
	
	public function activateUser($idno) {
		$this->db->where('idnumber',$idno);
		$this->db->update('users',array('userstatus'=>'enabled'));
	}
	
	public function disableUser($idno) {
		$this->db->where('idnumber',$idno);
		$this->db->update('users',array('userstatus'=>'disabled'));
	}
	
}