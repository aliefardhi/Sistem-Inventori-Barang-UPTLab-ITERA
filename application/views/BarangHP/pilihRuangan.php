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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Pilih Ruangan</h4>
                                    <p class="card-title-desc">Pilih ruangan untuk melihat daftar barang pada ruangan terkait.
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>
                                                    <a href="<?= base_url() ?>index.php/baranghp/daftarbarang" class="btn btn-primary btn-sm edit" title="Edit">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>
                                                    <a href="<?= base_url() ?>index.php/baranghp/daftarbarang" class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Herrod Chandler</td>
                                                <td>Sales Assistant</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rhona Davidson</td>
                                                <td>Integration Specialist</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Colleen Hurst</td>
                                                <td>Javascript Developer</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sonya Frost</td>
                                                <td>Software Engineer</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jena Gaines</td>
                                                <td>Office Manager</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quinn Flynn</td>
                                                <td>Support Lead</td>
                                                <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Charde Marshall</td>
                                                <td>Regional Director</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Haley Kennedy</td>
                                                <td>Senior Marketing Designer</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tatyana Fitzpatrick</td>
                                                <td>Regional Director</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Michael Silva</td>
                                                <td>Marketing Designer</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Paul Byrd</td>
                                                <td>Chief Financial Officer (CFO)</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Lael Greer</td>
                                                <td>Systems Administrator</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jonas Alexander</td>
                                                <td>Developer</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Shad Decker</td>
                                                <td>Regional Director</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>Javascript Developer</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Donna Snider</td>
                                                <td>Customer Support</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Pilih">
                                                        Pilih
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

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

    <script type="text/javascript" src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>

</body>

</html>