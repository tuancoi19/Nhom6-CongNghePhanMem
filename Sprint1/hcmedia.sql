-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 04:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `congviec`
--

CREATE TABLE `congviec` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_nvchup` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `congviec`
--

INSERT INTO `congviec` (`id`, `id_donhang`, `id_nvchup`, `link`) VALUES
(1, 8, 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diadiem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaychup` date NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0,
  `id_nvban` int(11) NOT NULL,
  `yeucau` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `ten`, `diachi`, `dienthoai`, `diadiem`, `ngaychup`, `trangthai`, `id_nvban`, `yeucau`, `gia`) VALUES
(8, 'Đàm Quang Tuấn', '195 Tây Sơn,Đống Đa, Hà Nội', '012345678', '195 Tây Sơn,Đống Đa, Hà Nội', '2021-07-10', 1, 13, '', 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_thanhvien` int(11) NOT NULL,
  `taikhoan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_thanhvien`, `taikhoan`, `matkhau`) VALUES
(5, '123@gmail.com', '123'),
(6, '1@gmail.com', '123'),
(12, '3@gmail.com', '123'),
(14, '675@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `dienthoai` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chucvu` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `ten`, `diachi`, `ngaysinh`, `dienthoai`, `email`, `chucvu`) VALUES
(5, 'Admin', NULL, NULL, NULL, NULL, 0),
(6, 'Minh', NULL, NULL, NULL, NULL, 1),
(12, 'ád', NULL, NULL, NULL, NULL, 1),
(13, 'Nguyễn Minh Vương', '', '2012-05-17', NULL, NULL, 1),
(14, 'Nguyễn Tuấn Anh', NULL, NULL, NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id đơn hàng` (`id_donhang`),
  ADD KEY `id nv chụp` (`id_nvchup`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID NV bán hàng` (`id_nvban`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_thanhvien`),
  ADD UNIQUE KEY `users_email_unique` (`taikhoan`),
  ADD KEY `employee_id` (`id_thanhvien`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congviec`
--
ALTER TABLE `congviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `congviec`
--
ALTER TABLE `congviec`
  ADD CONSTRAINT `congviec_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `congviec_ibfk_2` FOREIGN KEY (`id_nvchup`) REFERENCES `thanhvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_nvban`) REFERENCES `thanhvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`id_thanhvien`) REFERENCES `thanhvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
