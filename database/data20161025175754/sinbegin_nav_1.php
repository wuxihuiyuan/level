<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_nav`;");
$this->mysql->query("CREATE TABLE `sinbegin_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `type` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `ord` int(10) DEFAULT '0',
  `act` int(1) DEFAULT '1',
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_nav` values('1','人才招聘','3','?mod=about&act=main&id=job','3','5','57');");
$this->mysql->query("replace into `sinbegin_nav` values('2','社会责任','3','?mod=about&act=main&id=contact','4','5','58');");
$this->mysql->query("replace into `sinbegin_nav` values('3','合作伙伴','3','?mod=about&act=main&id=43','2','1','0');");
$this->mysql->query("replace into `sinbegin_nav` values('4','关于我们','3','?mod=about&act=main&id=aboutus','0','5','39');");
$this->mysql->query("replace into `sinbegin_nav` values('5','隐私声明','3','?mod=about&act=main&id=41','1','1','0');");
$this->mysql->query("replace into `sinbegin_nav` values('6','联系我们','3','?mod=about&act=main&id=contact','5','5','58');");
$this->mysql->query("replace into `sinbegin_nav` values('7','礼品兑换','2','?mod=credit','2','1','0');");
$this->mysql->query("replace into `sinbegin_nav` values('8','在线购物','2','?mod=goods','1','1','0');");
$this->mysql->query("replace into `sinbegin_nav` values('9','商家合作','2','?mod=about&act=main&id=50','6','5','50');");
$this->mysql->query("replace into `sinbegin_nav` values('10','网站首页','2','?mod=index&act=main','0','1','0');");
$this->mysql->query("replace into `sinbegin_nav` values('11','联系我们','2','?mod=about&act=main&id=contact','7','5','58');");
$this->mysql->query("replace into `sinbegin_nav` values('12','关于我们','2','?mod=about&act=main&id=aboutus','5','5','39');");
$this->mysql->query("replace into `sinbegin_nav` values('13','正品验证','2','?mod=about&act=main&id=54','7','5','54');");
?>