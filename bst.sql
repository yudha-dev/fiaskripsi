-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2020 at 04:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bst`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama`, `alamat`, `no_hp`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'wergu', '08920989098', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detailp` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nomor_rek` varchar(30) NOT NULL,
  `nama_rek` varchar(30) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `nama_bank_tujuan` varchar(30) NOT NULL,
  `jumlah_tf` int(11) NOT NULL,
  `tanggal_tf` date NOT NULL,
  `bukti_tf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detailp`, `id_pemesanan`, `id_pelanggan`, `nomor_rek`, `nama_rek`, `nama_bank`, `nama_bank_tujuan`, `jumlah_tf`, `tanggal_tf`, `bukti_tf`) VALUES
(8, 3, 10, '2323212312312', 'ahmad', 'Bank Indonesia (BI)', 'BCA', 12000000, '2020-02-08', '962.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nama_jasa` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `id_kategori`, `id_vendor`, `nama_jasa`, `harga`, `keterangan`, `foto`) VALUES
(7, 1, 1, 'MAKEUP ARTIS', 2000000, '<ul>\r\n<li>Make uppengantin akad, melati, aksesoris</li>\r\n<li>Make up pengantin resepsi &amp; aksesoris</li>\r\n<li>Kebaya dan beskap pengantin akad &amp; resepsi</li>\r\n<li>Make up + kain bawahan Ibu &amp; besan 1x</li>\r\n<li>Busana bapak &amp; besan pengantin 1x</li>\r\n<li>Make up + busana pagar ayu 2 orang</li>\r\n<li>Busana pagar bagus 2 orang</li>\r\n<li>Hand Bouquet</li>\r\n</ul>', '6969ff31e634a15842ddefdb0ee86ec17a.jpg'),
(10, 2, 2, ' CATERING BY CHEF RADEN', 10000000, '<ul>\r\n<li>7 macam buffet, 3 food stall, dan 3 dessert</li>\r\n<li>Dekorasi Pelaminan 8 meter</li>\r\n<li>Taman Pelaminan</li>\r\n<li>Area Akad</li>\r\n<li>Galeri Foto, Janur, Karpet, Pilar Jalan, Meja Penerima Tamu, Kotak Angpau</li>\r\n<li>Buffet Pengantin &amp; Meja VIP</li>\r\n<li>Buku Tamu + Ballpoint</li>\r\n<li>Tenaga Service, Peralatan Makan</li>\r\n<li>Wedding Organizer team</li>\r\n<li>VIP service</li>\r\n</ul>', 'wedding-catering-101-planning-your-wedding-menu-1.jpg'),
(11, 3, 3, 'MC 1 ORANG (AKAD & RESEPSI)', 500000, '<ul>\r\n<li>Mc weeding 1 orang</li>\r\n</ul>', 'mc-wedding.jpg'),
(12, 1, 3, 'ASDASD', 2323232, 'asdasdasasdasd', '69ff31e634a15842ddefdb0ee86ec17a.jpg'),
(13, 1, 3, 'ASDASD', 123213, 'asdasd', 'mc-wedding.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_acara`
--

CREATE TABLE `jasa_acara` (
  `id_jasa` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'MAKEUP'),
(2, 'CATERING'),
(3, 'MC');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_paket` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pelanggan`, `kode_paket`, `tanggal`, `harga`) VALUES
(27, 12, 2, '2020-02-07', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `keuntungan_ks`
--

CREATE TABLE `keuntungan_ks` (
  `id_keuntungan_ks` int(11) NOT NULL,
  `nama_kon` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuntungan_ks`
--

INSERT INTO `keuntungan_ks` (`id_keuntungan_ks`, `nama_kon`, `ket`) VALUES
(1, 'Kontrak Kerja BST', '<p style=\"text-align: center;\"><a href=\"https://imgbb.com/\"><img style=\"opacity: 0.5; filter: alpha(opacity=50);\" src=\"https://i.ibb.co/3f9T4yQ/blue.png\" alt=\"blue\" width=\"110\" height=\"70\" border=\"0\" /></a></p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">SURAT PERJANJIAN KERJASAMA JASA</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pada hari ini Senin tanggal 26 (dua puluh enam) bulan Maret tahun 2019 (dua ribu sembilan belas) telah diadakan perjanjian kerjasama oleh dan antara:</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Nama : Akhlish F. (Acik)</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Alamat :</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Jabatan : EVENT MANAGER BST PROJECT</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Dalam hal ini bertindak untuk dan atas nama BST PROJECT dan selanjutnya disebut sebagai PIHAK PERTAMA</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Nama :</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Alamat :</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Jabatan :</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Dalam hal ini bertindak untuk dan atas nama &hellip;&hellip;&hellip; dan selanjutnya disebut sebagai PIHAK KEDUA</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pihak Pertama dan Pihak Kedua menerangkan terlebih dahulu hal-hal sebagai berikut:</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">1. Bahwa Pihak Pertama adalah pihak yang akan mengadakan acara wedding dan syukuran.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">2. Jangka waktu pengyelenggaraan event 2 (dua) hari terhitung sejak tanggal 13 Mei 2019 (tiga belas mei dua ribu sembilan belas) sampai dengan tanggal 14 Mei 2019 (empat belas mei dua ribu sembilan belas)</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">3. Bahwa Pihak Pertama menawarkan kepada Pihak Kedua untuk menyediakan tempat untuk event wedding yang diselenggarakan oleh Pihak Pertama.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">4. Bahwa Pihak Kedua bersedia menerima tawaran kerjasama dari Pihak Pertama untuk menyediakan tempat pada acara tersebut.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">5. Untuk pelaksanaan perjanjian ini, Pihak Pertama dan Pihak Kedua sepakat untuk mengikatkan diri dalam perjanjian ini dengan syarat dan ketentuan sebagai berikut:</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 1</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">MAKSUD</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pihak Pertama bermaksud menggunakan &hellip;&hellip;&hellip;. sebagai tempat penyelenggaraan event wedding dan Pihak Kedua telah menyatakan persetujuannya kepada Pihak Pertama untuk menyediakan tempat guna acara tersebut.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 2</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">WAKTU KEGIATAN</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">1. Event wedding akan dilaksanakan pada tanggal 13 Mei 2019 (tigga belas mei dua ribu sembilan belas) dimulai dari pukul 07.00-17.00 WIB</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">2. Untuk acara syukuran yang akan di hadiri oleh tamu tertentu akan dilaksanakan pada tanggal 14 Mei 2019 (empat belas mei dua ribu sembilan belas) dimulai pukul 10.00-15.00 WIB</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 3</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">KEWAJIBAN PIHAK PERTAMA</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">1. Pihak pertama bertanggung jawab atas acara wedding yang diselenggarakan di tempat Pihak Kedua.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">2. Pihak Pertama menyediakan seluruh perangkat seluruh soudsystem yang diperlukan dalam rangka penyelenggaraan event wedding tersebut.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">3. Pihak Pertama menyediakan sendiri Pemandu Acara dan tenaga-tenaga lain yang diperlukan dalam penyelenggaraan event wedding.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">4. Membayar biaya pemakaian tempat sesuai dengan kesepakatan dalam perjanjian ini.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 4</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">KEWAJIBAN PIHAK KEDUA</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pihak Kedua berkewajiban menyediakan tempat acara dengan fasilitas sebagai berikut:</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">1. Kursi dan meja untuk tamu VIP sebanyak 50 kursi</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">2. Kursi untuk tamu undangan sebanyak 1.000 kursi</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">3. Menyediakan tempat untuk meletakan aneka makanan dan soft drink</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">4. Menyediakan tempat khusus untuk acara akad nikah</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">5. Menyediakan tempat yang berbeda untuk acara resepsi pernikahan.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">6. Menyediakan tim untuk menjaga kebersihan gedung saat acara wedding</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">7. Menyediakan ruang/tempat khusus untuk tamu VIP</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">8. Menyediakan lampu penerangan sesuai dengan daftar yang terlampir.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">9. Menyediakan tempat parkir motor dan mobil bagi semua pihak yang terlibat dalam event wedding.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">10. Menjaga keamanan selama dalam penyelenggaraan event wedding.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 5</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">B I A Y A</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pihak Pertama dan Pihak Kedua sepakat bahwa biaya seluruh pemakaian tempat acara beserta fasilitas-fasilitasnya sebagaimana dimaksud dalam perjanjian ini adalah sebesar Rp. 100.000.000 (seratus juta rupiah)</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 6</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">SISTEM PEMBAYARAN</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pihak Pertama dan Pihak Kedua sepakat bahwa sistem pembayaran biaya pemakaian tempat acara dan fasilitas-fasilitas sebagaimana disebut pada pasal 4 ditetapkan sebagai berikut:</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">1. Tahap pertama sebagai uang muka sebesar 20% atau sebesar Rp 20.000.000 (dua puluh juta rupiah) akan dibayar oleh Pihak Pertama kepada Pihak Kedua pada saat perjanjian ini dibuat dan ditandatangani.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">2. Tahap kedua akan dibayar sebesar 30% atau sebesar Rp. 30.000.000 (tiga puluh juta rupiah) pada hari pertama pelaksanaan event wedding yakni pada hari Sabtu tanggal 13 Mei 2019.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">3. Tahap ketiga sebesar 50% atau sebesar Rp. 50.000.000 (lima puluh juta rupiah ) dibayar pada hari terakhir pelaksanaan event wedding yakni pada hari Minggu tanggal 14 Mei 2019.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Seluruh pembayaran sebagaimana dimaksud dalam ayat (1) pasal ini dilakukan secara tunai.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 7</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">PERUBAHAN</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Apabila dipandang perlu oleh Pihak Pertama dan Pihak Kedua, perjanjian ini dapat diubah baik menyangkut materi maupun syarat-syaratnya yang harus dibuat berdasarkan kesepakatan tertulis kedua belah pihak antara Pihak Pertama dan Pihak Kedua.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 8</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">PEMBATALAN</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">1. Surat Perjanjian kerjasama ini tidak dapat dibatalkan secara sepihak tanpa persetujuan pihak lainnya.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">2. Pembatalan oleh satu pihak, kecuali dengan alasan force majeure (musibah yang terjadi secara tiba-tiba dan di luar kendali manusia) , maka pihak yang membatalkan wajib memberikan ganti rugi sesuai dengan jumlah yang disepakati oleh kedua belah pihak.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 9</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">FORCE MAJEURE</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">1. Force Majeure yang dimaksud dalam perjanjian ini adalah suatu keadaan memaksa diluar batas kemampuan kedua belah pihak yang dapat mengganggu bahkan menggagalkan terlaksananya event, seperti bencana alam, epidemik, peperangan, pemogokan, sabotase, pemberontakan masyarakat, blokade, kebijaksanaan pemerintah khususnya yang disebabkan karena keadaan diluar kemampuan manusia.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">2. Terhadap pembatalan akibat Force Majaure, Pihak Pertama dan Pihak Kedua secara sepakat menanggung kerugiannya masing-masing.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 10</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">PENYELESAIAN PERSELISIHAN</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">1. Apabila terjadi perselisihan sehubungan dengan pelaksanaan dari Perjanjian, maka PIHAK PERTAMA dan PIHAK KEDUA akan menyelesaikannya dengan jalan musyawarah untuk mufakat.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">2. Apabila upaya untuk menyelesaikan perselisihan dengan jalan damai tidak membawa hasil, maka PIHAK PERTAMA dan PIHAK KEDUA sepakat satu sama lain untuk menyelesaikan perselisihan tersebut untuk menunjuk pihak ketiga sebagai mediator.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">3. Apabila tidak mencapai kesepakatan melalui mediasi, maka kedua belah pihak akan menyelesaikan secara hukum dan dalam hal ini dengan segala akibatnya memilik kediaman hukum yang tidak berubah pada Kantor Kepaniteraan Pengadilan setempat.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pasal 11</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">PENUTUP</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Demikian surat perjanjian ini dibuat dalam rangkap 2 (dua) masing-masing dibubuhi, materai secukupnya dan mempunyai kekuatan hukum yang sama untuk dipahami dan dilaksanakan sepenuhnya oleh Para Pihak tanpa adanya paksaan atau tekanan dari piham manapun juga.</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Dibuat di : Kudus</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Tanggal : 26 Maret 2019</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">Pihak Pertama Pihak Kedua</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">(nama lengkap) (nama lengkap)</p>\r\n<p style=\"margin-bottom: 0in; line-height: 100%;\">&nbsp;</p>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_kerja`
--

CREATE TABLE `kontrak_kerja` (
  `id_kontrak_k` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keuntungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontrak_kerja`
--

INSERT INTO `kontrak_kerja` (`id_kontrak_k`, `id_vendor`, `tanggal`, `keuntungan`) VALUES
(1, 1, '2020-01-29', 5),
(2, 2, '2020-01-29', 10),
(3, 3, '2020-01-29', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `ongkos_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `ongkos_kirim`) VALUES
(1, 'PATI', 750000),
(2, 'KUDUS', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `paket_pernikahan`
--

CREATE TABLE `paket_pernikahan` (
  `id_pp` int(11) NOT NULL,
  `id_jasa` int(11) NOT NULL,
  `kode_paket` int(11) NOT NULL,
  `nama_paket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_pernikahan`
--

INSERT INTO `paket_pernikahan` (`id_pp`, `id_jasa`, `kode_paket`, `nama_paket`) VALUES
(22, 7, 1, 'PAKET UMUM'),
(23, 10, 1, 'PAKET UMUM'),
(24, 11, 1, 'PAKET UMUM'),
(25, 7, 2, 'PAKET PLUS'),
(26, 11, 2, 'PAKET PLUS'),
(28, 10, 3, 'MODEREN'),
(30, 7, 4, 'ADASD'),
(31, 11, 4, 'ADASD'),
(32, 11, 4, 'ADASD'),
(33, 12, 4, 'ADASD'),
(34, 13, 4, 'ADASD');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `alamat`, `no_hp`, `foto`) VALUES
(3, 'rizal', 'rizal', 'Rizaludin Asegaf', 'Undaan Rt 03 Rw 04', '089387908467', ''),
(10, 'kamal', 'kamal', 'Kamal Palevi', 'jengolo', '08920989098', ''),
(12, 'abdul', 'abdul', 'Abdul Gany', 'Wergu', '0898779090', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_paket` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `ongkir` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `metode_pembayaran` enum('Dp','Lunas') DEFAULT NULL,
  `status` enum('Belum Dibayar','Pembayaran Diverifikasi','Pembayaran Sukses') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `kode_paket`, `total_harga`, `ongkir`, `tanggal`, `metode_pembayaran`, `status`) VALUES
(3, 10, 2, 2500000, 750000, '2020-02-07', 'Lunas', 'Pembayaran Diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL,
  `nama_rekening` int(11) NOT NULL,
  `nomor_rekening` int(11) NOT NULL,
  `nama_bank` int(11) NOT NULL,
  `jumlah_penarikan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `jumlah_saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_vendor` varchar(30) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `foto` text NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `username`, `password`, `nama_vendor`, `nama_pemilik`, `alamat`, `no_hp`, `foto`, `aktif`) VALUES
(1, 'vendor', 'vendor', 'vendor', 'slamet', 'bacin', '08920989098', '', 1),
(2, 'vendor1', 'vendor1', 'vendor1', 'vendor1', 'ngemplak', '08920989098', '', 1),
(3, 'kamal', 'kamal', 'kamal alfitra', 'kamal alfitra', 'jegolo', '08920989098', '', 1),
(5, 'widji', 'widji', 'widji', 'widji astuti', 'bacin', '6282138989470', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detailp`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_pemesanan_2` (`id_pemesanan`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `jasa_acara`
--
ALTER TABLE `jasa_acara`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_pelangan` (`id_pelanggan`);

--
-- Indexes for table `keuntungan_ks`
--
ALTER TABLE `keuntungan_ks`
  ADD PRIMARY KEY (`id_keuntungan_ks`);

--
-- Indexes for table `kontrak_kerja`
--
ALTER TABLE `kontrak_kerja`
  ADD PRIMARY KEY (`id_kontrak_k`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `paket_pernikahan`
--
ALTER TABLE `paket_pernikahan`
  ADD PRIMARY KEY (`id_pp`),
  ADD KEY `id_jasa` (`id_jasa`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detailp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jasa_acara`
--
ALTER TABLE `jasa_acara`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `keuntungan_ks`
--
ALTER TABLE `keuntungan_ks`
  MODIFY `id_keuntungan_ks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontrak_kerja`
--
ALTER TABLE `kontrak_kerja`
  MODIFY `id_kontrak_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paket_pernikahan`
--
ALTER TABLE `paket_pernikahan`
  MODIFY `id_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_3` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `jasa`
--
ALTER TABLE `jasa`
  ADD CONSTRAINT `jasa_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `jasa_ibfk_2` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `kontrak_kerja`
--
ALTER TABLE `kontrak_kerja`
  ADD CONSTRAINT `kontrak_kerja_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`);

--
-- Constraints for table `paket_pernikahan`
--
ALTER TABLE `paket_pernikahan`
  ADD CONSTRAINT `paket_pernikahan_ibfk_1` FOREIGN KEY (`id_jasa`) REFERENCES `jasa` (`id_jasa`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `saldo_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
