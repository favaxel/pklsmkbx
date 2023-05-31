<!DOCTYPE html>
<html lang="en">
<!-- <script type="text/javascript" src= https://code.jquery.com/jquery-3.7.0.min.js></script>
<script type="text/javascript">
    function printPengajuan(pengajuan) {
        var printPage = document.getElementById(pengajuan).innerHTML;
        var oriPage = document.body.innerHTML;
        document.body.innerHTML = printPage;
        window.print();
        document.body.innerHTML = oriPage;
    }
</script> -->
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
                            <a href="<?= base_url('admin/HistoryPelaksanaanPKL/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">

                            <?php foreach ($pelaksanaanpkl as $pelaksanaan) : ?>
                                <div class="form-group">
                                    <label for="nama_dudi">Nama DUDI</label>
                                    <input class="form-control <?php echo form_error('nama_dudi') ? 'is-invalid' : '' ?>" type="text" name="nama_dudi" readonly placeholder="Nama DUDI" value="<?php echo $pelaksanaan->nama_dudi ?>" />
                                </div>
                                <?php break; ?>
                            <?php endforeach; ?>
                        <!-- Content Row -->
                        <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Nama Siswa</th>
                                            <th style="text-align:center">Kelas</th>
                                            <th style="text-align:center">Jurusan</th>
                                            <th style="text-align:center">Durasi</th>
                                            <th style="text-align:center">Tanggal Masuk</th>
                                            <th style="text-align:center">Tanggal Keluar</th>
                                            <th style="text-align:center">Nama Guru</th>
                                            <th style="text-align:center">Status Validasi</th>
                                            <th style="text-align:center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($pelaksanaanpkl as $pelaksanaan) :
                                        ?>
                                            <tr>
                                                <td width="25" style="text-align:center">
                                                    <?php echo $i ?>
                                                </td>
                                                <td>
                                                    <?php echo $pelaksanaan->nama_siswa; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pelaksanaan->kelas; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pelaksanaan->nama_jurusan; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pelaksanaan->durasi; ?>
                                                    bulan
                                                </td>
                                                <td style="text-align:center">
                                                    <?php if ($pelaksanaan->tanggal_masuk == "2023-01-01") {
                                                        echo "Belum ditentukan";
                                                    } else {
                                                        echo date("d-m-Y", strtotime($pelaksanaan->tanggal_masuk));
                                                    } ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php if ($pelaksanaan->tanggal_masuk == "2023-01-01") {
                                                        echo "Belum ditentukan";
                                                    } else {
                                                        echo date("d-m-Y", strtotime($pelaksanaan->tanggal_keluar));
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($pelaksanaan->id_guru == 0) { ?>
                                                        Belum ditunjuk
                                                    <?php } else { ?>
                                                        <?php echo $pelaksanaan->nama_guru; ?>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php
                                                    if ($pelaksanaan->status_validasi == 'Diterima') { ?>
                                                        <span class="badge badge-success"><?php echo $pelaksanaan->status_validasi; ?></span>
                                                    <?php } ?>
                                                    <?php
                                                    if ($pelaksanaan->status_validasi == 'Ditolak') { ?>
                                                        <span class=" badge badge-danger"><?php echo $pelaksanaan->status_validasi; ?></span>
                                                    <?php } ?>
                                                    <?php
                                                    if ($pelaksanaan->status_validasi == 'Proses Pengajuan') { ?>
                                                        <span class=" badge badge-info"><?php echo $pelaksanaan->status_validasi; ?></span>
                                                    <?php } ?>
                                                    <?php
                                                    if ($pelaksanaan->status_validasi == 'Belum Tervalidasi') { ?>
                                                        <span class="badge badge-warning"><?php echo $pelaksanaan->status_validasi; ?></span>
                                                    <?php } ?>
                                                    <?php
                                                    if ($pelaksanaan->status_validasi == 'Selesai') { ?>
                                                        <span class="badge badge-dark"><?php echo $pelaksanaan->status_validasi; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <a href="<?= base_url('admin/HistoryPelaksanaanPKL/editpengajuanpkl/' . $pelaksanaan->id_pengajuanpkl) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                </td>
                                                <?php $i++ ?>
                                            </tr>
                                        <?php endforeach; ?>
                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html>