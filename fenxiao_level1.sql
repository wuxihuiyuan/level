/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : fenxiao_level

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-03-24 18:41:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sinbegin_about
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_about`;
CREATE TABLE `sinbegin_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `myurl` varchar(255) DEFAULT '',
  `urltype` int(1) DEFAULT '0',
  `typeid` int(11) DEFAULT NULL,
  `content` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_about
-- ----------------------------
INSERT INTO `sinbegin_about` VALUES ('17', '商品', '', '0', '4', '商品');
INSERT INTO `sinbegin_about` VALUES ('18', '营销', '', '0', '5', '营销');

-- ----------------------------
-- Table structure for sinbegin_abouttype
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_abouttype`;
CREATE TABLE `sinbegin_abouttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) DEFAULT '',
  `typeorder` int(2) DEFAULT NULL,
  `is_show` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_abouttype
-- ----------------------------
INSERT INTO `sinbegin_abouttype` VALUES ('4', '商品', '1', '1');
INSERT INTO `sinbegin_abouttype` VALUES ('5', '营销', '2', '1');

-- ----------------------------
-- Table structure for sinbegin_atmbank
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_atmbank`;
CREATE TABLE `sinbegin_atmbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `truename` varchar(50) DEFAULT '',
  `bankname` varchar(50) DEFAULT '0' COMMENT '银行名称',
  `bankcard` varchar(50) DEFAULT '0',
  `bankadd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_atmbank
-- ----------------------------
INSERT INTO `sinbegin_atmbank` VALUES ('1', '1', '系统会员', '工商银行', '62222502003569392', '昆明市碧鸡路支行');
INSERT INTO `sinbegin_atmbank` VALUES ('2', '3', 'wy', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('3', '4', 'admin123', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('4', '5', 'wangyang', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('5', '6', 'wangyang', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('6', '7', 'wangyang', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('7', '8', 'wangyang', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('8', '9', 'wangyang', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('9', '10', 'wangyang', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('10', '11', 'wangyang12', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('11', '12', 'wangyang11', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('12', '13', 'wangyang3', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('13', '14', 'wangyang2', '支付宝', '2012', '额外日企鹅舞');
INSERT INTO `sinbegin_atmbank` VALUES ('14', '15', 'wangyang1', '支付宝', '21212121', '12212121');
INSERT INTO `sinbegin_atmbank` VALUES ('15', '18', '王洋', '支付宝', '18834814403', '支付宝');
INSERT INTO `sinbegin_atmbank` VALUES ('16', '19', '何立波', '支付宝', '18834814403', '支付宝');

-- ----------------------------
-- Table structure for sinbegin_atmlog
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_atmlog`;
CREATE TABLE `sinbegin_atmlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `orderid` varchar(30) DEFAULT '',
  `truename` varchar(10) DEFAULT '',
  `bankname` varchar(100) NOT NULL DEFAULT '',
  `bankcard` varchar(100) DEFAULT NULL,
  `lognum` decimal(11,2) NOT NULL DEFAULT '0.00',
  `addtime` int(11) DEFAULT NULL COMMENT '免费注册时间',
  `checked` int(1) DEFAULT '0',
  `bankadd` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_atmlog
-- ----------------------------

-- ----------------------------
-- Table structure for sinbegin_completed
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_completed`;
CREATE TABLE `sinbegin_completed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(11,2) DEFAULT '0.00',
  `addtime` varchar(10) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_completed
-- ----------------------------

-- ----------------------------
-- Table structure for sinbegin_customs
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_customs`;
CREATE TABLE `sinbegin_customs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `address` varchar(255) DEFAULT NULL COMMENT '二级密码',
  `checked` int(1) DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_customs
-- ----------------------------
INSERT INTO `sinbegin_customs` VALUES ('1', '1', '全国', '全国服务中心', '1', '1413898807');

-- ----------------------------
-- Table structure for sinbegin_delivery
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_delivery`;
CREATE TABLE `sinbegin_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `mobile` varchar(255) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_delivery
-- ----------------------------
INSERT INTO `sinbegin_delivery` VALUES ('1', '5', 'admin', '是打发大撒旦盛大收购', '18834814403', '0');
INSERT INTO `sinbegin_delivery` VALUES ('2', '5', '234234', '21  1', '34 2341 12', '1');
INSERT INTO `sinbegin_delivery` VALUES ('3', '5', '234234', '21  1', '34 2341 12', '0');
INSERT INTO `sinbegin_delivery` VALUES ('4', '5', '234234', '21  1', '34 2341 12', '0');
INSERT INTO `sinbegin_delivery` VALUES ('5', '5', '234234', '21  1', '34 2341 12', '0');
INSERT INTO `sinbegin_delivery` VALUES ('6', '21', '王洋', '榆次区万科朗润园A5-17F', '18834814403', '1');
INSERT INTO `sinbegin_delivery` VALUES ('7', '18', 'wangyang', '榆次区万科朗润园A5-17F', '18834814403', '1');
INSERT INTO `sinbegin_delivery` VALUES ('8', '23', '带伞', '上海', '1212', '1');
INSERT INTO `sinbegin_delivery` VALUES ('9', '21', 'daisan', '12', '212', '0');
INSERT INTO `sinbegin_delivery` VALUES ('10', '21', 'asd', 'ASD', '122', '0');

-- ----------------------------
-- Table structure for sinbegin_goods
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_goods`;
CREATE TABLE `sinbegin_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商城价',
  `commission` decimal(11,2) DEFAULT '0.00',
  `shopmoney` decimal(10,2) DEFAULT '0.00' COMMENT '可用购物币',
  `balance` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '可用积分',
  `goods_desc` text NOT NULL COMMENT '产品说明',
  `goods_thumb` mediumtext NOT NULL COMMENT '产品图片',
  `margin` decimal(11,2) DEFAULT '0.00' COMMENT '奖励差额',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `ischeck` tinyint(1) unsigned DEFAULT '1' COMMENT '是否上架',
  `shipping` decimal(11,2) DEFAULT '0.00' COMMENT '运费',
  `sale` int(11) DEFAULT '0' COMMENT '商品销售量',
  `hy_price` varchar(255) DEFAULT '' COMMENT '会员价',
  `tg_price` varchar(255) DEFAULT '' COMMENT '团购价',
  `unit_rate` int(11) DEFAULT '0',
  `huiyuan_sale` int(11) DEFAULT '0',
  `is_linshou` tinyint(4) DEFAULT '0',
  `agent_price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`,`addtime`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_goods
-- ----------------------------
INSERT INTO `sinbegin_goods` VALUES ('9', '平安果', '0', '5990.00', '0.00', '30.00', '0.00', '全额委屈额为', '/upload/goods/2017-03-17/20170317142945291.jpg,/upload/goods/2017-03-17/20170317143013516.png', '0.00', '1489732746', '1', '0.00', '0', '{\"key\":{\"price\":\"4880\",\"minimum\":\"2\"}}', '{\"key\":{\"price\":\"5200\",\"minimum\":\"5\"}}', '15', '0', null, '2990');

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

-- ----------------------------
-- Records of sinbegin_group
-- ----------------------------
INSERT INTO `sinbegin_group` VALUES ('1', '超级管理员', '1', 'adminall');
INSERT INTO `sinbegin_group` VALUES ('2', '普通管理员', '0', 'admin_user_control,admin_user_group,admin_user_customs,admin_site_news,admin_site_about');
INSERT INTO `sinbegin_group` VALUES ('3', '系统管理员', '0', 'admin_census_payorder,admin_census_atmlog,admin_census_money,admin_main_system,admin_main_config,admin_main_guestbook,admin_main_database,admin_manager_control,admin_manager_group,admin_manager_password,admin_user_control,admin_user_group,admin_user_customs,admin_site_news,admin_site_about');

-- ----------------------------
-- Table structure for sinbegin_level_shop
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_level_shop`;
CREATE TABLE `sinbegin_level_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `shopid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `minimum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sinbegin_level_shop
-- ----------------------------

-- ----------------------------
-- Table structure for sinbegin_log
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_log`;
CREATE TABLE `sinbegin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bnous` int(11) unsigned DEFAULT '0',
  `share_momey` int(11) unsigned DEFAULT NULL,
  `addtime` int(11) unsigned DEFAULT NULL COMMENT '产生时间',
  `rebate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_log
-- ----------------------------

-- ----------------------------
-- Table structure for sinbegin_manager
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_manager`;
CREATE TABLE `sinbegin_manager` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `salt` varchar(8) NOT NULL DEFAULT '' COMMENT '密码前缀',
  `lasttime` int(11) DEFAULT NULL COMMENT '登录时间',
  `lastip` varchar(20) DEFAULT '' COMMENT '登陆IP',
  `groupid` int(11) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_manager
