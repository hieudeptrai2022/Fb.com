-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2023 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan11`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai-viet`
--

CREATE TABLE `bai-viet` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `like` int(11) NOT NULL,
  `hinh_baiviet` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bai-viet`
--

INSERT INTO `bai-viet` (`id`, `id_user`, `content`, `time`, `like`, `hinh_baiviet`) VALUES
(28, 8, 'Vanh test quần áo', '2023-12-04 13:29:59', 0, 'images/z4808971951585_e6c36fcde94e95962ad461aaf0c80c43.jpg'),
(29, 8, 'hello đây là bài viết được tôi viết lên nhằm để kiểm chứng bài viết có thể viết lên ', '2023-12-11 08:17:42', 0, ''),
(30, 10, 'Tôi cũng đăng 1 bài viết bán điện thoại', '2023-12-11 08:41:23', 0, 'images/Screenshot 2023-08-03 153403.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet_yeuthich`
--

CREATE TABLE `baiviet_yeuthich` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet_yeuthich`
--

INSERT INTO `baiviet_yeuthich` (`id`, `id_user`, `id_post`) VALUES
(4, 8, 28),
(6, 8, 29),
(7, 8, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh-luan`
--

CREATE TABLE `binh-luan` (
  `id_bl` int(11) NOT NULL,
  `content` varchar(225) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_baiviet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh-luan`
--

INSERT INTO `binh-luan` (`id_bl`, `content`, `id_user`, `time`, `id_baiviet`) VALUES
(11, 'hahahahhahaa', 10, '2023-12-11 09:15:12', 28),
(12, 'dữ z shao', 10, '2023-12-11 09:15:19', 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai-khoan`
--

CREATE TABLE `tai-khoan` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirmpass` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `hinh` mediumtext NOT NULL,
  `vai_tro` tinyint(2) NOT NULL,
  `kich_hoat` tinyint(4) NOT NULL,
  `ho_ten` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai-khoan`
--

INSERT INTO `tai-khoan` (`id`, `username`, `password`, `confirmpass`, `email`, `hinh`, `vai_tro`, `kich_hoat`, `ho_ten`) VALUES
(8, 'hieutruong', '123', '', 'anhnhph33991@fpt.edu.vn', 'Screenshot 2023-09-17 200458.png', 1, 0, 'Trương Văn Hiếu'),
(10, 'keoke123', '123', '', 'feedNV19@fpt.edu.vn', 'Screenshot 2023-10-09 211723.png', 0, 0, 'cbd123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bai-viet`
--
ALTER TABLE `bai-viet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baiviet_yeuthich`
--
ALTER TABLE `baiviet_yeuthich`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `binh-luan`
--
ALTER TABLE `binh-luan`
  ADD PRIMARY KEY (`id_bl`);

--
-- Chỉ mục cho bảng `tai-khoan`
--
ALTER TABLE `tai-khoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bai-viet`
--
ALTER TABLE `bai-viet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `baiviet_yeuthich`
--
ALTER TABLE `baiviet_yeuthich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `binh-luan`
--
ALTER TABLE `binh-luan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tai-khoan`
--
ALTER TABLE `tai-khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet_yeuthich`
--
ALTER TABLE `baiviet_yeuthich`
  ADD CONSTRAINT `baiviet_yeuthich_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `bai-viet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baiviet_yeuthich_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tai-khoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
