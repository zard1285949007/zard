<?php
namespace app\admin\controller;
use think\Controller;
class Music extends Check
{
	public function add(){
		$data=request()->post();
		if(!empty($data['issue_time'])){
			$data['issue_time']=strtotime($data['issue_time']);
		}
		$data['update_time']=time();
		$result=model('music')->save($data);
		// $this->success('新增数据成功');
		if($result!==false){
			$this->success('新增数据成功');
		}else{
			$this->error('新增数据失败');
		}
	}
	public function del(){
		$id=request()->post('id');
		$result=model('music')->where('id','=',$id)->delete();
		if($result==1){
			$this->success('删除数据成功');
		}else{
			$this->error('删除数据失败');
		}
	}
	public function edit(){
		$data=request()->post();
		if(!empty($data['issue_time'])){
			$data['issue_time']=strtotime($data['issue_time']);
		}
		$data['update_time']=time();
		$id=$data['id'];
		unset($data['id']);
		$result=model('music')->where(['id'=>$id])->update($data);
		// print_r($result);
		if($result==1){
			$this->success('修改数据成功');
		}else{
			$this->error('修改数据失败');
		}
		
	}
	public function editAjaxReturn(){
		$id=$this->request->post('id');
		$data=model('music')->where(['id'=>$id])->find();
		if(!empty($data['issue_time'])){
			$data['issue_time']=date('Y-m-d',$data['issue_time']);
		}		
		return $data;
	}
}