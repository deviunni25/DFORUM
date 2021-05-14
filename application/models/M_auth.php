<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	
    public function login($user, $pass) {
		$this->db->select('id,user_name, contact_no, email, password, user_type');
		$this->db->from('tb_users');
		$this->db->where('tb_users.user_name', $user);
		$this->db->where('tb_users.password', md5($pass));
		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}

	public function register($data){
        $result = $this->db->insert('tb_users',$data);
		return $result;		
    }
	public function update($data,$id){
		$this->db->set($data);
		$this->db->where('id',$id);
		$result = $this->db->update('tb_users');
		return $result;

    }
  
}

?>