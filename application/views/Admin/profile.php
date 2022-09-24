<!DOCTYPE html>
<html lang="en">

<head>
    <!-- load title -->
    <?php $this->load->view('partials/title-meta') ?>
    <!-- load css -->
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

                    <!-- Start content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Detail Profile</h4>
                                    <p class="card-title-desc">Anda dapat mengatur detail profil anda melalui form dibawah ini.</p>

                                    <form action="">

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="David Beckham" id="example-text-input">
                                            </div>
                                        </div><!-- end row -->
                                        <div class="mb-3 row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="email" value="david.staff@staff.itera.ac.id" id="example-email-input">
                                            </div>
                                        </div><!-- end row -->
                                        <div class="mb-3 row">
                                            <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="password" value="manchesterunited" id="example-password-input">
                                            </div>
                                        </div><!-- end row  -->
                                        <div class="mb-3 row">
                                            <label for="fileUpload" class="col-md-2 col-form-label">Upload Foto Profil</label>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" id="inputGroupFile02" value="">
                                            </div>
                                        </div><!-- end row  -->
                                        <div class="mb-3 row">
                                            <label for="example-tel-input" class="col-md-2 col-form-label">No. HP</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="tel" value="08127783423" id="example-tel-input">
                                            </div>
                                        </div><!-- end row -->
                                        <div class="mb-3 row">
                                            <label class="col-md-2 col-form-label">Jabatan</label>
                                            <div class="col-md-10">
                                                <select class="form-control form-select">
                                                    <option>Kepala UPT Lab</option>
                                                    <option>Admin UPT Lab</option>
                                                    <option>Koordinator Laboratorium</option>
                                                    <option>Laboran</option>
                                                </select>
                                            </div>
                                        </div><!-- end row -->
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>

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

    <script type="text/javascript" src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>

</body>

</html>