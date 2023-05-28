<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Cetak extends CI_Controller {

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

    public function suratTugas($id){
        require_once 'application/third_party/mpdf/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
        $mpdf->showImageErrors = true;

        $surat = $this->M_input->getDataSuratById($id);
        // echo "<pre>";print_r($surat);exit();
        $data['datas'] = $surat;
        $html = $this->load->view('Cetak/V_SuratTugas', $data, true);
        $stylesheet = file_get_contents(base_url('assets/css/cetak_surat_tugas.css'));
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output('Surat_Tugas.pdf', 'I');
    }

    public function spd1($id){
        require_once 'application/third_party/mpdf/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
        $mpdf->showImageErrors = true;

        $surat = $this->M_input->getDataSuratById($id);
        $data['datas'] = $surat;
        $data['pejabat_komitmen'] = $this->M_pegawai->getByNama($surat[0]['pejabat_komitmen']);
        $data['pejabat_persetujuan'] = $this->M_pegawai->getByNama($surat[0]['pejabat_persetujuan']);
        // echo "<pre>";print_r($surat);exit();
        $html = $this->load->view('Cetak/V_SpdSatu', $data, true);
        $stylesheet = file_get_contents(base_url('assets/css/cetak_spd1.css'));
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output('SPD1.pdf', 'I');
    }

    public function spd2($id){
        require_once 'application/third_party/mpdf/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
        $mpdf->showImageErrors = true;

        $surat = $this->M_input->getDataSuratById($id);
        $data['datas'] = $surat;
        $data['pejabat_komitmen'] = $this->M_pegawai->getByNama($surat[0]['pejabat_komitmen']);
        $data['pejabat_persetujuan'] = $this->M_pegawai->getByNama($surat[0]['pejabat_persetujuan']);
        // echo "<pre>";print_r($surat);exit();
        $html = $this->load->view('Cetak/V_SpdDua', $data, true);
        $stylesheet = file_get_contents(base_url('assets/css/cetak_spd2.css'));
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output('SPD2.pdf', 'I');
    }

    public function kwitansi($id){
        require_once 'application/third_party/mpdf/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
        $mpdf->showImageErrors = true;

        $surat = $this->M_input->getDataSuratById($id);
        $data['datas'] = $surat;
        $data['pejabat_komitmen'] = $this->M_pegawai->getByNama($surat[0]['pejabat_komitmen']);
        $data['pejabat_persetujuan'] = $this->M_pegawai->getByNama($surat[0]['pejabat_persetujuan']);
        // echo "<pre>";print_r($surat);exit();
        $html = $this->load->view('Cetak/V_Kwitansi', $data, true);
        $stylesheet = file_get_contents(base_url('assets/css/cetak_kwitansi.css'));
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output('Kwitansi.pdf', 'I');
    }

    public function pernyataan($id){
        require_once 'application/third_party/mpdf/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
        $mpdf->showImageErrors = true;

        $surat = $this->M_input->getDataSuratById($id);
        $data['datas'] = $surat;
        $data['pejabat_komitmen'] = $this->M_pegawai->getByNama($surat[0]['pejabat_komitmen']);
        $data['pejabat_persetujuan'] = $this->M_pegawai->getByNama($surat[0]['pejabat_persetujuan']);
        // echo "<pre>";print_r($surat);exit();
        $html = $this->load->view('Cetak/V_Pernyataan', $data, true);
        $stylesheet = file_get_contents(base_url('assets/css/cetak_pernyataan.css'));
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output('PernyataanTransportasiLokal.pdf', 'I');
    }

    public function laporan($id){
        require_once 'application/third_party/mpdf/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
        $mpdf->showImageErrors = true;

        $surat = $this->M_input->getDataSuratById($id);
        $data['datas'] = $surat;
        $data['pejabat_komitmen'] = $this->M_pegawai->getByNama($surat[0]['pejabat_komitmen']);
        $data['pejabat_persetujuan'] = $this->M_pegawai->getByNama($surat[0]['pejabat_persetujuan']);
        // echo "<pre>";print_r($surat);exit();
        $html = $this->load->view('Cetak/V_Laporan', $data, true);
        $stylesheet = file_get_contents(base_url('assets/css/cetak_laporan.css'));
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($html, 2);
        $mpdf->Output('Laporan.pdf', 'I');
    }
    
}