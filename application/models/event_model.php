<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Event_model extends CI_Model{

	public function get($param = array()){

		if (isset($param['category'])) {
			$this->db->where('event_category.event_category_id', $param['category']);
		}

		if (isset($param['id'])) {
			$this->db->where('event_id', $param['id']);
		}

		if(isset($param['limit']))
		{
			if(!isset($param['offset']))
			{
				$param['offset'] = NULL;
			}

			$this->db->limit($param['limit'], $param['offset']);
		}
		$this->db->join('event_category', 'event_category.event_category_id = event.event_category_id');
		$res = $this->db->get('event');

		if (isset($param['id'])) {
			return $res->row();
		}else{
			return $res->result();
		}
	}

	public function get_category($param = array()){
		if (isset($param['id'])) {
			$this->db->where('event_category_id', $param['id']);
		}
		$res = $this->db->get('event_category');

		if (isset($param['id'])) {
			return $res->row();
		}else{
			return $res->result();
		}
	}

	public function save($param = array()){
		if (isset($param['title'])) {
			$this->db->set('event_title', $param['title']);
		}
		if (isset($param['start'])) {
			$this->db->set('event_date_start', $param['start']);
		}
		if (isset($param['end'])) {
			$this->db->set('event_date_end', $param['end']);
		}
		if (isset($param['location'])) {
			$this->db->set('event_location', $param['location']);
		}
		if (isset($param['description'])) {
			$this->db->set('event_description', $param['description']);
		}
		if (isset($param['publish'])) {
			$this->db->set('event_is_publish', $param['publish']);
		}
		if (isset($param['category'])) {
			$this->db->set('event_category_id', $param['category']);
		}

		if (isset($param['id'])) {
			$this->db->where('event_id', $param['id']);
			$this->db->update('event');
		}else{
			$this->db->insert('event');
		}

	}

	public function delete($param = array()){
		if (isset($param['id'])) {
			$this->db->where('event_id', $param['id']);
		}

		$this->db->delete('event');
	}

	public function delete_category($param = array()){
		if (isset($param['id'])) {
			$this->db->where('event_category_id', $param['id']);
		}

		$this->db->delete('event_category');
	}

	public function save_category($param = array()){
		if (isset($param['name'])) {
			$this->db->set('event_category_name', $param['name']);
		}

		if (isset($param['id'])) {
			$this->db->where('event_category_id', $param['id']);
			$this->db->update('event_category');
		}else{
			$this->db->insert('event_category');
		}
	}

}