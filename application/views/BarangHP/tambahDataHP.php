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
                                        <div class="col-md-4">
                                            <label for="inputIdBHP" class="form-label">ID Barang</label>
                                            <input type="text" class="form-control" id="inputIdBHP" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputIdBHP" class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" id="inputNamaBHP" placeholder="" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputStatusBHP" class="form-label">Jenis Barang</label>
                                            <select id="inputStatusBHP" class="form-select">
                                                <option selected>- Pilih -</option>
                                                <option>Elektronik</option>
                                                <option>Bahan Kimia</option>
                                                <option>Konsumsi</option>
                                                <option>Lainnya</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputJumlahBHP" class="form-label">Jumlah Barang</label>
                                            <input type="number" class="form-control" id="inputJumlahBHP" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputSisaBHP" class="form-label">Sisa Barang</label>
                                            <input type="text" class="form-control" id="inputSisaBHP" placeholder="" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputSatuanBHP" class="form-label">Satuan</label>
                                            <select id="inputSatuanBHP" class="form-select">
                                                <option selected>- Pilih -</option>
                                                <option>pcs</option>
                                                <option>dus</option>
                                                <option>bal</option>
                                                <option>pak</option>
                                                <option>liter</option>
                                                <option>meter</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputTahunAnggaranBHP" class="form-label">Tahun Anggaran</label>
                                            <input type="text" class="form-control" id="inputTahunAnggaranBHP" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputTanggalTerimaBHP" class="form-label">Tanggal Terima</label>
                                            <input type="date" class="form-control" id="inputTanggalTerimaBHP">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputVendorBHP" class="form-label">Vendor</label>
                                            <input type="text" class="form-control" id="inputVendorBHP" placeholder="Contoh: 2021/2022" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputKondisiBHP" class="form-label">Kondisi</label>
                                            <select id="inputKondisiBHP" class="form-select">
                                                <option selected>- Pilih -</option>
                                                <option>Baik</option>
                                                <option>Rusak</option>
                                                <option>Hilang</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputHargaSatuanBHP" class="form-label">Harga Satuan</label>
                                            <input type="text" class="form-control" id="inputHargaSatuanBHP" value="Rp">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputSpesifikasiBHP" class="form-label">Spesifikasi</label>
                                            <textarea class="form-control" id="inputSpesifikasiBHP" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputKeteranganBHP" class="form-label">Keterangan</label>
                                            <textarea class="form-control" id="inputKeteranganBHP" rows="3"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <a href="javascript:window.history.go(-1);" type="button" class="btn btn-secondary">Kembali</a>
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