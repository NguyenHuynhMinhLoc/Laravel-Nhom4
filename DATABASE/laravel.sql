-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2025 lúc 03:51 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `Status`) VALUES
(1, 'Hoa Hồng', 1),
(2, 'Hoa Tulip', 1),
(3, 'Hoa Lily', 1),
(4, 'Hoa Đào', 1),
(6, 'Hoa Mai', 1),
(7, 'Hoa Mai', 1),
(8, '123', 1),
(9, 'Nguyễn Ngọc Hiếu', 1),
(10, 'abc', 1),
(11, '1234', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `ContactStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`ContactID`, `UserName`, `Email`, `Phone`, `Message`, `ContactStatus`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@example.com', '0912345678', 'Tôi muốn hỏi thêm về sản phẩm Hoa Hồng Đỏ.', 1),
(2, 'Lê Thị B', 'lethib@example.com', '0987654321', 'Shop có freeship cho đơn hàng trên 500k không?', 1),
(3, 'Phạm Văn Tâm', 'phamvantam@example.com', '0909112233', 'Sản phẩm Hoa Cúc Trắng còn hàng không?', 1),
(4, 'Trần Thị Thu', 'tranthithu@example.com', '0978901234', 'Tôi muốn đặt hoa sinh nhật giao ở Hà Nội.', 1),
(5, 'Hoàng Minh', 'hoangminh@example.com', '0965432109', 'Cho tôi xin báo giá sỉ cho Hoa Tulip.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrdersID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CurrentPrice` decimal(10,2) NOT NULL,
  `StatusOrders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrdersID`, `UserID`, `ProductID`, `Quantity`, `CurrentPrice`, `StatusOrders`) VALUES
(1, 1, 1, 2, 45000.00, 1),
(2, 2, 6, 1, 85000.00, 1),
(3, 3, 10, 5, 30000.00, 2),
(4, 4, 17, 3, 102000.00, 1),
(5, 5, 21, 1, 90000.00, 3),
(6, 1, 50, 4, 20000.00, 2),
(7, 2, 25, 1, 140000.00, 1),
(8, 3, 34, 2, 15000.00, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Image` text NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductPrice` decimal(10,2) NOT NULL,
  `PriceCoupon` decimal(10,2) NOT NULL,
  `ProductQuantity` int(11) NOT NULL,
  `ProductStatus` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `Image`, `ProductName`, `ProductPrice`, `PriceCoupon`, `ProductQuantity`, `ProductStatus`, `CategoryID`) VALUES
