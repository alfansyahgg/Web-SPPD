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
    <?php
    $jumlah = 0;
    foreach($datas as $key => $data):
            $jumlah = $data['uang_harian'] + $data['uang_transport'] + $data['uang_hotel'] + $data['uang_representatif']; 
?>
    <table class="garuda" style="width: 100%;">
        <tr>
            <td style="width: 40%;"></td>
            <td style="width: 5%;">

                <img style="width: 70px;height: 70px;" src="<?= base_url('assets/images/garuda.png') ?>" alt="">
            </td>
            <td style="width: 10%;"></td>
        </tr>
    </table>
    <div style="width: 100%;text-align: center;margin: 5px 0;">MENTERI KEUANGAN REPUBLIK INDONESIA
    </div>
    <div style="width: 100%;text-align: center;margin: 5px 0;">DAFTAR PENGELUARAN RIIL
    </div>
    <div style="width: 100%;margin-top: 20px;">Yang bertanda tangan di bawah ini :
    </div>

    <table style="margin-top: 5px;margin-left: 20px;">
        <tr>
            <td style="width: 50%;">Nama</td>
            <td style="width: 20%;text-align: center;">:</td>
            <td><?= explode(" / ", $data['nama'])[0] ?></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td style="width: 20%;text-align: center;">:</td>
            <td><?= explode(" / ", $data['nama'])[1] ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td style="width: 20%;text-align: center;">:</td>
            <td><?= explode(" / ", $data['nama'])[2] ?></td>
        </tr>
    </table>

    <div style="width: 100%;margin-top: 10px;">
        <span>
            Berdasarkan surat perjalanan dinas ( SPD ) nomor : <?= $data['no_surat']  ?> tanggal
            <?=  tgl_indo($data['tanggal_surat']) ?>,
            dengan ini kami menyatakan dengan sesungguhnya bahwa :
        </span>
    </div>

    <div style="width: 100%;margin-top: 10px;">
        <p>
            1. Biaya transport pegawai dan / atau biaya penginapan dibawah ini tidak dapat diperoleh bukti bukti
            pengeluarannya, meliputi :
        </p>

        <table id="biaya" style="margin: 20px 0;width: 100%;">
            <thead style="text-align: center;">
                <tr>
                    <th>No</th>
                    <th>Uraian</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        Transport : <br>
                        Transport PP : <?= $data['berangkat'] ?> - <?= $data['tujuan'] ?>
                    </td>
                    <td style="text-align: right;vertical-align: bottom;">
                        Rp. <?= number_format($data['transport_lokal'], 0, 0, '.') ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;font-weight: bold;">
                        TOTAL
                    </td>
                    <td style="text-align: right;">
                        Rp. <?= number_format($data['transport_lokal'], 0, 0, '.') ?>
                    </td>
                </tr>
            </tbody>
        </table>


        <p>
            2. Jumlah uang tersebut pada angka 1 di atas untuk pelaksanaan perjalanan dinas dimaksud dan
            apabila dikemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk
            menyetorkan kelebihan tersebut kepada kas negara.
        </p>


        <p style="margin: 20px 0;">
            Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.

        </p>
    </div>

    <div style="width: 100%;margin-top: 20px;">
        <div style="float: left;width: 60%;">
            <p>Mengetahui / Menyetujui</p>
            <p>Pejabat Pembuat Komitmen</p>
            <p>Program KKBPK
            </p>
            <p style="height: 70px;">

            </p>
            <p>
                <?= explode(" / ", $data['pejabat_komitmen'])[0] ?>
            </p>
            <p>
                NIP. <?= explode(" / ", $data['pejabat_komitmen'])[1] ?>
            </p>
        </div>
        <div style="float: right;width: 40%;">
            <p>Kota Pekanbaru, <?= tgl_indo(date('Y-m-d')) ?></p>
            <p>Pelaksana,</p>
            <p style="height: 70px;">

            </p>
            <p>
                <?= explode(" / ", $data['nama'])[0] ?>
            </p>
            <p>
                NIP. <?= explode(" / ", $data['nama'])[1] ?>
            </p>
        </div>
    </div>


    <pagebreak />
    <?php endforeach; ?>


</body>

</html>