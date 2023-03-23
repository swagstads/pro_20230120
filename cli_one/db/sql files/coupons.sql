-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `code` varchar(128) NOT NULL,
  `amount` varchar(128) NOT NULL,
  `discount_type` enum('cash','percentage') NOT NULL,
  `product_id` varchar(128) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `valid_till` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(128) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `code`, `amount`, `discount_type`, `product_id`, `status`, `valid_till`, `added_by`, `added_on`) VALUES
(1, 'sets', 'SET100', '100', 'cash', '2,4', 'inactive', '2023-03-22 04:33:00', 'garv@atoz.com', '2023-03-16 16:12:33'),
(2, 'Grj', 'GARV', '50', 'cash', '0,3', 'deleted', '0000-00-00 00:00:00', 'malav@atoz.com', '2023-03-22 03:40:58'),
(3, 'tetst', 'TEST', '1000', 'cash', '2', 'deleted', '0000-00-00 00:00:00', 'malav@atoz.com', '2023-03-22 04:11:24'),
(4, 'sets', 'SETS', '15', 'percentage', '2,4', 'deleted', '0000-00-00 00:00:00', 'malav@atoz.com', '2023-03-22 04:31:37'),
(5, 'sets', 'SETSD', '100', 'cash', '2,4', 'deleted', '2023-03-22 04:33:00', 'malav@atoz.com', '2023-03-22 04:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_used`
--

CREATE TABLE `coupon_used` (
  `id` int(11) NOT NULL,
  `coupon_id` varchar(128) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `used_on` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------