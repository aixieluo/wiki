-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-05-12 17:14:16
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

--
-- 转存表中的数据 `attributes`
--

INSERT INTO `attributes` (`id`, `attributeable_id`, `attributeable_type`, `fire`, `penetrate`, `durable`, `armor`, `hit`, `dodge`, `concealment`, `spy`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'App\\Models\\Equipment', 0.00, 0.00, 0.00, 288.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 05:17:29', '2017-05-03 06:02:46', NULL),
(2, 1, 'App\\Models\\Dancer', 564.90, 279.90, 879.60, 299.60, 90.00, 90.00, 60.00, 90.00, '2017-05-03 05:41:07', '2017-05-10 03:15:32', NULL),
(3, 1, 'App\\Models\\Technology', 0.00, 0.00, 0.00, 0.00, 0.00, 150.00, 0.00, 50.00, '2017-05-03 06:01:46', '2017-05-03 06:01:46', NULL),
(4, 3, 'App\\Models\\Technology', 0.00, 0.00, 0.00, 615.00, 0.00, 15.00, 0.00, 0.00, '2017-05-03 06:02:51', '2017-05-09 05:00:06', NULL),
(5, 2, 'App\\Models\\Equipment', 0.00, 0.00, 0.00, 288.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 06:03:16', '2017-05-03 06:03:16', NULL),
(6, 3, 'App\\Models\\Equipment', 0.00, 0.00, 0.00, 288.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 06:03:39', '2017-05-03 06:03:39', NULL),
(7, 5, 'App\\Models\\Technology', 0.00, 0.00, 1800.00, 255.00, 150.00, 0.00, 0.00, 0.00, '2017-05-03 06:03:56', '2017-05-03 06:03:56', NULL),
(8, 7, 'App\\Models\\Technology', 1095.00, 405.00, 0.00, 0.00, 60.00, 0.00, 0.00, 0.00, '2017-05-03 06:04:33', '2017-05-09 04:52:15', NULL),
(9, 4, 'App\\Models\\Equipment', 0.00, 0.00, 1319.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 06:06:18', '2017-05-04 06:53:13', NULL),
(10, 5, 'App\\Models\\Equipment', 0.00, 0.00, 1319.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 06:06:44', '2017-05-03 06:06:44', NULL),
(11, 6, 'App\\Models\\Equipment', 0.00, 0.00, 1241.00, 87.00, 0.00, 0.00, -35.00, 0.00, '2017-05-03 06:08:20', '2017-05-03 06:08:28', NULL),
(12, 8, 'App\\Models\\Technology', 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, '2017-05-06 01:31:33', '2017-05-06 01:32:35', NULL),
(13, 9, 'App\\Models\\Technology', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-08 13:50:06', '2017-05-10 03:17:14', NULL),
(14, 2, 'App\\Models\\Dancer', 500.00, 200.00, 1000.00, 500.00, 100.00, 100.00, 100.00, 100.00, '2017-05-08 22:29:02', '2017-05-08 22:31:48', NULL),
(15, 3, 'App\\Models\\Dancer', 726.00, 277.00, 722.00, 236.00, 90.00, 110.00, 80.00, 75.00, '2017-05-09 05:57:50', '2017-05-10 02:44:35', NULL),
(16, 10, 'App\\Models\\Technology', 1200.00, 395.00, 0.00, 0.00, 105.00, 0.00, 0.00, 0.00, '2017-05-09 06:02:35', '2017-05-09 06:02:35', NULL),
(17, 4, 'App\\Models\\Dancer', 654.00, 252.00, 555.00, 184.00, 70.00, 40.00, 95.00, 50.00, '2017-05-10 02:50:37', '2017-05-10 02:50:37', NULL),
(18, 11, 'App\\Models\\Technology', 745.00, 715.00, 0.00, 0.00, 130.00, 0.00, 0.00, 0.00, '2017-05-10 02:53:15', '2017-05-10 02:53:15', NULL),
(19, 12, 'App\\Models\\Technology', 0.00, 0.00, 0.00, 190.00, 0.00, 65.00, 45.00, 0.00, '2017-05-10 02:54:59', '2017-05-10 02:54:59', NULL),
(20, 13, 'App\\Models\\Technology', 520.00, 0.00, 1295.00, 0.00, 120.00, 0.00, 0.00, 0.00, '2017-05-10 02:55:54', '2017-05-10 02:55:54', NULL),
(21, 14, 'App\\Models\\Technology', 0.00, 0.00, 0.00, 0.00, 45.00, 65.00, 0.00, 35.00, '2017-05-10 02:56:43', '2017-05-10 02:56:43', NULL),
(22, 7, 'App\\Models\\Equipment', 0.00, 164.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-10 03:10:06', '2017-05-10 03:10:06', NULL),
(23, 8, 'App\\Models\\Equipment', 0.00, 164.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-10 03:10:24', '2017-05-10 03:10:24', NULL),
(24, 9, 'App\\Models\\Equipment', 0.00, 164.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-10 03:10:42', '2017-05-10 03:10:42', NULL),
(25, 10, 'App\\Models\\Equipment', 135.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-10 03:11:32', '2017-05-10 03:11:32', NULL),
(26, 11, 'App\\Models\\Equipment', 0.00, 98.00, 0.00, 0.00, 56.00, 0.00, 0.00, 0.00, '2017-05-10 03:12:16', '2017-05-10 03:12:16', NULL),
(27, 12, 'App\\Models\\Equipment', 0.00, 0.00, 0.00, 0.00, 34.00, 0.00, 46.00, 0.00, '2017-05-10 03:12:54', '2017-05-10 03:12:54', NULL),
(28, 13, 'App\\Models\\Equipment', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 39.00, 0.00, '2017-05-10 03:13:15', '2017-05-10 03:13:15', NULL),
(29, 14, 'App\\Models\\Equipment', 491.00, 82.00, 0.00, 0.00, 0.00, -41.00, 0.00, 0.00, '2017-05-10 03:13:54', '2017-05-10 03:13:54', NULL),
(30, 5, 'App\\Models\\Dancer', 854.00, 312.00, 966.00, 323.00, 60.00, 90.00, 55.00, 65.00, '2017-05-10 03:20:24', '2017-05-10 03:37:17', NULL),
(31, 15, 'App\\Models\\Technology', 1555.00, 420.00, 0.00, 0.00, 80.00, 0.00, 0.00, 0.00, '2017-05-10 03:23:35', '2017-05-10 03:23:35', NULL),
(32, 16, 'App\\Models\\Technology', 0.00, 350.00, 1870.00, 0.00, 100.00, 0.00, 50.00, 0.00, '2017-05-10 03:25:03', '2017-05-10 03:25:03', NULL),
(33, 17, 'App\\Models\\Technology', 0.00, 0.00, 0.00, 665.00, 0.00, 5.00, 0.00, 0.00, '2017-05-10 03:26:34', '2017-05-10 03:26:34', NULL),
(34, 6, 'App\\Models\\Dancer', 485.00, 226.00, 720.00, 246.00, 85.00, 50.00, 70.00, 50.00, '2017-05-10 05:13:12', '2017-05-10 05:13:12', NULL),
(35, 7, 'App\\Models\\Dancer', 485.00, 226.00, 720.00, 246.00, 85.00, 50.00, 70.00, 50.00, '2017-05-10 05:13:13', '2017-05-10 05:13:20', '2017-05-10 05:13:20');

--
-- 转存表中的数据 `countries`
--

INSERT INTO `countries` (`id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '德系', '2017-05-03 05:13:33', '2017-05-03 05:13:33', NULL),
(2, '英系', '2017-05-08 22:14:20', '2017-05-08 22:14:20', NULL),
(3, '苏系', '2017-05-08 22:39:05', '2017-05-08 22:39:05', NULL),
(4, '美系', '2017-05-09 05:32:25', '2017-05-09 05:32:25', NULL),
(5, '中系', '2017-05-09 05:32:38', '2017-05-09 05:32:38', NULL),
(6, '日系', '2017-05-09 05:32:46', '2017-05-09 05:32:46', NULL),
(7, '日系', '2017-05-09 05:32:48', '2017-05-09 05:32:51', '2017-05-09 05:32:51'),
(8, '法系', '2017-05-09 05:33:05', '2017-05-09 05:33:05', NULL);

--
-- 转存表中的数据 `dancers`
--

INSERT INTO `dancers` (`id`, `name`, `dance_outfit`, `type_id`, `country_id`, `rarity_id`, `subjection`, `introduction`, `character`, `grow_fire`, `grow_penetrate`, `grow_durable`, `grow_armor`, `barbette`, `refit`, `outside`, `inwall`, `inwarehouse`, `carriage`, `special`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '蕾娜•巴洛特', '豹式F型', 1, 1, 1, 'S.V.S.', '暂无', '暂无', 18.10, 8.10, 26.40, 8.40, 1, 1, 2, 1, 0, 0, 1, '2017-05-03 05:41:07', '2017-05-03 05:41:07', NULL),
(2, '鸡蛋饼', 'Zero Dust工程维修车', 2, 2, 1, 'S.V.S.', '非常好吃的鸡蛋饼，有官方认证。', '热兵器', 2000.00, 500.00, 3000.00, 1000.00, 1, 2, 2, 1, 0, 0, 1, '2017-05-08 22:29:02', '2017-05-08 22:31:48', NULL),
(3, '奥德莉 埃斯特拉', '洛林155自行火炮', 5, 8, 1, 'S.V.S.', '', '', 21.20, 7.71, 22.00, 6.71, 0, 3, 1, 1, 0, 1, 1, '2017-05-09 05:57:50', '2017-05-09 05:57:50', NULL),
(4, '莫夏·梅列茨安娜', 'SU-8自行火炮', 5, 3, 1, 'S.V.S.', '', '', 19.71, 7.10, 15.61, 4.91, 0, 3, 1, 1, 0, 1, 2, '2017-05-10 02:50:37', '2017-05-10 02:50:37', NULL),
(5, '茜罗娅·约德尔', '突击虎式', 6, 1, 1, 'S.V.S.', '', '', 24.00, 7.71, 26.40, 8.40, 0, 2, 0, 3, 0, 0, 1, '2017-05-10 03:20:24', '2017-05-10 03:37:17', NULL),
(6, '沙克娜·图尔斯', '玛蒂尔达CS', 1, 2, 1, 'S.V.S.', '', '', 23.52, 10.98, 33.01, 10.23, 1, 2, 0, 3, 0, 0, 1, '2017-05-10 05:13:12', '2017-05-10 05:13:12', NULL),
(7, '沙克娜·图尔斯', '玛蒂尔达CS', 1, 2, 1, 'S.V.S.', '', '', 23.52, 10.98, 33.01, 10.23, 1, 2, 0, 3, 0, 0, 1, '2017-05-10 05:13:13', '2017-05-10 05:13:20', '2017-05-10 05:13:20');

--
-- 转存表中的数据 `dancer_technology`
--

INSERT INTO `dancer_technology` (`id`, `dancer_id`, `technology_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 5),
(4, 1, 7),
(5, 1, 8),
(6, 1, 9),
(7, 2, 1),
(8, 2, 3),
(9, 2, 5),
(10, 2, 7),
(11, 4, 14),
(12, 4, 13),
(13, 4, 12),
(14, 4, 11),
(15, 4, 9),
(17, 5, 1),
(18, 5, 15),
(19, 5, 16),
(20, 5, 17);

--
-- 转存表中的数据 `equipment`
--

INSERT INTO `equipment` (`id`, `equipment_info_id`, `slot_id`, `lv`, `price`, `main`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 8, 0, 0, '2017-05-03 05:17:29', '2017-05-03 05:17:29', NULL),
(2, 1, 5, 8, 0, 1, '2017-05-03 06:03:16', '2017-05-03 06:03:16', NULL),
(3, 1, 8, 8, 0, 0, '2017-05-03 06:03:39', '2017-05-03 06:03:39', NULL),
(4, 3, 6, 8, 0, 1, '2017-05-03 06:06:18', '2017-05-04 06:53:13', NULL),
(5, 3, 7, 8, 0, 0, '2017-05-03 06:06:44', '2017-05-03 06:06:44', NULL),
(6, 2, 7, 8, 0, 1, '2017-05-03 06:08:20', '2017-05-03 06:08:20', NULL),
(7, 4, 4, 5, 0, 1, '2017-05-10 03:10:06', '2017-05-10 03:10:06', NULL),
(8, 4, 5, 5, 0, 0, '2017-05-10 03:10:23', '2017-05-10 03:10:23', NULL),
(9, 4, 8, 5, 0, 1, '2017-05-10 03:10:42', '2017-05-10 03:10:42', NULL),
(10, 5, 5, 5, 0, 1, '2017-05-10 03:11:32', '2017-05-10 03:11:32', NULL),
(11, 6, 5, 5, 0, 1, '2017-05-10 03:12:16', '2017-05-10 03:12:16', NULL),
(12, 7, 7, 5, 0, 1, '2017-05-10 03:12:54', '2017-05-10 03:12:54', NULL),
(13, 8, 6, 5, 0, 1, '2017-05-10 03:13:15', '2017-05-10 03:13:15', NULL),
(14, 10, 9, 5, 0, 1, '2017-05-10 03:13:54', '2017-05-10 03:13:54', NULL);

--
-- 转存表中的数据 `equipment_infos`
--

INSERT INTO `equipment_infos` (`id`, `name`, `describe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '外挂装甲', '', '2017-05-03 05:15:37', '2017-05-03 05:15:37', NULL),
(2, '增厚护甲片', '', '2017-05-03 05:16:19', '2017-05-03 05:16:19', NULL),
(3, '防崩落内衬', '', '2017-05-03 05:16:31', '2017-05-03 05:16:31', NULL),
(4, '强化火药', '', '2017-05-10 03:06:26', '2017-05-10 03:06:26', NULL),
(5, '输弹机', '', '2017-05-10 03:06:43', '2017-05-10 03:06:43', NULL),
(6, '排烟器', '', '2017-05-10 03:06:54', '2017-05-10 03:06:54', NULL),
(7, '步兵扶手', '', '2017-05-10 03:07:03', '2017-05-10 03:07:03', NULL),
(8, '伪装遮障', '', '2017-05-10 03:07:23', '2017-05-10 03:07:23', NULL),
(9, '住处', '', '2017-05-10 03:07:31', '2017-05-10 03:07:33', '2017-05-10 03:07:33'),
(10, '助锄', '', '2017-05-10 03:07:40', '2017-05-10 03:07:40', NULL);

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_11_014506_create_admins_table', 1),
(4, '2016_11_11_014590_create_types_table', 1),
(5, '2016_11_11_014591_create_countries_table', 1),
(6, '2016_11_11_014592_create_rarities_table', 1),
(7, '2016_11_11_014602_create_dancers_table', 1),
(8, '2016_11_11_014615_create_effects_table', 1),
(9, '2016_11_11_014633_create_attributes_table', 1),
(10, '2016_11_11_014650_create_technology_categories_table', 1),
(11, '2016_11_11_014651_create_technology_types_table', 1),
(12, '2016_11_11_014655_create_technologies_table', 1),
(13, '2016_11_11_014808_create_images_table', 1),
(14, '2016_11_24_054813_create_dancer_technology_table', 1),
(15, '2016_12_07_074347_create_effectables_table', 1),
(16, '2016_12_13_050022_create_equipment_infos_table', 1),
(17, '2016_12_13_050022_create_slots_table', 1),
(18, '2016_12_13_050023_create_equipment_table', 1),
(19, '2016_12_22_071834_create_tactic_infos_table', 1),
(20, '2016_12_22_071835_create_tactics_table', 1),
(21, '2016_12_23_075644_create_consumptions_table', 1),
(22, '2016_12_27_075111_create_skill_infos_table', 1),
(23, '2016_12_27_075112_create_skills_table', 1);

--
-- 转存表中的数据 `rarities`
--

INSERT INTO `rarities` (`id`, `level`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '橙', '2017-05-03 05:13:43', '2017-05-09 05:33:30', NULL),
(3, 2, '紫', '2017-05-08 22:39:41', '2017-05-08 22:39:41', NULL),
(4, 1, '蓝', '2017-05-09 05:33:41', '2017-05-09 05:33:41', NULL);

--
-- 转存表中的数据 `skills`
--

INSERT INTO `skills` (`id`, `skill_info_id`, `lv`, `fire_up`, `penetrate_up`, `durable_up`, `armor_up`, `hit_up`, `dodge_up`, `concealment_up`, `spy_up`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, 2.00, 2.00, 2.00, 2.00, 2.00, 2.00, 0.00, 0.00, '2017-05-03 05:50:20', '2017-05-03 05:50:20', NULL),
(2, 2, 6, 677.00, 258.00, 569.00, 188.00, 63.00, 36.00, 0.00, 0.00, '2017-05-10 03:02:20', '2017-05-10 03:02:20', NULL);

--
-- 转存表中的数据 `skill_infos`
--

INSERT INTO `skill_infos` (`id`, `name`, `describe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '特攻炮弹', '缠斗阶段，对单体目标进行高伤害打击。', '2017-05-03 05:48:12', '2017-05-03 05:48:12', NULL),
(2, '列车炮作业', '', '2017-05-10 03:01:53', '2017-05-10 03:01:53', NULL);

--
-- 转存表中的数据 `slots`
--

INSERT INTO `slots` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '外挂装甲', '2017-05-03 05:14:05', '2017-05-03 05:15:19', '2017-05-03 05:15:19'),
(2, '增厚护甲片', '2017-05-03 05:14:21', '2017-05-03 05:15:18', '2017-05-03 05:15:18'),
(3, '防崩落内衬', '2017-05-03 05:14:40', '2017-05-03 05:15:17', '2017-05-03 05:15:17'),
(4, '炮座', '2017-05-03 05:15:48', '2017-05-03 05:15:48', NULL),
(5, '改装', '2017-05-03 05:15:53', '2017-05-03 05:15:53', NULL),
(6, '内壁', '2017-05-03 05:15:57', '2017-05-03 05:15:57', NULL),
(7, '外身', '2017-05-03 05:16:02', '2017-05-03 05:16:02', NULL),
(8, '特殊', '2017-05-03 05:16:08', '2017-05-03 05:16:08', NULL),
(9, '炮架', '2017-05-03 05:35:52', '2017-05-03 05:35:52', NULL),
(10, '内仓', '2017-05-03 05:35:59', '2017-05-03 05:35:59', NULL);

--
-- 转存表中的数据 `tactics`
--

INSERT INTO `tactics` (`id`, `tactic_info_id`, `lv`, `fire_up`, `penetrate_up`, `durable_up`, `armor_up`, `hit_up`, `dodge_up`, `concealment_up`, `spy_up`, `fire_down`, `penetrate_down`, `durable_down`, `armor_down`, `hit_down`, `dodge_down`, `concealment_down`, `spy_down`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, 0.00, 0.00, 4.40, 5.06, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.35, 0.00, 0.00, 0.00, 0.00, '2017-05-03 05:47:40', '2017-05-03 05:47:40', NULL),
(2, 2, 1, 1.80, 1.80, 1.80, 1.80, 2.00, 2.00, 0.00, 0.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, '2017-05-09 06:09:34', '2017-05-09 06:09:34', NULL),
(3, 3, 6, 1.32, 1.32, 0.00, 0.00, 1.32, 0.00, 0.00, 0.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, '2017-05-10 02:59:15', '2017-05-10 02:59:15', NULL);

--
-- 转存表中的数据 `tactic_infos`
--

INSERT INTO `tactic_infos` (`id`, `name`, `describe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '装甲构造定制', '大幅增加耐久和装甲（以装甲为主）加成，但设备提供的参数下降。', '2017-05-03 05:46:43', '2017-05-03 05:46:43', NULL),
(2, '泛用战法', '', '2017-05-09 06:05:52', '2017-05-09 06:05:52', NULL),
(3, '支援战法定制', '', '2017-05-10 02:58:16', '2017-05-10 02:58:16', NULL);

--
-- 转存表中的数据 `technologies`
--

INSERT INTO `technologies` (`id`, `technology_type_id`, `name`, `rank`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, '耐寒防尘模块化引擎', 3, '2017-05-03 06:01:46', '2017-05-03 06:01:46', NULL),
(2, 8, '中型直面特质填充复合装甲', 3, '2017-05-03 06:02:40', '2017-05-03 06:11:28', '2017-05-03 06:11:28'),
(3, 8, '中型直面特质填充复合装甲', 3, '2017-05-03 06:02:51', '2017-05-03 06:02:51', NULL),
(4, 11, '炮塔中后置倾斜高强度车体', 3, '2017-05-03 06:03:48', '2017-05-03 06:11:25', '2017-05-03 06:11:25'),
(5, 11, '炮塔中后置倾斜高强度车体', 3, '2017-05-03 06:03:56', '2017-05-03 06:03:56', NULL),
(6, 1, '被帽风帽高韧质内芯硬芯穿甲弹', 3, '2017-05-03 06:04:25', '2017-05-03 06:10:11', '2017-05-03 06:10:11'),
(7, 2, '被帽风帽高韧质内芯硬芯穿甲弹', 3, '2017-05-03 06:04:33', '2017-05-09 04:52:15', NULL),
(8, 5, '测试', 1, '2017-05-06 01:31:33', '2017-05-06 01:32:35', NULL),
(9, 13, '(暂无)', 1, '2017-05-08 13:50:06', '2017-05-08 13:50:06', NULL),
(10, 1, '尾翼稳定含能破片激发改良碎甲弹', 3, '2017-05-09 06:02:35', '2017-05-09 06:02:35', NULL),
(11, 6, '气缸尾翼深锥破甲弹（中口径）', 3, '2017-05-10 02:53:15', '2017-05-10 02:53:15', NULL),
(12, 10, '轻薄高韧质强化复层装甲', 2, '2017-05-10 02:54:58', '2017-05-10 02:54:58', NULL),
(13, 11, '步兵炮型高强度车体', 3, '2017-05-10 02:55:54', '2017-05-10 02:55:54', NULL),
(14, 12, '防尘防水高效引擎', 2, '2017-05-10 02:56:43', '2017-05-10 02:56:43', NULL),
(15, 5, '涡轮破甲型火箭弹（大口径）', 3, '2017-05-10 03:23:35', '2017-05-10 03:23:35', NULL),
(16, 11, '低重心型高强度车体', 3, '2017-05-10 03:25:03', '2017-05-10 03:25:03', NULL),
(17, 9, '重装直面特质填充复合装甲', 3, '2017-05-10 03:26:34', '2017-05-10 03:26:34', NULL);

--
-- 转存表中的数据 `technology_categories`
--

INSERT INTO `technology_categories` (`id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '主炮', '2017-05-03 05:56:37', '2017-05-03 05:56:37', NULL),
(2, '防护', '2017-05-03 05:56:43', '2017-05-03 05:56:43', NULL),
(3, '车体', '2017-05-03 05:56:47', '2017-05-03 05:56:47', NULL),
(4, '引擎', '2017-05-03 05:56:51', '2017-05-03 05:56:51', NULL),
(5, '侦查', '2017-05-03 05:57:07', '2017-05-03 05:57:07', NULL),
(6, '引擎', '2017-05-03 06:00:29', '2017-05-03 06:00:35', '2017-05-03 06:00:35');

--
-- 转存表中的数据 `technology_types`
--

INSERT INTO `technology_types` (`id`, `technology_category_id`, `content`, `amount1`, `amount2`, `amount3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'AP', 13, 13, 11, '2017-05-03 05:57:18', '2017-05-03 08:50:13', NULL),
(2, 1, 'APCR', 15, 12, 10, '2017-05-03 05:57:23', '2017-05-03 09:05:35', NULL),
(3, 1, 'APDS', 13, 13, 13, '2017-05-03 05:57:27', '2017-05-03 09:06:36', NULL),
(4, 1, 'HE', 16, 16, 16, '2017-05-03 05:57:32', '2017-05-03 09:07:19', NULL),
(5, 1, 'RP', 8, 9, 9, '2017-05-03 05:57:37', '2017-05-03 09:08:14', NULL),
(6, 1, 'HEAT', 15, 15, 15, '2017-05-03 05:57:42', '2017-05-03 09:08:56', NULL),
(7, 1, 'HESH', 7, 7, 10, '2017-05-03 05:57:47', '2017-05-03 09:09:33', NULL),
(8, 2, '标准防护', 12, 12, 12, '2017-05-03 05:57:52', '2017-05-03 09:10:44', NULL),
(9, 2, '重装防护', 11, 11, 11, '2017-05-03 05:57:57', '2017-05-03 09:11:33', NULL),
(10, 2, '轻薄防护', 10, 10, 10, '2017-05-03 05:58:02', '2017-05-03 09:12:02', NULL),
(11, 3, '综合车体', 10, 10, 11, '2017-05-03 05:58:09', '2017-05-03 09:12:32', NULL),
(12, 4, '综合引擎', 14, 14, 14, '2017-05-03 05:58:16', '2017-05-03 09:13:10', NULL),
(13, 5, '综合索敌', 0, 0, 0, '2017-05-03 09:04:23', '2017-05-03 09:04:23', NULL);

--
-- 转存表中的数据 `types`
--

INSERT INTO `types` (`id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '中坦', '2017-05-03 05:13:25', '2017-05-09 05:31:29', NULL),
(2, '轻歼', '2017-05-08 22:14:32', '2017-05-08 22:14:32', NULL),
(3, '重坦', '2017-05-09 05:31:18', '2017-05-09 05:31:35', NULL),
(4, '轻坦', '2017-05-09 05:31:44', '2017-05-09 05:31:44', NULL),
(5, '自行', '2017-05-09 05:31:50', '2017-05-09 05:31:50', NULL),
(6, '突击', '2017-05-09 05:31:55', '2017-05-09 05:31:55', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;