<div class="col-lg-6 col-md-6 mx-auto mt-5 mb-5">
    <div class="card">
        <div class="card-body login-card-body">
            <?= $this->session->flashdata('signin') ?>
            <h3 class="login-box-msg text-center">Login Please</h3>

            <form action="<?= site_url('home/signIn') ?>" method="post">
                <div class="form-group mt-3 mb-3">
                    <label for="user">Username</label>
                    <input type="text" class="form-control" name="user" id="user" placeholder="Username" value="<?= set_value('user') ?>">
                </div>
                <?php if (form_error('user')) : ?>
                    <small class="text-center text-red"><?= form_error('user') ?></small>
                <?php endif; ?>
                <div class="form-group mt-3 mb-3">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
                </div>
                <?php if (form_error('pass')) : ?>
                    <small class="text-center text-red"><?= form_error('pass') ?></small>
                <?php endif; ?>
                <div class="form-group mt-3 mb-3">
                    <button type="submit" class="btn btn-success w-100">Login</button>
                </div>
                <div class="form-group mt-3 mb-3">
                    <a href="<?= site_url('home') ?>" class="btn btn-info w-100">kembali</a>
                </div>
            </form>
            <p class="mb-0">
                <a href="<?= site_url('home/signUp') ?>" class="text-center">Belum punya akun ?</a>
            </p>
        </div>
    </div>
</div>