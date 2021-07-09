-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql308.epizy.com
-- Generation Time: Jul 09, 2021 at 05:31 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28776234_sipal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `inisial` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`, `inisial`) VALUES
(1, 'Januari', 'Jan'),
(2, 'Febuari', 'Feb'),
(3, 'Maret', 'Mar'),
(4, 'April', 'Apr'),
(5, 'Mei', 'Mei'),
(6, 'Juni', 'Jun'),
(7, 'July', 'Jul'),
(8, 'Agustus', 'Ags'),
(9, 'September', 'Sep'),
(10, 'Oktober', 'Okt'),
(11, 'November', 'Nov'),
(12, 'Desember', 'Des');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `nik`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `username`, `password`, `no_hp`, `email`, `date_created`) VALUES
(1, '1234220502000136', 'Putri Wardani', '2000-04-21', 'Perempuan', 'Bekasi', 'agnes_pw', 'password', '087797082472', 'putri_wardani@gmail.com', '2021-06-03 00:00:00'),
(2, '3204220403000133', 'Evander Zico Cakreswara', '2000-03-04', 'Laki-laki', 'Semarang', 'ziconyx', 'password', '087711423224', 'evanderzicocakreswara@gmail.com', '2021-06-03 00:00:00'),
(3, '3204222103000132', 'Yulius Wilson Gunawan', '2000-08-08', 'Laki-laki', 'Palembang', 'wilson_gunawan', 'password', '081232222114', 'wilson_gunawan@gmail.com', '2021-06-03 00:00:00'),
(4, '3271052301000008', 'Cornelius Excel Simamora', '2000-02-13', 'Laki-laki', 'Jl. Pemuda no. 14 Klaten', 'crnlx_simamora', 'password', '0812322221113', 'excel_simamora@gmail.com', '2021-06-03 00:00:00'),
(5, '4504222103000134', 'Gabriella Apriliani', '2000-04-24', 'Perempuan', 'Surakarta', 'gabby_aprilliani', 'password', '081225478430', 'gabby_aprillia24@gmail.com', '2021-06-03 00:00:00'),
(6, '3120342805000007', 'Yakub Ricky', '2000-05-28', 'Laki-laki', 'Pontianak', 'yakubricky', '$2y$10$/KNrVTLMHgbO9diX8Fn8vOgpywfj0bT1vcetYA.fMtp1bHbFIxDmG', '08522222394', 'yakubricky@gmail.com', '2021-06-03 00:00:00'),
(7, '3220321807000008', 'Prasetyo Bagas', '2000-07-18', 'Laki-laki', 'Yogyakarta', 'bagas_p', '$2y$10$L1gUOC9v62c6kw51.6SegOV1G7L4mh1n0CgHWDhc.sVOyMxe231NK', '082293994999', 'bagas_p@gmail.com', '2021-06-03 00:00:00'),
(8, '1234123412341234', 'Indraningsih', '1951-03-09', 'Perempuan', 'Kebumen', 'indraningsih', '$2y$10$44rHoJW2/mhlkii7YlHX/Og8WLOaEk45m/9t73GDRq14mvPlQzzAa', '0890808980875', 'indraningsih@gmail.com', '2021-06-10 13:40:35'),
(9, '3213213423213123', 'Ivan Melisio', '1983-01-10', 'Laki-laki', 'blabla', 'ivan01', '$2y$10$FPkmfcgbEr37I4FDzZfQHeJps/3gE84TI8lTmVGIoBWlZsoWq2Fkq', '082312231131', 'ivan@gmail.com', '2021-06-25 20:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `diskon_id` int(11) NOT NULL,
  `kode_promo` varchar(50) NOT NULL,
  `potongan` int(12) NOT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`diskon_id`, `kode_promo`, `potongan`, `tanggal_awal`, `tanggal_akhir`) VALUES
(0, 'TIDAKADA', 0, '2000-01-01', '2100-01-01'),
(1, 'COBASEWA', 50, NULL, NULL),
(2, 'RAMADHANMURAH', 50, '2021-04-12', '2021-05-09'),
(3, 'MERAIHKEMENANGAN', 50, '2021-06-15', '2021-06-30'),
(4, 'BEBASMERDEKA', 20, '2021-06-30', '2021-08-25'),
(5, 'ULANGTAHUN', 50, NULL, NULL),
(6, 'MERDEKATUGAS', 20, '2021-06-01', '2021-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `d_penyewaan`
--

CREATE TABLE `d_penyewaan` (
  `d_penyewaan_id` int(11) NOT NULL,
  `kamera_id` int(11) DEFAULT NULL,
  `quantity_kamera` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `quantity_produk` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_penyewaan`
