<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Tujuan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if( is_null($this->session->nama) ){
            redirect('login');
        }
        $this->load->model('M_tujuan');
    }

	public function index()
	{
        $data['datas'] = $this->M_tujuan->get();
        $this->load->view('V_Tujuan', $data);
	}

    public function store(){
        $input = $this->input->post();
        $this->M_tujuan->insert($input);
        redirect('C_Tujuan');
        // var_dump($input);
    }

    public function update($id){
        $input = $this->input->post();
        $this->M_tujuan->update($id, $input);
        redirect('C_Tujuan');
    }

    public function destroy($id){
        $this->M_tujuan->delete($id);
        redirect('C_Tujuan');
    }
}