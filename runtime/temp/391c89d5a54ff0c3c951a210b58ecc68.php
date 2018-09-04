<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/home/www/WWW/public/../application/admin/view/index/picture.html";i:1519465858;}*/ ?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>zard-forever</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="__STATIC__/admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="__STATIC__/admin/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="__STATIC__/admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="__STATIC__/admin/assets/css/custom.css" rel="stylesheet" />
    <link href="__STATIC__/admin/index/index.css" rel="stylesheet" />

     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">zard</a> 
            </div>
         <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;"> <a href="<?php echo url('check/logout'); ?>" class="btn btn-danger square-btn-adjust">Logout</a> 
        </div>
    </nav>   
           <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="__STATIC__/image/2.jpg" class="user-image img-responsive"/>
                </li>
            
                
                <li>
                    <a class="fa-2x"  href="index.html"><i class="glyphicon glyphicon-user fa-2x"></i>用户信息</a>
                </li>
                 <li>
                    <a  class="fa-2x" href="<?php echo url('mv'); ?>"><i class="glyphicon glyphicon-film fa-2x"></i>M V</a>
                </li>
                <li>
                    <a  class="fa-2x" href="<?php echo url('music'); ?>"><i class="glyphicon glyphicon-music fa-2x"></i>music</a>
                </li>
                <li>
                    <a   class="fa-2x active-menu " href="<?php echo url('picture'); ?>"><i class="glyphicon glyphicon-picture fa-2x"></i>picture</a>
                </li>                          
                <li>
                    <a href="javascript:;" class="fa-2x"><i class="glyphicon glyphicon-tree-conifer fa-2x"></i>系统设置<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo url('system_email'); ?>" class="fa-2x">发邮件</a>
                        </li>
                        <li>
                            <a href="<?php echo url('system_message'); ?>" class="fa-2x">留言</a>
                        </li>
                    </ul>
                  </li>  
              <li>
                    <a class="fa-2x" href="<?php echo url('blank'); ?>"><i class="fa fa-square-o fa-2x"></i>空白页</a>
                </li>
            </ul>   
        </div>       
    </nav> 
    <div id="page-wrapper" >  
        <div id="main-body">
        <div id='header' style='border:1px inset black;padding:5px'>
            <form action="<?php echo url('picture/add'); ?>" enctype="multipart/form-data" method="post">
                <select id="picture_first" name="first">
                  
                  <?php if(is_array($picture_first) || $picture_first instanceof \think\Collection || $picture_first instanceof \think\Paginator): $k = 0; $__LIST__ = $picture_first;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data_first): $mod = ($k % 2 );++$k;?>
                    <option value ="<?php echo $k-1; ?>" <?php if($k-1 == $first): ?>selected<?php endif; ?>><?php echo $data_first; ?></option>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <select name="second">
                    <?php if(is_array($picture_second) || $picture_second instanceof \think\Collection || $picture_second instanceof \think\Paginator): $k = 0; $__LIST__ = $picture_second;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data_second): $mod = ($k % 2 );++$k;?>
                        <option value ="<?php echo $k-1; ?>" ><?php echo $data_second; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                
                <input type="file" name="image[]" multiple style="display:inline-block"/>
                <input type="submit" value="上传" /> 
            </form>
        </div>

         
        </div>
    </div>
</div>


    <script src="__STATIC__/admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="__STATIC__/admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->

    <script>
        $(function(){
            $("#picture_first").change(function(){
                var first=$("#picture_first option:selected").val();
                var url="<?php echo url('index/picture'); ?>";
                url=url+'?first='+first;
                window.location.href=url;
            });
        });
    </script>
   
</body>
</html>
