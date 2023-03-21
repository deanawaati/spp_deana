<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/img/favicon.png">
    <title>
        Halaman | Login
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!--     Nucleo Icons    -->
    <link href="<?php echo base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!--   Font Awesome Icons    -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?php echo base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!--   CSS Files   -->
    <link id="pagestyle" href="<?php echo base_url() ?>/assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!--   Navbar   -->
                <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="">
                            Aplikasi SPP
                        </a>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                            </ul>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">SELAMAT DATANG DI APLIKASI PEMBAYARAN SPP</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--   End Navbar   -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Halaman Login</h3>
                                    <p class="mb-0">Masukkan email dan password untuk Masuk</p>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="card-body">
                                    <form role="form" action="<?= base_url('auth'); ?>" method="post">
                                        <label>Email :</label>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                            <small class="muted text-danger"><?= form_error('email'); ?></small>
                                        </div>
                                        <label>Password :</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                            <small class="muted text-danger"><?= form_error('password'); ?></small>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Anda belum punya akun?
                                        <a href="<?php echo base_url() ?>/auth/registration/" class="text-info text-gradient font-weight-bold">Registrasi</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?php echo base_url() ?>/assets/img/aa.jpg')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!----------   START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT   --------->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright © <script>
                            document.write(new Date().getFullYear())
                        </script>.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!----------    END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT   --------->
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>/assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-----    Github buttons    ----->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url() ?>/assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>