/*
Navicat MySQL Data Transfer

Source Server         : 100.40
Source Server Version : 50173
Source Host           : 192.168.100.40:3306
Source Database       : mydendroid

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2017-04-25 12:38:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for commands
-- ----------------------------
DROP TABLE IF EXISTS `commands`;
CREATE TABLE `commands` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `command` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `arg1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `arg2` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `arg3` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
