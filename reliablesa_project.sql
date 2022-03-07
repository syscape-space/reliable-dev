-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2022 at 10:24 AM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reliablesa_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo_profile`, `password`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'adm@admin.com', NULL, '$2y$10$z9qBH5eqxLLkvokhfk3cSuBt/BOF3v5xI4j4R2BTnPaDd6foK3CEe', 1, 'TST1guXEy2w1HpwyoSNUkvzIu15HFVZO229ai4MOc81UXNiG8a98rr6q1o7i', '2022-01-16 08:50:19', '2022-01-16 08:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `admin_groups`
--

CREATE TABLE `admin_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_groups`
--

INSERT INTO `admin_groups` (`id`, `admin_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Full Permission - Admin', '2022-01-16 08:50:19', '2022-02-21 17:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `admin_group_roles`
--

CREATE TABLE `admin_group_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_groups_id` bigint(20) UNSIGNED DEFAULT NULL,
  `show` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `add` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `edit` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `delete` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_group_roles`
--

INSERT INTO `admin_group_roles` (`id`, `name`, `admin_groups_id`, `show`, `add`, `edit`, `delete`, `created_at`, `updated_at`) VALUES
(112, 'group', 1, 'no', 'no', 'no', 'no', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(113, 'settings', 1, 'yes', 'no', 'yes', 'no', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(114, 'orderofferinvoices', 1, 'yes', 'no', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(115, 'orderoffers', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(116, 'userjobs', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(117, 'ordertypes', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(118, 'orders', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(119, 'contactus', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(120, 'packagerequests', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(121, 'vendorpackages', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(122, 'users', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(123, 'tickets', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(124, 'ticketdepartments', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(125, 'departments', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(126, 'faqs', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(127, 'subscriptionfees', 1, 'yes', 'no', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(128, 'usercommercials', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(129, 'userqualifications', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(130, 'userexperiences', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(131, 'userlicenses', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(132, 'occupations', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(133, 'specialties', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(134, 'pages', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(135, 'socials', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(136, 'cities', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(137, 'countries', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(138, 'admins', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(139, 'admingroups', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(140, 'admin', 1, 'no', 'no', 'no', 'no', '2022-02-21 17:53:50', '2022-02-21 17:53:50'),
(141, 'orderarbitrators', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-28 10:37:41', '2022-02-28 10:37:41'),
(142, 'orderofferinvoices', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-28 10:37:41', '2022-02-28 10:37:41'),
(143, 'subscriptionfees', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-28 10:37:42', '2022-02-28 10:37:42'),
(144, 'orderarbitratorinvoices', 1, 'yes', 'yes', 'yes', 'yes', '2022-02-28 13:10:46', '2022-02-28 13:10:46'),
(145, 'systemmessages', 1, 'yes', 'yes', 'yes', 'yes', '2022-03-01 21:02:05', '2022-03-01 21:02:05'),
(146, 'balancerecharges', 1, 'yes', 'yes', 'yes', 'yes', '2022-03-02 10:59:17', '2022-03-02 10:59:17'),
(147, 'balancewithdrawals', 1, 'yes', 'yes', 'yes', 'yes', '2022-03-02 22:03:02', '2022-03-02 22:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `balance_recharges`
--

CREATE TABLE `balance_recharges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `charge_by` enum('mada','sadad','bank_transfer','system') COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` longtext COLLATE utf8mb4_unicode_ci,
  `charge_status` enum('pending','done','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `reason` longtext COLLATE utf8mb4_unicode_ci,
  `system_notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balance_withdrawals`
--

CREATE TABLE `balance_withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `receipt_via` enum('bank_transfer','bank_account','system') COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_notes` longtext COLLATE utf8mb4_unicode_ci,
  `withdrawal_status` enum('pending','approved','refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `reason` longtext COLLATE utf8mb4_unicode_ci,
  `system_notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balance_withdrawals`
--

INSERT INTO `balance_withdrawals` (`id`, `admin_id`, `user_id`, `amount`, `receipt_via`, `transfer_picture`, `user_notes`, `withdrawal_status`, `reason`, `system_notes`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 400.00, 'system', '', 'test test test', 'approved', NULL, 'تم خصم المبلغ بسبب عدم اكمال العرض رقم 25 فى الطلب 50', '2022-03-02 22:47:07', '2022-03-02 23:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `city_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `admin_id`, `city_name_ar`, `city_name_en`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'الرياض', 'Riyadh', 1, '2022-01-16 12:06:27', '2022-01-16 12:06:27'),
(2, 1, 'مكه', 'Mecca', 1, '2022-01-16 12:06:39', '2022-01-16 12:06:39'),
(3, 1, 'المدينة المنورة', 'Medina', 1, '2022-01-16 12:06:49', '2022-01-16 12:06:49'),
(4, 1, 'جده', 'Jeddah', 1, '2022-01-16 12:07:08', '2022-01-16 12:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `title_msg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `replay_by` bigint(20) UNSIGNED DEFAULT NULL,
  `replay_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `admin_id`, `full_name`, `email`, `mobile`, `title_msg`, `message`, `seen`, `replay_by`, `replay_content`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test test', 'test@test.com', 12343546, 'test test', 'test test test', 'yes', 1, '<h2 style=\"text-align:right\">ما هو &quot;لوريم إيبسوم&quot; ؟</h2>\r\n\r\n<p dir=\"rtl\">لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', '2022-01-02 12:18:27', '2022-02-06 10:11:05'),
(2, NULL, 'test test', 'test@test.com', 12343546, 'test test', 'test test test', 'yes', NULL, NULL, '2022-01-02 12:18:49', '2022-01-02 12:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `country_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_iso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_currency_exchange` decimal(8,2) DEFAULT NULL,
  `country_status` enum('show','hide') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `admin_id`, `country_name_ar`, `country_name_en`, `country_key`, `country_iso`, `country_flag`, `country_currency`, `country_symbol`, `country_currency_exchange`, `country_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'المملكة العربية السعودية', 'Kingdom Saudi Arabia', '966', 'ks', '', 'ريال سعودي', 'SAR', 4.55, 'show', '2022-01-16 12:03:11', '2022-01-27 04:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `department_desc_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_desc_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_post` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `department_status` enum('show','hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hide',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name_ar`, `department_name_en`, `parent`, `department_desc_ar`, `department_desc_en`, `enable_post`, `department_status`, `created_at`, `updated_at`) VALUES
(1, 'طلبات عامة', 'public order', NULL, 'وصف القسم باللغة العربية', 'وصف القسم باللغة الانجليزية', 'no', 'show', '2022-01-30 09:16:13', '2022-01-30 09:17:03'),
(2, 'طلبات المحاماه', 'Lawyers\' requests', NULL, 'طلبات المحاماه', 'Lawyers\' requests', 'yes', 'show', '2022-01-30 10:10:49', '2022-01-30 10:10:49'),
(3, 'طلبات المحاسبة', 'Accounting requests', NULL, 'طلبات المحاسبة', 'Accounting requests', 'no', 'show', '2022-01-30 10:11:15', '2022-01-30 10:11:15'),
(4, 'طلبات المحاسبة القانونية', 'Legal Accounting Requests', 3, 'طلبات المحاسبة القانونية', 'Legal Accounting Requests', 'yes', 'show', '2022-01-30 10:11:58', '2022-03-01 21:16:40'),
(5, 'طلبات المحاسبة المالية', 'Financial Accounting Requests', 3, 'طلبات المحاسبة المالية', 'Financial Accounting Requests', 'yes', 'show', '2022-01-30 10:12:31', '2022-03-01 21:17:03'),
(6, 'الجنايات', 'felonies', 2, 'الجنايات', 'felonies', 'yes', 'show', '2022-01-30 10:12:51', '2022-01-30 10:12:51'),
(7, 'الاحوال الشخصية', 'Personal status', 2, 'الاحوال الشخصية', 'Personal status issues', 'yes', 'show', '2022-01-30 10:13:21', '2022-01-30 10:13:21'),
(8, 'التدريب', 'training', NULL, 'التدريب', 'training', 'yes', 'show', '2022-01-30 10:14:00', '2022-01-30 10:14:00'),
(9, 'تدريب عام', 'general training', 8, 'تدريب عام', 'general training', 'yes', 'show', '2022-01-30 10:14:57', '2022-01-30 10:14:57'),
(10, 'تدريب خاص', 'special training', 8, 'تدريب خاص', 'special training', 'yes', 'show', '2022-01-30 10:15:14', '2022-01-30 10:15:14'),
(11, 'الاحكام', 'judgments', 7, 'الاحكام', 'judgments', 'yes', 'show', '2022-01-30 10:15:44', '2022-01-30 10:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `department_specialties`
--

CREATE TABLE `department_specialties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `occupation_id` bigint(20) UNSIGNED NOT NULL,
  `specialtie_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_specialties`
--

INSERT INTO `department_specialties` (`id`, `occupation_id`, `specialtie_id`, `department_id`, `created_at`, `updated_at`) VALUES
(21, 1, 1, 4, '2022-03-01 21:16:40', '2022-03-01 21:16:40'),
(22, 1, 2, 4, '2022-03-01 21:16:40', '2022-03-01 21:16:40'),
(23, 2, 4, 4, '2022-03-01 21:16:40', '2022-03-01 21:16:40'),
(24, 2, 5, 4, '2022-03-01 21:16:40', '2022-03-01 21:16:40'),
(25, 5, 3, 4, '2022-03-01 21:16:40', '2022-03-01 21:16:40'),
(26, 8, 6, 4, '2022-03-01 21:16:40', '2022-03-01 21:16:40'),
(27, 8, 7, 4, '2022-03-01 21:16:40', '2022-03-01 21:16:40'),
(28, 1, 1, 5, '2022-03-01 21:17:03', '2022-03-01 21:17:03'),
(29, 1, 2, 5, '2022-03-01 21:17:03', '2022-03-01 21:17:03'),
(30, 2, 4, 5, '2022-03-01 21:17:03', '2022-03-01 21:17:03'),
(31, 2, 5, 5, '2022-03-01 21:17:03', '2022-03-01 21:17:03'),
(32, 5, 3, 5, '2022-03-01 21:17:03', '2022-03-01 21:17:03'),
(33, 8, 6, 5, '2022-03-01 21:17:03', '2022-03-01 21:17:03'),
(34, 8, 7, 5, '2022-03-01 21:17:03', '2022-03-01 21:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_bytes` bigint(20) NOT NULL,
  `mimtype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `admin_id`, `user_id`, `file`, `full_path`, `type_file`, `type_id`, `path`, `ext`, `name`, `size`, `size_bytes`, `mimtype`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'yYe2Az3WVw1LFq6XXwIQdOct2tds4PkAcRHmn9It.png', 'tickets/1/yYe2Az3WVw1LFq6XXwIQdOct2tds4PkAcRHmn9It.png', 'tickets', '1', 'tickets/1', 'png', 'png1-1.png', '25.86 KB', 26485, 'image/png', NULL, '2022-01-30 11:36:37', '2022-01-30 11:37:48'),
(2, NULL, NULL, 'PYxYTRUQXKMD9zkms20uBxOP5teHm20WFfYuHFwB.png', 'tickets/1/PYxYTRUQXKMD9zkms20uBxOP5teHm20WFfYuHFwB.png', 'tickets', '1', 'tickets/1', 'png', 'download.png', '48.64 KB', 49810, 'image/png', NULL, '2022-01-30 11:36:52', '2022-01-30 11:37:48'),
(3, NULL, NULL, 'h7JBpUnefjwoGTsCoEnp51pZzmm0xUJ9nrj8qgwh.png', 'tickets/1/h7JBpUnefjwoGTsCoEnp51pZzmm0xUJ9nrj8qgwh.png', 'tickets', '1', 'tickets/1', 'png', 'download.png', '48.64 KB', 49810, 'image/png', NULL, '2022-01-30 12:08:03', '2022-01-30 12:08:48'),
(20, NULL, NULL, '4MTwOukM5JPP74LEur92w27rwsmOWfYzk2DxmYCU.png', 'ticket_replays/12/4MTwOukM5JPP74LEur92w27rwsmOWfYzk2DxmYCU.png', 'ticket_replays', '12', 'ticket_replays/12', 'png', 'download.png', '48.64 KB', 49810, 'image/png', NULL, '2022-01-30 13:40:58', '2022-01-31 10:30:04'),
(26, NULL, NULL, 'o3bBg0DEaDT85NxrRToMxUIaCuyZUVtTa5lzgZfK.png', 'ticket_replays/12/o3bBg0DEaDT85NxrRToMxUIaCuyZUVtTa5lzgZfK.png', 'ticket_replays', '12', 'ticket_replays/12', 'png', 'tckAuROSaA36V08YGYxrFhlcFX32vkIT23bFFL7T.png', '9.29 KB', 9514, 'image/png', NULL, '2022-01-31 10:29:49', '2022-01-31 10:30:04'),
(27, NULL, NULL, 'l1u86qXzkNsWCUhcRo62HK9VYJMhKFaZfgD5926U.bin', 'ticket_replays/12/l1u86qXzkNsWCUhcRo62HK9VYJMhKFaZfgD5926U.bin', 'ticket_replays', '12', 'ticket_replays/12', 'xlsx', 'adjustments apex new pending point.xlsx', '19.48 KB', 19946, 'application/octet-stream', NULL, '2022-01-31 10:29:49', '2022-01-31 10:30:04'),
(28, NULL, NULL, 'wOnPPloW5jXwnJLqVaPD6WrJcmmkuoxMoLEPGc0K.txt', 'ticket_replays/12/wOnPPloW5jXwnJLqVaPD6WrJcmmkuoxMoLEPGc0K.txt', 'ticket_replays', '12', 'ticket_replays/12', 'json', 'mohrkV2.json', '131.59 KB', 134749, 'text/plain', NULL, '2022-01-31 10:29:49', '2022-01-31 10:30:04'),
(29, NULL, NULL, 'uCPMXcVo4YQ5rBvcGG3HMWmdSW0WvbJojdyekJPV.mp4', 'ticket_replays/12/uCPMXcVo4YQ5rBvcGG3HMWmdSW0WvbJojdyekJPV.mp4', 'ticket_replays', '12', 'ticket_replays/12', 'mp4', 'اجتماع محسن وصالح فى مشروع موثوق.mp4', '32.51 MB', 34085341, 'video/mp4', NULL, '2022-01-31 10:29:49', '2022-01-31 10:30:04'),
(32, NULL, NULL, 'GYoE30mlJlQIIYiEB2ktAxA2YA7FJfGVkQsc3UuS.png', 'orders/1/GYoE30mlJlQIIYiEB2ktAxA2YA7FJfGVkQsc3UuS.png', 'orders', '1', 'orders/1', 'png', 'download٠.png', '160.48 KB', 164328, 'image/png', NULL, '2022-02-20 14:16:46', '2022-02-20 14:16:50'),
(33, NULL, NULL, 'yACIuJTvpVZtfXgdq3PUwDmC7XGVvxQUG3svPKYA.png', 'orders/1/yACIuJTvpVZtfXgdq3PUwDmC7XGVvxQUG3svPKYA.png', 'orders', '1', 'orders/1', 'png', 'download.png', '48.64 KB', 49810, 'image/png', NULL, '2022-02-20 14:16:46', '2022-02-20 14:16:50'),
(34, NULL, NULL, 'VKAGiS0TXrqzy1cfzaPQF3jMkiMIlVUv0vYdBxft.jpg', 'orders/2/VKAGiS0TXrqzy1cfzaPQF3jMkiMIlVUv0vYdBxft.jpg', 'orders', '2', 'orders/2', 'jpeg', 'room2.jpeg', '19.44 KB', 19903, 'image/jpeg', NULL, '2022-02-20 14:18:03', '2022-02-20 14:18:05'),
(35, NULL, NULL, '7W8yf7H7Nz4v00JRNmeLFVMwTDC20jUwwzndZmIy.jpg', 'orders/2/7W8yf7H7Nz4v00JRNmeLFVMwTDC20jUwwzndZmIy.jpg', 'orders', '2', 'orders/2', 'jpeg', 'room 1.jpeg', '8.30 KB', 8496, 'image/jpeg', NULL, '2022-02-20 14:18:03', '2022-02-20 14:18:05'),
(36, NULL, NULL, 'zx1sw7WNvD92FxJ4xLofWoy0LUifRFiTSlNBmQIR.jpg', 'orderoffers/2/zx1sw7WNvD92FxJ4xLofWoy0LUifRFiTSlNBmQIR.jpg', 'orderoffers', '2', 'orderoffers/2', 'jpeg', 'room 1.jpeg', '8.30 KB', 8496, 'image/jpeg', NULL, '2022-02-21 16:38:48', '2022-02-21 16:39:11'),
(37, NULL, NULL, 'cpdIyvSk7Cv0tSzxhowzA01xFOoNJ0iPjuDkDNgg.png', 'orderoffers/2/cpdIyvSk7Cv0tSzxhowzA01xFOoNJ0iPjuDkDNgg.png', 'orderoffers', '2', 'orderoffers/2', 'png', 'download٠.png', '160.48 KB', 164328, 'image/png', NULL, '2022-02-21 16:38:48', '2022-02-21 16:39:11'),
(38, NULL, NULL, 'j3XkBv6AXHFV5wkhYOyppr4UBwe95y0PYkmhiBgC.jpg', 'orderoffers/2/j3XkBv6AXHFV5wkhYOyppr4UBwe95y0PYkmhiBgC.jpg', 'orderoffers', '2', 'orderoffers/2', 'jpeg', 'room2.jpeg', '19.44 KB', 19903, 'image/jpeg', NULL, '2022-02-21 16:38:48', '2022-02-21 16:39:11'),
(39, NULL, NULL, '1OYWORZK8ztGc5eyrODne85KytZaxOq3aR5dF6ie.png', 'orderoffers/2/1OYWORZK8ztGc5eyrODne85KytZaxOq3aR5dF6ie.png', 'orderoffers', '2', 'orderoffers/2', 'png', 'download.png', '48.64 KB', 49810, 'image/png', NULL, '2022-02-21 16:38:48', '2022-02-21 16:39:11'),
(41, NULL, NULL, 'QhHWQ4d6hj0q52nZpVhA56JYauGL3uPPbKfYXgfr.pdf', 'orders/2/QhHWQ4d6hj0q52nZpVhA56JYauGL3uPPbKfYXgfr.pdf', 'orders', '2', 'orders/2', 'pdf', 'big pdf file.pdf', '3.77 MB', 3951796, 'application/pdf', NULL, '2022-02-24 09:27:52', '2022-02-24 09:30:12'),
(45, NULL, NULL, 'h0ahoxufr3JnIYDMoS64XkpdJtPB3DQwJZC5QOqV.bin', 'orders/2/h0ahoxufr3JnIYDMoS64XkpdJtPB3DQwJZC5QOqV.bin', 'orders', '2', 'orders/2', 'xlsx', 'adjustments apex new pending point.xlsx', '19.48 KB', 19946, 'application/octet-stream', NULL, '2022-02-24 09:29:36', '2022-02-24 09:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_qs`
--

CREATE TABLE `f_a_qs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `question_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_to` enum('all','users','visitors','customer','vendor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_status` enum('show','hide') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_qs`
--

INSERT INTO `f_a_qs` (`id`, `admin_id`, `question_ar`, `answer_ar`, `question_en`, `answer_en`, `show_to`, `question_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'السؤال باللغة العربية', '<p>الإجابة باللغة العربية</p>', 'السؤال باللغة الانجليزية', '<p style=\"text-align:right\">الاجابة باللغة الانجليزية</p>', 'all', 'show', '2022-01-27 05:16:21', '2022-01-27 05:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_17_094109_create_admins_table', 1),
(6, '2021_02_18_102130_create_files_table', 1),
(7, '2021_02_19_985759_create_settings_table', 1),
(8, '2021_03_22_134182_create_admin_groups_table', 1),
(9, '2021_03_22_193126_create_admin_group_roles_table', 1),
(15, '2022_01_16_1642333179_create_specialties_table', 3),
(16, '2022_01_16_1642332034_create_occupations_table', 4),
(17, '2022_01_16_1642341748_create_countries_table', 5),
(18, '2022_01_16_1642341962_create_cities_table', 6),
(20, '2022_01_16_1642342186_create_socials_table', 7),
(21, '2022_01_16_1642343246_create_pages_table', 8),
(30, '2022_01_17_1642429165_create_subscription_fees_table', 14),
(32, '2022_01_27_1643267569_create_f_a_qs_table', 15),
(34, '2022_01_30_12440000_Departments', 16),
(37, '2022_01_30_1643545683_create_ticket_departments_table', 17),
(40, '2022_01_30_1643549402_create_tickets_table', 18),
(42, '2022_01_30_185347_create_ticket_replays_table', 19),
(44, '2022_02_03_1643874361_create_vendor_packages_table', 20),
(45, '2022_02_03_1643875494_create_package_requests_table', 21),
(48, '2022_02_06_1641139915_create_contacts_table', 22),
(53, '2022_02_13_1644753477_create_order_types_table', 24),
(56, '2022_02_13_1644758393_create_user_jobs_table', 25),
(57, '2022_01_17_1642419592_create_user_licenses_table', 26),
(58, '2022_01_17_1642420038_create_user_experiences_table', 26),
(59, '2022_01_17_1642422902_create_user_qualifications_table', 26),
(60, '2022_01_17_1642423179_create_user_commercials_table', 26),
(61, '2022_02_16_110711_create_department_specialties_table', 27),
(65, '2022_02_20_093610_create_order_case_againsts_table', 28),
(67, '2022_02_20_115620_create_order_vendors_table', 28),
(72, '2022_02_21_1645451202_create_order_offers_table', 30),
(74, '2022_02_21_1645473028_create_order_offer_invoices_table', 31),
(81, '2022_02_06_1644152532_create_orders_table', 32),
(82, '2022_02_20_114928_create_order_arbitrators_table', 32),
(83, '2022_02_28_1646051859_create_order_arbitrators_table', 33),
(86, '2022_02_28_1646061044_create_order_arbitrator_invoices_table', 34),
(87, '2022_03_01_1646175725_create_system_messages_table', 35),
(91, '2022_03_02_1646225956_create_balance_recharges_table', 36),
(93, '2022_03_03_1646265781_create_balance_withdrawals_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `occupation_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licenses` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiences` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualifications` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_records` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `admin_id`, `occupation_name_ar`, `occupation_name_en`, `licenses`, `experiences`, `qualifications`, `commercial_records`, `created_at`, `updated_at`) VALUES
(1, 1, 'محاسب', 'Accountant', 'enable', 'enable', 'enable', 'enable', '2022-01-16 10:27:43', '2022-02-14 10:52:40'),
(2, 1, 'مُقيم', 'resident', 'enable', 'disable', 'disable', 'disable', '2022-01-16 10:28:23', '2022-01-16 10:28:23'),
(3, 1, 'تدريب', 'to train', 'enable', 'disable', 'disable', 'disable', '2022-01-16 10:29:00', '2022-01-16 10:29:00'),
(4, 1, 'موظف', 'Employee', 'disable', 'enable', 'enable', 'disable', '2022-01-16 10:29:36', '2022-01-16 10:29:36'),
(5, 1, 'مهندس', 'Engineer', 'enable', 'disable', 'disable', 'disable', '2022-01-16 10:29:57', '2022-01-16 10:29:57'),
(6, 1, 'مترجم', 'Translator', 'enable', 'disable', 'disable', 'disable', '2022-01-16 10:30:24', '2022-01-16 10:30:24'),
(7, 1, 'موثق', 'notary', 'enable', 'disable', 'disable', 'disable', '2022-01-16 10:30:58', '2022-01-16 10:30:58'),
(8, 1, 'تحكيم', 'arbitration', 'enable', 'enable', 'disable', 'disable', '2022-01-16 10:31:53', '2022-01-16 10:31:53'),
(9, 1, 'محامي', 'lawyer', 'enable', 'disable', 'disable', 'disable', '2022-01-16 10:32:55', '2022-01-16 10:32:55'),
(10, 1, 'مستشار', 'Consultant', 'enable', 'disable', 'enable', 'disable', '2022-01-16 10:33:23', '2022-01-16 10:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `main_order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `show_order_data` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `linked_order` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `order_type_id` bigint(20) UNSIGNED NOT NULL,
  `order_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `choose_service_provider` enum('all','by_city','by_filter','by_occupation') COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `execution_time` bigint(20) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `refunded` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` enum('under_review','open','closed','close_and_refund','refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_review',
  `receive_offers` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `assigning_arbitration` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decisions_status` enum('pending','accept','refused') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negotiable` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `decisions_refused_reason` longtext COLLATE utf8mb4_unicode_ci,
  `reason` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `admin_id`, `user_id`, `main_order_id`, `show_order_data`, `linked_order`, `order_type_id`, `order_title`, `order_content`, `department_id`, `choose_service_provider`, `country_id`, `city_id`, `execution_time`, `amount`, `refunded`, `order_status`, `receive_offers`, `assigning_arbitration`, `decisions_status`, `negotiable`, `decisions_refused_reason`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'no', 'no', 1, 'test', '<p>test</p>', 5, 'by_city', 1, 1, 34, 4343.00, 'yes', 'open', 'yes', 'yes', NULL, 'yes', NULL, NULL, '2022-02-20 12:16:49', '2022-02-27 13:38:33'),
(2, 1, 1, 1, 'yes', 'yes', 1, 'test2222222', '<p>eadssdf</p>', 5, 'by_city', 1, 1, 55, 234233.00, 'no', 'refused', 'yes', 'yes', NULL, 'no', NULL, 'تم رفض الطلب لانه لا يوجد رصيد كاف لديك', '2022-02-27 12:19:40', '2022-03-01 21:18:15'),
(3, 1, 4, NULL, 'yes', 'no', 1, 'test', '<p>asdasd</p>', 4, 'all', NULL, NULL, 32, 0.00, NULL, 'under_review', 'yes', NULL, NULL, 'no', NULL, NULL, '2022-03-01 20:43:05', '2022-03-01 20:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_arbitrators`
--

CREATE TABLE `order_arbitrators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `arbitrator_id` bigint(20) UNSIGNED NOT NULL,
  `notify_arbitrator` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `arbitrator_amount` decimal(20,2) DEFAULT NULL,
  `arbitrator_add_amount` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `user_accept_amount` enum('pending','accept','reject') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_accept_amount` enum('pending','accept','reject') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arbitrator_decision` longtext COLLATE utf8mb4_unicode_ci,
  `user_accept_decision` enum('pending','accept','reject') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_accept_decision` enum('pending','accept','reject') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_arbitrators`
--

INSERT INTO `order_arbitrators` (`id`, `order_id`, `arbitrator_id`, `notify_arbitrator`, `arbitrator_amount`, `arbitrator_add_amount`, `user_accept_amount`, `vendor_accept_amount`, `arbitrator_decision`, `user_accept_decision`, `vendor_accept_decision`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'yes', 5444.00, 'yes', 'accept', 'accept', 'test', 'accept', 'accept', '2022-02-28 10:53:04', '2022-02-28 10:53:04'),
(2, 2, 5, 'no', NULL, 'no', NULL, NULL, NULL, NULL, NULL, '2022-03-01 21:18:15', '2022-03-01 21:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_arbitrator_invoices`
--

CREATE TABLE `order_arbitrator_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `arbitrator_id` bigint(20) UNSIGNED NOT NULL,
  `order_arbitrator_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount_deduction_from_vendor` enum('awaiting','recovered','discounted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_deduction_from_user` enum('awaiting','recovered','discounted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_amount` decimal(20,2) DEFAULT NULL,
  `user_amount` decimal(20,2) DEFAULT NULL,
  `total_amount` decimal(20,2) DEFAULT NULL,
  `system_tax` decimal(20,2) DEFAULT NULL,
  `remaining_amount_to_arbitrator` decimal(20,2) DEFAULT NULL,
  `inovice_status` enum('open','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_arbitrator_invoices`
--

INSERT INTO `order_arbitrator_invoices` (`id`, `order_id`, `arbitrator_id`, `order_arbitrator_id`, `vendor_id`, `user_id`, `amount_deduction_from_vendor`, `amount_deduction_from_user`, `vendor_amount`, `user_amount`, `total_amount`, `system_tax`, `remaining_amount_to_arbitrator`, `inovice_status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 4, 1, 'awaiting', 'awaiting', 500.00, 500.00, 1000.00, 50.00, 950.00, 'open', '2022-02-28 13:43:35', '2022-03-01 13:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_case_againsts`
--

CREATE TABLE `order_case_againsts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_case_againsts`
--

INSERT INTO `order_case_againsts` (`id`, `order_id`, `name`, `id_number`, `nationality`, `created_at`, `updated_at`) VALUES
(48, 1, 'test1', '233333', 'egypt', '2022-02-27 13:38:33', '2022-02-27 13:38:33'),
(49, 1, 'test2', '444452', 'saudia', '2022-02-27 13:38:33', '2022-02-27 13:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_offers`
--

CREATE TABLE `order_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_comment` longtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) DEFAULT NULL,
  `execution_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_status` enum('pending','approved','refused','cancelled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requester_rate` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requester_feedback` longtext COLLATE utf8mb4_unicode_ci,
  `feedback_requester_status_by_admin` enum('pending','approved','refused') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_offer_objected_status` enum('yes','no','ended') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_offer_objected_endat` date DEFAULT NULL,
  `user_offer_rate` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_offer_comment` longtext COLLATE utf8mb4_unicode_ci,
  `feedback_user_offer_status_by_admin` enum('pending','approved','refused') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requester_objected_status` enum('yes','no','ended') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requester_objected_endat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_offers`
--

INSERT INTO `order_offers` (`id`, `order_id`, `vendor_id`, `vendor_comment`, `price`, `execution_time`, `offer_status`, `requester_rate`, `requester_feedback`, `feedback_requester_status_by_admin`, `user_offer_objected_status`, `user_offer_objected_endat`, `user_offer_rate`, `user_offer_comment`, `feedback_user_offer_status_by_admin`, `requester_objected_status`, `requester_objected_endat`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'test test', 30000.00, '34', 'refused', '1', NULL, NULL, NULL, '2022-02-21', NULL, NULL, NULL, NULL, '2022-02-21', '2022-02-21 16:33:50', '2022-03-01 12:59:42'),
(2, 1, 5, 'test', 5000.00, '43', 'approved', '4', 'test test تعليق صاحب الطلب على العرض بعد التقييم', 'approved', 'yes', '2022-02-21', '4', 'test test 2 تعليق مقدم العرض', 'approved', 'yes', '2022-02-21', '2022-02-21 16:39:11', '2022-03-01 12:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_offer_invoices`
--

CREATE TABLE `order_offer_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `offer_amount` decimal(20,2) DEFAULT NULL,
  `system_tax` decimal(20,2) DEFAULT NULL,
  `remaining_amount_to_vendor` decimal(20,2) DEFAULT NULL,
  `amount_deduction_from_user` enum('awaiting','recovered','discounted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_amount_to_vendor_balance` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_amount_to_vendor_balance_at` datetime DEFAULT NULL,
  `inovice_status` enum('open','closed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_note` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_offer_invoices`
--

INSERT INTO `order_offer_invoices` (`id`, `order_id`, `offer_id`, `offer_amount`, `system_tax`, `remaining_amount_to_vendor`, `amount_deduction_from_user`, `added_amount_to_vendor_balance`, `added_amount_to_vendor_balance_at`, `inovice_status`, `system_note`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5000.00, 100.00, 4900.00, 'awaiting', 'no', '2022-02-22 12:42:33', 'closed', 'dsfdsf', '2022-02-22 12:50:48', '2022-03-01 12:59:43'),
(3, 1, 1, 30000.00, 0.00, 30000.00, 'recovered', 'no', '2022-02-22 12:42:33', 'closed', 'sdfdsf', '2022-02-22 12:50:50', '2022-03-01 12:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE `order_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `type_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_desc_ar` longtext COLLATE utf8mb4_unicode_ci,
  `type_desc_en` longtext COLLATE utf8mb4_unicode_ci,
  `type_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_status` enum('show','hide') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`id`, `admin_id`, `type_name_ar`, `type_name_en`, `type_desc_ar`, `type_desc_en`, `type_icon`, `type_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'طلب توثيق', 'Notarization Request', 'طلب توثيق', 'Notarization Request', '', 'show', '2022-02-13 10:01:24', '2022-02-13 10:01:24'),
(2, 1, 'توثيق عقد قائم', 'Notarization of an existing contract', 'توثيق عقد قائم', 'Notarization of an existing contract', '', 'show', '2022-02-13 10:01:49', '2022-02-13 10:01:49'),
(3, 1, 'اشتراك بالباقات', 'Subscribe to packages', 'اشتراك بالباقات', 'Subscribe to packages', '', 'show', '2022-02-13 10:02:23', '2022-02-13 10:02:23'),
(4, 1, 'طلب استشارة', 'Consultation request', 'طلب استشارة', 'Consultation request', '', 'show', '2022-02-13 10:02:43', '2022-02-13 10:02:43'),
(5, 1, 'تجريبي', 'test', 'test', 'test', '', 'show', '2022-02-16 07:40:06', '2022-02-16 07:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_vendors`
--

CREATE TABLE `order_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notify_user` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_vendors`
--

INSERT INTO `order_vendors` (`id`, `order_id`, `user_id`, `notify_user`, `created_at`, `updated_at`) VALUES
(19, 1, 4, 'no', '2022-02-27 13:38:33', '2022-02-27 13:38:33'),
(25, 2, 4, 'no', '2022-03-01 21:18:15', '2022-03-01 21:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `package_requests`
--

CREATE TABLE `package_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `refused_reason` longtext COLLATE utf8mb4_unicode_ci,
  `request_status` enum('pending','approved','refused','done','recovered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `suspended_balance` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `invoiced` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_requests`
--

INSERT INTO `package_requests` (`id`, `package_id`, `user_id`, `refused_reason`, `request_status`, `suspended_balance`, `notes`, `invoiced`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'pending', 'yes', 'sdasd', 'no', NULL, '2022-02-03 06:32:46', '2022-02-03 06:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `page_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_content_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_content_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `admin_id`, `page_name_ar`, `page_content_ar`, `page_name_en`, `page_content_en`, `created_at`, `updated_at`) VALUES
(1, 1, 'عن الموقع', '<p style=\"text-align:right\">عن الموقع</p>', 'about', '<p>about</p>', '2022-01-16 12:28:14', '2022-01-16 12:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitename_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_vendor_membership_fee` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `system_status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `system_message` longtext COLLATE utf8mb4_unicode_ci,
  `theme_setting` longtext COLLATE utf8mb4_unicode_ci,
  `customer_membership_fee` decimal(8,2) DEFAULT NULL,
  `vendor_membership_fee` decimal(8,2) DEFAULT NULL,
  `customer_membership_fee_status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `vendor_membership_fee_status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `iam_status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `iam_public_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iam_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iam_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_sender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verification_status` enum('open','close') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_new_customer` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `register_new_vendor` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `register_vendor_status` enum('under_review','auto') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_review',
  `register_customer_status` enum('under_review','auto') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_review',
  `expiry_commercial_alarm` int(11) NOT NULL DEFAULT '0',
  `expiry_license_alarm` int(11) NOT NULL DEFAULT '0',
  `commercial_status` enum('under_review','auto') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_review',
  `license_status` enum('under_review','auto') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_review',
  `age_limit_vendor` int(11) NOT NULL DEFAULT '0',
  `age_limit_customer` int(11) NOT NULL DEFAULT '0',
  `mada_vat` decimal(8,2) NOT NULL DEFAULT '0.00',
  `mada_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `paypal_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `paypal_vat` decimal(8,2) NOT NULL DEFAULT '0.00',
  `sadad_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `sadad_vat` decimal(8,2) NOT NULL DEFAULT '0.00',
  `bank_transfer_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `bank_transfer_vat` decimal(8,2) NOT NULL DEFAULT '0.00',
  `add_order` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `offers_order` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `minimum_amount_add_order` decimal(8,2) NOT NULL DEFAULT '0.00',
  `amount_add_order_vat` decimal(8,2) NOT NULL DEFAULT '0.00',
  `arbitration_amount_tax` decimal(8,2) DEFAULT NULL,
  `review_order_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `review_offers_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `rate_orders_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `rate_review_status` enum('auto','under_review') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'under_review',
  `number_days_objection` int(11) NOT NULL DEFAULT '0',
  `contract_form` longtext COLLATE utf8mb4_unicode_ci,
  `maximum_arbitrators` int(11) NOT NULL DEFAULT '0',
  `attachment_orders_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `attachment_offers_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `attachment_orders_exts` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_orders_files_timeout` int(11) DEFAULT NULL,
  `attachment_qualifications_exts` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_experience_exts` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_license_exts` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_commercial_exts` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_ticket_exts` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_comment_ticket_exts` longtext COLLATE utf8mb4_unicode_ci,
  `attachment_ticket_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `attachment_comment_ticket_status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `terms_conditions_registering_customer_ar` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_registering_customer_en` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_registering_vendor_ar` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_registering_vendor_en` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_add_order_ar` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_add_order_en` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_add_offer_ar` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_add_offer_en` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_recharge_ar` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_recharge_en` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_subscription_fee_ar` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_subscription_fee_en` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_withdrawal_ar` longtext COLLATE utf8mb4_unicode_ci,
  `terms_conditions_withdrawal_en` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename_ar`, `sitename_en`, `email`, `logo`, `icon`, `whatsapp`, `mobile`, `status_vendor_membership_fee`, `system_status`, `system_message`, `theme_setting`, `customer_membership_fee`, `vendor_membership_fee`, `customer_membership_fee_status`, `vendor_membership_fee_status`, `iam_status`, `iam_public_key`, `iam_secret`, `iam_ip`, `sms_sender`, `sms_mobile`, `sms_password`, `phone_verification_status`, `register_new_customer`, `register_new_vendor`, `register_vendor_status`, `register_customer_status`, `expiry_commercial_alarm`, `expiry_license_alarm`, `commercial_status`, `license_status`, `age_limit_vendor`, `age_limit_customer`, `mada_vat`, `mada_status`, `paypal_status`, `paypal_vat`, `sadad_status`, `sadad_vat`, `bank_transfer_status`, `bank_transfer_vat`, `add_order`, `offers_order`, `minimum_amount_add_order`, `amount_add_order_vat`, `arbitration_amount_tax`, `review_order_status`, `review_offers_status`, `rate_orders_status`, `rate_review_status`, `number_days_objection`, `contract_form`, `maximum_arbitrators`, `attachment_orders_status`, `attachment_offers_status`, `attachment_orders_exts`, `attachment_orders_files_timeout`, `attachment_qualifications_exts`, `attachment_experience_exts`, `attachment_license_exts`, `attachment_commercial_exts`, `attachment_ticket_exts`, `attachment_comment_ticket_exts`, `attachment_ticket_status`, `attachment_comment_ticket_status`, `terms_conditions_registering_customer_ar`, `terms_conditions_registering_customer_en`, `terms_conditions_registering_vendor_ar`, `terms_conditions_registering_vendor_en`, `terms_conditions_add_order_ar`, `terms_conditions_add_order_en`, `terms_conditions_add_offer_ar`, `terms_conditions_add_offer_en`, `terms_conditions_recharge_ar`, `terms_conditions_recharge_en`, `terms_conditions_subscription_fee_ar`, `terms_conditions_subscription_fee_en`, `terms_conditions_withdrawal_ar`, `terms_conditions_withdrawal_en`, `created_at`, `updated_at`) VALUES
(1, 'موثوق', 'Mawthoq', 'test@test.com', 'setting/OA59qi0aWszjkaKtu86C2W0518u6Uq5KCS4HICpM.png', 'setting/OEeYDq7WqgWr9KTuNKCXmMEEQX0Ey7tq20ZlYqDW.png', NULL, NULL, 'open', 'open', NULL, '{\"brand_color\":\"navbar-dark\",\"sidebar_class\":\"sidebar-dark-navy\",\"main_header\":\"\",\"navbar\":\"navbar-dark navbar-dark\"}', 12.00, 20.00, 'open', 'open', 'open', 'public key', 'secret key', 'https://mawthoq.dev', 'mawthoq', '213123123', '12wfsdfsdf', 'open', 'open', 'open', 'under_review', 'under_review', 10, 10, 'auto', 'auto', 20, 20, 3.00, 'disable', 'disable', 5.00, 'disable', 4.00, 'disable', 8.00, 'enable', 'enable', 300.00, 2.00, 5.00, 'enable', 'enable', 'enable', 'under_review', 3, '<p style=\"text-align:center\">صيغة عقد تجريبية&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">إنه فى يوم&nbsp;<strong>{order_day} الموافق {order_current_date}&nbsp;</strong>الساعة {order_hour}</p>\r\n\r\n<p style=\"text-align:right\">اتفق الطرفان :&nbsp;&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong>&nbsp; {user_order_name} الطرف الاول</strong><br />\r\nالبريد الالكترونى :&nbsp;<strong>{user_order_email}</strong></p>\r\n\r\n<p style=\"text-align:right\">بطاقة رقم :&nbsp;<strong>{user_order_id}</strong></p>\r\n\r\n<p style=\"text-align:right\">جوال:&nbsp;<strong>{user_order_mobile}</strong></p>\r\n\r\n<p style=\"text-align:right\"><strong>الطرف الثانى : {user_offer_name}</strong></p>\r\n\r\n<p style=\"text-align:right\">البريد الالكتروني :&nbsp;<strong>{user_offer_email}</strong></p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>رقم الطلب :&nbsp;<strong>{order_id}</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>المبلغ الاجمالى :&nbsp;<strong>{total_order_price}</strong></li>\r\n	<li>كل المحكمين :&nbsp;<strong>{arbitrators}</strong></li>\r\n	<li>تاريخ الطلب الحالى :&nbsp;<strong>{order_current_date}</strong></li>\r\n	<li>تاريخ قبول العرض :&nbsp;<strong>{offer_date}</strong></li>\r\n	<li>اليوم :&nbsp;<strong>{order_day}</strong></li>\r\n	<li>الوقت :&nbsp;<strong>{order_hour}</strong></li>\r\n</ul>', 3, 'enable', 'enable', '{\n    \"attachment_orders_exts\": {\n        \"exts\": [\n            \"mp3\",\n            \"wav\",\n            \"ogg\",\n            \"rar\",\n            \"zip\",\n            \"zip7\",\n            \"mp4\",\n            \"wmv\",\n            \"avi\",\n            \"3gp\",\n            \"jpg\",\n            \"jpeg\",\n            \"png\",\n            \"gif\",\n            \"bmp\",\n            \"pdf\",\n            \"docx\",\n            \"doc\",\n            \"xlxs\",\n            \"csv\",\n            \"ppt\"\n        ],\n        \"size\": [\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\"\n        ],\n        \"size_type\": [\n            \"mb\",\n            \"mb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\"\n        ]\n    }\n}', 2, '{\n    \"attachment_qualifications_exts\": {\n        \"exts\": [\n            \"mp3\",\n            \"wav\",\n            \"ogg\",\n            \"rar\",\n            \"zip\",\n            \"zip7\",\n            \"mp4\",\n            \"wmv\",\n            \"avi\",\n            \"3gp\",\n            \"jpg\",\n            \"jpeg\",\n            \"png\",\n            \"gif\",\n            \"bmp\",\n            \"pdf\",\n            \"docx\",\n            \"doc\",\n            \"xlxs\",\n            \"csv\",\n            \"ppt\"\n        ],\n        \"size\": [\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\"\n        ],\n        \"size_type\": [\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\"\n        ]\n    }\n}', '{\n    \"attachment_experience_exts\": {\n        \"exts\": [\n            \"mp3\",\n            \"ogg\",\n            \"zip\",\n            \"ppt\"\n        ],\n        \"size\": [\n            \"0\",\n            \"0\",\n            \"0\",\n            \"0\"\n        ],\n        \"size_type\": [\n            \"kb\",\n            \"kb\",\n            \"kb\",\n            \"kb\"\n        ]\n    }\n}', '{\n    \"attachment_license_exts\": {\n        \"exts\": [\n            \"mp3\",\n            \"wav\"\n        ],\n        \"size\": [\n            \"0\",\n            \"0\"\n        ],\n        \"size_type\": [\n            \"kb\",\n            \"kb\"\n        ]\n    }\n}', '{\n    \"attachment_commercial_exts\": {\n        \"exts\": [\n            \"zip\"\n        ],\n        \"size\": [\n            \"0\"\n        ],\n        \"size_type\": [\n            \"kb\"\n        ]\n    }\n}', '{\n    \"attachment_ticket_exts\": {\n        \"exts\": [\n            \"ogg\",\n            \"zip\"\n        ],\n        \"size\": [\n            \"0\",\n            \"0\"\n        ],\n        \"size_type\": [\n            \"kb\",\n            \"kb\"\n        ]\n    }\n}', '{\n    \"attachment_comment_ticket_exts\": {\n        \"exts\": [\n            \"ogg\",\n            \"rar\"\n        ],\n        \"size\": [\n            \"0\",\n            \"0\"\n        ],\n        \"size_type\": [\n            \"kb\",\n            \"kb\"\n        ]\n    }\n}', 'enable', 'enable', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام التسجيل كعميل باللغة العربية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_1210\" onclick=\"CKEDITOR.tools.callFunction(2476,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_1211\" onclick=\"CKEDITOR.tools.callFunction(2479,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_1212\" onclick=\"CKEDITOR.tools.callFunction(2482,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_1213\" onclick=\"CKEDITOR.tools.callFunction(2485,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_1214\" onclick=\"CKEDITOR.tools.callFunction(2488,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_1215\" onclick=\"CKEDITOR.tools.callFunction(2491,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_1217\" onclick=\"CKEDITOR.tools.callFunction(2494,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_1218\" onclick=\"CKEDITOR.tools.callFunction(2497,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_1219\" onclick=\"CKEDITOR.tools.callFunction(2500,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_1220\" onclick=\"CKEDITOR.tools.callFunction(2503,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_1221\" onclick=\"CKEDITOR.tools.callFunction(2506,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_1222\" onclick=\"CKEDITOR.tools.callFunction(2509,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_1223\" onclick=\"CKEDITOR.tools.callFunction(2512,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_1225\" onclick=\"CKEDITOR.tools.callFunction(2515,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_1226\" onclick=\"CKEDITOR.tools.callFunction(2518,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_1227\" onclick=\"CKEDITOR.tools.callFunction(2521,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_1228\" onclick=\"CKEDITOR.tools.callFunction(2524,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_1230\" onclick=\"CKEDITOR.tools.callFunction(2527,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_1231\" onclick=\"CKEDITOR.tools.callFunction(2530,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_1232\" onclick=\"CKEDITOR.tools.callFunction(2533,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_1233\" onclick=\"CKEDITOR.tools.callFunction(2536,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_1234\" onclick=\"CKEDITOR.tools.callFunction(2539,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_1235\" onclick=\"CKEDITOR.tools.callFunction(2542,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_1236\" onclick=\"CKEDITOR.tools.callFunction(2545,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_1237\" onclick=\"CKEDITOR.tools.callFunction(2548,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_1238\" onclick=\"CKEDITOR.tools.callFunction(2551,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_1240\" onclick=\"CKEDITOR.tools.callFunction(2554,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_1241\" onclick=\"CKEDITOR.tools.callFunction(2557,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_1242\" onclick=\"CKEDITOR.tools.callFunction(2560,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_1243\" onclick=\"CKEDITOR.tools.callFunction(2563,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_1244\" onclick=\"CKEDITOR.tools.callFunction(2566,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_1245\" onclick=\"CKEDITOR.tools.callFunction(2569,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_1246\" onclick=\"CKEDITOR.tools.callFunction(2572,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_1247\" onclick=\"CKEDITOR.tools.callFunction(2575,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_1249\" onclick=\"CKEDITOR.tools.callFunction(2578,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_1250\" onclick=\"CKEDITOR.tools.callFunction(2581,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_1251\" onclick=\"CKEDITOR.tools.callFunction(2584,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_1252\" onclick=\"CKEDITOR.tools.callFunction(2587,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_1253\" onclick=\"CKEDITOR.tools.callFunction(2590,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_1254\" onclick=\"CKEDITOR.tools.callFunction(2593,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_1255\" onclick=\"CKEDITOR.tools.callFunction(2596,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_1256\" onclick=\"CKEDITOR.tools.callFunction(2599,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_1257\" onclick=\"CKEDITOR.tools.callFunction(2602,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_1258\" onclick=\"CKEDITOR.tools.callFunction(2605,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_1259\" onclick=\"CKEDITOR.tools.callFunction(2608,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_1260\" onclick=\"CKEDITOR.tools.callFunction(2611,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_1261\" onclick=\"CKEDITOR.tools.callFunction(2614,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_1263\" onclick=\"CKEDITOR.tools.callFunction(2617,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_1264\" onclick=\"CKEDITOR.tools.callFunction(2620,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_1265\" onclick=\"CKEDITOR.tools.callFunction(2623,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_1267\" onclick=\"CKEDITOR.tools.callFunction(2626,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_1268\" onclick=\"CKEDITOR.tools.callFunction(2629,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_1269\" onclick=\"CKEDITOR.tools.callFunction(2632,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_1270\" onclick=\"CKEDITOR.tools.callFunction(2635,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_1271\" onclick=\"CKEDITOR.tools.callFunction(2638,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_1272\" onclick=\"CKEDITOR.tools.callFunction(2641,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_1273\" onclick=\"CKEDITOR.tools.callFunction(2644,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_1274\" onclick=\"CKEDITOR.tools.callFunction(2647,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(2648,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(2651,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(2654,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(2657,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_1277\" onclick=\"CKEDITOR.tools.callFunction(2662,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_1278\" onclick=\"CKEDITOR.tools.callFunction(2665,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_1280\" onclick=\"CKEDITOR.tools.callFunction(2668,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_1281\" onclick=\"CKEDITOR.tools.callFunction(2671,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_1283\" onclick=\"CKEDITOR.tools.callFunction(2674,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام التسجيل كعميل باللغة الانجليزية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_1305\" onclick=\"CKEDITOR.tools.callFunction(2682,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_1306\" onclick=\"CKEDITOR.tools.callFunction(2685,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_1307\" onclick=\"CKEDITOR.tools.callFunction(2688,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_1308\" onclick=\"CKEDITOR.tools.callFunction(2691,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_1309\" onclick=\"CKEDITOR.tools.callFunction(2694,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_1310\" onclick=\"CKEDITOR.tools.callFunction(2697,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_1312\" onclick=\"CKEDITOR.tools.callFunction(2700,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_1313\" onclick=\"CKEDITOR.tools.callFunction(2703,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_1314\" onclick=\"CKEDITOR.tools.callFunction(2706,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_1315\" onclick=\"CKEDITOR.tools.callFunction(2709,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_1316\" onclick=\"CKEDITOR.tools.callFunction(2712,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_1317\" onclick=\"CKEDITOR.tools.callFunction(2715,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_1318\" onclick=\"CKEDITOR.tools.callFunction(2718,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_1320\" onclick=\"CKEDITOR.tools.callFunction(2721,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_1321\" onclick=\"CKEDITOR.tools.callFunction(2724,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_1322\" onclick=\"CKEDITOR.tools.callFunction(2727,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_1323\" onclick=\"CKEDITOR.tools.callFunction(2730,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_1325\" onclick=\"CKEDITOR.tools.callFunction(2733,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_1326\" onclick=\"CKEDITOR.tools.callFunction(2736,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_1327\" onclick=\"CKEDITOR.tools.callFunction(2739,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_1328\" onclick=\"CKEDITOR.tools.callFunction(2742,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_1329\" onclick=\"CKEDITOR.tools.callFunction(2745,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_1330\" onclick=\"CKEDITOR.tools.callFunction(2748,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_1331\" onclick=\"CKEDITOR.tools.callFunction(2751,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_1332\" onclick=\"CKEDITOR.tools.callFunction(2754,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_1333\" onclick=\"CKEDITOR.tools.callFunction(2757,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_1335\" onclick=\"CKEDITOR.tools.callFunction(2760,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_1336\" onclick=\"CKEDITOR.tools.callFunction(2763,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_1337\" onclick=\"CKEDITOR.tools.callFunction(2766,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_1338\" onclick=\"CKEDITOR.tools.callFunction(2769,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_1339\" onclick=\"CKEDITOR.tools.callFunction(2772,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_1340\" onclick=\"CKEDITOR.tools.callFunction(2775,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_1341\" onclick=\"CKEDITOR.tools.callFunction(2778,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_1342\" onclick=\"CKEDITOR.tools.callFunction(2781,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_1344\" onclick=\"CKEDITOR.tools.callFunction(2784,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_1345\" onclick=\"CKEDITOR.tools.callFunction(2787,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_1346\" onclick=\"CKEDITOR.tools.callFunction(2790,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_1347\" onclick=\"CKEDITOR.tools.callFunction(2793,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_1348\" onclick=\"CKEDITOR.tools.callFunction(2796,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_1349\" onclick=\"CKEDITOR.tools.callFunction(2799,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_1350\" onclick=\"CKEDITOR.tools.callFunction(2802,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_1351\" onclick=\"CKEDITOR.tools.callFunction(2805,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_1352\" onclick=\"CKEDITOR.tools.callFunction(2808,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_1353\" onclick=\"CKEDITOR.tools.callFunction(2811,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_1354\" onclick=\"CKEDITOR.tools.callFunction(2814,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_1355\" onclick=\"CKEDITOR.tools.callFunction(2817,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_1356\" onclick=\"CKEDITOR.tools.callFunction(2820,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_1358\" onclick=\"CKEDITOR.tools.callFunction(2823,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_1359\" onclick=\"CKEDITOR.tools.callFunction(2826,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_1360\" onclick=\"CKEDITOR.tools.callFunction(2829,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_1362\" onclick=\"CKEDITOR.tools.callFunction(2832,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_1363\" onclick=\"CKEDITOR.tools.callFunction(2835,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_1364\" onclick=\"CKEDITOR.tools.callFunction(2838,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_1365\" onclick=\"CKEDITOR.tools.callFunction(2841,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_1366\" onclick=\"CKEDITOR.tools.callFunction(2844,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_1367\" onclick=\"CKEDITOR.tools.callFunction(2847,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_1368\" onclick=\"CKEDITOR.tools.callFunction(2850,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_1369\" onclick=\"CKEDITOR.tools.callFunction(2853,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(2854,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(2857,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(2860,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(2863,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_1372\" onclick=\"CKEDITOR.tools.callFunction(2868,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_1373\" onclick=\"CKEDITOR.tools.callFunction(2871,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_1375\" onclick=\"CKEDITOR.tools.callFunction(2874,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_1376\" onclick=\"CKEDITOR.tools.callFunction(2877,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_1378\" onclick=\"CKEDITOR.tools.callFunction(2880,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام التسجيل كمقدم خدمة باللغة العربية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_1020\" onclick=\"CKEDITOR.tools.callFunction(2064,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_1021\" onclick=\"CKEDITOR.tools.callFunction(2067,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_1022\" onclick=\"CKEDITOR.tools.callFunction(2070,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_1023\" onclick=\"CKEDITOR.tools.callFunction(2073,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_1024\" onclick=\"CKEDITOR.tools.callFunction(2076,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_1025\" onclick=\"CKEDITOR.tools.callFunction(2079,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_1027\" onclick=\"CKEDITOR.tools.callFunction(2082,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_1028\" onclick=\"CKEDITOR.tools.callFunction(2085,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_1029\" onclick=\"CKEDITOR.tools.callFunction(2088,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_1030\" onclick=\"CKEDITOR.tools.callFunction(2091,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_1031\" onclick=\"CKEDITOR.tools.callFunction(2094,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_1032\" onclick=\"CKEDITOR.tools.callFunction(2097,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_1033\" onclick=\"CKEDITOR.tools.callFunction(2100,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_1035\" onclick=\"CKEDITOR.tools.callFunction(2103,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_1036\" onclick=\"CKEDITOR.tools.callFunction(2106,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_1037\" onclick=\"CKEDITOR.tools.callFunction(2109,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_1038\" onclick=\"CKEDITOR.tools.callFunction(2112,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_1040\" onclick=\"CKEDITOR.tools.callFunction(2115,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_1041\" onclick=\"CKEDITOR.tools.callFunction(2118,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_1042\" onclick=\"CKEDITOR.tools.callFunction(2121,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_1043\" onclick=\"CKEDITOR.tools.callFunction(2124,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_1044\" onclick=\"CKEDITOR.tools.callFunction(2127,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_1045\" onclick=\"CKEDITOR.tools.callFunction(2130,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_1046\" onclick=\"CKEDITOR.tools.callFunction(2133,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_1047\" onclick=\"CKEDITOR.tools.callFunction(2136,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_1048\" onclick=\"CKEDITOR.tools.callFunction(2139,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_1050\" onclick=\"CKEDITOR.tools.callFunction(2142,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_1051\" onclick=\"CKEDITOR.tools.callFunction(2145,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_1052\" onclick=\"CKEDITOR.tools.callFunction(2148,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_1053\" onclick=\"CKEDITOR.tools.callFunction(2151,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_1054\" onclick=\"CKEDITOR.tools.callFunction(2154,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_1055\" onclick=\"CKEDITOR.tools.callFunction(2157,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_1056\" onclick=\"CKEDITOR.tools.callFunction(2160,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_1057\" onclick=\"CKEDITOR.tools.callFunction(2163,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_1059\" onclick=\"CKEDITOR.tools.callFunction(2166,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_1060\" onclick=\"CKEDITOR.tools.callFunction(2169,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_1061\" onclick=\"CKEDITOR.tools.callFunction(2172,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_1062\" onclick=\"CKEDITOR.tools.callFunction(2175,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_1063\" onclick=\"CKEDITOR.tools.callFunction(2178,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_1064\" onclick=\"CKEDITOR.tools.callFunction(2181,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_1065\" onclick=\"CKEDITOR.tools.callFunction(2184,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_1066\" onclick=\"CKEDITOR.tools.callFunction(2187,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_1067\" onclick=\"CKEDITOR.tools.callFunction(2190,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_1068\" onclick=\"CKEDITOR.tools.callFunction(2193,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_1069\" onclick=\"CKEDITOR.tools.callFunction(2196,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_1070\" onclick=\"CKEDITOR.tools.callFunction(2199,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_1071\" onclick=\"CKEDITOR.tools.callFunction(2202,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_1073\" onclick=\"CKEDITOR.tools.callFunction(2205,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_1074\" onclick=\"CKEDITOR.tools.callFunction(2208,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_1075\" onclick=\"CKEDITOR.tools.callFunction(2211,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_1077\" onclick=\"CKEDITOR.tools.callFunction(2214,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_1078\" onclick=\"CKEDITOR.tools.callFunction(2217,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_1079\" onclick=\"CKEDITOR.tools.callFunction(2220,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_1080\" onclick=\"CKEDITOR.tools.callFunction(2223,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_1081\" onclick=\"CKEDITOR.tools.callFunction(2226,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_1082\" onclick=\"CKEDITOR.tools.callFunction(2229,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_1083\" onclick=\"CKEDITOR.tools.callFunction(2232,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_1084\" onclick=\"CKEDITOR.tools.callFunction(2235,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(2236,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(2239,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(2242,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(2245,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_1087\" onclick=\"CKEDITOR.tools.callFunction(2250,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_1088\" onclick=\"CKEDITOR.tools.callFunction(2253,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_1090\" onclick=\"CKEDITOR.tools.callFunction(2256,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_1091\" onclick=\"CKEDITOR.tools.callFunction(2259,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_1093\" onclick=\"CKEDITOR.tools.callFunction(2262,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام التسجيل كمقدم خدمة باللغة الانجليزية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_1115\" onclick=\"CKEDITOR.tools.callFunction(2270,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_1116\" onclick=\"CKEDITOR.tools.callFunction(2273,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_1117\" onclick=\"CKEDITOR.tools.callFunction(2276,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_1118\" onclick=\"CKEDITOR.tools.callFunction(2279,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_1119\" onclick=\"CKEDITOR.tools.callFunction(2282,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_1120\" onclick=\"CKEDITOR.tools.callFunction(2285,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_1122\" onclick=\"CKEDITOR.tools.callFunction(2288,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_1123\" onclick=\"CKEDITOR.tools.callFunction(2291,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_1124\" onclick=\"CKEDITOR.tools.callFunction(2294,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_1125\" onclick=\"CKEDITOR.tools.callFunction(2297,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_1126\" onclick=\"CKEDITOR.tools.callFunction(2300,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_1127\" onclick=\"CKEDITOR.tools.callFunction(2303,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_1128\" onclick=\"CKEDITOR.tools.callFunction(2306,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_1130\" onclick=\"CKEDITOR.tools.callFunction(2309,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_1131\" onclick=\"CKEDITOR.tools.callFunction(2312,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_1132\" onclick=\"CKEDITOR.tools.callFunction(2315,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_1133\" onclick=\"CKEDITOR.tools.callFunction(2318,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_1135\" onclick=\"CKEDITOR.tools.callFunction(2321,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_1136\" onclick=\"CKEDITOR.tools.callFunction(2324,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_1137\" onclick=\"CKEDITOR.tools.callFunction(2327,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_1138\" onclick=\"CKEDITOR.tools.callFunction(2330,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_1139\" onclick=\"CKEDITOR.tools.callFunction(2333,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_1140\" onclick=\"CKEDITOR.tools.callFunction(2336,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_1141\" onclick=\"CKEDITOR.tools.callFunction(2339,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_1142\" onclick=\"CKEDITOR.tools.callFunction(2342,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_1143\" onclick=\"CKEDITOR.tools.callFunction(2345,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_1145\" onclick=\"CKEDITOR.tools.callFunction(2348,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_1146\" onclick=\"CKEDITOR.tools.callFunction(2351,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_1147\" onclick=\"CKEDITOR.tools.callFunction(2354,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_1148\" onclick=\"CKEDITOR.tools.callFunction(2357,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_1149\" onclick=\"CKEDITOR.tools.callFunction(2360,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_1150\" onclick=\"CKEDITOR.tools.callFunction(2363,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_1151\" onclick=\"CKEDITOR.tools.callFunction(2366,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_1152\" onclick=\"CKEDITOR.tools.callFunction(2369,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_1154\" onclick=\"CKEDITOR.tools.callFunction(2372,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_1155\" onclick=\"CKEDITOR.tools.callFunction(2375,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_1156\" onclick=\"CKEDITOR.tools.callFunction(2378,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_1157\" onclick=\"CKEDITOR.tools.callFunction(2381,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_1158\" onclick=\"CKEDITOR.tools.callFunction(2384,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_1159\" onclick=\"CKEDITOR.tools.callFunction(2387,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_1160\" onclick=\"CKEDITOR.tools.callFunction(2390,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_1161\" onclick=\"CKEDITOR.tools.callFunction(2393,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_1162\" onclick=\"CKEDITOR.tools.callFunction(2396,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_1163\" onclick=\"CKEDITOR.tools.callFunction(2399,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_1164\" onclick=\"CKEDITOR.tools.callFunction(2402,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_1165\" onclick=\"CKEDITOR.tools.callFunction(2405,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_1166\" onclick=\"CKEDITOR.tools.callFunction(2408,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_1168\" onclick=\"CKEDITOR.tools.callFunction(2411,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_1169\" onclick=\"CKEDITOR.tools.callFunction(2414,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_1170\" onclick=\"CKEDITOR.tools.callFunction(2417,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_1172\" onclick=\"CKEDITOR.tools.callFunction(2420,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_1173\" onclick=\"CKEDITOR.tools.callFunction(2423,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_1174\" onclick=\"CKEDITOR.tools.callFunction(2426,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_1175\" onclick=\"CKEDITOR.tools.callFunction(2429,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_1176\" onclick=\"CKEDITOR.tools.callFunction(2432,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_1177\" onclick=\"CKEDITOR.tools.callFunction(2435,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_1178\" onclick=\"CKEDITOR.tools.callFunction(2438,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_1179\" onclick=\"CKEDITOR.tools.callFunction(2441,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(2442,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(2445,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(2448,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(2451,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_1182\" onclick=\"CKEDITOR.tools.callFunction(2456,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_1183\" onclick=\"CKEDITOR.tools.callFunction(2459,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_1185\" onclick=\"CKEDITOR.tools.callFunction(2462,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_1186\" onclick=\"CKEDITOR.tools.callFunction(2465,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_1188\" onclick=\"CKEDITOR.tools.callFunction(2468,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام إضافة طلب جديد باللغة العربية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_830\" onclick=\"CKEDITOR.tools.callFunction(1652,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_831\" onclick=\"CKEDITOR.tools.callFunction(1655,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_832\" onclick=\"CKEDITOR.tools.callFunction(1658,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_833\" onclick=\"CKEDITOR.tools.callFunction(1661,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_834\" onclick=\"CKEDITOR.tools.callFunction(1664,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_835\" onclick=\"CKEDITOR.tools.callFunction(1667,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_837\" onclick=\"CKEDITOR.tools.callFunction(1670,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_838\" onclick=\"CKEDITOR.tools.callFunction(1673,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_839\" onclick=\"CKEDITOR.tools.callFunction(1676,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_840\" onclick=\"CKEDITOR.tools.callFunction(1679,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_841\" onclick=\"CKEDITOR.tools.callFunction(1682,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_842\" onclick=\"CKEDITOR.tools.callFunction(1685,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_843\" onclick=\"CKEDITOR.tools.callFunction(1688,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_845\" onclick=\"CKEDITOR.tools.callFunction(1691,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_846\" onclick=\"CKEDITOR.tools.callFunction(1694,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_847\" onclick=\"CKEDITOR.tools.callFunction(1697,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_848\" onclick=\"CKEDITOR.tools.callFunction(1700,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_850\" onclick=\"CKEDITOR.tools.callFunction(1703,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_851\" onclick=\"CKEDITOR.tools.callFunction(1706,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_852\" onclick=\"CKEDITOR.tools.callFunction(1709,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_853\" onclick=\"CKEDITOR.tools.callFunction(1712,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_854\" onclick=\"CKEDITOR.tools.callFunction(1715,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_855\" onclick=\"CKEDITOR.tools.callFunction(1718,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_856\" onclick=\"CKEDITOR.tools.callFunction(1721,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_857\" onclick=\"CKEDITOR.tools.callFunction(1724,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_858\" onclick=\"CKEDITOR.tools.callFunction(1727,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_860\" onclick=\"CKEDITOR.tools.callFunction(1730,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_861\" onclick=\"CKEDITOR.tools.callFunction(1733,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_862\" onclick=\"CKEDITOR.tools.callFunction(1736,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_863\" onclick=\"CKEDITOR.tools.callFunction(1739,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_864\" onclick=\"CKEDITOR.tools.callFunction(1742,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_865\" onclick=\"CKEDITOR.tools.callFunction(1745,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_866\" onclick=\"CKEDITOR.tools.callFunction(1748,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_867\" onclick=\"CKEDITOR.tools.callFunction(1751,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_869\" onclick=\"CKEDITOR.tools.callFunction(1754,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_870\" onclick=\"CKEDITOR.tools.callFunction(1757,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_871\" onclick=\"CKEDITOR.tools.callFunction(1760,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_872\" onclick=\"CKEDITOR.tools.callFunction(1763,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_873\" onclick=\"CKEDITOR.tools.callFunction(1766,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_874\" onclick=\"CKEDITOR.tools.callFunction(1769,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_875\" onclick=\"CKEDITOR.tools.callFunction(1772,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_876\" onclick=\"CKEDITOR.tools.callFunction(1775,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_877\" onclick=\"CKEDITOR.tools.callFunction(1778,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_878\" onclick=\"CKEDITOR.tools.callFunction(1781,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_879\" onclick=\"CKEDITOR.tools.callFunction(1784,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_880\" onclick=\"CKEDITOR.tools.callFunction(1787,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_881\" onclick=\"CKEDITOR.tools.callFunction(1790,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_883\" onclick=\"CKEDITOR.tools.callFunction(1793,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_884\" onclick=\"CKEDITOR.tools.callFunction(1796,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_885\" onclick=\"CKEDITOR.tools.callFunction(1799,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_887\" onclick=\"CKEDITOR.tools.callFunction(1802,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_888\" onclick=\"CKEDITOR.tools.callFunction(1805,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_889\" onclick=\"CKEDITOR.tools.callFunction(1808,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_890\" onclick=\"CKEDITOR.tools.callFunction(1811,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_891\" onclick=\"CKEDITOR.tools.callFunction(1814,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_892\" onclick=\"CKEDITOR.tools.callFunction(1817,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_893\" onclick=\"CKEDITOR.tools.callFunction(1820,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_894\" onclick=\"CKEDITOR.tools.callFunction(1823,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(1824,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(1827,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Format</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(1830,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(1833,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_897\" onclick=\"CKEDITOR.tools.callFunction(1838,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_898\" onclick=\"CKEDITOR.tools.callFunction(1841,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_900\" onclick=\"CKEDITOR.tools.callFunction(1844,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_901\" onclick=\"CKEDITOR.tools.callFunction(1847,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_903\" onclick=\"CKEDITOR.tools.callFunction(1850,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام إضافة طلب جديد باللغة الانجليزية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_925\" onclick=\"CKEDITOR.tools.callFunction(1858,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_926\" onclick=\"CKEDITOR.tools.callFunction(1861,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_927\" onclick=\"CKEDITOR.tools.callFunction(1864,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_928\" onclick=\"CKEDITOR.tools.callFunction(1867,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_929\" onclick=\"CKEDITOR.tools.callFunction(1870,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_930\" onclick=\"CKEDITOR.tools.callFunction(1873,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_932\" onclick=\"CKEDITOR.tools.callFunction(1876,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_933\" onclick=\"CKEDITOR.tools.callFunction(1879,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_934\" onclick=\"CKEDITOR.tools.callFunction(1882,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_935\" onclick=\"CKEDITOR.tools.callFunction(1885,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_936\" onclick=\"CKEDITOR.tools.callFunction(1888,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_937\" onclick=\"CKEDITOR.tools.callFunction(1891,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_938\" onclick=\"CKEDITOR.tools.callFunction(1894,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_940\" onclick=\"CKEDITOR.tools.callFunction(1897,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_941\" onclick=\"CKEDITOR.tools.callFunction(1900,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_942\" onclick=\"CKEDITOR.tools.callFunction(1903,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_943\" onclick=\"CKEDITOR.tools.callFunction(1906,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_945\" onclick=\"CKEDITOR.tools.callFunction(1909,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_946\" onclick=\"CKEDITOR.tools.callFunction(1912,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_947\" onclick=\"CKEDITOR.tools.callFunction(1915,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_948\" onclick=\"CKEDITOR.tools.callFunction(1918,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_949\" onclick=\"CKEDITOR.tools.callFunction(1921,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_950\" onclick=\"CKEDITOR.tools.callFunction(1924,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_951\" onclick=\"CKEDITOR.tools.callFunction(1927,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_952\" onclick=\"CKEDITOR.tools.callFunction(1930,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_953\" onclick=\"CKEDITOR.tools.callFunction(1933,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_955\" onclick=\"CKEDITOR.tools.callFunction(1936,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_956\" onclick=\"CKEDITOR.tools.callFunction(1939,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_957\" onclick=\"CKEDITOR.tools.callFunction(1942,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_958\" onclick=\"CKEDITOR.tools.callFunction(1945,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_959\" onclick=\"CKEDITOR.tools.callFunction(1948,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_960\" onclick=\"CKEDITOR.tools.callFunction(1951,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_961\" onclick=\"CKEDITOR.tools.callFunction(1954,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_962\" onclick=\"CKEDITOR.tools.callFunction(1957,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_964\" onclick=\"CKEDITOR.tools.callFunction(1960,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_965\" onclick=\"CKEDITOR.tools.callFunction(1963,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_966\" onclick=\"CKEDITOR.tools.callFunction(1966,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_967\" onclick=\"CKEDITOR.tools.callFunction(1969,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_968\" onclick=\"CKEDITOR.tools.callFunction(1972,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_969\" onclick=\"CKEDITOR.tools.callFunction(1975,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_970\" onclick=\"CKEDITOR.tools.callFunction(1978,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_971\" onclick=\"CKEDITOR.tools.callFunction(1981,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_972\" onclick=\"CKEDITOR.tools.callFunction(1984,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_973\" onclick=\"CKEDITOR.tools.callFunction(1987,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_974\" onclick=\"CKEDITOR.tools.callFunction(1990,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_975\" onclick=\"CKEDITOR.tools.callFunction(1993,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_976\" onclick=\"CKEDITOR.tools.callFunction(1996,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_978\" onclick=\"CKEDITOR.tools.callFunction(1999,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_979\" onclick=\"CKEDITOR.tools.callFunction(2002,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_980\" onclick=\"CKEDITOR.tools.callFunction(2005,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_982\" onclick=\"CKEDITOR.tools.callFunction(2008,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_983\" onclick=\"CKEDITOR.tools.callFunction(2011,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_984\" onclick=\"CKEDITOR.tools.callFunction(2014,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_985\" onclick=\"CKEDITOR.tools.callFunction(2017,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_986\" onclick=\"CKEDITOR.tools.callFunction(2020,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_987\" onclick=\"CKEDITOR.tools.callFunction(2023,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_988\" onclick=\"CKEDITOR.tools.callFunction(2026,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_989\" onclick=\"CKEDITOR.tools.callFunction(2029,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(2030,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(2033,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Format</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(2036,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(2039,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_992\" onclick=\"CKEDITOR.tools.callFunction(2044,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_993\" onclick=\"CKEDITOR.tools.callFunction(2047,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_995\" onclick=\"CKEDITOR.tools.callFunction(2050,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_996\" onclick=\"CKEDITOR.tools.callFunction(2053,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_998\" onclick=\"CKEDITOR.tools.callFunction(2056,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام اضافة عرض على طلب باللغة العربية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_640\" onclick=\"CKEDITOR.tools.callFunction(1240,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_641\" onclick=\"CKEDITOR.tools.callFunction(1243,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_642\" onclick=\"CKEDITOR.tools.callFunction(1246,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_643\" onclick=\"CKEDITOR.tools.callFunction(1249,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_644\" onclick=\"CKEDITOR.tools.callFunction(1252,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_645\" onclick=\"CKEDITOR.tools.callFunction(1255,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_647\" onclick=\"CKEDITOR.tools.callFunction(1258,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_648\" onclick=\"CKEDITOR.tools.callFunction(1261,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_649\" onclick=\"CKEDITOR.tools.callFunction(1264,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_650\" onclick=\"CKEDITOR.tools.callFunction(1267,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_651\" onclick=\"CKEDITOR.tools.callFunction(1270,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_652\" onclick=\"CKEDITOR.tools.callFunction(1273,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_653\" onclick=\"CKEDITOR.tools.callFunction(1276,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_655\" onclick=\"CKEDITOR.tools.callFunction(1279,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_656\" onclick=\"CKEDITOR.tools.callFunction(1282,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_657\" onclick=\"CKEDITOR.tools.callFunction(1285,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_658\" onclick=\"CKEDITOR.tools.callFunction(1288,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_660\" onclick=\"CKEDITOR.tools.callFunction(1291,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_661\" onclick=\"CKEDITOR.tools.callFunction(1294,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_662\" onclick=\"CKEDITOR.tools.callFunction(1297,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_663\" onclick=\"CKEDITOR.tools.callFunction(1300,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_664\" onclick=\"CKEDITOR.tools.callFunction(1303,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_665\" onclick=\"CKEDITOR.tools.callFunction(1306,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_666\" onclick=\"CKEDITOR.tools.callFunction(1309,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_667\" onclick=\"CKEDITOR.tools.callFunction(1312,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_668\" onclick=\"CKEDITOR.tools.callFunction(1315,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_670\" onclick=\"CKEDITOR.tools.callFunction(1318,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_671\" onclick=\"CKEDITOR.tools.callFunction(1321,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_672\" onclick=\"CKEDITOR.tools.callFunction(1324,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_673\" onclick=\"CKEDITOR.tools.callFunction(1327,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_674\" onclick=\"CKEDITOR.tools.callFunction(1330,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_675\" onclick=\"CKEDITOR.tools.callFunction(1333,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_676\" onclick=\"CKEDITOR.tools.callFunction(1336,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_677\" onclick=\"CKEDITOR.tools.callFunction(1339,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_679\" onclick=\"CKEDITOR.tools.callFunction(1342,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_680\" onclick=\"CKEDITOR.tools.callFunction(1345,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_681\" onclick=\"CKEDITOR.tools.callFunction(1348,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_682\" onclick=\"CKEDITOR.tools.callFunction(1351,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_683\" onclick=\"CKEDITOR.tools.callFunction(1354,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_684\" onclick=\"CKEDITOR.tools.callFunction(1357,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_685\" onclick=\"CKEDITOR.tools.callFunction(1360,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_686\" onclick=\"CKEDITOR.tools.callFunction(1363,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_687\" onclick=\"CKEDITOR.tools.callFunction(1366,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_688\" onclick=\"CKEDITOR.tools.callFunction(1369,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_689\" onclick=\"CKEDITOR.tools.callFunction(1372,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_690\" onclick=\"CKEDITOR.tools.callFunction(1375,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_691\" onclick=\"CKEDITOR.tools.callFunction(1378,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_693\" onclick=\"CKEDITOR.tools.callFunction(1381,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_694\" onclick=\"CKEDITOR.tools.callFunction(1384,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_695\" onclick=\"CKEDITOR.tools.callFunction(1387,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_697\" onclick=\"CKEDITOR.tools.callFunction(1390,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_698\" onclick=\"CKEDITOR.tools.callFunction(1393,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_699\" onclick=\"CKEDITOR.tools.callFunction(1396,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_700\" onclick=\"CKEDITOR.tools.callFunction(1399,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_701\" onclick=\"CKEDITOR.tools.callFunction(1402,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_702\" onclick=\"CKEDITOR.tools.callFunction(1405,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_703\" onclick=\"CKEDITOR.tools.callFunction(1408,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_704\" onclick=\"CKEDITOR.tools.callFunction(1411,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(1412,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(1415,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(1418,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(1421,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_707\" onclick=\"CKEDITOR.tools.callFunction(1426,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_708\" onclick=\"CKEDITOR.tools.callFunction(1429,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_710\" onclick=\"CKEDITOR.tools.callFunction(1432,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_711\" onclick=\"CKEDITOR.tools.callFunction(1435,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_713\" onclick=\"CKEDITOR.tools.callFunction(1438,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام اضافة عرض على طلب باللغة الانجليزية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_735\" onclick=\"CKEDITOR.tools.callFunction(1446,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_736\" onclick=\"CKEDITOR.tools.callFunction(1449,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_737\" onclick=\"CKEDITOR.tools.callFunction(1452,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_738\" onclick=\"CKEDITOR.tools.callFunction(1455,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_739\" onclick=\"CKEDITOR.tools.callFunction(1458,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_740\" onclick=\"CKEDITOR.tools.callFunction(1461,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_742\" onclick=\"CKEDITOR.tools.callFunction(1464,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_743\" onclick=\"CKEDITOR.tools.callFunction(1467,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_744\" onclick=\"CKEDITOR.tools.callFunction(1470,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_745\" onclick=\"CKEDITOR.tools.callFunction(1473,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_746\" onclick=\"CKEDITOR.tools.callFunction(1476,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_747\" onclick=\"CKEDITOR.tools.callFunction(1479,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_748\" onclick=\"CKEDITOR.tools.callFunction(1482,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_750\" onclick=\"CKEDITOR.tools.callFunction(1485,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_751\" onclick=\"CKEDITOR.tools.callFunction(1488,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_752\" onclick=\"CKEDITOR.tools.callFunction(1491,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_753\" onclick=\"CKEDITOR.tools.callFunction(1494,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_755\" onclick=\"CKEDITOR.tools.callFunction(1497,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_756\" onclick=\"CKEDITOR.tools.callFunction(1500,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_757\" onclick=\"CKEDITOR.tools.callFunction(1503,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_758\" onclick=\"CKEDITOR.tools.callFunction(1506,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_759\" onclick=\"CKEDITOR.tools.callFunction(1509,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_760\" onclick=\"CKEDITOR.tools.callFunction(1512,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_761\" onclick=\"CKEDITOR.tools.callFunction(1515,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_762\" onclick=\"CKEDITOR.tools.callFunction(1518,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_763\" onclick=\"CKEDITOR.tools.callFunction(1521,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_765\" onclick=\"CKEDITOR.tools.callFunction(1524,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_766\" onclick=\"CKEDITOR.tools.callFunction(1527,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_767\" onclick=\"CKEDITOR.tools.callFunction(1530,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_768\" onclick=\"CKEDITOR.tools.callFunction(1533,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_769\" onclick=\"CKEDITOR.tools.callFunction(1536,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_770\" onclick=\"CKEDITOR.tools.callFunction(1539,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_771\" onclick=\"CKEDITOR.tools.callFunction(1542,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_772\" onclick=\"CKEDITOR.tools.callFunction(1545,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_774\" onclick=\"CKEDITOR.tools.callFunction(1548,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_775\" onclick=\"CKEDITOR.tools.callFunction(1551,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_776\" onclick=\"CKEDITOR.tools.callFunction(1554,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_777\" onclick=\"CKEDITOR.tools.callFunction(1557,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_778\" onclick=\"CKEDITOR.tools.callFunction(1560,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_779\" onclick=\"CKEDITOR.tools.callFunction(1563,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_780\" onclick=\"CKEDITOR.tools.callFunction(1566,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_781\" onclick=\"CKEDITOR.tools.callFunction(1569,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_782\" onclick=\"CKEDITOR.tools.callFunction(1572,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_783\" onclick=\"CKEDITOR.tools.callFunction(1575,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_784\" onclick=\"CKEDITOR.tools.callFunction(1578,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_785\" onclick=\"CKEDITOR.tools.callFunction(1581,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_786\" onclick=\"CKEDITOR.tools.callFunction(1584,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_788\" onclick=\"CKEDITOR.tools.callFunction(1587,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_789\" onclick=\"CKEDITOR.tools.callFunction(1590,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_790\" onclick=\"CKEDITOR.tools.callFunction(1593,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_792\" onclick=\"CKEDITOR.tools.callFunction(1596,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_793\" onclick=\"CKEDITOR.tools.callFunction(1599,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_794\" onclick=\"CKEDITOR.tools.callFunction(1602,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_795\" onclick=\"CKEDITOR.tools.callFunction(1605,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_796\" onclick=\"CKEDITOR.tools.callFunction(1608,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_797\" onclick=\"CKEDITOR.tools.callFunction(1611,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_798\" onclick=\"CKEDITOR.tools.callFunction(1614,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_799\" onclick=\"CKEDITOR.tools.callFunction(1617,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(1618,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(1621,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(1624,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(1627,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_802\" onclick=\"CKEDITOR.tools.callFunction(1632,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_803\" onclick=\"CKEDITOR.tools.callFunction(1635,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_805\" onclick=\"CKEDITOR.tools.callFunction(1638,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_806\" onclick=\"CKEDITOR.tools.callFunction(1641,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_808\" onclick=\"CKEDITOR.tools.callFunction(1644,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام شحن الرصيد باللغة العربية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_545\" onclick=\"CKEDITOR.tools.callFunction(1034,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_546\" onclick=\"CKEDITOR.tools.callFunction(1037,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_547\" onclick=\"CKEDITOR.tools.callFunction(1040,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_548\" onclick=\"CKEDITOR.tools.callFunction(1043,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_549\" onclick=\"CKEDITOR.tools.callFunction(1046,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_550\" onclick=\"CKEDITOR.tools.callFunction(1049,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_552\" onclick=\"CKEDITOR.tools.callFunction(1052,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_553\" onclick=\"CKEDITOR.tools.callFunction(1055,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_554\" onclick=\"CKEDITOR.tools.callFunction(1058,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_555\" onclick=\"CKEDITOR.tools.callFunction(1061,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_556\" onclick=\"CKEDITOR.tools.callFunction(1064,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_557\" onclick=\"CKEDITOR.tools.callFunction(1067,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_558\" onclick=\"CKEDITOR.tools.callFunction(1070,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_560\" onclick=\"CKEDITOR.tools.callFunction(1073,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_561\" onclick=\"CKEDITOR.tools.callFunction(1076,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_562\" onclick=\"CKEDITOR.tools.callFunction(1079,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_563\" onclick=\"CKEDITOR.tools.callFunction(1082,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_565\" onclick=\"CKEDITOR.tools.callFunction(1085,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_566\" onclick=\"CKEDITOR.tools.callFunction(1088,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_567\" onclick=\"CKEDITOR.tools.callFunction(1091,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_568\" onclick=\"CKEDITOR.tools.callFunction(1094,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_569\" onclick=\"CKEDITOR.tools.callFunction(1097,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_570\" onclick=\"CKEDITOR.tools.callFunction(1100,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_571\" onclick=\"CKEDITOR.tools.callFunction(1103,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_572\" onclick=\"CKEDITOR.tools.callFunction(1106,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_573\" onclick=\"CKEDITOR.tools.callFunction(1109,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_575\" onclick=\"CKEDITOR.tools.callFunction(1112,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_576\" onclick=\"CKEDITOR.tools.callFunction(1115,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_577\" onclick=\"CKEDITOR.tools.callFunction(1118,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_578\" onclick=\"CKEDITOR.tools.callFunction(1121,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_579\" onclick=\"CKEDITOR.tools.callFunction(1124,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_580\" onclick=\"CKEDITOR.tools.callFunction(1127,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_581\" onclick=\"CKEDITOR.tools.callFunction(1130,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_582\" onclick=\"CKEDITOR.tools.callFunction(1133,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_584\" onclick=\"CKEDITOR.tools.callFunction(1136,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_585\" onclick=\"CKEDITOR.tools.callFunction(1139,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_586\" onclick=\"CKEDITOR.tools.callFunction(1142,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_587\" onclick=\"CKEDITOR.tools.callFunction(1145,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_588\" onclick=\"CKEDITOR.tools.callFunction(1148,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_589\" onclick=\"CKEDITOR.tools.callFunction(1151,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_590\" onclick=\"CKEDITOR.tools.callFunction(1154,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_591\" onclick=\"CKEDITOR.tools.callFunction(1157,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_592\" onclick=\"CKEDITOR.tools.callFunction(1160,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_593\" onclick=\"CKEDITOR.tools.callFunction(1163,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_594\" onclick=\"CKEDITOR.tools.callFunction(1166,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_595\" onclick=\"CKEDITOR.tools.callFunction(1169,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_596\" onclick=\"CKEDITOR.tools.callFunction(1172,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_598\" onclick=\"CKEDITOR.tools.callFunction(1175,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_599\" onclick=\"CKEDITOR.tools.callFunction(1178,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_600\" onclick=\"CKEDITOR.tools.callFunction(1181,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_602\" onclick=\"CKEDITOR.tools.callFunction(1184,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_603\" onclick=\"CKEDITOR.tools.callFunction(1187,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_604\" onclick=\"CKEDITOR.tools.callFunction(1190,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_605\" onclick=\"CKEDITOR.tools.callFunction(1193,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_606\" onclick=\"CKEDITOR.tools.callFunction(1196,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_607\" onclick=\"CKEDITOR.tools.callFunction(1199,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_608\" onclick=\"CKEDITOR.tools.callFunction(1202,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_609\" onclick=\"CKEDITOR.tools.callFunction(1205,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(1206,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(1209,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(1212,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(1215,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_612\" onclick=\"CKEDITOR.tools.callFunction(1220,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_613\" onclick=\"CKEDITOR.tools.callFunction(1223,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_615\" onclick=\"CKEDITOR.tools.callFunction(1226,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_616\" onclick=\"CKEDITOR.tools.callFunction(1229,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_618\" onclick=\"CKEDITOR.tools.callFunction(1232,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام شحن الرصيد باللغة الانجليزية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_450\" onclick=\"CKEDITOR.tools.callFunction(828,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_451\" onclick=\"CKEDITOR.tools.callFunction(831,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_452\" onclick=\"CKEDITOR.tools.callFunction(834,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_453\" onclick=\"CKEDITOR.tools.callFunction(837,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_454\" onclick=\"CKEDITOR.tools.callFunction(840,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_455\" onclick=\"CKEDITOR.tools.callFunction(843,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_457\" onclick=\"CKEDITOR.tools.callFunction(846,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_458\" onclick=\"CKEDITOR.tools.callFunction(849,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_459\" onclick=\"CKEDITOR.tools.callFunction(852,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_460\" onclick=\"CKEDITOR.tools.callFunction(855,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_461\" onclick=\"CKEDITOR.tools.callFunction(858,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_462\" onclick=\"CKEDITOR.tools.callFunction(861,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_463\" onclick=\"CKEDITOR.tools.callFunction(864,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_465\" onclick=\"CKEDITOR.tools.callFunction(867,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_466\" onclick=\"CKEDITOR.tools.callFunction(870,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_467\" onclick=\"CKEDITOR.tools.callFunction(873,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_468\" onclick=\"CKEDITOR.tools.callFunction(876,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_470\" onclick=\"CKEDITOR.tools.callFunction(879,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_471\" onclick=\"CKEDITOR.tools.callFunction(882,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_472\" onclick=\"CKEDITOR.tools.callFunction(885,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_473\" onclick=\"CKEDITOR.tools.callFunction(888,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_474\" onclick=\"CKEDITOR.tools.callFunction(891,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_475\" onclick=\"CKEDITOR.tools.callFunction(894,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_476\" onclick=\"CKEDITOR.tools.callFunction(897,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_477\" onclick=\"CKEDITOR.tools.callFunction(900,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_478\" onclick=\"CKEDITOR.tools.callFunction(903,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_480\" onclick=\"CKEDITOR.tools.callFunction(906,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_481\" onclick=\"CKEDITOR.tools.callFunction(909,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_482\" onclick=\"CKEDITOR.tools.callFunction(912,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_483\" onclick=\"CKEDITOR.tools.callFunction(915,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_484\" onclick=\"CKEDITOR.tools.callFunction(918,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_485\" onclick=\"CKEDITOR.tools.callFunction(921,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_486\" onclick=\"CKEDITOR.tools.callFunction(924,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_487\" onclick=\"CKEDITOR.tools.callFunction(927,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_489\" onclick=\"CKEDITOR.tools.callFunction(930,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_490\" onclick=\"CKEDITOR.tools.callFunction(933,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_491\" onclick=\"CKEDITOR.tools.callFunction(936,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_492\" onclick=\"CKEDITOR.tools.callFunction(939,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_493\" onclick=\"CKEDITOR.tools.callFunction(942,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_494\" onclick=\"CKEDITOR.tools.callFunction(945,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_495\" onclick=\"CKEDITOR.tools.callFunction(948,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_496\" onclick=\"CKEDITOR.tools.callFunction(951,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_497\" onclick=\"CKEDITOR.tools.callFunction(954,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_498\" onclick=\"CKEDITOR.tools.callFunction(957,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_499\" onclick=\"CKEDITOR.tools.callFunction(960,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_500\" onclick=\"CKEDITOR.tools.callFunction(963,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_501\" onclick=\"CKEDITOR.tools.callFunction(966,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_503\" onclick=\"CKEDITOR.tools.callFunction(969,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_504\" onclick=\"CKEDITOR.tools.callFunction(972,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_505\" onclick=\"CKEDITOR.tools.callFunction(975,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_507\" onclick=\"CKEDITOR.tools.callFunction(978,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_508\" onclick=\"CKEDITOR.tools.callFunction(981,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_509\" onclick=\"CKEDITOR.tools.callFunction(984,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_510\" onclick=\"CKEDITOR.tools.callFunction(987,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_511\" onclick=\"CKEDITOR.tools.callFunction(990,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_512\" onclick=\"CKEDITOR.tools.callFunction(993,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_513\" onclick=\"CKEDITOR.tools.callFunction(996,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_514\" onclick=\"CKEDITOR.tools.callFunction(999,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(1000,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(1003,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(1006,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(1009,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_517\" onclick=\"CKEDITOR.tools.callFunction(1014,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_518\" onclick=\"CKEDITOR.tools.callFunction(1017,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_520\" onclick=\"CKEDITOR.tools.callFunction(1020,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_521\" onclick=\"CKEDITOR.tools.callFunction(1023,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_523\" onclick=\"CKEDITOR.tools.callFunction(1026,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام دفع رسوم الاشتراك باللغة الانجليزية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_70\" onclick=\"CKEDITOR.tools.callFunction(4,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_71\" onclick=\"CKEDITOR.tools.callFunction(7,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_72\" onclick=\"CKEDITOR.tools.callFunction(10,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_73\" onclick=\"CKEDITOR.tools.callFunction(13,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_74\" onclick=\"CKEDITOR.tools.callFunction(16,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_75\" onclick=\"CKEDITOR.tools.callFunction(19,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_77\" onclick=\"CKEDITOR.tools.callFunction(22,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_78\" onclick=\"CKEDITOR.tools.callFunction(25,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_79\" onclick=\"CKEDITOR.tools.callFunction(28,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_80\" onclick=\"CKEDITOR.tools.callFunction(31,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_81\" onclick=\"CKEDITOR.tools.callFunction(34,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_82\" onclick=\"CKEDITOR.tools.callFunction(37,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_83\" onclick=\"CKEDITOR.tools.callFunction(40,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_85\" onclick=\"CKEDITOR.tools.callFunction(43,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_86\" onclick=\"CKEDITOR.tools.callFunction(46,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_87\" onclick=\"CKEDITOR.tools.callFunction(49,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_88\" onclick=\"CKEDITOR.tools.callFunction(52,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_90\" onclick=\"CKEDITOR.tools.callFunction(55,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_91\" onclick=\"CKEDITOR.tools.callFunction(58,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_92\" onclick=\"CKEDITOR.tools.callFunction(61,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_93\" onclick=\"CKEDITOR.tools.callFunction(64,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_94\" onclick=\"CKEDITOR.tools.callFunction(67,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_95\" onclick=\"CKEDITOR.tools.callFunction(70,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_96\" onclick=\"CKEDITOR.tools.callFunction(73,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_97\" onclick=\"CKEDITOR.tools.callFunction(76,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_98\" onclick=\"CKEDITOR.tools.callFunction(79,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_100\" onclick=\"CKEDITOR.tools.callFunction(82,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_101\" onclick=\"CKEDITOR.tools.callFunction(85,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_102\" onclick=\"CKEDITOR.tools.callFunction(88,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_103\" onclick=\"CKEDITOR.tools.callFunction(91,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_104\" onclick=\"CKEDITOR.tools.callFunction(94,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_105\" onclick=\"CKEDITOR.tools.callFunction(97,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_106\" onclick=\"CKEDITOR.tools.callFunction(100,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_107\" onclick=\"CKEDITOR.tools.callFunction(103,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_109\" onclick=\"CKEDITOR.tools.callFunction(106,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_110\" onclick=\"CKEDITOR.tools.callFunction(109,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_111\" onclick=\"CKEDITOR.tools.callFunction(112,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_112\" onclick=\"CKEDITOR.tools.callFunction(115,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_113\" onclick=\"CKEDITOR.tools.callFunction(118,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_114\" onclick=\"CKEDITOR.tools.callFunction(121,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_115\" onclick=\"CKEDITOR.tools.callFunction(124,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_116\" onclick=\"CKEDITOR.tools.callFunction(127,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_117\" onclick=\"CKEDITOR.tools.callFunction(130,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_118\" onclick=\"CKEDITOR.tools.callFunction(133,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_119\" onclick=\"CKEDITOR.tools.callFunction(136,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_120\" onclick=\"CKEDITOR.tools.callFunction(139,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_121\" onclick=\"CKEDITOR.tools.callFunction(142,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_123\" onclick=\"CKEDITOR.tools.callFunction(145,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_124\" onclick=\"CKEDITOR.tools.callFunction(148,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_125\" onclick=\"CKEDITOR.tools.callFunction(151,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_127\" onclick=\"CKEDITOR.tools.callFunction(154,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_128\" onclick=\"CKEDITOR.tools.callFunction(157,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_129\" onclick=\"CKEDITOR.tools.callFunction(160,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_130\" onclick=\"CKEDITOR.tools.callFunction(163,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_131\" onclick=\"CKEDITOR.tools.callFunction(166,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_132\" onclick=\"CKEDITOR.tools.callFunction(169,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_133\" onclick=\"CKEDITOR.tools.callFunction(172,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_134\" onclick=\"CKEDITOR.tools.callFunction(175,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(176,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(179,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Format</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(182,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(185,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_137\" onclick=\"CKEDITOR.tools.callFunction(190,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_138\" onclick=\"CKEDITOR.tools.callFunction(193,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_140\" onclick=\"CKEDITOR.tools.callFunction(196,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_141\" onclick=\"CKEDITOR.tools.callFunction(199,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_143\" onclick=\"CKEDITOR.tools.callFunction(202,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام دفع رسوم الاشتراك باللغة العربية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_165\" onclick=\"CKEDITOR.tools.callFunction(210,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_166\" onclick=\"CKEDITOR.tools.callFunction(213,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_167\" onclick=\"CKEDITOR.tools.callFunction(216,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_168\" onclick=\"CKEDITOR.tools.callFunction(219,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_169\" onclick=\"CKEDITOR.tools.callFunction(222,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_170\" onclick=\"CKEDITOR.tools.callFunction(225,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_172\" onclick=\"CKEDITOR.tools.callFunction(228,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_173\" onclick=\"CKEDITOR.tools.callFunction(231,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_174\" onclick=\"CKEDITOR.tools.callFunction(234,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_175\" onclick=\"CKEDITOR.tools.callFunction(237,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_176\" onclick=\"CKEDITOR.tools.callFunction(240,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_177\" onclick=\"CKEDITOR.tools.callFunction(243,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_178\" onclick=\"CKEDITOR.tools.callFunction(246,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_180\" onclick=\"CKEDITOR.tools.callFunction(249,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_181\" onclick=\"CKEDITOR.tools.callFunction(252,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_182\" onclick=\"CKEDITOR.tools.callFunction(255,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_183\" onclick=\"CKEDITOR.tools.callFunction(258,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_185\" onclick=\"CKEDITOR.tools.callFunction(261,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_186\" onclick=\"CKEDITOR.tools.callFunction(264,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_187\" onclick=\"CKEDITOR.tools.callFunction(267,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_188\" onclick=\"CKEDITOR.tools.callFunction(270,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_189\" onclick=\"CKEDITOR.tools.callFunction(273,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_190\" onclick=\"CKEDITOR.tools.callFunction(276,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_191\" onclick=\"CKEDITOR.tools.callFunction(279,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_192\" onclick=\"CKEDITOR.tools.callFunction(282,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_193\" onclick=\"CKEDITOR.tools.callFunction(285,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_195\" onclick=\"CKEDITOR.tools.callFunction(288,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_196\" onclick=\"CKEDITOR.tools.callFunction(291,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_197\" onclick=\"CKEDITOR.tools.callFunction(294,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_198\" onclick=\"CKEDITOR.tools.callFunction(297,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_199\" onclick=\"CKEDITOR.tools.callFunction(300,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_200\" onclick=\"CKEDITOR.tools.callFunction(303,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_201\" onclick=\"CKEDITOR.tools.callFunction(306,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_202\" onclick=\"CKEDITOR.tools.callFunction(309,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_204\" onclick=\"CKEDITOR.tools.callFunction(312,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_205\" onclick=\"CKEDITOR.tools.callFunction(315,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_206\" onclick=\"CKEDITOR.tools.callFunction(318,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_207\" onclick=\"CKEDITOR.tools.callFunction(321,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_208\" onclick=\"CKEDITOR.tools.callFunction(324,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_209\" onclick=\"CKEDITOR.tools.callFunction(327,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_210\" onclick=\"CKEDITOR.tools.callFunction(330,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_211\" onclick=\"CKEDITOR.tools.callFunction(333,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_212\" onclick=\"CKEDITOR.tools.callFunction(336,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_213\" onclick=\"CKEDITOR.tools.callFunction(339,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_214\" onclick=\"CKEDITOR.tools.callFunction(342,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_215\" onclick=\"CKEDITOR.tools.callFunction(345,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_216\" onclick=\"CKEDITOR.tools.callFunction(348,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_218\" onclick=\"CKEDITOR.tools.callFunction(351,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_219\" onclick=\"CKEDITOR.tools.callFunction(354,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_220\" onclick=\"CKEDITOR.tools.callFunction(357,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_222\" onclick=\"CKEDITOR.tools.callFunction(360,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_223\" onclick=\"CKEDITOR.tools.callFunction(363,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_224\" onclick=\"CKEDITOR.tools.callFunction(366,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_225\" onclick=\"CKEDITOR.tools.callFunction(369,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_226\" onclick=\"CKEDITOR.tools.callFunction(372,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_227\" onclick=\"CKEDITOR.tools.callFunction(375,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_228\" onclick=\"CKEDITOR.tools.callFunction(378,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_229\" onclick=\"CKEDITOR.tools.callFunction(381,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(382,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(385,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(388,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(391,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_232\" onclick=\"CKEDITOR.tools.callFunction(396,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_233\" onclick=\"CKEDITOR.tools.callFunction(399,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_235\" onclick=\"CKEDITOR.tools.callFunction(402,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_236\" onclick=\"CKEDITOR.tools.callFunction(405,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_238\" onclick=\"CKEDITOR.tools.callFunction(408,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام سحب الرصيد باللغة الانجليزية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_260\" onclick=\"CKEDITOR.tools.callFunction(416,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_261\" onclick=\"CKEDITOR.tools.callFunction(419,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_262\" onclick=\"CKEDITOR.tools.callFunction(422,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_263\" onclick=\"CKEDITOR.tools.callFunction(425,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_264\" onclick=\"CKEDITOR.tools.callFunction(428,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_265\" onclick=\"CKEDITOR.tools.callFunction(431,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_267\" onclick=\"CKEDITOR.tools.callFunction(434,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_268\" onclick=\"CKEDITOR.tools.callFunction(437,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_269\" onclick=\"CKEDITOR.tools.callFunction(440,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_270\" onclick=\"CKEDITOR.tools.callFunction(443,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_271\" onclick=\"CKEDITOR.tools.callFunction(446,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_272\" onclick=\"CKEDITOR.tools.callFunction(449,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_273\" onclick=\"CKEDITOR.tools.callFunction(452,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_275\" onclick=\"CKEDITOR.tools.callFunction(455,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_276\" onclick=\"CKEDITOR.tools.callFunction(458,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_277\" onclick=\"CKEDITOR.tools.callFunction(461,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_278\" onclick=\"CKEDITOR.tools.callFunction(464,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_280\" onclick=\"CKEDITOR.tools.callFunction(467,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_281\" onclick=\"CKEDITOR.tools.callFunction(470,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_282\" onclick=\"CKEDITOR.tools.callFunction(473,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_283\" onclick=\"CKEDITOR.tools.callFunction(476,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_284\" onclick=\"CKEDITOR.tools.callFunction(479,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_285\" onclick=\"CKEDITOR.tools.callFunction(482,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_286\" onclick=\"CKEDITOR.tools.callFunction(485,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_287\" onclick=\"CKEDITOR.tools.callFunction(488,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_288\" onclick=\"CKEDITOR.tools.callFunction(491,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_290\" onclick=\"CKEDITOR.tools.callFunction(494,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_291\" onclick=\"CKEDITOR.tools.callFunction(497,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_292\" onclick=\"CKEDITOR.tools.callFunction(500,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_293\" onclick=\"CKEDITOR.tools.callFunction(503,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_294\" onclick=\"CKEDITOR.tools.callFunction(506,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_295\" onclick=\"CKEDITOR.tools.callFunction(509,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_296\" onclick=\"CKEDITOR.tools.callFunction(512,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_297\" onclick=\"CKEDITOR.tools.callFunction(515,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_299\" onclick=\"CKEDITOR.tools.callFunction(518,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_300\" onclick=\"CKEDITOR.tools.callFunction(521,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_301\" onclick=\"CKEDITOR.tools.callFunction(524,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_302\" onclick=\"CKEDITOR.tools.callFunction(527,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_303\" onclick=\"CKEDITOR.tools.callFunction(530,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_304\" onclick=\"CKEDITOR.tools.callFunction(533,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_305\" onclick=\"CKEDITOR.tools.callFunction(536,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_306\" onclick=\"CKEDITOR.tools.callFunction(539,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_307\" onclick=\"CKEDITOR.tools.callFunction(542,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_308\" onclick=\"CKEDITOR.tools.callFunction(545,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_309\" onclick=\"CKEDITOR.tools.callFunction(548,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_310\" onclick=\"CKEDITOR.tools.callFunction(551,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_311\" onclick=\"CKEDITOR.tools.callFunction(554,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_313\" onclick=\"CKEDITOR.tools.callFunction(557,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_314\" onclick=\"CKEDITOR.tools.callFunction(560,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_315\" onclick=\"CKEDITOR.tools.callFunction(563,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_317\" onclick=\"CKEDITOR.tools.callFunction(566,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_318\" onclick=\"CKEDITOR.tools.callFunction(569,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_319\" onclick=\"CKEDITOR.tools.callFunction(572,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_320\" onclick=\"CKEDITOR.tools.callFunction(575,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_321\" onclick=\"CKEDITOR.tools.callFunction(578,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_322\" onclick=\"CKEDITOR.tools.callFunction(581,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_323\" onclick=\"CKEDITOR.tools.callFunction(584,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_324\" onclick=\"CKEDITOR.tools.callFunction(587,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(588,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(591,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(594,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(597,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_327\" onclick=\"CKEDITOR.tools.callFunction(602,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_328\" onclick=\"CKEDITOR.tools.callFunction(605,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_330\" onclick=\"CKEDITOR.tools.callFunction(608,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_331\" onclick=\"CKEDITOR.tools.callFunction(611,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_333\" onclick=\"CKEDITOR.tools.callFunction(614,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '<p>&nbsp;</p>\r\n\r\n<p>شروط واحكام سحب الرصيد باللغة الانجليزية</p>\r\n\r\n<p><a href=\"javascript:void(\'Source\')\" id=\"cke_355\" onclick=\"CKEDITOR.tools.callFunction(622,this);return false;\" tabindex=\"-1\" title=\"Source\">&nbsp;Source</a><a href=\"javascript:void(\'Save\')\" id=\"cke_356\" onclick=\"CKEDITOR.tools.callFunction(625,this);return false;\" tabindex=\"-1\" title=\"Save\">&nbsp;</a><a href=\"javascript:void(\'New Page\')\" id=\"cke_357\" onclick=\"CKEDITOR.tools.callFunction(628,this);return false;\" tabindex=\"-1\" title=\"New Page\">&nbsp;</a><a href=\"javascript:void(\'Preview\')\" id=\"cke_358\" onclick=\"CKEDITOR.tools.callFunction(631,this);return false;\" tabindex=\"-1\" title=\"Preview\">&nbsp;</a><a href=\"javascript:void(\'Print\')\" id=\"cke_359\" onclick=\"CKEDITOR.tools.callFunction(634,this);return false;\" tabindex=\"-1\" title=\"Print\">&nbsp;</a><a href=\"javascript:void(\'Templates\')\" id=\"cke_360\" onclick=\"CKEDITOR.tools.callFunction(637,this);return false;\" tabindex=\"-1\" title=\"Templates\">&nbsp;</a><a href=\"javascript:void(\'Cut\')\" id=\"cke_362\" onclick=\"CKEDITOR.tools.callFunction(640,this);return false;\" tabindex=\"-1\" title=\"Cut (⌘+X)\">&nbsp;</a><a href=\"javascript:void(\'Copy\')\" id=\"cke_363\" onclick=\"CKEDITOR.tools.callFunction(643,this);return false;\" tabindex=\"-1\" title=\"Copy (⌘+C)\">&nbsp;</a><a href=\"javascript:void(\'Paste\')\" id=\"cke_364\" onclick=\"CKEDITOR.tools.callFunction(646,this);return false;\" tabindex=\"-1\" title=\"Paste (⌘+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste as plain text\')\" id=\"cke_365\" onclick=\"CKEDITOR.tools.callFunction(649,this);return false;\" tabindex=\"-1\" title=\"Paste as plain text (⌘+⇧+V)\">&nbsp;</a><a href=\"javascript:void(\'Paste from Word\')\" id=\"cke_366\" onclick=\"CKEDITOR.tools.callFunction(652,this);return false;\" tabindex=\"-1\" title=\"Paste from Word\">&nbsp;</a><a href=\"javascript:void(\'Undo\')\" id=\"cke_367\" onclick=\"CKEDITOR.tools.callFunction(655,this);return false;\" tabindex=\"-1\" title=\"Undo (⌘+Z)\">&nbsp;</a><a href=\"javascript:void(\'Redo\')\" id=\"cke_368\" onclick=\"CKEDITOR.tools.callFunction(658,this);return false;\" tabindex=\"-1\" title=\"Redo (⌘+Y)\">&nbsp;</a><a href=\"javascript:void(\'Find\')\" id=\"cke_370\" onclick=\"CKEDITOR.tools.callFunction(661,this);return false;\" tabindex=\"-1\" title=\"Find\">&nbsp;</a><a href=\"javascript:void(\'Replace\')\" id=\"cke_371\" onclick=\"CKEDITOR.tools.callFunction(664,this);return false;\" tabindex=\"-1\" title=\"Replace\">&nbsp;</a><a href=\"javascript:void(\'Select All\')\" id=\"cke_372\" onclick=\"CKEDITOR.tools.callFunction(667,this);return false;\" tabindex=\"-1\" title=\"Select All\">&nbsp;</a><a href=\"javascript:void(\'Spell Checker\')\" id=\"cke_373\" onclick=\"CKEDITOR.tools.callFunction(670,this);return false;\" tabindex=\"-1\" title=\"Spell Checker\">&nbsp;</a><a href=\"javascript:void(\'Form\')\" id=\"cke_375\" onclick=\"CKEDITOR.tools.callFunction(673,this);return false;\" tabindex=\"-1\" title=\"Form\">&nbsp;</a><a href=\"javascript:void(\'Checkbox\')\" id=\"cke_376\" onclick=\"CKEDITOR.tools.callFunction(676,this);return false;\" tabindex=\"-1\" title=\"Checkbox\">&nbsp;</a><a href=\"javascript:void(\'Radio Button\')\" id=\"cke_377\" onclick=\"CKEDITOR.tools.callFunction(679,this);return false;\" tabindex=\"-1\" title=\"Radio Button\">&nbsp;</a><a href=\"javascript:void(\'Text Field\')\" id=\"cke_378\" onclick=\"CKEDITOR.tools.callFunction(682,this);return false;\" tabindex=\"-1\" title=\"Text Field\">&nbsp;</a><a href=\"javascript:void(\'Textarea\')\" id=\"cke_379\" onclick=\"CKEDITOR.tools.callFunction(685,this);return false;\" tabindex=\"-1\" title=\"Textarea\">&nbsp;</a><a href=\"javascript:void(\'Selection Field\')\" id=\"cke_380\" onclick=\"CKEDITOR.tools.callFunction(688,this);return false;\" tabindex=\"-1\" title=\"Selection Field\">&nbsp;</a><a href=\"javascript:void(\'Button\')\" id=\"cke_381\" onclick=\"CKEDITOR.tools.callFunction(691,this);return false;\" tabindex=\"-1\" title=\"Button\">&nbsp;</a><a href=\"javascript:void(\'Image Button\')\" id=\"cke_382\" onclick=\"CKEDITOR.tools.callFunction(694,this);return false;\" tabindex=\"-1\" title=\"Image Button\">&nbsp;</a><a href=\"javascript:void(\'Hidden Field\')\" id=\"cke_383\" onclick=\"CKEDITOR.tools.callFunction(697,this);return false;\" tabindex=\"-1\" title=\"Hidden Field\">&nbsp;</a><a href=\"javascript:void(\'Bold\')\" id=\"cke_385\" onclick=\"CKEDITOR.tools.callFunction(700,this);return false;\" tabindex=\"-1\" title=\"Bold (⌘+B)\">&nbsp;</a><a href=\"javascript:void(\'Italic\')\" id=\"cke_386\" onclick=\"CKEDITOR.tools.callFunction(703,this);return false;\" tabindex=\"-1\" title=\"Italic (⌘+I)\">&nbsp;</a><a href=\"javascript:void(\'Underline\')\" id=\"cke_387\" onclick=\"CKEDITOR.tools.callFunction(706,this);return false;\" tabindex=\"-1\" title=\"Underline (⌘+U)\">&nbsp;</a><a href=\"javascript:void(\'Strikethrough\')\" id=\"cke_388\" onclick=\"CKEDITOR.tools.callFunction(709,this);return false;\" tabindex=\"-1\" title=\"Strikethrough\">&nbsp;</a><a href=\"javascript:void(\'Subscript\')\" id=\"cke_389\" onclick=\"CKEDITOR.tools.callFunction(712,this);return false;\" tabindex=\"-1\" title=\"Subscript\">&nbsp;</a><a href=\"javascript:void(\'Superscript\')\" id=\"cke_390\" onclick=\"CKEDITOR.tools.callFunction(715,this);return false;\" tabindex=\"-1\" title=\"Superscript\">&nbsp;</a><a href=\"javascript:void(\'Copy Formatting\')\" id=\"cke_391\" onclick=\"CKEDITOR.tools.callFunction(718,this);return false;\" tabindex=\"-1\" title=\"Copy Formatting (⌘+⇧+C)\">&nbsp;</a><a href=\"javascript:void(\'Remove Format\')\" id=\"cke_392\" onclick=\"CKEDITOR.tools.callFunction(721,this);return false;\" tabindex=\"-1\" title=\"Remove Format\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Numbered List\')\" id=\"cke_394\" onclick=\"CKEDITOR.tools.callFunction(724,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Numbered List\">&nbsp;</a><a href=\"javascript:void(\'Insert/Remove Bulleted List\')\" id=\"cke_395\" onclick=\"CKEDITOR.tools.callFunction(727,this);return false;\" tabindex=\"-1\" title=\"Insert/Remove Bulleted List\">&nbsp;</a><a href=\"javascript:void(\'Decrease Indent\')\" id=\"cke_396\" onclick=\"CKEDITOR.tools.callFunction(730,this);return false;\" tabindex=\"-1\" title=\"Decrease Indent\">&nbsp;</a><a href=\"javascript:void(\'Increase Indent\')\" id=\"cke_397\" onclick=\"CKEDITOR.tools.callFunction(733,this);return false;\" tabindex=\"-1\" title=\"Increase Indent\">&nbsp;</a><a href=\"javascript:void(\'Block Quote\')\" id=\"cke_398\" onclick=\"CKEDITOR.tools.callFunction(736,this);return false;\" tabindex=\"-1\" title=\"Block Quote\">&nbsp;</a><a href=\"javascript:void(\'Create Div Container\')\" id=\"cke_399\" onclick=\"CKEDITOR.tools.callFunction(739,this);return false;\" tabindex=\"-1\" title=\"Create Div Container\">&nbsp;</a><a href=\"javascript:void(\'Align Left\')\" id=\"cke_400\" onclick=\"CKEDITOR.tools.callFunction(742,this);return false;\" tabindex=\"-1\" title=\"Align Left\">&nbsp;</a><a href=\"javascript:void(\'Center\')\" id=\"cke_401\" onclick=\"CKEDITOR.tools.callFunction(745,this);return false;\" tabindex=\"-1\" title=\"Center\">&nbsp;</a><a href=\"javascript:void(\'Align Right\')\" id=\"cke_402\" onclick=\"CKEDITOR.tools.callFunction(748,this);return false;\" tabindex=\"-1\" title=\"Align Right\">&nbsp;</a><a href=\"javascript:void(\'Justify\')\" id=\"cke_403\" onclick=\"CKEDITOR.tools.callFunction(751,this);return false;\" tabindex=\"-1\" title=\"Justify\">&nbsp;</a><a href=\"javascript:void(\'Text direction from left to right\')\" id=\"cke_404\" onclick=\"CKEDITOR.tools.callFunction(754,this);return false;\" tabindex=\"-1\" title=\"Text direction from left to right\">&nbsp;</a><a href=\"javascript:void(\'Text direction from right to left\')\" id=\"cke_405\" onclick=\"CKEDITOR.tools.callFunction(757,this);return false;\" tabindex=\"-1\" title=\"Text direction from right to left\">&nbsp;</a><a href=\"javascript:void(\'Set language\')\" id=\"cke_406\" onclick=\"CKEDITOR.tools.callFunction(760,this);return false;\" tabindex=\"-1\" title=\"Set language\">&nbsp;</a><a href=\"javascript:void(\'Link\')\" id=\"cke_408\" onclick=\"CKEDITOR.tools.callFunction(763,this);return false;\" tabindex=\"-1\" title=\"Link (⌘+L)\">&nbsp;</a><a href=\"javascript:void(\'Unlink\')\" id=\"cke_409\" onclick=\"CKEDITOR.tools.callFunction(766,this);return false;\" tabindex=\"-1\" title=\"Unlink\">&nbsp;</a><a href=\"javascript:void(\'Anchor\')\" id=\"cke_410\" onclick=\"CKEDITOR.tools.callFunction(769,this);return false;\" tabindex=\"-1\" title=\"Anchor\">&nbsp;</a><a href=\"javascript:void(\'Image\')\" id=\"cke_412\" onclick=\"CKEDITOR.tools.callFunction(772,this);return false;\" tabindex=\"-1\" title=\"Image\">&nbsp;</a><a href=\"javascript:void(\'Flash\')\" id=\"cke_413\" onclick=\"CKEDITOR.tools.callFunction(775,this);return false;\" tabindex=\"-1\" title=\"Flash\">&nbsp;</a><a href=\"javascript:void(\'Table\')\" id=\"cke_414\" onclick=\"CKEDITOR.tools.callFunction(778,this);return false;\" tabindex=\"-1\" title=\"Table\">&nbsp;</a><a href=\"javascript:void(\'Insert Horizontal Line\')\" id=\"cke_415\" onclick=\"CKEDITOR.tools.callFunction(781,this);return false;\" tabindex=\"-1\" title=\"Insert Horizontal Line\">&nbsp;</a><a href=\"javascript:void(\'Smiley\')\" id=\"cke_416\" onclick=\"CKEDITOR.tools.callFunction(784,this);return false;\" tabindex=\"-1\" title=\"Smiley\">&nbsp;</a><a href=\"javascript:void(\'Insert Special Character\')\" id=\"cke_417\" onclick=\"CKEDITOR.tools.callFunction(787,this);return false;\" tabindex=\"-1\" title=\"Insert Special Character\">&nbsp;</a><a href=\"javascript:void(\'Insert Page Break for Printing\')\" id=\"cke_418\" onclick=\"CKEDITOR.tools.callFunction(790,this);return false;\" tabindex=\"-1\" title=\"Insert Page Break for Printing\">&nbsp;</a><a href=\"javascript:void(\'IFrame\')\" id=\"cke_419\" onclick=\"CKEDITOR.tools.callFunction(793,this);return false;\" tabindex=\"-1\" title=\"IFrame\">&nbsp;</a><a href=\"javascript:void(\'Formatting Styles\')\" onclick=\"CKEDITOR.tools.callFunction(794,this);return false;\" tabindex=\"-1\" title=\"Formatting Styles\">Styles</a><a href=\"javascript:void(\'Paragraph Format\')\" onclick=\"CKEDITOR.tools.callFunction(797,this);return false;\" tabindex=\"-1\" title=\"Paragraph Format\">Normal</a><a href=\"javascript:void(\'Font Name\')\" onclick=\"CKEDITOR.tools.callFunction(800,this);return false;\" tabindex=\"-1\" title=\"Font Name\">Font</a><a href=\"javascript:void(\'Font Size\')\" onclick=\"CKEDITOR.tools.callFunction(803,this);return false;\" tabindex=\"-1\" title=\"Font Size\">Size</a><a href=\"javascript:void(\'Text Color\')\" id=\"cke_422\" onclick=\"CKEDITOR.tools.callFunction(808,this);return false;\" tabindex=\"-1\" title=\"Text Color\">&nbsp;</a><a href=\"javascript:void(\'Background Color\')\" id=\"cke_423\" onclick=\"CKEDITOR.tools.callFunction(811,this);return false;\" tabindex=\"-1\" title=\"Background Color\">&nbsp;</a><a href=\"javascript:void(\'Maximize\')\" id=\"cke_425\" onclick=\"CKEDITOR.tools.callFunction(814,this);return false;\" tabindex=\"-1\" title=\"Maximize\">&nbsp;</a><a href=\"javascript:void(\'Show Blocks\')\" id=\"cke_426\" onclick=\"CKEDITOR.tools.callFunction(817,this);return false;\" tabindex=\"-1\" title=\"Show Blocks\">&nbsp;</a><a href=\"javascript:void(\'About CKEditor 4\')\" id=\"cke_428\" onclick=\"CKEDITOR.tools.callFunction(820,this);return false;\" tabindex=\"-1\" title=\"About CKEditor 4\">&nbsp;</a></p>', '2022-01-16 06:50:20', '2022-03-01 13:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `social_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_fa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `admin_id`, `social_name`, `social_fa`, `social_icon`, `social_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'فيسبوك', 'fab fa-facebook', '', 'https://fb.com', '2022-01-16 12:10:35', '2022-01-16 12:17:49'),
(2, 1, 'twitter', 'fab fa-twitter', '', 'https://twitter.com', '2022-01-16 12:11:01', '2022-01-16 12:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `specialty_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `admin_id`, `specialty_name_ar`, `specialty_name_en`, `occupation_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'قانوني', 'Legal Accountant', 1, '2022-01-16 10:47:36', '2022-01-16 10:53:22'),
(2, 1, 'مالى', 'Financial', 1, '2022-01-16 10:47:51', '2022-01-16 10:47:51'),
(3, 1, 'مهندس شبكات', 'Network Engineer', 5, '2022-01-16 10:56:42', '2022-01-16 10:56:42'),
(4, 1, 'سلع', 'Product', 2, '2022-01-17 09:26:30', '2022-01-17 09:26:30'),
(5, 1, 'عقاري', 'Realestate', 2, '2022-01-17 09:26:51', '2022-01-17 09:26:51'),
(6, 1, 'محاسبة قانونية', 'Legal Accountant', 8, '2022-02-20 08:19:52', '2022-02-20 08:20:51'),
(7, 1, 'محاسبة مالية', 'finance', 8, '2022-02-20 08:20:11', '2022-02-20 08:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_fees`
--

CREATE TABLE `subscription_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `payment_method` enum('electronic_payment','bank_transfer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` bigint(20) UNSIGNED NOT NULL,
  `refused_reason` longtext COLLATE utf8mb4_unicode_ci,
  `electronic_payment_ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` longtext COLLATE utf8mb4_unicode_ci,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_messages`
--

CREATE TABLE `system_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `special_for` enum('orders','orderoffers','order_arbitrator_invoices','accounts','tickets') COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_messages`
--

INSERT INTO `system_messages` (`id`, `special_for`, `message_ar`, `message_en`, `created_at`, `updated_at`) VALUES
(1, 'orders', 'تم رفض الطلب لانه لا يوجد به اي معلومات حقيقة', 'The order was rejected because it did not contain any real information', '2022-03-01 21:03:08', '2022-03-01 21:03:08'),
(2, 'orders', 'تم رفض الطلب لانه لا يوجد رصيد كاف لديك', 'The order was rejected because you do not have enough credit', '2022-03-01 21:03:38', '2022-03-01 21:03:38'),
(3, 'accounts', 'تم رفض حسابك لعدم استيفائه كافة الاوراق او البيانات المطلوبة', 'Your account has been rejected for not completing all the required documents and information', '2022-03-01 21:04:07', '2022-03-01 21:04:07'),
(4, 'tickets', 'تم غلق التذكرة لعدم صحة البيانات الواردة فيها', 'The ticket has been closed because the information contained in it is incorrect', '2022-03-01 21:04:32', '2022-03-01 21:04:50'),
(5, 'order_arbitrator_invoices', 'تم الغاء الفاتورة بسبب عدم استكمال المحكم قرار التحكيم الخاص به', 'The invoice was canceled due to the arbitrator not completing his arbitration award', '2022-03-01 21:05:26', '2022-03-01 21:05:26'),
(6, 'orderoffers', 'تم الغاء الفاتورة لعدم اكمال العرض من قبل مقدم الخدمة', 'The invoice has been canceled due to the failure of the offer by the service provider', '2022-03-01 21:05:51', '2022-03-01 21:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_linked` enum('order','offer','charge','received_money','account','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_department_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_status` enum('opened','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ticket_rate` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_ticket_comment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_departments`
--

CREATE TABLE `ticket_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `department_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_desc_ar` longtext COLLATE utf8mb4_unicode_ci,
  `department_desc_en` longtext COLLATE utf8mb4_unicode_ci,
  `department_status` enum('show','hide') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_departments`
--

INSERT INTO `ticket_departments` (`id`, `admin_id`, `department_name_ar`, `department_name_en`, `dep_icon`, `department_desc_ar`, `department_desc_en`, `department_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'الحسابات', 'Accounts', '', NULL, NULL, 'show', '2022-01-30 12:07:09', '2022-01-30 12:07:09'),
(2, 1, 'شحن الرصيد', 'شحن الرصيد', '', NULL, NULL, 'show', '2022-01-30 12:07:19', '2022-01-30 12:07:19'),
(3, 1, 'سحب الرصيد', 'سحب الرصيد', '', NULL, NULL, 'show', '2022-01-30 12:07:25', '2022-01-30 12:07:25'),
(4, 1, 'اخري', 'other', '', NULL, NULL, 'show', '2022-01-30 12:07:36', '2022-01-30 12:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replays`
--

CREATE TABLE `ticket_replays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `replay` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen_status` enum('seen','unseen') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unseen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verify` enum('pending','verified') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `mobile` bigint(20) DEFAULT NULL,
  `mobile_verify` enum('pending','verified') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email_verify_code` bigint(20) DEFAULT NULL,
  `mobile_verify_code` bigint(20) DEFAULT NULL,
  `current_balance` decimal(20,2) NOT NULL DEFAULT '0.00',
  `suspended_balance` decimal(20,2) NOT NULL DEFAULT '0.00',
  `photo_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_type` enum('user','vendor','employee') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` enum('individual','company') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` bigint(20) DEFAULT NULL,
  `id_type` enum('national_id','iqama','passport') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status` enum('pending','verified','refused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `unseen_msg` bigint(20) DEFAULT NULL,
  `unseen_notification` bigint(20) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci,
  `birth_date` date DEFAULT NULL,
  `account_status` enum('pending','active','refused','ban') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `ban_reason` longtext COLLATE utf8mb4_unicode_ci,
  `refused_reason` longtext COLLATE utf8mb4_unicode_ci,
  `ban_end_at` date DEFAULT NULL,
  `system_comment` longtext COLLATE utf8mb4_unicode_ci,
  `subscribe_end_at` date DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `add_offer` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `disable_adding_offer_reason` longtext COLLATE utf8mb4_unicode_ci,
  `add_request` enum('enable','disable') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_adding_request_reason` longtext COLLATE utf8mb4_unicode_ci,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_overall` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin_id`, `first_name`, `middle_name`, `last_name`, `name`, `email`, `password`, `email_verified_at`, `email_verify`, `mobile`, `mobile_verify`, `email_verify_code`, `mobile_verify_code`, `current_balance`, `suspended_balance`, `photo_profile`, `membership_type`, `account_type`, `id_number`, `id_type`, `id_status`, `unseen_msg`, `unseen_notification`, `country_id`, `city_id`, `address`, `lng`, `lat`, `bio`, `birth_date`, `account_status`, `ban_reason`, `refused_reason`, `ban_end_at`, `system_comment`, `subscribe_end_at`, `company_id`, `add_offer`, `disable_adding_offer_reason`, `add_request`, `disable_adding_request_reason`, `gender`, `rate_overall`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'محمود', 'محمد', 'ابراهيم', 'محمود محمد ابراهيم', 'test@test.com', '$2y$10$dAEVVdhvKxj47I1YbPY3buKLrWe2BZ7GQLSdHAmCtPMX8Cg9HKztO', NULL, 'pending', 12343546, 'pending', 2322, 32211, 2174131.00, 0.00, 'users/1/hTc1esljRhOC2QUIb34yKjegwVnyDM5bzqlzz3il.png', 'user', 'individual', 123454564575678, 'national_id', 'verified', NULL, NULL, 1, 1, 'test address', NULL, NULL, NULL, '2022-02-02', 'active', NULL, NULL, '2022-02-02', NULL, '2022-02-02', NULL, 'enable', NULL, 'enable', NULL, 'male', NULL, NULL, '2022-02-02 11:13:06', '2022-03-02 23:09:53'),
(4, 1, 'Ahmed', 'Mahmoud', 'Ibrahim', 'Ahmed Mahmoud Ibrahim', 'ahmed@test.com', '$2y$10$IH6uncAULRLZVTSS9OwtseXwj17abx1HKhXhQUBha0SVyhupIGP.e', NULL, 'verified', 7456534645, 'pending', NULL, 5553, 0.00, 0.00, 'users/4/vqkKpcDfK4Wa787KMjGmJqkGS0FZDlwY3rRrp0Y2.png', 'vendor', 'individual', 6645423423, 'iqama', 'pending', NULL, NULL, 1, 1, 'test address', NULL, NULL, 'dfgdfg', '2022-02-02', 'active', NULL, NULL, '2022-02-02', NULL, '2022-02-02', NULL, 'enable', NULL, 'enable', NULL, 'male', NULL, NULL, '2022-02-02 12:08:46', '2022-03-01 20:43:05'),
(5, 1, 'عبد الله', 'العقيل', 'سامر', 'عبد الله العقيل سامر', 'Abdullah@test.com', '$2y$10$gyXIT6s7uwNhpjrFT4y/Y.8cwVSGnYFm2/Zs9jU7Am3gvPYSdH44.', NULL, 'verified', 5555555555, 'verified', 234, 234, 0.00, 0.00, 'users/5/3rjar0jnCWsAEbhoXQmprndr3F5Su39U9MFBXsox.png', 'vendor', 'company', 3434343434, 'national_id', 'verified', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, '2022-02-20', 'active', NULL, NULL, '2022-02-20', NULL, '2022-02-20', NULL, 'disable', NULL, 'disable', NULL, 'male', NULL, NULL, '2022-02-20 09:09:27', '2022-02-20 09:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_commercials`
--

CREATE TABLE `user_commercials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commercial_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_end_at` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `user_job_id` bigint(20) UNSIGNED NOT NULL,
  `occupation_id` bigint(20) UNSIGNED NOT NULL,
  `specialtie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_commercials`
--

INSERT INTO `user_commercials` (`id`, `commercial_id`, `commercial_file`, `commercial_end_at`, `user_id`, `comment`, `user_job_id`, `occupation_id`, `specialtie_id`, `created_at`, `updated_at`) VALUES
(3, '23423', 'usercommercials/4/4c2V4MB4CsVPqLNsWx0MT6CcYT9WBRwqINZJwX32.png', '2022-02-14', 4, 'test test', 8, 1, 1, '2022-02-14 16:49:14', '2022-02-14 16:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_experiences`
--

CREATE TABLE `user_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `experience_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `user_job_id` bigint(20) UNSIGNED NOT NULL,
  `occupation_id` bigint(20) UNSIGNED NOT NULL,
  `specialtie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_experiences`
--

INSERT INTO `user_experiences` (`id`, `experience_name`, `experience_file`, `user_id`, `comment`, `user_job_id`, `occupation_id`, `specialtie_id`, `created_at`, `updated_at`) VALUES
(2, 'test test', 'userexperiences/4/xZjMOJWRsUfCGvGPG84n61cepWtbIXxvJrBr8I90.png', 4, 'test', 8, 1, 1, '2022-02-14 16:49:14', '2022-02-14 16:49:14'),
(3, 'test test', 'userexperiences/5/Vt6NM5gdxAl0LP89ck0nMRklKSP8QxbNAZ5V1d6U.jpg', 5, 'test test', 10, 8, 6, '2022-02-20 09:10:29', '2022-02-20 09:10:29'),
(4, 'sadadsf', 'userexperiences/5/acEW3jpvrRB4ewFR1eUy0jVRwaoNy3A3SRxj5pE4.jpg', 5, 'sadfsaf', 11, 8, 7, '2022-02-20 09:11:05', '2022-02-20 09:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_jobs`
--

CREATE TABLE `user_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `occupation_id` bigint(20) UNSIGNED NOT NULL,
  `specialtie_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_jobs`
--

INSERT INTO `user_jobs` (`id`, `occupation_id`, `specialtie_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 4, '2022-02-14 16:49:14', '2022-02-14 16:59:23'),
(9, 2, 4, 4, '2022-02-14 18:42:28', '2022-02-14 18:42:28'),
(10, 8, 6, 5, '2022-02-20 09:10:29', '2022-02-20 09:10:29'),
(11, 8, 7, 5, '2022-02-20 09:11:05', '2022-02-20 09:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_licenses`
--

CREATE TABLE `user_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `license_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `license_end_at` date DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `user_job_id` bigint(20) UNSIGNED NOT NULL,
  `occupation_id` bigint(20) UNSIGNED NOT NULL,
  `specialtie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_licenses`
--

INSERT INTO `user_licenses` (`id`, `license_name`, `license_file`, `user_id`, `license_end_at`, `comment`, `user_job_id`, `occupation_id`, `specialtie_id`, `created_at`, `updated_at`) VALUES
(2, 'test', 'userlicenses/4/3fhxbYhJMdyruIEDd39rR6Et1Nh9jX7wm13iLn5o.png', 4, '2022-02-20', 'test', 8, 1, 1, '2022-02-14 16:49:14', '2022-02-14 16:49:14'),
(3, 'test test', 'userlicenses/4/KXRQMzXAMhenL0TUAXzxoUZiCo8LySbNRh9GJCjh.png', 4, '2022-02-14', 'test test', 9, 2, 4, '2022-02-14 18:42:29', '2022-02-14 18:42:29'),
(4, 'test test', 'userlicenses/5/obPvLNxYC6EhKKYurxZamTT4AnborpED6cbbhvKI.jpg', 5, '2022-02-27', 'test test', 10, 8, 6, '2022-02-20 09:10:29', '2022-02-20 09:10:29'),
(5, 'sdsd', 'userlicenses/5/4t1ijuqMrJ65gLOH7aRstBte8ZVniYAejRXTnq6Q.png', 5, '2022-02-28', 'sds', 11, 8, 7, '2022-02-20 09:11:05', '2022-02-20 09:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_qualifications`
--

CREATE TABLE `user_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qualification_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `user_job_id` bigint(20) UNSIGNED NOT NULL,
  `occupation_id` bigint(20) UNSIGNED NOT NULL,
  `specialtie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_qualifications`
--

INSERT INTO `user_qualifications` (`id`, `qualification_name`, `qualification_file`, `user_id`, `comment`, `user_job_id`, `occupation_id`, `specialtie_id`, `created_at`, `updated_at`) VALUES
(2, 'test test', 'userqualifications/4/Wp3xNtqv01AJFd2aDijjZ8pVTu50dQwgtgPObop7.png', 4, 'test test', 8, 1, 1, '2022-02-14 16:49:14', '2022-02-14 16:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_packages`
--

CREATE TABLE `vendor_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_status` enum('show','hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `number_purchases` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_package_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_end_at` date DEFAULT NULL,
  `package_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_packages`
--

INSERT INTO `vendor_packages` (`id`, `user_id`, `package_title`, `package_content`, `package_status`, `number_purchases`, `duration_package_days`, `package_end_at`, `package_price`, `created_at`, `updated_at`) VALUES
(1, 4, 'test', 'test test', 'show', NULL, '50', '2022-03-25', 3442.00, '2022-02-03 05:52:39', '2022-02-03 05:52:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_groups_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_group_roles_admin_groups_id_foreign` (`admin_groups_id`);

--
-- Indexes for table `balance_recharges`
--
ALTER TABLE `balance_recharges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_recharges_admin_id_foreign` (`admin_id`),
  ADD KEY `balance_recharges_user_id_foreign` (`user_id`);

--
-- Indexes for table `balance_withdrawals`
--
ALTER TABLE `balance_withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balance_withdrawals_admin_id_foreign` (`admin_id`),
  ADD KEY `balance_withdrawals_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_admin_id_foreign` (`admin_id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_admin_id_foreign` (`admin_id`),
  ADD KEY `contacts_replay_by_foreign` (`replay_by`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_parent_foreign` (`parent`);

--
-- Indexes for table `department_specialties`
--
ALTER TABLE `department_specialties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_specialties_occupation_id_foreign` (`occupation_id`),
  ADD KEY `department_specialties_specialtie_id_foreign` (`specialtie_id`),
  ADD KEY `department_specialties_department_id_foreign` (`department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_admin_id_foreign` (`admin_id`),
  ADD KEY `files_user_id_foreign` (`user_id`);

--
-- Indexes for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_a_qs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `occupations_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_admin_id_foreign` (`admin_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_main_order_id_foreign` (`main_order_id`),
  ADD KEY `orders_order_type_id_foreign` (`order_type_id`),
  ADD KEY `orders_department_id_foreign` (`department_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`),
  ADD KEY `orders_city_id_foreign` (`city_id`);

--
-- Indexes for table `order_arbitrators`
--
ALTER TABLE `order_arbitrators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_arbitrators_order_id_foreign` (`order_id`),
  ADD KEY `order_arbitrators_arbitrator_id_foreign` (`arbitrator_id`);

--
-- Indexes for table `order_arbitrator_invoices`
--
ALTER TABLE `order_arbitrator_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_arbitrator_invoices_order_id_foreign` (`order_id`),
  ADD KEY `order_arbitrator_invoices_arbitrator_id_foreign` (`arbitrator_id`),
  ADD KEY `order_arbitrator_invoices_order_arbitrator_id_foreign` (`order_arbitrator_id`),
  ADD KEY `order_arbitrator_invoices_vendor_id_foreign` (`vendor_id`),
  ADD KEY `order_arbitrator_invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_case_againsts`
--
ALTER TABLE `order_case_againsts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_case_againsts_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_offers`
--
ALTER TABLE `order_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_offers_order_id_foreign` (`order_id`),
  ADD KEY `order_offers_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `order_offer_invoices`
--
ALTER TABLE `order_offer_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_offer_invoices_order_id_foreign` (`order_id`),
  ADD KEY `order_offer_invoices_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `order_types`
--
ALTER TABLE `order_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_types_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `order_vendors`
--
ALTER TABLE `order_vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_vendors_order_id_foreign` (`order_id`),
  ADD KEY `order_vendors_user_id_foreign` (`user_id`);

--
-- Indexes for table `package_requests`
--
ALTER TABLE `package_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_requests_package_id_foreign` (`package_id`),
  ADD KEY `package_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socials_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialties_admin_id_foreign` (`admin_id`),
  ADD KEY `specialties_occupation_id_foreign` (`occupation_id`);

--
-- Indexes for table `subscription_fees`
--
ALTER TABLE `subscription_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_fees_admin_id_foreign` (`admin_id`),
  ADD KEY `subscription_fees_user_id_foreign` (`user_id`);

--
-- Indexes for table `system_messages`
--
ALTER TABLE `system_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_ticket_department_id_foreign` (`ticket_department_id`);

--
-- Indexes for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_departments_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `ticket_replays`
--
ALTER TABLE `ticket_replays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replays_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_replays_user_id_foreign` (`user_id`),
  ADD KEY `ticket_replays_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_id_number_unique` (`id_number`),
  ADD KEY `users_admin_id_foreign` (`admin_id`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_city_id_foreign` (`city_id`),
  ADD KEY `users_company_id_foreign` (`company_id`);

--
-- Indexes for table `user_commercials`
--
ALTER TABLE `user_commercials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_commercials_user_id_foreign` (`user_id`),
  ADD KEY `user_commercials_user_job_id_foreign` (`user_job_id`),
  ADD KEY `user_commercials_occupation_id_foreign` (`occupation_id`),
  ADD KEY `user_commercials_specialtie_id_foreign` (`specialtie_id`);

--
-- Indexes for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_experiences_user_id_foreign` (`user_id`),
  ADD KEY `user_experiences_user_job_id_foreign` (`user_job_id`),
  ADD KEY `user_experiences_occupation_id_foreign` (`occupation_id`),
  ADD KEY `user_experiences_specialtie_id_foreign` (`specialtie_id`);

--
-- Indexes for table `user_jobs`
--
ALTER TABLE `user_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_jobs_occupation_id_foreign` (`occupation_id`),
  ADD KEY `user_jobs_specialtie_id_foreign` (`specialtie_id`),
  ADD KEY `user_jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_licenses`
--
ALTER TABLE `user_licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_licenses_user_id_foreign` (`user_id`),
  ADD KEY `user_licenses_user_job_id_foreign` (`user_job_id`),
  ADD KEY `user_licenses_occupation_id_foreign` (`occupation_id`),
  ADD KEY `user_licenses_specialtie_id_foreign` (`specialtie_id`);

--
-- Indexes for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_qualifications_user_id_foreign` (`user_id`),
  ADD KEY `user_qualifications_user_job_id_foreign` (`user_job_id`),
  ADD KEY `user_qualifications_occupation_id_foreign` (`occupation_id`),
  ADD KEY `user_qualifications_specialtie_id_foreign` (`specialtie_id`);

--
-- Indexes for table `vendor_packages`
--
ALTER TABLE `vendor_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_packages_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_groups`
--
ALTER TABLE `admin_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `balance_recharges`
--
ALTER TABLE `balance_recharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balance_withdrawals`
--
ALTER TABLE `balance_withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department_specialties`
--
ALTER TABLE `department_specialties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_arbitrators`
--
ALTER TABLE `order_arbitrators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_arbitrator_invoices`
--
ALTER TABLE `order_arbitrator_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_case_againsts`
--
ALTER TABLE `order_case_againsts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_offers`
--
ALTER TABLE `order_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_offer_invoices`
--
ALTER TABLE `order_offer_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_types`
--
ALTER TABLE `order_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_vendors`
--
ALTER TABLE `order_vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `package_requests`
--
ALTER TABLE `package_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscription_fees`
--
ALTER TABLE `subscription_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_messages`
--
ALTER TABLE `system_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_replays`
--
ALTER TABLE `ticket_replays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_commercials`
--
ALTER TABLE `user_commercials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_experiences`
--
ALTER TABLE `user_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_jobs`
--
ALTER TABLE `user_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_licenses`
--
ALTER TABLE `user_licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_packages`
--
ALTER TABLE `vendor_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_groups`
--
ALTER TABLE `admin_groups`
  ADD CONSTRAINT `admin_groups_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_group_roles`
--
ALTER TABLE `admin_group_roles`
  ADD CONSTRAINT `admin_group_roles_admin_groups_id_foreign` FOREIGN KEY (`admin_groups_id`) REFERENCES `admin_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `balance_recharges`
--
ALTER TABLE `balance_recharges`
  ADD CONSTRAINT `balance_recharges_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `balance_recharges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `balance_withdrawals`
--
ALTER TABLE `balance_withdrawals`
  ADD CONSTRAINT `balance_withdrawals_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `balance_withdrawals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_replay_by_foreign` FOREIGN KEY (`replay_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_specialties`
--
ALTER TABLE `department_specialties`
  ADD CONSTRAINT `department_specialties_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_specialties_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_specialties_specialtie_id_foreign` FOREIGN KEY (`specialtie_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  ADD CONSTRAINT `f_a_qs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `occupations`
--
ALTER TABLE `occupations`
  ADD CONSTRAINT `occupations_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_main_order_id_foreign` FOREIGN KEY (`main_order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_order_type_id_foreign` FOREIGN KEY (`order_type_id`) REFERENCES `order_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_arbitrators`
--
ALTER TABLE `order_arbitrators`
  ADD CONSTRAINT `order_arbitrators_arbitrator_id_foreign` FOREIGN KEY (`arbitrator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_arbitrators_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_arbitrator_invoices`
--
ALTER TABLE `order_arbitrator_invoices`
  ADD CONSTRAINT `order_arbitrator_invoices_arbitrator_id_foreign` FOREIGN KEY (`arbitrator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_arbitrator_invoices_order_arbitrator_id_foreign` FOREIGN KEY (`order_arbitrator_id`) REFERENCES `order_arbitrators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_arbitrator_invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_arbitrator_invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_arbitrator_invoices_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_case_againsts`
--
ALTER TABLE `order_case_againsts`
  ADD CONSTRAINT `order_case_againsts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_offers`
--
ALTER TABLE `order_offers`
  ADD CONSTRAINT `order_offers_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_offers_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_offer_invoices`
--
ALTER TABLE `order_offer_invoices`
  ADD CONSTRAINT `order_offer_invoices_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `order_offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_offer_invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_types`
--
ALTER TABLE `order_types`
  ADD CONSTRAINT `order_types_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_vendors`
--
ALTER TABLE `order_vendors`
  ADD CONSTRAINT `order_vendors_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_requests`
--
ALTER TABLE `package_requests`
  ADD CONSTRAINT `package_requests_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `vendor_packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specialties`
--
ALTER TABLE `specialties`
  ADD CONSTRAINT `specialties_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specialties_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription_fees`
--
ALTER TABLE `subscription_fees`
  ADD CONSTRAINT `subscription_fees_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscription_fees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ticket_department_id_foreign` FOREIGN KEY (`ticket_department_id`) REFERENCES `ticket_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_departments`
--
ALTER TABLE `ticket_departments`
  ADD CONSTRAINT `ticket_departments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_replays`
--
ALTER TABLE `ticket_replays`
  ADD CONSTRAINT `ticket_replays_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_replays_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_replays_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_commercials`
--
ALTER TABLE `user_commercials`
  ADD CONSTRAINT `user_commercials_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_commercials_specialtie_id_foreign` FOREIGN KEY (`specialtie_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_commercials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_commercials_user_job_id_foreign` FOREIGN KEY (`user_job_id`) REFERENCES `user_jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_experiences`
--
ALTER TABLE `user_experiences`
  ADD CONSTRAINT `user_experiences_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_experiences_specialtie_id_foreign` FOREIGN KEY (`specialtie_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_experiences_user_job_id_foreign` FOREIGN KEY (`user_job_id`) REFERENCES `user_jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_jobs`
--
ALTER TABLE `user_jobs`
  ADD CONSTRAINT `user_jobs_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_jobs_specialtie_id_foreign` FOREIGN KEY (`specialtie_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_licenses`
--
ALTER TABLE `user_licenses`
  ADD CONSTRAINT `user_licenses_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_licenses_specialtie_id_foreign` FOREIGN KEY (`specialtie_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_licenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_licenses_user_job_id_foreign` FOREIGN KEY (`user_job_id`) REFERENCES `user_jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD CONSTRAINT `user_qualifications_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_qualifications_specialtie_id_foreign` FOREIGN KEY (`specialtie_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_qualifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_qualifications_user_job_id_foreign` FOREIGN KEY (`user_job_id`) REFERENCES `user_jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_packages`
--
ALTER TABLE `vendor_packages`
  ADD CONSTRAINT `vendor_packages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
