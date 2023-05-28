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
                            <h1 class="m-0">Data Perjalanan Dinas</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <a href="<?= base_url('C_Input/input') ?>" class="btn btn-primary btn-block">
                                Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tableData" class="table table-bordered table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <?php if($this->session->role == "admin"): ?>
                                    <th>
                                        Nama
                                    </th>
                                    <?php endif; ?>
                                    <th>Nomor Surat</th>
                                    <th>Judul Kegiatan</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Perjalanan</th>
                                    <th>Tujuan</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($datas as $key => $data): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <?php if($this->session->role == "admin"): ?>
                                    <td><?= $data['nama'] ?></td>
                                    <?php endif; ?>
                                    <td><?= $data['no_surat'] ?></td>
                                    <td><?= $data['judul_kegiatan'] ?></td>
                                    <td><?= $data['tanggal_surat'] ?></td>
                                    <td><?= $data['tanggal_berangkat'] ?></td>
                                    <td><?= $data['tujuan'] ?></td>
                                    <td class="text-white text-center">
                                        <div class="d-flex flex-column" style="gap: 5px;">
                                            <a href="<?= base_url('C_Cetak/suratTugas/').$data['id_perjalanan'] ?>"
                                                class="btn btn-danger">
                                                <i class="fas fa-file-pdf    "></i>
                                                Download Surat Tugas
                                            </a>
                                            <a href="<?= base_url('C_Cetak/spd1/').$data['id_perjalanan'] ?>"
                                                class="btn btn-danger">
                                                <i class="fas fa-file-pdf    "></i>
                                                Download SPD 1
                                            </a>
                                            <a href="<?= base_url('C_Cetak/spd2/').$data['id_perjalanan'] ?>"
                                                class="btn btn-danger">
                                                <i class="fas fa-file-pdf    "></i>
                                                Download SPD 2
                                            </a>
                                            <a href="<?= base_url('C_Cetak/kwitansi/').$data['id_perjalanan'] ?>"
                                                class="btn btn-danger">
                                                <i class="fas fa-file-pdf    "></i>
                                                Download Kwitansi
                                            </a>
                                            <a href="<?= base_url('C_Cetak/pernyataan/').$data['id_perjalanan'] ?>"
                                                class="btn btn-danger">
                                                <i class="fas fa-file-pdf    "></i>
                                                Download Surat Pernyataan Transportasi Lokal
                                            </a>
                                            <a href="<?= base_url('C_Cetak/laporan/').$data['id_perjalanan'] ?>"
                                                class="btn btn-danger">
                                                <i class="fas fa-file-pdf    "></i>
                                                Download Laporan
                                            </a>
                                            <?php if($this->session->role != "admin"): ?>
                                            <a href="<?= base_url('C_Input/edit/').$data['id_perjalanan'] ?>"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit    "></i>
                                            </a>
                                            <a href="<?= base_url('C_Input/destroy/').$data['id_perjalanan'] ?>"
                                                class="btn btn-danger" onclick="return confirm('Hapus?')">
                                                <i class="fas fa-times    "></i>
                                            </a>
                                            <?php endif; ?>
                                        </div>

                                    </td>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <div class="modal" id="addModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('C_Tujuan/store') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- ./wrapper -->


    <?php $this->load->view('template/scripts'); ?>

    <script>
    $(document).ready(function() {
        $('#tableData').DataTable({
            "paging": true,
            "lengthChange": false,
            "pageLength": 2,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    })
    </script>
</body>

</html>