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
			<?= $this->session->flashdata('kirim') ?>
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
									<td>
										<?php if ($row->apa == 'dikirim') : ?>
											<button type="button" class="btn btn-warning" disabled>Terkirim</button>
										<?php else : ?>
											<button class="btn btn-secondary disabled"><?= $row->apa ?></button>
										<?php endif; ?>
									</td>
									<td>
										<?php if ($row->apa == 'dikirim') : ?>
											<button type="button" class="btn btn-secondary" disabled>Pending</button>
										<?php else : ?>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#kirim<?= $row->id_transaksi ?>">Kirim</button>
										<?php endif; ?>
									</td>
								</tr>

								<div class="modal fade" id="kirim<?= $row->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="<?= site_url('pesanan/kirim') ?>" method="post">
												<div class="modal-body">
													<input type="hidden" name="id_transaksi" value="<?= $row->id_transaksi ?>">
													<input type="hidden" name="id_barang" value="<?= $row->id_barang ?>">
													<h3>Kirim Barang ?</h3>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-primary">Kirim</button>
												</div>
											</form>
										</div>
									</div>
								</div>
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