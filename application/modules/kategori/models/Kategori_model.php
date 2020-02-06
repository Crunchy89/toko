<?php
class Kategori_model extends CI_Model
{
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('kategori', $post['kategori']);
        $db->insert('kategori');
        redirect('kategori');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('kategori', $post['kategori']);
        $db->where('id_kategori', $post['id']);
        $db->update('kategori');
        redirect('kategori');
    }
    public function hapus()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->where('id_kategori', $post['id']);
        $db->delete('kategori');
        redirect('kategori');
    }
}
