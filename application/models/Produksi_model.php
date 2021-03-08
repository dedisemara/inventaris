<?php

class Produksi_model extends CI_model
{
    public function getAllProduksi()
    {
        return $this->db->get('produksi')->result_array();
    }
    public function getProduksiById($id)
    {
        return $this->db->get_where('produksi', ['No' => $id])->row_array();
    }
    public function ubahDataEdit($data, $table, $id)
    {

        $this->db->where('No', $id);
        $this->db->update($table, $data);
        // $this->db->insert($table2, $data2);
    }
    public function hapuDataProduksi($No)
    {
        $this->db->where('No', $No);
        $this->db->delete('produksi');
    }
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
