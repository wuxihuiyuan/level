<?php
if (!defined('ROOT')) exit('Can\'t Access !'); 
class mod_mobile extends module_class{
	function main(){

		 //收入数据
	     $todaytime = untime(formattime(time(),'Y-m-d'));
	     $yestodaytime = untime(formattime(time()-24*3600,'Y-m-d')); 
	     $this->todaymoney = $this->getrecords("where uid='{$this->member['uid']}' and addtime='{$todaytime}'");
		 $this->yestodaymoney = $this->getrecords("where uid='{$this->member['uid']}' and addtime='{$yestodaytime}'");
		 $this->allmoney = $this->getrecords("where uid='{$this->member['uid']}'");

		 //系统公告
		 $where = "where id>'0'";
		 if($_GET['content']) $where .= " and title like '%{$_GET['content']}%'";
		 $this->t = _time('addtime',"and",'1');
		 $where .= $this->t['where'];	  
	     $this->pagetotal = $this->mysql->counts("select id from {$this->pre}news $where");
	     $this->pageclass($this->pagetotal);
	     $query = $this->mysql->query("select * from {$this->pre}news $where order by id desc {$this->page->limit}");
	     while($rs=$this->mysql->assoc($query)){
			$rs['url'] = rewrite::request("?mod=mobile&act=notice&type=list&id=".$rs['id']);
			$rs['typename'] = $this->mysql->value("{$this->pre}newstype","typename","id='{$rs['typeid']}'");
			$rs['addtime'] = formattime($rs['addtime']);

			$soContent = $rs['content'];
			$soImages = '~<img [^>]* />~';
			preg_match_all( $soImages, $soContent, $thePics );
			$allPics = count($thePics[0]);
			preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i',$thePics[0][0],$match);
			$rs['imgurl'] = $match[1];

			$this->record[] = $rs;
			}

		//首页展示代理商品
		$agentgoods = $this->mysql->select_one("select * from {$this->pre}goods");
	    	$tmp_group = $this->mysql->select_one("select * from {$this->pre}shop_group where goodid={$agentgoods['goods_id']} and groupid={$this->member['usergroup']['groupid']}");

	    	$agentgoods['minimum'] = 1;
	    	if(!$this->member['store'] && $this->member['usergroup']['sort']>1){
	    		$agentgoods['minimum'] = 0;
	    	}
	    	$agentgoods['rebate'] = $tmp_group['rebate'];
	    	$agentgoods['share_money'] = $tmp_group['share_money'];
	    	$agentgoods['bonus'] = $tmp_group['bonus'];
	    	$agentgoods['all_bonus'] = $tmp_group['bonus']*$agentgoods['minimum'];
	    	$agentgoods['wei_rate'] = 100;
	    	if($this->member['usergroup']['sort']>1){
	    		$agentgoods['wei_rate'] = 100- $agentgoods['ding_rate'];
	    	}

	    	$agentgoods['all_money'] = intval($record['agent_price'])*intval($agentgoods['unit_rate'])*intval($agentgoods['wei_rate'])*0.01*$agentgoods['minimum'];
	    	$agentgoods['re_money'] = $agentgoods['all_money'] - $agentgoods['all_bonus'];

	    	$str = $agentgoods['goods_thumb'];
	    	$agentgoods['detailurl'] = rewrite::request("?mod={$this->module}&act=product&id=".$agentgoods['goods_id']);
	    	if(strpos($str,',')){
    			preg_match('/([^,]+?),/i',$str,$match);
    			$agentgoods['picurl'] = $match[1];
			}else{
				$agentgoods['picurl'] = $agentgoods['goods_thumb'];
			}
			
			$agentgoods['goods_thumb'] = explode(',',$agentgoods['goods_thumb']);
 		    $this->agentgoods = $agentgoods;
		

    }	
	function treeform(){
	  $_GET['type'] = $_GET['type'] ? $_GET['type'] : "arrange";
	  if($_GET['type']=='arrange'){
  	    $this->tree = $_GET['uid'] ? $this->user->sql($_GET['uid']) : ($_GET['username'] ? $this->user->sql($_GET['username'],'username') : $this->member);		
		if($this->member['uid']!=$this->tree['uid']){
		   $__referee = explode(",",$this->tree['__referee']);
		   if(!in_array($this->member['uid'],$__referee)) $this->message('?mod=member&act=treeform','该会员不存在或非你市场内会员','0');
		}		
		    $this->tree['l'] = $this->user->sql($this->tree['_left'],'username');
		    $this->tree['c'] = $this->user->sql($this->tree['_centre'],'username');
		    $this->tree['r'] = $this->user->sql($this->tree['_right'],'username');
		    $this->tree['ll'] = $this->user->sql($this->tree['l']['_left'],'username');
		    $this->tree['lc'] = $this->user->sql($this->tree['l']['_centre'],'username');
		    $this->tree['lr'] = $this->user->sql($this->tree['l']['_right'],'username');		
		    $this->tree['cl'] = $this->user->sql($this->tree['c']['_left'],'username');
		    $this->tree['cc'] = $this->user->sql($this->tree['c']['_centre'],'username');
		    $this->tree['cr'] = $this->user->sql($this->tree['c']['_right'],'username');		
		    $this->tree['rl'] = $this->user->sql($this->tree['r']['_left'],'username');
		    $this->tree['rc'] = $this->user->sql($this->tree['r']['_centre'],'username');
		    $this->tree['rr'] = $this->user->sql($this->tree['r']['_right'],'username');
	  }

	  if($_GET['type']=='referee'){
		$referee = $_GET['referee'] ? $_GET['referee'] : $this->member['username'];
		$referee = $_GET['username'] ? $_GET['username'] : $referee;
  	    $this->myuser = $this->user->sql($referee,'username');		
		if(($this->member['uid']!=$this->myuser['uid'])&&!$_GET['referee']){
		   $__referee = explode(",",$this->myuser['__referee']);
		   if(!in_array($this->member['uid'],$__referee)) $this->message('?mod=member&act=treeform','该会员不存在或非你市场内会员','0');
		}	
	    $this->reuser = $this->user->getarr("select * from {$this->pre}user where referee='{$referee}' order by uid asc");
		if($_GET['referee']){
		  echo json($this->reuser);
		  exit;
		}
	  }
  	  if($_GET['type']=='register'){
  		if(submit()){
            if($this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
  		    $json['error'] = $this->verifyinsertuser($_POST);
  		  }else{
              $json['error'] = "支付密码错误，请检查";
  		  }
  		  $json['url'] = Purl("?mod=member&act=treeform&username=".$_POST['username']);
  		  echo json($json);
  		  exit;
  		}
  	    $position = $_GET['position'];
  	    $uid = $_GET['uid'];
  	    $this->_referee = $this->user->sql($uid);
  		$lastid = $this->mysql->value("{$this->pre}user","uid","uid>'0' order by uid desc limit 1");
  		$this->autouser =  "love".$lastid.rand(1000,9999);
  	  }
	  if($_GET['type']=='upgroup'){
	  	    $this->usergroup = $this->getselect('usergroup','groupid',"groupname",'where sort<'.$this->member['usergroup']['sort'],'order by groupid asc',"[<><请选择升级级别>]");
  	  	    if($_GET['re']=='ajax'){
  	  		    $json['error'] = '0';
  	            if(!$this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
  		  		   $json['error'] = "支付密码错误，请检查";
  	            }
  	  		    $arr['groupid'] = $_GET['groupid'];
  	            if($arr['groupid']==''){
  		  			  $json['error'] = '请选择升级级别';
  		  			  echo json($json);
  		  			  exit;
    	        }
  	  		    if(!is_array($usergroup = $this->mysql->select_one("select * from {$this->pre}usergroup where groupid='{$arr[groupid]}'"))){
  	  			  $json['error'] = '非法的会员级别';
  	  		      echo json($json);
  	  		      exit;
  	  		    }
  	  		    $child_num = $usergroup['children_num'];
  	  		    $usergroup = $this->mysql->getarr("select * from {$this->pre}user where groupid='{$this->member['groupid']}' and referee='{$this->member['username']}'");
  	  		    if(count($usergroup)<$child_num){
	    		   $json['error'] = '下线级别人数不够！';
	    	       echo json($json);
	    	       exit;
  	  		    }else{
  	  		    	$sort = intval($this->member['usergroup']['sort'])-1;
  	  		    	$newGroup = $this->mysql->select_one("select * from {$this->pre}usergroup where sort={$sort}");
  	 				$update['groupid'] = $newGroup['groupid'];
  	  		    	$this->user->update($update,$this->member[uid]);
  	  		    }
				echo json($json);
  	  	      	exit;
  	  	    }
	  }
	  if($_GET['type']=='record'){
	    $where =  "where referee='{$this->member['username']}'";
		if($_GET["time"]&&$_GET["timet"]){
		  $time = untime($_GET["time"]);  
		  $timet = untime($_GET["timet"]." 23:59"); 
		  $where .= " and regtime>='{$time}' and regtime<='{$timet}'";	
		  $this->time_str = $_GET["time"].",".$_GET["timet"];
	    }
	    $this->pagetotal = $this->mysql->counts("select uid from {$this->pre}user $where");
	    $this->pageclass($this->pagetotal);
	    $this->record = $this->user->getarr("select * from {$this->pre}user $where order by uid desc limit {$this->page->start},{$this->page->size}");
	  }
    }
	function vocational(){
	  if($_GET['type']=='ajax'){
        if($this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
		   $json['error'] = $this->status($_GET['uid']);
		}else{
           $json['error'] = "支付密码错误，请检查";
		}
		$json['url'] = Purl("?mod=member&act=treeform&username=".$_POST['username']);
		echo json($json);
		exit;
	  }
	  if($_GET['type']=='upgroup'){
  	  	    $this->usergroup = $this->getselect('usergroup','groupid',"groupname",'where sort<'.$this->member['usergroup']['sort'],'order by groupid asc',"[<><请选择升级级别>]");
  	  	    if($_GET['re']=='ajax'){
  	  		    $json['error'] = '0';
  	            if(!$this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
  		  		   $json['error'] = "支付密码错误，请检查";
  	            }
  	  		    $arr['groupid'] = $_GET['groupid'];
  	            if($arr['groupid']==''){
  		  			  $json['error'] = '请选择升级级别';
  		  			  echo json($json);
  		  			  exit;
    	        }
  	  		    if(!is_array($usergroup = $this->mysql->select_one("select * from {$this->pre}usergroup where groupid='{$arr[groupid]}'"))){
  	  			  $json['error'] = '非法的会员级别';
  	  		      echo json($json);
  	  		      exit;
  	  		    }
  	  		    $child_num = $usergroup['children_num'];
  	  		   
  	  		    $usergroup = $this->mysql->getarr("select * from {$this->pre}user where groupid='{$this->member['groupid']}' and referee='{$this->member['username']}'");

  	  		    if(count($usergroup)<$child_num){
	    		   $json['error'] = '下线级别人数不够！';
	    	       echo json($json);
	    	       exit;
  	  		    }else{
  	  		    	$sort = intval($this->member['usergroup']['sort'])-1;
  	  		    	$newGroup = $this->mysql->select_one("select * from {$this->pre}usergroup where sort={$sort}");
  	 				$update['groupid'] = $newGroup['groupid'];
  	  		    	$this->user->update($update,$this->member[uid]);
  	  		    }
				echo json($json);
  	  	      	exit;
  	  	    }
  	  }
  	  if($_GET['type']=='register'){
  		if(submit()){
            if($this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
  		    $json['error'] = $this->verifyinsertuser($_POST);
  		  }else{
              $json['error'] = "支付密码错误，请检查";
  		  }
  		  $json['url'] = Purl("?mod=member&act=treeform&username=".$_POST['username']);
  		  echo json($json);
  		  exit;
  		}
  	    $position = $_GET['position'];
  	    $uid = $_GET['uid'];
  	    $this->_referee = $this->user->sql($uid);
  		$lastid = $this->mysql->value("{$this->pre}user","uid","uid>'0' order by uid desc limit 1");
  		$this->autouser =  "love".$lastid.rand(1000,9999);
  	  }
	  if($this->member['status']=='0') $this->message('go_back','对不起，未开通会员不能进行操作','0');
	  
	}
	function capital(){
	  if($_GET['type']=='list'){
		$_GET['method'] = $_GET['method'] ? $_GET['method'] : "main";
		if($_GET['method']=='main'){
		   $where = "where uid='{$this->member['uid']}'";
		   if($_GET["time"]&&$_GET["timet"]){
		     $time = untime($_GET["time"]);  
		     $timet = untime($_GET["timet"]." 23:59"); 
		     $where .= " and addtime>='{$time}' and addtime<='{$timet}'";	
		     $this->time_str = $_GET["time"].",".$_GET["timet"];
	       }
		   if($_GET["content"]) $where .= " and content like '{$_GET[content]}%'";	  
		   $this->pagetotal = $this->mysql->counts("select id from {$this->pre}log $where and parentid='0'");
		   $this->pageclass($this->pagetotal);
		   $query = $this->mysql->query("select * from {$this->pre}log $where and parentid='0' order by id desc {$this->page->limit}");
	       while($rs=$this->mysql->assoc($query)){
		     $q = $this->mysql->query("select * from {$this->pre}log where parentid='{$rs['id']}'");
	         while($r=$this->mysql->assoc($q)){
			   $rs[$r['typeid']] = $r;
	         }
		     $rs[$rs['typeid']] = $rs;
	         $this->record[] = $rs;
	       }
           $todaytime = untime(formattime(time(),'Y-m-d'));
           $yestodaytime = untime(formattime(time()-24*3600,'Y-m-d')); 
           $this->todaymoney = $this->getrecords("where uid='{$this->member['uid']}' and addtime='{$todaytime}'");
	       $this->yestodaymoney = $this->getrecords("where uid='{$this->member['uid']}' and addtime='{$yestodaytime}'");
	       $this->allmoney = $this->getrecords("where uid='{$this->member['uid']}'");	  
		}
	    if($_GET['method']=='money'||$_GET['method']=='regmoney'||$_GET['method']=='shopmoney'||$_GET['method']=='balance'){
           switch ($_GET['method']){
             case 'money':
               $typeid = "1";
               break;
             case 'regmoney':
               $typeid = "2";
               break;
             case 'shopmoney':
               $typeid = "3";
               break;
             default:
               $typeid = "4";
           }
		   $where = "where uid='{$this->member['uid']}'";		   
		   $this->t = _time('addtime','and');
		   $where .= $this->t["where"];
		   if($_GET["content"]) $where .= " and content like '{$_GET[content]}%'";	 
	       $this->pagetotal = $this->mysql->counts("select id from {$this->pre}log $where  and typeid='{$typeid}'");
	       $this->pageclass($this->pagetotal);
	       $this->record = $this->mysql->getarr("select * from {$this->pre}log $where and typeid='{$typeid}' order by id desc limit {$this->page->start},{$this->page->size}");
		   
		   
		  $partarr = $this->getchatdate($this->t['timet'],$this->t['time']);
		  for($i=0;$i<=$partarr['step'];$i++){
			$parttime = dateadd($partarr['part'],$i,$partarr['time']);  
			$formattime = formattime(untime($parttime),$partarr['format']);
			$addtime = '"'.$formattime.'"';
			$addkey = untime($formattime);
			if(!in_array($addtime,$categories)){
			  $categories[$addkey] = $addtime;
			}
			$record = $this->getrecords("where FROM_UNIXTIME(addtime,'".$partarr['_format']."')='".$formattime."'");
			$inmoney[$addkey] = $record['inmoney'];
			$outmoney[$addkey] = $record['outmoney'];
		  }
		  $this->categories = implode(',',$categories);
		  $this->inmoney = implode(",",$inmoney);
		  $this->outmoney = implode(",",$outmoney);
		  $this->allmoney = $this->getrecords($where);
	    }	
	  } 
    }	
	function goods(){
	    if($_GET['type']=='order'){
	    	if($_GET['id']){
		  	    $this->order = $this->mysql->select_one("select * from {$this->pre}order where id='{$_GET['id']}' order by id desc limit 1");
			    if(!is_array($this->order)) {
			    	location("?mod=member&act=goods&type=order");
			    }
			    $this->order['goods'] = unserialize($this->order['goods']);
			    $this->order['delivery'] = unserialize($this->order['delivery']);
			    if(!$this->member['usergroup']['buy_way']){
			    	//取总部账号
			    }else{
			    	//取上级代理的账号
			    }
			    print_r($this->member);
		    }else{
	            $where = "where uid='{$this->member['uid']}'";
		        if($_GET['method']){
				    $checked = '0';
				    if($_GET['method']=='yespay') $checked = '1';
				    if($_GET['method']=='yesdeal') $checked = '2';
				    if($_GET['method']=='backnow') $checked = '3';
				    if($_GET['method']=='backed') $checked = '4';
				    if($_GET['method']=='yessend') $checked = '5';
				    $where .= " and checked='{$checked}'";
		        }
			  	if($_GET['orderid']) $where .= " and orderid like '{$_GET['orderid']}%'";
				    $this->t = _time('addtime',"and",'1');
				    $where .= $this->t['where'];	
			        $this->pagetotal = $this->mysql->counts("select id from {$this->pre}order $where");
			        $this->pageclass($this->pagetotal);
			        $query = $this->mysql->query("select * from {$this->pre}order $where order by id desc {$this->page->limit}");
			        while($rs=$this->mysql->assoc($query)){
					    $rs['goods'] = unserialize($rs['goods']);
						$rs['addtime'] = formattime($rs['addtime']);
				        $this->order[] = $rs;
			        }
		      	}
		}
	    if($_GET['type']=='list'){
			if($_GET['re']=='ajax'){
			  if($_GET['do']=='remove'){
			    $this->mysql->delete("{$this->pre}delivery","id='{$_GET['id']}' and uid='{$this->member['uid']}'");
			    $json['error'] = 0;
		        echo json($json);
			    exit;
			  }
			}
			if(submit()){
	          if($this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
				$json['error'] = $this->goodsorder($_POST);
				$json['message'] = '订单提交成功，请付款';
				if(is_numeric($json['error'])){				
				  $json['url'] = Purl('?mod=member&act=goods&type=order&id='.$json['error']); 
				  $json['error'] = '0';
				}
			  }else{
	            $json['error'] = "支付密码错误，请检查";
			  }
			  echo json($json);		
			  exit;	
			}
			$group = $this->mysql->getarr("select groupid,groupname from {$this->pre}usergroup where is_agents=1 order by sort asc");
			$group = $this->array_bind_key($group,'groupid');
			$tmp_group = $this->mysql->getarr("select * from {$this->pre}shop_group");
			foreach ($tmp_group as $key => $value) {
				$tmp_group[$key]['allprice'] = $value['price']*$value['minimum'];
				$price = $value['price'];
			}
			foreach ($tmp_group as $key => $value) {
				$value['groupname'] = $group[$value['groupid']]['groupname'];

				$tem_arr[$value['goodid']][$value['groupid']] = $value;
			}

			$this->group = $groupData;
			$this->delivery = $this->mysql->getarr("select * from {$this->pre}delivery where uid='{$this->member['uid']}'");
		    $this->pagetotal = $this->mysql->counts("select goods_id from {$this->pre}goods $where");
		    $record = $this->sqlgoods("select * from {$this->pre}goods $where order by goods_id desc {$this->page->limit}");
		    foreach ($record as $key => $value) {
		    	$record[$key]['detail'] = $tem_arr[$value['goods_id']];
		    	$record[$key]['price'] = $price;
		    }
		    $this->record = $record;
		    $this->pageclass($this->pagetotal);
	    }
	}
	function user(){
		if(submit()){
			$this->submit = true;
		    if($_GET['type']=='profile'){
	          $arr['truename'] = $_POST['truename'];
			  if($arr['truename']=='') $this->message('member_user','会员姓名不能为空','0');
	          $this->user->update($arr,$this->member[uid]);
	          $this->message('member_user','基本信息修改成功','1');		
		    }
		    if($_GET['type']=='password'){
			  if($_GET['method']==''){
			     $arr['password'] = $_POST['password'];
			     if($_POST['oldpassword']=='') $this->message('go_back','对不起，请输入原始密码','0'); 
			     if(!$this->user->checkpassword($_POST['oldpassword'])) $this->message('go_back','对不起，原始密码不正确','0'); 
		 	     if($arr['password']=='') $this->message('go_back','对不起，请输入新的密码','0'); 
			     if($arr['password']!=$_POST['cpassword']) $this->message('go_back','对不起，两次输入密码不一致','0'); 
			     $this->user->update($arr,$this->member['uid']);
				 $this->user->dropuser();
			     $this->message('member_login','密码已修改，请重新登录');
			  }
			  if($_GET['method']=='paypasswd'){
			     $arr['repass'] = $_POST['password'];
			     if($_POST['oldpassword']=='') $this->message('go_back','对不起，请输入原始支付密码','0'); 
			     if(!$this->user->checkpassword($_POST['oldpassword'],1)) $this->message('go_back','对不起，原始支付密码不正确','0'); 
		 	     if($arr['repass']=='') $this->message('go_back','对不起，请输入新的支付密码','0'); 
			     if($arr['repass']!=$_POST['cpassword']) $this->message('go_back','对不起，两次输入密码不一致','0'); 
			     $this->user->update($arr,$this->member[uid]);
			     $this->message('member_user','恭喜您，二级密码修改成功');
	 		  }  
		    }
		    if($_GET['type']=='authphone'){
			  if($this->member['mcheck']){
			    if($_POST['checkcode']=='') $this->message("go_back",'对不起，请输入原手机验证码。','0');
				if($_POST['phonecode']=='') $this->message("go_back",'对不起，请输入新手机验证码。','0');
	            if($this->member['msalt']!=$_POST['checkcode']) $this->message("go_back",'对不起，原手机验证码有误。','0');
				if($this->member['newmsalt']!=$_POST['phonecode']) $this->message("go_back",'对不起，新手机验证码有误。','0');
			    if($this->member['newphone']!=$_POST['newphone']) $this->message("go_back",'对不起，数据出错。','0');
			    $arr['userphone'] = $_POST['newphone'];
				$arr['newphone'] = '';
				$arr['mtime'] = 1;
				$arr['msalt'] = '';
				$arr['newmsalt'] = '';
			    $this->user->update($arr,$this->member[uid]);
			    $this->message("?mod=member&act=user&type=authphone",'恭喜你，手机修改绑定成功');
			  }else{
			    if($_POST['checkcode']=='') $this->message("go_back",'对不起，请输入验证码。','0');
	            if($this->member['msalt']!=$_POST['checkcode']) $this->message("go_back",'对不起，你输入的验证码有误。','0');
			    if($this->member['userphone']!=$_POST['userphone']) $this->message("go_back",'对不起，数据出错。','0');
			    $arr['mcheck'] = 1;
				$arr['mtime'] = 1;
				$arr['msalt'] = '';
				$arr['newmsalt'] = '';
			    $this->user->update($arr,$this->member[uid]);
			    $this->message("?mod=member&act=user&type=authphone",'恭喜你，手机绑定成功');
			  }
		    }
		    if($_GET['type']=='authemail'){
				if($this->member['echeck']) $this->message('go_back','已经完成认证，请勿重复认证！','0');
			    $salt = $this->user->salt();
				$this->user->update(array("email"=>$_POST['email']),$this->member['uid']);
				$arr['email'] = $_POST['email'] ? $_POST['email'] : $this->member['email'];
			    $arr['authemail'] = $this->user->password($salt,$this->member['salt']);
				if($this->user->checkemail($arr['email'])) $this->message('go_back','该邮箱已绑定，请更换其他邮箱！','0');				
	            $this->mysql->update("{$this->pre}user",$arr,"uid='{$this->member[uid]}'");
			    $authemailurl = config::get("sitedomain").Purl("?mod=member&act=authemail&uid={$this->member[uid]}&salt={$salt}");
			    $this->emailurl = 'http://mail.'.substr($arr['email'],strpos($arr['email'],'@')+1);
		        $subject = config::get('sitename').'邮箱认证';		
			    $body = "<div style='line-height:1.5;font-size:14px;margin-bottom:15px;color:#4d4d4d;'>";
			    $body .= "<strong style='display:block;margin-bottom:15px;'>";
			    $body .= "亲爱的会员：{$this->member['username']} 您好！</strong><p>您已于 ".formattime(time())." 进行邮箱认证操作。</p></div>";
			    $body .= "<div style='margin-bottom:20px;'><strong style='display:block;margin-bottom:20px;font-size:14px;'>";
			    $body .= "<a target='_blank' style='color:#f60;' href='{$authemailurl}'>点此进行认证</a></strong>";
			    $body .= "<p style='color:#666;'><small style='display:block;font-size:12px;margin-bottom:5px;'>";
			    $body .= "如果上述文字点击无效，请把下面网页地址复制到浏览器地址栏中打开：  </small><span style='color:#666;'>";
			    $body .= "<a target='_blank' href='{$authemailurl}'> {$authemailurl} </a></span></p></div>";		
		        sendmail($arr['email'],$subject,$body,$this->member['username']); 
		    }

		    if($_GET['type']=='address'){
		    	$id = $_GET['id'];
		    	$arr = $_POST;
		    	$uid = $this->member['uid'];
		    	$arr['uid'] = $uid;
		    	unset($arr['opcardbutton']);
		    	if($id){
    				  $message = '编辑角色成功';
    				  if($arr['is_default'] == 1){
    				  	$all = $this->mysql->getarr("select * from {$this->pre}delivery where uid=$uid");
    				  	foreach ($all as $key => $value) {
				  			if($value['id'] == $id){
				  				$this->mysql->update("{$this->pre}delivery",$arr,"id='$id'"); 
				  			}else{
				  				$value['is_default'] = 0;
				  				$this->mysql->update("{$this->pre}delivery",$value,"id='$value[id]'"); 
				  			}
    				  		
    				  	}   
    				  }
    	             
    			    }else{
    				  $message = '添加角色成功';
    	              $this->mysql->insert("{$this->pre}delivery",$arr); 
    			    }
    			    $this->message('member_user',$message,'1');		
		    }	
		}else{
		    if($_GET['type']=='address'){
		    	$id = $_GET['id'];
		    	if ($_GET['method'] == 'list') {
		    		$uid = $this->member['uid'];
		    		$this->record = $this->mysql->getarr("select * from {$this->pre}delivery where uid=$uid");   
		    	}
			    if ($_GET['method'] == 'add') {
			    	if($id){
			    		$uid = $this->member['uid'];
			    		$this->detail = $this->mysql->select_one("select * from {$this->pre}delivery where id=$id");  
			    	}
			    	
			    }
		    }	
		}

    }
	function authemail(){
	  $uid = $_GET['uid'];
	  $salt = $_GET['salt'];
	  $user = $this->mysql->select_one("select * from {$this->pre}user where uid='{$uid}'");
	  $authemail = $this->user->password($salt,$user['salt']);
	  if($authemail!=$user['authemail']||$user['echeck']=='1') $this->message("?mod=member&act=user&type=authemail",'你的认证地址已经失效','0');
	  $arr['authemail'] = '';
      $arr['echeck'] = 1;
      $this->mysql->update("{$this->pre}user",$arr,"uid='{$user[uid]}'");
	  $this->message('?mod=member&act=user&type=authemail','恭喜你，邮箱认证成功');
	}
    function login(){
      if(is_array($this->member)) location('mobile');
	  $_SESSION['seccode'] = $_POST['seccode'] = '5588';
      if(submit()) $this->user->login($_POST['username'],$_POST['password'],$_POST['seccode']);
    }	
    function logout(){
      $this->user->logout('mobile_login',"恭喜您，用户注销成功");
      location("?mod=mobile&act=login");

    }
    function forgotpassword(){

      if(is_array($this->member)) location('member');
      if(submit()){
		if($_GET['do']=='mobile'){
		  $user = $this->user->sql($_POST['userphone'],'userphone');
		  if(!is_array($user)) $this->message("go_back",'对不起，该手机号码不存在或未绑定。','0');
          if($user['msalt']!=$_POST['checkcode']) $this->message("go_back",'对不起，手机验证码有误。','0');		  
          if($_POST['password']=='') $this->message("go_back",'登录密码不能为空','0');
          if(strlen($_POST['password'])<6) $this->message("go_back",'密码长度不能小于6','0');
          if($_POST['cpassword']=='') $this->message("go_back",'重复密码不能为空','0');
          if($_POST['cpassword']!=$_POST['password']) $this->message("go_back",'两次输入密码不一致','0');
		  $arr['mtime'] = 1;
		  $arr['msalt'] = '';
          $arr['password'] = $this->user->password($_POST['password'],$user['salt']);
          $this->mysql->update("{$this->pre}user",$arr,"uid='{$user[uid]}'");
          $this->message('member_login','密码重置成功');
		}else{
          $email = $_POST['email'];
          $seccode = $_POST['seccode'];
          $user = $this->mysql->select_one("select * from {$this->pre}user where email='{$email}'");
          if(config::get("mustcode")){
            if($seccode=='') $this->message("go_back",'验证码不能为空','0');  
            if($seccode!=$_SESSION['seccode']) $this->message("go_back",'验证码不正确','0');
          }
          if(!is_array($user)) $this->message('go_back','邮箱不存在','0');
          $salt = $this->user->salt();
          $arr['forgotpassword'] = $this->user->password($salt,$user['salt']);
          $this->mysql->update("{$this->pre}user",$arr,"uid='{$user[uid]}'");
          $forgotpasswordurl = config::get("sitedomain").Purl("?mod=member&act=resetpassword&uid={$user[uid]}&salt={$salt}");
          $this->emailurl = 'http://mail.'.substr($email,strpos($email,'@')+1);
          $subject = config::get('sitename').'密码找回';		
          $body = "<div style='line-height:1.5;font-size:14px;margin-bottom:15px;color:#4d4d4d;'>";
          $body .= "<strong style='display:block;margin-bottom:15px;'>";
          $body .= "亲爱的会员：{$user['username']}您好！</strong><p>您已于 ".formattime(time())." 进行密码找回操作。</p></div>";
          $body .= "<div style='margin-bottom:20px;'><strong style='display:block;margin-bottom:20px;font-size:14px;'>";
          $body .= "<a target='_blank' style='color:#f60;' href='{$forgotpasswordurl}'>点此找回密码</a></strong>";
          $body .= "<p style='color:#666;'><small style='display:block;font-size:12px;margin-bottom:5px;'>";
          $body .= "如果上述文字点击无效，请把下面网页地址复制到浏览器地址栏中打开：  </small><span style='color:#666;'>";
          $body .= "<a target='_blank' href='{$forgotpasswordurl}'> {$forgotpasswordurl} </a></span></p></div>";		
          sendmail($user['email'],$subject,$body,$user['username']);
          $this->submit = true;
		}
      }
    }	
	function resetpassword(){
      if(is_array($this->member)) location('member');
      $uid = $_GET['uid'];
      $salt = $_GET['salt'];
      $user = $this->mysql->select_one("select * from {$this->pre}user where uid='{$uid}'");
      $this->username = $user['username'];
      $forgotpassword = $this->user->password($salt,$user['salt']);
      if($forgotpassword!=$user['forgotpassword']) location('member_forgotpassword');
      if(submit()){
        $arr['forgotpassword'] = '';
        $arr['password'] = $this->user->password($_POST['password'],$user['salt']);
        $this->mysql->update("{$this->pre}user",$arr,"uid='{$user[uid]}'");
        $this->message('member_login','密码重置成功');
      }
    }
    function bankcard(){
	  $id = $_GET['id'];
	  if($_GET['do']=='del'){
		$this->mysql->delete("{$this->pre}atmbank","id='{$_GET['id']}' and uid='{$this->member['uid']}'");
		$arr['error'] = '0';
		echo json($arr);
		exit;
	  }elseif($_GET['do']=='list'){
		$query = $this->mysql->query("select * from {$this->pre}atmbank where uid='{$this->member['uid']}'");
	    while($rs=$this->mysql->assoc($query)){
		  $rs['bankimages'] = bankimages($rs['bankname']);
		  $arr[] = $rs;
	    }
		echo json($arr);
		exit;
	  }else{
        if(submit()){
		  $arr['truename'] = sintrim($_POST['truename']);
		  $arr['bankadd'] = sintrim($_POST['bankadd']);
		  $arr['bankname'] = sintrim($_POST['bankname']);
		  $arr['bankcard'] = sintrim($_POST['bankcard']);
		  $arr['uid'] = $this->member['uid'];
		  if($id){
            $this->mysql->update("{$this->pre}atmbank",$arr,"id='$id'"); 
		  }else{
            $this->mysql->insert("{$this->pre}atmbank",$arr); 
		  }
		  $this->js("parent.pagereload()");
		  exit;
	    } 
        $this->bank = $this->mysql->select_one("select * from {$this->pre}atmbank where uid='{$this->member['uid']}' and id='{$id}'");
	    if(!is_array($this->bank)&&$id) $this->message('go_back','对不起，该银行信息不存在','0');	
	  }
    }
	function imessage(){
	   $_GET['method'] = $_GET['method'] ? $_GET['method'] : 'sendfrom';
	   
	   if($_GET['method']=='sendfrom'){
		  $where = "where uid='{$this->member['uid']}' and type='2' and isdel='0'";
		  if($_GET['content']) $where .= " and content like '%{$_GET['content']}%'";
		  $this->t = _time('addtime',"and",'1');
		  $where .= $this->t['where'];	  
	      $this->pagetotal = $this->mysql->counts("select id from {$this->pre}message $where");
	      $this->pageclass($this->pagetotal);
	      $query = $this->mysql->query("select * from {$this->pre}message $where order by checked asc,id desc {$this->page->limit}");
	      while($rs=$this->mysql->assoc($query)){
			$rs['ico'] = $rs['checked'] ? '1' : '0';
			$rs['checked'] = $rs['checked']=='0' ? '未读' : '已读';
			$rs['addtime'] = formattime($rs['addtime']);
			$this->record[] = $rs;
	      }
	   }
	   if($_GET['method']=='sendto'){
		  $where = "where uid='{$this->member['uid']}' and type='1' and isdel='0'";
		  if($_GET['content']) $where .= " and content like '%{$_GET['content']}%'";
		  $this->t = _time('addtime',"and",'1');
		  $where .= $this->t['where'];	  
	      $this->pagetotal = $this->mysql->counts("select id from {$this->pre}message $where");
	      $this->pageclass($this->pagetotal);
	      $query = $this->mysql->query("select * from {$this->pre}message $where order by checked asc,id desc {$this->page->limit}");
	      while($rs=$this->mysql->assoc($query)){
			$rs['ico'] = 'from';
			$rs['checked'] = $rs['checked']=='0' ? '未读' : '已读';
			$rs['addtime'] = formattime($rs['addtime']);
			$this->record[] = $rs;
	      }
	   }
	   if($_GET['method']=='send'){
          if(submit()){
		    $arr['title'] = $_POST['title'];
		    $arr['content'] = $_POST['content'];
			if($arr['title']=='') $this->message('go_back',"请填写信件主题");
			if($arr['content']=='') $this->message('go_back',"请填写信件内容");
		    $arr['uid'] = $this->member['uid'];
		    $arr['type'] = '1';
		    $arr['addtime'] = time();
            $this->mysql->insert("{$this->pre}message",$arr); 
		    $this->message('?mod=member&act=imessage&type=sendto','信件发送成功');
	      } 
	   }
	   if($_GET['method']=='ajax'){
          $message = $this->mysql->select_one("select * from {$this->pre}message where id='{$_GET['id']}' and uid='{$this->member['uid']}' and isdel='0'");
		  $this->mysql->query("update {$this->pre}message set checked='1' where id='{$_GET[id]}' and uid='{$this->member['uid']}' and type='2' and isdel='0'");
		  $message['error'] = '0';
		  $message['read'] = $this->mysql->counts("select id from {$this->pre}message where uid='{$this->member['uid']}' and checked='0' and type='2' and isdel='0'");
		  echo json($message);
		  exit;
	   }
	   if($_GET['re']=='ajax'){
		  if($_GET['do']=='remove'){
			 $this->mysql->query("update {$this->pre}message set isdel='1' where id='{$_GET[id]}' and uid='{$this->member['uid']}'");
		     $arr['error'] = 0;
	         echo json($arr);
		  }
		  exit;
	   }
	}
	function notice(){
	   $_GET['type'] = $_GET['type'] ? $_GET['type'] : 'list';
	   if($_GET['type']=='list'){
		  $where = "where id>'0'";
		  if($_GET['typeid']) $where .= " and typeid='{$_GET['typeid']}'";
		  if($_GET['content']) $where .= " and title like '%{$_GET['content']}%'";
		  $this->t = _time('addtime',"and",'1');
		  $where .= $this->t['where'];	  
	      $this->pagetotal = $this->mysql->counts("select id from {$this->pre}news $where");
	      $this->pageclass($this->pagetotal);
	      $query = $this->mysql->query("select * from {$this->pre}news $where order by id desc {$this->page->limit}");
	      while($rs=$this->mysql->assoc($query)){
			$rs['url'] = rewrite::request("?mod=mobile&act=notice&type=show&id=".$rs['id']);
			$rs['typename'] = $this->mysql->value("{$this->pre}newstype","typename","id='{$rs['typeid']}'");
			$rs['addtime'] = formattime($rs['addtime']);
			$soContent = $rs['content'];
			$soImages = '~<img [^>]* />~';
			preg_match_all( $soImages, $soContent, $thePics );
			$allPics = count($thePics);
			preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i',$thePics[0][0],$match);
			$rs['imgurl'] = $match[1];
			$rs['detailurl'] = rewrite::request("?mod={$this->module}&act=noticedetail&type=show&id=".$rs['id']);
			$this->record[] = $rs;
	      }

	      $this->newstype = $this->getnewstype(10);

	      $this->countNewsType = count($this->newstype)+1;
	   }
	   //echo "<pre>";print_r($this->countNewsType);exit;
	}

