<div class="container-fluid py-4">
    <h1 class="h2"><?= $title; ?></h1>
    <div class="row">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-6 justify-content-x">
                    <?= $this->session->flashdata('pesan8'); ?>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama_lengkap']; ?></h5>
                            <p class="card-text"><?= $user['email']; ?></p>
                            <p class="card-text"><?= $user['alamat']; ?></p>
                            <p class="card-text"><?= $user['nohp']; ?></p>
                        </div>
                        <div class="btn btn-info ml-3 my-3">
                            <a href="<?= base_url('admin/user/ubahProfil'); ?>" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </section>
</div>
</div>