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

                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title mb-3">Daftar Pegawai UPT Laboratorium ITERA</h4>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-primary btn-sm edit float-end" data-bs-toggle="modal" data-bs-target="#tambahPegawai-modal" href="<?= base_url() ?>index.php/admin/">
                                                <i class="mdi mdi-plus me-1"></i>Tambah Data Pegawai
                                            </a>
                                        </div>
                                    </div>


                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Nama Pegawai</th>
                                                <th>Status Kepegawaian</th>
                                                <th>Jabatan</th>
                                                <th>Unit Kerja</th>
                                                <th>Email</th>
                                                <th>Is Active</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Alex Ferguson</td>
                                                <td>PNS</td>
                                                <td>Kepala UPT</td>
                                                <td>UPT Laboratorium ITERA</td>
                                                <td>alex.upt@staff.itera.ac.id</td>
                                                <td>
                                                    <span class="badge rounded-pill text-bg-success">Aktif</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm edit" title="Detail" href="<?= base_url() ?>index.php/admin/detailpegawai">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- Modal start -->
                                    <div class="modal modal-lg fade" id="tambahPegawai-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Pegawai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start form input -->
                                                    <form class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="inputEmail4" class="form-label">Nama Pegawai</label>
                                                            <input type="text" class="form-control" id="inputEmail4" value="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputPassword4" class="form-label">ID Barang</label>
                                                            <input type="text" class="form-control" id="inputPassword4" value="">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="inputAddress2" class="form-label">Nama Barang</label>
                                                            <input type="text" class="form-control" id="inputAddress2" placeholder="" value="">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="fileUpload" class="form-label">Upload Gambar Barang</label>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control" id="inputGroupFile02">
                                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputNamaLab" class="form-label">Nama Lab.</label>
                                                            <select id="inputNamaLab" class="form-select">
                                                                <option selected>- Pilih -</option>
                                                                <option>Lab. Multimedia</option>
                                                                <option>Lab. Teknik Sipil</option>
                                                                <option>Lab. Kimia</option>
                                                                <option>Lab. Biologi</option>
                                                                <option>Lab. Fisika</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputRuangan" class="form-label">Ruangan</label>
                                                            <select id="inputRuangan" class="form-select">
                                                                <option selected>- Pilih -</option>
                                                                <option>Labkom 1</option>
                                                                <option>Labkom 2</option>
                                                                <option>Labkom 3</option>
                                                                <option>GK101</option>
                                                                <option>GK102</option>
                                                                <option>GK103</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="inputStatusBarang" class="form-label">Status Barang</label>
                                                            <select id="inputStatusBarang" class="form-select">
                                                                <option selected>Publik</option>
                                                                <option>Private</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="inputKondisi" class="form-label">Kondisi</label>
                                                            <select id="inputKondisi" class="form-select">
                                                                <option selected>Baik</option>
                                                                <option>Rusak</option>
                                                                <option>Hilang</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="tanggalMasuk" class="form-label">Tanggal Input</label>
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