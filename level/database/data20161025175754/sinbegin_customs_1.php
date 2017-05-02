<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_customs`;");
$this->mysql->query("CREATE TABLE `sinbegin_customs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `address` varchar(255) DEFAULT NULL COMMENT '二级密码',
  `checked` int(1) DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_customs` values('1','1','全国','全国服务中心','1','1413898807');");
?>