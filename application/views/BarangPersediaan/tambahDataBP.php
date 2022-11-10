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
                                            <a class="btn excel-button btn-sm edit float-end mx-1" href="<?= base_url() ?>index.php/laboran/importdatabp">
                                                <i class="mdi mdi-microsoft-excel me-1"></i>Import Data Barang
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Start form input -->
                                    <form class="row g-3 mt-1" method="POST" action="<?= base_url('index.php/laboran/tambahdatabp') ?>">
                                        <div class="col-md-4">
                                            <label for="namaBp" class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" id="namaBp" name="namaBp">
                                            <?= form_error('namaBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="jenisBp" class="form-label">Jenis Barang</label>
                                            <select id="jenisBp" class="form-select" name="jenisBp">
                                                <option selected>- Pilih -</option>
                                                <option value="elektronik">Elektronik</option>
                                                <option value="bahan kimia">Bahan Kimia</option>
                                                <option value="konsumsi">Konsumsi</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                            <?= form_error('jenisBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="hargaSatuanBp" class="form-label">Harga Satuan</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" class="form-control" id="hargaSatuanBp" placeholder="Contoh: 15000000" name="hargaSatuanBp">
                                            </div>
                                            <?= form_error('hargaSatuanBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="jumlahBp" class="form-label">Jumlah Barang</label>
                                            <input type="number" class="form-control" id="jumlahBp" name="jumlahBp">
                                            <?= form_error('jumlahBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sisaBp" class="form-label">Sisa Barang</label>
                                            <input type="number" class="form-control" id="sisaBp" name="sisaBp">
                                            <?= form_error('sisaBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="satuanBp" class="form-label">Satuan</label>
                                            <select id="satuanBp" class="form-select" name="satuanBp">
                                                <option selected>- Pilih -</option>
                                                <option value="pcs">pcs</option>
                                                <option value="dus">dus</option>
                                                <option value="bal">bal</option>
                                                <option value="pak">pak</option>
                                                <option value="liter">liter</option>
                                                <option value="meter">meter</option>
                                            </select>
                                            <?= form_error('satuanBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tahunAnggaranBp" class="form-label">Tahun Anggaran</label>
                                            <input type="text" class="form-control" id="tahunAnggaranBp" name="tahunAnggaranBp">
                                            <?= form_error('tahunAnggaranBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tanggalTerimaBp" class="form-label">Tanggal Terima</label>
                                            <input type="date" class="form-control" id="tanggalTerimaBp" name="tanggalTerimaBp">
                                            <?= form_error('tanggalTerimaBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="vendorBp" class="form-label">Vendor</label>
                                            <input type="text" class="form-control" id="vendorBp" name="vendorBp">
                                            <?= form_error('vendorBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="kondisiBp" class="form-label">Kondisi</label>
                                            <select id="kondisiBp" class="form-select" name="kondisiBp">
                                                <option selected>- Pilih -</option>
                                                <option value="baik">Baik</option>
                                                <option value="rusak">Rusak</option>
                                                <option value="hilang">Hilang</option>
                                            </select>
                                            <?= form_error('kondisiBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="spesifikasiBp" class="form-label">Spesifikasi</label>
                                            <textarea class="form-control" id="spesifikasiBp" rows="3" name="spesifikasiBp"></textarea>
                                            <?= form_error('spesifikasiBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="keteranganBp" class="form-label">Keterangan</label>
                                            <textarea class="form-control" id="keteranganBp" rows="3" name="keteranganBp"></textarea>
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