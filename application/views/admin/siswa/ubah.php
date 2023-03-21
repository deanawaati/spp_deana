<div class="container">
  <h1 class="h2"><?= $title; ?></h1>
  <hr>
  <div class="card shadow mb-4">
    <div class="card-header py-3 bg-dark">
      <h6 class="m-0 font-weight-bold text-white">ubah siswa</h6>
    </div>
    <div class="card-body bg-info">
      <div class="table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <div class="card">
            <div class="card-body ">
              <div class="row">
                <div class="col-md">
                  <?= form_open(''); ?>
                  <label for="nis">ID siswa</label>
                  <input type="text" name="id_siswa" class="form-control" value="<?= $siswa['id_siswa']; ?>" readonly>
                  <br>
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" name="nis" id="nis" class="form-control" value="<?= $siswa['nis']; ?>" readonly>
                    <small class="muted text-danger"><?= form_error('nis'); ?></small>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $siswa['nama_siswa']; ?>">
                    <small class="muted text-danger"><?= form_error('nama'); ?></small>
                  </div>
                  <div class="form-group">
                    <label for="kelas">kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                      <option value="">-- Pilih Kelas --</option>
                      <?php foreach ($kelas as $k) : ?>
                        <?php if ($k['kelas'] == $siswa['kelas']) : ?>
                          <option value="<?= $k['kelas']; ?>" selected><?= $k['kelas']; ?></option>
                        <?php else : ?>
                          <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <small class="muted text-danger"><?= form_error('kelas'); ?></small>
                  </div>
                  <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" id="tahun_ajaran" value="<?= $siswa['tahun_ajaran']; ?>" class="form-control">
                    <small class="muted text-danger"><?= form_error('tahun_ajaran'); ?></small>
                  </div>
                  <div class="form-group">
                    <label for="biaya">biaya</label>
                    <input type="number" name="biaya" id="biaya" value="<?= $siswa['biaya']; ?>" class="form-control">
                    <small class="muted text-danger"><?= form_error('biaya'); ?></small>
                  </div>
                  <div class="form-group">
                    <label for="jatuh_tempo">Jatuh Tempo Pertama</label>
                    <input type="text" name="jatuh_tempo" id="jatuh_tempo" value="2022-06-30" readonly class="form-control">
                    <small class="muted text-danger"><?= form_error('jatuh_tempo'); ?></small>
                  </div>
                  <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $siswa['alamat']; ?>">
                    <small class="muted text-danger"><?= form_error('alamat'); ?></small>
                  </div>
                  <div class="form-group">
                    <label for="nohp">no.hp</label>
                    <input type="text" name="nohp" id="nohp" class="form-control" value="<?= $siswa['nohp']; ?>">
                    <small class="muted text-danger"><?= form_error('nohp'); ?></small>
                  </div>
                  <div class="form-group">
                    <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-secondary" data-dismiss="modal">Close</a>
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