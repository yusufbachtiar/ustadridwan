<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Surat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Posting_model', 'Event_model', 'Question_model'));
        $this->load->helper('date');
        $this->load->library('pagination');
    }

    public function index($offset = null) {

        $config['base_url'] = site_url('surat/index/');
        $config['uri_segment'] = 3;
        $config['per_page'] = 5;
        $config['total_rows'] = count($this->Question_model->get(array('publish'=> 1)))+1;
        $this->pagination->initialize($config);

        $data['main'] = 'frontend/surat/surat_list';
        $data['title'] = 'Daftar Pertanyaan';
        $data['surat'] = $this->Question_model->get(array('publish' => 1, 'limit' => 5, 'offset'=>$offset));
        $data['event'] = $this->Event_model->get(array('limit' => 10));
        $data['category'] = $this->Posting_model->get_category();
        $data['posting'] = $this->Posting_model->get(array('publish' => 1));
        $data['header'] = 'Surat Pembaca';
        $this->load->view('template/layout_detail', $data);
    }

    public function form($id = null) {
        $this->form_validation->set_rules('user_name', 'Nama pengaju pertanyaan', 'required');
        $this->form_validation->set_rules('user_email', 'Email', 'required|is_email');
        $this->form_validation->set_rules('title', 'Judul pertanyaan', 'required');
        $this->form_validation->set_rules('content', 'Isi pertanyaan', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run() == TRUE){
            if ($this->input->post('tipu')) {

            }else{

                $param['question_name'] = $this->input->post('user_name');
                $param['question_email'] = $this->input->post('user_email');
                $param['question_title'] = $this->input->post('title');
                $param['question_content'] = $this->input->post('content');
                $param['question_date'] = date('Y-m-d');
                $return = $this->Question_model->save($param);
                $this->session->set_flashdata('success', 'Surat anda telah terkirim dan akan dimoderasi terlebih dahulu');
                redirect('surat');
            }
        }else{
            $data['main'] = 'frontend/surat/surat_form';
            $data['event'] = $this->Event_model->get(array('limit' => 10));
            $data['category'] = $this->Posting_model->get_category();
            $data['posting'] = $this->Posting_model->get(array('publish' => 1));
            $data['header'] = 'Surat Pembaca';
            $data['random_post'] = $this->Posting_model->get(array('publish' => 1, 'limit' => 9, 'random' => TRUE));
            $this->load->view('template/layout_detail', $data);
        }
    }

}
