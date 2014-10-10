<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User_model extends CI_Model{

	public function check_user($param = array()){
		$this->db->where('user_name', $param['username']);
		$this->db->where('user_password', sha1($param['password']));
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

		if (isset($param['role'])) {
			$this->db->where('user_role', $param['role']);
		}

		if (isset($param['password'])) {
			$this->db->where('user_password', $param['password']);
		}

		if (isset($param['username']) OR isset($param['id'])) {
			return $this->db->get('user')->row();
		}else{
			return $this->db->get('user')->result();
		}
	}

	public function save($param = array()){
		
		if (isset($param['password'])) {
			$this->db->set('user_password', sha1($param['password']));
		}

		if (isset($param['username'])) {
			$this->db->set('user_name', $param['username']);
		}

		if (isset($param['full_name'])) {
			$this->db->set('user_full_name', $param['full_name']);
		}

		if (isset($param['description'])) {
			$this->db->set('user_description', $param['description']);
		}

		if (isset($param['role'])) {
			$this->db->set('user_role', $param['role']);
		}

		if (isset($param['freeze'])) {
			$this->db->set('user_freeze', $param['freeze']);
		}

		if (isset($param['id'])) {
			$this->db->where('user_id', $param['id']);
			$this->db->update('user');
			$return = $param['id'];
		}else{
			$this->db->insert('user');
			$return = $this->db->insert_id();
		}

		return $return;
	}

	public function delete($param = array()){
		if (isset($param['id'])) {
			$this->db->where('user_id', $param['id']);
		}

		$this->db->delete('user');
		return $param['id'];
	}

}