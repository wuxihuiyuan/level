<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_payorder`;");
$this->mysql->query("CREATE TABLE `sinbegin_payorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT NULL,
  `total_fee` decimal(11,2) DEFAULT '0.00',
  `checked` int(1) DEFAULT NULL,
  `paytype` varchar(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_payorder` values('1','201411010518582820','100.00','0','网银在线','1','1414833538');");
$this->mysql->query("replace into `sinbegin_payorder` values('2','201411010519237957','100.00','0','网银在线','1','1414833563');");
?>