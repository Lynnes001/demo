<?php 
require_once '../include.php';
$sql="select * from users where username = '{$_SESSION['userName']}'";
$row=fetchOne($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Personal Information</title>
<link href="./css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="./css/personalstyle.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="./js/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--- Jquery-->
<!-- Goog Fonts -->
<!-- <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'> -->

</head>
<body>
	<!-- Header Starts Here -->
	<div class="header">
		<div class="container">
			<div class="header-profile">
				<img src="./images/profile.png" alt=""/>
			</div>
		</div>
	</div>
	<div class="header-top">
				<h2>Aleen Lorem Ipsy</h2>
	<a href="Mindex.php">back</a>	
	</div>
	<!-- Header Ends Here -->
	<!-- About Me Starts Here -->
	<div class="about">
		<div class="container">
			<div class="about-top">
				<h3 class="top-title">About Me</h3>
					<div class="about-details">
						<form action="../admin/doUserAction.php?act=update&id=<?php echo $row['id'];?>" method="POST">
						
						    <p>Username:  		<span id="content2"><?php echo $row['username']; ?></span></p>
							<p>Nickname:  		<span id="content1"><?php echo $row['nickname']; ?></span></p>
                            <p>Age:        		<span id="content3"><?php echo $row['age']; ?></span></p>
                            <p>Gender: 			<span id="content4"><?php echo $row['sex']; ?></span></p>
							<p>Email:  			<span id="content5"><?php echo $row['email']; ?></span></p>
							<p>Register Time:	<span><?php echo $row['regTime']; ?></span></p>
							
							<div style="visibility:visiable;" id="sub"><input type='submit' onclick="change()" value="submit" /></div>
						</form>
						
						<div style="visibility:visiable;" id="editor"><input type = "button" onclick="edit()" value="Edit" /></div>
					</div>

<!-- 					<div class="col-md-8 about-row-column"> -->
<!-- 						<h3>HOBBIES & INTERESTS</h3> -->
<!-- 						<ul class="hoby"> -->
<!-- 							<li><i class="tv"></i></li> -->
<!-- 							<li><i class="car"></i></li> -->
<!-- 							<li><i class="music"></i></li> -->
<!-- 							<li><i class="shopping"></i></li> -->
<!-- 							<li><i class="reading"></i></li> -->
<!-- 							<li><i class="travel"></i></li> -->
<!-- 							<li><i class="tea"></i></li> -->
<!-- 						</ul> -->
<!-- 					</div> -->
			</div>
		</div>
	</div>

	<!--- About Me Ends Here -->
	
	<div class="footer">
		<div class="container">
			<p class="copyright">2015 TimeLab </p>
		</div>
	</div>
	<!--- Footer Ends Here -->

<script type="text/javascript">
	
	function edit(){
		
		var Nickname = document.getElementById("content1");
		var c = Nickname.innerText;
	 	Nickname.innerHTML = "<input type='text' name=nickname value='" + c + "'/>"
 		var Nickname = document.getElementById("content3");
		var c = Nickname.innerText;
 		Nickname.innerHTML = "<input type='text' name=age value='" + c + "'/>"
 		var Nickname = document.getElementById("content4");
		var c = Nickname.innerText;
 		Nickname.innerHTML = "<input type='text' name=sex value='" + c + "'/>"
 		var Nickname = document.getElementById("content5");
		var c = Nickname.innerText;
 		Nickname.innerHTML = "<input type='text' name=email value='" + c + "'/>"

 		document.getElementById("sub").sytle.visibility='visiable';
		document.getElementById("editor").sytle.visibility='hidden';

	}

// 	function change(){

// 		document.getElementById("sub").sytle.visibility='hidden';
// 		document.getElementById("editor").sytle.visibility='visible';
		
// 	}
	
	</script>
	
	
	
	

</body>
</html>



