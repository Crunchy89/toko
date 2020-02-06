<?php
class Ukuran_model extends CI_Model
{
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $ukur = htmlspecialchars($post['ukuran']);
        $db->set('ukuran', $ukur);
        $db->insert('ukuran');
        redirect('ukuran');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $ukur = htmlspecialchars($post['ukuran']);
        $db->set('ukuran', $ukur);
        $db->where('id_ukuran', $post['id']);
        $db->update('ukuran');
        redirect('ukuran');
    }
    public function hapus()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->where('id_ukuran', $post['id']);
        $db->delete('ukuran');
        redirect('ukuran');
    }
}
