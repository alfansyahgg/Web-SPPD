<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kendaraan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if( is_null($this->session->nama) ){
            redirect('login');
        }
        $this->load->model('M_kendaraan');
    }

	public function index()
	{
        $data['datas'] = $this->M_kendaraan->get();
        $this->load->view('V_Kendaraan', $data);
	}

    public function store(){
        $input = $this->input->post();
        $this->M_kendaraan->insert($input);
        redirect('C_Kendaraan');
        // var_dump($input);
    }

    public function update($id){
        $input = $this->input->post();
        $this->M_kendaraan->update($id, $input);
        redirect('C_Kendaraan');
    }

    public function destroy($id){
        $this->M_kendaraan->delete($id);
        redirect('C_Kendaraan');
    }
}