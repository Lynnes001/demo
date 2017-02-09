<?php
require_once '../include.php';

?>


<!DOCTYPE HTML>
<TITLE>timelab register</TITLE>

<STYLE>
body {
	background: #ebebeb;
	font-family: Consolas, "Andale Mono", "Lucida Console",
		"Lucida Sans Typewriter", Monaco, "Courier New", monospace;
	color: #222;
	font-size: 13px;
}

* {
	padding: 0px;
	margin: 0px;
}

.top_div {
	background: #008EAD;
	width: 100%;
	height: 300px;
}

.ipt {
	border: 1.5px solid #A0C2C7;
	padding: 10px 10px;
	width: 450px;
	border-radius: 4px;
	padding-left: 35px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow
		ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out
		.15s;
	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
}

.ipt:focus {
	border-color: #66afe9;
	outline: 0;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px
		rgba(102, 175, 233, .6);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px
		rgba(102, 175, 233, .6)
}

.u_logo {
	background: url("images/username.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 44px;
	left: 7px;
}

.p_logo {
	background: url("images/password.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 12px;
	left: 7px;
}

.pp_logo {
	background: url("images/password.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 342px;
	left: 155px;
}

a {
	text-decoration: none;
}

.tou {
	background: url("images/tou.png") no-repeat;
	width: 97px;
	height: 92px;
	position: absolute;
	top: -87px;
	left: 202px;
}

.left_hand {
	background: url("images/left_hand.png") no-repeat;
	width: 32px;
	height: 37px;
	position: absolute;
	top: -38px;
	left: 150px;
}

.right_hand {
	background: url("images/right_hand.png") no-repeat;
	width: 32px;
	height: 37px;
	position: absolute;
	top: -38px;
	right: -64px;
}

.initial_left_hand {
	background: url("images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	left: 83px;
}

.initial_right_hand {
	background: url("images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	right: -174px;
}

.left_handing {
	background: url("images/left-handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -24px;
	left: 139px;
}

.right_handinging {
	background: url("images/right_handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -21px;
	left: 210px;
}
</STYLE>

<BODY>

	<DIV class="top_div"></DIV>

	<DIV
		style="background: #FFFFFF; margin: -100px auto auto; border: 1px solid #999999; border-image: none; width: 500px; height: 400px; text-align: center;">

		<DIV style="width: 250px; height: 80px; position: absolute;">
			<DIV class="tou"></DIV>
			<DIV class="initial_left_hand" id="left_hand"></DIV>
			<DIV class="initial_right_hand" id="right_hand"></DIV>
		</DIV>


		<form action="../admin/doUserAction.php?act=Register" method="post">
			<P style="padding: 30px 0px 10px; position: relative;">
				<SPAN class="u_logo"></SPAN> <INPUT class="ipt" name="username"
					type="text" placeholder="请输入用户名" value="" />
			</P>
			<P style="position: relative;">
				<SPAN class="p_logo"><br> </SPAN> <INPUT class="ipt" name="password"
					type="password" placeholder="请输入密码" value="" />
			</P>
			<P style="padding: 10px 0px 10px;">
				<INPUT class="ipt" name="confirm_password" type="password"
					placeholder="请确认您的密码" value="" />
			</P>
			<P style="position: relative;">
				<SPAN class="p_logo"><br> </SPAN> <INPUT class="ipt" name="age"
					type="text" placeholder="请输入年龄" value="" />
			</P>
			<P style="padding: 10px 0px 10px;">
				<!-- 				<INPUT class="ipt" name="sex" type="text" placeholder="请输入您的性别"value="" /> -->
				请选择您的性别： <input type="radio" name="sex" value="male" /> Male <input
					type="radio" name="sex" value="female" /> Female

			</P>
			<P style="padding: 10px 0px 10px;">
				<INPUT class="ipt" name="truename" type="text"
					placeholder="请输入您的真实姓名" value="" />
			</P>
			<div id="regTime"></div>
			<p>
				请输入验证码<input class="ipt" type="text" name="verify" />
			</p>
			<img alt="" src="../admin/getVerify.php">
			<DIV
				style="height: 50px; line-height: 50px; margin-top: 20px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
				<P style="margin: 0px 35px 20px 45px;">
					<SPAN style="float: right;"> <input
						style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;"
						type="submit" value="确认" onclick=getDate() />
					</SPAN>
				</P>
			</DIV>
		</form>


	</DIV>
	<div style="text-align: center;">
		<p>&nbsp;</p>
	</div>

	<script type="text/javascript"> 
function getDate(){								//注册时输入时间 未完成
	var d = new Date(); //新建一个Date对象 
	var year = d.getFullYear(); //获取年份 
	var month = d.getMonth()+1; //获取月份 
	var day = d.getDate(); //获取日期 
//  	document.write(year+month+day) 
	document.getElementById("regTime").innerHTML='<INPUT id="regTime" name="regTime" type="hidden" value='+year+month+day=+' />'; 	
}
</script>



</BODY>
</HTML>
