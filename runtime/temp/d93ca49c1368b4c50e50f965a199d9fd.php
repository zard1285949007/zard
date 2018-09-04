<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"/home/www/WWW/public/../application/admin/view/login/index.html";i:1517900467;}*/ ?>
<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link href="__STATIC__/admin/assets/css/bootstrap.css" rel="stylesheet" />
	<script src="__STATIC__/admin/assets/js/jquery-1.10.2.js"></script>
	<style type="text/css">
	#main {
    	display: flex;
	}

	#main div {
		margin:auto;
	}
</style>
</head>
<body style="height:100%;margin:0px">
	<div style="width:100%;height:100%" id="main">
		<div style="width:250px;height:270px;border:1px inset black;padding:20px;box-shadow: 2px 1px 1px gray">
			<form action="<?php echo url("login/login"); ?>" method="post">
				<input type="text" name="user" placeholder="请输入账号" style="width:100%;margin:10px 10px 10px 0px" autofocus=true>
				<input type="password" name="password" placeholder="请输入密码" style="width:100%;margin:10px 10px 10px 0px">
				<input type="text" name="captcha" placeholder="请填写验证码" style="width:100%;margin:10px 10px 10px 0px">
				<div><img src="<?php echo captcha_src(); ?>" alt="captcha" id="captcha_img"/></div>
				<input type="submit" value="登录" style="width:100%;margin:10px 10px 10px 0px">
			</form>
		</div>
	</div>
	<script type="text/javascript">
		
		$("#captcha_img").click(function(){
			var ts=Date.parse(new Date())/1000;
			$(this).attr("src","/captcha.html?id="+ts);
		});
		
	</script>
</body>
</html>