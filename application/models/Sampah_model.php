<?php
class Sampah_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }
    // function update_data($data, $table)
    // {
    //     // $this->db->set($data);
    //     $this->db->where('id', $data['id']);
    //     $this->db->update($table, $data);
    // }

    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
