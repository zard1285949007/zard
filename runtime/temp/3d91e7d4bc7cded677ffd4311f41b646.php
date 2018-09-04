<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"/home/www/WWW/public/../application/index/view/index/index.html";i:1519202453;s:63:"/home/www/WWW/public/../application/index/view/common_head.html";i:1518756352;s:63:"/home/www/WWW/public/../application/index/view/common_foot.html";i:1517801129;}*/ ?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- meta data & title -->
        <meta charset="utf-8">
        <title>zard-forever</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            
        </style>
        <!-- Favicon and touch icons -->
         <script type="text/javascript" src="__STATIC__/index/js/jquery-1.10.2.min.js"></script>
        <script src="__STATIC__/index/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="__STATIC__/index/layer/layer.js"></script>

        <script src="http://www.dodobook.net/demo/mouse_star/dodobook.js"> </script>
       
        <!-- CSS -->
        
        
        <link rel="stylesheet" href="__STATIC__/index/assets/bootstrap/css/bootstrap.css">
        
        <link rel="stylesheet" href="__STATIC__/index/assets/css/animate.min.css">
        <link rel="stylesheet" href="__STATIC__/index/assets/css/style.css">
        <link rel="stylesheet" href="__STATIC__/index/css/index.css">
        <style type="text/css">
            #background_music{
                position:absolute;
                right:30px;
                top:50%;
                margin-top:-50px;
            }
            .table{
                padding-left:10px;
                padding-right:10px;
            }
            .table td{
                color:gray;
                font-size:20px;
            }
        </style>
    </head>
  <body style="width:100%">
    <!-- Header --> 
        <div class="container" style="width:100%;margin:0px">
            <div class="row" style="width:100%;margin:0px">
                <div class="col-md-2 col-sm-2 col-xs-2 " style="padding-top:20px">
                    <a class="navbar-brand wow fadeInDownBig"  href="#" style="height:100px;position:relative" <?php if(session('?openid')): ?>onclick="message()"<?php endif; ?>><img class="office-logo img-circle" <?php if(!session('?head_url')): ?>src="__STATIC__/image/2.jpg" <?php else: ?>src="<?php echo session('head_url'); endif; ?>" alt="zard">
                        <div style="position:absolute;width:300px;z-index:1000;text-align:center;display:none" id="message" onclick="stopPropagation(event)">
                            <table class="table table-hover">
                              <tbody>
                                <tr class="active">
                                  <td>昵称</td>
                                  <td><?php echo session('name'); ?></td>
                                  </tr>
                                
                                <tr class="warning">
                                  <td>积分</td>
                                  <td id="points"><?php echo session('quanshui'); ?></td>
                                  </tr>
                                <tr class="danger">
                                  <td>等级</td>
                                  <td><?php echo session('rank'); ?></td>
                                  </tr>
                                  <tr class="success">
                                  <td colspan="2"><button class="btn btn-default" type="submit" id="sign" <?php if(session('is_sign') == 1): ?>disabled<?php endif; ?>><?php if(session('is_sign') == 0): ?>签到<?php endif; if(session('is_sign') == 1): ?>已签到<?php endif; ?></button></td>
                                  </tr>
                                  <tr class="success">
                                  <td colspan="2"><button class="btn btn-default" onclick="logout()">退出登录</button></td>
                                  </tr>
                              </tbody>
                            </table>
                        </div>  
                    </a>
                    <?php if(!session('?openid')): ?>
                        <a href="<?php echo url('login/login'); ?>" style="display:inline-block;margin-top:10px;margin-left:12px"><img src="__STATIC__/image/Connect_logo_2.png" alt=""></a>
                    
                    <?php endif; ?>
                        
                </div>
                
                <div class="col-md-10 col-sm-10 col-xs-10 ">
                <?php if(isset($audio)): ?>
                    <img src="__STATIC__/image/background.jpg" alt="music" id="background_music" class="img-circle">
                <?php endif; ?>
                <!-- <div class="navbar-header">
                    
                </div> -->
               <h1 id="h1-style" style="margin-right:0px;">What a Beautiful Memory!</h1>
                <?php if(isset($audio)): ?>
                <audio src="__STATIC__/background.mp3" controls="controls" loop="loop" autoplay="autoplay" style="float:right" id="audio" hidden>
                    您的浏览器不支持 audio 标签。
                </audio>
                <?php endif; ?>
                </div>
            </div>
        </div>

    </nav>
    <script>
        $(function(){            
            var num=0;
            var deg=10;
            var background=$("#background_music");
            var sid=0;
            function rotate(){
                sid=setInterval(function(){
                    if(deg==360){
                        deg=0;
                    }
                    var deg_str='transform:rotate('+deg+'deg)';
                    background.attr('style',deg_str);
                    deg+=1;
                },10)
            }
            rotate();
            $("#background_music").click(function(){
                 if(num%2==0){
                    document.getElementById("audio").pause();
                    clearInterval(sid);
                    num++;
                }else{
                    document.getElementById("audio").play();
                    rotate();
                    num++;
                }
            })
        });

       // 退出登录
       function logout(){
            var url="<?php echo url('logout/index'); ?>";
            window.location.href=url;
       }

       // 阻止冒泡事件
       function stopPropagation(event){
            event.stopPropagation();
       }
       //头像点击事件
        function message(){
            var message=document.getElementById("message");
            if(message.style.display=="none"){
                message.style.display="block";
            }else{
                message.style.display="none";
            }
        }
    </script>
    <script>
    // 签到的特效
    (function ($) {
    $.extend({
        tipsBox: function (options) {
            options = $.extend({
                obj: null,  //jq对象，要在那个html标签上显示
                str: "+2",  //字符串，要显示的内容;也可以传一段html，如: "<b style='font-family:Microsoft YaHei;'>+1</b>"
                startSize: "12px",  //动画开始的文字大小
                endSize: "30px",    //动画结束的文字大小
                interval: 600,  //动画时间间隔
                color: "gray",    //文字颜色
                callback: function () { }    //回调函数
            }, options);
            $("body").append("<span class='num'>" + "+2" + "</span>");
            var box = $(".num");
            var left = options.obj.offset().left + options.obj.width() / 2;
            var top = options.obj.offset().top - options.obj.height();
            box.css({
                "position": "absolute",
                "left": left + "px",
                "top": top + "px",
                "z-index": 9999,
                "font-size": options.startSize,
                "line-height": options.endSize,
                "color": options.color
            });
            box.animate({
                "font-size": options.endSize,
                "opacity": "0",
                "top": top - parseInt(options.endSize) + "px"
            }, options.interval, function () {
                box.remove();
                options.callback();
            });
        }
    });
})(jQuery);
  
