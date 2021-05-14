<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_questions extends CI_Model {
	
    function list_questions(){
        $multiplewhere = array('tb_questions.status' => 1);
		$this->db->select('q_id,question,category_id,asked_by,category_name,asked_on,user_name');
        $this->db->join('tb_category', 'tb_category.c_id = tb_questions.category_id');
        $this->db->join('tb_users', 'tb_users.id = tb_questions.asked_by');

        $this->db->where($multiplewhere);
		return $this->db->get('tb_questions')->result();
    }

       function list_questions_by_category($category_id){
        $multiplewhere = array('tb_questions.status' => 1,'tb_questions.category_id' => $category_id);
        $this->db->select('q_id,question,category_id,asked_by,category_name,asked_on,user_name');
        $this->db->join('tb_category', 'tb_category.c_id = tb_questions.category_id');
        $this->db->join('tb_users', 'tb_users.id = tb_questions.asked_by');
        $this->db->where($multiplewhere);
		return $this->db->get('tb_questions')->result();
    }
      
       function list_categories(){
        $multiplewhere = array('tb_category.status' => 1);
		$this->db->select('c_id,category_name,added_on');
        $this->db->where($multiplewhere);
		return $this->db->get('tb_category')->result();
    }
      		
    
    function list_answers_of_questions($question_id){
        $question_id = magicfunction($question_id,'d');
        $multiplewhere = array('tb_answer.status' => 1,'tb_answer.quest_id' => $question_id);
		$this->db->select('answer,tb_answer.added_by,tb_answer.added_on,user_name');
        $this->db->join('tb_users', 'tb_users.id = tb_answer.added_by');
        $this->db->where($multiplewhere);
		return $this->db->get('tb_answer')->result();
    }
  
    public function view_admin($idEnc) {
        $id = magicfunction($idEnc,'d');
        $multiplewhere = array('tb_administrations.status' => 1,'tb_administrations.admin_id' => $id);
		$this->db->select('admin_id, admin_name, admin_position, image_path, admin_phone, admin_email');
		$this->db->where($multiplewhere);
		return $this->db->get('tb_administrations')->row();
	}

    public function add_answer($data){
        $result = $this->db->insert('tb_answer',$data);		
        return $result;
    }

    public function add_question($data){
        $result = $this->db->insert('tb_questions',$data);		
        return $result;
    }
  
}

?>