-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 01:37 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `addressline1` varchar(255) NOT NULL,
  `addressline2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('primary','secondary','deleted') NOT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `addressline1`, `addressline2`, `city`, `state`, `zip`, `timestamp`, `modified_on`, `status`, `deleted_on`) VALUES
(1, 1, 'TEst', 'test', 'Maharashtra', 'Mumbai', '400004', '2023-03-16 10:44:02', '2023-03-16 10:44:02', 'secondary', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `product_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `quantity` varchar(128) COLLATE utf8_bin NOT NULL,
  `status` enum('in cart','ordered') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `status`) VALUES
(2, '1', '1', '2', 'in cart'),
(3, '1', '14', '1', 'in cart');

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
(1, 'rugs and wallpaper', '1.jpg', 'active', '2023-03-10 11:52:59', '2023-03-15 10:37:17'),
(2, 'floorings', '2.jpg', 'active', '2023-03-10 11:53:37', '2023-03-10 11:53:37'),
(3, 'bed and bath', '3.jpg', 'active', '2023-03-10 11:55:28', '2023-03-10 11:55:28'),
(4, 'blinds', '4.jpg', 'active', '2023-03-10 11:56:13', '2023-03-10 11:56:13'),
(5, 'furnishings', '5.jpg', 'active', '2023-03-11 10:20:38', '2023-03-11 10:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE `clicks` (
  `id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `product_id` int(16) NOT NULL,
  `user_details` varchar(256) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
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
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `status`, `added_on`, `modified_on`, `deleted_on`) VALUES
(1, 'aaa', 'aa@a.com', 'Kakaka', 'aa', 'Pending', '2023-03-16 09:52:25', '2023-03-16 14:22:25', '2023-03-16 14:22:25'),
(2, 'aa', 'malavshah166@gmail.com', 'Aaa', 'Testing', 'Pending', '2023-03-16 09:59:13', '2023-03-16 14:29:13', '2023-03-16 14:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(20) NOT NULL,
  `coup_name` varchar(500) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `added_on` varchar(40) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `coup_name`, `status`, `added_on`) VALUES
(1, 'atoz', 'active', '2023-03-16 16:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `old` varchar(255) NOT NULL,
  `new` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `verification_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`id`, `user_id`, `old`, `new`, `timestamp`, `verification_code`) VALUES
(32, 1, '$2y$10$/JhaRln4yvNwMbYIq5HaM.E4WczItfZ/Y.d.eWZWc05wr5feygiTW', NULL, '2023-03-11 09:01:34', 'f1cd8a640c8f866b77179085165e6db147af7d66'),
(33, 1, '$2y$10$/JhaRln4yvNwMbYIq5HaM.E4WczItfZ/Y.d.eWZWc05wr5feygiTW', NULL, '2023-03-11 09:01:39', '84dc6abc1f22c12bfe0163c34fe34d0f6850f7d6');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `product_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `quantity` varchar(128) COLLATE utf8_bin NOT NULL,
  `status` enum('Approved','In Transit','Delivered','Cancelled') COLLATE utf8_bin NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `delivery_date` datetime NOT NULL,
  `cancellation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `category_id` varchar(128) COLLATE utf8_bin NOT NULL,
  `click_count` int(16) NOT NULL DEFAULT 0,
  `status` enum('active','inactive','deleted') COLLATE utf8_bin NOT NULL,
  `quantity` varchar(128) COLLATE utf8_bin NOT NULL,
  `added_by` varchar(128) COLLATE utf8_bin NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `mrp`, `color`, `category_id`, `click_count`, `status`, `quantity`, `added_by`, `added_on`, `modified_on`) VALUES
