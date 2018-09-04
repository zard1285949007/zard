<?php
$ws =new swoole_websocket_server("0.0.0.0",9501);

$ws->set([
		'daemonize' => 1
	]);
$ws->on('open',function($ws,$request){
	//var_dump($request);
	// $mysqli=mysqli_connect('localhost', 'root', 'abcd12345', 'zard');
	// $sql="select * from chat order by add_time limit 0,10";
	// $result=mysqli_query($mysqli,$sql);
	// $chat_data=mysqli_fetch_all($result);
	// $chat_data=json_encode($chat_data);
	// $ws->push($request->fd,$chat_data);

	$ws->tick(2000,function() use ($ws, $request){
		$count=count($ws->connections);
		$ws->push($request->fd,$count);
	});
});
$ws->on('message',function($ws,$request){
	$data=json_decode($request->data,true);
	$data['time']=date('H:i:s');
	$data['content']=htmlentities($data['content']);
	$data['content']=str_replace("&lt;br/&gt;","<br/>",$data['content']);//将换行符放出来
	$chat=array();
	$mysqli=mysqli_connect('localhost', 'root', 'abcd12345', 'zard');
	// $chat['openid']=model('users')->where(['openid'=>$data['openid']])->find()->openid;
	$sql=<<<SQL
	select * from users where openid = "{$data['openid']}";
SQL;
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row){
	$chat['user_id']=$row['id'];
	$chat['add_time']=time();
	$chat['content']=$data['content'];
	$chat['rank']=$data['rank'];
	$chat['head_url']=$data['head_url'];
	$chat['name']=$data['name'];
	$chat['quanshui']=$data['quanshui'];
	$insert=<<<SQL
	insert into chat (user_id,add_time,content,rank,head_url,name,quanshui) values ({$chat['user_id']},{$chat['add_time']},"{$chat['content']}","{$chat['rank']}","{$chat['head_url']}","{$chat['name']}","{$chat['quanshui']}")
SQL;
	$insert_result=mysqli_query($mysqli,$insert);
	$data['id']=mysqli_insert_id($mysqli);
	mysqli_close($mysqli);
	// model('chat')->save($chat);
	// $mysqli->query("insert into chat (user_id,add_time,content) values ({$chat['user_id']},{$chat['add_time']},{$chat['content']})");
	$start_fd = 0;
		while(true) {
			$conn_list = $ws->connection_list($start_fd, 10);
			if($conn_list===false or count($conn_list) === 0) {
				//echo "finish\n";
				break;
			}
			$start_fd = end($conn_list);
			//var_dump($conn_list);
			foreach($conn_list as $fd) {				
				$ws->push($fd,json_encode($data));	

			}
		}
	}

});
$ws->on('close',function($ws,$request){
	// echo 'close\n';
});
$ws->on('request', function (swoole_http_request $request, swoole_http_response $response) {
        // $server->connections 遍历所有websocket连接用户的fd，给所有用户推送
        foreach ($ws->connections as $fd) {
            $ws->push($fd, 'what');
        }
 });
$ws->start();
