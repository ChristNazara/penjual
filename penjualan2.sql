-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Okt 2025 pada 11.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kodebarang` char(10) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `merek` varchar(20) DEFAULT NULL,
  `hargabeli` double DEFAULT NULL,
  `hargajual` double DEFAULT NULL,
  `stock` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `merek`, `hargabeli`, `hargajual`, `stock`) VALUES
('B001', 'Keyboard', 'Logitec', 40000, 45000, 15),
('B002', 'Mouse', 'Eyota', 25000, 30000, 13),
('B003', 'Monitor  19 Inch', 'Lg', 1000000, 120000, 15),
('B004', 'Vga Nvidia gt210', 'Asus', 500000, 550000, 17),
('B005', 'Sond Card', 'Asrock', 100000, 130000, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kodepelanggan` char(10) NOT NULL,
  `namapelanggan` varchar(30) NOT NULL,
  `nohp` int(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`kodepelanggan`, `namapelanggan`, `nohp`, `alamat`) VALUES
('P001', 'Abdul', 945353, 'Cendana'),
('P002', 'Rahmat', 45353, 'Parak Gadang'),
('P003', 'Sari', 3533, 'Kolam Indah'),
('P004', 'Ryo', 34924, 'Parak Laweh'),
('P005', 'Dewanto', 57435, 'Jundul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `kodepemasok` char(10) NOT NULL,
  `namapemasok` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelp` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`kodepemasok`, `namapemasok`, `alamat`, `notelp`) VALUES
('S001', 'PT Bersatu', 'Tabing', 535205),
('S002', 'Indocom', 'Jln  Proklamasi', 535353),
('S003', 'PT King Komputer', 'Jln Sudirman', 353535),
('S004', 'Kharisma Komputer', 'Jln Chokroaminoto', 353533),
('S005', 'J Pc', 'Lubuk Buaya', 353535);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempbeli`
--

CREATE TABLE `tempbeli` (
  `idbarang` char(10) NOT NULL,
  `qty` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `diskon` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) DEFAULT NULL,
  `hakakses` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `hakakses`) VALUES
(667, 'dioalparino97', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(669, 'net123', '3fde6bb0541387e4ebdadf7c2ff31123', 'Pegawai'),
(670, 'lex456', 'fa371dd1c1c7f265c9e399c57e3f7d20', 'Kasir'),
(671, 'aladin232', 'cb9de17eebbe2f41effeee286260af2b', 'User'),
(672, 'Dg34xc', 'aa23ab90a549b4322bc28b016d9ab043', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kodepelanggan`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`kodepemasok`);

--
-- Indeks untuk tabel `tempbeli`
--
ALTER TABLE `tempbeli`
  ADD KEY `idbarang` (`idbarang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=673;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tempbeli`
--
ALTER TABLE `tempbeli`
  ADD CONSTRAINT `tempbeli_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`kodebarang`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
