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
                <h6 class="m-0 font-weight-bold text-white">Tambah Siswa</h6>
            </div>
            <div class="card-body bg-info">
                <div class="table-responsive">
                    <table class="table table-bordered bg-light" id="dataTable" width="100%" cellspacing="0">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md">
                                        <?= form_open('admin/siswa/tambah'); ?>
                                        <div class="form-group">
                                            <label for="nis">Nis</label>
                                            <input type="text" name="nis" id="nis" class="form-control">
                                            <small class="muted text-danger"><?= form_error('nis'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Siswa</label>
                                            <input type="text" name="nama" id="nama" class="form-control">
                                            <small class="muted text-danger"><?= form_error('nama'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">kelas</label>
                                            <select name="kelas" id="kelas" class="form-control">
                                                <option value="">-- Pilih Kelas --</option>
                                                <?php foreach ($kelas as $k) : ?>
                                                    <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="muted text-danger"><?= form_error('kelas'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun_ajaran">Tahun Ajaran</label>
                                            <input type="text" name="tahun_ajaran" id="tahun_ajaran" readonly value="2022/2023" class="form-control">
                                            <small class="muted text-danger"><?= form_error('tahun_ajaran'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="biaya">biaya</label>
                                            <input type="number" name="biaya" id="biaya" value="300000" readonly class="form-control">
                                            <small class="muted text-danger"><?= form_error('biaya'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="jatuh_tempo">Jatuh Tempo Pertama</label>
                                            <input type="text" name="jatuh_tempo" id="jatuh_tempo" value="2022-06-01" readonly class="form-control">
                                            <small class="muted text-danger"><?= form_error('jatuh_tempo'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">alamat</label>
                                            <input type="text" name="alamat" id="alamat" class="form-control">
                                            <small class="muted text-danger"><?= form_error('alamat'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">no.hp</label>
                                            <input type="select" name="nohp" id="nohp" class="form-control">
                                            <small class="muted text-danger"><?= form_error('nohp'); ?></small>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?php echo base_url('admin/siswa') ?>" class="btn btn-secondary">Close</a>
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