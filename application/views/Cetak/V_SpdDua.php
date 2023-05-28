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
            <td style="width: 10%;"></td>
        </tr>
    </table>
    <div style="width: 100%;text-align: center;margin: 5px 0;">MENTERI KEUANGAN REPUBLIK INDONESIA
    </div>

    <table id="main" style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <div style="width: 100%;display: block;background-color: green;"></div>
            </td>
            <td style="height: 150px;width: 50%;">
                <table class="inside">
                    <tr>
                        <td>
                            I.
                        </td>
                        <td>
                            Berangkat Dari
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= $datas[0]['berangkat'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Ke
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= $datas[0]['tujuan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pada Tanggal
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= tgl_indo($datas[0]['tanggal_berangkat']) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Pejabat Pembuat Komitmen
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Program Kependudukan dan KB
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <?= explode(" / ", $datas[0]['pejabat_komitmen'])[0] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP. <?= explode(" / ", $datas[0]['pejabat_komitmen'])[1] ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- Row Dua -->
        <tr>
            <td style="width: 50%;">

                <table class="inside">
                    <tr>
                        <td>
                            II.
                        </td>
                        <td>
                            Tiba Di
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= $datas[0]['tujuan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pada Tanggal
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= tgl_indo($datas[0]['tanggal_berangkat']) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Jabatan
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Nama :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP.
                        </td>
                    </tr>
                </table>
            </td>
            <td style="height: 150px;width: 50%;">
                <table class="inside">
                    <tr>
                        <td>
                            <span style="visibility: hidden;">I.</span>
                        </td>
                        <td>
                            Berangkat Dari
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= $datas[0]['tujuan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Ke
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= $datas[0]['berangkat'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pada Tanggal
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= tgl_indo(date("Y-m-d", strtotime("+".$datas[0]['lama']." days", strtotime($datas[0]['tanggal_berangkat'])))) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Pejabat Pembuat Komitmen
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Program Kependudukan dan KB
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Nama :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Row Tiga -->
        <tr>
            <td style="width: 50%;">

                <table class="inside">
                    <tr>
                        <td>
                            III.
                        </td>
                        <td>
                            Tiba Di
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pada Tanggal
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Jabatan
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Nama :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP.
                        </td>
                    </tr>
                </table>
            </td>
            <td style="height: 150px;width: 50%;">
                <table class="inside">
                    <tr>
                        <td>
                            <span style="visibility: hidden;">I.</span>
                        </td>
                        <td>
                            Berangkat Dari
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Ke
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pada Tanggal
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Jabatan
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Nama :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Row Empat -->
        <tr>
            <td style="width: 50%;">

                <table class="inside">
                    <tr>
                        <td>
                            IV.
                        </td>
                        <td>
                            Tiba Di
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pada Tanggal
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Jabatan
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Nama :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP.
                        </td>
                    </tr>
                </table>
            </td>
            <td style="height: 150px;width: 50%;">
                <table class="inside">
                    <tr>
                        <td>
                            <span style="visibility: hidden;">I.</span>
                        </td>
                        <td>
                            Berangkat Dari
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Ke
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pada Tanggal
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td style="width: 50%;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Jabatan
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            Nama :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Row Lima -->
        <tr>
            <td style="width: 50%;">

                <table class="inside" style="width: 100%;">
                    <tr>
                        <td style="width: 5%;">
                            V.
                        </td>
                        <td>
                            Tiba Di
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td>
                            <?= $datas[0]['berangkat'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pada Tanggal
                        </td>
                        <td style="width: 5%;">
                            :
                        </td>
                        <td> <?= tgl_indo(date("Y-m-d", strtotime("+".$datas[0]['lama']." days", strtotime($datas[0]['tanggal_berangkat'])))) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Pejabat Pembuat Komitmen
                        </td>
                        <td style="width: 5%;">
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            Program Kependudukan <br>
                            dan Keluarga Berencana Nasional
                        </td>
                        <td style="width: 5%;">
                        </td>
                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>

                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <?= explode(" / ", $datas[0]['pejabat_komitmen'])[0] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP. <?= explode(" / ", $datas[0]['pejabat_komitmen'])[1] ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="height: 150px;width: 50%;">
                <table class="inside">
                    <tr>
                        <td>
                            <span style="visibility: hidden;">I.</span>
                        </td>
                        <td>
                            Telah diperiksa dengan keterangan bahwa perjalanan <br>
                            tersebut atas perintahnya dan semata-mata untuk <br>
                            kepentingan jabatan dalam waktu sesingkat-singkatnya. <br>
                            Pejabat Pembuat Komitmen Program Kependudukan <br>
                            dan Keluarga Berencana Nasional
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td style="height: 50px;">

                        </td>
                    </tr>

                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            <?= explode(" / ", $datas[0]['pejabat_komitmen'])[0] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                        <td>
                            NIP. <?= explode(" / ", $datas[0]['pejabat_komitmen'])[1] ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <span>
                    VI. Catatan Lain Lain
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="perhatian">
                    <tr>
                        <td>VII.</td>
                        <td>PERHATIAN :</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang
                            mengesahkan tanggal <br>
                            berangkat/tiba, serta bendaharawan pengeluaran bertanggung-jawab berdasarkan
                            peraturan-peraturan Keuangan <br>
                            negara apabila negara menderita rugi akibat kesalahan, kelalaian, dan kealpaannya. <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>