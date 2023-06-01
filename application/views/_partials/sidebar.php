<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
        <?php if ($this->session->userdata("role") === "admin") { ?>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/Beranda/'); ?>">
                <div class="sidebar-brand-icon">
                    <img class="center mx-auto" width=50px src="<?= base_url('assets/img/smkbx.png'); ?>" />
                </div>
            </a>
            <p class="text-center text-white text-uppercase font-weight-bold">Halaman Admin</p>

            <hr class="sidebar-divider my-0">

            <li class="nav-item <?php echo $this->uri->segment(2) == 'Beranda' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Beranda/'); ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading" style="color: white;">
                Kelola Data
            </div>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#collapseUtilities" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="false" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Data Master:</h6>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'DataDUDI' ? 'active' : '' ?>" href="<?= base_url('admin/DataDUDI/'); ?>">Data DUDI</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'DataSiswa' ? 'active' : '' ?>" href="<?= base_url('admin/DataSiswa/'); ?>">Data Siswa</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'DataGuru' ? 'active' : '' ?>" href="<?= base_url('admin/DataGuru/'); ?>">Data Guru</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'DataAdmin' ? 'active' : '' ?>" href="<?= base_url('admin/DataAdmin/'); ?>">Data Ketua Jurusan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Akun</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Data Akun:</h6>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'AkunSiswa' ? 'active' : '' ?>" href="<?= base_url('admin/AkunSiswa/'); ?>">Akun Siswa</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'AkunGuru' ? 'active' : '' ?>" href="<?= base_url('admin/AkunGuru/'); ?>">Akun Guru</a>
                        <a class="collapse-item <?php echo $this->uri->segment(2) == 'AkunAdmin' ? 'active' : '' ?>" href="<?= base_url('admin/AkunAdmin/'); ?>">Akun Ketua Jurusan</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading" style="color: white;">
                Proses Pengajuan PKL
            </div>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'Pkl_Pengajuan_Belum_tervalidasi' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Pkl_Pengajuan_Belum_tervalidasi/'); ?>">
                    <i class="fas fa-fw fa-minus-square"></i>
                    <span>Belum Tervalisdasi</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'Pkl_Proses_Pengajuan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Pkl_Proses_Pengajuan/'); ?>">
                    <i class="fas fa-fw fa-envelope-open-text"></i>
                    <span>Proses Pengajuan</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'Pkl_Pengajuan_Diterima' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/Pkl_Pengajuan_Diterima/'); ?>">
                    <i class="fas fa-fw fa-check-square"></i>
                    <span>Diterima</span></a>
            </li>
            <!-- <li class="nav-item <?php echo $this->uri->segment(2) == 'PelaksanaanPKL' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/PelaksanaanPKL/'); ?>">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Pelaksanaan PKL</span></a>
            </li> -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'HistoryPelaksanaanPKL' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/HistoryPelaksanaanPKL/'); ?>">
                    <i class="fas fa-fw  fa-undo"></i>
                    <span>History Pelaksanaan PKL</span></a>
            </li>

            <!-- Divider -->
            
<!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Kelola Data</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Kelola Data:</h6>
                        <a class="collapse-item" href="<?= base_url('admin/DataDUDI/'); ?>">Data DUDI</a>
                        <a class="collapse-item" href="<?= base_url('admin/DataSiswa/'); ?>">Data Siswa</a>
                        <a class="collapse-item" href="<?= base_url('admin/DataGuru/'); ?>">Data Guru</a>
                    </div>
                </div>
            </li> -->


            <!-- <li class="nav-item <?php echo $this->uri->segment(2) == 'DataDUDI' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/DataDUDI/'); ?>">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Data DUDI</span></a>
            </li>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'DataSiswa' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/DataSiswa/'); ?>">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Data Siswa</span></a>
            </li>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'DataGuru' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/DataGuru/'); ?>">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Data Guru</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'DataAdmin' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/DataAdmin/'); ?>">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Data Ketua Jurusan</span></a>
            </li> -->
            
            
            <!-- Heading
            <div class="sidebar-heading" style="color: white;">
                Kelola Akun
            </div>

            <li class="nav-item <?php echo $this->uri->segment(2) == 'AkunSiswa' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/AkunSiswa/'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Akun Pengguna</span></a> -->
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <hr class="sidebar-divider">

    </ul>

    <!-- End of Sidebar -->

    <?php  } ?>

    <?php if ($this->session->userdata("role") === "pembimbing_dudi") { ?>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pembimbingdudi/Beranda/'); ?>">
            <div class="sidebar-brand-icon">
                <img class="center mx-auto" width=50px src="<?= base_url('assets/img/login.png'); ?>" />
            </div>
        </a>
        <p class="text-center text-white text-uppercase font-weight-bold">Halaman<br>Pembimbing DUDI</br></p>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Catatan Kegiatan PKL Siswa
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'ValidasiJurnalPKL' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingdudi/ValidasiJurnalPKL'); ?>">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Validasi Jurnal PKL</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'AbsensiPKL' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingdudi/AbsensiPKL'); ?>">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Absensi Siswa PKL</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Penilaian PKL
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'PenilaianPKL' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pembimbingdudi/PenilaianPKL/'); ?>">
                <i class="fas fa-fw fa-pen-square"></i>
                <span>Penilaian PKL</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

    <?php } ?>

    <?php if ($this->session->userdata("role") === "siswa") { ?>

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('siswa/Beranda/'); ?>">
            <div class="sidebar-brand-icon">
                <img class="center mx-auto" width=50px src="<?= base_url('assets/img/smkbx.png'); ?>" />
            </div>
        </a>
        <p class="text-center text-white text-uppercase font-weight-bold">Halaman Siswa</p>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Pengajuan PKL
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'InfoDUDI' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/InfoDUDI'); ?>">
                <i class="fas fa-fw fa-info-circle"></i>
                <span>Info DUDI</span></a>
        </li>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'PermohonanPKL' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/PermohonanPKL'); ?>">
                <i class="fas fa-fw fa-envelope-open-text"></i>
                <span>Permohonan PKL</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading" style="color: white;">
            Kegiatan PKL
        </div>

        <li class="nav-item <?php echo $this->uri->segment(2) == 'JurnalPKL' ? 'active' : '' ?>">
            <a class="nav-link" href=" <?= base_url('siswa/JurnalPKL'); ?>">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Jurnal PKL</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

    <?php } ?>
    <?php if ($this->session->userdata("role") === "guru") { ?>

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('guru/Beranda/'); ?>">
    <div class="sidebar-brand-icon">
        <img class="center mx-auto" width=50px src="<?= base_url('assets/img/smkbx.png'); ?>" />
    </div>
</a>
<p class="text-center text-white text-uppercase font-weight-bold">Halaman<br>Pembimbing Sekolah</br></p>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<hr class="sidebar-divider">

<div class="sidebar-heading" style="color: white;">
    Catatan Kegiatan PKL Siswa
</div>

<li class="nav-item <?php echo $this->uri->segment(2) == 'ValidasiJurnalPKL' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('guru/MonitoringPKL'); ?>">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Monitoring Kegiatan Siswa </span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->

<?php } ?>
