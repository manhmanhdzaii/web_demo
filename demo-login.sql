-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2022 lúc 12:11 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo-login`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Áo Nam'),
(2, 'Áo Nữ'),
(3, 'Áo Unisex'),
(4, 'Áo Cho Bé');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'Trắng'),
(2, 'Đen'),
(3, 'Đỏ'),
(4, 'Vàng'),
(5, 'Xanh Dương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `city`, `note`) VALUES
(5, 'Phạm Doãn Mạnh', '0388549444', 'manhtb1982@gmail.com', 'Hà Nội', 'ffff'),
(6, 'Phạm Doãn Mạnh', '0388549444', 'manhtb1982@gmail.com', 'Hà Nội', 'âcca'),
(7, 'Phạm Doãn Mạnh', '0388549444', 'manhtb1982@gmail.com', 'Hà Nội', 'âcca'),
(8, 'Phạm Doãn Mạnh', '0388549444', 'manhtb1982@gmail.com', 'Hà Nội', ''),
(9, 'admin', '+842432007924', 'manhtb1982000@gmail.com', 'Hà Nội', 'dfsdfgdf'),
(10, 'Phạm Doãn Mạnh', '0388549444', 'manhtb1982@gmail.com', 'Hà Nội', 'aaaaaaaaa'),
(11, 'Nguyễn Văn A', '0388549443', 'nguyenvanA@gmail.com', 'Hà Nội', 'aaaaa'),
(12, 'Nguyễn Văn A', '0388549443', 'manhtb1982@gmail.com', 'Hà Nội', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_sub`
--

CREATE TABLE `img_sub` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `img_sub`
--

