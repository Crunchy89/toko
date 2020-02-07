	<div class="row">
		<?php function rupiah($angka)
		{

			$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
			return $hasil_rupiah;
		}
		foreach ($barang as $row) : ?>
			<div class="col-lg-3 col-md-4 mb-4">
				<div class="card h-100">
					<a href="<?= site_url('home/detail/') . $row->id_barang ?>"><img class="card-img-top" src="<?= base_url('assets/img/barang/') . $row->gambar ?>" alt=""></a>
					<div class="card-body">
						<h6 class="card-title">
							<?= $row->nama_barang ?>
						</h6>
						<small class="text-danger"><?= rupiah($row->harga) ?></small>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>