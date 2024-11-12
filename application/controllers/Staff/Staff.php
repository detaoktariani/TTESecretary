<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	function __construct(){
        parent::__construct();
    }

	public function index(){
		{
	
      $data = array(
        'judul' => 'Input surat keluar',
        'html'  => 'Staff/Inputsuratkeluar',
        'data'  => $this->Modelstaff->inputsuratkeluar()
        );
        $this->load->view('Dashboard', $data);
      }}
}
