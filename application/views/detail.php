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
    <link href="<?= base_url() ?>assets/css/costum.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css">
</head>

<body>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/logo/') . $title->logo ?>" alt="logo" width="50px"></a>
            <form class="form-inline my-2 my-sm-0" action="<?= site_url('home/cari') ?>" method="post">
                <div class="input-group">
                    <input type="text" name="cari" class="form-control form-control-sm" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                    </div>
                </div>
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
    <div class="container mt-3">
        <?= $view ?>
    </div>
    </div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <?= $title->toko ?></p>
        </div>
    </footer>

    <?php if ($this->session->userdata('status') && $this->session->userdata('status') != 'admin') : ?>
        <a href="#" class="testimoni text-dark btn-warning" data-toggle="modal" data-target="#test">
            <i class="fas fa-fw fa-bell" id="bell" style="font-size: 1em"></i>
        </a>
        <a href="#" class="pesan text-dark btn-success" data-toggle="modal" data-target="#chat">
            <i class=" fas fa-fw fa-comments"></i>
        </a>

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
                                <input type="hidden" name="url" value="<?= current_url() ?>">
                                <textarea name="testimoni" id="testimoni" cols="30" rows="3" class="form-control" placeholder="Testimoni"></textarea>
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

        <div class="modal fade" id="chat" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="card-header">
                        <h3 class="card-title">Chat Admin</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="direct-chat-messages" id="pesan" style="transform: rotate(180deg)">
                            <script>
                                $("#pesan").animate({
                                    scrollTop: $('#pesan').prop("scrollHeight")
                                }, 1000);
                            </script>
                            <?php if ($this->session->userdata('status')) {
                                foreach ($pesan as $pesans) :
                            ?>
                                    <?php if ($pesans->id_pengirim == $this->session->userdata('id')) : ?>
                                        <div class="direct-chat-msg right" style="transform: rotate(180deg)">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right"><?= $pesans->nama ?></span>
                                                <span class="direct-chat-timestamp float-left"><?= date('M-d', strtotime($pesans->tanggal)) ?></span>
                                            </div>
                                            <img class="direct-chat-img" src="<?= base_url('assets/img/user.png') ?>" alt="message user image">
                                            <div class="direct-chat-text">
                                                <?= $pesans->pesan ?>
                                            </div>
                                        </div>
                                    <?php elseif ($pesans->id_pengirim == 1) : ?>
                                        <div class="direct-chat-msg" style="transform: rotate(180deg)">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left"><?= $pesans->nama ?></span>
                                                <span class="direct-chat-timestamp float-right"><?= date('M-d H:i', strtotime($pesans->tanggal)) ?></span>
                                            </div>
                                            <img class="direct-chat-img" src="<?= base_url('assets/img/user.png') ?>" alt="message user image">
                                            <div class="direct-chat-text">
                                                <?= $pesans->pesan ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                            <?php endforeach;
                            } ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="<?= site_url('home/pesan') ?>" method="post">
                            <div class="input-group">
                                <input type="hidden" name="id_pengirim" value="<?= $this->session->userdata('id') ?>">
                                <input type="hidden" name="id_penerima" value="1">
                                <input type="hidden" name="url" value="<?= current_url() ?>">
                                <input type="text" name="pesan" placeholder="Type Message ..." class="form-control" required>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary" name="send"><i class="fab fa-fw fa-airbnb" style="transform:rotate(90deg)"></i> Send</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/costum.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

</body>

</html>