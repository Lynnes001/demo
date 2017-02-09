<?php
require_once 'include.php';
$_SESSION['username']='default';

if ($_GET) {
	$temp = $_GET;
	$time_limit = $temp['time'];
	$dis_limit = $temp['distance'];
}else{
	$time_limit = 15*60;//默认为15分钟内的获取
	$dis_limit = 200;//默认为200米内获取
}

$time = time();
$time_wide = $time - $time_limit;

$pos = $_POST;//当前位置，含有lon,lat两个元素，当前位置
$area = geiWide($pos, $dis_limit);

$sql = "SELECT * FROM pic WHERE lat BETWEEN ".$area[0][0]." AND ".$area[0][1]." AND lon BETWEEN ".$area[1][0]." AND ".$area[1][1]." AND timestamp>".$time_wide;

if ($time_limit==0 && $dis_limit!=0) {
	$sql = "SELECT * FROM pic WHERE lat BETWEEN ".$area[0][0]." AND ".$area[0][1]." AND lon BETWEEN ".$area[1][0]." AND ".$area[1][1];
}else if ($dis_limit==0 && $time_limit!=0) {
	$sql = "SELECT * FROM pic WHERE timestamp>".$time_wide;
}else if ($time_limit==$dis_limit=0){
	$sql = "SELECT * FROM pic ";
}

$arr = fetchAll($sql);

$num = count($arr);
//获取两个经纬度之间的距离GetDistance($lat1, $lng1, $lat2, $lng2)

for($i=0;$i<$num;$i++){
	$temp_dist = GetDistance($pos['lat'], $pos['lon'], $arr[$i]['lat'], $arr[$i]['lon']);
	//var_dump($temp_dist);
	$dist[$i] = $temp_dist;
}

?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title>推送页面</title>
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/medical.css">
<link type="text/css" rel="stylesheet" href="css/idangerous.swiper.css">
<link type="text/css" rel="stylesheet" href="css/swipebox.css">

</head>

<body>
  <div class="swiper-container swiper-parent">
    <div class="swiper-wrapper">
    
      <div class="swiper-slide sliderbg">
      <div class="swiper-container swiper-nested4">
               <div class="swiper-wrapper">
                    <div class="swiper-slide">
                              <div class="slide-inner">
                                        <div class="pages_container">
                                        <h2 class="page_title">你的附近</h2>
                                        <div class="toogle_wrap">
                                            <div class="trigger"><a href="#">筛选条件</a></div>
                                            <div class="toggle_container">
                                            <ul class="listing_detailed">
                                            <form action="list.php" method="get">
                                            <li>距离条件：<select name="distance">
                                            <option value="0">不限</option>
											<option value="50">50米</option>
											<option value="100">100米</option>
											<option value="200" selected="selected">200米</option>
											<option value="500">500米</option>
											<option value="1000">1000米</option>
											<option value="2000">2000米</option>
											</select>

                                            </li>
                                            <li>时间条件： <select name="time">
                                            <option value="0">不限</option>
											<option value="15" selected="selected">15分钟</option>
											<option value="30">30分钟</option>
											<option value="60">1小时</option>
											<option value="120">2小时</option>
											<option value="720">12小时</option>

                                            </li>
                                            <li><input style="width: 60px;background:lightblue;" type="submit" value'搜索附近' /></li>
                                            </form>
                                            </ul>
                                            </div>
                                        </div>

									<?php
									for($i=0;$i<$num;$i++){
										echo "<div class='portfolio_item'>
												<div class='portfolio_image'><a rel='gallery-1' href='".$arr[$i]['filepath']."' class='swipebox' title='Webdesign work1'><img src='".$arr[$i]['filepath']."' title='' border='0' /></a></div>
													<div class='portfolio_details'>
													<h4>".$arr[$i]['username']."</h4>
													<p>".$dist[$i]."米</p>
													<p>".$arr[$i]['tips']."</p>
													<p style='font-size:1em;'>".$arr[$i]['des']."</p>
													<a rel='gallery-2' href='".$arr[$i]['filepath']."' class='swipebox view_details' title='Webdesign work2'>查看更多</a>
													</div>
											</div>";}?>

											<div class="portfolio_item">
                                             <div class="portfolio_image"><a rel="gallery-1" href="images/portfolio_thumb2.jpg" class="swipebox" title="Webdesign work"><img src="images/portfolio_thumb2.jpg" alt="" title="" border="0" /></a></div>
                                                 <div class="portfolio_details">
                                                 <h4>时间</h4>
                                                 <p>标签</p>
                                                 <p>描述</p>
                                                 <a rel="gallery-2" href="images/portfolio_thumb2.jpg" class="swipebox view_details" title="Webdesign work">查看更多</a>
                                                 </div>
                                        	</div>

                                       <div class="clearfix"></div>
      									<div class="scrolltop"><a href="#" class="scrolltop4"><img src="images/icons/top.png" alt="Go on top" title="Go on top" /></a></div>
                                        </div>
                                        <!--End of page container-->
                              </div>
                    </div>
              </div>
              <div class="swiper-scrollbar4"></div>
     </div>
     </div>
     
     <!--End of pages--> 

    </div>
    <div class="pagination"></div>
  </div>
  
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script type="text/javascript" src="js/idangerous.swiper-2.1.min.js"></script>
<script type="text/javascript" src="js/idangerous.swiper.scrollbar-2.1.js"></script>
<script type="text/javascript" src="js/jquery.tabify.js"></script>
<script type="text/javascript" src="js/jquery.fitvids.js"></script>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/load.js"></script>

</body>
</html>
