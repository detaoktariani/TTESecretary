<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function log_user_activity($user, $activity) {
    $CI =& get_instance();
    
    // Data log yang akan disimpan
    $data = [
        'user_id'    => $user,
        'activity'   => $activity,
        'ip_address' => $CI->input->ip_address(),
        'user_agent' => $CI->input->user_agent()
    ];
    
    // Menyimpan log ke database
    $CI->Model_log->log_activity($data);
}
