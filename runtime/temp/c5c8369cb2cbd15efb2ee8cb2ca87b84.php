<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/home/www/WWW/public/../application/index/view/picture/picture_detail.html";i:1520902373;}*/ ?>
<html>
<head>

<title>zard图片</title>
<meta name="keywords" content="图片" />
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<script type="text/javascript" src="__STATIC__/index/js/jquery-1.10.2.min.js"></script>

</head>
<style type="text/css">
	*{padding: 0px;margin: 0px;list-style-type:none;}
	body{padding: 0px;margin: 0px;}
	.base{position: relative;width:1000px;border: 1px solid #e6e6e6;left:50%;height: 625px;margin-left: -500px;}
	.base_left{position: absolute;width:70px;height:595px;text-align: center;cursor: pointer;}
	.jiantou_left{position: absolute;padding:0px;top: 50%;margin-top: -40px;left:9px;width:50px;height:80px;display: block;
							background: url("__STATIC__/index/picture/slider.png") no-repeat 0 0;
							background-position: 4px -82px;}
	.base_right{position: absolute;width:68px;height:595px;text-align: center;right:0px;cursor: pointer;}
	.jiantou_right{position: absolute;left:0px;top: 50%;margin-top: -40px;left:9px;width:50px;height:80px;display: block;
						background: url("__STATIC__/index/picture/slider.png") no-repeat 0 0;
							background-position: 5px 5px;}
	.content{  height: 595px; width: 860px;position: absolute;border:1px solid #e6e6e6;left:70px;
			background:url(<?php echo $data_selected['address']; ?>) no-repeat;background-position: 50%;background-size: contain;}
	.toggle{position: absolute;top: 596px;width: 100%;height: 30px;background: #fafafa;line-height: 30px;border-top: 1px solid #e6e6e6;}
	.toggle .list{font-size: 14px;color: #666;width: 98px;cursor: pointer;background: white;}
	.toggle .list span{display: block;position: absolute;
			left: 66px;top: 3px;width: 19px;height: 19px;
			background: url("__STATIC__/index/picture/list.png") no-repeat 0 0;
							background-position: -16px -58px;}
	.bottle{position: absolute;width:100%;top:625px;border:1px solid #e6e6e6;overflow: hidden;height:0px;}
	.bottle ul{margin: 0px;position: absolute;height:100px;padding:0px;display:flex;width:10000px;}
	#list_shot{height:100px;width:880px;position: absolute;left: 59px;overflow: hidden;}
	.bottle .l{display: block;position: absolute;
			left: 13px;top: 41px;width: 19px;height: 19px;
			background: url("__STATIC__/index/picture/slider.png") no-repeat 0 0;
							background-position: -22px -205px;cursor: pointer;}
	.bottle .r{display: block;position: absolute;
			left: 969px;top: 41px;width: 19px;height: 19px;
			background: url("__STATIC__/index/picture/slider.png") no-repeat 0 0;
							background-position: 6px -205px;cursor: pointer;}
	.bottle ul li{text-decoration: none;float: left;height:100px;margin: 0px 5px;
					position: relative;left:0px;transition: left 0.5s;border:1px solid #e6e6e6;cursor: pointer;}
	.bottle ul li:hover {border:1px solid red;}
</style>
<body>

<div class="base" style="border-bottom-width:0px">

	<div class="base_two">
		<div class="base_left"><span class="jiantou_left"></span></div>
		<div class="content"></div>
		<div class="base_right"><span class="jiantou_right"></span></div>
	</div>
	
	<div class="toggle"><div class="list">|图片列表<span></span>&nbsp;&nbsp;</div></div>
	
	<div class="bottle">
		<span class="l"></span>
		<div id="list_shot">
		<ul id="list_ul">
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<li><img src="<?php echo $vo['address']; ?>"  width="115px" height="100px" id="<?php echo $vo['id']; ?>"></li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			
		</ul>
		</div>
		<span class="r"></span>
	</div>
	
</div>
<script>
$(function(){
	var first_selected="<?php echo $first_selected; ?>";
	var second_selected="<?php echo $second_selected; ?>";
	$(".base_left").mouseover(function(){
		$(this).css("background","#e6e6e6");
		$(this).find("span").css("background-position","-43px -82px");
	});
	$(".base_left").mouseout(function(){
		$(this).css("background","white");
		$(this).find("span").css("background-position","4px -82px");
	});
	$(".base_right").mouseover(function(){
		$(this).css("background","#e6e6e6");
		$(this).find("span").css("background-position","-40px 5px");
	});
	$(".base_right").mouseout(function(){
		$(this).css("background","white");
		$(this).find("span").css("background-position","5px 5px");
	});
	$(".list").mouseover(function(){
		$(this).css("background","#e6e6e6");
	});
	$(".list").mouseout(function(){
		$(this).css("background","white");
	});
	
	var flag=0;
	var toggleheight=$(".list").parent().offset().top;

	// var h=625;
	var h=document.body.clientHeight;	

	$(".content").height(h-30);
	$(".base_left").height(h-30);
	$(".base_right").height(h-30);
	$(".base").height(h-30);
	// $(".bottle").height(h-30);
	$(".toggle")[0].style.top=(h-30)+"px";	
	$(".bottle")[0].style.top=h+"px";	
	$(".list").click(function(){
		
			if(flag==0){
			
				$(this).find("span").css("background-position","3px -58px");
				// $(this).parent().animate({top:toggleheight-100});
				$(".toggle").animate({top:h-130});
				$(".bottle").animate({top:h-100,height:'100px'});
				$(".base_left").css("height",h-130);
				$(".base_right").css("height",h-130);
				$(".content").animate({height:h-130});
				flag=1;
			}else{
			
				$(this).find("span").css("background-position","-16px -58px");
				// $(this).parent().animate({top:toggleheight});
				$(".toggle").animate({top:h-30});
				$(".bottle").animate({top:h,height:'0px'});
				$(".base_left").css("height",h-30);
				$(".base_right").css("height",h-30);
				$(".content").animate({height:h-30});
				flag=0;
				
			}
			});
	var indexlog=parseInt("<?php echo $data_selected['num']; ?>");
	$(".bottle ul li").mouseover(function(){
		$(this).css("border","1px solid red");
		$(".bottle ul li").eq(indexlog).css("border","1px solid red");
	});
	$(".bottle ul li").mouseout(function(){
		$(this).css("border","1px solid #e6e6e6");
		$(".bottle ul li").eq(indexlog).css("border","1px solid red");
	});
	//下面的图片点击事件
	$(".bottle ul li").click(function(){
		var url=$(this).find("img").attr("src");
		url="url("+url+") no-repeat";
		$(".content").css("background",url).css("background-position","50%").css("background-size","contain");
		indexlog=$(this).index();
		var size=$(".bottle ul li").size();
		console.log(indexlog);
		// if(indexlog>=3){
		// 	var left=(indexlog-3)*(-127);
		// 	if((size-7)*(-127)<left){
		// 		left=left+"px";
		// 		$(".bottle ul li").animate({left:left},200);
		// 	}else{
		// 		left=(size-7)*(-127)+"px";
		// 		$(".bottle ul li").animate({left:left},200);
		// 	}
			
		// }
		suan();
	});
	//下面的右箭头
	$(".bottle .r").click(function(){
		var size=$(".bottle ul li").size();
		var left=$(".bottle ul li").css("left");
		left=parseInt(left);
		left=left-381;
	if(left%127==0){
		if((size-7)*(-127)<left){
			left=left+"px";
			$(".bottle ul li").animate({left:left},500);	
		}else{
			left=(size-7)*(-127)+"px";
			$(".bottle ul li").animate({left:left},500);
		}
	}
		
	});
	//下面的左箭头
	$(".bottle .l").click(function(){
		var left=$(".bottle ul li").css("left");
		left=parseInt(left);
		left=left+381;
		if(left%127==0){
		if(left<0){
			left=left+"px";
			$(".bottle ul li").animate({left:left},500);
		}else{
			$(".bottle ul li").animate({left:"0px"},500);
		}
		}
	});
	//上面的左箭头
	$(".base_left").click(function(){
		console.log(indexlog);
		if(indexlog>=1){
		var url=$(".bottle ul li").eq(indexlog-1).find("img").attr("src");
		url="url("+url+") no-repeat";
		$(".content").css("background",url).css("background-position","50%").css("background-size","contain");
		var size=$(".bottle ul li").size();
		if(indexlog>=3){
			if(indexlog==3){
				var id=$("#list_ul li img:first").attr('id');	

				$.ajax({
					type:"POST",
					url:"<?php echo url('picture/picture_detail'); ?>",
					data:{id:id,first_selected:first_selected,second_selected:second_selected,type:1},
					dataType:"json",
					success:function(data){
						if(data!=false){
							$html='<li><img src='+data.address+'  width="115px" height="100px" id="'+data.id+'"></li>';
							$("#list_ul").prepend($html);
							var size=$(".bottle ul li").size();
		
							for(var i=0;i<size;i++){
								$(".bottle ul li").eq(i).css("border","1px solid #e6e6e6");
								if(i==indexlog){
									$(".bottle ul li").eq(i).css("border","1px solid red");
								}
							}
						}else{
							indexlog--;
							suan();
						}																
						
					},
					error:function(data){
						alert('网络错误');
					}
				});

			}else{
				var left=(indexlog-4)*(-127);					
				left=left+"px";
				$(".bottle ul li").animate({left:left},200);
				indexlog--;
				suan();
			}

			
		}else{			
			indexlog--;
			suan();
		}
		
		
		}else{
			alert("已经是第一张啦");
		}
		
		
	});
	//上面的右箭头
	$(".base_right").click(function(){
		var size=$(".bottle ul li").size();
		// console.log(indexlog);
		if(indexlog<size-1){
		var url=$(".bottle ul li").eq(indexlog+1).find("img").attr("src");
		url="url("+url+") no-repeat";
		$(".content").css("background",url).css("background-position","50%").css("background-size","contain");
		if(indexlog>=3){
			var id=$("#list_ul li img:last").attr('id');
			$.ajax({
				type:"POST",
				url:"<?php echo url('picture/picture_detail'); ?>",
				data:{id:id,first_selected:first_selected,second_selected:second_selected,type:0},
				dataType:"json",
				success:function(data){
					if(data!=false){
						$html='<li><img src='+data.address+'  width="115px" height="100px" id="'+data.id+'"></li>';
						$("#list_ul").append($html);
					}	
					// console.log(size);				
					var left=(indexlog-3)*(-127);
					// if((size-7)*(-127)<left){
						// console.log('hi');
						left=left+"px";
						$(".bottle ul li").animate({left:left},200);
					// }else{
					// 	console.log('hello');
					// 	left=(size-7)*(-127)+"px";
					// 	$(".bottle ul li").animate({left:left},500);
					// }
					
				},
				error:function(data){
					alert('网络错误');
				}
			});
			
			
		}else{
			$(".bottle ul li").animate({left:"0px"},200);
		}
		indexlog++;
		suan();
		}else{
			alert("已经最后一张啦");
		}
	});

	function suan(){
		var size=$(".bottle ul li").size();
		
		for(var i=0;i<size;i++){
			$(".bottle ul li").eq(i).css("border","1px solid #e6e6e6");
			if(i==indexlog){
				$(".bottle ul li").eq(i).css("border","1px solid red");
			}
		}
	}
	
});
</script>
</body>
</html>
<!--代码整理：js代码 www.jsdaima.com-->