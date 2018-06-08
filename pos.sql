-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 11:46 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kd_barang` varchar(11) NOT NULL,
  `nama_barang` text,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `harga_pokok` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `stok_minimal` int(11) DEFAULT NULL,
  `barang_tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kategori` int(11) NOT NULL,
  `barang_tgl_last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nama_barang`, `barang_satuan`, `harga_pokok`, `harga_jual`, `stok_barang`, `stok_minimal`, `barang_tgl_input`, `id_kategori`, `barang_tgl_last_update`) VALUES
('BR001', 'Pepsodent', '4', 5000, 7000, 57, 1, '2018-03-13 16:37:48', 4, '0000-00-00 00:00:00'),
('BR003', 'Sampo', '4', 12000, 15000, 99, 1, '2018-03-13 16:41:02', 4, '0000-00-00 00:00:00'),
('BR004', 'Sabun cuci', '2', 15000, 25000, 90, 1, '2018-03-13 16:42:14', 4, '0000-00-00 00:00:00'),
('BR005', 'Indomie Goreng', '4', 2500, 3500, 40, 1, '2018-03-13 16:43:44', 26, '0000-00-00 00:00:00'),
('BR006', 'Indomie Rebus', '4', 2500, 3500, 90, 1, '2018-03-13 16:45:06', 26, '0000-00-00 00:00:00'),
('BR007', 'Susu Beruang', '4', 8000, 10000, 102, 1, '2018-03-13 16:46:24', 27, '0000-00-00 00:00:00'),
('BR008', 'Rinso Cair', '4', 2000, 5000, 89, 1, '2018-03-13 16:47:34', 4, '0000-00-00 00:00:00'),
('BR010', 'Indocafe', '2', 120000, 220000, 80, 1, '2018-03-13 16:52:27', 27, '0000-00-00 00:00:00'),
('BR011', 'Teh Botol', '4', 5000, 10000, 179, 89, '2018-03-13 16:54:46', 27, '0000-00-00 00:00:00'),
('BR012', 'Teh gelas', '4', 35000, 1000, 19, 1, '2018-06-03 15:05:51', 35, '0000-00-00 00:00:00'),
('BR013', 'indomie goreng', '4', 45000, 3500, 49, 1, '2018-06-03 15:06:44', 36, '0000-00-00 00:00:00'),
('BR014', 'indomie rebus', '4', 120000, 3500, 90, 10, '2018-06-03 15:07:47', 36, '0000-00-00 00:00:00'),
('BR015', 'indomie soto', '4', 120000, 3500, 90, 10, '2018-06-03 15:09:13', 36, '0000-00-00 00:00:00'),
('BR016', 'sarimi goreng', '4', 250000, 3500, 90, 10, '2018-06-03 15:10:59', 36, '0000-00-00 00:00:00'),
('BR017', 'sarimi rebus', '4', 250000, 4000, 90, 10, '2018-06-03 15:11:33', 36, '0000-00-00 00:00:00'),
('BR018', 'mie gelas', '4', 70000, 4000, 90, 1, '2018-06-03 15:12:35', 36, '0000-00-00 00:00:00'),
('BR019', 'kopi good day', '4', 250000, 1000, 78, 10, '2018-06-03 15:14:24', 39, '0000-00-00 00:00:00'),
('BR020', 'indo cafe', '4', 350000, 1000, 40, 10, '2018-06-03 15:15:08', 39, '0000-00-00 00:00:00'),
('BR021', 'kapal api', '4', 120000, 1000, 88, 10, '2018-06-03 15:16:01', 39, '0000-00-00 00:00:00'),
('BR022', 'Bumbu racik aym', '4', 250000, 1500, 50, 10, '2018-06-03 15:18:06', 32, '0000-00-00 00:00:00'),
('BR023', 'racik nasi grng', '4', 120000, 1500, 90, 1, '2018-06-03 15:19:06', 32, '0000-00-00 00:00:00'),
('BR025', 'mezone', '4', 350000, 5000, 40, 10, '2018-06-03 15:21:36', 35, '0000-00-00 00:00:00'),
('BR026', 'teh kotak', '4', 340000, 4000, 20, 10, '2018-06-03 15:22:20', 35, '0000-00-00 00:00:00'),
('BR029', 'momogi', '4', 45000, 1000, 39, 10, '2018-06-03 15:24:49', 37, '0000-00-00 00:00:00'),
('BR030', 'chocolatos', '4', 45000, 3500, 40, 10, '2018-06-03 15:25:31', 37, '0000-00-00 00:00:00'),
('BR031', 'masko ayam', '4', 120000, 1500, 40, 1, '2018-06-03 15:27:29', 32, '0000-00-00 00:00:00'),
('BR032', 'masko sapi', '4', 45000, 1500, 50, 1, '2018-06-03 15:28:07', 32, '0000-00-00 00:00:00'),
('BR033', 'sosis ayam', '4', 45000, 1000, 50, 1, '2018-06-03 15:29:42', 37, '0000-00-00 00:00:00'),
('BR034', 'sosis sapi', '4', 250000, 1500, 50, 1, '2018-06-03 15:30:40', 37, '0000-00-00 00:00:00'),
('BR035', 'bimoli', '4', 120000, 9000, 30, 10, '2018-06-03 15:32:59', 34, '0000-00-00 00:00:00'),
('BR036', 'ale ale', '2', 2000, 200000, 2, 2, '2018-06-04 02:23:27', 32, '0000-00-00 00:00:00'),
('BR044', 'PERMEN', '4', 250000, 4000, 360, 30, '2018-06-04 02:34:36', 37, '0000-00-00 00:00:00'),
('BR045', 'indomie soto', '2', 35000, 4000, 20, 1, '2018-06-04 09:20:31', 36, '0000-00-00 00:00:00'),
('BR046', 'sarimi goreng', '4', 250000, 12000, 90, 31, '2018-06-08 09:04:14', 36, '0000-00-00 00:00:00'),
('BR047', 'tes', '2', 120000, 1000, 50, 49, '2018-06-08 09:18:52', 33, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli_suplier`
--

