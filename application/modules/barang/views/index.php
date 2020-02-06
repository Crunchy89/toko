<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a href="<?= site_url('barang/tambah') ?>" class="btn btn-success"><i class="fas fa-fw fa-plus"></i> Tambah</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>gambar</th>
								<th>Nama Barang</th>
								<th>Harga</th>
								<th>Detail</th>
								<th>Kategori</th>
								<th>Stok</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php $i = 1;
						function rupiah($angka)
						{

							$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
							return $hasil_rupiah;
						}
						foreach ($data as $row) { ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><img src="<?= base_url('assets/img/barang/') . $row->gambar ?>" alt="logo" width="50px"></td>
								<td><?= $row->nama_barang ?></td>
								<td><?= rupiah($row->harga) ?></td>
								<td><?= $row->detail ?></td>
								<td><?= $row->kategori ?></td>
								<td><?= $row->stok ?></td>
								<td>
									<a href="<?= site_url('barang/edit/') . $row->id_barang ?>" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></a>
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $row->id_barang ?>"><i class="fas fa-fw fa-trash"></i></button>
								</td>
							</tr>
							<!-- Modal -->
							<div class="modal fade" id="hapus<?= $row->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= site_url('barang/hapus') ?>" method="post">
											<div class="modal-body">
												<input type="hidden" name="id" value="<?= $row->id_barang ?>">
												<h3>Apakah Anda Yakin ?</h3>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary">Hapus</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>