<?php
$ws =new swoole_websocket_server("0.0.0.0",9501);

$ws->on('open',function($ws,$request){
	var_dump($request);
	$ws->push($request->fd,'welcome \n');
});
$ws->on('message',function($ws,$request){
	echo "message:$request->$data";
	$ws->push($request->fd,"get it message");
});
$ws->on('close',function($ws,$request){
	echo 'close\n';
});
$ws->start();
