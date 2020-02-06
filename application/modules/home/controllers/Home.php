<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['kategori'] = $this->db->get('kategori')->result();
		$data['promo'] = $this->db->get('promo')->result();
		$data['barang'] = $this->db->get('barang')->result();
		front_page('index', $data);
	}
}
