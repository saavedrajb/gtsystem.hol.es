<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function index(){
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata('logged_in')['role'] == '1') {
				redirect(base_url('/user'));
				} else {
					redirect(base_url('/admin'));
				} 
		} else {	
			$this->form_validation->set_rules('idno','ID number','trim');
			$this->form_validation->set_rules('password','Password','trim|callback_database_check');
			if($this->form_validation->run()==FALSE){
				$this->load->view('index_sub');
				} else {
					redirect(base_url('/panel/verify'));
				}
		}
	}
	
	
	public function database_check($password) {
		$idno = $this->input->post('idno');
		$result = $this->login_model->login_check($idno,$password);
		if($result){
			foreach ($result as $row) {
				if($row->userstatus != 'disabled') {
					$sess_array = array(
					'idno' => $row->idnumber,
					'role' => $row->roleID,
					'yearID' => $row->yearID,
					'firstname' => $row->firstname,
					'lastname' => $row->lastname,
					'tooksurvey' => $row->tooksurvey
					);
					$this->session->set_userdata('logged_in', $sess_array);
					return TRUE;
				} else {
					$this->form_validation->set_message('database_check','Your account has been disabled. Please contact the administrator.');
					return FALSE;
				}
			}
		} else {
			$this->form_validation->set_message('database_check','Incorrect username or password.');
			return FALSE;
		}
	}
	
	public function verify() {
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata('logged_in')['role'] == '1') {
					redirect(base_url('/user'));
				} else {
					redirect(base_url('/admin'));
				}
		} else {
			redirect(base_url());
		}
	}
}