<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Input extends CI_Controller {

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
        if( $this->session->role != 'admin'){
            $data['datas'] = $this->M_input->getByUserId($this->session->user_id);

        }else{
            $data['datas'] = $this->M_input->get();
        }
        // echo "<pre>";print_r($data['datas']);exit();
        $this->load->view('V_IndexInput', $data);
	}

    public function input(){

        // $as = $this->M_input->getPerjalananByMAK('505113')[0];
        // echo "<pre>";print_r($as);exit();

        $data['pegawai'] = $this->M_pegawai->get();
        $data['keberangkatan'] = $this->M_keberangkatan->get();
        $data['tujuan'] = $this->M_tujuan->get();
        $data['kendaraan'] = $this->M_kendaraan->get();
        $data['kendaraan'] = $this->M_kendaraan->get();
        $data['surat'] = $this->M_surat->get();
        $data['dipa'] = $this->M_dipa->get();
        $this->load->view('V_Input', $data);
    }

    public function edit($id){
        $data['pegawai'] = $this->M_pegawai->get();
        $data['keberangkatan'] = $this->M_keberangkatan->get();
        $data['tujuan'] = $this->M_tujuan->get();
        $data['kendaraan'] = $this->M_kendaraan->get();
        $data['kendaraan'] = $this->M_kendaraan->get();
        $data['surat'] = $this->M_surat->get();
        $data['dipa'] = $this->M_dipa->get();

        $data['res'] = $this->M_input->getDataSuratById($id);
        // echo "<pre>";print_r($data['pegawai']);exit();
        $this->load->view('V_Edit', $data);
    }

    public function getEdit($id){
        $data['result'] = $this->M_input->getDataSuratById($id);
        $data['pegawai'] = $this->M_pegawai->get();
        echo json_encode($data);
    }

    public function destroy($id){
        $this->M_input->delete($id);
        redirect('C_Input');
    }

    public function inputPerjalananDinas(){
        // $all = $this->input->post();
        // print_r($web_no_surat);die();
        
        $web_no_surat = $this->M_surat->get();
        $no_surat = $this->input->post('no_surat');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $kendaraan = $this->input->post('kendaraan');
        $sumber_dana = $this->input->post('sumber_dana');
        $dipa = $this->input->post('dipa');
        $judul_kegiatan = $this->input->post('judul_kegiatan');
        $berangkat = $this->input->post('berangkat');
        $tujuan = $this->input->post('tujuan');
        $tanggal_berangkat = $this->input->post('tanggal_berangkat');
        $lama = $this->input->post('lama');
        $pejabat_persetujuan = $this->input->post('pejabat_persetujuan');
        $pejabat_komitmen = $this->input->post('pejabat_komitmen');
        $bendahara = $this->input->post('bendahara');
        $menimbang = $this->input->post('menimbang');
        $dasar = $this->input->post('dasar');

        // echo "<pre>";print_r($menimbang);exit();      

        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 5192;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);
        $this->upload->do_upload('dokumen');
        $dokumen_name = str_replace(" ", "_", $_FILES['dokumen']['name']);
        
        
        // echo "<pre>";print_r($dokumen_name);exit();


        $dataPerjalananDinas = [
            'no_surat' => $web_no_surat[0]['awal'].'/'.$no_surat.'/'.$web_no_surat[0]['akhir'],
            'tanggal_surat' => $tanggal_surat,
            'kendaraan' => $kendaraan,
            'sumber_dana' => $sumber_dana,
            'dipa' => $dipa,
            'judul_kegiatan' => $judul_kegiatan,
            'berangkat' => $berangkat,
            'tujuan' => $tujuan,
            'tanggal_berangkat' => $tanggal_berangkat,
            'lama' => $lama,
            'pejabat_persetujuan' => $pejabat_persetujuan,
            'pejabat_komitmen' => $pejabat_komitmen,
            'bendahara' => $bendahara,
            'menimbang' => $menimbang,
            'dasar' => $dasar,
            'admin' => $this->session->user_id,
            'dokumen' => $dokumen_name
        ];

        $id_perjalanan_dinas = $this->M_input->insertPerjalananDinas($dataPerjalananDinas);

        $files = $_FILES;
        $cpt = count($_FILES['foto']['name']);
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['foto']['name']= $files['foto']['name'][$i];
            $_FILES['foto']['type']= $files['foto']['type'][$i];
            $_FILES['foto']['tmp_name']= $files['foto']['tmp_name'][$i];
            $_FILES['foto']['error']= $files['foto']['error'][$i];
            $_FILES['foto']['size']= $files['foto']['size'][$i]; 

            $this->upload->do_upload('foto');
            $this->M_input->insertFoto([
                'id_perjalanan' => $id_perjalanan_dinas,
                'nama' => str_replace(" ", "_", $files['foto']['name'][$i])
            ]);
            $dataInfo[] = $this->upload->data();
        }


        $nama_pelaksana = $this->input->post('nama_pelaksana[]');
        $uang_harian = $this->input->post('uang_harian[]');
        $uang_transport = $this->input->post('uang_transport[]');
        $transport_lokal = $this->input->post('transport_lokal[]');
        $uang_hotel = $this->input->post('uang_hotel[]');
        $uang_representatif = $this->input->post('uang_hotel[]');
        for($i = 0; $i < count($nama_pelaksana);$i++){
            if($nama_pelaksana[$i] != ""){
                $dataPelaksana = [
                    'id_perjalanan' => $id_perjalanan_dinas,
                    'nama' => $nama_pelaksana[$i],
                    'uang_harian' => $uang_harian[$i],
                    'uang_transport' => $uang_transport[$i],
                    'transport_lokal' => $transport_lokal[$i],
                    'uang_hotel' => $uang_hotel[$i],
                    'uang_representatif' => $uang_representatif[$i],
                ];

                $this->M_input->insertPelaksana($dataPelaksana);
            }
        }

        

        // echo "<pre>";print_r($dipanow);exit();

        $this->M_surat->update(1, [
            'awal' => $web_no_surat[0]['awal'] + 1
        ]);

        redirect('C_Input');
    }
    

    public function updatePerjalananDinas(){
        $id_perjalanan = $this->input->post('id_perjalanan');
        $result = $this->M_input->getDataSuratById($id_perjalanan);
        // echo "<pre>";print_r($result);exit();
        $web_no_surat = explode("/", $result[0]['no_surat']);
        $no_surat = $this->input->post('no_surat');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $kendaraan = $this->input->post('kendaraan');
        $sumber_dana = $this->input->post('sumber_dana');
        $dipa = $this->input->post('dipa');
        $judul_kegiatan = $this->input->post('judul_kegiatan');
        $berangkat = $this->input->post('berangkat');
        $tujuan = $this->input->post('tujuan');
        $tanggal_berangkat = $this->input->post('tanggal_berangkat');
        $lama = $this->input->post('lama');
        $pejabat_persetujuan = $this->input->post('pejabat_persetujuan');
        $pejabat_komitmen = $this->input->post('pejabat_komitmen');
        $bendahara = $this->input->post('bendahara');
        $menimbang = $this->input->post('menimbang');
        $dasar = $this->input->post('dasar');

        // echo "<pre>";print_r($pejabat_komitmen);exit();

        $dataPerjalananDinas = [
            'no_surat' => $web_no_surat[0].'/'.$no_surat.'/'.$web_no_surat[2],
            'tanggal_surat' => $tanggal_surat,
            'kendaraan' => $kendaraan,
            'sumber_dana' => $sumber_dana,
            'dipa' => $dipa,
            'judul_kegiatan' => $judul_kegiatan,
            'berangkat' => $berangkat,
            'tujuan' => $tujuan,
            'tanggal_berangkat' => $tanggal_berangkat,
            'lama' => $lama,
            'pejabat_persetujuan' => $pejabat_persetujuan,
            'pejabat_komitmen' => $pejabat_komitmen,
            'bendahara' => $bendahara,
            'menimbang' => $menimbang,
            'dasar' => $dasar,
            'admin' => $this->session->user_id
        ];

        $id_perjalanan_dinas = $this->M_input->updatePerjalananDinas($id_perjalanan, $dataPerjalananDinas);


        $id_pelaksana = $this->input->post('id_pelaksana[]');
        $nama_pelaksana = $this->input->post('nama_pelaksana[]');
        $uang_harian = $this->input->post('uang_harian[]');
        $uang_transport = $this->input->post('uang_transport[]');
        $transport_lokal = $this->input->post('transport_lokal[]');
        $uang_hotel = $this->input->post('uang_hotel[]');
        $uang_representatif = $this->input->post('uang_hotel[]');
        for($i = 0; $i < count($nama_pelaksana);$i++){
            if($nama_pelaksana[$i] != ""){
                $dataPelaksana = [
                    'nama' => $nama_pelaksana[$i],
                    'uang_harian' => $uang_harian[$i],
                    'uang_transport' => $uang_transport[$i],
                    'transport_lokal' => $transport_lokal[$i],
                    'uang_hotel' => $uang_hotel[$i],
                    'uang_representatif' => $uang_representatif[$i],
                ];

                $stat = $this->M_input->getPelaksanaCount($id_pelaksana[$i]);
                // echo "<pre>";print_r($stat);exit();
                if($stat < 1){
                    $dataPelaksana['id_perjalanan'] = $id_perjalanan;
                    $this->M_input->insertPelaksana($dataPelaksana);
                }
            }
        }

        redirect('C_Input');
    }
}