<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Question extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Question_model');
		$this->load->helper('date');
	}

	public function index($offset = null){
		$config['base_url'] = base_url('pengelola/question/index');
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($this->Question_model->get())+1;
		$this->pagination->initialize($config);

		$data['header'] = 'Surat Pembaca';
		$data['title'] = 'Surat Pembaca';
		$data['question'] = $this->Question_model->get(array('limit'=>10,'offset'=>$offset));
		$data['page'] = 'pengelola/question/list_question';
		$this->load->view('pengelola/template/layout', $data);
	}

	public function add($id = null){
		$this->form_validation->set_rules('content', 'Isi', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		if ($this->form_validation->run() == TRUE) {
			$param['id'] = $this->input->post('id');
			$param['publish'] = $this->input->post('publish');

			$return = $this->Question_model->save($param);

			$operation = ($this->input->post('id')) ? 'Edit' : 'Tambah' ;
			$data = array(
				'user'=>$this->session->userdata('id'),
				'what'=> 'Aksi : '. $operation.' pertanyaan; '.'ID : '.$return,
				'date'=> date('Y-m-d')
				);
			$this->Activity_model->save($data);

			redirect('pengelola/question');
		}else{
			$data['question'] = $this->Question_model->get(array('id'=>$id));
			$data['header'] = 'Edit Surat Pembaca';
			$data['title'] = 'Edit Surat Pembaca';
			$data['page'] = 'pengelola/question/add_question';
			$this->load->view('pengelola/template/layout', $data);
		}
	}

	public function delete($id){
		if (isset($id)) {
			$return = $this->Question_model->delete(array('id'=>$id));
		}
		$data = array(
			'user'=>$this->session->userdata('id'),
			'what'=> 'Aksi : Hapus pertanyaan; '.'ID : '.$return,
			'date'=> date('Y-m-d')
			);
		$this->Activity_model->save($data);

		redirect('pengelola/question');
	}
}