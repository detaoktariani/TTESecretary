<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	function __construct(){
        parent::__construct();
    }

	public function index(){
	
      $data = array(
        'judul' => 'Input surat keluar',
        'html'  => 'Staff/Inputsuratkeluar',
        );
        $this->load->view('Dashboard', $data);
  }

  public function insuratkeluar(){
    // $idinstansi=$this->input->post('nama_suami');
    $res = $this->Modelstaff->insert_suratkeluar();   
    if($res>=1){
      log_user_activity($user, "Input surat");
      $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tabelsuratkeluar');
    }else{
      log_user_activity($user, "Gagal input surat");
      $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/index');    
    }
  }

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
