<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function masuk($username, $password) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $data = array(
                'id' => $row->id,
                'username' => $row->username,
                'password' => $row->password,  // Updated key
                'nama' => $row->nama,
                'level' => $row->level,
                'id_jabatan' => $row->id_jabatan,
                'logged_in' => TRUE // Adding a flag to check login status
            );
            $this->session->set_userdata($data);
            return TRUE;
        }
        return FALSE;
    }

    public function getDataKey(){
        $this->db->select('*');
        $this->db->from('datakey');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cek_pwlama($id, $pwlama) {
        $this->db->select('password');
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        $result = $query->row();

        if ($result->password==$pwlama){
            return true;
        }else return false;
    }

    public function update_password($id, $pwbaru) {
        $this->db->where('id', $id);
        return $this->db->update('user', ['password' => md5($pwbaru)]);
    }

    public function securityAdmin(){
        $level = $this->session->userdata('level');
        if($level!='1'){
            $this->session->sess_destroy();
            redirect('');
        }
    }

    public function securityStaff(){
        $level = $this->session->userdata('level');
        if($level!='2'){
            $this->session->sess_destroy();
            redirect('');
        }
    }

    public function securityKasub(){
        $level = $this->session->userdata('level');
        if($level!='3'){
            $this->session->sess_destroy();
            redirect('');
        }
    }

    public function securityKabag(){
        $level = $this->session->userdata('level');
        if($level!='4'){
            $this->session->sess_destroy();
            redirect('');
        }
    }

    public function securitySes(){
        $level = $this->session->userdata('level');
        if($level!='5'){
            $this->session->sess_destroy();
            redirect('');
        }
    }

}





