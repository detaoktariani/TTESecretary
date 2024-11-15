<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasub extends CI_Controller {
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
            $this->Modelstaff->updateValidasiKasub($id_surat);
            $this->session->set_flashdata('message', 'Surat berhasil divalidasi.');
            redirect('Kasub/tabelvalidasi');
        }
        $data = array(
            'judul' => 'Tabel Validasi Surat',
            'html'  => 'Kasub/Tabelvalidasi',
            'data'  => $this->Modelstaff->tabelvalidasi()
        );
        $this->load->view('Dashboard', $data);
    }  
          
}
