<?php 
require_once '../include.php';



?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="../admin/doUploadAction.php" method="post" enctype="multipart/form-data">
<!-- <input type = "hidden" name = "MAX_FILE_SIZE" value="512000" /> -->
<input type = "hidden" name = "username" value="<?php echo $_SESSION['userName']?>">
    请选择上传文件：<input type="file" name="myfile" accept="image/jpeg,image/gif,image/png,image/jpg"/><br/>
    <input type="submit" value="上传" />
</form>

</body>
</html>