<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box m-0">
                <a class="logo logo-light mt-2 me-3">
                    <!-- <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/images/Group 22.png" alt="" height="22">
                    </span> -->
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/images/Group 15.png" alt="" height="60px">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="navbar-brand m-auto">
                Sistem Inventori UPT Laboratorium ITERA
            </div>
        </div>

        <div class="d-flex">
            <div class="navbar-brand m-auto">
                <?= $userdata['nama_pegawai'] ?>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url('assets/images/users/') . $user_session->image ?>">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <?php if ($this->session->login['role_id'] == 'admin') : ?>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>index.php/admin/profile"><i class="fas fa-user-alt font-size-17 text-muted align-middle me-1"></i> My Profile</a>
                    <?php endif; ?>
                    <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>index.php/laboran/profile"><i class="fas fa-user-alt font-size-17 text-muted align-middle me-1"></i> My Profile</a>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</button>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- logout modal -->
<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="<?= base_url('index.php/login/logout') ?>" type="button" class="btn btn-primary">Ya</a>
            </div>
        </div>
    </div>
</div>
<!-- end of logout modal -->