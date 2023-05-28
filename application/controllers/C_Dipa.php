<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dipa extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if( is_null($this->session->nama) ){
            redirect('login');
        }
        $this->load->model('M_dipa');
        $this->load->model('M_input');
    }

	public function index()
	{
        $datadipa = $this->M_dipa->get();
        foreach($datadipa as $dt){
            $dipanow = $this->M_dipa->getByMak($dt['mak']);
            $mny = $this->M_input->getPerjalananByMAK($dt['mak'])[0];

            $upDipa = [
                'terpakai' => $mny['total'],
                'sisa' => ($dipanow['pagu'] - $mny['total'])
            ];

            $this->M_dipa->updateByMak($dt['mak'], $upDipa);
        }
        $data['datas'] = $this->M_dipa->get();
        $this->load->view('V_Dipa', $data);
	}

    public function store(){
        $input = $this->input->post();
        $this->M_dipa->insert($input);
        redirect('C_dipa');
        // var_dump($input);
    }

    public function update($id){
        $input = $this->input->post();
        $this->M_dipa->update($id, $input);
        redirect('C_dipa');
    }

    public function destroy($id){
        $this->M_dipa->delete($id);
        redirect('C_dipa');
    }
}