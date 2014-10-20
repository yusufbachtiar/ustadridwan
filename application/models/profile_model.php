<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Profile_model extends CI_Model{
	public function get($param = array()){
		if (isset($param['id'])) {
			$this->db->where('profile_id', $param['id']);
			return $this->db->get('profile')->row();
		}
	}

	public function save($param = array()){
		if (isset($param['name'])) {
			$this->db->set('profile_full_name', $param['name']);
		}
		if (isset($param['address'])) {
			$this->db->set('profile_address', $param['address']);
		}
		if (isset($param['study'])) {
			$this->db->set('profile_study', $param['study']);
		}
		if (isset($param['activity'])) {
			$this->db->set('profile_activity', $param['activity']);
		}
		if (isset($param['description'])) {
			$this->db->set('profile_description', $param['description']);
		}
		if (isset($param['organisation'])) {
			$this->db->set('profile_organisation', $param['organisation']);
		}
		if (isset($param['photo'])) {
			$this->db->set('profile_image', $param['photo']);
		}
		if (isset($param['phone'])) {
			$this->db->set('profile_phone', $param['phone']);
		}
		if (isset($param['pin'])) {
			$this->db->set('profile_pin', $param['pin']);
		}
		if (isset($param['fb'])) {
			$this->db->set('profile_fb', $param['fb']);
		}
		if (isset($param['twitter'])) {
			$this->db->set('profile_twitter', $param['twitter']);
		}

		if (isset($param['id'])) {
			$this->db->where('profile_id', $param['id']);
			$this->db->update('profile');
			return $param['id'];
		}
	}
}