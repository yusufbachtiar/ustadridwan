<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Activity extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('login') == FALSE){
			redirect('auth/login');
		}
		if ($this->session->userdata('role') != 1) {
			redirect('pengelola');
		}
		$this->load->model('User_model');
	}

	public function index($offset = null){
		$data['header'] = 'Log Aktivitas';
		$data['title'] = 'Log Aktivitas';
		$config['base_url'] = base_url('pengelola/activity/index');
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($this->Activity_model->get())+1;
		$this->pagination->initialize($config);
		$data['activity'] = $this->Activity_model->get(array('limit'=>10,'offset'=>$offset));
		$data['page'] = 'pengelola/activity/log_activity';
		$this->load->view('pengelola/template/layout', $data);
	}
}