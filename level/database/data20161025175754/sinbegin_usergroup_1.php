<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_usergroup`;");
$this->mysql->query("CREATE TABLE `sinbegin_usergroup` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(30) NOT NULL DEFAULT '',
  `buymoney` varchar(11) DEFAULT '0' COMMENT '进单价格',
  `refereemoney` varchar(20) DEFAULT '' COMMENT '直推奖励',
  `floormoney` varchar(100) DEFAULT '0' COMMENT '层奖',
  `floorask` mediumtext COMMENT '层奖要求',
  `money` varchar(50) DEFAULT '' COMMENT '静态奖',
  `atmscale` varchar(20) DEFAULT '0' COMMENT '提现手续',
  `referee` int(11) DEFAULT '0' COMMENT '直荐多少人可以升级为该会员',
  `rebate` varchar(5) DEFAULT '1' COMMENT '订货折扣',
  `maxmoney` decimal(11,2) DEFAULT '0.00' COMMENT '静态奖封顶',
  `_money` decimal(11,2) DEFAULT '0.00' COMMENT '见点奖',
  `_floor` int(11) DEFAULT '0' COMMENT '见点奖层数',
  `__money` varchar(5) DEFAULT '0' COMMENT '对碰比例',
  `__maxmoney` decimal(11,2) DEFAULT '0.00' COMMENT '对碰日封顶',
  `leadask` mediumtext COMMENT '团队奖要求',
  `leadmoney` varchar(5) DEFAULT '0' COMMENT '团队奖',
  `purviews` mediumtext COMMENT '权限',
  `uprefereemoney` varchar(5) DEFAULT '0' COMMENT '升级的直荐奖',
  `shopmoney` varchar(5) DEFAULT '' COMMENT '重复消费',
  `regmoney` varchar(5) DEFAULT '0' COMMENT '服务中心',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_usergroup` values('1','铜牌会员','100','20%','5,3,2,2,2,2,2,2,2,2,2,2,2,2','a:5:{i:1;s:1:\"6\";i:2;s:1:\"8\";i:3;s:2:\"10\";i:4;s:2:\"12\";i:5;s:2:\"14\";}','0','800后4%','0','0.98','0.00','0.00','0','0','0.00',NULL,'0','member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone','0','','5%');");
$this->mysql->query("replace into `sinbegin_usergroup` values('2','银牌会员','300','22%','6,3,2,2,2,2,2,2,2,2,2,2,2,2','a:5:{i:1;s:1:\"6\";i:2;s:1:\"8\";i:3;s:2:\"10\";i:4;s:2:\"12\";i:5;s:2:\"14\";}','0','800后4%','0','0.95','0.00','0.00','0','0','0.00',NULL,'0','member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone','0.1','','6%');");
$this->mysql->query("replace into `sinbegin_usergroup` values('3','金牌会员','800','25%','8,3,2,2,2,2,2,2,2,2,2,2,2,2','a:5:{i:1;s:1:\"6\";i:2;s:1:\"8\";i:3;s:2:\"10\";i:4;s:2:\"12\";i:5;s:2:\"14\";}','8单1%','800后4%','0','0.90','0.00','0.00','0','0','0.00',NULL,'0','member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone','0.1','','7%');");
$this->mysql->query("replace into `sinbegin_usergroup` values('4','钻石会员','2000','27%','10,3,2,2,2,2,2,2,2,2,2,2,2,2','a:5:{i:1;s:1:\"6\";i:2;s:1:\"8\";i:3;s:2:\"10\";i:4;s:2:\"12\";i:5;s:2:\"14\";}','20单3%','800后4%','0','0.85','0.00','0.00','0','0','0.00',NULL,'0','member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone','0.1','','10%');");
$this->mysql->query("replace into `sinbegin_usergroup` values('5','合作伙伴','5000','30%','15,3,2,2,2,2,2,2,2,2,2,2,2,2','a:5:{i:1;s:1:\"6\";i:2;s:1:\"8\";i:3;s:2:\"10\";i:4;s:2:\"12\";i:5;s:2:\"14\";}','50单4%','800后4%','0','0.80','0.00','0.00','0','0','0.00',NULL,'0','member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone','0.1','','15%');");
?>