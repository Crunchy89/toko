<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Nama Toko dan Logo Toko</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Nama Toko</th>
								<th>Logo</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php $i = 1;
						foreach ($data as $row) { ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $row->title ?></td>
								<td><?= $row->toko ?></td>
								<td><img src="<?= base_url('assets/img/logo/') . $row->logo ?>" alt="logo" width="50px"></td>
								<td><button class="btn btn-warning" type="button" data-toggle="modal" data-target="#edit<?= $row->id_title ?>"><i class="fas fa-fw fa-pen"></i> Edit</button></td>
							</tr>

							<div class="modal fade" id="edit<?= $row->id_title ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= site_url('toko/edit') ?>" method="post" enctype="multipart/form-data">
											<div class="modal-body">
												<div class="form-group">
													<input type="hidden" name="id" value="<?= $row->id_title ?>">
													<input type="hidden" name="gambarLama" value="<?= $row->logo ?>">
													<label for="title">Title Website</label>
													<input type="text" class="form-control" name="title" id="title" value="<?= $row->title ?>" required>
												</div>
												<div class="form-group">
													<label for="nama">Nama Toko</label>
													<input type="text" class="form-control" name="nama" id="nama" value="<?= $row->toko ?>" required>
												</div>
												<div class="form-group">
													<label for="gambar"><img class="img-fluid mx-auto" src="<?= base_url('assets/img/logo/') . $row->logo ?>" id="output" width="100px"></label>
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