-- ----------------------------
INSERT INTO `sinbegin_manager` VALUES ('1', 'admin', 'e120dae791fe8c7b5652f8933078b3ee', '26', '994c61', '1490319517', '192.168.3.47', '1');
INSERT INTO `sinbegin_manager` VALUES ('4', 'system', '71273c25c1f4cd846743a2c418ca603e', '2', '2354ed', '1413902195', '106.37.236.229', '3');

-- ----------------------------
-- Table structure for sinbegin_message
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_message`;
CREATE TABLE `sinbegin_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '' COMMENT '信件主题',
  `content` mediumtext COMMENT '信件内容',
  `uid` int(11) DEFAULT '0' COMMENT '邮件会员',
  `parentid` int(11) DEFAULT '0' COMMENT '父邮件',
  `addtime` int(11) DEFAULT '0' COMMENT '发收时间',
  `type` int(1) DEFAULT '0' COMMENT '发收状态',
  `checked` int(1) DEFAULT '0' COMMENT '是否已读',
  `isdel` int(1) DEFAULT '0' COMMENT '会员是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='权限资源码';

-- ----------------------------
-- Records of sinbegin_message
-- ----------------------------
INSERT INTO `sinbegin_message` VALUES ('1', '价格不合理', '价格不合理', '5', '0', '1490144874', '1', '0', '0');
INSERT INTO `sinbegin_message` VALUES ('2', '涨薪', '12222213', '18', '0', '1490321543', '1', '0', '0');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_money
-- ----------------------------

