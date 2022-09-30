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
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span>Kepegawaian</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url() ?>index.php/admin/daftarpegawai">Daftar Pegawai</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-archive"></i>
                        <span>Barang Modal</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url() ?>index.php/barangmodal">Daftar Barang</a></li>
                        <li><a href="email-inbox.html">Barang Rusak</a></li>
                        <li><a href="email-read.html">Barang Hilang</a></li>
                        <li><a href="email-compose.html">Barang Pinjam</a></li>
                        <li><a href="email-compose.html">Barang Pindah</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0)" class="has-arrow waves-effect">
                        <i class="fas fa-boxes"></i>
                        <span>Barang Persediaan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a class="" href="<?= base_url() ?>index.php/barangpersediaan">Daftar Barang</a></li>
                        <li><a href="email-inbox.html">Barang Rusak</a></li>
                        <li><a href="email-read.html">Barang Hilang</a></li>
                        <li><a href="email-compose.html">Barang Pinjam</a></li>
                        <li><a href="email-compose.html">Barang Pindah</a></li>
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
                        <li><a href="email-compose.html">Barang Pindah</a></li>
                    </ul>
                </li>

                <li class="menu-title">Lainnya</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span> Autentikasi </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url() ?>index.php/admin/usermanagement">Kelola Pengguna</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->