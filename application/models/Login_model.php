<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {
	
	public function login_check($idno, $password){
		$this->db->from('credentials z');
		$this->db->join('users u', 'u.idnumber=z.idnumber', 'left');
		$this->db->join('courses c', 'c.courseID=u.courseID', 'left');
		$this->db->join('years y','u.yearID=y.yearID','left');
		$this->db->where('z.password',md5($password));
		$this->db->where('z.idnumber',$idno);
		
		$query = $this->db->get();
		if($query->num_rows()==1) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
}