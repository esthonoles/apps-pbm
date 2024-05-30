<?php
class Transaksi_model extends CI_Model
{
    function getNasabahByid($id)
    {
        return $this->db->get_where('tbl_member', ['id' => $id])->row_array();
    }

    function getharga($id)
    {
    
        return $this->db->get_where('tbl_sampah', ['id'=>$id])->row();
    }

    function getsaldomember($id){
        return $this->db->get_where('tbl_transaksi',['id_nasabah' => $id])->result();
    }
    
}
