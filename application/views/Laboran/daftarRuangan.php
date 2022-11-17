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
                                            <h4 class="card-title mb-3">Daftar Ruangan UPT Laboratorium ITERA</h4>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-primary btn-sm edit float-end" data-bs-toggle="modal" data-bs-target="#tambahRuangan-modal" href="<?= base_url() ?>index.php/admin/">
                                                <i class="mdi mdi-plus me-1"></i>Tambah Data Ruangan
                                            </a>
                                        </div>
                                    </div>

                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Ruangan</th>
                                                <th>Gedung</th>
                                                <th>Lantai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($all_ruangan as $r) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $r->nama_ruangan ?></td>
                                                    <td><?= $r->gedung ?></td>
                                                    <td><?= $r->lantai ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm edit" title="Detail" href="<?= base_url('index.php/laboran/detailruangan/') . $r->id_ruang ?>">
                                                            <i class="mdi mdi-information-outline"></i>
                                                        </a>
                                                        <a class="btn btn-info btn-sm edit" title="Edit Data" href="<?= base_url('index.php/laboran/editdataruangan/') . $r->id_ruang ?>">
                                                            <i class="mdi mdi-circle-edit-outline"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm edit tombol-delete" title="Hapus" href="<?= base_url('index.php/admin/deleteruangan/' . $r->id_ruang) ?>">
                                                            <i class="mdi mdi-trash-can-outline"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <!-- Modal start -->
                                    <div class="modal modal-lg fade" id="tambahRuangan-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Ruangan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start form input -->
                                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/laboran/daftarruangan') ?>">
                                                        <input type="hidden" name="idLab" id="idLab" value="<?= $user_session->id_lab ?>">

                                                        <div class="col-md-4">
                                                            <label for="namaRuangan" class="form-label">Nama Ruangan</label>
                                                            <input type="text" class="form-control" name="namaRuangan" id="namaRuangan">
                                                            <?= form_error('namaRuangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="gedung" class="form-label">Gedung</label>
                                                            <input type="text" class="form-control" name="gedung" id="gedung">
                                                            <?= form_error('gedung', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="lantai" class="form-label">Lantai</label>
                                                            <input type="number" class="form-control" name="lantai" id="lantai">
                                                            <?= form_error('lantai', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="pegawai" class="form-label">Penanggung Jawab</label>
                                                            <select id="pegawai" class="form-select" name="pegawai">
                                                                <option selected>- Pilih -</option>
                                                                <?php foreach ($pegawai_upt as $p) : ?>
                                                                    <option value="<?= $p->id_pegawai ?>"><?= $p->nama_pegawai ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="waktuOperasional" class="form-label">Waktu Operasional</label>
                                                            <input type="text" class="form-control" name="waktuOperasional" id="waktuOperasional">
                                                            <?= form_error('waktuOperasional', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="kapasitas" class="form-label">Kapasitas</label>
                                                            <input type="number" class="form-control" name="kapasitas" id="kapasitas">
                                                            <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="keteranganRuangan" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" id="keteranganRuangan" rows="3" name="keteranganRuangan"></textarea>
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
                                </div>
                                <!-- End of Modal -->
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

    <!-- Sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- App js -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/custom.js"></script>

</body>

</html>