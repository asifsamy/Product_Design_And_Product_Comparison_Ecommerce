-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 01:25 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `design_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Asif Samy', 'admin', 'asifsamy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `s_size` int(11) NOT NULL DEFAULT '0',
  `m_size` int(11) NOT NULL DEFAULT '0',
  `l_size` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `pd_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Hoody'),
(2, 'Half Sleeve Tshirt'),
(3, 'Full Sleeve Tshirt'),
(4, 'Mug'),
(5, 'Bag');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `status`, `date`) VALUES
(1, 'Samy', 'asifsamy@gmail.com', 'Payment Query', 'Can I get product after payment', 1, '2017-11-24 18:31:48'),
(2, 'Sanjida', 'akter13sa@gmail.com', 'Security Purpose', 'With growing numbers of eCommerce and m-commerce transactions, there are new opportunities for cyber criminals. As a merchant, you need to ensure that you provide the best payment security and that your customers donâ€™t have to worry about their data. Are you sure payments on your website are processed in a secure way?', 0, '2017-11-24 22:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(60) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `country` varchar(60) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fName`, `lName`, `email`, `pass`, `address`, `city`, `zip`, `country`, `phone`, `code`, `status`) VALUES
(11, 'Asif', 'Samy', 'akter13sa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Mirpur-10, Dhaka', 'Dhaka', '1000', 'Bangladesh', '01737887516', 'bdf4e58e217cda5cd742443e1d5034ac', 1),
(12, 'Sabit', 'Hossain', 'asifsamy@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aftabnagar, Dhaka', 'Dhaka', '1212', 'Bangladesh', '01737887516', '1885e40dbac77f5c8726730bb91fb5ff', 1),
(13, 'Momtaj', 'Rasel', 'momtazrasel8@gmail.com', 'e89028a83e8c0cfd45b54f3e96d52a16', 'Aftabnagar, Dhaka', 'Dhaka', '1212', 'Bangladesh', '01755240716', 'e3914d0cf876a1e8663273edc67e14c2', 2),
(14, 'Arif', 'Sany', 'alsany71@gmail.com', 'e89028a83e8c0cfd45b54f3e96d52a16', 'Aftabnagar, Dhaka', 'Dhaka', '1212', 'Bangladesh', '01717887516', '4fde36e36e6a9a648f0ef39fdc9c1f0d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

CREATE TABLE `cus_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `s_size` int(11) NOT NULL DEFAULT '0',
  `m_size` int(11) NOT NULL DEFAULT '0',
  `l_size` int(11) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pd_type` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `s_size`, `m_size`, `l_size`, `price`, `image`, `pd_type`, `date`, `status`) VALUES
(12, 12, 71, 'Customized Half-Sleeve T-Shirt', 7, 3, 2, 2, 350.00, 'uploads/0631ab5b80b76d49e9a0c75a607629fd.png', 0, '2017-11-26 16:45:08', 0),
(13, 14, 73, 'Customized Full-Sleeve T-Shirt', 8, 2, 2, 4, 450.00, 'uploads/acf57770d086ee6b298ca0b6ca829930.png', 0, '2017-11-26 22:32:41', 1),
(16, 14, 45, 'Customized Half-Sleeve T-Shirt', 6, 2, 2, 2, 350.00, 'uploads/bd2009b8e480f76293611f77210300ae.png', 1, '2017-11-27 00:37:45', 0),
(17, 12, 76, 'Customized Hoody', 6, 2, 2, 2, 550.00, 'uploads/a32c3dd89efd231ec0b4f554e24c40f0.png', 1, '2017-11-27 00:41:07', 1),
(18, 11, 76, 'Customized Hoody', 6, 2, 2, 2, 550.00, 'uploads/a32c3dd89efd231ec0b4f554e24c40f0.png', 1, '2017-11-27 00:45:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `others_product`
--

CREATE TABLE `others_product` (
  `product_image` varchar(660) NOT NULL,
  `product_name` varchar(660) DEFAULT NULL,
  `product_address` varchar(660) NOT NULL,
  `product_catagory` varchar(660) NOT NULL,
  `product_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_req`
--

CREATE TABLE `product_req` (
  `PID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `others_product`
--
ALTER TABLE `others_product`
  ADD PRIMARY KEY (`product_address`);

--
-- Indexes for table `product_req`
--
ALTER TABLE `product_req`
  ADD PRIMARY KEY (`PID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_req`
--
ALTER TABLE `product_req`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
