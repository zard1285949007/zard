<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"/home/www/WWW/public/../application/index/view/music/detail.html";i:1518281953;}*/ ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>music</title>
   <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="__STATIC__/index/music/css/detail.css">  
   <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style type="text/css">
   </style>
</head>
	<body style="height: 999px">
	<div class="audio-box" style="z-index: 10">
		<div class="audio-container">
			<div class="audio-view">
				<div class="audio-cover" ></div>
				<div class="audio-body">
					<h3 class="audio-title">未知歌曲</h3>
					<div class="audio-backs">
						<div class="audio-this-time">00:00</div>
						<div class="audio-count-time">00:00</div>
						<div class="audio-setbacks">
							<i class="audio-this-setbacks">
								<span class="audio-backs-btn"></span>
							</i>
							<span class="audio-cache-setbacks">
							</span>
						</div>
					</div>
				</div>
				<div class="audio-btn">
					<div class="audio-select">
						<div class="audio-prev" onclick="prev()"></div>
						<div class="audio-play"></div>
						<div class="audio-next" onclick="next()"></div>
						<div class="audio-menu"></div>
						<div class="audio-volume"></div>
					</div>
					<div class="audio-set-volume">
						<div class="volume-box">
							<i><span></span></i>
						</div>
					</div>
					<div class="audio-list">
						<div class="audio-list-head">
							<p>歌单</p>
							<span class="menu-close">关闭</span>
						</div>
						<ul class="audio-inline">
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
   		<div class="row" >
   			<div class="col-lg-6 col-md-6 col-sm-6" style="height:500px;position:relative;">
   				<img src="__STATIC__/image/music_circle.png" class="img-circle" style="position:absolute;top: 50%;left: 50%;margin-left:-136px;margin-top:-136px;">
   				<img src="<?php echo $album_src; ?>" class="img-circle" style="position:absolute;top: 50%;left: 50%;margin-left:-100px;margin-top:-100px;width:200px;height:200px">
   			</div>
   			<div class="col-lg-6 col-md-6 col-sm-6" style="height:500px;">
   				<div style="overflow-y:scroll;height:100%">
   				<h2><?php echo $message['japanese_name']; ?></h2><br>
   				<h4>作曲：<?php echo $message['composer']; ?></h4>
   				<h4>编曲：<?php echo $message['arranger']; ?></h4>
   				<h4>作词：<?php echo $message['lyricists']; ?></h4>
   					<?php echo $lyric; ?>	
   				</div>
   			</div>
   		</div>
   		<div class="row" >
   			<div class="col-lg-6 col-md-6 col-sm-6" >
   				<h4>泉友评论</h4>
   				<hr>
   				<p>
   					精彩评论
   				</p>
   				<hr>
   				<p>
   					最新评论
   				</p>
   				<hr>
   			</div>
   		</div>
   	</div>
<script type="text/javascript" src="__STATIC__/index/music/js/detail.js"></script>
<script type="text/javascript">
function prev(){
	var url="/index/music/detail.html?id=<?php echo $message['id']; ?>&type=1";
    window.location.href=url;
}
function next(){
	var url="/index/music/detail.html?id=<?php echo $message['id']; ?>&type=2";
    window.location.href=url;
}
$(function(){
	var cover="<?php echo $album_src; ?>";
	var src='<?php echo $music_src; ?>';
	var title="<?php echo $message['japanese_name']; ?>";
	var song = [
		{
			'cover' : cover,
			'src' : src,
			'title' : title
		},		
	];

	var audioFn = audioPlay({
		song : song,
		autoPlay : true  //是否立即播放第一首，autoPlay为true且song为空，会alert文本提示并退出
	});


	// setTimeout(function(){
	// 	if(audioFn){
	// 	var time=document.getElementsByClassName('audio-count-time')[0];
	// 	alert(time.innerHTML);
	// 	}
	// },1000)
	
	// audioFn.oldSong();
	/* 向歌单中添加新曲目，第二个参数true为新增后立即播放该曲目，false则不播放 */
	// audioFn.newSong({
	// 	'cover' : 'images/cover5.jpg',
	// 	'src' : 'http://webmp3-1253691995.costj.myqcloud.com/audio/baab.mp3',
	// 	'title' : 'B.A.A.B'
	// },false);

	/* 暂停播放 */
	//audioFn.stopAudio();

	/* 开启播放 */
	//audioFn.playAudio();

	/* 选择歌单中索引为3的曲目(索引是从0开始的)，第二个参数true立即播放该曲目，false则不播放 */
	//audioFn.selectMenu(3,true);

	/* 查看歌单中的曲目 */
	//console.log(audioFn.song);

	/* 当前播放曲目的对象 */
	//console.log(audioFn.audio);
});
</script>
</body>
</html>