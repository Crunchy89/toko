<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends MY_Controller
{
	public function __construct()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		parent::__construct();
		$this->load->model('kategori_model');
	}

	public function index()
	{
		$data['title'] = 'Kategori Barang';
		$data['data'] = $this->db->get('kategori')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$this->kategori_model->tambah();
	}
	public function edit()
	{
		$this->kategori_model->edit();
	}
	public function hapus()
	{
		$this->kategori_model->hapus();
	}
}
