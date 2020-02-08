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

        .testimoni {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background-color: orange;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #bell {
            animation: ani 2s linear infinite;
        }

        @keyframes ani {
            0% {
                transform: rotate(45deg);
            }

            20% {
                transform: rotate(-40deg);
            }

            40% {
                transform: rotate(35deg);
            }

            60% {
                transform: rotate(-30deg);
            }

            80% {
                transform: rotate(25deg);
            }

            100% {
                transform: rotate(-20deg);
            }
        }
    </style>
</head>

<body>
    <?php if ($this->session->userdata('status')) : ?>
        <a href="#" class="testimoni text-dark" data-toggle="modal" data-target="#test">
            <i class="fas fa-fw fa-2x fa-bell" id="bell"></i>
        </a>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Testimoni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('home/testimoni') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="testimoni">Berikan Kami Testimoni</label>
                            <input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">
                            <textarea name="testimoni" id="testimoni" cols="30" rows="10" class="form-control" placeholder="Testimoni"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
        <?= $this->session->flashdata('pesan'); ?>
        <?= $this->session->flashdata('keranjang'); ?>
        <div class="row">
            <div class="col-lg-3">

                <h3 class="my-4"><?= $title->toko ?></h3>
                <div class="list-group">
                    <?php foreach ($kategori as $row) { ?>
                        <a href="<?= site_url('home/kategori/') . $row->id_kategori ?>" class="list-group-item"><?= $row->kategori ?></a>
                    <?php } ?>
                </div>
                <hr>
                <h3 class="my-4">Berita Terbaru</h3>
                <div class="list-group">
                    <?php foreach ($berita as $row) { ?>
                        <a href="<?= site_url('home/berita/') . $row->id_berita ?>" class="list-group-item"><?= $row->judul_berita ?></a>
                    <?php } ?>
                </div>
                <hr>
                <h3 class="my-4">Testimoni</h3>
                <div class="list-group">
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($testimoni as $row) : ?>
                            <div class="card">
                                <div class="card-header" id="heading<?= $row->id_testimoni ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $row->id_testimoni ?>" aria-expanded="true" aria-controls="collapse<?= $row->id_testimoni ?>">
                                            <?= $row->nama ?>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse<?= $row->id_testimoni ?>" class="collapse" aria-labelledby="heading<?= $row->id_testimoni ?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?= $row->testimoni ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
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
                                    <img class="d-block img-fluid w-100" src="<?= base_url('assets/img/promo/') . $row->gambar ?>">
                                </div>
                            <?php else : ?>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid w-100" src="<?= base_url('assets/img/promo/') . $row->gambar ?>">
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