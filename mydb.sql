-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 05:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_pincode` varchar(6) NOT NULL,
  `area_name` varchar(20) DEFAULT NULL,
  `city_city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_pincode`, `area_name`, `city_city_id`) VALUES
('01', 'Elisbridge', 5),
('02', 'pandva', 7),
('03', 'jamalpur', 5),
('04', 'motera', 5),
('05', 'dholka', 5),
('06', 'saijpur bogha', 5),
('07', 'ghatlodiya', 5),
('382446', 'isanpur', 5),
('382449', 'ramol', 5),
('382460', 'vasna', 5),
('388150', 'manaj', 6),
('388255', 'janod', 7),
('388305', 'adas', 6),
('388315', 'barkol', 6),
('388450', 'petlad', 6),
('393041', 'ambawadi', 8),
('4', 'sanad', 5),
('5', 'navrangpura', 5),
('6', 'amraiwadi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `qty`) VALUES
('mansi', 6, 5),
('mansi', 1, 3),
('mansi', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(20) DEFAULT NULL,
  `state_state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_state_id`) VALUES
(1, 'noida', 7),
(2, 'varansi', 7),
(3, 'rishikesh', 29),
(4, 'durgapur', 14),
(5, 'ahmedabad', 1),
(6, 'anad', 1),
(7, 'balasinor', 1),
(8, 'bharuch', 1),
(9, 'bhavnager', 1),
(10, 'surat', 1),
(11, 'rajkot', 1),
(12, 'kargil', 28),
(13, 'junaghadg', 1),
(14, 'kaziranga', 25),
(15, 'kochin', 12),
(16, 'kota', 4),
(17, 'ludhiyana', 24),
(18, 'madurai', 13),
(19, 'mumbai', 5);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `mob` int(10) DEFAULT NULL,
  `email_id` varchar(35) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `about _us` varchar(250) DEFAULT NULL,
  `area_area_pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `mob`, `email_id`, `address`, `about _us`, `area_area_pincode`) VALUES
(1, 'surya_Engeenering', 915776250, 'isha@123gmail.com', 'b-14,rameshverpark', 'bjgihlj;pipyh', '01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(35) DEFAULT NULL,
  `mob` int(12) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `order_order_id` int(11) DEFAULT NULL,
  `company_company_id` int(11) NOT NULL,
  `area` varchar(10) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `mob`, `address`, `gender`, `order_order_id`, `company_company_id`, `area`, `user_id`) VALUES
(1, 'isha', 915776250, 'b-14,rameshverpark', 0, NULL, 1, 'asasas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(30) DEFAULT NULL,
  `DOJ` datetime DEFAULT NULL,
  `mob` int(10) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `DOJ`, `mob`, `address`, `company_id`, `user_id`) VALUES
(1, 'mansi', '0000-00-00 00:00:00', 2147483647, 'hbjxkjolkojivabyuyzh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `customer_customer_id` int(11) DEFAULT NULL,
  `discription` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`customer_customer_id`, `discription`, `date`, `product_product_id`, `user_id`) VALUES
(NULL, 'nice', '0000-00-00 00:00:00', 3, 'minal11');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `user_user_id` varchar(11) NOT NULL,
  `customer_customer_id` int(11) DEFAULT NULL,
  `discripation` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `inquiry_status` varchar(30) DEFAULT NULL,
  `product_product_id` int(11) NOT NULL,
  `services_services_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `user_user_id`, `customer_customer_id`, `discripation`, `date`, `inquiry_status`, `product_product_id`, `services_services_id`) VALUES
(1, 'mahesh', NULL, 'how was it to perform', NULL, 'init', 3, 1),
(2, 'mahesh', NULL, 'how was the use of in it', '2023-02-08 04:01:10', 'init', 1, 1),
(3, 'mansi', NULL, 'how was it', '2023-02-08 09:37:31', 'init', 3, 1),
(4, 'minal11', NULL, 'how was it work', '2023-02-09 15:11:08', 'init', 6, 1),
(5, 'minal11', NULL, 'how was it work ..???', '2023-02-11 15:35:55', 'init', 6, 1),
(6, 'minal11', NULL, 'how was it work', '2023-02-11 15:47:42', 'init', 3, 2),
(7, 'mansi', NULL, 'how was it..', '2023-02-13 08:07:09', 'init', 1, 1),
(8, 'minal11', NULL, 'how was it work..', '2023-02-19 06:20:52', 'init', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_detail`
--

