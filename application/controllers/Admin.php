<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use GuzzleHttp\Client;

class Admin extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
     public function __construct() {
        parent::__construct();
    }
    
	public function Welcome()
	{
		$data = array(
			'judul' => 'Dashboard',
			'html'  => 'Staff/Dashboard',
		  );
		  $this->load->view('Dashboard', $data);
	}

	public function Staff()
	{
	
		$data = array(
			'judul' => 'Dashboard',
			'html'  => 'Staff/Dashboard',
		  );
		  $this->load->view('Dashboard', $data);
	}

	public function Kasub()
	{
	
		$data = array(
			'judul' => 'Dashboard',
			'html'  => 'Kasub/Dashboard',
		  );
		  $this->load->view('Dashboard', $data);
	}
	
	public function Kabag()
	{
	
		$data = array(
			'judul' => 'Dashboard',
			'html'  => 'Kabag/Dashboard',
		  );
		  $this->load->view('Dashboard', $data);
	}

	public function Sekretaris()
	{
	
		$data = array(
			'judul' => 'Dashboard',
			'html'  => 'Sekretaris/Dashboard',
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
	

	public function update_nomor()
{
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
