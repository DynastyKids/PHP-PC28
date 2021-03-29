/*
 Navicat Premium Data Transfer

 Source Server         : CentOS28TR
 Source Server Type    : MySQL
 Source Server Version : 50651
 Source Host           : localhost:3306
 Source Schema         : pc28

 Target Server Type    : MySQL
 Target Server Version : 50651
 File Encoding         : 65001

 Date: 30/03/2021 01:38:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bj
-- ----------------------------
DROP TABLE IF EXISTS `bj`;
CREATE TABLE `bj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` text,
  `odd` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj
-- ----------------------------
BEGIN;
INSERT INTO `bj` VALUES (1, '1', '0');
INSERT INTO `bj` VALUES (2, '0', '1');
INSERT INTO `bj` VALUES (3, '0', '0');
INSERT INTO `bj` VALUES (4, '1', '0');
INSERT INTO `bj` VALUES (5, '0', '0');
INSERT INTO `bj` VALUES (6, '0', '0');
INSERT INTO `bj` VALUES (7, '1', '1');
INSERT INTO `bj` VALUES (8, '1', '0');
INSERT INTO `bj` VALUES (9, '0', '0');
INSERT INTO `bj` VALUES (10, '1', '1');
INSERT INTO `bj` VALUES (11, '1', '0');
INSERT INTO `bj` VALUES (12, '0', '1');
INSERT INTO `bj` VALUES (13, '1', '1');
INSERT INTO `bj` VALUES (14, '1', '0');
INSERT INTO `bj` VALUES (15, '0', '1');
INSERT INTO `bj` VALUES (16, '0', '0');
INSERT INTO `bj` VALUES (17, '0', '1');
INSERT INTO `bj` VALUES (18, '0', '1');
INSERT INTO `bj` VALUES (19, '1', '1');
INSERT INTO `bj` VALUES (20, '1', '0');
INSERT INTO `bj` VALUES (21, '1', '1');
INSERT INTO `bj` VALUES (22, '1', '0');
INSERT INTO `bj` VALUES (23, '0', '0');
INSERT INTO `bj` VALUES (24, '0', '1');
INSERT INTO `bj` VALUES (25, '1', '1');
INSERT INTO `bj` VALUES (26, '1', '0');
INSERT INTO `bj` VALUES (27, '1', '1');
INSERT INTO `bj` VALUES (28, '0', '1');
INSERT INTO `bj` VALUES (29, '0', '0');
INSERT INTO `bj` VALUES (30, '1', '0');
INSERT INTO `bj` VALUES (31, '1', '1');
INSERT INTO `bj` VALUES (32, '0', '0');
INSERT INTO `bj` VALUES (33, '0', '0');
INSERT INTO `bj` VALUES (34, '1', '1');
INSERT INTO `bj` VALUES (35, '1', '1');
INSERT INTO `bj` VALUES (36, '0', '0');
INSERT INTO `bj` VALUES (37, '0', '0');
INSERT INTO `bj` VALUES (38, '0', '0');
INSERT INTO `bj` VALUES (39, '1', '0');
INSERT INTO `bj` VALUES (40, '1', '0');
INSERT INTO `bj` VALUES (41, '1', '1');
INSERT INTO `bj` VALUES (42, '1', '1');
INSERT INTO `bj` VALUES (43, '1', '0');
INSERT INTO `bj` VALUES (44, '1', '0');
INSERT INTO `bj` VALUES (45, '0', '1');
INSERT INTO `bj` VALUES (46, '0', '0');
INSERT INTO `bj` VALUES (47, '0', '0');
INSERT INTO `bj` VALUES (48, '1', '0');
INSERT INTO `bj` VALUES (49, '1', '0');
INSERT INTO `bj` VALUES (50, '1', '0');
INSERT INTO `bj` VALUES (51, '1', '0');
INSERT INTO `bj` VALUES (52, '0', '1');
INSERT INTO `bj` VALUES (53, '0', '0');
INSERT INTO `bj` VALUES (54, '0', '1');
INSERT INTO `bj` VALUES (55, '0', '1');
INSERT INTO `bj` VALUES (56, '0', '0');
INSERT INTO `bj` VALUES (57, '0', '1');
INSERT INTO `bj` VALUES (58, '0', '0');
INSERT INTO `bj` VALUES (59, '0', '0');
INSERT INTO `bj` VALUES (60, '0', '0');
INSERT INTO `bj` VALUES (61, '0', '0');
INSERT INTO `bj` VALUES (62, '0', '1');
INSERT INTO `bj` VALUES (63, '1', '1');
INSERT INTO `bj` VALUES (64, '0', '0');
INSERT INTO `bj` VALUES (65, '0', '1');
INSERT INTO `bj` VALUES (66, '0', '0');
INSERT INTO `bj` VALUES (67, '0', '1');
INSERT INTO `bj` VALUES (68, '1', '0');
INSERT INTO `bj` VALUES (69, '1', '1');
INSERT INTO `bj` VALUES (70, '1', '0');
INSERT INTO `bj` VALUES (71, '1', '0');
INSERT INTO `bj` VALUES (72, '0', '0');
INSERT INTO `bj` VALUES (73, '1', '0');
INSERT INTO `bj` VALUES (74, '1', '1');
INSERT INTO `bj` VALUES (75, '1', '1');
INSERT INTO `bj` VALUES (76, '1', '1');
INSERT INTO `bj` VALUES (77, '1', '1');
INSERT INTO `bj` VALUES (78, '1', '0');
INSERT INTO `bj` VALUES (79, '0', '0');
INSERT INTO `bj` VALUES (80, '1', '0');
INSERT INTO `bj` VALUES (81, '1', '1');
INSERT INTO `bj` VALUES (82, '0', '1');
INSERT INTO `bj` VALUES (83, '0', '1');
INSERT INTO `bj` VALUES (84, '0', '0');
INSERT INTO `bj` VALUES (85, '0', '1');
INSERT INTO `bj` VALUES (86, '0', '1');
INSERT INTO `bj` VALUES (87, '1', '1');
INSERT INTO `bj` VALUES (88, '0', '1');
INSERT INTO `bj` VALUES (89, '1', '0');
INSERT INTO `bj` VALUES (90, '1', '1');
INSERT INTO `bj` VALUES (91, '1', '1');
INSERT INTO `bj` VALUES (92, '1', '0');
INSERT INTO `bj` VALUES (93, '0', '0');
INSERT INTO `bj` VALUES (94, '1', '0');
INSERT INTO `bj` VALUES (95, '0', '0');
INSERT INTO `bj` VALUES (96, '1', '1');
INSERT INTO `bj` VALUES (97, '1', '0');
INSERT INTO `bj` VALUES (98, '1', '0');
INSERT INTO `bj` VALUES (99, '0', '0');
INSERT INTO `bj` VALUES (100, '0', '0');
INSERT INTO `bj` VALUES (101, '0', '0');
INSERT INTO `bj` VALUES (102, '1', '0');
INSERT INTO `bj` VALUES (103, '0', '1');
INSERT INTO `bj` VALUES (104, '0', '1');
INSERT INTO `bj` VALUES (105, '0', '0');
INSERT INTO `bj` VALUES (106, '1', '0');
INSERT INTO `bj` VALUES (107, '1', '1');
INSERT INTO `bj` VALUES (108, '0', '0');
INSERT INTO `bj` VALUES (109, '0', '1');
INSERT INTO `bj` VALUES (110, '0', '0');
INSERT INTO `bj` VALUES (111, '1', '1');
INSERT INTO `bj` VALUES (112, '0', '1');
INSERT INTO `bj` VALUES (113, '1', '0');
INSERT INTO `bj` VALUES (114, '1', '1');
INSERT INTO `bj` VALUES (115, '1', '1');
INSERT INTO `bj` VALUES (116, '0', '0');
INSERT INTO `bj` VALUES (117, '0', '0');
INSERT INTO `bj` VALUES (118, '1', '0');
INSERT INTO `bj` VALUES (119, '0', '0');
INSERT INTO `bj` VALUES (120, '1', '0');
INSERT INTO `bj` VALUES (121, '1', '0');
INSERT INTO `bj` VALUES (122, '0', '1');
INSERT INTO `bj` VALUES (123, '1', '1');
INSERT INTO `bj` VALUES (124, '1', '1');
INSERT INTO `bj` VALUES (125, '1', '1');
INSERT INTO `bj` VALUES (126, '0', '0');
INSERT INTO `bj` VALUES (127, '1', '1');
INSERT INTO `bj` VALUES (128, '0', '1');
INSERT INTO `bj` VALUES (129, '1', '1');
INSERT INTO `bj` VALUES (130, '0', '0');
INSERT INTO `bj` VALUES (131, '0', '0');
INSERT INTO `bj` VALUES (132, '1', '1');
INSERT INTO `bj` VALUES (133, '0', '0');
INSERT INTO `bj` VALUES (134, '0', '0');
INSERT INTO `bj` VALUES (135, '1', '0');
INSERT INTO `bj` VALUES (136, '1', '0');
INSERT INTO `bj` VALUES (137, '0', '0');
INSERT INTO `bj` VALUES (138, '1', '1');
INSERT INTO `bj` VALUES (139, '0', '1');
INSERT INTO `bj` VALUES (140, '0', '0');
INSERT INTO `bj` VALUES (141, '1', '0');
INSERT INTO `bj` VALUES (142, '1', '0');
INSERT INTO `bj` VALUES (143, '1', '1');
INSERT INTO `bj` VALUES (144, '0', '1');
INSERT INTO `bj` VALUES (145, '1', '1');
INSERT INTO `bj` VALUES (146, '0', '1');
INSERT INTO `bj` VALUES (147, '1', '0');
INSERT INTO `bj` VALUES (148, '1', '1');
INSERT INTO `bj` VALUES (149, '1', '1');
INSERT INTO `bj` VALUES (150, '1', '1');
INSERT INTO `bj` VALUES (151, '0', '1');
INSERT INTO `bj` VALUES (152, '0', '0');
INSERT INTO `bj` VALUES (153, '1', '0');
INSERT INTO `bj` VALUES (154, '1', '0');
INSERT INTO `bj` VALUES (155, '1', '0');
INSERT INTO `bj` VALUES (156, '0', '0');
INSERT INTO `bj` VALUES (157, '0', '1');
INSERT INTO `bj` VALUES (158, '0', '1');
INSERT INTO `bj` VALUES (159, '1', '1');
INSERT INTO `bj` VALUES (160, '0', '0');
INSERT INTO `bj` VALUES (161, '1', '0');
INSERT INTO `bj` VALUES (162, '0', '1');
INSERT INTO `bj` VALUES (163, '0', '1');
INSERT INTO `bj` VALUES (164, '0', '1');
INSERT INTO `bj` VALUES (165, '1', '0');
INSERT INTO `bj` VALUES (166, '0', '0');
INSERT INTO `bj` VALUES (167, '1', '0');
INSERT INTO `bj` VALUES (168, '0', '0');
INSERT INTO `bj` VALUES (169, '0', '0');
INSERT INTO `bj` VALUES (170, '0', '1');
INSERT INTO `bj` VALUES (171, '1', '1');
INSERT INTO `bj` VALUES (172, '0', '0');
INSERT INTO `bj` VALUES (173, '0', '1');
INSERT INTO `bj` VALUES (174, '0', '0');
INSERT INTO `bj` VALUES (175, '1', '0');
INSERT INTO `bj` VALUES (176, '0', '0');
INSERT INTO `bj` VALUES (177, '1', '0');
INSERT INTO `bj` VALUES (178, '0', '0');
INSERT INTO `bj` VALUES (179, '0', '0');
INSERT INTO `bj` VALUES (180, '1', '1');
INSERT INTO `bj` VALUES (181, '1', '0');
INSERT INTO `bj` VALUES (182, '0', '0');
INSERT INTO `bj` VALUES (183, '0', '0');
INSERT INTO `bj` VALUES (184, '1', '0');
INSERT INTO `bj` VALUES (185, '0', '0');
INSERT INTO `bj` VALUES (186, '0', '0');
INSERT INTO `bj` VALUES (187, '1', '0');
INSERT INTO `bj` VALUES (188, '0', '1');
INSERT INTO `bj` VALUES (189, '0', '1');
INSERT INTO `bj` VALUES (190, '1', '0');
INSERT INTO `bj` VALUES (191, '0', '1');
INSERT INTO `bj` VALUES (192, '0', '0');
INSERT INTO `bj` VALUES (193, '0', '0');
INSERT INTO `bj` VALUES (194, '1', '1');
INSERT INTO `bj` VALUES (195, '0', '1');
INSERT INTO `bj` VALUES (196, '0', '0');
INSERT INTO `bj` VALUES (197, '0', '0');
INSERT INTO `bj` VALUES (198, '1', '1');
INSERT INTO `bj` VALUES (199, '1', '0');
COMMIT;

-- ----------------------------
-- Table structure for btc
-- ----------------------------
DROP TABLE IF EXISTS `btc`;
CREATE TABLE `btc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) DEFAULT NULL,
  `result` text,
  `pred_size` tinyint(4) DEFAULT NULL,
  `pred_odd` tinyint(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of btc
-- ----------------------------
BEGIN;
INSERT INTO `btc` VALUES (1, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (2, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (3, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (4, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (5, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (6, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (7, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (8, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (9, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (10, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (11, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (12, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (13, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (14, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (15, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (16, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (17, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (18, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (19, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (20, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (21, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (22, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (23, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (24, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (25, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (26, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (27, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (28, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (29, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (30, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (31, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (32, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (33, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (34, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (35, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (36, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (37, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (38, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (39, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (40, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (41, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (42, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (43, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (44, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (45, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (46, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (47, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (48, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (49, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (50, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (51, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (52, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (53, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (54, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (55, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (56, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (57, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (58, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (59, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (60, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (61, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (62, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (63, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (64, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (65, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (66, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (67, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (68, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (69, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (70, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (71, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (72, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (73, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (74, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (75, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (76, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (77, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (78, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (79, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (80, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (81, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (82, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (83, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (84, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (85, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (86, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (87, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (88, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (89, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (90, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (91, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (92, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (93, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (94, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (95, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (96, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (97, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (98, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (99, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (100, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (101, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (102, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (103, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (104, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (105, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (106, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (107, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (108, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (109, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (110, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (111, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (112, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (113, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (114, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (115, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (116, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (117, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (118, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (119, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (120, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (121, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (122, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (123, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (124, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (125, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (126, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (127, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (128, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (129, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (130, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (131, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (132, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (133, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (134, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (135, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (136, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (137, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (138, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (139, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (140, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (141, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (142, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (143, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (144, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (145, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (146, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (147, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (148, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (149, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (150, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (151, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (152, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (153, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (154, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (155, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (156, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (157, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (158, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (159, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (160, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (161, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (162, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (163, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (164, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (165, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (166, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (167, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (168, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (169, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (170, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (171, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (172, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (173, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (174, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (175, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (176, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (177, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (178, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (179, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (180, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (181, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (182, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (183, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (184, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (185, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (186, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (187, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (188, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (189, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (190, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (191, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (192, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (193, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (194, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (195, NULL, NULL, 0, 1);
INSERT INTO `btc` VALUES (196, NULL, NULL, 0, 0);
INSERT INTO `btc` VALUES (197, NULL, NULL, 1, 1);
INSERT INTO `btc` VALUES (198, NULL, NULL, 1, 0);
INSERT INTO `btc` VALUES (199, NULL, NULL, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for canada
-- ----------------------------
DROP TABLE IF EXISTS `canada`;
CREATE TABLE `canada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` tinyint(4) DEFAULT NULL,
  `odd` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of canada
-- ----------------------------
BEGIN;
INSERT INTO `canada` VALUES (1, 1, 0);
INSERT INTO `canada` VALUES (2, 1, 0);
INSERT INTO `canada` VALUES (3, 0, 0);
INSERT INTO `canada` VALUES (4, 1, 1);
INSERT INTO `canada` VALUES (5, 0, 0);
INSERT INTO `canada` VALUES (6, 1, 0);
INSERT INTO `canada` VALUES (7, 0, 1);
INSERT INTO `canada` VALUES (8, 1, 1);
INSERT INTO `canada` VALUES (9, 1, 1);
INSERT INTO `canada` VALUES (10, 0, 1);
INSERT INTO `canada` VALUES (11, 0, 1);
INSERT INTO `canada` VALUES (12, 1, 1);
INSERT INTO `canada` VALUES (13, 1, 0);
INSERT INTO `canada` VALUES (14, 0, 1);
INSERT INTO `canada` VALUES (15, 1, 1);
INSERT INTO `canada` VALUES (16, 0, 0);
INSERT INTO `canada` VALUES (17, 1, 1);
INSERT INTO `canada` VALUES (18, 0, 1);
INSERT INTO `canada` VALUES (19, 1, 0);
INSERT INTO `canada` VALUES (20, 0, 1);
INSERT INTO `canada` VALUES (21, 0, 1);
INSERT INTO `canada` VALUES (22, 1, 1);
INSERT INTO `canada` VALUES (23, 1, 1);
INSERT INTO `canada` VALUES (24, 1, 0);
INSERT INTO `canada` VALUES (25, 1, 0);
INSERT INTO `canada` VALUES (26, 0, 1);
INSERT INTO `canada` VALUES (27, 1, 0);
INSERT INTO `canada` VALUES (28, 1, 1);
INSERT INTO `canada` VALUES (29, 1, 0);
INSERT INTO `canada` VALUES (30, 1, 1);
INSERT INTO `canada` VALUES (31, 1, 1);
INSERT INTO `canada` VALUES (32, 0, 1);
INSERT INTO `canada` VALUES (33, 1, 1);
INSERT INTO `canada` VALUES (34, 1, 0);
INSERT INTO `canada` VALUES (35, 0, 0);
INSERT INTO `canada` VALUES (36, 1, 0);
INSERT INTO `canada` VALUES (37, 1, 1);
INSERT INTO `canada` VALUES (38, 0, 1);
INSERT INTO `canada` VALUES (39, 0, 0);
INSERT INTO `canada` VALUES (40, 0, 0);
INSERT INTO `canada` VALUES (41, 0, 0);
INSERT INTO `canada` VALUES (42, 1, 1);
INSERT INTO `canada` VALUES (43, 1, 1);
INSERT INTO `canada` VALUES (44, 0, 0);
INSERT INTO `canada` VALUES (45, 0, 0);
INSERT INTO `canada` VALUES (46, 1, 0);
INSERT INTO `canada` VALUES (47, 1, 0);
INSERT INTO `canada` VALUES (48, 0, 1);
INSERT INTO `canada` VALUES (49, 0, 1);
INSERT INTO `canada` VALUES (50, 1, 0);
INSERT INTO `canada` VALUES (51, 0, 1);
INSERT INTO `canada` VALUES (52, 1, 0);
INSERT INTO `canada` VALUES (53, 1, 1);
INSERT INTO `canada` VALUES (54, 0, 1);
INSERT INTO `canada` VALUES (55, 1, 0);
INSERT INTO `canada` VALUES (56, 1, 1);
INSERT INTO `canada` VALUES (57, 0, 1);
INSERT INTO `canada` VALUES (58, 1, 0);
INSERT INTO `canada` VALUES (59, 1, 1);
INSERT INTO `canada` VALUES (60, 0, 0);
INSERT INTO `canada` VALUES (61, 0, 1);
INSERT INTO `canada` VALUES (62, 1, 0);
INSERT INTO `canada` VALUES (63, 1, 0);
INSERT INTO `canada` VALUES (64, 1, 0);
INSERT INTO `canada` VALUES (65, 1, 1);
INSERT INTO `canada` VALUES (66, 1, 0);
INSERT INTO `canada` VALUES (67, 0, 0);
INSERT INTO `canada` VALUES (68, 1, 0);
INSERT INTO `canada` VALUES (69, 0, 0);
INSERT INTO `canada` VALUES (70, 0, 0);
INSERT INTO `canada` VALUES (71, 0, 0);
INSERT INTO `canada` VALUES (72, 0, 1);
INSERT INTO `canada` VALUES (73, 0, 1);
INSERT INTO `canada` VALUES (74, 1, 0);
INSERT INTO `canada` VALUES (75, 0, 0);
INSERT INTO `canada` VALUES (76, 1, 0);
INSERT INTO `canada` VALUES (77, 0, 1);
INSERT INTO `canada` VALUES (78, 0, 0);
INSERT INTO `canada` VALUES (79, 0, 0);
INSERT INTO `canada` VALUES (80, 0, 1);
INSERT INTO `canada` VALUES (81, 0, 1);
INSERT INTO `canada` VALUES (82, 0, 1);
INSERT INTO `canada` VALUES (83, 0, 1);
INSERT INTO `canada` VALUES (84, 1, 1);
INSERT INTO `canada` VALUES (85, 1, 0);
INSERT INTO `canada` VALUES (86, 1, 0);
INSERT INTO `canada` VALUES (87, 0, 1);
INSERT INTO `canada` VALUES (88, 0, 1);
INSERT INTO `canada` VALUES (89, 0, 1);
INSERT INTO `canada` VALUES (90, 0, 0);
INSERT INTO `canada` VALUES (91, 1, 1);
INSERT INTO `canada` VALUES (92, 0, 1);
INSERT INTO `canada` VALUES (93, 1, 1);
INSERT INTO `canada` VALUES (94, 0, 0);
INSERT INTO `canada` VALUES (95, 1, 1);
INSERT INTO `canada` VALUES (96, 1, 1);
INSERT INTO `canada` VALUES (97, 0, 1);
INSERT INTO `canada` VALUES (98, 1, 0);
INSERT INTO `canada` VALUES (99, 0, 1);
INSERT INTO `canada` VALUES (100, 1, 1);
INSERT INTO `canada` VALUES (101, 0, 1);
INSERT INTO `canada` VALUES (102, 1, 1);
INSERT INTO `canada` VALUES (103, 1, 0);
INSERT INTO `canada` VALUES (104, 0, 1);
INSERT INTO `canada` VALUES (105, 0, 0);
INSERT INTO `canada` VALUES (106, 1, 1);
INSERT INTO `canada` VALUES (107, 1, 1);
INSERT INTO `canada` VALUES (108, 0, 0);
INSERT INTO `canada` VALUES (109, 0, 1);
INSERT INTO `canada` VALUES (110, 0, 1);
INSERT INTO `canada` VALUES (111, 1, 0);
INSERT INTO `canada` VALUES (112, 1, 1);
INSERT INTO `canada` VALUES (113, 1, 1);
INSERT INTO `canada` VALUES (114, 0, 0);
INSERT INTO `canada` VALUES (115, 1, 1);
INSERT INTO `canada` VALUES (116, 1, 1);
INSERT INTO `canada` VALUES (117, 0, 1);
INSERT INTO `canada` VALUES (118, 1, 0);
INSERT INTO `canada` VALUES (119, 1, 0);
INSERT INTO `canada` VALUES (120, 1, 1);
INSERT INTO `canada` VALUES (121, 0, 1);
INSERT INTO `canada` VALUES (122, 0, 1);
INSERT INTO `canada` VALUES (123, 0, 0);
INSERT INTO `canada` VALUES (124, 0, 0);
INSERT INTO `canada` VALUES (125, 1, 0);
INSERT INTO `canada` VALUES (126, 0, 0);
INSERT INTO `canada` VALUES (127, 0, 0);
INSERT INTO `canada` VALUES (128, 0, 0);
INSERT INTO `canada` VALUES (129, 1, 0);
INSERT INTO `canada` VALUES (130, 0, 1);
INSERT INTO `canada` VALUES (131, 1, 1);
INSERT INTO `canada` VALUES (132, 0, 0);
INSERT INTO `canada` VALUES (133, 1, 1);
INSERT INTO `canada` VALUES (134, 0, 1);
INSERT INTO `canada` VALUES (135, 1, 1);
INSERT INTO `canada` VALUES (136, 0, 1);
INSERT INTO `canada` VALUES (137, 0, 1);
INSERT INTO `canada` VALUES (138, 0, 0);
INSERT INTO `canada` VALUES (139, 0, 1);
INSERT INTO `canada` VALUES (140, 0, 0);
INSERT INTO `canada` VALUES (141, 1, 0);
INSERT INTO `canada` VALUES (142, 0, 1);
INSERT INTO `canada` VALUES (143, 0, 1);
INSERT INTO `canada` VALUES (144, 1, 1);
INSERT INTO `canada` VALUES (145, 1, 1);
INSERT INTO `canada` VALUES (146, 1, 1);
INSERT INTO `canada` VALUES (147, 0, 0);
INSERT INTO `canada` VALUES (148, 1, 0);
INSERT INTO `canada` VALUES (149, 1, 0);
INSERT INTO `canada` VALUES (150, 1, 0);
INSERT INTO `canada` VALUES (151, 1, 1);
INSERT INTO `canada` VALUES (152, 0, 1);
INSERT INTO `canada` VALUES (153, 1, 1);
INSERT INTO `canada` VALUES (154, 1, 0);
INSERT INTO `canada` VALUES (155, 0, 0);
INSERT INTO `canada` VALUES (156, 0, 1);
INSERT INTO `canada` VALUES (157, 1, 0);
INSERT INTO `canada` VALUES (158, 0, 1);
INSERT INTO `canada` VALUES (159, 1, 1);
INSERT INTO `canada` VALUES (160, 0, 1);
INSERT INTO `canada` VALUES (161, 1, 0);
INSERT INTO `canada` VALUES (162, 1, 0);
INSERT INTO `canada` VALUES (163, 1, 1);
INSERT INTO `canada` VALUES (164, 1, 0);
INSERT INTO `canada` VALUES (165, 0, 1);
INSERT INTO `canada` VALUES (166, 1, 0);
INSERT INTO `canada` VALUES (167, 1, 0);
INSERT INTO `canada` VALUES (168, 1, 1);
INSERT INTO `canada` VALUES (169, 0, 0);
INSERT INTO `canada` VALUES (170, 0, 0);
INSERT INTO `canada` VALUES (171, 1, 0);
INSERT INTO `canada` VALUES (172, 0, 0);
INSERT INTO `canada` VALUES (173, 1, 0);
INSERT INTO `canada` VALUES (174, 0, 0);
INSERT INTO `canada` VALUES (175, 1, 1);
INSERT INTO `canada` VALUES (176, 0, 0);
INSERT INTO `canada` VALUES (177, 0, 1);
INSERT INTO `canada` VALUES (178, 1, 0);
INSERT INTO `canada` VALUES (179, 0, 1);
INSERT INTO `canada` VALUES (180, 1, 1);
INSERT INTO `canada` VALUES (181, 1, 0);
INSERT INTO `canada` VALUES (182, 0, 0);
INSERT INTO `canada` VALUES (183, 0, 1);
INSERT INTO `canada` VALUES (184, 0, 1);
INSERT INTO `canada` VALUES (185, 1, 1);
INSERT INTO `canada` VALUES (186, 1, 1);
INSERT INTO `canada` VALUES (187, 1, 1);
INSERT INTO `canada` VALUES (188, 0, 1);
INSERT INTO `canada` VALUES (189, 1, 1);
INSERT INTO `canada` VALUES (190, 0, 1);
INSERT INTO `canada` VALUES (191, 0, 0);
INSERT INTO `canada` VALUES (192, 1, 0);
INSERT INTO `canada` VALUES (193, 0, 0);
INSERT INTO `canada` VALUES (194, 0, 1);
INSERT INTO `canada` VALUES (195, 0, 1);
INSERT INTO `canada` VALUES (196, 1, 1);
INSERT INTO `canada` VALUES (197, 1, 0);
INSERT INTO `canada` VALUES (198, 0, 0);
INSERT INTO `canada` VALUES (199, 0, 0);
INSERT INTO `canada` VALUES (200, 1, 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
