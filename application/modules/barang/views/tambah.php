<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Form Tambah</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?= site_url('barang/tambah') ?>" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama') ?>" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <?php if (form_error('harga')) : ?>
                                    <small class="text-red">
                                        <?= form_error('harga') ?>
                                    </small>
                                <?php else : ?>
                                    <label for="harga">Harga Barang</label>
                                <?php endif; ?>
                                <input type="number" class="form-control" name="harga" id="harga" value="<?= set_value('harga') ?>" placeholder="Harga Barang">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
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
                                <input class="form-control" type="number" name="stok" id="stok" placeholder="Stok" value="<?= set_value('stok') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="detail">Detail Barang</label>
                                <textarea class="textarea" placeholder="Detail Barang" name="detail" id="detail"></textarea>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gambar"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output"></label>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <a href="<?= site_url('barang') ?>" class="btn btn-info float-left">Kembali</a>
                                <button class="btn btn-success float-right" type="submit">Tambah</button>
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