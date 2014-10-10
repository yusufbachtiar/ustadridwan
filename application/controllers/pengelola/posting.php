<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Posting extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Posting_model');
		$this->load->helper('date');
	}

	public function index($offset = null){
		$this->load->library('pagination');

		$data['posting'] = $this->Posting_model->get(array('limit'=> 10, 'offset'=>$offset));
		$config['base_url'] = site_url('pengelola/posting/index');
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($this->Posting_model->get())+1;
		$this->pagination->initialize($config);

		$data['title'] = 'Posting';
		$data['header'] = 'Daftar Posting';
		$data['page'] = 'pengelola/posting/list_posting';
		$this->load->view('pengelola/template/layout', $data);
	}

	public function add($id = null){
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('content', 'Konten', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		
		if ($this->form_validation->run() == TRUE ) {
			$param = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'category' => $this->input->post('category'),
				'date' => date('Y-m-d'),
				'publish' => $this->input->post('publish'),
				'author' => $this->session->userdata('id'),
				'image' => $this->input->post('image')
				);
			if ($this->input->post('id')) {
				$param['id'] = $this->input->post('id');
			}

			$return = $this->Posting_model->save($param);

			$operation = (isset($id)) ? 'Edit' : 'Tambah' ;
			$data = array(
				'user'=>$this->session->userdata('id'),
				'what'=> 'Aksi : '. $operation.' posting; '.'ID : '.$return,
				'date'=> date('Y-m-d')
				);
			$this->Activity_model->save($data);

			redirect('pengelola/posting');

		}else{
			if (isset($id)) {
				$data['posting'] = $this->Posting_model->get(array('id'=>$id));
			}
			$data['category'] = $this->Posting_model->get_category();
			$data['title'] = (isset($id)) ? 'Edit Posting' : 'Tambah Posting' ;
			$data['header'] = (isset($id)) ? 'Sunting' : 'Tambah';
			$data['page'] = 'pengelola/posting/add_posting';
			$this->load->view('pengelola/template/layout', $data);
		}
	}

	public function delete($id){
		$return = $this->Posting_model->delete(array('id'=>$id));
		
		$data = array(
			'user'=>$this->session->userdata('id'),
			'what'=> 'Aksi : Hapus posting; '.'ID : '.$return,
			'date'=> date('Y-m-d')
			);
		$this->Activity_model->save($data);

		$this->session->set_flashdata('success', 'Hapus posting berhasil');
		redirect('pengelola/posting');
	}

	public function category($offset = null){
		$data['category'] = $this->Posting_model->get_category(array('limit'=>10, 'offset'=>$offset));
		$data['title'] = 'Kategori';
		$data['header'] = 'Daftar Kategori Posting';
		$config['base_url'] = site_url('pengelola/posting/category');
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($this->Posting_model->get_category())+1;
		$this->pagination->initialize($config);
		$data['page'] = 'pengelola/posting/list_category';
		$this->load->view('pengelola/template/layout', $data);
	}

	public function add_category($id = null){
		$this->form_validation->set_rules('category', 'Kategori', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == TRUE ) {
			if ($this->input->post('id')) {
				$param['id'] = $this->input->post('id');
			}
			$param['name'] = $this->input->post('category');

			$return = $this->Posting_model->save_category($param);

			$operation = (isset($id)) ? 'Edit' : 'Tambah' ;
			$data = array(
				'user'=>$this->session->userdata('id'),
				'what'=> 'Aksi : '. $operation.' kategori posting; '.'ID : '.$return,
				'date'=> date('Y-m-d')
				);
			$this->Activity_model->save($data);
			redirect('pengelola/posting/category');

		}else{
			if (isset($id)) {
				$data['category'] = $this->Posting_model->get_category(array('id'=> $id));
			}
			$data['title'] = 'Kategori Posting';
			$data['header'] = (isset($id)) ? 'Sunting' : 'Tambah';
			$data['page'] = 'pengelola/posting/add_category';
			$this->load->view('pengelola/template/layout', $data);
		}
	}

	public function delete_category($id){
		$return = $this->Posting_model->delete_category(array('id'=>$id));
		$data = array(
			'user'=>$this->session->userdata('id'),
			'what'=> 'Aksi : Hapus kategori posting; '.'ID : '.$return,
			'date'=> date('Y-m-d')
			);
		$this->Activity_model->save($data);
		$this->session->set_flashdata('success', 'Hapus kategori berhasil');
		redirect('pengelola/posting/category');
	}
}