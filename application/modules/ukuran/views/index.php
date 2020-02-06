<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
						<i class="fas fa-plus"></i> Tambah Data
					</button>

					<!-- Modal -->
					<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="<?= site_url('ukuran/tambah') ?>" method="post">
									<div class="modal-body">
										<div class="form-group">
											<label for="ukuran">Nama ukuran</label>
											<input type="text" class="form-control" name="ukuran" id="ukuran" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										<button type="submit" class="btn btn-primary">Tambah Data</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>ukuran</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php $i = 1;
						foreach ($data as $row) { ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $row->ukuran ?></td>
								<td>
									<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#edit<?= $row->id_ukuran ?>"><i class="fas fa-fw fa-pen"></i> Edit</button>
									<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#hapus<?= $row->id_ukuran ?>"><i class="fas fa-fw fa-trash"></i> Hapus</button>
								</td>
							</tr>

							<div class="modal fade" id="edit<?= $row->id_ukuran ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= site_url('ukuran/edit') ?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<input type="hidden" name="id" value="<?= $row->id_ukuran ?>">
													<label for="title">ukuran</label>
													<input type="text" class="form-control" name="ukuran" id="ukuran" value="<?= $row->ukuran ?>" required>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="modal fade" id="hapus<?= $row->id_ukuran ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= site_url('ukuran/hapus') ?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<input type="hidden" name="id" value="<?= $row->id_ukuran ?>">
													<h3>Apakah anda yakin ?</h3>
												</div>
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
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>