<?php
require_once '../include.php';

$order_arr = $_POST;
unset($order_arr['name']);
unset($order_arr['tele']);
unset($order_arr['create_time']);

$simp_arr = $order_arr;
insert('order_simp', $simp_arr);

$order_arr = $_POST;
$order_arr['time'] .= ':00';

insert('orders',$order_arr);

?>
<!DOCTYPE html>
<html>
<head>
	<title>照相馆预约系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width = device-width">
<!-- 	<meta name="viewport" content="initial-scale = 0.5"> -->
	<link rel="stylesheet" href="css/default.css">

</head>
<body>

<h1 style="text-align: center;font-family: STXingkai;">感谢您！</h1>

<div class="intro" style='background:lightcyan;'>
	<p>感谢您的预约，订单已生成！</p>
	
	<table  style="width: 100%;margin-bottom:0;padding-bottom:0;">
		<tr style="background:#bee7e9">
			<td style="text-align: center;">客户姓名</td>
			<td style="text-align: left;"><?php echo $order_arr['name']; ?></td>
		</tr>
		
		<tr style="background:#beedc7;">
			<td style="text-align: center;">联系方式</td>
			<td style="text-align: left;"><?php echo $order_arr['tele']; ?></td>
		
		</tr>
		
		<tr style="background:#e6ceac;">
			<td style="text-align: center;">预约日期</td>
			<td style="text-align: left;"><?php echo $order_arr['date']; ?></td>
		
		</tr>
		
		<tr style="background:#ecad9e;">
			<td style="text-align: center;">预约时间</td>
			<td style="text-align: left;"><?php echo substr($order_arr['time'],0,strlen($order_arr['time'])-3); ?></td>
		</tr>
		
		<tr style="background:#f4606c;">
			<td style="text-align: center;">总费用</td>
			<td style="text-align: left;"><?php echo $order_arr['fee']; ?>元</td>
		
		</tr>

	</table>
	<br>
</div>

<br/>
<hr/>
<br/>

<div class = "footer">
	<p>如有特殊需要，请致电13800000000</p>
</div>

</body>
</html>