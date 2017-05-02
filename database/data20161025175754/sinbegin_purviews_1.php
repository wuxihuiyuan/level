<?php
$this->mysql->query("DROP TABLE IF EXISTS `sinbegin_purviews`;");
$this->mysql->query("CREATE TABLE `sinbegin_purviews` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '权限名字',
  `purviews` text COMMENT '权限码(控制器+动作)',
  `admin` int(1) DEFAULT '0',
  `member` varchar(20) DEFAULT '',
  `ord` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='权限资源码'");
$this->mysql->query("replace into `sinbegin_purviews` values('1','[人脉网络]会员结构','member_treeform_arrange','0','treeform','10003');");
$this->mysql->query("replace into `sinbegin_purviews` values('2','[业务管理]会员注册','member_vocational_register','0','vocational','10007');");
$this->mysql->query("replace into `sinbegin_purviews` values('3','[业务管理]报单中心','member_vocational_customs','0','vocational','10009');");
$this->mysql->query("replace into `sinbegin_purviews` values('4','[财务管理]资金明细','member_capital_list','0','capital','10011');");
$this->mysql->query("replace into `sinbegin_purviews` values('5','[财务管理]现金转账','member_capital_transfer','0','capital','10012');");
$this->mysql->query("replace into `sinbegin_purviews` values('6','[业务管理]会员升级','member_vocational_upgroup','0','vocational','10008');");
$this->mysql->query("replace into `sinbegin_purviews` values('7','[后台用户]修改密码','admin_manager_password','1','manager','23');");
$this->mysql->query("replace into `sinbegin_purviews` values('8','[财务管理]现金充值','member_capital_payment','0','capital','10014');");
$this->mysql->query("replace into `sinbegin_purviews` values('9','[财务管理]现金提现','member_capital_myatm','0','capital','10013');");
$this->mysql->query("replace into `sinbegin_purviews` values('10','[账户设置]基本信息','member_user_profile','0','user','10017');");
$this->mysql->query("replace into `sinbegin_purviews` values('11','[网站基础]单页管理','admin_site_about','1','site','41');");
$this->mysql->query("replace into `sinbegin_purviews` values('12','[网站基础]新闻管理','admin_site_news','1','site','40');");
$this->mysql->query("replace into `sinbegin_purviews` values('13','[网站会员]报单中心','admin_user_customs','1','user','34');");
$this->mysql->query("replace into `sinbegin_purviews` values('14','[网站会员]会员级别','admin_user_group','1','user','31');");
$this->mysql->query("replace into `sinbegin_purviews` values('15','[网站会员]会员管理','admin_user_control','1','user','30');");
$this->mysql->query("replace into `sinbegin_purviews` values('16','[后台用户]用户角色','admin_manager_group','1','manager','21');");
$this->mysql->query("replace into `sinbegin_purviews` values('17','[后台用户]用户管理','admin_manager_control','1','manager','20');");
$this->mysql->query("replace into `sinbegin_purviews` values('18','[人脉网络]推荐列表','member_treeform_record','0','treeform','10006');");
$this->mysql->query("replace into `sinbegin_purviews` values('19','[系统管理]数据维护','admin_main_database','1','main','13');");
$this->mysql->query("replace into `sinbegin_purviews` values('20','[系统管理]内部信件','admin_main_guestbook','1','main','12');");
$this->mysql->query("replace into `sinbegin_purviews` values('21','[系统管理]网站设置','admin_main_config','1','main','11');");
$this->mysql->query("replace into `sinbegin_purviews` values('22','[系统管理]系统信息','admin_main_system','1','main','10');");
$this->mysql->query("replace into `sinbegin_purviews` values('23','[账户设置]修改密码','member_user_password','0','user','10018');");
$this->mysql->query("replace into `sinbegin_purviews` values('24','[业务管理]我的会员','member_vocational_list','0','vocational','10010');");
$this->mysql->query("replace into `sinbegin_purviews` values('25','[账户设置]邮箱验证','member_user_authemail','0','user','10019');");
$this->mysql->query("replace into `sinbegin_purviews` values('26','[账户设置]手机绑定','member_user_authphone','0','user','10020');");
$this->mysql->query("replace into `sinbegin_purviews` values('27','[人脉网络]推荐结构','member_treeform_referee','0','treeform','10005');");
$this->mysql->query("replace into `sinbegin_purviews` values('28','[会员中心]系统首页','member_main_index','0','main','10000');");
$this->mysql->query("replace into `sinbegin_purviews` values('29','[财务管理]资金转换','member_capital_change','0','capital','10013');");
$this->mysql->query("replace into `sinbegin_purviews` values('30','[会员中心]系统公告','member_notice_','0','main','10001');");
$this->mysql->query("replace into `sinbegin_purviews` values('31','[会员中心]站内信件','member_imessage_','0','main','10002');");
$this->mysql->query("replace into `sinbegin_purviews` values('32','[数据统计]资金明细','admin_census_money','1','census','51');");
$this->mysql->query("replace into `sinbegin_purviews` values('33','[数据统计]提现记录','admin_census_atmlog','1','census','52');");
$this->mysql->query("replace into `sinbegin_purviews` values('34','[数据统计]充值记录','admin_census_payorder','1','census','53');");
$this->mysql->query("replace into `sinbegin_purviews` values('35','[产品中心]产品订购','member_goods_list','0','goods','10015');");
$this->mysql->query("replace into `sinbegin_purviews` values('36','[产品中心]订单管理','member_goods_order','0','goods','10016');");
?>