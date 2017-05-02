<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_newstype`;");
$this->mysql->query("CREATE TABLE `sinbegin_newstype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) DEFAULT '',
  `typeorder` int(2) DEFAULT NULL,
  `system` int(1) DEFAULT '0' COMMENT '是否系统公告',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_newstype` values('1','内部公告','0','1');");
$this->mysql->query("replace into `sinbegin_newstype` values('2','行业新闻','1','1');");
?>