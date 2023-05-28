<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Surat extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if( is_null($this->session->nama) ){
            redirect('login');
        }
        $this->load->model('M_surat');
    }

	public function index()
	{
        $data['datas'] = $this->M_surat->get();
        $this->load->view('V_Surat', $data);
	}

    public function store(){
        $input = $this->input->post();
        $this->M_surat->insert($input);
        redirect('C_Surat');
        // var_dump($input);
    }

    public function update($id){
        $input = $this->input->post();
        $this->M_surat->update($id, $input);
        redirect('C_Surat');
    }

    public function destroy($id){
        $this->M_surat->delete($id);
        redirect('C_Surat');
    }
}