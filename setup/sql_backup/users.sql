/*
Navicat MySQL Data Transfer

Source Server         : 100.40
Source Server Version : 50173
Source Host           : 192.168.100.40:3306
Source Database       : mydendroid

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2017-04-25 12:38:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `postboxtextsize` int(8) NOT NULL COMMENT '发送文本字体大小',
  `devicestablerefreshspeed` int(8) NOT NULL COMMENT '设备表更新速度',
  `filestablerefreshspeed` int(8) NOT NULL COMMENT '文件表更新速度',
  `messageboxrefreshspeed` int(8) NOT NULL COMMENT '消息盒子更新速度',
  `offlineminutes` int(8) NOT NULL COMMENT '离线分钟数',
  `timezonesetting` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '时区',
  `autoscrolltextbox` int(4) NOT NULL COMMENT '是否消息自动滑动，1是0否',
  PRIMARY KEY (`id`,`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
