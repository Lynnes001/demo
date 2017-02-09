<?php
require_once '../include.php';
date_default_timezone_set('prc');//设置中国时区

$weekday=date("N",time());//获取当前星期
$today = date("Y-m-d");

$sql_order = "SELECT * FROM orders WHERE date > '".$today."'";

$sql1 = "SELECT * FROM app_time WHERE weekday='1'";
$sql2 = "SELECT * FROM app_time WHERE weekday='2'";
$sql3 = "SELECT * FROM app_time WHERE weekday='3'";
$sql4 = "SELECT * FROM app_time WHERE weekday='4'";
$sql5 = "SELECT * FROM app_time WHERE weekday='5'";
$sql6 = "SELECT * FROM app_time WHERE weekday='6'";
$sql7 = "SELECT * FROM app_time WHERE weekday='7'";

$rows1 = fetchAll($sql1);//周一的时间区序列
$rows2 = fetchAll($sql2);//周二的时间区序列
$rows3 = fetchAll($sql3);//周三的时间区序列
$rows4 = fetchAll($sql4);//周四的时间区序列
$rows5 = fetchAll($sql5);//周五的时间区序列
$rows6 = fetchAll($sql6);//周六的时间区序列
$rows7 = fetchAll($sql7);//周日的时间区序列

$rows_order = fetchAll($sql_order);//获取订单信息
$len = count($rows_order);

//七组数据的长度
$num1 = $num3 = $num5 = getReultNum($sql1);
$num2 = $num4 = getReultNum($sql2);
$num6 = $num7 = getReultNum($sql6);

$types = $_GET;//获取选择预定类型

//设定数组，查询订单中日期距今天差距
$dtn = array();
$week = array();

for($i=0;$i<$len;$i++){
	$temp = cal_dtn($today, $rows_order[$i]['date']);
	if($temp>7)
		$temp--;
	$dtn[$i] = $temp;
}