	//公告详情
	function noticedetail(){
		if($_GET['type']=='show'){
		  $this->mysql->query("update {$this->pre}news set clicknumber=clicknumber+1 where id='{$_GET[id]}'");
	      $this->news = $this->mysql->select_one("select * from {$this->pre}news where id='{$_GET[id]}' ");  
	      $this->news['addtime'] = formattime($this->news['addtime']);
	      $this->news['typename'] = $this->mysql->value("{$this->pre}newstype","typename","id='{$this->news['typeid']}'");
	      if(!is_array($this->news)) $this->message('go_back','对不起，该信息不存在');
	      $this->newstype = $this->mysql->select_one("select * from {$this->pre}newstype where id='{$this->news['typeid']}'"); 
		  $_GET['typeid'] = $this->news['typeid'];

		  //随机取出三条公告
		  $where = "where id>'0'";
		  $query = $this->mysql->query("select * from {$this->pre}news $where order by id desc {$this->page->limit}");
	      while($rs=$this->mysql->assoc($query)){
			$rs['url'] = rewrite::request("?mod=mobile&act=notice&type=show&id=".$rs['id']);
			$rs['typename'] = $this->mysql->value("{$this->pre}newstype","typename","id='{$rs['typeid']}'");
			$rs['addtime'] = formattime($rs['addtime']);
			$soContent = $rs['content'];
			$soImages = '~<img [^>]* />~';
			preg_match_all( $soImages, $soContent, $thePics );
			$allPics = count($thePics);
			preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i',$thePics[0][0],$match);
			$rs['imgurl'] = $match[1];
			$rs['detailurl'] = rewrite::request("?mod={$this->module}&act=noticedetail&type=show&id=".$rs['id']);
			$this->record[] = $rs;
	      }

	      foreach ($this->record as $key => $value) {
	      	  if ($value['id'] == $this->news['id'] ) {
	      	  	 	unset($this->record[$key]);
	      	  	 }	 
	      }

	      $newsCount = count($this->record);
	      if ($newsCount>3) {
	      	shuffle($this->record);
	      	$this->detailNewsList = array_slice($this->record,1,3);
	      }else{
	      	$this->detailNewsList = $this->record;
	      }

	      //echo "<pre>";print_r($this->detailNewsList);exit;

	   }
	}


