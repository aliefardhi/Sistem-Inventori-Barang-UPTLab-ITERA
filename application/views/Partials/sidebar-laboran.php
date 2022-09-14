<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?= base_url() ?>index.php/admin" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0)" class="has-arrow waves-effect">
                        <i class="fas fa-boxes"></i>
                        <span>Barang Persediaan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url() ?>index.php/barangpersediaan">Daftar Barang</a></li>
                        <li><a href="email-inbox.html">Barang Rusak</a></li>
                        <li><a href="email-read.html">Barang Hilang</a></li>
                        <li><a href="email-compose.html">Barang Pinjam</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0)" class="has-arrow waves-effect">
                        <i class="fas fa-bong"></i>
                        <span>Barang Habis Pakai</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url() ?>index.php/baranghp">Daftar Barang</a></li>
                        <li><a href="email-inbox.html">Barang Rusak</a></li>
                        <li><a href="email-read.html">Barang Hilang</a></li>
                        <li><a href="email-compose.html">Barang Pinjam</a></li>
                    </ul>
                </li>

                <li class="menu-title">Lainnya</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span> Authentication </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-login.html">Login</a></li>
                        <li><a href="pages-register.html">Register</a></li>
                        <li><a href="pages-recoverpw.html">Recover Password</a></li>
                        <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->