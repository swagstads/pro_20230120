-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2023 at 08:08 PM
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
-- Database: `garvjhan_atoz`
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
(1, '1', '1', '2'),
(2, '1', '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `subject` varchar(128) COLLATE utf8_bin NOT NULL,
  `message` varchar(2048) COLLATE utf8_bin NOT NULL,
  `status` enum('Pending','Read','Replied') COLLATE utf8_bin NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_on` datetime DEFAULT current_timestamp(),
  `deleted_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `status`, `added_on`, `modified_on`, `deleted_on`) VALUES
(1, 'Garv', 'garv@atoz.com', 'Test', 'trial', 'Pending', '2023-01-26 22:15:05', '2023-01-31 12:22:06', '2023-01-16 22:15:13'),
(2, 'GRJ', 'garvjhangiani@gmail.com', 'Test second', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Replied', '2023-01-26 16:45:00', '2023-01-31 12:22:15', '2023-01-26 16:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `product_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `status` enum('Approved','In Transit','Delivered','Cancelled') COLLATE utf8_bin NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `delivery_date` datetime NOT NULL,
  `cancellation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `status`, `order_date`, `delivery_date`, `cancellation_date`) VALUES
(1, '1', '1', '', '2023-01-26 22:21:37', '2023-01-29 00:00:00', '2023-01-27 00:00:00'),
(2, '1', '2', '', '2023-01-25 22:21:42', '2023-02-01 22:21:46', NULL);

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
  `id` int(32) NOT NULL,
  `amount` double NOT NULL,
  `order_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `user_id` int(32) NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `order_id`, `user_id`, `timestamp`) VALUES
(1, 50000, '1', 1, '2023-01-24'),
(2, 500, '2', 2, '2023-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(32) NOT NULL,
  `title` varchar(256) COLLATE utf8_bin NOT NULL,
  `description` mediumtext COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `status` enum('active','inactive','deleted') COLLATE utf8_bin NOT NULL,
  `added_by` varchar(128) COLLATE utf8_bin NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `status`, `added_by`, `added_on`, `modified_on`) VALUES
(1, 'Sofa', 'Test product', 5000, 'active', 'garv@atoz.com', '2023-01-30 22:24:25', '2023-01-30 22:24:25'),
(2, 'Wardrobe', '<p><u>Sample</u> <strong>Wardrobe</strong>&nbsp;</p>\r\n', 15000, 'inactive', 'garv@atoz.com', '2023-01-30 23:47:38', '2023-01-30 23:48:00'),
(3, '$title', '$description', 0, 'active', '$user', '2023-01-30 23:45:59', '2023-01-30 23:45:59');

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
(3, '2', 'Al0JS9dB2t.png', '2023-01-30 23:47:38');

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
(3, 'malav@atoz.com', '25d55ad283aa400af464c76d713c07ad', 'Malav', 'Standard', '2023-01-20 18:21:16', '2023-01-20 18:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(32) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `address` mediumtext COLLATE utf8_bin NOT NULL,
  `role` enum('customer','admin') COLLATE utf8_bin NOT NULL,
  `added_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `deleted_on` date NOT NULL,
  `status` enum('Active','Dormant','Deleted','Removed') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `added_on`, `modified_on`, `deleted_on`, `status`) VALUES
(1, 'Garv', 'garvjhangiani@gmail.com', '', '9022266809', ' djkvfkrvfeknr;ld ;ldw', 'customer', '2023-01-26', '0000-00-00', '2023-01-12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `product_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
