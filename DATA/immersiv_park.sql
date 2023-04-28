-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2022 at 06:57 AM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immersiv_park`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(10) UNSIGNED NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `short_name`, `name`, `slug`, `meta_tags`, `meta_description`, `description`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(2, 'BRS', 'Bristol', 'bristol', 'Bristol', 'Bristol', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, '2019-01-09', '00:47:04', 1, '2019-01-09', '00:48:32', '2019-01-08 19:47:04', '2019-01-08 19:48:32'),
(3, 'EXT', 'Exeter', 'exeter', 'Exeter', 'Exeter', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, '2019-01-09', '00:49:59', 1, '2019-01-09', '00:53:48', '2019-01-08 19:49:59', '2019-01-08 19:53:48'),
(4, 'EMA', 'East Midlands', 'east-midlands', 'East Midlands', 'East Midlands', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, '2019-01-09', '00:51:24', 1, '2019-01-09', '00:53:54', '2019-01-08 19:51:24', '2019-01-08 19:53:54'),
(5, 'LTN', 'Luton', 'luton', 'Luton', 'Luton', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, '2019-01-09', '00:51:52', 1, '2019-01-09', '00:51:52', '2019-01-08 19:51:52', '2019-01-08 19:51:52'),
(6, 'MAN', 'Manchester', 'manchester', 'Manchester', 'Manchester', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, '2019-01-09', '00:52:31', 1, '2019-01-09', '00:52:31', '2019-01-08 19:52:31', '2019-01-08 19:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `airport_terminals`
--

CREATE TABLE `airport_terminals` (
  `id` int(10) UNSIGNED NOT NULL,
  `airport_id` int(10) UNSIGNED DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airport_terminals`
--