-- ----------------------------
-- Table structure for sinbegin_nav
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_nav`;
CREATE TABLE `sinbegin_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `type` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `ord` int(10) DEFAULT '0',
  `act` int(1) DEFAULT '1',
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_nav
-- ----------------------------

-- ----------------------------
-- Table structure for sinbegin_news
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_news`;
CREATE TABLE `sinbegin_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `addtime` int(11) DEFAULT NULL,
  `content` mediumtext,
  `clicknumber` int(11) DEFAULT '0' COMMENT '浏览次数',
  `typeid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_news
-- ----------------------------
INSERT INTO `sinbegin_news` VALUES ('12', '内部新闻', '1490092080', '商品涨价', '0', '3');
INSERT INTO `sinbegin_news` VALUES ('13', '新闻1', '1490092140', '商品在家了', '0', '4');

-- ----------------------------
-- Table structure for sinbegin_newstype
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_newstype`;
CREATE TABLE `sinbegin_newstype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) DEFAULT '',
  `typeorder` int(2) DEFAULT NULL,
  `system` int(1) DEFAULT '0' COMMENT '是否系统公告',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_newstype
-- ----------------------------
INSERT INTO `sinbegin_newstype` VALUES ('3', '商品0', '1', '0');
INSERT INTO `sinbegin_newstype` VALUES ('4', '商品1', '2', '1');

-- ----------------------------
-- Table structure for sinbegin_order
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_order`;
CREATE TABLE `sinbegin_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT NULL,
  `message` mediumtext,
  `checked` int(1) DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `goods` mediumtext,
  `margin` decimal(11,2) DEFAULT '0.00',
  `money` int(11) DEFAULT '0',
  `delivery` varchar(1000) DEFAULT '',
  `ftime` int(11) DEFAULT '0',
  `mincode` varchar(255) DEFAULT NULL,
  `maxcode` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `refereeid` int(11) DEFAULT '0',
  `buy_way` tinyint(4) DEFAULT '0' COMMENT '进货方式(0代理 ，1总部)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_order
-- ----------------------------
INSERT INTO `sinbegin_order` VALUES ('21', '201703240341493442', '', '0', '21', '1490341309', 'a:1:{i:9;a:4:{s:6:\"number\";s:1:\"6\";s:5:\"price\";s:5:\"44850\";s:5:\"money\";i:269100;s:4:\"name\";s:9:\"平安果\";}}', '0.00', '269100', 'a:12:{i:0;s:1:\"6\";s:2:\"id\";s:1:\"6\";i:1;s:2:\"21\";s:3:\"uid\";s:2:\"21\";i:2;s:6:\"王洋\";s:4:\"name\";s:6:\"王洋\";i:3;s:30:\"榆次区万科朗润园A5-17F\";s:7:\"address\";s:30:\"榆次区万科朗润园A5-17F\";i:4;s:11:\"18834814403\";s:6:\"mobile\";s:11:\"18834814403\";i:5;s:1:\"1\";s:10:\"is_default\";s:1:\"1\";}', '0', '', '', '0', '18', '0');
INSERT INTO `sinbegin_order` VALUES ('19', '201703240215338436', '', '10', '23', '1490336133', 'a:1:{i:9;a:4:{s:6:\"number\";s:1:\"6\";s:5:\"price\";s:5:\"44850\";s:5:\"money\";i:269100;s:4:\"name\";s:9:\"平安果\";}}', '0.00', '269100', 'a:12:{i:0;s:1:\"8\";s:2:\"id\";s:1:\"8\";i:1;s:2:\"23\";s:3:\"uid\";s:2:\"23\";i:2;s:6:\"带伞\";s:4:\"name\";s:6:\"带伞\";i:3;s:6:\"上海\";s:7:\"address\";s:6:\"上海\";i:4;s:4:\"1212\";s:6:\"mobile\";s:4:\"1212\";i:5;s:1:\"1\";s:10:\"is_default\";s:1:\"1\";}', '0', '', '', '0', '21', '0');
INSERT INTO `sinbegin_order` VALUES ('20', '201703240227531861', '', '10', '23', '1490336873', 'a:1:{i:9;a:4:{s:6:\"number\";s:1:\"7\";s:5:\"price\";s:5:\"44850\";s:5:\"money\";i:313950;s:4:\"name\";s:9:\"平安果\";}}', '0.00', '313950', 'a:12:{i:0;s:1:\"8\";s:2:\"id\";s:1:\"8\";i:1;s:2:\"23\";s:3:\"uid\";s:2:\"23\";i:2;s:6:\"带伞\";s:4:\"name\";s:6:\"带伞\";i:3;s:6:\"上海\";s:7:\"address\";s:6:\"上海\";i:4;s:4:\"1212\";s:6:\"mobile\";s:4:\"1212\";i:5;s:1:\"1\";s:10:\"is_default\";s:1:\"1\";}', '0', '', '', '0', '21', '0');

-- ----------------------------
-- Table structure for sinbegin_payorder
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_payorder`;
CREATE TABLE `sinbegin_payorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT NULL,
  `total_fee` decimal(11,2) DEFAULT '0.00',
  `checked` int(1) DEFAULT NULL,
  `paytype` varchar(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_payorder
-- ----------------------------
INSERT INTO `sinbegin_payorder` VALUES ('1', '201411010518582820', '100.00', '0', '网银在线', '1', '1414833538');
INSERT INTO `sinbegin_payorder` VALUES ('2', '201411010519237957', '100.00', '0', '网银在线', '1', '1414833563');

-- ----------------------------
-- Table structure for sinbegin_purviews
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_purviews`;
CREATE TABLE `sinbegin_purviews` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '权限名字',
  `purviews` text COMMENT '权限码(控制器+动作)',
  `admin` int(1) DEFAULT '0',
  `member` varchar(20) DEFAULT '',
  `ord` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='权限资源码';

