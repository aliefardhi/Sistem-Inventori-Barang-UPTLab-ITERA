<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- @@include("partials/menu.html") -->
        <?php $this->load->view('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <?php $this->load->view('partials/page-title') ?>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <?php if ($this->session->flashdata('message')) : ?>
                                            <?= $this->session->flashdata('message'); ?>
                                        <?php endif; ?>
                                        <div class="col-6">
                                            <h4 class="card-title">Daftar Barang Persediaan</h4>
                                            <p class="card-title-desc">Data barang persediaan pada <strong><?= $nama_lab['nama_lab'] ?></strong>.
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                                                <a class="btn btn-primary btn-sm edit float-end" href="<?= base_url() ?>index.php/laboran/tambahdatabp">
                                                    <i class="mdi mdi-plus me-1"></i>Tambah Data Barang
                                                </a>
                                                <a class="btn btn-info btn-sm edit float-end mx-1" data-bs-toggle="modal" data-bs-target="#uploadPersediaan-modal">
                                                    <i class="mdi mdi-file-upload me-1"></i>Upload Data Barang
                                                </a>
                                            <?php endif; ?>
                                            <a class="btn excel-button btn-sm edit float-end mx-1" href="<?= base_url('index.php/excel/exportpersediaan/') . $thisLab ?>">
                                                <i class="mdi mdi-microsoft-excel me-1"></i>Download Data Barang
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Start table -->
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jenis</th>
                                                <th>Jumlah</th>
                                                <th>Sisa Barang</th>
                                                <th>Satuan</th>
                                                <th>Kondisi</th>
                                                <th>Tanggal Terima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($barang_persediaan as $bp) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $bp->nama_barang ?></td>
                                                    <td><?= $bp->jenis_barang ?></td>
                                                    <td><?= $bp->jumlah ?></td>
                                                    <td><?= $bp->sisa_barang ?></td>
                                                    <td><?= $bp->satuan ?></td>
                                                    <td>
                                                        <?php if ($bp->kondisi == 'baik') : ?>
                                                            <span class="badge rounded-pill text-bg-success">Baik</span>
                                                        <?php endif; ?>
                                                        <?php if ($bp->kondisi == 'rusak') : ?>
                                                            <span class="badge rounded-pill text-bg-warning">Rusak</span>
                                                        <?php endif; ?>
                                                        <?php if ($bp->kondisi == 'hilang') : ?>
                                                            <span class="badge rounded-pill text-bg-danger">Hilang</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $bp->tanggal_terima ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm edit" title="Detail" href="<?= base_url('index.php/barangpersediaan/detailbarangpersediaan/') . $bp->id_persediaan ?>">
                                                            <i class="mdi mdi-information-outline"></i>
                                                        </a>

                                                        <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                                                            <a class="btn btn-info btn-sm edit" title="Edit Data" href="<?= base_url('index.php/laboran/editdatapersediaan/') . $bp->id_persediaan ?>">
                                                                <i class="mdi mdi-circle-edit-outline"></i>
                                                            </a>

                                                            <a class="btn btn-danger btn-sm edit tombol-delete" title="Hapus" href="<?= base_url('index.php/laboran/deletepersediaan/') . $bp->id_persediaan ?>">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- End of table -->

                                    <!-- Modal start -->
                                    <div class="modal modal-lg fade" id="uploadPersediaan-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Upload Data Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start form input -->
                                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/excel/importPersediaan') ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="idLab" value="<?= $userdata['id_lab'] ?>">
                                                        <div class="mb-3">
                                                            <input class="form-control" type="file" id="upload_file" name="upload_file">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                                </form>
                                                <!-- end form input -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of modal -->

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- @@include("partials/footer.html") -->
            <?php $this->load->view('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Javascript libs -->
    <?php $this->load->view('partials/vendor-scripts') ?>

    <!-- Datatables JS -->
    <!-- Required datatable js -->
    <script src="<?= base_url() ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?= base_url() ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="<?= base_url() ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?= base_url() ?>assets/js/pages/datatables.init.js"></script>
    <!-- End of Datatables js -->

    <!--Morris Chart-->
    <script type="text/javascript" src="<?= base_url() ?>assets/libs/morris.js/morris.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/libs/raphael/raphael.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/custom.js"></script>

</body>

</html>