function niceIn(prop){
    prop.find('i').addClass('niceIn');
    setTimeout(function(){
        prop.find('i').removeClass('niceIn');   
    },1000);        
}
$(function () {
    $("#sign").click(function () {
        $.tipsBox({
            obj: $(this),
            str: "+1",
            callback: function () {
            }
        });
        niceIn($(this));
        $.ajax({
            type:"POST",
            url:"<?php echo url('sign/index'); ?>",
            dataType:"json",
            success:function(data){
               if(data==1){               
                  var points = parseInt($("#points").html());
                  points+=2;
                  $("#points").html(points);
                  $("#sign").attr('disabled',"true");
                  $("#sign").html('已签到');
               }else{
                    alert('你今天已经签到过了！');
               }
            },
            error:function(){
                alert('网络错误');
            }
        });

        
    });
});
</script>
</body>
</html>
    <script src="__STATIC__/index/js/index.js"></script>
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
                        <li data-target="#carousel-1" data-slide-to="3"></li>
                    </ol>
        
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <!-- Begin Slide 1 -->
                        
                        <div class="item active">
                            <a href="https://www.bilibili.com/video/av2946591/?from=search&seid=7993290841158770846" target="_blank">
                                <img src="__STATIC__/image/41.jpg" height="100%" width="100%" alt="Image of first carousel">
                            </a>
                        </div>
                        
                        <!-- End Slide 1 -->

                        <!-- Begin Slide 2 -->
                        
                        <div class="item">
                            <a href="https://www.bilibili.com/video/av6719215/?from=search&seid=16290003573349404155" target="_blank">
                                <img src="__STATIC__/image/timg.jpg" height="100%" width="100%" alt="Image of second carousel">
                            </a>
                        </div>
                        
                        <!-- End Slide 2 -->

                        <!-- Begin Slide 3 -->
                        <div class="item">
                            <a href="http://music.163.com/#/mv?id=5347247" target="_blank">
                                <img src="__STATIC__/image/time.jpg" height="100%" width="100%" alt="Image of third carousel">
                            </a>
                        </div>
                        <!-- End Slide 3 -->

                        <!-- Begin Slide 4 -->
                        <div class="item">
                            <a href="http://music.163.com/#/mv?id=5327608" target="_blank">
                                <img src="__STATIC__/image/tem.jpg" height="100%" width="100%" alt="Image of third carousel">
                            </a>
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
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mode" >
                    <a href="<?php echo url('mv/index'); ?>" style="text-decoration: none">
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

        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <a href="<?php echo url('music/index'); ?>" style="text-decoration: none">
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
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " >
                    <a href="<?php echo url('picture/index'); ?>" style="text-decoration: none">
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
            <!-- End Serivces Row 1 -->
      
            <!-- Begin Services Row 2 -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" onclick="not_perfect()">
                    <a href="javascript:;" style="text-decoration: none">
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
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " id="wechat">
                    <a href="javascript:;" style="text-decoration: none">
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
                <!-- 聊天室模态框 -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">请先登录</h4>
                            </div>
                            <div class="modal-body">你需要登录才能进入聊天室！</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                <a href="<?php echo url('login/login'); ?>"  class="btn btn-primary" >登录</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " onclick="not_perfect()">
                    <a href="javascript:;" style="text-decoration: none">
                        <div class="services-group wow animated fadeInRight div6" data-wow-offset="40">
                           <div class="services-header" style="margin:0px">
                                <h2 class="services-title" style="margin:0px">blog</h2>
                            </div>
                            <div class="services-body">
                                <img src="__STATIC__/image/13.jpg" alt="zard" title="zard">
                            </div>
                            <div class="services-foot" style="margin:0px">
                                <h3 class="services-title" style="margin:0px">博客</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Serivces Row 2 -->
    
        </div>      
    </section>
    <!-- End #services-section -->
