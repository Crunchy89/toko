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
	public function profil()
	{
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		detail_page('toko', $data);
	}
	public function cari()
	{
		$cari = htmlspecialchars($this->input->post('cari'));
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['kategori'] = $this->db->get('kategori')->result();
		$data['promo'] = $this->db->get('promo')->result();
		$data['barang'] = $this->db->query("SELECT * from barang where nama_barang LIKE '%$cari%'")->result();
		front_page('index', $data);
	}
	public function detail($id = null)
	{
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['warna'] = $this->db->get('warna')->result();
		$data['ukuran'] = $this->db->get('ukuran')->result();
		$data['barang'] = $this->db->get_where('barang', ['id_barang' => $id])->row();
		detail_page('lihat', $data);
	}
	public function kategori($id = null)
	{
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['kategori'] = $this->db->get('kategori')->result();
		$data['promo'] = $this->db->get('promo')->result();
		$data['barang'] = $this->db->get_where('barang', ['id_kategori' => $id])->result();
		front_page('index', $data);
	}
	public function signIn()
	{
		if ($this->session->userdata('status') == 'member') {
			redirect('home');
		}
		$model = $this->home_model;
		$form = $this->form_validation;
		$form->set_rules($model->log_rules());
		if ($form->run()) {
			$model->signIn();
		} else {
			$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
			detail_page('login', $data);
		}
	}
	public function signUp()
	{
		if ($this->session->userdata('status') == 'member') {
			redirect('home');
		}
		$model = $this->home_model;
		$form = $this->form_validation;
		$form->set_rules($model->reg_rules());
		if ($form->run()) {
			$model->tambah();
		} else {
			$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
			detail_page('daftar', $data);
		}
	}
	public function logout()
	{
		$this->home_model->logout();
	}
}
