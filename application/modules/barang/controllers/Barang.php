<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends MY_Controller
{
	public function __construct()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('barang_model');
	}

	public function index()
	{
		$data['title'] = 'Barang Jualan';
		$data['data'] = $this->barang_model->join();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$model = $this->barang_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = 'Form Tambah';
			$data['kategori'] = $this->db->get('kategori')->result();
			admin_page('tambah', $data);
		}
	}
	public function edit($id = null)
	{
		$model = $this->barang_model;
		$form = $this->form_validation;
		$form->set_rules($model->rules());
		if ($form->run()) {
			$model->edit();
		} else {
			$data['title'] = 'Form Edit';
			$data['barang'] = $this->db->get_where('barang', ['id_barang' => $id])->row();
			$data['kategori'] = $this->db->get('kategori')->result();
			admin_page('edit', $data);
		}
	}
	public function hapus()
	{
		$this->barang_model->delete();
	}
}