	function about(){
	   $_GET['type'] = $_GET['type'] ? $_GET['type'] : 'show';
	   if($_GET['type']=='show'){
	      $where = $_GET['typeid'] ? "where typeid='{$_GET['typeid']}'" : (isNumber($_GET['id']) ? "where id='{$_GET[id]}'" : "where myurl='{$_GET[id]}'");
	      $this->about = $this->mysql->select_one("select * from {$this->pre}about $where limit 1");
	      if(!is_array($this->about)) errorpage();
	   }
	}
	function delivery(){
	  $id = $_GET['id'];
	  if(!is_array($this->member)) $this->ajaxAlert('对不起，没有登陆不能进行操作！');
	  $takenumber = $this->mysql->counts("select * from {$this->pre}delivery where uid='{$this->member['uid']}'");
	  if($takenumber>=5&&!$id) $this->ajaxAlert('对不起，最多可添加5个常用收货信息！');
	  $this->add = $this->mysql->select_one("select * from {$this->pre}delivery where id='$id' and uid='{$this->member['uid']}'");
	  if(!is_array($this->add)&&$id) $this->ajaxAlert('对不起，该收货信息不存在');
	  if(submit()){
		$this->error='ok';
		if($_POST['name']==''){
          $this->error='请填写收货人姓名';
        }elseif($_POST['address']==''){
          $this->error='请填写收货详细地址';	
		}elseif($_POST['mobile']==''){
          $this->error='请填写收收货人手机';	
		}
		if($this->error=='ok'){
		  $arr['name'] = $_POST['name'];
		  $arr['address'] = $_POST['address'];
		  $arr['mobile'] = $_POST['mobile'];
		  if($id){
		    $this->mysql->update("{$this->pre}delivery",$arr,"id='{$id}'");
		    $arr['id'] = $id;
		  }else{
		    $arr['uid'] = $this->member['uid'];
		    $this->mysql->insert("{$this->pre}delivery",$arr);
		    $arr['id'] = $this->mysql->insertid();
		  }
		  echo "<script type='text/javascript'>\r\n";  
		  echo 'parent.'.$_GET['refun'].'('.json($arr).');'."\r\n";
		  echo "</script>";
		  exit;	
		}
	  }
	}

