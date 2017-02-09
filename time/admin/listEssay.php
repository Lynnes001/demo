<?php
require_once '../include.php';
checkadminLogined();
$uname=$_REQUEST['id'];
$rows=getAllEssay($uname);

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
					class="glyph-icon icon-home"></i>首页</a>

			<li class="childUlLi"><a href="#" target="menuFrame"> <i
					class="glyph-icon icon-reorder"></i>用户管理
			</a>
				<ul style="display: none;">
					<li><a href="listUser.php"><i class="glyph-icon icon-chevron-right"></i>用户列表</a></li>
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
				<h3>用户<?php echo $username;?>的文章列表</h3>


				<div class="details_operation clearfix">
					<div class="bui_select">
						<input type="button" value="添&nbsp;&nbsp;加" class="addUser()"
							onclick="addUser()">
					</div>
				</div>

				<table class="table" cellspacing="0" cellpadding="0" bgcolor="#cccccc">
					<thead>
						<tr>
							<th width="10%">编号</th>
							<th width="10%">数据库ID</th>
							<th width="10%">文章标题</th>
							<th width="10%">正文</th>
							<th width="10%">最后修改时间/发布时间</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
                        <?php $i=1; foreach($rows as $row):?>
                            <tr>
							 <!--这里的id和for里面的c1 需要循环出来-->
							<td><input type="checkbox" id="c1" class="check"><label for="c1"
									class="label"><?php echo $i;?></label></td>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $row['context'];?></td>
							<td><?php echo $row['time'];?></td>
							<td>
							<input type="button" value="修改" class="btn" onclick="editUser(<?php echo $row['id']?>)">
							<input type="button" value="删除" class="btn" onclick="delUser(<?php echo $row['id'];?>)">
							</td>
						    </tr>
                            <?php $i++;endforeach;?>
<!--                             <tr> -->
<!-- 							<td colspan="4"></td> -->
<!-- 						</tr> -->

                        </tbody>
				</table>

			</div>
			<script type="text/javascript">
				function editUser(id){
				window.location="editUser.php?id="+id;
				}

				function addUser(){
				window.location="addUser.php";
				}

				function delUser(id){
				window.location="doUserAction.php?act=delUser&id="+id;
				}


			</script>
		</div>
	</div>
	<div class="layout_footer">
		<p>Copyright © 2015 - TIMBLAB</p>
	</div>

</body>
</html>