-- ----------------------------
-- Records of sinbegin_purviews
-- ----------------------------
INSERT INTO `sinbegin_purviews` VALUES ('1', '[人脉网络]会员结构', 'member_treeform_arrange', '0', 'treeform', '10001');
INSERT INTO `sinbegin_purviews` VALUES ('2', '[人脉网络]推荐列表', 'member_treeform_record', '0', 'treeform', '10002');
INSERT INTO `sinbegin_purviews` VALUES ('3', '[人脉网络]推荐结构', 'member_treeform_referee', '0', 'treeform', '10003');
INSERT INTO `sinbegin_purviews` VALUES ('4', '[人脉网络]会员注册', 'member_treeform_register', '0', 'treeform', '10004');
INSERT INTO `sinbegin_purviews` VALUES ('5', '[人脉网络]会员升级', 'member_treeform_upgroup', '0', 'treeform', '10008');
INSERT INTO `sinbegin_purviews` VALUES ('10', '[财务管理]资金明细', 'member_capital_list', '0', 'capital', '10010');
INSERT INTO `sinbegin_purviews` VALUES ('13', '[后台用户]修改密码', 'admin_manager_password', '1', 'manager', '10013');
INSERT INTO `sinbegin_purviews` VALUES ('14', '[后台用户]用户角色', 'admin_manager_group', '1', 'manager', '10014');
INSERT INTO `sinbegin_purviews` VALUES ('15', '[后台用户]用户管理', 'admin_manager_control', '1', 'manager', '10015');
INSERT INTO `sinbegin_purviews` VALUES ('16', '[网站基础]单页管理', 'admin_site_about', '1', 'site', '10016');
INSERT INTO `sinbegin_purviews` VALUES ('17', '[网站基础]新闻管理', 'admin_site_news', '1', 'site', '10017');
INSERT INTO `sinbegin_purviews` VALUES ('19', '[网站会员]会员级别', 'admin_user_group', '1', 'user', '10019');
INSERT INTO `sinbegin_purviews` VALUES ('20', '[网站会员]会员管理', 'admin_user_control', '1', 'user', '10020');
INSERT INTO `sinbegin_purviews` VALUES ('21', '[系统管理]数据维护', 'admin_main_database', '1', 'main', '10021');
INSERT INTO `sinbegin_purviews` VALUES ('22', '[系统管理]内部信件', 'admin_main_guestbook', '1', 'main', '10022');
INSERT INTO `sinbegin_purviews` VALUES ('23', '[系统管理]网站设置', 'admin_main_config', '1', 'main', '10023');
INSERT INTO `sinbegin_purviews` VALUES ('24', '[系统管理]系统信息', 'admin_main_system', '1', 'main', '10024');
INSERT INTO `sinbegin_purviews` VALUES ('25', '[账户设置]修改密码', 'member_user_password', '0', 'user', '10025');
INSERT INTO `sinbegin_purviews` VALUES ('26', '[账户设置]基本信息', 'member_user_profile', '0', 'user', '10026');
INSERT INTO `sinbegin_purviews` VALUES ('27', '[账户设置]邮箱验证', 'member_user_authemail', '0', 'user', '10027');
INSERT INTO `sinbegin_purviews` VALUES ('28', '[账户设置]地址管理', 'member_user_address', '0', 'user', '10028');
INSERT INTO `sinbegin_purviews` VALUES ('29', '[账户设置]手机绑定', 'member_user_authphone', '0', 'user', '10029');
INSERT INTO `sinbegin_purviews` VALUES ('30', '[会员中心]系统首页', 'member_main_index', '0', 'main', '10030');
INSERT INTO `sinbegin_purviews` VALUES ('31', '[会员中心]系统公告', 'member_notice_', '0', 'main', '10031');
INSERT INTO `sinbegin_purviews` VALUES ('32', '[会员中心]站内信件', 'member_imessage_', '0', 'main', '10032');
INSERT INTO `sinbegin_purviews` VALUES ('33', '[数据统计]资金明细', 'admin_census_money', '1', 'census', '10033');
INSERT INTO `sinbegin_purviews` VALUES ('34', '[数据统计]提现记录', 'admin_census_atmlog', '1', 'census', '10034');
INSERT INTO `sinbegin_purviews` VALUES ('35', '[数据统计]充值记录', 'admin_census_payorder', '1', 'census', '10035');
INSERT INTO `sinbegin_purviews` VALUES ('36', '[产品中心]产品订购', 'member_goods_list', '0', 'goods', '10036');
INSERT INTO `sinbegin_purviews` VALUES ('37', '[产品中心]购买订单', 'member_goods_order', '0', 'goods', '10037');
INSERT INTO `sinbegin_purviews` VALUES ('38', '[产品中心]发货订单', 'member_goods_sendorder', '0', 'goods', '10038');
INSERT INTO `sinbegin_purviews` VALUES ('39', '[账户设置]银行卡管理', 'member_user_bankinfo', '0', 'user', '10039');