	//收入详情
	function incomedetail(){
		$todaytime = untime(formattime(time(),'Y-m-d'));
      	$yestodaytime = untime(formattime(time()-24*3600,'Y-m-d')); 
      	$this->todaymoney = $this->getrecords("where uid='{$this->member['uid']}' and addtime='{$todaytime}'");
	  	$this->yestodaymoney = $this->getrecords("where uid='{$this->member['uid']}' and addtime='{$yestodaytime}'");
	  	$this->allmoney = $this->getrecords("where uid='{$this->member['uid']}'");

	  	//echo "<pre>";print_r($this->allmoney);exit;
	}

	//产品
	function product(){
		$data = $_GET;

		//产品数据
		$agentgoods = $this->mysql->select_one("select * from {$this->pre}goods");
		if ($data['id']) {
			$tmp_group = $this->mysql->select_one("select * from {$this->pre}shop_group where goodid={$data['id']} and groupid={$this->member['usergroup']['groupid']}");
		}else{
			$tmp_group = $this->mysql->select_one("select * from {$this->pre}shop_group where groupid={$this->member['usergroup']['groupid']}");
		}
	    	

	    	$agentgoods['minimum'] = 1;
	    	if(!$this->member['store'] && $this->member['usergroup']['sort']>1){
	    		$agentgoods['minimum'] = 0;
	    	}
	    	$agentgoods['rebate'] = $tmp_group['rebate'];
	    	$agentgoods['share_money'] = $tmp_group['share_money'];
	    	$agentgoods['bonus'] = $tmp_group['bonus'];
	    	$agentgoods['all_bonus'] = $tmp_group['bonus']*$agentgoods['minimum'];
	    	$agentgoods['wei_rate'] = 100;
	    	if($this->member['usergroup']['sort']>1){
	    		$agentgoods['wei_rate'] = 100- $agentgoods['ding_rate'];
	    	}

	    	$agentgoods['all_money'] = intval($agentgoods['agent_price'])*intval($agentgoods['unit_rate'])*intval($agentgoods['wei_rate'])*0.01*$agentgoods['minimum'];
	    	$agentgoods['re_money'] = $agentgoods['all_money'] - $agentgoods['all_bonus'];
	    	$str = $agentgoods['goods_thumb'];
	    	if(strpos($str,',')){
    			preg_match('/([^,]+?),/i',$str,$match);
    			$agentgoods['picurl'] = $match[1];
			}else{
				$agentgoods['picurl'] = $agentgoods['goods_thumb'];
			}
	    	//echo "<pre>";print_r($agentgoods);exit;
		    $this->agentgoods = $agentgoods;
		
	}

