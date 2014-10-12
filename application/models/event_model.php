<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Event_model extends CI_Model{

	public function get($param = array()){

		if (isset($param['category'])) {
			$this->db->where('event_category.event_category_id', $param['category']);
		}

		if (isset($param['id'])) {
			$this->db->where('event_id', $param['id']);
		}

		if (isset($param['start'])) {
			$this->db->where('event_date_start', $param['start']);
		}

		if (isset($param['now'])) {
			$this->db->where('event_date_start >=', date('Y-m-d'));
			$this->db->where('event_date_end <=', date('Y-m-d'));
		}

		if (isset($param['coming'])) {
			$this->db->where('event_date_end >', date('Y-m-d'));
		}

		if (isset($param['end'])) {
			$this->db->where('event_date_end', $param['end']);
		}

		if (isset($param['publish'])) {
			$this->db->where('event_is_publish', $param['publish']);
		}

		if(isset($param['limit']))
		{
			if(!isset($param['offset']))
			{
				$param['offset'] = NULL;
			}

			$this->db->limit($param['limit'], $param['offset']);
		}
		$this->db->order_by('event_date_start', 'DESC');
		$this->db->order_by('event_date_end	', 'DESC');
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
			$return = $param['id'];
		}else{
			$this->db->insert('event');
			$return = $this->db->insert_id();
		}

		return $return;

	}

	public function delete($param = array()){
		if (isset($param['id'])) {
			$this->db->where('event_id', $param['id']);
		}
		$this->db->delete('event');
		return $param['id'];
	}

	public function delete_category($param = array()){
		if (isset($param['id'])) {
			$this->db->where('event_category_id', $param['id']);
		}

		$this->db->delete('event_category');
		return $param['id'];
	}

	public function save_category($param = array()){
		if (isset($param['name'])) {
			$this->db->set('event_category_name', $param['name']);
		}

		if (isset($param['id'])) {
			$this->db->where('event_category_id', $param['id']);
			$this->db->update('event_category');
			$return = $param['id'];
		}else{
			$this->db->insert('event_category');
			$return = $this->db->insert_id();
		}

		return $return;
	}

}