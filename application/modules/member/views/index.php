<section class="content">
	<div class="container-fluid">
		<?= $this->session->flashdata('berhasil') ?>
		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">Biodata</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
					<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" value="<?= $user->nama ?>" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" value="<?= $user->alamat ?>" class="form-control" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" value="<?= $user->email ?>" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label>No Handphone</label>
							<input type="text" value="<?= $user->no_telp ?>" class="form-control" disabled>
						</div>
						<div class="form-group">
							<button class="btn btn-info" data-toggle="modal" data-target="#pass">Change Password</button>
							<button class="btn btn-warning float-right" data-toggle="modal" data-target="#edit">Edit data</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= site_url('member/password') ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">
					<div class="form-group row">
						<label for="pass" class="col-4">Password Lama</label>
						<div class="col-8">
							<input type="password" name="pass" id="pass" placeholder="Password Lama" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="passbaru" class="col-4">Password Baru</label>
						<div class="col-8">
							<input type="password" name="passbaru" id="passbaru" placeholder="Password Baru" class="form-control" required>
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= site_url('member/ubah') ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">
					<div class="form-group row">
						<label for="nama" class="col-4">Nama Lengkap</label>
						<div class="col-8">
							<input type="text" name="nama" id="nama" class="form-control form-control-sm" value="<?= $user->nama ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-4">email</label>
						<div class="col-8">
							<input type="text" name="email" id="email" class="form-control form-control-sm" value="<?= $user->email ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="hp" class="col-4">No Tlp</label>
						<div class="col-8">
							<input type="text" name="hp" id="hp" class="form-control form-control-sm" value="<?= $user->no_telp ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="hp" class="col-4">Alamat</label>
						<div class="col-8">
							<textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"><?= $user->alamat ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="pass" class="col-4">Input Password</label>
						<div class="col-8">
							<input type="password" name="pass" id="pass" placeholder="Input Password" class="form-control" required>
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