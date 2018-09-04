<?php
namespace app\index\controller;
class Chat extends Checklogin
{
	public function index(){
		// $conn=mysql_connect('localhost','root','abcd12345') or die("error connecting") ;
		// mysql_select_db('zard');
		// $sql ="select * from users where id=1 ";
		// $result = mysql_query($sql,$conn);
		// print_r($result);
		return $this->fetch();
	}
	public function more(){
		$request=$this->request->post();
		if($request){
			if(empty($request['id'])){
				$data=model('chat')->order('id desc')->limit(0,5)->select();
				foreach($data as $k=>$v){
					$today_time=strtotime(date('Y-m-d'));
					if($v['add_time']>$today_time){
						$data[$k]['add_time']=date("H:i:s",$v['add_time']);
					}else{
						$data[$k]['add_time']=date("Y/m/d H:i:s",$v['add_time']);
					}
				}
				return $data;
			}else{
				$chat_id=$request['id'];
				$data=model('chat')->where(['id'=>['lt',$chat_id]])->order('id desc')->limit(0,5)->select();
				if(empty($data)){
					return false;
				}else{
					foreach($data as $k=>$v){
						$today_time=strtotime(date('Y-m-d'));
						if($v['add_time']>$today_time){
							$data[$k]['add_time']=date("h:i:s",$v['add_time']);
						}else{
							$data[$k]['add_time']=date("Y/m/d h:i:s",$v['add_time']);
						}
					}
					return $data;
				}
				
			}
		}else{
			return ['0'=>'error'];
		}
	}
}
