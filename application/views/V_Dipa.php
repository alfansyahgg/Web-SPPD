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
                            <h1 class="m-0">Data DIPA</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>MAK</th>
                                    <th>Uraian</th>
                                    <th>Pagu</th>
                                    <th>Terpakai</th>
                                    <th>Sisa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($datas as $key => $data): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $data['tahun'] ?></td>
                                    <td><?= $data['mak'] ?></td>
                                    <td><?= $data['uraian'] ?></td>
                                    <td>Rp. <?= number_format($data['pagu'], 0, '.', '.') ?></td>
                                    <td>Rp. <?= number_format($data['terpakai'], 0, '.', '.')?></td>
                                    <td>Rp. <?= number_format($data['sisa'], 0, '.', '.') ?></td>
                                    <td class="text-white text-center">
                                        <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#editModal<?= $data['id'] ?>">
                                            <i class="fas fa-edit    "></i>
                                        </button>
                                        <a href="<?= base_url('C_Pegawai/destroy/').$data['id'] ?>"
                                            class="btn btn-danger" onclick="return confirm('Hapus?')">
                                            <i class="fas fa-times    "></i>
                                        </a>
                                    </td>
                                </tr>

                                <div class="modal" id="editModal<?= $data['id'] ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('C_Dipa/update/').$data['id'] ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Tahun</label>
                                                        <input type="number" class="form-control" name="tahun"
                                                            value="<?= $data['tahun'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">mak</label>
                                                        <input type="text" class="form-control" name="mak"
                                                            value="<?= $data['mak'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">uraian</label>
                                                        <input type="text" class="form-control" name="uraian"
                                                            value="<?= $data['uraian'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">pagu</label>
                                                        <input type="text" class="form-control" name="pagu"
                                                            value="<?= $data['pagu'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">terpakai</label>
                                                        <input type="text" class="form-control" name="terpakai"
                                                            value="<?= $data['terpakai'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">sisa</label>
                                                        <input type="text" class="form-control" name="sisa"
                                                            value="<?= $data['sisa'] ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
                                Tambah Data
                            </button>
                        </div>
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
                    <form action="<?= base_url('C_Dipa/store') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <input type="number" class="form-control" name="tahun">
                            </div>
                            <div class="form-group">
                                <label for="">mak</label>
                                <input type="text" class="form-control" name="mak">
                            </div>
                            <div class="form-group">
                                <label for="">uraian</label>
                                <input type="text" class="form-control" name="uraian">
                            </div>
                            <div class="form-group">
                                <label for="">pagu</label>
                                <input type="text" class="form-control" name="pagu">
                            </div>
                            <div class="form-group">
                                <label for="">terpakai</label>
                                <input type="text" class="form-control" name="terpakai">
                            </div>
                            <div class="form-group">
                                <label for="">sisa</label>
                                <input type="text" class="form-control" name="sisa">
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
</body>

</html>