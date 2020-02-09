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
					<h3 class="card-title">Daftar Member</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Pengirim</th>
								<th>Pesan Terakhir</th>
								<th>Pesan Normal</th>
							</tr>
						</thead>
						<?php $i = 1;
						foreach ($data as $row) {
							if ($row->id_pengirim != 1) : ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $row->nama ?></td>
									<td><?= $row->pesan ?></td>
									<td><button class="btn btn-info" data-toggle="modal" data-target="#normal<?= $row->id_pengirim ?>"><i class="fas fa-eye"></i></button></td>
								</tr>

								<div class="modal fade" id="normal<?= $row->id_pengirim ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="card-header">
												<h3 class="card-title">Chats</h3>
												<div class="card-tools">
													<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
													</button>
												</div>
											</div>
											<div class="card-body">
												<div class="direct-chat-messages" id="pesan" style="transform: rotate(180deg)">
													<?php $datas = $this->db->query("SELECT pesan.*,user.* FROM pesan INNER join user on pesan.id_pengirim=user.id_user WHERE pesan.id_pengirim=$row->id_pengirim OR pesan.id_penerima=$row->id_pengirim order by pesan.id_pesan DESC")->result();
													foreach ($datas as $pesans) :
													?>
														<?php if ($pesans->id_pengirim != $row->id_pengirim) : ?>
															<div class="direct-chat-msg right" style="transform: rotate(180deg)">
																<div class="direct-chat-infos clearfix">
																	<span class="direct-chat-name float-right"><?= $pesans->nama ?></span>
																	<span class="direct-chat-timestamp float-left"><?= date('M-d H:i', strtotime($pesans->tanggal)) ?></span>
																</div>
																<img class="direct-chat-img" src="<?= base_url('assets/img/user.png') ?>" alt="message user image">
																<div class="direct-chat-text">
																	<?= $pesans->pesan ?>
																</div>
															</div>
														<?php elseif ($pesans->id_pengirim = 1) : ?>
															<div class="direct-chat-msg" style="transform: rotate(180deg)">
																<div class="direct-chat-infos clearfix">
																	<span class="direct-chat-name float-left"><?= $pesans->nama ?></span>
																	<span class="direct-chat-timestamp float-right"><?= date('M-d H:i', strtotime($pesans->tanggal)) ?></span>
																</div>
																<img class="direct-chat-img" src="<?= base_url('assets/img/user.png') ?>" alt="message user image">
																<div class="direct-chat-text">
																	<?= $pesans->pesan ?>
																</div>
															</div>
														<?php endif; ?>
													<?php endforeach; ?>
												</div>
											</div>
											<div class="card-footer">
												<form action="<?= site_url('home/pesan') ?>" method="post">
													<div class="input-group">
														<input type="hidden" name="id_penerima" value="<?= $row->id_pengirim ?>">
														<input type="hidden" name="id_pengirim" value="1">
														<input type="hidden" name="url" value="<?= current_url() ?>">
														<input type="text" name="pesan" placeholder="Type Message ..." class="form-control">
														<span class="input-group-append">
															<button type="submit" class="btn btn-primary"><i class="fab fa-fw fa-airbnb" style="transform:rotate(90deg)"></i> Balas</button>
														</span>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
						<?php endif;
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