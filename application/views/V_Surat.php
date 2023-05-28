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
                            <h1 class="m-0">Manage No Surat</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <form action="<?= base_url('C_Surat/update/1') ?>" method="post">
                        <div class="form-row mb-4">
                            <div class="col">
                                <input type="text" name="awal" class="form-control" value="<?= $datas[0]['awal'] ?>">
                            </div>
                            <div class="col">
                                <input disabled type="text" class="form-control" value="No Surat">
                            </div>
                            <div class="col">
                                <input type="text" name="akhir" class="form-control" value="<?= $datas[0]['akhir'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-primary btn-block">
                                Update
                            </button>
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
</body>

</html>