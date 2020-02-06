<?php
class Warna_model extends CI_Model
{
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('warna', $post['warna']);
        $db->insert('warna');
        redirect('warna');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->set('warna', $post['warna']);
        $db->where('id_warna', $post['id']);
        $db->update('warna');
        redirect('warna');
    }
    public function hapus()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->where('id_warna', $post['id']);
        $db->delete('warna');
        redirect('warna');
    }
}
