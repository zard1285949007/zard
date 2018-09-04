<?php
namespace app\index\controller;
use think\Controller;
class Mv extends Controller
{
    public function index()
    {
    	$nickname=trim(request()->get('nickname'));
      	$map=array();//搜索条件
      	$value=request()->get('value');
      	$map['outer_address']=['neq',""];

      	if($value){
      		$map['type']=$value;
      		$data=model("mv")->where($map)->order('id')->paginate(20,false,['query'=>request()->get()]);
      		$this->assign('value',$value);
      		$this->assign('nickname','');
      	}else{
      		if($nickname){
      			$map['japanese_name|chinese_name']=['like','%'.$nickname.'%'];
      			$data=model("mv")->where($map)->order('id')->paginate(20,false,['query'=>request()->get()]);
      			$this->assign('nickname',$nickname);
      		}else{
      			$map['type']=0;
      			$data=model("mv")->where($map)->order('id')->paginate(20,false,['query'=>request()->get()]);
      			$this->assign('nickname','');
      		}
      		
      		$this->assign('value',0);
      	}
    	

    	$this->assign("data",$data);
      	return $this->fetch();
    }
}
