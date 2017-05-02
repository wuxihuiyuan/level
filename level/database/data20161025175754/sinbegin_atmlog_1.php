<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_atmlog`;");
$this->mysql->query("CREATE TABLE `sinbegin_atmlog` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
?>