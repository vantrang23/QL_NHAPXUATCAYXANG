-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2024 at 04:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlnxcx`
--

-- --------------------------------------------------------

--
-- Table structure for table `banggia`
--

CREATE TABLE `banggia` (
  `ID_NHIENLIEU` int NOT NULL,
  `NGAY_CN` datetime NOT NULL,
  `GIA` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banggia`
--

INSERT INTO `banggia` (`ID_NHIENLIEU`, `NGAY_CN`, `GIA`) VALUES
(1, '2024-02-22 16:30:45', 1200),
(2, '2024-02-22 16:30:57', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `ctpn`
--

CREATE TABLE `ctpn` (
  `ID_PHIEUNHAP` int NOT NULL,
  `ID_NHIENLIEU` int NOT NULL,
  `SO_LUONG` float DEFAULT NULL,
  `DONGIA` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dutru`
--

CREATE TABLE `dutru` (
  `ID_TRAM` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_NHIENLIEU` int NOT NULL,
  `SO_LUONG` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ID_NCC` int NOT NULL,
  `TEN_NCC` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIA_CHI` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANG_THAI` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`ID_NCC`, `TEN_NCC`, `DIA_CHI`, `SDT`, `EMAIL`, `TRANG_THAI`) VALUES
(1, 'Công Ty Xăng dầu Việt Nam', 'Hà Nội', '070681987', 'xangdauvn@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ID_NV` int NOT NULL,
  `ID_TK` int NOT NULL,
  `HO_NV` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TEN_NV` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CCCD` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GIOI_TINH` int DEFAULT NULL,
  `DIA_CHI` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NGAY_SINH` date DEFAULT NULL,
  `TRANG_THAI` int DEFAULT NULL,
  `VI_TRI` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhienlieu`
--

CREATE TABLE `nhienlieu` (
  `ID_NHIENLIEU` int NOT NULL,
  `TEN_NHIENLIEU` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LOAI_NHIENLIEU` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhienlieu`
--

INSERT INTO `nhienlieu` (`ID_NHIENLIEU`, `TEN_NHIENLIEU`, `LOAI_NHIENLIEU`) VALUES
(1, 'Xăng RON 95-III', 1),
(2, 'Xăng E5 RON 92-II', 1),
(3, 'Xăng RON 95-V', 1),
(4, 'Dầu DO 0,05S-II', 0),
(5, 'Dầu KO', 0),
(6, 'Dầu hỏa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `ID_PHIEUNHAP` int NOT NULL,
  `ID_NCC` int NOT NULL,
  `ID_TRAM` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_NV` int NOT NULL,
  `THOIGIAN_NHAP` datetime DEFAULT NULL,
  `TONG_TIEN` int DEFAULT NULL,
  `TRANG_THAI` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `ID_PHIEUXUAT` int NOT NULL,
  `ID_NHIENLIEU` int NOT NULL,
  `ID_NV` int NOT NULL,
  `ID_TRAM` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `THOIGIAN_XUAT` datetime DEFAULT NULL,
  `SO_LUONG` float DEFAULT NULL,
  `TONG_TIEN` int DEFAULT NULL,
  `DA_CHINHSUA` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phuong`
--

CREATE TABLE `phuong` (
  `ID_PHUONG` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_TRAM` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TEN_PHUONG` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID_TK` int NOT NULL,
  `ID_NV` int DEFAULT NULL,
  `TEN_TK` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PASSWORD` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QUYEN` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANG_THAI` int DEFAULT NULL,
  `THOIGIAN_TAO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `taikhoan`
--
DELIMITER $$
CREATE TRIGGER `up_nhanvien` AFTER INSERT ON `taikhoan` FOR EACH ROW BEGIN
  UPDATE NHANVIEN
  SET ID_TK = NEW.ID_TK
  WHERE ID_NV = NEW.ID_NV;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tramxangdau`
--

CREATE TABLE `tramxangdau` (
  `ID_TRAM` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_PHUONG` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TEN_TRAM` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DIA_CHI` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TRANG_THAI` int DEFAULT NULL,
  `SUC_CHUA` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tram_nv`
--

CREATE TABLE `tram_nv` (
  `ID_NV` int NOT NULL,
  `ID_TRAM` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NGAY_CHUYEN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banggia`
--
ALTER TABLE `banggia`
  ADD PRIMARY KEY (`ID_NHIENLIEU`,`NGAY_CN`,`GIA`);

--
-- Indexes for table `ctpn`
--
ALTER TABLE `ctpn`
  ADD PRIMARY KEY (`ID_PHIEUNHAP`,`ID_NHIENLIEU`);

--
-- Indexes for table `dutru`
--
ALTER TABLE `dutru`
  ADD PRIMARY KEY (`ID_TRAM`,`ID_NHIENLIEU`),
  ADD KEY `FK_DT_NL` (`ID_NHIENLIEU`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ID_NCC`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ID_NV`),
  ADD KEY `FK_NV_TK` (`ID_TK`);

--
-- Indexes for table `nhienlieu`
--
ALTER TABLE `nhienlieu`
  ADD PRIMARY KEY (`ID_NHIENLIEU`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`ID_PHIEUNHAP`),
  ADD KEY `FK_PN_TRAM` (`ID_TRAM`),
  ADD KEY `FK_PN_NV` (`ID_NV`),
  ADD KEY `FK_PN_NCC` (`ID_NCC`);

--
-- Indexes for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`ID_PHIEUXUAT`),
  ADD KEY `FK_PX_TRAM` (`ID_TRAM`),
  ADD KEY `FK_PX_NL` (`ID_NHIENLIEU`),
  ADD KEY `FK_PX_NV` (`ID_NV`);

--
-- Indexes for table `phuong`
--
ALTER TABLE `phuong`
  ADD PRIMARY KEY (`ID_PHUONG`),
  ADD KEY `FK_PHUONG_TRAM` (`ID_TRAM`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID_TK`),
  ADD KEY `FK_TK_NV` (`ID_NV`);

--
-- Indexes for table `tramxangdau`
--
ALTER TABLE `tramxangdau`
  ADD PRIMARY KEY (`ID_TRAM`),
  ADD KEY `FK_TRAM_PHUONG` (`ID_PHUONG`);

--
-- Indexes for table `tram_nv`
--
ALTER TABLE `tram_nv`
  ADD PRIMARY KEY (`ID_NV`,`ID_TRAM`),
  ADD KEY `FK_TNV_TRAM` (`ID_TRAM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ID_NCC` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `ID_NV` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhienlieu`
--
ALTER TABLE `nhienlieu`
  MODIFY `ID_NHIENLIEU` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID_TK` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banggia`
--
ALTER TABLE `banggia`
  ADD CONSTRAINT `FK_BANGGIA_ASSOCIATI_NHIENLIE` FOREIGN KEY (`ID_NHIENLIEU`) REFERENCES `nhienlieu` (`ID_NHIENLIEU`);

--
-- Constraints for table `ctpn`
--
ALTER TABLE `ctpn`
  ADD CONSTRAINT `FK_CTPN_PN` FOREIGN KEY (`ID_PHIEUNHAP`) REFERENCES `phieunhap` (`ID_PHIEUNHAP`);

--
-- Constraints for table `dutru`
--
ALTER TABLE `dutru`
  ADD CONSTRAINT `FK_DT_NL` FOREIGN KEY (`ID_NHIENLIEU`) REFERENCES `nhienlieu` (`ID_NHIENLIEU`),
  ADD CONSTRAINT `FK_DT_TRAM` FOREIGN KEY (`ID_TRAM`) REFERENCES `tramxangdau` (`ID_TRAM`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NV_TK` FOREIGN KEY (`ID_TK`) REFERENCES `taikhoan` (`ID_TK`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `FK_PN_NCC` FOREIGN KEY (`ID_NCC`) REFERENCES `nhacungcap` (`ID_NCC`),
  ADD CONSTRAINT `FK_PN_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhanvien` (`ID_NV`),
  ADD CONSTRAINT `FK_PN_TRAM` FOREIGN KEY (`ID_TRAM`) REFERENCES `tramxangdau` (`ID_TRAM`);

--
-- Constraints for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `FK_PX_NL` FOREIGN KEY (`ID_NHIENLIEU`) REFERENCES `nhienlieu` (`ID_NHIENLIEU`),
  ADD CONSTRAINT `FK_PX_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhanvien` (`ID_NV`),
  ADD CONSTRAINT `FK_PX_TRAM` FOREIGN KEY (`ID_TRAM`) REFERENCES `tramxangdau` (`ID_TRAM`);

--
-- Constraints for table `phuong`
--
ALTER TABLE `phuong`
  ADD CONSTRAINT `FK_PHUONG_TRAM` FOREIGN KEY (`ID_TRAM`) REFERENCES `tramxangdau` (`ID_TRAM`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_TK_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhanvien` (`ID_NV`);

--
-- Constraints for table `tramxangdau`
--
ALTER TABLE `tramxangdau`
  ADD CONSTRAINT `FK_TRAM_PHUONG` FOREIGN KEY (`ID_PHUONG`) REFERENCES `phuong` (`ID_PHUONG`);

--
-- Constraints for table `tram_nv`
--
ALTER TABLE `tram_nv`
  ADD CONSTRAINT `FK_TNV_NV` FOREIGN KEY (`ID_NV`) REFERENCES `nhanvien` (`ID_NV`),
  ADD CONSTRAINT `FK_TNV_TRAM` FOREIGN KEY (`ID_TRAM`) REFERENCES `tramxangdau` (`ID_TRAM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
