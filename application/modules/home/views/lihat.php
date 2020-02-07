<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
?>
<div class="card mt-5 mb-5">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('assets/img/barang/') . $barang->gambar ?>" class="card-img" alt="gambar">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $barang->nama_barang ?></h5>
                <hr>
                <h3 class="text-danger"><?= rupiah($barang->harga) ?></h3>
                <hr>
                <h5>Stok : <?= $barang->stok ?></h5>
                <hr>
                <p><?= $barang->detail ?></p>
                <hr>

                <button class="btn btn-success" data-toggle="modal" <?php if (!$this->session->userdata('status')) : ?> data-target="#login" <?php else : ?> data-target="#beli" <?php endif; ?>><i class="fas fa-shopping-bag"></i> Beli</button>
                <button class="btn btn-primary" data-toggle="modal" <?php if (!$this->session->userdata('status')) : ?> data-target="#login" <?php else : ?> data-target="#keranjang" <?php endif; ?>><i class="fas fa-shopping-cart"></i> Tambah ke Keranjang</button>
                <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= site_url('home/signIn') ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="user" class="col-4">Username</label>
                                        <div class="col-8">
                                            <input type="text" name="user" id="user" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass" class="col-4">Password</label>
                                        <div class="col-8">
                                            <input type="password" name="pass" id="pass" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="beli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Beli</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= site_url('transaksi/tambah') ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id') ?>">
                                        <label for="jumlah2" class="col-4">Jumlah Pembelian</label>
                                        <div class="col-8">
                                            <input type="number" name="jumlah" id="jumlah2" class="form-control" value="1" max="<?= $barang->stok ?>" min="1" onchange="total2()" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="warna" class="col-4">Warna</label>
                                        <div class="col-8">
                                            <select name="warna" id="warna" class="form-control">
                                                <?php foreach ($warna as $row) : ?>
                                                    <option value="<?= $row->id_warna ?>"><?= $row->warna ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bayar" class="col-4">Metode Pembayaran</label>
                                        <div class="col-8">
                                            <input type="radio" name="bayar" value="bca"><img src="<?= base_url('assets/img/bank/bca.png') ?>" alt="" width="25%" height="60px">
                                            <input type="radio" name="bayar" value="bri"><img src="<?= base_url('assets/img/bank/bri.png') ?>" alt="" width="25%" height="60px">
                                            <input type="radio" name="bayar" value="mandiri"><img src="<?= base_url('assets/img/bank/mandiri.jpg') ?>" alt="" width="25%" height="60px">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jasa" class="col-4">Jasa Pengiriman</label>
                                        <div class="col-8">
                                            <select name="jasa" id="jasa" class="form-control">
                                                <option value="JNE">JNE</option>
                                                <option value="POST">POST Kilat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if ($barang->id_kategori != 1) : ?>
                                        <div class="form-group row">
                                            <label for="ukuran" class="col-4">Ukuran</label>
                                            <div class="col-8">
                                                <select name="ukuran" id="ukuran" class="form-control">
                                                    <option value="">Pilih Ukuran</option>
                                                    <?php foreach ($ukuran as $row) : ?>
                                                        <option value="<?= $row->id_ukuran ?>"><?= $row->ukuran ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group row">
                                        <label for="Total" class="col-4">Total Harga :</label>
                                        <input type="hidden" id="harga2" value="<?= $barang->harga ?>">
                                        <div class="col-8">
                                            <label id="total2"><?= rupiah($barang->harga) ?></label>
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

                <div class="modal fade" id="keranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Beli</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= site_url('keranjang/tambah') ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id') ?>">
                                        <label for="jumlah" class="col-4">Jumlah Pembelian</label>
                                        <div class="col-8">
                                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" max="<?= $barang->stok ?>" min="1" onchange="total()" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="warna" class="col-4">Warna</label>
                                        <div class="col-8">
                                            <select name="warna" id="warna" class="form-control">
                                                <?php foreach ($warna as $row) : ?>
                                                    <option value="<?= $row->id_warna ?>"><?= $row->warna ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if ($barang->id_kategori != 1) : ?>
                                        <div class="form-group row">
                                            <label for="ukuran" class="col-4">Ukuran</label>
                                            <div class="col-8">
                                                <select name="ukuran" id="ukuran" class="form-control">
                                                    <option value="">Pilih Ukuran</option>
                                                    <?php foreach ($ukuran as $row) : ?>
                                                        <option value="<?= $row->id_ukuran ?>"><?= $row->ukuran ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group row">
                                        <label for="Total" class="col-4">Total Harga :</label>
                                        <input type="hidden" id="harga" value="<?= $barang->harga ?>">
                                        <div class="col-8">
                                            <label id="total"><?= rupiah($barang->harga) ?></label>
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

            </div>
        </div>
    </div>
</div>
<script>
    function total() {
        var jumlah = document.getElementById('jumlah').value;
        var total = document.getElementById('total');
        var harga = document.getElementById('harga').value;
        var jum = jumlah * harga;
        var number_string = jum.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        total.innerHTML = 'Rp. ' + rupiah;
    }

    function total2() {
        var jumlah = document.getElementById('jumlah2').value;
        var total = document.getElementById('total2');
        var harga = document.getElementById('harga2').value;
        var jum = jumlah * harga;
        var number_string = jum.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        total.innerHTML = 'Rp. ' + rupiah;
    }
</script>