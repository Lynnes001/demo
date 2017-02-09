<?php
header("content-type:text/html;charset=utf-8");
function randomstring($type = 1,$length = 4)
{

    if ($type == 1) {
        $chars = join("", range(0, 9));
    } elseif ($type == 2) {
    $chars=join("",array_merge(range("a","z"),range("A","Z")));
    } elseif ($type == 3) {
    $chars=join("",array_merge(range("a","z"),range("A","Z"),range(0,9)));
    }

    if ($length > strlen($chars)) {
        exit("字符长度不够");
    }
    $chars = str_shuffle($chars);

    return substr($chars, 0, $length);
}
//返回值为四位数字



//生成唯一字符串
function getUniName(){
    return md5(uniqid(microtime(true),true));
}



//得到文件扩展名
function getExt($filename){
    $str=explode(".", $filename);
    $ret=strtolower(end($str));
    return $ret;
}

?>