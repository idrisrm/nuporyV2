-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2020 pada 12.03
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
-- Database: `jastip`
--

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

--
-- Dumping data untuk tabel `token`
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
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `jenis_kelamin`, `no_telepon`, `password`, `foto`, `status`, `aktivasi`, `waktu_pembuatan`) VALUES
(19, 'idriss', 'idristifa@gmail.com', 'L', '6256243643666', '$2y$10$fLsp28XVxOkIQ.hwtjZ6o.wONETSDffRNrrYi8/iRvO5cFryMyeV6', 'covid.png', 2, 1, 1586503248),
(23, 'dfadfa', '10tkj2hendry.madritista@gmail.com', 'L', '5453524352', '$2y$10$k3GmG1avB3z2qZUDSwgnt.4qNVd7c/jeKfnGYAfjb/nYeA3tFuHSG', 'default.jpg', 2, 0, 1586516869);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
