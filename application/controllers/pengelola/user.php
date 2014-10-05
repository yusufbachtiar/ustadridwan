<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index(){

	}

	public function profil(){
		$data['profil'] = $this->User_model->get(array('id'=> $this->session->userdata('id')));
		$data['title'] = 'Profil '.$this->session->userdata('fullname');
		$data['header'] = 'Profil '.$this->session->userdata('fullname');
		$data['page'] = 'pengelola/user/profil';
		$this->load->view('pengelola/template/layout', $data);
	}

	public function add($id = null){
		if (!$this->input->post('id')) {			
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.user_name]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password konfirmasi', 'required|matches[password]');
			$this->form_validation->set_rules('role', 'Role pengguna', 'required');
		}
		$this->form_validation->set_rules('description', 'Deskripsi pengguna', 'required');
		$this->form_validation->set_rules('full_name', 'Nama lengkap', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('id')) {
				$param['id'] = $this->input->post('id');
			}
			if ($this->input->post('password')) {
				$param['password'] = $this->input->post('password');
			}
			if ($this->input->post('role')) {
				$param['role'] = $this->input->post('role');
			}
			$param['username'] = $this->input->post('username');
			$param['full_name'] = $this->input->post('full_name');
			$param['description'] = $this->input->post('description');
			$this->User_model->save($param);
			redirect('pengelola/dashboard');
		}else{	
			$data['operation'] = (!empty($id)) ? 'Sunting' : 'Tambah' ;
			if (isset($id)) {
				$data['user'] = $this->User_model->get(array('id'=> $id));
			}
			$data['title'] = $data['operation'].' Pengguna';
			$data['header'] = $data['operation'].' Pengguna';
			$data['page'] = 'pengelola/user/add';
			$this->load->view('pengelola/template/layout', $data);	
		}
	}

	public function cpw(){
		$this->form_validation->set_rules('old_pass', 'Password lama', 'required|callback_check_current_password');
		$this->form_validation->set_rules('new_pass', 'Password baru', 'required');
		$this->form_validation->set_rules('new_pass_conf', 'Konfirmasi password', 'required|matches[new_pass]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == TRUE) {
			$param['password'] = $this->input->post('new_pass');
			$param['id'] = $this->session->userdata('id');
			$this->User_model->save($param);
			redirect('pengelola');
		}else{
			$data['title'] = 'Ganti Password';
			$data['header'] = 'Ganti Password';
			$data['page'] = 'pengelola/user/cpw';
			$this->load->view('pengelola/template/layout', $data);
		}
	}

	function check_current_password(){
		$id = $this->session->userdata('id');
		$pass = $this->input->post('old_pass');
		$user = $this->User_model->get(array('id' => $id));
		if (sha1($pass) == $user->user_password) {
			return TRUE;
		}else{
			$this->form_validation->set_message('check_current_password', 'The Password did not same with the current password');
			return FALSE;
		}
	}
}