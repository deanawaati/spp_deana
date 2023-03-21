<div class="container-fluid py-4">
  <h1 class="h2"><?= $title; ?></h1>
  <hr>
  <div class="row mb-2">
    <div class="col-md-6">
      <a class="btn btn-danger mb-2 tombolTambahGuru" href="<?php echo base_url('admin/guru/tambah') ?>">
        <i class="fas fa-plus"></i> Tambah Data Guru
      </a>
      <?= $this->session->flashdata('pesans1'); ?>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="input-group">
          <input type="text" class="form-control bg-white" placeholder="Cari Data Guru... " name="keyword">
          <button class="btn btn-danger" type="submit">Cari</button>
        </div>
    </div>
  </div>
  <br>
  <div class="card shadow mb-4">
    <div class="card-header py-3 bg-dark">
      <h6 class="m-0 font-weight-bold text-white">Data Guru</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered bg-light" id="dataTable" width="100%" cellspacing="0">
          <thead bgcolor="greenyellow">
            <tr>
              <td style="color:black;">No</td>
              <td style="color:black;">Nama Guru</td>
              <td style="color:black;">Aksi</td>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($guru as $g) : ?>
              <tr>
                <td style="color:black;"><?= $no++; ?></td>
                <td style="color:black;"><?= $g['nama_guru']; ?></td>
                <td>
                  <a href="<?= base_url('admin/guru/ubahGuru/') . $g['id_guru']; ?>" class="btn btn-primary">
                    ubah
                  </a>
                  <a href="<?= base_url('admin/guru/hapus/') . $g['id_guru']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')">Hapus</i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </main>

      </div>
    </div>
  </div>
</div>