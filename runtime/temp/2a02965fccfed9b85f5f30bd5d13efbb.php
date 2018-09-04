<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"/home/www/WWW/public/../application/index/view/chat/index.html";i:1518757340;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>wechat</title>
	<link rel="stylesheet" href="__STATIC__/index/assets/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="__STATIC__/index/js/jquery-1.10.2.min.js"></script>
    <script src="__STATIC__/index/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="__STATIC__/index/layer/layer.js"></script>
     <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <style type="text/css">
    	/*    上下透明，右边框为10px   */
		 .aa:before {
		     content: '';
		     position: absolute;
		     top: 3px;
		     left: -8px;
		     width: 0;
		     height: 0;
		     border-right: 8px solid #E4E4E2;
		     border-bottom: 8px solid transparent;
		     border-top: 8px solid transparent; 
			 box-shadow:inset 0 1px 1px rgba(0,0,0);
		 }
		 /*  上下透明，右边框为9px且在:before伪元素三角形的基础上，向右，下移动了1px  */
		 .aa:after {
		     content: '';
		     position: absolute;
		     top: 3px;
		     left: -7px;
		     width: 0;
		     height: 0;
		     border-bottom: 7px solid transparent;
		     border-right: 7px solid #F5F5F5;
		     border-top: 7px solid transparent; 
		 } 
    </style>
</head>
<body>
	<div class="panel panel-primary   col-sm-8 col-xs-12 col-md-offset-2" style="padding:0px">
	    <div class="panel-heading">
	        <span class="panel-title">聊天室&nbsp;&nbsp;在线人数&nbsp;&nbsp;<span style="color:red" id="people_count">0</span></span>
	        
	    </div>
	    <div class="panel-body" style="height:500px;overflow:scroll;" id="panel">
	    	<div style="text-align:center;" id="more"><button class="load_more">点击查看更多消息>>></button></div>
	        
		</div>
		<div style="position:relative;">
			<textarea name="" id="textarea" style="width:100%" rows="5" autofocus=true></textarea>
			<input type="button" value="发送" id="button" style="position:absolute;bottom:10px;right:10px;width:60px;height:30px;font-size:18px;letter-spacing: 5px"/>
		</div>
	</div>
	<script>
	$(function(){
		//加载更多消息点击事件
		$(".load_more").click(function(){
			var hidden_id=$(".hidden_id:first").text();
			hidden_id=hidden_id.replace(" ","");
			$.ajax({
			  type: 'POST',
			  url: "<?php echo url('chat/more'); ?>",
			  data: {id:hidden_id},
			  dataType: "JSON",
			  success: function(data){
			  	if(data==false){
			  		layer.alert('无更多消息', {
					    skin: 'layui-layer-lan'
					    ,closeBtn: 0
					    ,anim: 4 //动画类型
					  });
			  	}else{
			  	for(var i=0;i<data.length;i++){
			  		var str ="<div class='hidden_id' hidden> ";
					str+=data[i].id;
					str +=" </div><div class='media' style='margin-top:10px'><div style='margin:0px auto;text-align:center;color:#808080;font-size:12px'>";
					str+=data[i].add_time;
					str+="</div><a class='media-left' href='#' style='display:table-cell;vertical-align:top'><img class='media-object img-circle' src='";
					str+=data[i].head_url;
					str+="' alt='zard' style='width:40px'> </a><div class='media-body' style='padding-left:10px;overflow:visible;display:table-cell;vertical-align:top;' ><p class='media-heading' style='color:#808080;line-height:10px'>";
					str+=data[i].name;
					str+="<span class='badge' style='line-height:10px'>";
					str+=data[i].rank;
					str+="</span></p><div class='well well-sm aa' style='position:relative;padding:2px;margin:0px'>";
					str+=data[i].content;
					str+="</div></div></div>";

					$("#more").after(str);
			  	}
			  }
			  },
			  error:function(data){
			  	layer.alert('网络错误', {
			    skin: 'layui-layer-lan'
			    ,closeBtn: 0
			    ,anim: 4 //动画类型
			  });
			  }
			  
			});
		});



		var div=document.getElementById("div");
		var button=document.getElementById("button");
		var wsServer="ws:/123.207.34.110:9501";
		var webSocket=new WebSocket(wsServer);
		//回车触发提交事件
		$("#textarea").keydown(function(event){		
			if(event.ctrlKey && event.keyCode == 13){
				var textarea_content=$("#textarea").val();
				textarea_content+="\n";
				$("#textarea").val(textarea_content);
			}else{
				if(event.keyCode == 13){				
				button.click();
				event.returnValue = false;
				return false;
				}
			}
		});		
		button.onclick=function(){
			var content =$("#textarea").val();
			content=content.replace("\n","<br/>");
			content=content.replace(/\s+/g, "")
			if(content==""){
				layer.tips('发送内容不能为空,请重新输入','#button');
			}else{
				$("#textarea").val("");
				var quanshui="<?php echo session('quanshui'); ?>";
				var rank="<?php echo session('rank'); ?>";
				var head_url="<?php echo session('head_url'); ?>";
				var name="<?php echo session('name'); ?>";
				var openid="<?php echo session('openid'); ?>";
				var data={
					'quanshui':quanshui,
					'rank':rank,
					'head_url':head_url,
					'name':name,
					'openid':openid,
					'content':content
				};
				webSocket.send(JSON.stringify(data));				
			}
			
		}
		webSocket.onopen=function(evt){
			// var data=JSON.parse(evt.data)
			// console.log(data);
			
		}
		webSocket.onclose=function(evt){
			console.log("关闭");
		}
		webSocket.onmessage=function(evt){
			if(isNaN(evt.data)){
				var data=JSON.parse(evt.data);			 
				
				var str ="<div class='hidden_id' hidden> ";
				str+=data.id;
				str +=" </div><div class='media' style='margin-top:10px'><div style='margin:0px auto;text-align:center;color:#808080;font-size:12px'>";
				str+=data.time;
				str+="</div><a class='media-left' href='#' style='display:table-cell;vertical-align:top'><img class='media-object img-circle' src='";
				str+=data.head_url;
				str+="' alt='zard' style='width:40px'> </a><div class='media-body' style='padding-left:10px;overflow:visible;display:table-cell;vertical-align:top;' ><p class='media-heading' style='color:#808080;line-height:10px'>";
				str+=data.name;
				str+="<span class='badge' style='line-height:10px'>";
				str+=data.rank;
				str+="</span></p><div class='well well-sm aa' style='position:relative;padding:2px 10px 2px 10px;margin:0px;display:inline-block;'>";
				str+=data.content;
				str+="</div></div></div>";

				var panel=$("#panel");
				panel.append(str);
				$('#panel').scrollTop( $('#panel')[0].scrollHeight );
			}else{
				$("#people_count").html((evt.data+""));
			}
			
			// }else{
			// 	console.log('hello world');
			// }

		}
		webSocket.onerror=function(evt,e){
			console.log('error');
			
		}
	});	
	</script>
	
</body>
</html>