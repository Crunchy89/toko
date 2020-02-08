<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title->title ?></title>
    <link rel="icon" href="<?= base_url('assets/img/logo/') . $title->logo ?>" type="image/x-icon" />
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets/css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <style>
        body {
            background-image: url('<?= base_url('assets/img/bg.jpg') ?>');
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/logo/') . $title->logo ?>" alt="logo" width="50px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= site_url('home') ?>"><i class="fas fa-home"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= site_url('home/profil') ?>"><i class="fas fa-store"></i> Profil Toko
                        </a>
                    </li>
                    <?php if (!$this->session->userdata('status')) : ?>
                        <li class="nav-item p-1">
                            <a class="btn btn-success" href="<?= site_url('home/signIn') ?>">Login</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="btn btn-primary" href="<?= site_url('home/signUp') ?>">Daftar</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('status') == 'admin') : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('admin') ?>"><i class="fas fa-user"></i> Admin Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('home/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('status') == 'member') : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('keranjang') ?>"><i class="fas fa-cart-arrow-down"></i> Keranjang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('transaksi') ?>"><i class="fas fa-dollar-sign"></i> Pesanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('member') ?>"><i class="fas fa-user"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('home/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <?= $view ?>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <?= $title->toko ?></p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>