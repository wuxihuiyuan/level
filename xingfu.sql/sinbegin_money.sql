/*
Navicat MySQL Data Transfer

Source Server         : huiyuan
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : level1

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-04-21 15:00:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sinbegin_money
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_money`;
CREATE TABLE `sinbegin_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(11,2) DEFAULT '0.00',
  `addtime` varchar(10) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
