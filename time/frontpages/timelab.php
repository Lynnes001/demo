<?php 
require_once '../include.php';
$sql = "select * from memo where username = '{$_SESSION['userName']}' order by date ASC";

$rows=fetchAll($sql);
$len=sizeof($rows);
var_dump($len);
//var_dump($rows);

// echo $rows[$count+1][date];
// for($id=0;$id<=$maxsize['id'];$id++)
// echo getReultNum("select * from memo where id = {$id}").'AND ';
?>


<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		 

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Unique</title>
		<link rel="stylesheet" href="css/lightbox.css">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css" />

		<style type="text/css">
            .black_overlay{display:none;
                           position:absolute;
                           top:0%;left:0%;width:100%;height:100%;
                           background-color:#bcbcbc;
                           z-index:1001;
                           -moz-opacity:0.8;
                           opacity:.80;
                           filter:alpha(opacity=80);}
            .white_content{display:none;
                           position:absolute;
                           top:15%;left:20%;width:60%;height:60%;
                           padding:16px;
                           border:3px solid #e46948;
                           background-color:white;
                           z-index:1002;
                           overflow:auto;}
            .close{
            	color:#e46948;
            }
        </style>

	</head>
	<body>

		<div class="header">
			<div class="headcontainer">
				<div class="header-profile">
					<img src="./images/profile.png" alt=""/>
				</div>
			</div>
		</div>
		
		
		<div class="header-top">
				<h2>Aleen Lorem Ipsy</h2>
				<a class="jump">ADD +</a>
				<a href="Mindex.php">back</a>
				</div>
	
	 <!--弹出部分-->
                <div id="light" class="white_content">
                 <a class="close">Close</a>
                 <br/><br/>添加时间节点

                <!--窗口内容-->
                <form action="doUploadAction.php" method="post" enctype="multipart/form-data">
