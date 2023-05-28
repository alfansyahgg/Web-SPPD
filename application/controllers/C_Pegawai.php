<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pegawai extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if( is_null($this->session->nama) ){
            redirect('login');
        }
        $this->load->model('M_pegawai');
    }

	public function index()
	{
        $data['datas'] = $this->M_pegawai->get();
        $this->load->view('V_Pegawai', $data);
	}

    public function get(){
        $data['pegawai'] = $this->M_pegawai->get();
        echo json_encode($data);
    }

    public function store(){
        $input = $this->input->post();
        $input['password'] = password_hash('123', PASSWORD_DEFAULT);
        $this->M_pegawai->insert($input);
        redirect('C_Pegawai');
        // var_dump($input);
    }

    public function update($id){
        $input = $this->input->post();
        $this->M_pegawai->update($id, $input);
        redirect('C_Pegawai');
    }

    public function destroy($id){
        $this->M_pegawai->delete($id);
        redirect('C_Pegawai');
    }
}