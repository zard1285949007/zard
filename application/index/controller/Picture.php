<?php
namespace app\index\controller;
use think\Controller;
class Picture extends Controller
{
	public function index(){
		$get=request()->get();
		$first_selected=0;//第一导航的选择
		$second_selected=0;//第二导航的选择

		if(array_key_exists('first',$get)){
			$first_selected=$get['first'];
		}
		if(array_key_exists('second',$get)){
			$second_selected=$get['second'];
		}

		$first=config('picture_first');//第一导航的内容
		$second=config('picture_second')[$first_selected];//第二导航的内容

		// 获取前10张图片的所有信息
		$picture=model('picture')->where(['first_type'=>$first_selected,'second_type'=>$second_selected])->limit(15)->order('id asc')->select();

		$this->assign('picture',$picture);
		$this->assign('first_selected',$first_selected);
		$this->assign('second_selected',$second_selected);
		$this->assign('first',$first);
		$this->assign('second',$second);

		return $this->fetch();
	}

	public function picture_ajax(){
		$get=request()->get();
		if(array_key_exists('first_selected',$get) && array_key_exists('second_selected',$get) && array_key_exists('last_id',$get)){
			$picture=model('picture')->where(['first_type'=>$get['first_selected'],'second_type'=>$get['second_selected'],'id'=>['gt',$get['last_id']]])->limit(6)->select();
			// return json_encode($picture);
			if($picture){
				return json_encode($picture);
			}else{
				return 1;
			}
			
		}else{
			return false;
		}

	}

	// 查看详细图片功能
	public function picture_detail(){
		if(request()->isPost()){
			$request=request()->post();
			//0为上方右箭头
			if($request['type']==0){
				$data=model('picture')->where(['first_type'=>$request['first_selected'],'second_type'=>$request['second_selected'],'id'=>['gt',$request['id']]])->find();
				if($data){
					$data['address']=str_replace('__STATIC__','/static',$data['address']);
					return $data;
				}else{
					return false;
				}
			}
			//1表示为上方左箭头
			elseif($request['type']==1){
				$data=model('picture')->where(['first_type'=>$request['first_selected'],'second_type'=>$request['second_selected'],'id'=>['lt',$request['id']]])->order('id desc')->find();
				if($data){
					$data['address']=str_replace('__STATIC__','/static',$data['address']);
					return $data;
				}else{
					return false;
				}
			}else{
				return false;
			}
			
			
		}else{
		$request=request()->get();
		$data=array();
		$data_before=array();
		$data_after=array();
		$data_selected=array();
		//查询前面三张图片（包括本id图片）
		$data_before=model('picture')->where(['first_type'=>$request['first_selected'],'second_type'=>$request['second_selected'],'id'=>['elt',$request['id']]])->order('id desc')->limit(4)->select();
		//查询id后面三张图片
		$data_after=model('picture')->where(['first_type'=>$request['first_selected'],'second_type'=>$request['second_selected'],'id'=>['gt',$request['id']]])->limit(3)->select();
		
		$count=model('picture')->where(['first_type'=>$request['first_selected'],'second_type'=>$request['second_selected']])->count();

		if($count<=7){
			$count=model('picture')->where(['first_type'=>$request['first_selected'],'second_type'=>$request['second_selected']])->select();
		}else{
			if(count($data_before)==4&&count($data_after)==3){
				
			}
			elseif(count($data_before)<4&&count($data_after)==3){
				$num=7-count($data_before);
				$data_after=model('picture')->where(['first_type'=>$request['first_selected'],'second_type'=>$request['second_selected'],'id'=>['gt',$request['id']]])->limit($num)->select();
			}
			elseif(count($data_before)==4&&count($data_after)<3){
				$num=7-count($data_after);
				$data_before=model('picture')->where(['first_type'=>$request['first_selected'],'second_type'=>$request['second_selected'],'id'=>['elt',$request['id']]])->order('id desc')->limit($num)->select();
			}
			$data_before=array_reverse($data_before);
			$data=array_merge($data_before,$data_after);			
		}

		

		foreach($data as $k =>$v){			
			$data[$k]['address']=str_replace("\\","/",$v['address']);
			if($data[$k]['id']==$request['id']){
				$data_selected['num']=$k;
				$data_selected['address']=$data[$k]['address'];
			}
		}

		$this->assign('first_selected',$request['first_selected']);
		$this->assign('second_selected',$request['second_selected']);
		$this->assign('data_selected',$data_selected);
		$this->assign('data',$data);

		return $this->fetch();			
		}

	}
}