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
                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/laboran/editdatapersediaan/') . $detail_persediaan['id_persediaan'] ?>">
                                        <div class="col-md-4">
                                            <label for="editIdBp" class="form-label">ID Barang</label>
                                            <input type="text" class="form-control" id="editIdBp" value="<?= $detail_persediaan['id_persediaan'] ?>" name="editIdBp">
                                            <?= form_error('editIdBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editNamaBp" class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" id="editNamaBp" value="<?= $detail_persediaan['nama_barang'] ?>" name="editNamaBp">
                                            <?= form_error('editNamaBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editJenisBp" class="form-label">Jenis Barang</label>
                                            <select id="editJenisBp" class="form-select" name="editJenisBp">
                                                <option>- Pilih -</option>
                                                <option value="elektronik" <?= $detail_persediaan['jenis_barang'] == 'elektronik' ? 'selected' : '' ?>>Elektronik</option>
                                                <option value="bahan kimia" <?= $detail_persediaan['jenis_barang'] == 'bahan kimia' ? 'selected' : '' ?>>Bahan Kimia</option>
                                                <option value="konsumsi" <?= $detail_persediaan['jenis_barang'] == 'konsumsi' ? 'selected' : '' ?>>Konsumsi</option>
                                                <option value="lainnya" <?= $detail_persediaan['jenis_barang'] == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                                            </select>
                                            <?= form_error('editJenisBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="col-md-4">
                                            <label for="editJumlahBp" class="form-label">Jumlah Barang</label>
                                            <input type="number" class="form-control" id="editJumlahBp" name="editJumlahBp" value="<?= $detail_persediaan['jumlah'] ?>">
                                            <?= form_error('editJumlahBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editSisaBp" class="form-label">Sisa Barang</label>
                                            <input type="number" class="form-control" id="editSisaBp" value="<?= $detail_persediaan['sisa_barang'] ?>" name="editSisaBp">
                                            <?= form_error('editSisaBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editSatuanBp" class="form-label">Satuan</label>
                                            <select id="editSatuanBp" class="form-select" name="editSatuanBp">
                                                <option>- Pilih -</option>
                                                <option <?= $detail_persediaan['satuan'] == 'pcs' ? 'selected' : '' ?> value="pcs">pcs</option>
                                                <option <?= $detail_persediaan['satuan'] == 'dus' ? 'selected' : '' ?> value="dus">dus</option>
                                                <option <?= $detail_persediaan['satuan'] == 'bal' ? 'selected' : '' ?> value="bal">bal</option>
                                                <option <?= $detail_persediaan['satuan'] == 'pak' ? 'selected' : '' ?> value="pak">pak</option>
                                                <option <?= $detail_persediaan['satuan'] == 'liter' ? 'selected' : '' ?> value="liter">liter</option>
                                                <option <?= $detail_persediaan['satuan'] == 'meter' ? 'selected' : '' ?> value="meter">meter</option>
                                            </select>
                                            <?= form_error('editSatuanBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="col-md-6">
                                            <label for="editTahunAnggaranBp" class="form-label">Tahun Anggaran</label>
                                            <input type="text" class="form-control" id="editTahunAnggaranBp" name="editTahunAnggaranBp" value="<?= $detail_persediaan['tahun_anggaran'] ?>">
                                            <?= form_error('editTahunAnggaranBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="editTanggalTerimaBp" class="form-label">Tanggal Terima</label>
                                            <input type="date" class="form-control" id="editTanggalTerimaBp" name="editTanggalTerimaBp" value="<?= $detail_persediaan['tanggal_terima'] ?>">
                                            <?= form_error('editTanggalTerimaBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="col-md-4">
                                            <label for="editVendorBp" class="form-label">Vendor</label>
                                            <input type="text" class="form-control" id="editVendorBp" name="editVendorBp" value="<?= $detail_persediaan['vendor'] ?>">
                                            <?= form_error('editVendorBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editKondisiBp" class="form-label">Kondisi</label>
                                            <select id="editKondisiBp" name="editKondisiBp" class="form-select">
                                                <option>- Pilih -</option>
                                                <option value="baik" <?= $detail_persediaan['kondisi'] == 'baik' ? 'selected' : '' ?>>Baik</option>
                                                <option value="rusak" <?= $detail_persediaan['kondisi'] == 'rusak' ? 'selected' : '' ?>>Rusak</option>
                                                <option value="hilang" <?= $detail_persediaan['kondisi'] == 'hilang' ? 'selected' : '' ?>>Hilang</option>
                                            </select>
                                            <?= form_error('editKondisiBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="editHargaSatuanBp" class="form-label">Harga Satuan</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="text" class="form-control" id="editHargaSatuanBp" value="<?= $detail_persediaan['harga_satuan']; ?>" name="editHargaSatuanBp">
                                            </div>
                                            <?= form_error('editHargaSatuanBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <hr>
                                        <div class="col-md-6">
                                            <label for="editSpesifikasiBp" class="form-label">Spesifikasi</label>
                                            <textarea class="form-control" name="editSpesifikasiBp" id="editSpesifikasiBp" rows="3"><?= $detail_persediaan['spesifikasi'] ?></textarea>
                                            <?= form_error('editSpesifikasiBp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="editKeteranganBp" class="form-label">Keterangan</label>
                                            <textarea class="form-control" name="editKeteranganBp" id="editKeteranganBp" rows="3"><?= $detail_persediaan['keterangan'] ?></textarea>
                                            <?= form_error('editKeteranganBp', '<small class="text-danger pl-3">', '</small>'); ?>
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