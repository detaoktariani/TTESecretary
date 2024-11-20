<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelsuper extends CI_Model {
    public function __construct() {
        parent::__construct();
    }


    function insert_pengguna(){
          $data=array(
              'username'     => $this->input->post('username'),
              'password'     => md5($this->input->post('password')),
              'nama'         => $this->input->post('nama'),
              'nohp'         => $this->input->post('nohp'),
              'level'        => $this->input->post('level'),
              'id_jabatan'   => $this->input->post('id_jabatan'),
              'status'       => $this->input->post('status')
              );
      $this->db->insert('user', $data);
      return TRUE;
    }

    function tedit_datapengguna($id){
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('id',$id);
      $query = $this->db->get();
      return $query->result_array();
    }

    function edit_datapengguna($id){
        $data=array(
            'username'     => $this->input->post('username'),
            'password'     => md5($this->input->post('password')),
            'nama'         => $this->input->post('nama'),
            'nohp'         => $this->input->post('nohp'),
            'level'        => $this->input->post('level'),
            'id_jabatan'   => $this->input->post('id_jabatan'),
            'status'       => $this->input->post('status')
            );
        $this->db->set($data);
        $this->db->update('user', $this, array('id' => $id));
        return TRUE;
      }

  public function delete_datapengguna($id){
    $this->db->delete('user', array('id' => $id));
    return true;
  }

  public function tabeldatapengguna()
  {  
    $this->db->select('*');
    $this->db->from('user');
    $query = $this->db->get();
    return $query->result();
  }

}