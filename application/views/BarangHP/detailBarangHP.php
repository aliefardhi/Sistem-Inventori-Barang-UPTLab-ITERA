<!DOCTYPE html>
<html lang="en">

<head>

    <!-- load title -->
    <?php $this->load->view('partials/title-meta') ?>
    <!-- Load css -->
    <?php $this->load->view('partials/head-css') ?>

</head>

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
                                    <div class="d-flex justify-content-between">

                                        <!-- Start details data -->
                                        <h3 class="">Lenovo IdeaCentre 5</h3>

                                        <div class="d-inline-flex">
                                            <div class="text-muted ms-3 mt-1">
                                                Created At
                                                <?= date('d/m/Y', $detail_bhp['created_at']) ?>
                                            </div>
                                            <div class="text-muted ms-3 mt-1">
                                                |
                                            </div>
                                            <div class="text-muted ms-3 mt-1">
                                                Updated At
                                                <?= date('d/m/Y', $detail_bhp['updated_at']) ?>
                                            </div>
                                            <div class="ms-3">
                                                <a href="javascript:window.history.go(-1);" class="btn btn-primary btn-sm edit" type="button" title="Kembali">
                                                    <i class="typcn typcn-chevron-left me-1"></i>Kembali
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">ID Barang</div>
                                                        <?= $detail_bhp['id_bhp'] ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Jenis Barang</div>
                                                        <?= $detail_bhp['jenis_barang'] ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2">
                                                        <div class="fw-bold">Jumlah Barang</div>
                                                        <?= $detail_bhp['jumlah'] ?>
                                                    </div>
                                                    <div class="ms-2">
                                                        |
                                                    </div>
                                                    <div class="ms-2">
                                                        <div class="fw-bold">Sisa Barang</div>
                                                        <?= $detail_bhp['sisa_barang'] ?>
                                                    </div>
                                                    <div class="ms-2">
                                                        |
                                                    </div>
                                                    <div class="ms-2">
                                                        <div class="fw-bold">Satuan</div>
                                                        <?= $detail_bhp['satuan'] ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Tahun Anggaran</div>
                                                        <?= $detail_bhp['tahun_anggaran'] ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Tanggal Terima</div>
                                                        <?= $detail_bhp['tanggal_terima'] ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Vendor</div>
                                                        <?= $detail_bhp['vendor'] ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Kondisi</div>
                                                        <?php if ($detail_bhp['kondisi'] == 'baik') : ?>
                                                            <span class="badge rounded-pill text-bg-success">Baik</span>
                                                        <?php endif; ?>
                                                        <?php if ($detail_bhp['kondisi'] == 'rusak') : ?>
                                                            <span class="badge rounded-pill text-bg-warning">Rusak</span>
                                                        <?php endif; ?>
                                                        <?php if ($detail_bhp['kondisi'] == 'hilang') : ?>
                                                            <span class="badge rounded-pill text-bg-danger">Hilang</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Spesifikasi</div>
                                                        <?= $detail_bhp['spesifikasi'] ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto" style="text-align: justify;">
                                                        <div class="fw-bold">Keterangan</div>
                                                        <?= $detail_bhp['keterangan'] ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Harga Satuan</div>
                                                        Rp<?= number_format($detail_bhp['harga_satuan'], 2, ',', '.') ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end of details data -->

                                    <!-- Modal start -->
                                    <div class="modal modal-lg fade" id="barangHP-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Barang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start form input -->
                                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/editdatahp') ?>">
                                                        <div class="col-md-4">
                                                            <label for="editIdBHP" class="form-label">ID Barang</label>
                                                            <input type="text" class="form-control" id="editIdBHP" value="<?= $detail_bhp['id_bhp'] ?>" name="editIdBhp">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editNamaBhp" class="form-label">Nama Barang</label>
                                                            <input type="text" class="form-control" id="editNamaBhp" value="<?= $detail_bhp['nama_barang'] ?>" name="editNamaBhp">
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
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">
                                                            <label for="editJumlahBhp" class="form-label">Jumlah Barang</label>
                                                            <input type="number" class="form-control" id="editJumlahBhp" name="editJumlahBhp" value="<?= $detail_bhp['jumlah'] ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editSisaBhp" class="form-label">Sisa Barang</label>
                                                            <input type="text" class="form-control" id="editSisaBhp" placeholder="" value="<?= $detail_bhp['sisa_barang'] ?>" name="editSisaBhp">
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
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-6">
                                                            <label for="editTahunAnggaranBhp" class="form-label">Tahun Anggaran</label>
                                                            <input type="text" class="form-control" id="editTahunAnggaranBhp" name="editTahunAnggaranBhp" value="<?= $detail_bhp['tahun_anggaran'] ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="editTanggalTerimaBhp" class="form-label">Tanggal Terima</label>
                                                            <input type="date" class="form-control" id="editTanggalTerimaBhp" name="editTanggalTerimaBhp" value="<?= $detail_bhp['tanggal_terima'] ?>">
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">
                                                            <label for="editVendorBhp" class="form-label">Vendor</label>
                                                            <input type="text" class="form-control" id="editVendorBhp" name="editVendorBhp" value="<?= $detail_bhp['vendor'] ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editKondisiBhp" class="form-label">Kondisi</label>
                                                            <select id="editKondisiBhp" name="editKondisiBhp" class="form-select">
                                                                <option>- Pilih -</option>
                                                                <option value="baik" <?= $detail_bhp['kondisi'] == 'baik' ? 'selected' : '' ?>>Baik</option>
                                                                <option value="rusak" <?= $detail_bhp['kondisi'] == 'rusak' ? 'selected' : '' ?>>Rusak</option>
                                                                <option value="hilang" <?= $detail_bhp['kondisi'] == 'hilang' ? 'selected' : '' ?>>Hilang</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editHargaSatuanBhp" class="form-label">Harga Satuan</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Rp</span>
                                                                <input type="text" class="form-control" id="editHargaSatuanBhp" value="<?= $detail_bhp['harga_satuan']; ?>" name="editHargaSatuanBhp">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-6">
                                                            <label for="editSpesifikasiBhp" class="form-label">Spesifikasi</label>
                                                            <textarea class="form-control" name="editSpesifikasiBhp" id="editSpesifikasiBhp" rows="3"><?= $detail_bhp['spesifikasi'] ?></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="editKeteranganBhp" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" name="editKeteranganBhp" id="editKeteranganBhp" rows="3"><?= $detail_bhp['keterangan'] ?></textarea>
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
                                    <!-- End of Modal -->

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->

                </div>
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