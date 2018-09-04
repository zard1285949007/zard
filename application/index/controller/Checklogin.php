<?php
namespace app\index\controller;
use think\Controller;
class Checklogin extends Controller
{
	public function _initialize(){
		if(!session("?openid")){
			$this->redirect('login/login');
		}
	}   
}
