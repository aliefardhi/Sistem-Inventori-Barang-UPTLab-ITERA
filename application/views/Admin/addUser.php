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

                                    <h4 class="card-title">Tambah Pengguna</h4>
                                    <p class="card-title-desc">Tambahkan pengguna baru untuk dapat menggunakan sistem dengan role dan autentikasi yang sesuai.</p>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Pilih Pegawai</label>
                                        <div class="col-md-10">
                                            <select class="form-control form-select">
                                                <option>- Pilih -</option>
                                                <option>Michael Owen</option>
                                                <option>David Beckham</option>
                                                <option>Wayne Rooney</option>
                                                <option>Ferdinand</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div><!-- end row -->
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="" id="example-text-input">
                                        </div>
                                    </div><!-- end row -->
                                    <div class="mb-3 row">
                                        <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-tel-input" class="col-md-2 col-form-label">No. HP</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="tel" value="" id="example-tel-input">
                                        </div>
                                    </div><!-- end row -->
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">Role</label>
                                        <div class="col-md-10">
                                            <select class="form-control form-select">
                                                <option>- Pilih -</option>
                                                <option>Admin UPT</option>
                                                <option>Laboran</option>
                                            </select>
                                        </div>
                                    </div><!-- end row -->
                                    <div class="col-12">
                                        <a href="javascript:window.history.go(-1);" type="button" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
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

    <!-- App js -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>

</body>

</html>