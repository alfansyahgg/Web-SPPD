<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get(){
        return $this->db->get('users')->result_array();
    }

    function insert($data){
        return $this->db->insert('users', $data);
    }

    function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    function getByNama($nama){
        $this->db->where('nama', $nama);
        return $this->db->get('users')->result_array();
    }
}