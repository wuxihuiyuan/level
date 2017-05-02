<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_message`;");
$this->mysql->query("CREATE TABLE `sinbegin_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '' COMMENT '信件主题',
  `content` mediumtext COMMENT '信件内容',
  `uid` int(11) DEFAULT '0' COMMENT '邮件会员',
  `parentid` int(11) DEFAULT '0' COMMENT '父邮件',
  `addtime` int(11) DEFAULT '0' COMMENT '发收时间',
  `type` int(1) DEFAULT '0' COMMENT '发收状态',
  `checked` int(1) DEFAULT '0' COMMENT '是否已读',
  `isdel` int(1) DEFAULT '0' COMMENT '会员是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限资源码'");
?>