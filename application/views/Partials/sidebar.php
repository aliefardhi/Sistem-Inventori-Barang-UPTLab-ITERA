<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu</li>

                <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                    <li>
                        <a href="<?= base_url() ?>index.php/laboran" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($this->session->login['role_id'] == 'admin') : ?>
                    <li>
                        <a href="<?= base_url() ?>index.php/admin" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($this->session->login['role_id'] == 'admin') : ?>
                    <li>
                        <a href="<?= base_url('index.php/admin/daftarruangan') ?>" class="waves-effect">
                            <i class="fas fa-building"></i>
                            <span>Daftar Ruangan</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                    <li>
                        <a href="<?= base_url('index.php/laboran/daftarruangan') ?>" class="waves-effect">
                            <i class="fas fa-building"></i>
                            <span>Daftar Ruangan</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($this->session->login['role_id'] == 'admin') : ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-archive"></i>
                            <span>Barang Modal</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('index.php/admin/pilihlab/') ?>">Daftar Barang</a></li>
                            <li><a href="<?= base_url('index.php/admin/pilihlabbarangrusak/') ?>">Barang Rusak</a></li>
                            <li><a href="<?= base_url('index.php/admin/pilihlabbaranghilang/') ?>">Barang Hilang</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-archive"></i>
                            <span>Barang Modal</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('index.php/laboran/pilihruangan') ?>">Daftar Barang</a></li>
                            <li><a href="<?= base_url('index.php/laboran/pilihruanganbarangrusak') ?>">Barang Rusak</a></li>
                            <li><a href="<?= base_url('index.php/laboran/pilihruanganbaranghilang') ?>">Barang Hilang</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($this->session->login['role_id'] == 'admin') : ?>
                    <li>
                        <a href="javascript: void(0)" class="has-arrow waves-effect">
                            <i class="fas fa-boxes"></i>
                            <span>Barang Persediaan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="" href="<?= base_url() ?>index.php/barangpersediaan">Daftar Barang</a></li>
                            <li><a href="<?= base_url() ?>index.php/barangpersediaan/labpersediaanrusak">Barang Rusak</a></li>
                            <li><a href="<?= base_url() ?>index.php/barangpersediaan/labpersediaanhilang">Barang Hilang</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                    <li>
                        <a href="javascript: void(0)" class="has-arrow waves-effect">
                            <i class="fas fa-boxes"></i>
                            <span>Barang Persediaan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a class="" href="<?= base_url('index.php/barangpersediaan/daftarbarang/') . $this->session->login['id_lab'] ?>">Daftar Barang</a></li>
                            <li><a href="<?= base_url('index.php/barangpersediaan/persediaanrusak/') . $this->session->login['id_lab'] ?>">Barang Rusak</a></li>
                            <li><a href="<?= base_url('index.php/barangpersediaan/persediaanhilang/') . $this->session->login['id_lab'] ?>">Barang Hilang</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($this->session->login['role_id'] == 'admin') : ?>
                    <li>
                        <a href="javascript: void(0)" class="has-arrow waves-effect">
                            <i class="fas fa-bong"></i>
                            <span>Barang Habis Pakai</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url() ?>index.php/baranghp">Daftar Barang</a></li>
                            <li><a href="<?= base_url() ?>index.php/baranghp/labbhprusak">Barang Rusak</a></li>
                            <li><a href="<?= base_url() ?>index.php/baranghp/labbhphilang">Barang Hilang</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($this->session->login['role_id'] == 'laboran') : ?>
                    <li>
                        <a href="javascript: void(0)" class="has-arrow waves-effect">
                            <i class="fas fa-bong"></i>
                            <span>Barang Habis Pakai</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url('index.php/baranghp/daftarbarang/') . $this->session->login['id_lab'] ?>">Daftar Barang</a></li>
                            <li><a href="<?= base_url('index.php/baranghp/bhprusak/') . $this->session->login['id_lab'] ?>">Barang Rusak</a></li>
                            <li><a href="<?= base_url('index.php/baranghp/bhphilang/') . $this->session->login['id_lab'] ?>">Barang Hilang</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($this->session->login['role_id'] == 'admin') : ?>
                    <li class="menu-title">Administrator</li>

                    <li>
                        <a href="<?= base_url() ?>index.php/admin/daftarlaboratorium" class="waves-effect">
                            <i class="fas fa-building"></i>
                            <span>Data Laboratorium</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url() ?>index.php/admin/daftarpegawai" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span>Daftar Pegawai UPT Lab.</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect ">
                            <i class="mdi mdi-account-box"></i>
                            <span> Autentikasi </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?= base_url() ?>index.php/admin/usermanagement">Kelola Pengguna</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->