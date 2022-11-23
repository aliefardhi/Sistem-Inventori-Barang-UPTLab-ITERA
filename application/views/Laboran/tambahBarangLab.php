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
                                        <div class="col-8">
                                            <h4 class="card-title">Masukan data barang</h4>
                                            <p class="card-title-desc">Masukan data barang habis pakai melalui form dibawah ini atau dapat melakukan import data excel barang.
                                            </p>
                                        </div>

                                        <div class="col-4">
                                            <a class="btn excel-button btn-sm edit float-end mx-1" href="<?= base_url() ?>index.php/laboran/importdatahp">
                                                <i class="mdi mdi-microsoft-excel me-1"></i>Import Data Barang
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Start form input -->
                                    <form class="row g-3 mt-1" method="POST" action="<?= base_url('index.php/laboran/tambahdatahp') ?>">
                                        <input type="hidden" value="<?= $user_session->id_lab ?>">
                                        <input type="hidden" value="<?= $user_session->id_pegawai ?>">

                                        <div class="col-md-4">
                                            <label for="namaBarang" class="form-label">Nama Barang</label>
                                            <select id="namaBarang" class="form-select" name="namaBarang">
                                                <option selected>- Pilih -</option>
                                                <?php foreach ($barang_bmn as $bmn) : ?>
                                                    <option value="<?= $bmn->id_barang_bmn ?>"><?= $bmn->nama_barang ?>(<?= $bmn->id_barang_bmn ?>)</option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('namaBarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kondisi" class="form-label">Kondisi</label>
                                            <select id="kondisi" class="form-select" name="kondisi">
                                                <option selected>- Pilih -</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Rusak Ringan">Rusak Ringan</option>
                                                <option value="Rusak Berat">Rusak Berat</option>
                                            </select>
                                            <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="statusBarang" class="form-label">Status</label>
                                            <select id="statusBarang" class="form-select" name="statusBarang">
                                                <option selected>- Pilih -</option>
                                                <option value="Publik">Publik</option>
                                                <option value="Privat">Privat</option>
                                            </select>
                                            <?= form_error('statusBarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <label for="hargaSatuanBhp" class="form-label">Harga Satuan</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" id="hargaSatuanBhp" placeholder="Contoh: 15000000" name="hargaSatuanBhp">
                                            </div>
                                            <?= form_error('hargaSatuanBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="jumlahBhp" class="form-label">Jumlah Barang</label>
                                            <input type="number" class="form-control" id="jumlahBhp" name="jumlahBhp">
                                            <?= form_error('jumlahBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sisaBhp" class="form-label">Sisa Barang</label>
                                            <input type="number" class="form-control" id="sisaBhp" name="sisaBhp">
                                            <?= form_error('sisaBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="satuanBhp" class="form-label">Satuan</label>
                                            <select id="satuanBhp" class="form-select" name="satuanBhp">
                                                <option selected>- Pilih -</option>
                                                <option value="pcs">pcs</option>
                                                <option value="dus">dus</option>
                                                <option value="bal">bal</option>
                                                <option value="pak">pak</option>
                                                <option value="liter">liter</option>
                                                <option value="meter">meter</option>
                                            </select>
                                            <?= form_error('satuanBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tahunAnggaranBhp" class="form-label">Tahun Anggaran</label>
                                            <input type="text" class="form-control" id="tahunAnggaranBhp" name="tahunAnggaranBhp">
                                            <?= form_error('tahunAnggaranBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tanggalTerimaBhp" class="form-label">Tanggal Terima</label>
                                            <input type="date" class="form-control" id="tanggalTerimaBhp" name="tanggalTerimaBhp">
                                            <?= form_error('tanggalTerimaBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="vendorBhp" class="form-label">Vendor</label>
                                            <input type="text" class="form-control" id="vendorBhp" name="vendorBhp">
                                            <?= form_error('vendorBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="kondisiBhp" class="form-label">Kondisi</label>
                                            <select id="kondisiBhp" class="form-select" name="kondisiBhp">
                                                <option selected>- Pilih -</option>
                                                <option value="baik">Baik</option>
                                                <option value="rusak">Rusak</option>
                                                <option value="hilang">Hilang</option>
                                            </select>
                                            <?= form_error('kondisiBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="spesifikasiBhp" class="form-label">Spesifikasi</label>
                                            <textarea class="form-control" id="spesifikasiBhp" rows="3" name="spesifikasiBhp"></textarea>
                                            <?= form_error('spesifikasiBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="keteranganBhp" class="form-label">Keterangan</label>
                                            <textarea class="form-control" id="keteranganBhp" rows="3" name="keteranganBhp"></textarea>
                                        </div> -->
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