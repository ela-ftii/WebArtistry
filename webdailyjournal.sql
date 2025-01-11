-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2025 pada 06.37
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
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Blog Website', 'Blog website yang menjelajahi keindahan dan keajaiban hutan! Di sini, kami menjelajahi beragam aspek hutan, mulai dari keanekaragaman hayati yang menakjubkan, manfaat ekologis, hingga petualangan luar ruang yang seru. ', 'LA.png', '2024-12-23', 'admin'),
(2, 'Poster', 'Poster film \"Go Yoonjung\" ini dengan cerdas memadukan estetika visual yang memukau dan pesan inspiratif untuk mengajak penonton bergabung dalam petualangan seorang wanita muda yang penuh karakter.\r\n', 'gyj.png', '2024-12-03', 'admin'),
(3, 'Website Entertaintment', 'Serena, sosok wanita dengan pesona visual yang luar biasa, menjadi salah satu karakter utama yang menarik perhatian dalam dunia webtoon. ', 'SERENA.png', '2024-12-23', 'admin'),
(4, 'Blog Semarang', 'Blog Semarng menyajikan perjalanan visual melalui ulasan tour bersejarah dan galeri seni. Pembaca dapat menjelajahi sudut tersembunyi kota, mengungkap kisah monumen dan karya kreatif.', 'semarang.png', '2024-12-23', 'admin'),
(5, 'Poster Promosi Jualan', 'keyboard ini menawarkan pengalaman produktivitas dan hiburan yang tak tertandingi. Nikmati keunggulan fitur-fitur terkini ini dan tingkatkan performa Anda di segala aktivitas, dari pekerjaan hingga game, dengan keyboard canggih terbaru ini.', 'KEYBOARD.PNG', '2024-12-23', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` text NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `tanggal`, `gambar`, `username`) VALUES
(1, '2025-01-08', '20250108153310.jpg', 'user'),
(2, '2025-01-08', '20250108153353.png', 'user'),
(3, '2025-01-08', '20250108154915.jpg', 'user'),
(4, '2025-01-08', '20250108155034.png', 'user'),
(5, '2025-01-08', '20250108155103.png', 'user'),
(6, '2025-01-08', '20250108155114.png', 'user'),
(7, '2025-01-08', '20250108155134.png', 'user'),
(8, '2025-01-10', '20250110145431.jpeg', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', ''),
(2, 'user', '6ad14ba9986e3615423dfca256d04e3f', 'Screenshot 2024-11-09 150516.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
