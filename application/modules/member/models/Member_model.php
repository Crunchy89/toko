<?php
class Member_model extends CI_Model
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
            redirect('member');
        }
        $this->session->set_flashdata('berhasil', '<div class="alert alert-danger text-center" role="alert">
            Password gagal diubah
          </div>');
        redirect('member');
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
            redirect('member');
        }
        $this->session->set_flashdata('berhasil', '<div class="alert alert-danger text-center" role="alert">
            Data gagal diubah
          </div>');
        redirect('member');
    }
}
