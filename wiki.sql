-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-05-03 19:18:52
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

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `attributeable_id` int(10) UNSIGNED NOT NULL,
  `attributeable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fire` double(8,2) NOT NULL COMMENT '火力',
  `penetrate` double(8,2) NOT NULL COMMENT '穿甲',
  `durable` double(8,2) NOT NULL COMMENT '耐久',
  `armor` double(8,2) NOT NULL COMMENT '装甲',
  `hit` double(8,2) NOT NULL COMMENT '命中',
  `dodge` double(8,2) NOT NULL COMMENT '闪避',
  `concealment` double(8,2) NOT NULL COMMENT '隐蔽',
  `spy` double(8,2) NOT NULL COMMENT '侦查',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `attributes`
--

INSERT INTO `attributes` (`id`, `attributeable_id`, `attributeable_type`, `fire`, `penetrate`, `durable`, `armor`, `hit`, `dodge`, `concealment`, `spy`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'App\\Models\\Equipment', 0.00, 0.00, 0.00, 288.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 05:17:29', '2017-05-03 06:02:46', NULL),
(2, 1, 'App\\Models\\Dancer', 583.00, 288.00, 906.00, 308.00, 90.00, 90.00, 60.00, 90.00, '2017-05-03 05:41:07', '2017-05-03 05:42:57', NULL),
(3, 1, 'App\\Models\\Technology', 0.00, 0.00, 0.00, 0.00, 0.00, 150.00, 0.00, 50.00, '2017-05-03 06:01:46', '2017-05-03 06:01:46', NULL),
(4, 3, 'App\\Models\\Technology', 0.00, 615.00, 0.00, 0.00, 0.00, 15.00, 0.00, 0.00, '2017-05-03 06:02:51', '2017-05-03 06:02:51', NULL),
(5, 2, 'App\\Models\\Equipment', 0.00, 0.00, 0.00, 288.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 06:03:16', '2017-05-03 06:03:16', NULL),
(6, 3, 'App\\Models\\Equipment', 0.00, 0.00, 0.00, 288.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 06:03:39', '2017-05-03 06:03:39', NULL),
(7, 5, 'App\\Models\\Technology', 0.00, 0.00, 1800.00, 255.00, 150.00, 0.00, 0.00, 0.00, '2017-05-03 06:03:56', '2017-05-03 06:03:56', NULL),
(8, 7, 'App\\Models\\Technology', 1095.00, 405.00, 0.00, 0.00, 60.00, 0.00, 0.00, 0.00, '2017-05-03 06:04:33', '2017-05-03 06:04:33', NULL),
(9, 4, 'App\\Models\\Equipment', 0.00, 0.00, 1319.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 06:06:18', '2017-05-03 06:06:18', NULL),
(10, 5, 'App\\Models\\Equipment', 0.00, 0.00, 1319.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2017-05-03 06:06:44', '2017-05-03 06:06:44', NULL),
(11, 6, 'App\\Models\\Equipment', 0.00, 0.00, 1241.00, 87.00, 0.00, 0.00, -35.00, 0.00, '2017-05-03 06:08:20', '2017-05-03 06:08:28', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `consumptions`
--

CREATE TABLE `consumptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '国籍',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `countries`
--

INSERT INTO `countries` (`id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '德系', '2017-05-03 05:13:33', '2017-05-03 05:13:33', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `dancers`
--

CREATE TABLE `dancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '舞姬姓名',
  `dance_outfit` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '舞装名称',
  `type_id` int(10) UNSIGNED NOT NULL COMMENT '类型外键',
  `country_id` int(10) UNSIGNED NOT NULL COMMENT '国籍外键',
  `rarity_id` int(10) UNSIGNED NOT NULL COMMENT '稀有度外键',
  `subjection` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '隶属机构',
  `introduction` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '人物介绍',
  `character` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '人物性格',
  `grow_fire` double(8,2) NOT NULL COMMENT '成长火力',
  `grow_penetrate` double(8,2) NOT NULL COMMENT '成长穿甲',
  `grow_durable` double(8,2) NOT NULL COMMENT '成长耐久',
  `grow_armor` double(8,2) NOT NULL COMMENT '成长装甲',
  `barbette` int(11) NOT NULL COMMENT '炮座',
  `refit` int(11) NOT NULL COMMENT '改装',
  `outside` int(11) NOT NULL COMMENT '外身',
  `inwall` int(11) NOT NULL COMMENT '内壁',
  `inwarehouse` int(11) NOT NULL COMMENT '内仓',
  `carriage` int(11) NOT NULL COMMENT '炮架',
  `special` int(11) NOT NULL COMMENT '特殊',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `dancers`
--

INSERT INTO `dancers` (`id`, `name`, `dance_outfit`, `type_id`, `country_id`, `rarity_id`, `subjection`, `introduction`, `character`, `grow_fire`, `grow_penetrate`, `grow_durable`, `grow_armor`, `barbette`, `refit`, `outside`, `inwall`, `inwarehouse`, `carriage`, `special`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '蕾娜•巴洛特', '豹式F型', 1, 1, 1, 'S.V.S.', '暂无', '暂无', 18.10, 8.10, 26.40, 8.40, 1, 1, 2, 1, 0, 0, 1, '2017-05-03 05:41:07', '2017-05-03 05:41:07', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `dancer_technology`
--

CREATE TABLE `dancer_technology` (
  `id` int(10) UNSIGNED NOT NULL,
  `dancer_id` int(10) UNSIGNED NOT NULL,
  `technology_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `dancer_technology`
--

INSERT INTO `dancer_technology` (`id`, `dancer_id`, `technology_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 5),
(4, 1, 7);

-- --------------------------------------------------------

--
-- 表的结构 `effectables`
--

CREATE TABLE `effectables` (
  `id` int(10) UNSIGNED NOT NULL,
  `effect_id` int(11) NOT NULL COMMENT '特性ID',
  `effectable_id` int(11) NOT NULL COMMENT '关联表的字段ID',
  `effectable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '关联表的模型名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `effects`
--

CREATE TABLE `effects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '特效名称',
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '特效描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `equipment`
--

CREATE TABLE `equipment` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipment_info_id` int(10) UNSIGNED NOT NULL COMMENT '装备信息外键',
  `slot_id` int(10) UNSIGNED NOT NULL COMMENT '装备槽位外键',
  `lv` int(11) NOT NULL COMMENT '装备等级',
  `price` int(11) NOT NULL COMMENT '出售单价',
  `main` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为主要部件',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `equipment`
--

INSERT INTO `equipment` (`id`, `equipment_info_id`, `slot_id`, `lv`, `price`, `main`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 8, 0, 0, '2017-05-03 05:17:29', '2017-05-03 05:17:29', NULL),
(2, 1, 5, 8, 0, 1, '2017-05-03 06:03:16', '2017-05-03 06:03:16', NULL),
(3, 1, 8, 8, 0, 0, '2017-05-03 06:03:39', '2017-05-03 06:03:39', NULL),
(4, 3, 6, 1, 0, 1, '2017-05-03 06:06:18', '2017-05-03 06:06:18', NULL),
(5, 3, 7, 8, 0, 0, '2017-05-03 06:06:44', '2017-05-03 06:06:44', NULL),
(6, 2, 7, 8, 0, 1, '2017-05-03 06:08:20', '2017-05-03 06:08:20', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `equipment_infos`
--

CREATE TABLE `equipment_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '装备名称',
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '(暂无)' COMMENT '装备描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `equipment_infos`
--

INSERT INTO `equipment_infos` (`id`, `name`, `describe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '外挂装甲', '', '2017-05-03 05:15:37', '2017-05-03 05:15:37', NULL),
(2, '增厚护甲片', '', '2017-05-03 05:16:19', '2017-05-03 05:16:19', NULL),
(3, '防崩落内衬', '', '2017-05-03 05:16:31', '2017-05-03 05:16:31', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `imageable_id` int(10) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片类型',
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片存储路径',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `rarities`
--

CREATE TABLE `rarities` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL COMMENT '稀有级别',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '稀有度',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `rarities`
--

INSERT INTO `rarities` (`id`, `level`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '橙', '2017-05-03 05:13:43', '2017-05-03 05:13:43', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skill_info_id` int(10) UNSIGNED NOT NULL COMMENT '辎械信息外键',
  `lv` int(11) NOT NULL COMMENT '辎械等级',
  `fire_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础火力',
  `penetrate_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础穿甲',
  `durable_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础耐久',
  `armor_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础装甲',
  `hit_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础命中',
  `dodge_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础闪避',
  `concealment_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础隐蔽',
  `spy_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础侦查',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `skills`
--

INSERT INTO `skills` (`id`, `skill_info_id`, `lv`, `fire_up`, `penetrate_up`, `durable_up`, `armor_up`, `hit_up`, `dodge_up`, `concealment_up`, `spy_up`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, 2.00, 2.00, 2.00, 2.00, 2.00, 2.00, 0.00, 0.00, '2017-05-03 05:50:20', '2017-05-03 05:50:20', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `skill_infos`
--

CREATE TABLE `skill_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '辎械名称',
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '(暂无)' COMMENT '辎械描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `skill_infos`
--

INSERT INTO `skill_infos` (`id`, `name`, `describe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '特攻炮弹', '缠斗阶段，对单体目标进行高伤害打击。', '2017-05-03 05:48:12', '2017-05-03 05:48:12', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `slots`
--

CREATE TABLE `slots` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '装备槽部位名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- 表的结构 `tactics`
--

CREATE TABLE `tactics` (
  `id` int(10) UNSIGNED NOT NULL,
  `tactic_info_id` int(10) UNSIGNED NOT NULL COMMENT '战术信息外键',
  `lv` int(11) NOT NULL COMMENT '战术等级',
  `fire_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础火力',
  `penetrate_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础穿甲',
  `durable_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础耐久',
  `armor_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础装甲',
  `hit_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础命中',
  `dodge_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础闪避',
  `concealment_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础隐蔽',
  `spy_up` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '提升基础侦查',
  `fire_down` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '降低装备火力',
  `penetrate_down` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '降低装备穿甲',
  `durable_down` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '降低装备耐久',
  `armor_down` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '降低装备装甲',
  `hit_down` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '降低装备命中',
  `dodge_down` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '降低装备闪避',
  `concealment_down` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '降低装备隐蔽',
  `spy_down` double(5,2) NOT NULL DEFAULT '0.00' COMMENT '降低装备侦查',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `tactics`
--

INSERT INTO `tactics` (`id`, `tactic_info_id`, `lv`, `fire_up`, `penetrate_up`, `durable_up`, `armor_up`, `hit_up`, `dodge_up`, `concealment_up`, `spy_up`, `fire_down`, `penetrate_down`, `durable_down`, `armor_down`, `hit_down`, `dodge_down`, `concealment_down`, `spy_down`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, 0.00, 0.00, 4.40, 5.06, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.35, 0.00, 0.00, 0.00, 0.00, '2017-05-03 05:47:40', '2017-05-03 05:47:40', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tactic_infos`
--

CREATE TABLE `tactic_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '战术名称',
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '(暂无)' COMMENT '战术描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `tactic_infos`
--

INSERT INTO `tactic_infos` (`id`, `name`, `describe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '装甲构造定制', '大幅增加耐久和装甲（以装甲为主）加成，但设备提供的参数下降。', '2017-05-03 05:46:43', '2017-05-03 05:46:43', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `technologies`
--

CREATE TABLE `technologies` (
  `id` int(10) UNSIGNED NOT NULL,
  `technology_type_id` int(10) UNSIGNED NOT NULL COMMENT '科技类型外键',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '科技名称',
  `rank` int(11) NOT NULL COMMENT '阶级',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(7, 1, '被帽风帽高韧质内芯硬芯穿甲弹', 3, '2017-05-03 06:04:33', '2017-05-03 06:04:33', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `technology_categories`
--

CREATE TABLE `technology_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '科技类别',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- 表的结构 `technology_types`
--

CREATE TABLE `technology_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `technology_category_id` int(10) UNSIGNED NOT NULL COMMENT '科技类别外键',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '科技类型',
  `amount1` int(11) NOT NULL DEFAULT '0',
  `amount2` int(11) NOT NULL DEFAULT '0',
  `amount3` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- 表的结构 `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '类型',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `types`
--

INSERT INTO `types` (`id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '中型坦克', '2017-05-03 05:13:25', '2017-05-03 05:13:25', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_code` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_confirmed` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumptions`
--
ALTER TABLE `consumptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dancers`
--
ALTER TABLE `dancers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dancers_type_id_foreign` (`type_id`),
  ADD KEY `dancers_country_id_foreign` (`country_id`),
  ADD KEY `dancers_rarity_id_foreign` (`rarity_id`);

--
-- Indexes for table `dancer_technology`
--
ALTER TABLE `dancer_technology`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dancer_technology_dancer_id_foreign` (`dancer_id`),
  ADD KEY `dancer_technology_technology_id_foreign` (`technology_id`);

--
-- Indexes for table `effectables`
--
ALTER TABLE `effectables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `effects`
--
ALTER TABLE `effects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_equipment_info_id_foreign` (`equipment_info_id`),
  ADD KEY `equipment_slot_id_foreign` (`slot_id`);

--
-- Indexes for table `equipment_infos`
--
ALTER TABLE `equipment_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `rarities`
--
ALTER TABLE `rarities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_skill_info_id_foreign` (`skill_info_id`);

--
-- Indexes for table `skill_infos`
--
ALTER TABLE `skill_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tactics`
--
ALTER TABLE `tactics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tactic_infos`
--
ALTER TABLE `tactic_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `technologies_technology_type_id_foreign` (`technology_type_id`);

--
-- Indexes for table `technology_categories`
--
ALTER TABLE `technology_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology_types`
--
ALTER TABLE `technology_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `technology_types_technology_category_id_foreign` (`technology_category_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `consumptions`
--
ALTER TABLE `consumptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `dancers`
--
ALTER TABLE `dancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `dancer_technology`
--
ALTER TABLE `dancer_technology`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `effectables`
--
ALTER TABLE `effectables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `effects`
--
ALTER TABLE `effects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `equipment_infos`
--
ALTER TABLE `equipment_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `rarities`
--
ALTER TABLE `rarities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `skill_infos`
--
ALTER TABLE `skill_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `tactics`
--
ALTER TABLE `tactics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tactic_infos`
--
ALTER TABLE `tactic_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `technology_categories`
--
ALTER TABLE `technology_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `technology_types`
--
ALTER TABLE `technology_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 限制导出的表
--

--
-- 限制表 `dancers`
--
ALTER TABLE `dancers`
  ADD CONSTRAINT `dancers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dancers_rarity_id_foreign` FOREIGN KEY (`rarity_id`) REFERENCES `rarities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dancers_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- 限制表 `dancer_technology`
--
ALTER TABLE `dancer_technology`
  ADD CONSTRAINT `dancer_technology_dancer_id_foreign` FOREIGN KEY (`dancer_id`) REFERENCES `dancers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dancer_technology_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE;

--
-- 限制表 `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_equipment_info_id_foreign` FOREIGN KEY (`equipment_info_id`) REFERENCES `equipment_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `equipment_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `slots` (`id`) ON DELETE CASCADE;

--
-- 限制表 `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_skill_info_id_foreign` FOREIGN KEY (`skill_info_id`) REFERENCES `skill_infos` (`id`) ON DELETE CASCADE;

--
-- 限制表 `technologies`
--
ALTER TABLE `technologies`
  ADD CONSTRAINT `technologies_technology_type_id_foreign` FOREIGN KEY (`technology_type_id`) REFERENCES `technology_types` (`id`) ON DELETE CASCADE;

--
-- 限制表 `technology_types`
--
ALTER TABLE `technology_types`
  ADD CONSTRAINT `technology_types_technology_category_id_foreign` FOREIGN KEY (`technology_category_id`) REFERENCES `technology_categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
