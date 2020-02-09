<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pesan_model');
	}

	public function index()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		$this->pesan_model->status();
		$data['title'] = 'Pesan';
		$data['data'] = $this->db->query("SELECT pesan.*,user.* FROM pesan INNER JOIN user on pesan.id_pengirim=user.id_user GROUP BY id_pengirim ORDER BY id_pesan DESC")->result();
		admin_page('index', $data);
	}
}
