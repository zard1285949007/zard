<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"/home/www/WWW/public/../application/index/view/mv/index.html";i:1518243468;s:63:"/home/www/WWW/public/../application/index/view/common_head.html";i:1518756352;s:63:"/home/www/WWW/public/../application/index/view/common_foot.html";i:1517801129;}*/ ?>
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
 
  </head>  
<body>
<hr>
<div class="container" id="search">  
    <div class="order-div" style="width:540px">
        <div class="select-merge col-sm-0" >
            <input type="radio" name="mv_select" id="select1"  value="0" <?php if($value == 0): ?>checked="checked"<?php endif; ?>>
            <label for="select1">m v</label><br>
             <input type="radio" name="mv_select" id="select2" value="1" <?php if($value == 1): ?>checked="checked"<?php endif; ?>>
            <label for="select2">电视采访</label>
        </div>
        <div class="select-merge">
            <input type="radio" name="mv_select" id="select3" value="2" <?php if($value == 2): ?>checked="checked"<?php endif; ?>>
            <label for="select3">演唱会</label><br>
            <input type="radio" name="mv_select" id="select4" value="3" <?php if($value == 3): ?>checked="checked"<?php endif; ?>>
            <label for="select4">其他集锦</label>
        </div>
       <!--  <div class="select-merge">
           <input type="radio" name="mv_select" id="select5">
            <label for="select5">单曲</label>
        </div> -->
    </div>
    <form action="<?php echo url('mv/index'); ?>" method="get">
        <div class="search-div" id="search-div-id">
            <input type="text" name="nickname" value="<?php echo $nickname; ?>" placeholder="请输入部分日文或中文" autofocus=true id="search_text">
            <button class="search-button">
                <div class="glyphicon glyphicon-search"><input type="submit" hidden></div>
            </button>
        </div>
    </form>
</div>
<hr>


<div class="container" style="padding:0px">
    <div class="row" style="margin:0px">
    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
    <a href="<?php echo $vo['outer_address']; ?>">
        <div class="col-md-3 col-sm-4 col-xs-12  div-all " style="padding:15px">
            <div style="width:100%;height:100%;box-shadow:7px 7px 7px gray;border-radius:10px;">
                <div class="img-head ">
                    <div><?php echo $vo['japanese_name']; ?></div>
                    <?php if($vo['chinese_name'] != ''): ?><div><?php echo $vo['chinese_name']; ?></div><?php endif; ?>
                </div>
                <a href="<?php echo $vo['outer_address']; ?>"  target="_blank" class="portfolio-link">
                    <img src="__STATIC__/image/14.jpg" class="img-responsive" alt="">
                    <div class="img-foot"></div>
                </a>
            </div>
        </div>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

<div style="text-align:center"><?php echo $data; ?></div>
<div style="clear:both;height:30px" ></div>

<script>
        $(function (){
            //将文本的焦点移到最后
            var text=$("#search_text").val(); 
            $("#search_text").val("").focus().val(text); 

             $("[data-toggle='popover']").popover();

             //排序点击事件
             $("input[name='mv_select']").change(function(){
                var value=$(this).val();
                var url="/index/mv/index.html?value="+value;
                window.location.href=url;
             })
            
        });
        window.onresize = function(){
                // alert( );
                if(document.body.clientWidth<=1000){
                   document.getElementById("search-div-id").style.display="none"; 
                }else{
                    document.getElementById("search-div-id").style.display="block";
                }
            }
        if(window.innerWidth<=1000){
               document.getElementById("search-div-id").style.display="none";  
            }else{
                document.getElementById("search-div-id").style.display="block";
        }
</script>
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
