<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\phpstudy\WWW\public/../application/admin\view\index\picture.html";i:1513950277;}*/ ?>
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
        font-size: 16px;"> <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> 
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
        <div id="search-div">
            <div>
                <button data-toggle="modal" data-target="#myModal0">新增</button>
            </div>
            <div>
                <input type="text">
                <input type="button" value="搜索">
            </div>
        </div>
        <div id="main-body">
            
<form action="<?php echo url('index/picture_add'); ?>" enctype="multipart/form-data" method="post">
<input type="file" name="image" /> <br> 
<input type="submit" value="上传" /> 
</form>


            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>地址</th>
                        <th>泉水值</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- 增加模态框（Modal） -->
<div class="modal fade" id="myModal0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <form action="<?php echo url('index/picture_add'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content" style="width:800px">
            <div class="modal-header" style="width:800px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">增加歌曲信息</h4>
            </div>
            <div class="modal-body" style="width:800px">
                    <input type="hidden" value="add" name="type">
                   <table>
                       <tr style="text-align: center">
                           <td>泉水值<input type="text" name="quanshui"></td>
                           <td><input type="file" name="address" ></td>  
                       </tr>
                   </table> 
            </div>
            <div class="modal-footer" style="width:800px">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <input type="submit" value="新增" class="btn btn-primary">
            </div>
        </div>
        </form>
    </div>
</div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="__STATIC__/admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="__STATIC__/admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="__STATIC__/admin/assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="__STATIC__/admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="__STATIC__/admin/assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="__STATIC__/admin/assets/js/custom.js"></script>
    
   
</body>
</html>
