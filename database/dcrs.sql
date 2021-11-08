-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 07:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `cust_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_email`, `cust_password`, `cust_phone`, `cust_address`, `cust_status`, `created_at`, `updated_at`) VALUES
(4, 'cus1', 'cus@gmail.com', '$2y$10$7YBUe.BML/k1ACHWzCbHQe2ST.uhZuEsEMomK/KZCtJM3n.1NQGjS', '0169852134', 'Lot Uncle Roger, Jalan MSG, Melaka', 'Ban', '2021-05-29 22:21:41', '2021-05-29 23:23:21'),
(5, 'cus2', 'cus2@gmail.com', '$2y$10$PFNzB117eT9HN2eoSAgRsOJkFK8BlCzYzTGkzN6AwDHCFn7yoUUHe', '0135621024', 'Taman Vaccination, Jalan Astrazeneca, Sabah', 'Active', '2021-05-29 22:23:25', '2021-05-29 22:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `total_cost` double(8,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_time` time NOT NULL DEFAULT current_timestamp(),
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `proof_of_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `cust_id`, `request_id`, `total_cost`, `payment_method`, `payment_time`, `payment_date`, `proof_of_payment`, `payment_status`, `created_at`, `updated_at`) VALUES
(35, 4, 8, 200.00, 'Cash On Delivery', '15:00:27', '2021-05-30', '1622358047.jpg', 'Completed', '2021-05-29 23:00:27', '2021-05-29 23:01:22'),
(36, 4, 9, 765.00, 'Online Banking', '15:04:27', '2021-05-30', NULL, 'Completed', '2021-05-29 23:04:27', '2021-05-29 23:04:27'),
(37, 5, 10, 520.00, 'Cash On Delivery', '15:37:28', '2021-05-30', '1622360353.jpg', 'Completed', '2021-05-29 23:37:28', '2021-05-29 23:39:32'),
(38, 5, 11, 257.00, 'Online Banking', '15:38:37', '2021-05-30', NULL, 'Completed', '2021-05-29 23:38:37', '2021-05-29 23:38:37'),
(39, 4, 12, 354.00, 'Cash On Delivery', '01:43:36', '2021-05-31', '1622396625.jpg', 'Completed', '2021-05-30 09:43:36', '2021-05-30 09:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `request_services`
--

CREATE TABLE `request_services` (
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` int(11) NOT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dmg_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_time` time NOT NULL,
  `pickup_date` date NOT NULL,
  `request_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Unapproved',
  `pickup_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Unaccepted',
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repair_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_services`
--

INSERT INTO `request_services` (`request_id`, `cust_id`, `rider_id`, `product_name`, `dmg_info`, `pickup_address`, `delivery_address`, `pickup_time`, `pickup_date`, `request_status`, `pickup_status`, `delivery_status`, `repair_status`, `reason`, `cost`, `payment_status`, `created_at`, `updated_at`) VALUES
(8, 4, 1, 'Acer Nitro 5', 'Screen Cracked', 'Lot Uncle Roger, Jalan MSG, Melaka', 'Lot Uncle Roger 21, Jalan MSG, Melaka', '14:30:00', '2021-05-30', 'Approved', 'Accepted', 'Delivered', 'Completed', 'Completed', 200.00, 'Completed', '2021-05-29 22:28:04', '2021-05-29 23:01:22'),
(9, 4, 1, 'Lenovo 5', 'Ram Slot Damaged', 'Lot Uncle Roger, Jalan MSG, Melaka', 'Lot Uncle Roger, Jalan MSG, Melaka', '14:30:00', '2021-05-30', 'Approved', 'Accepted', 'Delivered', 'Completed', 'OK JE', 765.00, 'Completed', '2021-05-29 22:41:08', '2021-05-29 23:04:27'),
(10, 5, 2, 'Alienware S4', 'Cooling Fan Broken', 'Melaka Cincau', 'Bukit Keluang, Brunei', '15:07:00', '2021-05-30', 'Approved', 'Accepted', 'OTW', 'Completed', 'done', 520.00, 'Completed', '2021-05-29 23:07:03', '2021-05-29 23:39:32'),
(11, 5, 1, 'Dell DX 7', 'Key Board Damaged', 'Sabah Sarawak', 'Sabah Sarawak Malaysia', '15:35:00', '2021-05-30', 'Approved', 'Accepted', 'Done', 'Completed', 'Done', 257.00, 'Completed', '2021-05-29 23:34:30', '2021-05-29 23:38:37'),
(12, 4, 1, 'Huawei Matebook i3', 'Speaker Damaged', 'Kota Kinabalak, Sabah', 'Kota Kinabalang, Sabah', '01:43:00', '2021-05-31', 'Approved', 'Accepted', NULL, 'Completed', 'Masuk Air', 354.00, 'Completed', '2021-05-30 09:38:34', '2021-05-30 09:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `rider_id` bigint(20) UNSIGNED NOT NULL,
  `rider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`rider_id`, `rider_name`, `rider_email`, `rider_password`, `rider_phone`, `rider_address`, `rider_status`, `created_at`, `updated_at`) VALUES
(1, 'rider', 'rider@gmail.com', '$2y$10$o9savpU3mkpqboCmVGPpO./uc7BdTXe4r.Ult1XAPZTvCzrHbpiW.', '0123622541', 'Area 51, Bukit Kaja, Selangor', 'Active', '2021-05-29 22:17:04', '2021-05-29 22:17:04'),
(2, 'rider2', 'rider2@gmail.com', '$2y$10$AMP3PjfnCYhAC1/EKa257erwufX38yCz1MoPQ8GBvj.AwZC9HyTHm', '0178965213', 'Taman Tajuddin, Jalan Breakfast, Selangor', 'Active', '2021-05-29 22:20:07', '2021-05-29 22:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_email`, `staff_password`, `staff_phone`, `staff_address`, `staff_status`, `created_at`, `updated_at`) VALUES
(2, 'Staff', 'staff@gmail.com', '$2y$10$aPB3352PygG9L2sx.vrncuxQRz0U.F.TjwGOx6nFx3ICvDc5NGzy.', '0103202154', 'Lot 125 Taman Staff', 'Active', '2021-05-29 22:16:22', '2021-05-29 22:16:22'),
(3, 'staff2', 'staff2@gmail.com', '$2y$10$lX.oLBs.sTE/z440Tgs8Z.vT9O7vN6a7l3KXJlhvxBdS5.rNUj6PS', '0193322145', 'Pusat PKU, Pekan Pahang,', 'Active', '2021-05-29 22:17:43', '2021-05-29 22:17:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `request_services`
--
ALTER TABLE `request_services`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `request_services`
--
ALTER TABLE `request_services`
  MODIFY `request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `rider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
