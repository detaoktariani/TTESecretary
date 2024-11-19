<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekretaris extends CI_Controller {
	function __construct(){
        parent::__construct();
    }

	public function index(){
		{
	
      $data = array(
        'judul' => 'Input surat keluar',
        'html'  => 'Staff/Dashboard',
        );
        $this->load->view('Dashboard', $data);
      }}

      public function tabelvalidasi() {
        if ($this->input->post('id')) {
            $id_surat = $this->input->post('id');
            $this->load->model('Modelstaff');
            $this->Modelstaff->updateValidasiSekretaris($id_surat);
            $user = $this->session->userdata('username');
            log_user_activity($user, "valdasi sekretaris surat dengan id $id_surat");
            $this->session->set_flashdata('message', 'Surat berhasil divalidasi.');
            redirect('Sekretaris/tabelvalidasi');
        }
        $data = array(
            'judul' => 'Tabel Validasi Surat',
            'html'  => 'Sekretaris/Tabelvalidasi',
            'data'  => $this->Modelstaff->tabelvalidasisekretaris()
        );
        $this->load->view('Dashboard', $data);
    }  
          
}
