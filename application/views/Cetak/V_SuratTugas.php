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
    <div class="tengah" style="text-align: center;margin-bottom: 20px   ;">
        <h3>
            SURAT TUGAS
        </h3>
        <h4 style="">
            Nomor : <?= $datas[0]['no_surat'] ?>
        </h4>
    </div>
    <div class="konten">
        <table id="atas" style="width: 100%;">
            <tr>
                <td style="width: 15%;">Menimbang</td>
                <td style="width: 5%;">:</td>
                <td style="">
                    <?php 
                    
                    echo implode("<br>", explode(PHP_EOL, $datas[0]['menimbang']))
                    
                    ?>
                </td>
            </tr>

            <tr>
                <td style="width: 15%;">Dasar</td>
                <td style="width: 5%;">:</td>
                <td style="">
                    <?php 
                    
                    echo implode("<br>", explode(PHP_EOL, $datas[0]['dasar']))
                    
                    ?>
                </td>
            </tr>

            <tr>
                <td style="width: 15%;">Kepada</td>
                <td style="width: 5%;">:</td>
                <td style="">
                    <?php foreach($datas as $key => $data): ?>
                    <p>
                        <?= $key + 1 . '. ' ?>
                        <?= $data['nama'] ?>
                    </p>
                    <?php endforeach; ?>
                </td>
            </tr>

            <tr>
                <td style="width: 15%;">Untuk</td>
                <td style="width: 5%;">:</td>
                <td style="">
                    <?= $datas[0]['judul_kegiatan'] ?>
                </td>
            </tr>

            <tr>
                <td style="width: 15%;">Kendaraan</td>
                <td style="width: 5%;">:</td>
                <td style="">
                    <?= $datas[0]['kendaraan'] ?>
                </td>
            </tr>

            <tr>
                <td style="width: 15%;">Tempat</td>
                <td style="width: 5%;">:</td>
                <td style="">
                    <?= $datas[0]['berangkat'] . ' --> ' . $datas[0]['tujuan'] ?>
                </td>
            </tr>

            <tr>
                <td style="width: 15%;">Selama/hari</td>
                <td style="width: 5%;">:</td>
                <td style="">
                    <?= $datas[0]['lama'] . ' Hari / ' . tgl_indo($datas[0]['tanggal_berangkat']) . ' --> '. tgl_indo(date("Y-m-d", strtotime("+".$datas[0]['lama']." days", strtotime($datas[0]['tanggal_berangkat'])))) ?>
                </td>
            </tr>

            <tr>
                <td style="width: 15%;">Biaya</td>
                <td style="width: 5%;">:</td>
                <td style="">
                    <?= $datas[0]['sumber_dana'] ?>
                </td>
            </tr>
        </table>

        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">Pekanbaru, <?= tgl_indo(date('Y-m-d')) ?></td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">Yang Memberi Tugas,</td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">Kepala</td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;height: 100px;">
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">Dra. Mardalena Wati Yulia, M.Si
                </td>
            </tr>
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">NIP. 19670329 199303 2 001
                </td>
            </tr>
        </table>
    </div>
</body>

</html>