	//订单列表
	function order(){
		if(!$_GET['id']){
		    $where = "where uid='{$this->member['uid']}'";
			if($_GET['method']){
				$checked = '0';
				if($_GET['method']=='yespay') $checked = '1';
				if($_GET['method']=='yesdeal') $checked = '2';
				if($_GET['method']=='backnow') $checked = '3';
				if($_GET['method']=='backed') $checked = '4';
				if($_GET['method']=='yessend') $checked = '5';
				$where .= " and checked='{$checked}'";
			}
			if($_GET['orderid']) $where .= " and orderid like '{$_GET['orderid']}%'";
			 	$this->t = _time('addtime',"and",'1');
			    $where .= $this->t['where'];	
		        $this->pagetotal = $this->mysql->counts("select id from {$this->pre}order $where");
		        $this->pageclass($this->pagetotal);
		        $query = $this->mysql->query("select * from {$this->pre}order $where order by id desc {$this->page->limit}");
		        while($rs=$this->mysql->assoc($query)){
					$rs['addtime'] = formattime($rs['addtime']);
			        $this->order[] = $rs;
		    }
	    }
	    $agentgoods = $this->mysql->select_one("select * from {$this->pre}goods");
	    $str = $agentgoods['goods_thumb'];
	    if(strpos($str,',')){
    		preg_match('/([^,]+?),/i',$str,$match);
		}
		$this->goodspic = $match[1];
	}

