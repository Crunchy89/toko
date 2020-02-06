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
								<form action="<?= site_url('promo/tambah') ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label for="gambar"><img class="img-fluid mx-auto" src="<?= base_url('assets/img/noimage.png') ?>" id="output" width="100px"></label>
										</div>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
												<label class="custom-file-label" for="exampleInputFile">Choose file</label>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										<button type="submit" class="btn btn-primary">Upload</button>
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
								<th>Gambar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php $i = 1;
						foreach ($data as $row) { ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><img src="<?= base_url('assets/img/promo/') . $row->gambar ?>" alt="gambar promo" width="100px"></td>
								<td>
									<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#edit<?= $row->id_promo ?>"><i class="fas fa-fw fa-pen"></i> Edit</button>
									<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#hapus<?= $row->id_promo ?>"><i class="fas fa-fw fa-trash"></i> Hapus</button>
								</td>
							</tr>

							<div class="modal fade" id="edit<?= $row->id_promo ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= site_url('promo/edit') ?>" method="post" enctype="multipart/form-data">
											<div class="modal-body">
												<input type="hidden" name="id" value="<?= $row->id_promo ?>">
												<input type="hidden" name="gambarLama" value="<?= $row->gambar ?>">
												<div class="form-group">
													<label for="gambar"><img class="img-fluid mx-auto" src="<?= base_url('assets/img/promo/') . $row->gambar ?>" id="output" width="100px"></label>
												</div>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
														<label class="custom-file-label" for="exampleInputFile">Choose file</label>
													</div>
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
							<div class="modal fade" id="hapus<?= $row->id_promo ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= site_url('promo/hapus') ?>" method="post">
											<div class="modal-body">
												<div class="form-group">
													<input type="hidden" name="id" value="<?= $row->id_promo ?>">
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
<script>
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
</script>