<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box m-0">
                <a href="index.html" class="logo logo-light mt-2 me-3">
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

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/user-blank.png" alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>index.php/admin/profile"><i class="mdi mdi-cog font-size-17 text-muted align-middle me-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>