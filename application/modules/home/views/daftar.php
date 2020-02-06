<div class="col-lg-6 col-md-6 mx-auto mt-5 mb-5">
    <div class="card">
        <div class="card-body login-card-body">
            <?= $this->session->flashdata('signin'); ?>
            <h3 class="login-box-msg text-center">Daftar</h3>
            <form action="<?= site_url('home/signUp') ?>" method="post">
                <div class="form-group row">
                    <label for="nama" class="col-4">Nama Lengkap</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                        <?php if (form_error('nama')) : ?>
                            <small class="text-danger text-center"><?= form_error('nama') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-4">Email</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?= set_value('email') ?>">
                        <?php if (form_error('email')) : ?>
                            <small class="text-danger text-center"><?= form_error('email') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-4">Alamat</label>
                    <div class="col-8">
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
                        <?php if (form_error('alamat')) : ?>
                            <small class="text-danger text-center"><?= form_error('alamat') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hp" class="col-4">No Telepon</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="hp" id="hp" placeholder="No Telepon" value="<?= set_value('hp') ?>">
                        <?php if (form_error('hp')) : ?>
                            <small class="text-danger text-center"><?= form_error('hp') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user" class="col-4">Username</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="user" id="user" placeholder="Username" value="<?= set_value('user') ?>">
                        <?php if (form_error('user')) : ?>
                            <small class="text-danger text-center"><?= form_error('user') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass" class="col-4">Password</label>
                    <div class="col-8">
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                        <?php if (form_error('pass')) : ?>
                            <small class="text-danger text-center"><?= form_error('pass') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pass2" class="col-4">Confirm Password</label>
                    <div class="col-8">
                        <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Confirm Password">
                        <?php if (form_error('pass2')) : ?>
                            <small class="text-danger text-center"><?= form_error('pass2') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success w-100">Daftar</button>
                </div>
                <div class="form-group">
                    <a href="<?= site_url('home') ?>" class="btn btn-info w-100">kembali</a>
                </div>
            </form>
            <p class="mb-0">
                <a href="<?= site_url('home/signIn') ?>" class="text-center">Sudah punya akun ?</a>
            </p>
        </div>
    </div>
</div>