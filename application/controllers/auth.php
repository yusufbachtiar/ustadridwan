<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->model('User_model');
	}

	public function index(){
		redirect('auth/login');
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run() == TRUE){
			if ($this->input->post('fake')) {
				
			}else{
				$param['username'] = $this->input->post('username');
				$param['password'] = $this->input->post('password');
				if ($this->User_model->check_user($param) == TRUE) {
					$us = $this->User_model->get(array('username'=> $param['username']));
					$this->session->set_userdata('login', TRUE);
					$this->session->set_userdata('id', $us->user_id);
					$this->session->set_userdata('username', $us->user_name);
					$this->session->set_userdata('fullname', $us->user_full_name);
					$this->session->set_userdata('description', $us->user_description);
					$this->session->set_userdata('role', $us->user_role);
					redirect('pengelola');
				}else{
					$data['title'] = "Login";
					$this->load->view('login/login', $data);				
				}
			}
		}
		else{	
			$data['title'] = "Login";
			$this->load->view('login/login', $data);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}