<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('login') == FALSE){
			redirect('auth/login');
		}
	}

	public function index(){
		$data['header'] = 'Dashboard';
		$data['title'] = 'Dashboard';
		$data['page'] = 'pengelola/dashboard';
		$this->load->view('pengelola/template/layout', $data);
	}
}