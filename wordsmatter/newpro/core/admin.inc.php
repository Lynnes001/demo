<?php

function addPic($username,$id,$arr) {
    $a=array("username"=>$username);
    $arro=$arr;
    //var_dump($arro);
    $table='pic';
    $arr=array_merge($a, $arro);
    //var_dump($arr);
    if (update($table, $arro, "id='".$id."'")) {
        $mes=true;
    }else{
         alert("失败！", "../upload.html");
        $mes=false;
    }
    return $mes;
}

?>