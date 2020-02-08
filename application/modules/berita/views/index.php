<section class="content">
	<div class="row">
		<div class="col-12">
			<?= $this->session->flashdata('pesan') ?>
			<div class="card">
				<div class="card-header">
					<a href="<?= site_url('berita/tambah') ?>" class="btn btn-success"><i class="fas fa-fw fa-plus"></i> Tambah Berita</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="table-responsive">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Aksi</th>
									<th>Tanggal</th>
									<th>Judul Berita</th>
									<th>Gambar</th>
								</tr>
							</thead>
							<?php $i = 1;
							foreach ($data as $row) { ?>
								<tr>
									<td><?= $i++ ?></td>
									<td>
										<a href="<?= site_url('berita/edit/') . $row->id_berita ?>" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i></a>
										<button type="button" data-toggle="modal" data-target="#hapus<?= $row->id_berita ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button>
									</td>
									<td><?= $row->tanggal ?></td>
									<td><?= $row->judul_berita ?></td>
									<td><img src="<?= base_url('assets/img/berita/') . $row->gambar ?>" alt="gambar" width="100px"></td>
									<!-- Modal -->
									<div class="modal fade" id="hapus<?= $row->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Hapus berita</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="<?= site_url('berita/hapus') ?>" method="post">
													<div class="modal-body">
														<input type="hidden" name="id" value="<?= $row->id_berita ?>">
														<h3>Apakah anda yakin ?</h3>
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
	</div>
</section>