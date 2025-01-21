-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2024 pada 07.08
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
-- Database: `ahp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '1234', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`) VALUES
(46, 'a7'),
(45, 'a6'),
(41, 'a2'),
(42, 'a3'),
(43, 'a4'),
(44, 'a5'),
(40, 'a1'),
(47, 'a8'),
(48, 'a9'),
(49, 'a10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(45, 'Jumlah Tanggungan'),
(43, 'Penghasilan'),
(44, 'Kepemilikan Rumah'),
(42, 'Pekerjaan'),
(46, 'Usia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id` int(11) NOT NULL,
  `alternatif1` int(11) NOT NULL,
  `alternatif2` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`id`, `alternatif1`, `alternatif2`, `pembanding`, `nilai`) VALUES
(349, 46, 42, 42, 1),
(348, 42, 46, 42, 1),
(347, 45, 42, 42, 1),
(346, 42, 45, 42, 1),
(379, 49, 42, 42, 1),
(378, 42, 49, 42, 1),
(377, 48, 42, 42, 1),
(376, 42, 48, 42, 1),
(375, 47, 42, 42, 1),
(374, 42, 47, 42, 1),
(373, 49, 41, 42, 1),
(372, 41, 49, 42, 1),
(409, 49, 48, 42, 1),
(408, 48, 49, 42, 1),
(345, 44, 42, 42, 1),
(344, 42, 44, 42, 1),
(371, 48, 41, 42, 0.5),
(370, 41, 48, 42, 2),
(369, 47, 41, 42, 1),
(368, 41, 47, 42, 1),
(407, 49, 47, 42, 1),
(406, 47, 49, 42, 1),
(405, 48, 47, 42, 1),
(404, 47, 48, 42, 1),
(403, 49, 46, 42, 1),
(402, 46, 49, 42, 1),
(343, 43, 42, 42, 1),
(342, 42, 43, 42, 1),
(367, 49, 40, 42, 1),
(366, 40, 49, 42, 1),
(365, 48, 40, 42, 1),
(364, 40, 48, 42, 1),
(401, 48, 46, 42, 1),
(400, 46, 48, 42, 1),
(399, 47, 46, 42, 1),
(398, 46, 47, 42, 1),
(397, 49, 45, 42, 1),
(396, 45, 49, 42, 1),
(341, 46, 41, 42, 0.5),
(340, 41, 46, 42, 2),
(363, 47, 40, 42, 1),
(362, 40, 47, 42, 1),
(361, 46, 45, 42, 1),
(360, 45, 46, 42, 1),
(395, 48, 45, 42, 1),
(394, 45, 48, 42, 1),
(393, 47, 45, 42, 1),
(392, 45, 47, 42, 1),
(391, 49, 44, 42, 1),
(390, 44, 49, 42, 1),
(389, 48, 44, 42, 1),
(388, 44, 48, 42, 1),
(359, 46, 44, 42, 1),
(358, 44, 46, 42, 1),
(339, 45, 41, 42, 1),
(338, 41, 45, 42, 1),
(329, 45, 40, 42, 0.333333),
(328, 40, 45, 42, 3),
(387, 47, 44, 42, 1),
(386, 44, 47, 42, 1),
(357, 45, 44, 42, 1),
(356, 44, 45, 42, 1),
(337, 44, 41, 42, 1),
(336, 41, 44, 42, 1),
(327, 44, 40, 42, 0.5),
(326, 40, 44, 42, 2),
(385, 49, 43, 42, 1),
(384, 43, 49, 42, 1),
(355, 46, 43, 42, 0.25),
(354, 43, 46, 42, 4),
(335, 43, 41, 42, 1),
(334, 41, 43, 42, 1),
(325, 43, 40, 42, 0.25),
(324, 40, 43, 42, 4),
(383, 48, 43, 42, 0.333333),
(382, 43, 48, 42, 3),
(353, 45, 43, 42, 1),
(352, 43, 45, 42, 1),
(333, 42, 41, 42, 1),
(332, 41, 42, 42, 1),
(323, 42, 40, 42, 0.5),
(322, 40, 42, 42, 2),
(381, 47, 43, 42, 0.333333),
(380, 43, 47, 42, 3),
(351, 44, 43, 42, 0.333333),
(350, 43, 44, 42, 3),
(331, 46, 40, 42, 1),
(330, 40, 46, 42, 1),
(321, 41, 40, 42, 0.333333),
(320, 40, 41, 42, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(54, 45, 43, 1),
(44, 43, 42, 1),
(48, 45, 42, 1),
(47, 42, 45, 1),
(53, 43, 45, 1),
(62, 46, 45, 1),
(52, 44, 43, 1),
(61, 45, 46, 1),
(60, 46, 44, 1),
(59, 44, 46, 1),
(58, 45, 44, 1),
(57, 44, 45, 1),
(56, 46, 43, 1),
(55, 43, 46, 1),
(51, 43, 44, 1),
(50, 46, 42, 1),
(49, 42, 46, 1),
(46, 44, 42, 1),
(45, 42, 44, 1),
(43, 42, 43, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pv_alternatif`
--

CREATE TABLE `pv_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pv_alternatif`
--

INSERT INTO `pv_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(140, 49, 42, 0.0915899),
(139, 48, 42, 0.0805404),
(138, 47, 42, 0.0850858),
(137, 46, 42, 0.0797274),
(136, 45, 42, 0.0819513),
(135, 44, 42, 0.0778569),
(134, 43, 42, 0.149611),
(133, 42, 42, 0.084361),
(132, 41, 42, 0.0967865),
(131, 40, 42, 0.17249);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`id_kriteria`, `nilai`) VALUES
(44, 0.2),
(43, 0.2),
(42, 0.2),
(45, 0.2),
(46, 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ranking`
--

CREATE TABLE `ranking` (
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT untuk tabel `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
