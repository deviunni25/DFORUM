<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manageCategory extends CI_Controller {

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

        $crud->set_table('tb_category');       
        $crud->set_subject('Question Category ');
        $crud->set_relation('status','tb_status','status');
        $crud->field_type('added_on', 'hidden');
        $crud->columns('category_name','added_on');

        $added_on =  date("Y-m-d H:m:s");
        $crud->field_type('added_on', 'hidden', $added_on);
        $crud->callback_delete(array($this,'log_before_delete'));
        

        $crud->unset_clone(); 
        $output = $crud->render();
        $this->_example_output($output);
    }
    public function _example_output($output = null)
	{
        $this->load->view('admin/_layouts/header');
		$this->load->view('admin/category/contents.php',(array)$output);
        $this->load->view('admin/_layouts/footer');
 
	}

     
	public function log_before_delete($primary_key)
	{
		$timestamp = date('Y-m-d h:m:s');
		$this->db->where('c_id',$primary_key);
		$data = $this->db->get('tb_category')->row();
		$data->status = 2;

		if(empty($data))
			return false;
		
		$this->db->where('c_id', $primary_key);
   		$this->db->update('tb_category', $data);

		return true;
	}
}