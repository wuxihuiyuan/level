<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_delivery`;");
$this->mysql->query("CREATE TABLE `sinbegin_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `mobile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
?>