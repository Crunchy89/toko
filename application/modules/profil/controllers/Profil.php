<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends MY_Controller
{
	public function __construct()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		parent::__construct();
		$this->load->model('profil_model');
	}
	public function index()
	{ {
			$data['title'] = "Profile Toko";
			$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata['id']])->row();
			admin_page('index', $data);
		}
	}
	public function password()
	{
		$this->profil_model->password();
	}
	public function ubah()
	{
		$this->profil_model->ubah();
	}
	public function medsos()
	{
		$data['title'] = 'Media Sosial';
		$data['data'] = $this->db->get('medsos')->result();
		admin_page('medsos', $data);
	}
	public function tambah()
	{
		$this->profil_model->tambah();
	}
	public function edit()
	{
		$this->profil_model->edit();
	}
	public function hapus()
	{
		$this->profil_model->hapus();
	}
}
