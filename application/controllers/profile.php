<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Posting_model', 'Event_model', 'Profile_model'));
        $this->load->helper('date');
        $this->load->library('pagination');
    }

    public function index() {
        $data['main'] = 'frontend/profile';
        $data['title'] = 'Profile';
        $data['profile'] = $this->Profile_model->get(array('id' => 1));
        $data['event'] = $this->Event_model->get(array('limit' => 10));
        $data['category'] = $this->Posting_model->get_category();
        $data['posting'] = $this->Posting_model->get(array('publish' => 1));
        $data['header'] = 'Tentang Saya';
        $data['random_post'] = $this->Posting_model->get(array('publish' => 1, 'limit' => 9, 'random' => TRUE));
        $this->load->view('template/layout_detail', $data);
    }

}
