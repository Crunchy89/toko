<?php
class Keranjang_model extends CI_Model
{
    public function join()
    {
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT keranjang.*,barang.* FROM keranjang INNER JOIN barang on keranjang.id_barang=barang.id_barang WHERE keranjang.id_user = $id")->result();
    }
    public function tambah()
    {
        $post = $this->input->post();
        $db = $this->db;
        $id_user = htmlspecialchars($post['id_user']);
        $id_barang = htmlspecialchars($post['id_barang']);
        $warna = htmlspecialchars($post['warna']);
        $ukuran = htmlspecialchars($post['ukuran']);
        $jumlah = htmlspecialchars($post['jumlah']);
        $db->set('id_user', $id_user);
        $db->set('id_barang', $id_barang);
        $db->set('id_warna', $warna);
        $db->set('id_ukuran', $ukuran);
        $db->set('jumlah', $jumlah);
        $db->insert('keranjang');
        $this->session->set_flashdata('keranjang', '<div class="alert alert-success text-center" role="alert">
        Keranjang ditambahkan
      </div>');
        redirect('keranjang');
    }
    public function beli()
    {
        $post = $this->input->post();
        $db = $this->db;

        $no_transaksi = uniqid();
        $status = 'pending';
        $pembayaran = htmlspecialchars($post['bayar']);
        $pengiriman = htmlspecialchars($post['jasa']);
        $pembeli = htmlspecialchars($post['id_user']);
        $barang = htmlspecialchars($post['id_barang']);
        $warna = htmlspecialchars($post['warna']);
        $ukuran = htmlspecialchars($post['ukuran']);
        $jumlah = htmlspecialchars($post['jumlah']);
        $total = htmlspecialchars($post['sum']);
        $db->set('no_transaksi', $no_transaksi);
        $db->set('status', $status);
        $db->set('pembayaran', $pembayaran);
        $db->set('pengiriman', $pengiriman);
        $db->set('id_user', $pembeli);
        $db->set('id_barang', $barang);
        $db->set('id_warna', $warna);
        $db->set('id_ukuran', $ukuran);
        $db->set('jumlah', $jumlah);
        $db->set('total', $total);
        $db->insert('transaksi');
        $id = htmlspecialchars($post['id_keranjang']);
        $db->where('id_keranjang', $id);
        $db->delete('keranjang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">
        Barang Telah dipesan Silahkan tunggu Konfirmasi
      </div>');
        redirect('keranjang');
    }
    public function hapus()
    {
        $post = $this->input->post();
        $db = $this->db;
        $db->where('id_keranjang', $post['id']);
        $db->delete('keranjang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">
        Barang Telah dihapus
      </div>');
        redirect('keranjang');
    }
}
