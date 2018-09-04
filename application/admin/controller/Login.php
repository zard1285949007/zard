<?php
namespace app\admin\controller;
use think\Controller;
class Login extends Controller
{
	public function _initialize(){
		if(session('?admin')){
			$this->redirect('index/index');
		}
	}
    public function index()
    {
    	return $this->fetch();
    }
    public function login(){
    	$request=request()->post();
    	if(captcha_check($request['captcha'])){
	    	if($request['user']=='quanshui'){
	    		if($request['password']=='abcd12345'){
	    			session('admin',1);
	    			$this->success('登录成功','index/index');
	    		}else{
	    			$this->error('密码错误');
	    		}
	    	}else{
	    		$this->error('用户不存在');
	    	}
   		}else{
   			$this->error('验证码错误');
   		}
    }
}
