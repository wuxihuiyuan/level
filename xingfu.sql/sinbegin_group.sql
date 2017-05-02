/*
Navicat MySQL Data Transfer

Source Server         : huiyuan
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : leveltest

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-04-21 11:18:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sinbegin_group
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_group`;
CREATE TABLE `sinbegin_group` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(30) NOT NULL DEFAULT '',
  `system` smallint(1) NOT NULL DEFAULT '0',
  `purviews` mediumtext,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


