<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("_partials/navbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php $this->load->view("_partials/breadcrumb.php") ?>

                    <!-- Content Row -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h2 mr-4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?= base_url('admin/Akun/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">

                            <form action="" method="post">

                                <input type="hidden" name="id_pengguna" value="<?php echo $dataakun->id_pengguna ?>" />

                                <div class="form-group">
                                    <label for="id">Id *</label>
                                    <input class="form-control <?php echo form_error('id') ? 'is-invalid' : '' ?>" type="text" name="id" placeholder="Id*" value="<?php echo $dataakun->id ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username *</label>
                                    <input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" name="username" placeholder="Username*" value="<?php echo $dataakun->username ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('username') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" name="password" placeholder="Password*" value="<?php echo $dataakun->password ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Akses Pengguna</label>
                                    <select class="form-control <?php echo form_error('role') ? 'is-invalid' : '' ?>" name="role">
                                    <option value="<?php echo $dataakun->role; ?>">Akses Pengguna : <?php echo $dataakun->role; ?> </option>
                                    <option value="siswa">siswa</option>
                                    <option value="guru">guru</option>
                                    <option value="admin">ketua_jurusan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('role') ?>
                                    </div>
                                </div>

                                <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                            </form>

                        </div>

                        <div class="card-footer small text-muted">
                            * Wajib diisi
                        </div>

                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- End of Page Content -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Page Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Footer -->
    <?php $this->load->view("_partials/footer.php") ?>
    <!-- End of Footer -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("_partials/scrolltop.php") ?>

    <!-- Logout Modal-->
    <?php $this->load->view("_partials/modal.php") ?>

    <!-- Bootstrap core JavaScript-->
    <?php $this->load->view("_partials/js.php") ?>

</body>

</html>