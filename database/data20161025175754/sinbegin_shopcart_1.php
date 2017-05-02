<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_shopcart`;");
$this->mysql->query("CREATE TABLE `sinbegin_shopcart` (
  `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `uid` varchar(10) NOT NULL DEFAULT 'null' COMMENT '购买用户id',
  `goods_id` int(10) NOT NULL DEFAULT '0' COMMENT '产品id',
  `goods_number` int(5) NOT NULL DEFAULT '1' COMMENT '购买数量',
  `goods_money` decimal(11,2) DEFAULT '0.00',
  `cookieid` varchar(255) DEFAULT '',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED");
?>