-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2023 at 01:05 PM
-- Server version: 10.5.17-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garvjhan_azfurnish`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `product_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `quantity` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, '52', '1', '2'),
(2, '8', '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `category_img` varchar(128) COLLATE utf8_bin NOT NULL,
  `status` enum('active','delete') COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chairs', '1.png', 'active', '2023-02-12 18:02:09', '2023-02-12 18:10:15'),
(2, 'Sets', '', 'delete', '2023-02-12 18:08:08', '2023-02-12 18:08:08'),
(3, 'Sofasets', '3.jpg', 'active', '2023-02-12 18:08:36', '2023-02-12 18:09:54'),
(4, 'Table', '4.png', 'active', '2023-02-13 16:35:26', '2023-02-13 16:35:26'),
(5, 'Robe', '5.jpg', 'active', '2023-02-13 17:04:28', '2023-02-13 17:04:28'),
(6, 'Robe', '6.jpg', 'delete', '2023-02-13 17:04:35', '2023-02-13 17:04:35'),
(7, 'Robe', '7.jpg', 'delete', '2023-02-13 17:04:42', '2023-02-13 17:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `subject` varchar(100) COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` enum('Pending','Replied','Read') COLLATE utf8_bin NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `status`, `added_on`) VALUES
(3, 'Rishabh', 'rishabh@gmail.com', 'Subject', 'THis is messsage', 'Read', '2023-02-14 12:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` enum('pending','in progress','delivered','canceled') COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `product_id`, `delivery_date`, `location`, `status`) VALUES
(1, '13', 8, 5, '2023-02-17 10:55:11', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(32, '1', '2023-01-30 06:12:05', 'd16e8024e85f99ac2d2b06b7001feef3');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `sender` int(10) UNSIGNED NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `id` int(32) NOT NULL,
  `title` varchar(256) COLLATE utf8_bin NOT NULL,
  `description` mediumtext COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `mrp` varchar(128) COLLATE utf8_bin NOT NULL,
  `color` varchar(7) COLLATE utf8_bin NOT NULL,
  `status` enum('active','inactive','deleted') COLLATE utf8_bin NOT NULL,
  `quantity` varchar(128) COLLATE utf8_bin NOT NULL,
  `added_by` varchar(128) COLLATE utf8_bin NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `mrp`, `color`, `status`, `quantity`, `added_by`, `added_on`, `modified_on`) VALUES
(1, 'Sofa', 'Test product', 5000, '15000', '#000000', 'active', '10', 'garv@atoz.com', '2023-01-30 22:24:25', '2023-01-30 22:24:25'),
(2, 'Wardrobe', '<p><u>Sample</u> <strong>Wardrobe</strong>&nbsp;</p>\r\n', 15002, '30000', '', 'deleted', '15', 'malav@atoz.com', '2023-01-30 23:47:38', '2023-02-02 06:05:00'),
(3, '$title', '$description', 0, '100000', '', 'active', '20', '$user', '2023-01-30 23:45:59', '2023-01-30 23:45:59'),
(5, 'Tset MRP', 'MRP tets', 5000, '150000', '', 'active', '50', 'garv@atoz.com', '2023-02-12 17:33:52', '2023-02-12 17:33:52'),
(6, 'Tets colour', 'Color tets', 200, '10', '#007bff', 'active', '5', 'garv@atoz.com', '2023-02-12 17:46:45', '2023-02-12 17:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mrp` float NOT NULL,
  `price` float DEFAULT NULL,
  `img_location` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `quantity`, `description`, `mrp`, `price`, `img_location`) VALUES
(17, 'cushion covers', 'Leaves', 0, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg'),
(18, 'Rugs', 'abstract', 1, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg'),
(19, 'Rugs', 'leaves', 0, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg'),
(20, 'Rugs', 'classical', 0, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg'),
(33, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg'),
(34, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg'),
(35, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg'),
(36, 'Curtains', 'Home Decor', 10, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg'),
(37, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg'),
(38, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg'),
(39, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg'),
(40, 'Curtains', 'Home Decor', 10, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg'),
(41, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg'),
(42, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg'),
(43, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg'),
(44, 'Curtains', 'Home Decor', 10, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg'),
(45, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg'),
(46, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg'),
(47, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg'),
(48, 'Curtains', 'Home Decor', 0, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg'),
(49, 'Cushion Cover', 'Home Decor', 10, 'Blue and Green Floral Cushion Cover', 100, 15.99, 'img/cushion_cover.jpg'),
(50, 'Rug', 'Home Decor', 10, 'Beige and Black Area Rug', 100, 99.99, 'img/rug.jpg'),
(51, 'Robe', 'Apparel', 10, 'Soft and Cozy Plush Robe', 100, 39.99, 'img/robe.jpg'),
(52, 'Curtains', 'Home Decor', 10, 'Light Filtering White Curtains', 100, 24.99, 'img/curtains.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `id` int(11) NOT NULL,
  `product_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `image_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `product_id`, `image_name`, `added_on`) VALUES
(1, '1', 'sofa.jpg', '2023-01-30 21:06:50'),
(4, '2', 'RW1epuJJsJ.jpg', '2023-02-02 06:05:37'),
(5, '5', 'ZhzGAL9T8t.png', '2023-02-12 17:33:52'),
(6, '5', 'BpLaQjvnSF.jpg', '2023-02-12 17:33:52'),
(7, '6', '3MEBEJPph9.jpg', '2023-02-12 17:46:45'),
(8, '6', '1br5BBWyr5.jpg', '2023-02-12 17:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(900) COLLATE utf8_bin NOT NULL,
  `password` varchar(900) COLLATE utf8_bin NOT NULL DEFAULT '25d55ad283aa400af464c76d713c07ad',
  `fullname` varchar(900) COLLATE utf8_bin NOT NULL,
  `role` enum('Admin','Editor','Standard','Delete') COLLATE utf8_bin NOT NULL DEFAULT 'Standard',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `role` enum('customer','admin') COLLATE utf8_bin NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_on` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Dormant','Deleted','Removed') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `added_on`, `modified_on`, `deleted_on`, `status`) VALUES
(8, 'Rishabh Nahar', 'rishabhnahar@gmail.com', '$2y$10$X1zyI2Q6ddbMPQIf5iQvgOAg6rV5bDuNa3EQjOxsdsDrd8Jf4khiK', '99879990099', '406 rani apt., Dahisar east, Mumbai 400068', 'customer', '2023-02-14 11:41:54', '2023-02-14 11:41:54', NULL, 'Active'),
(52, 'Rishabh Nahar', 'rishabhn@gmail.com', '$2y$10$zEkh37gtkA9cgue9FSaTVeVKdcGxhSBDA5xVHbqI1DvdCvCIvLphW', '9191919191', 'address', 'customer', '2023-02-14 11:37:17', '2023-02-04 02:42:56', NULL, 'Active'),
(53, 'Rishabh Nahar', 'rishabhnahar123@gmail.com', '$2y$10$5JBSJJF.6tAl01SZWArZ4uvEPp5n5jPtxulneKsVH/sqoOIGAhnBu', '9090909090', 'address', 'customer', '2023-02-14 11:37:17', '2023-02-04 03:02:14', NULL, 'Active'),
(54, 'Rishabh Nahar', 'rishabhnahar123456@gmail.com', '$2y$10$UeKZbQx60Nq3zM4lxfNDXuBZHYpCvEoZUADru4vZBXICMlJ7uLcGO', '9999999999', 'address', 'customer', '2023-02-14 11:37:17', '2023-02-04 04:05:09', NULL, 'Active'),
(55, 'Rishabh Nahar', 'malavshah166@gmail.com', '$2y$10$WpuVxeAe8EI.mzTXg0o66eHRoYRS5cw7jvuSmm.VFLCwyLDpngeUm', '9999999996', 'address', 'customer', '2023-02-14 11:37:17', '2023-02-04 04:05:52', NULL, 'Active'),
(56, 'Rishabh Nahar', 'rishabhnahar1239095@gmail.com', '$2y$10$g1dzNYC7ciiRw9ocSc193uG3yGlhmn0luSuKtxbA7Zryn.vDBGqLW', '8080808080', 'address', 'customer', '2023-02-14 11:37:17', '2023-02-05 01:57:25', NULL, 'Active'),
(57, 'Rishabh Nahar', 'rishabhpnahar@gmail.com', '$2y$10$GLX82FEv8StFa/cI6aX5y.CI9iJIKWuB48NmiczDur309V706KvkK', '9892983520', 'address', 'customer', '2023-02-14 11:37:17', '2023-02-05 01:58:13', NULL, 'Active'),
(58, 'Rishabh Nahar', 'rishabhn1@gmail.com', '$2y$10$xoKx59b1WqqqCOt0CJp4ieaX3YeBfqMBiC96xW13h3aAhr0XIredq', '9090909092', 'address', 'customer', '2023-02-14 11:37:17', '2023-02-11 10:33:22', NULL, 'Active'),
(59, 'Rishabh Nahar', 'rishabhnhar@gmail.com', '$2y$10$iQZ8JGNRW3cmS0UE/Pq4IOuy2/lQ5oElx7cW7KoAe4upOuWtniFmO', '9987990097', 'address', 'customer', '2023-02-14 11:37:17', '2023-02-12 04:40:17', NULL, 'Active'),
(60, 'Rishabh Nahar', 'rishabh-nahar@gmail.com', '$2y$10$9Dc0av2k8JFNRjqJkWUFyefcvEvg8C7arTWIrPH0CwPwCLOquQ1mG', '9987990094', '406 bldg name, pincode', 'customer', '2023-02-14 11:37:17', '2023-02-12 05:14:29', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `verification_code` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(25, 60, 0, '217a87feb9d77fd44e056dee7dbc698c7c87891f');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_id` (`order_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
