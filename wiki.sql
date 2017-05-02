# Host: localhost  (Version 5.5.5-10.1.21-MariaDB)
# Date: 2017-05-02 16:36:22
# Generator: MySQL-Front 6.0  (Build 1.57)


#
# Structure for table "admins"
#

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "admins"
#


#
# Structure for table "attributes"
#

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attributeable_id` int(10) unsigned NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "attributes"
#

INSERT INTO `attributes` VALUES (1,1,'App\\Models\\Dancer',652.00,219.00,555.00,173.00,110.00,85.00,75.00,80.00,'2017-04-25 16:08:18','2017-04-25 16:08:42',NULL),(2,1,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:18:56','2017-04-26 13:18:56',NULL),(3,2,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:19:20','2017-04-26 13:19:43',NULL),(4,3,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:19:34','2017-04-26 13:19:34',NULL),(5,4,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:19:56','2017-04-26 13:19:56',NULL),(6,5,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:20:08','2017-04-26 13:20:08',NULL),(7,6,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:20:21','2017-04-26 13:20:21',NULL),(8,7,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:20:35','2017-04-26 13:20:35',NULL),(9,8,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:20:54','2017-04-26 13:20:54',NULL),(10,9,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:21:04','2017-04-26 13:21:57',NULL),(11,10,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:21:28','2017-04-26 13:22:20',NULL),(12,11,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:29:08','2017-04-26 13:29:08',NULL),(13,12,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:29:24','2017-04-26 13:29:24',NULL),(14,1,'App\\Models\\Equipment',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:34:57','2017-04-26 13:34:57',NULL),(15,2,'App\\Models\\Equipment',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:35:29','2017-04-26 13:35:29',NULL),(16,3,'App\\Models\\Equipment',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:35:45','2017-04-26 13:35:45',NULL),(17,4,'App\\Models\\Equipment',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:35:57','2017-04-26 13:35:57',NULL),(18,5,'App\\Models\\Equipment',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:36:15','2017-04-26 13:36:15',NULL),(19,6,'App\\Models\\Equipment',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:36:35','2017-04-26 13:36:35',NULL),(20,7,'App\\Models\\Equipment',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-04-26 13:36:47','2017-04-26 13:36:47',NULL),(21,7,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-05-02 06:05:56','2017-05-02 06:05:56',NULL),(22,8,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-05-02 06:06:22','2017-05-02 06:06:22',NULL),(23,9,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-05-02 06:06:40','2017-05-02 06:06:40',NULL),(24,10,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-05-02 06:07:08','2017-05-02 06:07:08',NULL),(25,11,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-05-02 06:07:23','2017-05-02 06:07:23',NULL),(26,12,'App\\Models\\Technology',1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-05-02 06:07:44','2017-05-02 06:07:44',NULL);

#
# Structure for table "consumptions"
#

DROP TABLE IF EXISTS `consumptions`;
CREATE TABLE `consumptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "consumptions"
#


#
# Structure for table "countries"
#

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '国籍',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "countries"
#

INSERT INTO `countries` VALUES (1,'苏系','2017-04-25 16:05:52','2017-04-25 16:05:52',NULL);

#
# Structure for table "effectables"
#

DROP TABLE IF EXISTS `effectables`;
CREATE TABLE `effectables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `effect_id` int(11) NOT NULL COMMENT '特性ID',
  `effectable_id` int(11) NOT NULL COMMENT '关联表的字段ID',
  `effectable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '关联表的模型名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "effectables"
#


#
# Structure for table "effects"
#

DROP TABLE IF EXISTS `effects`;
CREATE TABLE `effects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '特效名称',
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '特效描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "effects"
#


#
# Structure for table "equipment_infos"
#

DROP TABLE IF EXISTS `equipment_infos`;
CREATE TABLE `equipment_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '装备名称',
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '(暂无)' COMMENT '装备描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "equipment_infos"
#

