<?php
namespace app\index\controller;
use think\Controller;
// use api;
require_once ROOT_PATH."vendor/api/qqConnectAPI.php";
use api\qqlogin\QC;
use api\qqlogin\Oauth;
// use WebServer\WebServer;
// use \qqlogin\Oauth;
class Login extends Controller{
	protected function _initialize(){
		if(session("?openid")){
			$this->redirect(url('index/index'));
		}
	}
	public function index(){
		$data=array();
		// 请求accesstoken
		$oauth=new Oauth();
		$accesstoken=$oauth->qq_callback();
		// 获取openid

		$openid=$oauth->get_openid();
		$data['openid']=$openid;
		
		$qc=new QC($accesstoken,$openid);
		$userinfo=$qc->get_user_info();

		$data['nickname']=$userinfo['nickname'];
		$data['gender']=$userinfo['gender'];
		$data['province']=$userinfo['province'];
		$data['city']=$userinfo['city'];
		$data['year']=$userinfo['year'];
		$data['figureurl']=$userinfo['figureurl'];
		$data['figureurl_1']=$userinfo['figureurl_1'];
		$data['figureurl_2']=$userinfo['figureurl_2'];
		$data['figureurl_qq_1']=$userinfo['figureurl_qq_1'];
		$data['figureurl_qq_2']=$userinfo['figureurl_qq_2'];
		$data['is_yellow_vip']=$userinfo['is_yellow_vip'];
		$data['vip']=$userinfo['vip'];
		$data['yellow_vip_level']=$userinfo['yellow_vip_level'];
		$data['level']=$userinfo['level'];
		$data['is_yellow_year_vip']=$userinfo['is_yellow_year_vip'];


		if($userinfo){
			$users_data=model('users')->where(['openid'=>$openid])->find();
			if($users_data){
				// 更新旧用户
				model('users')->where(['id'=>($users_data->id)])->update($data);
				session('quanshui',$users_data->quanshui);
				session('rank',rank($users_data->quanshui));
				
			}else{
				// 增加新用户
				model('users')->save($data);
				session('quanshui',0);
				session('rank','黄铜');
			}
			session('name',$userinfo['nickname']);
			session('openid',$openid);
			if(empty($userinfo['figureurl_qq_2'])){
				session('head_url',$userinfo['figureurl_qq_1']);
			}else{
				session('head_url',$userinfo['figureurl_qq_2']);
			}
		}
		$this->success('登录成功',url('index/index'));

	}
	public function login(){
		$oauth = new QC();
		$oauth->qq_login();
	}
}