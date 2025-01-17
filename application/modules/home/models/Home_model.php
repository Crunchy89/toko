<?php
class Home_model extends CI_Model
{
    public function log_rules()
    {
        return [
            [
                'field' => 'user',
                'label' => 'Username',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'pass',
                'label' => 'Password',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ]
        ];
    }
    public function reg_rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama Lengkap',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'hp',
                'label' => 'No Telepon',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'user',
                'label' => 'Username',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'pass',
                'label' => 'Password',
                'rules'  => 'trim|matches[pass2]|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong',
                    'matches' => 'Password tidak sama'
                )
            ],
            [
                'field' => 'pass2',
                'label' => 'Confirm Password',
                'rules'  => 'trim|matches[pass]|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong',
                    'matches' => 'Password tidak sama'
                )
            ]
        ];
    }

    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $nama = htmlspecialchars($post['nama']);
        $email = htmlspecialchars($post['email']);
        $alamat = htmlspecialchars($post['alamat']);
        $hp = htmlspecialchars($post['hp']);
        $user = htmlspecialchars($post['user']);
        $pass = htmlspecialchars($post['pass']);
        $cek = $db->get_where('user', ['username' => $user])->row();
        if ($cek) {
            $this->session->set_flashdata('signin', '<div class="alert alert-danger text-center" role="alert">
            Username sudah terpakai !</div>');
            redirect('home/signUp');
        } else {
            $db->set('nama', $nama);
            $db->set('email', $email);
            $db->set('alamat', $alamat);
            $db->set('no_telp', $hp);
            $db->set('username', $user);
            $db->set('password', $pass);
            $db->set('status', 'member');
            $db->insert('user');
            $this->session->set_flashdata('signin', '<div class="alert alert-success text-center" role="alert">
            Akun Berhasil Dibuat !</div>');
            redirect('home/signIn');
        }
    }
    public function signIn()
    {
        $post = $this->input->post();
        $db = $this->db;
        $user = htmlspecialchars($post['user']);
        $pass = htmlspecialchars($post['pass']);
        $cek = $db->get_where('user', ['username' => $user, 'password' => $pass])->row();
        if ($cek) {
            $data = array(
                'nama' => $cek->nama,
                'status' => $cek->status,
                'user' => $cek->username,
                'id' => $cek->id_user
            );
            $this->session->set_userdata($data);
            if ($cek->status == 'member') {
                redirect($post['url']);
            } else if ($cek->status == 'admin') {
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('signin', '<div class="alert alert-danger text-center" role="alert">
            Username atau Password salah
          </div>');
            redirect('home/signIn');
        }
    }
    public function testimoni()
    {
        $post = $this->input->post();
        $db = $this->db;
        $tanggal = date('Y/m/d');
        $testimoni = htmlspecialchars($post['testimoni']);
        $db->set('tanggal', $tanggal);
        $db->set('testimoni', $testimoni);
        $db->set('id_user', $post['id']);
        $db->insert('testimoni');
        redirect($post['url']);
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('status');
        $this->session->sess_destroy();
        redirect('home');
    }

    public function pesan_home()
    {
        $id_user = $this->session->userdata('id');
        return $this->db->query("SELECT pesan.*, user.* FROM pesan INNER JOIN user ON pesan.id_pengirim = user.id_user WHERE pesan.id_pengirim = $id_user OR pesan.id_penerima=$id_user ORDER BY pesan.id_pesan DESC")->result();
    }
    public function pesan()
    {
        $post = $this->input->post();
        $db = $this->db;
        $date = date('Y/m/d H:i:s');
        $db->set('pesan', htmlspecialchars($post['pesan']));
        $db->set('id_penerima', $post['id_penerima']);
        $db->set('id_pengirim', $post['id_pengirim']);
        $db->set('tanggal', $date);
        $db->set('status', 'unread');
        $db->insert('pesan');
        redirect($post['url']);
    }
}
