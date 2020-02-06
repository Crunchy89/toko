<?php
class Barang_model extends CI_Model
{
    public function join()
    {
        return $this->db->query('SELECT barang.*,kategori.* FROM barang INNER JOIN kategori on barang.id_kategori=kategori.id_kategori ORDER BY id_barang ASC')->result();
    }
    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama Barang',
                'rules'  => 'trim|required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'harga',
                'label' => 'Harga Barang',
                'rules'  => 'required',
                'errors' => array(
                    'required' => 'Field %s tidak boleh kosong'
                )
            ],
            [
                'field' => 'stok',
                'label' => 'Stok',
                'rules'  => 'trim|required',
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
        $nama = htmlspecialchars($post['nama']);
        $db->set('nama_barang', $nama);
        $db->set('harga', $post['harga']);
        $db->set('id_kategori', $post['kategori']);
        $db->set('detail', $post['detail']);
        $db->set('stok', $post['stok']);
        $db->set('gambar', $gambar);
        $db->insert('barang');
        redirect('barang');
    }
    public function edit()
    {
        $post = $this->input->post();
        $db = $this->db;
        $gambar_lama = $post['gambarLama'];
        if ($_FILES["gambar"]["name"]) {
            $gambar = $this->_uploadImage();
            if ($gambar_lama != $gambar || $gambar_lama != "noimage.png") {
                unlink("assets/img/barang/$gambar_lama");
            }
        } else {
            $gambar = $gambar_lama;
        }
        $nama = htmlspecialchars($post['nama']);
        $db->set('nama_barang', $nama);
        $db->set('harga', $post['harga']);
        $db->set('id_kategori', $post['kategori']);
        $db->set('detail', $post['detail']);
        $db->set('stok', $post['stok']);
        $db->set('gambar', $gambar);
        $db->set('gambar', $gambar);
        $db->where('id_barang', $post['id']);
        $db->update('barang');
        redirect('barang');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $inv = $this->db->query("SELECT gambar FROM barang WHERE id_barang = $id")->row();
        if ($inv->gambar != 'noimage.png') {
            unlink("assets/img/barang/$inv->gambar");
        }
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
        redirect('barang');
    }
    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/barang/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
