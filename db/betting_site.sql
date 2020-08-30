-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 07:15 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `club_id` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `username`, `role`, `club_id`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', NULL, 'admin@gmail.com', 'Admin', 2, 0, '$2y$10$KSdee7hzr.8uJB89YOyV7eKvQG6uXyD45P0Fpf.FNHv9q46VCXM0i', 1, 'HftBsS0WaFhNaeki9GEnbTOdo99h14G9dS1WtBq9AJJkzUuSyNKsUxMufhEx', '2019-04-17 01:04:35', '2020-01-20 13:33:35'),
(30, 'Dhaka Central Warehouse', NULL, 'dhakacentral@quickexpress.com.bd', 'JewelWH', 11, 0, '$2y$10$uAjLoNdVTF8jqa153SLTveU/S1WlUfvtxzeU5Zx322kEw3VJY.lp.', 1, NULL, '2020-07-04 01:48:21', '2020-07-13 20:33:25'),
(53, 'Dew Hunt', '01317243494', 'dew.fog1553@gmail.com', 'Dew', 14, 0, '$2y$10$CTlIwyf35zQREEzMoPY6I.tyNPEZxcYxaGok4pp.uvPkxt8L4Qc0.', 1, NULL, '2020-07-06 21:52:48', '2020-07-06 21:52:48'),
(56, 'Badda', NULL, 'badda@quickexpress.com.bd', NULL, NULL, 0, '$2y$10$wdmwPD9LZ9XD3UP/aNCFzebuRumTO/hBDptsUcFJnZovkPwK299hq', 1, NULL, '2020-07-14 04:07:25', '2020-07-14 04:15:59'),
(57, 'নিজের বাজার', NULL, 'nijer.bazar@gmail.com', NULL, 12, 0, '$2y$10$qpsOGraOWlG4LlyAaHb.yexbXidPIo8hfIb3uVYpPeX4pwK5pDH4m', 1, NULL, '2020-07-14 05:16:57', '2020-07-16 00:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Barcelona', 1, 1, '2020-08-20 04:08:27', '2020-08-20 09:31:05'),
(3, 'India Club', 2, 1, '2020-08-22 03:27:43', '2020-08-22 03:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_08_20_074820_create_clubs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_panel_information`
--

CREATE TABLE `tbl_admin_panel_information` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer_website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_one_width` int(11) DEFAULT NULL,
  `logo_one_height` int(11) DEFAULT NULL,
  `logo_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_two_width` int(11) DEFAULT NULL,
  `logo_two_height` int(11) DEFAULT NULL,
  `fav_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon_width` int(11) DEFAULT NULL,
  `fav_icon_height` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin_panel_information`
--

INSERT INTO `tbl_admin_panel_information` (`id`, `website_name`, `prefix_title`, `website_title`, `developed_by`, `developer_website_link`, `logo_one`, `logo_one_width`, `logo_one_height`, `logo_two`, `logo_two_width`, `logo_two_height`, `fav_icon`, `fav_icon_width`, `fav_icon_height`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(4, 'Prerdion', '|', 'title', 'Techno Park Bangladesh', 'http://www.technoparkbd.com/', 'public/uploads/admin_logo/logo1/small-logo_91305320003.png', NULL, NULL, 'public/uploads/admin_logo/logo2/piterk160500098_51354329914.png', NULL, NULL, 'public/uploads/admin_logo/fav_icon/piterk160500098_12460077396.png', NULL, NULL, 1, 4, '2020-07-07 04:10:02', 4, '2020-08-16 04:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `root_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `name`, `charge`, `root_plan`, `description`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(8, 'Dhaka to Mymenshing', '500', NULL, NULL, 1, 1, 4, '2020-07-18 04:25:21', NULL, '2020-07-20 03:48:22'),
(9, 'Dhaka to Chandpur', '300', 'Sayedabad -> zatrabari -> Chittagong Road -> Kanchpur -> Daudkandi -> Sachar -> Kachua', NULL, 1, 2, 4, '2020-07-18 04:28:40', NULL, '2020-08-20 09:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_betting_categories`
--

CREATE TABLE `tbl_betting_categories` (
  `id` int(11) NOT NULL,
  `match_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_betting_categories`
--

INSERT INTO `tbl_betting_categories` (`id`, `match_id`, `name`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'sdafsdaf Updated', 12, 1, '2020-08-25 16:18:40', '2020-08-25 18:51:59'),
(3, 1, 'omarfaruk.mh686@gmail.com', 1, 1, '2020-08-25 19:42:48', '2020-08-25 19:42:48'),
(4, 6, 'To Win The Match .. ?', 1, 1, '2020-08-29 08:27:09', '2020-08-29 08:27:09'),
(5, 6, 'Total Score', 2, 1, '2020-08-29 08:27:30', '2020-08-29 08:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_betts`
--

CREATE TABLE `tbl_betts` (
  `id` int(11) NOT NULL,
  `betting_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ratio` float DEFAULT NULL,
  `result` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_betts`
--

INSERT INTO `tbl_betts` (`id`, `betting_category_id`, `name`, `ratio`, `result`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sahariar Updated', 520, 0, '2020-08-25 18:50:17', '2020-08-25 19:42:28'),
(3, 3, 'Add', 4, NULL, '2020-08-25 19:43:09', '2020-08-25 19:43:09'),
(4, 4, 'India', 2, 0, '2020-08-29 08:28:09', '2020-08-29 08:28:24'),
(5, 4, 'Pakistan', 1.5, NULL, '2020-08-29 08:29:56', '2020-08-29 08:29:56'),
(6, 4, 'Draw', 1, NULL, '2020-08-29 12:02:09', '2020-08-29 12:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`id`, `user_role_id`, `club_id`, `name`, `username`, `sponsor_username`, `phone`, `identification_type`, `identification_no`, `email`, `address`, `birth_date`, `image`, `password`, `verification_code`, `token`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(11, NULL, 3, 'Jisan Ahmed', 'jisan', 'jsit', '01832967276', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$EHI1qX2B7jdvn18GTXwe7.lTSKJiUAr4iNJMdI6fBlp9kJmhMcTq.', NULL, NULL, 1, NULL, '2020-08-22 05:10:12', NULL, '2020-08-22 05:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_betts`
--

CREATE TABLE `tbl_client_betts` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `betting_id` int(11) DEFAULT NULL,
  `betting_stack` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wining_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winning_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_client_betts`
--

INSERT INTO `tbl_client_betts` (`id`, `client_id`, `betting_id`, `betting_stack`, `wining_amount`, `winning_status`, `created_at`, `updated_at`) VALUES
(10, 11, 4, '100', '200', NULL, '2020-08-30 10:53:55', '2020-08-30 10:53:55'),
(11, 11, 5, '200', '300.00', NULL, '2020-08-30 11:13:44', '2020-08-30 11:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_frontend_menu`
--

CREATE TABLE `tbl_frontend_menu` (
  `id` int(11) NOT NULL,
  `parent_menu` int(11) DEFAULT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `menu_status` tinyint(4) NOT NULL DEFAULT 1,
  `footer_menu_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_frontend_menu`
--

INSERT INTO `tbl_frontend_menu` (`id`, `parent_menu`, `menu_name`, `menu_link`, `order_by`, `status`, `menu_status`, `footer_menu_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, NULL, 'Version', 'home.index', 1, 1, 1, 1, 4, '2020-04-18 08:48:30', 4, '2020-04-18 09:53:16'),
(3, 1, 'Version - 1', 'Version1.add', 1, 1, 1, 1, 4, '2020-04-18 09:30:03', NULL, '2020-04-18 09:53:20'),
(4, NULL, 'Dew Hunt', 'dewhunt.com', 2, 1, 1, 1, 4, '2020-05-10 04:56:47', 4, '2020-05-10 05:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_games`
--

CREATE TABLE `tbl_games` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_games`
--

INSERT INTO `tbl_games` (`id`, `name`, `icon`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Cricket', 'fa fa-cricket', 2, 1, '2020-08-23 13:50:23', '2020-08-29 10:30:33'),
(3, 'Football', 'add_circle_outline', 3, 1, '2020-08-23 13:56:16', '2020-08-23 14:46:05'),
(4, 'Tennis', 'fa fa-credit-card-alt', 3, 1, '2020-08-29 03:32:30', '2020-08-29 03:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matches`
--

CREATE TABLE `tbl_matches` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `team_one` varchar(255) DEFAULT NULL,
  `team_two` varchar(255) DEFAULT NULL,
  `league` varchar(255) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `live` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matches`
--

INSERT INTO `tbl_matches` (`id`, `game_id`, `name`, `team_one`, `team_two`, `league`, `date_time`, `icon`, `order_by`, `status`, `live`, `created_at`, `updated_at`) VALUES
(6, 2, 'India vs Pakistan', 'India', 'Pakistan', 'sdfcsdf', '2020-08-29 08:38:00', 'fgf', 1, 1, 1, '2020-08-29 03:59:17', '2020-08-30 03:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_menu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `parent_menu`, `menu_name`, `menu_link`, `menu_icon`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Dashboard', 'admin.index', 'fa fa-bars', 1, '1', '2020-07-08 21:05:07', '2020-07-08 21:07:27'),
(2, '39', 'Menu', 'menu.index', 'fa fa-caret', 1, '1', NULL, NULL),
(3, '39', 'Users Role', 'userRole.index', 'fa fa-bars', 4, '1', '2020-03-03 13:48:57', '2020-03-15 06:02:37'),
(4, '39', 'Menu Action Type', 'menuActionType.index', 'fa fa-bars', 2, '1', NULL, NULL),
(5, '39', 'User', 'user.index', 'fa fa-bars', 3, '1', '2020-03-14 02:06:15', '2020-03-15 06:02:33'),
(6, NULL, 'Front-End Management', 'admin.index', 'fa fa-bars', 3, '1', '2020-04-16 09:54:08', '2020-07-08 21:10:03'),
(7, '6', 'Website Information', 'websiteInformation.index', 'fa fa-caret', 1, '1', '2020-04-16 10:43:15', '2020-04-16 10:43:15'),
(8, '6', 'Menus', 'frontEndMenu.index', NULL, 2, '1', '2020-04-18 08:17:03', '2020-04-18 08:17:03'),
(10, '6', 'Social Links', 'socialLink.index', 'fa fa-caret', 3, '1', '2020-04-18 10:14:20', '2020-04-18 10:14:20'),
(11, '6', 'Sliders', 'sliders.index', 'fa fa-bars', 4, '1', '2020-04-19 08:19:58', '2020-04-19 08:19:58'),
(12, '6', 'Pages', 'page.index', 'fa fa-caret', 5, '1', '2020-05-10 05:09:10', '2020-05-10 05:09:10'),
(13, NULL, 'Basic Setup', 'admin.index', 'fa fa-bars', 4, '1', '2020-06-10 04:33:14', '2020-07-08 21:10:09'),
(23, '21', 'Sender Order', 'senderOrder.index', 'fa fa-bars', 2, '1', '2020-06-18 05:14:55', '2020-06-18 05:14:55'),
(24, '21', 'Receiver Order', 'receiverOrder.index', 'fa fa-bars', 3, '1', '2020-06-18 05:15:39', '2020-06-18 05:15:39'),
(27, '26', 'Goods Collection', 'goodsCollection.index', 'fa fa-caret', 1, '1', '2020-06-23 01:19:42', '2020-06-23 01:19:42'),
(28, '26', 'Goods Delivery', 'goodsDelivery.index', 'fa fa-caret', 2, '1', '2020-06-23 01:20:10', '2020-06-23 01:20:10'),
(32, '29', 'Agent Receive', 'receiveFormAgent.index', 'fa fa-caret', 3, '1', '2020-07-01 05:06:42', '2020-07-04 05:40:35'),
(33, '29', 'Issue Warehouse', 'issueToWarehouse.index', NULL, 4, '1', '2020-07-01 05:07:57', '2020-07-04 05:41:28'),
(34, '29', 'Issue Agent', 'issueToAgent.index', NULL, 6, '1', '2020-07-01 05:50:00', '2020-07-04 05:41:41'),
(36, '29', 'Warehouse Receive', 'receiveFromWarehouse.index', 'fa fa-caret', 5, '1', '2020-07-04 04:06:39', '2020-07-04 05:41:00'),
(38, '39', 'Admin Information', 'adminPanelInformation.index', 'fa fa-bars', 5, '1', '2020-07-07 03:38:46', '2020-07-07 03:38:46'),
(39, NULL, 'User Management', 'admin.index', 'fa fa-bars', 3, '1', NULL, '2020-07-11 20:40:37'),
(44, '43', 'Service', 'service.index', 'fa fa-caret', 1, '1', '2020-07-12 22:21:38', '2020-07-12 22:21:38'),
(45, '43', 'Service Type', 'serviceType.index', 'fa fa-caret', 2, '1', '2020-07-12 22:21:58', '2020-07-12 22:21:58'),
(46, '43', 'Charge Setup', 'admin.index', 'fa fa-caret', 3, '1', '2020-07-12 22:22:41', '2020-07-12 22:22:41'),
(50, '13', 'Location Setup', 'location.index', NULL, 1, '1', '2020-07-18 03:37:45', '2020-07-18 03:42:41'),
(51, NULL, 'List', 'List', NULL, 5, '1', '2020-07-19 05:59:04', '2020-07-19 05:59:04'),
(52, '51', 'Client List', 'client.index', NULL, 1, '1', '2020-07-19 06:14:50', '2020-07-19 06:14:50'),
(54, '13', 'Club', 'club.index', NULL, 2, '1', '2020-08-20 02:24:33', '2020-08-20 02:24:33'),
(55, '13', 'Games', 'game.index', NULL, 3, '1', '2020-08-23 12:52:44', '2020-08-23 12:52:44'),
(56, NULL, 'Set Betting', 'admin.index', NULL, 6, '1', '2020-08-23 14:24:48', '2020-08-23 16:47:30'),
(57, '56', 'Matches', 'match.index', NULL, 1, '1', '2020-08-23 16:46:20', '2020-08-23 16:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_actions`
--

CREATE TABLE `tbl_menu_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_menu_id` int(11) DEFAULT NULL,
  `menu_type` int(11) DEFAULT NULL,
  `action_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menu_actions`
--

INSERT INTO `tbl_menu_actions` (`id`, `parent_menu_id`, `menu_type`, `action_name`, `action_link`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Add', 'menu.add', 1, 1, NULL, NULL),
(3, 2, 2, 'Edit', 'menu.edit', 2, 1, NULL, NULL),
(4, 2, 3, 'Status', 'menu.status', 3, 1, NULL, NULL),
(5, 2, 8, 'View Menu Action', 'menuAction.index', 4, 1, NULL, NULL),
(6, 2, 4, 'Delete', 'menu.delete', 5, 1, NULL, NULL),
(7, 4, 1, 'Add', 'menuActionType.add', 1, 1, NULL, NULL),
(8, 4, 2, 'Edit', 'menuActionType.edit', 2, 1, NULL, NULL),
(9, 4, 3, 'Status', 'menuActionType.status', 3, 1, NULL, NULL),
(10, 4, 4, 'Delete', 'menuActionType.delete', 4, 1, NULL, NULL),
(11, 3, 1, 'Add', 'userRole.add', 1, 1, '2020-03-06 23:37:18', '2020-03-06 23:37:18'),
(12, 3, 2, 'Edit', 'userRole.edit', 2, 1, '2020-03-07 00:16:00', '2020-03-07 00:16:00'),
(13, 3, 5, 'Permission', 'userRole.permission', 3, 1, '2020-03-07 00:17:25', '2020-03-07 00:17:25'),
(14, 3, 3, 'Status', 'userRole.status', 4, 1, '2020-03-07 00:18:08', '2020-03-07 00:18:08'),
(15, 3, 4, 'Delete', 'userRole.delete', 5, 1, '2020-03-07 00:18:22', '2020-03-07 00:18:22'),
(21, 5, 1, 'Add', 'user.add', 1, 1, '2020-03-14 02:06:39', '2020-03-14 02:06:39'),
(23, 5, 8, 'View Profile', 'user.profile', 3, 1, '2020-03-14 02:07:32', '2020-03-14 02:07:32'),
(24, 5, 6, 'Change Password', 'user.changePassword', 4, 1, '2020-03-14 02:07:57', '2020-03-14 02:07:57'),
(25, 5, 3, 'Status', 'user.status', 5, 1, '2020-03-14 02:08:23', '2020-03-14 02:08:23'),
(26, 5, 4, 'Delete', 'user.delete', 6, 1, '2020-03-14 02:08:35', '2020-03-14 02:08:35'),
(28, 7, 1, 'Add', 'websiteInformation.add', 1, 1, '2020-04-16 11:50:12', '2020-04-16 11:50:12'),
(29, 7, 2, 'Edit', 'websiteInformation.edit', 2, 1, '2020-04-16 11:50:28', '2020-04-16 11:50:28'),
(30, 8, 1, 'Add', 'frontEndMenu.add', 1, 1, '2020-04-18 08:18:00', '2020-04-18 08:18:00'),
(31, 8, 2, 'Edit', 'frontEndMenu.edit', 2, 1, '2020-04-18 08:18:14', '2020-04-18 08:18:14'),
(32, 8, 3, 'Status', 'frontEndMenu.status', 3, 1, '2020-04-18 08:20:33', '2020-04-18 08:20:33'),
(33, 8, 4, 'Delete', 'frontEndMenu.delete', 4, 1, '2020-04-18 08:20:48', '2020-04-18 08:20:48'),
(39, 10, 1, 'Add', 'socialLink.add', 1, 1, '2020-04-18 10:14:43', '2020-04-18 10:14:43'),
(40, 10, 2, 'Edit', 'socialLink.edit', 2, 1, '2020-04-18 10:14:54', '2020-04-18 10:14:54'),
(41, 10, 3, 'Status', 'socialLink.status', 3, 1, '2020-04-18 10:15:15', '2020-04-18 10:15:15'),
(42, 10, 4, 'Delete', 'socialLink.delete', 4, 1, '2020-04-18 10:15:32', '2020-04-18 10:15:32'),
(43, 11, 1, 'Add', 'sliders.add', 1, 1, '2020-04-19 08:20:24', '2020-04-19 08:20:24'),
(44, 11, 2, 'Edit', 'sliders.edit', 2, 1, '2020-04-19 08:20:39', '2020-04-19 08:20:39'),
(45, 11, 3, 'Status', 'sliders.status', 3, 1, '2020-04-19 08:20:59', '2020-04-19 08:20:59'),
(46, 11, 4, 'Delete', 'sliders.delete', 4, 1, '2020-04-19 08:21:14', '2020-04-19 08:21:14'),
(47, 12, 1, 'Add', 'page.add', 1, 1, '2020-05-10 05:09:46', '2020-05-10 05:09:46'),
(48, 12, 2, 'Edit', 'page.edit', 2, 1, '2020-05-10 05:09:58', '2020-05-10 05:09:58'),
(49, 12, 3, 'Status', 'page.status', 3, 1, '2020-05-10 05:10:22', '2020-05-10 05:10:22'),
(50, 12, 8, 'View Posts', 'post.index', 4, 1, '2020-05-10 05:11:48', '2020-05-10 05:11:48'),
(51, 12, 4, 'Delete', 'page.delete', 5, 1, '2020-05-10 05:12:01', '2020-05-10 05:12:01'),
(93, 23, 8, 'View', 'senderOrder.view', 1, 1, '2020-06-22 04:25:26', '2020-06-22 04:25:26'),
(94, 24, 8, 'View', 'receiverOrder.view', 1, 1, '2020-06-22 04:25:57', '2020-06-22 04:25:57'),
(95, 28, 8, 'View', 'goodsDelivery.view', 1, 1, '2020-06-23 01:21:23', '2020-06-23 01:21:23'),
(96, 27, 8, 'View', 'goodsCollection.view', 1, 1, '2020-06-23 01:21:51', '2020-06-23 01:21:51'),
(99, 32, 8, 'View', 'receiveFormAgent.view', 1, 1, '2020-07-01 05:08:30', '2020-07-01 05:09:28'),
(100, 33, 8, 'View', 'issueToWarehouse.view', 1, 1, '2020-07-01 05:09:57', '2020-07-01 05:09:57'),
(101, 34, 8, 'View', 'issueToAgent.view', 1, 1, '2020-07-01 05:54:00', '2020-07-01 05:54:00'),
(103, 36, 8, 'View', 'receiveFromWarehouse.view', 1, 1, '2020-07-04 04:07:08', '2020-07-04 04:07:08'),
(108, 38, 1, 'Add', 'adminPanelInformation.add', 1, 1, '2020-07-07 03:39:05', '2020-07-07 03:39:05'),
(109, 38, 2, 'Edit', 'adminPanelInformation.edit', 2, 1, '2020-07-07 03:39:14', '2020-07-07 03:39:14'),
(114, 44, 1, 'Add', 'service.add', 1, 1, '2020-07-12 22:25:22', '2020-07-12 22:25:22'),
(115, 44, 2, 'Edit', 'service.edit', 2, 1, '2020-07-12 22:25:31', '2020-07-12 22:25:31'),
(116, 44, 3, 'Status', 'service.status', 3, 1, '2020-07-12 22:25:39', '2020-07-12 22:25:39'),
(117, 44, 4, 'Delete', 'service.delete', 4, 1, '2020-07-12 22:25:48', '2020-07-12 22:25:48'),
(118, 45, 1, 'Add', 'serviceType.add', 1, 1, '2020-07-12 22:26:23', '2020-07-12 22:26:23'),
(119, 45, 2, 'Edit', 'serviceType.edit', 2, 1, '2020-07-12 22:26:32', '2020-07-12 22:26:32'),
(120, 45, 3, 'Status', 'serviceType.status', 3, 1, '2020-07-12 22:26:43', '2020-07-12 22:26:43'),
(121, 45, 4, 'Delete', 'serviceType.delete', 4, 1, '2020-07-12 22:26:54', '2020-07-12 22:26:54'),
(134, 50, 1, 'Add', 'location.add', 1, 1, '2020-07-18 03:41:43', '2020-07-18 03:41:43'),
(135, 50, 2, 'Edit', 'location.edit', 2, 1, '2020-07-18 03:41:54', '2020-07-18 03:41:54'),
(136, 50, 4, 'Delete', 'location.delete', 3, 1, '2020-07-18 03:42:06', '2020-07-18 03:42:06'),
(137, 50, 3, 'Status', 'location.status', 4, 1, '2020-07-18 03:42:17', '2020-07-18 03:42:17'),
(138, 52, 1, 'Add', 'client.add', 1, 1, '2020-07-19 06:15:40', '2020-07-19 06:16:46'),
(139, 52, 2, 'Edit', 'client.edit', 2, 1, '2020-07-19 06:15:53', '2020-07-19 06:15:53'),
(140, 52, 4, 'Delete', 'client.delete', 3, 1, '2020-07-19 06:16:18', '2020-07-19 06:16:18'),
(141, 52, 3, 'Status', 'client.status', 4, 1, '2020-07-19 06:16:33', '2020-07-19 06:16:33'),
(142, 54, 1, 'Add', 'club.create', 1, 1, '2020-08-20 02:47:58', '2020-08-20 09:04:58'),
(143, 54, 2, 'Edit', 'club.edit', 2, 1, '2020-08-20 03:40:28', '2020-08-20 03:40:28'),
(144, 54, 4, 'Delete', 'club.delete', 3, 1, '2020-08-20 07:38:00', '2020-08-20 08:58:22'),
(145, 54, 3, 'Status', 'club.status', 4, 1, '2020-08-20 08:10:15', '2020-08-20 08:10:15'),
(146, 55, 1, 'Add', 'game.create', 1, 1, '2020-08-23 12:54:11', '2020-08-23 12:54:11'),
(147, 55, 2, 'Edit', 'game.edit', 2, 1, '2020-08-23 13:58:35', '2020-08-23 13:58:35'),
(148, 55, 4, 'Delete', 'game.delete', 3, 1, '2020-08-23 14:11:25', '2020-08-23 14:11:25'),
(149, 55, 3, 'Status', 'game.status', 4, 1, '2020-08-23 14:22:35', '2020-08-23 14:22:35'),
(150, 57, 1, 'Add', 'match.create', 1, 1, '2020-08-23 16:54:19', '2020-08-23 16:54:19'),
(151, 57, 2, 'Edit', 'match.edit', 3, 1, '2020-08-25 10:48:00', '2020-08-29 03:34:07'),
(152, 57, 4, 'Delete', 'match.delete', 4, 1, '2020-08-25 11:30:47', '2020-08-29 03:34:28'),
(153, 57, 3, 'Status', 'match.status', 5, 1, '2020-08-25 11:35:32', '2020-08-29 03:34:44'),
(154, 57, 8, 'Betting Categories', 'betting_category.index', 2, 1, '2020-08-25 15:44:01', '2020-08-29 03:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_action_type`
--

CREATE TABLE `tbl_menu_action_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menu_action_type`
--

INSERT INTO `tbl_menu_action_type` (`id`, `name`, `action_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Add', 1, 1, '2020-03-05 13:42:26', '2020-03-05 13:42:26'),
(2, 'Edit', 2, 1, '2020-03-05 13:43:02', '2020-03-05 13:43:02'),
(3, 'Publication Status', 3, 1, '2020-03-05 13:49:41', '2020-03-05 13:49:41'),
(4, 'Delete', 4, 1, '2020-03-05 13:51:00', '2020-03-05 13:51:00'),
(6, 'Permission', 5, 1, '2020-03-06 02:11:00', '2020-03-06 02:11:00'),
(7, 'Change Password', 6, 1, '2020-03-06 02:11:38', '2020-03-06 02:12:58'),
(8, 'View PopUp', 7, 1, '2020-03-06 02:11:59', '2020-03-06 02:11:59'),
(9, 'View', 8, 1, '2020-03-06 02:12:09', '2020-03-06 02:12:09'),
(10, 'Shipping Status', 9, 1, '2020-03-06 02:12:20', '2020-03-06 02:12:20'),
(11, 'Product List', 10, 1, '2020-03-06 02:12:28', '2020-03-06 02:12:28'),
(12, 'View PDF', 11, 1, '2020-03-06 02:12:39', '2020-03-06 02:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `frontend_menu_id` int(11) DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `frontend_menu_id`, `page_name`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 4, 'Dew Hunt', 1, 4, '2020-05-10 04:56:47', 4, '2020-05-26 18:44:44'),
(2, 4, 'Page One', 1, 4, '2020-05-10 05:42:32', 4, '2020-05-10 06:03:53'),
(4, 1, 'Version Page One', 1, 4, '2020-05-10 06:08:42', NULL, '2020-05-10 06:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `post_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inner_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `inner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inner_width` int(11) DEFAULT NULL,
  `inner_height` int(11) DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `page_id`, `post_name`, `title`, `inner_title`, `description`, `url_link`, `icon`, `image`, `width`, `height`, `inner_image`, `inner_width`, `inner_height`, `meta_title`, `meta_keyword`, `meta_description`, `order_by`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 4, 'Post One', 'Post For Vision Page', 'Inner Post For Vision Page', '<h3><span style=\"font-family: &quot;Comic Sans MS&quot;;\"><b><font color=\"#ff0000\">Description for Vision Page.</font></b></span><b style=\"background-color: rgb(255, 255, 255);\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\"></span></b></h3>', 'Link for Vision Page', 'Icon For Vision Page', 'public/uploads/post_images/15941214_1648336092137702_5654391025677692098_n_172610808459.jpg', NULL, NULL, 'public/uploads/post_images/91358904_2953446438056905_333599395599613952_o_19832201615.jpg', NULL, NULL, 'Meta Title for Vision Page', 'Meta,Keyaword', 'Meta Description', 1, 1, 4, '2020-05-26 18:43:20', NULL, '2020-05-26 18:43:20'),
(4, 1, 'Dew Post', 'Dew Hunt Post', 'Dew Hunt Inner Post', '<blockquote class=\"blockquote\"><b>Dew Hunt Description.</b></blockquote>', NULL, 'Dew Hunt Icon', 'public/uploads/post_images/91349259_246886026467370_5892588859736195072_o_83553817927.jpg', 500, 400, 'public/uploads/post_images/91358904_2953446438056905_333599395599613952_o_65946152893.jpg', 600, 300, 'Dew Hunt', 'Dew Hunt', 'Description', 1, 1, 4, '2020-05-26 18:48:56', NULL, '2020-06-06 02:48:12'),
(5, 2, 'Page One Post', 'Page One title', 'Page One Inner Title', '<p>Page One Description</p>', 'Link for Page One', 'Icon For Page One', NULL, NULL, NULL, NULL, NULL, NULL, 'Meta Title for Page One', 'Page,One', 'Meta Description for Page One', 1, 1, 4, '2020-06-06 03:27:13', NULL, '2020-06-06 03:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `id` int(11) NOT NULL,
  `first_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sliders`
--

INSERT INTO `tbl_sliders` (`id`, `first_title`, `second_title`, `third_title`, `description`, `image`, `width`, `height`, `link`, `meta_title`, `meta_keyword`, `meta_description`, `order_by`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '<p><br></p>', 'public/uploads/slider_image/110308787_326745651685749_2438157101155051618_n_79010521183_40926670408.jpg', NULL, NULL, 'link', 'meta title', 'meta,keyword', 'meta description.', 1, 1, 4, '2020-04-23 10:49:57', NULL, '2020-07-21 23:50:17'),
(3, NULL, NULL, NULL, NULL, 'public/uploads/slider_image/108437927_624749504820936_8498197300372270697_n_97739421904_48007392676.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 4, '2020-07-21 23:49:37', NULL, '2020-07-21 23:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_links`
--

CREATE TABLE `tbl_social_links` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_social_links`
--

INSERT INTO `tbl_social_links` (`id`, `name`, `icon`, `link`, `status`, `order_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'Facebook', 'fa fa-facebook-f', 'https://www.facebook.com/QuickExpress97/?modal=admin_todo_tour', 1, 1, 4, '2019-12-01 05:54:34', NULL, '2020-07-07 01:34:59'),
(4, 'Twiteer', 'fa fa-twitter', 'https://twitter.com', 1, 2, NULL, '2019-12-01 05:56:55', NULL, '2020-04-18 10:38:01'),
(5, 'whatsapp', 'fa fa-whatsapp', 'https://www.whatsapp.com/', 0, 3, NULL, '2020-01-11 04:12:44', NULL, '2020-03-02 00:02:21'),
(6, 'Linkdin', 'fa fa-linkedin', 'https://bd.linkedin.com/', 0, 4, NULL, '2020-01-11 04:13:04', NULL, '2020-03-02 00:02:23'),
(7, 'Instagram', 'fa fa-instagram', 'https://www.instagram.com/', 0, 5, NULL, '2020-01-11 04:13:29', NULL, '2020-03-02 00:02:25'),
(8, 'Google Plus', 'fa fa-google-plus-g', 'http://facebook.com/', 0, 6, NULL, '2020-02-11 04:47:23', NULL, '2020-03-02 00:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_roles`
--

CREATE TABLE `tbl_user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_role` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `permission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_permission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_roles`
--

INSERT INTO `tbl_user_roles` (`id`, `name`, `parent_role`, `level`, `status`, `permission`, `action_permission`, `created_at`, `updated_at`) VALUES
(2, 'Super User', NULL, 1, 1, '1,6,7,8,10,11,12,39,2,3,4,5,38,13,50,54,55,51,52,56,57', '28,29,30,31,32,33,39,40,41,42,43,44,45,46,47,48,49,50,51,2,3,4,5,6,11,12,13,14,15,7,8,9,10,21,23,24,25,26,108,109,134,135,136,137,142,143,144,145,146,147,148,149,138,139,140,141,150,151,152,153,154', '2019-04-17 00:50:05', '2020-08-25 15:44:15'),
(3, 'Admin', NULL, 1, 1, '1,6,7,8,10,11,12,39,2,3,4,5,38,13,50,54', '28,29,30,31,32,33,39,40,41,42,43,44,45,46,47,48,49,50,51,2,3,4,5,6,11,12,13,14,15,7,8,9,10,21,23,24,25,26,108,109,134,135,136,137,142', '2019-04-17 00:52:54', '2020-08-20 02:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website_information`
--

CREATE TABLE `tbl_website_information` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer_website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_website_information`
--

INSERT INTO `tbl_website_information` (`id`, `website_name`, `prefix_title`, `website_title`, `website_link`, `developed_by`, `developer_website_link`, `phone_one`, `phone_two`, `phone_three`, `logo_one`, `logo_two`, `fav_icon`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Peredion', '|', 'betting', 'https://technoparkbd.com/', 'Techno Park Bangladesh', 'https://technoparkbd.com/', '+880 1916 304 877', NULL, NULL, 'public/uploads/site_logo/logo1/logo_20069127196.png', 'public/uploads/site_logo/logo2/logo_25538897556.png', 'public/uploads/site_logo/fav_icon/piterk160500098_22874161032.png', 'meta title', NULL, 'meta description', 1, 4, '2020-04-17 08:33:15', NULL, '2020-08-16 04:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_admin_panel_information`
--
ALTER TABLE `tbl_admin_panel_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_betting_categories`
--
ALTER TABLE `tbl_betting_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_betts`
--
ALTER TABLE `tbl_betts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client_betts`
--
ALTER TABLE `tbl_client_betts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_frontend_menu`
--
ALTER TABLE `tbl_frontend_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_games`
--
ALTER TABLE `tbl_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_matches`
--
ALTER TABLE `tbl_matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_actions`
--
ALTER TABLE `tbl_menu_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_action_type`
--
ALTER TABLE `tbl_menu_action_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social_links`
--
ALTER TABLE `tbl_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_website_information`
--
ALTER TABLE `tbl_website_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin_panel_information`
--
ALTER TABLE `tbl_admin_panel_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_betting_categories`
--
ALTER TABLE `tbl_betting_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_betts`
--
ALTER TABLE `tbl_betts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_client_betts`
--
ALTER TABLE `tbl_client_betts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_frontend_menu`
--
ALTER TABLE `tbl_frontend_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_games`
--
ALTER TABLE `tbl_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_matches`
--
ALTER TABLE `tbl_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_menu_actions`
--
ALTER TABLE `tbl_menu_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `tbl_menu_action_type`
--
ALTER TABLE `tbl_menu_action_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_social_links`
--
ALTER TABLE `tbl_social_links`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_website_information`
--
ALTER TABLE `tbl_website_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
