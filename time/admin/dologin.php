<?php
require_once '../include.php';
//session_start();
$admin = $_POST['admin'];
$password = $_POST['passwd'];
//$password = md5($_POST['passwd']);
$verify = $_REQUEST['verify'];
$verify0 = $_SESSION['default-verify'];

if ($verify == $verify0)
{
    $sql = "select * from admin where username='{$admin}' and passwd='{$password}'";
    $res = checkAdmin($sql);
    if($res){
        $_SESSION['adminName']=$res['username'];
        $_SESSION['adminId']=$res['id'];
        echo $_SESSION['adminName'];
        alert('登录成功', 'index.php');
        echo "<script>window.location='index.php';</script>";
    }else{
        alert("用户名或密码错误", "login.php");
    }
}else{
    alert("验证码错误", "login.php");
}
