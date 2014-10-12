<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Posting_model extends CI_Model{

	public function get($param = array()){

		if (isset($param['id'])) {
			$this->db->where('posting_id', $param['id']);
		}

		if (isset($param['publish'])) {
			$this->db->where('posting_is_publish', $param['publish']);
		}

		if (isset($param['random'])) {
			$this->db->order_by('posting_id', 'random');
		}

		if(isset($param['limit']))
		{
			if(!isset($param['offset']))
			{
				$param['offset'] = NULL;
			}

			$this->db->limit($param['limit'], $param['offset']);
		}

		if (isset($param['post_cat_id'])) {
			$this->db->where('post_cat_id', $param['post_cat_id']);
		}

		$this->db->order_by('posting_id', 'DESC');
		$this->db->join('user', 'user.user_id = posting.author_user_id');
		$this->db->join('posting_category', 'posting_category.post_cat_id = posting.posting_category');
		$res = $this->db->get('posting');

		if (isset($param['id'])) {
			return $res->row();
		}else{
			return $res->result();
		}
	}

	public function get_category($param = array()){

		if(isset($param['limit']))
		{
			if(!isset($param['offset']))
			{
				$param['offset'] = NULL;
			}

			$this->db->limit($param['limit'], $param['offset']);
		}

		if (isset($param['id'])) {
			$this->db->where('post_cat_id', $param['id']);
		}

		$res = $this->db->get('posting_category');

		if (isset($param['id'])) {
			return $res->row();
		}else{
			return $res->result();
		}
	}

	public function save($param = array()){
		if (isset($param['title'])) {
			$this->db->set('posting_title', $param['title']);
		}
		if (isset($param['content'])) {
			$this->db->set('posting_content', $param['content']);
		}
		if (isset($param['category'])) {
			$this->db->set('posting_category', $param['category']);
		}
		if (isset($param['date'])) {
			$this->db->set('posting_date', $param['date']);
		}
		if (isset($param['publish'])) {
			$this->db->set('posting_is_publish', $param['publish']);
		}
		if (isset($param['author'])) {
			$this->db->set('author_user_id', $param['author']);
		}
		if (isset($param['image'])) {
			$this->db->set('posting_image', $param['image']);
		}

		if (isset($param['id'])) {
			$this->db->where('posting_id', $param['id']);
			$this->db->update('posting');
			$return = $param['id'];
		}else{
			$this->db->insert('posting');
			$return = $this->db->insert_id();
		}

		return $return;

	}

	public function delete($param = array()){
		if (isset($param['id'])) {
			$this->db->where('posting_id', $param['id']);
		}

		$this->db->delete('posting');
		return $param['id'];
	}

	public function save_category($param = array()){
		if (isset($param['name'])) {
			$this->db->set('post_cat_name', $param['name']);
		}

		if (isset($param['id'])) {
			$this->db->where('post_cat_id', $param['id']);
			$this->db->update('posting_category');
			$return = $param['id'];
		}else{
			$this->db->insert('posting_category');
			$return = $this->db->insert_id();
		}

		return $return;
	}

	public function delete_category($param = array()){
		if (isset($param['id'])) {
			$this->db->where('post_cat_id', $param['id']);
		}

		$this->db->delete('posting_category');
		return $return = $param['id'];
	}
}