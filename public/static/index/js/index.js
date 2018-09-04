$(function(){
	$(".div1").append("<div class='hide-div hide-common hide-common1'></div><div class='glyphicon glyphicon-play-circle hide-common hide-common1'></div >");
	$(".div2").append("<div class='hide-div hide-common hide-common2'></div><div class='glyphicon glyphicon-music hide-common hide-common2'></div >");
	$(".div3").append("<div class='hide-div hide-common hide-common3'></div><div class='glyphicon glyphicon-picture hide-common hide-common3'></div >");
	$(".div4").append("<div class='hide-div hide-common hide-common4'></div><div class='glyphicon glyphicon-stats hide-common hide-common4'></div >");
	$(".div5").append("<div class='hide-div hide-common hide-common5'></div><div class='glyphicon glyphicon-pencil hide-common hide-common5'></div >");
	$(".div6").append("<div class='hide-div hide-common hide-common6'></div><div class='glyphicon glyphicon-user hide-common hide-common6'></div >");

	$(".div1").hover(function(){
		$(".hide-common1").fadeIn(200);
		// setTimeout(function(){

			// if($(".hide-common1")[0].css("display")=='block'){
			// 	
			// }			
		// },1000);	
		},function(){
			$(".hide-common1").fadeOut(0);
	});
	$(".div2").hover(function(){
		$(".hide-common2").fadeIn(200);
		},function(){
			$(".hide-common2").fadeOut(0);
	});
	$(".div3").hover(function(){
		$(".hide-common3").fadeIn(200);
		},function(){
			$(".hide-common3").fadeOut(0);
	});	
	$(".div4").hover(function(){
		$(".hide-common4").fadeIn(200);
		},function(){
			$(".hide-common4").fadeOut(0);
	});
	$(".div5").hover(function(){
		$(".hide-common5").fadeIn(200);
		},function(){
			$(".hide-common5").fadeOut(0);
	});
	$(".div6").hover(function(){
		$(".hide-common6").fadeIn(200);
		},function(){
			$(".hide-common6").fadeOut(0);
	});
});