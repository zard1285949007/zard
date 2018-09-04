<?php
$serv=new swoole_http_server("123.207.34.110",9504);
// 获取请求
// $request:请求信息
// $reponse:返回信息
$serv->on('request',function($request,$response){
	var_dump($request);
	// 设置返回头信息
	$response->header("Content-Type","text/html;charset=uft-8");
	$reponse->end("hello world".rand(100,999));//发送信息
});
$serv->start();
