<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"D:\phpstudy\WWW\public/../application/index\view\mv\index.html";i:1513994018;s:65:"D:\phpstudy\WWW\public/../application/index\view\common_head.html";i:1513609419;s:65:"D:\phpstudy\WWW\public/../application/index\view\common_foot.html";i:1513406666;}*/ ?>
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>The Portfolio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="__STATIC__/index/mv/css/bootstrap.min.css" >
    <link rel="stylesheet" href="__STATIC__/index/mv/css/style.css" >
    <link rel="stylesheet" href="__STATIC__/index/mv/css/index.css">
    <script src="__STATIC__/index/mv/js/index.js"></script>
    <script>
        window.onresize = function(){
                // alert( );
                if(document.body.clientWidth<=1000){
                   document.getElementById("search-div-id").style.display="none"; 
                   document.getElementById("font-head").style.display="none"; 
                }else{
                    document.getElementById("search-div-id").style.display="block";
                    document.getElementById("font-head").style.display="block";
                }
            }
    </script>
  </head>  
<body>
<hr>
<div class="container" id="search">  
    <div class="order-div" style="width:540px">
        <div class="select-merge col-sm-0" >
            <input type="radio" name="mv_select" id="select1" checked="checked">
            <label for="select1">时间排序</label><br>
             <input type="radio" name="mv_select" id="select2">
            <label for="select2">拼音排序</label>
        </div>
        <div class="select-merge">
            <input type="radio" name="mv_select" id="select3">
            <label for="select3">专辑排序</label><br>
            <input type="radio" name="mv_select" id="select4">
            <label for="select4">人气排序</label>
        </div>
        <div class="select-merge">
           <input type="radio" name="mv_select" id="select5">
            <label for="select5">单曲</label>
        </div>
    </div>
    <div class="search-div" id="search-div-id">
        <input type="text">
        <button class="search-button">
            <div class="glyphicon glyphicon-search"></div>
        </button>
    </div>
</div>
<hr>
<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($k%3 == 1): ?>
<div class="container">
    <div class="row">
<?php endif; ?>
        <div class="col-md-4 col-xs-4 div-all">
            <div class="img-head ">
                <div><?php echo $k; ?></div>
                <div>你好</div>
                <div>ZEN ZEN 気（き）にしない振（ふ）りしても</div>
            </div>
            <a href="<?php echo $vo['address']; ?>"  target="_blank" class="portfolio-link">
            <img src="__STATIC__/image/14.jpg" class="img-responsive" alt="">
            <div class="img-foot"></div>
            </a>
        </div>
<?php if($k%3 == 0): ?>
    </div>
</div>
<hr>
<?php endif; endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>
<div style="text-align:center"><?php echo $data; ?></div>
<hr>
<hr>
<div style="clear:both;height:30px" ></div>
</body>
</html>
<!---- Footer ---->
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
