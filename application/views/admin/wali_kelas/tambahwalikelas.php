<div class="container-fluid py-4">
    <h1 class="h2"><?= $title; ?></h1>
    <hr>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
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
                                        <?= form_open('admin/walikelas/tambah'); ?>
                                        <div class="form-group">
                                            <label for="kelas">kelas</label>
                                            <select name="kelas" id="kelas" class="form-control">
                                                <option value="">-- Pilih kelas --</option>
                                                <?php foreach ($guruWali as $g) : ?>
                                                    <?php if ($g['kelas'] == $guru['kelas']) : ?>
                                                        <option value="<?= $g['kelas']; ?>" selected><?= $g['kelas']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $g['kelas']; ?>"><?= $g['kelas']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="muted text-danger"><?= form_error('kelas'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Guru</label>
                                            <select name="nama" id="nama" class="form-control">
                                                <option value="">-- Pilih Guru --</option>
                                                <?php foreach ($guru as $g) : ?>
                                                    <option value="<?= $g['id_guru']; ?>"><?= $g['nama_guru']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="muted text-danger"><?= form_error('nama'); ?></small>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?php echo base_url('admin/Walikelas') ?>" class="btn btn-secondary">kembali</a>
                                            <button type="submit" class="btn btn-dark">Tambah</button>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </main>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>