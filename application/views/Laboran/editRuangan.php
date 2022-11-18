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

                    <!-- Start content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php if ($this->session->flashdata('message')) : ?>
                                            <?= $this->session->flashdata('message'); ?>
                                        <?php endif; ?>
                                        <div class="col-8">
                                            <h4 class="card-title">Edit data ruangan</h4>
                                            <p class="card-title-desc">Edit data ruangan laboratorium.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Start form input -->
                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/laboran/editdataruangan/') . $detail_ruangan['id_ruang'] ?>">
                                        <div class="col-md-4">
                                            <label for="namaRuangan" class="form-label">Nama Ruangan</label>
                                            <input type="text" class="form-control" id="namaRuangan" value="<?= $detail_ruangan['nama_ruangan'] ?>" name="namaRuangan">
                                            <?= form_error('namaRuangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gedung" class="form-label">Gedung</label>
                                            <input type="text" class="form-control" id="gedung" value="<?= $detail_ruangan['gedung'] ?>" name="gedung">
                                            <?= form_error('gedung', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="lantai" class="form-label">Lantai</label>
                                            <input type="number" class="form-control" id="lantai" value="<?= $detail_ruangan['lantai'] ?>" name="lantai">
                                            <?= form_error('lantai', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="pegawai" class="form-label">Penanggung Jawab</label>
                                            <select id="pegawai" class="form-select" name="pegawai">
                                                <option>- Pilih -</option>
                                                <?php foreach ($pegawai_upt as $p) : ?>
                                                    <?php if ($p->id_pegawai == $detail_ruangan['id_pegawai']) : ?>
                                                        <option value="<?= $p->id_pegawai ?>" selected><?= $p->nama_pegawai ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $p->id_pegawai ?>"><?= $p->nama_pegawai ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="waktuOperasional" class="form-label">Waktu Operasional</label>
                                            <input type="text" class="form-control" id="waktuOperasional" value="<?= $detail_ruangan['waktu_operasional'] ?>" name="waktuOperasional">
                                            <?= form_error('waktuOperasional', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kapasitas" class="form-label">Kapasitas</label>
                                            <input type="number" class="form-control" id="kapasitas" value="<?= $detail_ruangan['kapasitas'] ?>" name="kapasitas">
                                            <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $detail_ruangan['keterangan'] ?></textarea>
                                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="col-12">
                                            <a href="javascript:window.history.go(-1);" type="button" class="btn btn-secondary">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                    <!-- end form input -->

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

    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>

</body>

</html>