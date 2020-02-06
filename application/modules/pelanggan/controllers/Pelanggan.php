<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('pelanggan_model');
	}
	public function index()
	{
		$data['title'] = 'Data Pelanggan';
		$data['data'] = $this->db->get('user')->result();
		admin_page('index', $data);
	}
}
