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
                            <h1 class="m-0">Data User</h1>
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
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Wilayah</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($datas as $key => $data): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['jabatan'] ?></td>
                                    <td><?= $data['wilayah'] ?></td>
                                    <td><?= $data['role'] ?></td>
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
                                                <h5 class="modal-title">Edit Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('C_Pegawai/update/').$data['id'] ?>"
                                                method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">NIP</label>
                                                        <input type="text" class="form-control" name="username"
                                                            value="<?= $data['username'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">nama</label>
                                                        <input type="text" class="form-control" name="nama"
                                                            value="<?= $data['nama'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">jabatan</label>
                                                        <input type="text" class="form-control" name="jabatan"
                                                            value="<?= $data['jabatan'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">wilayah</label>
                                                        <input type="text" class="form-control" name="wilayah"
                                                            value="<?= $data['wilayah'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Hak Akses</label>
                                                        <select type="text" class="form-control" name="role">
                                                            <option value="pegawai"
                                                                <?php echo($data['role'] == 'pegawai' ? 'selected' : '')  ?>>
                                                                Pegawai</option>
                                                            <option value="admin"
                                                                <?php echo($data['role'] == 'admin' ? 'selected' : '')  ?>>
                                                                Admin</option>
                                                        </select>
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
                    <form action="<?= base_url('C_Pegawai/store') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">NIP</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="">nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="">jabatan</label>
                                <input type="text" class="form-control" name="jabatan">
                            </div>
                            <div class="form-group">
                                <label for="">wilayah</label>
                                <input type="text" class="form-control" name="wilayah">
                            </div>
                            <div class="form-group">
                                <label for="">wilayah</label>
                                <select type="text" class="form-control" name="role">
                                    <option value="pegawai">Pegawai</option>
                                    <option value="admin">Admin</option>
                                </select>
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