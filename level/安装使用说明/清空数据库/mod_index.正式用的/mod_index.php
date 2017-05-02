<?php
if (!defined('ROOT')) exit('Can\'t Access !'); 
class mod_index extends module_class{
 function main(){//首页
    location("?mod=member");
 } 
}
?>