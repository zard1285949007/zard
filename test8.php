<?php
$workers=[];//进程数组
$worker_num=2;//最大进程数
for($i=0;$i<$worker_num;$i++){
	$process=new swoole_process('doProcess',false,false);//第三个参数默认为true，现在改为false
	$process->useQueue();//开启队列，类似于全局函数
	$pid=$process->start();
	$workers[$pid]=$process;
}
// 进程执行函数
function doProcess(swoole_process $process){
	$recv=$process->pop();//默认8192
	echo "从主进程获取到数据：$recv \n";
	sleep(5);
	$process->exit(0);
}
// 主进程向子进程添加数据
foreach($workers as $pid => $process){
	$process->push("Hell 子进程 $pid \n");
}
// 等待子进程结束回收资源
for($i=0;$i<$worker_num;$i++){
	$ret=swoole_process::wait();//等待执行完成
	$pid=$ret['pid'];
	unset($workers[$pid]);
	echo "子进程退出$pid \n";
}