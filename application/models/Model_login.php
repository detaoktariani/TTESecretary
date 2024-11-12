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
                'foto' => $row->foto,
                // 'logged_in' => TRUE // Adding a flag to check login status
            );
            $this->session->set_userdata($data);
            return TRUE;
        }
        return FALSE;
    }
}


