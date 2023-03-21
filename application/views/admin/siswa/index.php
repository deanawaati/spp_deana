<div class="container">
  <h1 class="h2"><?= $title; ?></h1>
  <hr>
  <div class="row mb-2">
    <div class="col-md-6">
      <a href="<?php echo base_url('admin/siswa/tambah') ?>" class="btn btn-danger mb-2" data-toggle="modal" data-target="#formModalSiswa">
        <i class="fas fa-plus"></i> Tambah Data Siswa
      </a>
      <?= $this->session->flashdata('pesans2'); ?>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="input-group">
          <input type="text" class="form-control bg-white" placeholder="Cari Data Siswa... " name="keyword">
          <button class="btn btn-danger" type="submit">Cari</button>
        </div>
    </div>
  </div>
  <br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 bg-dark">
      <h6 class="m-0 font-weight-bold text-white">Data siswa</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered bg-light" id="dataTable" width="100%" cellspacing="0">
          <thead bgcolor="greenyellow">
            <tr>
              <td style="color:black;">No</td>
              <td style="color:black;">NIS</td>
              <td style="color:black;">Nama Siswa</td>
              <td style="color:black;">Kelas</td>
              <td style="color:black;">Tahun Ajaran</td>
              <td style="color:black;">Biaya</td>
              <td style="color:black;">alamat</td>
              <td style="color:black;">no.hp</td>
              <td style="color:black;">Aksi</td>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($siswa as $g) : ?>
              <tr>
                <td style="color:black;"><?= $no++; ?></td>
                <td style="color:black;"><?= $g['nis']; ?></td>
                <td style="color:black;"><?= $g['nama_siswa']; ?></td>
                <td style="color:black;"><?= $g['kelas']; ?></td>
                <td style="color:black;"><?= $g['tahun_ajaran']; ?></td>
                <td style="color:black;">Rp.<?= number_format($g['biaya'], 0, ',', '.'); ?></td>
                <td style="color:black;"><?= $g['alamat']; ?></td>
                <td style="color:black;"><?= $g['nohp']; ?></td>
                <td>
                  <a href="<?= base_url('admin/siswa/ubahSiswa/') . $g['id_siswa']; ?>" class="btn btn-primary">
                    Ubah
                  </a>
                  <a href="<?= base_url('admin/siswa/lihat/') . $g['id_siswa']; ?>" class="btn btn-success">
                    Lihat
                  </a>
                  <a href="<?= base_url('admin/siswa/hapus/') . $g['id_siswa']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </main>

        <!-- Modal -->
        <div class="modal fade" id="formModalSiswa" tabindex="-1" aria-labelledby="formModalLabelSiswa" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelSiswa">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?= form_open('admin/siswa'); ?>
                <div class="form-group">
                  <label for="nis">NIS</label>
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
                  <input type="text" name="tahun_ajaran" id="tahun_ajaran" readonly value="2020/2021" class="form-control">
                  <small class="muted text-danger"><?= form_error('tahun_ajaran'); ?></small>
                </div>
                <div class="form-group">
                  <label for="biaya">biaya</label>
                  <input type="number" name="biaya" id="biaya" value="300000" readonly class="form-control">
                  <small class="muted text-danger"><?= form_error('biaya'); ?></small>
                </div>
                <div class="form-group">
                  <label for="jatuh_tempo">Jatuh Tempo Pertama</label>
                  <input type="text" name="jatuh_tempo" id="jatuh_tempo" value="2020-06-01" readonly class="form-control">
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