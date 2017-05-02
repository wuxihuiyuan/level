<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_order`;");
$this->mysql->query("CREATE TABLE `sinbegin_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT NULL,
  `express` varchar(20) DEFAULT '',
  `expressnumber` varchar(200) DEFAULT '',
  `message` mediumtext,
  `checked` int(1) DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `goods` mediumtext,
  `margin` decimal(11,2) DEFAULT '0.00',
  `money` decimal(11,2) DEFAULT '0.00',
  `price` decimal(11,2) DEFAULT '0.00',
  `delivery` varchar(1000) DEFAULT '',
  `ftime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
?>