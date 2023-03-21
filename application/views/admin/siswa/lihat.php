<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header bg-warning">Detail Siswa </h5>
                <div class="card-body bg-light">
                    <h5 class="card-title">NAMA : <?= $siswa['nama_siswa']; ?></h5>
                    <p class="card-text">NIS : <?= $siswa['nis']; ?></p>
                    <p class="card-text">ALAMAT : <?= $siswa['alamat']; ?></p>
                    <p class="card-text">NO.HP : <?= $siswa['nohp']; ?></p>
                    <a href="<?php echo base_url() ?>/admin/siswa" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>

</div>