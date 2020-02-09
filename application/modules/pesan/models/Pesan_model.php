<?php
class Pesan_model extends CI_Model
{
    public function status()
    {
        $this->db->set('status', 'read');
        $this->db->where('id_penerima', 1);
        $this->db->update('pesan');
    }
}
