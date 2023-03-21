<div class="container">
  <h1 class="h2"><?= $title; ?></h1>
  <hr>
  <div class="row mb-2">
    <div class="col-md-6">
      <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
      <?php endif; ?>
      <?= $this->session->flashdata('pesans4'); ?>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3 bg-dark">
      <h6 class="m-0 font-weight-bold text-white">ubah Wali Kelas</h6>
    </div>
    <div class="card-body bg-info">
      <div class="table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <div class="card">
            <div class="card-body ">
              <div class="row">
                <div class="col-md">

                  <?= form_open('admin/walikelas/ubahDataWali'); ?>
                  <div class="form-group">
                    <label for="kelas">kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                      <option value="">-- Pilih kelas --</option>
                      <?php foreach ($guruWali as $g) : ?>
                        <?php if ($g['kelas'] == $guru['kelas']) : ?> XII IPA
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
                        <?php if ($g['id_guru'] == $guruWali['id_guru']) : ?>
                          <option value="<?= $g['id_guru']; ?>" selected><?= $g['nama_guru']; ?></option>
                        <?php else : ?>
                          <option value="<?= $g['id_guru']; ?>"><?= $g['nama_guru']; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <small class="muted text-danger"><?= form_error('nama'); ?></small>
                  </div>
                  <div class="form-group">
                    <a href="<?= base_url('admin/walikelas'); ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                    <button type="submit" class="btn btn-dark">Ubah</button>
                  </div>
                  <?= form_close(); ?>
                </div>
              </div>
            </div>
          </div>
          </main>

          <!-- Modal -->
          <div class="modal fade" id="formModalWali" tabindex="-1" aria-labelledby="formModalLabelWali" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="formModalLabelWali">Tambah Data Wali Kelas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body"></div>
              </div>
            </div>
          </div>
        </table>
      </div>
    </div>
  </div>
</div>