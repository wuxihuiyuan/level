<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_abouttype`;");
$this->mysql->query("CREATE TABLE `sinbegin_abouttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) DEFAULT '',
  `typeorder` int(2) DEFAULT NULL,
  `is_show` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_abouttype` values('1','商品问题','2','1');");
$this->mysql->query("replace into `sinbegin_abouttype` values('2','关于我们','3','1');");
$this->mysql->query("replace into `sinbegin_abouttype` values('3','帮助中心','1','1');");
?>