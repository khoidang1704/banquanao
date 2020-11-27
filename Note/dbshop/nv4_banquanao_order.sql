-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2020 lúc 03:38 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nv4_banquanao_order`
--

CREATE TABLE `nv4_banquanao_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL DEFAULT 0 COMMENT 'mã hóa đơn',
  `name_customer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `product` int(11) NOT NULL DEFAULT 0,
  `total` int(20) NOT NULL DEFAULT 0,
  `weight` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `addtime` int(11) NOT NULL DEFAULT 0,
  `updatetime` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nv4_banquanao_order`
--

INSERT INTO `nv4_banquanao_order` (`id`, `id_order`, `name_customer`, `product`, `total`, `weight`, `active`, `addtime`, `updatetime`) VALUES
(2, 0, '4', 2, 10000000, 1, 1, 1606429551, 0),
(3, 0, '6', 2, 10000000, 2, 1, 1606429554, 0),
(4, 0, '8', 2, 10000000, 3, 1, 1606429557, 0),
(5, 0, '9', 2, 10000000, 4, 1, 1606429559, 0),
(6, 0, '10', 2, 10000000, 5, 1, 1606429561, 0),
(7, 0, '11', 2, 10000000, 6, 1, 1606429563, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nv4_banquanao_order`
--
ALTER TABLE `nv4_banquanao_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nv4_banquanao_order`
--
ALTER TABLE `nv4_banquanao_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
