<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dipa extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get(){
        return $this->db->get('dipa')->result_array();
    }

    function insert($data){
        return $this->db->insert('dipa', $data);
    }

    function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('dipa', $data);
    }

    function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('dipa');
    }

    function getByMak($mak){
        $this->db->where('mak', $mak);
        return $this->db->get('dipa')->row_array();
    }

    function updateByMak($mak, $data){
        $this->db->where('mak', $mak);
        return $this->db->update('dipa', $data);
    }
}