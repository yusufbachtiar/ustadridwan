<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Event extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Posting_model', 'Event_model'));
		$this->load->helper('date');
	}

	public function index($offset = null){
		$this->load->library('pagination');

		$config['base_url'] = site_url('event/index');
		$config['uri_segment'] = 3;
		$config['total_rows'] = count($this->Event_model->get())+1;
		$this->pagination->initialize($config);

		$data['event'] = $this->Event_model->get(array('limit'=> 10, 'publish'=>1));
		$data['event_now'] = $this->Event_model->get(array('limit'=> 10, 'offset'=>$offset, 'now'=>TRUE , 'publish'=>1));
		$data['event_coming'] = $this->Event_model->get(array('limit'=> 10, 'offset'=>$offset, 'coming'=>TRUE, 'publish'=>1));
		$data['category'] = $this->Posting_model->get_category();
		$data['posting'] = $this->Posting_model->get(array('publish'=>1));
		$data['main'] = 'frontend/event/list_event';
		$data['title'] = 'Kajian';
		$data['header'] = 'Informasi Kajian';
		$data['page'] = 'pengelola/event/list_event';
		$this->load->view('template/layout_detail', $data);
	}

	public function detail($id = null){
		$data['main'] = 'frontend/posting/posting_detail';
		$data['event'] = $this->Event_model->get(array('limit'=>10));
		$data['category'] = $this->Posting_model->get_category();
		$data['posting'] = $this->Posting_model->get(array('publish'=>1));
		$data['detail'] = $this->Posting_model->get(array('id'=> $id));
		$data['random_post'] = $this->Posting_model->get(array('publish'=>1, 'limit'=>9, 'random'=>TRUE));
		$this->load->view('template/layout_detail', $data);
	}
}