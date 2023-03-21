<div class="container">
  <h1 class="h2"><?= $title; ?></h1>
  <div class="row">
    <div class="col-md">
      <div class="row">
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Cetak Laporan Guru</h5>
              <a href="<?= base_url('admin/laporan/guru'); ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i></a>
            </div>
          </div>
          <div class="card mt-4" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Laporan Tunggakan Pembayaran</h5>
              <a href="<?= base_url('admin/laporan/tunggakan'); ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i></a>
            </div>
          </div>
          <div class="card mt-4" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Laporan Siswa</h5>
              <a href="<?= base_url('admin/laporan/siswa'); ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <?= form_open('admin/laporan/pembayaran'); ?>
              <div class="form-group">
                <label for="mulai_tgl">Mulai Tanggal</label>
                <input type="date" name="mulai_tgl" class="form-control" value="<?= date('Y-m-d'); ?>">
              </div>
              <div class="form-group">
                <label for="sampai_tgl">Sampai Tanggal</label>
                <input type="date" name="sampai_tgl" class="form-control" value="<?= date('Y-m-d'); ?>">
              </div>
              <div class="form-group">
                <button type="submit" class="form-control">Tampilkan</button>
              </div>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>