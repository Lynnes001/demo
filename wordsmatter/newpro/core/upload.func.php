<?php 

//多文件上传整理函数
function buildInfo($file){
    $i=0;
    foreach ($file as $v){
        if(is_string($v['name'])){
            $files[$i]=$v;
            $i++;
        }else{
            //多文件
            foreach ($v['name'] as $key=>$val){
                $files[$i]['name']=$val;
                $files[$i]['size']=$v['size'][$key];
                $files[$i]['tmp_name']=$v['tmp_name'][$key];
                $files[$i]['error']=$v['error'][$key];
                $files[$i]['type']=$v['type'][$key];
                $files[$i]['date']=$v['date'][$key];
                $i++;
            }
        }
    }
    return $files;
}

//文件上传函数
function uploadFile($uploadfiles,$path="uploads",$allowExt=array("gif","jpeg","jpg","png"),$maxSize=10485760,$imagFlag=true){   
    if (!file_exists($path)){
        mkdir($path,0777,true);
    }
    $i=0;
	
	
    $files=buildInfo($uploadfiles);
    foreach ($files as $file){
        if ($file['error']==UPLOAD_ERR_OK){
            $ext=getExt($file['name']);

            //检查文件扩展名是否符合要求
            if(!in_array($ext, $allowExt)){
                exit("非法文件类型！");
            }

            //检查是否是真正的文件类型
            if($imagFlag){
                if(!getimagesize($file['tmp_name'])){
                    exit("不是真正的图片类型！");
                }
            }

            //检查上传文件大小
            if($file['size']>$maxSize){
                exit("上传文件过大！");
            }

            if (!is_uploaded_file($file['tmp_name'])){
                exit("不是通过HTTP POST方式上传的");
            }

            $filename=getUniName().".".$ext;
            $destination = $path."/".$filename;
            //var_dump($destination);
            if (move_uploaded_file($file['tmp_name'], $destination)){
                //$file['name']=$filename;
                $file['filepath']=$destination;
                $file['username']=$_SESSION['userName'];
                unset($file['error'],$file['tmp_name'],$file['name']);
                $uploadedFiles[$i]=$file;
				//var_dump($file);
                $mes=insert('pic', $file);
                $i++;
            }else{
                return $mes=false;
            }

        }else{
            switch ($file['error']){
                case 1:
                    $mes="超过配置文件上传大小";        //UPLOAD_ERR_INI_SIZE
                    break;
                case 2:
                    $mes="超过表单设置上传文件大小";        //UPLOAD_ERR_FORM_SIZE
                    break;
                case 3:
                    $mes = "文件部分被上传";            // UPLOAD_ERR_PARTIAL
                    break;
                case 4:
                    $mes="没有文件被上传";                            //UPLOAD_ERR_NO_FILE
                    break;
                case 6:
                    $mes="没有找到临时目录" ;                            //UPLOAD_ERR_NO_TMP_DIR
                    break;
                case 7:
                    $mes="文件不可写入";                     //  UPLOAD_ERR_CANT_WRITE
                    break;
                case 8:
                    $mes="由于PHP的扩展程序中断了文件上传";               //UPLOAD_ERR_EXTENSION
                    break;
            }
            echo $mes;
        }
    }
//    return $uploadedFiles;
    return $mes;
}




















// function uploadFile($fileInfo,$allowExt=array("gif","jpeg","jpg","png"),$maxSize=10485760){
    
//     require_once '../include.php';
//     header("content-type:text/html;charset=utf-8");
//     $filename=$_FILES['myfile']['name'];
//     $type=$_FILES['myfile']['type'];
//     $tmp_name=$_FILES['myfile']['tmp_name'];
//     $error=$_FILES['myfile']['error'];
//     $size=$_FILES['myfile']['size'];
    
//     $path="../data/userimag/{$_SESSION['userName']}";   //若不存在则创建个人目录
//     if(!file_exists($path)){
//         mkdir($path,0777,true);
//     }
    
//     $ext=getExt($filename);
//     $allowExt=array("gif","jpeg","jpg","png");
// if($fileInfo['error']==UPLOAD_ERR_OK){
//     if(!in_array($ext, $allowExt)){
//         exit("非法文件类型");
//     }

// //     限制最大上传文件大小
// //     $maxSize=1048576;
//     if($fileInfo['size']>$maxSize){
//         exit("文件过大");
//     }

//     $sql="select * from photo";
//     $name=getReultNum($sql)+1;
    
//     var_dump($name);
    
//     //判断是否是HTTP POST上传
//     //is_uploaded_file($tmp_name);
//     $path="../data/userimag/{$_SESSION['userName']}";
//     $filename=$name.".".$ext;
//     $filepath=$path."/".$filename;
//     $arr=array("username"=>$_SESSION['userName'],"filepath"=>$filepath);

// //     $filename=getUniName().".".$ext;
//     $destination=$path."/".$filename;               //存储文件位置.文件名
//     if(is_uploaded_file($fileInfo['tmp_name'])){
//         if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
//             if(insert("photo", $arr)){
//                 $mes="true";
//             }else{
//                 $mes="写入数据库失败！<br/><a href = '../frontpages/upload.php'>重新添加</a>|<a href='../frontpages/photolab.php'>返回个人主页</a>";
//             }
//         }else{
//             $mes="文件上传（移动）失败";
//         }
//     }else{
//         $mes="文件不是通过HTTP POST上传";
//     }
    
// }else{
//     switch ($fileInfo['error']){
//         case 1:
//             $mes="超过配置文件上传大小";        //UPLOAD_ERR_INI_SIZE
//             break;
//         case 2:
//             $mes="超过表单设置上传文件大小";        //UPLOAD_ERR_FORM_SIZE
//             break;
//         case 3:
//              $mes = "文件部分被上传";            // UPLOAD_ERR_PARTIAL
//              break;
//         case 4:
//             $mes="没有文件被上传";                            //UPLOAD_ERR_NO_FILE
//             break;
//         case 6:
//             $mes="没有找到临时目录" ;                            //UPLOAD_ERR_NO_TMP_DIR  
//             break;
//         case 7:
//             $mes="文件不可写入";                     //  UPLOAD_ERR_CANT_WRITE
//                 break;
//         case 8:
//             $mes="由于PHP的扩展程序中断了文件上传";               //UPLOAD_ERR_EXTENSION
//                 break;
//     }
// }
// return $mes;
// }



// php.ini 服务器端进行的配置
// ;;;;;;;;;;;;;;;;
// ; File Uploads ;
// ;;;;;;;;;;;;;;;;

// ; Whether to allow HTTP file uploads.
// ; http://php.net/file-uploads
// file_uploads = On                            支持通过HTTP POST方式上传文件

// ; Temporary directory for HTTP uploaded files (will use system default if not
// ; specified).
// ; http://php.net/upload-tmp-dir
// upload_tmp_dir = "E:/wamp/tmp"               临时文件保存路径

// ; Maximum allowed size for uploaded files.
// ; http://php.net/upload-max-filesize
// upload_max_filesize = 64M                    默认值2M，上传文件最大大小

// ; Maximum number of files that can be uploaded via a single request
// max_file_uploads = 20

//post_max_size       表单以POST方式发送数据的最大值 默认8M


//客户端配置
//<input type="hidden" name="MAX_FILE_SIZE" value="1024" />  报错2；









?>