-- ----------------------------
-- Table structure for sinbegin_record
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_record`;
CREATE TABLE `sinbegin_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_paymoney` decimal(11,2) DEFAULT '0.00' COMMENT '人工充值',
  `paymoney` decimal(11,2) DEFAULT '0.00' COMMENT '在线充值',
  `buymoney` decimal(11,2) DEFAULT '0.00' COMMENT '进单总额',
  `ordermoney` decimal(11,2) DEFAULT '0.00' COMMENT '订货总额',
  `upgroup` decimal(11,2) DEFAULT '0.00' COMMENT '升级进单额',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '静态奖励',
  `_money` decimal(11,2) DEFAULT '0.00' COMMENT '见点奖',
  `refereemoney` decimal(11,2) DEFAULT '0.00' COMMENT '直荐奖',
  `__money` decimal(11,2) DEFAULT '0.00' COMMENT '对碰奖',
  `floormoney` decimal(11,2) DEFAULT '0.00' COMMENT '见点奖',
  `leadmoney` decimal(11,2) DEFAULT '0.00' COMMENT '团队奖',
  `regmoney` decimal(11,2) DEFAULT '0.00' COMMENT '报单奖',
  `atmmoney` decimal(11,2) DEFAULT '0.00' COMMENT '会员提现',
  `atmmoneyed` decimal(11,2) DEFAULT '0.00',
  `addtime` int(11) DEFAULT '0',
  `otherin` decimal(11,2) DEFAULT '0.00' COMMENT '其他收入',
  `otherout` decimal(11,2) DEFAULT '0.00' COMMENT '其他支出',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sinbegin_record
-- ----------------------------
INSERT INTO `sinbegin_record` VALUES ('1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1489766400', '0.00', '0.00');
INSERT INTO `sinbegin_record` VALUES ('2', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1489939200', '0.00', '0.00');
INSERT INTO `sinbegin_record` VALUES ('3', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1490112000', '0.00', '0.00');

-- ----------------------------
-- Table structure for sinbegin_records
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_records`;
CREATE TABLE `sinbegin_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_paymoney` decimal(11,2) DEFAULT '0.00' COMMENT '管理员充值',
  `paymoney` decimal(11,2) DEFAULT '0.00' COMMENT '在线充值',
  `buymoney` decimal(11,2) DEFAULT '0.00' COMMENT '进单总额',
  `upgroup` decimal(11,2) DEFAULT '0.00' COMMENT '升级进单额',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '静态奖',
  `_money` decimal(11,2) DEFAULT '0.00' COMMENT '见点奖',
  `refereemoney` decimal(11,2) DEFAULT '0.00' COMMENT '直荐奖',
  `floormoney` decimal(11,2) DEFAULT '0.00' COMMENT '层奖',
  `__money` decimal(11,2) DEFAULT '0.00' COMMENT '对碰奖',
  `leadmoney` decimal(11,2) DEFAULT '0.00' COMMENT '团队奖',
  `regmoney` decimal(11,2) DEFAULT '0.00' COMMENT '报单奖',
  `atmmoney` decimal(11,2) DEFAULT '0.00' COMMENT '会员提现',
  `atmmoneyed` decimal(11,2) DEFAULT '0.00',
  `addtime` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `otherin` decimal(11,2) DEFAULT '0.00' COMMENT '其他收入',
  `otherout` decimal(11,2) DEFAULT '0.00' COMMENT '其他支出',
  `ordermoney` decimal(11,2) DEFAULT '0.00' COMMENT '订货总额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sinbegin_records
