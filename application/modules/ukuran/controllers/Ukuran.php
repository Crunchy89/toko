<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ukuran extends MY_Controller
{
	public function __construct()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		parent::__construct();
		$this->load->model('ukuran_model');
	}

	public function index()
	{
		$data['title'] = 'ukuran Barang';
		$data['data'] = $this->db->get('ukuran')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$this->ukuran_model->tambah();
	}
	public function edit()
	{
		$this->ukuran_model->edit();
	}
	public function hapus()
	{
		$this->ukuran_model->hapus();
	}
}
