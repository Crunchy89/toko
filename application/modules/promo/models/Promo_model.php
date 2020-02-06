<?php
class Promo_model extends CI_Model
{
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $gambar = $this->_uploadImage();
        $db->set('gambar', $gambar);
        $db->insert('promo');
        redirect('promo');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $gambar_lama = $post['gambarLama'];
        if ($_FILES["gambar"]["name"]) {
            $gambar = $this->_uploadImage();
            if ($gambar_lama != $gambar || $gambar_lama != "noimage.png") {
                unlink("assets/img/promo/$gambar_lama");
            }
        } else {
            $gambar = $gambar_lama;
        }
        $db->set('gambar', $gambar);
        $db->where('id_promo', $post['id']);
        $db->update('promo');
        redirect('promo');
    }
    public function hapus()
    {
        $id = $this->input->post('id');
        $inv = $this->db->query("SELECT gambar FROM promo WHERE id_promo = $id")->row();
        if ($inv->gambar != 'noimage.png') {
            unlink("assets/img/promo/$inv->gambar");
        }
        $this->db->where('id_promo', $id);
        $this->db->delete('promo');
        redirect('promo');
    }
    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/promo/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
