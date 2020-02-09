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
		$data['berita'] = $this->db->query("SELECT * FROM berita Order by id_berita desc limit 3")->result();
		$data['testimoni'] = $this->db->query('SELECT testimoni.*,user.* FROM testimoni INNER JOIN user ON testimoni.id_user = user.id_user Order By testimoni.id_testimoni DESC limit 6')->result();
		if ($this->session->userdata('status') == 'member') {
			$data['pesan'] = $this->home_model->pesan_home();
		}
		front_page('index', $data);
	}
	public function profil()
	{
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['toko'] = $this->db->get_where('user', ['id_user' => 1])->row();
		$data['medsos'] = $this->db->get('medsos')->result();
		if ($this->session->userdata('status') == 'member') {
			$data['pesan'] = $this->home_model->pesan_home();
		}
		detail_page('toko', $data);
	}
	public function cari()
	{
		$cari = htmlspecialchars($this->input->post('cari'));
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['kategori'] = $this->db->get('kategori')->result();
		$data['promo'] = $this->db->get('promo')->result();
		$data['barang'] = $this->db->query("SELECT * from barang where nama_barang LIKE '%$cari%'")->result();
		$data['berita'] = $this->db->query("SELECT * FROM berita Order by id_berita desc limit 3")->result();
		$data['testimoni'] = $this->db->query('SELECT testimoni.*,user.* FROM testimoni INNER JOIN user ON testimoni.id_user = user.id_user Order By testimoni.id_testimoni DESC limit 6')->result();
		if ($this->session->userdata('status') == 'member') {
			$data['pesan'] = $this->home_model->pesan_home();
		}
		front_page('index', $data);
	}
	public function detail($id = null)
	{
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['warna'] = $this->db->get('warna')->result();
		$data['ukuran'] = $this->db->get('ukuran')->result();
		$data['barang'] = $this->db->get_where('barang', ['id_barang' => $id])->row();
		$data['toko'] = $this->db->get_where('user', ['id_user' => 1])->row();
		$data['medsos'] = $this->db->get('medsos')->result();
		if ($this->session->userdata('status') == 'member') {
			$id_user = $this->session->userdata('id');
			$data['pesan'] = $this->home_model->pesan_home();
		}
		detail_page('lihat', $data);
	}
	public function berita($id = null)
	{
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['berita'] = $this->db->get_where('berita', ['id_berita' => $id])->row();
		$data['data'] = $this->db->get('berita')->result();
		$data['toko'] = $this->db->get_where('user', ['id_user' => 1])->row();
		$data['medsos'] = $this->db->get('medsos')->result();
		if ($this->session->userdata('status') == 'member') {
			$data['pesan'] = $this->home_model->pesan_home();
		}
		detail_page('berita', $data);
	}
	public function kategori($id = null)
	{
		$data['title'] = $this->db->get_where('title_logo', ['id_title' => 1])->row();
		$data['kategori'] = $this->db->get('kategori')->result();
		$data['promo'] = $this->db->get('promo')->result();
		$data['barang'] = $this->db->get_where('barang', ['id_kategori' => $id])->result();
		$data['berita'] = $this->db->query("SELECT * FROM berita Order by id_berita desc limit 3")->result();
		$data['testimoni'] = $this->db->query('SELECT testimoni.*,user.* FROM testimoni INNER JOIN user ON testimoni.id_user = user.id_user Order By testimoni.id_testimoni DESC limit 6')->result();
		if ($this->session->userdata('status') == 'member') {
			$data['pesan'] = $this->home_model->pesan_home();
		}
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
	public function testimoni()
	{
		$this->home_model->testimoni();
	}
	public function logout()
	{
		$this->home_model->logout();
	}
	public function pesan()
	{
		$this->home_model->pesan();
	}
}
