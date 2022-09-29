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
                                                29/09/2022
                                            </div>
                                            <div class="text-muted ms-3 mt-1">
                                                |
                                            </div>
                                            <div class="text-muted ms-3 mt-1">
                                                Updated At
                                                29/09/2022
                                            </div>
                                            <div class="ms-3">
                                                <a class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#barangHP-modal" title="Edit">
                                                    <i class="mdi mdi-square-edit-outline"></i>Edit
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
                                                        101
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Jenis Barang</div>
                                                        Elektronik
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2">
                                                        <div class="fw-bold">Jumlah Barang</div>
                                                        250
                                                    </div>
                                                    <div class="ms-2">
                                                        |
                                                    </div>
                                                    <div class="ms-2">
                                                        <div class="fw-bold">Sisa Barang</div>
                                                        200
                                                    </div>
                                                    <div class="ms-2">
                                                        |
                                                    </div>
                                                    <div class="ms-2">
                                                        <div class="fw-bold">Satuan</div>
                                                        pcs
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Tahun Anggaran</div>
                                                        2021/2022
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Tanggal Terima</div>
                                                        29/09/2022
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Vendor</div>
                                                        Maju Jaya Komputer
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Kondisi</div>
                                                        <span class="badge rounded-pill text-bg-success">Baik</span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Spesifikasi</div>
                                                        Intel Core i7-12700k, AMD Radeon 6700xt 12GB, RAM8GB, 512SSD
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto" style="text-align: justify;">
                                                        <div class="fw-bold">Keterangan</div>
                                                        Hanya digunakan untuk kegiatan pembelajaran/praktikum.
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Harga Satuan</div>
                                                        Rp15.000.000
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
                                                    <form class="row g-3">
                                                        <div class="col-md-4">
                                                            <label for="editIdPersediaan" class="form-label">ID Barang</label>
                                                            <input type="text" class="form-control" id="editIdPersediaan" value="101">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editIdPersediaan" class="form-label">Nama Barang</label>
                                                            <input type="text" class="form-control" id="editNamaPersediaan" placeholder="" value="Lenovo IdeaCentre 5">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editStatusBarang" class="form-label">Jenis Barang</label>
                                                            <select id="editStatusBarang" class="form-select">
                                                                <option selected>Elektronik</option>
                                                                <option>Bahan Kimia</option>
                                                                <option>Konsumsi</option>
                                                                <option>Lainnya</option>
                                                                <option>...</option>
                                                            </select>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">
                                                            <label for="editJumlahPersediaan" class="form-label">Jumlah Barang</label>
                                                            <input type="number" class="form-control" id="editJumlahPersediaan" value="250">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editSisaPersediaan" class="form-label">Sisa Barang</label>
                                                            <input type="text" class="form-control" id="editSisaPersediaan" placeholder="" value="200">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editSatuanPersediaan" class="form-label">Satuan</label>
                                                            <select id="editSatuanPersediaan" class="form-select">
                                                                <option>- Pilih -</option>
                                                                <option selected>pcs</option>
                                                                <option>dus</option>
                                                                <option>bal</option>
                                                                <option>pak</option>
                                                                <option>liter</option>
                                                                <option>meter</option>
                                                                <option>...</option>
                                                            </select>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-6">
                                                            <label for="editTahunAnggaranPersediaan" class="form-label">Tahun Anggaran</label>
                                                            <input type="text" class="form-control" id="editTahunAnggaranPersediaan" value="2021/2022">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="editTanggalTerimaPersediaan" class="form-label">Tanggal Terima</label>
                                                            <input type="date" class="form-control" id="editTanggalTerimaPersediaan">
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">
                                                            <label for="editVendorPersediaan" class="form-label">Vendor</label>
                                                            <input type="text" class="form-control" id="editVendorPersediaan" placeholder="" value="200">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editKondisiPersediaan" class="form-label">Kondisi</label>
                                                            <select id="editKondisiPersediaan" class="form-select">
                                                                <option>- Pilih -</option>
                                                                <option selected>Baik</option>
                                                                <option>Rusak</option>
                                                                <option>Hilang</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editHargaSatuanPersediaan" class="form-label">Harga Satuan</label>
                                                            <input type="text" class="form-control" id="editHargaSatuanPersediaan" value="Rp15000000">
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-6">
                                                            <label for="editSpesifikasiPersediaan" class="form-label">Spesifikasi</label>
                                                            <textarea class="form-control" id="editSpesifikasiPersediaan" rows="3"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="editKeteranganPersediaan" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" id="editKeteranganPersediaan" rows="3"></textarea>
                                                        </div>
                                                    </form>
                                                    <!-- end form input -->

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Simpan</button>
                                                </div>
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