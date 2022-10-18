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

                                    <!-- Start details data -->
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class=""><?= $detail_pegawai_upt->nama_pegawai ?></h3>
                                        </div>

                                        <div class="col-6">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-muted ms-3 mt-1">
                                                    Created At
                                                    <?= $detail_pegawai_upt->created_at ?>
                                                </div>
                                                <div class="text-muted ms-3 mt-1">
                                                    |
                                                </div>
                                                <div class="text-muted ms-3 mt-1">
                                                    Updated At
                                                    <?= $detail_pegawai_upt->updated_at ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">ID Pegawai</div>
                                                        <?= $detail_pegawai_upt->id_pegawai ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">NRK</div>
                                                        <?= $detail_pegawai_upt->nrk ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">NIP</div>
                                                        <?= $detail_pegawai_upt->nip ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Jabatan</div>
                                                        <div class="text-capitalize">
                                                            <?= $detail_pegawai_upt->jabatan ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Unit Kerja</div>
                                                        <?= $detail_pegawai_upt->nama_lab ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Tanggal Lahir</div>
                                                        <?= $detail_pegawai_upt->tgl_lahir ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold"><i class="mdi mdi-email-outline me-1"></i>Email</div>
                                                        <?= $detail_pegawai_upt->email ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold"><i class="mdi mdi-cellphone-android me-1"></i>No. HP</div>
                                                        <?= $detail_pegawai_upt->kontak ?>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Status Kepegawaian</div>
                                                        <div class="text-uppercase">
                                                            <?= $detail_pegawai_upt->status ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php if ($detail_pegawai_upt->is_active == 'Aktif') : ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="ms-2 me-auto">
                                                            <div class="fw-bold">Is Active</div>
                                                            <span class="badge rounded-pill text-bg-success">Aktif</span>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($detail_pegawai_upt->is_active == 'Tidak Aktif') : ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="ms-2 me-auto">
                                                            <div class="fw-bold">Is Active</div>
                                                            <span class="badge rounded-pill text-bg-danger">Tidak Aktif</span>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
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