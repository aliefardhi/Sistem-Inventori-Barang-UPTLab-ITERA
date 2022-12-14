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
                                        <h3 class=""><?= $detail_bhp['nama_barang'] ?></h3>

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