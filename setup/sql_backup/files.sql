/*
Navicat MySQL Data Transfer

Source Server         : 100.40
Source Server Version : 50173
Source Host           : 192.168.100.40:3306
Source Database       : mydendroid

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2017-04-25 12:38:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
