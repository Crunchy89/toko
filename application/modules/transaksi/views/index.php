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
									<td><?= $row->nama_barang ?></td>
									<td><?= $row->jumlah ?></td>
									<td><?= $row->warna ?></td>
									<td><?= $row->ukuran ?></td>
									<td><?= rupiah($row->total) . ' via ' . $row->pembayaran ?></td>
									<td><?= $row->pengiriman ?></td>
									<td><button class="btn btn-secondary disabled"><?= $row->apa ?></button></td>
									<td>
										<?php if ($row->apa == 'dikirim') : ?>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#terima<?= $row->id_transaksi ?>">Diterima</button>
										<?php else : ?>
											<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancel<?= $row->id_transaksi ?>">Cancel Order</button>
										<?php endif; ?>

									</td>
								</tr>
								<!-- Modal -->
								<div class="modal fade" id="cancel<?= $row->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="" method="post">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">
													<h3>Apakah Yakin untuk Cancel Order ?</h3>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
													<button type="submit" class="btn btn-primary">Ya</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="modal fade" id="terima<?= $row->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="" method="post">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">
													<h3>Apakah Barang sudah sampai ?</h3>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
													<button type="submit" class="btn btn-primary">Ya</button>
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