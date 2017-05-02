<?php
if (!defined('ROOT')) exit('Can\'t Access !'); 
class mod_tools extends module_class{
    function main(){
    }
    function islogin(){	  
    }
    function verifyseccode(){//验证码是否正确
      echo $_GET['seccode']==$_SESSION['seccode'] ? 'yes' : 'no';
      exit;
    }
    function upload(){
      $mychatpath = $_POST['mychatpath'] ? $_POST['mychatpath'] : $_GET['mychatpath'];
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
	function getrewrite(){
	  echo Purl($_GET['url']);
	  exit;
	}
	function getphonecode(){
	  if($_GET['type']=='authphone'){
		$array['error'] = 0;
		if(is_array($this->user->sql($_GET['userphone'],'userphone',"mcheck='1'"))){
	      $array['error'] = '该手机号码已经绑定。';  
		}else{
		  if(time()-$this->member['mtime']>120){
			if($_GET['double']=='1'){
			  $arr['msalt'] = mt_rand(1000,9999);
		      $arr['newmsalt'] = mt_rand(1000,9999);
			  $arr['mtime'] = time();
			  $arr['newphone'] = $_GET['userphone'];
  		      $this->user->update($arr,$this->member['uid']);
              @sendsms($arr['msalt']."(手机验证码,请完成验证)",$this->member['userphone']);
			  @sendsms($arr['newmsalt']."(手机验证码,请完成验证)",$arr['newphone']);
			}else{
			  $arr['msalt'] = mt_rand(1000,9999);
			  $arr['mtime'] = time();
			  if($_GET['userphone']) $arr['userphone'] = $_GET['userphone'];
  		      $this->user->update($arr,$this->member['uid']);
			  $user = $this->user->sql($this->member['uid']);
              @sendsms($arr['msalt']."(手机验证码,请完成验证)",$user['userphone']);
			}
		  }
		}
	  }
	  if($_GET['type']=='forgotpassword'){
	    $array['error'] = 0;
	    $user = $this->user->sql($_GET['userphone'],'userphone',"mcheck='1'");
	    if(!is_array($user)){
	      $array['error'] = '对不起，该手机不存在或未绑定。';  
	    }else{
		  $arr['msalt'] = mt_rand(1000,9999);
  		  $this->user->update($arr,$user['uid']);
          @sendsms($arr['msalt']."(手机验证码,请完成验证)",$user['userphone']);
        }
	  }
	  echo json($array);
	  exit;
	}
	function verifyphonecode(){
	  $user = $_GET['userphone'] ? $this->user->sql($_GET['userphone'],'userphone') : $this->member;
	  $arr['error'] = $_GET['phone']=='new' ? ($_GET['code']==$user['newmsalt'] ? '1' : '0') : ($_GET['code']==$user['msalt'] ? '1' : '0');	
	  echo json($arr);
	  exit;
	}
	function getregmoney(){
	  $group = $this->mysql->select_one("select * from {$this->pre}usergroup where groupid='{$_GET['groupid']}'");
	  echo $group['buymoney'];
	  exit;
	}
	function getupmoney(){
	  $group = $this->mysql->select_one("select * from {$this->pre}usergroup where groupid='{$_GET['groupid']}'");
	  echo formatnum($group['buymoney'] - $this->member['usergroup']['buymoney']);
	  exit;
	}
	function verifyservice(){
	  $error = '0';
      $user = $this->user->sql($_GET['username'],'username');	 
	  if($user['service']&&is_array($user)){
        $name = $user['servicename'];
	  }else{
		$error = '报单中心不存在';	
		$name = '';
	  }
	  $arr['error'] = $error;
	  $arr['truename'] = $name;
      echo json($arr);
      exit;
	}	
	function verifyuser(){
	  $username = $_GET['username'];
	  $password = $_GET['password'];
	  $arr['error'] = '0';
	  if(isMobile($username)){
        $user = $this->user->sql($username,'userphone',"mcheck='1'");
		$error = '密码错误或手机号码为绑定';
	  }elseif(isEmail($username)){
	    $user = $this->user->sql($username,'email');	
		$error = '密码错误或邮箱不存在';
	  }else{
        $user = $this->user->sql($username,'username');	 
		$error = '密码错误或用户名不存在';
	  }
      if($this->user->password($password,$user['salt']) != $user['password']) $arr['error'] = $error;
      echo json($arr);
      exit;
	}	
	function verifyrepass(){
	  $arr['error'] = '0';
	  if($_GET['repass']==''){
		$arr['error'] = '请输入支付密码';
	  }else{
        if($this->user->password($_GET['repass'],$this->member['salt']) != $this->member['repass']) $arr['error'] = '输入的支付密码不正确';
	  }
      echo json($arr);
      exit;
	}	
	function verifyusername(){
	  $username = $_GET['username'];
	  if(isMobile($username)){
        $user = $this->user->sql($username,'userphone',"mcheck='1'");
		$error = '对不起，手机不存在或未绑定';
	  }elseif(isEmail($username)){
	    $user = $this->user->sql($username,'email');	
		$error = '对不起，邮箱不存在';
	  }else{
        $user = $this->user->sql($username,'username');	 
		$error = '对不起，会员账号不存在';
	  }
      if(is_array($user)){
		if($this->member['uid']==$user['uid']&&$_GET['transfer']){
	      $truename = '';
		  $error = '对不起，不能给自己转账。';
		}else{
          $truename = $user['truename'];
		  $error = '0';
		}
      }else{
        $truename = '';   
      }
	  $arr['error'] = $error;
	  $arr['truename'] = $truename;
      echo json($arr);
      exit;
	}
	function verifyemail(){
	  if(!isEmail($_GET['email'])) $arr['error'] = '邮箱格式不正确';
	  $arr['error'] = $this->user->checkemail($_GET['email']) ? "0" : "邮箱不存在或未绑定";
      echo json($arr);
      exit;
	}
    function filemanager($auto = false){
      $uploadpath = PATH.config::get('uploadpath');
	  $filepath = config::get("siteurl").config::get('uploadpath').'/';
      if(empty($_GET['path'])) {
	     $current_path = realpath($uploadpath) . '/';
	     $current_url = $filepath;
	     $current_dir_path = '';
	     $moveup_dir_path = '';
      }else{
	     $current_path = realpath($uploadpath) . '/' . $_GET['path'];
	     $current_url = $filepath . $_GET['path'];
	     $current_dir_path = $_GET['path'];
	     $moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
      }
      if($_GET['auto']) $current_path .= '/';		
      if(preg_match('/\.\./', $current_path)){
	     echo 'Access is not allowed.';
	     exit;
      }
      if(!preg_match('/\/$/', $current_path)) {
	     echo 'Parameter is not valid.';
	     exit;
      }
      if(!file_exists($current_path) || !is_dir($current_path)) {
	     echo 'Directory does not exist.';
	     exit;
      }
	  $filelist = dirpath($current_path);
	  usort($filelist, 'cmp_func');
      $result = array();
      $result['moveup_dir_path'] = $moveup_dir_path;
      $result['current_dir_path'] = $current_dir_path;
      $result['current_url'] = $current_url;
      $result['total_count'] = count($filelist);
      $result['file_list'] = $filelist;
      $json = new Services_JSON();
      echo $json->encode($result);
      exit;
	}
	function seccode(){
	  include_once PATH.'library/seccode_class.php';
      $seccode = new ValidationCode('80','31','4');
      $seccode->outImg();
	  exit;
	}	
	function swfupload(){
	  $ftype = str_replace('.','*.',config::get('filetype'));
	  $ftype = str_replace('|',';',$ftype);
	  $fsize = config::get('filesize')/1024;
	  $this->ftype = '图片('.$ftype.')';
	  $this->fsize = "{$fsize}MB";
      $this->fcount = config::get('filecount');		
	} 
    function getcity(){
	  $id = $_GET['id'];
	  $url = $_GET['url']=='/' ? rewrite::request("?mod=index") : $_GET['url'];
	  $city = array();
	  $query = $this->mysql->query("select * from {$this->pre}area where parent_id='{$id}' order by sort asc,area_id asc");
	  while($rs=$this->mysql->assoc($query)){
	   $rs['setcityurl'] = $url.rewrite::request("&myprovince=".$id."&mycity=".$rs['area_id']);
	   $city[] = $rs;
	  }
	  echo json($city);
	  exit;
    }		
	function getType(){
	  $typename = $_GET['typename'];
	  $type = $this->mysql->getarr("select * from {$this->pre}{$typename} order by id desc");
      echo json($type);
	  exit;
	}	
	function cancelpayorder(){
	  $arr['error'] = '0';
	  $pay = $this->mysql->select_one("select * from {$this->pre}payorder where orderid='{$_GET['id']}' and uid='{$this->member['uid']}' and checked='0'");
	  if(is_array($pay)){
        $this->mysql->delete("{$this->pre}payorder","id='{$pay['id']}'");
	  }else{
	    $arr['error'] = '数据获取失败';
	  }
	  echo json($arr);
	  exit;
	}
	function cancelorder(){
	  $arr['error'] = '0';
	  $order = $this->mysql->select_one("select * from {$this->pre}order where id='{$_GET['id']}' and uid='{$this->member['uid']}' and checked='0'");
	  if(is_array($order)){
		if(!$_GET['repass']){
		  $arr['error'] = "请输入支付密码取消订单";
		}else{
		  if($this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
            $this->mysql->delete("{$this->pre}order","id='{$_GET['id']}'");
		  }else{
		    $arr['error'] = "支付密码不正确";
		  }
		}
	  }else{
	    $arr['error'] = '订单数据获取失败';
	  }
	  echo json($arr);
	  exit;
	}
	function payorder(){
  	  $arr['error'] = '0';
  	  $order = $this->mysql->select_one("select * from {$this->pre}order where id='{$_GET['id']}' and uid='{$this->member['uid']}' and checked='0'");
  	  if(is_array($order)){
  		if(!$_GET['repass']){
  		  $arr['error'] = "请输入支付密码取消订单";
  		}else{
  			$update['checked'] = 10;
  			$update['refereeid'] = $this->member['refereeid'];
  			$this->mysql->update("{$this->pre}order",$update,"id='$order[id]'"); 
  		}
  	  }else{
  	    $arr['error'] = '订单数据获取失败';
  	  }
  	  echo json($arr);
  	  exit;
	}
	function paydingorder(){
		if($_GET['type']== 'admin'){
		    if($this->manager_class->password($_GET['repass'],$this->manager['salt'])!=$this->manager['password']){
				$arr['error'] = "管理密码不正确";
				echo json($arr);
			    exit;
		    }
		}

	    $order = $this->mysql->select_one("select * from {$this->pre}store where id='{$_GET['id']}'");
	    if(!is_array($order)){
	    	$arr['error'] = '订货单数据获取失败';
	    	echo json($arr);
	    	exit;
	    }
	    $userdata = $this->mysql->select_one("select * from {$this->pre}user where uid='{$order[uid]}'");
	    $shop = $this->getgoods(1,"goods_id='".$order['goods_id']."'");
	    //$sendway = $_GET['sendway'];
	    
    	if(intval($order['store'])*intval($shop['unit_rate'])*$shop['agent_price']*$shop['ding_rate']*0.01 != $order['ding_price']){
    		$arr['error'] = '订货单数据金额异常';
    		echo json($arr);
    		exit;
    	}
    	if(!$_GET['type']== 'admin'){
    		if($userdata['store']<$order['store']){
    			$arr['error'] = '当前库存不足！';
    			echo json($arr);
    			exit;
    		}
    	}
		$update['status'] = 2; //确认收款
		if($userdata['is_new']){
			$user['is_new'] = 0; 
			$user['new_num'] = $order['store']; 
		}
		//开通会员
		if(!$user['status']){
			$user['status'] = 1;
		}
		$user['store'] = intval($userdata['store']) + $order['store'];
		$result = $this->mysql->update("{$this->pre}store",$update,"id='$order[id]'"); 
		$result = $this->mysql->update("{$this->pre}user",$user,"uid='{$order[uid]}'"); 
		if(!$_GET['type']== 'admin'){
			$log['type'] = 'user';
			$log['uid'] = $userdata['uid'];
			$log['usename'] = $userdata['name'];
			$puser['store'] = $userdata['store'] - $order['store'];
			$result = $this->mysql->update("{$this->pre}user",$puser,"uid='{$order[refereeid]}'"); 
		}else{
			$log['type'] = 'admin';
			$log['uid'] = $userdata['uid'];
			$log['usename'] = $this->manager['usename'];
		}
		
		$log['num'] = $order['store'];
		$log['oid'] = $order['id'];
		$log['addtime'] = time();
		if($result){
			$this->mysql->insert("{$this->pre}storelog",$log);
		}

	  $arr['error'] = '0';
	  echo json($arr);
	  exit;
	}

	function confirmorder(){
  	  	$arr['error'] = '0';
  	  	$order = $this->mysql->select_one("select * from {$this->pre}order where id='{$_GET['id']}' and checked='10'");
  	  	if(!is_array($order)){
  	  		$arr['error'] = '订单数据获取失败';
  	  		echo json($arr);
  	  		exit;
  	  	}
  	  	$user = $this->mysql->select_one("select * from {$this->pre}user where uid='{$order['uid']}'");
  	  	//代理升级处理
  	  	$this->agentlevel($user);
  	  	$update['checked'] = 1;
  	  	$this->mysql->update("{$this->pre}order",$update,"id='$order[id]'"); 
  	  	//开通会员
  	  	if(!$user['status']){
  	  		$status['status'] = 1;
  	  		$this->mysql->update("{$this->pre}user",$status,"uid='$order[uid]'"); 
  	  	}
  	  	echo json($arr);
  	  	exit;
	}

	function backmoney(){
	  $arr['error'] = '0';
	  $order = $this->mysql->select_one("select * from {$this->pre}order where id='{$_GET['id']}' and uid='{$this->member['uid']}'");
	  if(is_array($order)){
		if(!$_GET['repass']){
		  $arr['error'] = "请输入支付密码确认退款";
		}else{
		  if($this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
			if($_GET['message']==''){
			  $arr['error'] = "请输入退款原因";
			  echo json($arr);
			  exit;
			}
			$order['messageq'] = $_GET['message'];
            $error = $this->turnorder($order,3);
			if($error) $arr['error'] = $error;
			$arr['message'] = $order['message']."Q：".$order['messageq']." ".formattime(time())."<br>";
		  }else{
		    $arr['error'] = "支付密码不正确";
		  }
		}
	  }else{
	    $arr['error'] = '订单数据获取失败';
	  }
	  echo json($arr);
	  exit;
	}
	function yeshave(){
	  $arr['error'] = '0';
	  $order = $this->mysql->select_one("select * from {$this->pre}order where id='{$_GET['id']}' and checked='5' and uid='{$this->member['uid']}'");
	  if(is_array($order)){
		if(!$_GET['repass']){
		  $arr['error'] = "请输入支付密码确认收货";
		}else{
		  if($this->user->password($_GET['repass'],$this->member['salt'])==$this->member['repass']){
			$order['goods'] = unserialize($order['goods']);
            $error = $this->turnorder($order,2);
			if($error) $arr['error'] = $error;
		  }else{
		    $arr['error'] = "支付密码不正确";
		  }
		}
	  }else{
	    $arr['error'] = '订单数据获取失败';
	  }
	  echo json($arr);
	  exit;
	}
	function ajax(){
	  if($_GET['do']=='chkemail'){
	    echo $this->user->checkemail($_GET['email']) ? "" : "ok";
		exit;
	  }elseif($_GET['do']=='authemail'){
	    echo $this->user->authemail($_GET['email'],$this->member[uid]);
		exit;
	  }
      exit;
	}
}
?>