<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelstaff extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    function insert_suratkeluar(){

      $this->db->select('unit_organisasi_id');
      $this->db->from('tbjabatan');
      $this->db->where('id_jabatan',$this->session->userdata('id_jabatan'));
      $query = $this->db->get();
      $ambil= $query->result_array();
      $unor_id =$ambil[0]["unit_organisasi_id"];

      $tgl_input =date("Y-m-d");
      $notujuanP = $this->input->post('id_jabatan');
      if ($notujuanP== "8"){
        $notujuanP = 'KPTA.W7-A';
       }else if($notujuanP== "9") {
        $notujuanP = 'WKPTA.W7-A';
       }else if($notujuanP== "1") {
        $notujuanP = 'SEK.PTA.W7-A';
       }else if($notujuanP== "10") {
        $notujuanP = 'PAN.PTA.W7-A';
       }
      $nomorfx = '/'. $notujuanP . '/' .$this->input->post('kode') . '/' .$this->input->post('bulan') .'/' .$this->input->post('tahun');
        $data=array(
            'nomor'        => $nomorfx,
            'kode'         => $this->input->post('kode'),
            'jenis'        => $this->input->post('jenis'),
            'perihal'      => $this->input->post('perihal'),
            'tgl_surat'    => $this->input->post('tgl_surat'),
            'tujuan'       => $this->input->post('tujuan'),
            'id_jabatan'   => $this->input->post('id_jabatan'),
            'linksurat'    => $this->input->post('linksurat'),
            'id_suratmasuk'=> '',
            'kriteria'     => '',
            'id_user'      => $this->session->userdata('id'),
            'tgl_input'    => $tgl_input,
            'unit_organisasi_id'    => $unor_id
            );
         
  
    $this->db->insert('surat_keluar', $data);
    return TRUE;
 
  }

  public function tabelsuratkeluar()
  {  
    $this->db->select('unit_organisasi_id');
    $this->db->from('tbjabatan');
    $this->db->where('id_jabatan',$this->session->userdata('id_jabatan'));
    $query = $this->db->get();
    $ambil= $query->result_array();
    $unor_id =$ambil[0]["unit_organisasi_id"];

    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->where('unit_organisasi_id',$unor_id);
    $query = $this->db->get();
    return $query->result();
  }

  function tedit_suratkeluar($id){
    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result_array();
  }

  function edit_suratkeluar($id){
    $notujuanP = $this->input->post('id_jabatan');
      if ($notujuanP== "8"){
        $notujuanP = 'KPTA.W7-A';
       }else if($notujuanP== "9") {
        $notujuanP = 'WKPTA.W7-A';
       }else if($notujuanP== "1") {
        $notujuanP = 'SEK.PTA.W7-A';
       }else if($notujuanP== "10") {
        $notujuanP = 'PAN.PTA.W7-A';
       }
       $nomorfx = '/'. $notujuanP . '/' .$this->input->post('kode') . '/' .$this->input->post('bulan') .'/' .$this->input->post('tahun');
    $data = array(
      'nomor'        => $nomorfx,
      'kode'         => $this->input->post('kode'),
      'jenis'        => $this->input->post('jenis'),
      'perihal'      => $this->input->post('perihal'),
      'tgl_surat'    => $this->input->post('tgl_surat'),
      'tujuan'       => $this->input->post('tujuan'),
      'id_jabatan'   => $this->input->post('id_jabatan'),
      'linksurat'    => $this->input->post('linksurat'),
    );
    $this->db->set($data);
    $this->db->update('surat_keluar', $this, array('id' => $id));
    return TRUE;
  }

  public function delete_suratkeluar($id)
  {
    $this->db->delete('surat_keluar', array('id' => $id));
    return true;
  }

  public function getDataKey()
  {
    $this->db->select('*');
    $this->db->from('datakey');
    $query = $this->db->get();
    return $query->result_array();
  }

  function check_pnumber(){
    $this->db->select('supervisor_id');
    $this->db->from('tbjabatan');
    $this->db->where('id_jabatan',$this->session->userdata('id_jabatan'));
    $query = $this->db->get();
    $ambil= $query->result_array();

    $this->db->select('nohp');
    $this->db->from('user');
    $this->db->where('id_jabatan',$ambil[0]["supervisor_id"]);
    $query = $this->db->get();
    $nohp= $query->result_array();
    $a= $nohp[0]["nohp"];
    return $a;
  }

  public function tabelvalidasi()
  {
      $query = $this->db->get('surat_keluar');
      return $query->result();
  }

  public function updateValidasiKasub($id) {
    $this->db->where('id', $id);
    return $this->db->update('surat_keluar', array('statusvalidasi' => 1));
  }
  public function updateValidasiKabag($id) {
    $this->db->where('id', $id);
    return $this->db->update('surat_keluar', array('statusvalidasi' => 2));
  } 
  public function updateValidasiSekretaris($id) {
    $this->db->where('id', $id);
    return $this->db->update('surat_keluar', array('statusvalidasi' => 3));
  }

  public function update_nomor($id, $field, $value)
  {
      $this->db->where('id', $id);
      $this->db->update('surat_keluar', [$field => $value]);
  }

  public function suratkeluarAdm()
  {  
    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->where('statusvalidasi',3);
    $query = $this->db->get();
    return $query->result();
  }



}