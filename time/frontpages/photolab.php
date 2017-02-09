<?php
require_once '../include.php';

$sql='select * from photo where username ="'.$_SESSION['userName'].'"';
$rows=fetchAll($sql);
$_SESSION['photoNum']=getReultNum($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TimeLab&amp;PhotoWall</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="photowall"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="./css/photostyle.css" type="text/css"
	media="all" />
<link href='http://fonts.googleapis.com/css?family=Damion'
	rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<header class="clearfix">
			<div class="header">
				<div class="wrap">
					<div class="logo">
						<a href="index.html"><h1>PhotoWall</h1></a>
					</div>
					<div class="header_top">
                   <div height=15px>
							<a href="Mindex.php" target="_blank";><img src="../frontpages/back.png";></a>
                        </div>
					</div>
					<div class="clear">
					
					</div>
				</div>
			</div>
		</header>
		<div class="main">
			<ul id="og-grid" class="og-grid">	
	<?php
for ($i = 1; $i <= $_SESSION["photoNum"]; $i ++) {
     echo '<li><img src="../data/userimag/' . $_SESSION['userName'] . '/' . $i . '.jpg" alt="#"/></li>'; // 图片目录
}
?>

			            <div class="col-md-4 col-sm-4 hidden-xs text-right">                   
                        <form action="doAction.php" method="post" enctype="multipart/form-data">
                                                 请选择上传文件：<input type="file" name="myfile[]" id="myfile" accept="image/jpeg,image/gif,image/png,image/jpg"/>
                        <input type="submit" value="上传" />
                        </form>
                        </div>


			</ul>
		</div>
	</div>
	<!-- /container -->
	<script>
			$(function() {
				Grid.init();
			});
		</script>
	<div class="copy_right">
	

	
                        
		<p>All Rights Reseverd | Design &copy;by TimeLab</p>
	</div>
</body>
</html>