<!--            <form action="doAction.php" method="post" enctype="multipart/form-data">   原上传图片跳转链接            -->
                <P style="padding: 10px 0px 10px; position: relative;">
                    <!--<SPAN class="u_logo"></SPAN> -->
                    <br>点击输入回忆时间 &nbsp：        
                    <input name="date" type="text" id="datetimepicker" placeholder="点击选择日期" />
                </P>
                <P style="position: relative;">
                    <br>请输入您的主题（<13个字）：       
                    <input name="title" cols="50" rows="1" placeholder="请输入主题" />  
                </P>
                <P style="position: relative;">
                    <br>请输入您的内容（150个字）   ：       
                    <textarea name="context" cols="50" rows="3" placeholder="请输入内容"></textarea>   
                </P>
                
                <SPAN style="float: left;">
                    <A style="color: rgb(0, 142, 173);" href="#"> 请选择上传图片：</A>
                    <input type="file" name="myfile" id="myfile" accept="image/jpeg,image/gif,image/png,image/jpg"/>
                </SPAN>                
                
                <div style="padding-top:20px;height: 50px; line-height: 50px; margin-top: 180px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
                
                <P style="margin: 0px 35px 20px 45px;">
                
                <SPAN style="float: right;">
                    <input type="submit" style="background: rgb(0, 142, 173); padding: 10px 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" value="完成上传" /> 
                </SPAN>
                    </P>
                </div>
                </form>

                <!--窗口内容-->

                </div>

                <div id="fade" class="black_overlay"></div>
            <!--弹出部分-->


		<div class="container">
			<div class="main">
				<ul class="cbp_tmtimeline">
					<li>
						<time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>
						18:30</span><span>13/4/10</span></time>
						<div class="cbp_tmicon"></div>
						<div class="cbp_tmlabel">
							<h2>Ricebean black-eyed pea</h2>
							<p>Winter purslane courgette pumpkin quandong 
							komatsuna fennel green bean cucumber watercress.<br/>
							</p>

							<a href="images/3.jpg" data-lightbox="roadtrip"><img width="230px" src="images/3.jpg"></a>
							<a href="images/4.jpg" data-lightbox="roadtrip"><img width="230px" src="images/4.jpg"></a>
							<a href="images/3.jpg" data-lightbox="roadtrip"><img width="230px" src="images/3.jpg"></a>
							<a href="images/4.jpg" data-lightbox="roadtrip"><img width="230px" src="images/4.jpg"></a>
							<a href="images/3.jpg" data-lightbox="roadtrip"><img width="230px" src="images/3.jpg"></a>
							<a href="images/4.jpg" data-lightbox="roadtrip"><img width="230px" src="images/4.jpg"></a>
						</div>
					</li>

                    <?php
					$tipsNum=1;
					for ($i=0;$i<$len;$i++){
					    $picsql = "select * from picture where username = '{$_SESSION['userName']}' and date='{$rows[$i]['date']}'";
					    $t_rows = fetchAll($picsql);//获取该用户该事件节点的所有图片路径
//					    $picNum=sizeof($t_rows);
					    $picNum=getReultNum($picsql);
					    
					    $output='<br/><li id="tip'.$tipsNum.'" style="display:none">
                                    <time class="cbp_tmtime" datetime="'.$rows[$i]["date"].'">
                    	            <span>'.$rows[$i]["date"].'</span><span>13:15</span></time>     
        				            <div class="cbp_tmicon"></div><div class="cbp_tmlabel">
        				            <h2> '.$rows[$i]["title"].' </h2><p> '.$rows[$i]["context"].' </p>';                       

					    for($j=0;$j<$picNum;$j++)//循环控制插入图片个数
					    {
					        $output=$output.'<a href="'.$t_rows[$j]['filepath'].'" data-lightbox="roadtrip"><img width="230px" src="'.$t_rows[$j]['filepath'].'"></a>';
					    }
		                $output=$output.'</div></li>';
		                echo $output;
					    
// 					    echo '<li id="tip'.$tipsNum.'" style="display:none">
//                               <time class="cbp_tmtime" datetime="'.$rows[$i]["date"].'">
//                     	      <span>'.$rows[$i]["date"].'</span><span>13:15</span></time>     
//         				      <div class="cbp_tmicon"></div><div class="cbp_tmlabel">
//         				      <h2> '.$rows[$i]["title"].' </h2><p> '.$rows[$i]["context"].' </p>	    
// 		                      </div></li>';
		                $tipsNum++;
					   }
					?>
					
                    <li id="tip5" style="display:none">
						<time class="cbp_tmtime" datetime="2013-04-15 13:15"><span>
						4/15/13</span> <span>13:15</span></time>
						<div class="cbp_tmicon"></div>
						<div class="cbp_tmlabel">
							<h2>LASTWatercress ricebean</h2>
							<p>Peanut gourd nori welsh onion rock melon mustard 
							jÃ­cama. Desert raisin amaranth kombu aubergine kale 
							seakale brussels sprout pea. </p>
						</div>
					</li>

				</ul>
			</div>
		</div>


		<script src="js/lightbox-plus-jquery.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery-1.11.3.js"></script>
		<script src="js/jquery.datetimepicker.js"></script>
		<script type="text/javascript">
			i=1;
			$(document).ready(function(){
			$(window).scroll(function (){
				if ($(window).scrollTop() == $(document).height() - $(window).height()) {
					// $("#tip2").fadeOut(2000);
   					$("#tip"+i).fadeIn(3000);
   					i=i+1;
				}
			});

    		lightbox.option({
      		'resizeDuration': 200,
      		'wrapAround': true
    		})
    		

            $(".jump").click(function(){
            $("#light").fadeIn();
            $("#fade").fadeIn();       
              });

    		$(".close").click(function(){
                $("#light").fadeOut();
                $("#fade").fadeOut();       
            });
			});

     		$('#datetimepicker').datetimepicker({timepicker:false, yearStart:2015, yearEnd:2050, todayButton:true});

		</script>
	</body>
</html>
