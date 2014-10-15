<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Surat extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Posting_model', 'Event_model'));
		$this->load->helper('date');
		$this->load->library('pagination');
	}
        
        public function index(){
            
        }

        public function form($id = null){
		$data['main'] = 'frontend/surat/surat_list';
		$data['event'] = $this->Event_model->get(array('limit'=>10));
		$data['category'] = $this->Posting_model->get_category();
		$data['posting'] = $this->Posting_model->get(array('publish'=>1));
		$data['header'] = 'Surat Pembaca';
		$data['random_post'] = $this->Posting_model->get(array('publish'=>1, 'limit'=>9, 'random'=>TRUE));
		$this->load->view('template/layout_detail', $data);
	}
}