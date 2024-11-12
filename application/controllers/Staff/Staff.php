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
        );
        $this->load->view('Dashboard', $data);
      }}

  public function tabelsuratkeluar(){
    {
      
      $data = array(
        'judul' => 'Tabel surat keluar',
        'html'  => 'Staff/Tabelsuratkeluar',
        'data'  => $this->Modelstaff->tabelsuratkeluar()
            );
            $this->load->view('Dashboard', $data);
          }}    
}
