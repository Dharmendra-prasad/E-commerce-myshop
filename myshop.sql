-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2018 at 03:25 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'dhrmprsd@gmail.com', 'Dkprasad'),
(2, 'anurag@gmail.com', 'Dkprasad');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'Dell'),
(4, 'Samsung'),
(6, 'Motorola'),
(9, 'Compac');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(20) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'Mobiles'),
(4, 'Cameras'),
(6, 'Telivision'),
(10, 'Computers');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(6, 'Dharmendra', 'dhrmprsd@gmail.com', 'Dkprasad', 'India', 'indore', 2987, 'sdkfjl', '7pvBZg0.png', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `product_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `product_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(83, 6, 5600, 5600, 1088103770, 1, '2018-09-07 19:16:34', 'complete'),
(84, 6, 56000, 56000, 1876063098, 1, '2018-09-07 19:17:27', 'complete'),
(85, 6, 5600, 5600, 1729900789, 1, '2018-09-07 19:28:42', 'complete'),
(86, 6, 5600, 5600, 775096247, 1, '2018-09-07 22:02:40', 'complete'),
(87, 6, 5600, 5600, 2108838754, 2, '2018-09-07 22:03:32', 'pending'),
(88, 6, 83600, 78000, 2108838754, 2, '2018-09-07 22:04:19', 'complete'),
(89, 6, 2300, 2300, 1802214721, 1, '2018-09-08 09:45:16', 'pending'),
(90, 6, 5600, 5600, 742096845, 1, '2018-09-08 09:46:02', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `invoice_no` int(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(14, 775096247, 5600, 'paypal', 7687, 86876, '07-09-2018'),
(15, 2108838754, 78000, 'Bank transfer', 8768, 87687, '07-09-2018');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `customer_pending_id` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`customer_pending_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(52, 6, 1729900789, 20, 1, 'pending'),
(53, 6, 775096247, 20, 1, 'pending'),
(54, 6, 2108838754, 20, 1, 'pending'),
(55, 6, 2108838754, 27, 1, 'pending'),
(56, 6, 1802214721, 16, 1, 'pending'),
(57, 6, 742096845, 20, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(16, 1, 1, '2018-08-19 16:15:07', 'HP laptop 1', '61EJz6KKOKL._SX425_.jpg', '', '', 2300, '<p>laptop one</p>', 'laptops', 'on'),
(18, 1, 1, '2018-08-19 16:16:18', 'HP laptop 3', 'lenovo-laptop-legion-y720-15-front.png', '', '', 4500, '<p>laptop three</p>', 'HP,laptops', 'on'),
(20, 4, 4, '2018-08-19 16:17:06', 'camera 2', 'pexels-photo-243757.jpeg', '', '', 5600, '<p>camera two</p>', 'SONY, Cameras', 'on'),
(21, 4, 3, '2018-08-19 16:17:45', 'camera 3', 'landscape-camera-taking-photo-212372.jpg', '', '', 8900, '<p>camera three</p>', 'Motorola, Cameras', 'on'),
(22, 3, 4, '2018-08-19 16:18:07', 'Mobile 1', 'xsamsung-galaxy-s9_1519719241.jpg.pagespeed.ic.9i0_89RqfA.jpg', '', '', 7800, '<p>samsung</p>', 'Mobiles, smart phones', 'on'),
(24, 3, 4, '2018-08-19 16:18:15', 'Mobile 3', 'Xiaomi-Mi-A1-vs-Moto-G5S-Plus-vs-Oppo-A83-vs-Redmi-5-Plus.jpg', '', '', 6790, '<p>mobile</p>', 'mobiles, redmi', 'on'),
(27, 6, 6, '2018-08-19 16:39:46', 'tv', 'mi-l32m5-ai-original-imaf34hfqb2fekxx.jpeg', '', '', 78000, '', 'TV, motorola', 'on'),
(29, 1, 1, '2018-08-29 05:39:39', 'hp core laptop', 'laptop-reviews.png', '', '', 56000, 'this is core laptop', 'laptop', 'on'),
(30, 3, 4, '2018-09-06 14:16:01', 'mobile new', 'maxresdefault.jpg', '', '', 768, '<p>real me 2 smart phone</p>', 'real me', 'on'),
(32, 10, 6, '2018-09-06 21:48:54', 'rox', 'Xiaomi-Mi-A1-vs-Moto-G5S-Plus-vs-Oppo-A83-vs-Redmi-5-Plus.jpg', '', '', 6700, 'this is amaging', 'phone', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`customer_pending_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `customer_pending_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
