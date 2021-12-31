<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kalender_kegiatan_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tbl_kalenderkegiatan')->row();
    }
    
    // update data
    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_kalenderkegiatan', $data);
    }

    function get_all()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('tbl_kalenderkegiatan')->result();
    }
}