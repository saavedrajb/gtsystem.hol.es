<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata('logged_in')['role'] == '1') {
				$session_data = $this->session->userdata('logged_in');
				$data['firstname'] = $session_data['firstname'];
				redirect(base_url('user'), 'refresh');
				} else {
					$session_data = $this->session->userdata('logged_in');
					$data['firstname'] = $session_data['firstname'];
					$data['role'] = $session_data['role'];
					redirect(base_url('admin'), 'refresh');
				} 
		} else {
			$total_data = $this->search_model->getAnnouncementCount();
			$content_per_page = 5; 
			$data['total_data'] = ceil($total_data/$content_per_page);
			$this->load->view('index',$data);
		}
	}

	public function index_announcements(){
		
		$total_data = $this->search_model->getAnnouncementCount();
		$content_per_page = 5;
		$data['total_data'] = ceil($total_data/$content_per_page);
		
		$this->load->view('index_announcements',$data);
	}
	
	public function load_more() {
		$group_no = $this->input->post('group_no');
		$content_per_page = 5;
		$start = ceil($group_no * $content_per_page);
		$all_content = $this->search_model->getAnnouncementInf($start,$content_per_page);
		if(isset($all_content) && is_array($all_content) && count($all_content)) {
			foreach ($all_content as $key => $row) {
				include('application/views/user/user_dashboard_load_more.php');

			}                              
		}
	}
}
