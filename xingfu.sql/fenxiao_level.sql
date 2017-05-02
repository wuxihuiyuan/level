/*
Navicat MySQL Data Transfer

Source Server         : huiyuan
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : fenxiao_level

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-04-21 11:12:16
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
  `is_default` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sinbegin_category
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_category`;
CREATE TABLE `sinbegin_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `addtime` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sinbegin_earning
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_earning`;
CREATE TABLE `sinbegin_earning` (
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
-- Table structure for sinbegin_earning_log
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_earning_log`;
CREATE TABLE `sinbegin_earning_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `oid` varchar(256) DEFAULT NULL,
  `addtime` int(11) NOT NULL,
  `num` int(11) DEFAULT NULL,
  `jid` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL,
  `share_money` int(11) NOT NULL DEFAULT '0',
  `up_bonus` int(11) NOT NULL DEFAULT '0',
  `rebate` int(11) NOT NULL DEFAULT '0',
  `unblock` tinyint(4) NOT NULL DEFAULT '0',
  `bonus` int(11) NOT NULL DEFAULT '0' COMMENT '提成',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for sinbegin_goods
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_goods`;
CREATE TABLE `sinbegin_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `agent_price` int(11) NOT NULL DEFAULT '0',
  `mk_price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '销售价格',
  `goods_desc` text NOT NULL COMMENT '产品说明',
  `goods_thumb` mediumtext NOT NULL COMMENT '产品图片',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `ischeck` tinyint(1) unsigned DEFAULT '1' COMMENT '是否上架',
  `shipping` decimal(11,2) DEFAULT '0.00' COMMENT '运费',
  `tg_price` varchar(255) DEFAULT '' COMMENT '团购价',
  `unit_rate` int(11) DEFAULT '0',
  `point` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `ding_rate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`,`addtime`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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
-- Table structure for sinbegin_jfgoods
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_jfgoods`;
CREATE TABLE `sinbegin_jfgoods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '市场价',
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
  `stock` int(11) DEFAULT '0' COMMENT '商品库存',
  `sale` int(11) DEFAULT '0' COMMENT '商品销售量',
  `point_rate` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sinbegin_jflog
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_jflog`;
CREATE TABLE `sinbegin_jflog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `lognum` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `addtime` int(11) DEFAULT NULL COMMENT '产生时间',
  `typeid` int(1) DEFAULT '1',
  `balance` decimal(11,2) DEFAULT '0.00',
  `parentid` int(11) DEFAULT '0',
  `type` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for sinbegin_jforder
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_jforder`;
CREATE TABLE `sinbegin_jforder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT NULL,
  `express` varchar(20) DEFAULT '',
  `expressnumber` varchar(200) DEFAULT '',
  `message` mediumtext,
  `checked` int(1) DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `goods` mediumtext,
  `margin` int(11) DEFAULT '0',
  `money` int(11) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `delivery` varchar(1000) DEFAULT '',
  `ftime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sinbegin_log
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_log`;
CREATE TABLE `sinbegin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `lognum` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `addtime` int(11) DEFAULT NULL COMMENT '产生时间',
  `typeid` int(1) DEFAULT '1',
  `balance` decimal(11,2) DEFAULT '0.00',
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
  `good_name` varchar(256) DEFAULT NULL,
  `margin` decimal(11,2) DEFAULT '0.00',
  `delivery` varchar(1000) DEFAULT '',
  `ftime` int(11) DEFAULT '0',
  `mincode` varchar(255) DEFAULT NULL,
  `maxcode` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT '0' COMMENT '一箱总价',
  `money` int(11) DEFAULT '0' COMMENT '剩余比例付款金额',
  `re_money` int(11) DEFAULT '0' COMMENT '实际支付金额',
  `refereeid` int(11) DEFAULT '0',
  `express` varchar(255) DEFAULT NULL,
  `expressnumber` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `father_confirm` tinyint(4) NOT NULL DEFAULT '0',
  `rate` int(11) DEFAULT NULL COMMENT '剩余比例',
  `goods_id` int(11) DEFAULT '0',
  `bonus` int(11) DEFAULT NULL,
  `yi_money` int(11) DEFAULT '0',
  `reason` mediumtext,
  `checkid` int(11) NOT NULL DEFAULT '0' COMMENT '检验库存id',
  `agent_img` mediumtext NOT NULL,
  `huiyuan_img` mediumtext NOT NULL COMMENT '支付凭证图片',
  `send_type` varchar(11) DEFAULT '',
  `point` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=274 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='权限资源码';

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
  `addtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `up_bonus` int(11) DEFAULT NULL,
  `buy_way` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupid`,`goodid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for sinbegin_store
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_store`;
CREATE TABLE `sinbegin_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `store` int(11) NOT NULL DEFAULT '0',
  `goods_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `ding_price` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `huiyuan_img` mediumtext NOT NULL COMMENT '支付凭证',
  `refereeid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for sinbegin_storelog
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_storelog`;
CREATE TABLE `sinbegin_storelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `num` int(11) NOT NULL,
  `addtime` int(11) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `oid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `confirm_type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4;

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
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `truename` varchar(50) DEFAULT NULL COMMENT '姓名',
  `forgotpassword` varchar(32) DEFAULT NULL COMMENT '找回密码',
  `salt` varchar(8) NOT NULL DEFAULT '' COMMENT '密码前缀',
  `groupid` int(1) DEFAULT NULL COMMENT '用户组ID',
  `regip` varchar(20) DEFAULT '' COMMENT '注册IP',
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '注册邮箱',
  `authemail` varchar(32) DEFAULT '',
  `opentime` int(11) DEFAULT '0' COMMENT '开通时间',
  `regtime` int(11) DEFAULT NULL COMMENT '免费注册时间',
  `lasttime` int(11) DEFAULT NULL COMMENT '登录时间',
  `lastip` varchar(20) DEFAULT '' COMMENT '登陆IP',
  `referee` varchar(50) DEFAULT '' COMMENT '直接上线',
  `canlogin` int(1) DEFAULT '1' COMMENT '可否登陆',
  `locktime` varchar(20) DEFAULT '',
  `newphone` varchar(11) DEFAULT '',
  `idcard` varchar(50) NOT NULL,
  `qq` varchar(50) NOT NULL,
  `rebate` int(11) NOT NULL DEFAULT '0',
  `share_money` int(11) NOT NULL DEFAULT '0',
  `bonus` int(11) NOT NULL DEFAULT '0',
  `refereeid` int(11) NOT NULL DEFAULT '0',
  `treeids` varchar(256) DEFAULT '',
  `new_num` int(11) DEFAULT '0',
  `store` int(11) DEFAULT '0',
  `point` int(11) DEFAULT '0',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '现金',
  `is_new` tinyint(4) NOT NULL DEFAULT '0',
  `is_zhsbonus` tinyint(4) DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `is_adminchild` tinyint(4) NOT NULL DEFAULT '0',
  `status` int(1) DEFAULT '0' COMMENT '用户状态',
  `sales_num` int(11) NOT NULL DEFAULT '0',
  `good_point` int(11) NOT NULL DEFAULT '0' COMMENT '商品积分',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sinbegin_usergroup
-- ----------------------------
DROP TABLE IF EXISTS `sinbegin_usergroup`;
CREATE TABLE `sinbegin_usergroup` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(30) NOT NULL DEFAULT '' COMMENT '级别名称',
  `point` int(11) DEFAULT '0' COMMENT '级别数量',
  `purviews` mediumtext COMMENT '权限',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '级别顺序',
  `buy_way` tinyint(4) NOT NULL DEFAULT '0' COMMENT '进货方式(0代理 ，1总部)',
  `is_agents` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否代理（1是，0不是）',
  `children_num` int(11) NOT NULL DEFAULT '0',
  `rebate` int(11) DEFAULT '0' COMMENT '积分商城折扣',
  `sales_num` int(11) NOT NULL DEFAULT '0' COMMENT '销货数量',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;

-- ----------------------------
-- Records of sinbegin_manager
-- ----------------------------
INSERT INTO `sinbegin_manager` VALUES ('1', 'admin', 'e120dae791fe8c7b5652f8933078b3ee', '62', '994c61', '1492737257', '192.168.3.14', '1');
INSERT INTO `sinbegin_manager` VALUES ('4', 'system', '71273c25c1f4cd846743a2c418ca603e', '2', '2354ed', '1413902195', '106.37.236.229', '3');
SET FOREIGN_KEY_CHECKS=1;


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
INSERT INTO `sinbegin_purviews` VALUES ('47', '[产品中心]销量日志', 'member_goods_saleslog', '0', 'goods', '10047');
INSERT INTO `sinbegin_purviews` VALUES ('39', '[账户设置]银行卡管理', 'member_user_bankinfo', '0', 'user', '10039');
INSERT INTO `sinbegin_purviews` VALUES ('40', '[订货管理]商品订货', 'member_store_detail', '0', 'store', '10040');
INSERT INTO `sinbegin_purviews` VALUES ('41', '[订货管理]我的订货', 'member_store_list', '0', 'store', '10041');
INSERT INTO `sinbegin_purviews` VALUES ('42', '[订货管理]下级订货', 'member_store_childlist', '0', 'store', '10042');
INSERT INTO `sinbegin_purviews` VALUES ('44', '[积分商城]商城首页', 'member_jfgoods_index', '0', 'jfgoods', '10045');
INSERT INTO `sinbegin_purviews` VALUES ('43', '[积分商城]积分产品', 'member_jfgoods_list', '0', 'jfgoods', '10043');
INSERT INTO `sinbegin_purviews` VALUES ('45', '[积分商城]我的订单', 'member_jfgoods_order', '0', 'jfgoods', '10044');
INSERT INTO `sinbegin_purviews` VALUES ('46', '[积分商城]积分明细', 'member_jfgoods_capital', '0', 'jfgoods', '10046');
SET FOREIGN_KEY_CHECKS=1;


-- ----------------------------
-- Records of sinbegin_group
-- ----------------------------
INSERT INTO `sinbegin_group` VALUES ('1', '超级管理员', '1', 'adminall');
INSERT INTO `sinbegin_group` VALUES ('2', '普通管理员', '0', 'admin_user_control,admin_user_group,admin_user_customs,admin_site_news,admin_site_about');
INSERT INTO `sinbegin_group` VALUES ('3', '系统管理员', '0', 'admin_census_payorder,admin_census_atmlog,admin_census_money,admin_main_system,admin_main_config,admin_main_guestbook,admin_main_database,admin_manager_control,admin_manager_group,admin_manager_password,admin_user_control,admin_user_group,admin_user_customs,admin_site_news,admin_site_about');
SET FOREIGN_KEY_CHECKS=1;