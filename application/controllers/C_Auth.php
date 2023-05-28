<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index()
	{
		$this->load->view('V_Auth');
	}

	public function login()
	{
        if( !is_null($this->session->nama) ){
            redirect('dashboard');
        }
        $data['users'] = $this->M_auth->getUsers();
		$this->load->view('V_Auth', $data);
	}

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

    public function auth(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->M_auth->getUserByUsername($username);
        if( count($cek) > 0 ){
            $hash = $cek[0]['password'];
            if( password_verify($password, $hash) ){

                $session['user_id'] = $cek[0]['id'];
                $session['username'] = $username;
                $session['nama']  = $cek[0]['nama'];
                $session['jabatan']  = $cek[0]['jabatan'];
                $session['wilayah']  = $cek[0]['wilayah'];
                $session['role']  = $cek[0]['role'];
                $session['logged_in'] = true;
                
			    $this->session->set_userdata($session);

                redirect('dashboard');
            }else{
                $this->session->set_flashdata('error', 'Password Salah');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('error', 'Username Tidak Ditemukan');
            redirect('login');
        }
        
        

    }
}