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
				<p class="ml-2">Dari Tanggal : <?= date('d-m-Y', strtotime($mulaiTgl)); ?><br>
					Sampai Tanggal : <?= date('d-m-Y', strtotime($sampaiTgl)); ?>
				</p>
				<table class="table table-bordered text-center">
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>Siswa</th>
						<th>Kelas</th>
						<th>No.Bayar</th>
						<th>Pembayaran Bulan</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
					</tr>
					<?php $total = 0;
					$no = 1;
					foreach ($bayar as $b) : ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $b['nis']; ?></td>
							<td><?= $b['nama_siswa']; ?></td>
							<td><?= $b['kelas']; ?></td>
							<td><?= $b['no_bayar']; ?></td>
							<td><?= $b['bulan']; ?></td>
							<td><?= $b['jml']; ?></td>
							<td><?= $b['ket']; ?></td>
						</tr>
						<?php $total += $b['jml']; ?>
					<?php endforeach; ?>
					<tr>
						<td colspan="6"><strong>Total</strong></td>
						<td>Rp.<?= number_format($total, 0, ',', '.'); ?></td>
					</tr>
				</table>
				<div class="row">
					<div class="col-md-2">
						<a href="" onclick="window.print()" class="btn btn-danger btn-sm no-print"><i class="fas fa-print"></i> Cetak</a>
					</div>
					<div class="col-md-2">
						<a href="<?= base_url('admin/laporan/pembayaranExcel/' . $mulaiTgl . '/' . $sampaiTgl); ?>" class="btn btn-success btn-sm no-print" target="_blank"><i class="fas fa-excel"></i> Cetak</a>
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