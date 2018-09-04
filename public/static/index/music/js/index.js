$(function(){
	var time_id=-1;
	var audio = $("#audio")[0];
	var length=0;
	var index=0;//记录播放的layui的加载事件索引
	// 点击播放事件
	$(".music-body-hover").click(function(event){
		event.stopPropagation();	
		var div_src=$(this).attr("src");
		var audio_src=$("#audio").attr("src");
		if(div_src==audio_src){
			if(audio.paused){
				$(this).attr('class',"music-body-hover glyphicon glyphicon-pause");	
				play();
			}else{
				$(this).attr('class',"music-body-hover glyphicon glyphicon-play-circle");
				pause();
			}
		}else{
			$("#audio").attr("src",div_src);
			$(".music-body-hover").attr('class',"music-body-hover glyphicon glyphicon-play-circle");
			$(this).attr('class',"music-body-hover glyphicon glyphicon-pause");
			index=layer.load();		
			audio.addEventListener("canplaythrough",
				function(){
				layer.close(index);
				
				var music_length=audio.duration+"";
				music_length=parseInt(music_length.split('.')[0]);
				length=music_length;
				var m=Math.floor(music_length/60);
				var s=music_length%60;
				if(s<10){
					s=""+0+s;
				}
				var music_length=m+":"+s;
				$("#music_length").html(music_length);
				
				// $(this).attr('class',"music-body-hover glyphicon glyphicon-pause");	
				if(time_id!=-1){
					clearInterval(time_id);
					$("#progressbar").attr("style","width:0%");
					$("#music_current").html("00:00");
				}		
				play();
				},
			false);			
		}
		
		
	})

	function play(){
		clearInterval(time_id);
		audio.play();			
		var str=$("#progressbar").attr('style');
		str=str.split(":")[1];
		var j=parseInt(str.split("%")[0]);
		var i=audio.currentTime;
		var current_time=0;
		var m=0;
		var s=0;
		time_id=setInterval(function(){
			
			if(audio.ended){
				$("#music_current").html("00:00");
				$("#progressbar").attr("style","width:0%");
			}else{
				i+=0.1;
				current_time=Math.floor(i);
				m=Math.floor(current_time/60);
				if(m==0){
					m="00";
				}
				s=current_time%60;
				if(s<10){
					s="0"+s;
				}
				current_time=m+":"+s;
				$("#music_current").html(current_time);
				j=(i/length*100).toFixed(1);
				str="width:"+j+"%";
				$("#progressbar").attr("style",str);
			}
		},100);
	}
	function pause(){

		audio.pause();
		if(time_id!=-1){
			clearInterval(time_id);
		}
	}
	// 进度条点击事件
	var progress_active	=document.getElementById("progress_active");
	progress_active.onclick=function(event){
		var e = event || window.event;
        var mouseX = e.clientX;
        var width=progress_active.clientWidth;
        var time=Math.floor(mouseX/width*length);
        audio.currentTime=time;
        play();
	}
});