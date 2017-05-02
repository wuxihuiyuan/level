<?php
if (!defined('ROOT')) exit('Can\'t Access !');
abstract class module_class{
    function __construct($module,$action){
     $this->module = $module;
     $this->action = $action;
     $this->pre = config::get('tablepre');
     $this->pagesize = $this->module=='admin' ? config::get("adminpagesize") : config::get("pagesize");
     $this->mysql = new mysql_class($this);
     if($module=='admin'){
     	$this->check_manager();
     	$this->check_member();
     } 
     if($module=='mobile') $this->check_mobile();
     if($module=='member') $this->check_member();
     if($module=='tools'){
     	$this->check_manager();
     	$this->check_member();
     }
     $this->upload_config();
	 $this->kefu = explode(",",config::get("kefu"));
	 $this->read = $this->mysql->counts("select id from {$this->pre}message where uid='{$this->member['uid']}' and checked='0' and type='2'");
    }	
    function check_member(){
     $this->user = new member_class($this);
     if($this->module!='admin'){
      $this->member = $this->user->check();
      $this->user->purview();
     }
     return true;
    }
    function check_mobile(){

     $this->user = new mobile_class($this);
     if($this->module=='mobile'){
      $this->member = $this->user->check();
      $this->user->purview();
     }
     return true;
    }
    function check_manager(){
     $this->manager_class = new manager_class($this);
     $this->manager = $this->manager_class->check();
     $this->getReturn();
     $this->manager_class->purview();
     return true;
    }
    function getReturn(){
     if($_POST['get']){
      if($this->manager_class->rn_purview($this->module,$this->action,$_GET['get'])===false){
       $get = array_keys(admin_menu_left($_GET['act']));
       foreach($get as $val){
        if($this->manager_class->rn_purview($this->module,$this->action,$val)){
	     $_GET['get'] = $val;
	     break;
	    }
       }
       $re = array_keys(admin_menu_small($_GET['act'],$_GET['get']));
       $_GET['re'] = $re[0];
       $this->manager_class->startpurview();
      }
      unset($_POST['get']);
     }
     return true;
    }
    function upload_config(){
      $ftype = str_replace('.','*.',config::get('filetype'));
      $ftype = str_replace('|',';',$ftype);
      $fsize = config::get('filesize')/1024;
      $this->ftype = '图片('.$ftype.')';
      $this->fsize = "{$fsize}MB";
      $this->fcount = config::get('filecount');
      return true;
    }
  	function getupload($path,$thumb='',$fileInput='imgFile'){
      $filetype = explode("|",str_replace('.','',config::get('filetype')));
      $filesize = config::get('filesize')*1024;
      $uploadpath = PATH.config::get('uploadpath').$path;
      $filepath = config::get("sitepath").config::get('uploadpath').$path;
      $upload = new upload($uploadpath,$filetype,$filesize,0,$fileInput);
      $upload->setThumb($thumb,$thumbPrefix,$thumbWidth,$thumbHeight,$delete);
      $file = $upload->getfile();  
      if($file['0']['saveName']){
        $filesize = @getimagesize($uploadpath.$file['0']['saveName']);
        if($thumb){
	      $array = explode("#",$thumb);
          $getthumb = new ImageResize(); 
          $getthumb->load($uploadpath.$file['0']['saveName']);
	      foreach($array as $key=>$val){
	        $value = explode("|",$val);
	        $getthumb->resize($value[0]);
	        if($value[1]){
	          $savefile = $uploadpath.$file['0']['saveName']."_".$value[1].".".$getthumb->get_type($uploadpath.$file['0']['saveName']);
	        }else{
	          $savefile = $uploadpath.$file['0']['saveName']; 
	        }
	        $destroy = $key>=count($array)-1 ? true : false;
            $getthumb->save($savefile,$destroy);
	      }   
        }
        $return['file'] = $filepath.$file['0']['saveName'];
	    $return['truefile'] = $upload->returninfo['name'];
	    $return['width'] = $filesize[0];
	    $return['height'] = $filesize[1];
      }else{
	    $return['errno'] = $upload->errno;
  	    $return['errmsg'] = $upload->errmsg();   
      }
      return $return;
    }
	function getgoods($number,$where='',$order='order by goods_id desc',$namesort='0'){
	  $where = "and ".$where;
	  $query = $this->mysql->query("select * from {$this->pre}goods where ischeck='1' {$where} {$order} limit 0,$number");
	  while($rs=$this->mysql->assoc($query)){
        $goods_thumb = array_filter(explode(',',$rs['goods_thumb']));
	    $rs['goods_thumbs'] = array_filter(explode(',',$rs['goods_thumb']));
	    $rs['goods_thumb'] = get_img($rs['goods_thumbs'][0]);
		$rs['goods_prod'] = get_img($rs['goods_thumbs'][0],"prod");
		$rs['goods_img'] = $rs['goods_thumbs'][0];
		$rs['url'] = rewrite::request("?mod=member&act=goods&type=show&id=".$rs['goods_id']);
		$rs['market_price'] = formatnum($rs['market_price'],2,1);
		$rs['shop_price'] = formatnum($rs['shop_price'],2,1);
		if($namesort>'0') $rs['goods_name'] = msubstr($rs['goods_name'],0,$namesort);
		$goods[] = $rs;
	  }
      return $number=='1' ? $goods[0] : $goods;
	}	
	function sqlgoods($sql,$namesort='0'){
      $query = $this->mysql->query($sql);
      while($rs=$this->mysql->assoc($query)){
		$goods_thumb = array_filter(explode(',',$rs['goods_thumb']));
		$rs['goods_thumbs'] = array_filter(explode(',',$rs['goods_thumb']));
		$rs['goods_thumb'] = get_img($rs['goods_thumbs'][0]);
		$rs['goods_prod'] = get_img($rs['goods_thumbs'][0],"prod");
		$rs['goods_img'] = $rs['goods_thumbs'][0];
		$rs['url'] = rewrite::request("?mod=member&act=goods&type=show&id=".$rs['goods_id']);
		$rs['market_price'] = formatnum($rs['market_price'],2,1);
		$rs['shop_price'] = formatnum($rs['shop_price'],2,1);
		if($namesort>'0') $rs['goods_name'] = msubstr($rs['goods_name'],0,$namesort);
		$goods[] = $rs;
      }
      return $goods;
	}	
	function jfgoodsorder($arr,$uid=''){
	  $uid = $uid=='' ? $this->member['uid'] : $uid;
	  $user = $this->user->sql($uid);
	  $delivery = $this->mysql->select_one("select * from {$this->pre}delivery where is_default=1 and uid='{$uid}'");
	  if(!is_array($delivery)) return '请先在账户设置中设置默认地址！';
	  foreach($arr['goodsid'] as $key=>$val){
	    if($arr['number'][$key]>0){
		  $goods[$key] = $this->mysql->select_one("select goods_id,goods_name,shop_price,margin,stock,point_rate from {$this->pre}jfgoods where goods_id='{$val}'"); 
		  $goods[$key]['number'] = $arr['number'][$key]; 
		  $goods[$key]['money'] = $goods[$key]['shop_price']*$arr['number'][$key];
		  $goods[$key]['price'] = $goods[$key]['money']*$user['usergroup']['rebate']*0.01;
		  $goods[$key]['margin'] = $goods[$key]['margin']*$arr['number'][$key];
		  $money += $goods[$key]['money']*$goods[$key]['point_rate'];
		  $margin += $goods[$key]['margin']*$goods[$key]['point_rate'];
		  $price += $goods[$key]['price']*$goods[$key]['point_rate'];
		}	
	  }
	  $order['orderid'] = makeorderid();
	  $order['message'] = "";
	  $order['goods'] = serialize($goods);
	  $order['uid'] = $uid;
	  $order['checked'] = 0;
	  $order['delivery'] = serialize($delivery);
	  $order['money'] = $money;
	  $order['margin'] = $margin;
	  $order['price'] = $price;
	  $order['addtime'] = time();
      $this->mysql->insert("{$this->pre}jforder",$order);
	  $order['id'] = $this->mysql->insertid();
	  return $order['id'];
	}
	function goodsorder($arr,$uid=''){
	  $shop = $this->getgoods(1,"goods_id='".$arr['goods_id']."'");
	  $uid = $uid=='' ? $this->member['uid'] : $uid;
	  $delivery = $this->mysql->select_one("select * from {$this->pre}delivery where is_default=1 and uid='{$uid}'");
	  if(!is_array($delivery)) return '请先在账户设置中设置默认地址！';
	  $tmp = $this->mysql->getarr("select * from {$this->pre}shop_group"); 
	  $tmp = $this->array_bind_key($tmp,'groupid');
	  $order['price'] = $shop['agent_price']*$shop['unit_rate'];
	  $order['goods_id'] = $shop['goods_id'];
	  $order['good_name'] = $shop['goods_name'];
	  $order['point'] = $shop['point'];
	  $order['orderid'] = makeorderid();
	  $order['message'] = "";
	  $order['uid'] = $uid;
	  $order['username'] = $this->member['username'];
	  $order['checked'] = 0;
	  $order['delivery'] = serialize($delivery);
	  $order['rate'] = 100-$shop['ding_rate'];
	  $order['bonus'] = $tmp[$this->member['groupid']]['bonus'];
	  //获取父亲节点信息
	  $puser = $this->mysql->select_one("select uid,groupid,is_admin from {$this->pre}user where  uid='{$this->member['refereeid']}'");
	  if($this->member['usergroup']['sort']==1){
	  	if(!$puser['is_admin']){
	  		$order['bonus'] = $tmp[$puser['groupid']]['bonus'];
	  		$order['rate'] = 100;
	  	}
	  	$order['money'] = $arr['number']*$shop['agent_price']*$shop['unit_rate'];
	  	$order['yi_money'] = $arr['number']*$shop['agent_price']*$shop['unit_rate'];	
	  }else{
	  	$order['money'] = $arr['number']*$shop['agent_price']*$shop['unit_rate']*(100-$shop['ding_rate'])*0.01;
	  }
	  $order['re_money'] = $order['money']- $arr['number']*$order['bonus'];
	  if($this->member['usergroup']['sort']>1){
	  	$order['money'] = $order['re_money'];
	  }
	  $order['num'] = $arr['number'];
	  $order['addtime'] = time();
      $this->mysql->insert("{$this->pre}order",$order);
	  $order['id'] = $this->mysql->insertid();
	  return $order['id'];
	}
	function storeorder($arr,$uid=''){
	  $shop = $this->getgoods(1,"goods_id='".$arr['goods_id']."'");
	  $uid = $uid=='' ? $this->member['uid'] : $uid;
	  $user = $this->user->sql($uid);
	  $order['uid'] = $uid;
	  $order['refereeid'] = $this->member['refereeid'] ;
	  $order['goods_id'] = $arr['goods_id'];
	  $order['store'] = $arr['number'];
	  $order['ding_price'] = $arr['number']*$shop['agent_price']*$shop['unit_rate']*$shop['ding_rate']*0.01;
	  $order['addtime'] = time();
      $this->mysql->insert("{$this->pre}store",$order);
	  $order['id'] = $this->mysql->insertid();
	  return $order['id'];
	}
	function turnjforder($order,$check){
		if($check=='1'){
		  if($order['checked']=='0'){
			$submit = true;
			$user = $this->user->sql($order['uid']);

			if($user['good_point']<$order['price']){
			  $submit = false;
			  return '积分不足'.$order['price'].'。';	
			}		
			if($submit){
		      $parentid = $this->up_goodspoint($order['uid'],$order['price'],"-","<a href=\"javascript:jfogo(".$order['id'].");\" title=\"订单号{$order['orderid']},点击查看详情\">订购产品</a>");
		      $arr['checked'] = '1';
			  $this->mysql->update("{$this->pre}jforder",$arr,"id='{$order['id']}'");
		  	}
		  }else{
			if($order['checked']=='3'){
			  if(strlen($order['messagea'])<100){
		        $arr['checked'] = '1';
			    $arr['message'] = $order['message']."A：".$order['messagea']." ".formattime(time())."<br>";
			    $this->mysql->update("{$this->pre}jforder",$arr,"id='{$order['id']}'");
			  }else{
			    return '简单概括就行，别写这么长';   
			  }
		  	}else{
			  return '订单状态有误';  
			}
		  }
	    }elseif($check=='2'){
		  if($order['checked']=='5'){
		    $arr['checked'] = '2';
		    $this->mysql->update("{$this->pre}jforder",$arr,"id='{$order['id']}'");
			//$this->jfgoodsstore($order['id']);
		  }else{
		    return '订单状态有误';
	      }
	    }elseif($check=='3'){
		  if($order['checked']=='1'){
		   if(strlen($order['messageq'])<100){
			  $arr['checked'] = '3';
 		      $arr['message'] = $order['message']."Q：".$order['messageq']." ".formattime(time())."<br>";
		      $this->mysql->update("{$this->pre}jforder",$arr,"id='{$order['id']}'");
		    }else{
			  return '简单概括就行，别写这么长';   
		    }
		  }else{
		    return "该订单目前状态不能退款";
		  }  
	    }elseif($check=='4'){
		  if($order['checked']=='3'){
			$arr['checked'] = '4';
		    $this->mysql->update("{$this->pre}jforder",$arr,"id='{$order['id']}'");
		    $parentid = $this->up_goodspoint($order['uid'],$order['price'],"+","<a href=\"javascript:ogo(".$order['id'].");\" title=\"订单号{$order['orderid']},点击查看详情\">订单退款</a>");
		  }else{
		    return "该订单目前状态不能退款";
		  } 
	    }elseif($check=='5'){
		  if($order['checked']=='1'){
			$arr['checked'] = '5';
			$arr['express'] = $order['express'];
			$arr['expressnumber'] = $order['expressnumber'];
			$arr['message'] = $_POST['message'];
			$arr['ftime'] = time();
		    $this->mysql->update("{$this->pre}jforder",$arr,"id='{$order['id']}'");
	      }else{
		    return "该订单目前状态不能发货";
		  } 
	    }
		return '0';
	}
	function turnorder($order,$check){
		if($check=='5'){
			if($order['checked']!='1'){
				return "该订单目前状态不能发货";
			}
			$arr['checked'] = '5';
			$arr['express'] = $order['express'];
			$arr['expressnumber'] = $order['expressnumber'];
			$arr['ftime'] = time();
			//订单状态更新
			$this->mysql->update("{$this->pre}order",$arr,"id='{$order['id']}'");
			$user = $this->mysql->select_one("select * from {$this->pre}user where uid='{$order['uid']}'");
			$usergroup = $this->array_bind_key($this->mysql->getarr("select * from {$this->pre}shop_group where goodid = '{$order[goods_id]}'"),'groupid');
			//用户信息
			
			if($user['treeids']){
				$userids = $user['treeids'].','.$user['uid'];
			}else{
				$userids = $user['uid'];
			}
			$users = $this->mysql->getarr("select uid,groupid,refereeid,store,sales_num,is_admin,username from {$this->pre}user where uid in({$userids}) order by uid desc");
			
			//会员销量
				$users = $this->sales($order,$users,$usergroup);
		    	//计算余额(未结算数量>级别数量时，解冻奖金)
				$this->money($usergroup,$userids,$users);
		    	//代理升级处理
		    	$this->agentlevel($users);

			//发货区间暂留
			/*					
			if($order['maxcode']<$order['mincode']){
				return "您输入的区间有误!";
			}
			//存左边
			$tmp_arr =  $this->mysql->select_one("select * from {$this->pre}order  order by (maxcode+0) desc limit 1");
	    	if($tmp_arr['maxcode'] <$order['mincode']){
	    		$arr['mincode'] = $order['mincode'];
	     	    $arr['maxcode'] = $order['maxcode'];
	     	    $this->mysql->update("{$this->pre}order",$arr,"id='{$order['id']}'");
	     	    return '0';
	    	}
    		//存右边
    		$tmp_arr =  $this->mysql->select_one("select * from {$this->pre}order  order by (mincode+0) asc limit 1");
    		if($tmp_arr['mincode']>$order['maxcode']){
    			$arr['mincode'] = $order['mincode'];
    	 	    $arr['maxcode'] = $order['maxcode'];
    	 		$this->mysql->update("{$this->pre}order",$arr,"id='{$order['id']}'");
    	 		return '0';
    		}

    		//中间插入
    		$mintmp = $this->mysql->select_one("select * from {$this->pre}order where maxcode<{$order['mincode']}  order by (maxcode+0) desc");
    		$maxtmp = $this->mysql->select_one("select * from {$this->pre}order where mincode>{$order['maxcode']} order by (mincode+0) asc");
    		$tmparr = $this->mysql->select_one("select * from {$this->pre}order where mincode>{$mintmp['maxcode']} order by (mincode+0) asc");
    		if($mintmp['maxcode']<$order['mincode'] && $maxtmp['mincode']>$order['maxcode'] && $tmparr['id']==$maxtmp['id']){
    			$arr['mincode'] = $order['mincode'];
    	 	    $arr['maxcode'] = $order['maxcode'];
    			$this->mysql->update("{$this->pre}order",$arr,"id='{$order['id']}'");
    			return '0';
    		}else{
    			return '所输入区间误，请到订单表核查！';
    		}
			*/
	    }
	    if($check=='1'){
			  if($order['checked']=='0'){
				$submit = true;
				$user = $this->user->sql($order['uid']);	
				if($user['money']<$order['price']){
				  $submit = false;
				  return '余额不足'.$order['price'].'元，请充值。';	
				}			
				if($submit){
			      $parentid = $this->up_money($order['uid'],$order['price'],"-","<a href=\"javascript:ogo(".$order['id'].");\" title=\"订单号{$order['orderid']},点击查看详情\">订购产品</a>");
			      $arr['checked'] = '1';
				  $this->mysql->update("{$this->pre}order",$arr,"id='{$order['id']}'");
			  	}
			  }else{
				if($order['checked']=='3'){
				  if(strlen($order['messagea'])<100){
			        $arr['checked'] = '1';
				    $arr['message'] = $order['message']."A：".$order['messagea']." ".formattime(time())."<br>";
				    $this->mysql->update("{$this->pre}order",$arr,"id='{$order['id']}'");
				  }else{
				    return '简单概括就行，别写这么长';   
				  }
			  	}
			  	if($order['checked']=='9'){
				  if(strlen($order['reasona'])<100){
			        $arr['checked'] = '0';
				    $arr['message'] = $order['reason']."A：".$order['reasona']." ".formattime(time())."<br>";
				    $this->mysql->update("{$this->pre}order",$arr,"id='{$order['id']}'");
				  }else{
				    return '简单概括就行，别写这么长';   
				  }
			  	}
			  	if($order['checked']=='10'){
				  if(strlen($order['reasona'])<100){
			        $arr['checked'] = '0';
				    $arr['message'] = $order['reason']."A：".$order['reasona']." ".formattime(time())."<br>";
				    $this->mysql->update("{$this->pre}order",$arr,"id='{$order['id']}'");
				  }else{
				    return '简单概括就行，别写这么长';   
				  }
			  	}else{
				  return '订单状态有误';  
				}
			  }
		    }
		return '0';
	}
	function bonus($user,$order){
		if($user['treeids']){
			$userids = $user['treeids'].','.$user['uid'];
		}else{
			$userids = $user['uid'];
		}
  		$usergroup = $this->array_bind_key($this->mysql->getarr("select * from {$this->pre}shop_group where goodid = '{$order[goods_id]}'"),'groupid');
  		$users = $this->mysql->getarr("select uid,groupid,refereeid,store,sales_num from {$this->pre}user where uid in({$userids}) order by uid desc");

  		if(!$user['is_zhsbonus'] && $user['refereeid']){
  			if($user['uid'] === $order['checkid']){
  				$log_sum = $this->mysql->sum("{$this->pre}earning_log","num","where uid={$order['uid']}");
  				$sheng = $user['new_num']-$log_sum;
  				if($sheng >= $order['num']){		
  					$rebate = $usergroup[$user['groupid']]['rebate']*$order['num'];	
  				}else{
  					$rebate = $usergroup[$user['groupid']]['rebate']*$sheng;
  					$userupdate['is_zhsbonus'] = 1;
  					$this->mysql->update("{$this->pre}user",$userupdate,"uid='{$user[uid]}'"); 
  				}
  			}else{
  				$rebate = $usergroup[$user['groupid']]['rebate']*$order['num'];	
  				$userupdate['is_zhsbonus'] = 1;
  				$this->mysql->update("{$this->pre}user",$userupdate,"uid='{$user[uid]}'"); 
  			}

		}
		foreach ($users as $key => $value) {
			$group[$value['groupid']][] = 1;
		}
		//直系上级和上级的上级处于同一级别的时候，直系上级享受分红，上级的上级享受团队晋级奖
		$childgid=0;	
		foreach ($users as $key => $one) {
			$data = array();
			$data['jid'] = $one['uid'];
			$data['uid'] = $user['uid'];
			$data['username'] = $user['username'];
			$data['oid'] = $order['orderid'];
			$data['addtime'] = formattime(time(),"Ym");
			$data['num'] = $order['num'];
			$data['share_money'] = 0;
			$data['up_bonus'] = 0;
			$data['rebate'] = 0;
			$data['bonus'] = 0;
			//招商奖
			if($rebate &&  $user['refereeid']==$one['uid']){
				$data['rebate'] = $rebate;
			}
			if($order['send_type'] == "admin"){
				if($one['uid'] == $user['uid']){
					$data['share_money'] = $usergroup[$one['groupid']]['share_money']*$order['num'];	
				}else{
					$data['bonus'] = round($usergroup[$one['groupid']]['up_bonus']*$order['num']/count($group[$one['groupid']]),2) ;
					$data['share_money'] = round($usergroup[$one['groupid']]['up_share']*$order['num']/count($group[$one['groupid']]),2);	
				}
			}
			$data['money'] = $data['share_money']+$data['rebate']+$data['bonus'];
			if($data['money']>0){
				$this->mysql->insert("{$this->pre}earning_log",$data);
			}
			$records['money'] = $data['bonus'];
			$records['refereemoney'] = $data['rebate'];
			$records['floormoney'] = $data['share_money'];
			if(!empty($records)){
				$this->records($one['uid'],'',$records);
			}
		}
		return true;
	}
	function sales($order,$users,$usergroup){	

		if($order['send_type'] == 'user'){
			$user = $users[0];
			$sales['sales_num'] = $user['sales_num']+$order['num'];
			$this->mysql->update("{$this->pre}user",$sales,"uid='{$user[uid]}'"); 
			//日志表
			$this->set_saleslog($order,$user);
		}else{
			foreach ($users as $key => $one) {
				$sales = array();
				$sales['sales_num'] = $one['sales_num']+$order['num'];
				if($one['uid'] == $order['checkid'] && !$one['is_admin']){
					$sales['store'] = $one['store'] - $order['num'];
					$users[$key]['store'] = $sales['store'];
				}
				$users[$key]['sales_num'] = $sales['sales_num'];
				if($sales){
					$this->mysql->update("{$this->pre}user",$sales,"uid='{$one[uid]}'"); 
					//日志表
					$this->set_saleslog($order,$one);
				}
			}
		}
		return $users;
	}

