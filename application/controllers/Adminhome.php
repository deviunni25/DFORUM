<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class adminhome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		auth_check();

	}

	public function index() {
	
		$this->load->view('admin/_layouts/header');
		$this->load->view('admin/home');
		$this->load->view('admin/_layouts/footer');
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */