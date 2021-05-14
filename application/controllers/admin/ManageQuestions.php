<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manageQuestions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		auth_check();

		$this->load->library('grocery_CRUD');
	}

    
    public function index()
    {

        $crud = new grocery_CRUD();
		$crud->set_theme('bootstrap-v4');

        $crud->set_table('tb_questions');       
        $crud->set_subject('Questions ');
        $crud->set_relation('status','tb_status','status');
        $crud->set_relation('category_id','tb_category','category_name');
        $crud->field_type('added_on', 'hidden');
        $crud->columns('question','category_id');
        $crud->display_as('category_id','Category');

        $added_by =  magicfunction($this->session->userdata('user_id'),'d');
        $added_on =  date("Y-m-d H:m:s");
        $crud->field_type('asked_on', 'hidden', $added_on);
        $crud->field_type('asked_by', 'hidden', $added_by);

        $crud->callback_delete(array($this,'log_before_delete'));
        

        $crud->unset_clone(); 
        $output = $crud->render();
        $this->_example_output($output);
    }
    public function _example_output($output = null)
	{
        $this->load->view('admin/_layouts/header');
		$this->load->view('admin/questions/contents.php',(array)$output);
        $this->load->view('admin/_layouts/footer');
 
	}

     
	public function log_before_delete($primary_key)
	{
		$timestamp = date('Y-m-d h:m:s');
		$this->db->where('q_id',$primary_key);
		$data = $this->db->get('tb_questions')->row();
		$data->status = 2;

		if(empty($data))
			return false;
		
		$this->db->where('q_id', $primary_key);
   		$this->db->update('tb_questions', $data);

		return true;
	}
}