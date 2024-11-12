<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk menambah log aktivitas ke dalam database
    public function log_activity($data) {
        return $this->db->insert('user_activity_log', $data);
    }
}