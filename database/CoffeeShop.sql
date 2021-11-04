-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 06:39 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffeeshop`
--
CREATE DATABASE IF NOT EXISTS `coffeeshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `coffeeshop`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Đồ Uống'),
(2, 'Thức Ăn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `subject_name`, `note`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Bui', 'Loc', 'dinhloc@gmail.com', '0969819201', 'GG', 'GG', NULL, '2021-11-03 09:25:33', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Cafe đen nguyên chất', 20000, 20000, 'assets/photos/cafe1.png', '', '2021-11-04 09:24:49', '2021-11-04 09:24:49', 0),
(2, 1, 'Cafe Sữa', 25000, 25000, 'assets/photos/cafe2.png', '', '2021-11-04 09:44:49', '2021-11-04 09:44:49', 0),
(3, 1, 'Ca cao', 25000, 25000, 'assets/photos/cafe3.png', '', '2021-11-04 09:05:50', '2021-11-04 09:05:50', 0),
(4, 1, 'Latte', 20000, 20000, 'assets/photos/cafe4.png', '', '2021-11-04 09:26:50', '2021-11-04 09:26:50', 0),
(5, 1, 'Cafe nước cốt dừa', 25000, 25000, 'assets/photos/cafe5.png', '', '2021-11-04 09:48:50', '2021-11-04 09:48:50', 0),
(6, 1, 'Espresso', 25000, 25000, 'assets/photos/cafe6.png', '', '2021-11-04 09:29:51', '2021-11-04 09:29:51', 0),
(7, 1, 'Capuchino', 25000, 25000, 'assets/photos/cafe7.jpg', '', '2021-11-04 09:09:52', '2021-11-04 09:09:52', 0),
(8, 2, 'Bánh Kem', 30000, 30000, 'assets/photos/cake2.png', '', '2021-11-04 09:43:52', '2021-11-04 09:43:52', 0),
(9, 2, 'Cookie sô-cô-la', 30000, 30000, 'assets/photos/cake1.png', '', '2021-11-04 09:33:53', '2021-11-04 09:33:53', 0),
(10, 2, 'Bánh bông lan trứng muối', 20000, 20000, 'assets/photos/cake3.png', '', '2021-11-04 09:06:54', '2021-11-04 09:06:54', 0),
(11, 2, 'Bánh bông lan trứng muối nhỏ', 20000, 20000, 'assets/photos/cake4.png', '', '2021-11-04 09:35:54', '2021-11-04 09:35:54', 0),
(12, 2, 'Bánh sừng bò', 10000, 10000, 'assets/photos/cake5.png', '', '2021-11-04 09:01:55', '2021-11-04 09:01:55', 0),
(13, 2, 'Bánh sô-cô-la', 25000, 25000, 'assets/photos/cake7.png', '', '2021-11-04 09:27:55', '2021-11-04 09:27:55', 0),
(14, 2, 'Bánh quế', 20000, 20000, 'assets/photos/cake8.png', '', '2021-11-04 09:00:56', '2021-11-04 09:00:56', 0),
(15, 2, 'Bánh matcha', 25000, 25000, 'assets/photos/cake9.png', '', '2021-11-04 09:20:56', '2021-11-04 09:20:56', 0),
(16, 2, 'Bánh sô-cô-la tan chảy', 25000, 25000, 'assets/photos/cake10.png', '', '2021-11-04 09:52:56', '2021-11-04 09:52:56', 0),
(17, 1, 'Trà sữa trân châu đường đen', 30000, 30000, 'assets/photos/MilkTea5.png', '', '2021-11-04 09:24:57', '2021-11-04 09:24:57', 0),
(18, 1, 'Trà sữa khoai môn', 25000, 25000, 'assets/photos/MilkTea4.png', '', '2021-11-04 09:44:57', '2021-11-04 09:44:57', 0),
(19, 1, 'Trà sữa truyền thống', 30000, 30000, 'assets/photos/MilkTea2.png', '', '2021-11-04 09:24:58', '2021-11-04 09:48:58', 0),
(20, 2, 'Trà sữa sô-cô-la', 30000, 30000, 'assets/photos/MilkTea.jpg', '', '2021-11-04 09:17:59', '2021-11-04 09:17:59', 0),
(21, 1, 'Trà sữa Matcha', 25000, 25000, 'assets/photos/MilkTea3.png', '', '2021-11-04 09:51:59', '2021-11-04 09:51:59', 0),
(22, 1, 'Matcha cỡ nhỏ', 25000, 25000, 'assets/photos/matcha.png', '', '2021-11-04 10:32:00', '2021-11-04 10:32:00', 0),
(23, 1, 'Matcha sữa', 30000, 30000, 'assets/photos/matcha2.png', '', '2021-11-04 10:53:00', '2021-11-04 10:53:00', 0),
(24, 2, 'Bánh mì sô-cô-la', 25000, 25000, 'assets/photos/cake11.png', '', '2021-11-04 10:24:01', '2021-11-04 10:24:01', 0),
(25, 2, 'Bánh mì sô-cô-la tròn', 25000, 25000, 'assets/photos/cake12.png', '', '2021-11-04 10:52:01', '2021-11-04 10:52:01', 0),
(26, 2, 'Bánh mousse xoài', 35000, 35000, 'assets/photos/cake13.png', '', '2021-11-04 10:14:03', '2021-11-04 10:14:03', 0),
(27, 2, 'Cupcake chocolate', 25000, 25000, 'assets/photos/cake14.png', '', '2021-11-04 10:13:04', '2021-11-04 10:13:04', 0),
(28, 2, 'Cupcake sô-cô-la', 15000, 15000, 'assets/photos/cake15.png', '', '2021-11-04 10:48:04', '2021-11-04 10:48:04', 0),
(29, 2, 'Bánh viên chocolate', 25000, 25000, 'assets/photos/cake16.png', '', '2021-11-04 10:22:05', '2021-11-04 10:22:05', 0),
(30, 2, 'Bánh mì nướng muối', 25000, 25000, 'assets/photos/cake11.png', '', '2021-11-04 10:03:06', '2021-11-04 10:40:18', 0),
(31, 2, 'Matcha Tiramisu', 25000, 25000, 'assets/photos/cake18.png', '', '2021-11-04 10:32:06', '2021-11-04 10:32:06', 0),
(32, 2, 'Chocolate Tiramisu', 25000, 25000, 'assets/photos/cake21.png', '', '2021-11-04 10:55:06', '2021-11-04 10:55:06', 0),
(33, 2, 'Cupcake sô-cô-la 7 màu', 25000, 25000, 'assets/photos/cake19.png', '', '2021-11-04 10:23:07', '2021-11-04 10:23:07', 0),
(34, 2, 'Bánh xoài', 25000, 25000, 'assets/photos/cake20.png', '', '2021-11-04 10:40:07', '2021-11-04 10:40:07', 0),
(35, 2, 'Cupcake chocolate 2', 25000, 25000, 'assets/photos/cake22.jpg', '', '2021-11-04 10:16:08', '2021-11-04 10:16:08', 0),
(36, 1, 'Trà sữa sô-cô-la', 25000, 25000, 'assets/photos/ChocolateMilkTea.png', '', '2021-11-04 10:32:08', '2021-11-04 10:32:08', 0),
(37, 1, 'Nước ép Táo', 25000, 25000, 'assets/photos/drink1.png', '', '2021-11-04 10:00:09', '2021-11-04 10:00:09', 0),
(38, 1, 'Sinh tố bơ', 25000, 25000, 'assets/photos/drink2.png', '', '2021-11-04 10:33:09', '2021-11-04 10:33:09', 0),
(39, 1, 'Sữa chua', 25000, 25000, 'assets/photos/drink3.png', '', '2021-11-04 10:59:09', '2021-11-04 10:59:09', 0),
(40, 1, 'Nước ép nho 1', 25000, 25000, 'assets/photos/drink4.png', '', '2021-11-04 10:22:10', '2021-11-04 10:22:10', 0),
(41, 1, 'Nước ép bí', 25000, 25000, 'assets/photos/drink5.png', '', '2021-11-04 10:47:10', '2021-11-04 10:47:10', 0),
(42, 1, 'Nước ép dâu tầm', 30000, 30000, 'assets/photos/drink6.png', '', '2021-11-04 10:13:11', '2021-11-04 10:13:11', 0),
(43, 1, 'Nước ép thơm', 25000, 25000, 'assets/photos/drink9.png', '', '2021-11-04 10:48:11', '2021-11-04 10:48:11', 0),
(44, 1, 'Nước ép nho xanh', 20000, 20000, 'assets/photos/drink10.png', '', '2021-11-04 10:05:12', '2021-11-04 10:05:12', 0),
(45, 1, 'Nước ép nho 2', 25000, 25000, 'assets/photos/drink11.png', '', '2021-11-04 10:32:12', '2021-11-04 10:32:12', 0),
(46, 1, 'Coctail 1', 25000, 25000, 'assets/photos/drink12.png', '', '2021-11-04 10:57:12', '2021-11-04 10:57:12', 0),
(47, 1, 'Coctail 2', 25000, 25000, 'assets/photos/drink13.png', '', '2021-11-04 10:17:13', '2021-11-04 10:17:13', 0),
(48, 1, 'Trà chanh', 25000, 25000, 'assets/photos/drink14.png', '', '2021-11-04 10:38:13', '2021-11-04 10:38:13', 0),
(49, 2, 'Kem dâu', 25000, 25000, 'assets/photos/IceCream.jpg', '', '2021-11-04 10:57:13', '2021-11-04 10:57:13', 0),
(50, 2, 'Kem matcha', 25000, 25000, 'assets/photos/icecream2.png', '', '2021-11-04 10:20:14', '2021-11-04 10:20:14', 0),
(51, 2, 'Kem sô cô la', 25000, 25000, 'assets/photos/icecream3.png', '', '2021-11-04 10:37:14', '2021-11-04 10:37:14', 0),
(52, 1, 'Nước ép hoa quả', 25000, 25000, 'assets/photos/drink8.png', '', '2021-11-04 10:16:15', '2021-11-04 10:16:15', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokens`
--

CREATE TABLE `tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tokens`
--

INSERT INTO `tokens` (`user_id`, `token`, `created_at`) VALUES
(1, 'a404a37e50317b37789e539f32cf0907', '2021-11-04 09:42:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Bui Dinh Loc', 'admin@holafriend.com', NULL, NULL, 'aa027964a5f2b2dee03bd45151730761', 1, '2021-11-04 09:40:26', '2021-11-04 09:40:26', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