	//订单提交
	function subOrder(){
		if ($_POST) {
			if($_POST['number']<1){
			echo "<script>alert('请输入正确的订购数量！');window.history.go(-1);</script>";
			exit;
			}
			
			$id = $this->goodsorder($_POST);
			echo json(rewrite::request('?mod=mobile&act=orderDetail&id='.$id));		
			exit; 
		}
	}

	//订单详情
	function orderDetail()
	{
		if ($_GET['id']) {
			if(submit()){
			if (!$_FILES['upload']['tmp_name']) {
	   			echo "<script>alert('请选择上传凭证');window.history.go(-1);</script>";		
	   			exit;
			}else{
				$data['mychatpath'] = 'goods';
				$data['imgcut'] = '1';
				$re = $this->upload($data);
				echo "<pre>";print_r($re);exit;
			}

			$this->order = $this->mysql->select_one("select * from {$this->pre}order where id='{$_GET['id']}' order by id desc limit 1");
	    	
	    	//保存支付凭证
	    	if($this->order['checked']==0){
    		 //更新订单状态
    		 if($this->member['usergroup']['sort']==1 && !$this->member['is_adminchild']){
    		   	$arr['huiyuan_img'] = implode(",",$_POST['thumb_list']);
    		   	$arr['checked'] = 9;
    		   	}else{
    		   		$arr['checked'] = 10;
    		   		$arr['send_type'] = 'admin';
    		   		$arr['checkid'] = $this->member['uid'];
    		   		if($this->member['is_adminchild']){
    		   			$arr['checkid'] = $this->member['refereeid'];
    		   		}
    		   		$arr['agent_img'] = implode(",",$_POST['thumb_list']);
    		   		}
	    		   	$arr['refereeid'] = $this->member['refereeid'];
	    		   	$this->mysql->update("{$this->pre}order",$arr,"id='{$_GET['id']}'"); 
	   			  	$json['message'] = '凭证上传成功！';

	    		} 	
				
			}


			$this->order = $this->mysql->select_one("select * from {$this->pre}order where id='{$_GET['id']}' order by id desc limit 1");
			if(!is_array($this->order)) {
			    	location("?mod=mobile&act=order");
			   }
			$this->order['delivery'] = unserialize($this->order['delivery']);

			if ($this->member['referee']) {
				//上级支付信息
				$where = "where username='{$this->member['referee']}'";
				$uid = $this->mysql->select_one("select uid from {$this->pre}user $where");
				$this->uid = $uid['uid'];
				$bankWhere = "where uid='{$this->uid}' and is_default=1";
				$this->bankInfo = $this->mysql->select_one("select bankname,bankcard from {$this->pre}atmbank $bankWhere");
				
			}else{
				//直接获取平台支付账号
			}
			
		}
		$agentgoods = $this->mysql->select_one("select * from {$this->pre}goods");
	    $str = $agentgoods['goods_thumb'];
	    if(strpos($str,',')){
    		preg_match('/([^,]+?),/i',$str,$match);
		}
		$this->goodspic = $match[1];
		
	}

