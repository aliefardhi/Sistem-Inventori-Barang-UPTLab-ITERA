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

                    <!-- start room dashboard -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h3 class="">Laboratorium Multimedia</h3>
                                            <p class="card-title-desc"> <i class="far fa-building"></i> Laboratorium Teknik 2 | Lantai 2</p>
                                            <p class="card-title-desc"> <i class="mdi mdi-email-outline"></i> lab.mm@itera.ac.id</p>
                                            <p class="card-title-desc"> <i class="fas fa-user" style="margin-right: 5px;"></i>Michael Owen | michael@laboran.itera.ac.id</p>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="card mini-stat">
                                                        <div class="card-body">
                                                            <h4 class="card-title mb-4">Monthly Earnings</h4>

                                                            <!-- <div id="morris-donut-example" class="morris-charts morris-charts-height" dir="ltr"></div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="card mini-stat bg-primary">
                                                        <div class="card-body mini-stat-img">
                                                            <div class="mini-stat-icon">
                                                                <i class="mdi mdi-cube-outline float-end"></i>
                                                            </div>
                                                            <div class="text-white">
                                                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Orders</h6>
                                                                <h2 class="mb-4 text-white">1,587</h2>
                                                                <span class="badge bg-info"> +11% </span> <span class="ms-2">From previous period</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end room dashboard -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title">Daftar Barang</h4>
                                            <p class="card-title-desc">Daftar barang-barang yang terdapat pada ruangan -.
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <a class="btn btn-primary btn-sm edit float-end" href="<?= base_url() ?>index.php/laboran/tambahdatahp">
                                                <i class="mdi mdi-plus me-1"></i>Tambah Data Barang
                                            </a>
                                            <a class="btn excel-button btn-sm edit float-end mx-1">
                                                <i class="mdi mdi-microsoft-excel me-1"></i>Export Data Barang
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Start table -->
                                    <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>ID Barang</th>
                                                <th>Nama</th>
                                                <th>Jenis</th>
                                                <th>Jumlah</th>
                                                <th>Sisa Barang</th>
                                                <th>Satuan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>101.987</td>
                                                <td>Lenovo IdeaCentre 5</td>
                                                <td>Elektronik</td>
                                                <td>150</td>
                                                <td>145</td>
                                                <td>pcs</td>
                                                <td><a class="btn btn-primary btn-sm edit" title="Detail" href="<?= base_url() ?>index.php/baranghp/detailbaranghp">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- End of table -->

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