INSERT INTO `equipment_infos` VALUES (1,'炮座','','2017-04-26 13:33:40','2017-04-26 13:33:40',NULL),(2,'改装','','2017-04-26 13:33:46','2017-04-26 13:33:46',NULL),(3,'外身','','2017-04-26 13:33:51','2017-04-26 13:33:51',NULL),(4,'内壁','','2017-04-26 13:33:57','2017-04-26 13:33:57',NULL),(5,'内仓','','2017-04-26 13:34:03','2017-04-26 13:34:03',NULL),(6,'炮架','','2017-04-26 13:34:09','2017-04-26 13:34:09',NULL),(7,'特殊','','2017-04-26 13:34:14','2017-04-26 13:34:14',NULL);

#
# Structure for table "images"
#

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imageable_id` int(10) unsigned NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片类型',
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片存储路径',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "images"
#


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_11_11_014506_create_admins_table',1),(4,'2016_11_11_014590_create_types_table',1),(5,'2016_11_11_014591_create_countries_table',1),(6,'2016_11_11_014592_create_rarities_table',1),(7,'2016_11_11_014602_create_dancers_table',1),(8,'2016_11_11_014615_create_effects_table',1),(9,'2016_11_11_014633_create_attributes_table',1),(10,'2016_11_11_014650_create_technology_categories_table',1),(11,'2016_11_11_014651_create_technology_types_table',1),(12,'2016_11_11_014655_create_technologies_table',1),(13,'2016_11_11_014808_create_images_table',1),(14,'2016_11_24_054813_create_dancer_technology_table',1),(15,'2016_12_07_074347_create_effectables_table',1),(16,'2016_12_13_050022_create_equipment_infos_table',1),(17,'2016_12_13_050022_create_slots_table',1),(18,'2016_12_13_050023_create_equipment_table',1),(19,'2016_12_22_071834_create_tactic_infos_table',1),(20,'2016_12_22_071835_create_tactics_table',1),(21,'2016_12_23_075644_create_consumptions_table',1),(22,'2016_12_27_075111_create_skill_infos_table',1),(23,'2016_12_27_075112_create_skills_table',1);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "rarities"
#

DROP TABLE IF EXISTS `rarities`;
CREATE TABLE `rarities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL COMMENT '稀有级别',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '稀有度',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "rarities"
#

INSERT INTO `rarities` VALUES (1,3,'橙车','2017-04-25 16:06:09','2017-04-25 16:06:09',NULL);

#
# Structure for table "skill_infos"
#

DROP TABLE IF EXISTS `skill_infos`;
CREATE TABLE `skill_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '辎械名称',
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '(暂无)' COMMENT '辎械描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "skill_infos"
#

INSERT INTO `skill_infos` VALUES (1,'辎械1','','2017-05-02 06:53:17','2017-05-02 06:53:17',NULL);

#
# Structure for table "skills"
#

DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `skill_info_id` int(10) unsigned NOT NULL COMMENT '辎械信息外键',
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skills_skill_info_id_foreign` (`skill_info_id`),
  CONSTRAINT `skills_skill_info_id_foreign` FOREIGN KEY (`skill_info_id`) REFERENCES `skill_infos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "skills"
#

INSERT INTO `skills` VALUES (1,1,1,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-05-02 06:53:26','2017-05-02 06:53:26',NULL);

#
# Structure for table "slots"
#

DROP TABLE IF EXISTS `slots`;
CREATE TABLE `slots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '装备槽部位名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "slots"
#

INSERT INTO `slots` VALUES (1,'xx1','2017-04-25 17:07:45','2017-04-25 17:07:47','2017-04-25 17:07:47'),(2,'炮座','2017-04-26 13:30:11','2017-04-26 13:30:11',NULL),(3,'改装','2017-04-26 13:30:15','2017-04-26 13:30:15',NULL),(4,'外身','2017-04-26 13:30:20','2017-04-26 13:30:20',NULL),(5,'内壁','2017-04-26 13:30:24','2017-04-26 13:30:24',NULL),(6,'内仓','2017-04-26 13:30:28','2017-04-26 13:30:28',NULL),(7,'炮架','2017-04-26 13:30:32','2017-04-26 13:30:32',NULL),(8,'特殊','2017-04-26 13:30:37','2017-04-26 13:30:37',NULL);

