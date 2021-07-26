-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 12:22 PM
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
-- Table structure for table `tbl_drug`
--

CREATE TABLE `tbl_drug` (
  `drug_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `drug_type_id` int(11) DEFAULT NULL,
  `manu_id` int(11) DEFAULT NULL,
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

INSERT INTO `tbl_drug` (`drug_id`, `name`, `drug_type_id`, `manu_id`, `manu_date`, `exp_date`, `description`, `drug_number`, `reg_date`, `status`) VALUES
(12, 'Hemoton', 13, 5, '2021-07-22', '2021-07-22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Hem-02221070', '0000-00-00', 'expired'),
(14, 'Metamirizole2', 12, 5, '2021-07-22', '2021-08-07', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'Met-02221071', '0000-00-00', 'active');

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
(1, 'Yakub  Ahmed', 'Male', 'yaaqa91@gmail.com', '123', '2021-07-23 09:51:19', '2021-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `manu_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`manu_id`, `name`, `address`, `email`, `phone_number`, `reg_date`) VALUES
(5, 'Al buruug', 'KPP, Mogadishu Somalia', 'sales@baruuj.com', '252616246740', '2021-07-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_drug`
--
ALTER TABLE `tbl_drug`
  ADD PRIMARY KEY (`drug_id`),
  ADD KEY `drug_type_id` (`drug_type_id`),
  ADD KEY `manu_id` (`manu_id`);

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
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`manu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_drug`
--
ALTER TABLE `tbl_drug`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_drug_cat`
--
ALTER TABLE `tbl_drug_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_drug`
--
ALTER TABLE `tbl_drug`
  ADD CONSTRAINT `tbl_drug_ibfk_1` FOREIGN KEY (`drug_type_id`) REFERENCES `tbl_drug_cat` (`cat_id`),
  ADD CONSTRAINT `tbl_drug_ibfk_2` FOREIGN KEY (`manu_id`) REFERENCES `tbl_manufacturer` (`manu_id`);

--
-- Constraints for table `tbl_forgot`
--
ALTER TABLE `tbl_forgot`
  ADD CONSTRAINT `tbl_forgot_ibfk_1` FOREIGN KEY (`forgot_id`) REFERENCES `tbl_login` (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
