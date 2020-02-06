<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends MY_Controller
{
	public function __construct()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		parent::__construct();
		$this->load->model('promo_model');
	}

	public function index()
	{
		$data['title'] = 'Promo';
		$data['data'] = $this->db->get('promo')->result();
		admin_page('index', $data);
	}
	public function tambah()
	{
		$this->promo_model->tambah();
	}
	public function edit()
	{
		$this->promo_model->edit();
	}
	public function hapus()
	{
		$this->promo_model->hapus();
	}
}
