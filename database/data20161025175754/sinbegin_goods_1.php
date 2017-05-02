<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_goods`;");
$this->mysql->query("CREATE TABLE `sinbegin_goods` (
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
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_goods` values('1','爱真情10金币卡','0','0.00','10.00','0.00','0.00','0.00','<p>\n	爱真情10金币卡，请登陆<a href=\"http://www.izhenqing.com\">http://www.izhenqing.com</a> 进行充值！\n</p>','/upload/goods/2014-04-09/20140409191953662.jpg','0.00','1397042395','1','0.00','1000','0');");
$this->mysql->query("replace into `sinbegin_goods` values('2','爱真情50金币卡','0','0.00','50.00','0.00','0.00','0.00','<p>\n	爱真情50金币卡，请登陆<a href=\"http://www.izhenqing.com/\">http://www.izhenqing.com</a> 进行充值！\n</p>\n<br class=\"img-brk\" />','/upload/goods/2014-04-09/20140409192336797.jpg','0.00','1397042617','1','0.00','1000','0');");
$this->mysql->query("replace into `sinbegin_goods` values('3','爱真情100金币卡','0','0.00','100.00','0.00','0.00','0.00','<p>\n	&nbsp;\n</p>\n<p style=\"text-align:left;color:#333333;text-indent:0px;background-color:#FFFFFF;\">\n	<span style=\"color:#FF00FF;\"><strong><span style=\"font-size:24pt;\"><span style=\"font-size:14px;\">爱真情</span><span style=\"font-size:14px;\">100</span><span style=\"font-size:14px;\">金币卡，请登陆爱真情</span><span style=\"font-size:14px;\">网站</span><a href=\"http://www.izhenqing.com/\"><span style=\"font-size:14px;\">http://www.izhenqing.com</span></a><span style=\"font-size:14px;\"> 进行充值！</span></span></strong></span>\n</p>','/upload/goods/2014-04-09/20140409193037887.jpg','0.00','1397043043','1','0.00','1000','0');");
$this->mysql->query("replace into `sinbegin_goods` values('4','爱真情200金币卡','0','0.00','200.00','0.00','0.00','0.00','<p style=\"text-align:left;color:#333333;text-indent:0px;background-color:#FFFFFF;\">\n	<span style=\"color:#FF00FF;\"><strong><span style=\"font-size:24pt;\"><span style=\"font-size:14px;\">爱真情</span><span style=\"font-size:14px;\">100</span><span style=\"font-size:14px;\">金币卡，请登陆爱真情</span><span style=\"font-size:14px;\">网站</span><a href=\"http://www.izhenqing.com\"><span style=\"font-size:14px;\">http://www.izhenqing.com</span></a><span style=\"font-size:14px;\"> 进行充值！</span></span></strong></span>\n</p>','/upload/goods/2014-04-10/20140410221212620.jpg','0.00','1397139175','1','0.00','1000','0');");
$this->mysql->query("replace into `sinbegin_goods` values('5','爱真情500金币卡','0','0.00','500.00','0.00','0.00','0.00','<p style=\"text-align:left;color:#333333;text-indent:0px;background-color:#FFFFFF;\">\n	<span style=\"color:#FF00FF;\"><strong><span style=\"font-size:24pt;\"><span style=\"font-size:14px;\">爱真情</span><span style=\"font-size:14px;\">500</span><span style=\"font-size:14px;\">金币卡，请登陆爱真情</span><span style=\"font-size:14px;\">网站</span><a href=\"http://www.izhenqing.com/\"><span style=\"font-size:14px;\">http://www.izhenqing.com</span></a><span style=\"font-size:14px;\"> 进行充值！</span></span></strong></span>\n</p>\n<p>\n	&nbsp;\n</p>','/upload/goods/2014-04-10/20140410222233149.jpg','0.00','1397139759','1','0.00','1000','0');");
$this->mysql->query("replace into `sinbegin_goods` values('6','爱真情2000金币卡','0','0.00','2000.00','0.00','0.00','0.00','爱真情100金币卡，请登陆爱真情网站<a href=\"http://www.izhenqing.com\">http://www.izhenqing.com</a> 进行充值！','/upload/goods/2014-09-05/20140905001411125.jpg','0.00','1409847259','1','0.00','1000','0');");
$this->mysql->query("replace into `sinbegin_goods` values('7','爱真情5000金币卡','0','0.00','5000.00','0.00','0.00','0.00','爱真情5000金币卡，请登陆爱真情网站<a href=\"http://www.izhenqing.com\">http://www.izhenqing.com</a> 进行充值！','/upload/goods/2014-09-05/20140905001509252.jpg','0.00','1409847315','1','0.00','1000','0');");
$this->mysql->query("replace into `sinbegin_goods` values('8','爱真情1000金币卡','0','0.00','1000.00','0.00','0.00','0.00','<span>\n<p style=\"text-align:left;color:#333333;text-indent:0px;background-color:#FFFFFF;\">\n	<span style=\"color:#FF00FF;\"><strong><span style=\"font-size:24pt;\"><span style=\"font-size:14px;\">爱真情</span><span style=\"font-size:14px;\">1000</span><span style=\"font-size:14px;\">金币卡，请登陆爱真情</span><span style=\"font-size:14px;\">网站</span><a href=\"http://www.izhenqing.com/\"><span style=\"font-size:14px;\">http://www.izhenqing.com</span></a><span style=\"font-size:14px;\"> 进行充值！</span></span></strong></span>\n</p>\n</span>','/upload/goods/2014-06-08/20140608164341500.jpg','0.00','1397140413','1','0.00','1000','0');");
?>