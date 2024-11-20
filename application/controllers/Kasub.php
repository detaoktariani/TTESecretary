<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasub extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->Model_login->securitykasub();
    }

	public function index(){
        $data = array(
			'judul' => 'Dashboard',
			'html'  => 'Kasub/Dashboard',
			'Total'  => $this->Modelstaff->get_total_surat_keluar(),
			'Grafik' => $this->Modelstaff->grafiksurat(2024),
		  );
		  $this->load->view('Dashboard', $data);
        }

      public function tabelvalidasi() {
        if ($this->input->post('id')) {
            $id_surat = $this->input->post('id');
            $this->load->model('Modelstaff');
            $this->Modelstaff->updateValidasiKasub($id_surat);
            $phone2 = $this->Modelstaff->check_pnumber();
            $message2= $this->Modelstaff->message($id_surat);
            $status = send_wa_message($phone2, $message2);
            if ($status == 200) {
                $this->session->set_flashdata('message', 'WA berhasil dikirim.');
            } else {
                $this->session->set_flashdata('message', 'Gagal mengirim WA.');
            }
            $user = $this->session->userdata('username');
            log_user_activity($user, "valdasi kasub surat dengan id $id_surat");
            $this->session->set_flashdata('message', 'Surat berhasil divalidasi.');
            redirect('Kasub/tabelvalidasi');
        }
        $data = array(
            'judul' => 'Tabel Validasi Surat',
            'html'  => 'Kasub/Tabelvalidasi',
            'data'  => $this->Modelstaff->tabelvalidasikasub()
        );
        $this->load->view('Dashboard', $data);
    }  
          
}
