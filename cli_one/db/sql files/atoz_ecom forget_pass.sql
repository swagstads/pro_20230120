-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 04:05 PM
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
-- Database: `atoz_ecom`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `addressline1`, `addressline2`, `city`, `state`, `zip`, `timestamp`, `modified_on`, `status`, `deleted_on`) VALUES
(39, 52, 'Address line 1', 'Address line 2', 'Mumbai', 'Maharashtra', '400065', '2023-03-08 12:08:51', '2023-03-08 12:08:51', 'primary', NULL),
(40, 8, 'bldg number', 'street name', 'mumbai', 'Maharashtra', '400056', '2023-03-08 12:19:22', '2023-03-08 12:19:22', 'primary', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantity` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` enum('in cart','ordered') COLLATE utf8_bin NOT NULL DEFAULT 'in cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `status`) VALUES
(11, '8', '19', '1', 'in cart'),
(12, '8', '20', '1', 'in cart'),
(17, '8', '34', '1', 'in cart'),
(18, '8', '33', '1', 'in cart'),
(27, '59', '29', '1', 'in cart');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category_img` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` enum('active','delete') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chairs', '1.png', 'delete', '2023-02-12 18:02:09', '2023-02-12 18:10:15'),
(2, 'Sets', '1.jpg', 'delete', '2023-02-12 18:08:08', '2023-02-12 18:08:08'),
(3, 'Sofasets', '3.jpeg', 'delete', '2023-02-12 18:08:36', '2023-02-21 18:05:45'),
(4, 'Table', '4.png', 'active', '2023-02-13 16:35:26', '2023-02-13 16:35:26'),
(5, 'rugs', '5.jpg', 'active', '2023-02-13 17:04:28', '2023-02-13 17:04:28'),
(6, 'Robe', '6.jpg', 'delete', '2023-02-13 17:04:35', '2023-02-13 17:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `subject` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `message` varchar(2048) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` enum('Pending','Read','Replied') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `status`, `added_on`, `modified_on`, `deleted_on`) VALUES
(1, 'Garv', 'garv@atoz.com', 'Test', 'trial', 'Replied', '2023-01-26 22:15:05', '2023-02-21 12:41:20', '2023-01-16 22:15:13'),
(2, 'GRJ', 'garvjhangiani@gmail.com', 'Test second', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Read', '2023-01-26 16:45:00', '2023-02-22 02:31:42', '2023-01-26 16:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `old` varchar(255) NOT NULL,
  `new` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verification_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`id`, `user_id`, `old`, `new`, `timestamp`, `verification_code`) VALUES
(7, 66, '$2y$10$sWOKZ/nwOUHBydxycYBm3OcpUH4IiBHmc0S0V41EUJKoSlMuqaIUe', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 06:54:21', 'a0b4974ae262dbe9e53267cd7094f088e997aca0'),
(8, 66, '$2y$10$sWOKZ/nwOUHBydxycYBm3OcpUH4IiBHmc0S0V41EUJKoSlMuqaIUe', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 06:55:36', '8e131e4afaa7a2785755dea8c8a2d7a4976ff3f0'),
(9, 66, '$2y$10$sWOKZ/nwOUHBydxycYBm3OcpUH4IiBHmc0S0V41EUJKoSlMuqaIUe', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 06:59:30', '0f813df4052b8df8ef9443a278eeab8ccfbc45e8'),
(10, 66, '$2y$10$sWOKZ/nwOUHBydxycYBm3OcpUH4IiBHmc0S0V41EUJKoSlMuqaIUe', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 07:01:29', 'ddd9093c3baca75bcf9fff498c63cd0fc3f31022'),
(11, 66, '$2y$10$sWOKZ/nwOUHBydxycYBm3OcpUH4IiBHmc0S0V41EUJKoSlMuqaIUe', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 07:01:57', 'd2aaa92200d5da9d7557f0b8f210f19a2660fe60'),
(12, 66, '$2y$10$3lbifnjFrJvRkDutpQqjiearK1gdPPJ.5kz12CNfedDr66Q3ilOum', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 07:20:14', '6492b9bc79920b9b69731852c61d4fc85d50dcc4'),
(13, 66, '$2y$10$OhbB86MnaWGBsoUMkfzAKOSq36gC.rW21u9W6smZZnT8mGi/ILEu6', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 07:22:47', '533f2f2fd8c61e7402b305cee70b5ad6d512f2b9'),
(14, 66, '$2y$10$OhbB86MnaWGBsoUMkfzAKOSq36gC.rW21u9W6smZZnT8mGi/ILEu6', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 07:23:37', '67cc49d914a2205dfb05bbc664691d39847e6081'),
(15, 66, '$2y$10$XPB8w5Gn0nDLuHO8lqnCe.bZYiaI6EUAqKMKgd/9IQYMK2TIDtSnm', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:04:31', '679eeb00c68ccf8f14ae6f9aab7f1e86fcf74ada'),
(16, 66, '$2y$10$XPB8w5Gn0nDLuHO8lqnCe.bZYiaI6EUAqKMKgd/9IQYMK2TIDtSnm', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:05:03', '6f2e7009a3e65fd435d2a3fff6ba3044627f7ca7'),
(17, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:12:00', '765e22518cc0cd742f307b749ddf85f173574d10'),
(18, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:12:04', 'a46d00ec7eb785ac572636990a76c294710b05bd'),
(19, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:22:41', '6083554475282932912cb1db3fa44f62666c2a51'),
(20, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:25:46', '8e30427e7499b64bbfac798054994670dd7edf28'),
(21, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:26:18', '0dfed8408c94a77f4b84f35d67c082c681a5dfc2'),
(22, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:27:10', 'f8c5870345c00aa73e5050eaae464faa9d32400e'),
(23, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:34:17', '5215a971b5ba123497d3ffdd76221b0a14312b0f'),
(24, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:35:02', '0578caaaa00d1be6d1ffe55663cbc5e888d0456e'),
(25, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:35:42', '0ceae344d784be61ea78030bfec142911ef7e902'),
(26, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:35:57', '2f0951bffd2a34b701f2ab5bcad7a89a62a29736'),
(27, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:37:58', 'b9b5ef6165aa8f74cd4bd6e2df2a19a6042fa3db'),
(28, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 08:39:21', 'cf57275ff7e51467ca4c63a5bf7059a573ca6ea8'),
(29, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 09:56:01', '98fd2c9e9209de4971f7e6dbd14a83feff5059a0'),
(30, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 09:57:03', 'e622f50bd7d37d2b0dffe25dd4d2c58336700241'),
(31, 66, '$2y$10$O45YuHMFCjjOWjVY1Ih7d.W91SeL0ZDi/VcbK/uRk4HpgZLjXq.CO', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '2023-03-09 10:41:37', 'de0cd6c0cdcfa48e57587424ce83d8902f4983c4');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantity` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` enum('Approved','In Transit','Delivered','Cancelled') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` datetime NOT NULL,
  `cancellation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `status`, `order_date`, `delivery_date`, `cancellation_date`) VALUES
(1, '8', '1', '2', 'Approved', '2023-01-26 22:21:37', '2023-01-29 00:00:00', '2023-01-27 00:00:00'),
(2, '8', '2', '4', 'In Transit', '2023-01-25 22:21:42', '2023-02-01 22:21:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int NOT NULL,
  `user_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `user_id`, `time`, `token`) VALUES
(1, '1', '2023-01-23 10:45:29', 'd28ea2957f53725251b4afbbef1cf0bb'),
(2, '1', '2023-01-29 15:47:31', 'ebb4190a8d0033190f2991f346963a43'),
(3, '1', '2023-01-29 16:25:35', 'dfc857cdb5de24a6580a3005d4c28b6c'),
(4, '1', '2023-01-29 16:25:45', '140a10d8a2076d47d018e288beb6372e'),
(5, '1', '2023-01-29 16:26:21', '04647b820cd64f96ffbb646fb6523114'),
(6, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(7, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(8, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(9, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(10, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(11, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(12, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(13, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(14, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(15, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(16, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(17, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(18, '1', '0000-00-00 00:00:00', '0af148ba85a881e02cb63b9bb8f8cfea'),
(19, '1', '2023-01-29 17:23:44', 'fc253e139f02e15704494e9279aace7f'),
(20, '1', '2023-01-29 17:28:23', 'a6bcc95b9d1e2c5d4340457f417e5a49'),
(21, '1', '2023-01-29 17:47:19', 'ac68abc9a6d773c8a37452fc3cec1590'),
(22, '1', '2023-01-29 17:48:31', 'd05b267e8b0850985d0230aa3527c00b'),
(23, '1', '2023-01-29 17:49:43', '44a84a50463312c82a57a4546fa06c64'),
(24, '1', '2023-01-29 17:52:20', '56690ab7b652271abdae40dcefa0df04'),
(25, '1', '2023-01-29 17:54:01', '9d584e95559ffcf445a07eabbf8a2262'),
(26, '1', '2023-01-29 18:01:37', '6675f538d90b1d06e181f179edcc8b50'),
(27, '1', '2023-01-29 18:02:40', '9d803e9ce058e8eeb6200c7556ab5104'),
(28, '1', '2023-01-29 18:11:14', 'cb6066627fa923758c1e7a8c5eed3e4e'),
(29, '1', '2023-01-29 18:11:17', '07bcb09147595b9cf33806987e370fc8'),
(30, '1', '2023-01-29 18:55:15', 'e2c2c4823cb706c2309f0316316fae6b'),
(31, '1', '2023-01-30 05:49:42', 'd81198db1d6e67b5fc9b96c84d4c3e5f'),
(32, '1', '2023-01-30 06:12:05', 'd16e8024e85f99ac2d2b06b7001feef3'),
(0, '53', '2023-02-21 20:31:59', '13281300111100af3d7755598f8e12a7');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `product_id`, `sender`, `timestamp`) VALUES
(1, 0, 1, 1, '2023-02-14 16:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `mrp` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `color` varchar(7) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` enum('active','inactive','deleted') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantity` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `added_by` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `click_count` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `mrp`, `color`, `category_id`, `status`, `quantity`, `added_by`, `added_on`, `modified_on`, `click_count`) VALUES
(5, 'classical', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam numquam? Ipsam doloribus quidem dolorum fugit ut delectus debitis, asperiores suscipit dolorem, non adipisci.\n    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam numquam? Ipsam doloribus quidem dolorum fugit ut delectus debitis, asperiores suscipit dolorem, non adipisci.\n    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam numquam? Ipsam doloribus quidem dolorum fugit ut delectus debitis, asperiores suscipit dolorem, non adipisci.\n    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam numquam? Ipsam doloribus quidem dolorum fugit ut delectus debitis, asperiores suscipit dolorem, non adipisci.\n    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam numquam? Ipsam doloribus quidem dolorum fugit ut delectus debitis, asperiores suscipit dolorem, non adipisci.\n    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam numquam? Ipsam doloribus quidem dolorum fugit ut delectus debitis, asperiores suscipit dolorem, non adipisci.\n', 5000, '8000', '', '5', 'active', '6', 'malav@atoz.com', '2023-02-12 17:33:52', '2023-02-19 16:53:00', 6),
(6, 'ethnic', 'Color tets', 200, '100000', '#007bff', '2', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 3),
(16, 'ethnic', 'test description', 2004, '100000', '#007bff', '3', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(17, 'classical', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam num\r\n', 5000, '8000', '', '4', 'active', '6', 'malav@atoz.com', '2023-02-12 17:33:52', '2023-02-19 16:53:00', 52),
(18, 'ethnic', 'bed and bath', 200, '100000', '#007bff', '5', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 11),
(19, 'ethnic', 'test description', 2004, '100000', '#007bff', '6', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(20, 'classical', '    Lorem ipsum dolor sit amet consectetur, adipisicing consectetur, adipisicing eli', 5000, '8000', '', '1', 'active', '6', 'malav@atoz.com', '2023-02-12 17:33:52', '2023-02-19 16:53:00', 5),
(21, 'ethnic', 'Color tets', 200, '100000', '#007bff', '2', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(22, 'ethnic', 'test description', 2004, '100000', '#007bff', '2', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(23, 'classical', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam num\r\n', 5000, '8000', '', '3', 'active', '6', 'malav@atoz.com', '2023-02-12 17:33:52', '2023-02-19 16:53:00', 5),
(24, 'ethnic', 'Color tets', 200, '100000', '#007bff', '4', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(25, 'ethnic', 'test description', 2004, '100000', '#007bff', '6', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(26, 'classical', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam numquam? Ipsam doloribus quidem dolorum fugit ut delectus debitis, asperiores suscipit dolorem, non adipisci.\r\n   ', 5000, '8000', '', '5', 'active', '6', 'malav@atoz.com', '2023-02-12 17:33:52', '2023-02-19 16:53:00', 5),
(27, 'ethnic', 'Color tets', 200, '100000', '#007bff', '5', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(28, 'ethnic', 'test description', 2004, '100000', '#007bff', '1', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(29, 'classical', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam num\r\n', 5000, '8000', '', '2', 'active', '6', 'malav@atoz.com', '2023-02-12 17:33:52', '2023-02-19 16:53:00', 5),
(30, 'ethnic', 'Color tets', 200, '100000', '#007bff', '3', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(31, 'ethnic', 'test description', 2004, '100000', '#007bff', '4', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(32, 'classical', '    Lorem ipsum dolor sit amet consectetur, adipisicing consectetur, adipisicing eli', 5000, '8000', '', '5', 'active', '6', 'malav@atoz.com', '2023-02-12 17:33:52', '2023-02-19 16:53:00', 5),
(33, 'ethnic', 'Color tets', 200, '100000', '#007bff', '1', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(34, 'ethnic', 'test description', 2004, '100000', '#007bff', '3', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(35, 'classical', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus quasi architecto magnam, odio voluptas neque aliquam num\r\n', 5000, '8000', '', '2', 'active', '6', 'malav@atoz.com', '2023-02-12 17:33:52', '2023-02-19 16:53:00', 5),
(36, 'ethnic', 'Color tets', 200, '100000', '#007bff', '5', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10),
(37, 'ethnic', 'test description', 2004, '100000', '#007bff', '4', 'active', '3', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45', 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `mrp` float NOT NULL,
  `price` float DEFAULT NULL,
  `img_location` varchar(255) DEFAULT NULL,
  `click_count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `quantity`, `description`, `mrp`, `price`, `img_location`, `click_count`) VALUES
(17, 'cushion covers', 'Leaves', 10, 'Blue and Green Floral Cushion Cover', 500, 15.99, 'img/cushion_cover.jpg', 6),
(18, 'Rugs', 'abstract', 1, 'Beige and Black Area Rug', 150, 99.99, 'img/rug.jpg', 6),
(19, 'Rugs', 'leaves', 10, 'Soft and Cozy Plush Robe', 1000, 39.99, 'img/robe.jpg', 4),
(20, 'Rugs', 'classical', 10, 'Light Filtering White Curtains', 1030, 24.99, 'img/curtains.jpg', 1),
(33, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 300, 15.99, 'img/cushion_cover.jpg', 3),
(34, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 1400, 99.99, 'img/rug.jpg', 1),
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
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `id` int NOT NULL,
  `product_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `product_id`, `image_name`, `added_on`) VALUES
(1, '18', 'blinds.jpg', '2023-01-30 21:06:50'),
(4, '18', 'floor.jpg', '2023-02-02 06:05:37'),
(6, '18', 'towel.jpg', '2023-02-12 17:33:52'),
(9, '18', 'carpet.jpg', '2023-02-21 17:39:10'),
(10, '6', 'wallpaper.jpg', '2023-02-21 18:01:53'),
(11, '6', 'robe.jpg', '2023-02-21 18:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int NOT NULL,
  `email` varchar(900) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(900) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '25d55ad283aa400af464c76d713c07ad',
  `fullname` varchar(900) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role` enum('Admin','Editor','Standard','Delete') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'Standard',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`, `fullname`, `role`, `created_at`, `updated_at`) VALUES
(1, 'garv@atoz.com', '25d55ad283aa400af464c76d713c07ad', 'Garv Jhangiani', 'Admin', '2022-01-10 23:01:49', '2022-01-10 23:01:49'),
(2, 'sristi@atoz.com', '25d55ad283aa400af464c76d713c07ad', 'Sristi Sharma', 'Admin', '2022-06-25 14:11:29', '2022-06-25 14:11:29'),
(3, 'malav@atoz.com', '25d55ad283aa400af464c76d713c07ad', 'Malav', 'Admin', '2023-01-20 18:21:16', '2023-01-20 18:21:16'),
(5, 'rishabhpnahar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Rishabh', 'Admin', '2023-02-13 17:09:17', '2023-02-13 17:09:17');

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
  `address` varchar(100) DEFAULT NULL,
  `role` enum('customer','admin') NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_on` timestamp NULL DEFAULT NULL,
  `status` enum('active','dormant','deleted','removed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `added_on`, `modified_on`, `deleted_on`, `status`) VALUES
(8, 'Rishabh', 'rishabhnahar@gmail.com', '$2y$10$X1zyI2Q6ddbMPQIf5iQvgOAg6rV5bDuNa3EQjOxsdsDrd8Jf4khiK', '99879990097', 'bldg number, street name, mumbai, Maharashtra, 400056', 'customer', '2023-03-08 12:19:22', '2023-02-21 19:53:13', NULL, 'active'),
(52, 'Rishabh Nahar', 'rishabhn@gmail.com', '$2y$10$zEkh37gtkA9cgue9FSaTVeVKdcGxhSBDA5xVHbqI1DvdCvCIvLphW', '9191919191', NULL, 'customer', '2023-02-21 19:28:50', '2023-02-21 19:28:50', NULL, 'deleted'),
(55, 'Rishabh Nahar', 'malavshah166@gmail.com', '$2y$10$WpuVxeAe8EI.mzTXg0o66eHRoYRS5cw7jvuSmm.VFLCwyLDpngeUm', '9999999996', NULL, 'customer', '2023-02-04 04:05:52', '2023-02-04 04:05:52', NULL, 'active'),
(56, 'Rishabh Nahar', 'rishabhnahar1239095@gmail.com', '$2y$10$g1dzNYC7ciiRw9ocSc193uG3yGlhmn0luSuKtxbA7Zryn.vDBGqLW', '8080808080', NULL, 'customer', '2023-02-05 01:57:25', '2023-02-05 01:57:25', NULL, 'dormant'),
(58, 'Rishabh Nahar', 'rishabhn1@gmail.com', '$2y$10$xoKx59b1WqqqCOt0CJp4ieaX3YeBfqMBiC96xW13h3aAhr0XIredq', '9090909092', NULL, 'customer', '2023-02-11 10:33:22', '2023-02-11 10:33:22', NULL, 'dormant'),
(59, 'Rishabh Nahar', 'rishabhnhar@gmail.com', '$2y$10$iQZ8JGNRW3cmS0UE/Pq4IOuy2/lQ5oElx7cW7KoAe4upOuWtniFmO', '9987990090', '123 Dahisar bldg, jgjg, mumbai, maharashtra, 400056', 'customer', '2023-02-24 11:00:50', '2023-02-12 04:40:17', NULL, 'active'),
(60, 'Rishabh Nahar', 'rishabh-nahar@gmail.com', '$2y$10$9Dc0av2k8JFNRjqJkWUFyefcvEvg8C7arTWIrPH0CwPwCLOquQ1mG', '9987990094', NULL, 'customer', '2023-02-12 05:14:29', '2023-02-12 05:14:29', NULL, 'active'),
(61, 'tanisha richawara', 'tanisharichawara12@gmail.com', '$2y$10$ourDBBuC1x/UonbowObjuOH1pJZ7dgaGdwVV/1pJ1w9gpKFvdOwIe', '1234567890', NULL, 'customer', '2023-02-15 07:37:58', '2023-02-15 07:37:58', NULL, 'dormant'),
(62, 'tanisha richawara', 'richawara2002@gmail.com', '$2y$10$vMk3WcF.PUFm0uwligI98ONEl/GCod4tV5gCpWwP6UoApBcW36pUC', '1234567891', NULL, 'customer', '2023-02-15 07:40:35', '2023-02-15 07:40:35', NULL, 'active'),
(63, 'Taneehsa', 'richawaratanisha2004@gmail.com', '$2y$10$Majsl7MjWH3y11T4DW5c.O8d/PHPFsQQM4AXASbG17NOF8taQuDca', '1234567895', 'jain coloney, , mumbai, MH, ', 'customer', '2023-02-16 03:13:42', '2023-02-16 03:13:42', NULL, 'active'),
(65, 'sanskriti sharma', 'sanskritisharma2002@gmail.com', '$2y$10$E13O6tIrjgoo9FRDbAxsEetxUyR0qE8hBHLGiu4EQd1wAB7G6do76', '8291747186', NULL, 'customer', '2023-02-16 03:20:55', '2023-02-16 03:20:55', NULL, 'active'),
(66, 'Rishabh', 'rishabhpnahar@gmail.com', '$2y$10$XIpTreFOMZRZeitwpnUKWumGTxgfdSp2ou8gnlG7SwA6Zi1s/7hCO', '9987990097', NULL, 'customer', '2023-03-09 10:42:13', '2023-02-16 14:28:52', NULL, 'active'),
(67, '\"Malav', 'malav@atoz.com', '$2y$10$eptUNXQuOAUvcTfkW0ZaN.zzvOVTdCVN0oyoUtBVU3qKRv/I8tP4G', '1212121212', NULL, 'customer', '2023-02-21 12:08:24', '2023-02-21 12:08:24', NULL, 'removed'),
(68, 'Malav Shah', 'shahmalav1999@gmail.com', '$2y$10$MW2jKjssYDiUuNBBNoMK8e1y7asGso6ibndJSUuxTYOASkezysokC', '9892827779', 'malav 2/10, 11425, mumbai, maharashtra, 400004', 'customer', '2023-02-21 12:07:31', '2023-02-21 07:33:21', NULL, 'active'),
(88, 'rishabh', 'rishabhnahar1202@gmail.com', '$2y$10$ebV1QLrXy6OFNOVQcc2ukOwwZGhyx1x.pRR8mmB4QZc9BwF7CYjL2', '9988776654', NULL, 'customer', '2023-03-09 09:59:52', '2023-03-09 05:29:36', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `verification_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `user_id`, `verify`, `verification_code`) VALUES
(44, 79, 0, 'd158dc6739d591c7f6f5371380b0ffedb97bb8d7'),
(45, 80, 0, 'ce63a598ae3d7e69797b9e909ee54faed1860bb6'),
(46, 81, 1, 'ffcaeac0a70f342eb9bbb93fb8cc658700cf9f2d'),
(47, 82, 1, 'a3cd9e7a5718070f07b7c016ecb092d5fc26e404'),
(48, 83, 0, 'e11a274e23302c7c4a70e49528f675526eba9cdf'),
(49, 84, 1, '229b83f5fdd298b138d64e570dd57f6ea19f9053'),
(50, 85, 0, '7b1756efbe3b678f1017ba09f9ca36868bf5dd16'),
(51, 86, 0, '5c2db470c3b3b6e92456a7de71ad0354677761a8'),
(52, 87, 1, '9ee057c2eece353b8bde9fdc6feb7632848675e2'),
(53, 88, 1, 'a5f3cdeaebab9b6953c4314735d9182986b94688');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int NOT NULL,
  `user_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_id` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_bin;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `time`) VALUES
(1, '59', '15', '2023-02-27 19:22:21'),
(4, '8', '5', '2023-03-06 15:47:39'),
(5, '8', '2', '2023-03-08 11:34:34'),
(6, '8', '6', '2023-03-08 13:26:24');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sender` (`sender`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
