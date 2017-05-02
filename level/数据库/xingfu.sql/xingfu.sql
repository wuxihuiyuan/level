-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 10 月 25 日 17:58
-- 服务器版本: 5.5.47
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xingfu`
--

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_about`
--

CREATE TABLE IF NOT EXISTS `sinbegin_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `myurl` varchar(255) DEFAULT '',
  `urltype` int(1) DEFAULT '0',
  `typeid` int(11) DEFAULT NULL,
  `content` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `sinbegin_about`
--

INSERT INTO `sinbegin_about` (`id`, `name`, `myurl`, `urltype`, `typeid`, `content`) VALUES
(1, '购物流程', '', 0, 2, '信息整理中！！！'),
(2, '商品问题', '', 0, 2, '信息整理中！！！'),
(3, '如何报单', '', 0, 11, '<p>\r\n	一、登录会员中心\r\n</p>\r\n<p style="text-align:left;">\r\n	<img src="/upload/about/2014-06-04/20140604174647946.jpg" width="800" height="515" alt="" /> \r\n</p>\r\n<p style="text-align:left;">\r\n	<br />\r\n</p>\r\n<p style="text-align:left;">\r\n	<br />\r\n</p>'),
(4, '隐私声明', '', 0, 5, '<div>\r\n	<p align="left">\r\n		欢迎您访问并使用直销系统开发公司<span>-</span>众邦软件<span>(www.zhobon.com)</span>！我们以本隐私申明声明对访问者隐私保护的许诺。在未经您同意之下，我们绝不会将您的个人数据提供予任何与本网站服务无关的第三人。如您访问本网站，那么您便接受了本隐私声明。以下文字公开我站（<span><a href="http://www.zhobon.com" target="_blank">www.zhobon.com</a></span>）对信息收集和使用的情况。本站的隐私申明会不断改进，随着我站服务的增加，我们会随时更新我们的隐私申明。欢迎您随时查看本申明，并可向<span><a href="mailto:system@zhobon.com">system@zhobon.com</a></span>反馈您的意见。<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<strong>一、未成年人的特别注意事项</strong><strong><span></span></strong> \r\n	</p>\r\n	<p align="left">\r\n		如果您未满<span>18</span>周岁，您无权使用本站服务，因此我们希望您不要向我们提供任何个人信息。如果您未满<span>18</span>周岁，您只能在父母或监护人的陪同下才可以使用本站服务。<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<strong>二、用户名和密码</strong><strong><span></span></strong> \r\n	</p>\r\n	<p align="left">\r\n		当您在注册为本站用户时，您需要根据提示填写用户名和密码，并设置密码提示问题及其答案，以便在您丢失密码时用于您的身份确认。您只能通过你你的密码来使用您的账户。如果您泄漏或了密码，您可能会丢失您的个人识别信息，并可能导致对您不利的司法行为。因此无论任何原因使您的密码安全受到危及时，您应该立即通过<span><a href="mailto:system@zhobon.com">system</span><span>@zhobon.com</a></span>和我们取得联系。<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<strong>三、完善信息</strong><strong><span></span></strong> \r\n	</p>\r\n	<p align="left">\r\n		在您注册成为本站用户后或参与购物并获得商品后，您需要在<span>“</span>会员中心<span>”</span>里完善您个人信息，根据填写要求您提供您的真实姓名，地址，与电子邮件地址。您还有权选择填写更多信息，包括身份证号码，电话号码，<span>QQ</span>号 。我们使用注册信息来保护用户账户安全，在您在账户利益受到危害的情况下。同时我们使用注册信息来获得用户统计资料，以便为用户提供更多更新的服务。我们会通过电子邮件方式通知您有关新的服务。<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<strong>四、什么是</strong><strong><span>Cookies</span></strong><strong>？</strong><strong><span></span></strong> \r\n	</p>\r\n	<p align="left">\r\n		<span>Cookies</span>是一种能够让网站服务器把少量数据储存到客户端的硬盘或内存，或是从客户端的硬盘读取数据的一种技术。<span>Cookies</span>是当你浏览某网站时，由<span>Web</span>服务器置于你硬盘上的一个非常小的文本文件，它可以记录你的用户<span>ID</span>、密码、浏览过的网页、停留的时间等信息。<span></span> \r\n	</p>\r\n	<p align="left">\r\n		当你再次来到该网站时，网站通过读取<span>Cookies</span>，得知你的相关信息，就可以做出相应的动作，如在页面显示欢迎你的标语，或者让你不用输入<span>ID</span>、密码就直接登录等等。从本质上讲，它可以看作是你的身份证。但<span>Cookies</span>不能作为代码执行，也不会传送病毒，且为你所专有，并只能由提供它的服务器来读取。 <span></span>\r\n	</p>\r\n	<p align="left">\r\n		本站为您提供<span>Cookies</span>使用功能，以便为您提供周到的个性服务，使您再次访问时更加快捷、方便。当然，您也可以有权选择关闭此服务，本站将为您停止<span>Cookies</span>为您的服务。 <span></span>\r\n	</p>\r\n	<p align="left">\r\n		<strong>五、信息披露</strong><strong><span></span></strong> \r\n	</p>\r\n	<p align="left">\r\n		我们不会向任何第三方提供，出售，出租，分享和交易用户的个人信息。当在以下情况下，用户的个人信息将部分或全部被善意披露：<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<span>1</span>、经用户同意，向第三方披露；<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<span>2</span>、如用户是合资格的知识产权投诉人并已提起投诉，应被投诉人要求，向被投诉人披露，以便双方处理可能的权利纠纷；<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<span>3</span>、根据法律的有关规定，或者行政或司法机构的要求，向第三方或者行政、司法机构披露；<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<span>4</span>、如果用户出现违反中国有关法律或者网站政策的情况，需要向第三方披露；<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<span>5</span>、为提供你所要求的产品和服务，而必须和第三方分享用户的个人信息；<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<span>6</span>、其它本站根据法律或者网站政策认为合适的披露。<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<strong>六、安全</strong><strong><span></span></strong> \r\n	</p>\r\n	<p align="left">\r\n		我们网站有相应的安全措施来确保我们掌握的信息不丢失，不被滥用和变造。这些安全措施包括向其它服务器备份数据和对用户密码加密。尽管我们有这些安全措施，但请注意在因特网上不存在<span>“</span>完善的安全措施<span>”</span>。<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<strong>七、查阅和修改个人信息</strong><strong><span></span></strong> \r\n	</p>\r\n	<p align="left">\r\n		您使用众邦软件服务时，您可以随时查阅并随时修改您的个人信息。同时，在您登录后我们会提供登录日志功能，我们会将您每次登陆的<span>IP</span>地址公布供您查看，以便保证您账号的安全性。因此提供查看<span>IP</span>地址仅仅只是为了安全的必要。<span></span> \r\n	</p>\r\n	<p align="left">\r\n		<strong>八、邮件</strong><strong><span>/</span></strong><strong>短信服务</strong><strong><span></span></strong> \r\n	</p>\r\n	<p align="left">\r\n		注册成为众邦软件用户后，您将会收到以电子邮件、短信的形式为您发送的最新活动与通知。为此，我们保留为用户发送最新活动与通知等告知服务的权利。当您注册成为众邦软件用户后即表明您已同意接受此项服务。如您不想接受来自众邦软件的邮件、短信与通知，您可向众邦软件客服提出退阅申请，并注明您的电子邮件地址、手机号等相关接受平台信息，众邦软件将在收到您的申请后为您及时办理。\r\n	</p>\r\n</div>'),
(5, '合作伙伴', '', 0, 5, '<div class="about_wrap">\r\n	<p>\r\n		沃尔购彼此共同致力于建立并发展平等互利、相互协作、相互支持、共同发展的紧密的业务合作关系；通过业务领域的交流和合作，实现信息互通、资源共享、优势互补；业务合作是市场化行为，彼此以尊重市场经济规律为共识，以互惠互利、风险共担为原则，实行商业化操作。推动中国电子商务行业的健康发展。\r\n	</p>\r\n	<table class="ke-zeroborder" border="0" cellspacing="0" cellpadding="0" width="100%" align="center">\r\n		<tbody>\r\n			<tr>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="淘宝网logo" src="http://www.woergo.com/upload/cooperation/h1.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="拍拍网logo" src="http://www.woergo.com/upload/cooperation/h2.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="京东商城logo" src="http://www.woergo.com/upload/cooperation/h3.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="苏宁易购logo" src="http://www.woergo.com/upload/cooperation/h4.gif" />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height="20" valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="当当网logo" src="http://www.woergo.com/upload/cooperation/h5.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="凡客诚品logo" src="http://www.woergo.com/upload/cooperation/h6.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="卓越亚马逊logo" src="http://www.woergo.com/upload/cooperation/h7.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="乐蜂网logo" src="http://www.woergo.com/upload/cooperation/h8.gif" />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height="20" valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="新浪网logo" src="http://www.woergo.com/upload/cooperation/h9.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="网易logo" src="http://www.woergo.com/upload/cooperation/h10.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="腾讯科技logo" src="http://www.woergo.com/upload/cooperation/h11.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="人民网logo" src="http://www.woergo.com/upload/cooperation/h12.gif" />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height="20" valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="IT商业资讯网logo" src="http://www.woergo.com/upload/cooperation/h13.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="搜狐新闻logo" src="http://www.woergo.com/upload/cooperation/h14.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="环球网logo" src="http://www.woergo.com/upload/cooperation/h15.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="新华网logo" src="http://www.woergo.com/upload/cooperation/h16.gif" />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height="20" valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="财付通logo" src="http://www.woergo.com/upload/cooperation/h17.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="支付宝logo" src="http://www.woergo.com/upload/cooperation/h18.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="快钱网logo" src="http://www.woergo.com/upload/cooperation/h19.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="网银在线logo" src="http://www.woergo.com/upload/cooperation/h20.gif" />\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height="20" valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					&nbsp;\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="中国联通logo" src="http://www.woergo.com/upload/cooperation/h21.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="中国移动通信logo" src="http://www.woergo.com/upload/cooperation/h22.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="中国铁通logo" src="http://www.woergo.com/upload/cooperation/h23.gif" />\r\n				</td>\r\n				<td valign="top" align="middle">\r\n					<img style="width:160px;height:60px;" border="0" alt="中国电信logo" src="http://www.woergo.com/upload/cooperation/h24.gif" />\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>'),
(6, '如何充值', '', 0, 11, '信息整理中！！！'),
(7, '如何体现', '', 0, 11, '信息整理中！！！'),
(8, '商品配送', '', 0, 2, '信息整理中！！！'),
(9, '正品验证', '', 0, 2, '信息整理中！！！'),
(10, '人才招聘', 'job', 0, 5, '<p>\r\n	<div class="main_l">\r\n		<div class="main_l1">\r\n			<div class="info">\r\n				<p>\r\n					一．PHP程序员\r\n				</p>\r\n				<p>\r\n					岗位要求：<br />\r\n1.计算机及相关专业本科及以上学历，至少3年以上B/S结构项目经验；<br />\r\n2.精通linux操作系统、能在linux下进行开发，精通Apache或Nginx、熟悉rewrite、curl、ssi等技术；<br />\r\n3.精通MYSQL数据库，熟悉SQL,及oracle数据库；<br />\r\n4.精通PHP、HTML、JavaScript、CSS、XML、AJAX、memcached等相关知识，熟悉1个JavaScript \r\nFramework(Ext, Jquery, \r\nPrototype…)；<br />\r\n5.精通Codeigniter、Zend、CakePHP等一种以上的MVC开发框架，开发中习惯写存储过程、有使用模板化合作开发的经验；<br />\r\n6.熟悉PHP \r\nMVC开发模式，有使用模板化合作开发的经验；<br />\r\n7.性格开朗，思维开阔，有较强的团队意识，善于沟通协调，能承受工作压力，工作富主动性；<br />\r\n8.较好的英文读写能力，有能力设计和编写各种技术文档<br />\r\n9.拥有大型网站和高访问量产品开发经验，实施过负载均衡和WEB服务器性能优化者优先；<br />\r\n13.有其他大型电子商务网站如拍拍网、淘宝网、当当网、京东商城等网站开发经验者优先,有C/C++编程经验者优先。\r\n				</p>\r\n				<p>\r\n					二.网页设计师\r\n				</p>\r\n				<p>\r\n					岗位要求：\r\n				</p>\r\n				<p>\r\n					1、具有独立网页设计经验，有独立运作成功行业门户网站及优秀企业网站设计经验；<br />\r\n2、熟练应用PhotoShop、CorelDRAW、网页三剑客等美工软件，熟悉网页编程语（php、Jsp、html、css、javascript、asp）；<br />\r\n3、熟练FLASH动画及编程；<br />\r\n4、适应多任务模式，有良好的时间管理能力。<br />\r\n5、诚实、正直、能吃苦耐劳，团队意识强；<br />\r\n6.、有二年以上网站设计经验者优先\r\n				</p>\r\n				<p>\r\n					三.客服专员\r\n				</p>\r\n				<p>\r\n					岗位要求：\r\n				</p>\r\n				<p>\r\n					1.负责客户的后期维护，保持长期合作二次销售类工作<br />\r\n2.较强的抗压能力和客户服务意识<br />\r\n3.根据客户产品和产业状况，为客户提供有效的网络整体方案<br />\r\n4.结合客户数据及相关信息记录进行统计分析，并定期反馈给客户及内部相关人员，推动公司业务进步，提升客户的电子商务效果<br />\r\n5.能熟练操作使用计算机及办公软件，处理邮件、来电、来访电话等工作\r\n				</p>\r\n				<p>\r\n					以上人员一经录用，我们将提供：<br />\r\n★完整的岗前培训和职业生涯规划辅导； <br />\r\n★良好的薪酬体系和激励机制； <br />\r\n★提供内训和外训的机会；<br />\r\n★严谨公平的晋升制度提供无限的发展空间与机会\r\n				</p>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>'),
(11, '联系我们', 'contact', 0, 5, '<div class="main_l">\r\n	<div class="main_l1">\r\n		<div class="info">\r\n			<p>\r\n				<strong>众邦直销系统<br />\r\n</strong>地址：平顶山市广厦汇商B栋14-1&nbsp;<br />\r\n邮编：467000&nbsp;<br />\r\n总机：400-999-1873&nbsp;<br />\r\n邮箱：zhobon#qq.com(#号改成@)&nbsp;<br />\r\n上班时间：周一至周五 \r\n夏（8:00-18:00）冬（9:00-17:00）<br />\r\n&nbsp;\r\n			</p>\r\n			<p>\r\n				<strong>众邦销售部<br />\r\n</strong>电话：0375-8888873 \r\n18639733690(7X24为您服务)<br />\r\nQQ：88254369 947654381<br />\r\n<strong>技术部</strong><br />\r\n电话：0375-8888873<br />\r\nQQ：81972369<br />\r\n<strong>商业版用户请按以下方式联系以获取技术支持：</strong><br />\r\n7x24紧急技术支援电话：18639733690(张亚钊 \r\n7X24小时为您服务)\r\n			</p>\r\n		</div>\r\n	</div>\r\n</div>'),
(12, '管理市场', '', 0, 11, '查看市场结构'),
(13, '如何转账', '', 0, 11, '如何转账'),
(14, '修改密码', '', 0, 11, '修改密码'),
(15, '手机绑定', '', 0, 11, '手机绑定'),
(16, '邮箱绑定', '', 0, 11, '邮箱绑定');

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_abouttype`
--

