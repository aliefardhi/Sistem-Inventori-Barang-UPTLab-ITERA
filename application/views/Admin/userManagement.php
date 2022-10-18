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
                                            <h4 class="card-title">Kelola Pengguna</h4>
                                            <p class="card-title-desc" style="text-align: justify;">Kelola pengguna yang telah terdaftar pada sistem atau tambahkan pengguna baru untuk dapat menggunakan sistem sesuai dengan autentikasi yang diberikan.
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-primary btn-sm edit float-end" data-bs-toggle="modal" data-bs-target="#tambahUser-modal">
                                                <i class="fas fa-user-plus me-1"></i>Tambah Data Pengguna
                                            </a>
                                        </div>
                                    </div>


                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Nama Pegawai</th>
                                                <th>Laboratorium</th>
                                                <th>Role</th>
                                                <th>Is Active</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($pengguna as $p) : ?>
                                                <tr>
                                                    <td><?= $p->username ?></td>
                                                    <td><?= $p->nama_pegawai ?></td>
                                                    <td><?= $p->nama_lab ?></td>
                                                    <td class="text-capitalize"><?= $p->role_id ?></td>
                                                    <?php if ($p->is_active == 'Aktif') : ?>
                                                        <td>
                                                            <span class="badge rounded-pill text-bg-success">Aktif</span>
                                                        </td>
                                                    <?php endif ?>
                                                    <?php if ($p->is_active == 'Tidak Aktif') : ?>
                                                        <td>
                                                            <span class="badge rounded-pill text-bg-danger">Tidak Aktif</span>
                                                        </td>
                                                    <?php endif ?>
                                                    <td>
                                                        <a class="btn btn-info btn-sm edit" title="Edit" href="<?= base_url('index.php/admin/useredit/') . $p->id_pegawai ?>">
                                                            <i class="mdi mdi-account-edit-outline"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm tombol-delete" title="Hapus" href="<?= base_url('index.php/admin/deleteuser/') . $p->id_pegawai ?>">
                                                            <i class="mdi mdi-trash-can-outline"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <!-- Modal Tambah Data start -->
                                    <div class="modal modal-lg fade" id="tambahUser-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data Pengguna</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start form input -->
                                                    <form class="row g-3" method="POST" action="<?= base_url('index.php/admin/adduser') ?>">
                                                        <div class="mb-3 mt-3 row">
                                                            <label class="col-md-2 col-form-label">Pilih Pegawai</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control form-select" name="id_pegawai">
                                                                    <option>- Pilih -</option>
                                                                    <?php foreach ($all_pegawai_upt as $pegawai) : ?>
                                                                        <option value="<?= $pegawai->id_pegawai ?>"><?= $pegawai->nama_pegawai ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div><!-- end row -->
                                                        <div class="mb-3 row">
                                                            <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="text" name="username" id="example-text-input">
                                                            </div>
                                                        </div><!-- end row -->
                                                        <div class="mb-3 row">
                                                            <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                                                            <div class="col-md-10">
                                                                <input class="form-control" type="password" name="password" id="example-password-input">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-md-2 col-form-label">Role Pengguna</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control form-select" name="role_id">
                                                                    <option>- Pilih -</option>
                                                                    <option value="admin">Admin UPT</option>
                                                                    <option value="laboran">Laboran</option>
                                                                </select>
                                                            </div>
                                                        </div><!-- end row -->
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
    <script type="text/javascript" src="<?= base_url() ?>assets/js/custom.js"></script>

</body>

</html>