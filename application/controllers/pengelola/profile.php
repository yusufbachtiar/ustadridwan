<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Profile extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Profile_model');
	}

	public function index($id = null){
		$this->form_validation->set_rules('name', 'Nama lengkap', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('study', 'Riwayat pendidikan', 'required');
		$this->form_validation->set_rules('activity', 'Aktivitas', 'required');
		$this->form_validation->set_rules('organisation', 'Organisasi', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		if ($this->form_validation->run() == TRUE ) {
			$config['upload_path'] = 'images/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);

			$param = array(
				'id' => 1,
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'study' => $this->input->post('study'),
				'activity' => $this->input->post('activity'),
				'organisation' => $this->input->post('organisation'),
				'description' => $this->input->post('description')
				);
			
			if ($_FILES['photo']['name'])
			{
				$this->upload->do_upload('photo');
				$files = $this->upload->data();
				$param['photo'] = $files['file_name'];
			}

			$return = $this->Profile_model->save($param);

			$operation = ($this->input->post('id')) ? 'Edit' : 'Tambah' ;
			$data = array(
				'user'=>$this->session->userdata('id'),
				'what'=> 'Aksi : '. $operation.' profil; '.'ID : '.$return,
				'date'=> date('Y-m-d')
				);
			$this->Activity_model->save($data);

			redirect('pengelola/profile');
		}else{
			$data['profile'] = $this->Profile_model->get(array('id'=>1));
			$data['title'] = 'Profile';
			$data['header'] = 'Sunting';
			$data['page'] = 'pengelola/profile/add_profile';
			$this->load->view('pengelola/template/layout', $data);
		}
	}
}