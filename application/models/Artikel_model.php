<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

    public $table = 'tbl_artikel';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function select_by_range($offset)
    {
    	$q = "SELECT * FROM 'tbl_artikel' ORDER BY tanggal_artikel DESC LIMIT 10 OFFSET ".$offset.";"
    }


}

/* End of file Setting_app_model.php */
/* Location: ./application/models/Setting_app_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-22 11:03:00 */
/* http://harviacode.com */