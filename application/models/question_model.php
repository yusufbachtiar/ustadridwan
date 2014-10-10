<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Question_model extends CI_Model{

	public function get($param = array()){
		if (isset($param['limit'])) {
			if (!isset($param['offset'])) {
				$param['offset'] = null;
			}
			$this->db->limit($param['limit'], $param['offset']);
		}

		if (isset($param['publish'])) {
			$this->db->where('question_is_publish', $param['publish']);
		}

		if (isset($param['id'])) {
			$this->db->where('question_id', $param['id']);
		}
		
		$this->db->order_by('question_id', 'DESC');
		$res = $this->db->get('question');

		if (isset($param['id'])) {
			$return = $res->row();
		}else{
			$return = $res->result();
		}

		return $return;
	}

	public function save($param = array()){
		if (isset($param['publish'])) {
			$this->db->set('question_is_publish', $param['publish']);
		}

		if (isset($param['id'])) {
			$this->db->where('question_id', $param['id']);
			$this->db->update('question');
			return $param['id'];
		}
	}
	public function delete($param = array()){
		if (isset($param['id'])) {
			$this->db->where('question_id', $param['id']);
			$this->db->delete('question');
			return $param['id'];
		}
	}
}