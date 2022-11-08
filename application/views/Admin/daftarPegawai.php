<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- @@include("partials/menu.html") -->
        <?php $this->load->view('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" id="main-content" data-url='<?= base_url() ?>index.php/admin'>
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
                                        <?php if ($this->session->flashdata('message')) : ?>
                                            <?= $this->session->flashdata('message'); ?>
                                        <?php endif; ?>
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
                                            <?php foreach ($all_pegawai_upt as $upt) : ?>
                                                <tr>
                                                    <td><?= $upt->nama_pegawai ?></td>
                                                    <td class="text-uppercase"><?= $upt->status ?></td>
                                                    <td class="text-capitalize"><?= $upt->jabatan ?></td>
                                                    <td><?= $upt->nama_lab ?></td>
                                                    <td><?= $upt->email ?></td>
                                                    <?php if ($upt->is_active == 'Aktif') : ?>
                                                        <td>
                                                            <span class="badge rounded-pill text-bg-success">Aktif</span>

                                                        </td>
                                                    <?php endif ?>
                                                    <?php if ($upt->is_active == 'Tidak Aktif') : ?>
                                                        <td>
                                                            <span class="badge rounded-pill text-bg-danger">Tidak Aktif</span>

                                                        </td>
                                                    <?php endif ?>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm edit" title="Detail" href="<?= base_url('index.php/admin/detailpegawai/' . $upt->id_pegawai) ?>">
                                                            <i class="mdi mdi-information-outline"></i>
                                                        </a>

                                                        <a class="btn btn-info btn-sm edit" title="Edit" href="<?= base_url('index.php/admin/editpegawai/' . $upt->id_pegawai) ?>">
                                                            <i class="mdi mdi-account-edit-outline"></i>
                                                        </a>

                                                        <a class="btn btn-danger btn-sm edit tombol-delete" title="Hapus" href="<?= base_url('index.php/admin/deletePegawai/' . $upt->id_pegawai) ?>">
                                                            <i class="mdi mdi-trash-can-outline"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <!-- Modal Tambah Data start -->
                                    <div class="modal modal-lg fade" id="tambahPegawai-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Pegawai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start form input -->
                                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/admin/daftarpegawai') ?>">
                                                        <div class="col-md-6">
                                                            <label for="pilihPegawaiSimuk" class="form-label">Pilih Pegawai</label>
                                                            <select name="id_pegawai" id="pilihPegawaiSimuk" class="form-select">
                                                                <option selected>- Pilih -</option>
                                                                <?php foreach ($all_pegawai_simuk as $pegawai) : ?>
                                                                    <option value="<?= $pegawai->id_pegawai ?>"><?= $pegawai->nama_pegawai ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('id_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="jabatan" class="form-label">Jabatan</label>
                                                            <select id="jabatan" class="form-select" name="jabatan">
                                                                <option selected>- Pilih -</option>
                                                                <option value="kepalaupt">Kepala UPT</option>
                                                                <option value="admin">Admin</option>
                                                                <option value="koorlab">Koordinator Laboratorium</option>
                                                                <option value="laboran">Laboran</option>
                                                            </select>
                                                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="status_kepegawaian" class="form-label">Status Kepegawaian</label>
                                                            <select id="status_kepegawaian" class="form-select" name="status_kepegawaian">
                                                                <option selected>- Pilih -</option>
                                                                <option value="pns">PNS</option>
                                                                <option value="p3k">P3K</option>
                                                                <option value="ppnpm">ppnpm</option>
                                                            </select>
                                                            <?= form_error('status_kepegawaian', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="isactive" class="form-label">Is Active?</label>
                                                            <select id="isactive" class="form-select" name="isactive">
                                                                <option value="Aktif" selected>Aktif</option>
                                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                                            </select>
                                                            <?= form_error('isactive', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="nama_lab" class="form-label">Unit Kerja</label>
                                                            <select id="nama_lab" class="form-select" name="nama_lab">
                                                                <option selected>- Pilih -</option>
                                                                <?php foreach ($all_laboratorium as $lab) : ?>
                                                                    <option value="<?= $lab->id_lab ?>"><?= $lab->nama_lab ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?= form_error('nama_lab', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="kontak" class="form-label">Kontak</label>
                                                            <input class="form-control" type="tel" value="" id="kontak" name="kontak">
                                                            <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                                </form>
                                                <!-- end form input -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal Tambah Data -->
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

    <!-- Datatable js -->
    <script src="<?= base_url() ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive datatables js -->
    <script src="<?= base_url() ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?= base_url() ?>assets/js/pages/datatables.init.js"></script>

    <!--Morris Chart-->
    <script type="text/javascript" src="<?= base_url() ?>assets/libs/morris.js/morris.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/libs/raphael/raphael.min.js"></script>

    <!-- App js -->
    <script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/custom.js"></script>

</body>

</html>