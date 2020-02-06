<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function index()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('home');
		}
		$data['title'] = 'Dashboard';
		admin_page('index', $data);
	}
}
