<?php
require_once '../include.php';
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
$username=$_SESSION['userName'];

if ($act=="logout"){
    ulogout();
}elseif ($act=="addUser"){
    $mes = addUser();
}elseif ($act=="editUser"){
    $mes = editUser($id);
}elseif ($act=="delUser"){
    $mes = delUser($id);
}elseif ($act=="Register"){
    $mes = userRegister();
}elseif ($act=="sendMessage"){
    $mes = message();
}elseif ($act=="update"){
    $mes = updateUser($id);
}elseif ($act=="InsertMemo"){
    $mes = addMemo($username);
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
if($mes){
    echo $mes;
}
?>
</body>
</html>