-- ----------------------------
INSERT INTO `sinbegin_records` VALUES ('1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1490112000', '20', '0.00', '0.00', '0.00');

-- ----------------------------
-- Table structure for sinbegin_shopcart
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_shopcart`;
CREATE TABLE `sinbegin_shopcart` (
  `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `uid` varchar(10) NOT NULL DEFAULT 'null' COMMENT '购买用户id',
  `goods_id` int(10) NOT NULL DEFAULT '0' COMMENT '产品id',
  `goods_number` int(5) NOT NULL DEFAULT '1' COMMENT '购买数量',
  `goods_money` decimal(11,2) DEFAULT '0.00',
  `cookieid` varchar(255) DEFAULT '',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of sinbegin_shopcart
-- ----------------------------

-- ----------------------------
-- Table structure for sinbegin_shop_group
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_shop_group`;
CREATE TABLE `sinbegin_shop_group` (
  `goodid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `minimum` int(11) NOT NULL,
  `rebate` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `share_money` int(11) DEFAULT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`groupid`,`goodid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sinbegin_shop_group
-- ----------------------------
INSERT INTO `sinbegin_shop_group` VALUES ('9', '7', '176', '0', '2000', '1400', '1489993794', '44850');
INSERT INTO `sinbegin_shop_group` VALUES ('9', '8', '19', '1800', '1500', '1000', '1489993648', '44850');
INSERT INTO `sinbegin_shop_group` VALUES ('9', '9', '6', '1500', '1200', '800', '1489993648', '44850');
INSERT INTO `sinbegin_shop_group` VALUES ('9', '10', '58', '0', '1800', '1200', '1489993648', '44850');
INSERT INTO `sinbegin_shop_group` VALUES ('9', '11', '1', '0', '0', '0', '1489993648', '44850');

-- ----------------------------
-- Table structure for sinbegin_user
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_user`;
CREATE TABLE `sinbegin_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `repass` varchar(255) DEFAULT NULL COMMENT '支付密码',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `userphone` varchar(50) DEFAULT '' COMMENT '联系电话',
  `mtime` int(11) DEFAULT NULL,
  `msalt` int(11) DEFAULT NULL,
  `mcheck` int(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `truename` varchar(50) DEFAULT NULL COMMENT '姓名',
  `forgotpassword` varchar(32) DEFAULT NULL COMMENT '找回密码',
  `status` int(1) DEFAULT '1' COMMENT '用户状态',
  `salt` varchar(8) NOT NULL DEFAULT '' COMMENT '密码前缀',
  `groupid` int(1) DEFAULT NULL COMMENT '用户组ID',
  `regip` varchar(20) DEFAULT '' COMMENT '注册IP',
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '注册邮箱',
  `echeck` int(1) DEFAULT NULL COMMENT '邮箱是否验证',
  `authemail` varchar(32) DEFAULT '',
  `opentime` int(11) DEFAULT '0' COMMENT '开通时间',
  `regtime` int(11) DEFAULT NULL COMMENT '免费注册时间',
  `lasttime` int(11) DEFAULT NULL COMMENT '登录时间',
  `lastip` varchar(20) DEFAULT '' COMMENT '登陆IP',
  `referee` varchar(50) DEFAULT '' COMMENT '直接上线',
  `canlogin` int(1) DEFAULT '1' COMMENT '可否登陆',
  `reguser` int(11) DEFAULT '0',
  `locktime` varchar(20) DEFAULT '',
  `newphone` varchar(11) DEFAULT '',
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `county` varchar(100) DEFAULT '',
  `idcard` varchar(50) NOT NULL,
  `qq` varchar(50) NOT NULL,
  `rebate` int(11) NOT NULL DEFAULT '0',
  `share_money` int(11) NOT NULL DEFAULT '0',
  `bonus` int(11) NOT NULL DEFAULT '0',
  `refereeid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_user
