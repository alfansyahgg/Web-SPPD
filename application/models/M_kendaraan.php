<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kendaraan extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get(){
        return $this->db->get('kendaraan')->result_array();
    }

    function insert($data){
        return $this->db->insert('kendaraan', $data);
    }

    function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('kendaraan', $data);
    }

    function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('kendaraan');
    }
}