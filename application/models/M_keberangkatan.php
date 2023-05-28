<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keberangkatan extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get(){
        return $this->db->get('kota_keberangkatan')->result_array();
    }

    function insert($data){
        return $this->db->insert('kota_keberangkatan', $data);
    }

    function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('kota_keberangkatan', $data);
    }

    function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('kota_keberangkatan');
    }
}