--

INSERT INTO `d_penyewaan` (`d_penyewaan_id`, `kamera_id`, `quantity_kamera`, `produk_id`, `quantity_produk`, `total_price`, `order_id`) VALUES
(1, 1, 1, NULL, NULL, 20197, 1),
(2, 1, 1, NULL, NULL, 139800, 2),
(3, 6, 1, NULL, NULL, 89700, 3),
(4, 6, 1, NULL, NULL, 90000, 4),
(5, 3, 1, NULL, NULL, 105000, 5),
(6, NULL, NULL, 105, 1, 45000, 5),
(7, 5, 1, NULL, NULL, 105000, 6),
(8, 6, 1, NULL, NULL, 75000, 6),
(9, NULL, NULL, 103, 1, 50000, 6),
(10, NULL, NULL, 102, 1, 80000, 6),
(11, 5, 1, NULL, NULL, 105000, 7),
(12, 7, 1, NULL, NULL, 67500, 7),
(13, NULL, NULL, 102, 1, 80000, 7),
(14, NULL, NULL, 104, 1, 50000, 7),
(15, 4, 1, NULL, NULL, 144000, 8),
(16, 5, 1, NULL, NULL, 294000, 9),
(17, 5, 1, NULL, NULL, 126000, 10),
(18, 5, 1, NULL, NULL, 126000, 11),
(19, 5, 1, NULL, NULL, 126000, 12),
(20, 5, 1, NULL, NULL, 126000, 13),
(21, 5, 1, NULL, NULL, 105000, 14),
(22, 4, 1, NULL, NULL, 120000, 14),
(23, NULL, NULL, 104, 1, 50000, 14),
(26, 1, 1, NULL, NULL, 50000, 18),
(27, 2, 1, NULL, NULL, 125000, 18),
(28, NULL, NULL, 101, 1, 87500, 18),
(29, NULL, NULL, 102, 1, 80000, 18),
(30, 2, 1, NULL, NULL, 125000, 19),
(31, 1, 1, NULL, NULL, 50000, 19),
(32, NULL, NULL, 101, 1, 87500, 19),
(33, NULL, NULL, 102, 1, 80000, 19),
(34, 2, 1, NULL, NULL, 140000, 20),
(35, NULL, NULL, 102, 1, 89600, 20),
(36, NULL, NULL, 105, 1, 42000, 20),
(37, 2, 1, NULL, NULL, 140000, 21),
(38, NULL, NULL, 102, 1, 89600, 21),
(39, NULL, NULL, 105, 1, 42000, 21),
(40, 5, 1, NULL, NULL, 105000, 22),
(41, 7, 1, NULL, NULL, 67500, 22),
(42, NULL, NULL, 101, 1, 87500, 22),
(43, 6, 1, NULL, NULL, 24000, 23),
(44, 5, 1, NULL, NULL, 33600, 23),
(45, NULL, NULL, 102, 1, 25600, 23),
(46, NULL, NULL, 103, 1, 16000, 23),
(47, 5, 1, NULL, NULL, 117600, 24),
(48, 2, 1, NULL, NULL, 140000, 24),
(49, NULL, NULL, 103, 1, 56000, 24),
(50, 2, 1, NULL, NULL, 140000, 25),
(51, NULL, NULL, 104, 1, 56000, 25),
(52, 3, 1, NULL, NULL, 105000, 26),
(53, 7, 1, NULL, NULL, 21600, 27),
(54, NULL, NULL, 105, 1, 12000, 27),
(55, 6, 1, NULL, NULL, 210000, 28),
(56, 4, 1, NULL, NULL, 336000, 28),
(57, NULL, NULL, 102, 1, 224000, 28);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_tambahan`
--

CREATE TABLE `fasilitas_tambahan` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_produk` float NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `gambar_fasilitas_tambahan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_tambahan`
--

