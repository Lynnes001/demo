<?php 
require_once '../include.php';
header("content-type:text/html;charset=utf-8");

$path="../data/userimag/{$_SESSION['userName']}";
if(!file_exists($path)){
    mkdir($path,0777,true);
}

$memo=$_POST;
$files=$_FILES;
$files['myfile']['date']=$memo['date'];

$res1=uploadFile($files,$path);
$res2=addMemo($_SESSION['userName']);
if($res1==true||$res2==true)
{
    echo "文件及图片上传成功！(●'◡'●)";
    echo "<script type='text/javascript'>function pload(){setTimeout('location.href='timelab.php'',9000);}";
}
//var_dump($info);



echo $info;









