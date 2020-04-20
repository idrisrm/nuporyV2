-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 02:58 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

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
-- Table structure for table `bunga`
--

CREATE TABLE `bunga` (
  `id_bunga` varchar(4) NOT NULL,
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
-- Dumping data for table `bunga`
--

INSERT INTO `bunga` (`id_bunga`, `id_kategori`, `nama_bunga`, `harga`, `stok`, `foto_bunga`, `video_bunga`, `cara_perawatan`, `deskripsi`) VALUES
('B001', 'K001', 'krisan spray', 10000, 57, '5e3a67bb8b7fb.jpg', 'https://www.youtube.com/watch?v=4bfUx2xMpwc', '1. Pilih tanaman yang sehat. 2. Pindahkan bunga krisan ke pot yang baru. 3. Sirami bunga krisan secukupnya tetapi jangan sampai airnya menggenang.4. Jauhkan bunga krisan dari lampu jalan atau cahaya buatan di malam hari. 5. Berikan pupuk beberapa kali dalam setahun.', 'Bunga Krisan adalah sejenis tumbuhan berbunga yang sering ditanam sebagai tanaman hias pekarangan atau bunga petik. Tumbuhan berbunga ini mulai muncul pada zaman Kapur.'),
('B002', 'K004', 'Anggrek Bulan Lokal', 130000, 36, '5e3a6296aa8d2.jpg', 'https://www.youtube.com/embed/eBpDI_Yij2k', 'Disiram 2 klai sehari, pagi dan sore', 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia. Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek. Bagian daun dan batangnya yang tebal dan berdaging menyimpan cukup banyak air untuk dapat bertahan hidup'),
('B003', 'K003', 'Mawar Jingga', 25000, 50, '5e3aaa9646f81.jpg', '-', 'Disiram tiap pagi dan sore', 'Mawar adalah suatu jenis tanaman semak dari genus Rosa sekaligus nama bunga yang dihasilkan tanaman ini. Mawar liar terdiri dari 100 spesies lebih, kebanyakan tumbuh di belahan bumi utara yang berudara sejuk. Spesies mawar umumnya merupakan tanaman semak yang berduri atau tanaman memanjat yang tingginya bisa mencapai 2 sampai 5 meter. Walaupun jarang ditemui, tinggi tanaman mawar yang merambat di tanaman lain bisa mencapai 20 meter.'),
('B004', 'K002', 'Kaktus Hias Mini', 25000, 100, '5e3aab115241e.jpg', 'https://www.youtube.com/watch?v=f-n1BNx5AIo', 'Disiram secukupnnya', 'Kaktus adalah nama yang diberikan untuk anggota tumbuhan berbunga famili Cactaceae. Kaktus dapat tumbuh pada waktu yang lama tanpa air. Kaktus biasa ditemukan di daerah-daerah yang kering (gurun). Kata jamak untuk kaktus adalah kakti. Kaktus memiliki akar yang panjang untuk mencari air dan memperlebar penyerapan air dalam tanah. Air yang diserap kaktus disimpan dalam ruang di batangnya.'),
('B006', 'K001', 'Krisan Standart', 15000, 7000, '5e3a5fb1a0398.jpg', 'https://www.youtube.com/watch?v=ezxjZQvH6f0', '1. Pilih tanaman yang sehat.  2. Pindahkan bunga krisan ke pot yang baru.  3. Sirami bunga krisan secukupnya tetapi jangan sampai airnya menggenang. 4. Jauhkan bunga krisan dari lampu jalan atau cahaya buatan di malam hari.  5. Berikan pupuk beberapa kali dalam setahun.', 'Bunga Krisan adalah sejenis tumbuhan berbunga yang sering ditanam sebagai tanaman hias pekarangan atau bunga petik. Tumbuhan berbunga ini mulai muncul pada zaman Kapur.'),
('B007', 'K004', 'Anggrek Bulan Taiwan', 150000, 60, '5e3a627512e6c.png', 'https://www.youtube.com/watch?v=J0LxcFs1nVM', 'siram bunga 2 kali sehari, pagi dan sore.', 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia. Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek. Bagian daun dan batangnya yang tebal dan berdaging menyimpan cukup banyak air untuk dapat bertahan hidup'),
('B008', 'K004', 'Anggrek Cattlea', 120000, 68, '5e3ae0ef5751c.jpg', 'https://www.youtube.com/watch?v=n2CRlrmwKt8', 'siram bunga 2 kali sehari, pagi dan sore.', 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia. Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek. Bagian daun dan batangnya yang tebal dan berdaging menyimpan cukup banyak air untuk dapat bertahan hidup'),
('B009', 'K006', 'Agloenema', 46000, 50, '5e3aabaeb4641.png', 'https://www.youtube.com/watch?v=sWxQ5VilB5U', 'Penyiramanbisa dilakukansatu hari sekali dengan takaran air yang disesuaikan dengan kelembaban media tanam itu sendiri. Ingat, aglaonema ialah tanaman yang menyenangi area tidak kering namun tak terlalu basah. Jangan memakai air kaporit pada dalam merawat dan menyiram tanaman Aglaonema.', 'Aglaonema, sri rezeki, atau chinese evergreen merupakan tanaman hias populer dari suku talas-talasan atau Araceae. Genus Aglaonema memiliki sekitar 30 spesies.  Habitat asli tanaman ini adalah di bawah hutan hujan tropis, tumbuh baik pada areal dengan intensitas penyinaran rendah dan kelembaban tinggi.Tanaman ini memiliki akar serabut serta batang yang tidak berkambium (Berkayu).Daun Menyirip serta memiliki pembuluh pengangkut berupa xilem dan floem yang tersusun secara acak.'),
('B010', 'K006', 'Begonia', 25000, 35, '5e3a664188cee.jpg', 'https://www.youtube.com/watch?v=jjpsRDK2YIY', 'siram bunga 2 kali sehari, pagi dan sore.', 'Begonia adalah genus dalam keluarga tanaman berbunga Begoniaceae. Satu-satunya anggota keluarga lainnya Begoniaceae adalah Hillebrandia, genus dengan spesies tunggal di Kepulauan Hawaii, dan genus Symbegonia yang baru-baru ini termasuk dalam Begonia');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(4) NOT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar_kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`, `gambar_kategori`) VALUES
('K001', 'Krisan', 'Seruni atau krisantemum (kadang disebut sebagai krisan atau serunai) adalah sejenis tumbuhan berbunga yang sering ditanam sebagai tanaman hias pekarangan atau bunga petik. Tumbuhan berbunga ini mulai muncul pada zaman Kapur.', '5e3aac17a6e2e.jpg'),
('K002', 'Kaktus', 'Kaktus adalah nama yang diberikan untuk anggota tumbuhan berbunga famili Cactaceae. Kaktus dapat tumbuh pada waktu yang lama tanpa air. Kaktus biasa ditemukan di daerah-daerah yang kering (gurun). Kata jamak untuk kaktus adalah kakti. Kaktus memiliki akar yang panjang untuk mencari air dan memperlebar penyerapan air dalam tanah. Air yang diserap kaktus disimpan dalam ruang di batangnya.', '5e3aacaed3650.jpg'),
('K003', 'Mawar', 'Mawar adalah suatu jenis tanaman semak dari genus Rosa sekaligus nama bunga yang dihasilkan tanaman ini. Mawar liar terdiri dari 100 spesies lebih, kebanyakan tumbuh di belahan bumi utara yang berudara sejuk. Spesies mawar umumnya merupakan tanaman semak yang berduri atau tanaman memanjat yang tingginya bisa mencapai 2 sampai 5 meter. Walaupun jarang ditemui, tinggi tanaman mawar yang merambat di tanaman lain bisa mencapai 20 meter.', '5e3aacffaac6f.jpg'),
('K004', 'Anggrek', 'Anggrek adalah tumbuhan yang banyak ditemukan di Indonesia. Iklim tropis Indonesia memang cocok untuk menjadi tempat tumbuh bagi anggrek. Bagian daun dan batangnya yang tebal dan berdaging menyimpan cukup banyak air untuk dapat bertahan hidup.', '5e3aac4b0fc58.jpg'),
('K005', 'Melati', 'Melati putih atau Jasminum sambac adalah spesies melati yang berasal dari Asia selatan (di India, Myanmar dan Sri Lanka. Penyebaranya dimulai dari Hindustan ke Indocina, lalu Kepulauan Melayu. Bunga ini menjadi satu dari tiga bunga nasional Indonesia (sebagai &quot;Puspa Bangsa&quot;). Bunga ini juga menjadi bunga nasional Filipina.  Melati putih tumbuh di pekarangan dan dapat digunakan sebagai tanaman pagar. Ketinggiannya dapat mencapai 2 meter.', '5e3aae681ee40.jpg'),
('K006', 'Bunga Daun', 'Tanaman hias daun adalah Salah satu kategori atau jenis tanaman hias yang menitik beratkan keindahan atau kecantikan pada daun. Baik itu bentuk maupun warna.   Jika kita berpegangan pada pengertian tanaman hias daun diatas, Maka kita bisa tahu bahwa jenis tanaman hias ini akan cenderung mengandalkan daya tarik dari daunnya.', '5e3aaf5fde9ca.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `Status`) VALUES
(1, 'Admin'),
(2, 'Justiper'),
(3, 'Konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `waktubuat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `email`, `token`, `waktubuat`) VALUES
(1, 'khafid@polije.ac.id', 'fPkWKlbaG6ujHuLwWw7M6qf/Tw6WOZnkxNiWO79lFAQ=', 1586439389),
(2, '10tkj2hendry.madritista@gmail.com', 'PaXwF1JQR7lXEvdg8j+AUm/1B+QUAjKpaBNosorLhGM=', 1586439489),
(3, 'jiji@gmail.com', 'T6KABKSMvtAlaEi1oEgQCxdDFU0Ofj86zcceRXkrzgk=', 1586440223),
(4, 'idristifa@gmail.com', 'ioyi37tH3phk7KoWCzYKKa+NJcH9ZzUsP5tFXjTL8rE=', 1586496352),
(5, 'idristifa@gmail.com', '72JFYYjE5aIx1ll0H44HJx2wFCWE8OCQ73FXJdhDz1M=', 1586496409),
(6, 'idristifa@gmail.com', 'ThK8DMQwTmdkdBMux85se5td+JQpQOYZ5eMDrdnr5qQ=', 1586496588),
(7, '10tkj2hendry.madritista@gmail.com', 'UipbzsZM7uGc+LBavgl/nyk9zkI8Y2poFgEPDnGVXBA=', 1586498342),
(8, '10tkj2hendry.madritista@gmail.com', 'FLFAZWEn/hgwXofX+MgxHQQu3YbNDPYJn4pcnTg/UUM=', 1586498510),
(9, '10tkj2hendry.madritista@gmail.com', 'STuCr/FccO7DRYOW6eDOOQ4o7KCTSixKVpdL3vwgvMw=', 1586498720),
(10, '10tkj2hendry.madritista@gmail.com', 'C1GK1vOSpnrhroigzD9K/C/osSohHWFbx3YE7VBqjh4=', 1586499566),
(11, '10tkj2hendry.madritista@gmail.com', '2dKDqLmnhNospC2jNzhhXKsby6/46k+Oqbyap+H0Kbs=', 1586499701),
(12, '10tkj2hendry.madritista@gmail.com', 'ATEFOSdMMJHloHyS6VZEF1j5GMQVppNkZVaRfHrH0P4=', 1586499854),
(13, '10tkj2hendry.madritista@gmail.com', 'wcsrHXjjBKF9YAEfcCY1JsNp+xUy79k5Sp41jhL+U5c=', 1586500189),
(14, 'idristifa@gmail.com', 'vVpVbxCRn3S+Q/M+Rz4Wiy1YyAecfvo8p6ntzlGO3TI=', 1586500356),
(15, 'idristifa@gmail.com', 'ozZCnU6m2Wr6JEiZzBvff++HDqjtV4oVcinR31JU3LE=', 1586503248),
(16, '10tkj2hendry.madritista@gmail.com', 'YenLRcIqIRahb1TGVo3nscytqPcoGmhIkbDXKTE3bn8=', 1586514575),
(17, 'jiji@gmail.com', 'p7KN5bz9QArZADgmijp9tx4KDsZOUJjmdIc8GS3ffus=', 1586516044),
(18, 'khafid@polije.ac.id', 'z1iGuScwI2UFimaG8ejwqC/PLq1LAPBb4eeQGQfOFus=', 1586516539),
(19, '10tkj2hendry.madritista@gmail.com', 'zJzoATc3ldQBHnl6rY92LeCL+L2UKK3jZ/QSYIRME2U=', 1586516869);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `aktivasi` int(11) NOT NULL,
  `waktu_pembuatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `jenis_kelamin`, `no_telepon`, `password`, `foto`, `status`, `aktivasi`, `waktu_pembuatan`) VALUES
(19, 'idriss', 'idristifa@gmail.com', 'L', '6256243643666', '$2y$10$fLsp28XVxOkIQ.hwtjZ6o.wONETSDffRNrrYi8/iRvO5cFryMyeV6', 'covid.png', 2, 1, 1586503248),
(23, 'dfadfa', '10tkj2hendry.madritista@gmail.com', 'L', '5453524352', '$2y$10$k3GmG1avB3z2qZUDSwgnt.4qNVd7c/jeKfnGYAfjb/nYeA3tFuHSG', 'default.jpg', 2, 0, 1586516869);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bunga`
--
ALTER TABLE `bunga`
  ADD PRIMARY KEY (`id_bunga`),
  ADD KEY `FK_MEMILIKI1` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bunga`
--
ALTER TABLE `bunga`
  ADD CONSTRAINT `FK_MEMILIKI1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
