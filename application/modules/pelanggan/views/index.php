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
								<th>Nama Member</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>No Hp</th>
								<th>Status</th>
							</tr>
						</thead>
						<?php $i = 1;
						foreach ($data as $row) {
							if ($row->status != 'admin') { ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $row->nama ?></td>
									<td><?= $row->email ?></td>
									<td><?= $row->alamat ?></td>
									<td><?= $row->no_telp ?></td>
									<td><?= $row->status ?></td>
								</tr>
						<?php }
						} ?>
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