	//用户详细信息
	function userdetail()
	{
		
	}

	//地址管理
	function address(){
		$uid = $this->member['uid'];
		$this->record = $this->mysql->getarr("select * from {$this->pre}delivery where uid=$uid");   
	}

	//地址编辑
	function editaddress(){
		if(submit()){
			$id = $_GET['id'];
			unset($_POST['type']);
		    	$arr = $_POST;
		    	$uid = $this->member['uid'];
		    	$arr['uid'] = $uid;
		    	unset($arr['opcardbutton']);
		    	if($id){
    				  if($arr['is_default'] == 1){
    				  	$all = $this->mysql->getarr("select * from {$this->pre}delivery where uid=$uid");
    				  	foreach ($all as $key => $value) {
				  			if($value['id'] == $id){
				  				$this->mysql->update("{$this->pre}delivery",$arr,"id='$id'"); 
				  			}else{
				  				$value['is_default'] = 0;
				  				$this->mysql->update("{$this->pre}delivery",$value,"id='$value[id]'"); 
				  			}
    				  		
    				  	}   
    				  }else{
    				  	$this->mysql->update("{$this->pre}delivery",$arr,"id=$id");
    				  }
    	             
    			}else{
    	            $this->mysql->insert("{$this->pre}delivery",$arr); 
    			}
    		location("?mod=mobile&act=address");
			exit;
		}

		if ($_GET['type'] == 'edit') {
			$id = $_GET['id'];
			if ($id) {
				$uid = $this->member['uid'];
			    $this->detail = $this->mysql->select_one("select * from {$this->pre}delivery where id=$id"); 
			}
		}

	}

