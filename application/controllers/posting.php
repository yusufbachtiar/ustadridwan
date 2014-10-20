<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Posting extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Posting_model', 'Event_model'));
		$this->load->helper('date');
		$this->load->library('pagination');
	}

	public function index($offset = null){
		$config['base_url'] = site_url('posting/index/');
		$config['uri_segment'] = 3;
		$config['total_rows'] = count($this->Posting_model->get(array('publish'=> 1)))+1;
		$this->pagination->initialize($config);

		$criteria = array('publish'=>1, 'limit'=>10, 'offset'=> $offset);
		if ($this->input->post('search')) {
			$criteria['search'] = $this->input->post('search');
		}
		$data['posting'] = $this->Posting_model->get($criteria);
		$data['title'] = "Article";
		$data['header'] = "Seluruh Artikel";
		$data['main'] = "frontend/posting/all_posting";
		$data['event'] = $this->Event_model->get(array('limit'=>10));
		$data['category'] = $this->Posting_model->get_category();
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

	public function category($id = null, $offset = null){
		$config['base_url'] = site_url('posting/category/'.$id);
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($this->Posting_model->get(array('post_cat_id'=> $id)))+1;
		$this->pagination->initialize($config);

		$data['header'] = 'Daftar Artikel';
		$data['main'] = 'frontend/posting/category_list';
		$data['event'] = $this->Event_model->get(array('limit'=>10));
		$data['category'] = $this->Posting_model->get_category();
		$data['posting'] = $this->Posting_model->get(array('publish'=>1));
		$data['detail'] = $this->Posting_model->get(array('post_cat_id'=> $id, 'limit'=>10, 'offset'=> $offset));
		$data['random_post'] = $this->Posting_model->get(array('publish'=>1, 'limit'=>9, 'random'=>TRUE));
		$this->load->view('template/layout_detail', $data);
	}
}