<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>TIMELAB管理员页面</title>
<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/menu.js" type="text/javascript" charset="utf-8"></script>
<script src="js/global.js" type="text/javascript" charset="utf-8"></script>
<script src="js/modal.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="css/style.css" type="text/css"
	media="screen" charset="utf-8" />
</head>
<body>
	<div id="wrapper_login">
		<div id="menu">
			<div id="left"></div>
			<div id="right"></div>
			<h2>管理员登录</h2>
			<div class="clear"></div>
		</div>
		<div id="desc">
			<div class="body">
				<div class="col w10 last bottomlast">
					<form action="dologin.php" method="post">
						<p>账 &nbsp 号:<input type="text" name="admin" id="admin" value="" size="30" class="text" /></p>
						<p>密 &nbsp 码:<input type="password" name="passwd" id="passwd" value="" size="30" class="text" /></p>
						<p>验证码:<input type="text" name="verify" id="verify" value="" size="30" class="text" /></p>
					    <p><img src="getVerify.php" alt="" /></p>
						<input type="submit" value="登录" />
					</form>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div id="body_footer">
				<div id="bottom_left">
					<div id="bottom_right"></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>