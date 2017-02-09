<?php
require_once '../include.php';

$username = $_POST['username'];
$password = $_POST['password'];
//$password = md5($_POST['passwd']);
$verify = $_REQUEST['uverify'];
$verify1 = $_SESSION['default-verify'];

if ($verify == $verify1)
{
    $sql = "select * from users where username='{$username}' and passwd='{$password}'";
    $res = checkUser($sql);
    if($res){
        $_SESSION['userName']=$res['username'];
        $_SESSION['userId']=$res['id'];
        echo $_SESSION['userName'];
        alert('登录成功', 'Mindex.php');
        echo "<script>window.location='Mindex.php';</script>";
    }else{
        alert("用户名或密码错误", "index.php");
    }
}else{
    alert("验证码错误", "index.php");
}

