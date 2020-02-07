<?php
class Pesanan_model extends CI_Model
{
  public function join()
  {
    return $this->db->query("SELECT transaksi.*,transaksi.status as apa,user.*,barang.*,warna.*,ukuran.* FROM transaksi INNER JOIN user on transaksi.id_user = user.id_user INNER JOIN barang on transaksi.id_barang = barang.id_barang INNER JOIN warna on transaksi.id_warna = warna.id_warna LEFT JOIN ukuran on transaksi.id_ukuran = ukuran.id_ukuran")->result();
  }
  public function tambah()
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
    $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">
        Barang Telah dipesan Silahkan tunggu Konfirmasi
      </div>');
    redirect('pesanan');
  }
  public function kirim()
  {
    $post = $this->input->post();
    $db = $this->db;
    $barang = $this->db->get_where('barang', ['id_barang' => $post['id_barang']])->row();
    $jumlah = $this->db->get_where('transaksi', ['id_transaksi' => $post['id_transaksi']])->row();
    $sisa = $barang->stok - $jumlah->jumlah;
    $db->set('stok', $sisa);
    $db->where('id_barang', $post['id_barang']);
    $db->update('barang');
    $db->set('status', 'dikirim');
    $db->where('id_transaksi', $post['id_transaksi']);
    $db->update('transaksi');
    $this->session->set_flashdata('kirim', '<div class="alert alert-success" role="alert">
        Barang Berhasil Dikirim
      </div>');
    redirect('pesanan');
  }
}
