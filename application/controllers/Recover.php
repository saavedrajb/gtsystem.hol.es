<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recover extends CI_Controller {

	public function index()	{
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata('logged_in')['role'] == '1') {
				redirect(base_url('user'));
			} else {
				$session_data = $this->session->userdata('logged_in');
				redirect(base_url('admin'));
			}
		} else {
			if($this->session->userdata('rec_in')) {
				redirect(base_url('recover/type'));
			} else {
			$this->form_validation->set_rules('idno','ID number','trim|required|callback_idno_check');
				if ($this->form_validation->run()==false) {
						$this->load->view('user/recover_view');
				} else {
					redirect(base_url('recover/type'));
				}
			}
		}
	}
	
	
	
	public function idno_check($idno) {
		$result = $this->recover_model->checkIdNo($idno);
		if ($result) {
			foreach ($result as $row) {
				if($row->userstatus != 'disabled') {
					$s_array = array(
					'idno' => $row->idnumber,
					'sq' => $row->securityquestion,
					'check' => '0'
					);
					$this->session->set_userdata('rec_in', $s_array);
					return true;
				} else {
					$this->form_validation->set_message('idno_check', 'Your account has been disabled. Please contact the administrator');
					return false;
				}
			}
		} else {
			$this->form_validation->set_message('idno_check', 'No match found');
			return false;
		}
	}
	
	public function cancel() {
		$this->session->unset_userdata('rec_in');
		$this->session->sess_destroy();
		redirect(site_url('/recover'));
	
	}
	
	public function type() {
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata('logged_in')['role'] == '1') {
				redirect(base_url('user'));
			} else {
				$session_data = $this->session->userdata('logged_in');
				redirect(base_url('admin'));
			}
		} else {
			if($this->session->userdata('rec_in')) {
				$sdata = $this->session->userdata('rec_in');
				$data['idno'] = $sdata['idno'];
				$this->load->view('user/recover_view_choose',$data);
			} else {
				redirect(base_url('recover'));
			}
		}
	}
	
	public function via_sq() {
		if($this->session->userdata('rec_in')) {
			$sdata = $this->session->userdata('rec_in');
			$data['idno'] = $sdata['idno'];
			$data['sq'] = $sdata['sq'];
			$this->form_validation->set_rules('securityanswer','Answer','trim|min_length[4]|callback_ans_check');
				if($this->form_validation->run()==false) {
					$this->load->view('user/recover_true_view', $data);
				} else {
					redirect(base_url('recover/setpassword'));
				}
		} else {
			redirect(base_url());
		}
	}
	
	public function via_email() {
		if($this->session->userdata('rec_in')) {
			$sdata = $this->session->userdata('rec_in');
			$data['idno'] = $sdata['idno'];
			$this->form_validation->set_rules('email','email','trim|min_length[4]|valid_email|callback_check_email');
				if($this->form_validation->run()==false) {
					$this->load->view('user/recover_view_email', $data);
				}
		} else {
			redirect(base_url());
		}
	}
	
	public function ans_check($securityanswer) {
		$result = $this->recover_model->checkAns($securityanswer);
		if($result) {
		$s_array = array();
			foreach ($result as $row) {
			$s_array = $arrayName = array(
			'idno' => $row->idnumber,
			'sq' => $row->securityquestion,
			'check' => '1'
			);
			$this->session->unset_userdata('rec_in');
			$this->session->set_userdata('rec_in', $s_array);	
		}
			return true;
		} else {
			$this->form_validation->set_message('ans_check', 'Wrong answer');
			return false;
		}
	}
	
	public function check_email($email) {
		if($this->session->userdata('rec_in')) {
			$sdata = $this->session->userdata('rec_in');
			$idno = $sdata['idno'];
			$email = $this->input->post('email');
			$result = $this->recover_model->checkEmail($email,$idno);

			if($result) {
				$reset_key = md5(uniqid());
				$this->recover_model->setHashKey($reset_key,$idno);

				$this->load->library('email');

				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'html'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);
				
				$this->email->from('NoReply@gtsystem.hol.es');
				$this->email->to($email);
				$this->email->subject('Reset your password for gtsystem.hol.es');
				$message="<p>Here's the link to reset your password:<br><br>".base_url('recover/setpassword/'.$idno.'/'.$reset_key)."</p>";
				$this->email->message($message);
				if($this->email->send()) {
					echo '<script>alert("Success! Please check the SPAM FOLDER for the link to change your password. You will be redirected to the main page.")</script>';
					$this->session->unset_userdata('rec_in');
					$this->session->sess_destroy();
					redirect(base_url(),'refresh');
				} else {
					echo '<script>alert("Failed to send email, server problem, wrong email format, or sending email has reached the limit.")</script>';
					redirect(base_url('recover'),'refresh');
				}
				
								
				
			} else {
				$this->form_validation->set_message('check_email', 'Wrong email provided');
				return false;
			}
		}
	}
	
	public function setpassword($id='',$hash='') {
		if($this->session->userdata('rec_in')) {
			if ($this->session->userdata('rec_in')['check']=='1') {
			$sdata = $this->session->userdata('rec_in');
			$data['id'] = $sdata['idno'];
			$this->form_validation->set_rules('newpass','New password','trim|required|min_length[8]|matches[re_newpass]');
			$this->form_validation->set_rules('re_newpass','Confirm New Password confirmation','trim|required');
			if($this->form_validation->run()==false){
				$this->load->view('user/recover_pass', $data);
			} else {
				$newpass = array(
					'password' => md5($this->input->post('newpass'))
				);
				$this->recover_model->saveNewPass($newpass,$data['id']);
				echo '<script>alert("Successfully changed password! You will be redirected to the main page to log in")</script>';
				$this->session->unset_userdata('rec_in');
				$this->session->sess_destroy();
				redirect(site_url(),'refresh');
				}
			} else {
				redirect(base_url());
			}
		} else {
			$data['id'] = $this->uri->segment(3);
			$hash = $this->uri->segment(4);
			$validity = $this->recover_model->valid_link($data['id'],$hash);
			if($validity) {
			$this->form_validation->set_rules('newpass','New password','trim|required|min_length[8]|matches[re_newpass]');
			$this->form_validation->set_rules('re_newpass','Confirm New Password confirmation','trim|required');
				if($id && $hash && $this->form_validation->run()==false) {
					$this->load->view('user/recover_pass', $data);
				} elseif ($id && $hash && $this->form_validation->run()==true) {
					$newpass = array(
						'password' => md5($this->input->post('newpass')),
						'reset_pass_hash' => md5(uniqid())
					);
					$this->recover_model->saveNewPassFromEmail($newpass,$data['id'],$hash);
					echo '<script>alert("Successfully changed password! You will be redirected to the main page to log in")</script>';
					redirect(site_url(),'refresh');
				} else {
					redirect(base_url('recover'));
				}
			} else {
				echo '<script>alert("Link expired.")</script>';
				redirect(base_url(),'refresh');
			}
		}
	}
	
}	