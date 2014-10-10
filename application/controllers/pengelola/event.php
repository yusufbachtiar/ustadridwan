<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Event extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Event_model');
		$this->load->helper('date');
	}

	public function index($offset = null){
		$this->load->library('pagination');

		$data['semua'] = $this->Event_model->get(array('limit'=> 10, 'offset'=>$offset));
		$data['sekali'] = $this->Event_model->get(array('category'=>1, 'limit'=> 10, 'offset'=>$offset));
		$data['pekanan'] = $this->Event_model->get(array('category'=>2, 'limit'=> 10, 'offset'=>$offset));
		$data['bulanan'] = $this->Event_model->get(array('category'=>3, 'limit'=> 10, 'offset'=>$offset));
		$config['base_url'] = site_url('pengelola/event/index');
		$config['uri_segment'] = 4;
		$config['total_rows'] = count($this->Event_model->get())+1;
		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		$data['title'] = 'Event';
		$data['header'] = 'Daftar Event';
		$data['page'] = 'pengelola/event/list_event';
		$this->load->view('pengelola/template/layout', $data);
	}

	public function add($id = null){
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('location', 'Lokasi', 'required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		if ($this->form_validation->run() == TRUE) {
			$param = array(
				'title' => $this->input->post('title'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'location' => $this->input->post('location'),
				'description' => $this->input->post('description'),
				'publish' => $this->input->post('publish'),
				'category' => $this->input->post('category')
				);

			if ($this->input->post('id')) {
				$param['id'] = $this->input->post('id');
			}

			$return = $this->Event_model->save($param);

			$operation = (isset($id)) ? 'Edit' : 'Tambah' ;
			$data = array(
				'user'=>$this->session->userdata('id'),
				'what'=> 'Aksi : '. $operation.' event; '.'ID : '.$return,
				'date'=> date('Y-m-d')
				);
			$this->Activity_model->save($data);

			redirect('pengelola/event');

		}else{
			if (isset($id)) {
				$data['event'] = $this->Event_model->get(array('id'=> $id));
			}
			$data['title'] = 'Event';
			$data['header'] = (isset($id)) ? 'Sunting' : 'Tambah' ;
			$data['kategori'] = $this->Event_model->get_category();
			$data['page'] = 'pengelola/event/add_event';
			$this->load->view('pengelola/template/layout', $data);
		}
	}

	public function delete($id = null){
		$return = $this->Event_model->delete(array('id'=>$id));
		$data = array(
			'user'=>$this->session->userdata('id'),
			'what'=> 'Aksi : Hapus event; '.'ID : '.$return,
			'date'=> date('Y-m-d')
			);
		$this->Activity_model->save($data);
		redirect('pengelola/event');
	}

	public function category($id = null){
		$data['title'] = 'Event';
		$data['header'] = 'Daftar Kategori Event';
		$data['kategori'] = $this->Event_model->get_category();
		$data['page'] = 'pengelola/event/list_category';
		$this->load->view('pengelola/template/layout', $data);
	}

	public function add_category($id = null){
		$this->form_validation->set_rules('category', 'Kategori', 'required|is_unique[event_category.event_category_name]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == TRUE ) {
			if ($this->input->post('id')) {
				$param['id'] = $this->input->post('id');
			}
			$param['name'] = $this->input->post('category');
			$return = $this->Event_model->save_category($param);
			$operation = (isset($id)) ? 'Edit' : 'Tambah' ;
			$data = array(
				'user'=>$this->session->userdata('id'),
				'what'=> 'Aksi : '. $operation.' kategori event; '.'ID : '.$return,
				'date'=> date('Y-m-d')
				);
			$this->Activity_model->save($data);
			redirect('pengelola/event/category');

		}else{
			if (isset($id)) {
				$data['category'] = $this->Event_model->get_category(array('id'=> $id));
			}
			$data['title'] = 'Kategori Event';
			$data['header'] = (isset($id)) ? 'Sunting' : 'Tambah';
			$data['page'] = 'pengelola/event/add_category';
			$this->load->view('pengelola/template/layout', $data);
		}
	}

	public function delete_category($id){
		$return = $this->Event_model->delete_category(array('id'=> $id));
		$data = array(
			'user'=>$this->session->userdata('id'),
			'what'=> 'Aksi : Hapus kategori event; '.'ID : '.$return,
			'date'=> date('Y-m-d')
			);
		$this->Activity_model->save($data);
		redirect('pengelola/event/category');
	}
}