<?php
class Member_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
