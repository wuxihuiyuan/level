<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_money`;");
$this->mysql->query("CREATE TABLE `sinbegin_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(11,2) DEFAULT '0.00',
  `addtime` varchar(10) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
?>