CREATE TABLE IF NOT EXISTS `sinbegin_abouttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) DEFAULT '',
  `typeorder` int(2) DEFAULT NULL,
  `is_show` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sinbegin_abouttype`
--

INSERT INTO `sinbegin_abouttype` (`id`, `typename`, `typeorder`, `is_show`) VALUES
(1, '商品问题', 2, 1),
(2, '关于我们', 3, 1),
(3, '帮助中心', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_atmbank`
--

CREATE TABLE IF NOT EXISTS `sinbegin_atmbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `truename` varchar(50) DEFAULT '',
  `bankname` varchar(50) DEFAULT '0' COMMENT '银行名称',
  `bankcard` varchar(50) DEFAULT '0',
  `bankadd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sinbegin_atmbank`
--

INSERT INTO `sinbegin_atmbank` (`id`, `uid`, `truename`, `bankname`, `bankcard`, `bankadd`) VALUES
(1, 1, '系统会员', '工商银行', '62222502003569392', '昆明市碧鸡路支行');

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_atmlog`
--

CREATE TABLE IF NOT EXISTS `sinbegin_atmlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `orderid` varchar(30) DEFAULT '',
  `truename` varchar(10) DEFAULT '',
  `bankname` varchar(100) NOT NULL DEFAULT '',
  `bankcard` varchar(100) DEFAULT NULL,
  `lognum` decimal(11,2) NOT NULL DEFAULT '0.00',
  `addtime` int(11) DEFAULT NULL COMMENT '免费注册时间',
  `checked` int(1) DEFAULT '0',
  `bankadd` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_completed`
--

CREATE TABLE IF NOT EXISTS `sinbegin_completed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(11,2) DEFAULT '0.00',
  `addtime` varchar(10) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_customs`
--

CREATE TABLE IF NOT EXISTS `sinbegin_customs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '用户名',
  `address` varchar(255) DEFAULT NULL COMMENT '二级密码',
  `checked` int(1) DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sinbegin_customs`
--

INSERT INTO `sinbegin_customs` (`id`, `uid`, `name`, `address`, `checked`, `addtime`) VALUES
(1, 1, '全国', '全国服务中心', 1, 1413898807);

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_delivery`
--

CREATE TABLE IF NOT EXISTS `sinbegin_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `mobile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_goods`
--

CREATE TABLE IF NOT EXISTS `sinbegin_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商城价',
  `commission` decimal(11,2) DEFAULT '0.00',
  `shopmoney` decimal(10,2) DEFAULT '0.00' COMMENT '可用购物币',
  `balance` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '可用积分',
  `goods_desc` text NOT NULL COMMENT '产品说明',
  `goods_thumb` mediumtext NOT NULL COMMENT '产品图片',
  `margin` decimal(11,2) DEFAULT '0.00' COMMENT '奖励差额',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `ischeck` tinyint(1) unsigned DEFAULT '1' COMMENT '是否上架',
  `shipping` decimal(11,2) DEFAULT '0.00' COMMENT '运费',
  `stock` int(11) DEFAULT '0' COMMENT '商品库存',
  `sale` int(11) DEFAULT '0' COMMENT '商品销售量',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `sinbegin_goods`
--

INSERT INTO `sinbegin_goods` (`goods_id`, `goods_name`, `click_count`, `market_price`, `shop_price`, `commission`, `shopmoney`, `balance`, `goods_desc`, `goods_thumb`, `margin`, `addtime`, `ischeck`, `shipping`, `stock`, `sale`) VALUES
(1, '爱真情10金币卡', 0, '0.00', '10.00', '0.00', '0.00', '0.00', '<p>\n	爱真情10金币卡，请登陆<a href="http://www.izhenqing.com">http://www.izhenqing.com</a> 进行充值！\n</p>', '/upload/goods/2014-04-09/20140409191953662.jpg', '0.00', 1397042395, 1, '0.00', 1000, 0),
(2, '爱真情50金币卡', 0, '0.00', '50.00', '0.00', '0.00', '0.00', '<p>\n	爱真情50金币卡，请登陆<a href="http://www.izhenqing.com/">http://www.izhenqing.com</a> 进行充值！\n</p>\n<br class="img-brk" />', '/upload/goods/2014-04-09/20140409192336797.jpg', '0.00', 1397042617, 1, '0.00', 1000, 0),
(3, '爱真情100金币卡', 0, '0.00', '100.00', '0.00', '0.00', '0.00', '<p>\n	&nbsp;\n</p>\n<p style="text-align:left;color:#333333;text-indent:0px;background-color:#FFFFFF;">\n	<span style="color:#FF00FF;"><strong><span style="font-size:24pt;"><span style="font-size:14px;">爱真情</span><span style="font-size:14px;">100</span><span style="font-size:14px;">金币卡，请登陆爱真情</span><span style="font-size:14px;">网站</span><a href="http://www.izhenqing.com/"><span style="font-size:14px;">http://www.izhenqing.com</span></a><span style="font-size:14px;"> 进行充值！</span></span></strong></span>\n</p>', '/upload/goods/2014-04-09/20140409193037887.jpg', '0.00', 1397043043, 1, '0.00', 1000, 0),
(4, '爱真情200金币卡', 0, '0.00', '200.00', '0.00', '0.00', '0.00', '<p style="text-align:left;color:#333333;text-indent:0px;background-color:#FFFFFF;">\n	<span style="color:#FF00FF;"><strong><span style="font-size:24pt;"><span style="font-size:14px;">爱真情</span><span style="font-size:14px;">100</span><span style="font-size:14px;">金币卡，请登陆爱真情</span><span style="font-size:14px;">网站</span><a href="http://www.izhenqing.com"><span style="font-size:14px;">http://www.izhenqing.com</span></a><span style="font-size:14px;"> 进行充值！</span></span></strong></span>\n</p>', '/upload/goods/2014-04-10/20140410221212620.jpg', '0.00', 1397139175, 1, '0.00', 1000, 0),
(5, '爱真情500金币卡', 0, '0.00', '500.00', '0.00', '0.00', '0.00', '<p style="text-align:left;color:#333333;text-indent:0px;background-color:#FFFFFF;">\n	<span style="color:#FF00FF;"><strong><span style="font-size:24pt;"><span style="font-size:14px;">爱真情</span><span style="font-size:14px;">500</span><span style="font-size:14px;">金币卡，请登陆爱真情</span><span style="font-size:14px;">网站</span><a href="http://www.izhenqing.com/"><span style="font-size:14px;">http://www.izhenqing.com</span></a><span style="font-size:14px;"> 进行充值！</span></span></strong></span>\n</p>\n<p>\n	&nbsp;\n</p>', '/upload/goods/2014-04-10/20140410222233149.jpg', '0.00', 1397139759, 1, '0.00', 1000, 0),
(6, '爱真情2000金币卡', 0, '0.00', '2000.00', '0.00', '0.00', '0.00', '爱真情100金币卡，请登陆爱真情网站<a href="http://www.izhenqing.com">http://www.izhenqing.com</a> 进行充值！', '/upload/goods/2014-09-05/20140905001411125.jpg', '0.00', 1409847259, 1, '0.00', 1000, 0),
(7, '爱真情5000金币卡', 0, '0.00', '5000.00', '0.00', '0.00', '0.00', '爱真情5000金币卡，请登陆爱真情网站<a href="http://www.izhenqing.com">http://www.izhenqing.com</a> 进行充值！', '/upload/goods/2014-09-05/20140905001509252.jpg', '0.00', 1409847315, 1, '0.00', 1000, 0),
(8, '爱真情1000金币卡', 0, '0.00', '1000.00', '0.00', '0.00', '0.00', '<span>\n<p style="text-align:left;color:#333333;text-indent:0px;background-color:#FFFFFF;">\n	<span style="color:#FF00FF;"><strong><span style="font-size:24pt;"><span style="font-size:14px;">爱真情</span><span style="font-size:14px;">1000</span><span style="font-size:14px;">金币卡，请登陆爱真情</span><span style="font-size:14px;">网站</span><a href="http://www.izhenqing.com/"><span style="font-size:14px;">http://www.izhenqing.com</span></a><span style="font-size:14px;"> 进行充值！</span></span></strong></span>\n</p>\n</span>', '/upload/goods/2014-06-08/20140608164341500.jpg', '0.00', 1397140413, 1, '0.00', 1000, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_group`
--

CREATE TABLE IF NOT EXISTS `sinbegin_group` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(30) NOT NULL DEFAULT '',
  `system` smallint(1) NOT NULL DEFAULT '0',
  `purviews` mediumtext,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sinbegin_group`
--

INSERT INTO `sinbegin_group` (`groupid`, `groupname`, `system`, `purviews`) VALUES
(1, '超级管理员', 1, 'adminall'),
(2, '普通管理员', 0, 'admin_user_control,admin_user_group,admin_user_customs,admin_site_news,admin_site_about'),
(3, '系统管理员', 0, 'admin_census_payorder,admin_census_atmlog,admin_census_money,admin_main_system,admin_main_config,admin_main_guestbook,admin_main_database,admin_manager_control,admin_manager_group,admin_manager_password,admin_user_control,admin_user_group,admin_user_customs,admin_site_news,admin_site_about');

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_log`
--

CREATE TABLE IF NOT EXISTS `sinbegin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT '',
  `lognum` varchar(40) NOT NULL DEFAULT '',
  `addtime` int(11) DEFAULT NULL COMMENT '产生时间',
  `typeid` int(1) DEFAULT '1',
  `balance` decimal(11,2) DEFAULT '0.00',
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_manager`
--

CREATE TABLE IF NOT EXISTS `sinbegin_manager` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `salt` varchar(8) NOT NULL DEFAULT '' COMMENT '密码前缀',
  `lasttime` int(11) DEFAULT NULL COMMENT '登录时间',
  `lastip` varchar(20) DEFAULT '' COMMENT '登陆IP',
  `groupid` int(11) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `sinbegin_manager`
--

INSERT INTO `sinbegin_manager` (`uid`, `username`, `password`, `loginnum`, `salt`, `lasttime`, `lastip`, `groupid`) VALUES
(1, 'admin', 'e120dae791fe8c7b5652f8933078b3ee', 12, '994c61', 1477389450, '127.0.0.1', 1),
(4, 'system', '71273c25c1f4cd846743a2c418ca603e', 2, '2354ed', 1413902195, '106.37.236.229', 3);

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_message`
--

CREATE TABLE IF NOT EXISTS `sinbegin_message` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限资源码' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_money`
--

CREATE TABLE IF NOT EXISTS `sinbegin_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(11,2) DEFAULT '0.00',
  `addtime` varchar(10) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_nav`
--

CREATE TABLE IF NOT EXISTS `sinbegin_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `type` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `ord` int(10) DEFAULT '0',
  `act` int(1) DEFAULT '1',
  `aid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `sinbegin_nav`
--

INSERT INTO `sinbegin_nav` (`id`, `name`, `type`, `link`, `ord`, `act`, `aid`) VALUES
(1, '人才招聘', 3, '?mod=about&act=main&id=job', 3, 5, 57),
(2, '社会责任', 3, '?mod=about&act=main&id=contact', 4, 5, 58),
(3, '合作伙伴', 3, '?mod=about&act=main&id=43', 2, 1, 0),
(4, '关于我们', 3, '?mod=about&act=main&id=aboutus', 0, 5, 39),
(5, '隐私声明', 3, '?mod=about&act=main&id=41', 1, 1, 0),
(6, '联系我们', 3, '?mod=about&act=main&id=contact', 5, 5, 58),
(7, '礼品兑换', 2, '?mod=credit', 2, 1, 0),
(8, '在线购物', 2, '?mod=goods', 1, 1, 0),
(9, '商家合作', 2, '?mod=about&act=main&id=50', 6, 5, 50),
(10, '网站首页', 2, '?mod=index&act=main', 0, 1, 0),
(11, '联系我们', 2, '?mod=about&act=main&id=contact', 7, 5, 58),
(12, '关于我们', 2, '?mod=about&act=main&id=aboutus', 5, 5, 39),
(13, '正品验证', 2, '?mod=about&act=main&id=54', 7, 5, 54);

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_news`
--

CREATE TABLE IF NOT EXISTS `sinbegin_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `addtime` int(11) DEFAULT NULL,
  `content` mediumtext,
  `clicknumber` int(11) DEFAULT '0' COMMENT '浏览次数',
  `typeid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_newstype`
--

CREATE TABLE IF NOT EXISTS `sinbegin_newstype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) DEFAULT '',
  `typeorder` int(2) DEFAULT NULL,
  `system` int(1) DEFAULT '0' COMMENT '是否系统公告',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sinbegin_newstype`
--

INSERT INTO `sinbegin_newstype` (`id`, `typename`, `typeorder`, `system`) VALUES
(1, '内部公告', 0, 1),
(2, '行业新闻', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_order`
--

CREATE TABLE IF NOT EXISTS `sinbegin_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT NULL,
  `express` varchar(20) DEFAULT '',
  `expressnumber` varchar(200) DEFAULT '',
  `message` mediumtext,
  `checked` int(1) DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `goods` mediumtext,
  `margin` decimal(11,2) DEFAULT '0.00',
  `money` decimal(11,2) DEFAULT '0.00',
  `price` decimal(11,2) DEFAULT '0.00',
  `delivery` varchar(1000) DEFAULT '',
  `ftime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_payorder`
--

CREATE TABLE IF NOT EXISTS `sinbegin_payorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) DEFAULT NULL,
  `total_fee` decimal(11,2) DEFAULT '0.00',
  `checked` int(1) DEFAULT NULL,
  `paytype` varchar(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sinbegin_payorder`
--

INSERT INTO `sinbegin_payorder` (`id`, `orderid`, `total_fee`, `checked`, `paytype`, `uid`, `addtime`) VALUES
(1, '201411010518582820', '100.00', 0, '网银在线', 1, 1414833538),
(2, '201411010519237957', '100.00', 0, '网银在线', 1, 1414833563);

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_purviews`
--

CREATE TABLE IF NOT EXISTS `sinbegin_purviews` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '权限名字',
  `purviews` text COMMENT '权限码(控制器+动作)',
  `admin` int(1) DEFAULT '0',
  `member` varchar(20) DEFAULT '',
  `ord` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限资源码' AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `sinbegin_purviews`
--

INSERT INTO `sinbegin_purviews` (`id`, `name`, `purviews`, `admin`, `member`, `ord`) VALUES
(1, '[人脉网络]会员结构', 'member_treeform_arrange', 0, 'treeform', 10003),
(2, '[业务管理]会员注册', 'member_vocational_register', 0, 'vocational', 10007),
(3, '[业务管理]报单中心', 'member_vocational_customs', 0, 'vocational', 10009),
(4, '[财务管理]资金明细', 'member_capital_list', 0, 'capital', 10011),
(5, '[财务管理]现金转账', 'member_capital_transfer', 0, 'capital', 10012),
(6, '[业务管理]会员升级', 'member_vocational_upgroup', 0, 'vocational', 10008),
(7, '[后台用户]修改密码', 'admin_manager_password', 1, 'manager', 23),
(8, '[财务管理]现金充值', 'member_capital_payment', 0, 'capital', 10014),
(9, '[财务管理]现金提现', 'member_capital_myatm', 0, 'capital', 10013),
(10, '[账户设置]基本信息', 'member_user_profile', 0, 'user', 10017),
(11, '[网站基础]单页管理', 'admin_site_about', 1, 'site', 41),
(12, '[网站基础]新闻管理', 'admin_site_news', 1, 'site', 40),
(13, '[网站会员]报单中心', 'admin_user_customs', 1, 'user', 34),
(14, '[网站会员]会员级别', 'admin_user_group', 1, 'user', 31),
(15, '[网站会员]会员管理', 'admin_user_control', 1, 'user', 30),
(16, '[后台用户]用户角色', 'admin_manager_group', 1, 'manager', 21),
(17, '[后台用户]用户管理', 'admin_manager_control', 1, 'manager', 20),
(18, '[人脉网络]推荐列表', 'member_treeform_record', 0, 'treeform', 10006),
(19, '[系统管理]数据维护', 'admin_main_database', 1, 'main', 13),
(20, '[系统管理]内部信件', 'admin_main_guestbook', 1, 'main', 12),
(21, '[系统管理]网站设置', 'admin_main_config', 1, 'main', 11),
(22, '[系统管理]系统信息', 'admin_main_system', 1, 'main', 10),
(23, '[账户设置]修改密码', 'member_user_password', 0, 'user', 10018),
(24, '[业务管理]我的会员', 'member_vocational_list', 0, 'vocational', 10010),
(25, '[账户设置]邮箱验证', 'member_user_authemail', 0, 'user', 10019),
(26, '[账户设置]手机绑定', 'member_user_authphone', 0, 'user', 10020),
(27, '[人脉网络]推荐结构', 'member_treeform_referee', 0, 'treeform', 10005),
(28, '[会员中心]系统首页', 'member_main_index', 0, 'main', 10000),
(29, '[财务管理]资金转换', 'member_capital_change', 0, 'capital', 10013),
(30, '[会员中心]系统公告', 'member_notice_', 0, 'main', 10001),
(31, '[会员中心]站内信件', 'member_imessage_', 0, 'main', 10002),
(32, '[数据统计]资金明细', 'admin_census_money', 1, 'census', 51),
(33, '[数据统计]提现记录', 'admin_census_atmlog', 1, 'census', 52),
(34, '[数据统计]充值记录', 'admin_census_payorder', 1, 'census', 53),
(35, '[产品中心]代理产品', 'member_goods_list', 0, 'goods', 10015),
(35, '[产品中心]零售产品', 'member_goods_linlist', 0, 'goods', 10017),
(36, '[产品中心]订单管理', 'member_goods_order', 0, 'goods', 10016);

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_record`
--

CREATE TABLE IF NOT EXISTS `sinbegin_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_paymoney` decimal(11,2) DEFAULT '0.00' COMMENT '人工充值',
  `paymoney` decimal(11,2) DEFAULT '0.00' COMMENT '在线充值',
  `buymoney` decimal(11,2) DEFAULT '0.00' COMMENT '进单总额',
  `ordermoney` decimal(11,2) DEFAULT '0.00' COMMENT '订货总额',
  `upgroup` decimal(11,2) DEFAULT '0.00' COMMENT '升级进单额',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '静态奖励',
  `_money` decimal(11,2) DEFAULT '0.00' COMMENT '见点奖',
  `refereemoney` decimal(11,2) DEFAULT '0.00' COMMENT '直荐奖',
  `__money` decimal(11,2) DEFAULT '0.00' COMMENT '对碰奖',
  `floormoney` decimal(11,2) DEFAULT '0.00' COMMENT '见点奖',
  `leadmoney` decimal(11,2) DEFAULT '0.00' COMMENT '团队奖',
  `regmoney` decimal(11,2) DEFAULT '0.00' COMMENT '报单奖',
  `atmmoney` decimal(11,2) DEFAULT '0.00' COMMENT '会员提现',
  `atmmoneyed` decimal(11,2) DEFAULT '0.00',
  `addtime` int(11) DEFAULT '0',
  `otherin` decimal(11,2) DEFAULT '0.00' COMMENT '其他收入',
  `otherout` decimal(11,2) DEFAULT '0.00' COMMENT '其他支出',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_records`
--

CREATE TABLE IF NOT EXISTS `sinbegin_records` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_shopcart`
--

CREATE TABLE IF NOT EXISTS `sinbegin_shopcart` (
  `cart_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `uid` varchar(10) NOT NULL DEFAULT 'null' COMMENT '购买用户id',
  `goods_id` int(10) NOT NULL DEFAULT '0' COMMENT '产品id',
  `goods_number` int(5) NOT NULL DEFAULT '1' COMMENT '购买数量',
  `goods_money` decimal(11,2) DEFAULT '0.00',
  `cookieid` varchar(255) DEFAULT '',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_user`
--

CREATE TABLE IF NOT EXISTS `sinbegin_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `repass` varchar(255) DEFAULT NULL COMMENT '二级密码',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `userphone` varchar(50) DEFAULT '' COMMENT '联系电话',
  `mtime` int(11) DEFAULT NULL,
  `msalt` int(11) DEFAULT NULL,
  `mcheck` int(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `truename` varchar(50) DEFAULT NULL COMMENT '姓名',
  `forgotpassword` varchar(32) DEFAULT NULL COMMENT '找回密码',
  `status` int(1) DEFAULT '1' COMMENT '用户状态',
  `salt` varchar(8) NOT NULL DEFAULT '' COMMENT '密码前缀',
  `groupid` int(1) DEFAULT NULL COMMENT '用户组ID',
  `regip` varchar(20) DEFAULT '' COMMENT '注册IP',
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '注册邮箱',
  `echeck` int(1) DEFAULT NULL COMMENT '邮箱是否验证',
  `authemail` varchar(32) DEFAULT '',
  `money` decimal(11,2) DEFAULT '0.00' COMMENT '现金币',
  `regmoney` decimal(11,2) DEFAULT '0.00',
  `shopmoney` decimal(11,2) DEFAULT '0.00' COMMENT '购物币',
  `balance` decimal(11,2) DEFAULT '0.00' COMMENT '兑换币',
  `opentime` int(11) DEFAULT '0' COMMENT '开通时间',
  `regtime` int(11) DEFAULT NULL COMMENT '免费注册时间',
  `lasttime` int(11) DEFAULT NULL COMMENT '登录时间',
  `lastip` varchar(20) DEFAULT '' COMMENT '登陆IP',
  `left` int(11) DEFAULT '0' COMMENT '左边会员数',
  `right` int(11) DEFAULT '0' COMMENT '右边会员数',
  `_left` varchar(50) DEFAULT '' COMMENT '左边安置会员名',
  `_right` varchar(50) DEFAULT '' COMMENT '右边安置会员名',
  `referee` varchar(50) DEFAULT '' COMMENT '直接上线',
  `__right` mediumtext COMMENT '右边上线集合',
  `__sleft` mediumtext COMMENT '系统左边上线集合',
  `_referee` varchar(50) DEFAULT '' COMMENT '安排会员上线',
  `__referee` mediumtext COMMENT '安排上线集合',
  `position` varchar(10) DEFAULT '' COMMENT '所在位置',
  `canlogin` int(1) DEFAULT '1' COMMENT '可否登陆',
  `sleft` int(11) DEFAULT '0' COMMENT '系统左边会员数',
  `sright` int(11) DEFAULT '0' COMMENT '系统右边会员数',
  `_sleft` varchar(50) DEFAULT '' COMMENT '左边系统会员名',
  `_sright` varchar(50) DEFAULT '' COMMENT '右边系统会员名',
  `_sreferee` varchar(50) DEFAULT '' COMMENT '系统会员上线',
  `__sright` mediumtext COMMENT '系统右边上线集合',
  `__sreferee` mediumtext COMMENT '系统上线集合',
  `sposition` varchar(10) DEFAULT '' COMMENT '系统所在位置',
  `_maxmoney` decimal(11,2) DEFAULT '0.00' COMMENT '已获见点奖',
  `__left` mediumtext COMMENT '左边上线集合',
  `leftmoney` decimal(11,2) DEFAULT '0.00' COMMENT '左区剩余业绩',
  `rightmoney` decimal(11,2) DEFAULT '0.00' COMMENT '右区剩余业绩',
  `maxmoney` decimal(11,2) DEFAULT '0.00' COMMENT '已获静态奖',
  `moneytime` int(11) DEFAULT '0' COMMENT '最后获取静态奖时间',
  `service` int(1) DEFAULT '0',
  `reguser` int(11) DEFAULT '0',
  `_leftmoney` decimal(11,2) DEFAULT '0.00' COMMENT '左区总业绩',
  `_rightmoney` decimal(11,2) DEFAULT '0.00' COMMENT '右区总业绩',
  `locktime` varchar(20) DEFAULT '',
  `newphone` varchar(11) DEFAULT '',
  `newmsalt` int(11) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `county` varchar(100) DEFAULT '',
  `centre` int(11) DEFAULT '0' COMMENT '中间会员数',
  `_centre` varchar(50) DEFAULT '' COMMENT '中间会员名',
  `__centre` mediumtext COMMENT '中间上线集合',
  `order` decimal(11,2) DEFAULT '0.00',
  `idcard` varchar(50) NOT NULL,
  `qq` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sinbegin_user`
--

INSERT INTO `sinbegin_user` (`uid`, `username`, `repass`, `password`, `loginnum`, `userphone`, `mtime`, `msalt`, `mcheck`, `address`, `truename`, `forgotpassword`, `status`, `salt`, `groupid`, `regip`, `email`, `echeck`, `authemail`, `money`, `regmoney`, `shopmoney`, `balance`, `opentime`, `regtime`, `lasttime`, `lastip`, `left`, `right`, `_left`, `_right`, `referee`, `__right`, `__sleft`, `_referee`, `__referee`, `position`, `canlogin`, `sleft`, `sright`, `_sleft`, `_sright`, `_sreferee`, `__sright`, `__sreferee`, `sposition`, `_maxmoney`, `__left`, `leftmoney`, `rightmoney`, `maxmoney`, `moneytime`, `service`, `reguser`, `_leftmoney`, `_rightmoney`, `locktime`, `newphone`, `newmsalt`, `province`, `city`, `county`, `centre`, `_centre`, `__centre`, `order`, `idcard`, `qq`) VALUES
(1, 'system', '7e12d81969a4b5e6b73e9858d8c68740', '242d90fe43a5fc1f8823bab4bf1a6676', 12, '13888919606', 1413899242, 5544, NULL, NULL, '系统会员', NULL, 1, '402c5b', 5, '106.37.236.229', '', NULL, '', '0.00', '0.00', '0.00', '0.00', 1413897012, 1413897012, 1414840802, '123.1.155.157', 0, 0, '', '', '', NULL, NULL, '', NULL, '', 1, 0, 0, '', '', '', NULL, NULL, '', '0.00', NULL, '0.00', '0.00', '0.00', 0, 1, 0, '0.00', '0.00', '', '', NULL, NULL, NULL, '', 0, '', NULL, '0.00', '530000000000000000', '309091579');

-- --------------------------------------------------------

--
-- 表的结构 `sinbegin_usergroup`
--

CREATE TABLE IF NOT EXISTS `sinbegin_usergroup` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `sinbegin_usergroup`
--

INSERT INTO `sinbegin_usergroup` (`groupid`, `groupname`, `buymoney`, `refereemoney`, `floormoney`, `floorask`, `money`, `atmscale`, `referee`, `rebate`, `maxmoney`, `_money`, `_floor`, `__money`, `__maxmoney`, `leadask`, `leadmoney`, `purviews`, `uprefereemoney`, `shopmoney`, `regmoney`) VALUES
(1, '铜牌会员', '100', '20%', '5,3,2,2,2,2,2,2,2,2,2,2,2,2', 'a:5:{i:1;s:1:"6";i:2;s:1:"8";i:3;s:2:"10";i:4;s:2:"12";i:5;s:2:"14";}', '0', '800后4%', 0, '0.98', '0.00', '0.00', 0, '0', '0.00', NULL, '0', 'member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone', '0', '', '5%'),
(2, '银牌会员', '300', '22%', '6,3,2,2,2,2,2,2,2,2,2,2,2,2', 'a:5:{i:1;s:1:"6";i:2;s:1:"8";i:3;s:2:"10";i:4;s:2:"12";i:5;s:2:"14";}', '0', '800后4%', 0, '0.95', '0.00', '0.00', 0, '0', '0.00', NULL, '0', 'member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone', '0.1', '', '6%'),
(3, '金牌会员', '800', '25%', '8,3,2,2,2,2,2,2,2,2,2,2,2,2', 'a:5:{i:1;s:1:"6";i:2;s:1:"8";i:3;s:2:"10";i:4;s:2:"12";i:5;s:2:"14";}', '8单1%', '800后4%', 0, '0.90', '0.00', '0.00', 0, '0', '0.00', NULL, '0', 'member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone', '0.1', '', '7%'),
(4, '钻石会员', '2000', '27%', '10,3,2,2,2,2,2,2,2,2,2,2,2,2', 'a:5:{i:1;s:1:"6";i:2;s:1:"8";i:3;s:2:"10";i:4;s:2:"12";i:5;s:2:"14";}', '20单3%', '800后4%', 0, '0.85', '0.00', '0.00', 0, '0', '0.00', NULL, '0', 'member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_upgroup,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone', '0.1', '', '10%'),
(5, '合作伙伴', '5000', '30%', '15,3,2,2,2,2,2,2,2,2,2,2,2,2', 'a:5:{i:1;s:1:"6";i:2;s:1:"8";i:3;s:2:"10";i:4;s:2:"12";i:5;s:2:"14";}', '50单4%', '800后4%', 0, '0.80', '0.00', '0.00', 0, '0', '0.00', NULL, '0', 'member_main_index,member_notice_,member_imessage_,member_treeform_arrange,member_treeform_referee,member_treeform_record,member_vocational_register,member_vocational_customs,member_vocational_list,member_capital_list,member_capital_transfer,member_capital_myatm,member_capital_change,member_capital_payment,member_goods_list,member_goods_order,member_user_profile,member_user_password,member_user_authemail,member_user_authphone', '0.1', '', '15%');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
