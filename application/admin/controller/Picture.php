<?php
namespace app\admin\controller;
use think\Controller;
class Picture extends Check
{
	public function add(){
		set_time_limit(0);
		$get=request()->post();

        $files=request()->file("image");
        $url=ROOT_PATH . 'public' . DS.'static'.DS . 'picture'.DS.$get['first'].DS.$get['second'];
        $result=0;
        $data=array();//要储存的信息
        // $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        foreach($files as $k =>$file){
	        // 移动到框架应用根目录/public/uploads/ 目录下
	        $name=md5(uniqid(microtime(true),true));	        
	        $info = $file->validate(['ext'=>'jpg,png,gif'])->move($url,$name,true);
	        if($info){
	        	
	        	$data[$k]['add_time']=time();
	        	$data[$k]['address']='__STATIC__'.DS.'picture'.DS.$get['first'].DS.$get['second'].DS.$info->getSaveName();
	        	$data[$k]['first_type']=$get['first'];
	        	$data[$k]['second_type']=$get['second'];
	        	
	        }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	       }    
	   }
		$result=model('picture')->saveAll($data);
		if($result===false){
			$this->error('添加图片失败','index/picture');
		}else{
			$this->success('添加图片成功','index/picture');
		}

    }
}