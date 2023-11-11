-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 10:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yattarealestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_types`
--

CREATE TABLE `ad_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_types`
--

INSERT INTO `ad_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'شراء', '2023-10-18 13:12:13', '2023-10-19 15:58:36'),
(3, 'أجار', '2023-10-18 13:12:21', '2023-10-19 15:58:26'),
(4, 'بيع', '2023-10-18 13:13:03', '2023-10-19 15:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `title`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'رسالة 1', 'وصف 1', 2, '2023-10-18 16:40:41', '2023-10-18 16:40:41'),
(2, 'رسالة 2', 'وصف 2', 2, '2023-10-18 16:44:00', '2023-10-18 16:44:00'),
(3, 'رسالة 3', 'وصف 3', 2, '2023-10-18 16:48:39', '2023-10-18 16:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'شيكل', '2023-10-17 15:16:44', '2023-10-17 15:16:44'),
(2, 'دولار', '2023-10-17 15:16:53', '2023-10-17 15:16:53'),
(3, 'دينار', '2023-10-17 15:17:03', '2023-10-17 15:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 0, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 10, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(24, 10, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(25, 10, 'place', 'text', 'Place', 0, 1, 1, 1, 1, 1, '{}', 4),
(26, 10, 'space', 'text', 'Space', 0, 1, 1, 1, 1, 1, '{}', 5),
(30, 10, 'price', 'text', 'Price', 0, 1, 1, 1, 1, 1, '{}', 9),
(33, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 12),
(34, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(35, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 0, 1, 1, 1, 1, '{}', 6),
(36, 1, 'id_number', 'text', 'Id Number', 0, 0, 1, 1, 1, 1, '{}', 12),
(37, 1, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 13),
(38, 10, 'image', 'text', 'Image', 0, 0, 1, 1, 1, 1, '{}', 6),
(42, 10, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 12),
(44, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(45, 11, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(46, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(47, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(48, 10, 'real_estate_belongsto_currency_relationship', 'relationship', 'currencies', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Currency\",\"table\":\"currencies\",\"type\":\"belongsTo\",\"column\":\"currency_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"currencies\",\"pivot\":\"0\",\"taggable\":\"0\"}', 15),
(49, 10, 'currency_id', 'text', 'Currency Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(50, 10, 'real_estate_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"currencies\",\"pivot\":\"0\",\"taggable\":\"0\"}', 16),
(52, 10, 'ad_id', 'text', 'Ad Id', 0, 1, 1, 1, 1, 1, '{}', 8),
(53, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(54, 15, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(55, 10, 'real_estate_belongsto_ad_type_relationship', 'relationship', 'ad_types', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\AdType\",\"table\":\"ad_types\",\"type\":\"belongsTo\",\"column\":\"ad_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"ad_types\",\"pivot\":\"0\",\"taggable\":\"0\"}', 17),
(56, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 16, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(58, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(59, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(60, 10, 'real_estate_belongsto_realestates_type_relationship', 'relationship', 'realestates_types', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\RealestatesType\",\"table\":\"realestates_types\",\"type\":\"belongsTo\",\"column\":\"type_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"ad_types\",\"pivot\":\"0\",\"taggable\":\"0\"}', 18),
(61, 10, 'type_id', 'text', 'Type Id', 0, 1, 1, 1, 1, 1, '{}', 7),
(62, 17, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(63, 17, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 2),
(64, 17, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(65, 17, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(66, 17, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(67, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(68, 17, 'contactu_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"ad_types\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_name_singular` varchar(255) NOT NULL,
  `display_name_plural` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `policy_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2023-10-14 17:28:19', '2023-10-15 11:26:52'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(10, 'real_estates', 'real-estates', 'Real Estate', 'Real Estates', 'voyager-photo', 'App\\Models\\RealEstate', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2023-10-15 10:06:43', '2023-10-18 13:31:39'),
(11, 'currencies', 'currencies', 'Currency', 'Currencies', 'voyager-dollar', 'App\\Models\\Currency', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2023-10-17 15:13:37', '2023-10-17 15:13:37'),
(15, 'ad_types', 'ad-types', 'Ad Type', 'Ad Types', 'voyager-list-add', 'App\\Models\\AdType', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2023-10-18 13:07:27', '2023-10-18 13:07:27'),
(16, 'realestates_types', 'realestates-types', 'Realestates Type', 'Realestates Types', 'voyager-list', 'App\\Models\\RealestatesType', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2023-10-18 13:17:07', '2023-10-18 13:17:07'),
(17, 'contactus', 'contactus', 'Contactu', 'Contactus', 'voyager-chat', 'App\\Models\\Contactu', NULL, NULL, NULL, 1, 1, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2023-10-18 16:02:21', '2023-10-18 16:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-10-14 17:28:19', '2023-10-14 17:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `parameters` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2023-10-14 17:28:19', '2023-10-14 17:28:19', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2023-10-14 17:28:19', '2023-10-14 17:28:19', 'voyager.settings.index', NULL),
(15, 1, 'Real Estates', '', '_self', 'voyager-photo', NULL, NULL, 15, '2023-10-15 10:06:43', '2023-10-15 10:06:43', 'voyager.real-estates.index', NULL),
(16, 1, 'Currencies', '', '_self', 'voyager-dollar', NULL, NULL, 16, '2023-10-17 15:13:37', '2023-10-17 15:13:37', 'voyager.currencies.index', NULL),
(19, 1, 'Ad Types', '', '_self', 'voyager-list-add', NULL, NULL, 17, '2023-10-18 13:07:27', '2023-10-18 13:07:27', 'voyager.ad-types.index', NULL),
(20, 1, 'Realestates Types', '', '_self', 'voyager-list', NULL, NULL, 18, '2023-10-18 13:17:07', '2023-10-18 13:17:07', 'voyager.realestates-types.index', NULL),
(21, 1, 'Contactus', '', '_self', 'voyager-chat', NULL, NULL, 19, '2023-10-18 16:02:21', '2023-10-18 16:02:21', 'voyager.contactus.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2023_10_15_150428_add_image_to_real_estates', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(2, 'browse_bread', NULL, '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(3, 'browse_database', NULL, '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(4, 'browse_media', NULL, '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(5, 'browse_compass', NULL, '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(6, 'browse_menus', 'menus', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(7, 'read_menus', 'menus', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(8, 'edit_menus', 'menus', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(9, 'add_menus', 'menus', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(10, 'delete_menus', 'menus', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(11, 'browse_roles', 'roles', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(12, 'read_roles', 'roles', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(13, 'edit_roles', 'roles', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(14, 'add_roles', 'roles', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(15, 'delete_roles', 'roles', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(16, 'browse_users', 'users', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(17, 'read_users', 'users', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(18, 'edit_users', 'users', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(19, 'add_users', 'users', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(20, 'delete_users', 'users', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(21, 'browse_settings', 'settings', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(22, 'read_settings', 'settings', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(23, 'edit_settings', 'settings', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(24, 'add_settings', 'settings', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(25, 'delete_settings', 'settings', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(46, 'browse_real_estates', 'real_estates', '2023-10-15 10:06:43', '2023-10-15 10:06:43'),
(47, 'read_real_estates', 'real_estates', '2023-10-15 10:06:43', '2023-10-15 10:06:43'),
(48, 'edit_real_estates', 'real_estates', '2023-10-15 10:06:43', '2023-10-15 10:06:43'),
(49, 'add_real_estates', 'real_estates', '2023-10-15 10:06:43', '2023-10-15 10:06:43'),
(50, 'delete_real_estates', 'real_estates', '2023-10-15 10:06:43', '2023-10-15 10:06:43'),
(51, 'browse_currencies', 'currencies', '2023-10-17 15:13:37', '2023-10-17 15:13:37'),
(52, 'read_currencies', 'currencies', '2023-10-17 15:13:37', '2023-10-17 15:13:37'),
(53, 'edit_currencies', 'currencies', '2023-10-17 15:13:37', '2023-10-17 15:13:37'),
(54, 'add_currencies', 'currencies', '2023-10-17 15:13:37', '2023-10-17 15:13:37'),
(55, 'delete_currencies', 'currencies', '2023-10-17 15:13:37', '2023-10-17 15:13:37'),
(66, 'browse_ad_types', 'ad_types', '2023-10-18 13:07:27', '2023-10-18 13:07:27'),
(67, 'read_ad_types', 'ad_types', '2023-10-18 13:07:27', '2023-10-18 13:07:27'),
(68, 'edit_ad_types', 'ad_types', '2023-10-18 13:07:27', '2023-10-18 13:07:27'),
(69, 'add_ad_types', 'ad_types', '2023-10-18 13:07:27', '2023-10-18 13:07:27'),
(70, 'delete_ad_types', 'ad_types', '2023-10-18 13:07:27', '2023-10-18 13:07:27'),
(71, 'browse_realestates_types', 'realestates_types', '2023-10-18 13:17:07', '2023-10-18 13:17:07'),
(72, 'read_realestates_types', 'realestates_types', '2023-10-18 13:17:07', '2023-10-18 13:17:07'),
(73, 'edit_realestates_types', 'realestates_types', '2023-10-18 13:17:07', '2023-10-18 13:17:07'),
(74, 'add_realestates_types', 'realestates_types', '2023-10-18 13:17:07', '2023-10-18 13:17:07'),
(75, 'delete_realestates_types', 'realestates_types', '2023-10-18 13:17:07', '2023-10-18 13:17:07'),
(76, 'browse_contactus', 'contactus', '2023-10-18 16:02:21', '2023-10-18 16:02:21'),
(77, 'read_contactus', 'contactus', '2023-10-18 16:02:21', '2023-10-18 16:02:21'),
(78, 'edit_contactus', 'contactus', '2023-10-18 16:02:21', '2023-10-18 16:02:21'),
(79, 'add_contactus', 'contactus', '2023-10-18 16:02:21', '2023-10-18 16:02:21'),
(80, 'delete_contactus', 'contactus', '2023-10-18 16:02:21', '2023-10-18 16:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
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
(13, 1),
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
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realestates_types`
--

CREATE TABLE `realestates_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `realestates_types`
--

INSERT INTO `realestates_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'شقة', '2023-10-18 13:18:00', '2023-10-19 15:59:02'),
(2, 'بيت مستقل', '2023-10-18 13:18:00', '2023-10-19 16:22:30'),
(3, 'محل', '2023-10-18 13:18:00', '2023-10-19 15:59:11'),
(4, 'مكتب', '2023-10-19 15:59:20', '2023-10-19 15:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `real_estates`
--

CREATE TABLE `real_estates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `space` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `real_estates`
--

INSERT INTO `real_estates` (`id`, `title`, `description`, `place`, `space`, `image`, `type_id`, `ad_id`, `price`, `created_at`, `updated_at`, `user_id`, `currency_id`) VALUES
(42, 'بيع بيت مستقل', 'بيع بيت مستقل', 'البركة', 220, 'images/October2023/653b85cbac429.jpg', 1, 2, 100000, '2023-10-27 06:41:31', '2023-10-27 06:41:31', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2023-10-14 17:28:19', '2023-10-14 17:28:19'),
(2, 'user', 'Normal User', '2023-10-14 17:28:19', '2023-10-14 17:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `settings` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_number` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `id_number`, `phone`) VALUES
(1, 1, 'YattaRealEstate', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$Q3zbN.44oqzL2wfuFYCDHuD/y774qr9aC5gnovLcdubqujPhQWZWi', NULL, NULL, '2023-10-14 17:29:55', '2023-10-14 17:29:55', NULL, NULL),
(2, 2, 'ماريانا الغافي', 'mariana1@gmail.com', 'users/default.png', NULL, '$2y$10$MDi0ZwFTWTxauw5r/1YOq.PgzR8EzTBEhb085hlk6K/LJo8sy4CTC', NULL, NULL, '2023-10-15 11:25:43', '2023-10-27 05:37:24', 123456789, '0561234566');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_types`
--
ALTER TABLE `ad_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `realestates_types`
--
ALTER TABLE `realestates_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_estates`
--
ALTER TABLE `real_estates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_types`
--
ALTER TABLE `ad_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realestates_types`
--
ALTER TABLE `realestates_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `real_estates`
--
ALTER TABLE `real_estates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
