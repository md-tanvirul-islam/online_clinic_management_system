-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2021 at 12:29 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
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
-- Database: `online_clinic_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_schedule_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED DEFAULT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `patient_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_schedule_id`, `doctor_id`, `patient_id`, `date`, `patient_status`, `fee`, `is_paid`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 5, 3, 8, '2021-01-18', 'report', '500', 'yes', 17, NULL, NULL, '2021-01-10 22:29:59', '2021-01-25 06:37:06'),
(10, 6, 3, 8, '2021-01-12', 'new', '800', 'yes', 17, NULL, NULL, '2021-01-10 22:30:23', '2021-02-03 04:15:52'),
(11, 2, 3, 8, '2021-01-15', 'new', '800', NULL, 17, NULL, NULL, '2021-01-10 22:51:48', '2021-01-10 22:51:48'),
(12, 7, 3, 8, '2021-01-13', 'new', '800', NULL, 17, NULL, NULL, '2021-01-10 23:15:44', '2021-01-10 23:15:44'),
(13, 3, 3, 8, '2021-01-17', 'new', '800', NULL, 17, NULL, NULL, '2021-01-10 23:33:58', '2021-01-10 23:33:58'),
(14, 3, 3, 16, '2021-01-31', 'new', '800', NULL, 40, NULL, NULL, '2021-01-30 06:50:14', '2021-01-30 06:50:14'),
(15, 5, 3, 16, '2021-02-01', 'report', '500', NULL, 40, NULL, NULL, '2021-01-30 06:50:46', '2021-01-30 06:50:46'),
(16, 2, 3, 16, '2021-02-05', 'report', '500', NULL, 40, NULL, NULL, '2021-01-30 07:22:11', '2021-01-30 07:22:11'),
(17, 4, 3, 16, '2021-02-06', 'report', '500', NULL, 40, NULL, NULL, '2021-01-30 07:25:23', '2021-01-30 07:25:23'),
(18, 6, 3, 16, '2021-02-02', 'new', '800', NULL, 40, NULL, NULL, '2021-01-30 07:30:38', '2021-01-30 07:30:38'),
(19, 7, 3, 16, '2021-02-03', 'new', '800', NULL, 40, NULL, NULL, '2021-01-30 07:34:29', '2021-01-30 07:34:29'),
(20, 3, 3, 12, '2021-01-31', 'report', '500', NULL, 36, NULL, NULL, '2021-01-30 07:38:01', '2021-01-30 07:38:01'),
(21, 6, 3, 6, '2021-02-09', 'old', '700', 'yes', 49, NULL, NULL, '2021-02-01 22:47:57', '2021-02-03 03:58:02'),
(22, 6, 3, 8, '2021-02-09', 'new', '800', NULL, 49, NULL, NULL, '2021-02-01 22:50:14', '2021-02-01 22:50:14'),
(23, 6, 3, 4, '2021-02-09', 'new', '800', NULL, 49, NULL, NULL, '2021-02-01 22:52:47', '2021-02-01 22:52:47'),
(24, 7, 3, 4, '2021-02-09', 'report', '500', NULL, 49, NULL, NULL, '2021-02-01 22:54:13', '2021-02-01 22:54:13'),
(25, 2, 3, 4, '2021-02-09', 'report', '500', NULL, 49, NULL, NULL, '2021-02-01 23:27:06', '2021-02-01 23:27:06'),
(26, 6, 3, 4, '2021-02-02', 'report', '500', NULL, 49, NULL, NULL, '2021-02-01 23:38:52', '2021-02-01 23:38:52'),
(27, 6, 3, 21, '2021-02-02', 'new', '800', NULL, 49, NULL, NULL, '2021-02-02 03:06:43', '2021-02-02 03:06:43'),
(28, 7, 3, 8, '2021-02-03', 'report', '500', NULL, 17, NULL, NULL, '2021-02-02 05:48:53', '2021-02-02 05:48:53'),
(29, 7, 16, 4, '2021-02-03', 'new', NULL, NULL, 14, NULL, NULL, '2021-02-02 09:39:20', '2021-02-02 09:39:20'),
(30, 7, 3, 21, '2021-02-03', 'report', '500', NULL, 50, NULL, NULL, '2021-02-02 10:19:44', '2021-02-02 10:19:44'),
(31, 7, 3, 22, '2021-02-03', 'new', '800', NULL, 51, NULL, NULL, '2021-02-03 03:55:40', '2021-02-03 03:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `bill_for_tests`
--

CREATE TABLE `bill_for_tests` (
  `id` bigint UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_for_tests`
--

