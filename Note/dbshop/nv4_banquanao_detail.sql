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
-- Cấu trúc bảng cho bảng `nv4_banquanao_detail`
--

CREATE TABLE `nv4_banquanao_detail` (
  `id` int(11) NOT NULL,
  `name_product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `color` tinyint(4) NOT NULL DEFAULT 0,
  `size` tinyint(4) NOT NULL DEFAULT 0,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `weight` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `addtime` int(11) NOT NULL DEFAULT 0,
  `updatetime` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nv4_banquanao_detail`
--

INSERT INTO `nv4_banquanao_detail` (`id`, `name_product`, `color`, `size`, `description`, `weight`, `active`, `addtime`, `updatetime`) VALUES
(2, '3', 2, 3, 'noo', 2, 1, 1606442065, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nv4_banquanao_detail`
--
ALTER TABLE `nv4_banquanao_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nv4_banquanao_detail`
--
ALTER TABLE `nv4_banquanao_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
