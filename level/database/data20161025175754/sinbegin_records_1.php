<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_records`;");
$this->mysql->query("CREATE TABLE `sinbegin_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_paymoney` decimal(11,2) DEFAULT '0.00' COMMENT '管理员充值',
  `paymoney` decimal(11,2) DEFAULT '0.00' COMMENT '在线充值',
  `buymoney` decimal(11,2) DEFAULT '0.00' COMMENT '进单总额',
  `upgroup` decimal(11,2) DEFAULT '0.00' COMMENT '升级进单额',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '静态奖',
  `_money` decimal(11,2) DEFAULT '0.00' COMMENT '见点奖',
  `refereemoney` decimal(11,2) DEFAULT '0.00' COMMENT '直荐奖',
  `floormoney` decimal(11,2) DEFAULT '0.00' COMMENT '层奖',
  `__money` decimal(11,2) DEFAULT '0.00' COMMENT '对碰奖',
  `leadmoney` decimal(11,2) DEFAULT '0.00' COMMENT '团队奖',
  `regmoney` decimal(11,2) DEFAULT '0.00' COMMENT '报单奖',
  `atmmoney` decimal(11,2) DEFAULT '0.00' COMMENT '会员提现',
  `atmmoneyed` decimal(11,2) DEFAULT '0.00',
  `addtime` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `otherin` decimal(11,2) DEFAULT '0.00' COMMENT '其他收入',
  `otherout` decimal(11,2) DEFAULT '0.00' COMMENT '其他支出',
  `ordermoney` decimal(11,2) DEFAULT '0.00' COMMENT '订货总额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC");
?>