INSERT INTO `fasilitas_tambahan` (`id`, `nama_produk`, `tipe`, `kategori`, `merk`, `stok`, `harga_produk`, `deskripsi`, `gambar_fasilitas_tambahan`) VALUES
(101, 'Nikon SpeedLight', 'SB-700', 'Flash Eksternal', 'Nikon', 7, 35000, 'Speedlight untuk memotret saat pencahayaan kurang', 'produk_101.jpg'),
(102, 'Canon Speedlite 430EX', '430EX II', 'Flash Eksternal', 'Canon', 2, 32000, 'Dapat digunakan untuk memotret di tempat yang minim pencahayaan', 'produk_102.jpg'),
(103, 'Sony EPZ 18-105mm', 'EPZ 18-105mm', 'Lensa', 'Sony', 7, 20000, 'Lensa Sony EPZ 18-105mm f/4 G OSS untuk memotret gambar menjadi lebih tajam', 'produk_103.jpg'),
(104, 'Canon EF 200mm', 'EF 200mm f / 2.8L II USM', 'Lensa', 'Canon', 9, 20000, 'Lensa Canon EF 200mm f/2.8L II USM untuk memotret gambar menjadi lebih tajam. ', 'produk_104.jpg'),
(105, 'WEIFENG WT-3520', 'WT-3520', 'Tripod', 'Weifeng', 5, 15000, 'Tripod ini dapat digunakan dengan 3 pilihan ketinggian untuk menyesuaikan posisi kamera dengan objek yang dituju', 'produk_105.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamera`
--

CREATE TABLE `kamera` (
  `id` int(11) NOT NULL,
  `nama_kamera` varchar(150) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `megapixel` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_kamera` float NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar_kamera` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamera`
--

INSERT INTO `kamera` (`id`, `nama_kamera`, `tipe`, `merk`, `megapixel`, `stok`, `harga_kamera`, `deskripsi`, `gambar_kamera`) VALUES
(1, 'Canon Yoyokz Edition', 'DSLR', 'Canon', '35', 8, 20000, 'Kamera ini dapat digunakan untuk memfoto sebuah pemandangan sesuai dengan keinginan dari user', 'Nikkon.jpg'),
(2, 'Nikon Z50', 'Mirrorless', 'Nikon', '20,9', 3, 50000, 'Z 50 dirancang dengan dudukan Z revolusioner Nikon, dudukan lensa terluas dari semua sistem kamera yang sebanding. Dudukan yang lebih lebar berarti lebih banyak cahaya, dan lebih banyak cahaya berarti lebih banyak hal yang baik — ketajaman, kontras, kecepatan fokus, kinerja cahaya rendah, dan kualitas gambar.Rekam video dengan kualitas 4K Ultra HD dan time-lapse, 1080p slow motion, filter, efek, dan banyak lagi.Edit video dengan cepat.Rekam klip, potong langsung di kamera, kirim ke ponsel.', 'Nikon-Z50-1.jpeg'),
(3, 'Canon EOS M50 Mark II', 'DSLR', 'Nikkon', '24', 9, 35000, 'Lightweight and stylish, the EOS M50 Mark II is fun and easy to use with Wi-Fi connectivity for content creators to stay close to your audience at all times. Keep your social media feeds lit with high-quality visual storytelling in 4K and accurate eye and face detection autofocusing.In-camera YouTube live streaming for real-time video engagementFilm vertical videos in 4K for social mediaWireless connectivity with smartphone and cloud storage', 'canon-eos-m50-mark-ii-15-45-black.jpeg'),
(4, 'Canon EOS 60D Kit 18-55mm IS', 'DSLR', 'Canon', '24', 9, 48000, 'Spesifikasi:- Camera 18Megapixels - Sensor APS-C Dual Pixel CMOS AF Sensor- DIGIC 5+ Image Processor- ISO 100 - 12,800 (Expandable to 25,600)- 19 Points Cross-type AF System and 7fps Shooting- Resolusi Layar Kamera 1040k dots- Intelligent Viewfinder- 3.0', 'kamera_4.jpg'),
(5, 'Brica B-Pro 5 Alpha Edition', 'Action Cam', 'Brica', '16', 7, 42000, 'Spesifikasi :Wi-Fi Live Streaming16MP SONY Exmor-R Image Sensor4K @30fps 8 Layer LensesUp to 90fpsTrue Color 2', 'kamera_5.jpg'),
(6, 'Canon EOS 600D', 'DSLR', 'Canon', '18', 8, 30000, 'Spesifikasi:VIDEO SUPPORT FULL HDCocok untuk VLOG dan fotoKamera hasil tajam dan jernih18-megapixel CMOS sensorScene Intelligent Auto modeFull-HD EOS MovieOn-screen Feature GuideUp to 3.7fps continuous shootingWide-area 9-point AF1,040k-dot vari-angle 7.7cm (3.0”) screenBasic+ and Creative FiltersBuilt-in wireless flash control', 'kamera_6.jpg'),
(7, 'Canon EOS 4000D WIFI', 'DSLR', 'Canon', '18', 8, 27000, 'Spesifikasi :18MP APS-C SensorScene Intelligent AutoSupport Wi-FiOptical ViewfinderFullHD EOS Movies9 AF-PointsLensa EF-S 18-55mm III', 'kamera_7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` float NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `order_id`, `tanggal_bayar`, `jumlah_bayar`, `nama_pengirim`, `bukti_transfer`) VALUES
(18, 27, '2021-06-28', 32000, 'Evander Zico', 'IN000000027_Evander_Zico.jpeg'),
(19, 28, '2021-06-30', 1000000, 'TEST', 'IN000000028_TEST.jpg'),
(15, 22, '2021-06-18', 100000, 'Prasetyo Bagas', 'IN000000022_Prasetyo_Bagas_Pradipta.png'),
(17, 25, '2021-06-18', 23000, 'Agus Ketoprak', 'IN000000025_Prasetyo_Bagas_Pradipta.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `pengembalian_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` varchar(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `jumlah_kurang_bayar` float NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `denda` float NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `status_barang` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`pengembalian_id`, `order_id`, `customer_id`, `user_id`, `status_bayar`, `jumlah_kurang_bayar`, `tanggal_kembali`, `denda`, `catatan`, `tanggal_peminjaman`, `status_barang`) VALUES
(1, 1, '1', 2, 'LUNAS', 0, '2021-04-15', 0, '', '2021-04-14', 'Baik'),
(2, 2, '4', 2, 'LUNAS', 0, '2021-04-26', 10000, '', '2021-04-16', 'Baik'),
(3, 3, '3', 3, 'belum bayar', 45500, NULL, 0, '', '2021-04-28', ''),
(4, 4, '5', 3, 'BELUM BAYAR', 125000, NULL, 0, '', '2021-04-26', ''),
(5, 5, '2', 3, 'BELUM BAYAR', 50000, NULL, 0, '', '2021-04-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`) VALUES
(1, '2018-05-24 03:56:38', '::1', 'Chrome'),
(2, '2021-06-23 12:00:03', '192.168.1.3', 'Chrome'),
(3, '2021-06-23 18:20:16', '192.168.1.3', 'Chrome'),
(4, '2021-06-23 18:24:40', '::1', 'Chrome'),
(5, '2021-06-24 10:42:51', '192.168.1.3', 'Chrome'),
(6, '2021-06-24 17:33:20', '36.73.122.137', 'Chrome'),
(7, '2021-06-24 17:33:26', '36.73.122.137', 'Chrome'),
(8, '2021-06-24 17:33:47', '36.73.122.137', 'Chrome'),
(9, '2021-06-24 18:26:23', '36.78.39.78', 'Chrome'),
(10, '2021-06-24 20:23:11', '36.78.39.78', 'Chrome'),
(11, '2021-06-24 20:24:05', '36.78.39.78', 'Chrome'),
(12, '2021-06-24 20:25:53', '36.78.39.78', 'Chrome'),
(13, '2021-06-24 20:31:18', '36.78.39.78', 'Safari'),
(14, '2021-06-25 04:46:00', '36.81.56.152', 'Chrome'),
(15, '2021-06-25 05:37:32', '36.81.56.152', 'Chrome'),
(16, '2021-06-25 10:43:21', '140.213.163.118', 'Safari'),
(17, '2021-06-25 10:43:53', '140.213.163.118', 'Safari'),
(18, '2021-06-25 10:43:54', '140.213.176.196', 'Safari'),
(19, '2021-06-25 11:27:31', '182.2.37.163', 'Chrome'),
(20, '2021-06-25 11:28:43', '182.2.37.163', 'Chrome'),
(21, '2021-06-25 12:57:08', '36.81.56.152', 'Chrome'),
(22, '2021-06-25 12:57:16', '36.81.56.152', 'Chrome'),
(23, '2021-06-25 12:57:38', '36.81.56.152', 'Chrome'),
(24, '2021-06-25 12:58:05', '36.81.56.152', 'Chrome'),
(25, '2021-06-25 13:04:58', '36.81.56.152', 'Chrome'),
(26, '2021-06-25 13:07:42', '36.81.56.152', 'Chrome'),
(27, '2021-06-25 13:07:52', '36.81.56.152', 'Chrome'),
(28, '2021-06-25 13:13:05', '36.81.56.152', 'Chrome'),
(29, '2021-06-25 13:14:18', '36.81.56.152', 'Chrome'),
(30, '2021-06-25 13:24:31', '110.137.38.155', 'Chrome'),
(31, '2021-06-25 17:52:28', '36.81.56.152', 'Chrome'),
(32, '2021-06-25 17:53:33', '36.81.56.152', 'Chrome'),
(33, '2021-06-25 17:53:45', '36.81.56.152', 'Chrome'),
(34, '2021-06-26 07:17:21', '36.81.56.152', 'Chrome'),
(35, '2021-06-26 07:17:34', '36.81.56.152', 'Chrome'),
(36, '2021-06-26 07:20:20', '36.81.56.152', 'Chrome'),
(37, '2021-06-28 15:17:04', '36.68.56.149', 'Chrome'),
(38, '2021-06-28 15:25:45', '36.68.56.149', 'Chrome'),
(39, '2021-06-28 15:30:05', '36.68.56.149', 'Chrome'),
(40, '2021-06-28 15:30:33', '36.68.56.149', 'Chrome'),
(41, '2021-06-28 15:30:59', '36.68.56.149', 'Chrome'),
(42, '2021-06-28 15:39:14', '36.68.56.149', 'Chrome'),
(43, '2021-06-28 15:41:35', '36.68.56.149', 'Chrome'),
(44, '2021-06-28 17:15:34', '36.68.56.149', 'Chrome'),
(45, '2021-06-30 07:45:33', '36.69.4.33', 'Chrome'),
(46, '2021-06-30 07:48:07', '36.69.4.33', 'Chrome'),
(47, '2021-06-30 07:48:17', '36.69.4.33', 'Chrome'),
(48, '2021-06-30 07:48:28', '36.69.4.33', 'Chrome'),
(49, '2021-06-30 07:48:53', '36.69.4.33', 'Chrome'),
(50, '2021-06-30 07:49:00', '36.69.4.33', 'Chrome'),
(51, '2021-06-30 07:50:16', '36.69.4.33', 'Chrome'),
(52, '2021-07-01 01:30:31', '36.81.87.9', 'Chrome'),
(53, '2021-07-01 04:22:50', '36.81.87.9', 'Chrome'),
(54, '2021-07-01 04:27:59', '36.81.87.9', 'Chrome'),
(55, '2021-07-01 04:28:06', '36.81.87.9', 'Chrome'),
(56, '2021-07-03 15:11:09', '36.81.87.9', 'Chrome'),
(57, '2021-07-03 15:11:43', '36.81.87.9', 'Chrome'),
(58, '2021-07-03 15:12:24', '36.81.87.9', 'Chrome'),
(59, '2021-07-03 15:12:34', '36.81.87.9', 'Chrome'),
(60, '2021-07-03 15:12:50', '36.81.87.9', 'Chrome'),
(61, '2021-07-03 15:16:04', '36.81.87.9', 'Chrome'),
(62, '2021-07-03 15:17:16', '36.81.87.9', 'Chrome'),
(63, '2021-07-03 15:17:39', '36.81.87.9', 'Chrome'),
(64, '2021-07-05 15:49:38', '180.252.150.70', 'Chrome'),
(65, '2021-07-05 15:50:26', '180.252.150.70', 'Chrome'),
(66, '2021-07-06 11:58:16', '182.253.163.100', 'Safari'),
(67, '2021-07-06 11:58:25', '182.253.163.100', 'Safari'),
(68, '2021-07-06 11:58:25', '182.253.163.100', 'Safari'),
(69, '2021-07-06 17:34:21', '110.137.199.183', 'Chrome'),
(70, '2021-07-06 17:39:40', '110.137.199.183', 'Chrome'),
(71, '2021-07-06 17:40:27', '110.137.199.183', 'Chrome'),
(72, '2021-07-07 09:59:26', '182.253.163.30', 'Firefox'),
(73, '2021-07-07 10:00:40', '182.253.163.30', 'Chrome'),
(74, '2021-07-07 10:01:21', '182.253.163.30', 'Firefox'),
(75, '2021-07-07 10:12:57', '182.253.163.30', 'Firefox'),
(76, '2021-07-07 10:16:46', '182.253.163.30', 'Firefox'),
(77, '2021-07-07 10:16:47', '182.253.163.30', 'Firefox'),
(78, '2021-07-07 10:17:13', '182.253.163.30', 'Firefox'),
(79, '2021-07-07 10:23:17', '182.253.163.30', 'Firefox'),
(80, '2021-07-07 10:28:59', '182.253.163.30', 'Firefox'),
(81, '2021-07-08 13:27:51', '110.137.199.183', 'Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penyewaan`
--

CREATE TABLE `transaksi_penyewaan` (
  `order_id` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `customer` int(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `diskon` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_barang` varchar(100) NOT NULL,
  `status_bayar` varchar(100) NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `catatan` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_penyewaan`
--

INSERT INTO `transaksi_penyewaan` (`order_id`, `kode_transaksi`, `admin`, `customer`, `tanggal_order`, `diskon`, `tanggal_peminjaman`, `tanggal_kembali`, `status_barang`, `status_bayar`, `denda`, `catatan`) VALUES
(1, 'IN000000001', 1, 1, '2021-01-01', 0, '2021-06-01', '2021-06-04', 'KEMBALI', 'LUNAS', 0, NULL),
(2, 'IN000000002', 1, 1, '2021-01-02', 0, '2021-06-05', '2021-06-08', 'KEMBALI', 'LUNAS', 0, NULL),
(3, 'IN000000003', 1, 8, '2021-01-08', 0, '2021-06-01', '2021-06-04', 'KEMBALI', 'LUNAS', 0, NULL),
(4, 'IN000000004', 1, 4, '2021-02-11', 0, '2021-06-01', '2021-06-04', 'KEMBALI', 'LUNAS', 0, NULL),
(5, 'IN000000005', 1, 5, '2021-02-04', 0, '2021-06-01', '2021-06-04', 'KEMBALI', 'LUNAS', 0, NULL),
(6, 'IN000000006', 1, 8, '2021-02-08', 50, '2021-06-02', '2021-06-05', 'KEMBALI', 'LUNAS', 0, NULL),
(7, 'IN000000007', 1, 3, '2021-02-12', 50, '2021-06-16', '2021-06-19', 'KEMBALI', '', 0, NULL),
(8, 'IN000000008', 1, 1, '2021-02-18', 0, '2021-06-01', '2021-06-04', 'KEMBALI', '', 0, NULL),
(9, 'IN000000009', 1, 1, '2021-02-18', 0, '2021-06-01', '2021-06-08', 'KEMBALI', '', 0, NULL),
(10, 'IN000000010', 1, 7, '2021-02-20', 0, '2021-06-01', '2021-06-04', 'KEMBALI', '', 0, NULL),
(11, 'IN000000011', 1, 2, '2021-02-22', 0, '2021-06-01', '2021-06-04', 'KEMBALI', 'LUNAS', 0, NULL),
(12, 'IN000000012', 1, 2, '2021-03-03', 0, '2021-06-09', '2021-06-12', 'KEMBALI', '', 0, NULL),
(13, 'IN000000013', 1, 6, '2021-03-11', 0, '2021-06-05', '2021-06-08', 'KEMBALI', '', 0, NULL),
(14, 'IN000000014', 1, 3, '2021-03-19', 50, '2021-06-01', '2021-06-04', 'KEMBALI', '', 0, NULL),
(15, 'IN000000014', 1, 3, '2021-03-20', 50, '2021-06-01', '2021-06-04', 'KEMBALI', 'DP', 0, NULL),
(16, 'IN000000014', 1, 3, '2021-04-05', 50, '2021-06-01', '2021-06-04', 'DIPESAN', '', 0, NULL),
(17, 'IN000000017', 1, 5, '2021-04-15', 50, '2021-06-01', '2021-06-08', 'DIPESAN', '', 0, NULL),
(18, 'IN000000018', 1, 1, '2021-05-06', 50, '2021-06-01', '2021-06-04', 'DIPINJAM', '', 0, NULL),
(19, 'IN000000019', 1, 1, '2021-06-15', 50, '2021-06-01', '2021-06-04', 'DIPINJAM', '', 0, NULL),
(20, 'IN000000020', NULL, 7, '2021-06-16', 20, '2021-06-22', '2021-06-25', '', '', 0, NULL),
(21, 'IN000000021', NULL, 7, '2021-06-16', 20, '2021-06-21', '2021-06-24', '', '', 0, NULL),
(22, 'IN000000022', NULL, 7, '2021-06-16', 50, '2021-06-23', '2021-06-26', 'KEMBALI', 'DP', 20000, 'Denda pengembalian terlambat'),
(23, 'IN000000023', NULL, 7, '2021-06-17', 20, '2021-06-24', '2021-06-25', 'RUSAK', 'LUNAS', 60000, 'Kamera flashnya mati'),
(24, 'IN000000024', NULL, 7, '2021-06-17', 20, '2021-06-18', '2021-06-21', 'KEMBALI', 'LUNAS', 0, NULL),
(25, 'IN000000025', NULL, 7, '2021-06-17', 20, '2021-06-23', '2021-06-26', 'KEMBALI', 'LUNAS', 0, NULL),
(28, 'IN000000028', NULL, 10, '2021-06-30', 0, '2021-06-30', '2021-07-07', 'KEMBALI', 'LUNAS', 100000, ''),
(26, 'IN000000026', NULL, 9, '2021-06-25', 0, '2021-07-03', '2021-07-06', '', '', NULL, NULL),
(27, 'IN000000027', 2, 2, '2021-06-25', 20, '2021-06-30', '2021-07-01', 'DIPESAN', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level_id` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `foto_user` varchar(128) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `level_id`, `jenis_kelamin`, `email`, `foto_user`, `date_created`) VALUES
(1, 'Yonatan Abisai', 'yonach', 'ff090bf4e646bf7926511d8e671bfe2bff8788c01883210ca2a407850e98851d5d355d0d07db6d318485f97aa040ec3019e91600f7fa40ef41cb423b92a362f0', '2', 'Laki Laki', 'yonatan.abisai@yahoo.com', 'user_1.jpg', '2021-04-09 00:00:00'),
(2, 'Quincy Padawangi', 'quincy', '7897bafebbef4f4c2bff0102fedc82af90cf3165c7c55f7c4ab81bccd4e955b09efc90cc09b0a11bcb3e26cbd3d31839aa7529c957ece52f5c9a308ae174710e', '1', 'Laki Laki', 'qpdw@gmail.com', 'user_2.jpg', '2021-04-10 00:00:00'),
(3, 'root', 'root', 'ff090bf4e646bf7926511d8e671bfe2bff8788c01883210ca2a407850e98851d5d355d0d07db6d318485f97aa040ec3019e91600f7fa40ef41cb423b92a362f0', '2', 'Laki Laki', 'root@gmail.com', 'Stevani.png', '2021-04-14 00:00:00'),
(4, 'Putri Wardani', 'pwardani', '7897bafebbef4f4c2bff0102fedc82af90cf3165c7c55f7c4ab81bccd4e955b09efc90cc09b0a11bcb3e26cbd3d31839aa7529c957ece52f5c9a308ae174710e', '1', 'Laki Laki', 'pwardani28@gmail.com', 'Putri2.jpg', '2021-04-20 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`diskon_id`);

--
-- Indexes for table `d_penyewaan`
--
ALTER TABLE `d_penyewaan`
  ADD PRIMARY KEY (`d_penyewaan_id`);

--
-- Indexes for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamera`
--
ALTER TABLE `kamera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`pengembalian_id`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indexes for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `diskon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `d_penyewaan`
--
ALTER TABLE `d_penyewaan`
  MODIFY `d_penyewaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `fasilitas_tambahan`
--
ALTER TABLE `fasilitas_tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `kamera`
--
ALTER TABLE `kamera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `pengembalian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `transaksi_penyewaan`
--
ALTER TABLE `transaksi_penyewaan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
