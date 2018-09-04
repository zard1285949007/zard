<?php
$serv =new swoole_server("0.0.0.0",9502,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);
// $serv 服务器信息
// $data 接收到的信息
// $fd  客户端信息
$serv->on('packet',function($serv,$data,$fd){
	// 发送数据到相应客户端
	$serv->sendto($fd['address'],$fd['port'],"Server:$data");
	var_dump($fd);
});
$serv->start();

