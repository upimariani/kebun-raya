-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2023 pada 10.07
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

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
-- Struktur dari tabel `tbl_chatting`
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
-- Dumping data untuk tabel `tbl_chatting`
--

INSERT INTO `tbl_chatting` (`id_chatting`, `id_wisatawan`, `id_user`, `pelanggan_send`, `staff_send`, `time`) VALUES
(1, 1, 1, 'halo admin', NULL, '2023-07-04 01:19:02'),
(2, 1, 1, NULL, 'halo syarifah', '2023-07-04 04:23:31'),
(3, 1, 1, NULL, 'Ada yg bisa saya bantu?', '2023-07-04 04:25:52'),
(4, 1, 1, 'Kalau hari minggu buka tidak kak?', NULL, '2023-07-04 04:27:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_po_tiket`
--

CREATE TABLE `tbl_detail_po_tiket` (
  `id_detail` int(11) NOT NULL,
  `id_po_tiket` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_po_tiket`
--

INSERT INTO `tbl_detail_po_tiket` (`id_detail`, `id_po_tiket`, `id_tiket`, `qty`) VALUES
(1, 1, 4, 1),
(2, 1, 5, 1),
(3, 2, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_diskon`
--

CREATE TABLE `tbl_diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `nama_diskon` varchar(20) NOT NULL,
  `diskon` varchar(20) NOT NULL,
  `stat_member` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_diskon`
--

INSERT INTO `tbl_diskon` (`id_diskon`, `id_tiket`, `nama_diskon`, `diskon`, `stat_member`) VALUES
(4, 4, '0', '0', '0'),
(5, 4, 'Sale of day!', '5', '1'),
(6, 5, '0', '0', '0'),
(7, 5, '0', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Tiket Bundling'),
(3, 'Tiket Upselling');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_po_tiket`
--

CREATE TABLE `tbl_po_tiket` (
  `id_po_tiket` int(11) NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `tgl_po_tiket` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `status_order` int(11) NOT NULL,
  `stat_bayar` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `tgl_boking` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_po_tiket`
--

INSERT INTO `tbl_po_tiket` (`id_po_tiket`, `id_wisatawan`, `tgl_po_tiket`, `total_bayar`, `status_order`, `stat_bayar`, `bukti_bayar`, `tgl_boking`) VALUES
(1, 1, '2023-07-04', '54100', 1, 1, 'sd2.jpeg', '2023-07-08'),
(2, 1, '2023-07-03', '90000', 0, 0, '0', '2023-07-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tiket`
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
-- Dumping data untuk tabel `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`id_tiket`, `id_kategori`, `nama_tiket`, `deskripsi`, `harga`, `gambar`) VALUES
(4, 2, 'Family', 'tiket ini berlaku untuk 4 orang', '38000', 'tiket.png'),
(5, 3, 'Couple', 'tiket ini berlaku untuk 2 orang', '18000', 'tiket.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ulasan`
--

CREATE TABLE `tbl_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_po_tiket` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `alamat_user`, `no_hp_user`, `username_user`, `password_user`, `level_user`) VALUES
(1, 'Staff', 'Kuningan', '089987656543', 'staff', 'staff', 1),
(2, 'Pengelola', 'Kuningan', '085123221232', 'pengelola', 'pengelola', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wisatawan`
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
-- Dumping data untuk tabel `tbl_wisatawan`
--

INSERT INTO `tbl_wisatawan` (`id_wisatawan`, `nama_wisatawan`, `no_hp_wisatawan`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jk`, `member`, `username`, `password`) VALUES
(1, 'Syarifah', '089876545676', 'Alamat kuningan RT. 08 RW. 3', 'Kuningan', '2015-02-10', 'Perempuan', 1, 'syarifah', 'syarifah'),
(2, 'Ahmad', '089887654543', 'Purwawinangun', 'Kuningan', '2015-06-16', 'Laki - Laki', 0, 'ahmad', 'ahmad');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `tbl_detail_po_tiket`
--
ALTER TABLE `tbl_detail_po_tiket`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_po_tiket`
--
ALTER TABLE `tbl_po_tiket`
  ADD PRIMARY KEY (`id_po_tiket`);

--
-- Indeks untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_wisatawan`
--
ALTER TABLE `tbl_wisatawan`
  ADD PRIMARY KEY (`id_wisatawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_po_tiket`
--
ALTER TABLE `tbl_detail_po_tiket`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_po_tiket`
--
ALTER TABLE `tbl_po_tiket`
  MODIFY `id_po_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_wisatawan`
--
ALTER TABLE `tbl_wisatawan`
  MODIFY `id_wisatawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