(1, 'Plain and Textures', 'Cushion Covers category in plain and textures', 1200, '1300', '', '2', 3, 'active', '50', 'malav@atoz.com', '2023-03-10 11:57:49', '2023-03-10 11:57:49'),
(2, 'Duet Sets', 'These are Duet Sets of cushion cover as well as bedsheets', 2000, '2100', '', '3', 2, 'active', '10', 'malav@atoz.com', '2023-03-11 10:20:19', '2023-03-11 10:20:19'),
(3, 'Bath Robes', 'Amazing Bath robes', 1255, '1300', '', '3', 0, 'active', '0', 'malav@atoz.com', '2023-03-11 10:39:39', '2023-03-11 10:39:39'),
(4, 'Mats', 'Washroom Mats', 100, '88', '', '3', 0, 'active', '11', 'malav@atoz.com', '2023-03-11 10:40:52', '2023-03-11 10:40:52'),
(5, 'Napkin and Towels', 'Napkin and towelsss', 1200, '1200', '', '3', 1, 'active', '12', 'malav@atoz.com', '2023-03-11 10:42:29', '2023-03-11 10:42:29'),
(6, 'Bed Cover', 'Bed Covers', 1222, '133', '', '3', 4, 'active', '12', 'malav@atoz.com', '2023-03-11 10:43:14', '2023-03-11 10:43:14'),
(7, 'Bed Sheets', 'Beautiful Bed Sheets', 130, '152', '', '3', 0, 'active', '50', 'malav@atoz.com', '2023-03-11 10:44:30', '2023-03-11 10:44:30'),
(8, 'Throw', 'This throw are amazing', 100, '120', '', '3', 4, 'active', '10', 'malav@atoz.com', '2023-03-11 10:45:04', '2023-03-11 10:45:04'),
(9, 'Bolsters', 'This bolsters are amazing', 150, '1000', '', '3', 0, 'active', '10', 'malav@atoz.com', '2023-03-11 10:46:42', '2023-03-11 10:46:42'),
(10, 'Quilts', 'This quilts are amazing', 1400, '1500', '', '3', 2, 'active', '10', 'malav@atoz.com', '2023-03-11 10:47:28', '2023-03-11 10:47:28'),
(11, 'Mattress', 'This mattress are amazing', 200, '210', '', '3', 0, 'active', '10', 'malav@atoz.com', '2023-03-11 10:48:22', '2023-03-11 10:48:22'),
(12, 'Comforter', 'This comforter are amazing', 1300, '11111', '', '3', 0, 'active', '12', 'malav@atoz.com', '2023-03-11 10:49:10', '2023-03-11 10:49:10'),
(13, 'Towels', 'This towels are amazing', 1500, '12000', '', '3', 0, 'active', '15', 'malav@atoz.com', '2023-03-11 10:51:36', '2023-03-11 10:51:36'),
(14, 'PVC Flooring', 'This PVC Flooring are amazing', 200, '300', '', '2', 1, 'active', '3', 'malav@atoz.com', '2023-03-11 10:58:30', '2023-03-11 10:58:30'),
(15, 'Wooden flooring', 'This wooden Flooring are amazing', 300, '400', '', '2', 0, 'active', '5', 'malav@atoz.com', '2023-03-11 10:59:19', '2023-03-11 10:59:19'),
(16, 'Gym Flooring', 'This gym Flooring are amazing', 500, '600', '', '2', 0, 'active', '6', 'malav@atoz.com', '2023-03-11 10:59:59', '2023-03-11 10:59:59'),
(17, 'Carpet wall to wall', 'carpet wall to wall', 500, '6000', '', '2', 1, 'active', '8', 'malav@atoz.com', '2023-03-11 11:00:56', '2023-03-11 11:00:56'),
(18, 'Sports Flooring', 'This sports Flooring are amazing', 500, '600', '', '2', 0, 'active', '4', 'malav@atoz.com', '2023-03-11 11:01:49', '2023-03-11 11:01:49'),
(19, 'EVA Foam Mat', 'This EVA are amazing', 1000, '2000', '', '2', 0, 'active', '20', 'malav@atoz.com', '2023-03-11 11:02:31', '2023-03-11 11:02:31'),
(20, 'Grass Flooring ', 'This grass Flooring are amazing', 300, '400', '', '2', 0, 'active', '40', 'malav@atoz.com', '2023-03-11 11:03:25', '2023-03-11 11:03:25'),
(21, 'Tiles Carpet', 'This Tiles are amazing', 2000, '3000', '', '2', 0, 'active', '20', 'malav@atoz.com', '2023-03-11 11:22:04', '2023-03-11 11:22:04'),
(22, 'Roman Blinds', 'This Roman Blinds are amazing', 200, '300', '', '4', 0, 'active', '30', 'malav@atoz.com', '2023-03-11 11:25:02', '2023-03-11 11:25:02'),
(23, 'Roller Blinds', 'This Roler Blinds are amazing', 200, '300', '', '4', 0, 'active', '20', 'malav@atoz.com', '2023-03-11 11:25:46', '2023-03-11 11:25:46'),
(24, 'Zebra Blinds', 'This Zebra Blinds are amazing', 300, '400', '', '4', 0, 'active', '40', 'malav@atoz.com', '2023-03-11 11:26:23', '2023-03-11 11:26:23'),
(25, 'Horizontal Blinds', 'This Horizontal Blinds are amazing', 400, '500', '', '4', 0, 'active', '10', 'malav@atoz.com', '2023-03-11 11:27:28', '2023-03-11 11:27:28'),
(26, 'Honey Comb Blinds ', 'This Honey Comb Blinds are amazing', 2200, '2300', '', '4', 0, 'active', '12', 'malav@atoz.com', '2023-03-11 12:43:59', '2023-03-11 12:43:59'),
(27, 'Vertical Blinds', 'This Vertical Blinds are amazing', 200, '300', '', '4', 0, 'active', '50', 'malav@atoz.com', '2023-03-11 12:44:58', '2023-03-11 12:44:58'),
(28, 'Shower Curtain', 'Shower Curtains in shower', 500, '600', '', '4', 0, 'active', '50', 'malav@atoz.com', '2023-03-11 12:45:37', '2023-03-11 12:45:37'),
(29, 'Motorized Curtain', 'This motorized curtain are amazing ', 500, '600', '', '4', 0, 'active', '50', 'malav@atoz.com', '2023-03-11 12:46:51', '2023-03-11 12:46:51'),
(30, 'MTrack Channel', 'MTrack Channel', 400, '300', '', '4', 0, 'active', '30', 'malav@atoz.com', '2023-03-11 12:48:27', '2023-03-11 12:48:27'),
(31, 'HeadBoard Fabric', 'HeadBoard Fabric are awesome', 500, '600', '', '5', 0, 'active', '50', 'malav@atoz.com', '2023-03-11 12:50:31', '2023-03-11 12:50:31'),
(32, 'Sheer Curtain', 'This are Sheer curtains', 500, '4000', '', '5', 0, 'active', '50', 'malav@atoz.com', '2023-03-11 12:51:10', '2023-03-11 12:51:10'),
(33, 'Tassel', 'The Tassel are awesome', 3000, '4000', '', '5', 0, 'active', '110', 'malav@atoz.com', '2023-03-11 12:51:58', '2023-03-11 12:51:58'),
(34, 'Upholstery', 'This are Upholstery', 7000, '8000', '', '5', 0, 'active', '40', 'malav@atoz.com', '2023-03-11 12:53:03', '2023-03-11 12:53:03'),
(35, 'Artificial Leather ', 'This Artificial Leather are amazing', 4000, '5000', '', '5', 0, 'active', '50', 'malav@atoz.com', '2023-03-11 12:53:54', '2023-03-11 12:53:54'),
(36, 'Curtains', 'This curtains are so amazing', 6000, '7000', '', '5', 0, 'active', '70', 'malav@atoz.com', '2023-03-11 12:56:05', '2023-03-11 12:56:05'),
(37, 'Center Piece carpet', 'This is a Center Piece Carpet', 5000, '9000', '', '1', 0, 'active', '20', 'malav@atoz.com', '2023-03-11 14:13:58', '2023-03-11 14:13:58'),
(38, 'Rugs', 'This are fancy rugs', 5000, '7000', '', '1', 0, 'active', '50', 'malav@atoz.com', '2023-03-11 14:14:52', '2023-03-11 14:14:52'),
(39, 'Fur Carpet', 'Awesome Fur carpe', 500, '700', '', '1', 0, 'active', '10', 'malav@atoz.com', '2023-03-11 14:15:30', '2023-03-11 14:15:30'),
(40, 'Awning', 'This is an amazing Awning', 500, '700', '', '1', 0, 'active', '20', 'malav@atoz.com', '2023-03-11 14:16:41', '2023-03-11 14:16:41'),
(41, 'Wallpaper', 'These are some amazing wallpaper', 500, '700', '', '1', 0, 'active', '10', 'malav@atoz.com', '2023-03-11 14:17:26', '2023-03-11 14:17:26'),
(42, 'Imported Wallpaper', 'This are imported from USA', 500, '700', '', '1', 0, 'active', '10', 'malav@atoz.com', '2023-03-11 14:18:32', '2023-03-11 14:18:32'),
(43, 'Shaggy Carpet', 'This are rugs and have a shaggy outlook', 500, '700', '', '1', 0, 'active', '20', 'malav@atoz.com', '2023-03-11 14:19:13', '2023-03-11 09:51:00'),
(44, 'Tufted Carpet', 'This are tufted carpet rugs', 8000, '9000', '', '1', 0, 'active', '80', 'malav@atoz.com', '2023-03-11 14:24:51', '2023-03-11 14:24:51'),
(45, 'Rugs', 'This are rugs some different kind', 8000, '900', '', '1', 0, 'active', '8', 'malav@atoz.com', '2023-03-11 14:26:16', '2023-03-15 06:04:00');

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
(1, '1', 'LYJYoSsxmC.jpg', '2023-03-10 11:57:49'),
(2, '1', 'D8rkonLGG5.jpg', '2023-03-10 11:57:49'),
(3, '2', 'wg1oz0olVE.jpg', '2023-03-11 10:20:19'),
(4, '2', 'oyG3UH7bKt.jpg', '2023-03-11 10:20:19'),
(5, '3', 'ORNCtiHrC1.jpg', '2023-03-11 10:39:39'),
(6, '4', 'EVa8QaBCTu.jpg', '2023-03-11 10:40:52'),
(7, '5', 'XExT9nCkI7.jpg', '2023-03-11 10:42:29'),
(8, '6', 'mqmmkx5mj9.jpg', '2023-03-11 10:43:14'),
(9, '7', 'E4fLSI2mQS.jpg', '2023-03-11 10:44:30'),
(10, '8', 'Uv2AT1tAMZ.jpg', '2023-03-11 10:45:04'),
(11, '9', 'ifaNcuytWK.jpg', '2023-03-11 10:46:42'),
(12, '9', 'dCYx4dqim8.jpg', '2023-03-11 10:46:42'),
(13, '10', 'vE3FR60bd3.jpg', '2023-03-11 10:47:28'),
(14, '11', 'CFdco8NSmG.jpg', '2023-03-11 10:48:22'),
(15, '12', 'c6IXkvX1Lf.jpg', '2023-03-11 10:49:10'),
(16, '13', '9sQCu3MuKB.jpg', '2023-03-11 10:51:36'),
(17, '13', 'dmjiPC4ABN.jpg', '2023-03-11 10:51:36'),
(18, '13', 'x3ab5aI3wI.jpg', '2023-03-11 10:51:36'),
(19, '13', 'nkmVxbP4jN.jpg', '2023-03-11 10:51:36'),
(20, '14', 'LwgybzWl4w.jpg', '2023-03-11 10:58:30'),
(21, '15', 'YSNpjQeXJg.jpg', '2023-03-11 10:59:19'),
(22, '15', 'HL9nyHtLnA.jpg', '2023-03-11 10:59:19'),
(23, '16', 'gq8YQ2YcDN.jpg', '2023-03-11 10:59:59'),
(24, '17', 'Cq8ywLy7Cg.jpg', '2023-03-11 11:00:56'),
(25, '17', 'Lyrt3JcAlD.jpg', '2023-03-11 11:00:56'),
(26, '18', 'wnGZFk6MPq.jpg', '2023-03-11 11:01:49'),
(27, '18', 'P3yWtKjD6B.jpg', '2023-03-11 11:01:49'),
(28, '19', 'nXSVm2ZgaG.jpg', '2023-03-11 11:02:31'),
(29, '20', '9OeBp49fWR.jpg', '2023-03-11 11:03:25'),
(30, '21', 'uGB8ccDI5l.jpg', '2023-03-11 11:22:04'),
(31, '21', 'WwLcuewDdl.jpg', '2023-03-11 11:22:04'),
(32, '22', 'mYHA999Auf.jpg', '2023-03-11 11:25:02'),
(33, '23', 'cHpGTg0yXw.jpg', '2023-03-11 11:25:46'),
(34, '24', 'pIpK1g9smC.jpg', '2023-03-11 11:26:23'),
(35, '24', 'fM0keuqhDF.jpg', '2023-03-11 11:26:23'),
(36, '25', 'vjfw6RedRP.jpg', '2023-03-11 11:27:28'),
(37, '26', 'tv4kkMjzep.jpg', '2023-03-11 12:43:59'),
(38, '26', 'g7xt970CRN.jpg', '2023-03-11 12:43:59'),
(39, '27', 'NNr1P3VzSQ.jpg', '2023-03-11 12:44:58'),
(40, '27', 'gHOUzUwMFp.jpg', '2023-03-11 12:44:58'),
(41, '28', 'NJnrQWRKhX.jpg', '2023-03-11 12:45:37'),
(42, '29', '1cF2CDR7tQ.jpg', '2023-03-11 12:46:51'),
(43, '30', 'aOQG3ZF9qs.jpg', '2023-03-11 12:48:27'),
(44, '30', 'jtbEuq9XH0.jpg', '2023-03-11 12:48:27'),
(45, '30', 'iqOClunwU7.jpg', '2023-03-11 12:48:27'),
(46, '31', 'LNo7mDbd5T.jpeg', '2023-03-11 12:50:31'),
(47, '31', 'obgXxQMvt4.jpg', '2023-03-11 12:50:31'),
(48, '31', '8U5MNYvOd3.jpg', '2023-03-11 12:50:31'),
(49, '32', 'hKAzF6NGl8.jpg', '2023-03-11 12:51:10'),
(50, '33', 'EUZf1rg2VA.jpg', '2023-03-11 12:51:58'),
(51, '33', 'pKJmoNzdBh.jpg', '2023-03-11 12:51:58'),
(52, '34', 'tzdJACR3xi.jpg', '2023-03-11 12:53:03'),
(53, '34', '0JYjterYUq.jpg', '2023-03-11 12:53:03'),
(54, '35', '1hi6SL8pud.jpeg', '2023-03-11 12:53:54'),
(55, '35', 'QMxcnN3lzf.jpg', '2023-03-11 12:53:54'),
(56, '36', 'NreNrpi6rB.jpg', '2023-03-11 12:56:05'),
(57, '36', '6l8Jlocjds.jpg', '2023-03-11 12:56:05'),
(58, '36', 'aZTAYvOsQF.jpg', '2023-03-11 12:56:05'),
(59, '36', 'NGagbdLB4G.jpg', '2023-03-11 12:56:05'),
(60, '37', 'kS6KpA0Qlf.jpg', '2023-03-11 14:13:58'),
(61, '37', 'zDWKq2ouoT.jpg', '2023-03-11 14:13:58'),
(62, '38', 'MQD2uAuc98.jpg', '2023-03-11 14:14:52'),
(63, '38', 'fd9w3V7wn3.jpg', '2023-03-11 14:14:52'),
(64, '39', 'gQifjQYjUh.jpg', '2023-03-11 14:15:30'),
(65, '40', 'GcK8dmNjB9.png', '2023-03-11 14:16:41'),
(66, '40', 'lKSxS36Btd.jpg', '2023-03-11 14:16:41'),
(67, '40', 'Wa9USuFx33.jpg', '2023-03-11 14:16:41'),
(68, '41', '89nrjTiFGo.jpg', '2023-03-11 14:17:26'),
(69, '42', 'sf720DlnDa.jpg', '2023-03-11 14:18:32'),
(70, '42', 'zzHiYuDGJ2.jpg', '2023-03-11 14:18:32'),
(71, '43', 'LAVrofaONU.jpg', '2023-03-11 14:19:13'),
(72, '44', 'uXJ9TMr4hr.jpg', '2023-03-11 14:24:51'),
(73, '44', 'rH06HwcnWZ.jpg', '2023-03-11 14:24:51'),
(74, '44', 'ts9OTJ3mZa.jpg', '2023-03-11 14:24:51'),
(75, '45', '7UR3IV9JRa.jpg', '2023-03-11 14:26:16'),
(76, '45', 'j1dK7JiXDW.jpg', '2023-03-11 14:26:16');

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
(1, 'malav@atoz.com', '25d55ad283aa400af464c76d713c07ad', 'Test Sub', 'Admin', '2023-03-10 11:34:53', '2023-03-10 11:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `role` enum('customer','admin') NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_on` timestamp NULL DEFAULT NULL,
  `status` enum('active','dormant','deleted','removed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `added_on`, `modified_on`, `deleted_on`, `status`) VALUES
(1, 'Malav Shah', 'shahmalav1999@gmail.com', '$2y$10$/JhaRln4yvNwMbYIq5HaM.E4WczItfZ/Y.d.eWZWc05wr5feygiTW', '8355817127', 'TEst, test, Maharashtra, Mumbai, 400004', 'customer', '2023-03-16 10:44:02', '2023-03-10 01:01:06', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `verification_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `user_id`, `verify`, `verification_code`) VALUES
(1, 1, 1, '72a67e0a4b8250d6becf6f30791abc79b48b5d87');

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
-- Indexes for table `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
