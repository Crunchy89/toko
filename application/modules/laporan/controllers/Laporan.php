<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
	public function index()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		$id = $this->session->userdata('id');
		$data['title'] = 'Laporan Penjualan';
		$data['data'] = $this->join();
		admin_page('index', $data);
	}
	private function join()
	{
		return $this->db->query("SELECT laporan.*,user.* FROM laporan INNER JOIN user ON laporan.id_user=user.id_user")->result();
	}
}
