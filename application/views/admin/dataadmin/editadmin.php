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
                            <a href="<?= base_url('admin/DataAdmin/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">

                            <form action="" method="post">

                                <input type="hidden" name="id_adm" value="<?php echo $dataadmin->id_adm ?>" />

                                <div class="form-group">
                                    <label for="id_admin">NIP *</label>
                                    <input class="form-control <?php echo form_error('id_admin') ? 'is-invalid' : '' ?>" type="text" name="id_admin" placeholder="Nis *" value="<?php echo $dataadmin->id_admin ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_admin') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_admin">Nama Admin *</label>
                                    <input class="form-control <?php echo form_error('nama_admin') ? 'is-invalid' : '' ?>" type="text" name="nama_admin" placeholder="Nama Admin*" value="<?php echo $dataadmin->nama_admin ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_admin') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_jurusan">Jurusan *</label>
                                    <select class="form-control <?php echo form_error('id_jurusan') ? 'is-invalid' : '' ?>" name="id_jurusan">
                                        <option value="<?php echo $dataadmin->id_jurusan; ?>">Pilih Jurusan : <?php echo $dataadmin->nama_jurusan; ?> </option>
                                    <!-- <option disabled selected value="">Pilih Jurusan : </option> -->
                                        <?php foreach ($jurusan as $row) { ?>
                                            <option value="<?php echo $row->id_jurusan; ?>"><?php echo $row->nama_jurusan; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_jurusan') ?>
                                    </div>
                                </div>       
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control <?php echo form_error('jenis_kelamin') ? 'is-invalid' : '' ?>" name="jenis_kelamin">
                                    <option value="<?php echo $dataadmin->jenis_kelamin; ?>">Jenis Kelamin : <?php echo $dataadmin->jenis_kelamin; ?> </option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jenis_kelamin') ?>
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