<?php
defined('BASEPATH') or exit('No direct script access allowed');

class warna extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('warna_model');
	}

	public function index()
	{
		$data['title'] = 'warna Barang';
		$data['data'] = $this->db->get('warna')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$this->warna_model->tambah();
	}
	public function edit()
	{
		$this->warna_model->edit();
	}
	public function hapus()
	{
		$this->warna_model->hapus();
	}
}
