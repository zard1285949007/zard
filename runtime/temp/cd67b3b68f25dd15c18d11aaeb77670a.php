<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/home/www/WWW/public/../application/index/view/picture/index.html";i:1520348564;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>picture</title>
	<link rel="stylesheet" href="__STATIC__/index/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="__STATIC__/index/picture/index.css">
	<script type="text/javascript" src="__STATIC__/index/js/jquery-1.10.2.min.js"></script>
    <script src="__STATIC__/index/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="__STATIC__/index/layer/layer.js"></script>
</head>
<body style="background-image:url(/static/image/932.jpg)">

<div style="width:100%">
	<ul class="nav nav-tabs nav-justified" >
	  <?php if(is_array($first) || $first instanceof \think\Collection || $first instanceof \think\Paginator): $k = 0; $__LIST__ = $first;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
	  	<li <?php if($k-1 == $first_selected): ?>class="active"<?php endif; ?>  class="first" first="<?php echo $k-1; ?>"><a href="#" style="font-size:20px;"><?php echo $v; ?></a></li>
	  <?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<div style="width:80%;margin:0px auto">
	<ul class="nav nav-pills nav-justified">
		<?php if(is_array($second) || $second instanceof \think\Collection || $second instanceof \think\Paginator): $k = 0; $__LIST__ = $second;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
	  	<li <?php if($k-1 == $second_selected): ?>class="active"<?php endif; ?> class="second" second="<?php echo $k-1; ?>"><a href="#"><?php echo $v; ?></a></li>
	  <?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	</div>
</div>
<hr style="margin-top:0px">
<div id="main">
    <?php if(is_array($picture) || $picture instanceof \think\Collection || $picture instanceof \think\Paginator): $k = 0; $__LIST__ = $picture;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
    	<div class="pin" id="<?php echo $v['id']; ?>" >

				<div class="box">
					<img src="<?php echo $v['address']; ?>" alt="zard" onclick="picture_detail_first(this)" picture="<?php echo $v['id']; ?>">
				</div>

		</div>
    <?php endforeach; endif; else: echo "" ;endif; ?>	
</div>


