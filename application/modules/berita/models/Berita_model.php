<?php
class Berita_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'judul',
                'label' => 'Judul',
                'rules'  => 'required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'isi',
                'label' => 'Isi Berita',
                'rules'  => 'required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ]

        ];
    }
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $gambar = $this->_uploadImage();
        $judul = htmlspecialchars($post['judul']);
        $berita = $post['isi'];
        $date = date('Y-m-d');
        $db->set('judul_berita', $judul);
        $db->set('isi_berita', $berita);
        $db->set('gambar', $gambar);
        $db->set('tanggal', $date);
        $db->insert('berita');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">
        Berita berhasil ditambah
      </div>');
        redirect('berita');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $gambar_lama = $post['gambarLama'];
        if ($_FILES["gambar"]["name"]) {
            $gambar = $this->_uploadImage();
            if ($gambar_lama != $gambar || $gambar_lama != "noimage.png") {
                unlink("assets/img/berita/$gambar_lama");
            }
        } else {
            $gambar = $gambar_lama;
        }
        $judul = htmlspecialchars($post['judul']);
        $berita = $post['isi'];
        $db->set('judul_berita', $judul);
        $db->set('isi_berita', $berita);
        $db->set('gambar', $gambar);
        $db->where('id_berita', $post['id']);
        $db->update('berita');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">
        Berita berhasil diubah
      </div>');
        redirect('berita');
    }
    public function hapus()
    {
        $id = $this->input->post('id');
        $inv = $this->db->query("SELECT gambar FROM berita WHERE id_berita = $id")->row();
        if ($inv->gambar != 'noimage.png') {
            unlink("assets/img/berita/$inv->gambar");
        }
        $this->db->where('id_berita', $id);
        $this->db->delete('berita');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">
        Berita berhasil dihapus
      </div>');
        redirect('berita');
    }
    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/berita/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