<script>
// 未开放的功能
function not_perfect(){
    layer.alert('此功能还没开放');
}

// 聊天室功能有
    $("#wechat").click(function(){
        var judge="<?php echo session('?openid'); ?>";
        if(judge){
            window.open("<?php echo url('chat/index'); ?>");
        }else{
            $('#myModal3').modal({
                keyboard: true
            });
        }
        
    });
    
</script>

    <!-- Footer -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="copyright text center footer container" id="footer">
    <div class="row" style="width:100%">
        <div class="col-md-12 col-sm-12 col-xs-12" style="width:100%">
            <p>&copy; 2018 zard-forever.com 粤ICP备 18001537号
                <span><a href="<?php echo url('index/call_to_us'); ?>">联系我们</a></span>
                <span><a href="javascript:">常见问题</a></span>
                <span><a href="<?php echo url('index/suggestion'); ?>">意见反馈</a></span>
                <span><a href="javascript:" data-toggle="popover" data-html="true" data-placement="top" data-content="<img src='__STATIC__/image/微信.jpg' alt='zard-forever'>" data-container="body" data-trigger="hover">微信公众号</a></span>
                <span><a href="<?php echo url('index/friendly_link'); ?>">友情链接</a></span>
            </p>
        </div>
    </div>
</div>  
    <script>
        $(function (){
             $("[data-toggle='popover']").popover();
        });
        window.onresize = function(){
                if(document.body.clientWidth<=1000){
                   document.getElementById("h1-style").style.fontSize="40px"; 
                }else{
                    document.getElementById("h1-style").style.fontSize="80px";
                }
        }
        if(window.innerWidth<=1000){
               document.getElementById("h1-style").style.fontSize="40px"; 
            }else{
                document.getElementById("h1-style").style.fontSize="80px";
        }
    </script>
     <script src="http://www.dodobook.net/demo/mouse_star/dodobook.js"> </script>
  </body>
</html>
    
