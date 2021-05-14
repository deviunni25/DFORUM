<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class usershome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
        $this->load->model('M_questions');
		auth_check();
	}

	public function index() {
        $data['category'] = $this->M_questions->list_categories();
		$this->load->view('users/_layouts/header', $data);
		$this->load->view('users/home', $data);
		$this->load->view('users/_layouts/footer');
	}

	public function show_questions_and_answers($category) {
        $this->load->model('M_questions');
		$category = magicfunction($category,'d');
        $data['question'] = ($category == 0)? $this->M_questions->list_questions():$this->M_questions->list_questions_by_category($category);
		$this->load->view('users/ajax/questions_and_answers', $data);
	}

	public function show_questions_and_answers_by_category() {
        $this->load->model('M_questions');

        $data['question'] = $this->M_questions->list_questions_by_category();
		$this->load->view('users/ajax/questions_and_answers', $data);
	}

	public function save_answer() {
        $this->load->model('M_questions');

        $arr = $this->input->post();
        $arr['quest_id'] = magicfunction($arr['quest_id'],'d');
        $arr['added_by'] = magicfunction($this->session->userdata('user_id'),'d');
        $arr['status'] = '1';
        $result = $this->M_questions->add_answer($arr);
	}	
	
	public function save_question() {
        $this->load->model('M_questions');

        $arr = $this->input->post();
        $arr['category_id'] = magicfunction($arr['category_id'],'d');
        $arr['asked_by'] =  magicfunction($this->session->userdata('user_id'),'d');
        $arr['status'] = '1';
        $result = $this->M_questions->add_question($arr);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */