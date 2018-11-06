<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function index(){
		if($this->session->userdata('logged_in')['role'] == '2'){
			$session_data = $this->session->userdata('logged_in');
			
			$data = array(
				'firstname' => $session_data['firstname'],
				'utotal' => $this->search_model->countData(),
				'datayear' => $this->search_model->countDataYear()
			);
			
			$this->load->view('admin/admin_dashboard', $data);
			} else {
			redirect(base_url());
		}
	}
	
	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(base_url());
	
	}
	
	public function register() {
		if($this->session->userdata('logged_in')['role'] == '2') {
				$session_data = $this->session->userdata('logged_in');
				
				$data = array(
					'title' => 'ICT Alumni Portal | Registration',
					'firstname' => $session_data['firstname'],
					'list' => $this->search_model->getYear(),
					'list1' => $this->search_model->getCourse(),
					'utotal' => $this->search_model->countData(),
					'datayear' => $this->search_model->countDataYear(),
				);
				
				$this->form_validation->set_rules('idno','ID No.','trim|required|max_length[30]|min_length[7]|callback_isIdExist');
				$this->form_validation->set_rules('firstname','First name','trim|required|max_length[20]|min_length[2]|callback_alpha_dash_space');
				$this->form_validation->set_rules('lastname','Last name','trim|required|min_length[2]|callback_alpha_dash_space1');
				$this->form_validation->set_rules('sex','Sex','trim|required');
				$this->form_validation->set_rules('course','Course','trim|required');
				$this->form_validation->set_rules('year','Year Graduated','trim|required');
				$this->form_validation->set_rules('dob','Date of birth','trim|max_length[10]|min_length[10]');
				if($this->form_validation->run()==false){
					$this->load->view('admin/admin_register', $data);
				} else {
					$regdata = array(
						'idnumber' => $this->input->post('idno'),
						'firstname' => ucfirst($this->input->post('firstname')),
						'lastname' => ucfirst($this->input->post('lastname')),
						'courseID' => $this->input->post('course'),
						'sex' => $this->input->post('sex'),
						'yearID' => $this->input->post('year'),
						'dob' => $this->input->post('dob'),
						'picture' => 'new_reg.jpg',
						'tooksurvey' => 'one',
                                                'userstatus' => 'enabled',
					);
				
					$regdatacred = array(
						'idnumber' => $this->input->post('idno'),
						'roleID' => '1',
						'password' => md5($this->input->post('idno')),
						'securityquestion' => 'Not set.'
					);
					
					$this->register_model->usercreds($regdata,$regdatacred);
					echo '<script>alert("Successfully registered");</script>';
					redirect(base_url('/admin/register'),'refresh');
					}
		} else {
			redirect(base_url());
		}
	}
	
	public function search($id='') {
		if($this->session->userdata('logged_in')['role']=='2') {
			$this->form_validation->set_rules('search','Search','trim|required');
			$session_data = $this->session->userdata('logged_in');
			$search = $this->input->get('search');
			
			$data = array(
				'title' => 'ICT Alumni Portal | Search Profile',
				'firstname' => $session_data['firstname']
			);
			
			$id = $this->uri->segment(3);
			
				if(!$id && !$search) {
					$this->load->view('admin/admin_search', $data);
				} elseif(!$id && $search) {
					$data['list'] = $this->search_model->getSpecifiedList($search);
					$this->load->view('admin/admin_search', $data);
				} elseif($id) {
					$id = $this->uri->segment(3);
					$this->search_model->getSpecifiedUser($id);
					$data['list'] = $this->search_model->getSpecifiedUser($id);
					$data['winfo'] = $this->search_model->getSpecifiedEmpHistory($id);
					$data['cwinfo'] = $this->search_model->getSpecifiedCurrentWork($id);
					$this->form_validation->set_rules('idno','ID Number','trim|callback_search_conditions');
					$this->form_validation->set_rules('idno1','ID Number','trim|callback_picture_up');
					if($this->form_validation->run()==false) {
						$this->load->view('admin/admin_searchresult', $data);
					}
				}
		} else {
			redirect(base_url());
		}
	}
	
	public function search_conditions() {
		if($this->session->userdata('logged_in')['role']=='2') {
			$session_data = $this->session->userdata('logged_in');
			$idno = $this->input->post('idno');
			$resetpass = $this->input->post('resetpass');
			$id = $this->uri->segment(3);
			$activate = $this->input->post('activate');
			$disable = $this->input->post('disable');
			
			if($resetpass && $idno) {
				$reset = array('password' => md5($idno));
				
				$this->update_model->reset_pass($idno,$reset);
				
				echo '<script>alert("Password reset successful!")</script>';
				
				redirect(base_url('admin/search/'.$id),'refresh');
				
			} elseif ($activate) {
				
				$this->update_model->activateUser($idno);
				
				echo '<script>alert("Account enabled")</script>';
				
				redirect(base_url('admin/search/'.$id),'refresh');
				
			} elseif ($disable) {
				
				$this->update_model->disableUser($idno);
				
				echo '<script>alert("Account disabled")</script>';
				
				redirect(base_url('admin/search/'.$id),'refresh');
				
			}
		}
	}
	
	public function picture_up() {
		$id = $this->uri->segment(3);
		$config = array(
			'upload_path' => "./images",
			'allowed_types' => "jpg",
			'file_name' => $id. " dp",
			'overwrite' => TRUE,
			'max_size' => "2048000",
			'max_height' => "1024",
			'max_width' => "1024"
		);
		
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload()) {
				echo link_tag('assets2/dist/sweetalert.css');
				echo '<script src="'.base_url().'assets2/dist/sweetalert.min.js"></script>';
				echo '<body><script>swal("Oops!","Something is wrong!","error");
				setTimeout(function() {window.location.href="'.$id.'"},2000);</script></body>';
			} else {
				$data['upload_data'] = $this->upload->data();
				$img = array('picture' => $data['upload_data']['file_name']);
				$this->update_model->upimg($img,$id);
				echo link_tag('assets2/dist/sweetalert.css');
				echo '<script src="'.base_url().'assets2/dist/sweetalert.min.js"></script>';
				echo '<body><script>swal("Success!","You just changed your profile picture!","success");
				setTimeout(function() {window.location.href="'.$id.'"},2000);</script></body>';
			}
	}

	public function edit($id='') {
		if($this->session->userdata('logged_in')['role']=='2') {
			$session_data = $this->session->userdata('logged_in');
			$id = $this->uri->segment(3);
			
			$data = array(
				'title' => 'ICT Alumni Portal| Edit Profile',
				'list' => $this->search_model->getSpecifiedUser($id),
				'list1' => $this->search_model->getYear(),
				'list2' => $this->search_model->getCourse(),
				'firstname' => $session_data['firstname']
			);
			
			$this->form_validation->set_rules('firstname','First name','trim|required|max_length[20]|min_length[2]|callback_alpha_dash_space');
			$this->form_validation->set_rules('lastname','Last name','trim|required|min_length[2]|callback_alpha_dash_space1');
			$this->form_validation->set_rules('sex','Sex','trim|required');
			$this->form_validation->set_rules('course','Course','trim|required');
			$this->form_validation->set_rules('year','Year Graduated','trim|required');
			$this->form_validation->set_rules('dob','Date of birth','trim|max_length[10]|min_length[10]|required');
			
			if($id && $this->form_validation->run()==true) {
				$editdata = array(
					'firstname' => ucfirst($this->input->post('firstname')),
					'lastname' => ucfirst($this->input->post('lastname')),
					'sex' => $this->input->post('sex'),
					'courseID' => $this->input->post('course'),
					'yearID' => $this->input->post('year'),
					'dob' => $this->input->post('dob')
				);
				
				$editdatanf = array('nfPosterName' => ucfirst($this->input->post('firstname')));
				
				$editdatanfc = array ('nfCommentorName' => ucfirst($this->input->post('firstname')));
				
				$this->update_model->admin/admin_form_update($id,$editdata,$editdatanf,$editdatanfc);
				echo '<script>alert("Successfully edited the profile of a certain user!")</script>';
				redirect(base_url('admin/search/'.$id));
			} elseif ($this->form_validation->run()==false) {
				$this->load->view('admin/admin_edit', $data);
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function list_view() {
		if($this->session->userdata('logged_in')['role']=='2') {
			$session_data = $this->session->userdata('logged_in');
			
			$data = array(
				'title' => 'ICT Alumni Portal | List View',
				'firstname' => $session_data['firstname'],
				'list1' => $this->search_model->getYear()
			);
			
			$this->form_validation->set_rules('c1','Course','trim|required');
			$this->form_validation->set_rules('c2','Year Graduated','trim|required');
			
			if($this->form_validation->run()==false) {
				$data['list'] = $this->search_model->getCategoryList();
				$this->load->view('admin/admin_list_view', $data);
			} else {
				$this->search_model->getCategoryList();
				$data['list'] = $this->search_model->getCategoryList();
				$this->load->view('admin/admin_list_view', $data);
			}			
		} else {
			redirect(base_url());
		}
	}
	
	public function announcement() {
		if($this->session->userdata('logged_in')['role']=='2') {
			$session_data = $this->session->userdata('logged_in');
			
			$data = array(
				'title' => 'ICT Alumni Portal | Announcement',
				'firstname' => $session_data['firstname'],
				'ranl' => $this->search_model->gaNoLimit()
			);
			
			$this->form_validation->set_rules('title','Title','trim|callback_announcement_conditions');
			
			if($this->form_validation->run()==false) {
				$this->load->view('admin/admin_announcement', $data);
			}		
		} else {
			redirect(base_url());
		}
	}
	
	public function report($id=''){
		if ($this->session->userdata('logged_in')['role']=='2'){
			$session_data = $this->session->userdata('logged_in');
			
			$data = array(
				'title' => 'ICT Alumni Portal',
				'firstname' => $session_data['firstname'],
				'ran1' => $this->search_model->gaNoLimit(),
				'list' => $this->search_model->getYear(),
				'question' => $this->search_model->getquestions()
			);
			
			$id = $this->uri->segment(3);
			if(!$id){
				$this->load->view('admin/admin_reports',$data);
			} elseif(!empty($id)) {
				$year = $this->uri->segment(3);
				
				$data = array(
					'sy' => $this->search_model->getSpecificYear($year),
					'reports' => $this->search_model->gts_report_model($year),
					'reportsfjob4' => $this->search_model->gts_report_fjob4($year),
					'preport_jobpos' => $this->search_model->preport_jobpos($year),
					'preport_pow' => $this->search_model->preport_pow($year),
					'preport_ams' => $this->search_model->preport_ams($year),
					'preports1' => $this->search_model->profiling_report_gender($year),
					'preports2' => $this->search_model->profiling_report_cs($year),
					'reports' => $this->search_model->gts_report_model($year)
				);
				
				$this->load->view('admin/admin_gts_reports',$data);
				//echo '<pre>'.print_r($data['preport_pow']).'</pre>';
			} else {
				
			}
		} else{
			redirect(base_url());
		}
	}
	
	public function violations() {
		if ($this->session->userdata('logged_in')['role']=='2'){
			$session_data = $this->session->userdata('logged_in');
			
			$data = array(
				'title' => 'ICT Alumni Portal',
				'firstname' => $session_data['firstname'],
				'list' => $this->search_model->getNFV()
			);
			
			$this->form_validation->set_rules('id','ID','trim|callback_violations_rule');
			if($this->form_validation->run()==false) {
				$this->load->view('admin/admin_violations',$data);
			}
		}
	}
	
	public function violations_rule() {
		if($this->session->userdata('logged_in')['role']=='2') {
			$session_data = $this->session->userdata('logged_in');
			$id = $this->input->post('id');
			$idno = $this->input->post('idno');
			$retain = $this->input->post('retain');
			$delete = $this->input->post('delete');
			
			if($retain) {
				
				$good = array('nfStatus'=>'reviewed');
				
				$this->update_model->retainPost($id,$good);
				echo '<script>alert("Post not violated. Marked as reviewed.")</script>';
				redirect(base_url('admin/violations'),'refresh');
				
			} elseif ($delete) {
				
				$this->update_model->violatedPost($id,$idno);
				echo '<script>alert("Post violated. Marked as violation. Post deleted.")</script>';
				redirect(base_url('admin/violations'),'refresh');
			} else {
				echo 'wala';
			}
		}
	}
	
	public function announcement_conditions() {
		if($this->session->userdata('logged_in')['role']=='2') {
			$session_data = $this->session->userdata('logged_in');
			$content = $this->input->post('content');
			$delid = $this->input->post('delid');
			
			if($content) {
				
				$postAn = array(
					'postedBy' => $session_data['firstname'],
					'title' => strip_tags($this->input->post('title')),
					'content' => nl2br(strip_tags($this->input->post('content'))),
					'dateAdded' => date('Y-m-d H:i:s')
				);
				
				$this->update_model->postAnnouncement($postAn);
				echo '<script>alert("Successfully posted announcement!");</script>';
				redirect(base_url('admin/announcement'),'refresh');

			} elseif ($delid) {
				
				$session_data = $this->session->userdata('logged_in');
				$delid = $this->input->post('delid');
				$this->update_model->delAnn($delid);
				echo '<script>alert("Successfully deleted announcement!");</script>';
				redirect(base_url('admin/announcement'),'refresh');
			}
			
		} else {
			redirect(base_url());
		}
	}
	
	public function add_year() {
		if($this->session->userdata('logged_in')['role']=='2') {
			$session_data = $this->session->userdata('logged_in');
			
			$data = array(
				'title' => 'ICT Alumni Portal | Add School Year',
				'firstname' => $session_data['firstname']
			);
			
			$this->form_validation->set_rules('yg','Year graduated','trim|required|max_length[4]|min_length[4]');
			if($this->form_validation->run()==false) {
				$this->load->view('admin/admin_addyear',$data);
			} else {
				$yr = array(
				'yeargraduated' => $this->input->post('yg')
				);
				$this->register_model->year_insert($yr);
				echo '<script>alert("Added year successfully!");</script>';
				redirect(base_url('admin/add_year'));
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function add_course() {
		if($this->session->userdata('logged_in')['role']=='2') {
			$session_data = $this->session->userdata('logged_in');
			
			$data = array(
				'title' => 'ICT Alumni Portal | Add School Year',
				'firstname' => $session_data['firstname'],
				'list' => $this->search_model->getCourse(),
			);
			
			$this->form_validation->set_rules('course','Course','trim|required');
			
			if($this->form_validation->run()==false) {
				$this->load->view('admin/admin_addcourse',$data);
			} else {
				$course = array(
					'course' => $this->input->post('course')
					);
				$this->register_model->course_insert($course);
				echo '<script>alert("Added course successfully!");</script>';
				redirect(base_url('admin/add_course'));
			}
		} else {
			redirect(base_url());
		}
	}

	public function isIdExist($idno) {
		$is_exist = $this->register_model->isIdExist($idno);
		if($is_exist){
			$this->form_validation->set_message(
					'isIdExist', 'ID number already exists.');
				return false;
			} else {
				return true;
			}
	}
	
	function alpha_dash_space($str) {
    if ( ! preg_match("/^([-a-z_ ])+$/i", $str)) {
			$this->form_validation->set_message('alpha_dash_space', 'First name should only contain letters.');
				return FALSE;
		} else {
			return TRUE;
		}
	}
	
	function alpha_dash_space1($str) {
    if ( ! preg_match("/^([-a-z_ ])+$/i", $str)) {
			$this->form_validation->set_message('alpha_dash_space1', 'Last name should only contain letters.');
				return FALSE;
		} else {
			return TRUE;
		}
	} 

}