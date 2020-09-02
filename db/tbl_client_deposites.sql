-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 02:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betting_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_deposites`
--

CREATE TABLE `tbl_client_deposites` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `deposite_to` int(11) DEFAULT NULL,
  `deposite_from` varchar(255) DEFAULT NULL,
  `transaction_no` varchar(255) DEFAULT NULL,
  `deposite_amount` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `is_deposited` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client_deposites`
--

INSERT INTO `tbl_client_deposites` (`id`, `client_id`, `payment_method_id`, `deposite_to`, `deposite_from`, `transaction_no`, `deposite_amount`, `status`, `is_deposited`, `created_at`, `updated_at`) VALUES
(5, 11, NULL, 1923943943, '12123123213', '12312323432432', '50', 1, 1, '2020-08-31 12:15:11', '2020-08-31 12:16:36'),
(6, 11, 3, 5, '12123123213', '12313', '50', 0, 0, '2020-09-02 06:36:24', '2020-09-02 06:36:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_client_deposites`
--
ALTER TABLE `tbl_client_deposites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_client_deposites`
--
ALTER TABLE `tbl_client_deposites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
