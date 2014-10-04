<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User_model extends CI_Model{

	public function check_user($user, $pass){
		$this->db->where('user_name', $user);
		$this->db->where('user_password', sha1($pass));
		$res = $this->db->get('user')->num_rows();
		if ($res > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get($param = array()){
		if (isset($param['id'])) {
			$this->db->where('user_id', $param['id']);
		}

		if (isset($param['username'])) {
			$this->db->where('user_name', $param['username']);
		}

		if (isset($param['password'])) {
			$this->db->where('user_password', $param['password']);
		}
	}

	public function get_by_username($us){
		return $this->db->get_where('user', array('user_name' => $us))->row();
	}
}