<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if( is_null($this->session->nama) ){
            redirect('login');
        }
        $this->load->model('M_input');
        $this->load->model('M_kendaraan');
        $this->load->model('M_surat');
        $this->load->model('M_keberangkatan');
        $this->load->model('M_tujuan');
        $this->load->model('M_dipa');
        $this->load->model('M_pegawai');
    }

	public function index()
	{
        redirect('dashboard');
	}

    public function dashboard()
	{
        if( $this->session->role != 'admin'){
            $data['input'] = count($this->M_input->getByUserId($this->session->user_id));

        }else{
            $data['input'] = count($this->M_input->get());
            $data['pegawai'] = count($this->M_pegawai->get());
        }
        $this->load->view('V_Index', $data);
	}
}