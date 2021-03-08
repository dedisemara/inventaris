<?php

class Qualitycontrol_model extends CI_model
{
    public function getAllQualitycontrol()
    {
        return $this->db->get('alatuji')->result_array();
    }


    public function getQualitycontrol($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('klasifikasi', $keyword);
            $this->db->or_like('nama_alat', $keyword);
            $this->db->or_like('kode', $keyword);
            $this->db->or_like('fungsi', $keyword);
            $this->db->or_like('serial_number', $keyword);
            $this->db->or_like('tanggal_masuk', $keyword);
            $this->db->or_like('supplier', $keyword);
            $this->db->or_like('lokasi', $keyword);
            $this->db->or_like('kondisi', $keyword);
        }
        return $this->db->get('alatuji', $limit, $start)->result_array();
    }


    public function countAllQualitycontrol()
    {
        return $this->db->get('alatuji')->num_rows();
    }

    public function getQualitycontrolById($id)
    {
        return $this->db->get_where('alatuji', ['id' => $id])->row_array();
    }


    public function tambahDataQC($data, $table)
    {

        $this->db->insert($table, $data);
        // $this->db->insert($table2, $data2);
    }
    public function ubahDataPinjam($data, $table, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    public function getAllpengguna()
    {
        $this->db->order_by('status1', 'desc');
        $query = $this->db->get('peminjaman');
        return $query->result_array();
    }

    public function ubahDataUser($data, $table, $id, $data2, $table2, $id2)
    {

        $this->db->where('no', $id);
        $this->db->update($table, $data);
        // $this->db->insert($table2, $data2);

        $this->db->where('id', $id2);
        $this->db->update($table2, $data2);
    }

    public function getUserById($no)
    {
        return $this->db->get_where('peminjaman', ['no' => $no])->row_array();
    }
    public function hapuDataUser($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('peminjaman');
    }
    public function getPenggunaById($no)
    {
        return $this->db->get_where('peminjaman', ['no' => $no])->row_array();
    }
    public function ubahDataKembali($data, $table, $id, $data2, $table2, $id2)
    {

        $this->db->where('no', $id);
        $this->db->update($table, $data);
        // $this->db->insert($table2, $data2);

        $this->db->where('id', $id2);
        $this->db->update($table2, $data2);
    }
    public function getAllCoba()
    {
        return $this->db->get('coba')->result_array();
    }
    public function getCobaById($id)
    {
        return $this->db->get_where('coba', ['id' => $id])->row_array();
    }
    public function ubahDataEdit($data, $table, $id)
    {

        $this->db->where('id', $id);
        $this->db->update($table, $data);
        // $this->db->insert($table2, $data2);
    }
    public function hapuDataAlatuji($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('alatuji');
    }
}
