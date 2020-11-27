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
-- Cấu trúc bảng cho bảng `nv4_shop_category`
--

CREATE TABLE `nv4_shop_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `weight` int(11) NOT NULL DEFAULT 0,
  `addtime` int(11) NOT NULL DEFAULT 0,
  `updatetime` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nv4_shop_category`
--

INSERT INTO `nv4_shop_category` (`id`, `title`, `weight`, `addtime`, `updatetime`) VALUES
(2, 'Gucci', 1, 1606277100, 0),
(3, 'MLB', 2, 1606277119, 0),
(4, 'Lacoste', 3, 1606277132, 0),
(5, 'Adidas', 4, 1606277181, 0),
(6, 'Tommy', 13, 1606277186, 0),
(7, 'Thom Browne', 5, 1606277194, 0),
(8, 'ADLV', 6, 1606277200, 0),
(9, 'Anta', 7, 1606277205, 0),
(10, 'Dolce & Ganbana', 8, 1606277211, 0),
(11, 'Bape', 9, 1606277218, 0),
(12, 'Versace', 10, 1606277222, 0),
(13, 'Fendi', 11, 1606277227, 0),
(14, 'Burberry', 12, 1606277231, 0),
(15, 'Dior', 14, 1606277235, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nv4_shop_category`
--
ALTER TABLE `nv4_shop_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nv4_shop_category`
--
ALTER TABLE `nv4_shop_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
