<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent ::__construct();
    }

	public function index() {
		
		$this->call_main('home.php');
	}

	public function call_main($view, $data = NULL) {
		$this->load->view('main/header');
		$this->load->view($view, $data);
	}
}
