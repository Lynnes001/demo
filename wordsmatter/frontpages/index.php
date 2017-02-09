<?php
require_once '../admin/mysql.func.php';
error_reporting(E_ALL || ~E_NOTICE);
$sql = 'SELECT * FROM words';
$res = fetchAll($sql);


?>

<!DOCTYPE html >
<html>
<head>
	<title>Let's remember it!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>

<div id="table">
<table class="table">
<?php
for($i=0;$i+2<=sizeof($res);$i=$i+3){
echo '<tr>
		<td class="words_btn">'.$res[$i]['word'].'</td>
		<td class="words_btn">'.$res[$i+1]['word'].'</td>
		<td class="words_btn">'.$res[$i+2]['word'].'</td>
	</tr>';
}
echo '<tr>
		<td class="words_btn">'.$res[$i]['word'].'</td>
		<td class="words_btn">'.$res[$i+1]['word'].'</td>
	</tr>';

?>

</table>	

</div>

<div class="whitecover"></div>

<div id="show" class="fadeblock">
	<img id="bg" src="">
	<p class="closebtn" onclick="video_stop()"><img src="icons/closebtn.png" width="65px"></p>
	<h2 style="margin:5% 0 0 5%;font-size: 4em;font-family: Georgia;" id="tword">abandon</h2>
	<i class="icon_play" onclick="play()"><img src="icons/volume.png" width="100px"></i>
	<audio id="wordaudio" src=""></audio>


	<div class="fadetext">
		<p>英<span id="soundmark_e">[ əˈbændən ]</span><br/>美<span id="soundmark_a">[ əˈbændən ]</span></p>
		<p>中文释义：</p>
		<!-- <p>Noun</p> -->
		<p id="paraphase_ch">vt.放弃，抛弃; 离弃，丢弃; 使屈从; 停止进行，终止</p>
		<p>英文释义：</p>
		<p id="paraphase_en">1、 the trait of lacking restraint or control; freedom from inhibition or worry;</p>
		<p>例句：</p>
		<p id="ex">Example 1 : "she danced with abandon"</p>	
<!-- 		<p>2、 a feeling of extreme emotional intensity;</p>
		<p>Example 2 : "the wildness of his anger"</p> -->
		<video id="video" src="data/video/choosy.mp4" width="640" height="480" controls="controls" onclick="video_control()">Your browser does not support the video tag.</video>
	</div>

</div>


<!-- <script type="text/javascript" src="js/jquery-2.2.1.min.js"></script> -->
<script type="text/javascript" src="js/jquery-2.2.1.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery-3.1.1.js"></script> -->

<script type="text/javascript">
$(document).ready(function(){
  $(".words_btn").click(function(event) {
//	alert(event.target.innerText);

	var i=(parseInt(Math.random()*10)+1).toString();
	$('#show').css({
		backgroundImage: 'url(../frontpages/data/bg/'+i+'.JPG)'
	});

	
	$.ajax({
	  type:"GET",
	  url:"../admin/search.php?word=" + event.target.innerText,
	  dataType: "json",
	  //传参数方法
	  //data:{word:event.target.innerText},

	  success: function(data){
	  //成功后处理操作
		  $('#tword').html(data.word);
		  $('#soundmark_e').html(data.soundmark_e);
		  $('#soundmark_a').html(data.soundmark_a);
		  $('#paraphase_ch').html(data.paraphase_ch);
		  $('#paraphase_en').html(data.paraphase_en);
		  $('#ex').html(data.sentenceforexample);
		  $('#wordaudio').attr('src', 'data/audio/'+data.word+'.mp3');
		  $('#video').attr('src', 'data/video/'+data.word+'.mp4');
	  },
	  error:function(jqXHR){alert("发生错误：" + jqXHR.status);}
	});
	
	$(".fadeblock").fadeIn();
    $(".whitecover").fadeIn();

  });

  $(".r1c1").click(function(){
  $(".fadeblock").fadeIn();
  $(".whitecover").fadeIn();
  });

  $(".closebtn").click(function(){
  $(".fadeblock").fadeOut();
  $(".whitecover").fadeOut();
  });

});
// this is the end of the ready function

var wordaudio = document.getElementById("wordaudio"); 
var video = document.getElementById("video")

function play(){
	if (wordaudio.paused) wordaudio.play();
	else wordaudio.pause();
}
function video_stop(){video.pause();wordaudio.pause();}
function video_control(){
	if (video.paused) 
		video.play();
	else
		video.pause();
}




</script>

</body>
</html>