#
# Structure for table "equipment"
#

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `equipment_info_id` int(10) unsigned NOT NULL COMMENT '装备信息外键',
  `slot_id` int(10) unsigned NOT NULL COMMENT '装备槽位外键',
  `lv` int(11) NOT NULL COMMENT '装备等级',
  `price` int(11) NOT NULL COMMENT '出售单价',
  `main` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为主要部件',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipment_equipment_info_id_foreign` (`equipment_info_id`),
  KEY `equipment_slot_id_foreign` (`slot_id`),
  CONSTRAINT `equipment_equipment_info_id_foreign` FOREIGN KEY (`equipment_info_id`) REFERENCES `equipment_infos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `equipment_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `slots` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "equipment"
#

INSERT INTO `equipment` VALUES (1,1,2,1,1,0,'2017-04-26 13:34:57','2017-04-26 13:34:57',NULL),(2,2,3,1,1,0,'2017-04-26 13:35:29','2017-04-26 13:35:29',NULL),(3,3,4,1,1,0,'2017-04-26 13:35:45','2017-04-26 13:35:45',NULL),(4,4,5,1,1,0,'2017-04-26 13:35:57','2017-04-26 13:35:57',NULL),(5,5,6,1,1,0,'2017-04-26 13:36:15','2017-04-26 13:36:15',NULL),(6,6,7,1,1,0,'2017-04-26 13:36:35','2017-04-26 13:36:35',NULL),(7,7,8,1,1,0,'2017-04-26 13:36:47','2017-04-26 13:36:47',NULL);

#
# Structure for table "tactic_infos"
#

DROP TABLE IF EXISTS `tactic_infos`;
CREATE TABLE `tactic_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '战术名称',
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '(暂无)' COMMENT '战术描述',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "tactic_infos"
#

INSERT INTO `tactic_infos` VALUES (1,'战术1','','2017-05-02 06:52:37','2017-05-02 06:52:37',NULL),(2,'战术1','','2017-05-02 06:52:48','2017-05-02 06:52:53','2017-05-02 06:52:53');

#
# Structure for table "tactics"
#

DROP TABLE IF EXISTS `tactics`;
CREATE TABLE `tactics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tactic_info_id` int(10) unsigned NOT NULL COMMENT '战术信息外键',
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "tactics"
#

INSERT INTO `tactics` VALUES (1,1,1,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,1.00,'2017-05-02 06:53:08','2017-05-02 06:53:08',NULL);

#
# Structure for table "technology_categories"
#

DROP TABLE IF EXISTS `technology_categories`;
CREATE TABLE `technology_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '科技类别',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "technology_categories"
#

INSERT INTO `technology_categories` VALUES (1,'主炮','2017-04-26 13:13:37','2017-04-26 13:13:37',NULL),(2,'防护','2017-04-26 13:13:41','2017-04-26 13:13:41',NULL),(3,'车体','2017-04-26 13:13:46','2017-04-26 13:13:46',NULL),(4,'引擎','2017-04-26 13:13:51','2017-04-26 13:13:51',NULL);

#
# Structure for table "technology_types"
#

DROP TABLE IF EXISTS `technology_types`;
CREATE TABLE `technology_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `technology_category_id` int(10) unsigned NOT NULL COMMENT '科技类别外键',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '科技类型',
  `amount1` int(11) NOT NULL COMMENT '一级科技大件总数目',
  `amount2` int(11) NOT NULL COMMENT '二级科技大件总数目',
  `amount3` int(11) NOT NULL COMMENT '三级科技大件总数目',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `technology_types_technology_category_id_foreign` (`technology_category_id`),
  CONSTRAINT `technology_types_technology_category_id_foreign` FOREIGN KEY (`technology_category_id`) REFERENCES `technology_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "technology_types"
#

