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

                    <div class="card mb-3">
                        <div class="card-header">
                            <a class="btn btn-primary" href="<?= base_url("admin/DataSiswa/tambahsiswa") ?>"><i class="fas fa-plus"></i> Tambah Data Siswa</a>
                        </div>
                    <!-- Content Row -->

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">NIS</th>
                                            <th style="text-align:center">Nama Siswa</th>
                                            <th style="text-align:center">Kelas</th>
                                            <th style="text-align:center">Jurusan</th>
                                            <th style="text-align:center">Jenis Kelamin</th>
                                            <th style="text-align:center">opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($data_siswa as $dtsiswa) : ?>
                                            <tr>
                                                <td width="25" style="text-align:center">
                                                    <?php echo $i ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dtsiswa->id_siswa ?>
                                                </td>
                                                <td>
                                                    <?php echo $dtsiswa->nama_siswa ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dtsiswa->kelas ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dtsiswa->nama_jurusan ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?php echo $dtsiswa->jenis_kelamin ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <a href="<?= base_url('admin/DataSiswa/editdatasiswa/' . $dtsiswa->id_sw) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                    <a onclick="deleteConfirm('<?= base_url('admin/DataSiswa/hapusdatasiswa/' . $dtsiswa->id_sw) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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

    <!-- Bootstrap core JavaScript-->
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