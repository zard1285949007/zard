<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\phpstudy\WWW\public/../application/admin\view\index\index.html";i:1513440993;}*/ ?>
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
                    <a class="active-menu fa-2x"  href="index.html"><i class="glyphicon glyphicon-user fa-2x"></i>用户信息</a>
                </li>
                 <li>
                    <a  class="fa-2x" href="<?php echo url('mv'); ?>"><i class="glyphicon glyphicon-film fa-2x"></i>M V</a>
                </li>
                <li>
                    <a  class="fa-2x" href="<?php echo url('music'); ?>"><i class="glyphicon glyphicon-music fa-2x"></i>music</a>
                </li>
				<li>
                    <a   class="fa-2x" href="<?php echo url('picture'); ?>"><i class="glyphicon glyphicon-picture fa-2x"></i>picture</a>
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
    			<button>新增</button>
    			<button>专辑排序</button>
    			<button>排名</button>
    		</div>
    		<div>
    			<input type="text">
    			<input type="button" value="搜索">
    		</div>
    	</div>
    	<div id="main-body">
    		<table>
    			<thead>
    				<tr>
    					<th>id</th>
    					<th>日文名字</th>
    					<th>中文名字</th>
    					<th>专辑类别</th>
    					<th>地址链接</th>
    					<th>泉水值</th>
    					<th>操作</th>
    				</tr>
    			</thead>
    			<tbody>
	    			<tr>
	    				<td>id</td>
	    				<td>日文名字</td>
	    				<td>中文名字</td>
	    				<td>专辑类别</td>
	    				<td>地址链接</td>
	    				<td>泉水值</td>
	    				<td>
	    					<input type="button" value="删除">
	    					<input type="button" value="编辑">
	    				</td>
	    			</tr>
    			</tbody>
    		</table>
    	</div>
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
