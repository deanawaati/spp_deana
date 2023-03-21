<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <!-- <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder mb-0">Sekolah Tegal</h6>
            </nav> -->
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </div>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="<?php echo base_url('dashboard/sidebar') ?>" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        Selamat Datang Admin | <?php echo $user['email'] ?>
                        <img class="img-profile rounded-circle" src='<?= base_url('assets/img/profile/') . $user['image']; ?>' width="40px" height="40px">
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->