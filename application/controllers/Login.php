<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	 public function index() {
		if ($this->session->userdata('logged_in')==TRUE) {
            // Mendapatkan level pengguna dari session
            $userLevel = $this->session->userdata('level');

            // Redirect ke halaman sesuai level pengguna
            switch ($userLevel) {
                case '1':
                    redirect('Admin/Welcome'); // Admin
                    break;
                case '2':
                    redirect('Admin/Staff'); // Staff
                    break;
                case '3':
                    redirect('Admin/Kasub'); // Kasub
                    break;
                case '4':
                    redirect('Admin/Kabag'); // Kabag
                    break;
                case '5':
                    redirect('Admin/Sekretaris'); // Sekretaris
                    break;
                default:
                    redirect('login'); // Jika tidak ada level yang sesuai
                    break;
            }
        } else {
            // Jika session tidak ada, arahkan ke halaman login
            $this->load->view('Vlogin');
        }
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
				log_user_activity($user, "Login admin");
				redirect('Admin/Welcome');
			}else if ($this->session->userdata('level')=='2') {
				log_user_activity($user, "Login staff");
				redirect('Staff/Staff/index');
			}else if ($this->session->userdata('level')=='3') {
				log_user_activity($user, "Login Kasub");
				redirect('Kasub/index');
			}else if ($this->session->userdata('level')=='4') {
				log_user_activity($user, "Login Kabag");
				redirect('Kabag/index');
			}else if ($this->session->userdata('level')=='5') {
				log_user_activity($user, "Login Sekretaris");
				redirect('Sekretaris/index');			
			}else{
				log_user_activity($user, "gagal login");
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
