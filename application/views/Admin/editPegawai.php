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

                                    <h4 class="card-title">Edit Pegawai</h4>
                                    <p class="card-title-desc">Edit data pegawai UPT Laboratorium ITERA.</p>

                                    <form action="<?= base_url('index.php/admin/editpegawai/') . $detail_pegawai_upt->id_pegawai ?>" method="POST">
                                        <input type="hidden" value="<?= $detail_pegawai_upt->id ?>">

                                        <div class="mb-3 row">
                                            <label for="nama_pegawai" class="col-md-2 col-form-label">Nama Pegawai</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="<?= $detail_pegawai_upt->nama_pegawai ?>" id="nama_pegawai" name="nama_pegawai" disabled>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="statusPegawai" class="col-md-2 col-form-label">Status Kepegawaian</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-select" name="statusPegawai">
                                                    <option value="pns" <?= $detail_pegawai_upt->status == 'pns' ? 'selected' : '' ?>>PNS</option>
                                                    <option value="p3k" <?= $detail_pegawai_upt->status == 'p3k' ? 'selected' : '' ?>>P3K</option>
                                                    <option value="ppnpm" <?= $detail_pegawai_upt->status == 'ppnpm' ? 'selected' : '' ?>>PPNPM</option>
                                                </select>
                                            </div>
                                            <?= form_error('statusPegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jabatan" class="col-md-2 col-form-label">Jabatan</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-select" name="jabatan">
                                                    <option value="kepalaupt" <?= $detail_pegawai_upt->jabatan == 'kepalaupt' ? 'selected' : '' ?>>Kepala UPT</option>
                                                    <option value="admin" <?= $detail_pegawai_upt->jabatan == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                    <option value="koorlab" <?= $detail_pegawai_upt->jabatan == 'koorlab' ? 'selected' : '' ?>>Koordinator Laboratorium</option>
                                                    <option value="laboran" <?= $detail_pegawai_upt->jabatan == 'laboran' ? 'selected' : '' ?>>Laboran</option>
                                                </select>
                                            </div>
                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama_lab" class="col-md-2 col-form-label">Unit Kerja</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-select" name="nama_lab">
                                                    <option>- Pilih -</option>
                                                    <option selected value="<?= $detail_pegawai_upt->id_lab ?>"><?= $detail_pegawai_upt->nama_lab ?></option>
                                                    <?php foreach ($all_laboratorium as $lab) : ?>
                                                        <option value="<?= $lab->id_lab ?>"><?= $lab->nama_lab ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <?= form_error('nama_lab', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="kontak" class="col-md-2 col-form-label">No. HP</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="tel" value="<?= $detail_pegawai_upt->kontak ?>" id="kontak" name="kontak">
                                            </div>
                                            <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="isactive" class="col-md-2 col-form-label">Is Active?</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-select" name="isactive">
                                                    <option value="Aktif" <?= $detail_pegawai_upt->is_active == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                                    <option value="Tidak Aktif" <?= $detail_pegawai_upt->is_active == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                                                </select>
                                            </div>
                                            <?= form_error('isactive', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-12">
                                            <a href="javascript:window.history.go(-1);" type="button" class="btn btn-secondary">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
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

    <!-- App js -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>

</body>

</html>