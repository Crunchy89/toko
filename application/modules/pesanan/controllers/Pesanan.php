<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pesanan_model');
	}

	public function index()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		$data['title'] = 'Barang Pesanan';
		$data['data'] = $this->pesanan_model->join();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$this->pesanan_model->tambah();
	}
	public function kirim()
	{
		$this->pesanan_model->kirim();
	}
}
