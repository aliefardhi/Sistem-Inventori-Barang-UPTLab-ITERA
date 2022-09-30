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

                                    <!-- Start details data -->
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="">Michael Owen</h3>
                                        </div>

                                        <div class="col-6">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-muted ms-3 mt-1">
                                                    Created At
                                                    29/09/2022
                                                </div>
                                                <div class="text-muted ms-3 mt-1">
                                                    |
                                                </div>
                                                <div class="text-muted ms-3 mt-1">
                                                    Updated At
                                                    29/09/2022
                                                </div>
                                                <div class="ms-3">
                                                    <a class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editUser-modal" title="Edit">
                                                        <i class="mdi mdi-square-edit-outline"></i>Edit
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Username</div>
                                                        michael.laboran
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Role</div>
                                                        Laboran
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Is Active</div>
                                                        <span class="badge rounded-pill text-bg-success">Aktif</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Laboratorium</div>
                                                        Laboratorium Multimedia
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold">Kontak</div>
                                                        <p class=""> <i class="mdi mdi-email-outline"></i> michael.laboran@staff.itera.ac.id</p>
                                                        <p class=""> <i class="mdi mdi-cellphone-android" style="margin-right: 5px;"></i>08899953535</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end of details data -->

                                    <!-- Modal start -->
                                    <div class="modal modal-lg fade" id="editUser-modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Pengguna</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start form input -->
                                                    <form class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="editIdBHP" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="editNamaBHP" placeholder="" value="michael.laboran">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="editIdBHP" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="editNamaBHP" placeholder="" value="michael.laboran">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editJenisBHP" class="form-label">Role</label>
                                                            <select id="editJenisBarang" class="form-select">
                                                                <option selected>Laboran</option>
                                                                <option>Admin UPT</option>
                                                                <option>...</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editJenisBHP" class="form-label">Is Active</label>
                                                            <select id="editJenisBarang" class="form-select">
                                                                <option selected>Aktif</option>
                                                                <option>Non-aktif</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="editJenisBHP" class="form-label">Laboratorium</label>
                                                            <select id="editJenisBarang" class="form-select">
                                                                <option selected>Laboratorium Multimedia</option>
                                                                <option>Laboratorium Kimia</option>
                                                                <option>Laboratorium Fisika</option>
                                                                <option>Laboratorium Biologi</option>
                                                                <option>...</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="editJumlahBHP" class="form-label">No. HP</label>
                                                            <input type="tel" class="form-control" id="editJumlahBHP" value="08899953535">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="editIdBHP" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="editNamaBHP" placeholder="" value="michael.laboran@staff.itera.ac.id">
                                                        </div>
                                                    </form>
                                                    <!-- end form input -->

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal -->

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