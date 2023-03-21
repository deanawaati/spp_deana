<style>
	@media print {
		.no-print {
			display: none;
		}
	}
</style>
<div class="container py-4">
	<div class="row">
		<div class="col-md">
			<div class="card">
				<h4 class="text-center">SMK Negeri 1 Cijati</h4>
				<small class="text-center">Laporan Pembayaran</small>
				<div class="row">
					<div class="col-md-4">
						<table class="table">
							<tr>
								<th>NIS</th>
								<td>:</td>
								<td><?= $siswa['nis']; ?></td>
							</tr>
							<tr>
								<th>Nama Siswa</th>
								<td>:</td>
								<td><?= $siswa['nama_siswa']; ?></td>
							</tr>
							<tr>
								<th>Kelas</th>
								<td>:</td>
								<td><?= $siswa['kelas']; ?></td>
							</tr>
						</table>
					</div>
				</div>
				<table class="table table-bordered text-center">
					<tr>
						<th>No</th>
						<th>No.Bayar</th>
						<th>Pembayaran Bulan</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
					<?php $no = 1;
					foreach ($bayar as $b) : ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $b['no_bayar']; ?></td>
							<td><?= $b['bulan']; ?></td>
							<td><?= $b['jml']; ?></td>
							<td><?= $b['ket']; ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<div class="row">
					<div class="col-md-3 offset-md-9">
						<table>
							<tr>
								<td></td>
								<td>
									<p>Cianjur, <?= date('d-m-Y'); ?><br>
										ADMIN</p>
									<br><br>
									<p>_______________________</p>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	window.print();
</script>