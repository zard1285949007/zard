<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\phpstudy\WWW\public/../application/index\view\index\index.html";i:1513954727;s:65:"D:\phpstudy\WWW\public/../application/index\view\common_head.html";i:1513609419;s:65:"D:\phpstudy\WWW\public/../application/index\view\common_foot.html";i:1513406666;}*/ ?>

<!doctype html>
<html lang="en">
    <head>

        <!-- meta data & title -->
        <meta charset="utf-8">
        <title>zard-forever</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <style type="text/css">
            
        </style>
        <!-- Favicon and touch icons -->
         <script type="text/javascript" src="__STATIC__/index/js/jquery-1.10.2.min.js"></script>
        <script src="__STATIC__/index/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="__STATIC__/index/js/wow.min.js"></script>
        <script src="__STATIC__/index/js/index.js"></script>
        <!-- CSS -->
        
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500&lang=zh-CN' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="__STATIC__/index/assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="__STATIC__/index/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="__STATIC__/index/assets/css/animate.min.css">
        <link rel="stylesheet" href="__STATIC__/index/assets/css/style.css">
        <link rel="stylesheet" href="__STATIC__/index/css/index.css">
        <script>
            window.onresize = function(){
                // alert( );
                if(document.body.clientWidth<=1000){
                   document.getElementById("font-head").style.display="none"; 
                }else{
                    document.getElementById("font-head").style.display="block";
                }
            }
        </script>
    </head>
  <body>

    <!-- Header --> 
    <nav id="navbar-section" class="navbar navbar-default navbar-static-top navbar-sticky" role="navigation" >
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand wow fadeInDownBig" href="#"><img class="office-logo" src="__STATIC__/image/2.jpg" alt="zard"></a>      
            </div>
            <div class="container" id="font-head"><h1 id="h1-style">What a Beautiful Memory</h1></div>
            
        </div>
    </nav>
</body>
</html>
    <!-- Begin #carousel-section -->
    <section id="carousel-section" class="section-global-wrapper"> 
        <div class="container-fluid-kamn">
            <div class="row">
                <div id="carousel-1" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-lg">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
        
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <!-- Begin Slide 1 -->
                        <div class="item active">
                            <img src="__STATIC__/image/41.jpg" height="100%" width="100%" alt="Image of first carousel">
                        </div>
                        <!-- End Slide 1 -->

                        <!-- Begin Slide 2 -->
                        <div class="item">
                            <img src="__STATIC__/image/timg.jpg" height="100%" width="100%" alt="Image of second carousel">
                            
                        </div>
                        <!-- End Slide 2 -->

                        <!-- Begin Slide 3 -->
                        <div class="item">
                            <img src="__STATIC__/image/time.jpg" height="100%" width="100%" alt="Image of third carousel">
                            
                        </div>
                        <!-- End Slide 3 -->
                    </div>
        
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-1" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-1" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Begin #services-section -->
    <section id="services" class="services-section section-global-wrapper">
        <div class="container">
            <!-- Begin Services Row 1 -->
            <div class="row services-row services-row-head services-row-1">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mode" >
                    <a href="<?php echo url('mv/index'); ?>">
                        <div class="services-group wow animated fadeInLeft div1 " data-wow-offset="40">
                            <div class="services-header" style="margin:0px" >
                                <h2 class="services-title" style="margin:0px">mv</h2>
                            </div>
                            <div class="services-body">
                                <img src="__STATIC__/image/16.jpg" alt="zard" title="zard">
                            </div>
                            <div class="services-foot" style="margin:0px">
                                <h3 class="services-title" style="margin:0px">视频</h3>
                            </div>
                        </div> 
                    </a>
                </div>

        
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <a href="<?php echo url('music/index'); ?>">
                        <div class="services-group wow animated zoomIn div2" data-wow-offset="40">
                            <div class="services-header" style="margin:0px">
                                <h2 class="services-title" style="margin:0px">music</h2>
                            </div>
                            <div class="services-body">
                                <img src="__STATIC__/image/15.jpg" alt="zard" title="zard">
                            </div>
                            <div class="services-foot" style="margin:0px">
                                <h3 class="services-title" style="margin:0px">音乐</h3>
                            </div>
                        </div>
                    </a>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <a href="javascript:;">
                        <div class="services-group wow animated fadeInRight div3" data-wow-offset="40">
                            <div class="services-header" style="margin:0px">
                                <h2 class="services-title" style="margin:0px">picture</h2>
                            </div>
                            <div class="services-body">
                                <img src="__STATIC__/image/14.jpg" alt="zard" title="zard">
                            </div>
                            <div class="services-foot" style="margin:0px">
                                <h3 class="services-title" style="margin:0px">图片</h3>
                            </div>
                        </div> 
                    </a>       
                </div>
            </div>
            <!-- End Serivces Row 1 -->
      
            <!-- Begin Services Row 2 -->
            <div class="row services-row services-row-tail services-row-2 ">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <a href="javascript:;">
                        <div class="services-group wow animated fadeInLeft div4" data-wow-offset="40">
                            <div class="services-header" style="margin:0px">
                                <h2 class="services-title" style="margin:0px">ranking</h2>
                            </div>
                            <div class="services-body">
                                <img src="__STATIC__/image/11.jpg" alt="zard" title="zard">
                            </div>
                            <div class="services-foot" style="margin:0px">
                                <h3 class="services-title" style="margin:0px">风云榜</h3>
                            </div>
                        </div>
                    </a>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <a href="javascript:;">
                        <div class="services-group wow animated zoomIn div5" data-wow-offset="40">
                            <div class="services-header" style="margin:0px">
                                <h2 class="services-title" style="margin:0px">we chat</h2>
                            </div>
                            <div class="services-body">
                                <img src="__STATIC__/image/12.jpg" alt="zard" title="zard">
                            </div>
                            <div class="services-foot" style="margin:0px">
                                <h3 class="services-title" style="margin:0px">聊天室</h3>
                            </div>
                        </div>
                    </a>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                    <a href="javascript:;">
                        <div class="services-group wow animated fadeInRight div6" data-wow-offset="40">
                           <div class="services-header" style="margin:0px">
                                <h2 class="services-title" style="margin:0px">personal</h2>
                            </div>
                            <div class="services-body">
                                <img src="__STATIC__/image/13.jpg" alt="zard" title="zard">
                            </div>
                            <div class="services-foot" style="margin:0px">
                                <h3 class="services-title" style="margin:0px">站长屋</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Serivces Row 2 -->
    
        </div>      
    </section>
    <!-- End #services-section -->


    <!-- Footer -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="copyright text center footer">
        <p>&copy; Copyright 2017 zard-forever.com 
            <span><a href="#">联系我们</a></span>
            <span><a href="#">常见问题</a></span>
            <span><a href="#">意见反馈</a></span>
            <span><a href="#">微信公众号</a></span>
            <span><a href="#">友情链接</a></span>
        </p>
    </div>

    
   
    <script>
      new WOW().init();
    </script>
  </body>
</html>
    
