<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Gallery extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Gallery_model');
	}

	public function index($offset = null){
		$this->load->library('pagination');
		
		$data['gallery'] = $this->Gallery_model->get(array('limit'=> 10, 'offset'=>$offset));
		$data['foto'] = $this->Gallery_model->get(array('limit'=> 10, 'offset'=>$offset, 'type'=>'foto'));
		$data['video'] = $this->Gallery_model->get(array('limit'=> 10, 'offset'=>$offset, 'type'=>'video'));
		$config['base_url'] = base_url('pengelola/gallery/index');
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($this->Gallery_model->get())+1;
		$this->pagination->initialize($config);

		$data['title'] = 'Gallery';
		$data['header'] = 'Daftar Gallery';
		$data['page'] = 'pengelola/gallery/list_gallery';
		$this->load->view('pengelola/template/layout', $data);
	}

	public function add($id = null){
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('image', 'Image URL', 'required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == TRUE) {
			$param = array(
				'title' => $this->input->post('title'),
				'image' => $this->input->post('image'),
				'description' => $this->input->post('description'),
				'type' => $this->input->post('type'),
				'publish' => $this->input->post('publish')
				);
			if ($this->input->post('id')) {
				$param['id'] = $this->input->post('id');
			}

			$return = $this->Gallery_model->save($param);

			$operation = (isset($id)) ? 'Edit' : 'Tambah' ;
			$data = array(
				'user'=>$this->session->userdata('id'),
				'what'=> 'Aksi : '. $operation.' galeri; '.'ID : '.$return,
				'date'=> date('Y-m-d')
				);
			$this->Activity_model->save($data);

			redirect('pengelola/gallery');
		}else{
			if (isset($id)) {
				$data['gallery'] = $this->Gallery_model->get(array('id'=> $id));
			}
			$data['title'] = (isset($id)) ? 'Edit Gallery' : 'Tambah Gallery';
			$data['header'] = (isset($id)) ? 'Edit' : 'Tambah';
			$data['page'] = 'pengelola/gallery/add_gallery';
			$this->load->view('pengelola/template/layout', $data);
		}
	}

	public function delete($id = null){
		if (isset($id)) {
			$return = $this->Gallery_model->delete(array('id'=>$id));
			$data = array(
				'user'=>$this->session->userdata('id'),
				'what'=> 'Aksi : Hapus galery; '.'ID : '.$return,
				'date'=> date('Y-m-d')
				);
			$this->Activity_model->save($data);
			redirect('pengelola/gallery');
		}
	}
}