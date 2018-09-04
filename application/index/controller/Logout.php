<?php
namespace app\index\controller;
use think\Controller;
class Logout extends Controller{
	public function index(){
		if(session("?openid")){
			session(null);
			$this->success('退出成功','index/index');
		}else{
			$this->redirect('index/index');
		}
		
	}	
}
