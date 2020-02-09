	<div class="row display-flex justify-content-around">
		<?php function rupiah($angka)
		{

			$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
			return $hasil_rupiah;
		}
		foreach ($barang as $row) : ?>
			<div class="col-lg-4 col-md-4 mb-2" style="width: 8em">
				<div class="card h-100">
					<a href="<?= site_url('home/detail/') . $row->id_barang ?>"><img class="card-img-top" src="<?= base_url('assets/img/barang/') . $row->gambar ?>" alt="Promo"></a>
					<div class="card-body">
						<h6 class="card-title" style="font-size: 1em">
							<?= $row->nama_barang ?>
						</h6>
						<br>
						<h6 class="text-danger" style="font-size: 1em"><?= rupiah($row->harga) ?></h6>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>