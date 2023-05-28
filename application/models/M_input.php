<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_input extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get(){
        $sql = " select * from perjalanan_dinas pd inner join users us on pd.admin = us.id
        ";
        return $this->db->query($sql)->result_array();
    }

    function getById($id){
        $this->db->where('id', $id);
        return $this->db->get('perjalanan_dinas')->result_array();
    }

    function getByUserId($user_id){
        $this->db->where('admin', $user_id);
        $this->db->order_by('id_perjalanan', 'desc');
        return $this->db->get('perjalanan_dinas')->result_array();
    }

    function insertPerjalananDinas($data){
        $this->db->insert('perjalanan_dinas', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function insertPelaksana($data){
        $this->db->insert('pelaksana', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function updatePerjalananDinas($id_perjalanan, $data){
        $this->db->where('id_perjalanan', $id_perjalanan);
        $this->db->update('perjalanan_dinas', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function updatePelaksana($id_pelaksana, $data){
        $this->db->where('id_pelaksana', $id_pelaksana);
        $this->db->update('pelaksana', $data);
        
        $insert_id = $this->db->insert_id();
        return  $this->db->affected_rows();
    }

    function getPelaksanaCount($id_pelaksana){
        $this->db->where('id_pelaksana', $id_pelaksana);
        return count($this->db->get('pelaksana')->result_array());
    }

    function getDataSuratById($id){
        $sql = " select * from perjalanan_dinas pd inner join pelaksana ps on pd.id_perjalanan = ps.id_perjalanan
            where pd.id_perjalanan = $id
        ";
        return $this->db->query($sql)->result_array();
    }

    // function update($id, $data){
    //     $this->db->where('id', $id);
    //     return $this->db->update('dipa', $data);
    // }

    function delete($id){
        $this->db->where('id_perjalanan', $id);
        return $this->db->delete('perjalanan_dinas');
    }

    function insertFoto($data){
        $this->db->insert('foto', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function getPerjalananByMAK($mak){
        $sql = " select 
        pd.dipa,
        sum(ps.uang_harian) as uang_harian,
        sum(ps.uang_transport) as uang_transport,
        sum(ps.transport_lokal) as transport_lokal,
        sum(ps.uang_hotel) as uang_hotel,
        ( 
            sum(ps.uang_harian) + 
            sum(ps.uang_transport) +
            sum(ps.transport_lokal) +
            sum(ps.uang_hotel)
            ) as total
        from perjalanan_dinas pd 
        inner join pelaksana ps on pd.id_perjalanan = ps.id_perjalanan 
        inner join dipa on dipa.mak = pd.dipa
        where pd.dipa = '$mak' group by pd.dipa";
        return $this->db->query($sql)->result_array();
    }

    function updatePagu(){
        
    }
}