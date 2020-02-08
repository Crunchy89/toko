<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Berita
                </div>
                <form action="<?= site_url('berita/edit') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body pad">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="judul">Judul Berita</label>
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Berita" value="<?= $data->judul_berita ?>">
                                </div>
                                <div class="form-group">
                                    <label for="isi">Isi Berita</label>
                                    <textarea id="isi" name="isi" class="ckeditor" id="ckeditor"><?= $data->isi_berita ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $data->id_berita ?>">
                                    <input type="hidden" name="gambarLama" value="<?= $data->gambar ?>">
                                    <label for="gambar">Sampul Berita</label>
                                    <label for="gambar"><img src="<?= base_url('assets/img/berita/') . $data->gambar ?>" width="100%" height="200px" id="output" class="img-thumbnail rounded"></label>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?= site_url('berita') ?>" class="btn btn-info">Kembali</a>
                                    <button class="btn btn-success float-right">Simpan</button>
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