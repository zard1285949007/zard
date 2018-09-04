<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"/home/www/WWW/public/../application/admin/view/index/music.html";i:1517880060;}*/ ?>
﻿·<!DOCTYPE html>
<html>
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

   <style type="text/css">
       #table input{
            width:100%;
            text-align:center;
       }
   </style>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">zard</a> 
        </div>
        <div style="color: white;padding: 15px 50px 5px 50px;float:right;font-size: 16px;"> <a href="<?php echo url('check/logout'); ?>" class="   btnbtn-danger square-btn-adjust">Logout</a> 
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
                    <a  class="fa-2x active-menu" href="<?php echo url('music'); ?>"><i class="glyphicon glyphicon-music fa-2x"></i>music</a>
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
                <button data-toggle="modal" data-target="#myModal0">新增</button>
                <button>专辑排序</button>
                <button>排名</button>
            </div>
            <div>
                <form action="<?php echo url('index/music'); ?>" method="get">
                    <input type="text" name="select" value="<?php echo $select; ?>" placeholder="请输入中文或日文歌名">
                    <input type="submit" value="搜索" style="height:50px;width:70px;font-size: 25px;letter-spacing: 5px;">
                </form>
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
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo $vo['japanese_name']; ?></td>
                        <td><?php echo $vo['chinese_name']; ?></td>
                        <td><?php echo $vo['album']; ?></td>
                        <td><?php echo $vo['address']; ?></td>
                        <td><?php echo $vo['quanshui']; ?></td>
                        <td>
                            <input type="hidden" value="<?php echo $vo['issue_time']; ?>">
                            <input type="hidden" value="<?php echo $vo['is_sole']; ?>">
                            <input type="hidden" value="<?php echo $vo['comment']; ?>">
                            <input type="button" value="删除" data-toggle="modal" data-target="#myModal2" class="delete_button">
                            <input type="button" class="edit_button" value="编辑" data-toggle="modal" data-target="#myModal1" >
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div style="margin:0px auto;text-align:center"><?php echo $data; ?></div>
        </div>
    </div>

</div>
 
 <!-- 新增模态框（Modal） -->
<div class="modal fade" id="myModal0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:80%">
        <form action="<?php echo url('music/add'); ?>" method="post">
        <div class="modal-content" style="width:100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">新增music信息</h4>
            </div>
            <div class="modal-body" style="width:100%">
                    <table border="1px" style="text-align:center;width:100%;"  id="table">
                        <tr>
                            <td>日文名</td><td><input type="text" name="japanese_name" ></td>
                        </tr>
                        <tr>
                            <td>中文名</td><td><input type="text" name="chinese_name" ></td>
                        </tr>
                        <tr>
                            <td>专辑代号</td><td><input type="text" name="album" ></td>
                        </tr>
                        <tr>
                            <td>地址链接</td><td><input type="text" name="address" ></td>
                        </tr>
                        <tr>
                            <td>泉水值</td><td><input type="text" name="quanshui" ></td>
                        </tr>
                        <tr>
                            <td>发行时间</td><td><input type="text" name="issue_time" ></td>
                        </tr>
                        <tr>
                            <td>是否为单曲</td><td><input type="text" name="is_sole" ></td>
                        </tr>
                        <tr>
                            <td>个人评论</td><td><input type="text" name="comment"></td>
                        </tr>
                        <tr>
                            <td>作曲</td><td><input type="text" name="composer" value="织田哲郎"></td>
                        </tr>
                        <tr>
                            <td>作词</td><td><input type="text" name="lyricists" value="坂井泉水"></td>
                        </tr>
                        <tr>
                            <td>歌唱</td><td><input type="text" name="singer" value="坂井泉水"></td>
                        </tr>
                        <tr>
                            <td>编曲</td><td><input type="text" name="arranger" value=""></td>
                        </tr>
                    </table>
                   
            </div>
            <div class="modal-footer" style="width:100%">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <input type="submit" value="新增" class="btn btn-primary">
            </div>
        </div>
        </form>
    </div>
