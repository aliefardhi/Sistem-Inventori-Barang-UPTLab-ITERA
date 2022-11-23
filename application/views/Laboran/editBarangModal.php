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
                                            <h4 class="card-title">Edit data barang</h4>
                                            <p class="card-title-desc">Edit data barang habis pakai melalui form dibawah ini untuk mengubah detail data yang diperlukan.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Start form input -->
                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/laboran/editbaranglab/') . $detail_barang['id_barang_bmn'] ?>">
                                        <div class="col-md-4">
                                            <label for="namaBarang" class="form-label">Nama Barang</label>
                                            <select id="namaBarang" class="form-select" name="namaBarang">
                                                <option selected>- Pilih -</option>
                                                <?php foreach ($barang_bmn as $bmn) : ?>
                                                    <?php if ($bmn->id_barang_bmn == $detail_barang['id_barang_bmn']) : ?>
                                                        <option selected value="<?= $bmn->id_barang_bmn ?>"><?= $bmn->nama_barang ?>(<?= $bmn->id_barang_bmn ?>)</option>
                                                    <?php else : ?>
                                                        <option value="<?= $bmn->id_barang_bmn ?>"><?= $bmn->nama_barang ?>(<?= $bmn->id_barang_bmn ?>)</option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('namaBarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kondisi" class="form-label">Kondisi</label>
                                            <select id="kondisi" class="form-select" name="kondisi">
                                                <option selected>- Pilih -</option>
                                                <option value="Baik" <?= $detail_barang['kondisi'] == 'Baik' ? 'selected' : '' ?>>Baik</option>
                                                <option value="Rusak Ringan" <?= $detail_barang['kondis'] == 'Rusak Ringan' ? 'selected' : '' ?>>Rusak Ringan</option>
                                                <option value="Rusak Berat" <?= $detail_barang['kondisi'] == 'Rusak Berat' ? 'selected' : '' ?>>Rusak Berat</option>
                                            </select>
                                            <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="statusBarang" class="form-label">Status</label>
                                            <select id="statusBarang" class="form-select" name="statusBarang">
                                                <option selected>- Pilih -</option>
                                                <option value="Publik" <?= $detail_barang['status'] == 'Publik' ? 'selected' : '' ?>>Publik</option>
                                                <option value="Privat" <?= $detail_barang['status'] == 'Privat' ? 'selected' : '' ?>>Privat</option>
                                            </select>
                                            <?= form_error('statusBarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" id="keterangan" rows="3" name="keterangan"><?= $detail_barang['keterangan'] ?></textarea>
                                        </div>
                                        <?php if ($this->session->flashdata('message')) : ?>
                                            <div class="col-12">
                                                <a href="javascript:window.history.go(-2);" type="button" class="btn btn-secondary">Kembali</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!$this->session->flashdata('message')) : ?>
                                            <div class="col-12">
                                                <a href="javascript:window.history.go(-1);" type="button" class="btn btn-secondary">Kembali</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        <?php endif ?>
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