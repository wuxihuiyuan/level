<? if (!defined('ROOT')) exit('Can\'t Access !'); include template('member_header','default/member'); ?>
<div id="main">
    <div class="left">
<? include template('member_left','default/member'); ?>
</div>
    <div class="right">
        <div class="opencard_main">
            <? if($_GET['type']=='index') { ?>
            <div class="mall-banner-box">
                <img src="template/default/member/images/30pxgray_r.png" alt="商品1" class="mall-banner bg1"
                     style="display: block">
                <img src="template/default/member/images/bg.jpg" alt="商品2" class="mall-banner bg2">
                <img src="template/default/member/images/disktopbg.jpg" alt="商品3" class="mall-banner bg3">
                <img src="template/default/member/images/header_bg.jpg" alt="商品4" class="mall-banner bg4">
                <ul class="bannerNav">
                    <li class="bannerNav-on"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <span id="mall-right" class="mall-right"></span>
                <span id="mall-left" class="mall-left"></span>
            </div>
            <div class="mall-product-list">
                <? if(is_array($this->category)) { foreach($this->category as $k=>$v) { ?>                <div class="mall-product-item">
                    <h4 class="mall-product-title"><span><?=$v['sort']?>F</span><?=$v['name']?></h4>
                    <? if(is_array($v['goods'])) { foreach($v['goods'] as $key=>$good) { ?>                    <? $img=explode(',', $good['goods_thumb'])[0]; ?>                    <div class="mall-product">
                        <img src="<?=$img?>" alt="商品1">
                        <h6><?=$good['goods_name']?></h6>
                        <p><?=$good['title']?></p>
                        <span><?=$good['shop_price']*$good['point_rate']; ?></span>
                        <button><a href="<?=Purl("
                                   ?mod=member&act=jfgoods&type=list&id=".$good['goods_id']); ?>">买买买</a></button>
                    </div>
                    <? } } ?>                    <? if(count($v['goods'])<4) { ?>
                    <div class="mall-product mall-later">
                        <i></i>
                        <h5>敬请期待</h5>
                    </div>
                    <? } ?>
                </div>
                <? } } ?>            </div>
            <div class="product-navBar">
                <? if(is_array($this->category)) { foreach($this->category as $k=>$v) { ?>                <div class="product-nav <? if($v['sort']==1) { ?> mall-lastNav<? } ?>"><?=$v['sort']?>F</div>
                <? } } ?>            </div>
            <div class="mall-toTop"></div>
            <? } ?>
            <? if($_GET['type']=='order') { ?>
            <? if($_GET['id']) { ?>
            <div class="xm-box uc-box">
                <div class="hd">
                    <h3 class="title">订单号：<?=$this->order['orderid']?></h3>
                </div>
                <div class="bd">
                    <div class="order-delivery-items">
                        <div class="order-delivery-item">
                            <table class="order-delivery-table">
                                <thead>
                                <tr>
                                    <th class="cell-order-goods">商品信息</th>
                                    <th class="cell-order-total">订单积分</th>
                                    <th class="cell-order-total">折后积分</th>
                                    <th class="cell-order-actions">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? $i=0; ?>                                <? if(is_array($this->order['goods'])) { foreach($this->order['goods'] as $val) { ?>                                <tr>
                                    <td class="cell-order-goods">
                                        <div class="order-goods-info"><?=$val['goods_name']?></div>
                                        <div class="order-goods-price"><?=$val['shop_price']*$val['point_rate']; ?>                                        </div>
                                        <div class="order-goods-amount">x <?=$val['number']?></div>
                                        <div class="order-goods-price"><?=$val['money']*$val['point_rate']; ?></div>
                                    </td>
                                    <? if($i==0) { ?>
                                    <td rowspan="<?=count($this->order['goods']); ?>"><?=$this->order['money']?></td>
                                    <td rowspan="<?=count($this->order['goods']); ?>"><?=$this->order['price']?></td>
                                    <td rowspan="<?=count($this->order['goods']); ?>" class="cell-order-actions">
                                        <span id="check_user_<?=$this->order['id']?>" price="<?=$this->order['price']?>"><?=order_checkjf_user($this->order); ?></span>
                                    </td>
                                    <? } ?>
                                </tr>
                                <? $i++; ?>                                <? } } ?>                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="order-delivery-address clearfix">
                        <div class="order-text-section-l">
                            <h4>收 件 信 息 </h4>
                            <table class="order-text-table">
                                <tr>
                                    <th>收件人名称</th>
                                    <td><?=$this->order['delivery']['name']?></td>
                                </tr>
                                <tr>
                                    <th>收件人地址</th>
                                    <td><?=$this->order['delivery']['address']?></td>
                                </tr>
                                <tr>
                                    <th>联系电话</th>
                                    <td><?=$this->order['delivery']['mobile']?></td>
                                </tr>
                            </table>
                        </div>
                        <? if($this->order['express']) { ?>
                        <div style="clear:both;">&nbsp;</div>
                        <div class="order-text-section-l">
                            <h4>发货信息 </h4>
                            <table class="order-text-table">
                                <tr>
                                    <th>物流信息：</th>
                                    <td><?=$this->order['express']?></td>
                                </tr>
                                <tr>
                                    <th>物流单号：</th>
                                    <td><?=$this->order['expressnumber']?></td>
                                </tr>
                                <tr>
                                    <th>发货时间：</th>
                                    <td><?=formattime($this->order['ftime']); ?></td>
                                </tr>
                            </table>
                        </div>
                        <? } ?>
                        <!-- <? if($this->order['message']) { ?>-->
                        <div style="clear:both;">&nbsp;</div>
                        <div class="order-text-section-l">
                            <h4>退货交流信息</h4>
                            <div style="padding:0 0 0 25px;font-size:12px;line-height:22px;" id="_aq_"><?=$this->order['message']?>
                            </div>
                        </div>
                        <? } ?>
                    </div>
                </div>
            </div>
            <? } else { ?>
            <div class="track_title">
                <a href="<?=Purl(memberpre(1)." &type=order"); ?>"
                   class="<?=!$_GET['method'] ? 'menushow' : 'menu'; ?>">全部订单</a>
                <a href="<?=Purl(memberpre(1)." &type=order&method=nopay"); ?>"
                   class="<?=$_GET['method']=='nopay' ? 'menushow' : 'menu'; ?>">待付款订单</a>
                <a href="<?=Purl(memberpre(1)." &type=order&method=yespay"); ?>"
                   class="<?=$_GET['method']=='yespay' ? 'menushow' : 'menu'; ?>">待发货订单</a>
                <a href="<?=Purl(memberpre(1)." &type=order&method=backnow"); ?>"
                   class="<?=$_GET['method']=='backnow' ? 'menushow' : 'menu'; ?>">退款中订单</a>
                <a href="<?=Purl(memberpre(1)." &type=order&method=backed"); ?>"
                   class="<?=$_GET['method']=='backed' ? 'menushow' : 'menu'; ?>">已退款订单</a>
                <a href="<?=Purl(memberpre(1)." &type=order&method=yessend"); ?>"
                   class="<?=$_GET['method']=='yessend' ? 'menushow' : 'menu'; ?>">已发货订单</a>
                <a href="<?=Purl(memberpre(1)." &type=order&method=yesdeal"); ?>"
                   class="<?=$_GET['method']=='yesdeal' ? 'menushow' : 'menu'; ?>">已成交订单</a>
            </div>
            <div class="member_mian">
                <form method="GET" action="">
                    <input type="hidden" name="mod" id="mod" value="<?=$_GET['mod']?>"/>
                    <input type="hidden" name="act" id="act" value="<?=$_GET['act']?>"/>
                    <input type="hidden" name="type" id="type" value="<?=$_GET['type']?>"/>
                    <input type="hidden" name="typeid" id="typeid" value="<?=$_GET['typeid']?>"/>
                    <div class="ex_find">
                        <div class="ex_text">订单编号</div>
                        <div class="log_input_box">
                            <input name="orderid" type="text" class="log_input" value="<?=$_GET['orderid']?>"/>
                        </div>
                        <div class="ex_text">查询日期</div>
                        <div class="ex_time_box"><?=config::form('time',$this->t['str'],'datas');?></div>
                        <div class="ex_button_box">
                            <input type="submit" id="button" value="查&nbsp;&nbsp;询" class="find_button"/>
                        </div>
                    </div>
                </form>
                <div class="info_bg">
                    <div class="info_text">查询统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录</div>
                </div>
                <table class="sheet">
                    <tr>
                        <th>订单编号</th>
                        <th>产品列表(名称，单价，数量，小计)</th>
                        <th>订单积分</th>
                        <th>折后积分</th>
                        <th>订购时间</th>
                        <th>目前状态</th>
                    </tr>
                    <? if(is_array($this->order)) { foreach($this->order as $value) { ?>                    <tbody id="remove_<?=$value['id']?>">
                    <tr class="mybg">
                        <td width="12%"><?=$value['orderid']?></td>
                        <td class="order-delivery-table" style="width:40%">
                            <? if(is_array($value['goods'])) { foreach($value['goods'] as $val) { ?>                            <div class="order-goods-info" style="padding-top:0;padding-bottom:0;"><?=$val['goods_name']?>
                            </div>
                            <div class="order-goods-price" style="padding-top:0;padding-bottom:0;"><?=$val['shop_price']*$val['point_rate']; ?>                            </div>
                            <div class="order-goods-amount" style="padding-top:0;padding-bottom:0;">x <?=$val['number']?>
                            </div>
                            <div class="order-goods-price" style="padding-top:0;padding-bottom:0;"><?=$val['money']?></div>
                            <div style="clear:both;"></div>
                            <? } } ?>                        </td>
                        <td width="10%" class="red"><?=$value['money']?></td>
                        <td width="10%" class="red"><?=$value['price']?></td>
                        <td width="10%"><?=$value['addtime']?></td>
                        <td width="12%" style="line-height:24px;padding:10px 0;"><span id="check_user_<?=$value['id']?>"
                                                                                       price="<?=$value['price']?>"><?=order_checkjf_user($value); ?></span>
                            <br/><a href="<?=Purl(" ?mod=member&act=jfgoods&type=order&id=".$value['id']); ?>">订单详情</a>
                        </td>
                    </tr>
                    </tbody>
                    <? } } ?>                </table>
                <? if(!is_array($this->order)) { ?>
                <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
                <? } ?>
                <? if($this->newpage) { ?>
                <div class="pages"><?=$this->newpage?></div>
                <? } ?>
            </div>
            <? } ?>
            <? } ?>
            <? if($_GET['type']=='list') { ?>
            <!--商品详情页-->
            <? if($_GET['id']) { ?>
            <div class="shop-box">
                <div class="shop-left">
                    <div class="img-wrap">
                        <? if(is_array($this->goods['goods_thumb'])) { foreach($this->goods['goods_thumb'] as $k => $img) { ?>                        <img src="<?=$img?>" alt="商品<?=$k?>">
                        <? } } ?>                        <div class="glass-mask" style="display: none"></div>
                        <div class="wrap-mask"></div>
                    </div>
                    <ul class="shop-ul">
                        <? if(is_array($this->goods['goods_thumb'])) { foreach($this->goods['goods_thumb'] as $k => $img) { ?>                        <li class="<? if($k<1) { ?>shopLi-active<? } ?>"><img src="<?=$img?>" alt="商品<?=$k?>"></li>
                        <? } } ?>                    </ul>
                    <div class="glass" style="display: none">
                        <img src="<?=$img?>" alt="">
                    </div>
                </div>
                <script>
                    $(".img-wrap img").eq(0).css("display","block");
                </script>
                <div class="shop-right">
                    <h5 class="shop-title"><?=$this->goods['goods_name']?></h5>
                    <div class="shop-intro"><?=$this->goods['title']?></div>
                    <div class="shop-price-box">
                        <h6>666666</h6>
                        <p><?=$this->goods['shop_price']?></p>
                    </div>
                    <form method="post" name="goodsfrom" id="goodsfrom" action=""
                          onsubmit="return checkoneform(<?=$this->goods['goods_id']?>)">
                        <div class="shop-num">
                            <input type="hidden" name="goodsid[<?=$this->goods['goods_id']?>]"
                                   value="<?=$this->goods['goods_id']?>">
                            <div class="change-goods-num clearfix changeGoodsNum" style="text-align: left">
                                <a href="javascript:_number(-1,<?=$this->goods['goods_id']?>);" style="margin: 0"><span
                                        class="icon-common icon-common-negative"></span></a>
                                <input tyep="text" name="number[<?=$this->goods['goods_id']?>]" value="0"
                                       onblur="return _input(this,'<?=$this->goods['goods_id']?>');" class="goods-num"
                                       id="number_<?=$this->goods['goods_id']?>">
                                <a href="javascript:_number(1,<?=$this->goods['goods_id']?>);" style="margin: 0"><span
                                        class="icon-common icon-common-add"></span></a>
                            </div>
                        </div>
                        <div class="shop-buy"><?=config::form('shop-buy','立即购买','submit','','class=\'shop-cart-btns\'');?></div>
                    </form>
                </div>
            </div>
            <div class="shop-bottom">
                <div class="shop-size">
                    <ul class="shopSize-tap">
                        <li>商品详情</li>
                    </ul>
                    <div class="shop-size-box">
                        <div class="shop-size-detail">
                            <?=$this->goods['goods_desc']?>
                        </div>
                    </div>
                </div>
                <div class="guessLike">
                    <div class="guess-pro">
                        <img src="" alt="猜你喜欢">
                        <p>6666</p>
                    </div>
                    <div class="guess-pro">
                        <img src="" alt="猜你喜欢">
                        <p>6666</p>
                    </div>
                    <div class="guess-pro">
                        <img src="" alt="猜你喜欢">
                        <p>6666</p>
                    </div>
                    <div class="guess-pro">
                        <img src="" alt="猜你喜欢">
                        <p>6666</p>
                    </div>
                </div>
            </div>
            <? } ?>

            <? if(!$_GET['id']) { ?>
            <div class="opencards_title">
                <div class="opencards_title_b">我的会员</div>
            </div>
            <div class="member_mian">
                <div class="info_bg">
                    <div class="info_text">产品统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录</div>
                </div>
                <form method="post" name="goodsfrom" id="goodsfrom" action="" onsubmit="return checkform()">
                    <table class="sheet">
                        <tr>
                            <th>产品编号</th>
                            <th>产品名称</th>
                            <th>所需积分</th>
                            <th>享受折扣</th>
                            <th>实际积分</th>
                            <!--<th>剩余库存</th>-->
                            <th>订购数量</th>
                            <th>积分小计</th>
                        </tr>
                        <? if(is_array($this->record)) { foreach($this->record as $value) { ?>                        <tr class="mybg">
                            <td><?=$value['goods_id']?><input type="hidden" name="goodsid[<?=$value['goods_id']?>]"
                                                           value="<?=$value['goods_id']?>"></td>
                            <td><?=$value['goods_name']?></td>
                            <td class="red"><?=$value['shop_price']*$value['point_rate']; ?></td>
                            <td><?=$this->member['usergroup']['rebate']?>%</td>
                            <td class="red"><span id="_price_<?=$value['goods_id']?>"><?=intval($value['shop_price']*$this->member['usergroup'][rebate]*0.01*$value['point_rate']); ?></span>
                            </td>
                            <!--<td><span id="stock_<?=$value['goods_id']?>"><?=$value['stock']?></td>-->
                            <td>
                                <div class="change-goods-num clearfix changeGoodsNum">
                                    <a href="javascript:_number(-1,<?=$value['goods_id']?>);"><span
                                            class="icon-common icon-common-negative"></span></a>
                                    <input tyep="text" name="number[<?=$value['goods_id']?>]" value="0"
                                           onblur="return _input(this,'<?=$value['goods_id']?>');" class="goods-num"
                                           id="number_<?=$value['goods_id']?>">
                                    <a href="javascript:_number(1,<?=$value['goods_id']?>);"><span
                                            class="icon-common icon-common-add"></span></a>
                                </div>
                            </td>
                            <td class="red"><span id="price_<?=$value['goods_id']?>" class="price_">0.00</span></td>
                        </tr>
                        <? } } ?>                    </table>
                    <div class="shop-cart-count">
                        <div class="shop-cart-total">
                            <p class="total-price">总计积分：<span><strong id='price'>0.00</strong>元</span></p>
                        </div>
                    </div>
                    <div class="xm-box">
                        <div class="bd">
                            <div class="xm-address-list" id="takeList">
                                <? if(is_array($this->delivery)) { foreach($this->delivery as $value) { ?>                                <dl id="remove_<?=$value['id']?>" onClick="settake('<?=$value['id']?>');">
                                    <h1>收货地址：</h1>
                                    <dt><strong class="itemConsignee"><?=$value['name']?></strong> <span class="itemTel"><?=$value['mobile']?></span>
                                    </dt>
                                    <dd>
                                        <p class="itemStreet"><?=$value['address']?> </p>
                                        <span class="icon-common icon-common-del delete"
                                              onClick="listTable.memberRemove('<?=$value['id']?>','确定要删除该收货信息?');"></span>
                                        <span class="icon-common icon-common-edit"
                                              onClick="addtack('<?=$value['id']?>');"></span>
                                    </dd>
                                </dl>
                                <? } } ?>                            </div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <?=config::form('shop-cart-btns','现在去结账','submit','','class=\'shop-cart-btns\'');?>
                    <div class="shop-cart-btns nobtns">暂不订购了</div>
                </form>
                <? if(!is_array($this->record)) { ?>
                <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
                <? } ?>
                <? if($this->newpage) { ?>
                <div class="pages"><?=$this->newpage?></div>
                <? } ?>
            </div>
            <? } ?>
            <? } ?>
            <? if($_GET['type']=='capital') { ?>
            <div class="track_title">
                <a href="<?=Purl(" ?mod=member&act=jfgoods&type=capital"); ?>"
                   class="<?=$_GET['method']=='main' ? 'menushow' : 'menu'; ?>">积分明细</a>
            </div>
            <div class="member_mian">
                <div class="info_bg">
                    <div class="info_text">
                        统计：总共有 <b class="text_red_line"><?=$this->pagetotal?></b> 条记录&nbsp;&nbsp;
                        我的积分 <b class="text_red_line">&nbsp;<?=$this->member['good_point']?></b>
                    </div>
                </div>
                <table class="sheet">
                    <tr>
                        <th>记录编号</th>
                        <th>记录说明</th>
                        <th>积分</th>
                        <th>合计</th>
                        <th>时间</th>
                    </tr>
                    <? if(is_array($this->record)) { foreach($this->record as $value) { ?>                    <tr class="mybg">
                        <td><?=$value['id']?></td>
                        <td><?=$value['content']?></td>
                        <td class="red"><?=$value['1']['lognum'] ? $value['1']['lognum'] : "0.00"; ?></td>
                        <td class="red"><?=formatnum($value['1']['lognum']+$value['2']['lognum']+$value['4']['lognum']); ?>                        </td>
                        <td><?=formattime($value['addtime'],'Y-m-d H:i:s'); ?></td>
                    </tr>
                    <? } } ?>                </table>
                <? if(!is_array($this->record)) { ?>
                <div class="no_info"><span class="no_info_ico"></span>暂无任何记录</div>
                <? } ?>
                <? if($this->newpage) { ?>
                <div class="pages"><?=$this->newpage?></div>
                <? } ?>
            </div>
            <? } ?>
        </div>
    </div>
</div>
<? include template('member_footer','default/member'); ?>
