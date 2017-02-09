<?php
function checkAdmin($sql){//检查是否有管理员
    return fetchOne($sql);
}

function checkadminLogined(){//检查是否有管理员登录
    if($_SESSION['adminId']==""){
        alert("您还未登录", "login.php");
    }
}

function logout(){//注销管理员
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    session_destroy();
    header("location:login.php");
}

function addAdmin(){//添加管理员
    $arr=$_POST;
//	$arr['password']=md5($_POST['passwd']);
	if(insert("admin",$arr)){
        $mes="添加成功！<br/><a href = 'addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="添加失败！<br/><a href = 'addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

function getAllAdmin(){ //得到所有管理员
    $sql = "select * from admin";
    $rows=fetchAll($sql);
    return $rows;
}



function getAllMessage(){ //得到所有用户留言信息
    $sql = "select * from contact_us";
    $rows=fetchAll($sql);
    return $rows;
}

function getAllEssay($username){ //得到所有用户留言信息
    $sql = "select * from article where username={$username}";
    $rows=fetchAll($sql);
    return $rows;
}




function editAdmin($id){
    $arr=$_POST;
//    $arr['password']=md5($_POST['password']);
    if(update("admin",$arr,"id={$id}")){
//        var_dump(update(admin, $arr));
        alert("修改成功，返回管理员列表", "listAdmin.php");
        $mes = "编辑成功！<br /><a href='listAdmin.php'>查看管理员列表</a>";
    }else {
        alert("编辑失败！请重新修改", "listAdmin.php");
        $mes="编辑失败! <br /><a href='listAdmin.php'>请重新修改</a>";
    }
    return $mes;
}


function delAdmin($id){
//    $arr=$_POST;
    if(delete(admin,"id={$id}")){
        alert("已经删除该管理员", "listAdmin.php");
    }else{
        alert("删除操作失败，请重试！","listAdmin.php");
    }
    return $mes;
}



function delMsg($id){               //删除用户留言信息
    delete(contact_us,"id={$id}");
    $mes="删除成功！";
    return $mes;
}





/////////////////////////////////////////////////////////////////////////////////////////////////
///                                                                                           ///
///                                                                                           ///
///                                                                                           ///
///                                   用户相关操作                                                                                           ///
///                                                                                           ///
///                                                                                           ///
/////////////////////////////////////////////////////////////////////////////////////////////////


function checkUser($sql){//检查是否有用户
    return fetchOne($sql);
}


function checkUserLogined(){//检查是否有用户登录
    if($_SESSION['adminId']==""){
        alert("您还未登录", "login.php");
    }
}


function ulogout(){//注销用户
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    session_destroy();
    header("location:../frontpages/index.php");
}


function addUser(){//注册用户
    $arr=$_POST;
    //	$arr['password']=md5($_POST['passwd']);
    $table="users";
    if(insert($table,$arr)){
        //建立个人数据文件夹
        $path="../data/userimag/{$arr['username']}";
        mkdir($path,0777,true);
        $mes="注册成功！<br/> <a href='listUser.php'>转到个人页面</a>";
    }else{
        $mes = "添加失败！<br/>";
    }
    return $mes;
}


function getAllUser(){ //得到所有用户
    $sql = "select * from users";
    $rows=fetchAll($sql);
    return $rows;
}




function message(){                //向管理员发送信息
    $arr=$_POST;
    var_dump($arr);
    $table="contact_us";
    if(insert($table, $arr)){
        alert("您的信息我们已经收到，感谢您的建议！", "../frontpages/Mindex.php");
        $mes="信息发送成功！<br/> <a href='../frontpages/Mindex.php'>转到个人主页</a>";       
    }else{
        $mes="信息发送失败！<br/> < a href='../frontpages/messageBoard.php'>重试</a>";
    }
    
}


function editUser($id){         //编辑用户信息
    $arr=$_POST;
    //    $arr['password']=md5($_POST['password']);
    if(update("users",$arr,"id={$id}")){
        //        var_dump(update(admin, $arr));
        alert("修改成功，返回用户列表", "listUser.php");
        $mes = "编辑成功！<br /><a href='listUser.php'>查看用户列表</a>";
    }else {
        alert("编辑失败！请重新修改", "listUser.php");
        $mes="编辑失败! <br /><a href='listUser.php'>请重新修改</a>";
    }
    return $mes;
}


function delUser($id){
    $arr=$_POST;
    if(delete(users,"id={$id}")){
        alert("已经删除该用户", "listUser.php");
    }else{
        alert("删除用户操作失败，请重试！","listUser.php");
    }

    return $mes;
}


function updateUser($id){
    $arr=$_POST;
    //    $arr['password']=md5($_POST['password']);
    if(update("users",$arr,"id={$id}")){
        $url="../frontpages/personal.php";
        $mes="succeed";
        echo "<script>window.location='{$url}';</script>";
    }else{
        $mes="失败啦";
    }
    
    return $mes;
}


function userRegister(){            //用户注册
    $verify = $_REQUEST['verify'];
    $verify0 = $_SESSION['default-verify'];
    $arr=$_POST;
    if ($verify==$verify0){
    $arri=$arr;
    $arrd=array("pwd"=>$arr['confirm_password'],"verify"=>$arr['verify']);
    $arri = array_diff($arri, $arrd);
    $arri["passwd"]=$arr['password'];
    $path="../data/userimag/{$arri['username']}";
    var_dump($path);
    $table="users";
    if($arr['password']==$arr['confirm_password']){
        if(insert($table, $arri)){
            mkdir($path,0777,true);
            alert("注册成功！", "../frontpages/index.php");
        }else{
//            $mes="添加失败 !<br/><a href = '../frontpages/register.php'>返回注册</a>"; 
            alert("注册失败!", "../frontpages/register.php");
        }
    }else{
        alert("两次输入的密码不一致！", "../frontpages/register.php");
    }  
    return $mes;
    }else{
        alert("验证码输入错误！", "../frontpages/register.php");
    }
}

// function addAdmin(){//添加管理员
//     $arr=$_POST;
//     //	$arr['password']=md5($_POST['passwd']);
//     if(insert("admin",$arr)){
//         $mes="添加成功！<br/><a href = 'addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
//     }else{
//         $mes="添加失败！<br/><a href = 'addAdmin.php'>重新添加</a>";
//     }
//     return $mes;
// }
function addMemo($username) {
    $a=array("username"=>$username);
    $arro=$_POST;
    var_dump($arro);
    $table=memo;
    $arr=array_merge($a, $arro);
    var_dump($arr);
    if (insert($table, $arr)) {
        echo '<script>window.location.href="../frontpages/timelab.php"</script>';
        $mes=true;
    }else{
        $mes="添加成功！<br/><a href = 'addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
//         alert("添加MEMO失败！", "../frontpages/timelab.php");
        $mes=false;
    }
    return $mes;
}
