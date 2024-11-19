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
    $phone2 = $this->Modelstaff->check_pnumber();
    $tgl = $this->input->post('tgl_surat');
    $formattedDate = date("d F Y", strtotime($tgl));
    $message2 = "<p>
            Kepada Bapak/Ibu <br>
            Terdapat surat baru yang perlu divalidasi sebagai berikut <br>
            Tanggal Surat : " . $formattedDate . "<br>
            Perihal : " . $this->input->post('perihal') . "<br>
            Mohon untuk segera validasi melalui aplikasi SMSK (https://SMSK.pta-bengkulu.go.id/HAHAHA) <br>
        </p>";
            
    $res = $this->Modelstaff->insert_suratkeluar();   
    if($res>=1){
     $user = $this->session->userdata('username');
      log_user_activity($user, "input surat keluar");
      $status = send_wa_message($phone2, $message2);
        if ($status == 200) {
          $this->session->set_flashdata('message', 'WA berhasil dikirim.');
          } else {
            $this->session->set_flashdata('message', 'Gagal mengirim WA.');
          }
      $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tabelsuratkeluar');
    }else{
      $user = $this->session->userdata('username');
      log_user_activity($user, "Gagal input surat keluar");
      $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/index');    
    }
  }

  public function tabelsuratkeluar(){
      $data = array(
        'judul' => 'Tabel surat keluar',
        'html'  => 'Staff/Tabelsuratkeluar',
        'data'  => $this->Modelstaff->tabelsuratkeluar()
            );
            $this->load->view('Dashboard', $data);
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

    $id = $this->input->post('id');
    $res = $this->Modelstaff->edit_suratkeluar($id);   
    if($res>=1){
      $user = $this->session->userdata('username');
      log_user_activity($user, "edit surat keluar");
      $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tabelsuratkeluar');
    }else{
      $user = $this->session->userdata('username');
      log_user_activity($user, "gagal edit surat keluar");
      $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tampedsuratkeluar');    
    }
  }

  public function hapussuratkeluar(){
    $id = $this->input->get('id');
    $res = $this->Modelstaff->delete_suratkeluar($id);   
    if($res>=1){
      $user = $this->session->userdata('username');
      log_user_activity($user, "Berhasil hapus surat keluar");
      $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tabelsuratkeluar');
    }else{
      $user = $this->session->userdata('username');
      log_user_activity($user, "Gagal hapus surat keluar");
      $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Staff/Staff/tabelsuratkeluar');    
    }
  }

  


}
