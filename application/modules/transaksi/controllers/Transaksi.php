<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends MY_Controller
{
	public function __construct()
	{
		if ($this->session->userdata('status') != 'member') {
			redirect('home');
		}
		parent::__construct();
		$this->load->model('transaksi_model');
	}

	public function index()
	{
		$data['title'] = "Barang Pesanan";
		$data['data'] = $this->transaksi_model->join();
		member_page('index', $data);
	}
}
