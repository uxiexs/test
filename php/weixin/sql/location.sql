/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-04-11 16:25:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for location
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '用户名',
  `x` double(10,6) NOT NULL DEFAULT '0.000000' COMMENT '维度',
  `y` double(10,6) NOT NULL DEFAULT '0.000000' COMMENT '经度',
  `scale` int(11) NOT NULL DEFAULT '0' COMMENT '范围',
  `label` varchar(200) DEFAULT NULL COMMENT '标记',
  `createtime` int(255) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='定位表';
