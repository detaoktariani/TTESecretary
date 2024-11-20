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
    $this->db->order_by('tgl_input', 'DESC');
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

  public function tabelvalidasikasub()
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
    $this->db->order_by('tgl_input', 'DESC');
    $query = $this->db->get();
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

  public function message($id)
  {  
    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->where('id',$id);
    $query = $this->db->get();
    $msg= $query->result_array();
    $tgl= $msg[0]["tgl_surat"];
    $formattedDate = date("d F Y", strtotime($tgl));
    $perihal= $msg[0]["perihal"];
    $message2 = "<p>
            Kepada Bapak/Ibu <br>
            Terdapat surat baru yang perlu divalidasi sebagai berikut <br>
            Tanggal Surat : " . $formattedDate. "<br>
            Perihal : " . $perihal . "<br>
            Mohon untuk segera validasi melalui aplikasi SMSK (https://SMSK.pta-bengkulu.go.id/HAHAHA) <br>
        </p>";
    return $message2;
  }

  public function tabelvalidasikabag()
  {
    $this->db->select('unit_organisasi_id');
    $this->db->from('tbjabatan');
    $this->db->where('supervisor_id',$this->session->userdata('id_jabatan'));
    $query = $this->db->get();
    $ambil= $query->result_array();
    $unor_ids = array_column($ambil, 'unit_organisasi_id');

    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->where_in('unit_organisasi_id', $unor_ids);
    $this->db->order_by('tgl_input', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function tabelvalidasisekretaris()
  {
    $this->db->select('id_jabatan');
    $this->db->from('tbjabatan');
    $this->db->where('supervisor_id',$this->session->userdata('id_jabatan'));
    $query = $this->db->get();
    $idjab= $query->result_array();
    $ids_jab = array_column($idjab, 'id_jabatan');

    $this->db->select('unit_organisasi_id');
    $this->db->from('tbjabatan');
    $this->db->where_in('supervisor_id',$ids_jab);
    $query = $this->db->get();
    $unor= $query->result_array();
    $unor_ids = array_column($unor, 'unit_organisasi_id');

    $this->db->select('*');
    $this->db->from('surat_keluar');
    $this->db->where_in('unit_organisasi_id', $unor_ids);
    $this->db->order_by('tgl_input', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_total_surat_keluar()
  {
      $this->db->from('surat_keluar');
      return $this->db->count_all_results();
  }

  public function grafiksurat($tahun = null)
{
    
    if ($tahun === null) {
        $tahun = date('Y');
    }

    $this->db->select("MONTH(tgl_surat) as bulan, COUNT(*) as total_surat");
    $this->db->from('surat_keluar');
    $this->db->where("YEAR(tgl_surat)", $tahun); 
    $this->db->group_by("MONTH(tgl_surat)"); 
    $this->db->order_by("bulan", "ASC"); 

    $query = $this->db->get();

    return $query->result_array();
}


  public function upload_skeluar() {
    $id = $this->input->post('id'); // Ambil data ID dari input modal
    $config['upload_path']   = './assets/surat_keluar/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = 2048;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file1')) {
        $fileData = $this->upload->data();
        $fileName = $fileData['file_name'];

        // Update data di database
        $data = ['pdfsurat' => $fileName];
        $this->db->where('id', $id);
        $this->db->update('surat_keluar', $data);

        // $this->session->set_flashdata('success', 'File berhasil diunggah.');
    } else {
        // $this->session->set_flashdata('error', $this->upload->display_errors());
    }
}




}