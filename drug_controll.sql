-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 03:47 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drug_controll`
--

-- --------------------------------------------------------

--
-- Table structure for table `manu`
--

CREATE TABLE `manu` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manu`
--

INSERT INTO `manu` (`manu_id`, `manu_name`, `country`, `website`) VALUES
(1, 'Test', 'Argentina', ''),
(4, 'Tijaabo', 'Somalia', 'https://www.tijaabo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drug`
--

CREATE TABLE `tbl_drug` (
  `drug_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `drug_type_id` int(11) DEFAULT NULL,
  `manu_id` int(11) DEFAULT NULL,
  `rcom` int(11) NOT NULL,
  `manu_date` date DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `drug_number` varchar(255) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_drug`
--

INSERT INTO `tbl_drug` (`drug_id`, `name`, `drug_type_id`, `manu_id`, `rcom`, `manu_date`, `exp_date`, `description`, `drug_number`, `reg_date`, `status`) VALUES
(24, 'Hello', 13, 4, 5, '2020-07-07', '2022-02-23', 'djkgwg', 'Hel-02021105', '2021-10-20', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drug_cat`
--

CREATE TABLE `tbl_drug_cat` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_drug_cat`
--

INSERT INTO `tbl_drug_cat` (`cat_id`, `name`) VALUES
(12, 'Tablet'),
(13, 'Syrup');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forgot`
--

CREATE TABLE `tbl_forgot` (
  `forgot_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `fullname`, `gender`, `email_address`, `password`, `last_login`, `created_date`) VALUES
(1, 'Yakub  Ahmed Yakub', 'Male', 'yaaqa91@gmail.com', '123', '2021-10-20 10:18:06', '2021-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rec_comp`
--

CREATE TABLE `tbl_rec_comp` (
  `rec_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rec_comp`
--

INSERT INTO `tbl_rec_comp` (`rec_id`, `name`, `address`, `email`, `phone_number`, `reg_date`) VALUES
(5, 'Al buruug', 'KPP, Mogadishu Somalia', 'sales@baruuj.com', '252616246740', '2021-07-22'),
(6, 'Tabaarak', 'KM4, Mogadishu, Somalia', 'drugs@tabraackltd.com', '08238132', '2021-07-24'),
(8, 'Tijaabo', 'Jowhar, Somalia', 'tijaabo@gmail.com', '0616246740', '2021-10-20');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_drug`
-- (See below for the actual view)
--
CREATE TABLE `view_drug` (
`drug_id` int(11)
,`drug_name` varchar(50)
,`status` varchar(10)
,`description` text
,`manu_date` date
,`exp_date` date
,`d_reg_date` date
,`drug_number` varchar(255)
,`cat_name` varchar(50)
,`name` varchar(50)
,`address` varchar(50)
,`email` varchar(50)
,`phone_number` varchar(50)
,`m_reg_date` date
,`manu_name` varchar(50)
,`country` varchar(50)
,`website` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_drug`
--
DROP TABLE IF EXISTS `view_drug`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_drug`  AS SELECT `tbl_drug`.`drug_id` AS `drug_id`, `tbl_drug`.`name` AS `drug_name`, `tbl_drug`.`status` AS `status`, `tbl_drug`.`description` AS `description`, `tbl_drug`.`manu_date` AS `manu_date`, `tbl_drug`.`exp_date` AS `exp_date`, `tbl_drug`.`reg_date` AS `d_reg_date`, `tbl_drug`.`drug_number` AS `drug_number`, `tbl_drug_cat`.`name` AS `cat_name`, `tbl_rec_comp`.`name` AS `name`, `tbl_rec_comp`.`address` AS `address`, `tbl_rec_comp`.`email` AS `email`, `tbl_rec_comp`.`phone_number` AS `phone_number`, `tbl_rec_comp`.`reg_date` AS `m_reg_date`, `manu`.`manu_name` AS `manu_name`, `manu`.`country` AS `country`, `manu`.`website` AS `website` FROM (((`tbl_drug` join `tbl_drug_cat`) join `tbl_rec_comp`) join `manu`) WHERE `tbl_drug`.`drug_type_id` = `tbl_drug_cat`.`cat_id` AND `tbl_drug`.`rcom` = `tbl_rec_comp`.`rec_id` AND `tbl_drug`.`manu_id` = `manu`.`manu_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manu`
--
ALTER TABLE `manu`
  ADD PRIMARY KEY (`manu_id`);

--
-- Indexes for table `tbl_drug`
--
ALTER TABLE `tbl_drug`
  ADD PRIMARY KEY (`drug_id`),
  ADD KEY `drug_type_id` (`drug_type_id`);

--
-- Indexes for table `tbl_drug_cat`
--
ALTER TABLE `tbl_drug_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_forgot`
--
ALTER TABLE `tbl_forgot`
  ADD PRIMARY KEY (`forgot_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_rec_comp`
--
ALTER TABLE `tbl_rec_comp`
  ADD PRIMARY KEY (`rec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manu`
--
ALTER TABLE `manu`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_drug`
--
ALTER TABLE `tbl_drug`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_drug_cat`
--
ALTER TABLE `tbl_drug_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_forgot`
--
ALTER TABLE `tbl_forgot`
  MODIFY `forgot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rec_comp`
--
ALTER TABLE `tbl_rec_comp`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_forgot`
--
ALTER TABLE `tbl_forgot`
  ADD CONSTRAINT `tbl_forgot_ibfk_1` FOREIGN KEY (`forgot_id`) REFERENCES `tbl_login` (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
