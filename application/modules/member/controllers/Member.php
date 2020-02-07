<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends MY_Controller
{

	public function __construct()
	{
		if ($this->session->userdata('status') != 'member') {
			redirect('home');
		}
		parent::__construct();
		$this->load->model('member_model');
	}
	public function index()
	{
		$data['title'] = "Profile " . $this->session->userdata['nama'];
		$data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata['id']])->row();
		member_page('index', $data);
	}
	public function password()
	{
		$this->member_model->password();
	}
	public function ubah()
	{
		$this->member_model->ubah();
	}
}
