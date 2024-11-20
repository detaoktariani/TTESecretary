<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use GuzzleHttp\Client;

class Admin extends CI_Controller {

	
     public function __construct() {
        parent::__construct();
		$this->Model_login->securityAdmin();
    }
    
	public function Welcome()
	{
		$data = array(
			'judul' => 'Dashboard',
			'html'  => 'Admin/Dashboard',
			'Total'  => $this->Modelstaff->get_total_surat_keluar(),
        	'Grafik' => $this->Modelstaff->grafiksurat(2024),
		  );
		  $this->load->view('Dashboard', $data);
	}

	public function tabelsuratkeluar(){
		{
		  $data = array(
			'judul' => 'Tabel surat keluar',
			'html'  => 'Admin/SuratKeluar',
			'data'  => $this->Modelstaff->suratkeluarAdm()
				);
			$this->load->view('Dashboard', $data);
		}
	  }
	

	public function update_nomor(){
		$id = $this->input->post('id');
		$field = $this->input->post('field');
		$value = $this->input->post('value');
		
		$this->Modelstaff->update_nomor($id, $field, $value);
		
		$user = $this->session->userdata('username');  // Sesuaikan dengan cara Anda mengambil user_id
		$activity = "Update nomor surat $value";
		log_user_activity($user, $activity);

		echo json_encode(['status' => 'success']);
	}
}
