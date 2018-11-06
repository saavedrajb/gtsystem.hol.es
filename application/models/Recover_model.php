<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class recover_model extends CI_Model {
	
	public function getSecurityQuestion() {
		$idno = $this->input->post('idno');
		$this->db->from('credentials');
		$this->db->where('idnumber', $idno);
		$query = $this->db->get();
		if ($query->num_rows()>0){
			return $query->row()->securityquestion;
		}
    }
	
	public function checkIdNo($idno) {
		$this->db->from('credentials c');
		$this->db->join('users u','c.idnumber=u.idnumber','left');
		$this->db->where('c.idnumber',$idno);
		$this->db->where('c.roleID', '1');
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->result(); }
		else {
			return False;
		}
	}
	
	public function checkAns($securityanswer) {
		$idno = $this->input->post('idno');
		$this->db->from('credentials');
		$this->db->where('idnumber',$idno);
		$this->db->where('securityanswer',$securityanswer);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->result(); }
		else {
			return False;
		}
	}
	
	public function setHashKey($reset_key,$idno) {
		$this->db->where('idnumber',$idno);
		$this->db->update('credentials',array('reset_pass_hash' => $reset_key));
	}
	
	public function saveNewPass($newpass,$idno) {
		$this->db->where('idnumber', $idno);
		$this->db->update('credentials', $newpass);
		return true;
	}
	
	public function valid_link($id,$hash) {
		$this->db->where('reset_pass_hash',$hash);
		$this->db->where('idnumber', $id);
		$this->db->from('credentials');
		
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return true;
		} else{
			return false;
		}
	}
		
	public function saveNewPassFromEmail($newpass,$id,$hash) {
		$this->db->where('reset_pass_hash',$hash);
		$this->db->where('idnumber', $id);
		$this->db->update('credentials', $newpass);
	}
	
	public function checkEmail($email,$idno) {
		$this->db->where('email', $email);
		$this->db->where('idnumber', $idno);
		$this->db->from('users');
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
}