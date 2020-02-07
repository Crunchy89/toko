<?php
function rupiah($angka)
{

	$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
	return $hasil_rupiah;
}
?>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Daftar Pesanan</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="table-responsive">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Transaksi</th>
									<th>Nama Pemesan</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Warna</th>
									<th>Ukuran</th>
									<th>Total</th>
									<th>Kurir</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<?php $i = 1;
							foreach ($data as $row) { ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $row->no_transaksi ?></td>
									<td><?= $row->nama ?></td>
									<td><?= $row->nama_barang ?></td>
									<td><?= $row->jumlah ?></td>
									<td><?= $row->warna ?></td>
									<td><?= $row->ukuran ?></td>
									<td><?= rupiah($row->total) . ' via ' . $row->pembayaran ?></td>
									<td><?= $row->pengiriman ?></td>
									<td><?= $row->apa ?></td>
									<td>
										<a href="" class="btn btn-warning">Kirim</a>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>