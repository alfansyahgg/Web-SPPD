<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tujuan extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get(){
        return $this->db->get('tujuan')->result_array();
    }

    function insert($data){
        return $this->db->insert('tujuan', $data);
    }

    function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('tujuan', $data);
    }

    function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('tujuan');
    }
}