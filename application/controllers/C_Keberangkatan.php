<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Keberangkatan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if( is_null($this->session->nama) ){
            redirect('login');
        }
        $this->load->model('M_keberangkatan');
    }

	public function index()
	{
        $data['datas'] = $this->M_keberangkatan->get();
        $this->load->view('V_Keberangkatan', $data);
	}

    public function store(){
        $input = $this->input->post();
        $this->M_keberangkatan->insert($input);
        redirect('C_Keberangkatan');
        // var_dump($input);
    }

    public function update($id){
        $input = $this->input->post();
        $this->M_keberangkatan->update($id, $input);
        redirect('C_Keberangkatan');
    }

    public function destroy($id){
        $this->M_keberangkatan->delete($id);
        redirect('C_Keberangkatan');
    }
}