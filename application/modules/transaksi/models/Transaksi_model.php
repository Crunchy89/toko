<?php
class Transaksi_model extends CI_Model
{
    public function join()
    {
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT transaksi.*,transaksi.status as apa,user.*,barang.*,warna.*,ukuran.* FROM transaksi INNER JOIN user on transaksi.id_user = user.id_user INNER JOIN barang on transaksi.id_barang = barang.id_barang INNER JOIN warna on transaksi.id_warna = warna.id_warna LEFT JOIN ukuran on transaksi.id_ukuran = ukuran.id_ukuran WHERE transaksi.id_user = $id ")->result();
    }
    private function data()
    {
        $id = $this->session->userdata('id');
        $id_trn = $this->input->post('id');
        return $this->db->query("SELECT transaksi.*,transaksi.status as apa,user.*,barang.*,warna.*,ukuran.* FROM transaksi INNER JOIN user on transaksi.id_user = user.id_user INNER JOIN barang on transaksi.id_barang = barang.id_barang INNER JOIN warna on transaksi.id_warna = warna.id_warna LEFT JOIN ukuran on transaksi.id_ukuran = ukuran.id_ukuran WHERE transaksi.id_user = $id AND transaksi.id_transaksi = $id_trn")->row_array();
    }
    public function terima()
    {
        $post = $this->input->post();
        $db = $this->db;
        $data = $this->data();
        $id = $this->session->userdata('id');
        $date = date('Y/m/d');
        $db->set('id_user', $id);
        $db->set('kode_transaksi', $data['no_transaksi']);
        $db->set('nama_barang', $data['nama_barang']);
        $db->set('ukuran', $data['ukuran']);
        $db->set('warna', $data['warna']);
        $db->set('jumlah', $data['jumlah']);
        $db->set('total', $data['total']);
        $db->set('tanggal', $date);
        $db->insert('laporan');

        $db->where('id_transaksi', $post['id']);
        $db->delete('transaksi');
        redirect('transaksi');
    }
}
