<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_log`;");
$this->mysql->query("CREATE TABLE `sinbegin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `lognum` varchar(40) NOT NULL DEFAULT '',
  `addtime` int(11) DEFAULT NULL COMMENT '产生时间',
  `typeid` int(1) DEFAULT '1',
  `balance` decimal(11,2) DEFAULT '0.00',
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
?>