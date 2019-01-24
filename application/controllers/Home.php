<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Home_model', 'hm');
	}

	public function index() {
		if (isset($this->session->userdata['token'])) {
			$uid = $this->session->userdata['uid'];
			$this->load->view('home', ['uid'=>$uid]);
		} else {
			$this->load->view('login');
		}
	}

	public function login(){
		$ue = $this->input->post('ue');
		$up = md5($this->input->post('up'));
		$this->form_validation->set_rules('ue', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('up', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {

			$uData = $this->hm->getUser($ue, $up);

			if ($uData !== FALSE) {
				// $uData = $this->hm->getUser($ue);
				// echo $uData;die();
				$sessionData = array(
					'token' => $up,
					'un'    => $uData->un,
					'uid'    => $uData->id
				);
				
				$this->session->set_userdata( $sessionData );
				redirect('home','refresh');
			} else {
				$this->session->set_flashdata('loginerror', 'Invalid Email/Password');
				redirect('home/login','refresh');
			}
		}
	}

	public function register(){
		$un = $this->input->post('un');
		$ue = $this->input->post('ue');
		$up = $this->input->post('up');

		$this->form_validation->set_rules('un', 'Name', 'required');
		$this->form_validation->set_rules('ue', 'Email', 'required|valid_email|is_unique[users.ue]');
		$this->form_validation->set_rules('up', 'Password', 'required');
		$this->form_validation->set_rules('ucp', 'Password Confirmation', 'required|matches[up]');
		$this->form_validation->set_message('is_unique', 'This Email Id is already registered. Please login to continue.');

		$data = [
			'un' => $un,
			'ue' => $ue,
			'up' => md5($up)
		];

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {

			if ($this->hm->setUser($data)) {
				$this->session->set_flashdata('regsuccess', 'Registration Successfull! Login to continue.');
				$this->load->view('login');
			}
			
		}
	}

	public function logout(){
		$this->session->unset_userdata('token');
		redirect('home','refresh');
	}

	public function getMsgs(){
		$result = $this->hm->getMsg();
		json_output($result);
	}
	public function getLastMsgs(){
		$result = $this->hm->getLastMsg();
		json_output($result);
	}

	public function checkMsgs(){
		$result = $this->hm->checkNewMsg();
		json_output($result);
	}

	public function sayhi(){
		$data = [
			'uid' => $this->session->userdata['uid']
		];
		$result = $this->hm->setMsg($data);
		json_output($result);
	}

}
