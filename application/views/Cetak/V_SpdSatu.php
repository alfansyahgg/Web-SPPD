<?php

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

    <table class="garuda" style="width: 100%;">
        <tr>
            <td style="width: 40%;"></td>
            <td style="width: 5%;">

                <img style="width: 70px;height: 70px;" src="<?= base_url('assets/images/garuda.png') ?>" alt="">
            </td>
            <td style="font-size: 8px;width: 35%;">
                PERATURAN MENTERI KEUANGAN NOMOR :
                113/PMK.05/2012 TENTANG PERJALANAN DINAS
                JABATAN DALAM NEGERI BAGI PEJABAT NEGARA,
                PEGAWAI NEGERI, DAN PEGAWAI

            </td>
            <td style="width: 10%;"></td>
        </tr>
    </table>

    <div style="width: 100%;text-align: center;margin: 20px 0;">MENTERI KEUANGAN REPUBLIK INDONESIA
    </div>


    <div style="width: 100%;text-align: center;margin: 10px 0;">
        <div style="width: 55%;float: left;">

        </div>
        <div style="width: 45%;float: right;">
            <table class="garuda" style="width: 100%;">
                <tr>
                    <td style="width: 35;">Lembar ke</td>
                    <td style="font-size: 8px;width: 5%;margin-left: 70px;">
                        :
                    </td>
                    <td style="width: 60%;"> 1 (Satu)</td>
                </tr>
                <tr>
                    <td style="width: 35;">Kode No</td>
                    <td style="font-size: 8px;width: 5%;margin-left: 70px;">
                        :
                    </td>
                    <td style="width: 60%;">Satu</td>
                </tr>
                <tr>
                    <td style="width: 35;">Nomor</td>
                    <td style="font-size: 8px;width: 5%;margin-left: 70px;">
                        :
                    </td>
                    <td style="width: 60%;"><?= $datas[0]['no_surat'] ?></td>
                </tr>
            </table>

        </div>
    </div>

    <div style="width: 100%;">
        <p>
            SURAT PERJALANAN DINAS (SPD)
        </p>
        <table id="spd" style="width: 100%;">
            <tr>
                <td style="width: 5%;">
                    1.
                </td>
                <td>
                    Pejabat Pembuat Komitmen
                </td>
                <td style="width: 55%;">
                    Program Kependudukan dan KB Perwakilan BKKBN Provinsi Riau
                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    2.
                </td>
                <td>
                    Nama/NIP Pegawai yang melaksanakan perjalanan dinas
                </td>
                <td style="width: 55%;">
                    <?php 
                        foreach($datas as $data):                    
                    ?>
                    <p>
                        <?php 
                            $temp = explode(' / ', $data['nama']);
                            echo $temp[0] . ' / '.$temp[1]
                        ?>
                    </p>

                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    3.
                </td>
                <td>
                    <p>a. Pangkat dan Golongan</p>
                    <p>b. Jabatan / Instansi</p>
                    <p>c. Tingkat menurut peraturan Perjalanan Dinas</p>
                </td>
                <td style="width: 55%;">
                    <?php 
                        foreach($datas as $data):                    
                    ?>
                    <p>
                        <?php 
                            $temp = explode(' / ', $data['nama']);
                            echo $temp[2];
                        ?>
                    </p>

                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    4.
                </td>
                <td>
                    Maksud Perjalanan Dinas
                </td>
                <td style="width: 55%;">
                    <p>
                        <?= $datas[0]['judul_kegiatan'] ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    5.
                </td>
                <td>
                    Alat Angkut Yang dipergunakan
                </td>
                <td style="width: 55%;">
                    <p>
                        <?= $datas[0]['kendaraan'] ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    6.
                </td>
                <td>
                    <p>a. Tempat Berangkat</p>
                    <p>b. Tempat Tujuan</p>
                </td>
                <td style="width: 55%;">
                    <p>
                        <?= $datas[0]['berangkat'] ?>
                    </p>
                    <p>
                        <?= $datas[0]['tujuan'] ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    7.
                </td>
                <td>
                    <p>a. Lamanya Perjalanan Dinas</p>
                    <p>b. Tanggal Berangkat</p>
                    <p>c. Tanggal harus kembali/tiba di tempat baru *)</p>
                </td>
                <td style="width: 55%;">
                    <p>
                        <?= $datas[0]['lama'] ?> Hari
                    </p>
                    <p>
                        <?= tgl_indo($datas[0]['tanggal_berangkat']) ?>
                    </p>
                    <p>
                        <?= tgl_indo(date("Y-m-d", strtotime("+".$datas[0]['lama']." days", strtotime($datas[0]['tanggal_berangkat'])))) ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    8.
                </td>
                <td>
                    Nama Pengikut
                </td>
                <td style="width: 55%;">

                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    9.
                </td>
                <td>
                    <p>Pembebanan anggaran :</p>
                    <p>a. Instansi</p>
                    <p>b. Akun</p>
                </td>
                <td style="width: 55%;">
                    Perwakilan BKKBN Provinsi Riau
                </td>
            </tr>
            <tr>
                <td style="width: 5%;">
                    10.
                </td>
                <td>
                    Keterangan lain-lain
                </td>
                <td style="width: 55%;">

                </td>
            </tr>
        </table>
        <p style="margin-top: 10px;">
            *) Coret yang tidak perlu
        </p>

        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">Dikeluarkan di : Pekanbaru, </td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">Pada Tanggal : <?= tgl_indo(date('Y-m-d')) ?></td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">Pejabat Pembuat Komitmen Program Kependudukan dan Keluarga Berencana Nasional
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;height: 50px;">
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">
                    <?php
                    echo(explode(" / ", $datas[0]['pejabat_komitmen'])[0])
                 ?>
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">NIP.
                    <?php
                    echo(explode(" / ", $datas[0]['pejabat_komitmen'])[1])
                 ?>
                </td>
            </tr>
        </table>

    </div>

</body>

</html>