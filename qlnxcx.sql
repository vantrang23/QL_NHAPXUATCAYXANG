-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2024 at 04:51 PM
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
(1, '2024-03-20 08:58:54', 20000),
(1, '2024-03-20 23:49:26', 17000),
(2, '2024-03-20 08:59:34', 21500),
(3, '2024-03-20 08:59:59', 22000),
(4, '2024-03-20 09:00:10', 21300),
(5, '2024-03-20 09:00:22', 18000),
(6, '2024-03-20 09:00:47', 18300);

-- --------------------------------------------------------

--
-- Table structure for table `banggiancc`
--

CREATE TABLE `banggiancc` (
  `ID_NCC` int NOT NULL,
  `ID_NHIENLIEU` int NOT NULL,
  `GIA` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banggiancc`
--

INSERT INTO `banggiancc` (`ID_NCC`, `ID_NHIENLIEU`, `GIA`) VALUES
(1, 1, 22000),
(2, 2, 21000),
(3, 3, 18500),
(4, 2, 19500),
(5, 6, 19300);

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

--
-- Dumping data for table `ctpn`
--

INSERT INTO `ctpn` (`ID_PHIEUNHAP`, `ID_NHIENLIEU`, `SO_LUONG`, `DONGIA`) VALUES
(1, 1, 60, 20000),
(2, 4, 80, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `dutru`
--

CREATE TABLE `dutru` (
  `ID_TRAM` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_NHIENLIEU` int NOT NULL,
  `SO_LUONG` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dutru`
--

INSERT INTO `dutru` (`ID_TRAM`, `ID_NHIENLIEU`, `SO_LUONG`) VALUES
('tr1p1', 1, 250),
('tr1p1', 2, 150),
('tr1p1', 3, 100),
('tr1p1', 5, 150);

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
(1, 'Tập đoàn Xăng dầu Việt Nam (Petrolimex)', '1 Khâm Thiên, P. Khâm Thiên, Q. Đống Đa, Hà Nội', '02438512603', 'banbientapweb@petrolimex.com.vn', 1),
(2, 'Công Ty Cổ Phần Dầu Khí Đông Phương', 'KCN Hưng Phú 2A, P. Phú Thứ, Q. Cái Răng, TP. Cần Thơ', '02835533325', 'sales@pms.petrolimex.com.vn', 1),
(3, 'Công ty Xăng dầu Khu vực II', 'số 15 Lê Duẩn, P. Bến Nghé, Q. 1, TP. Hồ Chí Minh', '02838292081', 'kv2@petrolimex.com.vn', 0),
(4, 'Công ty Xăng dầu Quân đội', 'Số 33B Phạm Ngũ Lão, Phường Phan Chu Trinh, Quận Hoàn Kiếm, TP Hà Nội', '02437567895', 'xangdauquandoi@gmail.com.vn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ID_NV` int NOT NULL,
  `ID_TK` int DEFAULT NULL,
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

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`ID_NV`, `ID_TK`, `HO_NV`, `TEN_NV`, `CCCD`, `SDT`, `GIOI_TINH`, `DIA_CHI`, `NGAY_SINH`, `TRANG_THAI`, `VI_TRI`) VALUES
(1, 2, 'Văn Thị Mỹ', 'Trang', '256987458954', '0756212323', 0, 'Phường Tân Bình, Vĩnh Long', '2002-03-02', 1, 'Quản lý'),
(2, 3, 'Nguyễn ', 'Hùng', '222217452326', '0963256554', 1, 'Châu Thành, Tiền Giang', '2000-03-13', 1, 'Nhân viên'),
(3, 4, 'Đỗ', 'Minh Anh', '256987459658', '0785454569', 0, 'Quận 3, Hồ Chí Minh', '1999-03-26', 1, 'Nh');

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

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`ID_PHIEUNHAP`, `ID_NCC`, `ID_TRAM`, `ID_NV`, `THOIGIAN_NHAP`, `TONG_TIEN`, `TRANG_THAI`) VALUES
(1, 1, 'tr1p1', 1, NULL, 5000000, 1),
(2, 2, 'tr1p1', 1, NULL, 300000, 1),
(1820, 2, 'tr1p1', 1, '2024-03-20 23:49:20', NULL, 0),
(7367, 1, 'tr1p1', 1, '2024-03-20 23:48:13', NULL, 0),
(9374, 1, 'tr1p1', 1, '2024-03-20 23:47:37', NULL, 0);

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
  `TONG_TIEN` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phieuxuat`
--

INSERT INTO `phieuxuat` (`ID_PHIEUXUAT`, `ID_NHIENLIEU`, `ID_NV`, `ID_TRAM`, `THOIGIAN_XUAT`, `SO_LUONG`, `TONG_TIEN`) VALUES
(1, 1, 1, 'tr1p1', NULL, 5, 250000),
(2, 2, 3, 'tr1p1', NULL, 2, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `phuong`
--

CREATE TABLE `phuong` (
  `ID_PHUONG` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TEN_PHUONG` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phuong`
--

INSERT INTO `phuong` (`ID_PHUONG`, `TEN_PHUONG`) VALUES
('p1', 'Phường 1'),
('p2', 'Phường 2'),
('p3', 'Phường 3'),
('p4', 'Phường 4'),
('p5', 'Phường 5'),
('p8', 'Phường 8'),
('p9', 'Phường 9');

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
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`ID_TK`, `ID_NV`, `TEN_TK`, `PASSWORD`, `QUYEN`, `TRANG_THAI`, `THOIGIAN_TAO`) VALUES
(2, 1, 'Trang123@', 'Trang12345678', 'Quản lý', 1, NULL),
(3, 2, 'Hung123@', 'Hung123', 'Nhân viên', 1, NULL),
(4, 3, 'Anh123@', 'Anh123456', 'Nhân viên', 1, NULL);

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

--
-- Dumping data for table `tramxangdau`
--

INSERT INTO `tramxangdau` (`ID_TRAM`, `ID_PHUONG`, `TEN_TRAM`, `DIA_CHI`, `EMAIL`, `SDT`, `TRANG_THAI`, `SUC_CHUA`) VALUES
('tr1p1', 'p1', 'Trạm xăng dầu 1P1', '120-142 Trưng Nữ Vương, Phường 1, Vĩnh Long', '1p1@gmail.com', '0484845963', 1, 1000),
('tr1p2', 'p2', 'Trạm xăng dầu 1P2', '79 Nguyễn Huệ, Phường 2, Vĩnh Long', '1p2@gmail.com', '0484845336', 1, 1000),
('tr1p3', 'p3', 'Trạm xăng dầu 1P3', '59/6B Mậu Thân, Phường 3, Vĩnh Long', '1p3@gmail.com', '0411145552', 1, 1000),
('tr1p4', 'p4', 'Trạm xăng dầu 1P4', '59, Phạm Thái Bường, Phường 4, Vĩnh Long', '1p4@gmail.com', '0706356265', 1, 1000),
('tr1p5', 'p5', 'Trạm xăng dầu 1P5', ' 121, Đinh Tiên Hoàng, Phường 5, Vĩnh Long', '1p5@gmail.com', '0756214523', 1, 1000),
('tr1p8', 'p8', 'Trạm xăng dầu  1P8', '246B Đinh Tiên Hoàng, Phường 8, Vĩnh Long', '1p8@gmail.com', '0985623215', 1, 1500),
('tr1p9', 'p9', 'Trạm xăng dầu  1P9', '166 Phạm Hùng, Phường 9, Thành phố Vĩnh Long, Tỉnh Vĩnh Long', '1p9@gmail.com', '0908562321', 1, 2000);

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
-- Dumping data for table `tram_nv`
--

INSERT INTO `tram_nv` (`ID_NV`, `ID_TRAM`, `NGAY_CHUYEN`) VALUES
(1, 'tr1p1', '2023-11-02'),
(2, 'tr1p2', '2023-12-02'),
(3, 'tr1p1', '2023-12-19');

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
  ADD PRIMARY KEY (`ID_PHIEUNHAP`,`ID_NHIENLIEU`),
  ADD KEY `Fk_IDNHIENLIEU_NL` (`ID_NHIENLIEU`);

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
  ADD PRIMARY KEY (`ID_PHUONG`);

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
  MODIFY `ID_NCC` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `ID_NV` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhienlieu`
--
ALTER TABLE `nhienlieu`
  MODIFY `ID_NHIENLIEU` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID_TK` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `FK_CTPN_PN` FOREIGN KEY (`ID_PHIEUNHAP`) REFERENCES `phieunhap` (`ID_PHIEUNHAP`),
  ADD CONSTRAINT `Fk_IDNHIENLIEU_NL` FOREIGN KEY (`ID_NHIENLIEU`) REFERENCES `nhienlieu` (`ID_NHIENLIEU`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
