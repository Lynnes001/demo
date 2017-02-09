<?php
require_once '../admin/mysql.func.php';

header("Content-Type: application/json;charset=utf-8"); 

if ($_SERVER["REQUEST_METHOD"] == "GET")
	wordsinfo();


function wordsinfo(){
	
//	if (!isset($_GET["word"]) || empty($_GET["word"])) {
//		echo '{"success":false,"msg":"参数错误"}';
//		return;
//	}
	
	$keyword = $_GET["word"];
	$sql = "SELECT * FROM words WHERE word = '".$keyword."'";
//	$res = fetchAll($sql);
	$res = fetchOne($sql);
//	var_dump($res);
//	$result = ;
	echo json_encode($res);
//	exit;
}

?>