<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends MY_Controller
{
	public function __construct()
	{
		if ($this->session->userdata('status') != 'member')
			parent::__construct();
		$this->load->model('keranjang_model');
	}
	public function index()
	{
		$id = $this->session->userdata('id');
		$data['title'] = "Keranjang Belanja";
		$data['data'] = $this->keranjang_model->join();
		$data['warna'] = $this->db->get('warna')->result();
		$data['ukuran'] = $this->db->get('ukuran')->result();
		member_page('index', $data);
	}
	public function tambah()
	{
		$this->keranjang_model->tambah();
	}
	public function beli()
	{
		$this->keranjang_model->beli();
	}
	public function hapus()
	{
		$this->keranjang_model->hapus();
	}
}
