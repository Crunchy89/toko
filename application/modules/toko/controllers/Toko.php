<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends MY_Controller
{
	public function __construct()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('toko_model');
	}
	public function index()
	{
		$data['title'] = 'Toko';
		$data['data'] = $this->db->get('title_logo')->result();
		admin_page('index', $data);
	}
	public function edit()
	{
		$this->toko_model->edit();
	}
}
