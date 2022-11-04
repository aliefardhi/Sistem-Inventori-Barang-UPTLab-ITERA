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
                                            <h4 class="card-title">Edit data barang</h4>
                                            <p class="card-title-desc">Edit data barang habis pakai melalui form dibawah ini untuk mengubah detail data yang diperlukan.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Start form input -->
                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/laboran/editdatapersediaan/') . $detail_bhp['id_bhp'] ?>">
                                        <div class="col-md-4">
                                            <label for="editIdBHP" class="form-label">ID Barang</label>
                                            <input type="text" class="form-control" id="editIdBHP" value="<?= $detail_bhp['id_bhp'] ?>" name="editIdBhp">
                                            <?= form_error('editIdBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editNamaBhp" class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" id="editNamaBhp" value="<?= $detail_bhp['nama_barang'] ?>" name="editNamaBhp">
                                            <?= form_error('editNamaBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editJenisBhp" class="form-label">Jenis Barang</label>
                                            <select id="editJenisBhp" class="form-select" name="editJenisBhp">
                                                <option>- Pilih -</option>
                                                <option value="elektronik" <?= $detail_bhp['jenis_barang'] == 'elektronik' ? 'selected' : '' ?>>Elektronik</option>
                                                <option value="bahan kimia" <?= $detail_bhp['jenis_barang'] == 'bahan kimia' ? 'selected' : '' ?>>Bahan Kimia</option>
                                                <option value="konsumsi" <?= $detail_bhp['jenis_barang'] == 'konsumsi' ? 'selected' : '' ?>>Konsumsi</option>
                                                <option value="lainnya" <?= $detail_bhp['jenis_barang'] == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                                            </select>
                                            <?= form_error('editJenisBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="col-md-4">
                                            <label for="editJumlahBhp" class="form-label">Jumlah Barang</label>
                                            <input type="number" class="form-control" id="editJumlahBhp" name="editJumlahBhp" value="<?= $detail_bhp['jumlah'] ?>">
                                            <?= form_error('editJumlahBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editSisaBhp" class="form-label">Sisa Barang</label>
                                            <input type="number" class="form-control" id="editSisaBhp" value="<?= $detail_bhp['sisa_barang'] ?>" name="editSisaBhp">
                                            <?= form_error('editSisaBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editSatuanBhp" class="form-label">Satuan</label>
                                            <select id="editSatuanBhp" class="form-select" name="editSatuanBhp">
                                                <option>- Pilih -</option>
                                                <option <?= $detail_bhp['satuan'] == 'pcs' ? 'selected' : '' ?> value="pcs">pcs</option>
                                                <option <?= $detail_bhp['satuan'] == 'dus' ? 'selected' : '' ?> value="dus">dus</option>
                                                <option <?= $detail_bhp['satuan'] == 'bal' ? 'selected' : '' ?> value="bal">bal</option>
                                                <option <?= $detail_bhp['satuan'] == 'pak' ? 'selected' : '' ?> value="pak">pak</option>
                                                <option <?= $detail_bhp['satuan'] == 'liter' ? 'selected' : '' ?> value="liter">liter</option>
                                                <option <?= $detail_bhp['satuan'] == 'meter' ? 'selected' : '' ?> value="meter">meter</option>
                                            </select>
                                            <?= form_error('editSatuanBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="col-md-6">
                                            <label for="editTahunAnggaranBhp" class="form-label">Tahun Anggaran</label>
                                            <input type="text" class="form-control" id="editTahunAnggaranBhp" name="editTahunAnggaranBhp" value="<?= $detail_bhp['tahun_anggaran'] ?>">
                                            <?= form_error('editTahunAnggaranBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="editTanggalTerimaBhp" class="form-label">Tanggal Terima</label>
                                            <input type="date" class="form-control" id="editTanggalTerimaBhp" name="editTanggalTerimaBhp" value="<?= $detail_bhp['tanggal_terima'] ?>">
                                            <?= form_error('editTanggalTerimaBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="col-md-4">
                                            <label for="editVendorBhp" class="form-label">Vendor</label>
                                            <input type="text" class="form-control" id="editVendorBhp" name="editVendorBhp" value="<?= $detail_bhp['vendor'] ?>">
                                            <?= form_error('editVendorBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editKondisiBhp" class="form-label">Kondisi</label>
                                            <select id="editKondisiBhp" name="editKondisiBhp" class="form-select">
                                                <option>- Pilih -</option>
                                                <option value="baik" <?= $detail_bhp['kondisi'] == 'baik' ? 'selected' : '' ?>>Baik</option>
                                                <option value="rusak" <?= $detail_bhp['kondisi'] == 'rusak' ? 'selected' : '' ?>>Rusak</option>
                                                <option value="hilang" <?= $detail_bhp['kondisi'] == 'hilang' ? 'selected' : '' ?>>Hilang</option>
                                            </select>
                                            <?= form_error('editKondisiBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editHargaSatuanBhp" class="form-label">Harga Satuan</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="text" class="form-control" id="editHargaSatuanBhp" value="<?= $detail_bhp['harga_satuan']; ?>" name="editHargaSatuanBhp">
                                            </div>
                                            <?= form_error('editHargaSatuanBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="col-md-6">
                                            <label for="editSpesifikasiBhp" class="form-label">Spesifikasi</label>
                                            <textarea class="form-control" name="editSpesifikasiBhp" id="editSpesifikasiBhp" rows="3"><?= $detail_bhp['spesifikasi'] ?></textarea>
                                            <?= form_error('editSpesifikasiBhp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="editKeteranganBhp" class="form-label">Keterangan</label>
                                            <textarea class="form-control" name="editKeteranganBhp" id="editKeteranganBhp" rows="3"><?= $detail_bhp['keterangan'] ?></textarea>
                                            <?= form_error('editKeteranganBhp', '<small class="text-danger pl-3">', '</small>'); ?>
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