INSERT INTO `technology_types` VALUES (1,1,'AP',5,6,7,'2017-05-02 03:22:28','2017-05-02 03:26:01',NULL),(2,1,'HE',2,3,4,'2017-05-02 06:00:41','2017-05-02 06:00:41',NULL),(3,2,'基础防护',2,3,4,'2017-05-02 06:00:57','2017-05-02 06:00:57',NULL),(4,2,'标准防护',3,4,5,'2017-05-02 06:01:07','2017-05-02 06:01:07',NULL),(5,3,'综合车体',3,4,5,'2017-05-02 06:01:23','2017-05-02 06:02:43',NULL),(6,4,'综合引擎',2,3,4,'2017-05-02 06:01:40','2017-05-02 06:02:37',NULL);

#
# Structure for table "technologies"
#

DROP TABLE IF EXISTS `technologies`;
CREATE TABLE `technologies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `technology_type_id` int(10) unsigned NOT NULL COMMENT '科技类型外键',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '科技名称',
  `rank` int(11) NOT NULL COMMENT '阶级',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `technologies_technology_type_id_foreign` (`technology_type_id`),
  CONSTRAINT `technologies_technology_type_id_foreign` FOREIGN KEY (`technology_type_id`) REFERENCES `technology_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "technologies"
#

INSERT INTO `technologies` VALUES (7,1,'AP1',1,'2017-05-02 06:05:55','2017-05-02 06:05:55',NULL),(8,2,'HE1',1,'2017-05-02 06:06:22','2017-05-02 06:06:22',NULL),(9,3,'标准防护1',1,'2017-05-02 06:06:40','2017-05-02 06:06:40',NULL),(10,3,'基础防护1',1,'2017-05-02 06:07:08','2017-05-02 06:07:08',NULL),(11,5,'综合车体1',1,'2017-05-02 06:07:23','2017-05-02 06:07:23',NULL),(12,6,'综合引擎1',1,'2017-05-02 06:07:44','2017-05-02 06:07:44',NULL);

#
# Structure for table "types"
#

DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '类型',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "types"
#

INSERT INTO `types` VALUES (1,'自行火炮','2017-04-25 16:05:36','2017-04-25 16:05:36',NULL);

#
# Structure for table "dancers"
#

DROP TABLE IF EXISTS `dancers`;
CREATE TABLE `dancers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '舞姬姓名',
  `dance_outfit` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '舞装名称',
  `type_id` int(10) unsigned NOT NULL COMMENT '类型外键',
  `country_id` int(10) unsigned NOT NULL COMMENT '国籍外键',
  `rarity_id` int(10) unsigned NOT NULL COMMENT '稀有度外键',
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dancers_type_id_foreign` (`type_id`),
  KEY `dancers_country_id_foreign` (`country_id`),
  KEY `dancers_rarity_id_foreign` (`rarity_id`),
  CONSTRAINT `dancers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dancers_rarity_id_foreign` FOREIGN KEY (`rarity_id`) REFERENCES `rarities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dancers_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "dancers"
#

INSERT INTO `dancers` VALUES (1,'季托芙娜·喀秋莎','喀秋莎M13发射车',1,1,1,'S.V.S.','123','123',17.70,4.00,15.20,3.30,1,2,0,1,2,0,1,'2017-04-25 16:08:18','2017-04-25 16:08:18',NULL);

#
# Structure for table "dancer_technology"
#

DROP TABLE IF EXISTS `dancer_technology`;
CREATE TABLE `dancer_technology` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dancer_id` int(10) unsigned NOT NULL,
  `technology_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dancer_technology_dancer_id_foreign` (`dancer_id`),
  KEY `dancer_technology_technology_id_foreign` (`technology_id`),
  CONSTRAINT `dancer_technology_dancer_id_foreign` FOREIGN KEY (`dancer_id`) REFERENCES `dancers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `dancer_technology_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "dancer_technology"
#

INSERT INTO `dancer_technology` VALUES (1,1,7),(2,1,8),(3,1,9),(4,1,10),(5,1,11),(6,1,12);

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_code` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_confirmed` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "users"
#

