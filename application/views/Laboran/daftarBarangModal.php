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
                                            <h4 class="card-title">Daftar Barang</h4>
                                            <p class="card-title-desc">Daftar barang-barang yang terdapat pada ruangan <b><?= $ruangan_detail['nama_ruangan'] ?></b>.
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                                                <a class="btn btn-primary btn-sm edit float-end" data-bs-toggle="modal" data-bs-target="#barangLab-modal">
                                                    <i class="mdi mdi-plus me-1"></i>Tambah Data Barang
                                                </a>
                                            <?php endif; ?>
                                            <a class="btn excel-button btn-sm edit float-end mx-1" href="<?= base_url('index.php/excel/exportbarangmodal/') . $thisRuang ?>">
                                                <i class="mdi mdi-microsoft-excel me-1"></i>Download Data Barang
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Start table -->
                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>ID Barang</th>
                                                <th>Nama</th>
                                                <th>Kondisi</th>
                                                <th>Status</th>
                                                <th>Tahun Perolehan</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($barang_lab as $b) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $b->id_barang_bmn ?></td>
                                                    <td><?= $b->nama_barang ?></td>
                                                    <td>
                                                        <?php if ($b->kondisi == 'Baik') : ?>
                                                            <span class="badge rounded-pill text-bg-success">Baik</span>
                                                        <?php endif; ?>
                                                        <?php if ($b->kondisi == 'Rusak') : ?>
                                                            <span class="badge rounded-pill text-bg-warning">Rusak</span>
                                                        <?php endif; ?>
                                                        <?php if ($b->kondisi == 'Hilang') : ?>
                                                            <span class="badge rounded-pill text-bg-danger">Hilang</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $b->status ?></td>
                                                    <td><?= $b->tahun_perolehan ?></td>
                                                    <td><?= $b->keterangan ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm edit" title="Detail" href="<?= base_url('index.php/laboran/detailbaranglab/') . $b->id_barang_bmn ?>">
                                                            <i class="mdi mdi-information-outline"></i>
                                                        </a>

                                                        <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                                                            <a class="btn btn-info btn-sm edit" title="Edit Data" href="<?= base_url('index.php/laboran/editbaranglab/') . $b->id_barang_bmn ?>">
                                                                <i class="mdi mdi-circle-edit-outline"></i>
                                                            </a>

                                                            <a class="btn btn-danger btn-sm edit tombol-delete" title="Hapus" href="<?= base_url('index.php/laboran/deletebaranglab/') . $b->id_barang_bmn ?>">
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
                                    <div class="modal modal-lg fade" id="barangLab-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start form input -->
                                                    <form class="" method="POST" action="<?= base_url('index.php/laboran/daftarbaranglab/') . $thisRuang ?>">
                                                        <input type="hidden" name="idLab" value="<?= $user_session->id_lab ?>">
                                                        <input type="hidden" name="idPegawai" value="<?= $user_session->id_pegawai ?>">
                                                        <input type="hidden" name="idRuang" value="<?= $thisRuang ?>">

                                                        <div class="col-md-12 mb-3">
                                                            <label for="namaBarang" class="form-label">Nama Barang</label>
                                                            <select id="namaBarang" class="form-select" name="namaBarang">
                                                                <option selected>- Pilih -</option>
                                                                <?php foreach ($barang_bmn as $bmn) : ?>
                                                                    <option value="<?= $bmn->id_barang_bmn ?>"><?= $bmn->nama_barang ?>(<?= $bmn->id_barang_bmn ?>)</option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('namaBarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="kondisi" class="form-label">Kondisi</label>
                                                            <select id="kondisi" class="form-select" name="kondisi">
                                                                <option selected>- Pilih -</option>
                                                                <option value="Baik">Baik</option>
                                                                <option value="Rusak">Rusak</option>
                                                                <option value="Hilang">Hilang</option>
                                                            </select>
                                                            <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="statusBarang" class="form-label">Status</label>
                                                            <select id="statusBarang" class="form-select" name="statusBarang">
                                                                <option selected>- Pilih -</option>
                                                                <option value="Publik">Publik</option>
                                                                <option value="Privat">Privat</option>
                                                            </select>
                                                            <?= form_error('statusBarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="keterangan" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
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