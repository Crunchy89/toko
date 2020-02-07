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
					<h3 class="card-title">Histori Pembelian</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="table-responsive">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Transaksi</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Warna</th>
									<th>Ukuran</th>
									<th>Total Harga</th>
								</tr>
							</thead>
							<?php $i = 1;
							foreach ($data as $row) { ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $row->kode_transaksi ?></td>
									<td><?= $row->nama_barang ?></td>
									<td><?= $row->jumlah ?></td>
									<td><?= $row->warna ?></td>
									<td><?= $row->ukuran ?></td>
									<td><?= rupiah($row->total) ?></td>
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