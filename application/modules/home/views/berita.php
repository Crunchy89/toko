<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <h3 class="my-4">Semua Berita</h3>
            <div class="list-group">
                <?php foreach ($data as $row) { ?>
                    <a href="<?= site_url('home/berita/') . $row->id_berita ?>" class="list-group-item"><?= $row->judul_berita ?></a>
                <?php } ?>
            </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
            <img src="<?= base_url('assets/img/berita/') . $berita->gambar ?>" class="img-fluid w-100" alt="Responsive image">
            <div class="container-fluid bg-light rounded p-5 mt-5 mb-5">
                <div class="container mt-3 mb-5">
                    <small>Uploaded : <?= $berita->tanggal ?></small>
                    <h3><?= $berita->judul_berita ?></h3>
                    <hr>
                    <p><?= $berita->isi_berita ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>