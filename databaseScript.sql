-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 01:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `411221221-ryomarchellino-uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` varchar(5) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama_provinsi`) VALUES
('01', 'BALI'),
('02', 'BANGKA BELITUNG'),
('03', 'BANTEN'),
('04', 'BENGKULU'),
('05', 'DAERAH ISTIMEWA YOGYAKARTA'),
('06', 'DAERAH KHUSUS IBUKOTA JAKARTA'),
('07', 'GORONTALO'),
('08', 'JAMBI'),
('09', 'JAWA BARAT'),
('10', 'JAWA TENGAH'),
('11', 'JAWA TIMUR'),
('12', 'KALIMANTAN BARAT'),
('13', 'KALIMANTAN SELATAN'),
('14', 'KALIMANTAN TENGAH'),
('15', 'KALIMANTAN TIMUR'),
('16', 'KALIMANTAN UTARA'),
('17', 'KEPULAUAN RIAU'),
('18', 'LAMPUNG'),
('19', 'MALUKU'),
('20', 'MALUKU UTARA'),
('21', 'NANGGROE ACEH DARUSSALAM'),
('22', 'NUSA TENGGARA BARAT'),
('23', 'NUSA TENGGARA TIMUR'),
('24', 'PAPUA'),
('25', 'PAPUA BARAT'),
('26', 'RIAU'),
('27', 'SULAWESI BARAT'),
('28', 'SULAWESI SELATAN'),
('29', 'SULAWESI TENGAH'),
('30', 'SULAWESI TENGGARA'),
('31', 'SULAWESI UTARA'),
('32', 'SUMATERA BARAT'),
('33', 'SUMATERA SELATAN'),
('34', 'SUMATERA UTARA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id_registrasi` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_tengah` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `kode_pos` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id_registrasi`, `nama_depan`, `nama_tengah`, `nama_belakang`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `nomor_hp`, `email`, `alamat`, `kota`, `provinsi`, `negara`, `kode_pos`, `username`, `password`, `foto`, `komentar`) VALUES
(26, 'Ryo', 'Ganteng Banget', 'Marchellino', '2025-01-10', 'Jakarta', 'laki-laki', '1234567890', 'ganteng@gmail.com', 'Duri', 'Jakarta Barat', '06', 'Indonesia', '123456', 'Ryo', '$2y$10$XXeo5bVWVWY1pNkLmFBqv.vr1OZzHvt.Pnm0fMI3JdcJMwe9UgZTW', '1736055879_b660b23c1dc2fa9dfc3e.jpg', 'Ryo'),
(27, 'Test', 'Dian', 'Nusantara', '2024-12-20', '123123', 'laki-laki', '123123', '12312@fgasdfadf.com', '123123', '123123', '01', '123123', '123123', '123123', '$2y$10$yV.EGsF8FxnRuo0RbZvoRuJ5bbrSwrhi9fYzkJHSlqguyhHt4Bpq.', '1736065927_88f0e8b50b18c16bfa8d.png', '123123'),
(28, '1111', '123', '123123', '2024-12-20', '123123', 'laki-laki', '12312333', '133312@fgasdfadf.com', '12312333', '123123', '01', '12312333', '12312333', '123123333', '$2y$10$lRkm5yoKlwqx3.xMLNIVpeIW2JOT2fESZ/NuopA5DNdTfcKe50G4C', '1736066199_dceb19a181da8905f89d.png', '123123'),
(29, '123213', 'Ganteng', '123123', '2025-01-10', 'Jakarta', 'laki-laki', '1234567890123321', 'gante123213ng@gmail.com', 'Duri', 'Jakarta Barat', '01', 'Indonesia', '123456', 'Ryo123231', '$2y$10$54j654du6rmJPdIiZzZQ5OjY04wLEhq.4jWE50nQ0x93LZK6itXe.', '1736066245_b446c4b9dd19ece079cd.png', 'Ryo'),
(30, '12222', '222222222', '2222222222222', '2025-01-15', '22222222222222', 'laki-laki', '222222222222', '222222222222@gmail.com', '22222222222222222222222', '22222222', '01', '222222222222', '2222222222', '22222222222222222222222', '$2y$10$vPi3ESVeflizF8K6fnA2A.2P6b6ggyWS5.OwZl/RwF6hb2SwHTG2y', '1736066268_3581358a483e976f46f5.jpg', '222222222222222222'),
(31, '333333333', '33333333333333', '333333333333', '2025-01-09', '3333333333333', 'laki-laki', '333333333333333', '3333333333333@gmail.com', '3333333333', '3333333333333', '27', '33333333333333', '3333333333', '333333333', '$2y$10$LYqmX2PYfqFj9Dt2GYQFIuBgWyykYnXsK2zx9oW3oOpnVLOTtExe6', '1736066301_6f0bdcd127fd796a023d.jpg', '333333333333333333333'),
(32, '444444444', '4444444444', '444444444444444', '2025-01-16', '444444444444444', 'laki-laki', '44444444444444', '4444444444444444@gmail.com', '4444444444444', '444444444444', '23', '444444444444', '4444444444', '4444444444', '$2y$10$ZO4l3rMcg08btd86Rlr.hec3M2B6Ek.co6Bjw.NN8EdIRHTr9YYSC', '1736066340_d9521c1c8aec40b374a0.jpg', '4444444444444'),
(35, '12312322222', '123', '123123', '2024-12-20', '1231232', 'laki-laki', '1231232222', '12312@fga2222dfadf.com', '123123', '123123', '26', '123123', '123123', '1231232222', '$2y$10$RMsI5tlMkwKjfJkO7hD2we/vhOp8m8EK8yMuGmQgVyCS65WkaOfEu', '1736153623_499428f16c890acc24a3.png', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD KEY `provinsi` (`provinsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD CONSTRAINT `tbl_register_ibfk_1` FOREIGN KEY (`provinsi`) REFERENCES `provinsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
