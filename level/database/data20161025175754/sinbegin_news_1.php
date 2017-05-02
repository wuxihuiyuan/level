<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_news`;");
$this->mysql->query("CREATE TABLE `sinbegin_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `addtime` int(11) DEFAULT NULL,
  `content` mediumtext,
  `clicknumber` int(11) DEFAULT '0' COMMENT '浏览次数',
  `typeid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
?>