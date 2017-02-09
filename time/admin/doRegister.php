<?php
require_once '../include.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
//$password = md5($_POST['passwd']);

$age = $_POST['age'];
$sex = $_POST['sex'];
$truename = $_POST['truename'];

 $verify = $_REQUEST['verify'];
 $verify1 = $_SESSION['default-verify'];

$arr = $_POST;

var_dump($arr);

if ($verify == $verify1)
{
    if(insert(users, $arr)){
        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $res = checkUser($sql);
        if($res){
            $_SESSION['userName']=$res['username'];
            $_SESSION['userId']=$res['id'];
            echo $_SESSION['userName'];
            alert('登录成功', 'Mindex.php');
            echo "<script>window.location='Mindex.php';</script>";
        }else{
            alert("用户名或密码错误", "login.php");
        }
    }else{
        alert("两次输入的密码不一致！请重新输入", "../frontpages/register.php");
    }
}else{
    alert("验证码错误", "../frontpages/register.php");
}
