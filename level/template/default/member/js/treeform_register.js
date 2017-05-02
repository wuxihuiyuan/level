function checkusername() {
	var username = $("#username").val();
	var testUser = /^[a-zA-z][a-zA-Z0-9_]{2,15}$/;
	if(username == '') {
		addtip("username", "请输入您要使用的用户名");
	} else if(username.length < 3 || username.length > 16) {
		addtip("username", "用户名长度3-16个字符");
	} else if(isFirstNum(username)) {
		addtip("username", "用户名不能使用数字、汉字开头");
	} else if(!testUser.test(username)) {
		addtip("username", "仅可使用字母、数字、汉字");
	} else {
		$.getJSON(get_url("act=verifyusername&username=" + encodeURIComponent(username)), function(res) {
			if(res.error == '0') {
				addtip("username", '已注册过，请更换用户名');
			} else {
				yestip("username", "用户名可用");
			}
		});
	}
}

function checkemail() {
	var email1 = $("#email").val();
	var testEmail = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
	if(email1 == "") {
		addtip("email","邮箱不能为空")
	}else if(!testEmail.test(email1)){
		addtip("email", "请输入正确的邮箱");
	}else{
		yestip("email","&nbsp;")
	}
}

function checkidcard(){
	var idcard = $("#idcard").val();
	var testidcard = /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
	if(idcard == "") {
		addtip("idcard","身份证不能为空")
	}else if(!testidcard.test(idcard)){
		addtip("idcard", "身份证不合法");
	}else{
		yestip("idcard","&nbsp;")
	}
	
}

function checkuserphone() {
	var userphone = $("#userphone").val();
	if(userphone == '') {
		addtip("userphone", "您还没有输入手机号码");
	} else if(userphone.length < 11 || userphone.length > 11) {
		addtip("userphone", "请输入有效的手机号码");

	} else {
		yestip("userphone", "&nbsp;");
	}
}

function checknowopen() {
	var nowopen = $("#nowopen").val();
	var mymoney = parseFloat($("#mymoney").val());
	if(nowopen == '') {
		addtip("nowopen", "请选择是否现在开通");
	} else {
		yestip("nowopen", '');
		checkgroupid();
	}
}

function checkgroupid() {
	var groupid = $("#groupid").val();
	if(groupid == '') {
		addtip("groupid", "对不起，请选择会员级别");
	} else {
		yestip("groupid", '', '1');
	}
}

function checkreferee() {
	var referee = $("#referee").val();
	if(referee == '') {
		addtip("referee", "对不起，请输入直荐会员");
	} else {
		$.getJSON(get_url("act=verifyusername&username=" + encodeURIComponent(referee)), function(res) {
			if(res.error == '0') {
				yestip("referee", res.truename);
			} else {
				addtip("referee", res.error);
			}
		});
	}
}

function check_referee() {
	var _referee = $("#_referee").val();
	if(_referee == '') {
		addtip("_referee", "对不起，请输入会员上线");
	} else {
		$.getJSON(get_url("act=verifyusername&username=" + encodeURIComponent(_referee)), function(res) {
			if(res.error == '0') {
				yestip("_referee", res.truename);
			} else {
				addtip("_referee", res.error);
			}
		});
	}
}

function checktruename() {
	if($("#truename").val() == '') {
		addtip("truename", "请填写会员姓名。");
	} else {
		yestip("truename", "");
	}
}

function checkpassword() {
	if($("#password").val() == '') {
		addtip("password", "至少6位的数字、字母组合。");
	} else if($("#password").val().length < 6) {
		addtip("password", "密码长度最小六位！");
	} else {
		yestip("password", "");
	}
}

function checkrepass() {
	if($("#_repass").val() == "") {
		addtip("_repass", "请再次输入支付密码。");
	} else if($("#_repass").val().length < 6) {
		addtip("_repass", "支付密码长度最小六位！");
	} else {
		yestip("_repass", "");
	}
}

function checkservice() {
	var service = $("#service").val();
	if(service == '') {
		removetip("service", '');
	} else {
		$.getJSON(get_url("act=verifyservice&username=" + encodeURIComponent(service)), function(res) {
			if(res.error == '0') {
				yestip("service", res.truename);
			} else {
				addtip("service", res.error);
			}
		});
	}
}

function checkform() {
	var post = true;
	var testUser = /^[\u4E00-\u9FA5a-z0-9_]+$/i;
	if($("#username").val() == '') {
		addtip("username", "请输入您要使用的用户名");
		post = false;
	}
	if($("#username").val().length < 3 || $("#username").val().length > 20) {
		post = false;
	}
	if(isFirstNum($("#username").val()) && post) {
		post = false;
	}
	if(!testUser.test($("#username").val()) && post) {
		post = false;
	}
	if($("#usernametip").html().indexOf('已注册过') != -1 && post) {
		post = false;
	}
	if(!(isPhone($("#userphone").val()) || $("#userphone").val() == '')) {
		post = false;
	}

	if(!(isEmail($("#email").val()) || $("#email").val() == '')) {
		post = false;;
	}
	if($("#nowopen").val() == '') {
		addtip("nowopen", "请选择是否现在开通");
		post = false;
	}
	if($("#truename").val() == '') {
		addtip("truename", "请填写会员姓名。");
		post = false;
	}
	if($("#userphone").val() == '') {
		addtip("userphone", "您还没有填写手机号码");
		post = false;
	}
	if($("#_refereetip").html().indexOf('会员上线不存在') != -1 && post) {
		post = false;
	}
	if($("#password").val() == '') {
		addtip("password", "对不起，请输入会员登陆密码");
		post = false;
	}
	if($("#password").val().length < 6) {
		addtip("password", "密码长度最小六位！");
		post = false;
	}
	if($("#_repass").val() == '') {
		addtip("_repass", "对不起，请输入支付密码");
		post = false;
	}
	if($("#_repass").val().length < 6) {
		addtip("_repass", "支付密码长度最小六位！");
		post = false;
	}
	if(post) listTable.register();
	return false;
}