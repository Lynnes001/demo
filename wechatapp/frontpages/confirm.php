<?php
require_once '../include.php';
$time_arr = $_POST;

$sql = "SELECT * FROM FEE WHERE type='".$time_arr['type']."'";
$fee = fetchOne($sql);

//var_dump($time_arr);
?>

<!DOCTYPE html>
<html>
<head>
	<title>照相馆预约系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width = device-width">
<!-- 	<meta name="viewport" content="initial-scale = 0.5"> -->
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">

	<script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="js/func.js"></script>
	<script>
		function givevalue(){
			document.getElementById('create_time').value = moment().format('YYYY-MM-DD HH:mm:ss');
		}
		
	</script>

</head>
<body>

<h2 style="text-align: center;font-family: STXingkai;">填写一下你的个人信息呦~</h2>

<div class="intro">


		<p>刚刚您选择了<span><?php	echo $time_arr['date'];?></span>日<span><?php echo $time_arr['time'];?></span>预约拍摄<span>XX</span>照</p>

		<form action="finish.php" method="post">
			<p style="color: white;">你的名字是...</p>
			<input type="text" name="name">
			
			<p>留个联系方式吧~</p>
			<input type="text" name="tele">
			
			<input type="hidden" name="time" id="time" value="<?php echo $time_arr['time'];?>">
			
			<input type="hidden" name="timeid" id="timeid" value="<?php echo $time_arr['timeid'];?>">
			
			<input type="hidden" name="date" id="date_p" value="<?php echo $time_arr['date'];?>">
			
			<input type="hidden" name="create_time" id="create_time" value="">
			
			<input type="hidden" name="fee" id="fee" value="<?php echo $fee['fee']; ?>">

			<br>
			<br>

</div>

<br/>
<hr/>
<br/>

<div class="btn_div">
	<button class="btn" type="submit" onclick="givevalue()">提交啦！</button>
</div>

</form>

<div class = "footer">
	<p>如有特殊需要，请致电13800000000</p>
</div>



</body>
</html>