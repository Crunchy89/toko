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
			<?= $this->session->flashdata('pesan') ?>
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Daftar barang</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="row">
						<?php foreach ($data as $row) : ?>
							<div class="col-lg-3 col-md-4 mb-4">
								<div class="card h-100">
									<img class="card-img-top" src="<?= base_url('assets/img/barang/') . $row->gambar ?>" alt="Promo">
									<div class="card-body">
										<h6 class="card-title">
											<?= $row->nama_barang ?>
										</h6>
										<br>
										<small class="text-danger"><?= rupiah($row->harga) ?></small>
									</div>
									<div class="card-footer">
										<button class="btn btn-success" data-toggle="modal" data-target="#beli<?= $row->id_keranjang ?>"><i class="fas fa-fw fa-dollar-sign"></i> Bayar</button>
										<button class="btn btn-danger float-right" data-toggle="modal" data-target="#hapus<?= $row->id_keranjang ?>"><i class="fas fa-fw fa-trash"></i> Hapus</button>
									</div>
								</div>
							</div>

							<!-- Modal Hapus-->
							<div class="modal fade" id="hapus<?= $row->id_keranjang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Hapus dari keranjang</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= site_url('keranjang/hapus') ?>" method="post">
											<div class="modal-body">
												<input type="hidden" name="id" value="<?= $row->id_keranjang ?>">
												<h3>Apakah Anda Yakin ?</h3>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Hapus</button>
												<button type="submit" class="btn btn-primary">Hapus</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<!-- Modal Beli-->
							<div class="modal fade" id="beli<?= $row->id_keranjang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrolled" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Beli</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= site_url('keranjang/beli') ?>" method="post">
											<div class="modal-body">
												<div class="form-group row">
													<label for="stok" class="col-4">Stok</label>
													<div class="col-8">
														<input type="text" name="stok" value="<?= $row->stok ?>" class="form-control form-control-sm" disabled>
													</div>
												</div>
												<div class="form-group row">
													<input type="hidden" name="id_keranjang" value="<?= $row->id_keranjang ?>">
													<input type="hidden" name="id_user" value="<?= $this->session->userdata('id') ?>">
													<input type="hidden" name="id_barang" value="<?= $row->id_barang ?>">
													<input type="hidden" name="sum" id="sum2" value="<?= $row->harga * $row->jumlah ?>">
													<label for="jumlah2" class="col-4">Jumlah Pembelian</label>
													<div class="col-8">
														<input type="number" name="jumlah" id="jumlah2" class="form-control form-control-sm" value="<?= $row->jumlah ?>" max="<?= $row->stok ?>" min="1" onchange="total2()" required>
													</div>
												</div>
												<div class="form-group row">
													<label for="warna" class="col-4">Warna</label>
													<div class="col-8">
														<select name="warna" id="warna" class="form-control form-control-sm">
															<?php foreach ($warna as $rows) : ?>
																<option value="<?= $rows->id_warna ?>"><?= $rows->warna ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="bayar" class="col-4">Metode Pembayaran</label>
													<div class="col-8 row">
														<input type="radio" class="radio" name="bayar" value="BCA" id="bca<?= $row->id_keranjang ?>" checked="checked">
														<label for="bca<?= $row->id_keranjang ?>"><img src="<?= base_url('assets/img/bank/bca.png') ?>" alt="" width="100%" height="60px"></label>
														<input type="radio" class="radio" name="bayar" value="BRI" id="bri<?= $row->id_keranjang ?>">
														<label for="bri<?= $row->id_keranjang ?>"><img src="<?= base_url('assets/img/bank/bri.png') ?>" alt="" width="100%" height="60px"></label>
														<input type="radio" class="radio" name="bayar" value="Mandiri" id="mandiri<?= $row->id_keranjang ?>"><label for="mandiri<?= $row->id_keranjang ?>"><img src="<?= base_url('assets/img/bank/mandiri.jpg') ?>" alt="" width="100%" height="60px"></label>
													</div>
												</div>
												<div class="form-group row">
													<label for="jasa" class="col-4">Jasa Pengiriman</label>
													<div class="col-8">
														<select name="jasa" id="jasa" class="form-control form-control-sm">
															<option value="JNE">JNE</option>
															<option value="POST">POST Kilat</option>
														</select>
													</div>
												</div>
												<?php if ($row->id_kategori != 1) : ?>
													<div class="form-group row">
														<label for="ukuran" class="col-4">Ukuran</label>
														<div class="col-8">
															<select name="ukuran" id="ukuran" class="form-control form-control-sm">
																<option>Pilih Ukuran</option>
																<?php foreach ($ukuran as $rows) : ?>
																	<option value="<?= $rows->id_ukuran ?>"><?= $rows->ukuran ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</div>
												<?php endif; ?>
												<div class="form-group row">
													<label for="Total" class="col-4">Total Harga :</label>
													<input type="hidden" id="harga2" value="<?= $row->harga ?>">
													<div class="col-8">
														<label id="total2"><?= rupiah($row->harga * $row->jumlah) ?></label>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
												<button type="submit" class="btn btn-primary">Beli</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
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
<script>
	function total2() {
		var jumlah = document.getElementById('jumlah2').value;
		var total = document.getElementById('total2');
		var sum2 = document.getElementById('sum2');
		var harga = document.getElementById('harga2').value;
		var jum = jumlah * harga;
		sum2.value = jum;
		var number_string = jum.toString(),
			sisa = number_string.length % 3,
			rupiah = number_string.substr(0, sisa),
			ribuan = number_string.substr(sisa).match(/\d{3}/g);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		total.innerHTML = 'Rp ' + rupiah;
	}
</script>