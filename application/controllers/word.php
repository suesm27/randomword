<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Word extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$data = array(
			'counter' => 1,
			'word' => ''
			);
		$this->load->view('word/randomword', $data);
	}

	public function getWord(){
		if($this->session->userdata('counter')){
			$counter = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $counter++);
		}
		// else{
		// 	$this->session->set_userdata('counter', 1);
		// }
		$data = array(
			'counter' => $this->session->userdata['counter'],
			'word' => $this->generateRandomString()
			);
		$this->load->view('word/randomword', $data);
	}

	public function generateRandomString($length = 14) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
		}
}

//end of main controller