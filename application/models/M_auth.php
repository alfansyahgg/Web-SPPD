<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getUserByUsername( $username ){
        $this->db->where('username', $username);
        return $this->db->get('users')->result_array();
    }

    function getUsers(){
        return $this->db->get('users')->result_array();
    }
}