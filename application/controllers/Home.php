<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
    }

	public function index(){
		// $data=array(
        //     'isi' 	=> 'HomeAdmin',
        //     'data'	=> $this->ModelPTA->data(),
		// 	'PA'	=> $this->ModelPTA->PA(),
		// 	'faq'	=> $this->ModelPTA->faq()
        // );
		// $this->load->view('Home', $data);
		$this->load->view('Welcome');
	}
}
