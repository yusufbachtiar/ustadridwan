<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Gallery extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Gallery_model', 'Event_model', 'Posting_model'));
    }

    public function index() {
        
    }

    public function video($offset = null) {
        $this->load->library('pagination');

        $config['base_url'] = site_url('gallery/video/');
        $config['uri_segment'] = 3;
        $config['total_rows'] = count($this->Gallery_model->get(array('type' => 'video'))) + 1;
        $this->pagination->initialize($config);

        $data['event'] = $this->Event_model->get(array('limit' => 10, 'publish' => 1));
        $data['category'] = $this->Posting_model->get_category();
        $data['posting'] = $this->Posting_model->get(array('publish' => 1));

        $data['video'] = $this->Gallery_model->get(array('publish' => 1, 'type' => 'video', 'limit' => 9, 'offset' => $offset));
        $data['main'] = 'frontend/gallery/list_video';
        $data['title'] = 'Video Gallery';
        $data['header'] = 'Galeri Video';
        $this->load->view('template/layout_detail', $data);
    }

    public function photo($offset = NULL) {
        $this->load->library('pagination');

        $config['base_url'] = site_url('gallery/photo/');
        $config['uri_segment'] = 3;
        $config['total_rows'] = count($this->Gallery_model->get(array('type' => 'foto'))) + 1;
        $this->pagination->initialize($config);

        $data['event'] = $this->Event_model->get(array('limit' => 10, 'publish' => 1));
        $data['category'] = $this->Posting_model->get_category();
        $data['posting'] = $this->Posting_model->get(array('publish' => 1));

        $data['photo'] = $this->Gallery_model->get(array('publish' => 1, 'type' => 'foto', 'limit' => 9, 'offset' => $offset));
        $data['main'] = 'frontend/gallery/list_photo';
        $data['title'] = 'Video Gallery';
        $data['header'] = 'Galeri Photo';
        $this->load->view('template/layout_detail', $data);
    }

}
