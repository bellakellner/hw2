/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : musicdb

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 10/03/2022 14:32:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for music_artist
-- ----------------------------
DROP TABLE IF EXISTS `music_artist`;
CREATE TABLE `music_artist`  (
  `song` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `artist` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`song`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of music_artist
-- ----------------------------
INSERT INTO `music_artist` VALUES ('Days of Wine and Roses', 'Bill Evans');
INSERT INTO `music_artist` VALUES ('Freeway', 'Aimee Mann');
INSERT INTO `music_artist` VALUES ('These Walls', 'Kendrick Lamar');

-- ----------------------------
-- Table structure for music_rating
-- ----------------------------
DROP TABLE IF EXISTS `music_rating`;
CREATE TABLE `music_rating`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `song` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of music_rating
-- ----------------------------
INSERT INTO `music_rating` VALUES (1, 'Amelia-Earhart', 'Freeway', 3);
INSERT INTO `music_rating` VALUES (2, 'Amelia-Earhart', 'Days of Wine and Roses', 4);
INSERT INTO `music_rating` VALUES (3, 'Otto', 'Days of Wine and Roses', 5);
INSERT INTO `music_rating` VALUES (4, 'Amelia-Earhart', 'These Walls', 4);

-- ----------------------------
-- Table structure for music_song
-- ----------------------------
DROP TABLE IF EXISTS `music_song`;
CREATE TABLE `music_song`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `song` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of music_song
-- ----------------------------
INSERT INTO `music_song` VALUES (1, 'Aimee Mann', 'Freeway', 'Indie');
INSERT INTO `music_song` VALUES (2, 'Bill Evans', 'Days of Wine and Roses', 'Easy listening');
INSERT INTO `music_song` VALUES (3, 'Kendrick Lamar', 'These Walls', 'Hip-Hop');

-- ----------------------------
-- Table structure for music_user
-- ----------------------------
DROP TABLE IF EXISTS `music_user`;
CREATE TABLE `music_user`  (
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of music_user
-- ----------------------------
INSERT INTO `music_user` VALUES ('Amelia-Earhart', 'Youaom139&yu7');
INSERT INTO `music_user` VALUES ('codo', 'drilo');
INSERT INTO `music_user` VALUES ('hola', '12');
INSERT INTO `music_user` VALUES ('kevin', '123');
INSERT INTO `music_user` VALUES ('Otto', 'StarWars2*');
INSERT INTO `music_user` VALUES ('pepe', 'truebo');
INSERT INTO `music_user` VALUES ('topo', 'drio');

SET FOREIGN_KEY_CHECKS = 1;
