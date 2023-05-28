<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get(){
        return $this->db->get('web_surat')->result_array();
    }

    function insert($data){
        return $this->db->insert('web_surat', $data);
    }

    function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('web_surat', $data);
    }

    function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('web_surat');
    }
}