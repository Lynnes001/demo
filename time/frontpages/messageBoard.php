<?php 
require_once '../include.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>time lab message board</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<div>
	<h1>Contact Us</h1>
	<div class="login-01">
			<form action="../admin/doUserAction.php?act=sendMessage" method="post">
				<ul>
				<li class="first">
					<a href="#" class=" icon user"></a><input type="text" name="name" class="text" placeholder="Name" >
					<div class="clear"></div>
				</li>
				<li class="first">
					<a href="#" class=" icon email"></a><input type="text" name="email" class="text" placeholder="Email" >
					<div class="clear"></div>
				</li>
				<li class="first">
					<a href="#" class=" icon phone"></a><input type="text" name="phonenumber" class="text" placeholder="Phone" >
					<div class="clear"></div>
				</li>
				<li class="second">
				        <a href="#" class=" icon msg"></a><textarea placeholder="Message" name="message" ></textarea>
				        <div class="clear"></div>
				</li>
			</ul>
			<input type="submit" value="Submit" >
		</form>
</div>
</body>
</html>