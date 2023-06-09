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
                    <?php $this->load->view("_partials/breadcrumb.php") ?>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Content Row -->
                    <?php if (!isset($pengajuanpkl->status_validasi) || $pengajuanpkl->status_validasi != "Diterima") { ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading"><strong>Maaf, Anda tidak diizinkan mengakses menu ini!</strong></h4>
                                    <p>Karena pengajuan PKL Anda berstatus
                                        <?php if (empty($pengajuanpkl->status_validasi)) { ?>
                                            <strong> Belum mengajukan. </strong>
                                        <?php } else { ?>
                                            <strong><?php echo $pengajuanpkl->status_validasi ?></strong>.</p>
                                <?php } ?>
                                <hr>
                                <p class="mb-0">Jika terdapat pernyataan terkait PKL, silahkan hubungi Koordinator PKL, Bapak/Ibu Guru, atau Ketua Jurusan di Program Studi Anda</p>
                                </div>
                            </div>
                        <?php } else { ?>
                            <?php foreach ($jurnal_pkl as $jurnal) :
                                if ($jurnal->tanggal == date('Y-m-d')) { ?>
                                    <div class="alert alert-success" role="alert">
                                        Bagus, Anda sudah melaksanakan kegiatan PKL hari ini dan mencatatnya di jurnal kegiatan PKL!
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Anda belum mengisi jurnal kegiatan PKL hari ini!
                                    </div>
                                <?php } ?>
                                <?php break; ?>
                            <?php endforeach; ?>
                            <div class="card mb-3">
                                <div class="card-header d-flex bd-highlight">
                                    <div class="mr-auto p-2 bd-highlight">
                                        <a class="btn btn-primary" href="<?= base_url("siswa/JurnalPKL/tambahjurnalpkl") ?>"><i class="fas fa-plus"></i> Tambah Data Jurnal PKL</a>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <a class="btn btn-light" href="<?= base_url("siswa/JurnalPKL/cetak_jurnal_pkl/" . $this->session->userdata('id_siswa')) ?>"><i class="fas fa-print"></i> Cetak Data Jurnal PKL </a>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <a class="btn btn-light" href="<?= base_url("siswa/JurnalPKL/cetak_dokumentasi_jurnal/" . $this->session->userdata('id_siswa')) ?>"><i class="fas fa-print"></i> Cetak Lampiran Dokumentasi</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="15" style="text-align:center">No.</th>
                                                    <th style="text-align:center">Tanggal Pelaksanaan</th>
                                                    <th style="text-align:center">kegiatan</th>
                                                    <th style="text-align:center">Dokumentasi</th>
                                                    <th style="text-align:center">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($jurnal_pkl as $jurnal) : ?>
                                                    <tr>
                                                        <td width="15" style="text-align:center">
                                                            <?php echo $i ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                            <?php echo date("d-m-Y", strtotime($jurnal->tanggal)) ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $jurnal->kegiatan ?>
                                                        </td>
                                                        <td style="text-align:center">
                                                            <img src="<?php echo base_url('dokumentasi/' . $jurnal->dokumentasi) ?>" width="250" height="250" />
                                                        </td>
                                                        <td style="text-align:center">
                                                            <a href="<?= base_url('siswa/JurnalPKL/editjurnalpkl/' . $jurnal->id_jurnal_pkl) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                                            <a onclick="deleteConfirm('<?= base_url('siswa/JurnalPKL/hapusjurnalpkl/' . $jurnal->id_jurnal_pkl) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                        </td>
                                                        <?php $i++ ?>
                                                    </tr>

                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>

                            </div>
                            <!-- End of Content Row -->

                        </div>
                        <!-- End of Content Fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

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