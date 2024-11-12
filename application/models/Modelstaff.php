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
        $notujuanP = 'SKPTA.W7-A';
       }else if($notujuanP== "Panitera") {
        $notujuanP = 'PANPTA.W7-A';
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














}