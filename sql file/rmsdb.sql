-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2016 at 03:17 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `avails`
--

CREATE TABLE IF NOT EXISTS `avails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `avail_session` varchar(50) NOT NULL,
  `exp_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `avails`
--

INSERT INTO `avails` (`id`, `customer_id`, `avail_session`, `exp_date`, `status`) VALUES
(1, 'cid-002', 'Monthly session', '2016-03-11', 'active'),
(2, 'cid-001', 'Monthly session', '2016-03-12', 'active'),
(3, 'cid-003', 'Monthly session', '2016-03-12', 'active'),
(4, 'cid-004', 'Zumba', '2016-03-12', 'active'),
(8, 'cid-004', 'Monthly session', '2016-03-12', 'active'),
(9, 'cid-002', 'Zumba', '2016-03-12', 'active'),
(10, 'cid-005', 'Zumba', '2016-03-12', 'active'),
(11, 'cid-006', 'Zumba', '2016-03-12', 'active'),
(12, 'cid-007', 'Zumba', '2016-03-13', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_avail`
--

CREATE TABLE IF NOT EXISTS `customer_avail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer_avail`
--

INSERT INTO `customer_avail` (`id`, `customer_id`, `firstname`, `lastname`, `gender`, `dob`, `contact`, `middlename`) VALUES
(1, 'cid-002', 'jayrex', 'acilo', 'Male', '2016-02-15', '0987982', 'luega'),
(2, 'cid-001', 'ralph', 'yuzon', 'Male', '1994-09-14', '987', 'baclayon'),
(3, 'cid-003', 'jave', 'parba', 'Male', '1992-10-14', '0987', 'nacua'),
(4, 'cid-004', 'anne', 'curtis', 'Female', '1989-10-17', '987987', 'smith'),
(5, 'cid-005', 'joseph', 'jude', 'Male', '1994-10-14', '987', 'tojong'),
(6, 'cid-006', 'boom', 'shakala', 'Female', '1993-07-14', '0987098', 'natagak'),
(7, 'cid-007', 'tom', 'jones', 'Male', '1954-06-16', '098798', 'jerry');

-- --------------------------------------------------------

--
-- Table structure for table `customer_temp`
--

CREATE TABLE IF NOT EXISTS `customer_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivered_items`
--

CREATE TABLE IF NOT EXISTS `delivered_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pi_number` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `delivered_date` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `quantity_received` int(11) NOT NULL,
  `available_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `delivered_items`
--

INSERT INTO `delivered_items` (`id`, `pi_number`, `product_id`, `product_name`, `description`, `quantity`, `delivered_date`, `approved_by`, `supplier`, `quantity_received`, `available_quantity`) VALUES
(73, 'po-001', 'prod-001', 'whey protein', 'powder supplement', '10', '2016-02-26', 'jayrex acilo', 'Muscle Foods', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `gym_fees`
--

CREATE TABLE IF NOT EXISTS `gym_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gym_type` varchar(50) NOT NULL,
  `gym_fee` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `gym_feeNM` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gym_type_2` (`gym_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gym_fees`
--

INSERT INTO `gym_fees` (`id`, `gym_type`, `gym_fee`, `days`, `gym_feeNM`) VALUES
(2, 'Monthly session', 600, 31, 750),
(3, 'Single Session', 120, 1, 160),
(4, 'Zumba', 600, 31, 750),
(6, 'Membership', 120, 365, 120);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `available_stocks` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `exp_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`inventory_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_id`, `product_name`, `stock_in`, `available_stocks`, `description`, `price`, `exp_date`, `status`) VALUES
(89, 'prod-001', 'whey protein', 1, 70, 'powder supplement 1pack(20 grams)', '25.00', '', ''),
(118, 'prod-007', 'cobra', 10, 20, 'energy drink', '12.50', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membership_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `subscription` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `expdate_sub` varchar(50) NOT NULL,
  `reg_date` varchar(50) NOT NULL,
  `exp_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_sub` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `membership_id`, `firstname`, `lastname`, `middlename`, `address`, `gender`, `age`, `email`, `contact`, `facebook`, `weight`, `height`, `subscription`, `program`, `expdate_sub`, `reg_date`, `exp_date`, `status`, `status_sub`) VALUES
(1, 'mid-003', 'Jayrex', 'acilo', 'luega', 'tisa2', 'Male', 23, 'holicshiia2', '123a', 'qwea231', '12kg', '123f', 'None', '', 'Not Subscribed', '2015-12-19', '2017-02-14', 'active', 'Not Subscribed'),
(6, 'mid-004', 'ralph', 'yuzon', 'baclayon', 'tisa', 'Male', 21, 'ralphyuzon@ymail.com', '0942', 'ralp', '60 kg', '5', '? string:? string: ? ?', '', '2016-01-19', '2015-12-19', '2016-02-29', 'active', 'expired'),
(7, 'mid-005', 'jave', 'parba', 'nacua', 'tisa', 'Male', 22, 'aas@yahoo.com', '123', 'alskjda', '60', '125"', 'None', '', 'Not Subscribed', '2015-12-20', '2016-02-29', 'active', 'Not Subscribed'),
(8, 'mid-006', 'anne', 'curtis', 'smith', 'australia', 'Female', 25, 'alsk@asdl.com', '143', 'anne', '60', '42', 'Step Aero', '', '2016-01-22', '2015-12-20', '2016-02-29', 'active', 'expired'),
(9, 'mid-007', 'mar', 'roxas', 'sanches', 'asd', 'Female', 12, 'asd', '123', 'asd', '123', '123"', 'Boxing', '', '2016-12-15', '2015-12-20', '2016-02-10', 'expired', 'active'),
(10, 'mid-008', 'franco', 'reyes', 'jah', 'cebu', 'Male', 25, 'franco@gmai.com', '09987987', 'franco.reyes', '65', '5foot10inch', 'None', '', 'Not Subscribed', '2015-12-22', '2016-02-29', 'active', 'Not Subscribed'),
(11, 'mid-009', 'janjan', 'mendoza', 'stick', 'cebu', 'Male', 25, 'aslkdasd', '09987987', 'alksjdaksj', '65', '57', '? string: ?', '', '2015-12-22', '2015-12-22', '2016-02-29', 'active', 'expired'),
(16, 'mid-0010', 'Vice', 'Ganda', 'Pogi', 'manila', 'Male', 12, 'alksjd', '09123', 'alskjd', '60kg', '5''10"', '? string: ?', '', '2016-01-31', '2015-12-30', '2017-02-14', 'active', 'expired'),
(18, 'mid-0011', 'jeric', 'camay', 'yamac', 'opal', 'Male', 22, 'jeric', '098123', 'jeric', '6kg', '5''5"', '', '', '', '2016-02-12', '2016-10-25', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items_supplier`
--

CREATE TABLE IF NOT EXISTS `ordered_items_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pi_number` varchar(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `processed_by` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `ordered_items_supplier`
--

INSERT INTO `ordered_items_supplier` (`id`, `pi_number`, `order_date`, `amount`, `processed_by`, `status`) VALUES
(51, 'po-001', '14/02/2016', '11500', 'admin a1', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_queue`
--

CREATE TABLE IF NOT EXISTS `payment_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `available_stocks` int(11) NOT NULL,
  `sold_quantity` int(11) NOT NULL,
  `available_left` int(11) NOT NULL,
  `total_amount` decimal(11,2) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `process_order_delivery`
--

CREATE TABLE IF NOT EXISTS `process_order_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pi_number` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_delivered` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `description` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `product_name`, `price`, `description`, `supplier`) VALUES
(2, 'prod-001', 'whey protein', '2000.00', 'powder supplement (1 bottle) 5,000 grams', 'Muscle Foods'),
(14, 'prod-007', 'cobra', '13.00', 'energy drink', 'monster'),
(15, 'prod-008', 'sting', '12.00', 'energy drink', 'monster'),
(16, 'prod-002', 'amino acido', '500.00', 'tablet (1 bottle)100pcs.', 'Muscle Foods');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `prod_id` varchar(50) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_name` (`product_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `supplier`, `product_name`, `price`, `quantity`, `description`, `prod_id`, `prod_name`) VALUES
(1, 'muscle foods', 'whey protein', 50, '', 'powder supplement', '', ''),
(2, 'muscle apparel', 'Workout Lifting Gloves', 200, '', 'grip', '', ''),
(3, 'gym guard', 'weigth lifting belt', 250, '', 'for lifting', '', ''),
(4, 'muscle apparel', 'shirts', 500, '', 'shirt gym', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_item`
--

CREATE TABLE IF NOT EXISTS `purchased_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `or_number` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `purchased_item`
--

INSERT INTO `purchased_item` (`id`, `or_number`, `product_id`, `product_name`, `description`, `quantity`, `total_amount`) VALUES
(19, '004', 'prod-0014', 'shirts', 'shirt gym', 20, '10000.00'),
(20, '005', 'prod-0014', 'shirts', 'shirt gym', 10, '5000.00'),
(21, '007', 'prod-0014', 'shirts', 'shirt gym', 10, '5000.00'),
(22, '008', 'prod-0014', 'shirts', 'shirt gym', 30, '15000.00'),
(23, '009', 'prod-0011', 'whey protein', 'powder supplement', 5, '250.00'),
(24, '009', 'prod-0013', 'weigth lifting belt', 'for lifting', 5, '1250.00'),
(25, '0010', 'prod-004', 'shirts', 'shirt gym', 5, '2500.00'),
(26, '0010', 'prod-001', 'whey protein', 'powder supplement', 5, '250.00'),
(27, '0010', 'prod-003', 'weigth lifting belt', 'for lifting', 5, '1250.00'),
(28, '0011', 'prod-001', 'whey protein', 'powder supplement', 23, '1150.00'),
(29, '0011', 'prod-003', 'weigth lifting belt', 'for lifting', 23, '5750.00'),
(30, '0011', 'prod-004', 'shirts', 'shirt gym', 24, '12000.00'),
(31, '0011', 'prod-003', 'weigth lifting belt', 'for lifting', 2, '500.00'),
(32, '0011', 'prod-001', 'whey protein', 'powder supplement', 2, '100.00'),
(33, '0011', 'prod-003', 'weigth lifting belt', 'for lifting', 23, '5750.00'),
(34, '0011', 'prod-001', 'whey protein', 'powder supplement', 12, '600.00'),
(35, '0012', 'prod-004', 'shirts', 'shirt gym', 2, '1000.00'),
(36, '0012', 'prod-003', 'weigth lifting belt', 'for lifting', 2, '500.00'),
(37, '0012', 'prod-001', 'whey protein', 'powder supplement', 2, '100.00'),
(38, '0012', 'prod-004', 'shirts', 'shirt gym', 3, '1500.00'),
(39, '0013', 'prod-004', 'shirts', 'shirt gym', 2, '1000.00'),
(40, '0013', 'prod-007', 'qweqwtqw', 'sdf', 2, '246.00'),
(41, '0013', 'prod-006', 'qweqw', 'qwe', 2, '246.00'),
(42, '0014', 'prod-001', 'whey protein', 'powder supplement', 2, '100.00'),
(43, '0014', 'prod-007', 'qweqwtqw', 'sdf', 2, '246.00'),
(44, '0015', 'prod-007', 'qweqwtqw', 'sdf', 1, '123.00'),
(45, '0015', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(46, '0015', 'prod-006', 'qweqw', 'qwe', 1, '123.00'),
(47, '0015', 'prod-001', 'whey protein', 'powder supplement', 3, '150.00'),
(48, '0015', 'prod-001', 'whey protein', 'powder supplement', 2, '100.00'),
(49, '0015', 'prod-004', 'shirts', 'shirt gym', 1, '500.00'),
(50, '0015', 'prod-007', 'qweqwtqw', 'sdf', 1, '123.00'),
(51, '0015', 'prod-006', 'qweqw', 'qwe', 2, '246.00'),
(52, '0016', 'prod-007', 'qweqwtqw', 'sdf', 1, '123.00'),
(53, '0016', 'prod-007', 'qweqwtqw', 'sdf', 1, '123.00'),
(54, '0016', 'prod-007', 'qweqwtqw', 'sdf', 1, '123.00'),
(55, '0017', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(56, '0017', 'prod-006', 'qweqw', 'qwe', 1, '123.00'),
(57, '0018', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(58, '0018', 'prod-001', 'whey protein', 'powder supplement', 2, '100.00'),
(59, '0018', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(60, '0018', 'prod-007', 'qweqwtqw', 'sdf', 1, '123.00'),
(61, '0018', 'prod-007', 'qweqwtqw', 'sdf', 2, '246.00'),
(62, '0018', 'prod-006', 'qweqw', 'qwe', 3, '369.00'),
(63, '0018', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(64, '0018', 'prod-006', 'qweqw', 'qwe', 1, '123.00'),
(65, '0019', 'prod-004', 'shirts', 'shirt gym', 2, '1000.00'),
(66, '0020', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(67, '0020', 'prod-006', 'qweqw', 'qwe', 1, '123.00'),
(68, '0020', 'prod-004', 'shirts', 'shirt gym', 1, '500.00'),
(69, '0020', 'prod-007', 'qweqwtqw', 'sdf', 1, '123.00'),
(70, '0020', 'prod-006', 'qweqw', 'qwe', 1, '123.00'),
(71, '0020', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(72, '0020', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(73, '0021', 'prod-001', 'whey protein', 'powder supplement', 3, '150.00'),
(74, '0021', 'prod-001', 'whey protein', 'powder supplement', 2, '100.00'),
(75, '0022', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(76, '0022', 'prod-007', 'qweqwtqw', 'sdf', 3, '369.00'),
(77, '0023', 'prod-004', 'shirts', 'shirt gym', 2, '1000.00'),
(78, '0023', 'prod-006', 'qweqw', 'qwe', 3, '369.00'),
(79, '0024', 'prod-007', 'qweqwtqw', 'sdf', 2, '246.00'),
(80, '0024', 'prod-005', 'qweqw', 'qwe', 2, '246.00'),
(81, '0025', 'prod-004', 'shirts', 'shirt gym', 4, '2000.00'),
(82, '0025', 'prod-001', 'whey protein', 'powder supplement', 48, '2400.00'),
(83, '0025', 'prod-002', 'Workout Lifting Gloves', 'grip', 15, '2250.00'),
(84, '0025', 'prod-003', 'weigth lifting belt', 'for lifting', 6, '1500.00'),
(85, '0026', 'prod-003', 'weigth lifting belt', 'for lifting', 20, '5000.00'),
(86, '0026', 'prod-001', 'whey protein', 'powder supplement', 20, '1000.00'),
(87, '0026', 'prod-007', 'cobra', 'energy drink', 5, '65.00'),
(88, '001', 'prod-001', 'whey protein', 'powder supplement', 5, '250.00'),
(89, '001', 'prod-003', 'weigth lifting belt', 'for lifting', 5, '1250.00'),
(90, '002', 'prod-004', 'shirts', 'shirt gym', 4, '2000.00'),
(91, '003', 'prod-007', 'cobra', 'energy drink', 1, '13.00'),
(92, '006', 'prod-007', 'cobra', 'energy drink', 3, '38.00'),
(93, '006', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(94, '006', 'prod-006', 'amino acid', '250mg tablet', 4, '30.00'),
(95, '006', 'prod-003', 'weigth lifting belt', 'for lifting', 3, '32.00'),
(96, '0027', 'prod-003', 'weigth lifting belt', 'for lifting', 1, '10.75'),
(97, '0028', 'prod-003', 'weigth lifting belt', 'for lifting', 1, '10.75'),
(98, '0030', 'prod-007', 'cobra', 'energy drink', 1, '12.50'),
(99, '0031', 'prod-003', 'weigth lifting belt', 'for lifting', 2, '21.50'),
(100, '0031', 'prod-005', 'sando large', 'blue', 1, '200.00'),
(101, '0032', 'prod-006', 'amino acid', '250mg tablet', 1, '7.50'),
(102, '0033', 'prod-004', 'shirts', 'shirt gym', 10, '5000.00'),
(103, '0034', 'prod-001', 'whey protein', 'powder supplement', 6, '300.00'),
(104, '0035', 'prod-001', 'whey protein', 'powder supplement', 5, '250.00'),
(105, '0036', 'prod-002', 'Workout Lifting Gloves', 'grip', 5, '750.00'),
(106, '0037', 'prod-001', 'whey protein', 'powder supplement', 1, '50.00'),
(107, '0037', 'prod-003', 'weigth lifting belt', 'for lifting', 1, '10.75');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_items_supplier`
--

CREATE TABLE IF NOT EXISTS `purchased_items_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pi_number` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `purchased_items_supplier`
--

INSERT INTO `purchased_items_supplier` (`id`, `pi_number`, `product_id`, `product_name`, `description`, `quantity`, `total_amount`, `supplier`) VALUES
(1, 'po-008', 'prod-004', 'shirt', 'shirt gym', '5', 5000, 'muscle apparel'),
(2, 'po-009', 'prod-001', 'whey protein', 'powder supplement', '7', 2350, 'Muscle Foods'),
(3, 'po-0010', 'prod-003', 'weigth lifting belt', 'for lifting', '10', 5000, 'gym guard'),
(4, 'po-0010', 'prod-001', 'whey protein', 'powder supplement', '20', 1000, 'Muscle Foods'),
(5, 'po-0010', 'prod-005', 'sando large', 'blue', '30', 6000, 'muscle apparel'),
(6, 'po-0011', 'prod-001', 'whey protein', 'powder supplement', '2', 250, 'Muscle Foods'),
(7, 'po-0021', 'prod-001', 'whey protein', 'powder supplement', '30', 1500, 'Muscle Foods'),
(8, 'po-0022', 'prod-002', 'Workout Lifting Gloves', 'grip', '10', 6000, 'muscle apparel'),
(9, 'po-0023', 'prod-002', 'Workout Lifting Gloves', 'grip', '30', 6000, 'muscle apparel'),
(10, 'po-0024', 'prod-004', 'shirt', 'shirt gym', '50', 25000, 'muscle apparel'),
(11, 'po-0013', 'prod-001', 'whey protein', 'powder supplement', '40', 2000, 'Muscle Foods'),
(12, 'po-0013', 'prod-007', 'cobra', 'energy drink', '40', 520, 'monster'),
(13, 'po-0014', 'prod-002', 'Workout Lifting Gloves', 'grip', '10', 2000, 'muscle apparel'),
(14, 'po-0015', 'prod-003', 'weigth lifting belt', 'for lifting', '20', 5000, 'gym guard'),
(15, 'po-0015', 'prod-004', 'shirt', 'shirt gym', '20', 10000, 'muscle apparel'),
(26, 'po-001', 'prod-001', 'whey protein', 'powder supplement', '5', 1500, 'Muscle Foods');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `quantity_on_hand` int(11) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `returned_items`
--

CREATE TABLE IF NOT EXISTS `returned_items` (
  `product_id` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `or_number` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `trans_date` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `verify` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=972 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `or_number`, `payment_type`, `trans_date`, `amount`, `verify`) VALUES
(817, '', 'Gym Payment', '2015-12-20', '600', 'admin'),
(818, '', 'Gym Payment', '2015-12-22', '160', 'admin'),
(819, '', 'Gym Payment', '2015-12-23', '750', 'admin'),
(824, '004', 'Product Payment', '2016-01-17', '10000', 'admin a1'),
(825, '005', 'Product Payment', '2016-01-22', '5000', 'admin a1'),
(826, '007', 'Product Payment', '2016-01-22', '5000', 'admin a1'),
(827, '008', 'Product Payment', '2016-01-23', '15000', 'admin a1'),
(828, '009', 'Product Payment', '2016-01-25', '1500', 'admin a1'),
(829, '0010', 'Product Payment', '2016-01-25', '4000', 'admin a1'),
(830, '', 'Gym Payment', '2016-01-25', '150', 'admin'),
(831, '0011', 'Product Payment', '2016-01-27', '25850', 'admin a1'),
(832, '0012', 'Product Payment', '2016-01-27', '3100', 'admin a1'),
(833, '0013', 'Product Payment', '2016-01-27', '1492', 'admin a1'),
(834, '0014', 'Product Payment', '2016-01-27', '346', 'admin a1'),
(835, '0015', 'Product Payment', '2016-01-27', '1415', 'admin a1'),
(836, '0016', 'Product Payment', '2016-01-27', '369', 'admin a1'),
(837, '0017', 'Product Payment', '2016-01-27', '173', 'admin a1'),
(838, '0018', 'Product Payment', '2016-01-27', '1111', 'admin a1'),
(839, '0019', 'Product Payment', '2016-01-27', '1000', 'admin a1'),
(840, '0020', 'Product Payment', '2016-01-27', '1019', 'admin a1'),
(841, '0021', 'Product Payment', '2016-01-27', '250', 'admin a1'),
(842, '0022', 'Product Payment', '2016-01-27', '419', 'admin a1'),
(843, '0023', 'Product Payment', '2016-01-28', '1369', 'admin a1'),
(844, '0024', 'Product Payment', '2016-01-28', '492', 'admin a1'),
(856, '', 'Gym Payment', '2016-02-02', '130', 'admin a1'),
(857, '', 'Gym Payment', '2016-02-02', '300', 'admin a1'),
(858, '0025', 'Product Payment', '2016-02-02', '3750', 'admin a1'),
(859, '0026', 'Product Payment', '2016-02-03', '6065', 'admin a1'),
(860, '', 'Gym Payment', '2015-12-20', '120', 'admin a1'),
(861, '', 'Gym Payment', '2015-12-22', '120', 'admin a1'),
(862, '', 'Gym Payment', '2016-02-03', '120', 'admin a1'),
(863, '', 'Gym Payment', '2016-02-03', '120', 'admin a1'),
(865, '', 'Gym Payment', '2016-02-03', '120', 'admin a1'),
(866, '', 'Gym Payment', '2016-02-03', '120', 'admin a1'),
(867, '', 'Gym Payment', '2016-02-03', '750', 'admin'),
(868, '', 'Gym Payment', '2016-02-03', '750', 'admin'),
(869, '001', 'Product Payment', '2016-02-03', '1500', 'admin a1'),
(878, '', 'Gym Payment', '2016-02-08', '250', 'admin a1'),
(881, '', 'Gym Payment', '2016-02-08', '250', 'admin a1'),
(888, '', 'Gym Payment', '2016-02-08', '250', 'admin a1'),
(889, '', 'Gym Payment', '2016-02-08', '250', 'admin a1'),
(890, '', 'Gym Payment', '2016-02-08', '250', 'admin a1'),
(891, '', 'Gym Payment', '2016-02-08', '350', 'admin a1'),
(894, '', 'Gym Payment', '2016-02-08', '120', 'admin a1'),
(895, '', 'Gym Payment', '2016-02-09', '120', 'admin a1'),
(896, '', 'Gym Payment', '2016-02-09', '600', 'admin a1'),
(898, '', 'Gym Payment', '2016-02-10', '120', 'admin a1'),
(899, '', 'Gym Payment', '2016-02-10', '600', 'admin a1'),
(900, '', 'Gym Payment', '2016-02-10', '600', 'admin a1'),
(901, '', 'Gym Payment', '2016-02-10', '120', 'admin a1'),
(902, '', 'Gym Payment', '2016-02-10', '600', 'admin a1'),
(903, '', 'Gym Payment', '2016-02-10', '600', 'admin a1'),
(904, '', 'Gym Payment', '2016-02-10', '600', 'admin a1'),
(905, '', 'Gym Payment', '2016-02-10', '600', 'admin a1'),
(906, '', 'Gym Payment', '2016-02-10', '600', 'admin a1'),
(907, '', 'Gym Payment', '2016-02-10', '600', 'admin a1'),
(908, '', 'Gym Payment', '2016-02-10', '750', 'admin a1'),
(909, '', 'Gym Payment', '2016-03-24', '160', 'admin a1'),
(910, '', 'Gym Payment', '2016-02-10', '750', 'admin a1'),
(911, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(912, '', 'Gym Payment', '2016-02-11', '500', 'admin a1'),
(913, '', 'Gym Payment', '2016-02-11', '500', 'admin a1'),
(914, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(915, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(916, '', 'Gym Payment', '2016-02-11', '500', 'admin a1'),
(917, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(918, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(919, '', 'Gym Payment', '2016-02-11', '500', 'admin a1'),
(920, '', 'Gym Payment', '2016-02-11', '500', 'admin a1'),
(921, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(922, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(923, '', 'Gym Payment', '2016-02-11', '500', 'admin a1'),
(924, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(925, '', 'Gym Payment', '2016-02-11', '600', 'admin a1'),
(926, '', 'Gym Payment', '2016-02-11', '500', 'admin a1'),
(927, '', 'Gym Payment', '2016-02-12', '600', 'admin a1'),
(928, '', 'Gym Payment', '2016-02-12', '500', 'admin a1'),
(929, '', 'Gym Payment', '2016-02-12', '120', 'admin a1'),
(930, '002', 'Product Payment', '2016-02-12', '2000', 'admin a1'),
(931, '003', 'Product Payment', '2016-02-12', '12', 'admin a1'),
(932, '006', 'Product Payment', '2016-02-12', '149.75', 'admin a1'),
(933, '0027', 'Product Payment', '2016-02-12', '10.75', 'admin a1'),
(934, '0028', 'Product Payment', '2016-02-12', '10.75', 'admin a1'),
(935, '0029', 'Product Payment', '2016-02-12', '0.00', 'admin a1'),
(936, '0030', 'Product Payment', '2016-02-12', '12.50', 'admin a1'),
(937, '0031', 'Product Payment', '2016-02-12', '221.50', 'admin a1'),
(938, '0032', 'Product Payment', '2016-02-13', '7.50', 'admin a1'),
(939, '0033', 'Product Payment', '2016-02-14', '5000.00', 'admin a1'),
(940, '', 'Gym Payment', '2016-02-14', '120', 'admin a1'),
(941, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(942, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(943, '', 'Gym Payment', '2016-02-15', '160', 'admin a1'),
(944, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(945, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(946, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(947, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(948, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(949, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(950, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(951, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(952, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(953, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(954, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(955, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(956, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(957, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(958, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(959, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(960, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(961, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(962, '', 'Gym Payment', '2016-02-15', '120', 'admin a1'),
(963, '', 'Gym Payment', '2016-02-21', '120', 'admin a1'),
(964, '', 'Gym Payment', '2016-02-21', '120', 'admin a1'),
(965, '', 'Gym Payment', '2016-02-21', '120', 'admin a1'),
(966, '0034', 'Product Payment', '2016-02-25', '300.00', 'admin a1'),
(967, '', 'Gym Payment', '2016-02-25', '120', 'admin a1'),
(968, '0035', 'Product Payment', '2016-02-25', '250.00', 'admin a1'),
(969, '0036', 'Product Payment', '2016-02-25', '750.00', 'admin a1'),
(970, '0037', 'Product Payment', '2016-02-25', '60.75', 'admin a1'),
(971, '', 'Gym Payment', '2016-02-25', '120', 'admin a1');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sign_up_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_name` (`subscription_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `subscription_name`, `description`) VALUES
(3, 'Zumba', 'for elder and young'),
(21, 'Dance Aero', 'Women''s training for all ages'),
(22, 'Kick Boxing', 'Men and Women training for all ages'),
(23, 'Step Aero', 'Women''s training for all ages'),
(24, 'Boxing', 'Men and Women training for all ages');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_name` (`supplier_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `supplier_address`, `contact`, `contact_person`, `email`) VALUES
(1, 'Muscle Foods', 'usa', '654-321-987', 'Janjan', 'musclefoods@gmail.com'),
(4, 'monster', 'germany', '987-65-651', 'shasha', 'monster@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_pqueue`
--

CREATE TABLE IF NOT EXISTS `supplier_pqueue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `available_stocks` int(11) NOT NULL,
  `sold_quantity` int(11) NOT NULL,
  `available_left` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `secret_question` varchar(50) NOT NULL,
  `secret_answer` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `user_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `email`, `type`, `status`, `username`, `password`, `secret_question`, `secret_answer`) VALUES
(10, 'uid-001', 'jayrex', 'acilo', 'Male', 'tisa', '98123', 'jay@ymail.com', 'Admin', 'Activated', 'jayrex', '827ccb0eea8a706c4c34a16891f84e7b', 'What was your first petâ€™s name?', 'rambokogon'),
(11, 'uid-002', 'jave', 'parba', 'Male', 'tisa', '091823', 'jave@ymail.com', 'Admin', 'Activated', 'jave', '827ccb0eea8a706c4c34a16891f84e7b', 'What is your favorite food?', 'pungko2'),
(12, 'uid-003', 'ralph', 'yuzon', 'Male', 'tisa', '098123', 'ralph@ymail.com', 'Staff', 'Activated', 'ralph', '827ccb0eea8a706c4c34a16891f84e7b', 'What is your motherâ€™s maiden name?', 'bac'),
(18, 'uid-009', 'samantha', 'parba', 'Female', 'tisa sitio mannga cebu city', '09227937514', 'samsamfaye@yahoo.com', 'Staff', 'Activated', 'samsam1', '827ccb0eea8a706c4c34a16891f84e7b', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_member`
--

CREATE TABLE IF NOT EXISTS `walkin_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `time_out` varchar(50) NOT NULL,
  `datestamp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=380 ;

--
-- Dumping data for table `walkin_member`
--

INSERT INTO `walkin_member` (`id`, `firstname`, `lastname`, `gender`, `time`, `time_out`, `datestamp`) VALUES
(130, 'Jayrex', 'acilo', 'Male', '10:42 pm', '10:22 pm', '2015-12-16'),
(131, 'Elvira', 'Gonzaga', 'Female', '10:42 pm', '10:35 pm', '2015-12-16'),
(153, 'Jayrex', 'Acilo', 'Male', '9:07 pm', '10:22 pm', '2015-12-18'),
(177, 'jayrex', 'acilo', 'Male', '11:41 pm', '10:22 pm', '2015-12-19'),
(178, 'jayrex', 'acilo', 'Male', '11:43 pm', '10:22 pm', '2015-12-19'),
(179, 'jayrex', 'acilo', 'Male', '11:56 pm', '10:22 pm', '2015-12-19'),
(180, 'jayrex', 'acilo', 'Male', '12:01 am', '10:22 pm', '2015-12-19'),
(191, 'jayrex', 'acilo', 'Male', '12:16 am', '10:22 pm', '2015-12-20'),
(200, 'jayrex', 'acilo', 'Male', '12:35 am', '10:22 pm', '2015-12-20'),
(203, 'elvira', 'gonzaga', 'Female', '12:43 am', '10:35 pm', '2015-12-20'),
(204, 'elvira', 'gonzaga', 'Female', '12:44 am', '10:35 pm', '2015-12-20'),
(205, 'jayrex', 'acilo', 'Male', '12:46 am', '10:22 pm', '2015-12-20'),
(207, 'elvira', 'gonzaga', 'Female', '12:48 am', '10:35 pm', '2015-12-20'),
(215, 'jayrex', 'acilo', 'Male', '7:51 am', '10:22 pm', '2015-12-20'),
(221, 'jayrex', 'acilo', 'Male', '12:22 pm', '10:22 pm', '2015-12-23'),
(226, 'qweqwe', 'qweqw', 'Male', '11:56 am', '11:56 am', '2016-01-07'),
(227, 'asdasq', 'asds', 'Female', '12:02 pm', '12:02 pm', '2016-01-07'),
(228, 'don', 'juan', 'Male', '12:59 pm', '1:00 pm', '2016-01-24'),
(230, 'jayrex', 'acilo', 'Male', '1:37 am', '1:50 am', '2016-02-02'),
(231, 'qweq', 'qwe', 'Male', '2:11 am', '2:39 am', '2016-02-03'),
(232, 'ralph', 'yuzon', 'Male', '2:40 am', '11:32 pm', '2016-02-03'),
(233, 'aksldj', 'alskdj', 'Male', '2:42 am', '2:56 am', '2016-02-03'),
(234, 'qweq', 'qweq', 'Male', '2:43 am', '11:32 pm', '2016-02-03'),
(235, 'qweqwe', 'qweqwe', 'Male', '2:45 am', '2:57 am', '2016-02-03'),
(236, 'qweqwtqw', 'qwrqwr', 'Male', '2:45 am', '2:57 am', '2016-02-03'),
(237, 'qweqwe', 'qwe', 'Male', '2:47 am', '2:57 am', '2016-02-03'),
(238, 'qwe', 'qwe', 'Male', '2:48 am', '2:58 am', '2016-02-03'),
(239, 'asdasdqw', 'qweqw', 'Male', '2:50 am', '2:58 am', '2016-02-03'),
(240, 'qweqw', 'd', 'Male', '2:50 am', '2:58 am', '2016-02-03'),
(241, 'qweqwe', 'qwqw', 'Male', '2:51 am', '2:58 am', '2016-02-03'),
(242, 'qwgqwg', 'qvq', 'Male', '2:51 am', '2:58 am', '2016-02-03'),
(243, 'vqvqvq', 'vqqvq', 'Male', '2:52 am', '2:58 am', '2016-02-03'),
(244, 'qvqvq', 'vqvq', 'Female', '2:52 am', '2:58 am', '2016-02-03'),
(245, 'qwqw', 'qeq ', 'Male', '2:53 am', '2:58 am', '2016-02-03'),
(246, 'qbqb', 'qwqw', 'Female', '2:54 am', '2:59 am', '2016-02-03'),
(247, 'qwvqw', 'qw', 'Female', '2:54 am', '2:58 am', '2016-02-03'),
(248, 'qbqbqw', 'qwqw', 'Male', '2:56 am', '3:00 am', '2016-02-03'),
(249, 'ralph', 'tyz', 'Male', '3:00 am', '3:01 am', '2016-02-03'),
(250, 'jayrex', 'acilo', 'Male', '3:00 am', '11:33 pm', '2016-02-03'),
(251, 'elvira', 'gonzaga', 'Female', '3:00 am', '7:30 am', '2016-02-03'),
(252, 'pet andrew', 'nacua', 'Male', '6:36 am', '12:47 pm', '2016-02-03'),
(253, 'jave', 'parba', 'Male', '6:36 am', '6:37 am', '2016-02-03'),
(254, 'elvira', 'gonzaga', 'Female', '6:36 am', '7:30 am', '2016-02-03'),
(255, 'ralph', 'yuzon', 'Male', '11:29 am', '11:32 pm', '2016-02-03'),
(256, 'pet andrew', 'nacua', 'Male', '12:47 pm', '12:47 pm', '2016-02-03'),
(257, 'rex', 'jay', 'Male', '5:14 pm', '5:15 pm', '2016-02-03'),
(258, 'whisky', 'alda', 'Male', '5:16 pm', '5:45 pm', '2016-02-03'),
(259, 'pet andrew', 'reyes', 'Male', '5:19 pm', '11:32 pm', '2016-02-03'),
(260, 'RALPH', 'YUZON', 'Male', '7:02 pm', '11:32 pm', '2016-02-03'),
(261, 'raasd', 'dsd', 'Male', '7:10 pm', '11:32 pm', '2016-02-03'),
(262, 'jayrex', 'acilo', 'Male', '11:21 pm', '11:33 pm', '2016-02-03'),
(263, 'qweq', 'qweq', 'Male', '11:22 pm', '11:32 pm', '2016-02-03'),
(266, 'qweq', 'qweq', 'Male', '11:27 pm', '11:32 pm', '2016-02-03'),
(293, 'aldz', 'lkasj', 'Male', '12:56 am', '11:23 am', '2016-02-04'),
(294, 'qwe', 'qweq ', 'Male', '12:57 am', '11:02 am', '2016-02-04'),
(296, 'asdasd', 'asda', 'Male', '1:01 am', '11:04 am', '2016-02-04'),
(297, 'qweqw', 'qwqw', 'Male', '1:01 am', '11:23 am', '2016-02-04'),
(298, 'qvq', 'qv', 'Male', '1:01 am', '11:04 am', '2016-02-04'),
(299, 'AS', 'AS ', 'Male', '10:42 am', '11:02 am', '2016-02-04'),
(339, 'jave', 'parba', 'Male', '4:49 pm', '5:10 pm', '2016-02-08'),
(346, 'qweqw', 'qwe', 'Male', '5:47 pm', '5:48 pm', '2016-02-08'),
(349, 'eqwe', 'qwe', 'Male', '10:02 pm', '10:02 pm', '2016-02-08'),
(353, 'jayrex', 'acilo', 'Male', '5:29 pm', '5:29 pm', '2016-02-09'),
(372, 'jayrex', 'acilo', 'Male', '1:02 pm', '7:59 pm', '2016-02-10'),
(374, 'boom', 'shakala', 'Male', '8:48 pm', '8:50 pm', '2016-02-10'),
(375, 'anne', 'curtis', 'Female', '10:53 am', '7:29 pm', '2016-02-11'),
(376, 'jayrex', 'acilo', 'Male', '8:50 am', '8:51 am', '2016-02-15'),
(378, 'a', 'b', 'Male', '8:51 am', '8:51 am', '2016-02-15'),
(379, 'ralph', 'yuzon', 'Male', '9:51 pm', '9:52 pm', '2016-02-25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
