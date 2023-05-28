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
                    <form action="<?= base_url('C_Input/inputPerjalananDinas') ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="form">
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
                                                        <?= $surat[0]['awal'] ?>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="no_surat"
                                                    placeholder="Nomor Surat">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <?= $surat[0]['akhir'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Tanggal Surat</label>
                                        <input type="date" name="tanggal_surat" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Kendaraan</label>
                                        <select class="form-control" name="kendaraan">
                                            <?php foreach($kendaraan as $kd): ?>
                                            <option value="<?= $kd['nama'] ?>"><?= $kd['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Sumber Dana</label>
                                        <input type="text" class="form-control" name="sumber_dana">
                                    </div>

                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">DIPA</label>
                                        <select class="form-control" name="dipa">
                                            <option value="" selected>--Pilih Kode Akun--</option>
                                            <?php foreach($dipa as $kd): ?>
                                            <option value="<?= $kd['mak'] ?>"><?= $kd['mak'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Judul Kegiatan</label>
                                        <textarea class="form-control" name="judul_kegiatan"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="staticEmail" class="col-form-label">Berangkat Dari</label>
                                        <select class="form-control" name="berangkat">
                                            <?php foreach($keberangkatan as $kd): ?>
                                            <option value="<?= $kd['nama'] ?>"><?= $kd['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Tujuan</label>
                                        <select class="form-control" name="tujuan">
                                            <?php foreach($tujuan as $kd): ?>
                                            <option value="<?= $kd['nama'] ?>"><?= $kd['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Tanggal Berangkat</label>
                                        <input type="date" name="tanggal_berangkat" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="staticEmail" class=" col-form-label">Lama (hari)</label>
                                        <input type="number" name="lama" class="form-control">
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
                                            <tr id="firstRow">
                                                <td>1</td>
                                                <td>
                                                    <select class="form-control" name="nama_pelaksana[]">
                                                        <option value="" selected>--Pilih--</option>
                                                        <?php foreach($pegawai as $kd): ?>
                                                        <option
                                                            value="<?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']?>">
                                                            <?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan'] ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="uang_harian[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="uang_transport[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="transport_lokal[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="uang_hotel[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="uang_representatif[]"
                                                        class="form-control">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="">Persetujuan Surat Tugas</label>
                                        <select class="form-control" name="pejabat_persetujuan">
                                            <option value="" selected>--Pilih--</option>
                                            <?php foreach($pegawai as $kd): ?>
                                            <option
                                                value="<?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']?>">
                                                <?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pejabat Pembuat Komitmen</label>
                                        <select class="form-control" name="pejabat_komitmen">
                                            <option value="" selected>--Pilih--</option>
                                            <?php foreach($pegawai as $kd): ?>
                                            <option
                                                value="<?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']?>">
                                                <?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Bendahara Pengeluaran</label>
                                        <select class="form-control" name="bendahara">
                                            <option value="" selected>--Pilih--</option>
                                            <?php foreach($pegawai as $kd): ?>
                                            <option
                                                value="<?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan']?>">
                                                <?= $kd['nama'] . ' / '.$kd['username'] . ' / '.$kd['jabatan'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Menimbang</label>
                                        <textarea name="menimbang" class="form-control" id="" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Dasar</label>
                                        <textarea name="dasar" class="form-control" id="" rows="5"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Laporan Dokumen</label>
                                        <input name="dokumen" class="form-control-file" id="" type="file"
                                            rows="5"></input>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Foto Kegiatan</label>
                                        <input name="foto[]" multiple class="form-control-file" id="" type="file"
                                            rows="5"></input>
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
        $("#btnTambahPelaksana").on('click', function(e) {
            e.preventDefault()

            $.ajax({
                type: "GET",
                url: "<?= base_url('C_Pegawai/get') ?>",
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                    let pegawai = res.pegawai
                    let length = $("#tbodyPelaksana tr").length + 1
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
                    console.log(newRow)
                    $("#tbodyPelaksana").append(newRow)
                }
            })

        })
    })
    </script>
</body>

</html>