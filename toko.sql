-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 06:15 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `detail` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `gambar`, `nama_barang`, `harga`, `detail`, `id_kategori`, `stok`) VALUES
(1, 'Vivo-Y91c-600x600.jpg', 'Vivo Y-91', 2000000, '<p>Sfesifikasi :</p><p>    Baterai: 1350 Mah </p><p>    Warna: Hitam<br></p>', 1, 20),
(3, '4.jpg', 'Gurita', 10000, '', 2, 19),
(4, '14.jpg', 'Ring', 5000, '', 2, 30),
(5, '13.jpg', 'LCD Xiami', 200000, '', 4, 5),
(6, '8.jpg', 'Asus Zenfone 5', 1500000, '', 1, 5),
(7, '12.png', 'LCD OPPO A57', 250000, '', 4, 5),
(8, 'Harga-HP-Realme-5-Pro-600x600.jpg', 'OPPO Realme 5 Pro', 3000000, '', 1, 10),
(9, '11.jpg', 'Power Bank Xiami', 150000, '', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi_berita`, `gambar`, `tanggal`) VALUES
(1, 'Cegah Ponsel Ilegal, Regulasi IMEI Diberlakukan 18 April 2020', '<p><strong>JAKARTA&nbsp;</strong>- Menteri Komunikasi dan Informatika (Menkominfo) Johnny G. Plate mengungkapkan aturan International Mobile Equipment Identity (IMEI) diberlakukan pada 18 April 2020. Aturan ini berisi pelarangan peredaran ponsel ilegal atau black market.</p>\r\n\r\n<p>&ldquo;Tadi saya sudah rapat terkait IMEI dengan operator seluler, pimpinan direksi-direksi operator seluler. Saya sudah berkomunikasi dengan Menteri Perindustrian, karena batas waktu mulai berlaku IMEI pada 18 April 2020,&rdquo; ungkap Menkominfo di Gedung Nusantara III, Kompleks DPR RI, Jakarta, Selasa (4/2/2020).</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"1\" id=\"google_ads_iframe_/7108725/Desktop-Detail-Parallax_0\" name=\"google_ads_iframe_/7108725/Desktop-Detail-Parallax_0\" scrolling=\"no\" title=\"3rd party ad content\" width=\"1\"></iframe></p>\r\n\r\n<p>Menteri Johnny menjelaskan, Kominfo bersama operator seluler sudah berdiskusi terkait mekanisme penentuan blacklist dan whitelist. Ada dua mekanisme bertujuan untuk mengidentifikasi apakah ponsel itu punya IMEI yang legal atau tidak.</p>\r\n', 'banyak2.jpg', '2020-02-08'),
(2, 'Samsung Galaxy A01 Debut Rp1,6 Juta', '<p><strong>Jakarta, Selular.ID</strong>&nbsp;&ndash; Menjelang akhir tahun lalu, Samsung diam-diam mengumumkan smartphone Galaxy A01 dan jelas dari nama bahwa ini adalah smartphone entry-level. Tetapi informasi mengenai spesifikasi itu langka sehingga kami harus menunggu sampai sekarang ketika ponsel mulai memasuki etalase toko ritel.</p>\r\n\r\n<p>Tampaknya Vietnam akan menjadi negara pertama yang mendapatkan handset tersebut.</p>\r\n\r\n<p>Galaxy A01 menampilkan layar 5,7 inci, 720x1520px PLS (baca IPS) dengan lekukan berbentuk-V di bagian atas untuk wadah kamera selfie.</p>\r\n\r\n<p>SoC yang sebelumnya tidak dikenal adalah Snapdragon 439 yang dipasangkan dengan RAM 2GB dan penyimpanan internal 16GB, yang bisa diperluas melalui kartu mciroSD.</p>\r\n\r\n<p>Di panel belakang, handset membawa dua kamera: 13MP utama dengan aperture f/2.2 dan yang 2MP digunakan untuk sensor kedalaman. Kamera yang menghadap ke depan adalah 5MP.</p>\r\n\r\n<p>Baterai berkekuatan 3.000mAh menjanjikan penggunaan sehari penuh sehari. Dan, Galaxy A01 sudah mengadopsi Android 10 dengan One UI 2.0 di atasnya langsung dari boks penjualan.</p>\r\n\r\n<p>Smartphone hadir dalam warna Hitam, Biru dan Merah dengan banderol harga VDN2.790.000 atau setara Rp1,65 juta dan akan mulai dikirimkan pada 6 Februari di negara tersebut.</p>\r\n\r\n<p>Ponsel mungkin akan edar di luar Vietnam segera, tetapi belum ada yang dikonfirmasi.</p>\r\n', 'IMG_20200204_073612-696x392.jpg', '2020-02-08'),
(5, 'Fantastis, Oppo Find X2 Dibekali dengan Chipset Snapdragon 865 Terbaru', '<p><strong>Jakarta, Selular.ID &ndash;</strong>&nbsp;Kabar tentang peluncuran smartphone Oppo pada kuartal pertama di 2020 telah lama beredar. Kali ini, teka-teki itu terjawab sudah. Brand teknologi itu diketahui tengah mempersiapkan Oppo Find X2.</p>\r\n\r\n<p>Kabarnya, Oppo akan meluncurkan perangkat terbarunya pada perhelatan MWC 2020 yang berlangsung di Barcelona, Spanyol, akhir februari mendatang.</p>\r\n\r\n<p>Menjelang peluncuran, spesifikasi dari Oppo find X2 kian terungkap.&nbsp;VP Oppo, Brian Shen, melalui akun weibonya, mengkonfirmasi sebagian dari spesifikasi Find X2, yakni berupa layar 2K&nbsp;<em>dan refresh rate</em>&nbsp;tinggi 120Hz. Find X2 juga akan dilengkapi dengan prosesor terbaru, Qualcomm Snapdragon 865.</p>\r\n\r\n<p>Find X2 pun dipastikan hadir dengan membawa teknologi layar paling canggih yang akan memberikan pengalaman terbaik kepada konsumen. Bahkan, Brian, terus mengemukakan kekagumannya terhadap teknologi dan kualitas layar perangkat ini melalui jejaring sosial weibo.</p>\r\n\r\n<p>Menariknya, Pada halaman brief produk Snapdragon 865, terutama pada bagian tampilan, terdapat beberapa keterangan dukungan tampilan yang diberikan prosesor seri 8 terbaru ini. Hal ini mengungkapkan spesifikasi layar lainnya.</p>\r\n\r\n<p>Diperkirakan Find X2 akan membawa layar 10bit yang berarti Find X2 dapat menampilkan 1,073 miliar warna. Selain itu, dukungan terhadap HDR10 akan memberikan kemampuan Find X2 untuk mereproduksi jajaran warna lebih luas dan lebih terang, layar akan dapat menampilkan area cerah, namun tetap mempertahankan area gelap.</p>\r\n\r\n<p>Baca juga:&nbsp;<a href=\"https://selular.id/2020/01/3-smartphone-oppo-turun-harga/\">3 Smartphone Oppo Turun Harga</a></p>\r\n\r\n<p>Dengan konfigurasi seperti ini, Oppo berupaya menyajikan teknologi layar terbaik pada perangkat Find X2, kembali membawa pengalaman cinema ke dalam gengaman pada perangkat smartphone. Sebelumnya&nbsp;<a href=\"https://twitter.com/OPPOIndonesia\" rel=\"noopener noreferrer\" target=\"_blank\">Oppoi</a>&nbsp;juga memperkenalkan teknologi cinema, dolby atmos dengan speaker ganda pada serie A hingga seri Reno untuk membawa pengalaman baru menikmati konten multimedia dan game kepada penggunanya.</p>\r\n\r\n<p>Sementara itu, peluncuran Oppo Find X2 ini juga diperkuat dengan pernyataan dari Alen Wu, Vice President Oppo dan President of Global Sales.</p>\r\n\r\n<p>&ldquo;Pada 2020 Q1, Oppo akan meluncurkan produk andalannya yang menggunakan Snapdragon 865 Mobile Platform, bersama-sama menghadirkan pengalaman 5G yang lebih cepat dan unggul bagi pengguna,&rdquo; ujarnya pada perhelatan Qualcomm Snapdragon Tech Summit di Hawai.</p>\r\n\r\n<p>Seperti diketahui, untuk perangkat Find series, Oppo selalu menggunakan prosesor kelas flaghsip dari Qualcomm. Oppo mulai menggunakan prosesor seri 8 pada perangkat Find 7 dengan Snapdragon 800 dan yang terakhir Find X dengan Snapdragon 845.</p>\r\n', 'Ilustrasi-Find-X-696x340.jpg', '2020-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Handphone'),
(2, 'Accecories'),
(4, 'Spare Part');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_ukuran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_barang`, `id_warna`, `jumlah`, `id_ukuran`) VALUES
(8, 3, 4, 2, 1, 0),
(11, 2, 3, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tanggal`, `kode_transaksi`, `nama_barang`, `id_user`, `warna`, `ukuran`, `jumlah`, `total`) VALUES
(1, '2020-02-07', '5e3d034de841e', 'Vivo Y-91', 2, 'Silver', NULL, 2, 4000000),
(2, '2020-02-07', '5e3d70d106a1c', 'Vivo Y-91', 2, 'Silver', NULL, 2, 4000000),
(3, '2020-02-07', '5e3d72eb5523b', 'Vivo Y-91', 2, 'Silver', NULL, 1, 2000000),
(4, '2020-02-07', '5e3d73104a844', 'Vivo Y-91', 3, 'Silver', NULL, 1, 2000000),
(5, '2020-02-08', '5e3e148bdf04b', 'Gurita', 2, 'Silver', NULL, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `medsos`
--

CREATE TABLE `medsos` (
  `id_medsos` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medsos`
--

INSERT INTO `medsos` (`id_medsos`, `icon`, `warna`, `link`) VALUES
(1, 'fab fa-fw fa-facebook-f', 'btn-primary', '#'),
(2, 'fab fa-fw fa-twitter', 'btn-info', '#'),
(3, 'fab fa-fw fa-instagram', 'btn-warning', '#'),
(4, 'fab fa-fw fa-whatsapp', 'btn-success', 'https://wa.me/6287849910278?text=Bisa%20share%20lokasi%20saya%20mau%20datang%20ke%20tokonya%20langsung');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pengirim`, `id_penerima`, `pesan`, `tanggal`, `status`) VALUES
(1, 2, 1, 'tes pesan', '2020-02-09 13:10:10', 'read'),
(2, 2, 1, 'tes lagi', '2020-02-09 13:30:57', 'read'),
(3, 2, 1, 'tes terus', '2020-02-09 13:39:40', 'read'),
(4, 3, 1, 'testing', '2020-02-09 21:58:56', 'read'),
(5, 3, 1, 'testing aja', '2020-02-09 22:00:41', 'read'),
(6, 2, 1, 'ada warna yg lain ?', '2020-02-09 22:22:45', 'read'),
(7, 2, 1, 'tester', '2020-02-09 22:35:44', 'read'),
(8, 1, 3, 'tes balas', '2020-02-09 16:07:20', 'unread'),
(9, 2, 1, 'test', '2020-02-09 16:29:30', 'read'),
(11, 1, 2, 'testing', '2020-02-09 16:47:07', 'unread'),
(12, 1, 3, 'saudara Firda Widiastuti telah Melakukan Pemesanan Vivo Y-91 dengan jumlah 1 unit dengan total pembayaran 2000000 silahkan selesaikan proses pembayaran melalui Bank Mandiri, foto struk transfer dan kirimkan ke <a href=\'https://wa.me/<?= 6287849910278\'></a> dan Barang akan langsung kami kirimkan Via JNE', '2020-02-09 17:11:57', 'unread'),
(13, 1, 3, 'Firda Widiastuti Anda telah Melakukan Pemesanan Power Bank Xiami dengan jumlah 2 unit dengan total pembayaran 300000 silahkan selesaikan proses pembayaran melalui Bank BCA, foto struk transfer dan kirimkan ke <a href=\'https://wa.me/6287849910278\'><a> dan Barang akan langsung kami kirimkan Via JNE', '2020-02-09 17:14:55', 'unread'),
(14, 1, 3, 'Firda Widiastuti Anda telah Melakukan Pemesanan Ring dengan jumlah 1 unit dengan total pembayaran Rp 5.000 silahkan selesaikan proses pembayaran melalui Bank BCA ke rekening 02345128345, foto struk transfer dan kirimkan ke Whatsapp toko dengan nomor : +6287849910278 dan Barang akan langsung kami kirimkan Via JNE', '2020-02-09 17:19:30', 'unread'),
(15, 1, 3, 'Firda Widiastuti Anda telah Melakukan Pemesanan OPPO Realme 5 Pro dengan jumlah 1 unit dengan total pembayaran Rp 3.000.000 silahkan selesaikan proses pembayaran melalui Bank BRI ke rekening 02345128345, foto struk transfer dan kirimkan ke Whatsapp toko dengan nomor : +6287849910278 dan Barang akan langsung kami kirimkan Via JNE', '2020-02-09 17:23:09', 'unread'),
(16, 1, 2, 'Ferdy Barliansyah R. Anda telah Melakukan Pemesanan OPPO Realme 5 Pro dengan jumlah 1 unit dengan total pembayaran Rp 3.000.000 silahkan selesaikan proses pembayaran melalui Bank Mandiri ke rekening 02345128345, foto struk transfer dan kirimkan ke Whatsapp toko dengan nomor : +6287849910278 dan Barang akan langsung kami kirimkan Via JNE', '2020-02-09 17:35:35', 'unread'),
(17, 1, 2, 'Ferdy Barliansyah R. Anda telah Melakukan Pemesanan Power Bank Xiami dengan jumlah 2 unit dengan total pembayaran Rp 300.000 silahkan selesaikan proses pembayaran melalui Bank BCA ke rekening 02345128345, foto struk transfer dan kirimkan ke Whatsapp toko dengan nomor : +6287849910278 dan Barang akan langsung kami kirimkan Via JNE', '2020-02-09 17:43:12', 'unread'),
(18, 1, 2, 'Ferdy Barliansyah R. Anda telah Melakukan Pemesanan Gurita dengan jumlah 1 unit dengan total pembayaran Rp 10.000 silahkan selesaikan proses pembayaran melalui Bank BCA ke rekening 02345128345, foto struk transfer dan kirimkan ke Whatsapp toko dengan nomor : +6287849910278 dan Barang akan langsung kami kirimkan Via JNE', '2020-02-09 17:44:27', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `gambar`) VALUES
(1, 'indosat.jpg'),
(6, 'ecashmandir_jpg-900x350.jpg'),
(7, 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `testimoni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_user`, `tanggal`, `testimoni`) VALUES
(1, 3, '2020-02-08', 'Barangnya bagus dan Pengirimannya cepat'),
(2, 2, '2020-02-08', 'Toko terpecaya barangnya mantap semua');

-- --------------------------------------------------------

--
-- Table structure for table `title_logo`
--

CREATE TABLE `title_logo` (
  `id_title` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `toko` varchar(20) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title_logo`
--

INSERT INTO `title_logo` (`id_title`, `title`, `toko`, `logo`) VALUES
(1, 'Tokoku', 'Toko Jaya Cell', 'LOGO_STMIK_LOMBOK.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `pengiriman` varchar(20) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `ukuran`) VALUES
(1, 'Kecil'),
(5, 'Sedang'),
(6, 'Besar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `alamat`, `no_telp`, `status`, `username`, `password`) VALUES
(1, 'Toko Jaya Cell', 'jaya.cell@gmail.com', 'Jln. Mohammad Hatta No. 6, Praya', '+6287849910278', 'admin', 'admin', '1sampai8'),
(2, 'Ferdy Barliansyah R.', 'rocker.hunt@gmail.com', 'Kopang', '087849910278', 'member', 'Ferdy', 'makannasi'),
(3, 'Firda Widiastuti', 'Firda@gmail.com', 'tolot tolot', '08122924', 'member', 'Firda', 'makannasi'),
(4, 'abdul hafiz bahrain', 'abdulhafizbahrain@gmail.com', 'asdf', '0', 'member', 'g', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `warna`) VALUES
(2, 'Silver'),
(3, 'Merah'),
(4, 'Pink'),
(5, 'Hitam'),
(6, 'Biru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `medsos`
--
ALTER TABLE `medsos`
  ADD PRIMARY KEY (`id_medsos`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `title_logo`
--
ALTER TABLE `title_logo`
  ADD PRIMARY KEY (`id_title`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medsos`
--
ALTER TABLE `medsos`
  MODIFY `id_medsos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `title_logo`
--
ALTER TABLE `title_logo`
  MODIFY `id_title` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
