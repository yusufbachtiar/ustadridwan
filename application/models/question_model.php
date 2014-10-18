<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Question_model extends CI_Model {

    public function get($param = array()) {
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
        } else {
            $return = $res->result();
        }

        return $return;
    }

    public function save($param = array()) {
        if (isset($param['publish'])) {
            $this->db->set('question_is_publish', $param['publish']);
        }
        if (isset($param['question_name'])) {
            $this->db->set('question_name', $param['question_name']);
        }
        if (isset($param['question_email'])) {
            $this->db->set('question_email', $param['question_email']);
        }
        if (isset($param['question_title'])) {
            $this->db->set('question_title', $param['question_title']);
        }
        if (isset($param['question_content'])) {
            $this->db->set('question_content', $param['question_content']);
        }
        if (isset($param['question_date'])) {
            $this->db->set('question_date', $param['question_date']);
        }

        if (isset($param['id'])) {
            $this->db->where('question_id', $param['id']);
            $this->db->update('question');
            $return = $param['id'];
        } else {
            $this->db->insert('question');
            $return = $this->db->insert_id();
        }

        return $return;
    }

    public function delete($param = array()) {
        if (isset($param['id'])) {
            $this->db->where('question_id', $param['id']);
            $this->db->delete('question');
            return $param['id'];
        }
    }

}
