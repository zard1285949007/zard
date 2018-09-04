<?php
namespace app\admin\controller;
use think\Controller;
class Check extends Controller
{
	public function _initialize(){
		if(!session('?admin')){
			$this->redirect('login/index');
		}
	}

	public function logout(){
		session(null);
		$this->success('退出成功','login/index');
	}
}