(1, '01_hoahongdo.jpg', 'Hoa Hồng Đỏ', 50000.00, 45000.00, 100, 1, 1),
(2, '02_hoahongtrang.jpg', 'Hoa Hồng Trắng', 55000.00, 50000.00, 80, 1, 1),
(3, '03_hoahongvang.jpg', 'Hoa Hồng Vàng', 45000.00, 40000.00, 60, 1, 1),
(4, '04_hoacamchuongdo.jpg', 'Hoa Cẩm Chướng Đỏ', 30000.00, 25000.00, 70, 1, 1),
(5, '05_hoacamchuongtrang.jpg', 'Hoa Cẩm Chướng Trắng', 32000.00, 28000.00, 50, 1, 1),
(6, '06_hoacamtucau.jpg', 'Hoa Cẩm Tú Cầu', 90000.00, 85000.00, 40, 1, 1),
(7, '07_hoalanhodieptrang.jpg', 'Hoa Lan Hồ Điệp Trắng', 120000.00, 110000.00, 30, 1, 1),
(8, '08_hoalanhodieptim.jpg', 'Hoa Lan Hồ Điệp Tím', 130000.00, 120000.00, 25, 1, 1),
(9, '09_hoalanvang.jpg', 'Hoa Lan Vàng', 150000.00, 140000.00, 20, 1, 1),
(10, '10_hoacucvang.jpg', 'Hoa Cúc Vàng', 35000.00, 30000.00, 90, 1, 1),
(11, '11_hoacuctrang.jpg', 'Hoa Cúc Trắng', 36000.00, 31000.00, 95, 1, 1),
(12, '12_hoacuchoami.jpg', 'Hoa Cúc Họa Mi', 40000.00, 35000.00, 100, 1, 1),
(13, '13_hoasenhong.jpg', 'Hoa Sen Hồng', 80000.00, 75000.00, 45, 1, 1),
(14, '14_hoasentrang.jpg', 'Hoa Sen Trắng', 85000.00, 80000.00, 40, 1, 1),
(15, '15_hoalydo.jpg', 'Hoa Ly Đỏ', 100000.00, 95000.00, 30, 1, 1),
(16, '16_hoalytrang.jpg', 'Hoa Ly Trắng', 105000.00, 100000.00, 25, 1, 1),
(17, '17_hoalyvang.jpg', 'Hoa Ly Vàng', 110000.00, 102000.00, 20, 1, 1),
(18, '18_hoadongtiendo.jpg', 'Hoa Đồng Tiền Đỏ', 25000.00, 20000.00, 200, 1, 1),
(19, '19_hoadongtienvang.jpg', 'Hoa Đồng Tiền Vàng', 26000.00, 21000.00, 180, 1, 1),
(20, '20_hoadongtienhong.jpg', 'Hoa Đồng Tiền Hồng', 27000.00, 22000.00, 160, 1, 1),
(21, '21_hoatulipdo.jpg', 'Hoa Tulip Đỏ', 95000.00, 90000.00, 50, 1, 1),
(22, '22_hoatulipvang.jpg', 'Hoa Tulip Vàng', 97000.00, 92000.00, 45, 1, 1),
(23, '23_hoatuliphong.jpg', 'Hoa Tulip Hồng', 98000.00, 93000.00, 40, 1, 1),
(24, '24_hoatuliptrang.jpg', 'Hoa Tulip Trắng', 99000.00, 94000.00, 35, 1, 1),
(25, '25_hoamaudonhong.jpg', 'Hoa Mẫu Đơn Hồng', 150000.00, 140000.00, 20, 1, 1),
(26, '26_hoamaudontrang.jpg', 'Hoa Mẫu Đơn Trắng', 160000.00, 150000.00, 15, 1, 1),
(27, '27_hoaoaihuong.jpg', 'Hoa Oải Hương', 70000.00, 65000.00, 50, 1, 1),
(28, '28_hoadaquy.jpg', 'Hoa Dã Quỳ', 30000.00, 25000.00, 70, 1, 1),
(29, '29_hoaluuly.jpg', 'Hoa Lưu Ly', 60000.00, 55000.00, 40, 1, 1),
(30, '30_hoathuocduoc.jpg', 'Hoa Thược Dược', 50000.00, 45000.00, 60, 1, 1),
(31, '31_hoaanhdao.jpg', 'Hoa Anh Đào', 200000.00, 190000.00, 10, 1, 1),
(32, '32_hoaphonglanrung.jpg', 'Hoa Phong Lan Rừng', 180000.00, 170000.00, 12, 1, 1),
(33, '33_hoangoclan.jpg', 'Hoa Ngọc Lan', 25000.00, 20000.00, 100, 1, 1),
(34, '34_hoagiayhong.jpg', 'Hoa Giấy Hồng', 20000.00, 15000.00, 150, 1, 1),
(35, '35_hoagiaytim.jpg', 'Hoa Giấy Tím', 22000.00, 17000.00, 120, 1, 1),
(36, '36_hoagiaytrang.jpg', 'Hoa Giấy Trắng', 23000.00, 18000.00, 110, 1, 1),
(37, '37_hoalai.jpg', 'Hoa Lài', 15000.00, 10000.00, 200, 1, 1),
(38, '38_hoamaivang.jpg', 'Hoa Mai Vàng', 120000.00, 110000.00, 20, 1, 1),
(39, '39_hoadaohong.jpg', 'Hoa Đào Hồng', 130000.00, 120000.00, 18, 1, 1),
(40, '40_hoadaotrang.jpg', 'Hoa Đào Trắng', 135000.00, 125000.00, 15, 1, 1),
(41, '41_hoasutrang.jpg', 'Hoa Sứ Trắng', 40000.00, 35000.00, 70, 1, 1),
(42, '42_hoasuhong.jpg', 'Hoa Sứ Hồng', 42000.00, 37000.00, 60, 1, 1),
(43, '43_hoadambutdo.jpg', 'Hoa Dâm Bụt Đỏ', 30000.00, 25000.00, 90, 1, 1),
(44, '44_hoadambutvang.jpg', 'Hoa Dâm Bụt Vàng', 32000.00, 27000.00, 80, 1, 1),
(45, '45_hoadambuthong.jpg', 'Hoa Dâm Bụt Hồng', 33000.00, 28000.00, 70, 1, 1),
(46, '46_hoatramydo.jpg', 'Hoa Trà My Đỏ', 50000.00, 45000.00, 60, 1, 1),
(47, '47_hoatramytrang.jpg', 'Hoa Trà My Trắng', 52000.00, 47000.00, 55, 1, 1),
(48, '48_hoatramyhong.jpg', 'Hoa Trà My Hồng', 54000.00, 49000.00, 50, 1, 1),
(49, '49_hoaluulytim.jpg', 'Hoa Lưu Ly Tím', 60000.00, 55000.00, 40, 1, 1),
(50, '50_hoahuongduong.jpg', 'Hoa Hướng Dương', 25000.00, 20000.00, 100, 1, 1),
(51, '1760157134_favicon.ico', 'Hoa', 54675.00, 7.00, 657, 1, 2),
(52, '1760756511_Screenshot 2025-10-12 105219.png', '', 0.00, 0.00, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settingwebsite`
--

CREATE TABLE `settingwebsite` (
  `websiteID` int(11) NOT NULL,
  `websiteName` varchar(255) DEFAULT NULL,
  `ShopAddress` text DEFAULT NULL,
  `Hotline` varchar(15) DEFAULT NULL,
  `EmailContact` varchar(255) DEFAULT NULL,
  `FacebookLink` varchar(255) DEFAULT NULL,
  `Logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `settingwebsite`
--

INSERT INTO `settingwebsite` (`websiteID`, `websiteName`, `ShopAddress`, `Hotline`, `EmailContact`, `FacebookLink`, `Logo`) VALUES
(1, 'Floral the best floral shop in town', '65 Huỳnh Thúc Kháng, phường Sài Gòn, TP.HCM', '0909123456', 'contact@floralshop.vn', 'https://facebook.com/floralshop', 'floral.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `UserType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Email`, `Password`, `Phone`, `Address`, `City`, `Country`, `UserType`) VALUES
(1, 'nguyenvana', 'nguyenvana@example.com', 'password123', '0912345678', '123 Nguyen Trai', 'Hanoi', 'Vietnam', 1),
(2, 'lethib', 'lethib@example.com', 'password456', '0987654321', '456 Tran Hung Dao', 'Ho Chi Minh', 'Vietnam', 2),
(3, 'phamvantam', 'phamvantam@example.com', 'password789', '0909112233', '789 Le Loi', 'Da Nang', 'Vietnam', 3),
(4, 'tranthithu', 'tranthithu@example.com', 'passwordabc', '0978901234', '321 Hai Ba Trung', 'Hanoi', 'Vietnam', 3),
(5, 'hoangminh', 'hoangminh@example.com', 'passwordxyz', '0965432109', '654 Dien Bien Phu', 'Ho Chi Minh', 'Vietnam', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrdersID`),
  ADD KEY `fk_orders_user` (`UserID`),
  ADD KEY `fk_orders_product` (`ProductID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_Product_Category` (`CategoryID`);

--
-- Chỉ mục cho bảng `settingwebsite`
--
ALTER TABLE `settingwebsite`
  ADD PRIMARY KEY (`websiteID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `EMAIL` (`Email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrdersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `settingwebsite`
--
ALTER TABLE `settingwebsite`
  MODIFY `websiteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_product` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_Category` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
