<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModelNotif extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function notifadmin()
    {
        $this->db->select('*');
        $this->db->from('surat_keluar');
        $this->db->where('substr(nomor,1,1) =','/');
        $this->db->where('statusvalidasi',3);
        $this->db->order_by('tgl_input', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function notifstaf()
    {
        $this->db->select('unit_organisasi_id');
        $this->db->from('tbjabatan');
        $this->db->where('id_jabatan',$this->session->userdata('id_jabatan'));
        $query = $this->db->get();
        $ambil= $query->result_array();
        $unor_id =$ambil[0]["unit_organisasi_id"];

        $this->db->select('*');
        $this->db->from('surat_keluar');
        $this->db->where('substr(nomor,1,1) !=','/');
        $this->db->where('length(pdfsurat) <',1);
        $this->db->where('unit_organisasi_id',$unor_id);
        $this->db->order_by('tgl_input', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function notifkasub()
    {
        $this->db->select('unit_organisasi_id');
        $this->db->from('tbjabatan');
        $this->db->where('id_jabatan',$this->session->userdata('id_jabatan'));
        $query = $this->db->get();
        $ambil= $query->result_array();
        $unor_id =$ambil[0]["unit_organisasi_id"];

        $this->db->select('*');
        $this->db->from('surat_keluar');
        $this->db->where('statusvalidasi',0);
        $this->db->where('unit_organisasi_id',$unor_id);
        $this->db->order_by('tgl_input', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function notifkabag()
    {
        $this->db->select('unit_organisasi_id');
        $this->db->from('tbjabatan');
        $this->db->where('supervisor_id',$this->session->userdata('id_jabatan'));
        $query = $this->db->get();
        $ambil= $query->result_array();
        $unor_ids = array_column($ambil, 'unit_organisasi_id');

        $this->db->select('*');
        $this->db->from('surat_keluar');
        $this->db->where('statusvalidasi',1);
        $this->db->where_in('unit_organisasi_id', $unor_ids);
        $this->db->order_by('tgl_input', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function notifses()
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
        $this->db->where('statusvalidasi',2);
        $this->db->where_in('unit_organisasi_id', $unor_ids);
        $this->db->order_by('tgl_input', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

}