for($i=0;$i<$len;$i++){
	if($dtn[$i]<7){
		$week[$i]=1;
	}else{
		$week[$i]=2;
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>照相馆预约系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width = device-width">
<!-- 	<meta name="viewport" content="initial-scale = 0.5"> -->
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<!-- 	<link rel="stylesheet" href="http://fonts.useso.com/css?family=Lato:300,400,700">
	<link rel="stylesheet" href="http://weloveiconfonts.com/api/?family=fontawesome"> -->
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="js/func.js"></script>

	<script type="text/javascript">
	function loadfunc(){

		
		<?php
		for($i=0; $i<$len; $i++){
			
			echo "disabled_btn(".$week[$i].", ".$dtn[$i].", ".$rows_order[$i]['timeid'].")\n";
			
		}
		
		?>
	}
	</script>

</head>
<body onload="loadfunc()">

<h1 class='title'>证件照</h1>

<div class="timepicker">
	<p style="">预约时间</p>
	<div class="datepicker">
		<table  style="text-align:center;">
			<tr>
				<td><table><tr><td>&nbsp</td></tr><tr><td>&nbsp</td></tr></table></td>

				<script type="text/javascript">
					for (var i=0;i<7;i++)
					{
						document.write("<td>")
						document.write(upper((moment().day()+i-1)%7))
						document.write("</td>")
					}
				</script>

			</tr>

			<tr>
				<td><script>document.write('第一周')</script></td>
				<script type="text/javascript">
					for (var i=0;i<7;i++)
					{
						document.write("<td id='date"+i+"' class='date_btn' onclick='clicked(this)'>")
						document.write(moment().date()+i)
						document.write("</td>")
					}
				</script>
			</tr>

			<tr>
				<td style="text-align:center;"><script>document.write('第二周')</script></td>
				
				<script type="text/javascript">
					for (var i=7;i<14;i++)
					{
						document.write("<td id='date"+i+"' class='date_btn' onclick='clicked(this)'>")
						document.write(moment().add(i, 'd').date())
						document.write("</td>")
					}
				</script>
			</tr>
		</table>
		<br>
	</div>

	<div class="timepker">
	<!-- 这里需要PHP从数据库中调用数据 -->
		<div id='hidden1_case1'>
		<?php
			for($i=0; $i<$num1; $i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time11_pick".$j."' onclick='click_text(this, ".$rows1[$i]['num'].")' value='".substr($rows1[$i]['time'],0,strlen($rows1[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden1_case2'>
		<?php
			for($i=0;$i<$num2;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time12_pick".$j."' onclick='click_text(this, ".$rows2[$i]['num'].")' value='".substr($rows2[$i]['time'],0,strlen($rows2[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden1_case3'>
		<?php
			for($i=0;$i<$num3;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time13_pick".$j."' onclick='click_text(this, ".$rows3[$i]['num'].")' value='".substr($rows3[$i]['time'],0,strlen($rows3[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden1_case4'>
		<?php
			for($i=0;$i<$num4;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time14_pick".$j."' onclick='click_text(this, ".$rows4[$i]['num'].")' value='".substr($rows4[$i]['time'],0,strlen($rows4[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden1_case5'>
		<?php
			for($i=0;$i<$num5;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time15_pick".$j."' onclick='click_text(this, ".$rows5[$i]['num'].")' value='".substr($rows5[$i]['time'],0,strlen($rows5[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden1_case6'>
		<?php
			for($i=0;$i<$num6;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time16_pick".$j."' onclick='click_text(this, ".$rows6[$i]['num'].")' value='".substr($rows6[$i]['time'],0,strlen($rows6[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden1_case7'>
		<?php
			for($i=0;$i<$num7;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time17_pick".$j."' onclick='click_text(this, ".$rows7[$i]['num'].")' value='".substr($rows7[$i]['time'],0,strlen($rows7[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden2_case1'>
		<?php
			for($i=0; $i<$num1; $i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time21_pick".$j."' onclick='click_text(this, ".$rows1[$i]['num'].")' value='".substr($rows1[$i]['time'],0,strlen($rows1[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		
		</div>
		
		<div id='hidden2_case2'>
		<?php
			for($i=0;$i<$num2;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time22_pick".$j."' onclick='click_text(this, ".$rows2[$i]['num'].")' value='".substr($rows2[$i]['time'],0,strlen($rows2[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden2_case3'>
		<?php
			for($i=0;$i<$num3;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time23_pick".$j."' onclick='click_text(this, ".$rows3[$i]['num'].")' value='".substr($rows3[$i]['time'],0,strlen($rows3[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden2_case4'>
		<?php
			for($i=0;$i<$num4;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time24_pick".$j."' onclick='click_text(this, ".$rows4[$i]['num'].")' value='".substr($rows4[$i]['time'],0,strlen($rows4[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden2_case5'>
		<?php
			for($i=0;$i<$num5;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time25_pick".$j."' onclick='click_text(this, ".$rows5[$i]['num'].")' value='".substr($rows5[$i]['time'],0,strlen($rows5[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>
		
		<div id='hidden2_case6'>
		<?php
			for($i=0;$i<$num6;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time26_pick".$j."' onclick='click_text(this, ".$rows6[$i]['num'].")' value='".substr($rows6[$i]['time'],0,strlen($rows6[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		
		</div>
		
		<div id='hidden2_case7'>
		<?php
			for($i=0;$i<$num7;$i++){
				$j=$i+1;
				echo "<input type='button' class='time_pick' id='time27_pick".$j."' onclick='click_text(this, ".$rows7[$i]['num'].")' value='".substr($rows7[$i]['time'],0,strlen($rows7[$i]['time'])-3)."' />";
				if($i%4==3)
					echo '<br>';
			}
		?>
		</div>

	</div>
</div>

<p>您选择的时间是：</p>

<p id="showDate" class="show">选择一个时间吧！</p>
<p id="showTime" class="show"></p>
<br/>
<hr/>
<br/>

<div class="btn_div">
	<form action="confirm.php" method="post">
		<input type="hidden" name="date" id="date_p" value="">
		<input type="hidden" name="time" id="time" value="">
		<input type="hidden" name="timeid" id="timeid" value="">
		<input type="hidden" name="type" id="type" value="<?php echo $types['set']; ?>">
		<button class="btn" type="submit">下一步</button>
	</form>
</div>

<div class = "footer">
	<p>如有特殊需要，请致电13800000000</p>
</div>



</body>
</html>