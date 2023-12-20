/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80032
 Source Host           : localhost:3306
 Source Schema         : event_organizer

 Target Server Type    : MySQL
 Target Server Version : 80032
 File Encoding         : 65001

 Date: 16/12/2023 23:48:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Manufaktur', '2023-12-14 14:19:22', '2023-12-14 14:19:22', NULL);
INSERT INTO `categories` VALUES (2, 'Keuangan', '2023-12-14 14:19:22', '2023-12-14 14:19:22', NULL);
INSERT INTO `categories` VALUES (3, 'Teknologi Informasi', '2023-12-14 14:19:22', '2023-12-14 14:19:22', NULL);
INSERT INTO `categories` VALUES (4, 'Pertanian', '2023-12-14 14:19:22', '2023-12-14 14:19:22', NULL);
INSERT INTO `categories` VALUES (5, 'Transportasi', '2023-12-14 14:19:22', '2023-12-14 14:19:22', NULL);

-- ----------------------------
-- Table structure for event_collaborators
-- ----------------------------
DROP TABLE IF EXISTS `event_collaborators`;
CREATE TABLE `event_collaborators`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `event_id` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `event_collaborators_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `event_collaborators_event_id_foreign`(`event_id`) USING BTREE,
  CONSTRAINT `event_collaborators_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `event_collaborators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of event_collaborators
-- ----------------------------
INSERT INTO `event_collaborators` VALUES (1, 6, 11, '2023-12-15 07:15:48', '2023-12-15 07:15:48', NULL);

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `target_audience` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quota` int UNSIGNED NOT NULL,
  `event_type` tinyint UNSIGNED NOT NULL DEFAULT 0,
  `link` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `price` int UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `street` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `host` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `host_email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `required_approval` tinyint UNSIGNED NOT NULL DEFAULT 0,
  `is_completed` tinyint UNSIGNED NOT NULL DEFAULT 0,
  `category_id` int UNSIGNED NOT NULL,
  `owner` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `events_category_id_foreign`(`category_id`) USING BTREE,
  INDEX `events_owner_foreign`(`owner`) USING BTREE,
  CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `events_owner_foreign` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES (1, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (2, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (3, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (4, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (5, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (6, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (7, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (8, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (9, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2010-12-20', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (10, 'Tempora ab numquam asperiores eius.', 'Aut recusandae sed sed ipsa. Rem velit est eveniet in.', 'images/events/banner.png', 'Mahasiswa', 170, 0, 'http://www.weber.com/', 166000, '2023-12-13', 'Indonesia', 'Jawa Barat', 'Karawang', '41363', 'Jl. HS. Ronggowaluyo, Telukjambe Timur, Karawang', 'rjohns', 'charles.kunze@yundt.com', 1, 1, 5, 2, '2023-12-14 14:19:31', '2023-12-14 14:19:31', NULL);
INSERT INTO `events` VALUES (11, 'isi nama event asal aja update', '<p><strong>Ini deksripsi asal aj</strong>a<strong><span class=\"ql-cursor\">﻿</span></strong></p>', 'images/events/1702540737_0a6dfa9b99642c816dd9.png', 'mahasiswa', 99, 0, 'https://www.dicoding.com/', 0, '2023-12-15', 'Indonesia', 'Jawa Barat', 'Karawang', '76567', 'jl. kenangan No.11', 'Ardianto', 'ardi@test.com', 1, 1, 2, 2, '2023-12-14 14:58:57', '2023-12-14 14:58:57', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (55, '2023-11-30-063153', 'App\\Database\\Migrations\\RoleMigration', 'default', 'App', 1702538353, 1);
INSERT INTO `migrations` VALUES (56, '2023-11-30-063813', 'App\\Database\\Migrations\\UserMigration', 'default', 'App', 1702538353, 1);
INSERT INTO `migrations` VALUES (57, '2023-11-30-070048', 'App\\Database\\Migrations\\CategoriesMigration', 'default', 'App', 1702538353, 1);
INSERT INTO `migrations` VALUES (58, '2023-11-30-070737', 'App\\Database\\Migrations\\EventMigration', 'default', 'App', 1702538353, 1);
INSERT INTO `migrations` VALUES (59, '2023-11-30-073755', 'App\\Database\\Migrations\\UserEventRegisterMigration', 'default', 'App', 1702538353, 1);
INSERT INTO `migrations` VALUES (60, '2023-11-30-080208', 'App\\Database\\Migrations\\EventCollaboratorMigration', 'default', 'App', 1702538353, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'superadmin', '2023-12-14 14:19:18', '2023-12-14 14:19:18', NULL);
INSERT INTO `roles` VALUES (2, 'admin', '2023-12-14 14:19:18', '2023-12-14 14:19:18', NULL);
INSERT INTO `roles` VALUES (3, 'user', '2023-12-14 14:19:18', '2023-12-14 14:19:18', NULL);

-- ----------------------------
-- Table structure for user_event_registers
-- ----------------------------
DROP TABLE IF EXISTS `user_event_registers`;
CREATE TABLE `user_event_registers`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `event_id` int UNSIGNED NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_event_registers_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `user_event_registers_event_id_foreign`(`event_id`) USING BTREE,
  CONSTRAINT `user_event_registers_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `user_event_registers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_event_registers
-- ----------------------------
INSERT INTO `user_event_registers` VALUES (1, 5, 11, 1, '2023-12-15 06:42:06', '2023-12-15 07:17:15', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_google` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '$2y$10$VgnB5xdfpM/pUy8DAZ8w0OA2TyJ6RRDAGK53Rr5ngS0g2Rhzk0DkG',
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'images/users/profile-default.png',
  `role_id` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, 'superadmin', 'superadmin@gmail.com', '$2y$10$r.ubI54y5yiO3r8ZNTlDR..cbSvc76v5EnPyiZB47Dws0EehBL6MG', 'images/users/profile-default.png', 1, '2023-12-14 14:19:28', '2023-12-14 14:19:28', NULL);
