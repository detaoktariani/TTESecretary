<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelstaff extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    function insert_suratkeluar(){

      $tgl_input =date("Y-m-d");
      $notujuanP = $this->input->post('ttdpejabat');
      if ($notujuanP== "Ketua"){
        $notujuanP = 'KPTA.W7-A';
       }else if($notujuanP== "Wakil") {
        $notujuanP = 'WKPTA.W7-A';
       }else if($notujuanP== "Sekretaris") {
        $notujuanP = 'SEK.PTA.W7-A';
       }else if($notujuanP== "Panitera") {
        $notujuanP = 'PAN.PTA.W7-A';
       }
      $nomorfx = '/'. $notujuanP . '/' .$this->input->post('kode') . '/' .$this->input->post('bulan') .'/' .$this->input->post('tahun');
      // $this->db->set('uid', 'UUID()', FALSE);
        $data=array(
            // 'id_pa'        => $this->session->userdata('id_instansi'),
            'nomor'        => $nomorfx,
            'kode'         => $this->input->post('kode'),
            'jenis'        => $this->input->post('jenis'),
            'perihal'      => $this->input->post('perihal'),
            'tgl_surat'    => $this->input->post('tgl_surat'),
            'tujuan'       => $this->input->post('tujuan'),
            'ttdpejabat'   => $this->input->post('ttdpejabat'),
            'linksurat'    => $this->input->post('linksurat'),
            'id_suratmasuk'=> '',
            'kriteria'     => '',
            'id_user'      => $this->session->userdata('id'),
            'tgl_input'    => $tgl_input
            );
         
  
    $this->db->insert('surat_keluar', $data);
    return TRUE;
 
  }

  public function tabelsuratkeluar()
  {
      $query = $this->db->get('surat_keluar');
      return $query->result();
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

  function tedit_suratkeluar($id){
    $this->db->select('*');
   $this->db->from('suratkeluar');
   $this->db->where('id',$id);
   $query = $this->db->get();
   return $query->result_array();
  }

  function edit_suratkeluar($id){
    $this->db->select('*');
   $this->db->from('suratkeluar');
   $this->db->where('id',$id);
   $query = $this->db->get();
   return $query->result_array();
  }







}