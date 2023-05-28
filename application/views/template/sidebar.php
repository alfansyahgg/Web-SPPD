<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <span class="brand-text font-weight-light">
            Web SPPD
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="<?= base_url() ?>" class="d-block">
                    <?php
                        echo ucwords($this->session->nama);
                    ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <?php if($this->session->role == 'admin'): ?>
                <li class="nav-item">
                    <a href="<?= base_url('C_Pegawai') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Manage Pegawai

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('C_Dipa') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Manage DIPA

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('C_Surat') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Manage No Surat

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('C_Kendaraan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Manage Jenis Kendaraan

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('C_Keberangkatan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Manage Kota Keberangkatan

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('C_Tujuan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Manage Tujuan

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('C_Input') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Perjalanan Dinas

                        </p>
                    </a>
                </li>

                <?php else: ?>

                <li class="nav-item">
                    <a href="<?= base_url('C_Input') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Perjalanan Dinas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('C_Input/input') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Input Perjalanan Dinas
                        </p>
                    </a>
                </li>

                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>