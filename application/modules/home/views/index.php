	<div class="row">
		<?php function rupiah($angka)
		{

			$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
			return $hasil_rupiah;
		}
		foreach ($barang as $row) : ?>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="card h-100">
					<a href="#"><img class="card-img-top" src="<?= base_url('assets/img/barang/') . $row->gambar ?>" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#"><?= $row->nama_barang ?></a>
						</h4>
						<h5><?= rupiah($row->harga) ?></h5>
						<small>Stok : <?= $row->stok ?></small>
					</div>
					<div class="card-footer">
						<button>Beli</button>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>