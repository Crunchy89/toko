<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends MY_Controller
{

	public function __construct()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		parent::__construct();
		$this->load->model('berita_model');
	}
	public function index()
	{
		$data['title'] = 'Berita';
		$data['data'] = $this->db->get('berita')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->berita_model;
		$validation = $this->form_validation;
		$validation->set_rules($model->rules());
		if ($validation->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Tambah Berita';
			admin_page('tambah', $data);
		}
	}
	public function edit($id = null)
	{
		$model = $this->berita_model;
		$validation = $this->form_validation;
		$validation->set_rules($model->rules());
		if ($validation->run()) {
			$model->edit();
		} else {
			$data['title'] = 'Tambah Berita';
			$data['data'] = $this->db->get_where('berita', ['id_berita' => $id])->row();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->berita_model->hapus();
	}
}
