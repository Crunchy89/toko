<?php
class Toko_model extends CI_Model
{

    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $gambar_lama = $post['gambarLama'];
        if ($_FILES["gambar"]["name"]) {
            $gambar = $this->_uploadImage();
            if ($gambar_lama != $gambar || $gambar_lama != "noimage.png") {
                unlink("assets/img/logo/$gambar_lama");
            }
        } else {
            $gambar = $gambar_lama;
        }
        $db->set('title', $post['title']);
        $db->set('toko', $post['nama']);
        $db->set('logo', $gambar);
        $db->where('id_title', $post['id']);
        $db->update('title_logo');
        redirect('toko');
    }
    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/logo/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