INSERT INTO `users` VALUES (2, NULL, 'admin', 'admin@gmail.com', '$2y$10$cPDSp2VCOCgyw/IQAi7rhue3Rw37ZuGAKgK2N1CExAVMsBqNU/H9m', 'images/users/profile-default.png', 2, '2023-12-14 14:19:28', '2023-12-14 14:19:28', NULL);
INSERT INTO `users` VALUES (3, NULL, 'username', 'user@gmail.com', '$2y$10$drr3GP23G7r5A1dO/1rYwO.vyVwUvYmrfuArXB0s7vdOQ7T0fsVse', 'images/users/profile-default.png', 3, '2023-12-14 14:19:28', '2023-12-15 07:14:00', NULL);
INSERT INTO `users` VALUES (4, NULL, 'user1 update', 'user1@gmail.com', '$2y$10$itxqwkjaZuNwl6qGDEL7juJe5gbNsZohVOGQjXC80LFjceSQx14Py', 'images/users/profile-default.png', 3, '2023-12-14 14:19:28', '2023-12-14 07:47:45', NULL);
INSERT INTO `users` VALUES (5, '104168638883875912321', 'Ardianto update', 'ardi19nugroho@gmail.com', '$2y$10$VgnB5xdfpM/pUy8DAZ8w0OA2TyJ6RRDAGK53Rr5ngS0g2Rhzk0DkG', 'https://lh3.googleusercontent.com/a/ACg8ocKpQ-u1dMsnKMOV9XhSnN6huframsEljj2x6kxsfSnq=s96-c', 3, '2023-12-14 15:48:16', '2023-12-15 07:11:46', NULL);
INSERT INTO `users` VALUES (6, '112274807523904605044', 'ARDIANTO NUGROHO', '2010631170056@student.unsika.ac.id', '$2y$10$VgnB5xdfpM/pUy8DAZ8w0OA2TyJ6RRDAGK53Rr5ngS0g2Rhzk0DkG', 'https://lh3.googleusercontent.com/a/ACg8ocLQWgQUkOxfyl1pFPuhp9akGsT1KgWVhqCqJSfh9_fWaCw=s96-c', 3, '2023-12-15 07:14:48', '2023-12-15 07:14:48', NULL);

SET FOREIGN_KEY_CHECKS = 1;
