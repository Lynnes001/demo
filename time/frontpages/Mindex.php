<?php 
require_once '../include.php';
$sql="select * from users where username = '{$_SESSION['userName']}'";
$row=fetchOne($sql);

?>
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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.min.js"></script>
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
<!--         <script src="../js/jquery-1.11.3.min.js"></script> -->
        
        <script>

        function F_Open_dialog() 
        { 
             document.getElementById("myfile").click(); 
        } 

        
		function test()
		{
    		document.getElementById("myfile").submit();
    		alert(11);
		}


		$(function(){
		    $("a").on("click",function(){
		        var offsetH = $("#pos").offset().top;
		        $("body").animate({"scrollTop":offsetH},800);
		    });
		});

		
		</script>

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
                                <h2>Time Lab</h2>
                                <a href="../admin/doUserAction.php?act=logout" class="button default">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>


                        <div class="col-md-4 col-sm-4 text-right col-xs-4">
                            <a href="#" id="scroll-to-content" class="go-down"><i class="fa fa-angle-down"></i></a>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- Carousel -->


        <nav id="navigation">
            <div class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" >Time Lab</a>
                    </div>
                    <div class="navbar-collapse collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#home" class="current">Home</a></li>
                            <li><a href="#about">User</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>

                    </div><!--/.nav-collapse -->
                </div><!--/.container -->
            </div><!--navbar-default-->
        </nav><!--navigation section end here-->


        <section id="about" class="page-section first-section">
            <div class="container">
                <div class="row page-heading">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="page-title">About Me</h3>
                        <p class="page-subtitle">LEARN MORE ABOUT ME AND MY EXPERIENCE</p>
                    </div>
                    <div class="col-md-4 col-sm-4 hidden-xs page-icon-holder">
                      <a href="personal.php"><p class="page-icon"><i class="fa fa-user"></i></p></a>                  <!-- 个人资料编辑按钮 -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="profile-image">
                            <img src="../data/userimag/<?php echo $_SESSION['userName']?>/face.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="profile-content">
                            <h4><?php echo $_SESSION['userName']; ?></h4>
                            <span>Student</span>
                            <p><?php echo $row['email'];?></p>
                            <ul class="social-icons">
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                                <li><a href="#" class="fa fa-rss"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="my-skills">
                            <h4>My Life</h4>
                            <p>I love you not because who you are,but who i am when i with you.</p>
                            <ul class="progess-bars">
                                <li>
                                    <span>Study 85%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                                    </div>
                                </li>
                                <li>
                                    <span>life 95%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                    </div>
                                </li>
                                <li>
                                    <span>Weather 40%</span>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="gallery" class="page-section">
            <div class="container">
                <div class="row page-heading">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="page-title"><a href="timelab.php" >My Gallery</a></h3>
                        <p class="page-subtitle">The pictures of my life.</p>
                    </div>
                    
                    
                    <div class="col-md-4 col-sm-4 hidden-xs text-right">                   

<!--                   <input class="fileInput" type="file" name="myfile" id="" />                           <!-- 跳出选择图片窗口               -->
<!--                     <div> -->
                        <a href="photolab.php">
                        <p class="page-icon">
                        <i class="fa fa-camera" onclick="F_Open_dialog()">
                        </i>
                        </p>
                        </a>
                        </form>
                   </div>
                   </div>
                   
                </div>
                <div class="row">
                    <div class="gallery-holder">
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
                            <div class="gallery-thumb">
                                <img src="../data/userimag/<?php echo $_SESSION['userName']?>/mygallery1.jpg" alt="">      <!-- gallery展示图片1 -->
                                <div class="hover">
                                    <a href="#" class="fa fa-plus">ChangePhoto</a>                         <!-- gallery展示图片修改按钮 -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
                            <div class="gallery-thumb">
                                <img src="../data/userimag/<?php echo $_SESSION['userName']?>/mygallery2.jpg" alt="">
                                <div class="hover">
                                    <a href="#" class="fa fa-plus"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
                            <div class="gallery-thumb">
                                <img src="../data/userimag/<?php echo $_SESSION['userName']?>/mygallery3.jpg" alt="">
                                <div class="hover">
                                    <a href="#" class="fa fa-plus"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
                            <div class="gallery-thumb">
                                <img src="../data/userimag/<?php echo $_SESSION['userName']?>/mygallery4.jpg" alt="">
                                <div class="hover">
                                    <a href="#" class="fa fa-plus"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
                            <div class="gallery-thumb">
                                <img src="../data/userimag/<?php echo $_SESSION['userName']?>/mygallery5.jpg" alt="">
                                <div class="hover">
                                    <a href="#" class="fa fa-plus"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
                            <div class="gallery-thumb">
                                <img src="../data/userimag/<?php echo $_SESSION['userName']?>/mygallery6.jpg" alt="">
                                <div class="hover">
                                    <a href="#" class="fa fa-plus"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
                            <div class="gallery-thumb">
                                <img src="../data/userimag/<?php echo $_SESSION['userName']?>/mygallery7.jpg" alt="">
                                <div class="hover">
                                    <a href="#" class="fa fa-plus"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 gallery-item">
                            <div class="gallery-thumb">
                                <img src="../data/userimag/<?php echo $_SESSION['userName']?>/mygallery8.jpg" alt="">
                                <div class="hover">
                                    <a href="#" class="fa fa-plus"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="contact" class="page-section">
            <div class="container">
                <div class="row page-heading">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="page-title">Contact Us</h3>
                        <p class="page-subtitle">对本站有任何建议，请指出来，我们将努力改正</p>
                    </div>
                    <div class="cmd-4 col-sm-4 hidden-xs text-right">
                        <p class="page-icon"><i class="fa fa-envelope"></i></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <div class="row">
                            <form action="../admin/doUserAction.php?act=sendMessage" method="post" class="contact-form">
                                <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['userName']?>">
                                <fieldset class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" placeholder="Name...">
                                </fieldset>
                                <fieldset class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" placeholder="Email...">
                                </fieldset>
                                <fieldset class="col-md-4 col-sm-12 col-xs-12">
                                    <input type="text" id="subject" name="subject" placeholder="Subject...">
                                </fieldset>
                                <fieldset class="col-md-12q col-sm-12 col-xs-12">
                                    <textarea name="message" id="message" cols="30" rows="6" placeholder="Message..."></textarea>
                                </fieldset>
                                <fieldset class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="submit" class="button default" value="Send Message">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer class="site-footer">
            <div class="container">
                <div class="text-center">
                    <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>
                    <p class="copyright-text">Copyright &copy; Time Lab</p>
                </div>
            </div>
        </footer>

        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/min/plugins.min.js"></script>
        <script src="js/min/main.min.js"></script>
   

    </body>
</html>
