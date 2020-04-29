-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2020 pada 07.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nursery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bunga`
--

CREATE TABLE `bunga` (
  `id_bunga` int(4) NOT NULL,
  `id_kategori` varchar(4) NOT NULL,
  `nama_bunga` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `foto_bunga` varchar(20) DEFAULT NULL,
  `video_bunga` varchar(50) DEFAULT NULL,
  `cara_perawatan` varchar(500) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bunga`
--

INSERT INTO `bunga` (`id_bunga`, `id_kategori`, `nama_bunga`, `harga`, `stok`, `foto_bunga`, `video_bunga`, `cara_perawatan`, `deskripsi`) VALUES
(1, '1', 'krisan spray', 10000, 57, '5e3a67bb8b7fb.jpg', 'https://www.youtube.com/watch?v=4bfUx2xMpwc', '1. Pilih tanaman yang sehat. 2. Pindahkan bunga krisan ke pot yang baru. 3. Sirami bunga krisan secukupnya tetapi jangan sampai airnya menggenang.4. Jauhkan bunga krisan dari lampu jalan atau cahaya buatan di malam hari. 5. Berikan pupuk beberapa kali dalam setahun.', 'Bunga Krisan adalah sejenis tumbuhan berbunga yang sering ditanam sebagai tanaman hias pekarangan atau bunga petik. Tumbuhan berbunga ini mulai muncul pada zaman Kapur.'),
(2, '4', 'Anggrek Bulan Lokal', 130000, 36, '5e3a6296aa8d2.jpg', 'https://www.youtube.com/embed/eBpDI_Yij2k', 'Disiram 2 klai sehari, pagi dan sore', 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia. Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek. Bagian daun dan batangnya yang tebal dan berdaging menyimpan cukup banyak air untuk dapat bertahan hidup'),
(3, '3', 'Mawar Jingga', 25000, 50, '5e3aaa9646f81.jpg', '-', 'Disiram tiap pagi dan sore', 'Mawar adalah suatu jenis tanaman semak dari genus Rosa sekaligus nama bunga yang dihasilkan tanaman ini. Mawar liar terdiri dari 100 spesies lebih, kebanyakan tumbuh di belahan bumi utara yang berudara sejuk. Spesies mawar umumnya merupakan tanaman semak yang berduri atau tanaman memanjat yang tingginya bisa mencapai 2 sampai 5 meter. Walaupun jarang ditemui, tinggi tanaman mawar yang merambat di tanaman lain bisa mencapai 20 meter.'),
(4, '2', 'Kaktus Hias Mini', 25000, 100, '5e3aab115241e.jpg', 'https://www.youtube.com/watch?v=f-n1BNx5AIo', 'Disiram secukupnnya', 'Kaktus adalah nama yang diberikan untuk anggota tumbuhan berbunga famili Cactaceae. Kaktus dapat tumbuh pada waktu yang lama tanpa air. Kaktus biasa ditemukan di daerah-daerah yang kering (gurun). Kata jamak untuk kaktus adalah kakti. Kaktus memiliki akar yang panjang untuk mencari air dan memperlebar penyerapan air dalam tanah. Air yang diserap kaktus disimpan dalam ruang di batangnya.'),
(5, '1', 'Krisan Standart', 15000, 7000, '5e3a5fb1a0398.jpg', 'https://www.youtube.com/watch?v=ezxjZQvH6f0', '1. Pilih tanaman yang sehat.  2. Pindahkan bunga krisan ke pot yang baru.  3. Sirami bunga krisan secukupnya tetapi jangan sampai airnya menggenang. 4. Jauhkan bunga krisan dari lampu jalan atau cahaya buatan di malam hari.  5. Berikan pupuk beberapa kali dalam setahun.', 'Bunga Krisan adalah sejenis tumbuhan berbunga yang sering ditanam sebagai tanaman hias pekarangan atau bunga petik. Tumbuhan berbunga ini mulai muncul pada zaman Kapur.'),
(6, '4', 'Anggrek Bulan Taiwan', 150000, 60, '5e3a627512e6c.png', 'https://www.youtube.com/watch?v=J0LxcFs1nVM', 'siram bunga 2 kali sehari, pagi dan sore.', 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia. Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek. Bagian daun dan batangnya yang tebal dan berdaging menyimpan cukup banyak air untuk dapat bertahan hidup'),
(7, '4', 'Anggrek Cattlea', 120000, 68, '5e3ae0ef5751c.jpg', 'https://www.youtube.com/watch?v=n2CRlrmwKt8', 'siram bunga 2 kali sehari, pagi dan sore.', 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia. Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek. Bagian daun dan batangnya yang tebal dan berdaging menyimpan cukup banyak air untuk dapat bertahan hidup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(4) NOT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`, `gambar_kategori`) VALUES
('1', 'Krisan', 'Seruni atau krisantemum (kadang disebut sebagai krisan atau serunai) adalah sejenis tumbuhan berbunga yang sering ditanam sebagai tanaman hias pekarangan atau bunga petik. Tumbuhan berbunga ini mulai muncul pada zaman Kapur.', '5e3aac17a6e2e.jpg'),
('2', 'Kaktus', 'Kaktus adalah nama yang diberikan untuk anggota tumbuhan berbunga famili Cactaceae. Kaktus dapat tumbuh pada waktu yang lama tanpa air. Kaktus biasa ditemukan di daerah-daerah yang kering (gurun). Kata jamak untuk kaktus adalah kakti. Kaktus memiliki akar yang panjang untuk mencari air dan memperlebar penyerapan air dalam tanah. Air yang diserap kaktus disimpan dalam ruang di batangnya.', '5e3aacaed3650.jpg'),
('3', 'Mawar', 'Mawar adalah suatu jenis tanaman semak dari genus Rosa sekaligus nama bunga yang dihasilkan tanaman ini. Mawar liar terdiri dari 100 spesies lebih, kebanyakan tumbuh di belahan bumi utara yang berudara sejuk. Spesies mawar umumnya merupakan tanaman semak yang berduri atau tanaman memanjat yang tingginya bisa mencapai 2 sampai 5 meter. Walaupun jarang ditemui, tinggi tanaman mawar yang merambat di tanaman lain bisa mencapai 20 meter.', '5e3aacffaac6f.jpg'),
('4', 'Anggrek', 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia. Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek. Bagian daun dan batangnya yang tebal dan berdaging menyimpan cukup banyak air untuk dapat bertahan hidup.', '5e3aac4b0fc58.jpg'),
('5', 'Melati', 'Melati putih atau Jasminum sambac adalah spesies melati yang berasal dari Asia selatan (di India, Myanmar dan Sri Lanka. Penyebaranya dimulai dari Hindustan ke Indocina, lalu Kepulauan Melayu. Bunga ini menjadi satu dari tiga bunga nasional Indonesia (sebagai &quot;Puspa Bangsa&quot;). Bunga ini juga menjadi bunga nasional Filipina.  Melati putih tumbuh di pekarangan dan dapat digunakan sebagai tanaman pagar. Ketinggiannya dapat mencapai 2 meter.', '5e3aae681ee40.jpg'),
('6', 'Bunga Daun', 'Tanaman hias daun adalah Salah satu kategori atau jenis tanaman hias yang menitik beratkan keindahan atau kecantikan pada daun. Baik itu bentuk maupun warna.   Jika kita berpegangan pada pengertian tanaman hias daun diatas, Maka kita bisa tahu bahwa jenis tanaman hias ini akan cenderung mengandalkan daya tarik dari daunnya.', '5e3aaf5fde9ca.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `Status`) VALUES
(1, 'Admin'),
(2, 'Justiper'),
(3, 'Konsumen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `waktubuat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `aktivasi` int(11) NOT NULL,
  `waktu_pembuatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `jenis_kelamin`, `no_telepon`, `alamat`, `password`, `foto`, `status`, `aktivasi`, `waktu_pembuatan`) VALUES
(24, 'Idris', 'idristifa@gmail.com', 'L', '5555555', '', '$2y$10$mFuDhuhM4n1SaijHAt1fvOMEn53RYRtKoZwEN2o35IICKUXdMARu.', 'default.jpg', 2, 1, 1587562093),
(27, 'ridho', 'ridho@gmail.com', 'L', '55555557', '', '$2y$10$qsgSPllzBCvKni8WN2CaiuBy5HyWy5DX6HWIvhOf/vm9RF.n2lS/K', 'default.jpg', 2, 1, 1587655426);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bunga`
--
ALTER TABLE `bunga`
  ADD PRIMARY KEY (`id_bunga`),
  ADD KEY `FK_MEMILIKI1` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
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
-- AUTO_INCREMENT untuk tabel `bunga`
--
ALTER TABLE `bunga`
  MODIFY `id_bunga` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
