<div class="container">
    <h1 class="h2"><?= $title; ?></h1>
    <hr>
    <div class="alert alert-info text-white" role="alert"><i class="fas fa-info"></i> Ketikkan Password Baru jika ingin diperbaharui untuk bisa akses aplikasi pembayaran spp.</div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">ubah Password</h6>
        </div>
        <div class="card-body bg-info">
            <div class="table-responsive">
                <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md">
                                    <?= form_open(''); ?>
                                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>" readonly>
                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                        <small class="muted text-danger"><?= form_error('password'); ?></small>
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