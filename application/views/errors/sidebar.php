<style type="text/css">
    .aside {
        background-color: aquamarine;
    }

    .sidenav-header {
        background-color: aquamarine;
    }

    .sidenav-header.span {
        font-style: italic;
        font-size: xx-small;
    }
</style>

<div class="card">
    <div class="card-body p-3">
        <a class="nav-link active" href="<?= base_url('dashboard'); ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <img src="<?php echo base_url() ?>assets/img/kembali.jpg" width="70px" height="40px">
            </div>
        </a>
    </div>
</div>


<hr class="horizontal dark mt-0">

<ul class="navbar-nav">
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item ">
                <a class="nav-link active" href="<?= base_url('dashboard'); ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/dashboard.jpg" width="70px" height="40px">
                    </div>
                    <span class=" ms-1">Dashboard</span>
                </a>
            </li>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('admin/guru'); ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/guru.png" width="60px" height="40px">
                    </div>
                    <span class="nav-link-text ms-1">Data Guru</span>
                </a>
            </li>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item">
                <a class="nav-link active " href="<?= base_url('admin/walikelas'); ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/walikelas.jpg" width="70px" height="40px">
                    </div>
                    <span class="nav-link-text ms-1">Data wali kelas</span>
                </a>
            </li>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item">
                <a class="nav-link active " href="<?= base_url('admin/siswa'); ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/siswa.png" width="60px" height="40px">
                    </div>
                    <span class="nav-link-text ms-1">Data siswa</span>
                </a>
            </li>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item">
                <a class="nav-link active " href="<?= base_url('admin/transaksi'); ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/bayar.jpg" width="70px" height="40px">
                    </div>
                    <span class="nav-link-text ms-1">Transaksi</span>
                </a>
            </li>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item">
                <a class="nav-link active " href="<?= base_url('admin/laporan'); ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/r.jpg" width="70px" height="40px">
                    </div>
                    <span class="nav-link-text ms-1">Laporan </span>
                </a>
            </li>
        </div>
    </div>
    <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Akun</h6>
    </li>
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url('admin/user') ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/profil.jpg" width="70px" height="40px">
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url('admin/user/ubahPassword') ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/password.jpg" width="70px" height="40px">
                    </div>
                    <span class="nav-link-text ms-1">Ubah Password</span>
                </a>
            </li>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body p-3">
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('auth/logout'); ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="<?php echo base_url() ?>assets/img/logout.jpg" width="70px" height="40px">
                    </div>
                    <span class="nav-link-text ms-1">logout</span>
                </a>
            </li>
        </div>
    </div>
</ul>