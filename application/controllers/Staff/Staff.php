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
    $res = $this->Modelstaff->insert_suratkeluar();   
    if($res>=1){
      $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tabelsuratkeluar');
    }else{
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
    }
  }

  public function tampedsuratkeluar(){
    $id=$this->input->get('id');
    $data = array(
      'judul' => 'Edit surat keluar',
      'html'  => 'Staff/Editsuratkeluar',
      'data'  => $this->Modelstaff->tedit_suratkeluar($id),
      );
      $this->load->view('Dashboard', $data);
  }

  public function edsuratkeluar(){
    $res = $this->Modelstaff->edit_suratkeluar();   
    if($res>=1){
      $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tabelsuratkeluar');
    }else{
      $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tampedsuratkeluar');    
    }
  }


}
