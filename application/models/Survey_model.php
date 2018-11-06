<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class survey_model extends CI_Model {
	
	public function survey1($data1,$idno) {
		$this->db->where('idnumber',$idno);
		$this->db->update('users',$data1);
	}
	
	public function survey2($data2) {
		$this->db->insert('surveybank',$data2);
	}
	
	public function survey3_first_job($empfirstjobdata) {
		$this->db->insert('emphistory',$empfirstjobdata);
	}
	
	public function survey3_current_job($empcurrentjobdata) {
		$this->db->insert('emphistory',$empcurrentjobdata);
	}
	
	public function survey4_first_job($firstjobpos_bank){
		$this->db->insert('firstjob_pos_bank',$firstjobpos_bank);
	}
}