-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2026 pada 11.57
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
-- Database: `perpustakaan_digital`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori`, `jumlah`) VALUES
(1, 'Pemrograman PHP Dasarrr', 'Budi Santoso', 'Informatika', '2022', 'Pemrograman', 1),
(2, 'Belajar CodeIgniter', 'Andi Wijaya', 'Elex Media', '2023', 'Web', 4),
(3, 'Dasar-Dasar MySQL', 'Rudi Hartono', 'Informatika', '2021', 'Database', 6),
(4, 'Algoritma dan Struktur Data', 'Dewi Lestari', 'Andi Publisher', '2022', 'Pemrograman', 3),
(5, 'Pemrograman Web', 'Agus Setiawan', 'Gramedia', '2023', 'Web', 8),
(6, 'Belajar PHP CodeIgniter', 'Metrizal', 'Informatika', '2024', 'web', 10),
(7, 'belajar php 2', 'metrizal', 'informatika', '2024', 'web', 10),
(8, 'belajar php 2', 'metrizal', 'informatika', '2024', 'web', 10),
(9, 'Belajar PHP 2', 'Metrizal', 'Informatika', '2024', 'Web', 10),
(20, 'Belajar CodeIgniter 2', 'Metrizal', 'Informatika', '2024', 'Web', 10),
(21, 'dsadsa', 'sdasad', 'dsadsa', '2005', 'sdas', 1),
(22, 'php 222', 'sdadsa', 'dsadsa', '2022', 'sadsa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
