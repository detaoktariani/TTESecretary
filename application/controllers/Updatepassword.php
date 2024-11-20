<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatepassword extends CI_Controller {
	function __construct(){
        parent::__construct();
    }

	public function index(){
		{
	
      $data = array(
        'judul' => 'Update Password',
        'html'  => 'Updatepassword',
        );
        $this->load->view('Dashboard', $data);
      }}
    
      public function change_password() {
        $this->form_validation->set_rules('pwlama', 'Password Lama', 'required');
        $this->form_validation->set_rules('pwbaru', 'Password Baru', 'required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[pwbaru]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal
            $this->session->set_flashdata('error', 'Pastikan password yang diinput sama');
            redirect('Updatepassword/index');
        } else {
            // Ambil input
            $id = $this->session->userdata('id'); // Ambil user ID dari sesi
            $pwlama = md5($this->input->post('pwlama'));
            $pwbaru = $this->input->post('pwbaru');
            $user = $this->session->userdata('username');

            // Periksa password lama
            if ($this->Model_login->cek_pwlama($id, $pwlama)) {
                if ($this->Model_login->update_password($id, $pwbaru)) {
                    $this->session->set_flashdata('success', 'Password berhasil diperbarui!');
                    log_user_activity($user, "ganti password");
                    redirect('Updatepassword/index');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui password.');
                    log_user_activity($user, "Gagal ganti password");
                    redirect('Updatepassword/index');
                }
            } else {
                $this->session->set_flashdata('error', 'Password lama tidak sesuai.');
                log_user_activity($user, "Salah input password lama");
                redirect('Updatepassword/index');
            }

            
        }
    }
}

    