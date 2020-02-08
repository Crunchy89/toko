<?php
class Profil_model extends CI_Model
{
    public function password()
    {
        $post = $this->input->post();
        $db = $this->db;
        $cek = $this->db->get_where('user', ['id_user' => $post['id'], 'password' => $post['pass']])->row();
        if ($cek) {
            $pass = htmlspecialchars($post['passbaru']);
            $db->set('password', $pass);
            $db->where('id_user', $post['id']);
            $db->update('user');
            $this->session->set_flashdata('berhasil', '<div class="alert alert-success text-center" role="alert">
            Password berhasil diubah
          </div>');
            redirect('profil');
        }
        $this->session->set_flashdata('berhasil', '<div class="alert alert-danger text-center" role="alert">
            Password gagal diubah
          </div>');
        redirect('profil');
    }
    public function ubah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $cek = $this->db->get_where('user', ['id_user' => $post['id'], 'password' => $post['pass']])->row();
        if ($cek) {
            $db->set('nama', $post['nama']);
            $db->set('alamat', $post['alamat']);
            $db->set('email', $post['email']);
            $db->set('no_telp', $post['hp']);
            $db->where('id_user', $post['id']);
            $db->update('user');
            $this->session->set_flashdata('berhasil', '<div class="alert alert-success text-center" role="alert">
            Data barhasil diubah
          </div>');
            redirect('profil');
        }
        $this->session->set_flashdata('berhasil', '<div class="alert alert-danger text-center" role="alert">
            Data gagal diubah
          </div>');
        redirect('profil');
    }
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('icon', $post['icon']);
        $db->set('warna', $post['warna']);
        $db->set('link', $post['link']);
        $db->insert('medsos');
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success text-center" role="alert">
            Media Sosial Berhasil Ditambahkan
          </div>');
        redirect('profil/medsos');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('icon', $post['icon']);
        $db->set('warna', $post['warna']);
        $db->set('link', $post['link']);
        $db->where('id_medsos', $post['id']);
        $db->update('medsos');
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success text-center" role="alert">
            Media Sosial Berhasil Diubah
          </div>');
        redirect('profil/medsos');
    }
    public function hapus()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->where('id_medsos', $post['id']);
        $db->delete('medsos');
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success text-center" role="alert">
            Media Sosial Berhasil Dihapus
          </div>');
        redirect('profil/medsos');
    }
}