CREATE TABLE `tbl_beli_suplier` (
  `tanggal_beli` varchar(12) NOT NULL,
  `no_faktur` varchar(200) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `kd_barang` varchar(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_belanja` double NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=sudah di proses, 0 belum di proses',
  `detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_beli_suplier`
--

INSERT INTO `tbl_beli_suplier` (`tanggal_beli`, `no_faktur`, `id_suplier`, `kd_barang`, `harga`, `jumlah`, `total_belanja`, `status`, `detail`) VALUES
('2018-06-08', '29383', 1, 'BR007', 8000, 89, 712000, 1, 1),
('2018-06-04', '678', 1, 'BR027', 250000, 6, 1500000, 1, 1),
('2018-06-08', '78', 1, 'BR044', 250000, 90, 22500000, 1, 1),
('2018-06-08', '789', 1, 'BR044', 250000, 90, 22500000, 1, 1),
('2018-03-04', '87877', 1, 'BR003', 12000, 56, 672000, 1, 1),
('2018-03-05', '8787709', 1, 'BR006', 2500, 76, 190000, 1, 1),
('2018-03-07', '98989', 1, 'BR009', 5000, 88, 440000, 1, 1),
('2018-03-03', 'yhhshs', 1, 'BR002', 7000, 34, 238000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(32, 'Dapur'),
(33, 'Cemilan'),
(34, 'minyak'),
(35, 'minuman ringan'),
(36, 'mie instan'),
(37, 'jajanan bocah'),
(38, 'petasan'),
(39, 'CAFEIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kd_kriteria` varchar(2) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL,
  `jenis_atribut` varchar(20) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kd_kriteria`, `nama_kriteria`, `jenis_atribut`, `bobot`) VALUES
('C1', 'CABUT_SEKOLAH', 'benefit', 10),
('C2', 'TAWURAN', 'BENEFIT', 20),
('C3', 'MOLOR_DIKELAS', 'BENEFIT', 20),
('C4', 'NGELINDUR', 'BENEFIT', 17),
('C5', 'KERJASAMA', 'BENEFIT', 15),
('C6', 'KEPEDULIAN', 'BENEFIT', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Penjaga'),
(3, 'Bos'),
(4, 'Keuangan'),
(5, 'SECURITY'),
(6, 'BABAT RUMPUT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `menu_engg` varchar(20) NOT NULL,
  `link` varchar(15) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nama_menu`, `menu_engg`, `link`, `icon`, `is_main_menu`) VALUES
(8, 'DATA BARANG', 'INVENTORY', 'Barang', 'ei-business-card', 0),
(10, 'KATEGORI ', 'CATEGORY', 'Kategori', 'ei-diamond', 0),
(11, 'TRANSAKSI', 'TRANSACTION', 'Transaksi', 'ei-money', 0),
(12, 'PENGGUNA', ' USERS', 'User', 'ei-key', 0),
(13, 'SUPLIIER', 'SUPPLIER', 'Suplier', 'ei-office-cart', 0),
(15, 'LAPORAN ', 'REPORT', 'Laporan', 'ei-bank', 0),
(16, 'PEMBELIAN', 'PURCHASE', 'Pembelian', 'ei-shopping-cart-ful', 11),
(17, 'PENJUALAN', 'SALES', 'Penjualan', 'ei-deviantart', 11),
(20, 'Menu', 'Menu', 'Menu', 'ei-menu-7', 0),
(21, 'Dokumentasi', 'Documentation', 'Dokumentasi', 'ei-speech-box-text', 0),
(22, 'Sistem Cerdas', 'Smart System', 'Cerdas', 'ei-smartphone-msg', 0),
(23, 'Grafik Laporan', 'Report graph', 'Grafik', 'ei-bar-chart', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `tanggal_beli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_faktur` int(11) NOT NULL,
  `total_beli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`tanggal_beli`, `no_faktur`, `total_beli`) VALUES
('2018-03-13 17:25:02', 493, 50),
('2018-03-13 17:25:09', 494, 50),
('2018-06-03 15:52:17', 514, 50),
('2018-06-03 16:02:52', 516, 50),
('2018-06-03 16:03:00', 517, 50),
('2018-06-04 02:13:11', 518, 1),
('2018-06-04 02:32:36', 519, 1),
('2018-06-05 03:38:06', 520, 1),
('2018-06-08 08:54:57', 521, 1),
('2018-06-08 08:55:19', 522, 17),
('2018-06-08 08:56:15', 523, 1),
('2018-06-08 09:07:46', 524, 3),
('2018-06-08 09:07:59', 525, 1),
('2018-06-08 09:23:07', 526, 4),
('2018-06-08 09:23:21', 527, 1),
('2018-06-08 09:24:11', 528, 1),
('2018-06-08 09:24:18', 529, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `satuan`) VALUES
(2, 'Bungkus'),
(3, 'kardus'),
(4, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` text,
  `alamat` varchar(35) DEFAULT NULL,
  `No_telpon` varchar(13) DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`id_suplier`, `nama_suplier`, `alamat`, `No_telpon`, `keterangan`) VALUES
(1, 'toko jakarta selatan', 'jakarta selatan', '08963889862', 'ddsdsdsdsds                            '),
(3, 'toko jakarta barat', 'jakarta', '089638889862', 'jakarta                            ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `id_level_user`, `foto`, `nama_lengkap`) VALUES
(1, 'andihoerudin', 'andihoerudin', 1, '', 'andihoerudin'),
(21, 'andi', 'andi', 3, 'admin1.PNG', 'andi'),
(22, 'ipong', 'ipong', 5, '', 'ipong'),
(23, 'ani', 'ani', 4, '', 'ANI'),
(24, 'pandu', 'pandu', 2, '', 'pandu'),
(25, 'josua', 'josua', 3, '', 'josua');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rule`
--

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_rule`
--

INSERT INTO `tbl_user_rule` (`id_rule`, `id_menu`, `id_level_user`) VALUES
(1, 12, 1),
(3, 10, 1),
(4, 11, 1),
(5, 13, 1),
(6, 14, 1),
(7, 15, 1),
(8, 15, 4),
(9, 8, 4),
(10, 8, 1),
(11, 16, 1),
(12, 11, 4),
(13, 17, 1),
(14, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 21, 3),
(23, 15, 3),
(28, 22, 1),
(29, 23, 1),
(30, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_transaksi` int(11) NOT NULL,
  `no_faktur` varchar(200) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `detail` int(11) NOT NULL,
  `jumlah_uang` double NOT NULL,
  `total_belanja` double NOT NULL,
  `uang_kembali` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`id_transaksi`, `no_faktur`, `kd_barang`, `status`, `detail`, `jumlah_uang`, `total_belanja`, `uang_kembali`) VALUES
(16, '492', 'BR001', 1, 1, 2300000, 1725000, 575000),
(17, '493', 'BR002', 1, 1, 2300000, 1725000, 575000),
(18, '494', 'BR003', 1, 1, 2300000, 1725000, 575000),
(19, '495', 'BR005', 1, 1, 2300000, 1725000, 575000),
(21, '497', 'BR001', 1, 1, 90000, 7000, 83000),
(22, '498', 'BR001', 1, 1, 8000, 7000, 1000),
(26, '502', 'BR007', 1, 1, 20000, 10000, 10000),
(28, '508', 'BR002', 1, 1, 25000, 18000, 7000),
(29, '509', 'BR002', 1, 1, 20000, 18000, 2000),
(30, '512', 'BR021', 1, 1, 50000, 40500, 9500),
(31, '513', 'BR022', 1, 1, 50000, 40500, 9500),
(32, '514', 'BR024', 1, 1, 50000, 40500, 9500),
(33, '515', 'br023', 1, 1, 20000, 10000, 10000),
(34, '516', 'br025', 1, 1, 20000, 10000, 10000),
(35, '517', 'br027', 1, 1, 20000, 10000, 10000),
(36, '518', 'BR021', 1, 1, 50000, 1000, 49000),
(37, '519', 'BR027', 1, 1, 34999, 11500, 23499),
(42, '524', 'BR013', 1, 1, 34999, 11500, 23499),
(43, '525', 'BR012', 1, 1, 34999, 11500, 23499),
(46, '528', 'BR012', 1, 1, 9000, 8000, 1000),
(47, '529', 'BR013', 1, 1, 9000, 8000, 1000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang`
-- (See below for the actual view)
--
CREATE TABLE `v_barang` (
`kd_barang` varchar(11)
,`nama_barang` text
,`nama_kategori` varchar(15)
,`stok_barang` int(11)
,`stok_minimal` int(11)
,`harga_jual` double
,`satuan` varchar(20)
,`harga_pokok` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laba`
-- (See below for the actual view)
--
CREATE TABLE `v_laba` (
`total_belanja` double
,`tanggal_beli` timestamp
,`id_transaksi` int(11)
,`kd_barang` varchar(15)
,`nama_barang` text
,`Satuan` varchar(20)
,`harga_jual` double
,`harga_pokok` double
,`total_beli` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi` (
`status` int(11)
,`jumlah_uang` double
,`total_belanja` double
,`uang_kembali` double
,`id_transaksi` int(11)
,`kd_barang` varchar(15)
,`nama_barang` text
,`Satuan` varchar(20)
,`harga_jual` double
,`total_beli` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_detail`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi_detail` (
`jumlah_uang` double
,`total_belanja` double
,`uang_kembali` double
,`detail` int(11)
,`id_transaksi` int(11)
,`kd_barang` varchar(15)
,`nama_barang` text
,`Satuan` varchar(20)
,`harga_jual` double
,`total_beli` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_laporan_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi_laporan_penjualan` (
`nama_kategori` varchar(15)
,`tanggal_beli` timestamp
,`jumlah_uang` double
,`total_belanja` double
,`uang_kembali` double
,`id_transaksi` int(11)
,`kd_barang` varchar(15)
,`nama_barang` text
,`Satuan` varchar(20)
,`harga_jual` double
,`total_beli` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`id_user` int(11)
,`username` varchar(30)
,`password` varchar(20)
,`id_level_user` int(11)
,`foto` text
,`nama_lengkap` varchar(30)
,`nama_level` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `v_barang`
--
DROP TABLE IF EXISTS `v_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang`  AS  select `tb`.`kd_barang` AS `kd_barang`,`tb`.`nama_barang` AS `nama_barang`,`tk`.`nama_kategori` AS `nama_kategori`,`tb`.`stok_barang` AS `stok_barang`,`tb`.`stok_minimal` AS `stok_minimal`,`tb`.`harga_jual` AS `harga_jual`,`ts`.`satuan` AS `satuan`,`tb`.`harga_pokok` AS `harga_pokok` from ((`tbl_barang` `tb` join `tbl_kategori` `tk`) join `tbl_satuan` `ts`) where ((`tb`.`id_kategori` = `tk`.`id_kategori`) and (`ts`.`id_satuan` = `tb`.`barang_satuan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_laba`
--
DROP TABLE IF EXISTS `v_laba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laba`  AS  select `tpl`.`total_belanja` AS `total_belanja`,`tp`.`tanggal_beli` AS `tanggal_beli`,`tpl`.`id_transaksi` AS `id_transaksi`,`tpl`.`kd_barang` AS `kd_barang`,`tb`.`nama_barang` AS `nama_barang`,`ts`.`satuan` AS `Satuan`,`tb`.`harga_jual` AS `harga_jual`,`tb`.`harga_pokok` AS `harga_pokok`,`tp`.`total_beli` AS `total_beli` from (((`transaksi_pembelian` `tpl` join `tbl_barang` `tb`) join `tbl_pembeli` `tp`) join `tbl_satuan` `ts`) where ((`tpl`.`kd_barang` = `tb`.`kd_barang`) and (`tpl`.`no_faktur` = `tp`.`no_faktur`) and (`tb`.`barang_satuan` = `ts`.`id_satuan`) and (`tpl`.`status` = 1)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `tpl`.`status` AS `status`,`tpl`.`jumlah_uang` AS `jumlah_uang`,`tpl`.`total_belanja` AS `total_belanja`,`tpl`.`uang_kembali` AS `uang_kembali`,`tpl`.`id_transaksi` AS `id_transaksi`,`tpl`.`kd_barang` AS `kd_barang`,`tb`.`nama_barang` AS `nama_barang`,`ts`.`satuan` AS `Satuan`,`tb`.`harga_jual` AS `harga_jual`,`tp`.`total_beli` AS `total_beli` from (((`transaksi_pembelian` `tpl` join `tbl_barang` `tb`) join `tbl_pembeli` `tp`) join `tbl_satuan` `ts`) where ((`tpl`.`kd_barang` = `tb`.`kd_barang`) and (`tpl`.`no_faktur` = `tp`.`no_faktur`) and (`tb`.`barang_satuan` = `ts`.`id_satuan`) and (`tpl`.`status` = 0)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_detail`
--
DROP TABLE IF EXISTS `v_transaksi_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_detail`  AS  select `tpl`.`jumlah_uang` AS `jumlah_uang`,`tpl`.`total_belanja` AS `total_belanja`,`tpl`.`uang_kembali` AS `uang_kembali`,`tpl`.`detail` AS `detail`,`tpl`.`id_transaksi` AS `id_transaksi`,`tpl`.`kd_barang` AS `kd_barang`,`tb`.`nama_barang` AS `nama_barang`,`ts`.`satuan` AS `Satuan`,`tb`.`harga_jual` AS `harga_jual`,`tp`.`total_beli` AS `total_beli` from (((`transaksi_pembelian` `tpl` join `tbl_barang` `tb`) join `tbl_pembeli` `tp`) join `tbl_satuan` `ts`) where ((`tpl`.`kd_barang` = `tb`.`kd_barang`) and (`tpl`.`no_faktur` = `tp`.`no_faktur`) and (`tb`.`barang_satuan` = `ts`.`id_satuan`) and (`tpl`.`detail` = 0)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_laporan_penjualan`
--
DROP TABLE IF EXISTS `v_transaksi_laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_laporan_penjualan`  AS  select `tk`.`nama_kategori` AS `nama_kategori`,`tp`.`tanggal_beli` AS `tanggal_beli`,`tpl`.`jumlah_uang` AS `jumlah_uang`,`tpl`.`total_belanja` AS `total_belanja`,`tpl`.`uang_kembali` AS `uang_kembali`,`tpl`.`id_transaksi` AS `id_transaksi`,`tpl`.`kd_barang` AS `kd_barang`,`tb`.`nama_barang` AS `nama_barang`,`ts`.`satuan` AS `Satuan`,`tb`.`harga_jual` AS `harga_jual`,`tp`.`total_beli` AS `total_beli` from ((((`transaksi_pembelian` `tpl` join `tbl_barang` `tb`) join `tbl_kategori` `tk`) join `tbl_pembeli` `tp`) join `tbl_satuan` `ts`) where ((`tpl`.`kd_barang` = `tb`.`kd_barang`) and (`tpl`.`no_faktur` = `tp`.`no_faktur`) and (`tb`.`barang_satuan` = `ts`.`id_satuan`) and (`tb`.`id_kategori` = `tk`.`id_kategori`) and (`tpl`.`status` = 1) and (`tpl`.`detail` = 1)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  select `tu`.`id_user` AS `id_user`,`tu`.`username` AS `username`,`tu`.`password` AS `password`,`tu`.`id_level_user` AS `id_level_user`,`tu`.`foto` AS `foto`,`tu`.`nama_lengkap` AS `nama_lengkap`,`tl`.`nama_level` AS `nama_level` from (`tbl_user` `tu` join `tbl_level_user` `tl`) where (`tu`.`id_level_user` = `tl`.`id_level_user`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_beli_suplier`
--
ALTER TABLE `tbl_beli_suplier`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
