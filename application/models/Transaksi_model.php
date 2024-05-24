<?php
class Transaksi_model extends CI_Model
{
    function getNasabahByid($id)
    {
        return $this->db->get_where('tbl_member', ['id' => $id])->row_array();
    }

    function getharga($id)
    {
        return $this->db->get_where('tbl_sampah', ['id' => $id])->row_array();
    }
    // function gethargasampah($id)
    // {
    //     // $id = $this->input->post('id_sampah');

    //     $query = $this->db->get_where('tbl_sampah', ['id' => $id]);
    //     return $query->row();
    //     // return json_encode($query->row());
    //     // echo json_encode($query);
    //     // return $this->db->get_where('tbl_sampah', ['id' => $id])->row_array();
    // }
}
