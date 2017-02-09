<?php
require_once '../include.php';
$id = $_REQUEST['id'];
$sql="select * from admin where id = '{$id}'";
$row=fetchOne($sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>TIMELAB blog后台管理</title>

	<link rel="stylesheet" href="css/index.css" type="text/css"
		media="screen">

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/tendina.js"></script>
		<script type="text/javascript" src="js/common.js"></script>

</head>
<body>
	<!--顶部-->
	<div class="layout_top_header">
		<div style="float: left">
			<span
				style="font-size: 16px; line-height: 45px; padding-left: 20px; color: #8d8d8d">TIMELAB
				BLOG管理后台</span>
		</div>
		<div id="ad_setting" class="ad_setting">
			<a class="ad_setting_a" href="javascript:;"> <i
				class="icon-user glyph-icon" style="font-size: 20px"></i> <span>管理员 <?php echo $_SESSION['adminName']; ?></span>
				<i class="icon-chevron-down glyph-icon"></i>
			</a>
			<ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
				<li class="ad_setting_ul_li"><a href="javascript:;"><i
						class="icon-user glyph-icon"></i> 个人中心 </a></li>
				<li class="ad_setting_ul_li"><a href="javascript:;"><i
						class="icon-cog glyph-icon"></i> 设置 </a></li>
				<li class="ad_setting_ul_li"><a href="doAdminAction.php?act=logout"><i
						class="icon-signout glyph-icon"></i> <span class="font-bold">注销账户</span>
				</a></li>
			</ul>

		</div>
	</div>
	<!--顶部结束-->
	<!--菜单-->
	<div class="layout_left_menu">
		<ul class="tendina" id="menu">
			<li class="childUlLi"><a href="index.php" target="menuFrame"><i
					class="glyph-icon icon-home"></i>后台管理首页</a>

			<li class="childUlLi"><a href="#" target="menuFrame"> <i
					class="glyph-icon icon-reorder"></i>用户管理
			</a>
				<ul style="display: none;">
					<li><a href="listUser.php"><i class="glyph-icon icon-chevron-right"></i>用户资料</a></li>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>用户博文</a></li>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>数据管理</a></li>
				</ul></li>
			<li class="childUlLi"><a href="#" target="menuFrame"> <i
					class="glyph-icon icon-reorder"></i>管理员管理
			</a>
				<ul style="display: none;">
					<li><a href="listAdmin.php"><i
							class="glyph-icon icon-chevron-right"></i>管理员列表</a></li>
					<li><a href="addAdmin.php"><i class="glyph-icon icon-chevron-right"></i>添加管理员</a></li>
					<li><a href="#"><i class="glyph-icon icon-chevron-right"></i>帮助文件</a></li>
				</ul></li>
			<li class="childUlLi"><a href="#"> <i
					class="glyph-icon  icon-location-arrow"></i>菜单管理
			</a>
				<ul style="display: none;">
					<li><a href="#" target="menuFrame"><i
							class="glyph-icon icon-chevron-right"></i>平台菜单</a></li>
					<li><a href="#" target="menuFrame"><i
							class="glyph-icon icon-chevron-right"></i>菜单</a></li>
					<li><a href="#" target="menuFrame"><i
							class="glyph-icon icon-chevron-right"></i>菜单</a></li>
					<li><a href="#" target="menuFrame"><i
							class="glyph-icon icon-chevron-right"></i>菜单</a></li>
				</ul></li>
		</ul>
	</div>
	<!--菜单-->
	<div id="layout_right_content" class="layout_right_content">
		<div class="route_bg">
			<a>后台管理</a>
		</div>
		<div class="mian_content">
			<div id="page_content">

			<?php print_r($row);?>
				<h3>编辑管理员</h3>
				<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
					<table width="30%" border="1" cellpadding="5" cellspacing="0"
						bgcolor="#cccccc">
						<tr>
							<td align="right">管理员名称</td>
							<td><input type="text" name="username" placeholder="<?php echo $row['username']?>" /></td>
						</tr>
						<tr>
							<td align="right">管理员密码</td>
							<td><input type="password" name="passwd" placeholder="<?php echo $row['passwd']?>"/></td>
						</tr>
						<tr>
							<td align="right">管理员邮箱</td>
							<td><input type="text" name="email" placeholder="<?php echo $row['email']?>" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="确认修改"></td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>
	<div class="layout_footer">
		<p>Copyright © 2015 - TIMBLAB</p>
	</div>

</body>
</html>