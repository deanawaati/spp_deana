<div class="container">
    <h1 class="h2"><?= $title; ?></h1>
    <hr>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">ubah Profil </h6>
        </div>
        <div class="card-body bg-info">
            <div class="table-responsive">
                <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md">
                                    <?= form_open(''); ?>
                                    <label for="id_user">ID Users</label>
                                    <input type="text" name="id_user" class="form-control" value="<?= $user['id_user']; ?>" readonly>
                                    <br>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap']; ?>">
                                        <small class="muted text-danger"><?= form_error('nama_lengkap'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" value="<?= $user['email']; ?>">
                                        <small class="muted text-danger"><?= form_error('email'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" value="<?= $user['alamat']; ?>" class="form-control">
                                        <small class="muted text-danger"><?= form_error('alamat'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No.HP</label>
                                        <input type="number" name="nohp" id="nohp" value="<?= $user['nohp']; ?>" class="form-control">
                                        <small class="muted text-danger"><?= form_error('nohp'); ?></small>
                                    </div>

                                    <div class="form-group">
                                        <a href="<?= base_url('admin/user'); ?>" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-dark">Ubah</button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>