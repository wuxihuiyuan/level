<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_atmbank`;");
$this->mysql->query("CREATE TABLE `sinbegin_atmbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `truename` varchar(50) DEFAULT '',
  `bankname` varchar(50) DEFAULT '0' COMMENT '银行名称',
  `bankcard` varchar(50) DEFAULT '0',
  `bankadd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_atmbank` values('1','1','系统会员','工商银行','62222502003569392','昆明市碧鸡路支行');");
?>