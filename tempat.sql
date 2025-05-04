-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2025 pada 06.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_tempat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(100) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `lokasi`, `deskripsi`) VALUES
(1, 'Theater', 'Lantai 1, Gedung Utama', 'Ruang pertemuan berkapasitas 30 orang, dilengkapi proyektor.'),
(2, 'Aula', 'Lantai 2, Gedung Utama', 'Aula besar untuk seminar dan acara dengan kapasitas 100 orang.'),
(3, 'Lab', 'Lantai 1, Gedung Aula', 'Ruang kelas multimedia dengan komputer dan AC.'),
(4, 'Ruang Diskusi', 'Lantai 3, Perpustakaan', 'Ruang kecil untuk diskusi kelompok, kapasitas 10 orang.'),
(5, 'Ruang Rapat VIP', 'Lantai 2, Gedung Rektorat', 'Ruang rapat eksekutif dengan fasilitas lengkap.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
