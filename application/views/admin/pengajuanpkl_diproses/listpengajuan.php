<!DOCTYPE html>
<html lang="en">
<meta http-equiv="refresh" content="300">

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h2 mr-4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php $this->load->view("_partials/breadcrumb.php") ?>

                    <!-- Content Row -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">Nama DUDI</th>
                                            <th style="text-align:center">Alamat DUDI</th>
                                            <th style="text-align:center">Jurusan</th>
                                            <th style="text-align:center">Jumlah Siswa</th>
                                            <th style="text-align:center">opsi</th>
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
                                                    <?php echo $pelaksanaan->nama_dudi; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pelaksanaan->alamat_dudi; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pelaksanaan->nama_jurusan; ?>
                                                </td>
                                                <td width="50" style="text-align:center">
                                                    <?php echo $pelaksanaan->jumlah_siswa; ?>
                                                </td>
                                                <td width="270" style="text-align:center">
                                                    <a href="<?= base_url('admin/Pkl_Proses_Pengajuan/listkelompokpkl/' . $pelaksanaan->id_dudi) ?>"class="btn btn-small text-info"><i class="fas fa-user-cog"></i> Detail</a>
                                                    <a href="<?= base_url('admin/Pkl_Proses_Pengajuan/cetak_pengajuan_pkl/' . $pelaksanaan->id_dudi) ?>"class="btn btn-small text-success"><i class="fas fa-print"></i> print</a>
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
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Footer -->
    <?php $this->load->view("_partials/footer.php") ?>
    <!-- End of Footer -->

    </div>

    <!-- Scroll to Top Button-->
    <?php $this->load->view("_partials/scrolltop.php") ?>

    <!-- Logout Modal-->
    <?php $this->load->view("_partials/modal.php") ?>

    <!-- Custom Bootstrap Script-->
    <?php $this->load->view("_partials/js.php") ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>