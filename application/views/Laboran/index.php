<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php $this->load->view('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- Page title -->
                    <?php $this->load->view('partials/page-title') ?>
                    <!-- End of page title -->

                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-cube-outline float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Data Ruangan</h6>
                                        <h2 class="mb-4 text-white"><?= $countRuangan->id_ruang ?></h2>
                                        <span class="">Ruangan pada <?= $countRuangan->nama_lab ?></span>
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
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Nilai Barang Modal</h6>
                                        <h2 class="mb-4 text-white">Rp<?= number_format($nilaiBarangModal->harga_satuan, 2, ',', '.') ?> </h2>
                                        <span class=""><?= $countBarangModalLab->id_barang_bmn ?> Barang Modal <?= $countRuangan->nama_lab ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-tag-text-outline float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Nilai Barang Persediaan</h6>
                                        <h2 class="mb-4 text-white">Rp<?= number_format($nilaiPersediaanLab->harga_satuan, 2, ',', '.') ?></h2>
                                        <span class="">Jumlah nilai persediaan pada <?= $countRuangan->nama_lab ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-briefcase-check float-end"></i>
                                    </div>
                                    <div class="text-white">
                                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Nilai BHP</h6>
                                        <h2 class="mb-4 text-white">Rp<?= number_format($nilaiBhpLab->harga_satuan, 2, ',', '.') ?></h2>
                                        <span class="">Jumlah nilai BHP pada <?= $countRuangan->nama_lab ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Data Barang Laboratorium</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $countBarangModalLab->id_barang_bmn ?></h5>
                                            <p class="text-muted">Barang Modal</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $countPersediaanLab->id_persediaan ?></h5>
                                            <p class="text-muted">Barang Persediaan</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $countBhpLab->id_bhp ?></h5>
                                            <p class="text-muted">Barang Habis Pakai</p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center align-items-center">
                                        <div id="dataBarangLab" class="morris-charts morris-charts-height" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Data Barang Modal Laboratorium</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $countBarangBaikLab->baik ?></h5>
                                            <p class="text-muted">Baik</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $countBarangRusakLab->rusak ?></h5>
                                            <p class="text-muted">Rusak</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $countBarangHilangLab->hilang ?></h5>
                                            <p class="text-muted">Hilang</p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center align-items-center">
                                        <div id="barangModal" class="morris-charts morris-charts-height" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Data Barang Persediaan Laboratorium</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $persediaanBaikLab->baik ?></h5>
                                            <p class="text-muted">Baik</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $persediaanRusakLab->rusak ?></h5>
                                            <p class="text-muted">Rusak</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $persediaanHilangLab->hilang ?></h5>
                                            <p class="text-muted">Hilang</p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center align-items-center">
                                        <div id="barangPersediaan" class="morris-charts morris-charts-height" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">BHP Laboratorium</h4>

                                    <div class="row text-center mt-4">
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $bhpBaikLab->baik ?></h5>
                                            <p class="text-muted">Baik</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $bhpRusakLab->rusak ?></h5>
                                            <p class="text-muted">Rusak</p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="font-size-20"><?= $bhpHilangLab->hilang ?></h5>
                                            <p class="text-muted">Hilang</p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center align-items-center">
                                        <div id="bhp" class="morris-charts morris-charts-height" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php $this->load->view('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <?php $this->load->view('partials/vendor-scripts') ?>

    <!--Morris Chart-->
    <script type="text/javascript" src="<?= base_url() ?>assets/libs/morris.js/morris.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/libs/raphael/raphael.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>

    <script>
        Morris.Donut({

            element: "dataBarangLab",
            data: [{
                    label: "Data Barang Modal",
                    value: <?= $countBarangModalLab->id_barang_bmn ?>
                },
                {
                    label: "Data Barang Persediaan",
                    value: <?= $countPersediaanLab->id_persediaan ?>
                },
                {
                    label: "Data Barang Habis Pakai",
                    value: <?= $countBhpLab->id_bhp ?>
                },
            ],
            colors: ["#45b5a8", "#995253", "#4a708b"],
        });

        Morris.Donut({

            element: "barangModal",
            data: [{
                    label: "Barang Modal Hilang",
                    value: <?= $countBarangHilangLab->hilang ?>
                },
                {
                    label: "Barang Modal Rusak",
                    value: <?= $countBarangRusakLab->rusak ?>
                },
                {
                    label: "Barang Modal Baik",
                    value: <?= $countBarangBaikLab->baik ?>
                },
            ],
            colors: ["#497174", "#EB6440", "#0D4C92"],
        });

        Morris.Donut({

            element: "barangPersediaan",
            data: [{
                    label: "Persediaan Hilang",
                    value: <?= $persediaanHilangLab->hilang ?>
                },
                {
                    label: "Persediaan Rusak",
                    value: <?= $persediaanRusakLab->rusak ?>
                },
                {
                    label: "Persediaan Baik",
                    value: <?= $persediaanBaikLab->baik ?>
                },
            ],
            colors: ["#FED049", "#68B984", "#344D67"],
        });

        Morris.Donut({

            element: "bhp",
            data: [{
                    label: "Barang Habis Pakai Hilang",
                    value: <?= $bhpHilangLab->hilang ?>
                },
                {
                    label: "Barang Habis Pakai Rusak",
                    value: <?= $bhpRusakLab->rusak ?>
                },
                {
                    label: "Barang Habis Pakai Baik",
                    value: <?= $bhpBaikLab->baik ?>
                },
            ],
            colors: ["#F49D1A", "#8B7E74", "#5F8D4E"],
        });
    </script>

</body>

</html>