<div class="container-fluid py-4">
    <h1 class="h2"><?= $title; ?></h1>
    <hr>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger text-white" role="alert"><?= validation_errors(); ?></div>
    <?php endif; ?>
    <?= $this->session->flashdata('pesans1'); ?>
    <div classs="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-dark">
                <h6 class="m-0 font-weight-bold text-white">Tambah Guru</h6>
            </div>
            <div class="card-body bg-info">
                <div class="table-responsive">
                    <table class="table table-bordered bg-light" id="dataTable" width="100%" cellspacing="0">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <?= form_open('admin/guru/tambah'); ?>
                                        <input type="text" name="id_guru" id="id_guru" hidden>
                                        <div class="form-group">
                                            <label for="nama">Nama Guru</label>
                                            <input type="text" name="nama" id="nama" class="form-control">
                                            <small class="muted text-danger"><?= form_error('nama'); ?></small>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?php echo base_url('admin/guru') ?>" class="btn btn-secondary">Close</a>
                                            <button type="submit" class="btn btn-dark">Tambah</button>
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
</div>