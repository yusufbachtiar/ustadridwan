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
		$config['base_url'] = site_url('pengelola/posting/index/');
		$config['total_rows'] = count($this->Posting_model->get())+1;
		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		$data['title'] = 'Posting';
		$data['header'] = 'Posting';
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

			$this->Posting_model->save($param);
			redirect('pengelola/posting');

		}else{
			if (isset($id)) {
				$data['posting'] = $this->Posting_model->get(array('id'=>$id));
			}
			$data['category'] = $this->Posting_model->get_category();
			$data['title'] = (isset($id)) ? 'Sunting' : 'Tambah';
			$data['header'] = (isset($id)) ? 'Sunting' : 'Tambah';
			$data['page'] = 'pengelola/posting/add_posting';
			$this->load->view('pengelola/template/layout', $data);
		}
	}

	public function delete($id){
		$this->Posting_model->delete(array('id'=>$id));
		$this->session->set_flashdata('success', 'Hapus posting berhasil');
		redirect('pengelola/posting');
	}
}