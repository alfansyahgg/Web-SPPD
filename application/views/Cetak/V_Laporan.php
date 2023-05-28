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
    <div style="width: 100%;text-align: center;">
        <h3>
            LAPORAN KEGIATAN
        </h3>
        <p>
            <?= $datas[0]['judul_kegiatan'] ?>
        </p>
    </div>
    <p style="margin-top: 30px;font-weight: bold;">
        I. DASAR
    </p>
    <p>
        Surat Tugas Kepala Perwakilan BKKBN Provinsi Riau, <?= $datas[0]['no_surat'] ?> , pada tanggal
        <?= tgl_indo($datas[0]['tanggal_surat']) ?>
    </p>


    <p style="margin-top: 20px;font-weight: bold;">
        II. TUJUAN
    </p>
    <p style="margin-left: 20px;">
        Terlaksananya kegiatan <?= $datas[0]['judul_kegiatan'] ?>
    </p>


    <p style="margin-top: 20px;font-weight: bold;">
        III. PEMBIAYAAN
    </p>
    <p style="margin-left: 20px;">
        Kegiatan ini dibiayai dari <?= $datas[0]['sumber_dana'] ?>
    </p>

    <p style="margin-top: 20px;font-weight: bold;">
        IV. TEMPAT DAN TANGGAL
    </p>
    <p style="margin-left: 20px;">
        - Berangkat dari <?=  $datas[0]['berangkat'] ?>
    </p>
    <p style="margin-left: 20px;">
        - Tujuan : <?=  $datas[0]['tujuan'] ?>
    </p>

    <p style="margin-top: 20px;font-weight: bold;">
        V. URAIAN
    </p>
    <p style="margin-left: 20px;">
        <b>
            ..........................................................................
        </b>
    </p>

    <div style="width: 100%;margin-top: 30px;">
        <div style="float: left;width: 60%;">

        </div>
        <div style="float: right;width: 30%;">
            <p style="text-align: right;">
                Pekanbaru, 23 April 2021
            </p>
            <p style="height: 70px;">

            </p>
            <p style="text-align: right;">
                <?= explode(" / ", $data['nama'])[0] ?>
            </p>
            <p style="text-align: right;">
                NIP. <?= explode(" / ", $data['nama'])[1] ?>
            </p>
        </div>

    </div>
    <pagebreak />
    <?php endforeach; ?>


</body>

</html>