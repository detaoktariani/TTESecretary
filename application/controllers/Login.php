<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	 public function index() {
	 	$this->load->view('Vlogin');
	 }

	function auth(){
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$login = $this->Model_login->masuk($user, $pass);
			
			if ($login == FALSE) {
				$this->session->set_flashdata('error','Username dan password salah!');
                // echo "data salah";
				redirect('Login/index');
			} else if ($this->session->userdata('level')=='1') {
				redirect('Admin/Welcome');
			}else if ($this->session->userdata('level')=='2') {
				redirect('Admin/Staff');
			}else if ($this->session->userdata('level')=='3') {
				redirect('Admin/Kasub');
			}else if ($this->session->userdata('level')=='4') {
				redirect('Admin/Kabag');
			}else if ($this->session->userdata('level')=='5') {
				redirect('Admin/Sekretaris');			
			}else{
				redirect('Login/index');
			}
			
		} else {
			$this->session->set_flashdata('error','Username dan password salah!');
			redirect('Login/index');
		}
	}
	
	function pass(){
		echo md5("12345");
	}

	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->sess_destroy();
		redirect('Login','refresh');
	}
}
