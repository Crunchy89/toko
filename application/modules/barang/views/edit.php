<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Form Edit</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?= site_url('barang/edit') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $barang->id_barang ?>">
                    <input type="hidden" name="gambarLama" value="<?= $barang->gambar ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php if (form_error('nama')) : ?>
                                    <small class="text-red">
                                        <?= form_error('nama') ?>
                                    </small>
                                <?php else : ?>
                                    <label for="nama">Nama Barang</label>
                                <?php endif; ?>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $barang->nama_barang ?>" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <?php if (form_error('harga')) : ?>
                                    <small class="text-red">
                                        <?= form_error('harga') ?>
                                    </small>
                                <?php else : ?>
                                    <label for="harga">Harga Barang</label>
                                <?php endif; ?>
                                <input type="number" class="form-control" name="harga" id="harga" value="<?= $barang->harga ?>" placeholder="Harga Barang">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="<?= $barang->id_kategori ?>">Pilih Kategori</option>
                                    <?php foreach ($kategori as $row) : ?>
                                        <option value="<?= $row->id_kategori ?>"><?= $row->kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <?php if (form_error('stok')) : ?>
                                    <small class="text-red">
                                        <?= form_error('stok') ?>
                                    </small>
                                <?php else : ?>
                                    <label for="stok">Stok</label>
                                <?php endif; ?>
                                <input class="form-control" type="number" name="stok" id="stok" placeholder="Stok" value="<?= $barang->stok ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="detail">Detail Barang</label>
                                <textarea class="textarea" placeholder="Detail Barang" name="detail" id="detail"><?= $barang->detail ?></textarea>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gambar"><img class="img-fluid" src="<?= base_url('assets/img/barang/') . $barang->gambar ?>" id="output"></label>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <a href="<?= site_url('barang') ?>" class="btn btn-info float-left">Kembali</a>
                                <button class="btn btn-success float-right" type="submit">Simpan</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>