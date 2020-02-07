<?php
class Transaksi_model extends CI_Model
{
    public function join()
    {
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT transaksi.*,transaksi.status as apa,user.*,barang.*,warna.*,ukuran.* FROM transaksi INNER JOIN user on transaksi.id_user = user.id_user INNER JOIN barang on transaksi.id_barang = barang.id_barang INNER JOIN warna on transaksi.id_warna = warna.id_warna LEFT JOIN ukuran on transaksi.id_ukuran = ukuran.id_ukuran WHERE transaksi.id_user = $id ")->result();
    }
    public function terima()
    {
    }
}
