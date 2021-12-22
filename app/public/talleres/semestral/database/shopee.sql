-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 11:01 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`

-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(100) NOT NULL,
  `item_image` varchar(255) NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

REATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

REATE TABLE `shooping_items` (
  `cart_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` decimal() NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

REATE TABLE `shooping_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

REATE TABLE `shooping_order` (
  `cart_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `total` decimal() NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `category_id`, `inventory_id`, `price`, `quantity`) VALUES
(1, 'Rose Mist Corporal', 'c1','001', 9.50','100'),
(2, 'Twisted pepermint Mist Corporal', 'c1','002',9.00, '100'),
(3, 'Honey Wildflowers Mist Corporal',  'c1','003',9.50, '100'),
(4, 'Bath&body', 'Sunrise Woods Mist Corporal', 'c1','004',9.50, '100'),
(5, 'Bath&body', 'Champagne Toast Mist corporal','c1','005',9.50, '100'),
(6, 'Bath&body', 'Winter Candy apple Crema corporal','c1','006',9.50, '100'),
(7, 'Bath&body', 'Open Sky Crema corporal', 'c1','007',9.50, '100'),
(8, 'Bath&body', 'Pure Wonder Crema corporal', 'c1','008',9.50, '100'),
(9, 'Bath&body', 'Bourbon Crema Corporal', 'c1','009',9.50, '100'),
(10, 'Bath&body', 'Belize tropical cabana Crema corporal', 'c1','010',9.50, '100'),
(11, 'Bath&body', 'Vanilla Bean Noel Shower gel', 'c1','011',9.50, '100'),
(12, 'Bath&body', 'Warm vanilla sugar Shower gel ', 'c1','012',9.50, '100'),
(13, 'Bath&body', 'Perfect peony Shower gel','c1','013',9.50, '100')
(14, 'Bath&body', 'Japanese cherry blossom Shower gel ', 'c1','014',9.50, '100'),
(15, 'Bath&body', 'Into the night Shower gel ', 'c1','015',9.50, '100'),
(16, 'Bath&body', 'Chamomile Locion corporal ', 'c1','016',9.50, '100'),
(17, 'Bath&body', 'Guava orange Locion corporal','c1','017',9.50, '100'),
(18, 'Bath&body', 'Sunshine mimosa Locion corporal', 'c1','018',9.50, '100'),
(19, 'Bath&body', 'Fiji sunshine guava-tini Locion corporal ', 'c1','019',9.50, '100'),
(20, 'Bath&body', 'Hello Beautiful Locion corporal ', 'c1','020',9.50, '100'),
(21, 'Bath&body', 'Fresh Balsam Vela 3 mechas', 'c2','021',27.00, '100'),
(22, 'Bath&body', 'A thosand wishes Vela 3 mechas ', 'c2','022',27.00, '100'),
(23, 'Bath&body', 'Limoncello Vela 3 mechas ', 'c2','023',27.00, '100'),
(24, 'Bath&body', 'Pumping bonfire Vela 3 mechas ', 'c2','024',27.00, '100'),
(25, 'Bath&body', 'Lakeside morning Vela 3 mechas', 'c2','025',27.00, '100'),
(26, 'Bath&body', 'Eucalyptus spearmint Fragancia para wallflores ', 'c3','026',8.50, '100'),
(27, 'Bath&body', 'Black Cherry merlot Fragancia para wallflores', 'c3','027',8.50, '100'),
(28, 'Bath&body', 'A thosand wishes Fragancia para wallflores','c3','028',8.50, '100'),
(29, 'Bath&body', 'Party dress Fragancia para wallflores ', 'c3','029',8.50, '100'),
(30, 'Bath&body', 'Pink fairy gumdrop Fragancia para wallflores ', 'c3','030',8.50, '100'),
(31, 'Bath&body', 'Twisted peppermint Jabon de gel ', 'c4','031',8.50, '100'),
(32, 'Bath&body', 'White tea & sage Jabon de gel ', 'c4','032',8.50, '100'),
(33, 'Bath&body', 'Frozen lake Jabon de gel ', 'c4','033',8.50, '100'),
(34, 'Bath&body', 'Marshmallow fireside Jabon de gel ', 'c4','034',8.50, '100'),
(35, 'Bath&body', 'Ornament Jabon de gel', 'c4','035',8.50, '100'),
(36, 'Bath&body', 'Crushed candy cane Antibacterial', 'c4','036',8.50, '100'),
(37, 'Bath&body', 'Winter citrus wreath Antibacterial ', 'c5','037',2.50, '100'),
(38, 'Bath&body', 'Soft lavander Antibacterial ','c5','038',2.50, '100'),
(39, 'Bath&body', 'Lemon and mint Antibacterial ', 'c5','039',2.50, '100'),
(40, 'Bath&body', 'Flannel Gel antibacterial ', 'c5','040',2.50, '100'),
(41, 'Bath&body', 'Crisp morning air Spray antibacterial', 'c5','041',7.00, '100'),
(42, 'Bath&body', 'Fresh Rainfall Gel antibacterial ', 'c5','042',6.00, '100'),
(43, 'Bath&body', 'Blue Ocean waves Antibacterial en espuma ', 'c5','043',6.00, '100'),
(44, 'Bath&body', 'Happy BDAY to you Antibacterial en espuma ', 'c5','044',6.00, '100'),
(45, 'Bath&body', 'Honolulu sun Antibacterial en espuma', 'c5','045',6.00, '100'),
(46, 'Bath&body', 'Vanilla vean Noel Vela 1 mecha', 'c6','046',16.00, '100'),
(47, 'Bath&body', 'Flannel Fragancia para wallflowers', 'c6','047',8.50, '100'),
;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `location` varchar(60) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `role_ref` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `city` varchar(16) NOT NULL,
  `postal_code` varchar(60) NOT NULL,
  `country` varchar(12) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `mobile` varchar(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `city` varchar(16) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
(1, 'Daily', 'Tuition),
(2, 'Akshay', 'Kashyap');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
