-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 03:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seasell_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bike_product`
--

CREATE TABLE `bike_product` (
  `PRODUCT_NO` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(200) NOT NULL,
  `PRODUCT_PRICE` int(200) NOT NULL,
  `PRODUCT_CONDITION` varchar(200) NOT NULL,
  `PRODUCT_DESCRIPTION` longtext NOT NULL,
  `PRODUCT_TYPE` varchar(200) NOT NULL,
  `PRODUCT_QTY` varchar(200) NOT NULL,
  `PRODUCT_DEALMETHOD` varchar(200) NOT NULL,
  `MEET_UP` varchar(200) NOT NULL,
  `MAILING` varchar(200) NOT NULL,
  `PICTURE_ID` varchar(200) NOT NULL,
  `SELLER_ID` varchar(200) NOT NULL,
  `PROD_ID` varchar(200) NOT NULL,
  `STATUS` varchar(200) NOT NULL,
  `DATE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike_product`
--

INSERT INTO `bike_product` (`PRODUCT_NO`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_CONDITION`, `PRODUCT_DESCRIPTION`, `PRODUCT_TYPE`, `PRODUCT_QTY`, `PRODUCT_DEALMETHOD`, `MEET_UP`, `MAILING`, `PICTURE_ID`, `SELLER_ID`, `PROD_ID`, `STATUS`, `DATE`) VALUES
(1, 'SLX - Rear Derailleur - SHIMANO SHADOW RD+ - 1x12', 4025, 'Brand new', 'Larger 13T pulleys increase efficiency and chain management while compatibility with SHIMANOs new 12-speed cassettes boosts range', 'Parts & Accessories', 'ONE', 'Meet-up Mailing & Delivery', 'Lower Antipolo', 'Buyers preferred courrier', 'bike_picid_1', 'v1ig9s2m0p', 'bike_id_1', 'LISTED', '2021-01-27'),
(2, 'Mountain Bike', 15000, 'Brand new', 'No issue, New release', 'Mountain Bike', 'ONE', 'Meet-up Mailing & Delivery', 'Quezon City Circle', 'Message Me in Facebook', 'bike_picid_2', 'v1ig9s2m0p', 'bike_id_2', 'LISTED', '2022-09-27'),
(3, 'E-bike 3000', 0, 'Like new', 'Luma na pero pwede na', 'E-Bikes', 'MORE', 'Meet-up ', 'SM', '', 'bike_picid_3', 'v1ig9s2m0p', 'bike_id_3', 'LISTED', '2022-05-5'),
(4, 'Road Bike', 10500, 'Lightly used', '', 'Road Bikes', 'ONE', 'Meet-up ', 'SM north Edsa', '', 'bike_picid_4', 'v1ig9s2m0p', 'bike_id_4', 'DELISTED', '2022-06-18'),
(5, 'Specialized mtb 26ers', 101, 'Well used', 'Di n nagagamit', 'Other Bicycles', 'ONE', 'Meet-up ', 'San Jose del Monte', '', 'bike_picid_5', 'v1ig9s2m0p', 'bike_id_5', 'SOLD', '2022-12-05'),
(6, 'Bike Grips', 17000, 'Lightly used', '', 'Other Bicycles', 'ONE', 'Meet-up Mailing & Delivery', 'Fisher Mall', 'Lala Move', 'bike_picid_6', '5j5pfjyc4k', 'bike_id_6', 'LISTED', '2022-12-7'),
(7, 'Ghost rider', 20000, 'Brand new', '', 'Road Bikes', 'ONE', 'Meet-up ', 'ssdvsdvsv', '', 'bike_picid_7', 'po6d7c15ofg', 'bike_id_7', 'LISTED', '2022-12-11'),
(8, 'Children Bike', 0, 'Well used', '', 'Children Bikes', 'ONE', 'Meet-up ', 'North Caloocan', '', 'bike_picid_8', 'po6d7c15ofg', 'bike_id_8', 'DELISTED', '2022-12-12'),
(9, 'dvsvdsvv', 33, 'Brand new', 'dsvv', 'Foldable Bikes', 'ONE', 'Meet-up ', 'svdsvsdv', '', 'bike_picid_9', 'v1ig9s2m0p', 'bike_id_9', 'DELISTED', '2022-12-12'),
(10, 'Continental Race King CX 700 x 35C', 20000, 'Brand new', 'Technically manufactured with an optimal ratio of grip, ability to adapt to the terrain and low rolling resistance. Breathtaking rides guaranteed!', 'Mountain Bike', 'ONE', 'Meet-up ', 'North Caloocan', '', 'bike_picid_10', 'invjzcqodp', 'bike_id_10', 'LISTED', '2022-12-12'),
(11, 'vdsvdsdhgshhs', 6000, 'Lightly used', 'testing', 'Mountain Bike', 'ONE', 'Meet-up ', 'Quezon city', '', 'bike_picid_11', 'x0yleh3l6l', 'bike_id_11', 'LISTED', '2022-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `fashion_imgs`
--

CREATE TABLE `fashion_imgs` (
  `IMG_ID` int(11) NOT NULL,
  `IMG_INDEX` varchar(200) NOT NULL,
  `IMG_NAME` varchar(200) NOT NULL,
  `PICTURE_ID` varchar(200) NOT NULL,
  `PROD_ID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fashion_imgs`
--

INSERT INTO `fashion_imgs` (`IMG_ID`, `IMG_INDEX`, `IMG_NAME`, `PICTURE_ID`, `PROD_ID`) VALUES
(2, '0', 'H&M Pants_0.jpg', 'fashion_picid_2', 'fashion_id_2'),
(3, '1', 'H&M Pants_1.jpg', 'fashion_picid_2', 'fashion_id_2'),
(4, '0', 'Jordan 1 high GS “Lost and found”_0.jpg', 'fashion_picid_3', 'fashion_id_3'),
(54, '0', 'PRE-OWNED JACKET WINDBREAKER Vintage Helly Hanse_0.jpg', 'fashion_picid_1', 'fashion_id_1'),
(55, '0', 'Balencia_0.jpg', 'fashion_picid_4', 'fashion_id_4'),
(56, '0', 'dsvdvdsv_0.jpg', 'fashion_picid_5', 'fashion_id_5');

-- --------------------------------------------------------

--
-- Table structure for table `fashion_product`
--

CREATE TABLE `fashion_product` (
  `PRODUCT_NO` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(200) NOT NULL,
  `PRODUCT_PRICE` int(200) NOT NULL,
  `PRODUCT_CONDITION` varchar(200) NOT NULL,
  `PRODUCT_DESCRIPTION` longtext NOT NULL,
  `PRODUCT_TYPE` varchar(200) NOT NULL,
  `PRODUCT_GENDER` varchar(200) NOT NULL,
  `PRODUCT_SIZE` varchar(200) NOT NULL,
  `PRODUCT_QTY` varchar(200) NOT NULL,
  `PRODUCT_DEALMETHOD` varchar(200) NOT NULL,
  `MEET_UP` varchar(200) NOT NULL,
  `MAILING` varchar(200) NOT NULL,
  `PICTURE_ID` varchar(200) NOT NULL,
  `SELLER_ID` varchar(200) NOT NULL,
  `PROD_ID` varchar(200) NOT NULL,
  `STATUS` varchar(200) NOT NULL,
  `DATE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fashion_product`
--

INSERT INTO `fashion_product` (`PRODUCT_NO`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_CONDITION`, `PRODUCT_DESCRIPTION`, `PRODUCT_TYPE`, `PRODUCT_GENDER`, `PRODUCT_SIZE`, `PRODUCT_QTY`, `PRODUCT_DEALMETHOD`, `MEET_UP`, `MAILING`, `PICTURE_ID`, `SELLER_ID`, `PROD_ID`, `STATUS`, `DATE`) VALUES
(1, 'PRE-OWNED JACKET WINDBREAKER Vintage Helly Hanse', 3200, 'Like new', 'Rare, Good as new, need wash unisex', 'Jacket, Coat and Outwear', 'Female', 'M / EU 38 / UK 10 / US 6', 'ONE', ' Mailing & Delivery', '', 'J&T or buyers preferred courier (The buyer is responsible for the shipping price, which paid in cash upon delivery.)', 'fashion_picid_1', 'v1ig9s2m0p', 'fashion_id_1', 'LISTED', '2022-08-27'),
(2, 'H&M Pants', 600, 'Brand new', 'A-line distressed denim skirt', 'Bottom', 'Female', 'M / EU 38 / UK 10 / US 6', 'ONE', 'Meet-up ', 'Vista Mall Taguig', '', 'fashion_picid_2', 'v1ig9s2m0p', 'fashion_id_2', 'LISTED', '2022-12-1'),
(3, 'Jordan 1 high GS “Lost and found”', 15000, 'Well used', 'Jordan 1 high GS “Lost and found”, BRAND NEW, size 6Y or 7.5wmns, ₱ 15000', 'Footwear', 'Male', 'EU 42 / UK 8 / US 9', 'MORE', 'Meet-up Mailing & Delivery', 'SM Bacoor Bus Terminal', 'Lalamove / Grab', 'fashion_picid_3', 'v1ig9s2m0p', 'fashion_id_3', 'SOLD', '2022-10-12'),
(4, 'Balencia', 0, 'Lightly used', '', 'Tops', 'Female', 'M / EU 38 / UK 10 / US 6', 'ONE', 'Meet-up ', 'North Korea', '', 'fashion_picid_4', 'po6d7c15ofg', 'fashion_id_4', 'LISTED', '1998'),
(5, 'dsvdvdsv', 0, 'Like new', 'dsvdvsv', 'Footwear', 'Female', 'EU 37 / UK 4 / US 6', 'MORE', 'Meet-up Mailing & Delivery', 'svsdvvsdv', 'svdsvsvv', 'fashion_picid_5', 'v1ig9s2m0p', 'fashion_id_5', 'DELISTED', '1998');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `MESSAGE_ID` int(11) NOT NULL,
  `SELLER_ID` varchar(200) NOT NULL,
  `BUYER_ID` varchar(200) NOT NULL,
  `STATUS` varchar(200) NOT NULL,
  `PROD_ID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`MESSAGE_ID`, `SELLER_ID`, `BUYER_ID`, `STATUS`, `PROD_ID`) VALUES
(1, '5j5pfjyc4k', 'v1ig9s2m0p', '', 'bike_id_6');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `INDEX_MESSAGE` int(100) DEFAULT NULL,
  `MESSAGE` varchar(200) NOT NULL,
  `DATE` varchar(200) NOT NULL DEFAULT 'CURDATE()',
  `TIME` varchar(200) NOT NULL DEFAULT 'CURRENT_TIME()	',
  `FROM_USER` varchar(200) NOT NULL,
  `MESSAGE_ID` varchar(200) NOT NULL,
  `SPECIAL_TYPE` varchar(45) DEFAULT NULL,
  `SPECIAL_VALUE` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `INDEX_MESSAGE`, `MESSAGE`, `DATE`, `TIME`, `FROM_USER`, `MESSAGE_ID`, `SPECIAL_TYPE`, `SPECIAL_VALUE`) VALUES
(1, 0, 'blabla', '2022-12-9', '16:38:57', 'v1ig9s2m0p', '', '', NULL),
(2, 0, 'bla bla', '2022-12-9', '16:42:7', 'v1ig9s2m0p', '', '', NULL),
(3, 0, 'thank you', '2022-12-9', '16:43:14', 'v1ig9s2m0p', '', '', NULL),
(4, 0, 'thank you very much', '2022-12-9', '16:43:47', 'v1ig9s2m0p', '1', '', NULL),
(5, 0, 'sha sha', '2022-12-9', '16:44:12', 'v1ig9s2m0p', '1', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `IMG_ID` int(11) NOT NULL,
  `IMG_INDEX` varchar(250) NOT NULL,
  `IMG_NAME` varchar(250) NOT NULL,
  `PICTURE_ID` varchar(250) NOT NULL,
  `PROD_ID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`IMG_ID`, `IMG_INDEX`, `IMG_NAME`, `PICTURE_ID`, `PROD_ID`) VALUES
(3, '0', 'E-bike 3000_0.jpg', 'bike_picid_3', 'bike_id_3'),
(12, '0', 'SLX - Rear Derailleur - SHIMANO SHADOW RD+ - 1x12_0.jpg', 'bike_picid_1', 'bike_id_1'),
(16, '0', 'Road Bike_0.png', 'bike_picid_4', 'bike_id_4'),
(25, '0', 'Specialized mtb 26ers_0.jpg', 'bike_picid_5', 'bike_id_5'),
(26, '1', 'Specialized mtb 26ers_1.jpg', 'bike_picid_5', 'bike_id_5'),
(27, '2', 'Specialized mtb 26ers_2.jpg', 'bike_picid_5', 'bike_id_5'),
(28, '0', 'Mountain Bike_0.jpg', 'bike_picid_2', 'bike_id_2'),
(30, '0', 'Bike Grip_0.jpg', 'bike_picid_6', 'bike_id_6'),
(31, '1', 'Bike Grip_1.jpg', 'bike_picid_6', 'bike_id_6'),
(32, '0', 'Ghost rider_0.jpg', 'bike_picid_7', 'bike_id_7'),
(33, '1', 'Ghost rider_1.jpg', 'bike_picid_7', 'bike_id_7'),
(34, '2', 'Ghost rider_2.jpeg', 'bike_picid_7', 'bike_id_7'),
(35, '0', 'Children Bike_0.jpg', 'bike_picid_8', 'bike_id_8'),
(36, '0', 'dvsvdsvv_0.jpg', 'bike_picid_9', 'bike_id_9'),
(37, '0', 'Continental Race King CX 700 x 35C_0.jpg', 'bike_picid_10', 'bike_id_10'),
(38, '1', 'Continental Race King CX 700 x 35C_1.jpg', 'bike_picid_10', 'bike_id_10'),
(39, '2', 'Continental Race King CX 700 x 35C_2.jpg', 'bike_picid_10', 'bike_id_10'),
(40, '3', 'Continental Race King CX 700 x 35C_3.jpg', 'bike_picid_10', 'bike_id_10'),
(41, '4', 'Continental Race King CX 700 x 35C_4.jpg', 'bike_picid_10', 'bike_id_10'),
(42, '0', 'vdsvdsdhgshhs_0.jpg', 'bike_picid_11', 'bike_id_11');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `REVIEW_ID` int(11) NOT NULL,
  `RATE` varchar(200) NOT NULL,
  `MESSAGE` varchar(200) NOT NULL,
  `SELLER_ID` varchar(200) NOT NULL,
  `BUYER_ID` varchar(200) NOT NULL,
  `PROD_ID` varchar(200) NOT NULL,
  `STATUS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`REVIEW_ID`, `RATE`, `MESSAGE`, `SELLER_ID`, `BUYER_ID`, `PROD_ID`, `STATUS`) VALUES
(1, '4', 'Good Item', 'v1ig9s2m0p', '5j5pfjyc4k', 'fashion_id_1', 'ACTIVE'),
(2, '5', 'Angas', 'v1ig9s2m0p', '5j5pfjyc4k', 'fashion_id_3', 'ACTIVE'),
(3, '4', 'Nice', 'v1ig9s2m0p', '5j5pfjyc4k', 'fashion_id_1', 'ACTIVE'),
(4, '4', 'Angas walo gulong', 'v1ig9s2m0p', '5j5pfjyc4k', 'bike_id_2', 'DELETE'),
(5, '4', 'ganda ', '5j5pfjyc4k', 'po6d7c15ofg', 'bike_id_6', 'ACTIVE'),
(6, '2', 'GALING WALO GULONG', 'v1ig9s2m0p', 'po6d7c15ofg', 'bike_id_4', 'DELETE'),
(7, '3', 'vdsdsvsvsdvsvs', '5j5pfjyc4k', 'v1ig9s2m0p', 'bike_id_6', 'ACTIVE'),
(8, '4', 'ssss', 'x0yleh3l6l', 'v1ig9s2m0p', 'bike_id_11', 'ACTIVE'),
(9, '4', 'eee', 'po6d7c15ofg', 'v1ig9s2m0p', 'bike_id_7', 'ACTIVE'),
(10, '5', 'DVDSVVDV', 'po6d7c15ofg', 'v1ig9s2m0p', 'bike_id_7', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `FIRSTNAME` varchar(200) NOT NULL,
  `LASTNAME` varchar(200) NOT NULL,
  `BIO` longtext NOT NULL,
  `REGION` varchar(200) NOT NULL,
  `CITY` varchar(200) NOT NULL,
  `EMAIL_ADDRESS` varchar(200) NOT NULL,
  `MOBILE_NUMBER` varchar(200) NOT NULL,
  `GENDER` varchar(200) NOT NULL,
  `BIRTHDAY` varchar(200) NOT NULL,
  `PROFILE_PIC` varchar(200) NOT NULL,
  `SESSION_KEY` varchar(200) NOT NULL,
  `RATING` varchar(200) NOT NULL,
  `JOINED_DATE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `BIO`, `REGION`, `CITY`, `EMAIL_ADDRESS`, `MOBILE_NUMBER`, `GENDER`, `BIRTHDAY`, `PROFILE_PIC`, `SESSION_KEY`, `RATING`, `JOINED_DATE`) VALUES
(1, 'Fantonio01', 'password', 'Francis', 'Antonio', '', 'Metro Manila', 'Quezon City', 'francis.antonio01@yahoo.com', '09335322325', 'Female', '2002-09-27', 'user.png', 'v1ig9s2m0p', '3.03', '2022-09-27'),
(2, 'Orbiso02', 'robinjames', 'Robin', 'James', '', 'Metro Manila', 'Caloocan City', 'orbiso02@yahoo.com', '091234567892', '', '', 'user.png', '5j5pfjyc4k', '', '2022-12-07'),
(3, 'Braca03', 'password', 'Account', '359', '', 'Metro Manila', 'Mandaluyong City', 'Braca03@gmail.com', '09222222222', 'Male', '', 'user.png', 'po6d7c15ofg', '2.5', '2022-12-11'),
(4, 'ayosssdvd', 'vsvsvvsvv', 'Account', '749', '', 'Metro Manila', 'Taguig', 'vdvsvsdvsd@vdsv.com', '243526436363', '', '', 'ayosssdvd.jpg', 'n8sy1oiyfl', '', '2022-12-12'),
(5, 'nicolas04', 'password', 'Account', '267', '', 'Metro Manila', 'San Juan City', 'nicolas04@gmail.com', '09111222334', '', '', 'user.png', 'j04yukiypyl', '', '2022-12-12'),
(6, 'Fantonio05', 'password', 'Francis', 'Antonio', '', 'Metro Manila', 'Quezon City', 'francis01@gmail.com', '09222115225', 'Male', '2009-02-28', 'user.png', 'invjzcqodp', '', '2022-12-12'),
(7, 'User01', 'password', 'Account', '524', '', 'Metro Manila', 'San Juan City', 'User01@gmail.com', '09111311123', '', '', 'user.png', 'x0yleh3l6l', '', '2022-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike_product`
--
ALTER TABLE `bike_product`
  ADD PRIMARY KEY (`PRODUCT_NO`);

--
-- Indexes for table `fashion_imgs`
--
ALTER TABLE `fashion_imgs`
  ADD PRIMARY KEY (`IMG_ID`);

--
-- Indexes for table `fashion_product`
--
ALTER TABLE `fashion_product`
  ADD PRIMARY KEY (`PRODUCT_NO`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`MESSAGE_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`IMG_ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`REVIEW_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bike_product`
--
ALTER TABLE `bike_product`
  MODIFY `PRODUCT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fashion_imgs`
--
ALTER TABLE `fashion_imgs`
  MODIFY `IMG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `fashion_product`
--
ALTER TABLE `fashion_product`
  MODIFY `PRODUCT_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `MESSAGE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `IMG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `REVIEW_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
