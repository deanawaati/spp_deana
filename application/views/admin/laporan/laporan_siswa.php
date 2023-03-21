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
				<small class="text-center">Laporan Siswa</small>
				<table class="table table-bordered text-center">
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>Siswa</th>
						<th>Kelas</th>
						<th>Tahun Ajaran</th>
					</tr>
					<?php $no = 1;
					foreach ($siswa as $s) : ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $s['nis']; ?></td>
							<td><?= $s['nama_siswa']; ?></td>
							<td><?= $s['kelas']; ?></td>
							<td><?= $s['tahun_ajaran']; ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<div class="row">
					<div class="col-md-2">
						<a href="" onclick="window.print()" class="btn btn-danger btn-sm no-print"><i class="fas fa-print"></i> Cetak</a>
					</div>
				</div>
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