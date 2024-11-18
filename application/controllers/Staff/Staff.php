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
    $message2 = "<p>
      Kepada Bapak/Ibu <br>
      Terdapat surat baru yang perlu divalidasi sebagai berikut <br>
      Tanggal Surat : ".$this->input->post('tgl_surat')."<br>
      Perihal : ".$this->input->post('perihal')."<br>
      Mohon untuk segera validasi melalui aplikasi SMSK (https://SMSK.pta-bengkulu.go.id/HAHAHA) <br>
      </p>";
    $res = $this->Modelstaff->insert_suratkeluar();   
    if($res>=1){
      $user = $this->session->userdata('username');
      log_user_activity($user, "input surat keluar");
      $this->post_WA($phone2, $message2);
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

  public function post_WA($phone2, $message2)
  {
      $usernamewa = $this->Model_login->getDataKey();
      $sckeywa = $usernamewa[0]['sc_key'];
      $sckeywa = base64_decode($sckeywa);
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST','https://jogja.wablas.com/api/send-message',
      [
          'headers' => [
              'Authorization' => $sckeywa,
          ],
          'form_params' => [
              'phone' => $phone2,
              'message' => $message2,
              'spintax' => "true",
              ]
      ]
      );
      $status = $response->getStatusCode();
      if($status == 200)
      {
      }
    }


}
