<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Gallery_model extends CI_Model{

	public function get($param = array()){

		if(isset($param['limit']))
		{
			if(!isset($param['offset']))
			{
				$param['offset'] = NULL;
			}

			$this->db->limit($param['limit'], $param['offset']);
		}

		if (isset($param['id'])) {
			$this->db->where('gallery_id', $param['id']);
		}

		if (isset($param['publish'])) {
			$this->db->where('gallery_is_publish', $param['publish']);
		}

		if (isset($param['type'])) {
			$this->db->where('gallery_type', $param['type']);
		}
		$this->db->order_by('gallery_id', 'DESC');
		$res = $this->db->get('gallery');			
		if (isset($param['id'])) {
			$result = $res->row();
		}else{
			$result = $res->result();
		}
		return $result;
	}

	public function save($param = array()){
		if (isset($param['title'])) {
			$this->db->set('gallery_title', $param['title']);
		}
		if (isset($param['image'])) {
			$this->db->set('gallery_image', $param['image']);
		}
		if (isset($param['description'])) {
			$this->db->set('gallery_description', $param['description']);
		}
		if (isset($param['type'])) {
			$this->db->set('gallery_type', $param['type']);
		}
		if (isset($param['publish'])) {
			$this->db->set('gallery_is_publish', $param['publish']);
		}

		if (isset($param['id'])) {
			$this->db->where('gallery_id', $param['id']);
			$this->db->update('gallery');
			$return = $param['id'];
		}else{
			$this->db->insert('gallery');
			$return = $this->db->insert_id();
		}
		return $return;
	}

	public function delete($param = array()){
		if (isset($param['id'])) {
			$this->db->where('gallery_id', $param['id']);
		}

		$this->db->delete('gallery');
		return $param['id'];
	}
}