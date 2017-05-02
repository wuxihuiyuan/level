<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_manager`;");
$this->mysql->query("CREATE TABLE `sinbegin_manager` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `salt` varchar(8) NOT NULL DEFAULT '' COMMENT '密码前缀',
  `lasttime` int(11) DEFAULT NULL COMMENT '登录时间',
  `lastip` varchar(20) DEFAULT '' COMMENT '登陆IP',
  `groupid` int(11) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_manager` values('1','admin','e120dae791fe8c7b5652f8933078b3ee','12','994c61','1477389450','127.0.0.1','1');");
$this->mysql->query("replace into `sinbegin_manager` values('4','system','71273c25c1f4cd846743a2c418ca603e','2','2354ed','1413902195','106.37.236.229','3');");
?>