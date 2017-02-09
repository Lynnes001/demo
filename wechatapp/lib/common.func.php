<?php 
function alert($mes,$url){
	echo "<script>alert('{$mes}');</script>";
	echo "<script>window.location='{$url}';</script>";
}

function cal_dtn($startdate, $enddate){
	$date=floor((strtotime($enddate)-strtotime($startdate))/86400);
	return $date;
}
