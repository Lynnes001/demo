<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Time Lab</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<style type="text/css">
            .black_overlay{display:none;
                           position:absolute;
                           top:0%;left:0%;width:100%;height:100%;
                           background-color:#b5bec9;
                           z-index:1001;
                           -moz-opacity:0.8;
                           opacity:.80;
                           filter:alpha(opacity=80);}
            .white_content{display:none;
                           position:absolute;
                           top:15%;left:35%;width:30%;height:50%;
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
        <div id="home" class="carousel slide carousel-fade" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
                <div class="item active">
                    <div class="item-1"></div>
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="col-md-offset-2 col-md-8 col-sm-12">
                            <h3>Welcome To</h3>
                                <h2>Time Lab</h2>
                                <a href="register.php" class="button default" id="jump">Register</a>
                                <a>OR</a>
                                <a class="loginbutton">Login</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                           <!--弹出部分-->
                <div id="light" class="white_content">
                <a class="close">Close</a>
                 <br><p style="color: #FF7F00" >欢迎使用时光轴</p>

                <!--窗口内容-->
                <form action="udologin.php" method="post">
                <P style="padding: 30px 0px 10px; color:#1C86EE; position: relative;">   
                    请输入用户名：<INPUT type="text" name="username" placeholder="请输入用户名" value=""> 
                </P>
                <P style="padding: 30px 0px 10px; color:#1C86EE; position: relative;">  
                    请您输入密码：<INPUT class="ipt" name="password" type="password" placeholder="请输入密码" value="">   
                </P>
                <P style="padding: 30px 0px 10px; color:#1C86EE; position: relative;">
			         请输入验证码：<INPUT class="ipt" name="uverify" id="uverify" type="text" placeholder="请输入验证码" value="">
		        </P>
                <p><img src="../admin/getVerify.php" alt=""></p>
                
                <div style="height: 50px; line-height: 50px; margin-top: 30px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
                <P style="margin: 0px 35px 20px 45px;">
                    <SPAN style="float: left;">
                        <A style="color: rgb(204, 204, 204);" href="#">忘记密码?</A>
                    </SPAN> 
                    <SPAN style="float: right;">
<!--                       <A style="color: rgb(204, 204, 204); margin-right: 10px;" href="../注册页面/注册.html">注册</A>   -->  
                        <input style="background: rgb(0, 142, 173); padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold;" type="submit" value="登录" /> 
                    </SPAN>
                </P>
                </div>
                </form>
                <!--窗口内容-->

                </div>

                <div id="fade" class="black_overlay"></div>
            <!--弹出部分-->
            
            <script src="js/jquery-1.11.3.js"></script>
    		<script type="text/javascript">
				$(document).ready(function(){    		
            	$(".loginbutton").click(function(){
            	$("#light").fadeIn();
            	$("#fade").fadeIn();       
              	});

    			$(".close").click(function(){
                	$("#light").fadeOut();
                	$("#fade").fadeOut();       
            	});
				});
		</script>
            
                
    </body>
</html>
