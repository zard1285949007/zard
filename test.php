<?php
$host='0.0.0.0';
$port=9502;

$serv=new swoole_server($host,$port);
// 0.0.0.0表示有多个ip 端口号为9501
//$mode:SWOOLE_PROCESS多进和的方式，默认的
//$sock_type:SWOOLE_SOCK_TCP 启动TCP服务

$serv->on('connect',function($serv,$fd){
	// var_dump($serv);
	// var_dump($fd);
	echo "建立连接\n";
});
$serv->on('receive',function($serv,$fd,$from_id,$data){
	echo "接收到数据\n";
	var_dump($data);
});
$serv->on('close',function($serv,$fd){
	echo "连接关闭";
});

$serv->start();
// 上传到服务器用 php test.php执行