	function money($usergroup,$userids,$users){	
		$users = $this->array_bind_key($users,'uid');
		$money = $this->mysql->getarr("select uid,sum(num) as num,sum(money) as money,jid  from {$this->pre}earning_log where jid in({$userids}) and unblock = 0 group by jid");
		foreach ($money as $key => $one) {
			if($usergroup[$users[$one['jid']]['groupid']]['minimum']<= $one['num']){
				$log['unblock'] = 1;
				$this->mysql->update("{$this->pre}earning_log",$log,"jid='{$one['jid']}'");
				$this->set_money($one['money'],$one['jid']);
				$udata['money'] = $users[$one['jid']]['money'] + $one['money'];
				$this->mysql->update("{$this->pre}user",$udata,"uid='{$one['jid']}'");
			}	
		}
		return true;
	}
	function getnews($classid,$num,$length='',$time=''){
		$number = 0;
		$where = $classid=='0' ? "" : "where typeid='$classid'";
	    $query = $this->mysql->query("select * from {$this->pre}news $where order by addtime desc limit 0,$num");
	    while($rs=$this->mysql->assoc($query)){
		  $rs['url'] = rewrite::request("?mod=news&act=show&id=".$rs['id']);
		  $rs['addtime'] = formattime($rs['addtime'],$time);
	      $rs['pics'] = getpic($rs['content']);
	      $rs['text'] = msubstr(noHtml($rs['content']),0,46);
		  $rs['title'] = $length=='' ? $rs['title'] : msubstr($rs['title'],0,$length);
		  $number ++;
		  $rs['number'] = $number;
		  $news[] = $rs;
	    }
		return $news;
	}
	function getnewstype($number,$where=''){
	    $query = $this->mysql->query("select * from {$this->pre}newstype {$where} order by typeorder asc limit 0,{$number}");
	    while($rs=$this->mysql->assoc($query)){
		   $newstype[] = $rs;
	    }
		return $newstype;
	}	
	function get_nav($id){
	    $nav = $this->mysql->getarr("select * from {$this->pre}nav where `type`='{$id}' order by ord asc");
		return $nav;
	} 
	function records($uid,$how,$money,$addtime=""){
		$addtime = $addtime ? $addtime : untime(formattime(time(),"Y-m-d 00:00"));
	    $records = $this->mysql->select_one("select * from {$this->pre}records where addtime='{$addtime}' and uid='{$uid}'");
	    if($how){
	    	$arr[$how] = $records[$how]+$money;
	    }else{
	    	foreach ($money as $key => $value) {
	    		$arr[$key] = $value + $records[$key];
	    	}
	    }
        
		if(is_array($records)){
		  $this->mysql->update("{$this->pre}records",$arr,"id='{$records['id']}'");
		}else{
		  $arr['addtime'] = $addtime;
		  $arr['uid'] = $uid;
		  $this->mysql->insert("{$this->pre}records",$arr); 
		}
	}
	function set_money($money,$uid){
		$addtime = formattime(time(),"Ym");
	    $record = $this->mysql->select_one("select * from {$this->pre}money where addtime='{$addtime}' and uid='{$uid}'");
		$arr['money'] = $record['money']+$money;    
		if(is_array($record)){
		  $this->mysql->update("{$this->pre}money",$arr,"id='{$record['id']}'");
		}else{
		  $arr['addtime'] = $addtime;
		  $arr['uid'] = $uid;
		  $this->mysql->insert("{$this->pre}money",$arr); 
		}
	}
	function set_saleslog($order,$user){
		$arr['num'] = $order['num'];     
		$arr['addtime'] = formattime(time(),"Ym");
		$arr['ouid'] = $order['uid'];
		$arr['uid'] = $user['uid'];
		$arr['username'] = $user['username'];
		$arr['orderid'] = $order['orderid'];
		$this->mysql->insert("{$this->pre}saleslog",$arr); 
	}
	function get_money($where=''){
		$arr['money'] = 'money';
		return $this->mysql->getrecord("{$this->pre}money",$arr,$where);		
	}
	
	
	function record($how,$money,$addtime=""){
		$addtime = $addtime ? $addtime : untime(formattime(time(),"Y-m-d 00:00"));
	    $record = $this->mysql->select_one("select * from {$this->pre}record where addtime='{$addtime}'");
		if(is_array($how)){
		  $arr = $how;
		}else{
		  $arr[$how] = $record[$how]+$money;
		}        
		if(is_array($record)){
		  $this->mysql->update("{$this->pre}record",$arr,"id='{$record['id']}'");
		}else{
		  $arr['addtime'] = $addtime;
		  $this->mysql->insert("{$this->pre}record",$arr); 
		}
	}
	function getrecord($where=''){
		$arr['money'] = 'money';
		$arr['buymoney'] = 'ordermoney';
		$arr['refereemoney'] = 'refereemoney';
		$arr['floormoney'] = 'floormoney';
		$arr['leadmoney'] = 'leadmoney';
		$arr['regmoney'] = 'regmoney';
		$arr['atmmoney'] = 'atmmoney';
		$arr['atmmoneyed'] = 'atmmoneyed';
		$arr['atmmoneyno'] = 'atmmoney-atmmoneyed';
		$arr['inmoney'] = 'money+refereemoney+floormoney+leadmoney+regmoney+otherin';
		$arr['outmoney'] = 'atmmoneyed';
		$arr['margin'] = '(money++refereemoney+floormoney+leadmoney+regmoney+otherin)-otherout';
		return $this->mysql->getrecord("{$this->pre}record",$arr,$where);		
	}
	function getrecords($where=''){
		$arr['money'] = 'money';
		$arr['buymoney'] = 'ordermoney';
		$arr['refereemoney'] = 'refereemoney';
		$arr['floormoney'] = 'floormoney';
		$arr['leadmoney'] = 'leadmoney';
		$arr['regmoney'] = 'regmoney';
		$arr['atmmoney'] = 'atmmoney';
		$arr['atmmoneyed'] = 'atmmoneyed';
		$arr['atmmoneyno'] = 'atmmoney-atmmoneyed';
		$arr['inmoney'] = 'money++refereemoney+floormoney+leadmoney+regmoney+otherin';
		$arr['outmoney'] = 'atmmoneyed';
		$arr['margin'] = '(money++refereemoney+floormoney+leadmoney+regmoney+otherin)-atmmoneyed';
		return $this->mysql->getrecord("{$this->pre}records",$arr,$where);		
	}
/*	function getrecords($where=''){
		$arr['up_bonus'] = 'up_bonus';
		$arr['bonus'] = 'bonus';
		$arr['share_money'] = 'share_money';
		$arr['rebate'] = 'rebate';
		$arr['margin'] = '(rebate+share_money+up_bonus+bonus)';
		return $this->mysql->getrecord("{$this->pre}earning_log",$arr,$where);		
	}*/
	function getchatdate($timet,$time){
		$arr['time'] = $time ? $time : $this->mysql->value("{$this->pre}log","addtime","id>'0' order by id asc limit 1"); 
		$arr['timet'] = $timet ? $timet : time();
		$interval = $arr['timet'] - $arr['time'];
        if($interval>3600*24*30*24){
		  $arr['part'] = 'y';
		  $arr['format'] = "Y";
		  $arr['_format'] = "%Y";
		}elseif($interval>3600*24*30){
		  $arr['part'] = 'm';
		  $arr['format'] = "Y-m";
		  $arr['_format'] = "%Y-%m";
		}else{
		  $arr['part'] = 'd';
		  $arr['format'] = "Y-m-d";
		  $arr['_format'] = "%Y-%m-%d";
		}
		$arr['step'] = datediff($arr['part'],$arr['timet'],$arr['time']);
		return $arr;
	}
	function verifyinsertuser($val,$admin=''){
		//验证数据合法性
        if($val['username']=='') return '会员账户不能为空';
        if($this->user->checkusername($val['username'])) return '该会员账户已经存在';
	    if($val['password']=='') return '登录密码不能为空';
	    if($val['_repass']=='') return '支付密码不能为空';
        // if($val['nowopen']=='') return '请选择是否正式开通';
       	//组装数据
		$usergroups = $this->mysql->getarr("select * from {$this->pre}usergroup");
		$usergroups = $this->array_bind_key($usergroups,'groupid');
		$usergroup = $usergroups[$val['groupid']];
		if(!$val['getmember']){
			if($val['_referee']){
					$_referee = $this->user->sql($val['_referee'],"username","status='1'");
				  if(!is_array($_referee)) return '节点上线不存在或非正式会员';
			}
		}
		$arr['username'] = $val['username'];
		$arr['password'] = $val['password'];
	    $arr['truename'] = $val['truename'];
		$arr['userphone'] = $val['userphone'];
		$arr['groupid'] = $val['groupid'];
		$arr['qq'] = $val['qq'];
		$arr['idcard'] = $val['idcard'];
		$arr['repass'] = $val['_repass'];
		$arr['email'] = $val['email'];
	    $arr['groupid'] = $val['groupid'];
		$arr['referee'] = $val['_referee'];
		$arr['point'] = $usergroup['point'];
		$arr['address'] = $val['address'];
		$arr['status'] = '0';
		$puser = $this->mysql->select_one("select * from {$this->pre}user where username = '{$val['_referee']}'");
		if($puser && $puser['new_num']==0 && !$puser['is_admin'] && $usergroups[$puser['groupid']]['sort']>1) return '上线用户未订货，不可发展下线！';
		if($puser){
			$arr['refereeid'] = $puser['uid'];	
			if($puser['treeids']){
				$arr['treeids'] = $puser['treeids'].','.$puser['uid'];
			}else{
				$arr['treeids'] = $puser['uid'];
			}
			if($puser['is_admin']){
				$arr['is_adminchild'] = 1;
			}
		}else{
			if($val['nowopen']){
				$arr['is_admin'] = 1;
			}
		}	
		
		//$arr['is_zhsbonus'] = 1;
		$uid = $this->user->insert($arr);
		//银行卡数据保存
		if($val['bankadd']&&$val['bankname']&&$val['bankcard']){
          $b['uid'] = $uid;
		  $b['truename'] = $arr['truename'];
		  $b['bankadd'] = $val['bankadd'];
		  $b['bankname'] = $val['bankname'];
		  $b['bankcard'] = $val['bankcard'];
		  $b['is_default'] = 1;
          $this->mysql->insert("{$this->pre}atmbank",$b); 
		}
		//开通状态（暂时取消）	
		if($val['nowopen']){
			$status = '1';
			$this->status($uid,$status,$admin);
		} 
		return '0';
	}
	function agentlevel($users){
		$user = $users[0];
		unset($user[0]);
		$usergroup = $this->mysql->getarr("select * from {$this->pre}usergroup order by sort desc");
		$usergroup = $this->array_bind_key($usergroup,'groupid');
		$ugbysort = $this->array_bind_key($usergroup,'sort');
		//代理级别处理	
		foreach ($users as $key => $value) {
			$level = $value['groupid'];
			$savedate['point'] = $value['point']+$user['point'];
			if($value['sales_num']<$usergroup[$level]['sales_num']){
				if(isset($ugbysort[$usergroup[$level]['sort']+1]) && $value['point']>=$ugbysort[$usergroup[$level]['sort']+1]['point']){
					$savedate['groupid'] = $ugbysort[$usergroup[$level]['sort']+1]['groupid'];	
				}
			}
			$this->mysql->update("{$this->pre}user",$savedate,"uid='{$value[uid]}'");
		}
		return true;
	}
	function status($uid,$status='1',$order=''){
	    $user = $this->user->sql($uid);
		if(!is_array($user)) return '对不起，该会员信息不存在';
		if($status=='1'){
		    $update['status'] = 1;
			$update['opentime'] = time();
			$update['new_num'] = $order['store']; 
			$this->mysql->update("{$this->pre}user",$update,"uid='{$uid}'"); 

	    }
		return '0';
	}
	function leadmoney($referee,$money){
		$floor = 1;
	    while(is_array($referee = $this->user->sql($referee['referee'],'username'))){
		  if($referee['usergroup']['leadmoney']){
			if($floor<=$referee['leads']){
		      $leadmoney = $referee['usergroup']['leadmoney']*$money;
			  if($leadmoney>0){
			    $shopmoney = $leadmoney*$referee['usergroup']['shopmoney'];
			    $parentid = $this->up_money($referee['uid'],$leadmoney-$shopmoney,"+","分红奖励");
			    $this->up_shopmoney($referee['uid'],$shopmoney,"+","分红奖励",$parentid);
				$remoney += $leadmoney;
				$this->records($referee['uid'],'leadmoney',$leadmoney);
			  }
			}
	      }
		  $floor++;
		  if ($floor>config::get("floor")) break;
	    }
		return $remoney;
	}
	function givemoney(){
	   $addtime = formattime(time(),"Ym");
	   $getrecord = $this->mysql->select_one("select * from {$this->pre}record where FROM_UNIXTIME(addtime,'%Y%m')='{$addtime}' and money>0");

	   if(!is_array($getrecord)){
		 $pretime = date("Ym", strtotime("-1 month"));;
		 $recordmoney = $this->mysql->getsum("{$this->pre}record","buymoney+ordermoney","FROM_UNIXTIME(addtime,'%Y%m')='{$pretime}'");
	     $query = $this->mysql->query("select groupid,point from {$this->pre}usergroup where point!='0' order by groupid asc");
/*	     while($rs=$this->mysql->assoc($query)){
			$money =  getval($rs['money'],"",$recordmoney);
			if($money>0){
	          $pagetotal = $this->mysql->counts("select * from {$this->pre}user where groupid='{$rs['groupid']}'");
			  $onemoney = $money/$pagetotal;
	          $arr = $this->user->getarr("select * from {$this->pre}user where groupid='{$rs['groupid']}'");
	          foreach($arr as $u){
			      $shopmoney = $u['order']>=$u['usergroup']['atmscale'][0] ? getval($u['usergroup']['atmscale'][1],'0',$onemoney) : "0";
			      $parentid = $this->up_money($u['uid'],$onemoney-$shopmoney,"+","股东奖励",'0','',$shopmoney);
			      $this->mysql->query("update {$this->pre}user set `order`=`order`+'{$onemoney}' where uid='{$u['uid']}'");
			      $this->records($u['uid'],'money',$onemoney);
			      $this->record('money',$onemoney);
	          }
			}
	     } */
	   }
	   return true;
	}
	function addstore($uid,$money,$row='uid'){
		$error = '0';
		if(!is_array($user = $this->user->sql($uid,$row))) return '该会员不存在';	
		$uid = $user['uid'];
		$this->set_money($money,$uid);
	    $this->records($uid,'ordermoney',$money);
		if($error=='0'){		  			
		  $this->record('ordermoney',$money);
		  $omoney = $money;
		  $money = $money*0.1;  
		}
		return 0;
	}
	function jfgoodsstore($id){
		$error = '0';
		$order = $this->mysql->select_one("select * from {$this->pre}jforder where id='{$id}' limit 1");
	    $user = $this->user->sql($order['uid']);
		$this->set_money($order['price'],$user['uid']);
	    $this->records($order['uid'],'ordermoney',$order['price']);
		if($error=='0'){
		  $omoney = $order['price'];		  			
		  $money = $order['price']*0.1;
		  $this->record('ordermoney',$order['price']);	
		  
		  
		  //}
		}
		return $error;
	}
    function getselect($table,$id,$name,$where='',$order='',$value=''){
	    $arr = $this->mysql->getarr("select `{$id}`,{$name} as selectname from {$this->pre}{$table} {$where} {$order}");
	    return $value.formval($arr,$id,'selectname');  
    }
	function getabout($typeid=''){
		$number = 0;
		if($typeid!='') $where = "where typeid='{$typeid}'";
	    $query = $this->mysql->query("select * from {$this->pre}about $where order by id asc");
	    while($rs=$this->mysql->assoc($query)){
		   $id = $rs['myurl'] ? $rs['myurl'] : $rs['id'];
		   $rs['url'] = rewrite::request("?mod=about&act=show&id=".$id);
		   $rs['memberurl'] = rewrite::request("?mod=member&act=about&id=".$id);
		   $number ++;
		   $rs['number'] = $number;
		   $about[] = $rs;
	    }
		return $about;
	}	
	function getabouttype($number,$where=''){
	    $query = $this->mysql->query("select * from {$this->pre}abouttype {$where} order by typeorder asc limit 0,{$number}");
	    while($rs=$this->mysql->assoc($query)){
		   $abouttype[] = $rs;
	    }
		return $abouttype;
	}	
	function getusergoup($number='',$where=''){
		if($number) $limit = "limit 0,{$number}";
	    $query = $this->mysql->query("select * from {$this->pre}usergroup {$where} order by sort desc {$limit}");
	    while($rs=$this->mysql->assoc($query)){
		   $group[] = $rs;
	    }
		return $group;
	}
	function up_goodspoint($uid,$money,$action,$message,$parentid=0,$addtime="",$shopmoney='0'){
	   $user = $this->user->sql($uid);
	   $money = formatnum($money);
	   if(is_array($user)&&$money>0){
	     $arr['good_point'] = $action=='+' ? $user['good_point']+$money : $user['good_point']-$money;
         $this->mysql->update("{$this->pre}user",$arr,"uid='{$user[uid]}'");
	     $log['uid'] = $user['uid'];
	     $log['typeid'] = 1;
		 $log['parentid'] = $parentid;
	     $log['addtime'] = $addtime ? $addtime : time();
	     $log['content'] = $message;
	     $log['lognum'] = $action.$money;
	     $log['balance'] = $arr['money'];
	     $log['type'] = $action;
         $id = $this->mysql->insert("{$this->pre}jflog",$log);
		 if($shopmoney>0) $this->up_shopmoney($uid,$shopmoney,$action,$message,$id); 
	   }
	   return $id;
	}	
	function up_money($uid,$money,$action,$message,$parentid=0,$addtime="",$shopmoney='0'){
	   $user = $this->user->sql($uid);
	   $money = formatnum($money);
	   if(is_array($user)&&$money>0){
	     $arr['money'] = $action=='+' ? $user['money']+$money : $user['money']-$money;
         $this->mysql->update("{$this->pre}user",$arr,"uid='{$user[uid]}'");
	     $log['uid'] = $user['uid'];
	     $log['typeid'] = 1;
		 $log['parentid'] = $parentid;
	     $log['addtime'] = $addtime ? $addtime : time();
	     $log['content'] = $message;
	     $log['lognum'] = $action.$money;
	     $log['balance'] = $arr['money'];
         $id = $this->mysql->insert("{$this->pre}log",$log);
		 if($shopmoney>0) $this->up_shopmoney($uid,$shopmoney,$action,$message,$id); 
	   }
	   return $id;
	}	
	function up_regmoney($uid,$money,$action,$message,$parentid=0){
	   $user = $this->user->sql($uid);
	   $money = formatnum($money);
	   if(is_array($user)&&$money>0){
	     $arr['regmoney'] = $action=='+' ? $user['regmoney']+$money : $user['regmoney']-$money;
         $this->mysql->update("{$this->pre}user",$arr,"uid='{$user[uid]}'");
	     $log['uid'] = $user['uid'];
	     $log['typeid'] = 2;
		 $log['parentid'] = $parentid;
	     $log['addtime'] = time();
	     $log['content'] = $message;
	     $log['lognum'] = $action.$money;
	     $log['balance'] = $arr['regmoney'];
         $id = $this->mysql->insert("{$this->pre}log",$log);
	   }
	   return $id;
	}
	function up_shopmoney($uid,$money,$action,$message,$parentid=0){
	   $user = $this->user->sql($uid);
	   $money = formatnum($money);
	   if(is_array($user)&&$money>0){
	     $arr['shopmoney'] = $action=='+' ? $user['shopmoney']+$money : $user['shopmoney']-$money;
         $this->mysql->update("{$this->pre}user",$arr,"uid='{$user[uid]}'");
	     $log['uid'] = $user['uid'];
	     $log['typeid'] = 3;
		 $log['parentid'] = $parentid;
	     $log['addtime'] = time();
	     $log['content'] = $message;
	     $log['lognum'] = $action.$money;
	     $log['balance'] = $arr['shopmoney'];
         $id = $this->mysql->insert("{$this->pre}log",$log);
	   }
	   return $id;
	}
	function up_balance($uid,$money,$action,$message,$addtime="",$parentid=0){
	   $user = $this->user->sql($uid);
	   $money = formatnum($money);
	   if(is_array($user)&&$money>0){
	     $arr['balance'] = $action=='+' ? $user['balance']+$money : $user['balance']-$money;
         $this->mysql->update("{$this->pre}user",$arr,"uid='{$user['uid']}'");
	     $log['uid'] = $user['uid'];
	     $log['typeid'] = 4;
		 $log['parentid'] = $parentid;
	     $log['addtime'] = $addtime ? $addtime : time();
	     $log['content'] = $message;
	     $log['lognum'] = $action.$money;
	     $log['balance'] = $arr['balance'];
         $id = $this->mysql->insert("{$this->pre}log",$log);
	   }
	   return $id;
	}	
	function pageclass($count,$pagesize='',$endpre=''){
		$this->pagesize = $this->module=='admin' ? config::get("adminpagesize") : config::get("pagesize");
		if($pagesize!='') $this->pagesize = $pagesize;
		$this->page = new page_class($this->pagesize,0,$count);
	    $this->pageid = $this->page->page;
		$this->showpage = $this->page->showpage($endpre);
		$this->newpage = $this->page->newpage($endpre);
		$this->minipage = $this->page->minipage($endpre);
		return true;
	}
    function message($url,$message,$right='1'){
       $this->message = language($message);
       $thisurl = Purl($url); 
       $this->jcode = $thisurl=='-1' ? "javascript:history.go(-1);" : "javascript:location.href='$thisurl';";
       $this->scode = $thisurl=='-1' ? "history.go(-1)" : "location.href='$thisurl'";	
       $this->msgRight = $right;
       $this->openmessage = 1;
       $this->template();
       return true;
    }
	function js($function){
	   $javascript = "<script language=\"javascript\">";
	   $javascript .= "$function";
	   $javascript .= "</script>";
	   echo $javascript;
	   exit;
	}
	function ajaxAlert($message){
       $message = language($message);
	   $javascript = "<script language=\"javascript\">";
	   $javascript .= "parent.Wrong('{$message}');";
	   $javascript .= "</script>";
	   echo $javascript;
	   exit;
	}	
    function template($temp='',$pre=''){
       $module = $this->module;
       $action = $this->action;
       $template_dir = $module=='admin' ? 'admin' : config::get("template_dir");
       $this->hempdir = config::get('sitepath')."template/{$template_dir}/";
       $template_dir = $module=='member' ? $template_dir.'/member' : $template_dir;
	   $template_dir = $module=='mobile' ? $template_dir.'/mobile' : $template_dir;
       $this->tempdir = config::get('sitepath')."template/{$template_dir}/";
       $this->appdir = config::get('sitepath')."app/";
       if($this->openmessage){
        $action = 'message';
        $module = $module=='admin' ? 'admin' : 'index';
        if($this->module=='member') $module='member';
		if($this->module=='mobile') $module='mobile';
       }
       if($temp){
        $this->tempdir .= "$temp/$pre/";
        $template_dir .= "/$temp/$pre";
       }
       include template($module.'_'.$action,$template_dir,'cache',"$temp/$pre");
       exit();
     }

     function array_bind_key($array=array(),$string){
     	foreach ($array as $key => $value) {
     		$data[$value[$string]] = $value;
     	}
     	return $data;
     }
}
?>