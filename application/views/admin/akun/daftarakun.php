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
                      <form action="<?= base_url('admin/Akun/tambahakun') ?>" method="post">

                          <div class="form-group">
                              <label for="id">id</label>
                              <input class="form-control <?php echo form_error('id') ? 'is-invalid' : '' ?>" required="required" type="text" name="id" placeholder=""></input>
                              <div class="invalid-feedback">
                                  <?php echo form_error('id') ?>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="username">username</label>
                              <input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" required="required" type="text" name="username" placeholder=""></input>
                              <div class="invalid-feedback">
                                  <?php echo form_error('username') ?>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="password">Kata Sandi</label>
                              <input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" required="required" type="text" name="password" placeholder=""></input>
                              <div class="invalid-feedback">
                                  <?php echo form_error('password') ?>
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label for="role">Akses Pengguna</label>
                          <select name="role" class="custom-select" required>

                            <option value="siswa">siswa</option>
                            <option value="guru">guru</option>
                            <option value="admin">ketua_jurusan</option>
                        </select>
                  </div>
                                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
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