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
                                    <h3 class="mb-3">Lenovo IdeaCentre 5 <span class="badge text-bg-success">Kode Barang : 101</span></h3>
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card mini-stat bg-primary">
                                                <div class="card-body mini-stat-img">
                                                    <div class="mini-stat-icon">
                                                        <i class="mdi mdi-cube-outline float-end"></i>
                                                    </div>
                                                    <div class="text-white">
                                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Jumlah Keseluruhan</h6>
                                                        <h2 class="mb-4 text-white">200</h2>
                                                        <p style="font-size: 10px;">Total jumlah keseleruhan barang</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card mini-stat bg-primary">
                                                <div class="card-body mini-stat-img">
                                                    <div class="mini-stat-icon">
                                                        <i class="mdi mdi-buffer float-end"></i>
                                                    </div>
                                                    <div class="text-white">
                                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Jumlah Barang Saat Ini</h6>
                                                        <h2 class="mb-4 text-white">196</h2>
                                                        <p style="font-size: 10px;">Total jumlah barang saat ini</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card mini-stat bg-primary">
                                                <div class="card-body mini-stat-img">
                                                    <div class="mini-stat-icon">
                                                        <i class="mdi mdi-image-broken-variant float-end"></i>
                                                    </div>
                                                    <div class="text-white">
                                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Jumlah Kerusakan</h6>
                                                        <h2 class="mb-4 text-white">2</h2>
                                                        <p style="font-size: 10px;">Total jumlah barang rusak</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="card mini-stat bg-primary">
                                                <div class="card-body mini-stat-img">
                                                    <div class="mini-stat-icon">
                                                        <i class="mdi mdi-beaker-question-outline float-end"></i>
                                                    </div>
                                                    <div class="text-white">
                                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Jumlah Kehilangan</h6>
                                                        <h2 class="mb-4 text-white">2</h2>
                                                        <p style="font-size: 10px;">Total jumlah barang hilang</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Start of datatable -->
                                    <div class="table-wrapper">
                                        <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Kode Barang</th>
                                                    <th>ID Barang</th>
                                                    <th>Gambar</th>
                                                    <th>Status Barang</th>
                                                    <th>Status Peminjaman</th>
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
                                                    <td><span class="badge text-bg-success rounded-pill">Aktif</span></td>
                                                    <td><span class="badge text-bg-success rounded-pill">Dapat Dipinjam</span></td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#barangPersediaan-modal" title="Edit">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td><span class="badge text-bg-success rounded-pill">Aktif</span></td>
                                                    <td><span class="badge text-bg-success rounded-pill">Dapat Dipinjam</span></td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Edit">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td><span class="badge text-bg-success rounded-pill">Aktif</span></td>
                                                    <td><span class="badge text-bg-success rounded-pill">Dapat Dipinjam</span></td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Edit">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td><span class="badge text-bg-warning rounded-pill">Rusak</span></td>
                                                    <td><span class="badge text-bg-danger rounded-pill">Non-pinjam</span></td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Edit">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td><span class="badge text-bg-danger rounded-pill">Hilang</span></td>
                                                    <td><span class="badge text-bg-danger rounded-pill">Non-pinjam</span></td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Edit">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td><span class="badge text-bg-success rounded-pill">Aktif</span></td>
                                                    <td><span class="badge text-bg-info rounded-pill">Sedang Dipinjam</span></td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Edit">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>101</td>
                                                    <td>101.987</td>
                                                    <td>
                                                        <img src="<?= base_url() ?>assets/images/ex-img-data1.png" alt="">
                                                    </td>
                                                    <td><span class="badge text-bg-warning rounded-pill">Rusak</span></td>
                                                    <td><span class="badge text-bg-danger rounded-pill">Non-pinjam</span></td>
                                                    <td>25/07/2022</td>
                                                    <td><a class="btn btn-primary btn-sm edit" title="Edit">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- End of table -->

                                        <!-- Modal start -->
                                        <div class="modal modal-lg fade" id="barangPersediaan-modal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Barang</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Start form input -->
                                                        <form class="row g-3">
                                                            <div class="col-md-6">
                                                                <label for="inputEmail4" class="form-label">Kode Barang</label>
                                                                <input type="text" class="form-control" id="inputEmail4" value="101">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputPassword4" class="form-label">ID Barang</label>
                                                                <input type="text" class="form-control" id="inputPassword4" value="987">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="inputAddress2" class="form-label">Nama Barang</label>
                                                                <input type="text" class="form-control" id="inputAddress2" placeholder="" value="Lenovo IdeaCentre 5">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="fileUpload" class="form-label">Upload Gambar Barang</label>
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control" id="inputGroupFile02">
                                                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="inputStatusBarang" class="form-label">Status Barang</label>
                                                                <select id="inputStatusBarang" class="form-select">
                                                                    <option selected>Aktif</option>
                                                                    <option>Rusak</option>
                                                                    <option>Hilang</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="inputStatusPeminjaman" class="form-label">Status Peminjaman</label>
                                                                <select id="inputStatusPeminjaman" class="form-select">
                                                                    <option selected>Tersedia</option>
                                                                    <option>Sedang Dipinjam</option>
                                                                    <option>Tidak Dapat Dipinjam</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label>
                                                                <input type="date" class="form-control" id="tanggalMasuk">
                                                            </div>
                                                        </form>
                                                        <!-- end form input -->

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Modal -->
                                    </div>
                                    <!-- end of datatable -->
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