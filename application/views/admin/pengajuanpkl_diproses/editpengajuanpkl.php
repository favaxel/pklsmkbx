
<style>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- css untuk select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- jika menggunakan bootstrap4 gunakan css ini  -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
        <!-- cdn bootstrap4 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   
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
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card mb-3">
                        <div class="card-header">
                        <a href="<?= base_url('admin/Pkl_Proses_Pengajuan/listkelompokpkl/' . $pelaksanaanpkl->id_dudi) ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">

                            <form action="" method="post">

                                <input type="hidden" name="id_pengajuanpkl" value="<?php echo $pelaksanaanpkl->id_pengajuanpkl ?>" />
                                <div class="container">
                                <div class="form-group row row-cols-1 row-cols-sm-2">
                                <div class="col-sm">
                                    <label for="nama_siswa">Nama Siswa</label>
                                    <input class="form-control <?php echo form_error('nama_siswa') ? 'is-invalid' : '' ?>" name="nama_siswa" readonly value="<?php echo $pelaksanaanpkl->nama_siswa ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_siswa') ?>
                                    </div>
                                </div>

                                 <div class="col-sm">
                                    <label for="kelas">Kelas</label>
                                    <input class="form-control <?php echo form_error('kelas') ? 'is-invalid' : '' ?>" name="kelas" readonly value="<?php echo $pelaksanaanpkl->kelas ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kelas') ?>
                                    </div>
                                </div>

                                 <div class="col-sm">
                                    <label for="nama_dudi">DUDI yang dipilih</label>
                                    <input class="form-control <?php echo form_error('nama_dudi') ? 'is-invalid' : '' ?>" name="nama_dudi" readonly value="<?php echo $pelaksanaanpkl->nama_dudi ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_dudi') ?>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row row-cols-1 row-cols-sm-2">
                                <div class="col">
                                    <label for="durasi">durasi *</label>
                                    <input class="form-control <?php echo form_error('durasi') ? 'is-invalid' : '' ?>" type="text" name="durasi" placeholder="bulan" value="<?php echo $pelaksanaanpkl->durasi ?>"></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('durasi') ?>
                                    </div>
                                    </div>
                                    <div class="col">
                                        <label for="tanggal_masuk">Tanggal Masuk</label>
                                        <input class="form-control <?php echo form_error('tanggal_masuk') ? 'is-invalid' : '' ?>" type="date" id="datepicker" name="tanggal_masuk" value="<?php echo $pelaksanaanpkl->tanggal_masuk ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('tanggal_masuk') ?>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="tanggal_keluar">Tanggal Keluar</label>
                                        <input class="form-control <?php echo form_error('tanggal_keluar') ? 'is-invalid' : '' ?>" type="date" id="datepicker" name="tanggal_keluar" value="<?php echo $pelaksanaanpkl->tanggal_keluar ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('tanggal_keluar') ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="id_guru">Guru Pembimbing</label>
                                    <select id="kota" class= "form-control select2 <?php echo form_error('id_guru') ? 'is-invalid' : '' ?>" name="id_guru">
                                        <option value="<?php echo $pelaksanaanpkl->id_guru; ?>">Pilih Guru : <?php echo $pelaksanaanpkl->nama_guru; ?> </option>
                                        <?php foreach ($data_guru as $row) { ?>
                                            <option value="<?php echo $row->id_guru; ?>"><?php echo $row->nama_guru; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_guru') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status_validasi">Status Validasi</label>
                                    <select class="form-control <?php echo form_error('status_validasi') ? 'is-invalid' : '' ?>" name="status_validasi">
                                        <option value="<?php echo $pelaksanaanpkl->status_validasi; ?>">---Status Validasi-- : <?php echo $pelaksanaanpkl->status_validasi; ?></option>
                                        <option value="Proses Pengajuan">Proses Pengajuan</option>
                                        <option value="Diterima">Diterima</option>
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="Selesai">Selesai</option>
                                        
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('status_validasi') ?>
                                    </div>
                                </div>

                                <input class="btn btn-primary" type="submit" name="btn" value="Simpan" data-target="#tambahakun"/>
                            </form>

                        </div>

                        <div class="card-footer small text-muted">
                            * Wajib diisi
                        </div>

                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

        </div>
        <!-- Footer -->
        <?php $this->load->view("_partials/footer.php") ?>
        <!-- End of Footer -->

        <!-- Scroll to Top Button-->
        <?php $this->load->view("_partials/scrolltop.php") ?>

        <!-- Logout Modal-->
        <?php $this->load->view("_partials/modal.php") ?>

        <!-- Bootstrap core JavaScript-->
        <?php $this->load->view("_partials/js.php") ?>

        <script>
            $(function() {
                $("#datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true
                });
            });

        </script>
<script>
    <?php if ($this->session->flashdata('success')) {?>
        var isi = <?php echo json_encode($this->session->flashdata('success')) ?>;
    Swal.fire({
  icon: 'success',
  title: 'Pengajuan PKL',
  text: isi,
  showConfirmButton: false,
  footer: '<a class="btn btn-primary" href="<?= base_url('admin/Pkl_Proses_Pengajuan/listkelompokpkl/' . $pelaksanaanpkl->id_dudi) ?>">kembali Ke halaman Anggotak Kelompok PKL</a>'

    })
<?php }?>
</script>

<script>
    $(document).ready(function () {
                $("#kota").select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select"
                });
            });
</script>
</body>

</html>