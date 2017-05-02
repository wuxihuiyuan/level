$(function() {
	$(".shop-up").click(function() {
		var inputVale = document.getElementById("shop-num-input").value;
		inputVale++;
		$("#shop-num-input").val(inputVale);
		$(".shop-down").css("cursor", "pointer")
	});
	$(".shop-down").click(function() {
		var inputVale = document.getElementById("shop-num-input").value;
		if(inputVale <= 1) {
			$("#shop-num-input").val(1);
			$(this).css("cursor", "not-allowed")
		} else {
			inputVale--;
			$("#shop-num-input").val(inputVale)
		}
	});
	$(".shop-ul>li").hover(function() {
		var index = $(this).index();
		$(this).siblings().removeClass("shopLi-active");
		$(this).addClass("shopLi-active");
		$(".img-wrap img").eq(index).siblings("img").hide();
		$(".img-wrap img").eq(index).css("display","block");
		$(".glass>img").attr("src", $(".img-wrap img").eq(index).attr("src"));
		$(".glass>img").attr("alt", $(".img-wrap img").eq(index).attr("alt"))
	});
	$(".wrap-mask").mouseout(function() {
		$(".glass").hide();
		$(".glass-mask").hide()
	});
	$(".wrap-mask").mousemove(function() {
		$(".glass").show();
		$(".glass-mask").show();
		var e = window.event || event;
		var mouseX = e.offsetX;
		var mouseY = e.offsetY;
		//X轴判断
		if(mouseX <= 50) {
			$(".glass-mask").css({
				"left": "0px"
			})
		} else if(mouseX >= 350) {
			$(".glass-mask").css({
				"left": "300px"
			})
		} else {
			$(".glass-mask").css({
				"left": mouseX - 50 + "px"
			})
			$(".glass>img").css("left", -4 * (mouseX - 50) + "px")
		}
		//Y轴判断
		if(mouseY <= 50) {
			$(".glass-mask").css({
				"top": "0px"
			})
		} else if(mouseY >= 350) {
			$(".glass-mask").css({
				"top": "300px"
			})
		} else {
			$(".glass-mask").css({
				"top": mouseY - 50 + "px"
			});
			$(".glass>img").css("top", -4 * (mouseY - 50) + "px")
		}
	});
})

function settake(id) {
	$("#takeList").find('dl').removeClass('selected');
	$("#remove_" + id).addClass('selected');
	$("#takeid").val(id);
}

function checkform() {
	var post = true;
	if(parseFloat($("#price").html()) <= 0) {
		Wrong('请选择您要订购的产品');
		post = false;
	}
	if(post) listTable.memberfrom('产品订购', 'goodsfrom', '');
	return false;
}
function checkoneform(id) {
	var number = $('#number_' + id).val();
	var post = true;
	if(parseFloat(number) <= 0) {
		Wrong('请选择数量！');
		post = false;
	}
	if(post) listTable.memberfrom('产品订购', 'goodsfrom', '');
	return false;
}

function _number(code, id) {
	var number = $('#number_' + id).val();
	var _price = parseFloat($('#_price_' + id).html());
	var price = parseFloat($('#price').html());
	if(!(number.match(/\D/) === null)) {
		Wrong('购买数量请输入数字!');
		$('#number_' + id).val('0');
		$('#number_' + id)[0].focus();
		return false;
	}
	if(code == 1) $('#number_' + id).val(parseInt(number) + 1);
	if(code == -1) {
		if(parseInt(number) < 1) {
			$('#number_' + id).val('0');
		} else {
			$('#number_' + id).val(parseInt(number) - 1);
		}
	}
	getprice(id);
}

function _input(obj, id) {
	var number = $(obj).val();
	var _price = parseFloat($('#_price_' + id).html());
	var price = parseFloat($('#price').html());
	if(!(number.match(/\D/) === null)) {
		Wrong('购买数量请输入数字!');
		$(obj)[0].focus();
		$(obj).val('0');
		return false;
	}
	if(number < 0) {
		Wrong('请输入大于或等于零的数字!');
		$(obj)[0].focus();
		$(obj).val('0');
		return false;
	}
	getprice(id);
}

function getprice(id) {
	var _price = parseFloat($('#_price_' + id).html());
	$("#price_" + id).html(parseFloat(_price * parseInt($('#number_' + id).val())).toFixed(2));
	var price = 0.00;
	$(".price_").each(function() {
		price += parseFloat($(this).html());
	});
	$("#price").html(price);
}

function addtack(id) {
	if(id == null) {
		sinbox('关联爱真情账号信息', get_path_url('?mod=member&act=delivery&refun=restack'), 430, 350);
	} else {
		sinbox('更新爱真情账号信息', get_path_url('?mod=member&act=delivery&refun=retack&id=' + id), 430, 350);
	}
}

function restack(json) {
	if(json == null) return false;
	var div = '<dl id="remove_' + json.id + '" onClick="settake(\'' + json.id + '\');">';
	div += '<dt><strong class="itemConsignee">' + json.name + '</strong> <span class="itemTel">' + json.mobile + '</span> </dt>';
	div += '<dd><p class="itemStreet">' + json.address + '</p>';
	div += '<span class="icon-common icon-common-del delete" onClick="listTable.memberRemove(\'' + json.id + '\',\'确定要解除该账号信息关系?\');"></span>';
	div += '<span class="icon-common icon-common-edit" onClick="addtack(\'' + json.id + '\');"></span>';
	div += '</dd>';
	div += '</dl>';
	$('#takeList').append(div);
	Close();
}

function retack(json) {
	if(json == null) return false;
	var div = '<dt><strong class="itemConsignee">' + json.name + '</strong> <span class="itemTel">' + json.mobile + '</span> </dt>';
	div += '<dd><p class="itemStreet">' + json.address + '</p>';
	div += '<span class="icon-common icon-common-del delete" onClick="listTable.memberRemove(\'' + json.id + '\',\'确定要解除该账号信息关系?\');"></span>';
	div += '<span class="icon-common icon-common-edit" onClick="addtack(\'' + json.id + '\');"></span>';
	div += '</dd>';
	$("#remove_" + json.id).html(div);
	Close();
}