<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Base extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('User_model','Posting_model','Event_model'));
        $this->load->helper(array('url','text'));
    }

    public function index() {
        $data['main'] = 'frontend/main';
        $data['event'] = $this->Event_model->get(array('limit'=>10));
        $data['category'] = $this->Posting_model->get_category();
        $data['posting'] = $this->Posting_model->get(array('publish'=>1));
        $data['posting12'] = $this->Posting_model->get(array('publish'=>1, 'limit'=>12));
        $data['random_post'] = $this->Posting_model->get(array('publish'=>1, 'limit'=>9, 'random'=>TRUE));
        $this->load->view('template/layout', $data);
    }

    public function detail() {
        $data['main'] = 'frontend/main_detail';
        $data['event'] = $this->Event_model->get(array('limit'=>10));
        $data['category'] = $this->Posting_model->get_category();
        $data['posting'] = $this->Posting_model->get(array('publish'=>1));
        $data['random_post'] = $this->Posting_model->get(array('publish'=>1, 'limit'=>9, 'random'=>TRUE));
        $this->load->view('template/layout_detail', $data);
    }

}

/* End of file Base.php */
/* Location: ./application/controllers/base.php */