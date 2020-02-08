<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Berita
                </div>
                <form action="<?= site_url('berita/tambah') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body pad">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?php if (form_error('judul')) : ?>
                                        <small class="text-red"><?= form_error('judul') ?></small>
                                    <?php else : ?>
                                        <label for="judul">Judul Berita</label>
                                    <?php endif; ?>
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Berita" value="<?= set_value('judul') ?>">
                                </div>
                                <div class="form-group">
                                    <?php if (form_error('isi')) : ?>
                                        <small class="text-red"><?= form_error('isi') ?></small>
                                    <?php else : ?>
                                        <label for="isi">Isi Berita</label>
                                    <?php endif; ?>
                                    <textarea id="isi" name="isi" class="ckeditor" id="ckeditor"><?= set_value('isi') ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gambar">Sampul Berita</label>
                                    <label for="gambar"><img src="<?= base_url('assets/img/noimage.png') ?>" width="100%" height="200px" id="output" class="img-thumbnail rounded"></label>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?= site_url('berita') ?>" class="btn btn-info">Kembali</a>
                                    <button class="btn btn-success float-right">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>