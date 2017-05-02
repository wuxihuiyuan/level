<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_group`;");
$this->mysql->query("CREATE TABLE `sinbegin_group` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(30) NOT NULL DEFAULT '',
  `system` smallint(1) NOT NULL DEFAULT '0',
  `purviews` mediumtext,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
$this->mysql->query("replace into `sinbegin_group` values('1','超级管理员','1','adminall');");
$this->mysql->query("replace into `sinbegin_group` values('2','普通管理员','0','admin_user_control,admin_user_group,admin_user_customs,admin_site_news,admin_site_about');");
$this->mysql->query("replace into `sinbegin_group` values('3','系统管理员','0','admin_census_payorder,admin_census_atmlog,admin_census_money,admin_main_system,admin_main_config,admin_main_guestbook,admin_main_database,admin_manager_control,admin_manager_group,admin_manager_password,admin_user_control,admin_user_group,admin_user_customs,admin_site_news,admin_site_about');");
?>