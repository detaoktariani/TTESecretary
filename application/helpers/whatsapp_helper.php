<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('send_wa_message')) {
    function send_wa_message($phone, $message) {
        $CI =& get_instance();
        $CI->load->model('Model_login');
        $usernamewa = $CI->Model_login->getDataKey();
        $sckeywa = $usernamewa[0]['sc_key'];
        $sckeywa = base64_decode($sckeywa);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://jogja.wablas.com/api/send-message', [
            'headers' => [
                'Authorization' => $sckeywa,
            ],
            'form_params' => [
                'phone' => $phone,
                'message' => $message,
                'spintax' => "true",
            ]
        ]);

        return $response->getStatusCode();
    }
}
