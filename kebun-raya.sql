-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 02:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kebun-raya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatting`
--

CREATE TABLE `tbl_chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pelanggan_send` text DEFAULT NULL,
  `staff_send` text DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chatting`
--

INSERT INTO `tbl_chatting` (`id_chatting`, `id_wisatawan`, `id_user`, `pelanggan_send`, `staff_send`, `time`) VALUES
(1, 1, 1, 'halo admin', NULL, '2023-07-04 01:19:02'),
(2, 1, 1, NULL, 'halo syarifah', '2023-07-04 04:23:31'),
(3, 1, 1, NULL, 'Ada yg bisa saya bantu?', '2023-07-04 04:25:52'),
(4, 1, 1, 'Kalau hari minggu buka tidak kak?', NULL, '2023-07-04 04:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_po_tiket`
--

CREATE TABLE `tbl_detail_po_tiket` (
  `id_detail` int(11) NOT NULL,
  `id_po_tiket` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_po_tiket`
--

INSERT INTO `tbl_detail_po_tiket` (`id_detail`, `id_po_tiket`, `id_tiket`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 1, 6),
(4, 3, 1, 2),
(5, 4, 2, 7),
(6, 5, 2, 1),
(7, 6, 4, 3),
(8, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskon`
--

CREATE TABLE `tbl_diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `nama_diskon` varchar(15) NOT NULL,
  `diskon` int(11) NOT NULL,
  `stat_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diskon`
--

INSERT INTO `tbl_diskon` (`id_diskon`, `id_tiket`, `nama_diskon`, `diskon`, `stat_member`) VALUES
(1, 1, '0', 0, 0),
(2, 1, 'Sale', 5, 1),
(3, 2, '0', 0, 0),
(4, 2, '0', 0, 1),
(5, 3, '0', 0, 0),
(6, 3, '0', 0, 1),
(7, 4, '0', 0, 0),
(8, 4, '0', 0, 1),
(9, 5, '0', 0, 0),
(10, 5, '0', 0, 1),
(11, 6, '0', 0, 0),
(12, 6, '0', 0, 1),
(13, 7, '0', 0, 0),
(14, 7, '0', 0, 1),
(15, 8, '0', 0, 0),
(16, 8, '0', 0, 1),
(17, 9, '0', 0, 0),
(18, 9, '0', 0, 1),
(19, 10, '0', 0, 0),
(20, 10, '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Tiket Bundling'),
(3, 'Tiket Upselling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_tiket`
--

CREATE TABLE `tbl_po_tiket` (
  `id_po_tiket` int(11) NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `tgl_po_tiket` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `status_order` int(11) NOT NULL,
  `stat_bayar` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `tgl_boking` varchar(20) NOT NULL,
  `type_po` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_po_tiket`
--

INSERT INTO `tbl_po_tiket` (`id_po_tiket`, `id_wisatawan`, `tgl_po_tiket`, `total_bayar`, `status_order`, `stat_bayar`, `bukti_bayar`, `tgl_boking`, `type_po`) VALUES
(1, 1, '2023-07-25', '71500', 3, 1, 'sd4.jpeg', '2023-07-26', 0),
(2, 1, '2023-07-25', '57000', 3, 1, 'sd5.jpeg', '2023-07-30', 0),
(3, 1, '2023-07-25', '19000', 0, 0, '0', '2023-08-06', 0),
(4, 1, '2023-07-25', '434000', 0, 0, '0', '2023-08-31', 0),
(5, 1, '2023-07-25', '58900', 0, 0, '0', '2023-08-31', 0),
(6, 0, '2023-07-25', '55000', 3, 0, '-', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_tiket` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(20) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`id_tiket`, `id_kategori`, `nama_tiket`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 1, 'Our Life', 'Tiket couple yang berlaku untuk 2 orang', '10000', 'tiket.png'),
(2, 1, 'Tour de Kebun Raya', 'Kapasitas maksimum Tour de Kebun Raya 7 orang/trip. Dapatkan pengalaman baru yang menarik berkeliling Kebun Raya dipandu oleh Tour Guide andalan dengan mengikuti Tour de Kebun Raya.', '62000', 'tiket.png'),
(3, 1, 'Kelas Edukasi', 'Belajar tentang dasar berkebun, cara merawat tanaman hias hingga perbanyakan tanaman bersama praktisi berpengalaman melalui Kelas Edukasi. Kapasitas Kelas edukasi 8 orang', '100000', 'tiket.png'),
(4, 1, 'Paket Weekend', 'paket liburan kapastas maksimum 10 orang', '15000', 'tiket.png'),
(5, 1, 'One People Bast', 'Tiket One people best ever untuk healing, tiket untuk 1 orang', '6000', 'tiket.png'),
(6, 2, 'Study Tour', 'Kebun Raya merupakan salah satu pusat edukasi tumbuhan dan tanaman. Anak-anak dapat mempelajari tentang tumbuhan dan tanaman melalui Paket Study Tour TK-SMA yang tersedia di Kebun Raya. Kapasitas maksimum study tour Kebun Raya Kuningan 30 orang ', '250000', 'tiket.png'),
(7, 3, 'Prewedding Photo', 'Tiket Prewedding Photo untuk photo pranikah, untuk 3 orang ', '30000', 'tiket.png'),
(8, 2, 'Family Vacation', 'Tiket Family Vacation untuk Keluarga, untuk 6 orang', '35000', 'tiket.png'),
(9, 2, 'Double Date', 'Tiket Double Date untuk kencan ganda, untuk 4 orang', '23000', 'tiket.png'),
(10, 2, 'Piknik di Kebun Raya', 'Nikmati suasana piknik bersama orang terkasih dengan melihat keindahan Situ Lurah Kebun Raya Kuningan, tiket ini berlaku untuk 5 Orang ', '50000', 'tiket.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ulasan`
--

CREATE TABLE `tbl_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_po_tiket` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat_user` text NOT NULL,
  `no_hp_user` varchar(15) NOT NULL,
  `username_user` varchar(125) NOT NULL,
  `password_user` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `alamat_user`, `no_hp_user`, `username_user`, `password_user`, `level_user`) VALUES
(1, 'Staff', 'Kuningan', '089987656543', 'staff', 'staff', 1),
(2, 'Pengelola', 'Kuningan', '085123221232', 'pengelola', 'pengelola', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wisatawan`
--

CREATE TABLE `tbl_wisatawan` (
  `id_wisatawan` int(11) NOT NULL,
  `nama_wisatawan` varchar(125) NOT NULL,
  `no_hp_wisatawan` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `member` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wisatawan`
--

INSERT INTO `tbl_wisatawan` (`id_wisatawan`, `nama_wisatawan`, `no_hp_wisatawan`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jk`, `member`, `username`, `password`) VALUES
(1, 'Syarifah', '089987654323', 'Jln. Ahmad Yani RT.07 RW.08 Desa Kalapagunung', 'Kuningan', '23/04/1999', 'Perempuan', 1, 'syarifah', 'syarifah'),
(2, 'Wiwit Walinda', '085559764053', 'Dusun Tanjung Asih RT. 04 RW. 06', ' Ciamis', '03/02/2001', 'Perempuan', 0, 'wiwit', 'wiwit'),
(3, 'Fika fauziah ', '082116620500', 'Dusun sukamulya RT. 06  RW. 03 Desa Raja desa', 'Ciamis', '06/10/2000', 'Perempuan', 0, 'fika', 'fika'),
(4, 'Rahayu', '085738915066', 'RT. 04 RW. 06 Desa Kalikoa Cirebon', 'Cirebon', '30/12/1999', 'Perempuan', 0, 'rahayu', 'rahayu'),
(5, 'Wulandari', '089945360982', 'RT. 06 RW. 05 Desa Singkup', 'Kuningan', '01/07/1998', 'Perempuan', 0, 'wulandari', 'wulandari'),
(6, 'Setiawan', '082143215678', 'RT. 08 RW. 01 Desa Cidahu', 'Kuningan', '08/11/1997', 'laki-laki', 0, 'setiawan', 'setiawan'),
(7, 'Ahmad Santoso', '082145679132', 'RT. 11 RW. 01 Desa Tarikolot Cibeureum Kuningan', 'Kuningan', '07/09/1999', 'laki-laki', 0, 'ahmad', 'ahmad'),
(8, 'Fitriani', '089965437891', 'RT 01 RW. 04 Desa Sukadana', 'Kuningan', '08/03/1999', 'Perempuan', 0, 'fitriani', 'fitriani'),
(9, 'Riska Safitri', '082176892456', 'RT. 02 RW. 07 Desa Pancalang', 'Cirebon', '02/05/2002', 'Perempuan', 0, 'riska', 'riska'),
(10, 'Indra Maulana', '089987614562', 'RT. 01 RW. 03 Desa Cikahalang Cirebon', 'Cirebon', '23/05/2000', 'laki-laki', 0, 'indra', 'indra'),
(11, 'Rizki Rahardiyan', '082145980127', 'RT. 02 RW. 05 Desa Cilayung Kec. Ciwaru Kuningan', 'Kuningan ', '03/07/1999', 'laki-laki', 0, 'rizki', 'rizki'),
(12, 'Siti Sarah', '089925679810', 'RT. 21 RW. 05 Desa Muara Cirebon', 'Cirebon', '01/04/2001', 'Perempuan', 0, 'siti', 'siti'),
(13, 'Desi Puspawati', '089998712350', 'RT. 15 RW. 06 Desa Suranenggala Cirebon', 'Cirebon', '24/06/1999', 'Perempuan', 0, 'desi', 'desi'),
(14, 'Ridwan', '082198011278', 'RT. 06 RW. 03 Desa Karang Reja Cirebon', 'Cirebon', '12/08/1980', 'laki-laki', 0, 'ridwan', 'ridwan'),
(15, 'Andi Maulana ', '082176890912', 'Simpay Jaya RT. 09 RW. 02 Kuningan', 'Kuningan', '19/12/2001', 'laki-laki', 0, 'andi', 'andi'),
(16, 'Lina srimulyani', '085224349019', 'Jl. Ahmad Sodik No. 17  RT. 014 RW. 009 Desa Beber Cirebon', 'Cirebon', '22/09/2000', 'Perempuan', 0, 'lina', 'lina'),
(17, 'Agus', '082176091270', 'RT. 02 RW.04 Desa Cigasong Majalengka', 'Majalengka', '09/03/1999', 'laki-laki', 0, 'agus', 'agus'),
(18, '  ', '089909812379', 'RT. 01 RW.01 Dusun BatuJaya Majalengka', 'Majalengka', '11/10/1999', 'laki-laki', 0, 'heri', 'heri'),
(19, 'Toni ', '082265718901', 'RT. 17 RW. 02 Desa Mandirancan ', 'Kuningan', '27/05/1998', 'laki-laki', 0, 'toni', 'toni'),
(20, 'Abdul Aziz', '089923760981', 'RT. 07 RW. 02 desa Cibentar Majalengka', 'Majalengka', '20/06/2000', 'laki-laki', 0, 'abdul', 'abdul'),
(21, 'Aisyah', '089954217801', 'Desa Trajaya Majalengka RT. 04. RW. 04', 'Majalengka', '01/09/2002', 'Perempuan', 0, 'aisyah', 'aisyah'),
(22, 'Laeli Ramadina', '081313537715', 'Ling. Ciharendong, RT. 08 RW. 03', 'Kuningan', '18/04/2001', 'Perempuan', 0, 'laeli', 'laeli'),
(23, 'Selianti', '089927365416', 'RT. 07 RW. 002 Desa Sayana', 'Kuningan', '11/01/2000', 'Perempuan', 0, 'selianti', 'selianti'),
(24, 'Aris Nugroho', '082176483916', 'RT. 13 RW. 05 Desa Sumbawa', 'Kuningan', '07/03/19999', 'laki-laki', 0, 'aris', 'aris'),
(25, 'M. Ali', '089976482682', 'RT. 10 RW. 05 Desa Raja Danu', 'Kuningan', '29/12/2003', 'laki-laki', 0, 'ali', 'ali'),
(26, 'Setiawati', '089926391074', 'RT. 09 RW 02 Desa Cikaso', 'Kuningan', '16/05/2000', 'Perempuan', 0, 'setiawati', 'setiawati'),
(27, 'Ayu Erlina', '082163574820', '', 'Kuningan', '04/09/2003', 'Perempuan', 0, 'ayu', 'ayu'),
(28, 'Yusuf Iskandar', '089984372915', 'RT. 03 RW. 01 Desa Wanasaya Cirebon', 'Cirebon', '17/07/2000', 'laki-laki', 0, 'yusuf', 'yusuf'),
(29, 'Reza Yulianike', '081779501281', 'RT. 02 RW. 02 Desa Beber Cirebon', 'Cirebon', '21/03/2002', 'Perempuan', 0, 'reza', 'reza'),
(30, 'Anisa Andriyani', '08987978710', 'Desa Cipari RT. 011 RW. 005 ', 'Kuningan.', '08/04/2001', 'Perempuan', 0, 'anisa', 'anisa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indexes for table `tbl_detail_po_tiket`
--
ALTER TABLE `tbl_detail_po_tiket`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_po_tiket`
--
ALTER TABLE `tbl_po_tiket`
  ADD PRIMARY KEY (`id_po_tiket`);

--
-- Indexes for table `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_wisatawan`
--
ALTER TABLE `tbl_wisatawan`
  ADD PRIMARY KEY (`id_wisatawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_detail_po_tiket`
--
ALTER TABLE `tbl_detail_po_tiket`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_po_tiket`
--
ALTER TABLE `tbl_po_tiket`
  MODIFY `id_po_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_wisatawan`
--
ALTER TABLE `tbl_wisatawan`
  MODIFY `id_wisatawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