INSERT INTO `img_sub` (`id`, `path`, `product_id`) VALUES
(27, 'upload/sub_img/11/img_n53489.jpg', 11),
(28, 'upload/sub_img/11/img_3249.jpg', 11),
(29, 'upload/sub_img/11/img_5279.jpg', 11),
(30, 'upload/sub_img/11/img_5746.jpg', 11),
(31, 'upload/sub_img/12/img_nu55034.jpg', 12),
(32, 'upload/sub_img/12/img_3012.jpg', 12),
(33, 'upload/sub_img/12/img_4104.jpg', 12),
(34, 'upload/sub_img/12/img_2438.', 12),
(35, 'upload/sub_img/13/img_nu36210.jpg', 13),
(36, 'upload/sub_img/13/img_970.jpg', 13),
(37, 'upload/sub_img/13/img_5749.jpg', 13),
(38, 'upload/sub_img/13/img_3272.jpg', 13),
(39, 'upload/sub_img/14/img_n47743.jpg', 14),
(40, 'upload/sub_img/14/img_50.jpg', 14),
(41, 'upload/sub_img/14/img_1041.jpg', 14),
(42, 'upload/sub_img/14/img_893.jpg', 14),
(43, 'upload/sub_img/15/img_nu42565.jpg', 15),
(44, 'upload/sub_img/15/img_3327.jpg', 15),
(45, 'upload/sub_img/15/img_2586.jpg', 15),
(46, 'upload/sub_img/15/img_4700.jpg', 15),
(47, 'upload/sub_img/16/img_n31850.jpg', 16),
(48, 'upload/sub_img/16/img_2665.jpg', 16),
(49, 'upload/sub_img/16/img_3825.jpg', 16),
(50, 'upload/sub_img/16/img_9395.jpg', 16),
(51, 'upload/sub_img/17/img_n1413.jpg', 17),
(52, 'upload/sub_img/18/img_product-164935.jpg', 18),
(53, 'upload/sub_img/18/img_3024.', 18),
(54, 'upload/sub_img/18/img_3850.', 18),
(55, 'upload/sub_img/18/img_1082.', 18),
(56, 'upload/sub_img/23/img_product-165401.jpg', 23),
(57, 'upload/sub_img/23/img_5469.', 23),
(58, 'upload/sub_img/23/img_4416.', 23),
(59, 'upload/sub_img/23/img_7047.', 23),
(60, 'upload/sub_img/24/img_product-168803.jpg', 24),
(61, 'upload/sub_img/25/img_nu56108.jpg', 25),
(62, 'upload/sub_img/25/img_645.', 25),
(63, 'upload/sub_img/25/img_3723.', 25),
(64, 'upload/sub_img/25/img_7735.', 25),
(65, 'upload/sub_img/26/img_nu51546.jpg', 26),
(66, 'upload/sub_img/26/img_nu59544.jpg', 26),
(67, 'upload/sub_img/26/img_nu51145.jpg', 26),
(68, 'upload/sub_img/26/img_nu54093.jpg', 26),
(69, 'upload/sub_img/27/img_nu54129.jpg', 27),
(70, 'upload/sub_img/27/img_nu57931.jpg', 27),
(71, 'upload/sub_img/27/img_nu5818.jpg', 27),
(72, 'upload/sub_img/27/img_nu54565.jpg', 27),
(73, 'upload/sub_img/29/img_nu57311.jpg', 29),
(74, 'upload/sub_img/29/img_nu4 - Copy3837.jpg', 29),
(75, 'upload/sub_img/29/img_nu48712.jpg', 29),
(76, 'upload/sub_img/29/img_nu3 - Copy3690.jpg', 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_id`, `created_at`) VALUES
(1, 'c8fc71bdf532701fa357820cff6826c7', 10, '1666000361');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `amount`, `price`) VALUES
(1, 1, 11, 2, 200),
(2, 1, 12, 6, 500),
(3, 1, 14, 1, 250),
(4, 2, 11, 3, 200),
(5, 2, 12, 3, 500),
(6, 3, 11, 1, 200),
(7, 3, 12, 4, 500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `color_id` varchar(255) NOT NULL,
  `size_id` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `color_id`, `size_id`, `category_id`, `img`, `description`) VALUES
(11, 'Áo Nam 1', 200, '1,2,3,4,5', '1,2,3,4,5', '1', 'upload/img/img_n42071665726352.jpg', '<p>Sản phẩm tốt</p>\r\n'),
(12, 'Áo Nữ 1', 500, '1,2,3', '2,3,4', '2', 'upload/img/img_nu312981665726847.jpg', '<p>Sản phẩm đẹp</p>\r\n'),
(13, 'Áo Unisex', 300, '1,2,3,4', '2,3,4', '3', 'upload/img/img_n159281665727022.jpg', '<p>Sản phầm đẹp</p>\r\n'),
(14, 'Áo Nam 2', 250, '2,3', '2,3', '1', 'upload/img/img_n534681665727102.jpg', '<p>Sản phẩm good</p>\r\n'),
(15, 'Áo Nữ 2', 300, '2,3,4', '2,3,5', '2', 'upload/img/img_nu278571665727393.jpg', '<p>SP ggggggggggggggggg</p>\r\n'),
(16, 'Áo Nam 3', 333, '1,2', '3', '1', 'upload/img/img_n464661665727483.jpg', '<p>&Aacute;o Nam 3</p>\r\n'),
(29, 'Phạm Doãn Mạnh', 120000, '2', '3', '2', 'upload/img/img_nu138871665977852.jpg', '<p>a</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) DEFAULT 0,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `active`, `token`) VALUES
(1, 'manh', 'manh@gmail.com', '123456', 1, NULL),
(32, 'Phạm Doãn Mạnh', 'manhtb1982@gmail.com', 'Manh1234', 1, 'bf61db5cf9978f351ecf32d74a2eeb9f'),
(33, 'Phạm Doãn Mạnh', 'manhtb1982000@gmail.com', 'Manh1111', 1, '42adfa34e7f963b1bfe240c379205501');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `img_sub`
--
ALTER TABLE `img_sub`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `img_sub`
--
ALTER TABLE `img_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
