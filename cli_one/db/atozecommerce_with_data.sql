-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 03:22 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atozecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `addressline1` varchar(255) NOT NULL,
  `addressline2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('primary','secondary','deleted') NOT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `addressline1`, `addressline2`, `city`, `state`, `zip`, `timestamp`, `modified_on`, `status`, `deleted_on`) VALUES
(23, 59, '123 Dahisar bldg', 'jgjg', 'mumbai', 'maharashtra', '400056', '2023-02-15 11:28:27', '2023-02-15 11:28:27', 'secondary', NULL),
(26, 59, '123 Virar apt', 'S.V Road', 'Mumbai', 'maharashtra', '400056', '2023-02-15 17:36:11', '2023-02-15 17:37:19', 'secondary', NULL),
(27, 8, '123 Dahisar bldg', 'Naya nagar, Dahisar -east', 'Mumbai', 'Maharashta', '909090', '2023-02-15 17:38:22', '2023-02-15 17:38:22', 'secondary', NULL),
(28, 8, '123 Virar apt.', ',bmj', 'mumbai', 'maha', '400058', '2023-02-15 17:39:05', '2023-02-15 17:39:05', 'secondary', NULL),
(29, 8, '123 Dahisar bldg', ',bmj', 'mumbai', 'maha', '400058', '2023-02-15 17:39:42', '2023-02-15 17:39:42', 'secondary', NULL),
(30, 8, '123 Dahisar bldg', ',sjblashdb', 'mumbai', 'maha', '400058', '2023-02-15 17:41:52', '2023-02-15 17:41:52', 'secondary', NULL),
(31, 63, 'jain coloney', '', 'mumbai', 'MH', '', '2023-02-16 07:46:42', '2023-02-16 07:46:42', 'secondary', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `amount` float DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('ordered','in cart') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `amount`, `quantity`, `message`, `product_id`, `location`, `status`, `timestamp`) VALUES
(127, 8, NULL, 1, 'Message for Cart 1', 17, NULL, 'in cart', '2023-02-19 03:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `added_on`) VALUES
(3, 'Rishabh', 'rishabh@gmail.com', 'Subject', 'THis is messsage', '2023-02-13 02:50:33'),
(4, 'Rishabh', 'rishabh@gmail.com', 'maiin', 'This is feedback message', '2023-02-15 07:52:58'),
(5, 'tanesha', 'richawar@gmail.com', '', '', '2023-02-16 03:18:48'),
(6, 'tanesha', 'richawar@gmail.com', 'tested', 'ok tested', '2023-02-16 03:19:07'),
(7, '', '', '', 'sdad', '2023-02-16 03:20:58'),
(8, 'tanesha', '', '', '', '2023-02-16 03:22:52'),
(9, 'Rishabh', 'rishabh@gmail.com', '998799i', 'jjkj', '2023-02-16 15:21:06'),
(10, 'sda', 'nkn@asj.com', 'jnk', 'jnlnl', '2023-02-16 15:21:56'),
(11, 'sads', 'nkn@asj.com', 'jbkj', 'nlnl', '2023-02-16 15:22:32'),
(12, 'sads', 'nkn@asj.com', 'jbkj', 'nlnl', '2023-02-16 15:22:40'),
(13, 'asdas', 'sdads@gjsa.casda', 'asdaasda', 'dsasdas', '2023-02-16 15:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `cart_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `amount` int NOT NULL,
  `status` enum('pending','shipped','delivered','canceled') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `amount` float DEFAULT NULL,
  `product_id` int NOT NULL,
  `sender` int UNSIGNED NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `mrp` float NOT NULL,
  `price` float DEFAULT NULL,
  `img_location` varchar(255) DEFAULT NULL,
  `click_count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `quantity`, `description`, `mrp`, `price`, `img_location`, `click_count`) VALUES
(17, 'cushion covers', 'Leaves', 10, 'Blue and Green Floral Cushion Cover', 500, 15.99, 'img/cushion_cover.jpg', 5),
(18, 'Rugs', 'abstract', 1, 'Beige and Black Area Rug', 150, 99.99, 'img/rug.jpg', 6),
(19, 'Rugs', 'leaves', 10, 'Soft and Cozy Plush Robe', 1000, 39.99, 'img/robe.jpg', 3),
(20, 'Rugs', 'classical', 10, 'Light Filtering White Curtains', 1030, 24.99, 'img/curtains.jpg', 1),
(33, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 300, 15.99, 'img/cushion_cover.jpg', 2),
(34, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 1400, 99.99, 'img/rug.jpg', 0),
(35, 'Robe', 'Apparel', 3, 'Soft and Cozy Plush Robe', 1030, 39.99, 'img/robe.jpg', 1),
(36, 'Curtains', 'Home Decor', 10, 'Light Filtering White Curtains', 1001, 24.99, 'img/curtains.jpg', 0),
(37, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 1600, 15.99, 'img/cushion_cover.jpg', 0),
(38, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 1200, 99.99, 'img/rug.jpg', 0),
(39, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 1900, 39.99, 'img/robe.jpg', 0),
(40, 'Curtains', 'Home Decor', 10, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg', 0),
(41, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg', 0),
(42, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg', 0),
(43, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg', 0),
(44, 'Curtains', 'Home Decor', 10, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg', 0),
(45, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg', 0),
(46, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg', 0),
(47, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg', 0),
(48, 'Curtains', 'Home Decor', 9, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg', 0),
(49, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg', 0),
(50, 'bed and bath', 'Home Decor', 10, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg', 1),
(51, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg', 0),
(52, 'Curtains', 'Home Decor', 10, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` enum('customer','admin') NOT NULL,
  `added_on` timestamp NOT NULL,
  `modified_on` timestamp NOT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL,
  `status` enum('active','dormant','deleted','removed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `added_on`, `modified_on`, `deleted_on`, `status`) VALUES
(8, 'Rishabh Nahar', 'rishabhnahar@gmail.com', '$2y$10$X1zyI2Q6ddbMPQIf5iQvgOAg6rV5bDuNa3EQjOxsdsDrd8Jf4khiK', '99879990099', '123 Dahisar bldg, ,sjblashdb, mumbai, maha, 400058', 'customer', '2023-02-03 13:33:22', '2023-02-03 13:33:22', NULL, 'active'),
(52, 'Rishabh Nahar', 'rishabhn@gmail.com', '$2y$10$zEkh37gtkA9cgue9FSaTVeVKdcGxhSBDA5xVHbqI1DvdCvCIvLphW', '9191919191', NULL, 'customer', '2023-02-04 02:42:56', '2023-02-04 02:42:56', NULL, 'active'),
(53, 'Rishabh Nahar', 'rishabhnahar123@gmail.com', '$2y$10$5JBSJJF.6tAl01SZWArZ4uvEPp5n5jPtxulneKsVH/sqoOIGAhnBu', '9090909090', NULL, 'customer', '2023-02-04 03:02:14', '2023-02-04 03:02:14', NULL, 'dormant'),
(54, 'Rishabh Nahar', 'rishabhnahar123456@gmail.com', '$2y$10$UeKZbQx60Nq3zM4lxfNDXuBZHYpCvEoZUADru4vZBXICMlJ7uLcGO', '9999999999', NULL, 'customer', '2023-02-04 04:05:09', '2023-02-04 04:05:09', NULL, 'dormant'),
(55, 'Rishabh Nahar', 'malavshah166@gmail.com', '$2y$10$WpuVxeAe8EI.mzTXg0o66eHRoYRS5cw7jvuSmm.VFLCwyLDpngeUm', '9999999996', NULL, 'customer', '2023-02-04 04:05:52', '2023-02-04 04:05:52', NULL, 'active'),
(56, 'Rishabh Nahar', 'rishabhnahar1239095@gmail.com', '$2y$10$g1dzNYC7ciiRw9ocSc193uG3yGlhmn0luSuKtxbA7Zryn.vDBGqLW', '8080808080', NULL, 'customer', '2023-02-05 01:57:25', '2023-02-05 01:57:25', NULL, 'dormant'),
(58, 'Rishabh Nahar', 'rishabhn1@gmail.com', '$2y$10$xoKx59b1WqqqCOt0CJp4ieaX3YeBfqMBiC96xW13h3aAhr0XIredq', '9090909092', NULL, 'customer', '2023-02-11 10:33:22', '2023-02-11 10:33:22', NULL, 'dormant'),
(59, 'Rishabh Nahar', 'rishabhnhar@gmail.com', '$2y$10$iQZ8JGNRW3cmS0UE/Pq4IOuy2/lQ5oElx7cW7KoAe4upOuWtniFmO', '9987990090', '123 Dahisar bldg, asdas, new , new , 70797', 'customer', '2023-02-12 04:40:17', '2023-02-12 04:40:17', NULL, 'active'),
(60, 'Rishabh Nahar', 'rishabh-nahar@gmail.com', '$2y$10$9Dc0av2k8JFNRjqJkWUFyefcvEvg8C7arTWIrPH0CwPwCLOquQ1mG', '9987990094', NULL, 'customer', '2023-02-12 05:14:29', '2023-02-12 05:14:29', NULL, 'active'),
(61, 'tanisha richawara', 'tanisharichawara12@gmail.com', '$2y$10$ourDBBuC1x/UonbowObjuOH1pJZ7dgaGdwVV/1pJ1w9gpKFvdOwIe', '1234567890', NULL, 'customer', '2023-02-15 07:37:58', '2023-02-15 07:37:58', NULL, 'dormant'),
(62, 'tanisha richawara', 'richawara2002@gmail.com', '$2y$10$vMk3WcF.PUFm0uwligI98ONEl/GCod4tV5gCpWwP6UoApBcW36pUC', '1234567891', NULL, 'customer', '2023-02-15 07:40:35', '2023-02-15 07:40:35', NULL, 'active'),
(63, 'Taneehsa', 'richawaratanisha2004@gmail.com', '$2y$10$Majsl7MjWH3y11T4DW5c.O8d/PHPFsQQM4AXASbG17NOF8taQuDca', '1234567895', 'jain coloney, , mumbai, MH, ', 'customer', '2023-02-16 03:13:42', '2023-02-16 03:13:42', NULL, 'active'),
(65, 'sanskriti sharma', 'sanskritisharma2002@gmail.com', '$2y$10$E13O6tIrjgoo9FRDbAxsEetxUyR0qE8hBHLGiu4EQd1wAB7G6do76', '8291747186', NULL, 'customer', '2023-02-16 03:20:55', '2023-02-16 03:20:55', NULL, 'active'),
(66, 'Rishabh', 'rishabhpnahar@gmail.com', '$2y$10$sWOKZ/nwOUHBydxycYBm3OcpUH4IiBHmc0S0V41EUJKoSlMuqaIUe', '9987990097', NULL, 'customer', '2023-02-16 14:28:52', '2023-02-16 14:28:52', NULL, 'dormant'),
(67, 'Rishabh', 'rishabh123$@gmail.com', '$2y$10$HeLT/3DPU2zvvk1Td2k6z.NHHsuD5Mqpnjy6ck7D7QZO9Iy2lbhX.', '1284567891', NULL, 'customer', '2023-02-20 01:18:35', '2023-02-20 01:18:35', NULL, 'dormant');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `verification_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `user_id`, `verify`, `verification_code`) VALUES
(19, 54, 0, '535c7846ebb0a2cd5b62dcac83202e5615c5b5a7'),
(20, 55, 1, '3b0bc08532e60b884362cb8cc2611ea9fc00f46f'),
(21, 56, 0, '8fb1b54ae2644a2bdfe65bfef188875d118a0798'),
(22, 57, 1, '8f88ead3d29dc6f9e04cb580719c5e77da93b61d'),
(23, 58, 0, '8fbfd9ea9bd0ee06b7f7b6aa36f603e093b49a7d'),
(24, 59, 0, '8c2d331e45e88f02f4c4007165c40fc2fe37f2d8'),
(25, 60, 0, '217a87feb9d77fd44e056dee7dbc698c7c87891f'),
(26, 61, 0, '464c70e4a0ce5cefbd44ef1387c7f7d6660501af'),
(27, 62, 1, 'bfeaaf3f276f16286c7743903da3ce269fb81505'),
(28, 63, 1, 'e70be42ef8c96244318aaef1099df2b520da2ccd'),
(30, 65, 1, '59fcca75a150e7d6930b4f915b18be34af93f9b5'),
(31, 66, 0, '3343ebf2387d0062cdfe76b88d85d20da591e9b6'),
(32, 67, 0, '7536f79da6d82f4846c209005a8431d7381a222d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_ibfk_1` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sender` (`sender`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`sender`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
