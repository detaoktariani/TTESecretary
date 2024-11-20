<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->Model_login->securitySuper();
    }

	public function index(){

      $data = array(
        'judul' => 'Input data pengguna',
        'html'  => 'Super/Dashboard',
        'Total'  => $this->Modelstaff->get_total_surat_keluar(),
        'Grafik' => $this->Modelstaff->grafiksurat(2024),
        );
        $this->load->view('Dashboard', $data);
      }

      public function tampilforminput(){
        {
          $data = array(
            'judul' => 'Input data pengguna',
            'html'  => 'Super/Inputdatapengguna',
            );
            $this->load->view('Dashboard', $data);
        }
      }

      public function inputdata(){
        $res = $this->Modelsuper->insert_pengguna();   
        if($res>=1){
          $user = $this->session->userdata('username');
          log_user_activity($user, "input data pengguna");
          $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('Super/Tabeldatapengguna');
        }else{
          $user = $this->session->userdata('username');
          log_user_activity($user, "Gagal input data pengguna");
          $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal ditambah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('Super/Tabeldatapengguna');    
        }
      }
      
      public function tabeldatapengguna(){
        {
          $data = array(
            'judul' => 'Tabel data pengguna',
            'html'  => 'Super/Tabeldatapengguna',
            'data'  => $this->Modelsuper->tabeldatapengguna()
                );
                $this->load->view('Dashboard', $data);
        }
      }

      public function editpengguna(){
        $id=$this->input->get('id');
        $data = array(
          'judul' => 'Edit data pengguna',
          'html'  => 'Super/Editdatapengguna',
          'data'  => $this->Modelsuper->tedit_datapengguna($id),
          );
          $this->load->view('Dashboard', $data);
      }

      public function eddatapengguna(){
        $id = $this->input->post('id');
        $res = $this->Modelsuper->edit_datapengguna($id);   
        if($res>=1){
          $user = $this->session->userdata('username');
          log_user_activity($user, "edit data pengguna");
          $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diperbarui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('Super/Tabeldatapengguna');
        }else{
          $user = $this->session->userdata('username');
          log_user_activity($user, "gagal edit data pengguna");
          $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal diperbarui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('Super/Tabeldatapengguna');    
        }
      }

      public function hapusdatapengguna(){
        $id = $this->input->get('id');
        $res = $this->Modelsuper->delete_datapengguna($id);   
        if($res>=1){
          $user = $this->session->userdata('username');
          log_user_activity($user, "Berhasil hapus data pengguna");
          $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('Super/Tabeldatapengguna');
        }else{
          $user = $this->session->userdata('username');
          log_user_activity($user, "Gagal hapus data pengguna");
          $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('Super/Tabeldatapengguna');    
        }
      }
          
}
