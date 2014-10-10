<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Activity_model extends CI_Model{
	public function get($param = array()){
		if (isset($param['limit'])) {
			if (!isset($param['offset'])) {
				$param['offset'] = null;
			}
			$this->db->limit($param['limit'], $param['offset']);
		}
		$this->db->order_by('activity_id', 'DESC');
		$this->db->join('user', 'user.user_id = activity.activity_user');
		return $this->db->get('activity')->result();
	}

	public function save($param = array()){
		if (isset($param['user'])) {
			$this->db->set('activity_user', $param['user']);
		}
		if (isset($param['what'])) {
			$this->db->set('activity_what', $param['what']);
		}
		if (isset($param['date'])) {
			$this->db->set('activity_date', $param['date']);
		}

		$this->db->insert('activity');
	}
}