INSERT INTO `airport_terminals` (`id`, `airport_id`, `sort_order`, `title`, `slug`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 'Terminal 1', 'terminal-1', 1, 1, '2019-01-15', '21:05:06', 1, '2019-01-15', '21:10:06', '2019-01-15 16:05:06', '2019-01-15 11:11:05'),
(6, 3, 3, 'Terminal 3', 'terminal-3', 1, 1, '2019-01-15', '21:09:52', 1, '2019-01-15', '21:10:19', '2019-01-15 16:09:52', '2019-01-15 11:11:23'),
(7, 3, 2, 'Terminal 2', 'terminal-2', 1, 1, '2019-01-15', '21:10:33', 1, '2019-01-15', '21:10:33', '2019-01-15 16:10:33', '2019-01-15 11:11:23'),
(8, 4, 1, 'T 1', 't-1', 1, 1, '2019-01-15', '21:28:22', 1, '2019-01-15', '21:28:33', '2019-01-15 16:28:22', '2019-01-15 11:28:58'),
(9, 4, 2, 'T 2', 't-2', 1, 1, '2019-01-15', '21:28:28', 1, '2019-01-15', '21:28:28', '2019-01-15 16:28:28', '2019-01-15 11:29:16'),
(10, 4, 4, 'T 4', 't-4', 1, 1, '2019-01-15', '21:28:39', 1, '2019-01-15', '21:28:39', '2019-01-15 16:28:39', '2019-01-15 11:28:58'),
(11, 4, 3, 'T 3', 't-3', 1, 1, '2019-01-15', '21:28:44', 1, '2019-01-15', '21:28:44', '2019-01-15 16:28:44', '2019-01-15 11:29:16'),
(12, 6, 12, 'Terminal 1', 'terminal-1', 1, 1, '2019-01-15', '21:31:30', 1, '2019-01-15', '21:31:35', '2019-01-15 16:31:30', '2019-01-15 16:31:35'),
(13, 6, 13, 'Terminal 2', 'terminal-2', 1, 1, '2019-01-15', '21:31:41', 1, '2019-01-15', '21:31:41', '2019-01-15 16:31:41', '2019-01-15 16:31:41'),
(14, 6, 14, 'Terminal 3', 'terminal-3', 1, 1, '2019-01-15', '21:31:45', 1, '2019-01-15', '21:31:45', '2019-01-15 16:31:45', '2019-01-15 16:31:45'),
(15, 3, 15, 'Terminal 4', 'terminal-4', 1, 1, '2019-01-15', '22:15:27', 1, '2019-01-15', '22:15:27', '2019-01-15 17:15:27', '2019-01-15 17:15:27'),
(16, 2, 16, 'Terminal 1', 'terminal-1', 1, 1, '2019-01-15', '22:23:55', 1, '2019-01-15', '22:23:55', '2019-01-15 17:23:55', '2019-01-15 17:23:55'),
(17, 2, 17, 'Terminal 2', 'terminal-2', 1, 1, '2019-01-15', '22:24:01', 1, '2019-01-15', '22:24:01', '2019-01-15 17:24:01', '2019-01-15 17:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_setups`
--

CREATE TABLE `blog_category_setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category_setups`
--

INSERT INTO `blog_category_setups` (`id`, `title`, `slug`, `meta_tags`, `meta_description`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 'News', 'news', 'news', 'news', 1, 1, '2019-01-02', '23:21:52', 1, '2019-01-02', '23:21:52', '2019-01-02 18:21:52', '2019-01-02 18:21:52'),
(2, 'Parking', 'parking', 'parking', 'parking', 1, 1, '2019-01-02', '23:22:14', 1, '2019-01-03', '13:36:54', '2019-01-02 18:22:14', '2019-01-03 08:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blogcomment_id` int(10) UNSIGNED DEFAULT NULL,
  `blogcategorysetup_id` int(10) UNSIGNED DEFAULT NULL,
  `blogpost_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blogcomment_id`, `blogcategorysetup_id`, `blogpost_id`, `user_id`, `comment`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 2, '<p>1st</p>', 1, 2, '2019-01-03', '00:44:38', 2, '2019-01-03', '00:44:38', '2019-01-02 19:44:38', '2019-01-02 19:44:38'),
(2, 1, 1, 1, 2, '<p>asdfs dfa</p>', 1, 2, '2019-01-03', '00:44:47', 2, '2019-01-03', '00:44:47', '2019-01-02 19:44:47', '2019-01-02 19:44:47'),
(3, 1, 1, 1, 2, '<p>hello</p>', 1, 2, '2019-01-03', '11:01:21', 2, '2019-01-03', '11:01:21', '2019-01-03 06:01:21', '2019-01-03 06:01:21'),
(4, NULL, 1, 1, 2, '<p>2nd</p>', 1, 2, '2019-01-03', '11:03:04', 2, '2019-01-03', '11:03:04', '2019-01-03 06:03:04', '2019-01-03 06:03:04'),
(5, 1, 1, 1, 2, '<p>hello</p>', 1, 2, '2019-01-03', '11:07:07', 2, '2019-01-03', '11:07:07', '2019-01-03 06:07:07', '2019-01-03 06:07:07'),
(6, 4, 1, 1, 2, '<p>abcd</p>', 1, 2, '2019-01-03', '11:10:54', 2, '2019-01-03', '11:10:54', '2019-01-03 06:10:54', '2019-01-03 06:10:54'),
(7, NULL, 1, 1, 2, '<p>3rd</p>', 1, 2, '2019-01-03', '11:13:22', 2, '2019-01-03', '11:13:22', '2019-01-03 06:13:22', '2019-01-03 06:13:22'),
(8, 7, 1, 1, 2, '<p>nnnnn</p>', 1, 2, '2019-01-03', '11:13:30', 2, '2019-01-03', '11:13:30', '2019-01-03 06:13:30', '2019-01-03 06:13:30'),
(9, 7, 1, 1, 2, '<p>mmm</p>', 1, 2, '2019-01-03', '11:16:04', 2, '2019-01-03', '11:16:04', '2019-01-03 06:16:04', '2019-01-03 06:16:04'),
(10, 8, 1, 1, 2, '<p>dddppp</p>', 1, 2, '2019-01-03', '11:30:14', 2, '2019-01-03', '11:30:14', '2019-01-03 06:30:14', '2019-01-03 06:30:14'),
(11, 9, 1, 1, 2, '<p>ddffaa</p>', 1, 2, '2019-01-03', '11:33:38', 2, '2019-01-03', '11:33:38', '2019-01-03 06:33:38', '2019-01-03 06:33:38'),
(12, 11, 1, 1, 2, '<p>eeddee</p>', 1, 2, '2019-01-03', '11:33:46', 2, '2019-01-03', '11:33:46', '2019-01-03 06:33:46', '2019-01-03 06:33:46'),
(13, 12, 1, 1, 2, '<p>asdfasdf asdfdadsf</p>', 1, 2, '2019-01-03', '11:33:54', 2, '2019-01-03', '11:33:54', '2019-01-03 06:33:54', '2019-01-03 06:33:54'),
(14, 13, 1, 1, 2, '<p>&nbsp;assdfferetetetete</p>', 1, 2, '2019-01-03', '11:34:03', 2, '2019-01-03', '11:34:03', '2019-01-03 06:34:03', '2019-01-03 06:34:03'),
(15, 14, 1, 1, 2, '<p>dbbbbb</p>', 1, 2, '2019-01-03', '11:34:18', 2, '2019-01-03', '11:34:18', '2019-01-03 06:34:18', '2019-01-03 06:34:18'),
(16, 15, 1, 1, 2, '<p>snnnn</p>', 1, 2, '2019-01-03', '11:34:35', 2, '2019-01-03', '11:34:35', '2019-01-03 06:34:35', '2019-01-03 06:34:35'),
(17, 16, 1, 1, 2, '<p>mooooo</p>', 1, 2, '2019-01-03', '11:35:40', 2, '2019-01-03', '11:35:40', '2019-01-03 06:35:40', '2019-01-03 06:35:40'),
(18, 17, 1, 1, 2, '<p>nooo</p>', 1, 2, '2019-01-03', '11:36:13', 2, '2019-01-03', '11:36:13', '2019-01-03 06:36:13', '2019-01-03 06:36:13'),
(19, 7, 1, 1, 2, '<p>3 rd data</p>', 1, 2, '2019-01-03', '11:43:48', 2, '2019-01-03', '11:43:48', '2019-01-03 06:43:48', '2019-01-03 06:43:48'),
(20, NULL, 2, 2, 2, '<p>test comment</p>\n\n<p>&nbsp;</p>', 1, 2, '2019-01-03', '21:39:34', 2, '2019-01-03', '21:39:34', '2019-01-03 16:39:34', '2019-01-03 16:39:34'),
(21, NULL, 1, 3, 2, '<p>test comment</p>\n\n<ol>\n	<li>one</li>\n	<li>two</li>\n	<li>three</li>\n	<li>four</li>\n	<li>five</li>\n</ol>', 1, 2, '2019-01-03', '22:08:14', 2, '2019-01-03', '22:08:14', '2019-01-03 17:08:14', '2019-01-03 17:08:14'),
(22, 21, 1, 3, 2, '<p>asdf</p>', 1, 2, '2019-01-03', '22:11:16', 2, '2019-01-03', '22:11:16', '2019-01-03 17:11:16', '2019-01-03 17:11:16'),
(23, 22, 1, 3, 2, '<p>asdf</p>', 1, 2, '2019-01-03', '22:11:24', 2, '2019-01-03', '22:11:24', '2019-01-03 17:11:24', '2019-01-03 17:11:24'),
(24, 22, 1, 3, 2, '<p>dfdfasdf sa</p>', 1, 2, '2019-01-03', '22:11:35', 2, '2019-01-03', '22:11:35', '2019-01-03 17:11:36', '2019-01-03 17:11:36'),
(25, 23, 1, 3, 2, '<p>asdfasd</p>', 1, 2, '2019-01-03', '22:11:42', 2, '2019-01-03', '22:11:42', '2019-01-03 17:11:42', '2019-01-03 17:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `blogcategorysetup_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blogcategorysetup_id`, `title`, `slug`, `description`, `meta_tags`, `meta_description`, `avatar`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Phasellus Porta Eunisi', 'phasellus-porta-eunisi', '<p>Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan</p>', 'Phasellus Porta Eunisi', 'Phasellus Porta Eunisi', '1-5c2d06624a5d3.jpg', 1, 1, '2019-01-02', '23:37:47', 1, '2019-01-02', '23:37:47', '2019-01-02 18:37:47', '2019-01-02 18:43:48'),
(2, 1, 'Vehicula Lacus Nunc', 'vehicula-lacus-nunc', '<p>Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsanMorbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan</p>', 'Vehicula Lacus Nunc', 'Vehicula Lacus Nunc', '2-5c2d0c708dd54.jpg', 1, 1, '2019-01-03', '00:09:23', 1, '2019-01-03', '22:02:27', '2019-01-02 19:09:23', '2019-01-03 17:02:27'),
(3, 1, 'Semper Velit Benetis', 'semper-velit-benetis', '<p>Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan Morbi sodales lacinia magna eget ornare. Vivamus ac posuere neque. Phasellus porta eu nisi eget accumsan</p>', 'sodales lacinia magna eget ornare. Vivamus ac posuere', 'sodales lacinia magna eget ornare. Vivamus ac posuere', '3-5c2e405535335.jpg', 1, 1, '2019-01-03', '22:03:00', 1, '2019-01-03', '22:03:00', '2019-01-03 17:03:00', '2019-01-03 17:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `cancellations`
--

CREATE TABLE `cancellations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancellations`
--

INSERT INTO `cancellations` (`id`, `title`, `slug`, `meta_tags`, `meta_description`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(4, 'Cancellation Cover Available', 'cancellation-cover-available', 'Cancellation Cover Available', 'Cancellation Cover Available', 1, 1, '2019-01-09', '17:43:45', 1, '2019-01-09', '17:43:45', '2019-01-09 12:43:45', '2019-01-09 12:43:45'),
(5, 'Non-Flex, Cannot be Cancelled', 'non-flex-cannot-be-cancelled', 'Non-Flex, Cannot be Cancelled', 'Non-Flex, Cannot be Cancelled', 1, 1, '2019-01-09', '17:43:51', 1, '2019-01-09', '17:43:51', '2019-01-09 12:43:51', '2019-01-09 12:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

CREATE TABLE `contact_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_forms`
--

CREATE TABLE `contact_us_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_forms`
--

INSERT INTO `contact_us_forms` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_date`, `created_time`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Akbar', 'm.akbarsarwar@gmail.com', 'f', 'f', 1, '2019-01-06', '00:23:24', '2019-01-06', '00:23:24', '2019-01-05 19:23:24', '2019-01-05 19:23:24'),
(2, 'Muhammad Akbar', 'm.akbarsarwar@gmail.com', 'f', 'f', 1, '2019-01-06', '00:24:14', '2019-01-06', '00:24:14', '2019-01-05 19:24:14', '2019-01-05 19:24:14'),
(3, 'Muhammad Akbar', 'm.akbarsarwar@gmail.com', 'f', 'f', 1, '2019-01-06', '00:24:37', '2019-01-06', '00:24:37', '2019-01-05 19:24:37', '2019-01-05 19:24:37'),
(4, 'Muhammad Akbar', 'm.akbarsarwar@gmail.com', 'f', 'f', 1, '2019-01-06', '00:25:06', '2019-01-06', '00:25:06', '2019-01-05 19:25:06', '2019-01-05 19:25:06'),
(5, 'Muhammad Akbar', 'm.akbarsarwar@gmail.com', 'f', 'f', 1, '2019-01-06', '00:25:27', '2019-01-06', '00:25:27', '2019-01-05 19:25:27', '2019-01-05 19:25:27'),
(6, 'Muhammad Akbar', 'm.akbarsarwar@gmail.com', 'asdf', 'asdf', 1, '2019-01-06', '01:03:44', '2019-01-06', '01:03:44', '2019-01-05 20:03:44', '2019-01-05 20:03:44'),
(7, 'Muhammad Akbar', 'm.akbarsarwar@gmail.com', 'You can book online with the following 5 step booking process', 'You can book online with the following 5 step booking process (recommended). You can also book over the phone by calling on 01293 344 567 any time. Whether you book online or over the phone you will be asked to provide the following Information.\n\nYou can book online with the following 5 step booking process (recommended). You can also book over the phone by calling on 01293 344 567 any time. Whether you book online or over the phone you will be asked to provide the following Information.', 1, '2019-01-06', '01:07:14', '2019-01-06', '01:07:14', '2019-01-05 20:07:14', '2019-01-05 20:07:14'),
(8, 'Muhammad Akbar', 'm.akbarsarwar@gmail.com', 'You can book online with the following 5 step booking process', 'You can book online with the following 5 step booking process (recommended). You can also book over the phone by calling on 01293 344 567 any time. Whether you book online or over the phone you will be asked to provide the following Information.', 1, '2019-01-06', '01:07:24', '2019-01-06', '01:07:24', '2019-01-05 20:07:24', '2019-01-05 20:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(3, 'Nulla ultrices enim at erat scelerisque', '<p><em>Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.&nbsp;Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.</em></p>', 1, 1, '2019-01-04', '00:03:01', 1, '2019-01-04', '00:22:20', '2019-01-03 19:03:01', '2019-01-03 19:22:20'),
(4, 'Nulla ultrices enim at erat scelerisque, id euismod sem', '<p>Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.</p>\n\n<p><img alt=\"\" src=\"http://localhost:8000/files/1/wallpaper-nature-high-resolution.jpg.jpg\" style=\"float:left; margin-bottom:10px; margin-top:10px; width:100%\" /></p>', 1, 1, '2019-01-04', '00:04:43', 1, '2019-01-04', '00:05:38', '2019-01-03 19:04:43', '2019-01-03 19:05:38'),
(5, 'aptent taciti sociosqu ad litora torquent per', '<p>Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.</p>', 1, 1, '2019-01-04', '00:05:04', 1, '2019-01-04', '00:05:04', '2019-01-03 19:05:04', '2019-01-03 19:05:04'),
(6, 'Nullam lobortis maximus sapien sed euismod', '<p>Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.Nulla ultrices enim at erat scelerisque, id euismod sem consequat. Pellentesque ac pulvinar diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In consectetur mauris ac elit finibus, tempor gravida nibh posuere. Nullam lobortis maximus sapien sed euismod. Integer tempor justo dolor.</p>', 0, 1, '2019-01-04', '00:05:21', 1, '2019-01-04', '00:06:50', '2019-01-03 19:05:21', '2019-01-03 19:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `image_readies`
--

CREATE TABLE `image_readies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2018_07_05_124553_create_rolegroups_table', 1),
(4, '2018_11_23_185625_create_settings_table', 1),
(5, '2018_11_23_192150_create_user_activations_table', 1),
(6, '2018_11_24_190013_create_profiles_table', 1),
(7, '2018_11_28_183309_create_user_password_resets_table', 1),
(8, '2018_12_13_124942_create_image_readies_table', 1),
(9, '2018_12_14_114856_create_social_setups_table', 1),
(10, '2018_12_16_124008_create_socials_table', 1),
(11, '2018_12_17_190723_create_setting_socials_table', 1),
(12, '2018_12_28_182450_create_blog_category_setups_table', 1),
(13, '2018_12_28_194408_create_blog_posts_table', 1),
(14, '2018_12_30_185350_create_blog_comments_table', 1),
(15, '2019_01_03_184414_create_faqs_table', 2),
(16, '2019_01_04_061017_create_steps_table', 3),
(17, '2019_01_04_073814_create_pages_table', 4),
(18, '2019_01_05_170927_create_services_table', 5),
(19, '2019_01_05_190032_create_contact_uses_table', 6),
(20, '2019_01_05_192111_create_contact_us_forms_table', 7),
(22, '2019_01_08_191428_create_airports_table', 8),
(23, '2019_01_09_120009_create_parking_types_table', 9),
(24, '2019_01_09_120516_create_parking_services_table', 9),
(25, '2019_01_09_120823_create_cancellations_table', 9),
(27, '2019_01_10_062029_create_parking_tabs_table', 10),
(29, '2019_01_10_113300_create_parking_services_details_table', 11),
(35, '2019_01_10_105523_create_parkings_table', 12),
(36, '2019_01_15_083430_create_titles_table', 13),
(38, '2019_01_15_152326_create_airport_terminals_table', 14),
(41, '2019_01_16_123744_create_orders_table', 15),
(43, '2019_01_18_015647_create_parkings_testimonials_table', 16),
(44, '2019_01_31_180316_create_user_parkings_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) UNSIGNED DEFAULT NULL,
  `payment_status` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off_date` date DEFAULT NULL,
  `drop_off_hour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off_minute` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `arrival_hour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_minute` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` int(191) DEFAULT NULL,
  `airport_id` int(10) UNSIGNED DEFAULT NULL,
  `mybookparking_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `know_travel_detail` tinyint(1) DEFAULT NULL,
  `departterminal_id` int(10) UNSIGNED DEFAULT NULL,
  `outbound_flight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrivalterminal_id` int(10) UNSIGNED DEFAULT NULL,
  `inbound_flight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `know_vehical_detail` tinyint(1) DEFAULT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept_terms_condition` tinyint(1) DEFAULT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taken_remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `amount`, `payment_status`, `deleted_at`, `reference_no`, `drop_off_date`, `drop_off_hour`, `drop_off_minute`, `arrival_date`, `arrival_hour`, `arrival_minute`, `days`, `airport_id`, `mybookparking_id`, `email`, `title_id`, `first_name`, `last_name`, `mobile_number`, `post_code`, `know_travel_detail`, `departterminal_id`, `outbound_flight`, `arrivalterminal_id`, `inbound_flight`, `know_vehical_detail`, `make`, `model`, `colour`, `registration`, `accept_terms_condition`, `order_status`, `taken_remarks`, `completed_remarks`, `status`, `created_at`, `updated_at`) VALUES
(96, NULL, 28.80, 1, NULL, 'QV-0096-19', '2019-01-30', '11', '00', '2019-02-02', '11', '00', 3, 2, 1, 'm.akbarsarwar@gmail.com', 1, 'abc', 'xyz', '03224063901', '54000', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 'completed', 'asdf', 'asd fasdf sadfasd', 'paid', '2019-01-30 18:44:32', '2019-01-31 05:43:11'),
(97, NULL, 28.80, 1, NULL, 'QV-0097-19', '2019-01-31', '12', '00', '2019-02-03', '12', '00', 3, 2, 1, 'm.akbarsarwar@gmail.com', 1, 'abc', 'xyz', '03224063901', '54000', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 'completed', NULL, 'weasfvwqerwv qervwqer wrerwqer', 'paid', '2019-01-30 19:19:13', '2019-01-31 05:17:40'),
(98, NULL, 28.80, 1, NULL, 'QV-0098-19', '2019-02-01', '10', '00', '2019-02-04', '10', '00', 3, 2, 1, 'm.akbarsarwar@gmail.com', 1, 'abc', 'xyz', '03224063901', '54000', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 'completed', 'dsd', 's', 'paid', '2019-02-01 10:00:50', '2019-03-04 18:56:07'),
(99, NULL, 28.80, 1, NULL, 'QV-0099-19', '2019-02-01', '18', '45', '2019-02-04', '11', '00', 3, 2, 1, 'm.akbarsarwar@gmail.com', 1, 'abc', 'xyz', '03224063901', '54000', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 'completed', 'adsf', 'im coming', 'paid', '2019-02-01 10:05:40', '2019-12-05 17:27:04'),
(100, NULL, 38.40, 1, NULL, 'QV-0100-19', '2019-02-02', '16', '00', '2019-02-06', '11', '00', 4, 2, 1, 'm.akbarsarwar@gmail.com', 1, 'abc', 'xyz', '03224063901', '54000', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 'completed', 'hello', 'asdf', 'paid', '2019-02-02 10:35:43', '2019-12-05 17:28:34'),
(101, NULL, 30.60, 1, NULL, 'QV-0101-19', '2019-02-06', '12', '00', '2019-02-09', '12', '00', 3, 2, 3, 'm.akbarsarwar@gmail.com', 1, 'abc', 'xyz', '03224063901', '54000', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 'up-coming', NULL, NULL, 'paid', '2019-02-06 11:35:47', '2019-02-06 11:35:47'),
(102, NULL, 211.20, 1, NULL, 'QV-0102-19', '2019-02-26', '02', '00', '2019-03-20', '02', '00', 22, 2, 1, 'm.akbarsarwar@gmail.com', 1, 'abc', 'xyz', '03221212121', '54000', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 'up-coming', NULL, NULL, 'paid', '2019-02-26 14:25:42', '2019-02-26 14:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `meta_tags`, `meta_description`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 'How it Works', 'how-it-works', '<div class=\"mb-s2\">\n						<h3 class=\"text-bold-700 text-dark text-capitalize\">Booking</h3>\n					</div>\n					<p>You can book online with the following 5 step booking process (recommended). You can also book over the phone by calling on 01293 344 567 any time. Whether you book online or over the phone you will be asked to provide the following Information.</p>\n					<ul class=\"mt-s3 mb-s3\">\n						<li class=\"mb-6\">\n							<div class=\"d-flex align-items-center\">\n								<span class=\"bg-pink text-white h--20 w--20 d-flex justify-content-center align-items-center text-size-8 rounded-circle mr-s2\">\n									<i class=\"icon-arrow-right\"></i>\n								</span>\n								<p class=\"m-0\">Departure and Arrival Dates and Time.</p>\n							</div>\n						</li>\n						<li class=\"mb-6\">\n							<div class=\"d-flex align-items-center\">\n								<span class=\"bg-pink text-white h--20 w--20 d-flex justify-content-center align-items-center text-size-8 rounded-circle mr-s2\">\n									<i class=\"icon-arrow-right\"></i>\n								</span>\n								<p class=\"m-0\">Departure and Arrival terminal.</p>\n							</div>\n						</li>\n						<li class=\"mb-6\">\n							<div class=\"d-flex align-items-center\">\n								<span class=\"bg-pink text-white h--20 w--20 d-flex justify-content-center align-items-center text-size-8 rounded-circle mr-s2\">\n									<i class=\"icon-arrow-right\"></i>\n								</span>\n								<p class=\"m-0\">Contact Details.</p>\n							</div>\n						</li>\n						<li class=\"mb-6\">\n							<div class=\"d-flex align-items-center\">\n								<span class=\"bg-pink text-white h--20 w--20 d-flex justify-content-center align-items-center text-size-8 rounded-circle mr-s2\">\n									<i class=\"icon-arrow-right\"></i>\n								</span>\n								<p class=\"m-0\">Vehicle\'s Details.</p>\n							</div>\n						</li>\n						<li class=\"mb-6\">\n							<div class=\"d-flex align-items-center\">\n								<span class=\"bg-pink text-white h--20 w--20 d-flex justify-content-center align-items-center text-size-8 rounded-circle mr-s2\">\n									<i class=\"icon-arrow-right\"></i>\n								</span>\n								<p class=\"m-0\">Payment Method (PayPal, Debit or Credit Cards).</p>\n							</div>\n						</li>\n					</ul>\n					<p>Once you book the airport parking service, you will receive a confirmation email that is automatically sent to the email address you provided while booking. The email contains your contact information with your pick up and drops off instructions on your travel dates.</p>\n					<div class=\"mb-s2\">\n						<h3 class=\"text-bold-700 text-dark text-capitalize\">Departure</h3>\n					</div>\n					<p>On the day of your departure, call on 078 5736 6664 when you are approximately 20 minutes away from your terminal at Heathrow. The representative asks you to do this so that we can despatch your Chauffeur in time to meet you at the terminal building. Your chauffeur will be waiting for you at the meeting point detailed in the confirmation email.</p>\n					<p>On your arrival, a quick inspection of your vehicle will be carried out for any existing damages or defects. Once the handover process is complete, your vehicle will be taken directly to the parking area. You can now make your way to the Departure lounge.</p>\n					<div class=\"mb-s2\">\n						<h3 class=\"text-bold-700 text-dark text-capitalize\">Arrival</h3>\n					</div>\n					<p>Upon your return, call on 078 5736 6664 after clearing customs (roughly 20mins) and get to the pre-arranged meeting point as detailed in the confirmation email. Your chauffeur will meet you at the meeting point with your car. You will be asked to check your vehicle and once you are satisfied you can drive home.</p>', 'How it Works', 'How it Works', 1, 1, '2019-01-04', '13:23:53', 1, '2019-01-04', '14:06:07', '2019-01-04 08:23:53', '2019-01-04 09:06:07'),
(3, 'Meet and Greet', 'meet-and-greet', '<div class=\"mb-s2\">\n						<h3 class=\"text-bold-700 text-dark text-capitalize\">Valet Car Parking</h3>\n					</div>\n					<p>Best Meet and Greet Heathrow brings stress-free and peaceful airport parking experience for every traveller. Eliminate all the bother and hassle of parking your car so you don’t have to spend a single moment of your vacation time worrying about your vehicle.Get the most advance parking treatment that enjoy the exclusive amenities according to your requirements at Heathrow terminal T1, T2, T3, T4, T5.</p>\n					<p>Heathrow Meet and Greet parking service is ideally designed to help you in the beginning and end of your journey. Manage your parking needs by planning smartly and concentrate on making the most of your trip.</p>\n					<p>Conventional parking such as off-airport parking can be a nightmare. Dragging your luggage on to shuttles to get to your terminal whilst leaving your vehicle unattended can be risky. Cold or rainy weather can also add to your discomfort. Also you will be tired before your journey even started. So, why not go for the obvious option and make it easy on yourself?</p>\n					<p>Meet and greet parking is also commonly referred to as Valet parking. Get Valet parking at Heathrow as a privileged experience with dedicated parking coupled with a car wash facility.</p>\n					<div class=\"mb-s2\">\n						<h3 class=\"text-bold-700 text-dark text-capitalize\">Convenient</h3>\n					</div>\n					<p>Drive directly to the terminal and within minutes you are off to the departure lounge to start your holiday or business trip. This will insecure that your vehicle is parked efficiently in the parking lot. On your return, step out of the terminal into your car and you are all set to go home.</p>\n					<div class=\"mb-s2\">\n						<h3 class=\"text-bold-700 text-dark text-capitalize\">Efficient Service</h3>\n					</div>\n					<p>A trained driver takes your vehicle efficiently to the parking area and takes active precautions to keep your vehicle from harm. Manage your parking problems by choosing hassle-free Heathrow parking.</p>\n					<p>Get a sparking area and you can also access your vehicle 24/7 by calling at 01293 344 567 before your departure and arrival. A chauffeur takes and returns your car at the exit point.</p>\n					<div class=\"mb-s2\">\n						<h3 class=\"text-bold-700 text-dark text-capitalize\">Competitive</h3>\n					</div>\n					<p>The driver provides you a stress-free service and gives exceptionally good value for money and which is carried out in a professional and efficient manner.</p>', 'Meet and Greet', 'Meet and Greet', 1, 1, '2019-01-04', '14:22:04', 1, '2019-01-04', '14:24:02', '2019-01-04 09:22:04', '2019-01-04 09:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `parkings`
--

CREATE TABLE `parkings` (
  `id` int(10) UNSIGNED NOT NULL,
  `airport_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` float(8,2) DEFAULT NULL,
  `offer` tinyint(1) DEFAULT 0,
  `offer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_rate` float(8,2) DEFAULT NULL,
  `discount` float(8,2) DEFAULT NULL,
  `total` float(8,2) DEFAULT NULL,
  `distance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parkingtype_id` int(10) UNSIGNED DEFAULT NULL,
  `cancellation_id` int(10) UNSIGNED DEFAULT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_procedure` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off_procedure` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_and_conditions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `important` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_overview` tinyint(1) DEFAULT NULL,
  `active_return_procedure` tinyint(1) DEFAULT NULL,
  `active_drop_off_procedure` tinyint(1) DEFAULT NULL,
  `active_terms_and_conditions` tinyint(1) DEFAULT NULL,
  `active_important` tinyint(1) DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkings`
--

INSERT INTO `parkings` (`id`, `airport_id`, `email`, `title`, `slug`, `rate`, `offer`, `offer_type`, `offer_rate`, `discount`, `total`, `distance`, `transfer`, `parkingtype_id`, `cancellation_id`, `overview`, `return_procedure`, `drop_off_procedure`, `terms_and_conditions`, `important`, `active_overview`, `active_return_procedure`, `active_drop_off_procedure`, `active_terms_and_conditions`, `active_important`, `meta_tags`, `meta_description`, `avatar`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 2, 'm.akbarsarwar@gmail.com', 'Bristol Parking Spaces', 'bristol-parking-spaces', 12.00, 1, 'percentage', 20.00, 2.40, 9.60, 'Meet & Greet at Terminal', 'Meet & Greet at Terminal', 4, 5, '<h2>Why Use Bristol Parking Spaces ?</h2>\n\n<p>The chauffeur will collect &amp; return your car at Short Stay Car park.</p>\n\n<ul>\n	<li>All entry &amp; exit airport charges included.</li>\n	<li>Fully insured chauffeurs</li>\n	<li>Ideal for families and business travellers</li>\n	<li>Leave your keys</li>\n	<li>Short walk to terminal.</li>\n	<li>You will be met at the terminal by an APH Chauffeur.</li>\n</ul>\n\n<hr />\n<h2>Important Information</h2>\n\n<p>Please note that customer only have 10 minutes to get out from express drop off, if customer are taking longer, customer will have additional car park charges.</p>', '<ul>\n	<li>Please call Bristol Parking Spaces while you are waiting for your luggage.</li>\n	<li>Your car will be with you 15/20 minutes after your phone call.</li>\n	<li>Your car will be delivered to the same place you have dropped it off.</li>\n</ul>', '<ul>\n	<li>Please call Bristol Parking Spaces - 20 minutes before your arrival at the airport.</li>\n	<li>Please follow signs to short stay car park and pick up, park your car in row 7</li>\n	<li>Your driver will look out for you.</li>\n</ul>', '<blockquote>\n<p><strong>Will Be provided on request</strong></p>\n</blockquote>', '<h2>Important Information</h2>\n\n<ul>\n	<li>You need to call the service provider on your departure and return day.</li>\n	<li>Please do not leave any valuables inside the vehicle, if you do on your own risk then please take a receipt from the driver.</li>\n	<li>A2Z Airport Parking LTD does not collect, store, drive or return customer&#39;s vehicles from any airport, instead the service provider takes the vehicle and they park to their own car park compound.</li>\n	<li>A2Z Airport Parking LTD acts only as a booking agent for the service provider for the featured car parks. It does not itself provide the parking services. The customer will be contracting with the service provider.</li>\n	<li>Any claims by the customer in respect of parking services e.g collection &amp; delivery of the vehicle, damage to the vehicle etc must be made against the parking service provider and subject to their terms and conditions.</li>\n	<li>If for any reason your booking confirmation has not been received you must contact us immediately as no refund is available for no-shows or if cancellation is received less than 48 hours before you are due to arrive at the car park.</li>\n</ul>', NULL, NULL, NULL, NULL, NULL, 'asdf asdf asdfasdf asf', 'fasdf', '1-5c4ec72ad99a5.png', 1, 1, '2019-01-11', '16:38:37', 1, '2019-02-13', '20:09:11', '2019-01-11 11:38:37', '2019-02-13 19:09:11'),
(2, 3, 'm.akbarsarwar@gmail.com', 'Maple Parking T4 - T5', 'maple-parking-t4-t5', 12.00, 1, 'percentage', 10.00, 1.20, 10.80, 'Meet & Greet at Terminal', 'Meet & Greet at Terminal', 4, 5, '<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<hr />\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<hr />\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<hr />\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<hr />\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<hr />\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<hr />\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<hr />\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h2>What is Lorem Ipsum?</h2>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\n\n<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\n\n<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '<h1>Where does it come from?</h1>\n\n<h2>Where does it come from?</h2>\n\n<h3>Where does it come from?</h3>\n\n<pre>\nWhere does it come from?</pre>', NULL, NULL, NULL, NULL, NULL, 'Meet & Greet at Terminal', 'Meet & Greet at Terminal', '2-5c39cee105d3d.png', 1, 1, '2019-01-12', '16:25:34', 1, '2019-02-13', '20:09:28', '2019-01-12 11:25:35', '2019-02-13 19:09:28'),
(3, 2, 'immersivesoul101@gmail.com', 'Official Airport Meet and Greet', 'official-airport-meet-and-greet', 10.20, 0, NULL, 0.00, 0.00, 10.20, 'Meet & Greet at Terminal', 'Meet & Greet at Terminal', 4, 4, '<p>Why Use Official Bristol Airport Meet and Greet ?</p>\n\n<p>Bristol Meet and Greet offers customers with a <strong>reliable and outstanding</strong> service at Bristol Airport. On arriving at the facility, there will be a fully licensed chauffeur waiting to park your car, ensuring the hassle of finding a space is never a concern. Exiting your vehicle at the terminal doors means that check-in is only a few steps away, and being met in the same place on your return is yet another benefit of this efficient service.</p>\n\n<hr />\n<ul>\n	<li>Convenient Bristol Meet &amp; Greet Service with reliable chauffeurs</li>\n	<li>Convenient drop off at the terminal door</li>\n	<li>No Transfers required</li>\n	<li>Secure and monitored car parks</li>\n	<li>OFFICIAL MEET &amp; GREET SERVICE FOR THE AIRPORT</li>\n	<li>Fully Insured Service</li>\n	<li>Car met and returned in the Drop off and Pick up Car Park</li>\n	<li>Eliminates the need for bus transfers and self parking</li>\n	<li>Vehicles remain onsite in Bristol Airports own secure car park</li>\n	<li>Official airport meet and greet</li>\n	<li>Drop off at terminal.</li>\n</ul>\n\n<hr />\n<p>Important Information</p>\n\n<ul>\n	<li>Overstays charged at &pound;8.00 per day..</li>\n</ul>\n\n<hr />\n<p>Security $ Insurance</p>\n\n<ul>\n	<li>Your car will be parked in Bristol Internationals secure, on-site car park for the duration of your trip.</li>\n	<li>By choosing a Park Mark Safer Parking facility you are visiting a car park that has been vetted by the Police and has measures in place in order to create a safer environment for both you and your vehicle.</li>\n	<li>All chauffeurs are fully insured to drive customers vehicles.</li>\n</ul>\n\n<hr />\n<p>Security $ Insurance</p>\n\n<ul>\n	<li>Special Assistance Facilities: Dedicated special assistance (Blue Badge holders) bays and help buttons at barriers for assistance..</li>\n</ul>', '<p>On arrival back to Bristol Airport , please report to the Meet &amp; Greet cabin within the Express Drop Off Car Park where your vehicle will be waiting for you to collect.</p>', '<ul>\n	<li>Follow the signs to the Express Drop Off Car Park, the entrance barrier will open automatically.</li>\n	<li>Park your vehicle in one of the bays near the Meet &amp; Greet cabin, which is located in front of the entrance barriers.</li>\n	<li>Report to the cabin with your car keys, booking reference and return flight details.</li>\n	<li>Your car will be parked in Bristol Airport s secure, on-site car park for the duration of your trip.</li>\n	<li>Please allow plenty of time for airport check-in and security procedures.</li>\n</ul>', '<p><strong>Will Be provided on request</strong></p>', '<p>Important Information</p>\n\n<ul>\n	<li>You need to call the service provider on your departure and return day.</li>\n	<li>Please do not leave any valuables inside the vehicle, if you do on your own risk then please take a receipt from the driver.</li>\n	<li>A2Z Airport Parking LTD does not collect, store, drive or return customer&#39;s vehicles from any airport, instead the service provider takes the vehicle and they park to their own car park compound.</li>\n	<li>A2Z Airport Parking LTD acts only as a booking agent for the service provider for the featured car parks. It does not itself provide the parking services. The customer will be contracting with the service provider.</li>\n	<li>Any claims by the customer in respect of parking services e.g collection &amp; delivery of the vehicle, damage to the vehicle etc must be made against the parking service provider and subject to their terms and conditions.</li>\n	<li>If for any reason your booking confirmation has not been received you must contact us immediately as no refund is available for no-shows or if cancellation is received less than 48 hours before you are due to arrive at the car park.</li>\n</ul>', 1, 1, 1, 1, 1, 'Meet & Greet at Terminal', 'Meet & Greet at Terminal', '3-5cd42d62e7ba0.png', 1, 1, '2019-01-15', '22:18:56', 1, '2019-02-13', '20:09:02', '2019-01-15 17:18:56', '2019-05-09 16:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `parkings_testimonials`
--

CREATE TABLE `parkings_testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `parking_id` int(10) DEFAULT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed` tinyint(1) NOT NULL,
  `completed_at` date DEFAULT NULL,
  `rating` int(10) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkings_testimonials`
--

INSERT INTO `parkings_testimonials` (`id`, `order_id`, `parking_id`, `reference_no`, `token`, `completed`, `completed_at`, `rating`, `comment`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(51, 96, 1, 'QV-0096-19', '$2y$10$IwUUggQoMNDWVPjTDCPbz.xkqgg662YDG2.ZTie51Bq29hxf0286', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-30 18:44:32', '2019-01-30 18:44:32'),
(52, 97, 1, 'QV-0097-19', '$2y$10$KFbLLv1z4s7R6SB8xA58W.uN09iOxACFtv0xIcJ9tXDV0ZU.Axx.', 1, '2019-01-31', 4, 'rec', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-30 19:19:13', '2019-01-31 05:18:43'),
(53, 98, 1, 'QV-0098-19', '$2y$10$QZXf.8ObMfxhZSmZSowpzO39awPkRpQQtgm3WhXR2zyky68H0IEwu', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-01 10:00:51', '2019-02-01 10:00:51'),
(54, 99, 1, 'QV-0099-19', '$2y$10$oWlsafYlt9tBAbdz9s0jejVdGZ7QNRNDvza8tqHoF7kbfmdbW7R.', 1, '2019-12-05', 4, 'We believe programming should be fun to learn. You\'ll LEARN BY DOING right from the beginning. This book features a lot of practical Laravel tutorials. Each tutorial includes practical advice, tips and tricks for working with jQuery, AJAX, JSON, API, modular PHP, testing, deployment and more.', 1, NULL, NULL, NULL, 8, NULL, NULL, '2019-02-01 10:05:40', '2019-12-05 17:29:33'),
(55, 100, 1, 'QV-0100-19', '$2y$10$Zngium1rGaWBgV8H2hW.dHuBH0Jjl35r4zVcT28frMyVwkzv2ZO', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-02 10:35:44', '2019-02-02 10:35:44'),
(56, 101, 3, 'QV-0101-19', '$2y$10$cjLDCGPeZc1cExZnGjb5.eex4CVJoyl5oRRFCmlABR5DdiOXyVmi', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-06 11:35:47', '2019-02-06 11:35:47'),
(57, 102, 1, 'QV-0102-19', '$2y$10$TRbYWgeFPTWUJ4oF3WIcXeLxtff8nL7ob8ffboVBg4rc9PB4aysBu', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-26 14:25:43', '2019-02-26 14:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `parking_services`
--

CREATE TABLE `parking_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(10) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_services`
--

INSERT INTO `parking_services` (`id`, `sort_order`, `title`, `slug`, `description`, `meta_tags`, `meta_description`, `avatar`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 1, '24 Hours Patrols', '24-hours-patrols', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '24 Hours Patrols', '24 Hours Patrols', '1-5c434f37daba4.png', 1, 1, '2019-01-09', '17:54:17', 1, '2019-01-09', '23:12:38', '2019-01-09 12:54:17', '2019-01-19 16:24:24'),
(2, 2, 'CCTV Cameras', 'cctv-cameras', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'CCTV Cameras', 'CCTV Cameras', '2-5c434f4f1b84a.png', 1, 1, '2019-01-09', '18:00:09', 1, '2019-01-09', '23:13:04', '2019-01-09 13:00:09', '2019-01-19 12:42:50'),
(3, 4, 'Fencing', 'fencing', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Fencing', 'Fencing', '3-5c434f5e5aa7c.png', 1, 1, '2019-01-09', '23:14:02', 1, '2019-01-09', '23:14:02', '2019-01-09 18:14:02', '2019-04-14 14:35:36'),
(4, 5, 'You Keep Your Keys', 'you-keep-your-keys', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'You Keep Your Keys', 'You Keep Your Keys', '4-5c434f75103a9.png', 1, 1, '2019-01-09', '23:14:45', 1, '2019-01-09', '23:14:45', '2019-01-09 18:14:45', '2019-04-14 14:35:35'),
(5, 6, 'Secure Barrier', 'secure-barrier', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Secure Barrier', 'Secure Barrier', '5-5c435049a6f62.png', 1, 1, '2019-01-09', '23:15:17', 1, '2019-01-09', '23:15:17', '2019-01-09 18:15:17', '2019-04-14 14:35:35'),
(6, 3, '24 Hours Patrolled', '24-hours-patrolled', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '24 Hours Patrolled', '24 Hours Patrolled', '6-5c434f8d1ea71.png', 1, 1, '2019-01-09', '23:16:31', 1, '2019-01-09', '23:16:31', '2019-01-09 18:16:31', '2019-04-14 14:35:36'),
(7, 7, 'Disability Friendly', 'disability-friendly', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Disability Friendly', 'Disability Friendly', '7-5c434fa088500.png', 1, 1, '2019-01-09', '23:17:07', 1, '2019-01-09', '23:17:07', '2019-01-09 18:17:07', '2019-01-19 16:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `parking_services_details`
--

CREATE TABLE `parking_services_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(10) DEFAULT NULL,
  `parking_id` int(10) UNSIGNED DEFAULT NULL,
  `parkingservice_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_services_details`
--

INSERT INTO `parking_services_details` (`id`, `sort_order`, `parking_id`, `parkingservice_id`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(613, 1, 3, 1, 1, 1, '2019-01-15', '22:18:56', 1, '2019-02-13', '20:09:02', '2019-02-13 19:09:02', '2019-02-13 19:09:02'),
(614, 3, 3, 3, 1, 1, '2019-01-15', '22:18:56', 1, '2019-02-13', '20:09:02', '2019-02-13 19:09:02', '2019-02-13 19:09:02'),
(615, 5, 3, 5, 1, 1, '2019-01-15', '22:18:56', 1, '2019-02-13', '20:09:02', '2019-02-13 19:09:02', '2019-02-13 19:09:02'),
(616, 6, 3, 6, 1, 1, '2019-01-15', '22:18:56', 1, '2019-02-13', '20:09:02', '2019-02-13 19:09:02', '2019-02-13 19:09:02'),
(617, 7, 3, 7, 1, 1, '2019-01-15', '22:18:56', 1, '2019-02-13', '20:09:02', '2019-02-13 19:09:02', '2019-02-13 19:09:02'),
(618, 7, 1, 7, 1, 1, '2019-01-11', '16:38:37', 1, '2019-02-13', '20:09:11', '2019-02-13 19:09:11', '2019-02-13 19:09:11'),
(619, 4, 1, 4, 1, 1, '2019-01-11', '16:38:37', 1, '2019-02-13', '20:09:11', '2019-02-13 19:09:11', '2019-02-13 19:09:11'),
(620, 1, 1, 1, 1, 1, '2019-01-11', '16:38:37', 1, '2019-02-13', '20:09:11', '2019-02-13 19:09:11', '2019-02-13 19:09:11'),
(621, 3, 1, 3, 1, 1, '2019-01-11', '16:38:37', 1, '2019-02-13', '20:09:11', '2019-02-13 19:09:11', '2019-02-13 19:09:11'),
(622, 2, 2, 2, 1, 1, '2019-01-12', '16:25:34', 1, '2019-02-13', '20:09:28', '2019-02-13 19:09:28', '2019-02-13 19:09:28'),
(623, 5, 2, 5, 1, 1, '2019-01-12', '16:25:34', 1, '2019-02-13', '20:09:28', '2019-02-13 19:09:28', '2019-02-13 19:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `parking_tabs`
--

CREATE TABLE `parking_tabs` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_tabs`
--

INSERT INTO `parking_tabs` (`id`, `sort_order`, `title`, `slug`, `open`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(4, 5, 'Overview', 'overview', 1, 1, 1, '2019-01-10', '13:13:33', 1, '2019-01-10', '14:58:22', '2019-01-10 08:13:33', '2019-01-10 04:58:30'),
(8, 1, 'Return Procedure', 'return-procedure', NULL, 1, 1, '2019-01-10', '14:52:48', 1, '2019-01-10', '14:52:48', '2019-01-10 09:52:48', '2019-01-11 06:00:32'),
(9, 2, 'Drop-Off Procedure', 'drop-off-procedure', NULL, 1, 1, '2019-01-10', '14:53:04', 1, '2019-01-10', '14:54:15', '2019-01-10 09:53:04', '2019-01-11 06:00:32'),
(10, 4, 'Important', 'important', NULL, 1, 1, '2019-01-10', '14:53:10', 1, '2019-01-10', '14:58:15', '2019-01-10 09:53:10', '2019-01-10 05:11:19'),
(11, 3, 'Terms & Conditions', 'terms-conditions', NULL, 1, 1, '2019-01-10', '14:53:21', 1, '2019-01-10', '14:53:21', '2019-01-10 09:53:21', '2019-01-10 05:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `parking_types`
--

CREATE TABLE `parking_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_types`
--

INSERT INTO `parking_types` (`id`, `title`, `slug`, `description`, `meta_tags`, `meta_description`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(3, 'Park & Ride Service', 'park-ride-service', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Park & Ride Service', 'Park & Ride Service', 1, 1, '2019-01-09', '17:47:23', 1, '2019-01-09', '17:47:23', '2019-01-09 12:47:23', '2019-01-09 12:47:23'),
(4, 'Meet & Greet Service', 'meet-greet-service', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Meet & Greet Service', 'Meet & Greet Service', 1, 1, '2019-01-09', '17:47:35', 1, '2019-01-09', '17:47:35', '2019-01-09 12:47:35', '2019-01-09 12:47:35');

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `mobile`, `about_me`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Muhammad', 'Akbar', '03224063901', '03048888269', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1-Muhammad-Akbar.jpg', 1, '2019-01-02 11:57:05', '2019-05-09 16:27:41'),
(2, 2, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 1, '2019-01-02 14:42:32', '2019-01-02 14:42:32'),
(3, 3, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 1, '2019-01-31 16:12:41', '2019-01-31 16:12:41'),
(7, 7, NULL, NULL, NULL, NULL, NULL, 'default.jpg', 1, '2019-01-31 17:01:45', '2019-01-31 17:05:44'),
(8, 8, 'Muhammad', 'Akbar', '03224063901', '03048888269', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1-Muhammad-Akbar.jpg', 1, '2019-01-02 11:57:05', '2019-05-09 16:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `rolegroups`
--

CREATE TABLE `rolegroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `slug`, `description`, `meta_tags`, `meta_description`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(6, 'zmdi zmdi-twitter-box', 'Exclusive Prices', 'exclusive-prices', '<p>We work with quality suppliers to bring exclusive deals at unbeatable prices. We continuously review prices to make sure our customers get best price on airport parking on the day.We work with quality suppliers to bring exclusive deals at unbeatable prices. We continuously review prices to make sure our customers get best price on airport parking on the day.We work with quality suppliers to bring exclusive deals at unbeatable prices. We continuously review prices to make sure our customers get best price on airport parking on the day.We work with quality suppliers to bring exclusive deals at unbeatable prices. We continuously review prices to make sure our customers get best price on airport parking on the day.We work with quality suppliers to bring exclusive deals at unbeatable prices. We continuously review prices to make sure our customers get best price on airport parking on the day.</p>', 'Exclusive Prices', 'Exclusive Prices', 1, 1, '2019-01-05', '22:26:54', 1, '2019-01-10', '16:52:22', '2019-01-05 17:26:54', '2019-01-10 11:52:22'),
(7, 'zmdi zmdi-google-plus-box', 'Expert Customer Support', 'expert-customer-support', '<p>Our customer service team is dedicated to make your experience easy and hassle free. Call, email or chat with our team if you need any help with your booking or have any questions.Our customer service team is dedicated to make your experience easy and hassle free. Call, email or chat with our team if you need any help with your booking or have any questions.Our customer service team is dedicated to make your experience easy and hassle free. Call, email or chat with our team if you need any help with your booking or have any questions.Our customer service team is dedicated to make your experience easy and hassle free. Call, email or chat with our team if you need any help with your booking or have any questions.Our customer service team is dedicated to make your experience easy and hassle free. Call, email or chat with our team if you need any help with your booking or have any questions.Our customer service team is dedicated to make your experience easy and hassle free. Call, email or chat with our team if you need any help with your booking or have any questions.</p>', 'Expert Customer Support', 'Expert Customer Support', 1, 1, '2019-01-05', '22:27:19', 1, '2019-01-05', '22:38:20', '2019-01-05 17:27:19', '2019-01-05 17:38:20'),
(8, 'zmdi zmdi-android', 'Customer Satisfaction', 'customer-satisfaction', '<p>We aim to provide best customer experience for our valued customers. We work with our suppliers to ensure customer satisfaction by providing high quality parking service at affordable prices.We aim to provide best customer experience for our valued customers. We work with our suppliers to ensure customer satisfaction by providing high quality parking service at affordable prices.We aim to provide best customer experience for our valued customers. We work with our suppliers to ensure customer satisfaction by providing high quality parking service at affordable prices.We aim to provide best customer experience for our valued customers. We work with our suppliers to ensure customer satisfaction by providing high quality parking service at affordable prices.We aim to provide best customer experience for our valued customers. We work with our suppliers to ensure customer satisfaction by providing high quality parking service at affordable prices.</p>', 'Customer Satisfaction', 'Customer Satisfaction', 1, 1, '2019-01-05', '22:27:47', 1, '2019-01-05', '22:27:47', '2019-01-05 17:27:47', '2019-01-05 17:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_verification_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'email',
  `blog_comments_approved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'title',
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'slogan',
  `logo_light` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'logo-light.png',
  `logo_dark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'logo-dark.png',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_timing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_rights` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_verification_by`, `blog_comments_approved_by`, `title`, `slogan`, `logo_light`, `logo_dark`, `phone`, `email`, `orders_email`, `office_timing`, `address`, `copy_rights`, `created_at`, `updated_at`) VALUES
(1, 'direct', 'direct', 'Parking', 'Meet & Greet', 'logo-light.png', 'logo-dark.png', '03224063901', 'm.akbarsarwar@gmail.com', 'sarglobalsolutions@gmail.com', '121212', 'lahore', '© Copyright 2018 by Parking. All Rights Reserved.', '2019-01-01 19:00:00', '2019-01-02 18:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `setting_socials`
--

CREATE TABLE `setting_socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `socialsetup_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_socials`
--

INSERT INTO `setting_socials` (`id`, `socialsetup_id`, `name`, `icon`, `social_link`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Facebook', 'zmdi zmdi-facebook', 'http://google.com', 1, 1, '2019-01-04', '00:37:31', 1, '2019-01-04', '00:37:31', '2019-01-03 19:37:31', '2019-01-03 19:37:31'),
(2, 2, 'Twitter', 'zmdi zmdi-twitter', 'http://twitter.com', 1, 1, '2019-01-04', '00:37:31', 1, '2019-01-04', '00:37:31', '2019-01-03 19:37:31', '2019-01-03 19:37:31'),
(3, 4, 'Google Plus', 'zmdi zmdi-google-plus', 'http://google.com', 1, 1, '2019-01-04', '00:37:31', 1, '2019-01-04', '00:37:31', '2019-01-03 19:37:31', '2019-01-03 19:37:31'),
(4, 3, 'LinkedIn', 'zmdi zmdi-linkedin', 'http://linkedin.com', 1, 1, '2019-01-04', '00:37:31', 1, '2019-01-04', '00:37:31', '2019-01-03 19:37:31', '2019-01-03 19:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `socialsetup_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `user_id`, `profile_id`, `socialsetup_id`, `name`, `icon`, `social_link`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(13, 1, 1, 1, 'Facebook', 'zmdi zmdi-facebook', 'http://google.com', 1, 1, '2019-05-09', '18:32:30', 1, '2019-05-09', '18:32:30', '2019-05-09 16:32:30', '2019-05-09 16:32:30'),
(14, 1, 1, 2, 'Twitter', 'zmdi zmdi-twitter', 'http://twitter.com', 1, 1, '2019-05-09', '18:32:30', 1, '2019-05-09', '18:32:30', '2019-05-09 16:32:30', '2019-05-09 16:32:30'),
(15, 1, 1, 4, 'Google Plus', 'zmdi zmdi-google-plus', 'http://google.com', 1, 1, '2019-05-09', '18:32:30', 1, '2019-05-09', '18:32:30', '2019-05-09 16:32:30', '2019-05-09 16:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `social_setups`
--

CREATE TABLE `social_setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_setups`
--

INSERT INTO `social_setups` (`id`, `name`, `icon`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'zmdi zmdi-facebook', 1, 1, '2019-01-02', '23:20:46', 1, '2019-01-02', '23:20:46', '2019-01-02 18:20:46', '2019-01-02 18:20:46'),
(2, 'Twitter', 'zmdi zmdi-twitter', 1, 1, '2019-01-02', '23:20:51', 1, '2019-01-02', '23:20:51', '2019-01-02 18:20:51', '2019-01-02 18:20:51'),
(3, 'LinkedIn', 'zmdi zmdi-linkedin', 1, 1, '2019-01-02', '23:20:59', 1, '2019-01-02', '23:20:59', '2019-01-02 18:20:59', '2019-01-02 18:20:59'),
(4, 'Google Plus', 'zmdi zmdi-google-plus', 1, 1, '2019-01-02', '23:21:05', 1, '2019-01-02', '23:21:11', '2019-01-02 18:21:05', '2019-01-02 18:21:11'),
(5, 'Behance', 'zmdi zmdi-behance', 1, 1, '2019-01-02', '23:21:17', 1, '2019-01-02', '23:21:17', '2019-01-02 18:21:17', '2019-01-02 18:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` int(10) UNSIGNED NOT NULL,
  `short_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `short_title`, `title`, `slug`, `description`, `meta_tags`, `meta_description`, `avatar`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(2, 'Step 1', 'Departure & Arrival Details', 'departure-arrival-details', '<p>asdf</p>', 'Departure & Arrival Details', 'Departure & Arrival Details', '2-5c2f0288aefe0.png', 1, 1, '2019-01-04', '11:51:19', 1, '2019-01-04', '11:51:19', '2019-01-04 06:51:19', '2019-01-04 06:51:52'),
(3, 'Step 2', 'Your & Vehicle Detail', 'your-vehicle-detail', '<p>asdf</p>', 'Your & Vehicle Detail', 'Your & Vehicle Detail', '3-5c2f02b70e7d9.png', 1, 1, '2019-01-04', '11:52:33', 1, '2019-01-04', '11:52:33', '2019-01-04 06:52:33', '2019-01-04 06:52:39'),
(4, 'Step 3', 'Payment Detail', 'payment-detail', '<p>asdf asdf</p>', 'Payment Detail', 'Payment Detail', '4-5c2f02d06a2cf.png', 1, 1, '2019-01-04', '11:52:59', 1, '2019-01-04', '11:52:59', '2019-01-04 06:52:59', '2019-01-04 06:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title`, `slug`, `description`, `meta_tags`, `meta_description`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', 'mr', NULL, NULL, NULL, 1, 1, '2019-01-15', '14:08:33', 1, '2019-01-15', '14:08:33', '2019-01-15 09:08:34', '2019-01-15 09:08:34'),
(2, 'Mrs.', 'mrs', NULL, NULL, NULL, 1, 1, '2019-01-15', '14:08:45', 1, '2019-01-15', '14:08:45', '2019-01-15 09:08:45', '2019-01-15 09:08:45'),
(3, 'Miss.', 'miss', NULL, NULL, NULL, 1, 1, '2019-01-15', '14:08:52', 1, '2019-01-15', '14:08:52', '2019-01-15 09:08:52', '2019-01-15 09:08:52'),
(4, 'Ms', 'ms', NULL, NULL, NULL, 1, 1, '2019-01-15', '14:08:58', 1, '2019-01-15', '14:08:58', '2019-01-15 09:08:58', '2019-01-15 09:08:58'),
(5, 'Mme', 'mme', NULL, NULL, NULL, 1, 1, '2019-01-15', '14:09:07', 1, '2019-01-15', '14:09:07', '2019-01-15 09:09:07', '2019-01-15 09:09:07'),
(6, 'Mlle', 'mlle', NULL, NULL, NULL, 1, 1, '2019-01-15', '14:09:16', 1, '2019-01-15', '14:09:16', '2019-01-15 09:09:16', '2019-01-15 09:09:16'),
(7, 'asdf', 'asdf', NULL, NULL, NULL, 1, 1, '2019-01-15', '14:09:21', 1, '2019-01-15', '14:09:21', '2019-01-15 09:09:21', '2019-01-15 09:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `type`, `name`, `email`, `email_verified_at`, `password`, `permissions`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'admin', NULL, 'ali@doctorhoster.com', NULL, '$2y$10$mic5JN3HDHCK1pM0V5Gk1ugn6Ky9Mn8ygD4VmewXSlZTcuGfA.cba', ',social-setup-add,social-setup-update,social-setup-delete,blog-category-setup-delete,blog-category-setup-update,blog-category-setup-add,dashboard-view,blog-post-update,blog-post-delete,blog-post-add,faqs-add,faqs-update,faqs-delete,steps-add,steps-update,steps-delete,pages-add,pages-update,pages-delete,services-add,services-update,services-delete,airport-add,airport-update,airport-delete,setup-parking-services-add,setup-parking-services-update,setup-parking-services-delete,setup-parking-types-delete,setup-parking-types-update,setup-parking-types-add,setup-cancellation-add,setup-cancellation-update,setup-cancellation-delete,setup-parking-tabs-add,setup-parking-tabs-update,setup-parking-tabs-delete,parking-add,parking-update,parking-delete,setup-title-add,setup-title-update,setup-title-delete,airport-terminals-add,airport-terminals-delete,airport-terminals-update,user-delete,user-update,user-add,users-add,users-update,users-delete,user-parkings-add,user-parkings-update,user-parkings-delete', 'OMJ2lI9UWiDfTQz9dQFdEhQx5OnDc8rYnLEr9ZNo6HaH53Rgmd4qfBwWExJJ', '2019-01-02 11:57:05', '2019-05-09 16:32:30'),
(2, NULL, 'normal', NULL, 'm.akbarsarwar+2@gmail.com', NULL, '$2y$10$Ty4UvPawy2530ayTqW0r9uv2B5nlXN8GCJXf.SnBCSvROYSO2dOom', NULL, 'xzQyB7NwlbBQFDrqTjDDa9yrnOSV7jg25OZwHqXmyleEWwGUB334lVLewnzN', '2019-01-02 14:42:32', '2019-01-02 14:42:32'),
(7, NULL, 'user', NULL, 'm.akbarsarwar+3@gmail.com', NULL, '$2y$10$RSw.j0xPtvTxK4W9q7wBT.BM9I3tJb09371s9pBogiieLbLPs0tiu', NULL, NULL, '2019-01-31 17:01:45', '2019-01-31 17:09:18'),
(8, 'super_admin', 'admin', NULL, 'm.akbarsarwar@gmail.com', NULL, '$2y$10$mic5JN3HDHCK1pM0V5Gk1ugn6Ky9Mn8ygD4VmewXSlZTcuGfA.cba', ',social-setup-add,social-setup-update,social-setup-delete,blog-category-setup-delete,blog-category-setup-update,blog-category-setup-add,dashboard-view,blog-post-update,blog-post-delete,blog-post-add,faqs-add,faqs-update,faqs-delete,steps-add,steps-update,steps-delete,pages-add,pages-update,pages-delete,services-add,services-update,services-delete,airport-add,airport-update,airport-delete,setup-parking-services-add,setup-parking-services-update,setup-parking-services-delete,setup-parking-types-delete,setup-parking-types-update,setup-parking-types-add,setup-cancellation-add,setup-cancellation-update,setup-cancellation-delete,setup-parking-tabs-add,setup-parking-tabs-update,setup-parking-tabs-delete,parking-add,parking-update,parking-delete,setup-title-add,setup-title-update,setup-title-delete,airport-terminals-add,airport-terminals-delete,airport-terminals-update,user-delete,user-update,user-add,users-add,users-update,users-delete,user-parkings-add,user-parkings-update,user-parkings-delete', 'AJyhO1g8anUveC7eJ41qJpuEb3cXIyVefxhLHVWsjKtDzYksQXZZtlhPG3kD', '2019-01-02 11:57:05', '2019-05-09 16:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `completed_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, '$2y$10$7ai5CtLxMdrENbuO2km7Qeq7gxxVhp.olViDEmiXnSfPyj9wYSgi', 1, '2019-01-02', '2019-01-02 11:57:05', '2019-01-02 11:57:05'),
(2, 2, '$2y$10$JTJyf2j7aoTqmYgDy6zW.Q106I0nd2T73S.OI2BlFFe.vvB.w..i', 1, '2019-01-02', '2019-01-02 14:42:32', '2019-01-02 14:42:32'),
(4, 7, '$2y$10$mOlzbzzOV90HSLn2I9DNuNZRbmKLem9uUBTBfgEPLebCKBcwkKHy', 1, '2019-01-31', '2019-01-31 17:01:45', '2019-01-31 17:01:45'),
(5, 8, '$2y$10$mOlzbzzOV90HSLn2I9DNuNZRbmKLem9uUBTBfgEPLebCKBcwkKHy', 1, '2019-01-31', '2019-01-31 17:01:45', '2019-01-31 17:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_parkings`
--

CREATE TABLE `user_parkings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `parking_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_parkings`
--

INSERT INTO `user_parkings` (`id`, `user_id`, `parking_id`, `status`, `created_by`, `created_date`, `created_time`, `updated_by`, `updated_date`, `updated_time`, `created_at`, `updated_at`) VALUES
(5, 7, 1, 1, 1, '2019-02-01', '11:02:53', 1, '2019-02-01', '11:02:53', '2019-02-01 10:02:53', '2019-02-01 10:02:53'),
(6, 7, 3, 0, 1, '2019-02-01', '11:03:00', 1, '2019-02-01', '11:03:00', '2019-02-01 10:03:00', '2019-02-01 10:03:00'),
(7, 7, 2, 1, 1, '2019-02-01', '11:03:08', 1, '2019-02-01', '11:03:08', '2019-02-01 10:03:08', '2019-02-01 10:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_password_resets`
--

CREATE TABLE `user_password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_password_resets`
--

INSERT INTO `user_password_resets` (`id`, `user_id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 1, 'm.akbarsarwar@gmail.com', '$2y$10$CpZYG1k9q01vURVOWmVM.OqpfUIGkuuygX3yfw3AYiwoflEDq29m', '2019-01-04 04:48:30', '2019-01-04 04:48:30'),
(2, 1, 'm.akbarsarwar@gmail.com', '$2y$10$4UCUd4jbxQfs3WlJBdDLy.7T7pZacOniScel8JJTDzjkEHBYj4G', '2019-01-04 04:48:52', '2019-01-04 04:48:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airports_created_by_index` (`created_by`),
  ADD KEY `airports_updated_by_index` (`updated_by`);

--
-- Indexes for table `airport_terminals`
--
ALTER TABLE `airport_terminals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airport_terminals_airport_id_index` (`airport_id`),
  ADD KEY `airport_terminals_created_by_index` (`created_by`),
  ADD KEY `airport_terminals_updated_by_index` (`updated_by`);

--
-- Indexes for table `blog_category_setups`
--
ALTER TABLE `blog_category_setups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_category_setups_created_by_index` (`created_by`),
  ADD KEY `blog_category_setups_updated_by_index` (`updated_by`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blogcomment_id_index` (`blogcomment_id`),
  ADD KEY `blog_comments_blogcategorysetup_id_index` (`blogcategorysetup_id`),
  ADD KEY `blog_comments_blogpost_id_index` (`blogpost_id`),
  ADD KEY `blog_comments_user_id_index` (`user_id`),
  ADD KEY `blog_comments_created_by_index` (`created_by`),
  ADD KEY `blog_comments_updated_by_index` (`updated_by`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_posts_blogcategorysetup_id_index` (`blogcategorysetup_id`),
  ADD KEY `blog_posts_created_by_index` (`created_by`),
  ADD KEY `blog_posts_updated_by_index` (`updated_by`);

--
-- Indexes for table `cancellations`
--
ALTER TABLE `cancellations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancellations_created_by_index` (`created_by`),
  ADD KEY `cancellations_updated_by_index` (`updated_by`);

--
-- Indexes for table `contact_uses`
--
ALTER TABLE `contact_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_forms`
--
ALTER TABLE `contact_us_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_created_by_index` (`created_by`),
  ADD KEY `faqs_updated_by_index` (`updated_by`);

--
-- Indexes for table `image_readies`
--
ALTER TABLE `image_readies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_airport_id_index` (`airport_id`),
  ADD KEY `orders_mybookparking_id_index` (`mybookparking_id`),
  ADD KEY `orders_title_id_index` (`title_id`),
  ADD KEY `orders_departterminal_id_index` (`departterminal_id`),
  ADD KEY `orders_arrivalterminal_id_index` (`arrivalterminal_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_created_by_index` (`created_by`),
  ADD KEY `pages_updated_by_index` (`updated_by`);

--
-- Indexes for table `parkings`
--
ALTER TABLE `parkings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parkings_airport_id_index` (`airport_id`),
  ADD KEY `parkings_parkingtype_id_index` (`parkingtype_id`),
  ADD KEY `parkings_cancellation_id_index` (`cancellation_id`),
  ADD KEY `parkings_created_by_index` (`created_by`),
  ADD KEY `parkings_updated_by_index` (`updated_by`);

--
-- Indexes for table `parkings_testimonials`
--
ALTER TABLE `parkings_testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parkings_testimonials_order_id_index` (`order_id`),
  ADD KEY `parkings_testimonials_created_by_index` (`created_by`),
  ADD KEY `parkings_testimonials_updated_by_index` (`updated_by`);

--
-- Indexes for table `parking_services`
--
ALTER TABLE `parking_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parking_services_created_by_index` (`created_by`),
  ADD KEY `parking_services_updated_by_index` (`updated_by`);

--
-- Indexes for table `parking_services_details`
--
ALTER TABLE `parking_services_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parking_services_details_parking_id_index` (`parking_id`),
  ADD KEY `parking_services_details_parkingservice_id_index` (`parkingservice_id`),
  ADD KEY `parking_services_details_created_by_index` (`created_by`),
  ADD KEY `parking_services_details_updated_by_index` (`updated_by`);

--
-- Indexes for table `parking_tabs`
--
ALTER TABLE `parking_tabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parking_tabs_created_by_index` (`created_by`),
  ADD KEY `parking_tabs_updated_by_index` (`updated_by`);

--
-- Indexes for table `parking_types`
--
ALTER TABLE `parking_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parking_types_created_by_index` (`created_by`),
  ADD KEY `parking_types_updated_by_index` (`updated_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

--
-- Indexes for table `rolegroups`
--
ALTER TABLE `rolegroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_created_by_index` (`created_by`),
  ADD KEY `services_updated_by_index` (`updated_by`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_socials`
--
ALTER TABLE `setting_socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_socials_socialsetup_id_index` (`socialsetup_id`),
  ADD KEY `setting_socials_created_by_index` (`created_by`),
  ADD KEY `setting_socials_updated_by_index` (`updated_by`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socials_user_id_index` (`user_id`),
  ADD KEY `socials_profile_id_index` (`profile_id`),
  ADD KEY `socials_socialsetup_id_index` (`socialsetup_id`),
  ADD KEY `socials_created_by_index` (`created_by`),
  ADD KEY `socials_updated_by_index` (`updated_by`);

--
-- Indexes for table `social_setups`
--
ALTER TABLE `social_setups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_setups_created_by_index` (`created_by`),
  ADD KEY `social_setups_updated_by_index` (`updated_by`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `steps_created_by_index` (`created_by`),
  ADD KEY `steps_updated_by_index` (`updated_by`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titles_created_by_index` (`created_by`),
  ADD KEY `titles_updated_by_index` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_user_id_index` (`user_id`);

--
-- Indexes for table `user_parkings`
--
ALTER TABLE `user_parkings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_parkings_user_id_index` (`user_id`),
  ADD KEY `user_parkings_parking_id_index` (`parking_id`),
  ADD KEY `user_parkings_created_by_index` (`created_by`),
  ADD KEY `user_parkings_updated_by_index` (`updated_by`);

--
-- Indexes for table `user_password_resets`
--
ALTER TABLE `user_password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_password_resets_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `airport_terminals`
--
ALTER TABLE `airport_terminals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog_category_setups`
--
ALTER TABLE `blog_category_setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cancellations`
--
ALTER TABLE `cancellations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us_forms`
--
ALTER TABLE `contact_us_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image_readies`
--
ALTER TABLE `image_readies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parkings`
--
ALTER TABLE `parkings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parkings_testimonials`
--
ALTER TABLE `parkings_testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `parking_services`
--
ALTER TABLE `parking_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parking_services_details`
--
ALTER TABLE `parking_services_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=624;

--
-- AUTO_INCREMENT for table `parking_tabs`
--
ALTER TABLE `parking_tabs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parking_types`
--
ALTER TABLE `parking_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rolegroups`
--
ALTER TABLE `rolegroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_socials`
--
ALTER TABLE `setting_socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `social_setups`
--
ALTER TABLE `social_setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_parkings`
--
ALTER TABLE `user_parkings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_password_resets`
--
ALTER TABLE `user_password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