<script>
	
	$(function(){
		//点击第一行导航的事件
		$(".first").click(function(){
			var first=$(this).attr('first');
			var url="<?php echo url('picture/index'); ?>";
			url=url+"?first="+first;
			window.location.href=url;
		});
		//点击每二行导航的事件
		$(".second").click(function(){
			var first="<?php echo $first_selected; ?>";
			var second=$(this).attr('second');
			var url="<?php echo url('picture/index'); ?>";
			url=url+"?first="+first+"&second="+second;
			window.location.href=url;
		});

	});
	// 瀑布流图片的相关功能
	window.onload=function(){
	waterfall('main','pin');
        var first_time=true;
        window.onresize=function(){waterfall('main','pin');};
        window.onscroll=function(){
            if(checkscrollside()){
            	if(first_time==true){
            		first_time=false;
	            	//步骤一:创建异步对象
					var ajax = new XMLHttpRequest();
					//步骤二:设置请求的url参数,参数一是请求的类型,参数二是请求的url,可以带参数,动态的传递参数starName到服务端
					var first_selected="<?php echo $first_selected; ?>";
					var second_selected="<?php echo $second_selected; ?>";
					var oParent = document.getElementById('main');
					var last_id=oParent.lastElementChild.id;

					var url="<?php echo url('picture/picture_ajax'); ?>";
					url=url+"?first_selected="+first_selected+"&second_selected="+second_selected+"&last_id="+last_id;
					
					ajax.open('get',url);
					//步骤三:发送请求
					ajax.send();
					//步骤四:注册事件 onreadystatechange 状态改变就会调用
					ajax.onreadystatechange = function () {
					   if (ajax.readyState==4 &&ajax.status==200) {
					    //步骤五 如果能够进到这个判断 说明 数据 完美的回来了,并且请求的页面是存在的
					　　　　var picture=ajax.responseText;
							if(picture==1){
								// 获取高度
								waterfall('main','pin');
					   			var child=oParent.lastElementChild;
					   			var top =child.style.top;
					   			var height=child.offsetHeight;
					   			var h=parseInt(top)+parseInt(height)+50;

								var opin = document.createElement('div');
								opin.innerHTML='加载完毕，已无更多';
								opin.style.position='absolute';//设置绝对位移
					            opin.style.top=h+'px';
					            opin.style.left='40%';
					            opin.style.margin="10px";
					            opin.style.fontSize="24px";
					            opin.className='pin';

					            first_time=false;
					            oParent.appendChild(opin);

							}else{
							picture=JSON.parse(picture);
							var url="";
							for(i in picture){
								var opin = document.createElement('div');
			                    opin.className='pin';
			                    opin.id=picture[i].id;
			                    var oBox = document.createElement('div');
			                    oBox.className='box';
			                    opin.appendChild(oBox);
			                    var oImg = document.createElement('img');
			                    oImg.addEventListener('click', picture_detail_second);
			                    oImg.className="picture_detail";
								oImg.setAttribute('picture',opin.id);


			                    oBox.appendChild(oImg);
			                    oParent.appendChild(opin);
			                    url=picture[i].address;
			                    url=url.replace('STATIC__','/static');
			                    url=url.replace('__','');
			                    oImg.src=url;
			                    
			                }
			                waterfall('main','pin');
			                // addGlass();
			                }
			            }
					  　　
					}
				}
            }
        }
	function waterfall(parent,pin){
		var oparent = document.getElementById(parent);
		var aPin = getClassObj(oparent,pin);
		var ipinW= aPin[0].offsetWidth;
		var num = Math.floor(document.documentElement.clientWidth/ipinW);
		oparent.style.cssText = "width:"+num*ipinW+"px;"+"margin:0 auto;"

		var pinHArr=[];
		for(var i=0;i<aPin.length;i++){
			var pinH = aPin[i].offsetHeight;
			if(i<num){
				pinHArr[i]=pinH;
			}else{
				var minH = Math.min.apply(null,pinHArr);
				var minHIndex = getminHIndex(pinHArr,minH);
				 aPin[i].style.position='absolute';//设置绝对位移
			            aPin[i].style.top=minH+'px';
			            aPin[i].style.left=aPin[minHIndex].offsetLeft+'px';
				pinHArr[minHIndex]+=aPin[i].offsetHeight;
			}
		}
		first_time=true;

	}

	// getElementByClassName函数
	function getClassObj(parent,className){
		obj = parent.getElementsByTagName('*');
		var pinS = [];
		for(var i=0;i<obj.length;i++){
			if(obj[i].className==className){
				pinS.push(obj[i]);
			}
		};
		return pinS;
	}
	// getminHIndex函数获取最小高度pin的索引
	function getminHIndex(arr,min){
		for(var i=0;i<arr.length;i++){
			if(arr[i]==min){
				return i;
			}
		}
	}
   // checkscrollside函数,检测是否滚动底部
   function checkscrollside(){
        var oParent = document.getElementById('main');
        var aPin = getClassObj(oParent,'pin');
        var lastH=aPin[aPin.length-1].offsetTop+Math.floor(aPin[aPin.length-1].offsetHeight/2);
        var scrollTop = document.documentElement.scrollTop || document.body.scrollTop ;
        var winH = document.documentElement.clientHeight;
        return (lastH< scrollTop+winH) ? true : false; 
   }
}
	function picture_detail_first(ele){
		var id=ele.getAttribute('picture');
		var first_selected="<?php echo $first_selected; ?>";
		var second_selected="<?php echo $second_selected; ?>";
		var url="<?php echo url('picture/picture_detail'); ?>";
		url+="?first_selected="+first_selected+"&second_selected="+second_selected+"&id="+id;
		window.open(url);
	}
	function picture_detail_second(){
		var id=this.getAttribute('picture');
		var first_selected="<?php echo $first_selected; ?>";
		var second_selected="<?php echo $second_selected; ?>";
		var url="<?php echo url('picture/picture_detail'); ?>";
		url+="?first_selected="+first_selected+"&second_selected="+second_selected+"&id="+id;
		window.open(url);
	}
	</script>
</body>
</html>