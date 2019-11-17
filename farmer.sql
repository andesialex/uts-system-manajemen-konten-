-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 04:43 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE IF NOT EXISTS `tb_informasi` (
  `id` varchar(20) NOT NULL DEFAULT '0',
  `judul` varchar(30) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_informasi`
--

INSERT INTO `tb_informasi` (`id`, `judul`, `gambar`, `deskripsi`) VALUES
('IF001', 'Beras Merah', 'berasmerah1.jpg', 'Bulir beras terdiri dari beberapa lapisan. Paling luar disebut epikarp (sekam), lalu perikarp yang mengandung lapisan kulit ari (aleuron), biji beras (endosperm), dan lembaga atau mata beras. Kulit ari banyak mengandung asam lemak esensial, serat, vitamin, dan mineral, serta sering diolah secara terpisah menjadi tepung rice bran. Endosperm merupakan tempat pati dan protein beras, yang menentukan pulen-peranya beras. Sedangkan lembaga sering diolah terpisah menjadi tepung mata beras.  Beras merah umumnya merupakan beras tumbuk (pecah kulit) yang dipisahkan bagian sekamnya saja. Proses ini hanya sedikit merusak kandungan gizi beras. Sedangkan beras putih umumnya merupakan beras giling atau poles, yang bersih dari kulit ari dan lembaga.'),
('IF001', 'Manfaat Beras Putih', 'berasputih1.png', 'Bulir beras terdiri dari beberapa lapisan. Paling luar disebut epikarp (sekam), lalu perikarp yang mengandung lapisan kulit ari (aleuron), biji beras (endosperm), dan lembaga atau mata beras. Kulit ari banyak mengandung asam lemak esensial, serat, vitamin, dan mineral, serta sering diolah secara terpisah menjadi tepung rice bran. Endosperm merupakan tempat pati dan protein beras, yang menentukan pulen-peranya beras. Sedangkan lembaga sering diolah terpisah menjadi tepung mata beras.  Beras merah umumnya merupakan beras tumbuk (pecah kulit) yang dipisahkan bagian sekamnya saja. Proses ini hanya sedikit merusak kandungan gizi beras. Sedangkan beras putih umumnya merupakan beras giling atau poles, yang bersih dari kulit ari dan lembaga.'),
('IF001', 'frgdhg', 'apelmerah2.jpg', 'trutrj'),
('IF0010', 'manfaat alpukat', 'alpukat2.jpg', 'alpukat meiliki manfaat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `kode_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` enum('konsumen','admin','petani') NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`kode_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `level`) VALUES
(2, 'maya', 'b2693d9c2124f3ca9547b897794ac6a1', 'maya musthopa', 'perempuan', 'bandung', 'admin'),
(3, 'petani', 'd180e8e96956e056f23a05fadda0e2bd', 'maya', 'laki-laki', 'jatinangor', 'konsumen'),
(4, 'd', '6226f7cbe59e99a90b5cef6f94f966fd', 'sd', 'laki-laki', 'sds', 'admin'),
(5, 'maya', 'b2693d9c2124f3ca9547b897794ac6a1', 'maya', 'perempuan', 'jatinangor', 'petani'),
(11, 'op', '11d8c28a64490a987612f2332502467f', 'asaa', 'laki-laki', 'asasa', 'konsumen'),
(13, 'musthopa', '524b1eb90a160f9c765d98b9710d2be9', 'musthopa ', 'laki-laki', 'bandung', 'konsumen'),
(14, 'imas', '633fb8c63e06dfd4b6f90a150d4d8b1c', 'imas', 'perempuan', 'bandung', 'konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
  `kode_produk` varchar(20) NOT NULL DEFAULT '0',
  `nama_produk` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `nope_petani` int(12) NOT NULL,
  `harga` int(30) NOT NULL,
  `ketersediaan` enum('tersedia','terjual') NOT NULL,
  `gambar_produk` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`kode_produk`, `nama_produk`, `lokasi`, `nope_petani`, `harga`, `ketersediaan`, `gambar_produk`) VALUES
('M001', 'Wortel', 'Jl.Lembang No. 2 Kabupaten Lembang Jawa Barat', 2147483647, 12000, 'terjual', 'wortel2.jpg'),
('M002', 'Selada', 'Jl. Raya Jatinangor No. 3 Kecamatan Jatinangor Kab', 2147483647, 7000, 'tersedia', 'selada2.jpg'),
('M003', 'Apel Merah', 'Jl. Cinunuk No. 03 Desa Cinunuk, Kecamatan Cileuny', 2147483647, 10000, 'tersedia', 'apelmerah3.jpg'),
('M004', 'Apel Hijau', 'Jl. Raya Jatinangor No. 3 Kecamatan Jatinangor Kab', 2147483647, 20000, 'tersedia', 'apelhijau1.jpg'),
('M005', 'Alpukat', 'Jl. Cinunuk No. 03 Desa Cinunuk, Kecamatan Cileuny', 2147483647, 20000, 'tersedia', 'alpukat1.jpg'),
('M006', 'bayam', 'Jl. Cinunuk No. 03 Desa Cinunuk, Kecamatan Cileuny', 2147483647, 9000, 'tersedia', 'bayam1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `status` enum('cash','kredit') NOT NULL,
  `jumlah` int(10) NOT NULL,
  `nope_transaksi` int(13) NOT NULL,
  `total` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
