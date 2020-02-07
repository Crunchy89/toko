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

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/logo/') . $title->logo ?>" alt="logo" width="50px"></a>
            <form class="form-inline my-2 my-lg-0" action="<?= site_url('home/cari') ?>" method="post">
                <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
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
                            <a class="nav-link active" href="<?= site_url('keranjang') ?>"><i class="fas fa-cart-arrow-down"></i> keranjang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= site_url('profile') ?>"><i class="fas fa-user"></i> Profile
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

        <div class="row">

            <div class="col-lg-3">

                <h3 class="my-4"><?= $title->toko ?></h3>
                <div class="list-group">
                    <?php foreach ($kategori as $row) { ?>
                        <a href="<?= site_url('home/kategori/') . $row->id_kategori ?>" class="list-group-item"><?= $row->kategori ?></a>
                    <?php } ?>
                </div>

            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-9">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $data = count($promo);
                        for ($i = 0; $i < $data; $i++) :
                            if ($i == 0) : ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active"></li>
                            <?php else : ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php $i = 1;
                        foreach ($promo as $row) :
                            if ($i == 1) : ?>
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="<?= base_url('assets/img/promo/') . $row->gambar ?>">
                                </div>
                            <?php else : ?>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="<?= base_url('assets/img/promo/') . $row->gambar ?>">
                                </div>
                            <?php endif; ?>
                        <?php $i++;
                        endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <?= $view ?>
                <!-- /.col-lg-9 -->
            </div>
        </div>
        <!-- /.row -->

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