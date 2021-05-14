<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->helper('captcha');
		//auth_check();
	}

    public function index(){
	

		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('login');
		} else {
			redirect('Home');
		}    
    }

 		public function signup(){
		
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('register');
		} else {
			redirect('Home');
		}    
    }

    public function login(){

   

	$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
	$this->form_validation->set_rules('password', 'Password', 'required');

	if ($this->form_validation->run() == TRUE) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		$data = $this->M_auth->login($username, $password);
		//print_r($data);
		//exit();

		if ($data == false) {
			$this->session->set_flashdata('error_msg', 'Username or Password is wrong.');
			redirect('Auth');
		} else {
			$token = rand(100000,9999999);
			$tokenEnc = md5($token);
			$session = [
				'user_id' => magicfunction($data->id,'e'),
				'user_type_display' =>$data->user_type,
				'user_name' =>$data->user_name,
				'enc_token' => $tokenEnc,
				'userdata' => $data,
				'login_status' => "Logged in"
			];
			$this->session->set_userdata($session);

			if($data->user_type == '1')
			 	redirect('adminhome?sec_token='.$tokenEnc);
			else
				redirect('users/usershome?sec_token='.$tokenEnc);

		}
	} else {
		$this->session->set_flashdata('error_msg', validation_errors());
		redirect('Auth');
	    }
    }

    public function register(){


	$this->form_validation->set_rules('user_name', 'Username', 'required|min_length[4]|max_length[15]');
	$this->form_validation->set_rules('password', 'Password', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	$this->form_validation->set_rules('contact_no', 'Phone Number', 'required|numeric|min_length[7]|max_length[10]');

	if ($this->form_validation->run() == TRUE) {

		$arr = $this->input->post();

		$arr['password'] = md5($arr['password']);
		$arr['user_type'] = '2';
		$data = $this->M_auth->register($arr);
		$user_id = $this->db->insert_id(); 


		$uss = (object)$arr;

		
		

		if ($data == false) {
			$this->session->set_flashdata('error_msg', 'Registeration may have failed');
			redirect('Auth');
		} else {
			$token = rand(100000,9999999);
			$tokenEnc = md5($token);
			$session = [
				'user_id' => magicfunction($user_id,'e'),
				'user_type_display' =>$data->user_type,
				'user_name' =>$data->user_name,
				'enc_token' => $tokenEnc,
				'userdata' => $uss,
				'login_status' => "Logged in"
			];
			$this->session->set_userdata($session);
			redirect('users/usershome?sec_token='.$tokenEnc);
		}
	} else {
		$this->session->set_flashdata('error_msg', validation_errors());
		redirect('Auth/signup');
	    }
    }
 

	public function change_profile(){
		$this->form_validation->set_rules('user_name', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contact_no', 'Phone Number', 'required|numeric|min_length[7]|max_length[10]');

		if ($this->form_validation->run() == TRUE) {
			$arr = $this->input->post();
			$arr['password'] = md5($arr['password']);
			$user_id = magicfunction($arr['user_id_enc'],'d');
			unset($arr['user_id_enc']);
			$data = $this->M_auth->update($arr,$user_id) ? '1' : '0';

			echo $data;
		}
	}
    public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}


    
}