CREATE TABLE `inquiry_detail` (
  `inquiry_inquiry_id` int(11) NOT NULL,
  `user_user_id` int(11) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `inq_ans_date` date NOT NULL,
  `product_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `inquiry_report`
-- (See below for the actual view)
--
CREATE TABLE `inquiry_report` (
`user_id` varchar(45)
,`date` timestamp
,`discripation` varchar(255)
,`product_name` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_status`
--

CREATE TABLE `inquiry_status` (
  `inquiry_inquiry_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `inquiry_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inq_status`
--

CREATE TABLE `inq_status` (
  `inquiry_status_id` int(11) NOT NULL,
  `status_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_order_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `recevied_payment` int(11) DEFAULT NULL,
  `payment_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `price` int(12) NOT NULL,
  `QOH` int(11) DEFAULT NULL,
  `product_category_product_category_id` int(11) NOT NULL,
  `No_of_freeservices` int(11) DEFAULT NULL,
  `product_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `QOH`, `product_category_product_category_id`, `No_of_freeservices`, `product_image`) VALUES
(1, 'semiauto', 3000, 10, 1, 1, 'productimg/semiauto.jpg'),
(3, 'die', 1500, 5, 2, 0, 'productimg/die.jpeg'),
(6, 'machince', 36000, 2, 1, NULL, 'productimg/machine.jfif'),
(7, 'wire setting instrument', 5000, 2, 2, NULL, 'productimg/wire setting instrument.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `production_id` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `qty` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `empolyee_id` int(11) DEFAULT NULL,
  `product_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `date`, `qty`, `company_id`, `empolyee_id`, `product_product_id`) VALUES
(1, '0000-00-00 00:00:00', 10, NULL, NULL, 6),
(2, '0000-00-00 00:00:00', 10, NULL, NULL, 6),
(3, '2023-02-08 09:13:52', 10, NULL, NULL, 6),
(5, '2023-02-11 00:00:00', NULL, NULL, NULL, 3),
(6, '2023-02-11 00:00:00', NULL, NULL, NULL, 3),
(7, '2023-02-11 00:00:00', NULL, NULL, NULL, 3),
(8, '2023-02-11 00:00:00', NULL, NULL, NULL, 6),
(9, '2023-02-11 00:00:00', NULL, NULL, NULL, 6),
(11, '2023-02-11 00:00:00', NULL, NULL, NULL, 6),
(12, '2023-02-11 00:00:00', NULL, NULL, NULL, 3),
(13, '2023-02-11 00:00:00', NULL, NULL, NULL, 1),
(16, '2023-02-13 00:00:00', NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `production_detail`
--

CREATE TABLE `production_detail` (
  `raw_material_raw_material_id` int(11) NOT NULL,
  `production_production_id` int(11) NOT NULL,
  `rawmaterial_oty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `production_detail`
--

INSERT INTO `production_detail` (`raw_material_raw_material_id`, `production_production_id`, `rawmaterial_oty`) VALUES
(2, 11, 10),
(2, 12, 12),
(2, 16, 10),
(3, 11, 10),
(3, 16, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL,
  `company_company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `category_name`, `company_company_id`) VALUES
(1, 'machince', 1),
(2, 'parts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `supplier_supplier_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `supplier_supplier_id`, `date`) VALUES
(7, 9, '2023-02-08 18:30:00'),
(8, 9, '2023-02-08 18:30:00'),
(9, 12, '2023-02-28 18:30:00'),
(10, 10, '2023-02-11 18:30:00'),
(11, 10, '2023-02-11 18:30:00'),
(12, 12, '2023-02-09 18:30:00'),
(13, 12, '0000-00-00 00:00:00'),
(14, 10, '0000-00-00 00:00:00'),
(15, 13, '0000-00-00 00:00:00'),
(16, 11, '0000-00-00 00:00:00'),
(17, 11, '0000-00-00 00:00:00'),
(18, 12, '0000-00-00 00:00:00'),
(21, 9, '0000-00-00 00:00:00'),
(23, 12, '2023-02-10 18:30:00'),
(24, 12, '2023-02-10 18:30:00'),
(25, 11, '2023-02-10 18:30:00'),
(26, 13, '2023-02-10 18:30:00'),
(27, 11, '2023-02-10 18:30:00'),
(28, 10, '2023-02-10 18:30:00'),
(29, 10, '2023-02-10 18:30:00'),
(30, 13, '2023-02-10 18:30:00'),
(31, 12, '2023-02-10 18:30:00'),
(32, 12, '2023-02-11 18:30:00'),
(33, 12, '2023-02-12 18:30:00'),
(34, 11, '2023-02-12 18:30:00'),
(35, 10, '2023-02-12 18:30:00'),
(36, 9, '2023-02-12 18:30:00'),
(37, 11, '2023-02-12 18:30:00'),
(38, 10, '2023-02-18 18:30:00'),
(42, 13, '2023-02-19 18:30:00'),
(43, 9, '2023-02-19 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase_purchase_id` int(11) NOT NULL,
  `qty` int(8) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `raw_material_raw_material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_purchase_id`, `qty`, `price`, `raw_material_raw_material_id`) VALUES
(7, 12, 1000, 2),
(8, 10, 1200, 3),
(9, 14, 100, 3),
(10, 14, 12, 3),
(11, 14, 12, 3),
(12, 45, 1200, 3),
(13, 10, 100, 2),
(14, 10, 1000, 2),
(15, 10, 100, 2),
(16, 12, 120, 3),
(17, 12, 120, 3),
(18, 1, 10, 2),
(21, 10, 100, 2),
(29, 122, 22, 2),
(29, 12, 100, 3),
(30, 12, 1200, 2),
(30, 12, 1200, 3),
(31, 10, 1000, 2),
(32, 10, 10, 3),
(33, 10, 10, 3),
(34, 10, 200, 2),
(36, 10, 1500, 2),
(38, 10, 500, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `purchase_rawmaterial`
-- (See below for the actual view)
--
CREATE TABLE `purchase_rawmaterial` (
`supplier_name` varchar(45)
,`raw_material_name` varchar(45)
,`qty` int(8)
,`price` float
);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `purchasereturn_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `purchase_purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_return`
--

INSERT INTO `purchase_return` (`purchasereturn_id`, `date`, `purchase_purchase_id`) VALUES
(1, '2023-02-20 14:45:48', 27),
(2, '2023-02-20 14:54:22', 27),
(3, '2023-02-20 15:36:00', 10),
(4, '2023-02-20 15:36:04', 9),
(5, '2023-02-19 18:30:00', 8),
(6, '2023-02-19 18:30:00', 10),
(7, '2023-02-19 18:30:00', 10),
(8, '2023-02-19 18:30:00', 7),
(9, '2023-02-19 18:30:00', 7),
(10, '2023-02-19 18:30:00', 7),
(11, '2023-02-19 18:30:00', 7),
(12, '2023-02-19 18:30:00', 9),
(13, '2023-02-19 18:30:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_detail`
--

CREATE TABLE `purchase_return_detail` (
  `purchase_return_purchasereturn_id` int(11) NOT NULL,
  `raw_material_raw_material_id` int(11) NOT NULL,
  `qty` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_return_detail`
--

INSERT INTO `purchase_return_detail` (`purchase_return_purchasereturn_id`, `raw_material_raw_material_id`, `qty`) VALUES
(1, 3, 2),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `purchase_return_report`
-- (See below for the actual view)
--
CREATE TABLE `purchase_return_report` (
`raw_material_name` varchar(45)
,`date` timestamp
,`qty` int(8)
);

-- --------------------------------------------------------

--
-- Table structure for table `quatation`
--

CREATE TABLE `quatation` (
  `quatation_id` int(11) NOT NULL,
  `inquiry_inquiry_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quatation_details`
--

CREATE TABLE `quatation_details` (
  `quatation_quatation_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `user_id` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `ratting` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`user_id`, `product_id`, `date`, `ratting`) VALUES
('minal11', 1, '2023-02-06 20:03:35', 4),
('minal11', 1, '2023-02-06 20:06:51', 0),
('mansi', 1, '2023-02-07 19:37:51', 2),
('minal11', 3, '2023-02-09 21:34:13', 4),
('minal11', 0, '2023-02-13 12:20:25', 0),
('minal11', 0, '2023-02-13 12:20:45', 0),
('minal11', 0, '2023-02-13 12:21:08', 0),
('minal11', 0, '2023-02-13 12:21:57', 0),
('minal11', 0, '2023-02-13 12:22:09', 0),
('minal11', 0, '2023-02-13 12:22:46', 0),
('minal11', 0, '2023-02-13 12:24:41', 0),
('minal11', 0, '2023-02-13 12:25:34', 0),
('minal11', 3, '2023-02-13 12:27:58', 0),
('minal11', 3, '2023-02-13 12:29:19', 0),
('minal11', 3, '2023-02-13 12:29:38', 0),
('minal11', 7, '2023-02-13 12:34:45', 0),
('minal11', 7, '2023-02-13 12:34:56', 0),
('minal11', 7, '2023-02-13 12:35:51', 0),
('minal11', 7, '2023-02-13 12:38:38', 2.4),
('minal11', 7, '2023-02-13 12:39:30', 2.4),
('minal11', 7, '2023-02-13 12:40:02', 2.4),
('minal11', 7, '2023-02-13 12:40:20', 2.4),
('minal11', 7, '2023-02-13 12:40:38', 2.4),
('minal11', 7, '2023-02-13 12:41:09', 2.4),
('minal11', 7, '2023-02-13 12:41:18', 2.4),
('minal11', 7, '2023-02-13 12:41:31', 2.4),
('minal11', 7, '2023-02-13 12:42:01', 2.4);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `raw_material_id` int(11) NOT NULL,
  `raw_material_name` varchar(45) DEFAULT NULL,
  `QOH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`raw_material_id`, `raw_material_name`, `QOH`) VALUES
(2, 'bobbins', 20),
(3, 'cotton yarns', 10);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_detail`
--

CREATE TABLE `raw_material_detail` (
  `supplier_supplier_id` int(11) NOT NULL,
  `raw_material_raw_material_id` int(11) NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material_detail`
--

INSERT INTO `raw_material_detail` (`supplier_supplier_id`, `raw_material_raw_material_id`, `price`) VALUES
(9, 3, 500),
(11, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'customer'),
(2, 'admin'),
(3, 'employee'),
(4, 'serviceman');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_order_sales_order_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `sales report`
-- (See below for the actual view)
--
CREATE TABLE `sales report` (
`user_id` varchar(45)
,`product_name` varchar(45)
,`qty` int(11)
,`price` int(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `sales_sales_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `product_qty` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `sales_order_id` int(11) NOT NULL,
  `inquiry_inquiry_id` int(11) DEFAULT NULL,
  `user_id` varchar(45) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `total_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`sales_order_id`, `inquiry_inquiry_id`, `user_id`, `date`, `total_amount`) VALUES
(1, NULL, 'nilesh123', '2023-02-13 16:06:23', 36000),
(3, NULL, 'nilesh123', '2023-02-16 09:23:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_detail`
--

CREATE TABLE `sales_order_detail` (
  `product_product_id` int(11) NOT NULL,
  `sales_order_sales_order_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_order_detail`
--

INSERT INTO `sales_order_detail` (`product_product_id`, `sales_order_sales_order_id`, `qty`, `price`) VALUES
(6, 1, 1, 36000),
(6, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `sales_return_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `sales_sales_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_detail`
--

CREATE TABLE `sales_return_detail` (
  `sales_return_sales_return_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servicemen`
--

CREATE TABLE `servicemen` (
  `servicemen_id` int(11) NOT NULL,
  `servicemen_name` varchar(45) DEFAULT NULL,
  `mob` int(10) DEFAULT NULL,
  `email_id` varchar(45) DEFAULT NULL,
  `sales_order_sales_order_id` int(11) NOT NULL,
  `company_company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `serviceorder`
--

CREATE TABLE `serviceorder` (
  `service_order_id` int(11) NOT NULL,
  `service_id` int(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(45) DEFAULT NULL,
  `services_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serviceorder`
--

INSERT INTO `serviceorder` (`service_order_id`, `service_id`, `datetime`, `user_id`, `services_status`) VALUES
(3, 2, '2023-02-07 12:37:42', 'dp', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`services_id`, `name`, `price`) VALUES
(1, 'partservices', 500),
(2, 'motorservices', 600),
(3, 'engineservices', 1200);

-- --------------------------------------------------------

--
-- Stand-in structure for view `services_report`
-- (See below for the actual view)
--
CREATE TABLE `services_report` (
`user_id` varchar(45)
,`name` varchar(30)
,`datetime` timestamp
,`services_status` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `service_detail`
--

CREATE TABLE `service_detail` (
  `services_services_id` int(12) NOT NULL,
  `servicemen_servicemen_id` varchar(45) NOT NULL,
  `service_status` varchar(20) NOT NULL,
  `service_order_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_detail`
--

INSERT INTO `service_detail` (`services_services_id`, `servicemen_servicemen_id`, `service_status`, `service_order_id`) VALUES
(2, 'dp', 'Initiated', 3);

-- --------------------------------------------------------

--
-- Table structure for table `service_order`
--

CREATE TABLE `service_order` (
  `Service_order_id` int(11) NOT NULL,
  `service_id` int(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sales_sales_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Gujrat'),
(2, 'Karnataka'),
(3, 'Andhra Pradesh'),
(4, 'Rajasthan'),
(5, 'Maharashtra'),
(6, 'Bihar'),
(7, 'Uttar Pradesh'),
(8, 'Madhya Pradesh'),
(9, 'Odisha'),
(10, 'Tripura'),
(11, 'Chhattisgarh'),
(12, 'Kerala'),
(13, 'Tamil Nadu'),
(14, 'West Benagal'),
(15, 'Himachal Pradesh'),
(16, 'JharKhand'),
(17, 'Arunachal Pradesh'),
(18, 'Sikkim'),
(19, 'Manipur'),
(20, 'Goa'),
(21, 'Mizoram'),
(22, 'Meghalaya'),
(23, 'Nagaland'),
(24, 'Punjab'),
(25, 'Assam'),
(26, 'Haryana'),
(27, 'Delhi'),
(28, 'Jammu and Kashmir'),
(29, 'UttaraKhand');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `mob` int(12) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `company_company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `mob`, `address`, `company_company_id`) VALUES
(9, 'manish', 915776250, 'b-14,rameshverpark', 1),
(10, 'manish', 915776250, 'b-14,rameshverpark', 1),
(11, 'ramesh', 2147483647, ' b/14 ramkunj socity nikol', 1),
(12, 'naresh', 2147483647, ' a/24 sarita socity naroda', 1),
(13, 'retu', 2147483647, ' b/14 ramkunj socity nikol', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` varchar(45) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `mob` bigint(12) NOT NULL,
  `gender` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_password`, `email_id`, `role_id`, `address`, `mob`, `gender`) VALUES
('', '', '', 1, '', 0, ''),
('ashwin123', 'ashwin@123', 'ashwin@gmail.com', 3, 'A/24 ramkrushn socity narol', 9998342422, 'f'),
('dp', 'dp@123', 'dp@gmail.com', 4, 'C/2 shivpark socity naroda ahmedabad', 960102034, 'm'),
('ishapatel', 'isha@123', 'moneypanchal4@gmail.com', 2, 'b/14 rameshver park nikol', 7016013055, 'm'),
('mahesh', 'mahesh@123', 'mahesh@gmail.com', 1, 'b/14 nikol', 9601020340, 'M'),
('mansi', '$2y$10$igAn8l0uBOIXNtap/n6o3.GnOLM0Lea6bTMJKty.KmenbPSrjS15m', 'ishapatel333221@gmail.com', 1, 'A/24 pushpak socity maninager..', 9624477972, 'm'),
('minal11', 'minal@123', 'minalvaghela1307@gmail.com', 1, 'A/25 sarita socity nikol ahmedabad', 9157762508, 'f'),
('nilesh123', 'nilesh@123', 'nilesh@gmail.com', 1, 'b-15  narayan road ahmedabad', 9601020340, 'm');

-- --------------------------------------------------------

--
-- Structure for view `inquiry_report`
--
DROP TABLE IF EXISTS `inquiry_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inquiry_report`  AS  select `user_details`.`user_id` AS `user_id`,`inquiry`.`date` AS `date`,`inquiry`.`discripation` AS `discripation`,`product`.`product_name` AS `product_name` from ((`product` join `inquiry` on(`product`.`product_id` = `inquiry`.`product_product_id`)) join `user_details` on(`user_details`.`user_id` = `inquiry`.`user_user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `purchase_rawmaterial`
--
DROP TABLE IF EXISTS `purchase_rawmaterial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `purchase_rawmaterial`  AS  select `supplier`.`supplier_name` AS `supplier_name`,`raw_material`.`raw_material_name` AS `raw_material_name`,`purchase_detail`.`qty` AS `qty`,`purchase_detail`.`price` AS `price` from (((`raw_material` join `purchase_detail` on(`raw_material`.`raw_material_id` = `purchase_detail`.`raw_material_raw_material_id`)) join `purchase` on(`purchase`.`purchase_id` = `purchase_detail`.`purchase_purchase_id`)) join `supplier` on(`supplier`.`supplier_id` = `purchase`.`purchase_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `purchase_return_report`
--
DROP TABLE IF EXISTS `purchase_return_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `purchase_return_report`  AS  select `raw_material`.`raw_material_name` AS `raw_material_name`,`purchase_return`.`date` AS `date`,`purchase_return_detail`.`qty` AS `qty` from (((`purchase_return` join `purchase_return_detail` on(`purchase_return`.`purchasereturn_id` = `purchase_return_detail`.`purchase_return_purchasereturn_id`)) join `raw_material` on(`raw_material`.`raw_material_id` = `purchase_return_detail`.`raw_material_raw_material_id`)) join `raw_material_detail`) ;

-- --------------------------------------------------------

--
-- Structure for view `sales report`
--
DROP TABLE IF EXISTS `sales report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sales report`  AS  select `sales_order`.`user_id` AS `user_id`,`product`.`product_name` AS `product_name`,`sales_order_detail`.`qty` AS `qty`,`sales_order_detail`.`price` AS `price` from (((`sales_order` join `user_details` on(`user_details`.`user_id` = `sales_order`.`date`)) join `sales_order_detail` on(`sales_order`.`sales_order_id` = `sales_order_detail`.`product_product_id`)) join `product` on(`product`.`product_id` = `sales_order_detail`.`product_product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `services_report`
--
DROP TABLE IF EXISTS `services_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `services_report`  AS  select `user_details`.`user_id` AS `user_id`,`services`.`name` AS `name`,`serviceorder`.`datetime` AS `datetime`,`serviceorder`.`services_status` AS `services_status` from ((`services` join `serviceorder` on(`services`.`services_id` = `serviceorder`.`service_id`)) join `user_details` on(`user_details`.`user_id` = `serviceorder`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_pincode`),
  ADD KEY `fk_area_city1_idx` (`city_city_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cart_ibfk_1` (`product_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `fk_city_state1_idx` (`state_state_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`,`area_area_pincode`),
  ADD KEY `fk_company_area1_idx` (`area_area_pincode`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`,`company_company_id`),
  ADD KEY `fk_customer_order1_idx` (`order_order_id`),
  ADD KEY `fk_customer_company1_idx` (`company_company_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_employee_warehouse1_idx` (`company_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`product_product_id`) USING BTREE,
  ADD KEY `fk_feedback_customer1_idx` (`customer_customer_id`),
  ADD KEY `fk_feedback_product1_idx` (`product_product_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`,`services_services_id`),
  ADD KEY `fk_inquiry_customer1_idx` (`customer_customer_id`),
  ADD KEY `fk_inquiry_product1_idx` (`product_product_id`),
  ADD KEY `fk_inquiry_services1_idx` (`services_services_id`),
  ADD KEY `user_user_id` (`user_user_id`);

--
-- Indexes for table `inquiry_detail`
--
ALTER TABLE `inquiry_detail`
  ADD PRIMARY KEY (`inquiry_inquiry_id`),
  ADD KEY `fk_inquiry_detail_product1_idx` (`product_product_id`);

--
-- Indexes for table `inquiry_status`
--
ALTER TABLE `inquiry_status`
  ADD PRIMARY KEY (`inquiry_inquiry_id`,`product_product_id`),
  ADD KEY `fk_inquiry_has_product_product1_idx` (`product_product_id`),
  ADD KEY `fk_inquiry_has_product_inquiry1_idx` (`inquiry_inquiry_id`);

--
-- Indexes for table `inq_status`
--
ALTER TABLE `inq_status`
  ADD PRIMARY KEY (`inquiry_status_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_payment_order1_idx` (`order_order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_product_category1_idx` (`product_category_product_category_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`production_id`,`product_product_id`),
  ADD KEY `fk_production_employee1_idx` (`company_id`),
  ADD KEY `fk_production_warehouse1_idx` (`empolyee_id`),
  ADD KEY `fk_production_product1_idx` (`product_product_id`);

--
-- Indexes for table `production_detail`
--
ALTER TABLE `production_detail`
  ADD PRIMARY KEY (`raw_material_raw_material_id`,`production_production_id`),
  ADD KEY `fk_raw_material_has_production_production1_idx` (`production_production_id`),
  ADD KEY `fk_raw_material_has_production_raw_material1_idx` (`raw_material_raw_material_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`,`company_company_id`),
  ADD KEY `fk_product_category_company1_idx` (`company_company_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `fk_purchase_supplier1_idx` (`supplier_supplier_id`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`purchase_purchase_id`,`raw_material_raw_material_id`),
  ADD KEY `fk_purchase_detail_purchase1_idx` (`purchase_purchase_id`),
  ADD KEY `fk_purchase_detail_raw_material1_idx` (`raw_material_raw_material_id`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`purchasereturn_id`),
  ADD KEY `fk_purchase_return_purchase1_idx` (`purchase_purchase_id`);

--
-- Indexes for table `purchase_return_detail`
--
ALTER TABLE `purchase_return_detail`
  ADD PRIMARY KEY (`purchase_return_purchasereturn_id`,`raw_material_raw_material_id`),
  ADD KEY `fk_purchase_return_has_raw_material_raw_material1_idx` (`raw_material_raw_material_id`),
  ADD KEY `fk_purchase_return_has_raw_material_purchase_return1_idx` (`purchase_return_purchasereturn_id`);

--
-- Indexes for table `quatation`
--
ALTER TABLE `quatation`
  ADD PRIMARY KEY (`quatation_id`),
  ADD KEY `fk_quatation_inquiry1_idx` (`inquiry_inquiry_id`);

--
-- Indexes for table `quatation_details`
--
ALTER TABLE `quatation_details`
  ADD PRIMARY KEY (`quatation_quatation_id`,`product_product_id`),
  ADD KEY `fk_quatation_has_product_product1_idx` (`product_product_id`),
  ADD KEY `fk_quatation_has_product_quatation1_idx` (`quatation_quatation_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`raw_material_id`);

--
-- Indexes for table `raw_material_detail`
--
ALTER TABLE `raw_material_detail`
  ADD PRIMARY KEY (`supplier_supplier_id`,`raw_material_raw_material_id`),
  ADD KEY `fk_raw_material_detail_supplier1_idx` (`supplier_supplier_id`),
  ADD KEY `fk_raw_material_detail_raw_material1_idx` (`raw_material_raw_material_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `fk_sales_sales_order1_idx` (`sales_order_sales_order_id`);

--
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`sales_sales_id`,`product_product_id`),
  ADD KEY `fk_sales_has_product_product1_idx` (`product_product_id`),
  ADD KEY `fk_sales_has_product_sales1_idx` (`sales_sales_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`sales_order_id`),
  ADD KEY `fk_order_inquiry1_idx` (`inquiry_inquiry_id`);

--
-- Indexes for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  ADD PRIMARY KEY (`product_product_id`,`sales_order_sales_order_id`),
  ADD KEY `fk_product_has_sales_order_sales_order1_idx` (`sales_order_sales_order_id`),
  ADD KEY `fk_product_has_sales_order_product1_idx` (`product_product_id`);

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`sales_return_id`),
  ADD KEY `fk_sales_return_sales1_idx` (`sales_sales_id`);

--
-- Indexes for table `sales_return_detail`
--
ALTER TABLE `sales_return_detail`
  ADD PRIMARY KEY (`sales_return_sales_return_id`,`product_product_id`),
  ADD KEY `fk_sales_return_has_product_product1_idx` (`product_product_id`),
  ADD KEY `fk_sales_return_has_product_sales_return1_idx` (`sales_return_sales_return_id`);

--
-- Indexes for table `servicemen`
--
ALTER TABLE `servicemen`
  ADD PRIMARY KEY (`servicemen_id`,`sales_order_sales_order_id`,`company_company_id`),
  ADD KEY `fk_servicemen_sales_order1_idx` (`sales_order_sales_order_id`),
  ADD KEY `fk_servicemen_company1_idx` (`company_company_id`);

--
-- Indexes for table `serviceorder`
--
ALTER TABLE `serviceorder`
  ADD PRIMARY KEY (`service_order_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `service_order`
--
ALTER TABLE `service_order`
  ADD PRIMARY KEY (`Service_order_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`,`company_company_id`),
  ADD KEY `fk_supplier_company1_idx` (`company_company_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inq_status`
--
ALTER TABLE `inq_status`
  MODIFY `inquiry_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `purchasereturn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quatation`
--
ALTER TABLE `quatation`
  MODIFY `quatation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `sales_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `sales_return_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicemen`
--
ALTER TABLE `servicemen`
  MODIFY `servicemen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serviceorder`
--
ALTER TABLE `serviceorder`
  MODIFY `service_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_order`
--
ALTER TABLE `service_order`
  MODIFY `Service_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_area_city1` FOREIGN KEY (`city_city_id`) REFERENCES `city` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_state1` FOREIGN KEY (`state_state_id`) REFERENCES `state` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_company_area1` FOREIGN KEY (`area_area_pincode`) REFERENCES `area` (`area_pincode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_company1` FOREIGN KEY (`company_company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_order1` FOREIGN KEY (`order_order_id`) REFERENCES `sales_order` (`sales_order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_warehouse1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `fk_inquiry_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inquiry_services1` FOREIGN KEY (`services_services_id`) REFERENCES `services` (`services_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`user_user_id`) REFERENCES `user_details` (`user_id`);

--
-- Constraints for table `inquiry_detail`
--
ALTER TABLE `inquiry_detail`
  ADD CONSTRAINT `fk_inquiry_detail_inquiry1` FOREIGN KEY (`inquiry_inquiry_id`) REFERENCES `inquiry` (`inquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inquiry_detail_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inquiry_status`
--
ALTER TABLE `inquiry_status`
  ADD CONSTRAINT `fk_inquiry_has_product_inquiry1` FOREIGN KEY (`inquiry_inquiry_id`) REFERENCES `inquiry` (`inquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inquiry_has_product_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_order1` FOREIGN KEY (`order_order_id`) REFERENCES `sales_order` (`sales_order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_product_category1` FOREIGN KEY (`product_category_product_category_id`) REFERENCES `product_category` (`product_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `fk_production_employee1` FOREIGN KEY (`company_id`) REFERENCES `employee` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_production_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_production_warehouse1` FOREIGN KEY (`empolyee_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `production_detail`
--
ALTER TABLE `production_detail`
  ADD CONSTRAINT `fk_raw_material_has_production_production1` FOREIGN KEY (`production_production_id`) REFERENCES `production` (`production_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raw_material_has_production_raw_material1` FOREIGN KEY (`raw_material_raw_material_id`) REFERENCES `raw_material` (`raw_material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `fk_product_category_company1` FOREIGN KEY (`company_company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_purchase_supplier1` FOREIGN KEY (`supplier_supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `fk_purchase_detail_purchase1` FOREIGN KEY (`purchase_purchase_id`) REFERENCES `purchase` (`purchase_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchase_detail_raw_material1` FOREIGN KEY (`raw_material_raw_material_id`) REFERENCES `raw_material` (`raw_material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD CONSTRAINT `fk_purchase_return_purchase1` FOREIGN KEY (`purchase_purchase_id`) REFERENCES `purchase` (`purchase_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_return_detail`
--
ALTER TABLE `purchase_return_detail`
  ADD CONSTRAINT `fk_purchase_return_has_raw_material_purchase_return1` FOREIGN KEY (`purchase_return_purchasereturn_id`) REFERENCES `purchase_return` (`purchasereturn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchase_return_has_raw_material_raw_material1` FOREIGN KEY (`raw_material_raw_material_id`) REFERENCES `raw_material` (`raw_material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quatation`
--
ALTER TABLE `quatation`
  ADD CONSTRAINT `fk_quatation_inquiry1` FOREIGN KEY (`inquiry_inquiry_id`) REFERENCES `inquiry` (`inquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quatation_details`
--
ALTER TABLE `quatation_details`
  ADD CONSTRAINT `fk_quatation_has_product_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_quatation_has_product_quatation1` FOREIGN KEY (`quatation_quatation_id`) REFERENCES `quatation` (`quatation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`);

--
-- Constraints for table `raw_material_detail`
--
ALTER TABLE `raw_material_detail`
  ADD CONSTRAINT `fk_raw_material_detail_raw_material1` FOREIGN KEY (`raw_material_raw_material_id`) REFERENCES `raw_material` (`raw_material_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_raw_material_detail_supplier1` FOREIGN KEY (`supplier_supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_sales_order1` FOREIGN KEY (`sales_order_sales_order_id`) REFERENCES `sales_order` (`sales_order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `fk_sales_has_product_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_has_product_sales1` FOREIGN KEY (`sales_sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `fk_order_inquiry1` FOREIGN KEY (`inquiry_inquiry_id`) REFERENCES `inquiry` (`inquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  ADD CONSTRAINT `fk_product_has_sales_order_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_sales_order_sales_order1` FOREIGN KEY (`sales_order_sales_order_id`) REFERENCES `sales_order` (`sales_order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD CONSTRAINT `fk_sales_return_sales1` FOREIGN KEY (`sales_sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_return_detail`
--
ALTER TABLE `sales_return_detail`
  ADD CONSTRAINT `fk_sales_return_has_product_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_return_has_product_sales_return1` FOREIGN KEY (`sales_return_sales_return_id`) REFERENCES `sales_return` (`sales_return_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `servicemen`
--
ALTER TABLE `servicemen`
  ADD CONSTRAINT `fk_servicemen_company1` FOREIGN KEY (`company_company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicemen_sales_order1` FOREIGN KEY (`sales_order_sales_order_id`) REFERENCES `sales_order` (`sales_order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_order`
--
ALTER TABLE `service_order`
  ADD CONSTRAINT `fk_Service_order_sales1` FOREIGN KEY (`sales_sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `fk_supplier_company1` FOREIGN KEY (`company_company_id`) REFERENCES `company` (`company_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
