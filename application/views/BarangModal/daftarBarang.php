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

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Monthly Earnings</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-6">
                                            <h5 class="font-size-20">$56241</h5>
                                            <p class="text-muted">Marketplace</p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-20">$23651</h5>
                                            <p class="text-muted">Total Income</p>
                                        </div>
                                    </div>

                                    <div id="morris-donut-example" class="morris-charts morris-charts-height" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Monthly Earnings</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-6">
                                            <h5 class="font-size-20">$ 2548</h5>
                                            <p class="text-muted">Marketplace</p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-20">$ 6985</h5>
                                            <p class="text-muted">Total Income</p>
                                        </div>
                                    </div>

                                    <div id="morris-bar-stacked" class="morris-charts morris-charts-height" dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xl-6">
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
                                <div class="col-xl-6">
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
                            <div class="row">
                                <div class="col-xl-6">
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
                                <div class="col-xl-6">
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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Daftar Barang</h4>
                                    <p class="card-title-desc">Daftar barang modal.
                                    </p>

                                    <div class="table-wrapper">

                                        <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Kode Barang</th>
                                                    <th>ID Barang</th>
                                                    <th>Gambar</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah Saat Ini</th>
                                                    <th>Jumlah Keseluruhan</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td>Lenovo IdeaCentre 5</td>
                                                    <td>150</td>
                                                    <td>150</td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                            Pilih
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td>Lenovo IdeaCentre 5</td>
                                                    <td>150</td>
                                                    <td>150</td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                            Pilih
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td>Lenovo IdeaCentre 5</td>
                                                    <td>150</td>
                                                    <td>150</td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                            Pilih
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td>Lenovo IdeaCentre 5</td>
                                                    <td>150</td>
                                                    <td>150</td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                            Pilih
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td>Lenovo IdeaCentre 5</td>
                                                    <td>150</td>
                                                    <td>150</td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                            Pilih
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td>Lenovo IdeaCentre 5</td>
                                                    <td>150</td>
                                                    <td>150</td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                            Pilih
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td>Lenovo IdeaCentre 5</td>
                                                    <td>150</td>
                                                    <td>150</td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Pilih">
                                                            Pilih
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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