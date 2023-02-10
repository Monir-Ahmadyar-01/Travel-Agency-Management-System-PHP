-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 02:59 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_account`
--

CREATE TABLE `company_account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `account_number` int(20) NOT NULL,
  `valid_balance` int(10) NOT NULL,
  `logo` varchar(510) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency`, `description`) VALUES
(1, 'AFN', ''),
(2, 'USD', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

CREATE TABLE `customer_account` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `nick_name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `co_name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `address` varchar(510) COLLATE utf8mb4_persian_ci NOT NULL,
  `date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expence_id` int(11) NOT NULL,
  `expense` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `type` int(11) NOT NULL,
  `amount` float NOT NULL,
  `currency` int(11) NOT NULL,
  `rate` float NOT NULL,
  `bill_number` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expensetype`
--

CREATE TABLE `expensetype` (
  `expensetype_id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_number`
--

CREATE TABLE `flight_number` (
  `flight_id` int(11) NOT NULL,
  `flight_number` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `info_id` int(11) NOT NULL,
  `logo` varchar(510) COLLATE utf8mb4_persian_ci NOT NULL,
  `persion_name` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(510) COLLATE utf8mb4_persian_ci NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `backup_address` varchar(510) COLLATE utf8mb4_persian_ci NOT NULL,
  `slogan` text COLLATE utf8mb4_persian_ci NOT NULL,
  `website` varchar(510) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`info_id`, `logo`, `persion_name`, `phone`, `email`, `address`, `backup_address`, `slogan`, `website`) VALUES
(1, 'tmp.jpg', 'شرکت سیاحتی ', '0814444641', 'info@asrepoya.com', '.--', 'C:\\xampp\\htdocs\\Travel_agency', 'با ما مطمِین پرواز کنید ', 'www.example.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `person` varchar(150) COLLATE utf8mb4_persian_ci NOT NULL,
  `company` int(11) DEFAULT NULL,
  `sdetail` int(11) DEFAULT NULL,
  `visa` int(11) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `totalprice` float NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL,
  `currency` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_pay`
--

CREATE TABLE `salary_pay` (
  `pay_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `payable` float NOT NULL,
  `amount` float NOT NULL,
  `currency` int(10) NOT NULL,
  `rate` float NOT NULL,
  `removal_amount` float NOT NULL,
  `detail` varchar(1023) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_bill_number` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `customer` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `sdetail_id` int(11) NOT NULL,
  `sale_bill_number` int(11) NOT NULL,
  `sector` text COLLATE utf8mb4_persian_ci NOT NULL,
  `flight_number` varchar(11) COLLATE utf8mb4_persian_ci NOT NULL,
  `pax_name` text COLLATE utf8mb4_persian_ci NOT NULL,
  `pax_no` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `pnr` varchar(240) COLLATE utf8mb4_persian_ci NOT NULL,
  `D_ofissue` date NOT NULL,
  `discount` float NOT NULL,
  `comission` float NOT NULL,
  `price` float NOT NULL,
  `currency` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `sector_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shareholder`
--

CREATE TABLE `shareholder` (
  `shareholder_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `identity` int(20) NOT NULL,
  `percentage` float NOT NULL,
  `photo` varchar(510) COLLATE utf8mb4_persian_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `tazkera_number` int(40) NOT NULL,
  `job_area` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `salary` int(40) NOT NULL,
  `currency` int(40) NOT NULL,
  `staff_reg_no` int(40) NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_persian_ci NOT NULL,
  `family` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `acount_number` int(11) NOT NULL,
  `amount` float NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `discription` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `take`
--

CREATE TABLE `take` (
  `take_id` int(11) NOT NULL,
  `shareholder` int(11) NOT NULL,
  `amount` float NOT NULL,
  `currency` int(11) NOT NULL,
  `rate` float NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `authority` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `photo` varchar(130) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `username`, `password`, `authority`, `photo`) VALUES
(6, 'SUPER ADMIN', 'admin', 'admin', '100', 'Screenshot (146).png');

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `visa_id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `visa_name` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `place_of_issue` text COLLATE utf8mb4_persian_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visa_detail`
--

CREATE TABLE `visa_detail` (
  `vdetail_id` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL,
  `full_name` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `D_of_request` date NOT NULL,
  `D_of_issue` date NOT NULL,
  `comision` float NOT NULL,
  `price` float NOT NULL,
  `currency` int(11) NOT NULL,
  `rate` float NOT NULL,
  `recieved` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_account`
--
ALTER TABLE `company_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expence_id`),
  ADD KEY `type` (`type`),
  ADD KEY `currency` (`currency`),
  ADD KEY `user` (`expense`(191));

--
-- Indexes for table `expensetype`
--
ALTER TABLE `expensetype`
  ADD PRIMARY KEY (`expensetype_id`);

--
-- Indexes for table `flight_number`
--
ALTER TABLE `flight_number`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `sdetail` (`sdetail`),
  ADD KEY `visa` (`visa`),
  ADD KEY `supplier` (`supplier`),
  ADD KEY `user` (`user`),
  ADD KEY `to_tb_company_acc` (`company`);

--
-- Indexes for table `salary_pay`
--
ALTER TABLE `salary_pay`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `to_tb_staff` (`employee_id`),
  ADD KEY `to_currency` (`currency`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_bill_number`),
  ADD KEY `user` (`user`),
  ADD KEY `sale_ibfk_1` (`customer`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`sdetail_id`),
  ADD KEY `currency` (`currency`),
  ADD KEY `sale_bill_number` (`sale_bill_number`),
  ADD KEY `sale_to_company_tb` (`company`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sector_id`);

--
-- Indexes for table `shareholder`
--
ALTER TABLE `shareholder`
  ADD PRIMARY KEY (`shareholder_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`) USING BTREE,
  ADD KEY `to_tb_currency` (`currency`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `take`
--
ALTER TABLE `take`
  ADD PRIMARY KEY (`take_id`),
  ADD KEY `shareholder` (`shareholder`),
  ADD KEY `to_tb_currecny` (`currency`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `full_name` (`full_name`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`visa_id`),
  ADD KEY `to_tb_customer` (`customer`);

--
-- Indexes for table `visa_detail`
--
ALTER TABLE `visa_detail`
  ADD PRIMARY KEY (`vdetail_id`),
  ADD KEY `to_tb_visa` (`visa_id`),
  ADD KEY `tb_to_currency` (`currency`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_account`
--
ALTER TABLE `company_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_account`
--
ALTER TABLE `customer_account`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expence_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expensetype`
--
ALTER TABLE `expensetype`
  MODIFY `expensetype_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flight_number`
--
ALTER TABLE `flight_number`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salary_pay`
--
ALTER TABLE `salary_pay`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_bill_number` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `sdetail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `sector_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shareholder`
--
ALTER TABLE `shareholder`
  MODIFY `shareholder_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `take`
--
ALTER TABLE `take`
  MODIFY `take_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
  MODIFY `visa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visa_detail`
--
ALTER TABLE `visa_detail`
  MODIFY `vdetail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`type`) REFERENCES `expensetype` (`expensetype_id`),
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`currency`) REFERENCES `currency` (`currency_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`sdetail`) REFERENCES `sale` (`sale_bill_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`visa`) REFERENCES `visa` (`visa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_4` FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `to_tb_company_acc` FOREIGN KEY (`company`) REFERENCES `company_account` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `salary_pay`
--
ALTER TABLE `salary_pay`
  ADD CONSTRAINT `to_currency` FOREIGN KEY (`currency`) REFERENCES `currency` (`currency_id`),
  ADD CONSTRAINT `to_tb_staff` FOREIGN KEY (`employee_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`user`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD CONSTRAINT `sale_detail_ibfk_2` FOREIGN KEY (`currency`) REFERENCES `currency` (`currency_id`),
  ADD CONSTRAINT `sale_detail_ibfk_4` FOREIGN KEY (`sale_bill_number`) REFERENCES `sale` (`sale_bill_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_to_company_tb` FOREIGN KEY (`company`) REFERENCES `company_account` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `to_tb_currency` FOREIGN KEY (`currency`) REFERENCES `currency` (`currency_id`);

--
-- Constraints for table `take`
--
ALTER TABLE `take`
  ADD CONSTRAINT `take_ibfk_1` FOREIGN KEY (`shareholder`) REFERENCES `shareholder` (`shareholder_id`),
  ADD CONSTRAINT `to_tb_currecny` FOREIGN KEY (`currency`) REFERENCES `currency` (`currency_id`);

--
-- Constraints for table `visa`
--
ALTER TABLE `visa`
  ADD CONSTRAINT `to_tb_customer` FOREIGN KEY (`customer`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `visa_detail`
--
ALTER TABLE `visa_detail`
  ADD CONSTRAINT `tb_to_currency` FOREIGN KEY (`currency`) REFERENCES `currency` (`currency_id`),
  ADD CONSTRAINT `to_tb_visa` FOREIGN KEY (`visa_id`) REFERENCES `visa` (`visa_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