</div>
 <!-- 删除模态框（Modal） -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:80%">
        <form action="<?php echo url('music/del'); ?>" method="post">
        <div class="modal-content" style="width:100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">删除music信息</h4>
            </div>
            <div class="modal-body" style="width:100%;text-align:center">
                <input type="hidden" value="" name="id" id="del_id">
                确定删除此music信息                   
            </div>
            <div class="modal-footer" style="width:100%">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <input type="submit" value="删除" class="btn btn-primary">
            </div>
        </div>
        </form>
    </div>
</div>
<!-- 编辑模态框（Modal） -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:80%">
        <form action="<?php echo url('music/edit'); ?>" method="post">
        <div class="modal-content" style="width:100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">修改music信息</h4>
            </div>
            <div class="modal-body" style="width:100%">
                    <table border="1px" style="text-align:center;width:100%;"  id="table">
                        <tr>
                            <td>id</td><td><input type="text" name="id" id="id"></td>
                        </tr>
                        <tr>
                            <td>日文名</td><td><input type="text" name="japanese_name" id="japanese_name"></td>
                        </tr>
                        <tr>
                            <td>中文名</td><td><input type="text" name="chinese_name" id="chinese_name"></td>
                        </tr>
                        <tr>
                            <td>专辑代号</td><td><input type="text" name="album" id="album"></td>
                        </tr>
                        <tr>
                            <td>地址链接</td><td><input type="text" name="address" id="address"></td>
                        </tr>
                        <tr>
                            <td>泉水值</td><td><input type="text" name="quanshui" id="quanshui"></td>
                        </tr>
                        <tr>
                            <td>发行时间</td><td><input type="text" name="issue_time" id="issue_time"></td>
                        </tr>
                        <tr>
                            <td>是否为单曲</td><td><input type="text" name="is_sole" id="is_sole"></td>
                        </tr>
                        <tr>
                            <td>个人评论</td><td><input type="text" name="comment" id="comment"></td>
                        </tr>
                        <tr>
                            <td>作曲</td><td><input type="text" name="composer" id="composer"></td>
                        </tr>
                        <tr>
                            <td>作词</td><td><input type="text" name="lyricists" id="lyricists"></td>
                        </tr>
                        <tr>
                            <td>歌唱</td><td><input type="text" name="singer" id="singer"></td>
                        </tr>
                        <tr>
                            <td>编曲</td><td><input type="text" name="arranger" id="arranger"></td>
                        </tr>
                    </table>
                   
            </div>
            <div class="modal-footer" style="width:100%">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <input type="submit" value="确定" class="btn btn-primary">
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

      <!-- CUSTOM SCRIPTS -->
<script>
// 编辑按钮返回的信息
    $(function(){
       $(".edit_button").click(function(){
            var id=$(this).parent().parent().children().first().html();
            // alert(id);
            $.ajax({
                type:"POST",
                dataType:"JSON",
                url:"<?php echo url('music/editAjaxReturn'); ?>",
                data:{id:id},
                success:function(data){
                    // alert('hello');
                    $("#id").val(data.id);
                    $("#japanese_name").val(data.japanese_name);
                    $("#chinese_name").val(data.chinese_name);
                    $("#album").val(data.album);
                    $("#address").val(data.address);
                    $("#quanshui").val(data.quanshui);
                    $("#issue_time").val(data.issue_time);
                    $("#is_sole").val(data.is_sole);
                    $("#comment").val(data.comment);
                    $("#composer").val(data.composer);
                    $("#lyricists").val(data.lyricists);
                    $("#singer").val(data.singer);
                     $("#arranger").val(data.arranger);
                },
                error:function(){
                    alert('error');
                }
            });
        });
       $(".delete_button").click(function(){
            var id=$(this).parent().parent().children().first().html();
            $("#del_id").val(id);
       })
    })
</script>
 

</body>
</html>
