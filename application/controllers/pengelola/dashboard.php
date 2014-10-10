<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('login') == FALSE){
			redirect('auth/login');
		}
		$this->load->model(
			array('Posting_model', 
				'Question_model', 
				'User_model',
				'Event_model',
				'Gallery_model'
				)
			);
	}

	public function index(){
		$data['header'] = 'Dashboard';
		$data['title'] = 'Dashboard';
		$data['page'] = 'pengelola/dashboard';
		$data['post_publish'] = count($this->Posting_model->get(array('publish'=>1)));
		$data['post_draft'] = count($this->Posting_model->get(array('publish'=>0)));
		$data['event_publish'] = count($this->Event_model->get(array('publish'=>1)));
		$data['event_draft'] = count($this->Event_model->get(array('publish'=>0)));
		$data['gallery_publish'] = count($this->Gallery_model->get(array('publish'=>1)));
		$data['gallery_draft'] = count($this->Gallery_model->get(array('publish'=>0)));
		$data['gallery_video'] = count($this->Gallery_model->get(array('type'=>'video')));
		$data['gallery_foto'] = count($this->Gallery_model->get(array('type'=>'photo')));
		$data['question_publish'] = count($this->Question_model->get(array('publish'=>1)));
		$data['question_draft'] = count($this->Question_model->get(array('publish'=>0)));
		$data['admin'] = count($this->User_model->get(array('role'=>1)));
		$data['kontributor'] = count($this->User_model->get(array('role'=>2)));
		$this->load->view('pengelola/template/layout', $data);
	}
}