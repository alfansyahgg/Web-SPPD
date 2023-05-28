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

function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
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

    <table style="margin-top: 20px;">
        <tr>
            <td>Lampiran SPD Nomor</td>
            <td style="width: 20%;text-align: center;">:</td>
            <td><?= $datas[0]['no_surat'] ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td style="width: 20%;text-align: center;">:</td>
            <td><?= tgl_indo($datas[0]['tanggal_surat']) ?></td>
        </tr>
    </table>

    <table id="biaya" style="margin-top: 20px;width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>PERINCIAN BIAYA</th>
                <th>JUMLAH</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Uang Harian</td>
                <td style="text-align: right;">Rp. <?= number_format($data['uang_harian'], 0, 0, '.') ?> </td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Transport</td>
                <td style="text-align: right;">Rp. <?= number_format($data['uang_transport'], 0, 0, '.') ?></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Penginapan</td>
                <td style="text-align: right;">Rp. <?= number_format($data['uang_hotel'], 0, 0, '.') ?></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Representasi</td>
                <td style="text-align: right;">Rp. <?= number_format($data['uang_representatif'], 0, 0, '.') ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;font-weight: bold;">JUMLAH</td>
                <td style="text-align: right;">Rp. <?= number_format($jumlah, 0, 0, '.') ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div style="width: 100%;margin-top: 10px;">
        <span>Terbilang :</span>
        <span>
            <?= ucwords(terbilang($jumlah)). ' Rupiah' ?>
        </span>
    </div>


    <div style="width: 100%;margin-top: 20px;">
        <div style="float: left;width: 60%;">
            <p>Telah dibayar</p>
            <p>sejumlah uang sebesar</p>
            <p>
                Rp. <?= number_format($jumlah, 0, 0, '.') ?>
            </p>
            <p>
                Bendahara Pengeluaran
            </p>
            <p style="height: 70px;">

            </p>
            <p>
                <?= explode(" / ", $data['bendahara'])[0] ?>
            </p>
            <p>
                NIP. <?= explode(" / ", $data['bendahara'])[1] ?>
            </p>
        </div>
        <div style="float: right;width: 40%;">
            <p>Pekanbaru, 23 April 2021</p>
            <p>Telah menerima</p>
            <p>sejumlah uang sebesar</p>
            <p>
                Rp. <?= number_format($jumlah, 0, 0, '.') ?>
            </p>
            <p>
                Yang Menerima
            </p>
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

    <div style="width: 100%;margin-top: 30px;">
        <h3 style="text-align: center;">
            PERHITUNGAN SPD RAMPUNG
        </h3>
        <table class="perhitunganSpd" style="width: 100%;margin-top: 10px;">
            <tr>
                <td style="text-align: left;">Ditetapkan Sejumlah</td>
                <td style="text-align: right;width: 5%;">:</td>
                <td style="text-align: left;">Rp. <?= number_format($jumlah, 0, 0, '.') ?></td>
            </tr>
            <tr>
                <td style="text-align: left;">Yang telah dibayarkan semula</td>
                <td style="text-align: right;width: 5%;">:</td>
                <td style="text-align: left;"> </td>
            </tr>
            <tr>
                <td style="text-align: left;">Sisa kurang / lebih</td>
                <td style="text-align: right;width: 5%;">:</td>
                <td style="text-align: left;"> </td>
            </tr>
        </table>

        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">&nbsp;</td>
                <td style="width: 50%;">Pejabat Pembuat Komitmen Program Kependudukan dan KB
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
    <pagebreak />
    <?php endforeach; ?>
</body>

</html>