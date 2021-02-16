-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 11:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectci`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `create_on`) VALUES
(1, 'admin', 'admin', '2020-01-13 07:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `address` varchar(800) NOT NULL,
  `description` longtext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image`, `title`, `address`, `description`, `created_on`) VALUES
(1, '3fac259fecd85edaf4cf215c8986e12b.jpg', 'ef', 'UFLEX LIMITED, A-1, SECTOR 60', '<p>Here goes the initial srrtdescription of the Event...</p>', '2020-02-01 18:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `magazines`
--

CREATE TABLE `magazines` (
  `id` int(10) NOT NULL,
  `pdf` varchar(500) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `magazines`
--

INSERT INTO `magazines` (`id`, `pdf`, `pic`, `title`, `description`, `created_on`) VALUES
(6, 'd1da1a81e02dffc8114b6c1305a20a57.pdf', '7bd54ddedf8a9580f4583ef1bacb18f1.JPG', 'ho gaya', '                                Here goes the initial description of the Magazine...\r\n                            ', '2020-05-16 08:45:52'),
(7, 'e7f41f7248ef736428ce4182d869da46.pdf', '52aa14c405bebcea53f56bc0083f7760.JPG', 'gagan', '<p>Here goes the initial description of the Magazine...</p>', '2020-05-20 14:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `description`, `created_on`) VALUES
(1, '57250aada752d237803ed22d509784fd.jpg', 'ddsfsfgg', '<p>Here goes the initial description of the News...</p>', '2020-02-01 18:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `newsignup`
--

CREATE TABLE `newsignup` (
  `id` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `otp` varchar(500) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsignup`
--

INSERT INTO `newsignup` (`id`, `name`, `number`, `email`, `password`, `otp`, `created_on`) VALUES
(13, 'gagan', '9876543210', 'ankitvarshney1810@gmail.com', '123456', '7645', '2020-05-18 08:36:47'),
(16, 'gagan', '9876543212', 'ankitvarshney12@gmail.com', '1234', '5899', '2020-05-18 10:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `number` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `txnid` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `order_status` varchar(500) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `product_id`, `quantity`, `amount`, `number`, `address`, `txnid`, `payment_status`, `order_status`, `created_on`) VALUES
(1, 'order_EFx5yKoL9qnV3r', '8', '12', '1200', '9058393930', '', '', '', 'order place', '2020-06-03 12:23:25'),
(2, 'order_EG9JDfviAgrN1G', '8', '12', '1200', '9058393930', '', '', '', 'order place', '2020-06-03 12:23:25'),
(3, '9058393930', '8', '12', '8000.33', '1234567890', 'dfghjkl', '1235', 'success', 'order place', '2020-06-03 12:23:25'),
(4, 'order_EGLH8Rc13KgHzc', '9', '2', '8000.0', '9058393930', '', 'pay_EGLHIoe3GCaXiR', 'success', 'order place', '2020-06-03 12:23:25'),
(5, 'order_EGLIt4e17w8WFo', '9', '2', '8000.00', '9058393930', '', 'pay_EGLJ0OUwD5sbej', 'success', 'order place', '2020-06-03 12:23:25'),
(6, '9058393930', '8', '1', '8000.33', '1234567890', 'dfghjkl', '1235', 'success', 'order place', '2020-06-03 12:23:25'),
(7, 'order_EGQ8RpiawZrZIQ', '8', '1', '500.00', '9058393930', '', 'pay_EGQ8cX17KPhq3e', 'success', 'order place', '2020-06-03 12:23:25'),
(8, 'order_EIFOHKiT6eOX3W', '9', '1', '4000.00', '8535015904', '', 'pay_EIFOPzItzlB5Q2', 'success', 'order place', '2020-06-03 12:23:25'),
(9, 'order_EKERwjmh1H86Hc', '8', '2', '1000.00', '8535015904', '', 'pay_EKESArEFgTn7hq', 'success', 'order place', '2020-06-03 12:23:25'),
(11, 'order_ES7kw2jGbiakaF', '8', '2', '1000.00', '9058393930', '', 'pay_ES7lGPQxRbIenv', 'success', 'order place', '2020-06-03 12:23:25'),
(13, 'order_ES7v3fpDdjoP4w', '9', '1', '4000', '8923660497', '', 'pay_ES7vIB1d38qzCS', 'success', 'order place', '2020-06-03 12:23:25'),
(14, 'order_ES7zOFjD0vNY6d', '9', '1', '4000', '8923660497', '', 'pay_ES7zZikmMH0Rt3', 'success', 'order place', '2020-06-05 08:24:27'),
(15, 'order_ES84uuCERdRkjT', '9', '1', '4000', '8923660497', '', 'pay_ES856rV2UGxDcA', 'success', 'order place', '2020-06-05 08:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `passwordotps`
--

CREATE TABLE `passwordotps` (
  `id` int(10) NOT NULL,
  `number` varchar(100) NOT NULL,
  `otp` varchar(100) NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passwordotps`
--

INSERT INTO `passwordotps` (`id`, `number`, `otp`, `create_on`) VALUES
(2, '8439243336', '6295', '2020-05-19 17:21:43'),
(3, '8439243336', '3718', '2020-05-19 17:22:50'),
(4, '8439243336', '3795', '2020-05-19 17:23:48'),
(5, '8439243336', '1514', '2020-05-19 17:23:56'),
(6, '8439243336', '3250', '2020-05-19 17:34:41'),
(7, '8439243336', '9802', '2020-05-19 17:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pic`, `title`, `quantity`, `price`, `content`, `created_on`) VALUES
(8, 'e8c5c4c084badb341a3ea58c5d21a7e8.jpg', 'Best Detective agency in delhi', 994, '500', '<p>Here goes the initial description of the Product...</p>', '2020-03-14 14:01:14'),
(9, 'b646e5a14be24a38c9f142b0fe70359b.jpg', 'Detective Agency in Delhi', 996, '4000', '<p>Here goes the initial description of the Product...</p>', '2020-03-14 14:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_on`) VALUES
(1, '5fdd844fe756665a633b0d5a4263e050.jpg', '2020-02-08 10:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) NOT NULL,
  `number` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `number`, `amount`, `create_on`) VALUES
(3, '8439243336', '8000.00', '2020-02-13 22:52:36'),
(2, '8439243334', '8000.00', '2020-02-13 22:46:29'),
(4, '8439243336', '7000.00', '2020-02-13 23:04:02'),
(5, '843924333', '7000.00', '2020-02-13 23:23:59'),
(6, '9058393930', '5000', '2020-02-14 00:19:37'),
(7, '8535015904', '5000', '2020-02-18 14:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `email`, `password`, `address`, `user_type`, `created_on`) VALUES
(1, 'Ankit Varshney', '8439243336', 'ankitvarshney1810@gmail.com', 'ankit1234', '', 'prime', '2020-02-13 22:52:36'),
(2, 'pankak', '9058393930', 'frankycool0007@gmail.com', '1234', '', 'prime', '2020-02-14 00:19:37'),
(3, 'pankak', '9058393932', 'pankaj.chaudhary@wavecharge.co', '123456', '', '', '2020-02-06 20:32:17'),
(4, 'jai', '8006748873', 'jai@gmail.com', '12345', '', '', '2020-02-07 04:22:00'),
(5, 'yash', '9873550217', 'yashodtyagi1990@gmail.com', 'yash1714', '', '', '2020-02-09 05:28:47'),
(6, 'pankaj', '9087654321', 'abc@abc.com', '123', '', '', '2020-02-11 21:51:52'),
(7, 'yaa', '9873551491', 'yashodtyagi17@gmail.com', '12345', '', '', '2020-02-12 04:24:50'),
(8, 'mayank taliewal', '8535015904', 'mayankt6779@gmail.com', 'mayank', '', 'prime', '2020-02-18 14:58:10'),
(9, 'mk test', '8448371012', 'miteanjaykumar@gmail.com', 'mkzest', '', '', '2020-02-21 13:51:10'),
(10, 'ssss', '9966332255', 'axy@gmail.com', '123456', '', '', '2020-02-21 14:00:56'),
(11, 'Rohit', '8851430790', 'rohitshakya207@gmail.com', '123456', '', '', '2020-02-21 14:34:37'),
(12, 'harish', '8810591991', 'harishsharma714@gmail.com', '1234', '', '', '2020-02-21 14:42:36'),
(13, 'testing ', '9899383816', 'rajnibanduni002@gmail.com', '123456', '', '', '2020-02-21 15:40:15'),
(14, 'Abhishek', '7906187603', 'abc@xyz.com', '1234', '', '', '2020-02-21 16:13:29'),
(15, 'test', '9865325689', 'qodemaker.harsh@gmail.com', '12345678', '', '', '2020-02-21 16:18:52'),
(16, 'Happy', '9632580741', 'happy@mailinator.com', '123456', '', '', '2020-02-21 16:30:16'),
(17, 'Abad', '9456868465', 'mdabad.it@gmail.com', 'secret@123#', '', '', '2020-02-21 20:05:03'),
(18, 'aquib afzal', '9650433734', 'aquibzahidi@gmail.com', 'motiongold', '', '', '2020-02-21 20:10:12'),
(19, 'Vb', '9999663831', 'bharwani@gmail.com', 'livestock', '', '', '2020-02-24 15:27:02'),
(20, 'dm', '9464649979', 'bjjk@jakdk.com', 'asdf', '', '', '2020-02-24 15:41:27'),
(21, 'vinay', '1234567891', 'bsndkd@yahoo.com', '1234', '', '', '2020-02-26 05:48:28'),
(22, 'vinay', '1234567890', 'b@gmail.com', 'qwerty', '', '', '2020-02-26 08:45:06'),
(23, 'rahul', '9874563215', 'j@j.com', '123456', '', '', '2020-03-06 10:12:43'),
(24, 'Muhammad Abad', '8923660497', 'abad.developer@gmail.com', 'secret', '', '', '2020-03-06 15:51:25'),
(25, 'rah', '8956321452', 'g@hj.com', '123456', '', '', '2020-03-08 06:42:31'),
(26, 'Rahul', '9876543216', 'f@f.com', '123456', '', '', '2020-03-08 06:43:49'),
(27, 'rj', '9874563219', 'df@f.com', '123456', '', '', '2020-03-08 08:23:24'),
(28, 'gagan', '9876543211', 'ankitvarshney@gmail.com', '12345678', '', '', '2020-05-18 16:34:59'),
(29, 'gagan', '9837345699', 'ankitvarsh12ney@gmail.com', '12345678', '', '', '2020-05-19 15:27:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `magazines`
--
ALTER TABLE `magazines`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `newsignup`
--
ALTER TABLE `newsignup`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `passwordotps`
--
ALTER TABLE `passwordotps`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `magazines`
--
ALTER TABLE `magazines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsignup`
--
ALTER TABLE `newsignup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `passwordotps`
--
ALTER TABLE `passwordotps`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
