<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>


    <?php $this->load->view('template/styles'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>



        <?php $this->load->view('template/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Input Perjalanan Dinas</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <form action="<?= base_url('C_Input/updatePerjalananDinas') ?>" method="post">
                        <div class="form">
                            <input type="hidden" name="id_perjalanan" value="<?= $res[0]['id_perjalanan'] ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Administrator</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control"
                                                value="<?= $this->session->nama; ?>" name="admin">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">No Surat</label>
                                        <div class="col-sm-10">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <?php
                                                            echo(explode("/", $res[0]['no_surat'])[0])
                                                        ?>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="no_surat"
                                                    value="<?php echo(explode("/", $res[0]['no_surat'])[1])?>">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <?php
                                                            echo(explode("/", $res[0]['no_surat'])[2])
                                                        ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Tanggal Surat</label>
                                        <input required type="date" name="tanggal_surat" class="form-control"
                                            value="<?= $res[0]['tanggal_surat'] ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Kendaraan</label>
                                        <select class="form-control" name="kendaraan">
                                            <?php foreach($kendaraan as $kd): ?>
                                            <option <?php if($res[0]['kendaraan'] == $kd['nama']){echo 'selected';} ?>
                                                value="<?= $kd['nama'] ?>">
                                                <?= $kd['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Sumber Dana</label>
                                        <input type="text" class="form-control" name="sumber_dana"
                                            value="<?= $res[0]['sumber_dana'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">DIPA</label>
                                        <select class="form-control" name="dipa">
                                            <?php foreach($dipa as $kd): ?>
                                            <option <?php if($res[0]['dipa'] == $kd['mak']){echo 'selected';} ?>
                                                value="<?= $kd['mak'] ?>"><?= $kd['mak'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Judul Kegiatan</label>
                                        <textarea class="form-control"
                                            name="judul_kegiatan"><?= $res[0]['judul_kegiatan'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="staticEmail" class="col-form-label">Berangkat Dari</label>
                                        <select class="form-control" name="berangkat">
                                            <?php foreach($keberangkatan as $kd): ?>
                                            <option <?php if($res[0]['berangkat'] == $kd['nama']){echo 'selected';} ?>
                                                value="<?= $kd['nama'] ?>"><?= $kd['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Tujuan</label>
                                        <select class="form-control" name="tujuan">
                                            <?php foreach($tujuan as $kd): ?>
                                            <option <?php if($res[0]['tujuan'] == $kd['nama']){echo 'selected';} ?>
                                                value="<?= $kd['nama'] ?>"><?= $kd['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Tanggal Berangkat</label>
                                        <input required type="date" name="tanggal_berangkat" class="form-control"
                                            value="<?= $res[0]['tanggal_berangkat'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Lama (hari)</label>
                                        <input type="number" name="lama" class="form-control"
                                            value="<?= $res[0]['lama'] ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary btn-block" id="btnTambahPelaksana">
                                        Tambah Pelaksana
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive my-4">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">No</th>
                                                <th style="width: 30%">Nama</th>
                                                <th style="width: 10%">Uang Harian</th>
                                                <th style="width: 10%">Uang Transport</th>
                                                <th style="width: 10%">Transport Lokal</th>
                                                <th style="width: 10%">Uang Hotel</th>
                                                <th style="width: 10%">Uang representatif</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyPelaksana">
                                            <?php foreach($res as $key => $rs): ?>
                                            <tr>
                                                <input type="hidden" name="id_pelaksana[]"
                                                    value="<?= $rs['id_pelaksana'] ?>">
                                                <td><?= $key + 1 ?></td>
                                                <td>
                                                    <select class="form-control" name="nama_pelaksana[]">
                                                        <option value="" selected>--Pilih--</option>
                                                        <?php foreach($pegawai as $kd): ?>
                                                        <option
                                                            <?php if($rs['nama'] == $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']){echo 'selected';} ?>
                                                            value="<?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']?>">
                                                            <?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan'] ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="uang_harian[]" class="form-control"
                                                        value="<?= $rs['uang_harian'] ?>">
                                                </td>
                                                <td>
                                                    <input type="number" name="uang_transport[]" class="form-control"
                                                        value="<?= $rs['uang_transport'] ?>">
                                                </td>
                                                <td>
                                                    <input type="number" name="transport_lokal[]" class="form-control"
                                                        value="<?= $rs['transport_lokal'] ?>">
                                                </td>
                                                <td>
                                                    <input type="number" name="uang_hotel[]" class="form-control"
                                                        value="<?= $rs['uang_hotel'] ?>">
                                                </td>
                                                <td>
                                                    <input type="number" name="uang_representatif[]"
                                                        class="form-control" value="<?= $rs['uang_representatif'] ?>">
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="">Persetujuan Surat Tugas</label>
                                        <select class="form-control" name="pejabat_persetujuan">
                                            <?php foreach($pegawai as $kd): ?>

                                            <option
                                                <?php if(explode(" / ", $res[0]['pejabat_persetujuan'])[0] == $kd['nama']){echo 'selected';} ?>
                                                value="<?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']?>">
                                                <?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pejabat Pembuat Komitmen</label>
                                        <select class="form-control" name="pejabat_komitmen">
                                            <?php foreach($pegawai as $kd): ?>
                                            <option
                                                <?php if(explode(" / ", $res[0]['pejabat_komitmen'])[0] == $kd['nama']){echo 'selected';} ?>
                                                value="<?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']?>">
                                                <?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Bendahara Pengeluaran</label>
                                        <select class="form-control" name="bendahara">
                                            <?php foreach($pegawai as $kd): ?>
                                            <option
                                                <?php if(explode(" / ", $res[0]['bendahara'])[0] == $kd['nama']){echo 'selected';} ?>
                                                value="<?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']?>">
                                                <?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Menimbang</label>
                                        <textarea name="menimbang" class="form-control" id=""
                                            rows="5"><?= $res[0]['menimbang'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Dasar</label>
                                        <textarea name="dasar" class="form-control" id=""
                                            rows="5"><?= $res[0]['dasar'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-block btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->


    <?php $this->load->view('template/scripts'); ?>

    <script>
    $(document).ready(function() {

        // $.ajax({
        //     type: "GET",
        //     url: "<?= base_url('C_Input/getEdit/').$res[0]['id_perjalanan'] ?>",
        //     dataType: 'json',
        //     success: function(res) {
        //         console.log(res)
        //         let result = res.result
        //         let pegawai = res.pegawai
        //         let length = $("#tbodyPelaksana").children().length + 1
        //         let newRow = ""
        //         for (let i = 0; i < result.length; i++) {
        //             newRow += "<tr>"
        //             let options = ""
        //             for (let j = 0; j < pegawai.length; j++) {
        //                 let val = pegawai[j].nama + ' / ' + pegawai[j].username + ' / ' + pegawai[j]
        //                     .jabatan
        //                 options += "<option id='opt" + pegawai[j].username + "' value='" + val +
        //                     "'>" +
        //                     val + "</option>"
        //             }

        //             newRow += "<td>" + length + "</td>"
        //             newRow += "<td> <select class='form-control' name='nama_pelaksana[]'>"
        //             newRow += options
        //             newRow += "</select> </td>"
        //             newRow +=
        //                 "<td> <input type='number' name='uang_harian[]' class='form-control' value='" +
        //                 result[i].uang_harian + "'> </td>"
        //             newRow +=
        //                 "<td> <input type='number' name='uang_transport[]' class='form-control' value='" +
        //                 result[i].uang_transport + "'> </td>"
        //             newRow +=
        //                 "<td> <input type='number' name='transport_lokal[]' class='form-control' value='" +
        //                 result[i].transport_lokal + "'> </td>"
        //             newRow +=
        //                 "<td> <input type='number' name='uang_hotel[]' class='form-control' value='" +
        //                 result[i].uang_hotel + "'> </td>"
        //             newRow +=
        //                 "<td> <input type='number' name='uang_representatif[]' class='form-control' value='" +
        //                 result[i].uang_representatif + "'> </td>"
        //             newRow += "</tr>"
        //         }
        //         console.log(newRow)
        //         $("#tbodyPelaksana").append(newRow)
        //         for (let j = 0; j < pegawai.length; j++) {
        //             let val = $('#opt' + pegawai[j].username + '').val()
        //             console.log(val)
        //         }
        //     }
        // })

        $("#btnTambahPelaksana").on('click', function(e) {
            e.preventDefault()

            $.ajax({
                type: "GET",
                url: "<?= base_url('C_Pegawai/get') ?>",
                dataType: 'json',
                success: function(res) {
                    let pegawai = res.pegawai
                    let length = $("#tbodyPelaksana").children().length + 1
                    let newRow = "<tr>"
                    let options = ""
                    options += "<option value='' selected>--Pilih--</option>"
                    for (let i = 0; i < pegawai.length; i++) {
                        options += "<option value='" + pegawai[i].nama + ' / ' + pegawai[i]
                            .username + ' / ' + pegawai[i].jabatan + "'>" + pegawai[i]
                            .nama + ' / ' + pegawai[i]
                            .username + ' / ' + pegawai[i].jabatan + "</option>"
                    }

                    newRow += "<td>" + length + "</td>"
                    newRow += "<td> <select class='form-control' name='nama_pelaksana[]'>"
                    newRow += options
                    newRow += "</select> </td>"
                    newRow +=
                        "<td> <input type='number' name='uang_harian[]' class='form-control'> </td>"
                    newRow +=
                        "<td> <input type='number' name='uang_transport[]' class='form-control'> </td>"
                    newRow +=
                        "<td> <input type='number' name='transport_lokal[]' class='form-control'> </td>"
                    newRow +=
                        "<td> <input type='number' name='uang_hotel[]' class='form-control'> </td>"
                    newRow +=
                        "<td> <input type='number' name='uang_representatif[]' class='form-control'> </td>"
                    newRow += "</tr>"
                    $("#tbodyPelaksana").append(newRow)
                }
            })

        })
    })
    </script>
</body>

</html>