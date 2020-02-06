	<div class="row">
		<?php function rupiah($angka)
		{

			$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
			return $hasil_rupiah;
		}
		foreach ($barang as $row) : ?>
			<a href="">
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="<?= base_url('assets/img/barang/') . $row->gambar ?>" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
								<?= $row->nama_barang ?>
							</h4>
							<h5><?= rupiah($row->harga) ?></h5>
						</div>
					</div>
				</div>
			</a>
		<?php endforeach; ?>

	</div>