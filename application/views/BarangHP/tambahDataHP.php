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

                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="card-title">Masukan data barang</h4>
                                            <p class="card-title-desc">Masukan data barang habis pakai melalui form dibawah ini atau dapat melakukan import data excel barang.
                                            </p>
                                        </div>

                                        <div class="col-4">
                                            <a class="btn excel-button btn-sm edit float-end mx-1" href="<?= base_url() ?>index.php/laboran/importdatahp">
                                                <i class="mdi mdi-microsoft-excel me-1"></i>Import Data Barang
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Start form input -->
                                    <form class="row g-3 mt-1">
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Kode Barang</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label">ID Barang</label>
                                            <input type="password" class="form-control" id="inputPassword4">
                                        </div>
                                        <div class="col-7">
                                            <label for="inputAddress2" class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" id="inputAddress2" placeholder="">
                                        </div>
                                        <div class="col-5">
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
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                    <!-- end form input -->

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