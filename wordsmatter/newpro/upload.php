<?php

require_once 'include.php';
header("content-type:text/html;charset=utf-8");

$arr = $_POST;
$files=$_FILES;

var_dump($arr);

unset($files['button']);

$timestamp = time();
$arr = $arr + array("timestamp"=>$timestamp);


$_SESSION['userName'] = $arr['username'];

$res1_id = uploadFile($files);
$res2 = addPic('default',$res1_id,$arr);

if($res1_id==true||$res2==true)
{
    echo "文件及图片上传成功！(●'◡'●)";
	echo "<br>点击返回<a href = 'upload.html'>返回</a>";
}

?>
