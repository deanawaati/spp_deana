<div class="container-fluid py-4">
  <h1 class="h2"><?= $title; ?></h1>
  <hr>
  <div class="row mb-2">
    <div class="col-md-6">
      <a href="<?php echo base_url('admin/walikelas/tambah') ?>" class="btn btn-danger mb-2">
        <i class="fas fa-plus"></i> Tambah Data Wali Kelas
      </a>
      <?= $this->session->flashdata('pesans4'); ?>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3 bg-dark">
      <h6 class="m-0 font-weight-bold text-white">Data Wali Kelas</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered bg-light" id="dataTable" width="100%" cellspacing="0">
          <thead bgcolor="greenyellow">
            <tr>
              <td style="color:black;">No</td>
              <td style="color:black;">Kelas</td>
              <td style="color:black;">Nama Guru</td>
              <td style="color:black;">Aksi</td>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($guruWali as $g) : ?>
              <tr>
                <td style="color:black;"><?= $no++; ?></td>
                <td style="color:black;"><?= $g['kelas']; ?></td>
                <td style="color:black;"><?= $g['nama_guru']; ?></td>
                <td>
                  <a href="<?= base_url('admin/walikelas/ubahWali/') . $g['kelas']; ?>" class="btn btn-primary">
                    Ubah
                  </a>
                  <a href="<?= base_url('admin/walikelas/hapus/') . $g['kelas']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
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
              <div class="modal-body">
                <?= form_open('admin/walikelas'); ?>
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
                      <option value="<?= $g['id_guru']; ?>"><?= $g['nama_guru']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <small class="muted text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-dark">Tambah</button>
                </div>
                <?= form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>