INSERT INTO `bill_for_tests` (`id`, `date`, `amount`, `paid`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, '2021-01-17 18:00:00', '500', '0', 1, NULL, NULL, '2021-01-18 02:58:39', '2021-01-18 02:58:40'),
(9, '2021-02-02 18:00:00', '1250', '0', 49, 49, NULL, '2021-02-03 00:51:40', '2021-02-03 00:56:09'),
(10, '2021-02-02 18:00:00', '1250', '0', 49, NULL, NULL, '2021-02-03 04:04:56', '2021-02-03 04:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `status`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Medicine', NULL, 'Active', 'medicine department', 1, 1, '2020-12-10 00:08:39', '2020-12-10 04:44:14', NULL),
(4, 'Xray', NULL, 'Active', NULL, 1, 1, '2020-12-10 04:43:21', '2020-12-14 23:49:34', NULL),
(9, 'Cardiology', NULL, 'Active', 'Ades of ABC', 1, NULL, '2020-12-13 04:43:48', '2020-12-13 04:46:00', '2020-12-13 04:46:00'),
(10, 'Orthopedic', NULL, 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2020-12-20 05:55:15', '2021-01-20 00:09:42', NULL),
(11, 'Neurology', NULL, 'Active', 'about Neurology', 1, NULL, '2020-12-20 05:55:32', '2020-12-20 05:55:32', NULL),
(12, 'Oncology', NULL, 'Active', 'about Oncology', 1, NULL, '2020-12-20 05:55:53', '2020-12-20 05:55:53', NULL),
(15, 'Urology', NULL, 'Active', 'details of Urology', NULL, NULL, '2021-01-10 04:32:23', '2021-01-10 04:32:23', NULL),
(16, 'Gynaecology', NULL, 'Active', 'details of  Gynaecology', NULL, NULL, '2021-01-10 04:32:23', '2021-01-10 04:32:23', NULL),
(17, 'Diabetic', NULL, 'Active', 'details of Diabetic', NULL, NULL, '2021-01-10 04:32:24', '2021-01-10 04:32:24', NULL),
(18, 'Dental', NULL, 'Active', 'details of Dental', NULL, NULL, '2021-01-10 04:32:24', '2021-01-10 04:32:24', NULL),
(19, 'Nutrition', NULL, 'Active', 'details of Nutrition', NULL, NULL, '2021-01-10 04:32:24', '2021-01-10 04:32:24', NULL),
(20, 'General Surgery', NULL, 'Active', 'details of General Surgery', NULL, NULL, '2021-01-10 04:32:24', '2021-01-10 04:32:24', NULL),
(23, 'Department 10', NULL, 'Active', 'details of Department 1', NULL, NULL, '2021-02-03 04:12:20', '2021-02-03 04:12:20', NULL),
(24, 'Department 20', NULL, 'Active', 'details of Department 2', NULL, NULL, '2021-02-03 04:12:20', '2021-02-03 04:12:20', NULL),
(25, 'Department 30', NULL, 'Active', 'details of Department 3', NULL, NULL, '2021-02-03 04:12:20', '2021-02-03 04:12:20', NULL),
(26, 'Department 4', NULL, 'Active', 'details of Department 4', NULL, NULL, '2021-02-03 04:12:20', '2021-02-03 04:12:20', NULL),
(27, 'Department 5', NULL, 'Active', 'details of Department 5', NULL, NULL, '2021-02-03 04:12:20', '2021-02-03 04:12:20', NULL),
(28, 'Department 6', NULL, 'Active', 'details of Department 6', NULL, NULL, '2021-02-03 04:12:20', '2021-02-03 04:12:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `max_appointment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '30',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `birthDate` date DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodGroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feeNew` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feeInMonth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feeReport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `user_id`, `department_id`, `max_appointment`, `address`, `phoneNo`, `mobileNo`, `image`, `speciality`, `degree`, `bio`, `birthDate`, `gender`, `bloodGroup`, `feeNew`, `feeInMonth`, `feeReport`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Abdur Rahman', 'ar@mail.com', 4, 1, '30', 'address', '0147852', '12345678', NULL, 'Child', 'MGBS,FCPS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', 'A-', '800', '700', '500', 1, 49, '2020-12-13 05:03:51', '2021-01-31 04:22:30', NULL),
(6, 'Abdullah AB', 'abdullahab@mail.com', 5, 4, '30', '206 north shajahanpur', '016793043304', '017171377991', 'uploads/doctors/images/5fd7548dc1ab11607947405.jpg', 'Orthopedic', 'MGBS,FCPS', 'i am dr. Abdullah', '1970-12-08', 'male', 'A-', '900', '500', '400', 1, 1, '2020-12-14 06:03:25', '2021-01-09 23:26:11', NULL),
(7, 'Mohammad Kaykobad', 'mohammadkaykobad@mail.com', 6, 10, '30', '(9th Floor) Segunbagicha, Dhaka 1000, Bangladesh', '016793043304', '017171377991', 'uploads/doctors/images/5fd7548dc1ab11607947405.jpg', 'Anesthesiology', 'MGBS,FCPS, P.Hd', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', NULL, '500', '400', '300', 1, NULL, '2020-12-20 06:03:06', '2021-01-09 23:26:12', NULL),
(8, 'Qazi Motahar Hossain', 'qazimotaharhossain@mail.com', 7, 10, '30', '(9th Floor) Segunbagicha, Dhaka 1000, Bangladesh', '016793043304', '017171377991', NULL, 'Diagnostic', 'MGBS,FCPS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', NULL, '500', '400', '300', 1, NULL, '2020-12-20 06:03:47', '2021-01-09 23:26:12', NULL),
(9, 'Abdul Matin Patwari', 'abdulmatinpatwari@mail.com', 8, 10, '30', '(9th Floor) Segunbagicha, Dhaka 1000, Bangladesh', '016793043304', '017171377991', NULL, 'Dermatology', 'MGBS,FCPS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', NULL, '500', '400', '300', 1, NULL, '2020-12-20 06:04:16', '2021-01-09 23:26:12', NULL),
(10, 'Salman Khan', 'salmankhan@mail.com', 9, 11, '30', '(9th Floor) Segunbagicha, Dhaka 1000, Bangladesh', '016793043304', '017171377991', NULL, 'radiology', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', NULL, '500', '400', '300', 1, NULL, '2020-12-20 06:04:46', '2021-01-09 23:26:12', NULL),
(11, 'Fazlur Rahman Khan', 'fazlurrahmankhan@mail.com', 10, 11, '30', '(9th Floor) Segunbagicha, Dhaka 1000, Bangladesh', '016793043304', '017171377991', NULL, 'Nuclear medicine', 'MGBS,FCPS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', NULL, '500', '400', '300', 1, NULL, '2020-12-20 06:05:19', '2021-01-09 23:26:12', NULL),
(12, 'Mohammad Ataul Karim', 'mohammadataulkarim@mail.com', 11, 11, '30', '(9th Floor) Segunbagicha, Dhaka 1000, Bangladesh', '016793043304', '017171377991', NULL, 'Neurology', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', NULL, '500', '400', '300', 1, NULL, '2020-12-20 06:05:53', '2021-01-09 23:26:12', NULL),
(13, '\r\nJawed Karim', '\r\njawedkarim@mail.com', 12, 12, '30', '(9th Floor) Segunbagicha, Dhaka 1000, Bangladesh', '016793043304', '017171377991', NULL, 'Ophthalmology', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', NULL, '500', '400', '300', 1, NULL, '2020-12-20 06:06:18', '2021-01-09 23:26:13', NULL),
(14, 'M. Zahid Hasan', 'm_zahidhasan@mail.com', 13, 12, '30', '(9th Floor) Segunbagicha, Dhaka 1000, Bangladesh', '016793043304', '017171377991', NULL, 'Pathology', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', '1975-12-14', 'male', NULL, '500', '400', '300', 1, NULL, '2020-12-20 06:06:47', '2021-01-09 23:26:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`id`, `doctor_id`, `day`, `starting_time`, `ending_time`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 3, 'friday', '07:00pm', '08:00pm', 1, NULL, NULL, '2020-12-17 00:50:54', '2020-12-17 00:50:54'),
(3, 3, 'sunday', '08:00pm', '10:00pm', 1, NULL, NULL, '2020-12-21 00:04:50', '2020-12-21 00:04:50'),
(4, 3, 'saturday', '08:00pm', '10:00pm', 1, NULL, NULL, '2020-12-21 00:05:01', '2020-12-21 00:05:01'),
(5, 3, 'monday', '08:00pm', '10:00 pm', 1, NULL, NULL, '2020-12-21 00:05:15', '2020-12-21 00:05:15'),
(6, 3, 'tuesday', '08:00pm', '10:00pm', 1, NULL, NULL, '2020-12-21 00:05:29', '2020-12-21 00:05:29'),
(7, 3, 'wednesday', '08:00pm', '10:00pm', 1, NULL, NULL, '2020-12-21 00:05:41', '2020-12-21 00:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint UNSIGNED NOT NULL,
  `generic_id` int NOT NULL DEFAULT '0',
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strength` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosage_description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'accepted',
  `other_info` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `generic_id`, `brand_name`, `form`, `strength`, `dosage_description`, `status`, `other_info`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 11, 'B-50 Forte', 'Capsule', '10 mg', 'usual recommended dose is 1-2 tablet/capsule 3 times daily or as directed by the physician.', 'Inactive', 'Adverse reactions have been reported with specific vitamins and minerals, but generally at levels substantially higher than those in Vitamin-B complex. However, allergic and idiosyncratic reactions are possible at lower levels. Iron, even at the usual recommended level has been associated with gastrointestinal intolerance in some patients.', NULL, 1, 1, '2021-01-24 06:16:26', '2021-01-24 06:25:27'),
(2, 10, 'A-Forte', 'Soft Gelatin Capsule', '50000 IU', 'Vitamin A deficiency For severe deficiency with corneal changes: 500,000 unit/day for 3 days, followed by 50,000 unit/day for 2 wk and then 10,000-20,000 unit/day for 2 mth as follow-up therapy.\r\n\r\nFor cases without corneal changes: 10,000-25,000 unit/day until clinical improvement occurs (usually 1 -2 wk).', 'Active', 'Hypervitaminosis A characterised by fatigue, irritability, anorexia, weight loss, vomiting and other Gl disturbances, low-grade fever, hepatosplenomegaly, skin changes, alopoecia, dry hair, cracking and bleeding lips, SC swelling, nocturia, pains in bones and joints.', '2021-01-24 06:31:22', 1, NULL, '2021-01-24 06:30:14', '2021-01-24 06:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_generics`
--

CREATE TABLE `medicine_generics` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_generics`
--

INSERT INTO `medicine_generics` (`id`, `name`, `status`, `detail`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Abacavir', 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, 1, NULL, '2021-01-24 03:14:46'),
(2, 'Acetazolamide', 'Inactive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(3, 'Acetylsalicylic acid ', 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(4, 'Betamethasone', 'Inactive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(5, 'Cloxacillin', 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(6, 'Doxycycline', 'Inactive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(7, 'Ergometrine', 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(8, 'Fluconazole', 'Inactive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(9, 'Glucose', 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(10, 'Retinol', 'Inactive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(11, 'Vitamin B-Complex', 'Inactive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...', NULL, NULL, NULL, NULL, NULL),
(12, 'Zinc Sulphate', 'Active', NULL, NULL, 1, NULL, '2021-01-24 02:31:14', '2021-01-24 02:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2020_12_08_033920_create_departments_table', 1),
(14, '2020_12_08_094529_create_doctors_table', 1),
(15, '2020_12_08_095412_create_days_of_weeks_table', 1),
(16, '2020_12_08_105757_add_deleted_at_to_departments_table', 1),
(17, '2020_12_08_105921_add_deleted_at_to_doctors_table', 1),
(18, '2020_12_08_110202_add_deleted_at_to_days_of_weeks_table', 1),
(25, '2020_12_14_083736_create_patients_table', 2),
(26, '2020_12_14_094609_add_photo_to_patients_table', 2),
(27, '2020_12_15_070400_create_doctor_schedules_table', 3),
(28, '2020_12_17_074926_create_appointments_table', 4),
(30, '2020_12_22_065818_add_age_to_the_patients_table', 5),
(31, '2020_12_22_110625_add_is_paid_to_the_appointments_table', 6),
(32, '2020_12_24_121838_create_test_types_table', 7),
(40, '2020_12_27_095114_create_tests_table', 8),
(41, '2020_12_28_064317_create_bill_for_tests_table', 8),
(42, '2020_12_28_080908_create_patient_tests_table', 8),
(45, '2021_01_07_102936_add_user_id_to_patients_table', 9),
(46, '2021_01_07_103006_add_user_id_to_doctors_table', 9),
(54, '2021_01_07_105248_add_type_to_users_table', 10),
(55, '2021_01_10_104659_add_max_appointment_to_the_doctor_table', 10),
(56, '2021_01_13_053213_create_permission_tables', 11),
(58, '2021_01_18_121133_add_description_status_slug_at_test_types_table', 12),
(61, '2021_01_20_071003_rename_department_colum_is_active_into_status', 13),
(62, '2021_01_20_082324_add_default_value_at_status_colum', 13),
(63, '2021_01_20_083234_add_slug_column_into_department_table', 14),
(64, '2021_01_24_052047_create_medicine_generics_table', 15),
(65, '2021_01_24_052122_create_medicines_table', 15),
(66, '2021_01_25_065349_add_doctor_id_column_at_appointments_table', 16),
(87, '2021_01_26_092834_create_prescriptions_table', 17),
(88, '2021_01_26_092945_create_prescriptions_tests_table', 17),
(89, '2021_01_26_093041_create_prescriptions_medicines_table', 17),
(92, '2021_01_27_043053_add_appointment_id_to_prescriptions_table', 18),
(93, '2021_01_30_052606_create_notifications_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0dc84427-fed6-4bcb-8587-4260455592b9', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/8\",\"message\":\"md tanvirul islam has booked an appointment for You in 03 February, 2021.\"}', NULL, '2021-02-02 05:48:54', '2021-02-02 05:48:54'),
('2b0f5b73-2f87-4467-950c-acd30ae2158b', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/4\",\"message\":\"Patient one has booked an appointment for You in 09 February, 2021.\"}', NULL, '2021-02-01 23:27:06', '2021-02-01 23:27:06'),
('2d8966b9-b768-4822-b9ce-2a66b83b0ae2', 'App\\Notifications\\DoctorMakePrescriptionNotification', 'App\\Models\\User', 40, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/patient\\/prescription\\/view\\/6\",\"message\":\"Abdur Rahman has made a prescription for You in .\"}', NULL, '2021-02-03 00:34:58', '2021-02-03 00:34:58'),
('352eeb1d-4a90-4cd8-89dc-67c42faefd84', 'App\\Notifications\\DoctorMakePrescriptionNotification', 'App\\Models\\User', 51, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/patient\\/prescription\\/view\\/7\",\"message\":\"Abdur Rahman has made a prescription for You in .\"}', NULL, '2021-02-03 04:00:45', '2021-02-03 04:00:45'),
('3963643e-5a15-4cd4-81e9-c1fefd05a9e3', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/4\",\"message\":\"Patient one has booked an appointment for You in 09 February, 2021.\"}', NULL, '2021-02-01 22:54:14', '2021-02-01 22:54:14'),
('40e59c39-62cb-4e12-bbb2-197a63004b1a', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/4\",\"message\":\"Patient one has booked an appointment for You in 09 February, 2021.\"}', NULL, '2021-02-01 22:52:48', '2021-02-01 22:52:48'),
('80d21a9e-d21c-4d0e-a657-37be4b479620', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/22\",\"message\":\"Abdur Rahman has booked an appointment for You in 03 February, 2021.\"}', NULL, '2021-02-03 03:55:40', '2021-02-03 03:55:40'),
('875f084c-0db1-4a28-80be-646d0bb22db6', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/6\",\"message\":\"md tanvir has booked an appointment for You in 09 February, 2021.\"}', NULL, '2021-02-01 22:47:58', '2021-02-01 22:47:58'),
('8794c6b4-2043-47b0-a211-503edb68c231', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/21\",\"message\":\"John Wick has booked an appointment for You in 03 February, 2021.\"}', NULL, '2021-02-02 10:19:45', '2021-02-02 10:19:45'),
('88cd131b-0de7-4f7a-9988-6051475e00a0', 'App\\Notifications\\PatientCreatedNotification', 'App\\Models\\User', 1, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/patients\\/16\",\"message\":\"testinguser5 has created a profile as a patient.\"}', NULL, '2021-01-30 06:38:32', '2021-01-30 06:38:32'),
('9295d6b5-91c0-4105-90b5-7cd9d3a5f2db', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/12\",\"message\":\"patient example has booked an appointment for You in 31 January, 2021.\"}', NULL, '2021-01-30 07:38:02', '2021-01-30 07:38:02'),
('a0cca542-715b-4723-aab5-307f60941391', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/8\",\"message\":\"md tanvirul islam has booked an appointment for You in 09 February, 2021.\"}', NULL, '2021-02-01 22:50:14', '2021-02-01 22:50:14'),
('a1bca3fa-d5f3-4674-8726-d8e6369deb72', 'App\\Notifications\\PatientCreatedNotification', 'App\\Models\\User', 1, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/patients\\/20\",\"message\":\"one two has created a profile as a patient.\"}', NULL, '2021-01-31 04:01:03', '2021-01-31 04:01:03'),
('ddcba14b-0eb7-4c19-9060-5ef0e209a97f', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/4\",\"message\":\"Patient one has booked an appointment for You in 02 February, 2021.\"}', NULL, '2021-02-01 23:38:53', '2021-02-01 23:38:53'),
('e01ecb64-8ff6-4048-ba43-59511d39d98a', 'App\\Notifications\\PatientCreateAppointmentNotification', 'App\\Models\\User', 4, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/doctor\\/appointments\\/patient\\/profile\\/21\",\"message\":\"John Wick has booked an appointment for You in 02 February, 2021.\"}', NULL, '2021-02-02 03:06:44', '2021-02-02 03:06:44'),
('edca6e10-854f-4504-87d5-1560392663a5', 'App\\Notifications\\PatientCreatedNotification', 'App\\Models\\User', 49, '{\"link\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/patients\\/22\",\"message\":\"Abdur Rahman has created a profile as a patient.\"}', NULL, '2021-02-03 03:52:40', '2021-02-03 03:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodGroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `user_id`, `phone`, `age`, `birthDate`, `gender`, `bloodGroup`, `address`, `image`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(4, 'Abdur Rahman', 'abdurrahnab@mail.com', 14, '01717133997', NULL, '2010-12-15', 'male', 'A-', 'address of patient 1', 'uploads/patients/images/60152b2ca38f51612000044.jpg', '2020-12-14 06:08:47', '2021-01-30 03:47:24', 1, 1, NULL),
(5, 'Abu Taher', 'abutaher@mail.com', 15, '0171342414', NULL, '1996-12-15', 'male', 'B-', '206/1', NULL, '2020-12-22 03:40:44', '2021-01-09 23:25:10', 1, NULL, NULL),
(6, 'K.M Shafiullah', 'k_m_shafiullah@mail.com', 16, '0171342414', NULL, '1996-12-15', 'male', 'B+', '206/1 north shajahanpur', NULL, '2020-12-22 04:48:26', '2021-01-09 23:25:10', 1, NULL, NULL),
(8, 'md tanvirul islam', 'mdtanvirulislam@mail.com', 17, '0171342414', '23', '1996-12-15', 'male', 'A+', '206/1 north shajahanpur', NULL, '2020-12-22 04:53:53', '2021-01-09 23:25:10', 1, 1, NULL),
(9, 'Hasina Khan', 'hasinakhan@example.com', NULL, '01717377991', NULL, '2010-12-01', 'female', 'AB+', '123 Main Street, New York, NY 10030', NULL, '2021-01-30 00:47:19', '2021-01-30 03:50:58', NULL, NULL, '2021-01-30 03:50:58'),
(10, 'Abdul Hamid Khan Bhashani', 'abdulhamidkhanbhashani@mail.com', NULL, '789456123', NULL, '2021-01-19', 'male', 'A-', '123 Main Street, New York, NY 10030', NULL, '2021-01-30 00:55:36', '2021-01-30 03:50:54', NULL, NULL, '2021-01-30 03:50:54'),
(11, 'Tajuddin Ahmed', 'tajuddinahmed@mail.com', 35, '017171234522', NULL, '2021-01-20', 'male', 'A+', '123 Main Street, New York, NY 10030', NULL, '2021-01-30 01:00:09', '2021-01-30 03:50:49', NULL, NULL, '2021-01-30 03:50:49'),
(12, 'Abdus Salam', 'abdussalam@example.com', 36, '017173779912', NULL, '2000-01-01', 'male', 'B+', '123 Main Street, New York, NY 10030', 'uploads/patients/images/6015305b7f0281612001371.jpg', '2021-01-30 01:03:07', '2021-01-30 04:09:31', NULL, 1, NULL),
(13, 'Shafiur Rahman', 'shafiurrahman@mail.com', 37, '01717193461', NULL, '2005-01-04', 'male', 'O-', '123 Main Street, New York, NY 10030', NULL, '2021-01-30 04:23:17', '2021-01-30 04:23:17', NULL, NULL, NULL),
(14, 'Abdul Jabbar', 'abduljabbar@mail.com', 38, '012478596', NULL, '1974-01-31', 'male', 'O+', '123 Main Street, New York, NY 10030', NULL, '2021-01-30 06:31:10', '2021-01-30 06:31:10', NULL, NULL, NULL),
(15, 'Abul Barkat', 'abulbarkat@mail.com', 39, '0171785314', NULL, '1983-01-28', 'male', 'AB-', '123 Main Street, New York, NY 10030', NULL, '2021-01-30 06:35:21', '2021-01-30 06:35:21', NULL, NULL, NULL),
(16, 'Rafiq Uddin Ahmed', 'rafiquddinahmed@mail.com', 40, '0171785314', NULL, '1980-02-01', 'male', 'AB+', '123 Main Street, New York, NY 10030', NULL, '2021-01-30 06:38:32', '2021-01-30 06:38:32', NULL, NULL, NULL),
(17, 'A. K. Fazlul Huq', 'akfazlulhuq@mail.com', 44, '0171785314', NULL, '2011-01-01', 'male', 'A+', '234 Main Street, New York, NY 10030', NULL, '2021-01-30 23:38:36', '2021-01-30 23:38:36', 1, NULL, NULL),
(18, 'Nawab Abdul Latif', 'nawababdullatif@mail.com', 46, '0173497856', NULL, '1970-01-03', 'Male', 'A+', '678 Main Street, New York, NY 10030', NULL, '2021-01-30 23:53:06', '2021-01-30 23:53:06', 1, NULL, NULL),
(19, 'Abdul Halim Ghaznavi', 'abdulhalimghaznavi@mail.com', 47, '0171737712', NULL, '2000-01-01', 'Male', 'A-', '901 Main Street, New York, NY 10030', 'uploads/patients/images/6016465bd7eeb1612072539.jpg', '2021-01-30 23:55:39', '2021-01-30 23:55:39', 1, NULL, NULL),
(20, 'Nawab Salimullah', 'nawabsalimullah@mail.com', 48, '0171785314', NULL, '1993-01-13', 'male', 'B-', '123 Main Street, New York, NY 10030', NULL, '2021-01-31 04:01:03', '2021-01-31 04:01:03', NULL, NULL, NULL),
(21, 'John Wick', 'johnwick@mail.com', 50, '0171785314', NULL, '1980-02-03', 'Male', 'B+', '82–92 Beaver Street (at Pearl Street),New York City,United States', NULL, '2021-02-02 03:06:43', '2021-02-02 03:06:43', 49, NULL, NULL),
(22, 'Abdur Rahman', 'abdurrahman@mail.com', 51, '017174679545', NULL, '2009-02-10', 'male', NULL, NULL, NULL, '2021-02-03 03:52:38', '2021-02-03 03:52:38', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_tests`
--

CREATE TABLE `patient_tests` (
  `id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `test_id` bigint UNSIGNED NOT NULL,
  `testType_id` bigint UNSIGNED NOT NULL,
  `bill_for_test_id` bigint UNSIGNED NOT NULL,
  `invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_tests`
--

INSERT INTO `patient_tests` (`id`, `patient_id`, `test_id`, `testType_id`, `bill_for_test_id`, `invoice`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(15, 5, 1, 2, 8, '60054dc03f756', 1, NULL, NULL, '2021-01-18 02:58:40', '2021-01-18 02:58:40'),
(16, 4, 1, 2, 9, '601a47fce107d', 49, NULL, NULL, '2021-02-03 00:51:40', '2021-02-03 00:51:40'),
(17, 4, 4, 4, 9, '601a4813d19a8', 49, NULL, NULL, '2021-02-03 00:52:03', '2021-02-03 00:52:03'),
(19, 8, 1, 2, 10, '601a75492cbe3', 49, NULL, NULL, '2021-02-03 04:04:57', '2021-02-03 04:04:57'),
(20, 8, 4, 4, 10, '601a75495eaf5', 49, NULL, NULL, '2021-02-03 04:04:57', '2021-02-03 04:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'department create', 'web', '2021-01-13 05:35:05', '2021-01-13 05:35:05'),
(2, 'department edit', 'web', '2021-01-13 05:35:54', '2021-01-13 05:35:54'),
(3, 'department delete', 'web', '2021-01-13 05:36:15', '2021-01-13 05:36:15'),
(4, 'department view', 'web', '2021-01-13 05:38:07', '2021-01-13 05:38:07'),
(5, 'role create', 'web', '2021-01-13 06:05:15', '2021-01-13 06:05:15'),
(6, 'role edit', 'web', '2021-01-13 06:05:25', '2021-01-13 06:05:25'),
(7, 'role view', 'web', '2021-01-13 06:05:38', '2021-01-13 06:05:38'),
(8, 'role delete', 'web', '2021-01-13 06:05:47', '2021-01-13 06:05:47'),
(9, 'permission create', 'web', '2021-01-13 06:06:10', '2021-01-13 06:06:10'),
(10, 'permission view', 'web', '2021-01-13 06:06:22', '2021-01-13 06:06:22'),
(11, 'permission edit', 'web', '2021-01-13 06:06:31', '2021-01-13 06:06:31'),
(12, 'permission delete', 'web', '2021-01-13 06:08:10', '2021-01-13 06:08:10'),
(14, 'appointment create', 'web', '2021-01-13 22:56:13', '2021-01-13 23:00:58'),
(15, 'appointment delete', 'web', '2021-01-17 02:43:03', '2021-01-17 02:43:03'),
(16, 'appointment edit', 'web', '2021-01-17 02:43:10', '2021-01-17 02:43:10'),
(17, 'appointment view', 'web', '2021-01-17 02:43:21', '2021-01-17 02:43:21'),
(18, 'bill_for_test create', 'web', '2021-01-17 02:44:31', '2021-01-17 02:44:31'),
(19, 'bill_for_test delete', 'web', '2021-01-17 02:44:57', '2021-01-17 02:44:57'),
(20, 'bill_for_test edit', 'web', '2021-01-17 02:45:08', '2021-01-17 02:45:08'),
(21, 'bill_for_test view', 'web', '2021-01-17 02:45:20', '2021-01-17 02:45:20'),
(22, 'doctor create', 'web', '2021-01-17 02:46:23', '2021-01-17 02:46:23'),
(23, 'doctor edit', 'web', '2021-01-17 02:50:13', '2021-01-17 02:50:13'),
(24, 'doctor view', 'web', '2021-01-17 02:50:23', '2021-01-17 02:50:23'),
(25, 'doctor delete', 'web', '2021-01-17 02:50:31', '2021-01-17 02:50:31'),
(26, 'doctor_schedule create', 'web', '2021-01-17 02:51:04', '2021-01-17 02:51:04'),
(27, 'doctor_schedule edit', 'web', '2021-01-17 02:51:54', '2021-01-17 02:51:54'),
(28, 'doctor_schedule view', 'web', '2021-01-17 02:52:01', '2021-01-17 02:52:01'),
(29, 'doctor_schedule delete', 'web', '2021-01-17 02:52:16', '2021-01-17 02:52:16'),
(30, 'patient create', 'web', '2021-01-17 02:52:59', '2021-01-17 02:52:59'),
(31, 'patient edit', 'web', '2021-01-17 02:53:09', '2021-01-17 02:53:09'),
(32, 'patient delete', 'web', '2021-01-17 02:53:28', '2021-01-17 02:53:28'),
(33, 'patient view', 'web', '2021-01-17 02:53:49', '2021-01-17 02:53:49'),
(34, 'patient_test create', 'web', '2021-01-17 02:54:32', '2021-01-17 02:54:32'),
(35, 'patient_test edit', 'web', '2021-01-17 02:54:41', '2021-01-17 02:54:41'),
(36, 'patient_test delete', 'web', '2021-01-17 02:54:57', '2021-01-17 02:54:57'),
(37, 'patient_test view', 'web', '2021-01-17 02:55:15', '2021-01-17 02:55:15'),
(38, 'test create', 'web', '2021-01-17 02:55:50', '2021-01-17 02:55:50'),
(39, 'test view', 'web', '2021-01-17 02:55:56', '2021-01-17 02:55:56'),
(40, 'test edit', 'web', '2021-01-17 02:56:05', '2021-01-17 02:56:05'),
(41, 'test delete', 'web', '2021-01-17 02:56:11', '2021-01-17 02:56:11'),
(42, 'test_type create', 'web', '2021-01-17 02:56:27', '2021-01-17 02:56:27'),
(43, 'test_type view', 'web', '2021-01-17 02:56:41', '2021-01-17 02:56:41'),
(44, 'test_type delete', 'web', '2021-01-17 02:56:51', '2021-01-17 02:56:51'),
(45, 'test_type edit', 'web', '2021-01-17 02:57:25', '2021-01-17 02:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED DEFAULT NULL,
  `patient_id` bigint UNSIGNED DEFAULT NULL,
  `appointment_id` bigint UNSIGNED DEFAULT NULL,
  `patient_medical_history` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctor_id`, `patient_id`, `appointment_id`, `patient_medical_history`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 3, 8, 9, '<p>&nbsp;</p>\r\n<p>Lipsum generator: Lorem Ipsum - All the factswww.lipsum.com</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when ...</p>\r\n<p>&lrm;Lorem Ipsum &middot; &lrm;The facts - Lipsum generator &middot; &lrm;Banners</p>', NULL, 4, NULL, '2021-01-26 23:17:21', '2021-01-26 23:17:21'),
(5, 3, 12, 20, '<p>Lorem Ipsum<strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</strong>. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lore<em>m Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</em></p>', NULL, 4, NULL, '2021-01-30 09:04:12', '2021-01-30 09:04:12'),
(6, 3, 16, 19, '<p>Hello, World!</p>', NULL, 4, NULL, '2021-02-03 00:34:55', '2021-02-03 00:34:55'),
(7, 3, 22, 31, '<p><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem Ipsum is simply&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">dummy text</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">dummy text</span><span style=\"color: #4d5156; font-family: arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;ever since the 1500s,</span></p>', NULL, 4, NULL, '2021-02-03 04:00:43', '2021-02-03 04:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions_medicines`
--

CREATE TABLE `prescriptions_medicines` (
  `id` bigint UNSIGNED NOT NULL,
  `prescription_id` bigint UNSIGNED DEFAULT NULL,
  `medicine_id` bigint UNSIGNED DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions_medicines`
--

INSERT INTO `prescriptions_medicines` (`id`, `prescription_id`, `medicine_id`, `frequency`, `note`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, 4, NULL, NULL, NULL),
(2, 2, 1, NULL, NULL, NULL, 4, NULL, NULL, NULL),
(3, 2, 10, NULL, NULL, NULL, 4, NULL, NULL, NULL),
(4, 3, 1, '1', 'At Morning and Night after food', NULL, 4, NULL, NULL, NULL),
(5, 3, 11, '2', 'At morning', NULL, 4, NULL, NULL, NULL),
(7, 5, 1, '2', 'after night meal', NULL, 4, NULL, NULL, NULL),
(8, 5, 2, '1', 'in morning and night', NULL, 4, NULL, NULL, NULL),
(9, 5, 10, '1', 'before night meal', NULL, 4, NULL, NULL, NULL),
(10, 6, 12, '2', 'after night meal', NULL, 4, NULL, NULL, NULL),
(11, 7, 11, '3', 'after morning, noon, night meal', NULL, 4, NULL, NULL, NULL),
(12, 7, 9, '1', 'after  night meal', NULL, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions_tests`
--

CREATE TABLE `prescriptions_tests` (
  `id` bigint UNSIGNED NOT NULL,
  `prescription_id` bigint UNSIGNED DEFAULT NULL,
  `test_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions_tests`
--

INSERT INTO `prescriptions_tests` (`id`, `prescription_id`, `test_id`, `deleted_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 4, NULL, NULL, NULL),
(2, 1, 2, NULL, 4, NULL, NULL, NULL),
(3, 2, 1, NULL, 4, NULL, NULL, NULL),
(4, 2, 3, NULL, 4, NULL, NULL, NULL),
(6, 3, 1, NULL, 4, NULL, NULL, NULL),
(7, 3, 3, NULL, 4, NULL, NULL, NULL),
(9, 5, 1, NULL, 4, NULL, NULL, NULL),
(10, 5, 2, NULL, 4, NULL, NULL, NULL),
(11, 5, 3, NULL, 4, NULL, NULL, NULL),
(12, 6, 1, NULL, 4, NULL, NULL, NULL),
(13, 6, 3, NULL, 4, NULL, NULL, NULL),
(14, 7, 1, NULL, 4, NULL, NULL, NULL),
(15, 7, 3, NULL, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-01-13 04:44:28', '2021-01-13 04:44:28'),
(2, 'doctor', 'web', '2021-01-13 04:44:48', '2021-01-13 04:44:48'),
(3, 'patient', 'web', '2021-01-13 04:45:51', '2021-01-13 04:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(14, 2),
(17, 2),
(22, 2),
(23, 2),
(24, 2),
(33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `testType_id` bigint UNSIGNED NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `testType_id`, `price`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Blood Test 1', 2, '500', 1, 1, NULL, '2020-12-30 02:44:31', '2021-01-18 04:38:37'),
(2, 'Blood Test 2', 2, '600', 1, NULL, NULL, '2020-12-30 02:44:47', '2020-12-30 02:44:47'),
(3, 'Xray 1', 4, '700', 1, NULL, NULL, '2020-12-30 02:45:04', '2020-12-30 02:45:04'),
(4, 'Xray 2', 4, '750', 1, NULL, NULL, '2020-12-30 02:45:20', '2020-12-30 02:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `test_types`
--

CREATE TABLE `test_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_types`
--

INSERT INTO `test_types` (`id`, `name`, `description`, `status`, `slug`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'blood', 'Description About the Blood Test Category !!@@', 'active', 'blood', 1, 1, NULL, '2020-12-26 23:57:19', '2021-01-19 00:25:06'),
(4, 'Xray', 'Details about xray test  category', 'active', 'xray', 1, 1, NULL, '2020-12-28 00:16:40', '2021-01-19 00:25:48'),
(7, 'urine', 'tests related urine', 'active', 'urine', 1, NULL, NULL, '2021-01-19 00:01:28', '2021-01-19 00:01:28'),
(9, 'Blood Analysis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'blood-analysis', NULL, NULL, NULL, NULL, NULL),
(10, 'Gastric Fluid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'gastric-fluid', NULL, NULL, NULL, NULL, NULL),
(11, 'Kidney Function Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'kidney-function-test', NULL, NULL, NULL, NULL, NULL),
(12, 'Liver Function Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'liver-function-test', NULL, NULL, NULL, NULL, NULL),
(13, 'Lumbar Puncture', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'lumbar-puncture', NULL, NULL, NULL, NULL, NULL),
(14, 'Malabsorption Tests', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'malabsorption-tests', NULL, NULL, NULL, NULL, NULL),
(15, 'Pregnancy Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'pregnancy-test', NULL, NULL, NULL, NULL, NULL),
(16, 'Prenatal Testing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'prenatal-testing', NULL, NULL, NULL, NULL, NULL),
(17, 'Thyroid Function Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'thyroid-function-test', NULL, NULL, NULL, NULL, NULL),
(18, 'Urinalysis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'active', 'urinalysis', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'patient',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Abdur Rahman', 'ar@mail.com', 'doctor', NULL, '$2y$10$quaQ1KRrJ5A.7tFrySfbTuwjFG6jbWByTCWPNKBcjOJEOCHVD9OM2', NULL, '2021-01-07 04:49:44', '2021-01-07 04:49:44'),
(5, 'Abdullah AB', 'abdullahab@mail.com', 'doctor', NULL, '$2y$10$E64wlVe/TtRgHs6MpxZTXOAzige/rYLkdayQWNAot0KfRrLG6SuQy', NULL, '2021-01-07 04:49:44', '2021-01-07 04:49:44'),
(6, 'Do1Da1', 'Do1Da1@mail.com', 'doctor', NULL, '$2y$10$bAGShLFpZaqmlkkhDj7g8O98bgj6XcKnkvB6WpTQ0QVp5ixtI2yey', NULL, '2021-01-07 04:49:44', '2021-01-07 04:49:44'),
(7, 'Do2Da1', 'Do2Da1@mail.com', 'doctor', NULL, '$2y$10$oVfCDiXJWPZubcH9NhrsPehmOTm466TCsxpjnbz2nDSCdhcq0hLiK', NULL, '2021-01-07 04:49:45', '2021-01-07 04:49:45'),
(8, 'Do3Da1', 'Do3Da1@mail.com', 'doctor', NULL, '$2y$10$aBObg7w8vpOyEVUraNUHRe5n4RZb4PsvIznn.POOkvfCLTiQ8l1FO', NULL, '2021-01-07 04:49:45', '2021-01-07 04:49:45'),
(9, 'Do1Da2', 'Do1Da2@mail.com', 'doctor', NULL, '$2y$10$cStSEmIwSRTBlv8mcgeZc.fE7Z8W7PBzjElXsNE1umB.KOkUgLbdK', NULL, '2021-01-07 04:49:45', '2021-01-07 04:49:45'),
(10, 'Do2Da2', 'Do2Da2@mail.com', 'doctor', NULL, '$2y$10$3lD43uURAIMda7tsbhMis.b9NiJPOwShU1JtQFFxFVFsIOWnMCoZe', NULL, '2021-01-07 04:49:46', '2021-01-07 04:49:46'),
(11, 'Do3Da2', 'Do3Da2@mail.com', 'doctor', NULL, '$2y$10$sjIzpFImmRtcB9iec8oVLO3o.k5jRheHjC6/0/AsqbgE5I0iGsG.K', NULL, '2021-01-07 04:49:46', '2021-01-07 04:49:46'),
(12, 'Do1Da3', 'Do1Da3@mail.com', 'doctor', NULL, '$2y$10$QfgXfcozbI27sEPtBlJvteDyTwNgrGxNut/OmwaE2PxHCrMYWoT.2', NULL, '2021-01-07 04:49:46', '2021-01-07 04:49:46'),
(13, 'Do4Da3', 'Do4Da3@mail.com', 'doctor', NULL, '$2y$10$mQlooDoF/0ChMYeudMgABeFv.Nk6izD5E419Bpe7l4g68e2r3ijHC', NULL, '2021-01-07 04:49:46', '2021-01-07 04:49:46'),
(14, 'Patient one', 'patientone@mail.com', 'patient', NULL, '$2y$10$wIkfAVIx6DOMDsaE2Q.BoO5jM90t2GGqqy0n2aUN71J1ot4trm1BC', NULL, '2021-01-07 04:51:20', '2021-01-07 04:51:20'),
(15, 'tanvir', 'tanvir@mail.com', 'patient', NULL, '$2y$10$4FrFZ.JyzfgkK/z8zHVKE.MJh0r52C/cbK4zp5nBAAwykdFkQFwJa', NULL, '2021-01-07 04:51:20', '2021-01-07 04:51:20'),
(16, 'md tanvir', 'mdtanvir@mail.com', 'patient', NULL, '$2y$10$k4RYcyYCD/PL9oyIWkuLG.bPyaCQhxUwEWXUHPfCZ2V2UIAOg1Zgu', NULL, '2021-01-07 04:51:20', '2021-01-07 04:51:20'),
(17, 'md tanvirul islam', 'mdtanvirulislam@mail.com', 'patient', NULL, '$2y$10$kRyHK1qloIJ2p7o7di20/.XSKNHLlJnKR5ORg2q73QmSR9mCyPzwO', NULL, '2021-01-07 04:51:21', '2021-01-07 04:51:21'),
(18, 'new user', 'newueer@mail.com', 'patient', NULL, '$2y$10$IWIDMGrZEZ4opCMHIOzeA.qwOS3fgXg/wLfk9de2bXxd.UlqXKWSO', NULL, '2021-01-12 04:54:22', '2021-01-12 04:54:22'),
(19, 'Dr.Lewis Harber I', 'fernando.bosco@example.org', 'doctor', NULL, '$2y$10$4a9kEWTanhPUYWKMMWVhee25AggZmRQDqquc2JxGCQA.seGsgJA5S', NULL, NULL, NULL),
(20, 'Dr.Lillie West', 'lubowitz.hazel@example.net', 'doctor', NULL, '$2y$10$odjG35i7VaDNDBAX3TOw1.pyFFXsmzewxoHl0oF7Q.zeSm9X0M8lO', NULL, NULL, NULL),
(21, 'Dr.Brendan Lind', 'qrath@example.com', 'doctor', NULL, '$2y$10$atu5APams3v0p9w51UPMsuA0wZQ9yMZiiJ9jngN5B2Y7kjMWO9q4G', NULL, NULL, NULL),
(22, 'Dr.Miss Vella Steuber MD', 'casper.jensen@example.com', 'doctor', NULL, 'Dr.Newton Swift', NULL, '2021-01-20 03:24:23', '2021-01-20 03:24:23'),
(23, 'Dr.Darrick Little', 'isadore66@example.com', 'doctor', NULL, 'Dr.Mr. Urban Mertz MD', NULL, '2021-01-20 03:28:53', '2021-01-20 03:28:53'),
(24, 'Dr.Roy Marquardt V', 'jacques64@example.net', 'doctor', NULL, 'Dr.Prof. Jadyn Maggio', NULL, '2021-01-20 03:28:55', '2021-01-20 03:28:55'),
(25, 'Dr.Mr. Tommie Mueller', 'fwill@example.net', 'doctor', NULL, 'Dr.Jerrold Daugherty', NULL, '2021-01-20 03:29:11', '2021-01-20 03:29:11'),
(26, 'Dr.Katelynn Hagenes PhD', 'green.rudolph@example.com', 'doctor', NULL, 'Dr.Nikko Nader', NULL, '2021-01-20 03:29:39', '2021-01-20 03:29:39'),
(27, 'Dr.Dee Smith', 'bosco.madelynn@example.org', 'doctor', NULL, '$2y$10$8eAGu544DrJDyATGoqeRS.690KQZ0fvPCIV1wJydB8aSx6eRUCaUq', NULL, '2021-01-20 03:32:03', '2021-01-20 03:32:03'),
(28, 'Dr.Mohamed Lowe', 'okihn@example.org', 'doctor', NULL, '$2y$10$DaY14ntBfpVJslRKjdDx1edgFCSXNDBB7ivL58UmNuEIcmM1vAS/.', NULL, '2021-01-20 03:32:19', '2021-01-20 03:32:19'),
(29, 'saad', 'saad@example.com', 'patient', NULL, '$2y$10$n1DBzh9L7OTlX0FP3Z8ux.uRU1tOXQ2cnPf.5Ovsz2zR4mFhH5H6y', NULL, '2021-01-30 00:04:10', '2021-01-30 00:04:10'),
(30, 'saman', 'saman@example.com', 'patient', NULL, '$2y$10$7zvq444zTLsrLUYeiBsYm.25j1j2JVFRExesZx3e2yNkbsyIbp0bW', NULL, '2021-01-30 00:14:37', '2021-01-30 00:14:37'),
(31, 'abc', 'abc@example.com', 'patient', NULL, '$2y$10$gUeV5Z6b5t6M6THy0/b44uygQMHcTz0y5MErQ46ZpEweAoKKiO5Fm', NULL, '2021-01-30 00:47:19', '2021-01-30 00:47:19'),
(32, 'xyz@example.com', 'xyz@example.com', 'patient', NULL, '$2y$10$yoPgiEPtMzE9XTW7Z/szve7vskmoFmMiexef.1iQy1MHGoo7PpKJW', NULL, '2021-01-30 00:50:14', '2021-01-30 00:50:14'),
(33, 'mno', 'mno@a.com', 'patient', NULL, '$2y$10$jhjOyeJEPhCv5IDTdivbQOgOD3leqbh44W0T4i7tXmrwc99HvDssi', NULL, '2021-01-30 00:55:36', '2021-01-30 00:55:36'),
(34, 'man', 'man@xa.com', 'patient', NULL, '$2y$10$BNcF9rP02Yyj4JPmEhh1N.NkziBdZ4jwkbETFvK7CDhSWb1UgRmFe', NULL, '2021-01-30 00:57:43', '2021-01-30 00:57:43'),
(35, 'tanvir1', 'tanvir1@mail.com', 'patient', NULL, '$2y$10$WFEeN9wE4Z/h8DI3gsnS5.JBc6Ib8miDRvbg1QM.b1W6tA0cMU8CC', NULL, '2021-01-30 01:00:09', '2021-01-30 01:00:09'),
(36, 'patient example', 'patient@example.com', 'patient', NULL, '$2y$10$HMKHzObPHlWXVK9JrGuRiuEg7cjqygiyx/cvbI/LmfPhHS1QSU6a.', NULL, '2021-01-30 01:03:06', '2021-01-30 01:03:06'),
(37, 'testing user', 'trstinguser@mail.com', 'patient', NULL, '$2y$10$EHW/jHTbjRz6ygGhRjdLRuOXWu9oEW/wSMpgMXiyxQ3VSv1wpzPMO', NULL, '2021-01-30 04:23:16', '2021-01-30 04:23:16'),
(38, 'testing user 2', 'testinguser2@mail.com', 'patient', NULL, '$2y$10$IyZSjxgaaODy6ap3hO5hZeSRuUNepegpmFy3ptvPr2Mee65k5Uqwy', NULL, '2021-01-30 06:31:10', '2021-01-30 06:31:10'),
(39, 'testing user 3', 'testinguser3@mail.com', 'patient', NULL, '$2y$10$mCuRmSBKQVOjgs248CkFyuCFhSTkcD4nsn4nW6FINSDncFrP2QXcm', NULL, '2021-01-30 06:35:21', '2021-01-30 06:35:21'),
(40, 'testinguser5', 'testinguser5@mail.com', 'patient', NULL, '$2y$10$r3lmBpZcOH7/OD5sQKX7UeJexHGCaQoU6YIHym5KW3QRsUKUNMLHC', NULL, '2021-01-30 06:38:31', '2021-01-30 06:38:31'),
(41, 'Testing Doctor', 'testingdoctor@mail.com', 'doctor', NULL, '$2y$10$QjCyOJ1OIx8eu3oVyWPWduTe8OgWmn2zmtuwWcPu.hIAG6lsBhYyq', NULL, '2021-01-30 23:05:49', '2021-01-30 23:05:49'),
(42, 'Testing Patient Alpha', 'testingpatientalpha@mail.com', 'patient', NULL, '$2y$10$Whxxe5DyCveVVUTkFdTIMOQFii7edpfj2TLVPoDA66u59bMpWxb9C', NULL, '2021-01-30 23:33:03', '2021-01-30 23:33:03'),
(44, 'Testing Patient Beta', 'testingpatientbeta@mail.com', 'patient', NULL, '$2y$10$9uMURnIlAVxO4hS4KV6znOrSJjO0TE1m7x6vDTgfE/wf8lCa0RLr6', NULL, '2021-01-30 23:38:36', '2021-01-30 23:38:36'),
(45, 'Testing Patient Gama', 'testingpatientgama@mail.com', 'patient', NULL, '$2y$10$Dee0N0DIz5v/KW8DwqIqDOEoByS1LqEuibPAr1TLgsXPAFC2el4BC', NULL, '2021-01-30 23:49:11', '2021-01-30 23:49:11'),
(46, 'Testing Patient Gama 1', 'testingpatientgama1 @mail.com', 'patient', NULL, '$2y$10$RzNfkAxzSuNpzy1VHu.O7OuQRdrvszwSOPu5IK94REWqmmmcJ.GCy', NULL, '2021-01-30 23:53:06', '2021-01-30 23:53:06'),
(47, 'Testing Patient Alpha 1', 'testingpatientalpha1@mail.com', 'patient', NULL, '$2y$10$othPUNYEK1C.rg87b0UYhev83IxxyPbcLjs6cQvVvoQFd0ldFu4E6', NULL, '2021-01-30 23:55:39', '2021-01-30 23:55:39'),
(48, 'one two', 'onetwo@mail.com', 'patient', NULL, '$2y$10$B.ohbdEQPhmubehBWNt6Ee0TIYExFjy0Yk69jhXZRArR.yrMRg1Pi', NULL, '2021-01-31 04:01:03', '2021-01-31 04:01:03'),
(49, 'Admin', 'admin@example.com', 'admin', NULL, '$2y$10$AWmT2aM0ukGzxhGUEmf3BO0bXhcWj5ZiofJqxa0wm6pss/gLXagmC', NULL, NULL, NULL),
(50, 'John Wick', 'johnwick@mail.com', 'patient', NULL, '$2y$10$lTx781lpby3.4/dqCRhzl.lOlsc2HE31iWyfhY3kZmU.M.5Jpd1Ku', NULL, '2021-02-02 03:06:43', '2021-02-02 03:06:43'),
(51, 'Abdur Rahman', 'abdurrahman@mail.com', 'patient', NULL, '$2y$10$XJRIIS478FO4bcJHHAetjugnrmkquOEHHDSi4a11ybWykQ0cwMIlS', NULL, '2021-02-03 03:52:38', '2021-02-03 03:52:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_for_tests`
--
ALTER TABLE `bill_for_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_department_id_foreign` (`department_id`);

--
-- Indexes for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_generic_id_index` (`generic_id`);

--
-- Indexes for table `medicine_generics`
--
ALTER TABLE `medicine_generics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicine_generics_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_tests_invoice_unique` (`invoice`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prescriptions_appointment_id_unique` (`appointment_id`);

--
-- Indexes for table `prescriptions_medicines`
--
ALTER TABLE `prescriptions_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions_tests`
--
ALTER TABLE `prescriptions_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tests_name_unique` (`name`);

--
-- Indexes for table `test_types`
--
ALTER TABLE `test_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_types_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bill_for_tests`
--
ALTER TABLE `bill_for_tests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_generics`
--
ALTER TABLE `medicine_generics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patient_tests`
--
ALTER TABLE `patient_tests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prescriptions_medicines`
--
ALTER TABLE `prescriptions_medicines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prescriptions_tests`
--
ALTER TABLE `prescriptions_tests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_types`
--
ALTER TABLE `test_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
