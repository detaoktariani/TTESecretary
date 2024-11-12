<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function log_user_activity($user, $activity) {
    $CI =& get_instance();
    $CI->load->model('Log');
    
    // Data log yang akan disimpan
    $data = [
        'user_id'    => $user,
        'activity'   => $activity,
        'ip_address' => $CI->input->ip_address(),
        'user_agent' => $CI->input->user_agent()
    ];
    
    // Menyimpan log ke database
    $CI->Log->log_activity($data);
}