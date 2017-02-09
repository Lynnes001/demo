<?php

//meter
$_SESSION['radius'] = 100;

//返回两点间距离
function GetDistance($lat1, $lng1, $lat2, $lng2){      
          $earthRadius = 6378138; //近似地球半径米
          // 转换为弧度
          $lat1 = ($lat1 * pi()) / 180;
          $lng1 = ($lng1 * pi()) / 180;
          $lat2 = ($lat2 * pi()) / 180;
          $lng2 = ($lng2 * pi()) / 180;
          // 使用半正矢公式  用尺规来计算
        $calcLongitude = $lng2 - $lng1;
          $calcLatitude = $lat2 - $lat1;
          $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  
       $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
          $calculatedDistance = $earthRadius * $stepTwo;
          return round($calculatedDistance);
   }

function distance($lat1, $lng1, $lat2, $lng2, $miles = true)
{
 $pi80 = M_PI / 180;
 $lat1 *= $pi80;
 $lng1 *= $pi80;
 $lat2 *= $pi80;
 $lng2 *= $pi80;
 $r = 6372.797; // mean radius of Earth in km
 $dlat = $lat2 - $lat1;
 $dlng = $lng2 - $lng1;
 $a = sin($dlat/2)*sin($dlat/2)+cos($lat1)*cos($lat2)*sin($dlng/2)*sin($dlng/2);
 $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
 $km = $r * $c;
 return ($miles ? ($km * 0.621371192) : $km);
}
   
   
   
   
//返回当前地点，在指定范围内的上、下的纬度范围,左、右的经度范围。 
//radius半径，单位：米
//lat纬度、lon经度
function geiWide($position, $radius, $lat=0, $lon=0){
	$t = $radius/111000;
	$wide = array
	(
	array($position['lat']-$t, $position['lat']+$t),
	array($position['lon']-$t, $position['lon']+$t)
	);
	
	return $wide;
}
   
   