	//安全相关（密码修改，手机邮箱验证）
	function newinfo()
	{
		if(submit()){
			
			//密码修改
			if ($_GET['type'] == 'password') {
				$arr['password'] = $_POST['newpw'];
			     if(!$this->user->checkpassword($_POST['oldpassword'])) $this->message('go_back','对不起，原始密码不正确','0'); 
			     $this->user->update($arr,$this->member['uid']);
				 $this->user->dropuser();
			     $this->message('mobile_login','密码已修改，请重新登录');
			}
		}


		if ($_GET['type'] == 'password') {
			$this->record['type'] = 'password';
		}

		if ($_GET['type'] == 'emile') {
			$this->record['type'] = 'emile';
		}

		if ($_GET['type'] == 'mobile') {
			$this->record['type'] = 'mobile';
		}

	}

	//银行卡管理
	function bankinfo(){
		$uid = $this->member['uid'];
		$this->record = $this->mysql->getarr("select * from {$this->pre}atmbank where uid=$uid");
	}

	function upload($data){
      $mychatpath = $data['mychatpath'];
      $imgcut = $_POST['imgcut'] ? $_POST['imgcut'] : $_GET['imgcut'];
      $filedate = formattime(time(),"Y-m-d");
      if($imgcut) $cut = '250,250|thumb#38,38|prod';
      $upload = $this->getupload("/{$mychatpath}/{$filedate}/",$cut);

      if($upload['file']){
        $msg = json(array('error' =>0,'url' =>$upload['file'], 'trueurl' => $upload['truefile'],'width' =>$upload['width'],'height' => $upload['height']));
      }elseif($upload['errno']){
        $msg = json(array('error' =>1,'message'=>$upload['errmsg']));
      }
      echo $msg;
      exit;
    }
}
?>