-- ----------------------------
INSERT INTO `sinbegin_user` VALUES ('18', 'wangyang', '444e581eedb4a5a082315553c212a3d5', '444e581eedb4a5a082315553c212a3d5', '9', '18834814403', null, null, null, '榆次区万科朗润园A5-17F', '王洋', null, '1', 'f2e9e7', '7', '127.0.0.1', '', null, '', '1490157631', '1490157631', '1490321340', '127.0.0.1', 'admin', '1', '0', '', '', null, null, '', '140311199210170620', '', '0', '0', '0', '0');
INSERT INTO `sinbegin_user` VALUES ('19', 'helibo', '7ea08bce04ad766510de6a200ff70976', '7ea08bce04ad766510de6a200ff70976', '0', '18834810400', null, null, null, '榆次区万科朗润园A5-17F', '何立波', null, '0', '125d6d', '7', '127.0.0.1', '', null, '', '1490173521', '1490173521', null, '', '', '1', '0', '', '', null, null, '', '140311199210170620', '', '0', '0', '0', '0');
INSERT INTO `sinbegin_user` VALUES ('20', 'wangyang1', '8cb328fe73059e02828adf489dc8d3b2', '8cb328fe73059e02828adf489dc8d3b2', '3', '18834810400', null, null, null, '', 'wangyang', null, '1', 'c76dc6', '7', '127.0.0.1', '23305972@qq.com', null, '', '1490173644', '1490173644', '1490249730', '127.0.0.1', 'wangyang', '1', '0', '', '', null, null, '', '140311199210170620', '18834814403', '0', '0', '0', '18');
INSERT INTO `sinbegin_user` VALUES ('21', 'wangyang2', 'bd79daf29733c2e9c14eb29218ffeb49', 'bd79daf29733c2e9c14eb29218ffeb49', '3', '18834810400', null, null, null, '', 'wangyang', null, '1', '865abc', '11', '127.0.0.1', '23305972@qq.com', null, '', '1490173992', '1490173992', '1490320348', '192.168.3.47', 'wangyang', '1', '0', '', '', null, null, '', '140311199210170620', '2333', '0', '0', '0', '18');
INSERT INTO `sinbegin_user` VALUES ('22', 'wangyang3', '94789c7faad73fcbe046d752fcf8a6c1', '94789c7faad73fcbe046d752fcf8a6c1', '0', '18834810400', null, null, null, '', 'wangyang', null, '1', 'd984b8', '6', '127.0.0.1', '23305972@qq.com', null, '', '1490174577', '1490174541', null, '', 'wangyang', '1', '0', '', '', null, null, '', '140311199210170620', '2333', '0', '0', '0', '18');
INSERT INTO `sinbegin_user` VALUES ('23', 'wangyang21', 'f31d20f7ef3e40243bed562af7013208', 'f31d20f7ef3e40243bed562af7013208', '3', '18834810400', null, null, null, '', 'wangyang', null, '1', '144529', '6', '127.0.0.1', '23305972@qq.com', null, '', '1490337027', '1490235825', '1490343809', '127.0.0.1', 'wangyang2', '1', '0', '', '', null, null, '', '140311199210170620', '2333', '0', '0', '0', '21');
INSERT INTO `sinbegin_user` VALUES ('24', 'supersoul', '554338f3067262d2875934c30fbec76c', '46bd8580cf6d7489e85ff414b5e7e286', '1', '18216269979', null, null, null, '', '何立波', null, '1', 'ee110b', '11', '192.168.3.47', '', null, '', '1490321806', '1490321806', '1490322077', '192.168.3.47', 'wangyang2', '1', '0', '', '', null, null, '', '', '', '0', '0', '0', '0');
INSERT INTO `sinbegin_user` VALUES ('25', 'supersoul1', '77fe2894e87199fbf978741d587a0589', 'c72eeb4270669dbeb4058a442d5b26c6', '0', '15321421411', null, null, null, '', '和某某', null, '1', 'f364dd', '6', '192.168.3.47', '', null, '', '1490321951', '1490321951', null, '', 'wangyang', '1', '0', '', '', null, null, '', '', '', '0', '0', '0', '0');
INSERT INTO `sinbegin_user` VALUES ('26', 'supersoul2', 'bcdeb2a44b0e0c78a53df4ffa449c314', 'cf6321943fcb24b02ba9d3d5dada1ec2', '0', '15333334444', null, null, null, '', '网么偶', null, '1', '835052', '6', '192.168.3.47', '', null, '', '1490322008', '1490322008', null, '', 'wangyang', '1', '0', '', '', null, null, '', '', '', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for sinbegin_usergroup
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_usergroup`;
CREATE TABLE `sinbegin_usergroup` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(30) NOT NULL DEFAULT '' COMMENT '级别名称',
  `level_number` int(11) DEFAULT '0' COMMENT '级别数量',
  `children_num` int(11) DEFAULT '0' COMMENT '直荐多少人可以升级为该会员',
  `purviews` mediumtext COMMENT '权限',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '级别顺序',
  `buy_way` tinyint(4) NOT NULL DEFAULT '0' COMMENT '进货方式(0代理 ，1总部)',
  `is_agents` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否代理（1是，0不是）',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sinbegin_usergroup
-- ----------------------------
INSERT INTO `sinbegin_usergroup` VALUES ('6', '会员', '0', '0', 'member_treeform_arrange,member_treeform_record,member_treeform_referee,member_treeform_register,member_treeform_upgroup,member_capital_list,member_user_password,member_user_profile,member_user_authemail,member_user_address,member_user_authphone,member_user_bankinfo,member_main_index,member_notice_,member_imessage_,member_goods_list,member_goods_order', '6', '0', '0');
INSERT INTO `sinbegin_usergroup` VALUES ('7', '股东', '1000', '3', 'member_treeform_arrange,member_treeform_record,member_treeform_referee,member_treeform_register,member_treeform_upgroup,member_capital_list,member_user_password,member_user_profile,member_user_authemail,member_user_address,member_user_authphone,member_main_index,member_notice_,member_imessage_,member_goods_list,member_goods_order,member_goods_sendorder', '1', '1', '1');
INSERT INTO `sinbegin_usergroup` VALUES ('8', '总代理', '800', '3', 'member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone', '3', '1', '1');
INSERT INTO `sinbegin_usergroup` VALUES ('9', '城市总代', '600', '5', 'member_treeform_arrange,member_treeform_record,member_treeform_referee,member_treeform_register,member_treeform_upgroup,member_capital_list,member_user_password,member_user_profile,member_user_authemail,member_user_address,member_user_authphone,member_main_index,member_notice_,member_imessage_,member_goods_list,member_goods_order', '4', '1', '1');
INSERT INTO `sinbegin_usergroup` VALUES ('10', '合伙人', '0', '3', 'member_treeform_arrange,member_treeform_record,member_treeform_referee,member_treeform_register,member_treeform_upgroup,member_capital_list,member_user_password,member_user_profile,member_user_authemail,member_user_address,member_user_authphone,member_main_index,member_notice_,member_imessage_,member_goods_list,member_goods_order', '2', '1', '1');
INSERT INTO `sinbegin_usergroup` VALUES ('11', '一级代理', '0', '0', 'member_treeform_arrange,member_treeform_record,member_treeform_referee,member_treeform_register,member_treeform_upgroup,member_capital_list,member_user_password,member_user_profile,member_user_authemail,member_user_address,member_user_authphone,member_user_bankinfo,member_main_index,member_notice_,member_imessage_,member_goods_list,member_goods_order,member_goods_sendorder', '5', '0', '1');
SET FOREIGN_KEY_CHECKS=1;
