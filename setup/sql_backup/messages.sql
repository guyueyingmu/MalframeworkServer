/*
Navicat MySQL Data Transfer

Source Server         : 100.40
Source Server Version : 50173
Source Host           : 192.168.100.40:3306
Source Database       : mydendroid

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2017-04-25 12:38:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(1800) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
