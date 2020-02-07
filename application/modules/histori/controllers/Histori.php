<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori extends MY_Controller
{
	public function index()
	{
		if ($this->session->userdata('status') != 'member') {
			redirect('home');
		}
		$id = $this->session->userdata('id');
		$data['title'] = 'Histori Pembelian';
		$data['data'] = $this->db->get_where('laporan', ['id_user' => $id])->result();
		member_page('index', $data);
	}
}
