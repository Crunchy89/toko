<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah</button>
                </div>

                <!-- Modal Tambah-->
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= site_url('profil/tambah') ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <select name="icon" id="icon" class="form-control">
                                            <option value="fab fa-fw fa-facebook-f">Facebook</option>
                                            <option value="fab fa-fw fa-twitter">Twitter</option>
                                            <option value="fab fa-fw fa-instagram">Instagram</option>
                                            <option value="fab fa-fw fa-whatsapp">WhatsApp</option>
                                            <option value="fas fa-fw fa-envelope">Email</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="warna">Warna</label>
                                        <select name="warna" id="warna" class="form-control">
                                            <option value="btn-primary">Biru</option>
                                            <option value="btn-info">Biru Langit</option>
                                            <option value="btn-success">Hijau</option>
                                            <option value="btn-warning">Kuning</option>
                                            <option value="btn-danger">Merah</option>
                                            <option value="btn-secondary">Hitam</option>
                                            <option value="btn-light">Putih</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" name="link" id="link" class="form-control" value="#">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Icon</th>
                                    <th>Warna</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1;
                            foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><i class="<?= $row->icon ?>"></i></td>
                                    <td>
                                        <div class="btn <?= $row->warna ?>" style="width: 50px;height:30px;"></div>
                                    </td>
                                    <td><?= $row->link ?></td>
                                    <td>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $row->id_medsos ?>"><i class="fas fa-fw fa-pen"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $row->id_medsos ?>"><i class="fas fa-fw fa-trash"></i></button>
                                    </td>

                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="edit<?= $row->id_medsos ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= site_url('profil/edit') ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="icon">Icon</label>
                                                            <input type="hidden" name="id" value="<?= $row->id_medsos ?>">
                                                            <select name="icon" id="icon" class="form-control">
                                                                <option value="<?= $row->icon ?>">Pilih Icon</option>
                                                                <option value="fab fa-fw fa-facebook-f">Facebook</option>
                                                                <option value="fab fa-fw fa-twitter">Twitter</option>
                                                                <option value="fab fa-fw fa-instagram">Instagram</option>
                                                                <option value="fab fa-fw fa-whatsapp">WhatsApp</option>
                                                                <option value="fas fa-fw fa-envelope">Email</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="warna">Warna</label>
                                                            <select name="warna" id="warna" class="form-control">
                                                                <option value="<?= $row->warna ?>">Pilih Warna</option>
                                                                <option value="btn-primary">Biru</option>
                                                                <option value="btn-info">Biru Langit</option>
                                                                <option value="btn-success">Hijau</option>
                                                                <option value="btn-warning">Kuning</option>
                                                                <option value="btn-danger">Merah</option>
                                                                <option value="btn-secondary">Hitam</option>
                                                                <option value="btn-light">Putih</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="link">Link</label>
                                                            <input type="text" name="link" id="link" class="form-control" value="<?= $row->link ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="hapus<?= $row->id_medsos ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= site_url('profil/hapus') ?>" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?= $row->id_medsos ?>">
                                                        <h3>Apakah Anda Yakin</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>